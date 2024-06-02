<section class="hero-slider-one hero-main-slider" id="home">
  <div class="hero-slider-one__carousel boskery-owl__carousel--with-counter owl-carousel"
    data-owl-options='{
        		"loop": true,
        		"animateIn": "fadeIn",
        		"animateOut": "slideOutDown",
        		"items": 1,
        		"autoplay": true,
        		"autoplayTimeout": 7000,
        		"smartSpeed": 1000,
        		"nav": false,
                "navText": ["<span class=\"icon-left-arrow\"></span>","<span class=\"icon-right-arrow\"></span>"],
        		"dots": true,
        		"margin": 0
        	    }'>
    @foreach ($sliders as $slider)
      <div class="item">
        <div class="hero-slider-one__item">
          <div class="hero-slider-one__bg">
            <img src="{{ uploadedAsset($slider->image) }}" alt="" class="img-fluid hero-img h-100">
          </div>

          <div class="container">
            <div class="row">
              <div class="col-xxl-12 col-xl-10 col-lg-10">
                <div class="hero-slider-one__content">
                  <h5 class="hero-slider-one__sub-title">{{ $slider->sub_title }}</h5><!-- /.slider-sub-title -->
                  <h2 class="hero-slider-one__title">
                    {{ $slider->title }}
                    <span class="hero-slider-one__title__overlay-group">
                      <span class="hero-slider-one__title__overlay"></span>
                      <span class="hero-slider-one__title__overlay"></span>
                      <span class="hero-slider-one__title__overlay"></span>
                      <span class="hero-slider-one__title__overlay"></span>
                      <span class="hero-slider-one__title__overlay"></span>
                      <span class="hero-slider-one__title__overlay"></span>
                    </span>
                  </h2><!-- /.slider-title -->
                  <p class="mb-5 fs-6">{{ $slider->text }}</p>
                  <div class="hero-slider-one__btn">
                    <a href="{{ $slider->link }}" class="boskery-btn">
                      <span class="boskery-btn__hover"></span>
                      <span class="boskery-btn__hover"></span>
                      <span class="boskery-btn__hover"></span>
                      <span class="boskery-btn__hover"></span>
                      <span class="boskery-btn__hover"></span>
                      <span class="boskery-btn__hover"></span>
                      <span class="boskery-btn__text">{{ localize('Explore Now') }}</span>
                      <i class="icon-meat-3"></i>
                    </a><!-- slider-btn -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.slider-item -->
    @endforeach
  </div>
  @if (getSetting('facebook_link') ||
          getSetting('twitter_link') ||
          getSetting('linkedin_link') ||
          getSetting('youtube_link'))
    <div class="gs-hero-social">
      <ul class="list-unstyled">
        @if (getSetting('facebook_link'))
          <li><a href="{{ getSetting('facebook_link') }}"><i class="fab fa-facebook-f"></i></a></li>
        @endif
        @if (getSetting('twitter_link'))
          <li><a href="{{ getSetting('twitter_link') }}"><i class="fab fa-twitter"></i></a></li>
        @endif
        @if (getSetting('linkedin_link'))
          <li><a href="{{ getSetting('linkedin_link') }}"><i class="fab fa-linkedin-in"></i></a></li>
        @endif
        @if (getSetting('youtube_link'))
          <li><a href="{{ getSetting('youtube_link') }}"><i class="fab fa-youtube"></i></a></li>
        @endif

      </ul>
      <span class="title fw-medium">{{ localize('Follow on') }}</span>
    </div>
  @endif
</section><!-- /.hero-slider-one -->
