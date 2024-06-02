{{-- <section class="meat-list">
  <div class="container-fluid">
    <div class="meat-list__carousel boskery-owl__carousel boskery-owl__carousel--basic-nav owl-carousel owl-theme"
      data-owl-options='{
                        "items": 1,
                        "margin": 0,
                        "loop": true,
                        "autoplay": true,
                        "smartSpeed": 700,
                        "nav": false,
                        "navText": ["<span class=\"icon-arrow-left\"></span>","<span class=\"icon-arrow-right\"></span>"],
                        "dots": true,
                        "responsive": {
                            "0": {
                                "items": 1,
                                "nav": true,
                                "dots": false,
                                "margin": 10
                            },
                            "361": {
                                "items": 2,
                                "nav": true,
                                "dots": false,
                                "margin": 40
                            },
                            "576": {
                                "items": 3,
                                "margin": 40
                            },
                            "768": {
                                "items": 4,
                                "margin": 40
                            },
                            "992": {
                                "items": 5,
                                "margin": 40
                            },
                            "1200": {
                                "items": 6,
                                "margin": 40
                            },
                            "1400": {
                                "items": 8,
                                "loop": false,
                                "autoplay": false,
                                "dots": false,
                                "margin": 40
                            },
                            "1600": {
                                "items": 8,
                                "loop": false,
                                "autoplay": false,
                                "margin": 65
                            }
                        }
                    }'>
      <div class="meat-list__item item wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
        <div class="meat-list__icon">
          <span class="icon-bull"></span>
        </div><!-- /.meat-list__icon -->
        <h6 class="meat-list__title">Beaf meat</h6><!-- /.meat-list__title -->
      </div><!-- /.meat-list__item item -->
      <div class="meat-list__item item wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="200ms">
        <div class="meat-list__icon">
          <span class="icon-turkey"></span>
        </div><!-- /.meat-list__icon -->
        <h6 class="meat-list__title">turkey</h6><!-- /.meat-list__title -->
      </div><!-- /.meat-list__item item -->
      <div class="meat-list__item item wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="400ms">
        <div class="meat-list__icon">
          <span class="icon-chicken-1"></span>
        </div><!-- /.meat-list__icon -->
        <h6 class="meat-list__title">chicken</h6><!-- /.meat-list__title -->
      </div><!-- /.meat-list__item item -->
      <div class="meat-list__item item wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="600ms">
        <div class="meat-list__icon">
          <span class="icon-sheep-front"></span>
        </div><!-- /.meat-list__icon -->
        <h6 class="meat-list__title">Lamb</h6><!-- /.meat-list__title -->
      </div><!-- /.meat-list__item item -->
      <div class="meat-list__item item wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="800ms">
        <div class="meat-list__icon">
          <span class="icon-goat"></span>
        </div><!-- /.meat-list__icon -->
        <h6 class="meat-list__title">Goat</h6><!-- /.meat-list__title -->
      </div><!-- /.meat-list__item item -->
      <div class="meat-list__item item wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="1000ms">
        <div class="meat-list__icon">
          <span class="icon-duck"></span>
        </div><!-- /.meat-list__icon -->
        <h6 class="meat-list__title">duck</h6><!-- /.meat-list__title -->
      </div><!-- /.meat-list__item item -->
      <div class="meat-list__item item wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="1200ms">
        <div class="meat-list__icon">
          <span class="icon-reindeer"></span>
        </div><!-- /.meat-list__icon -->
        <h6 class="meat-list__title">dear</h6><!-- /.meat-list__title -->
      </div><!-- /.meat-list__item item -->
      <div class="meat-list__item item wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="1400ms">
        <div class="meat-list__icon">
          <span class="icon-rabbit"></span>
        </div><!-- /.meat-list__icon -->
        <h6 class="meat-list__title">Rabbit</h6><!-- /.meat-list__title -->
      </div><!-- /.meat-list__item item -->
    </div><!-- /.meat-list__carousel -->
  </div><!-- /.container-fluid -->
</section><!-- /.meat-list --> --}}

<section class="gshop-category-section bg-white pt-120 position-relative z-1 overflow-hidden">
  <img src="{{ staticAsset('frontend/default/assets/img/shapes/bg-shape.png') }}" alt="bg shape"
    class="position-absolute bottom-0 start-0 w-100 z--1">
  <div class="container">
    <div class="gshop-category-box border-secondary rounded-3 bg-white">
      <div class="text-center section-title">
        <h4 class="d-inline-block px-2 bg-white mb-4">{{ localize('Our Top Categories') }}</h4>
      </div>
      <div class="row justify-content-center g-4">
        @php
          $top_category_ids = getSetting('top_category_ids') != null ? json_decode(getSetting('top_category_ids')) : [];
          $categories = \App\Models\Category::whereIn('id', $top_category_ids)->get();
        @endphp

        @foreach ($categories as $category)
          @php
            $productsCount = \App\Models\ProductCategory::where('category_id', $category->id)->count();
          @endphp
          <div class="col-xxl-2 col-lg-2 col-md-3 col-sm-4">
            <div
              class="gshop-animated-iconbox py-5 px-4 text-center border rounded-3 position-relative overflow-hidden {{ $loop->even ? 'color-2' : '' }}">
              <div
                class="animated-icon d-inline-flex align-items-center justify-content-center rounded-circle position-relative">
                <img src="{{ uploadedAsset($category->collectLocalization('thumbnail_image')) }}" alt=""
                  class="img-fluid">
              </div>

              <a href="{{ route('products.index') }}?&category_id={{ $category->id }}"
                class="text-dark fs-sm fw-bold d-block mt-3">{{ $category->collectLocalization('name') }}</a>
              <span class="total-count position-relative ps-3 fs-sm fw-medium doted-primary">{{ $productsCount }}
                {{ localize('Items') }}</span>

              <a href="{{ route('products.index') }}?&category_id={{ $category->id }}"
                class="explore-btn position-absolute"><i class="fa-solid fa-arrow-up"></i></a>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>
