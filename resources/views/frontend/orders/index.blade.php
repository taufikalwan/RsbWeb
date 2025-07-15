@extends('frontend.layout')

@section('content')
 <main class="pt-90" style="padding-top: 0px;">
    <div class="mb-4 pb-4"></div>
    <section class="my-account container">
        <h2 class="page-title">Orders</h2>
        <div class="row">
			@include('frontend.partials.user_menu', ['order' => 'menu-link_active'])
            <div class="col-lg-10">
                <div class="wg-table table-all-user">
                    <div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<th style="width: 80px">Order ID</th>
								<th>Grand Total</th>
								<th>Nomer Resi</th>
								<th>Status</th>
								<th>Payment</th>
								<th>Action</th>
							</thead>
							<tbody>
								@forelse($orders as $order)
									<tr>    
										<td>
											{{ $order->code }}<br>
											<span style="font-size: 12px; font-weight: normal"> {{ date('d M Y', strtotime($order->order_date)) }}</span>
										</td>
										<td>Rp{{ number_format($order->grand_total, 0, ",", ".") }}</td>
										<td>{{ $order->shipment->track_number }}</td>
										<td>
											{{ $order->status }}
										</td>
										<td>
											<span class="badge" @if($order->payment_status === 'paid') style="background-color: #99e77d;" @else style="background-color:rgb(231, 125, 125);" @endif>{{ $order->payment_status }}</span>
										</td>
										<td>
											<a href="{{ url('orders/'. $order->id) }}" class="btn btn-info btn-sm">details</a>
										</td>
									</tr>
								@empty
									<tr>
										<td colspan="5">Order Kosong!</td>
									</tr>
								@endforelse
							</tbody>
						</table>             
                    </div>
                </div>
                <div class="divider"></div>
                <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">                
                    
                </div>
            </div>
            
        </div>
    </section>
</main>
@endsection