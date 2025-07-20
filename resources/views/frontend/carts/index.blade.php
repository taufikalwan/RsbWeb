@extends('frontend.layout')

@section('content')
<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="shop-checkout container">
      <h2 class="page-title">Keranjang Belanja</h2>
      <div class="shopping-cart">
        <div class="cart-table__wrapper">
          <table class="cart-table">
            <thead>
              <tr>
                <th>Produk</th>
                <th></th>
                <th>Harga</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>Action</th>
                <th></th>
              </tr>
            </thead>
			<tbody>
			</tbody>
            <tbody>
			@forelse ($items as $item)
					@php
						$product = isset($item->model->parent) ? $item->model->parent : $item->model;
						$image = !empty($product->productImages->first()) ? asset('storage/'.$product->productImages->first()->path) : asset('themes/ezone/assets/img/cart/3.jpg');
					@endphp
              <tr>
                <td>
                  <div class="shopping-cart__product-item">
                    <img loading="lazy" src="{{ $image }}" width="120" height="120" alt="{{ $product->name }}" />
                  </div>
                </td>
                <td>
                  <div class="shopping-cart__product-item__detail">
                    <h4>{{ $item->name }}</h4>
                  </div>
                </td>
                <td>
                  <span class="shopping-cart__product-price">Rp{{ number_format($item->price, 0, ",", ".") }}</span>
                </td>
                <td class="text-center">
                  <div class="qty-control position-relative">
				  <select
							style="padding: 5px;"
							id="change-qty"
							data-productId="{{ $item->rowId }}"
							value="{{ $item->qty }}"
						>
							@foreach(range(1, $item->model->ProductInventory->qty) as $qty)
								<option {{ $qty == $item->qty ? 'selected' : null }} value="{{ $qty }}">{{ $qty }}</option>
							@endforeach
						</select>
                  </div>
                </td>
                <td>
                  <span class="shopping-cart__subtotal">Rp{{ number_format($item->price * $item->qty, 0, ",", ".")}}</span>
                </td>
                <td class="text-center">
                  <a href="{{ url('carts/remove/'. $item->rowId)}}" class="remove-cart delete">
                    <svg width="10" height="10" viewBox="0 0 10 10" fill="#767676" xmlns="http://www.w3.org/2000/svg">
                      <path d="M0.259435 8.85506L9.11449 0L10 0.885506L1.14494 9.74056L0.259435 8.85506Z" />
                      <path d="M0.885506 0.0889838L9.74057 8.94404L8.85506 9.82955L0 0.97449L0.885506 0.0889838Z" />
                    </svg>
                  </a>
                </td>
              </tr>
			  @empty
				<tr>
					<td colspan="6">Keranjang Belanja Kosong</td>
				</tr>
			@endforelse
            </tbody>
          </table>
        </div>
        <div class="shopping-cart__totals-wrapper">
          <div class="sticky-content">
            <div class="shopping-cart__totals">
              <h3>Total Belanja</h3>
              <table class="cart-totals">
                <tbody>
                  <tr>
                    <th>Rp{{ Cart::subtotal(0, ",", ".") }}</th>
				  </tr>
                </tbody>
              </table>
            </div>
            <div class="mobile_fixed-btn_wrapper">
              <div class="button-wrapper container">
                <a href="{{ url('orders/checkout') }}" class="btn btn-primary btn-checkout">PROSES UNTUK CHECKOUT</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection

@push('script-alt')
<script>
	$(document).on("change", function (e) {
		var qty = e.target.value;
		var productId = e.target.attributes['data-productid'].value;

        $.ajax({
            type: "POST",
            url: "/carts/update",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
                productId,
                qty
            },
            success: function (response) {
				location.reload(true);
				Swal.fire({
                        title: "Jumlah Produk",
                        text: "Berhasil di ganti !",
                        icon: "success",
                        confirmButtonText: "Close",
                    });
            },
        });
    });
</script>
@endpush
