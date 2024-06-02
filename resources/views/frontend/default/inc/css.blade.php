<!-- 3rd party -->
<link rel="stylesheet" href="{{ staticAsset('frontend/common/css/toastr.css') }}">
<!-- 3rd party -->
@if ($localLang->is_rtl == 1)
  <link rel="stylesheet" href="{{ staticAsset('frontend/default/assets/css/main-rtl.css') }}">
@else
  <link rel="stylesheet" href="{{ staticAsset('frontend/default/assets/css/main.css') }}">
@endif

<link rel="stylesheet" href="{{ staticAsset('frontend/common/css/select2.css') }}">
<link rel="stylesheet" href="{{ staticAsset('frontend/common/css/custom.css') }}">
<link rel="stylesheet" href="{{ staticAsset('frontend/common/css/summernote-lite.min.css') }}">
<link rel="stylesheet" href="{{ staticAsset('frontend/common/css/summernote-custom.css') }}">

{{-- Fresh Meat Css --}}

<!-- fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
  href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Cormorant:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
  rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;500;600;700;800;900&display=swap"
  rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="{{ staticAsset('frontend/freshmeat/assets/vendors/bootstrap/css/bootstrap.min.css') }}" />
<link rel="stylesheet"
  href="{{ staticAsset('frontend/freshmeat/assets/vendors/bootstrap-select/bootstrap-select.min.css') }}" />
<link rel="stylesheet" href="{{ staticAsset('frontend/freshmeat/assets/vendors/animate/animate.min.css') }}" />
<link rel="stylesheet" href="{{ staticAsset('frontend/freshmeat/assets/vendors/fontawesome/css/all.min.css') }}" />
<link rel="stylesheet" href="{{ staticAsset('frontend/freshmeat/assets/vendors/jquery-ui/jquery-ui.css') }}" />
<link rel="stylesheet" href="{{ staticAsset('frontend/freshmeat/assets/vendors/jarallax/jarallax.css') }}" />
<link rel="stylesheet"
  href="{{ staticAsset('frontend/freshmeat/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css') }}" />
<link rel="stylesheet" href="{{ staticAsset('frontend/freshmeat/assets/vendors/nouislider/nouislider.min.css') }}" />
<link rel="stylesheet" href="{{ staticAsset('frontend/freshmeat/assets/vendors/nouislider/nouislider.pips.css') }}" />
<link rel="stylesheet" href="{{ staticAsset('frontend/freshmeat/assets/vendors/tiny-slider/tiny-slider.css') }}" />
<link rel="stylesheet" href="{{ staticAsset('frontend/freshmeat/assets/vendors/boskery-icons/style.css') }}" />
<link rel="stylesheet"
  href="{{ staticAsset('frontend/freshmeat/assets/vendors/owl-carousel/css/owl.carousel.min.css') }}" />
<link rel="stylesheet"
  href="{{ staticAsset('frontend/freshmeat/assets/vendors/owl-carousel/css/owl.theme.default.min.css') }}" />
<link rel="stylesheet"
  href="{{ staticAsset('frontend/freshmeat/assets/vendors/swiper/css/swiper-bundle.min.css') }}" />

<!-- template styles -->
<link rel="stylesheet" href="{{ staticAsset('frontend/freshmeat/assets/css/boskery.css') }}" />
{{-- Fresh Meat Css end --}}

<style>
  @media (min-width: 1200px) {
    .choose-us-section::after {
      background-image: url({{ uploadedAsset(getSetting('halal_why_choose_us_large_img')) }});
    }

    .on-sale-banner {
      background-image: url({{ uploadedAsset(getSetting('halal_on_sale_banner')) }});
    }
</style>
