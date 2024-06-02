<section class="why-choose-one section-space-two" id="why-choose"
  style="background-image: url(frontend/freshmeat/assets/images/shapes/why-choose-bg-1-1.png);">
  <div class="container">
    <div class="sec-title sec-title--center">

      <img src="{{ staticAsset('frontend/freshmeat/assets/images/shapes/section-logo.png') }}" alt="why choose us"
        class="sec-title__img">


      <h6 class="sec-title__tagline">why choose us</h6><!-- /.sec-title__tagline -->

      <h2 class="sec-title__title">We Provide Best Meat <br> From Our Farm</h2><!-- /.sec-title__title -->
    </div><!-- /.sec-title -->

    <div class="row gutter-y-30 align-items-center">
      <div class="col-lg-4 wow fadeInLeft" data-wow-duration="1500ms" data-wow-delay="00ms">
        <div class="why-choose-one__content">

          <div class="why-choose-one__item">
            <div class="why-choose-one__item__icon">
              <span class="icon-fast-delivery"></span>
            </div><!-- /.why-choose-one__item__icon -->
            <div class="why-choose-one__item__content">
              <h4 class="why-choose-one__item__title">free home delivery</h4><!-- /.why-choose-one__item__title -->
              <p class="why-choose-one__item__text">A meat shop is a retail establhment that specializes in</p>
              <!-- /.why-choose-one__item__text -->
            </div><!-- /.why-choose-one__item__content -->
          </div><!-- /.why-choose-one__item -->

          <div class="why-choose-one__item">
            <div class="why-choose-one__item__icon">
              <span class="icon-achievement"></span>
            </div><!-- /.why-choose-one__item__icon -->
            <div class="why-choose-one__item__content">
              <h4 class="why-choose-one__item__title">Quality Control</h4><!-- /.why-choose-one__item__title -->
              <p class="why-choose-one__item__text">A meat shop is a retail establhment that specializes in</p>
              <!-- /.why-choose-one__item__text -->
            </div><!-- /.why-choose-one__item__content -->
          </div><!-- /.why-choose-one__item -->

        </div><!-- /.why-choose-one__content -->
      </div><!-- /.col-lg-4 -->

      <div class="col-lg-4 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="400ms">
        <div class="why-choose-one__image">
          <img src="{{ staticAsset('frontend/freshmeat/assets/images/shapes/why-choose-shape-1-1.png') }}"
            alt="why-choose-shape">
        </div><!-- /.why-choose-one__image -->
      </div><!-- /.col-lg-4 -->

      <div class="col-lg-4 wow fadeInRight" data-wow-duration="1500ms" data-wow-delay="00ms">
        <div class="why-choose-one__content">
          <div class="why-choose-one__item">
            <div class="why-choose-one__item__icon">
              <span class="icon-no-preservatives"></span>
            </div><!-- /.why-choose-one__item__icon -->
            <div class="why-choose-one__item__content">
              <h4 class="why-choose-one__item__title">no chemical use</h4><!-- /.why-choose-one__item__title -->
              <p class="why-choose-one__item__text">A meat shop is a retail establhment that specializes in</p>
              <!-- /.why-choose-one__item__text -->
            </div><!-- /.why-choose-one__item__content -->
          </div><!-- /.why-choose-one__item -->

          <div class="why-choose-one__item">
            <div class="why-choose-one__item__icon">
              <span class="icon-healthcare-1"></span>
            </div><!-- /.why-choose-one__item__icon -->
            <div class="why-choose-one__item__content">
              <h4 class="why-choose-one__item__title">Health and Safety</h4><!-- /.why-choose-one__item__title -->
              <p class="why-choose-one__item__text">A meat shop is a retail establhment that specializes in</p>
              <!-- /.why-choose-one__item__text -->
            </div><!-- /.why-choose-one__item__content -->
          </div><!-- /.why-choose-one__item -->


        </div><!-- /.why-choose-one__content -->
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->
  </div><!-- /.container -->
</section><!-- /.why-choose-one section-space-two -->

{{-- <div class="section-space-sm-y">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="choose-us-section section-space-sm-y">
                    <div class="section-space-sm-bottom">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8 col-xl-6 col-xxl-5">
                                    <h2 class="mb-4 display-6">
                                        @php
                                            $heading = localize(getSetting('halal_why_choose_us_title'));
                                            $heading = str_replace('{_', '<span class="meat-primary">', $heading);
                                            $heading = str_replace('_}', '</span>', $heading);
                                        @endphp
                                        {!! $heading !!}


                                    </h2>
                                    <p class="mb-0">
                                        {{ localize(getSetting('halal_why_choose_us_text')) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row g-4">

                            <div class="col-md-6 col-lg-4 col-xl-3">
                                <div class="choose-card">
                                    <div class="mb-6">
                                        <img src="{{ uploadedAsset(getSetting('halal_why_choose_us_feature_one_icon')) }}"
                                            alt="image" class="img-fluid" />
                                    </div>
                                    <h5 class="mb-2 fs-20">
                                        {{ localize(getSetting('halal_why_choose_us_feature_one_title')) }}</h5>
                                    <p class="mb-0 fs-14">
                                        {{ localize(getSetting('halal_why_choose_us_feature_one_text')) }}
                                    </p>
                                </div>
                            </div>


                            <div class="col-md-6 col-lg-4 col-xl-3">
                                <div class="choose-card">
                                    <div class="mb-6">
                                        <img src="{{ uploadedAsset(getSetting('halal_why_choose_us_feature_two_icon')) }}"
                                            alt="image" class="img-fluid" />
                                    </div>
                                    <h5 class="mb-2 fs-20">
                                        {{ localize(getSetting('halal_why_choose_us_feature_two_title')) }}</h5>
                                    <p class="mb-0 fs-14">
                                        {{ localize(getSetting('halal_why_choose_us_feature_two_text')) }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 col-xl-3">
                                <div class="choose-card">
                                    <div class="mb-6">
                                        <img src="{{ uploadedAsset(getSetting('halal_why_choose_us_feature_three_icon')) }}"
                                            alt="image" class="img-fluid" />
                                    </div>
                                    <h5 class="mb-2 fs-20">
                                        {{ localize(getSetting('halal_why_choose_us_feature_three_title')) }}</h5>
                                    <p class="mb-0 fs-14">
                                        {{ localize(getSetting('halal_why_choose_us_feature_three_text')) }}
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
