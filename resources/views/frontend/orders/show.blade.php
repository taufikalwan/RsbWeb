@extends('frontend.layout')

@section('content')
  <main class="pt-90" style="padding-top: 0px;">
    <div class="mb-4 pb-4"></div>
    <section class="my-account container">
      <h2 class="page-title">Order's Details</h2>
      <div class="row">
        @include('frontend.partials.user_menu', ['order' => 'menu-link_active'])

        <div class="col-lg-10">
          <div class="wg-box mt-5 mb-5" style="border-top: 4px solid #6a6e51;">
            <div class="row">
              <div class="col-6">
                <h5>Pesanan Detail</h5>
              </div>
              <div class="col-6 text-right">
                <a class="btn btn-sm btn-danger" href="{{ route('order.index') }}">Back</a>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table table-striped table-bordered table-transaction">
                <tbody>
                  <tr>
                    <th>Order ID</th>
                    <td>{{ $order->code }}</td>
                    <th>Telephone</th>
                    <td>{{ $order->customer_phone }}</td>
                    <th>Kode Pos</th>
                    <td>{{ $order->customer_postcode }}</td>
                  </tr>
                  <tr>
                    <th>Order Date</th>
                    <td>{{ date('d M Y', strtotime($order->order_date)) }}</td>
                    <th>Dikirim Oleh</th>
                    <td>
						{{ $order->shipping_service_name }}
					</td>
                    <th>Status Pembayaran</th>
                    <td>
						{{ $order->payment_status }}
					</td>
                  </tr>
                  <tr>
                    <th>Order Status</th>
                    <td colspan="5">
						@if($order->status === 'completed')
						<span class="badge bg-success">
						<br>{{ $order->status }}
					  </span>
					  @else
                      <span class="badge bg-danger">
						<br> Status: {{ $order->status }} {{ $order->isCancelled() ? '('. date('d M Y', strtotime($order->cancelled_at)) .')' : null}}
						@if ($order->isCancelled())
							<br> Cancellation Note : {{ $order->cancellation_note}}
						@endif
					  </span>
					  @endif
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="wg-box wg-table table-all-user" style="border-top: 4px solid #6a6e51;">
            <div class="row">
              <div class="col-6">
                <h5>Ordered Items</h5>
              </div>
              <div class="col-6 text-right">

              </div>
            </div>
            <div class="table-responsive">
				<table class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>SKU</th>
									<th>Item</th>
									<!-- <th>Description</th> -->
									<th>Quantity</th>
									<th>Unit Cost</th>
									<th>Total</th>
								</tr>
							</thead>
							<tbody>
								@php 
									function showAttributes($jsonAttributes)
									{
										$jsonAttr = (string) $jsonAttributes;
										$attributes = json_decode($jsonAttr, true);
										$showAttributes = '';
										if ($attributes) {
											$showAttributes .= '<ul class="item-attributes">';
											foreach ($attributes as $key => $attribute) {
												if(count($attribute) != 0){
													foreach($attribute as $value => $attr){
														$showAttributes .= '<li>'.$value . ': <span>' . $attr . '</span><li>';
													}
												}else {
													$showAttributes .= '<li><span> - </span></li>';
												}
											}
											$showAttributes .= '</ul>';
										}
										return $showAttributes;
									}
								@endphp
								@forelse ($order->orderItems as $item)
									<tr>
										<td>{{ $item->sku }}</td>
										<td>{{ $item->name }}</td>
										<!-- <td>{!! showAttributes($item->attributes) !!}</td> -->
										<td>{{ $item->qty }}</td>
										<td>Rp{{ number_format($item->base_price, 0, ",", ".") }}</td>
										<td>Rp{{ number_format($item->sub_total, 0, ",", ".") }}</td>
									</tr>
								@empty
									<tr>
										<td colspan="6">Order item tidak ditemukan!</td>
									</tr>
								@endforelse
							</tbody>
						</table>
            </div>
          </div>
          <div class="divider"></div>
          <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">

          </div>

          <div class="wg-box mt-5" style="border-top: 4px solid #6a6e51;">
            <h5>Alamat Pengiriman</h5>
            <div class="my-account__address-item col-md-6">
               <div class="my-account__address-item__detail">
				<address>
					{{ $order->shipment->first_name }} {{ $order->shipment->last_name }}
					<br> {{ $order->shipment->address1 }}
					<br> {{ $order->shipment->address2 }}
					<br> Email: {{ $order->shipment->email }}
					<br> Phone: {{ $order->shipment->phone }}
					<br> Postcode: {{ $order->shipment->postcode }}
				</address>
				</div>
            </div>
          </div>

          <div class="wg-box mt-5" style="border-top: 4px solid #6a6e51;">
            <h5>Transactions</h5>
            <div class="table-responsive">
              <table class="table table-striped table-bordered table-transaction">
                <tbody>
                  <tr>
                    <th>Subtotal</th>
                    <td>Rp{{ number_format($order->base_total_price, 0, ",", ".") }}</td>
                    <th>Ongkir</th>
                    <td>Rp{{ number_format($order->shipping_cost, 0, ",", ".") }}</td>
                    <th>Tax</th>
                    <td>Rp{{ number_format($order->tax_amount, 0, ",", ".") }}</td>
                    <th>Discount</th>
                    <td>Rp{{ number_format($order->discount_amount, 0, ",", ".") }}</td>
                  </tr>
                  <tr>
                    <th>Total</th>
                    <td>Rp{{ number_format($order->grand_total, 0, ",", ".") }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

        </div>

      </div>
    </section>
  </main>
@endsection

@push('style-alt')
 <style>
    .pt-90 {
      padding-top: 90px !important;
    }

    .pr-6px {
      padding-right: 6px;
      text-transform: uppercase;
    }

    .my-account .page-title {
      font-size: 1.5rem;
      font-weight: 700;
      text-transform: uppercase;
      margin-bottom: 40px;
      border-bottom: 1px solid;
      padding-bottom: 13px;
    }

    .my-account .wg-box {
      display: -webkit-box;
      display: -moz-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      padding: 24px;
      flex-direction: column;
      gap: 24px;
      border-radius: 12px;
      background: var(--White);
      box-shadow: 0px 4px 24px 2px rgba(20, 25, 38, 0.05);
    }

    .bg-success {
      background-color: #40c710 !important;
    }

    .bg-danger {
      background-color: #f44032 !important;
    }

    .bg-warning {
      background-color: #f5d700 !important;
      color: #000;
    }

    .table-transaction>tbody>tr:nth-of-type(odd) {
      --bs-table-accent-bg: #fff !important;

    }

    .table-transaction th,
    .table-transaction td {
      padding: 0.625rem 1.5rem .25rem !important;
      color: #000 !important;
    }

    .table> :not(caption)>tr>th {
      padding: 0.625rem 1.5rem .25rem !important;
      background-color: #6a6e51 !important;
    }

    .table-bordered>:not(caption)>*>* {
      border-width: inherit;
      line-height: 32px;
      font-size: 14px;
      border: 1px solid #e1e1e1;
      vertical-align: middle;
    }

    .table-striped .image {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 50px;
      height: 50px;
      flex-shrink: 0;
      border-radius: 10px;
      overflow: hidden;
    }

    .table-striped td:nth-child(1) {
      min-width: 250px;
      padding-bottom: 7px;
    }

    .pname {
      display: flex;
      gap: 13px;
    }

    .table-bordered> :not(caption)>tr>th,
    .table-bordered> :not(caption)>tr>td {
      border-width: 1px 1px;
      border-color: #6a6e51;
    }
  </style>
  @endpush