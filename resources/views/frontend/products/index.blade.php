@extends('frontend.layout')

@section('content')
<main class="pt-90">
    <section class="shop-main container d-flex pt-4 pt-xl-5">
      <div class="shop-sidebar side-sticky bg-body" id="shopFilter">
        <div class="aside-header d-flex d-lg-none align-items-center">
          <h3 class="text-uppercase fs-6 mb-0">Filter By</h3>
          <button class="btn-close-lg js-close-aside btn-close-aside ms-auto"></button>
        </div>

        <div class="pt-4 pt-lg-0"></div>

        <div class="accordion" id="categories-list">
          <div class="accordion-item mb-4 pb-3">
            <h5 class="accordion-header" id="accordion-heading-1">
              <button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button" data-bs-toggle="collapse"
                data-bs-target="#accordion-filter-1" aria-expanded="true" aria-controls="accordion-filter-1">
                Kategori Produk
                <svg class="accordion-button__icon type2" viewBox="0 0 10 6" xmlns="http://www.w3.org/2000/svg">
                  <g aria-hidden="true" stroke="none" fill-rule="evenodd">
                    <path
                      d="M5.35668 0.159286C5.16235 -0.053094 4.83769 -0.0530941 4.64287 0.159286L0.147611 5.05963C-0.0492049 5.27473 -0.049205 5.62357 0.147611 5.83813C0.344427 6.05323 0.664108 6.05323 0.860924 5.83813L5 1.32706L9.13858 5.83867C9.33589 6.05378 9.65507 6.05378 9.85239 5.83867C10.0492 5.62357 10.0492 5.27473 9.85239 5.06018L5.35668 0.159286Z" />
                  </g>
                </svg>
              </button>
            </h5>
            <div id="accordion-filter-1" class="accordion-collapse collapse show border-0"
              aria-labelledby="accordion-heading-1" data-bs-parent="#categories-list">
              <div class="accordion-body px-0 pb-0 pt-3">
                <ul class="list list-inline mb-0">
                @foreach($categories as $category)
                  <li class="list-item">
                    <a href="{{ url('produk?category='. $category->slug) }}" class="menu-link py-1">{{ $category->name }}</a>
                  </li>
                @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>
        @if ($colors)
            <div class="accordion" id="color-filters">
                <div class="accordion-item mb-4 pb-3">
                    <h5 class="accordion-header" id="accordion-heading-1">
                    <button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button" data-bs-toggle="collapse"
                        data-bs-target="#accordion-filter-2" aria-expanded="true" aria-controls="accordion-filter-2">
                        Color
                        <svg class="accordion-button__icon type2" viewBox="0 0 10 6" xmlns="http://www.w3.org/2000/svg">
                        <g aria-hidden="true" stroke="none" fill-rule="evenodd">
                            <path
                            d="M5.35668 0.159286C5.16235 -0.053094 4.83769 -0.0530941 4.64287 0.159286L0.147611 5.05963C-0.0492049 5.27473 -0.049205 5.62357 0.147611 5.83813C0.344427 6.05323 0.664108 6.05323 0.860924 5.83813L5 1.32706L9.13858 5.83867C9.33589 6.05378 9.65507 6.05378 9.85239 5.83867C10.0492 5.62357 10.0492 5.27473 9.85239 5.06018L5.35668 0.159286Z" />
                        </g>
                        </svg>
                    </button>
                    </h5>
                      <div id="accordion-filter-size" class="accordion-collapse collapse show border-0"
              aria-labelledby="accordion-heading-size" data-bs-parent="#size-filters">
              <div class="accordion-body px-0 pb-0">
                <div class="d-flex flex-wrap">
                        @foreach ($colors as $color)
                            <a href="{{ url('produk?option='. $color->id) }}" class="swatch-size btn btn-sm btn-outline-light mb-3 me-3">{{ $color->name }}</a>
                        @endforeach
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        @endif

        @if ($sizes)
        <div class="accordion" id="size-filters">
          <div class="accordion-item mb-4 pb-3">
            <h5 class="accordion-header" id="accordion-heading-size">
              <button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button" data-bs-toggle="collapse"
                data-bs-target="#accordion-filter-size" aria-expanded="true" aria-controls="accordion-filter-size">
                Sizes
                <svg class="accordion-button__icon type2" viewBox="0 0 10 6" xmlns="http://www.w3.org/2000/svg">
                  <g aria-hidden="true" stroke="none" fill-rule="evenodd">
                    <path
                      d="M5.35668 0.159286C5.16235 -0.053094 4.83769 -0.0530941 4.64287 0.159286L0.147611 5.05963C-0.0492049 5.27473 -0.049205 5.62357 0.147611 5.83813C0.344427 6.05323 0.664108 6.05323 0.860924 5.83813L5 1.32706L9.13858 5.83867C9.33589 6.05378 9.65507 6.05378 9.85239 5.83867C10.0492 5.62357 10.0492 5.27473 9.85239 5.06018L5.35668 0.159286Z" />
                  </g>
                </svg>
              </button>
            </h5>
            <div id="accordion-filter-size" class="accordion-collapse collapse show border-0"
              aria-labelledby="accordion-heading-size" data-bs-parent="#size-filters">
              <div class="accordion-body px-0 pb-0">
                <div class="d-flex flex-wrap">
                    @foreach ($sizes as $size)
                      <a href="{{ url('produk?option='. $size->id) }}" class="swatch-size btn btn-sm btn-outline-light mb-3 me-3">{{ $size->name }}</a></li>
                    @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
        @endif

      </div>

      <div class="shop-list flex-grow-1">

        <div class="d-flex justify-content-between mb-4 pb-md-2">
          <div class="breadcrumb mb-0 d-none d-md-block flex-grow-1">
            <a href="/" class="menu-link menu-link_us-s text-uppercase fw-medium">Home</a>
            <span class="breadcrumb-separator menu-link fw-medium ps-1 pe-1">/</span>
            <a href="#" class="menu-link menu-link_us-s text-uppercase fw-medium">Semua Produk</a>
          </div>

          <div class="shop-acs d-flex align-items-center justify-content-between justify-content-md-end flex-grow-1">
                  <select  class="shop-acs__select form-select w-auto border-0 py-0 order-1 order-md-0" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value)" name="sort" id="">
                      @foreach($sorts as $url => $sort)
                          <option {{ $selectedSort == $url ? 'selected' : null }} value="{{ $url }}">{{ $sort }}</option>
                      @endforeach
                  </select>

            <div class="shop-asc__seprator mx-3 bg-light d-none d-md-block order-md-0"></div>

            <div class="col-size align-items-center order-1 d-none d-lg-flex">
              <span class="text-uppercase fw-medium me-2">View</span>
              <button class="btn-link fw-medium me-2 js-cols-size" data-target="products-grid" data-cols="2">2</button>
              <button class="btn-link fw-medium me-2 js-cols-size" data-target="products-grid" data-cols="3">3</button>
              <button class="btn-link fw-medium js-cols-size" data-target="products-grid" data-cols="4">4</button>
            </div>

            <div class="shop-filter d-flex align-items-center order-0 order-md-3 d-lg-none">
              <button class="btn-link btn-link_f d-flex align-items-center ps-0 js-open-aside" data-aside="shopFilter">
                <svg class="d-inline-block align-middle me-2" width="14" height="10" viewBox="0 0 14 10" fill="none"
                  xmlns="http://www.w3.org/2000/svg">
                  <use href="#icon_filter" />
                </svg>
                <span class="text-uppercase fw-medium d-inline-block align-middle">Filter</span>
              </button>
            </div>
          </div>
        </div>

        <div class="products-grid row row-cols-2 row-cols-md-3" id="products-grid">
        @foreach($products as $product)
          <div class="product-card-wrapper">
            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
              <div class="pc__img-wrapper">
                <div class="swiper-container background-img js-swiper-slider" data-settings='{"resizeObserver": true}'>
                  <div class="swiper-wrapper">
                  @forelse($product->productImages as $image)
                        <div class="swiper-slide">
                        <a href="{{ url('product/'. $product->slug) }}"><img loading="lazy" src="{{ asset('storage/'.$image->path) }}" width="330"
                            height="400" alt="Cropped Faux leather Jacket" class="pc__img"></a>
                        </div>
                    @endforeach
                  </div>
                  <span class="pc__img-prev"><svg width="7" height="11" viewBox="0 0 7 11"
                      xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_prev_sm" />
                    </svg></span>
                  <span class="pc__img-next"><svg width="7" height="11" viewBox="0 0 7 11"
                      xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_next_sm" />
                    </svg></span>
                </div>
                <a product-id="{{ $product->id }}" product-type="{{ $product->type }}" product-slug="{{ $product->slug }}" href="#" class="add-to-card pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium"
                data-aside="cartDrawer" title="Add To Cart">Add To Cart</a>
              </div>

              <div class="pc__info position-relative">
                <p class="pc__category">{{ $product->categories->first()->name }}</p>
                <h6 class="pc__title"><a href="{{ url('product/'. $product->slug) }}">{{ $product->name }}</a></h6>
                <div class="product-card__price d-flex">
                  <span class="money price">Rp{{ number_format($product->priceLabel(),0, ",", ".") }}</span>
                </div>
                <div class="product-card__review d-flex align-items-center">
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

                <a class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist add-to-fav" title="Wishlist"  product-slug="{{ $product->slug }}" href="#">
                    <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_heart" />
                    </svg>
                  </a>
              </div>
            </div>
          </div>
        @endforeach
        </div>

        <nav class="shop-pages d-flex justify-content-center mt-3" aria-label="Page navigation">
          {{ $products->links() }}
        </nav>
      </div>
    </section>
  </main>
@endsection
