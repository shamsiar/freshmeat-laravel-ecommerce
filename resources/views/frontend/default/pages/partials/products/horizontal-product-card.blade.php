<div class="horizontal-product-card product__item wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='00ms'>
  <div class="thumbnail position-relative rounded-2 w-100">
    <div class="product__item__image">
      <a href="javascript:void(0);"><img src="{{ uploadedAsset($product->thumbnail_image) }}" alt="product"
          class="img-fluid"></a>
    </div>
    <div
      class="product-overlay position-absolute start-0 top-0 w-100 h-100 d-flex align-items-center justify-content-center gap-1 rounded-2">
      @if (isLoggedIn() && isCustomer())
        <a href="javascript:void(0);" class="rounded-btn fs-xs" onclick="addToWishlist({{ $product->id }})"><i
            class="fa-regular fa-heart"></i></a>
      @elseif(!isLoggedIn())
        <a href="javascript:void(0);" class="rounded-btn fs-xs" onclick="addToWishlist({{ $product->id }})"><i
            class="fa-regular fa-heart"></i></a>
      @endif

      <a href="javascript:void(0);" class="rounded-btn fs-xs" onclick="showProductDetailsModal({{ $product->id }})"><i
          class="fa-solid fa-eye"></i></a>

    </div>
  </div>
  <div class="product__item__content">
    <div class="boskery-ratings">
      <span class="icon-star"></span>
      <span class="icon-star"></span>
      <span class="icon-star"></span>
      <span class="icon-star"></span>
      <span class="icon-star"></span>
    </div><!-- /.product-ratings -->
    <h4 class="product__item__title">
      <a href="{{ route('products.show', $product->slug) }}"
        class="fw-bold text-heading title tt-line-clamp tt-clamp-1">
        {{ $product->collectLocalization('name') }}
      </a>
    </h4>
    <div class="product__item__price">
      @include('frontend.default.pages.partials.products.pricing', [
          'product' => $product,
          'onlyPrice' => true,
      ])
    </div>

    @php
      $isVariantProduct = 0;
      $stock = 0;
      if ($product->variations()->count() > 1) {
          $isVariantProduct = 1;
      } else {
          $stock = $product->variations[0]->product_variation_stock
              ? $product->variations[0]->product_variation_stock->stock_qty
              : 0;
      }
    @endphp

    @if ($isVariantProduct)
      <div class="d-flex justify-content-between align-items-center mt-10">
        <span class="flex-grow-1">
          <a href="javascript:void(0);" class="fs-xs fw-bold d-inline-block boskery-btn product__item__link"
            onclick="showProductDetailsModal({{ $product->id }})">
            <span class="boskery-btn__hover"></span>
            <span class="boskery-btn__hover"></span>
            <span class="boskery-btn__hover"></span>
            <span class="boskery-btn__hover"></span>
            <span class="boskery-btn__hover"></span>
            <span class="boskery-btn__hover"></span>
            <span class="add-to-cart-text">{{ localize('Add to Cart') }}</span>
            <span class="ms-1"><i class="icon-meat-3"></i></span>
        </span>

        @if (getSetting('enable_reward_points') == 1)
          <span class="fs-xxs fw-bold" data-bs-toggle="tooltip" data-bs-placement="top"
            data-bs-title="{{ localize('Reward Points') }}">
            <i class="fas fa-medal"></i> {{ $product->reward_points }}
          </span>
        @endif
      </div>
    @else
      <form action="" class="direct-add-to-cart-form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="product_variation_id" value="{{ $product->variations[0]->id }}">
        <input type="hidden" value="1" name="quantity">

        <div class="d-flex justify-content-between align-items-center mt-10">
          <span class="flex-grow-1">
            @if (!$isVariantProduct && $stock < 1)
              <a href="javascript:void(0);" class="fs-xs fw-bold d-inline-block explore-btn">
                {{ localize('Out of Stock') }}
                <span class="ms-1"><i class="fa-solid fa-arrow-right"></i></span>
              </a>
            @else
              <a href="javascript:void(0);" onclick="directAddToCartFormSubmit(this)"
                class="fs-xs fw-bold d-inline-block boskery-btn product__item__link  direct-add-to-cart-btn add-to-cart-text">
                <span class="boskery-btn__hover"></span>
                <span class="boskery-btn__hover"></span>
                <span class="boskery-btn__hover"></span>
                <span class="boskery-btn__hover"></span>
                <span class="boskery-btn__hover"></span>
                <span class="boskery-btn__hover"></span>
                <span class="add-to-cart-text">{{ localize('Add to Cart') }}</span>
                <span class="ms-1"><i class="icon-meat-3"></i></span>
              </a>
            @endif
          </span>

          @if (getSetting('enable_reward_points') == 1)
            <span class="fs-xxs fw-bold" data-bs-toggle="tooltip" data-bs-placement="top"
              data-bs-title="{{ localize('Reward Points') }}">
              <i class="fas fa-medal"></i> {{ $product->reward_points }}
            </span>
          @endif
        </div>
      </form>
    @endif

  </div>
</div>
