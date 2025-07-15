<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ReviewController extends Controller
{
    public $productId;

    public function index()
    {
        return "ok";
    }

    public function store(Request $request)
    {
        $this->productId = $request->product_id;

        if(!auth()->check()) {
            return redirect()->back()->with([
                'message' => 'Login terlebih dahulu',
                'alert-type' => 'info'
            ]);
        }

        $checkProduct = Order::whereHas('orderItems', function ($query) {
            $query->where('product_id', $this->productId);
        })->where('user_id', auth()->id())->where('status', Order::COMPLETED)->first();
        
        if(is_null($checkProduct)){
            return redirect()->back()->with([
                'message' => 'Beli dulu produknya!',
                'alert-type' => 'info'
            ]);
        }

        $rating = Review::where('user_id', auth()->id())->where('product_id', $this->productId)->first();

        if (empty($rating)) {
            $rating = new Review();
            $rating->user_id = auth()->id();
            $rating->product_id = $request->product_id;
            $rating->rating = $request->rating;
            $rating->content = $request->content;
            $rating->status = 1;
            $rating->save();

            return redirect()->back()->with([
                'message' => 'Terimakasih, sudah mereview produk ini',
                'alert-type' => 'success'
            ]);
        } else {
            return redirect()->back()->with([
                'message' => 'Produk sudah anda berikan rating!',
                'alert-type' => 'info'
            ]);
        }
    }
}
