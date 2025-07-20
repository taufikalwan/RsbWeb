@extends('frontend.layout')

@section('content')
<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="shop-checkout container">
      <h2 class="page-title">Proses Transaksi</h2>
      <div class="checkout-steps">
        <span class="checkout-steps__item active">
          <span class="checkout-steps__item-number">01</span>
          <span class="checkout-steps__item-title">
		  <span>Pengiriman dan Checkout</span>
          </span>
        </span>
        <span class="checkout-steps__item">
          <span class="checkout-steps__item-number">02</span>
          <span class="checkout-steps__item-title">
            <span>Konfirmasi Pembayaran</span>
          </span>
        </span>
        <span class="checkout-steps__item">
          <span class="checkout-steps__item-number">03</span>
          <span class="checkout-steps__item-title">
            <span>Transaksi Sukses</span>
          </span>
        </span>
      </div>
      <form action="{{ route('orders.checkout') }}" method="post">
				@csrf
        <div class="checkout-form">
          <div class="billing-info__wrapper">
            <div class="row">
              <div class="col-6">
                <h4>SHIPPING DETAILS</h4>
              </div>
              <div class="col-6">
              </div>
            </div>

			<div class="row">
              <div class="col-md-6">
                <div class="form-floating my-3">
                  <input class="form-control" type="text" name="first_name" value="{{ old('first_name', auth()->user()->first_name) }}">
                  <label for="name">Nama Depan *</label>
                  <span class="text-danger"></span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating my-3">
                  <input class="form-control" type="text" name="last_name" value="{{ old('last_name', auth()->user()->last_name) }}">
                  <label for="name">Nama Belakang *</label>
                  <span class="text-danger"></span>
                </div>
              </div>
			  <div class="col-md-12">
                <div class="form-floating my-3">
                  <input class="form-control" type="text" name="email" value="{{ old('email', auth()->user()->email) }}">
                  <label for="landmark">Alamat Email *</label>
                  <span class="text-danger"></span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating my-3">
                  <input class="form-control" type="text" name="phone" value="{{ old('phone', auth()->user()->phone) }}">
                  <label for="phone">Nomer Telephone *</label>
                  <span class="text-danger"></span>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-floating my-3">
                  <input class="form-control" type="text" name="postcode" value="{{ old('postcode', auth()->user()->postcode) }}">
                  <label for="zip">Kode Pos *</label>
                  <span class="text-danger"></span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating my-3">
                  <input class="form-control" type="text" name="address1" value="{{ old('address1', auth()->user()->address1) }}">
                  <label for="address">Alamat Rumah</label>
                  <span class="text-danger"></span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating my-3">
                  <input class="form-control" type="text" name="address2" value="{{ old('address2', auth()->user()->address2) }}">
                  <label for="locality">Nomer Jalan</label>
                  <span class="text-danger"></span>
                </div>
              </div>
			  <div class="col-md-4">
                <div class="mt-3 mb-3">
                  <label for="state">Provinsi *</label>
				  <select class="form-control" name="province_id" style="appearance: auto !important;" id="shipping-province">
					<option value="">-- Pilih Provinsi --</option>
					@foreach($provinces as $id => $province)
						<option {{ auth()->user()->province_id == $id ? 'selected' : null }} value="{{ $id }}">{{ $province }}</option>
					@endforeach
				</select>
                  <span class="text-danger"></span>
                </div>
              </div>
              <div class="col-md-4">
                <div class="my-3">
                  <label for="city">Pilih Kota *</label>
				  <select class="form-control" style="appearance: auto !important;" name="shipping_city_id" id="shipping-city">
						<option value="">-- Pilih Kota --</option>
						@if($cities)
							@foreach($cities as $id => $city)
								<option value="{{ $id }}">{{ $city }}</option>
							@endforeach
						@endif
					</select>
                  <span class="text-danger"></span>
                </div>
              </div>
            </div>
			<div class="different-address">
				<div class="ship-different-title">
					<h3>
						<label>Kirim ke Alamat Berbeda?</label>
						<input id="ship-box" type="checkbox" name="ship_to"/>
					</h3>
				</div>
				<div style="display:none;" id="ship-box-info">
					<div class="row">
							<div class="col-md-6">
							<div class="form-floating my-3">
							<input class="form-control" type="text" name="customer_first_name" value="{{ old('customer_first_name') }}">
							<label for="name">Nama Depan *</label>
							<span class="text-danger"></span>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-floating my-3">
							<input class="form-control" type="text" name="customer_last_name" value="{{ old('customer_last_name') }}">
							<label for="name">Nama Belakang *</label>
							<span class="text-danger"></span>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-floating my-3">
							<input class="form-control" type="text" name="customer_email" value="{{ old('customer_email') }}">
							<label for="landmark">Alamat Email *</label>
							<span class="text-danger"></span>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-floating my-3">
							<input class="form-control" name="customer_phone" value="{{ old('customer_phone') }}">
							<label for="phone">Nomor HP *</label>
							<span class="text-danger"></span>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-floating my-3">
							<input class="form-control" name="customer_postcode" value="{{ old('postcode') }}">
							<label for="zip">Kode Pos *</label>
							<span class="text-danger"></span>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-floating my-3">
							<input class="form-control" type="text" name="customer_address1" value="{{ old('address1') }}">
							<label for="address">Alamat Rumah</label>
							<span class="text-danger"></span>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-floating my-3">
							<input class="form-control" name="customer_address2" value="{{ old('address2') }}">
							<label for="locality">Nomer Jalan</label>
							<span class="text-danger"></span>
							</div>
						</div>
						<div class="col-md-4">
							<div class="mt-3 mb-3">
							<label for="state">Provinsi *</label>
							<select class="form-control" style="appearance: auto !important;" name="customer_province_id" id="customer-shipping-province">
								<option value="">-- Pilih Provinsi --</option>
								@foreach($provinces as $id => $province)
									<option {{ auth()->user()->province_id == $id ? 'selected' : null }} value="{{ $id }}">{{ $province }}</option>
								@endforeach
							</select>
							<span class="text-danger"></span>
							</div>
						</div>
						<div class="col-md-4">
							<div class="my-3">
							<label for="city">Pilih Kota *</label>
							<select class="form-control" style="appearance: auto !important;" name="customer_shipping_city_id" id="customer_shipping_city">
									<option value="">-- Pilih Kota --</option>
									@if($cities)
										@foreach($cities as $id => $city)
											<option value="{{ $id }}">{{ $city }}</option>
										@endforeach
									@endif
								</select>
							<span class="text-danger"></span>
							</div>
						</div>
					</div>
	  			</div>
				<div class="order-notes">
					<div class="checkout-form-list mrg-nn">
						<label>Order Notes</label>
						<input class="form-control" type="text" name="note" value="{{ old('note') }}">
					</div>
				</div>
			</div>
          </div>
          <div class="checkout__totals-wrapper">
            <div class="sticky-content">
              <div class="checkout__totals">
                <h3>Your Order</h3>
                <table class="checkout-cart-items">
                  <thead>
                    <tr>
                      <th>PRODUCT</th>
                      <th align="right">SUBTOTAL</th>
                    </tr>
                  </thead>
                  <tbody>
				  @forelse ($items as $item)
					@php
						$product = isset($item->model->parent) ? $item->model->parent : $item->model;
						$image = !empty($product->productImages->first()) ? asset('storage/'.$product->productImages->first()->path) : asset('themes/ezone/assets/img/cart/3.jpg')
					@endphp
						<tr>
							<td>
								{{ $item->name }}	<strong class="product-quantity"> × {{ $item->qty }}</strong>
							</td>
							<td align="right">
								Rp{{ number_format($item->price * $item->qty,0, ",", ".") }}
							</td>
						</tr>
					@empty
						<tr>
							<td colspan="2">Keranjang Kosong! </td>
						</tr>
					@endforelse
                  </tbody>
                </table>
                <table class="checkout-totals">
                  <tbody>
                    <tr>
                      <th>SUBTOTAL</th>
                      <td align="right">Rp{{ Cart::subtotal(0, ",", ".") }}</td>
                    </tr>
					<tr class="cart-subtotal">
						<th>Biaya Pengiriman</th>
						<td><select class="form-control" style="appearance: auto !important;" id="shipping-cost-option" required name="shipping_service">
							<option value="">Pilih Kota Dulu</option>
						</select></td>
					</tr>
                    <tr>
                        <th>Kode Promo</th>
                        <td>
                            <div class="input-group">
                                <input type="text" name="promo_code" class="form-control" placeholder="Masukkan kode promo">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-outline-secondary" id="apply-coupon">Terapkan</button>
                                </div>
                            </div>
                            <small class="text-success d-none mt-1" id="coupon-success">Kode promo berhasil diterapkan!</small>
                            <small class="text-danger d-none mt-1" id="coupon-error">Kode promo tidak valid.</small>
                        </td>
                    </tr>
                    <tr>
                      <th>TOTAL</th>
                      <td align="right">Rp<strong class="total-amount">{{ Cart::subtotal(0, ",", ".") }}</strong></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <button class="btn btn-primary btn-checkout">PLACE ORDER</button>
            </div>
          </div>
        </div>
      </form>
    </section>
  </main>
<!-- batas -->
@endsection
@push('script-alt')
<script>
	 $("#ship-box").on("change", function (e) {
		$("#ship-box-info").toggle();
    });
</script>
@endpush
