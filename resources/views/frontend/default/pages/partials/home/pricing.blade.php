<section class="pricing-one pricing-one--home section-space-two" id="pricing">
  <div class="container">
    <div class="sec-title sec-title--center">

      <img src="{{ staticAsset('frontend/freshmeat/assets/images/shapes/section-logo.png') }}" alt="meat assortment"
        class="sec-title__img">
      <h6 class="sec-title__tagline">{{ localize('Fresh Meat') }}</h6><!-- /.sec-title__tagline -->
      <h2 class="sec-title__title">{{ localize('Products price') }}</h2><!-- /.sec-title__title -->
    </div><!-- /.sec-title -->

    @php
      $categories = \App\Models\Category::get();
    @endphp

    <div class="pricing-one__main-tab-box tabs-box wow fadeInUp" data-wow-duration="1500ms">
      <div
        class="d-flex justify-content-between filter-btns gshop-filter-btn-group text-center text-xl-end mt-4 mt-xl-0">
        <button class="active" data-filter="*">{{ localize('All Products') }}</button>
        @foreach ($categories as $category)
          @php
            $productsCount = \App\Models\ProductCategory::where('category_id', $category->id)->count();
          @endphp

          <button data-filter=".{{ $category->id }}" class="d-flex flex-column align-items-center">
            <img src="{{ uploadedAsset($category->collectLocalization('thumbnail_image')) }}" class="img-fluid"
              style="width: 75px;">
            {{ $category->collectLocalization('name') . ' (' . $productsCount . ')' }}
          </button>
        @endforeach
      </div>

      <div class="filter_group mt-5 d-flex flex-column">
        @php
          // $trending_products = getSetting('top_trending_products') != null ? json_decode(getSetting('top_trending_products')) : [];
          $products = \App\Models\Product::get();
        @endphp

        @foreach ($products as $product)
          <div
            class="col-md-6  @php
if($product->categories()->count() > 0){ 
                foreach ($product->categories as $category) {
                    echo $category->id .' ';
                }
            } @endphp ">
            <div class="pricing-card pricing-card--two">
              <div class="pricing-card__left">
                <div class="pricing-card__image">
                  <img src="{{ uploadedAsset($product->thumbnail_image) }}" alt="Rabbit" style="width: 75px;">
                </div><!-- /.pricing-card__image -->
                <div class="pricing-card__name">
                  <h4 class="pricing-card__title">
                    <a href="{{ route('products.show', $product->slug) }}"
                      class="card-title fw-bold mb-2 tt-line-clamp tt-clamp-1">{{ $product->collectLocalization('name') }}
                    </a>
                  </h4><!-- /.pricing-card__title -->
                  <span
                    class="pricing-card__package">{{ $product->collectLocalization('short_description') }}</span><!-- /.pricing-card__package -->
                </div><!-- /.pricing-card__name -->
              </div><!-- /.pricing-card__left -->
              <div class="pricing-card__right  d-inline">
                <div class="product__item__price">
                  @include('frontend.default.pages.partials.products.pricing', [
                      'product' => $product,
                      'onlyPrice' => true,
                  ])
                </div>
              </div><!-- /.pricing-card__right -->
            </div><!-- /.pricing-card -->
            {{-- @include('frontend.default.pages.partials.products.trending-product-card', [
                'product' => $product,
            ]) --}}
          </div>
        @endforeach
      </div>
    </div><!-- /.pricing-one__main-tab-box -->
  </div><!-- /.container -->
  <div class="pricing-one__shape">
    <img src="{{ staticAsset('frontend/freshmeat/assets/images/shapes/pricing-shape-1-1.png') }}" alt="pricing-shape"
      class="pricing-one__shape__one">
    <img src="{{ staticAsset('frontend/freshmeat/assets/images/shapes/pricing-shape-1-2.png') }}" alt="pricing-shape"
      class="pricing-one__shape__two">
  </div><!-- /.pricing-one__shape -->
</section><!-- /.pricing-one section-space-two -->
