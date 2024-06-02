<section class="product-one section-space-two" id="shop">
  <div class="container">
    <div class="sec-title sec-title--center">

      <img src="{{ staticAsset('frontend/freshmeat/assets/images/shapes/section-logo.png') }}" alt="featured products"
        class="sec-title__img">
      <h6 class="sec-title__tagline">Fresh Meat</h6>
      <h2 class="sec-title__title">{{ localize('Deals & Bundles') }}</h2><!-- /.sec-title__title -->
    </div><!-- /.sec-title -->
    @php
      $weekly_best_deals = getSetting('weekly_best_deals') != null ? json_decode(getSetting('weekly_best_deals')) : [];
      $products = \App\Models\Product::whereIn('id', $weekly_best_deals)->get();
    @endphp
    <div class="row gutter-y-30">
      @foreach ($products as $product)
        <div class="col-xl-3 col-lg-4 col-sm-6">
          @include('frontend.default.pages.partials.products.horizontal-product-card', [
              'product' => $product,
          ])
          {{-- <div class="product__item wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='00ms'>
            <div class="product__item__image">
              <img src="assets/images/products/product-1-7.png" alt="Game birds">
            </div><!-- /.product-image -->
            <div class="product__item__content">
              <div class="boskery-ratings">
                <span class="icon-star"></span>
                <span class="icon-star"></span>
                <span class="icon-star"></span>
                <span class="icon-star"></span>
                <span class="icon-star"></span>
              </div><!-- /.product-ratings -->
              <h4 class="product__item__title"><a href="shop-details.html">Game birds</a></h4><!-- /.product-title -->
              <div class="product__item__price">$82.00</div><!-- /.product-price -->
              <a href="cart.html" class="boskery-btn product__item__link">
                <span class="boskery-btn__hover"></span>
                <span class="boskery-btn__hover"></span>
                <span class="boskery-btn__hover"></span>
                <span class="boskery-btn__hover"></span>
                <span class="boskery-btn__hover"></span>
                <span class="boskery-btn__hover"></span>
                <span class="boskery-btn__text">Add to Cart</span>
                <i class="icon-meat-3"></i>
              </a>
            </div><!-- /.product-content -->
          </div><!-- /.product-item --> --}}
        </div><!-- /.col-md-6 col-lg-4 -->
      @endforeach
    </div><!-- /.row -->
  </div><!-- /.container -->

  <div class="product-one__shape">
    <img src="{{ staticAsset('frontend/freshmeat/assets/images/shapes/product-shape-1-1.png') }}" alt="product shape"
      class="product-one__shape__image">
  </div><!-- /.product-one__shape -->
</section><!-- /.product-one section-space-two -->
