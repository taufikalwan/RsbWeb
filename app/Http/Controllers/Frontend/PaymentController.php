<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function notification(Request $request)
    {
        $payload = $request->getContent();
        $notification = json_decode($payload);

        if (!$notification) {
            return response(['message' => 'Invalid JSON payload'], 400);
        }

        $validSignatureKey = hash("sha512", $notification->order_id . $notification->status_code . $notification->gross_amount . config('midtrans.serverKey'));

        if ($notification->signature_key != $validSignatureKey) {
            return response(['message' => 'Invalid signature'], 403);
        }

        $this->initPaymentGateway();

        $paymentNotification = new \Midtrans\Notification();
        $order = Order::where('code', $paymentNotification->order_id)->firstOrFail();

        if ($order->isPaid()) {
            return response(['message' => 'The order has been paid before'], 422);
        }

        if (Payment::where('token', $paymentNotification->transaction_id)->exists()) {
            return response(['message' => 'Duplicate notification'], 200);
        }

        $transaction = $paymentNotification->transaction_status;
        $type = $paymentNotification->payment_type;
        $fraud = $paymentNotification->fraud_status;

        $vaNumber = $paymentNotification->va_numbers[0]->va_number ?? null;
        $vendorName = $paymentNotification->va_numbers[0]->bank ?? null;

        $paymentStatus = null;

        switch ($transaction) {
            case 'capture':
                $paymentStatus = ($type == 'credit_card' && $fraud == 'challenge') ? Payment::CHALLENGE : Payment::SUCCESS;
                break;
            case 'settlement':
                $paymentStatus = Payment::SETTLEMENT;
                break;
            case 'pending':
                $paymentStatus = Payment::PENDING;
                break;
            case 'deny':
                $paymentStatus = Payment::DENY;
                break;
            case 'expire':
                $paymentStatus = Payment::EXPIRE;
                break;
            case 'cancel':
                $paymentStatus = Payment::CANCEL;
                break;
        }

        DB::transaction(function () use ($order, $payload, $paymentNotification, $paymentStatus, $vaNumber, $vendorName) {
            $payment = Payment::create([
                'order_id' => $order->id,
                'number' => Payment::generateCode(),
                'amount' => $paymentNotification->gross_amount,
                'method' => 'midtrans',
                'status' => $paymentStatus,
                'token' => $paymentNotification->transaction_id,
                'payloads' => $payload,
                'payment_type' => $paymentNotification->payment_type,
                'va_number' => $vaNumber,
                'vendor_name' => $vendorName,
                'biller_code' => $paymentNotification->biller_code ?? null,
                'bill_key' => $paymentNotification->bill_key ?? null,
            ]);

            if (in_array($payment->status, [Payment::SUCCESS, Payment::SETTLEMENT])) {
                $order->payment_status = Order::PAID;
                $order->status = Order::CONFIRMED;
                $order->save();
            }
        });

        return response([
            'code' => 200,
            'message' => 'Payment status is : ' . $paymentStatus,
        ], 200);
    }

    public function completed(Request $request)
    {
        $code = $request->query('order_id');
        $order = Order::where('code', $code)->firstOrFail();

        if ($order->payment_status == Order::UNPAID) {
            return redirect('payments/failed?order_id=' . $code);
        }

        // \Session::flash('success', "Thank you for completing the payment process!");

        return redirect('orders/received/' . $order->id);
    }

    public function unfinish(Request $request)
    {
        $code = $request->query('order_id');
        $order = Order::where('code', $code)->firstOrFail();

        // \Session::flash('error', "Sorry, we couldn't process your payment.");

        return redirect('orders/received/' . $order->id);
    }

    public function failed(Request $request)
    {
        $code = $request->query('order_id');
        $order = Order::where('code', $code)->firstOrFail();

        // \Session::flash('error', "Sorry, we couldn't process your payment.");

        return redirect('orders/received/' . $order->id);
    }

    // Jika belum ada, tambahkan inisialisasi Midtrans
    protected function initPaymentGateway()
    {
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        \Midtrans\Config::$isProduction = config('midtrans.isProduction');
        \Midtrans\Config::$isSanitized = config('midtrans.isSanitized');
        \Midtrans\Config::$is3ds = config('midtrans.is3ds');
    }
}
