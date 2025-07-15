@extends('frontend.layout')

@section('content')
<main class="pt-90">
    @if(session()->has('message'))
				<div class="content-header mb-0 pb-0" id="cardAlert">
					<div class="container-fluid">
						<div class="mb-0 alert alert-{{ session()->get('alert-type') }} alert-dismissible fade show" role="alert">
							<strong>{{ session()->get('message') }}</strong>
							<button type="button" style="top: 15px;right: 10px;" class="close position-absolute btn" id="closeAlert" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</div><!-- /.container-fluid -->
				</div>
    @endif
    <div class="mb-md-1 pb-md-3"></div>
    <section class="product-single container">
      <div class="row">
        <div class="col-lg-7">
          <div class="product-single__media" data-media-type="vertical-thumbnail">
            <div class="product-single__image">
              <div class="swiper-container">
                <div class="swiper-wrapper">
				@forelse($product->productImages as $image)
                  <div class="swiper-slide product-single__image-item">
							<img loading="lazy" class="h-auto" src="{{ asset('storage/'.$image->path) }}" width="674"
							height="674" alt="" />
							<a data-fancybox="gallery" href="{{ asset('storage/'.$image->path) }}" data-bs-toggle="tooltip"
							data-bs-placement="left" title="Zoom">
							<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
								<use href="#icon_zoom" />
							</svg>
							</a>
						</div>
						@empty
								No image found!
						@endforelse
                </div>
                <div class="swiper-button-prev"><svg width="7" height="11" viewBox="0 0 7 11"
                    xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_prev_sm" />
                  </svg></div>
                <div class="swiper-button-next"><svg width="7" height="11" viewBox="0 0 7 11"
                    xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_next_sm" />
                  </svg></div>
              </div>
            </div>
            <div class="product-single__thumbnail">
              <div class="swiper-container">
                <div class="swiper-wrapper">
				@forelse($product->productImages as $image)

				<div class="swiper-slide product-single__image-item"><img loading="lazy" class="h-auto"
                      src="{{ asset('storage/'.$image->path) }}" width="104" height="104" alt="" /></div>
					@empty
							No image found!
					@endforelse
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="d-flex justify-content-between mb-4 pb-md-2">
            <div class="breadcrumb mb-0 d-none d-md-block flex-grow-1">
              <a href="/" class="menu-link menu-link_us-s text-uppercase fw-medium">Home</a>
              <span class="breadcrumb-separator menu-link fw-medium ps-1 pe-1">/</span>
              <span class="menu-link menu-link_us-s text-uppercase fw-medium">Detail Produk</span>
            </div><!-- /.breadcrumb -->
          </div>
          <h1 class="product-single__name">{{ $product->name }}</h1>
          <div class="product-single__rating">
            <div class="reviews-group d-flex">
               @if($product->reviews->count() > 0)
                    @for($i = 0; $i < $product->reviews->sum('rating') / $product->reviews->count(); $i++)
                        <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                          <use href="#icon_star" />
                        </svg>
                    @endfor
                @endif
            </div>
            @if($product->reviews->count() > 0)
            <span class="reviews-note text-lowercase text-secondary ms-1">{{ $product->reviews->count() }} reviews</span>
            @endif
          </div>
          <div class="product-single__price">
            <span class="current-price">Rp{{ number_format($product->priceLabel(),0, ",", ".") }}</span>
          </div>
          <div class="product-single__short-desc">
            <p>{{ $product->short_description }}</p>
          </div>
          <form action="{{ route('carts.store') }}" method="post">
							@csrf
							<input type="hidden" name="product_id" value="{{ $product->id }}">
							@if ($product->type == 'configurable')
								<div class="quick-view-select mb-5">
									<div class="select-option-part">
										<label>Size*</label>
                                        <select name="size" class="select form-control" id="" style="appearance: auto !important;">
                                            @foreach($sizes as $size)
                                                <option value="{{ $size }}">{{ $size }}</option>
                                            @endforeach
                                        </select>
									</div>
									<div class="select-option-part">
										<label>Color*</label>
										<select name="color" class="select form-control" id="" style="appearance: auto !important;">
                                            @foreach($colors as $color)
                                                <option value="{{ $color }}">{{ $color }}</option>
                                            @endforeach
                                        </select>
									</div>
								</div>
							@endif

              <div class="product-single__addtocart">
              <div class="qty-control position-relative">
                <input type="number" name="qty" value="1" min="1" class="qty-control__number text-center">
                <div class="qty-control__reduce">-</div>
                <div class="qty-control__increase">+</div>
              </div><!-- .qty-control -->
              <button type="submit" class="btn btn-primary btn-addtocart">Add to
                Cart</button>
            </div>
          </form>
          <div class="product-single__addtolinks">
            <a href="#" class="menu-link menu-link_us-s add-to-wishlist add-to-fav" title="Wishlist"  product-slug="{{ $product->slug }}"><svg width="16" height="16" viewBox="0 0 20 20"
                fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#icon_heart" />
              </svg><span>Add to Wishlist</span></a>
            <share-button class="share-button">
              <button class="menu-link menu-link_us-s to-share border-0 bg-transparent d-flex align-items-center">
                <svg width="16" height="19" viewBox="0 0 16 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <use href="#icon_sharing" />
                </svg>
                <span>Share</span>
              </button>
              <details id="Details-share-template__main" class="m-1 xl:m-1.5" hidden="">
                <summary class="btn-solid m-1 xl:m-1.5 pt-3.5 pb-3 px-5">+</summary>
                <div id="Article-share-template__main"
                  class="share-button__fallback flex items-center absolute top-full left-0 w-full px-2 py-4 bg-container shadow-theme border-t z-10">
                  <div class="field grow mr-4">
                    <label class="field__label sr-only" for="url">Link</label>
                    <input type="text" class="field__input w-full" id="url"
                      value="https://uomo-crystal.myshopify.com/blogs/news/go-to-wellness-tips-for-mental-health"
                      placeholder="Link" onclick="this.select();" readonly="">
                  </div>
                  <button class="share-button__copy no-js-hidden">
                    <svg class="icon icon-clipboard inline-block mr-1" width="11" height="13" fill="none"
                      xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" viewBox="0 0 11 13">
                      <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M2 1a1 1 0 011-1h7a1 1 0 011 1v9a1 1 0 01-1 1V1H2zM1 2a1 1 0 00-1 1v9a1 1 0 001 1h7a1 1 0 001-1V3a1 1 0 00-1-1H1zm0 10V3h7v9H1z"
                        fill="currentColor"></path>
                    </svg>
                    <span class="sr-only">Copy link</span>
                  </button>
                </div>
              </details>
            </share-button>
            <script src="js/details-disclosure.html" defer="defer"></script>
            <script src="js/share.html" defer="defer"></script>
          </div>
          <div class="product-single__meta-info">
            <div class="meta-item">
              <label>SKU:</label>
              <span>N/A</span>
            </div>
            <div class="meta-item">
              <label>Categories:</label>
			  @foreach ($product->categories as $category)
					<span><a href="{{ url('products?category='. $category->slug) }}">{{ $category->name }}</a></span>
				@endforeach
            </div>
          </div>
        </div>
      </div>
      <div class="product-single__details-tab">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <a class="nav-link nav-link_underscore active" id="tab-additional-info-tab" data-bs-toggle="tab"
              href="#tab-additional-info" role="tab" aria-controls="tab-additional-info"
              aria-selected="false">Informasi Tambahan</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link nav-link_underscore" id="tab-reviews-tab" data-bs-toggle="tab" href="#tab-reviews"
              role="tab" aria-controls="tab-reviews" aria-selected="false">Reviews ({{ $product->reviews->count() }})</a>
          </li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane fade show active" id="tab-additional-info" role="tabpanel" aria-labelledby="tab-additional-info-tab">
            <div class="product-single__addtional-info">
			{{ $product->description }}
            </div>
          </div>
          <div class="tab-pane fade" id="tab-reviews" role="tabpanel" aria-labelledby="tab-reviews-tab">
            <h2 class="product-single__reviews-title">Reviews</h2>
            <div class="product-single__reviews-list">
              @forelse($product->reviews as $review)
              <div class="product-single__reviews-item">
                <div class="customer-avatar">
                  <img src="https://ui-avatars.com/api/?name={{ $review->user->first_name . ' ' . $review->user->last_name }}&background=0d8abc&color=fff" alt="{{ $review->user->name }}">
                </div>
                <div class="customer-review" style="width: 100%;">
                  <div class="customer-name">
                    <h6>{{ $review->user->first_name . " " . $review->user->last_name }}</h6>
                    <div class="reviews-group d-flex">
                       @if($review->rating)
                            @for($i = 0; $i < $review->rating; $i++)
                                <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                                  <use href="#icon_star" />
                                </svg>
                            @endfor
                        @endif
                    </div>
                  </div>
                  <div class="review-date">{{ date_format($review->created_at, 'd M Y') }}</div>
                  <div class="review-text">
                    <p>{{ $review->content }}</p>
                  </div>
                </div>
              </div>
              @empty
              <div>
                Belum ada review
              </div>
              @endforelse
            </div>
            <div class="product-single__review-form">
              <form name="customer-review-form" method="post" action="{{ route('reviews.store') }}">
                @csrf
                  <input type="hidden" id="form-input-rating" name="product_id" value="{{ $product->id }}" />
                <h5 class="mb-3">Berikan review tentang jujur produk ini</h5>
                <div class="select-star-rating">
                  <label>rating *</label>
                  <span class="star-rating">
                    <select required class="form-control form-control_gray" style="appearance: auto !important;" name="rating" id="">
                    <option value="1">⭐</option>
                    <option value="2">⭐⭐</option>
                    <option value="3">⭐⭐⭐</option>
                    <option value="4">⭐⭐⭐⭐</option>
                    <option value="5">⭐⭐⭐⭐⭐</option>
                  </select>
                  </span>
                </div>
                <div class="mb-4">
                  <label>Review *</label>
                  <textarea required id="form-input-review" class="form-control form-control_gray" name="content" cols="30" rows="8"></textarea>
                </div>
                <div class="form-action">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="products-carousel container">
      <h2 class="h3 text-uppercase mb-4 pb-xl-2 mb-xl-4">Produk <strong>Yang Sama</strong></h2>

      <div id="related_products" class="position-relative">
        <div class="swiper-container js-swiper-slider" data-settings='{
            "autoplay": false,
            "slidesPerView": 4,
            "slidesPerGroup": 4,
            "effect": "none",
            "loop": true,
            "pagination": {
              "el": "#related_products .products-pagination",
              "type": "bullets",
              "clickable": true
            },
            "navigation": {
              "nextEl": "#related_products .products-carousel__next",
              "prevEl": "#related_products .products-carousel__prev"
            },
            "breakpoints": {
              "320": {
                "slidesPerView": 2,
                "slidesPerGroup": 2,
                "spaceBetween": 14
              },
              "768": {
                "slidesPerView": 3,
                "slidesPerGroup": 3,
                "spaceBetween": 24
              },
              "992": {
                "slidesPerView": 4,
                "slidesPerGroup": 4,
                "spaceBetween": 30
              }
            }
          }'>
          <div class="swiper-wrapper">
			@forelse($relateds as $related)
            <div class="swiper-slide product-card">
              <div class="pc__img-wrapper">
                <a href="{{ url('product/'. $related->slug) }}">
				@if($related->productImages->first())
					<img loading="lazy" src="{{ asset('storage/'.$related->productImages->first()->path) }}" width="330" height="400"
                    alt="Cropped Faux leather Jacket" class="pc__img">
				@endif
				@if ($related->productImages->last())
					<img loading="lazy" src="{{ asset('storage/'.$related->productImages->last()->path) }}" width="330" height="400"
                    alt="Cropped Faux leather Jacket" class="pc__img pc__img-second">
				@endif
        <a product-id="{{ $related->id }}" product-type="{{ $related->type }}" product-slug="{{ $related->slug }}" href="#" class="add-to-card pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart"
        data-aside="cartDrawer" title="Add To Cart">Add To Cart</a>
              </div>

              <div class="pc__info position-relative">
                <p class="pc__category">{{ $related->categories->first()->name }}</p>
                <h6 class="pc__title"><a href="{{ url('product/'. $related->slug) }}">{{ $related->name }}</a></h6>
                <div class="product-card__price d-flex">
                  <span class="money price">Rp{{ number_format($product->priceLabel(),0, ",", ".") }}</span>
                </div>
                <a class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist add-to-fav" title="Wishlist"  product-slug="{{ $product->slug }}" href="#">
                    <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_heart" />
                    </svg>
                  </a>
              </div>
            </div>
			@empty
        <div>
          Belum ada produk yang sama!
        </div>
      @endforelse
          </div><!-- /.swiper-wrapper -->
        </div><!-- /.swiper-container js-swiper-slider -->

        <div class="products-carousel__prev position-absolute top-50 d-flex align-items-center justify-content-center">
          <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
            <use href="#icon_prev_md" />
          </svg>
        </div><!-- /.products-carousel__prev -->
        <div class="products-carousel__next position-absolute top-50 d-flex align-items-center justify-content-center">
          <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
            <use href="#icon_next_md" />
          </svg>
        </div><!-- /.products-carousel__next -->

        <div class="products-pagination mt-4 mb-5 d-flex align-items-center justify-content-center"></div>
        <!-- /.products-pagination -->
      </div><!-- /.position-relative -->

    </section><!-- /.products-carousel container -->
  </main>
@endsection

@push('script-alt')
<script>
	 $("#closeAlert").on("click", function (e) {
      e.preventDefault();
      $("#cardAlert").hide();
    });
</script>
@endpush
