<div class="gstore-breadcrumb position-relative z-1 overflow-hidden"
  data-background="{{ staticAsset('frontend/freshmeat/assets/images/shapes/hero-slider-bg-3-1.png') }}">
  <img src="{{ staticAsset('frontend/default/assets/img/shapes/bg-shape-6.png') }}" alt="bg-shape"
    class="position-absolute start-0 z--1 w-100 bg-shape">
  {{-- <div class="page-header__bg"
    data-background="{{ staticAsset('frontend/freshmeat/assets/images/shapes/hero-slider-bg-3-1-dark.png') }}"></div> --}}
  <div class="container">
    <div class="row">
      <div class="col-12">
        @yield('breadcrumb-contents')
      </div>
    </div>
  </div>
</div>
