@extends('frontend.layout')

@section('content')
<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="shop-checkout container">
      <h2 class="page-title">Wishlist</h2>
      <div class="shopping-cart">
        <div class="cart-table__wrapper">
          <table class="cart-table">
            <thead>
              <tr class="text-center">
                <th>Product</th>
                <th></th>
                <th>Price</th>
                <th>Cart</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
			@forelse ($wishlists as $wishlist)
										@php
											$product = $wishlist->product;
											$product = isset($product->parent) ?: $product;
											$image = !empty($product->productImages->first()) ? asset('storage/'.$product->productImages->first()->path) : asset('themes/ezone/assets/img/cart/3.jpg')
										@endphp
										<tr class="text-center">
											<td>
											<div class="shopping-cart__product-item">
												<img loading="lazy" src="{{ $image }}" width="120" height="120" alt="" />
											</div>
											</td>
											<td>
											<div class="shopping-cart__product-item__detail">
												<h4>{{ $product->name }}</h4>
											</div>
											</td>
											<td>
											<span class="shopping-cart__product-price">{{ number_format($product->priceLabel(), 0, ",", ".") }}</span>
											</td>
											<td>
												<a product-id="{{ $product->id }}" product-type="{{ $product->type }}" product-slug="{{ $product->slug }}" href="#" class="add-to-card btn btn-success text-uppercase fw-medium"
												data-aside="cartDrawer" title="Add To Cart">Add to Cart</a>
											</td>
											<td>
											<form action="{{ route('wishlists.destroy', $wishlist->id) }}" method="post" class="delete d-inline-block">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger text-white"><svg width="10" height="10" viewBox="0 0 10 10" fill="#767676" xmlns="http://www.w3.org/2000/svg">
												<path d="M0.259435 8.85506L9.11449 0L10 0.885506L1.14494 9.74056L0.259435 8.85506Z" />
												<path d="M0.885506 0.0889838L9.74057 8.94404L8.85506 9.82955L0 0.97449L0.885506 0.0889838Z" />
												</svg></button>
                                            </form>
											</td>
										</tr>
									@empty
										<tr>
											<td colspan="4">Wishlist Kosong!</td>
										</tr>
									@endforelse
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </main>
@endsection
