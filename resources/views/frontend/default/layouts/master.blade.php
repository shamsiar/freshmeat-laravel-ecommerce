<!DOCTYPE html>
@php
  $locale = str_replace('_', '-', app()->getLocale()) ?? 'en';
  $localLang = \App\Models\Language::where('code', $locale)->first();
  if ($localLang == null) {
      $localLang = \App\Models\Language::where('code', 'en')->first();
  }
@endphp
@if ($localLang->is_rtl == 1)
  <html dir="rtl" lang="{{ $locale }}" data-bs-theme="light">
@else
  <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light">
@endif

<head>
  <!--required meta tags-->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">


  <!--meta-->
  <meta name="robots" content="index, follow">
  <meta name="description" content="{{ getSetting('global_meta_description') }}">
  <meta name="keywords" content="{{ getSetting('global_meta_keywords') }}">

  <!--favicon icon-->
  <link rel="icon" href="{{ uploadedAsset(getSetting('favicon')) }}" type="image/png" sizes="16x16">

  <!--title-->
  <title>
    @yield('title', getSetting('system_title'))
  </title>

  @yield('meta')

  @if (!isset($detailedProduct) && !isset($blog))
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ getSetting('global_meta_title') }}" />
    <meta itemprop="description" content="{{ getSetting('global_meta_description') }}" />
    <meta itemprop="image" content="{{ uploadedAsset(getSetting('global_meta_image')) }}" />

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product" />
    <meta name="twitter:site" content="@publisher_handle" />
    <meta name="twitter:title" content="{{ getSetting('global_meta_title') }}" />
    <meta name="twitter:description" content="{{ getSetting('global_meta_description') }}" />
    <meta name="twitter:creator"
      content="@author_handle"/>
    <meta name="twitter:image" content="{{ uploadedAsset(getSetting('global_meta_image')) }}"/>

    <!-- Open Graph data -->
    <meta property="og:title" content="{{ getSetting('global_meta_title') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ route('home') }}" />
    <meta property="og:image" content="{{ uploadedAsset(getSetting('global_meta_image')) }}" />
    <meta property="og:description" content="{{ getSetting('global_meta_description') }}" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />
    <meta property="fb:app_id" content="{{ env('FACEBOOK_PIXEL_ID') }}">
@endif

    <!-- head-scripts -->
    @include('frontend.default.inc.head-scripts')
    <!-- head-scripts -->

    <!--build:css-->
    @include('frontend.default.inc.css', ['localLang' => $localLang])
    <!-- endbuild -->
    @php
        echo getSetting('frontend_header_custom_css');
    @endphp
    <!-- PWA  -->
    <meta name="theme-color" content="#6eb356"/>
    <link rel="apple-touch-icon" href="{{ staticAsset('/pwa.png') }}"/>
    <link rel="manifest" href="{{ staticAsset('/manifest.json') }}"/>

    <!-- recaptcha -->
    @if (getSetting('enable_recaptcha') == 1)
        {!! RecaptchaV3::initJs() !!}
    @endif
    <!-- recaptcha -->

</head>

<body class="custom-cursor boxed-wrapper">

    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>

    @php
        // for visitors to add to cart
        $tempValue = strtotime('now') . rand(10, 1000);
        $theTime = time() + 86400 * 365;
        if (!isset($_COOKIE['guest_user_id'])) {
            setcookie('guest_user_id', $tempValue, $theTime, '/'); // 86400 = 1 day
        }

    @endphp

    <!--preloader start-->
    @if (getSetting('enable_preloader') != '0')
    <div class="preloader">
        <div class="preloader__image" style="background-image: url({{ uploadedAsset(getSetting('frontend_preloader')) ?? staticAsset('frontend/freshmeat/assets/images/loader.png') }});"></div>
    </div>
    <!-- /.preloader -->
    {{-- <div id="preloader">
        <img src="{{ uploadedAsset(getSetting('frontend_preloader')) ?? staticAsset('frontend/freshmeat/assets/images/loader.png') }}" alt="preloader" class="img-fluid" max-width="180">
    </div> --}}
    @endif
    <!--preloader end-->

    <!--main content wrapper start-->
    @php
        $wrapperClass = 'main-wrapper';
        if(getTheme() == "halal" && \Route::is('home')){
            $wrapperClass = 'main-wrapper meat-body clr-scheme clr-scheme--home-five';
        }
    @endphp
    <div class="page-wrapper">
        <!--header section start-->
        @if (isset($exception))
            @if ($exception->getStatusCode() != 503)
                @include('frontend.default.inc.header')
            @endif
        @else
            @include('frontend.default.inc.header')
        @endif
        <!--header section end-->

        <!--breadcrumb section start-->
        @yield('breadcrumb')
        <!--breadcrumb section end-->

        <!--offcanvas menu start-->
        @include('frontend.default.inc.offcanvas')
        <!--offcanvas menu end-->

        @yield('contents')

        <!-- modals -->
        @include('frontend.default.pages.partials.products.quickViewModal')
        <!-- modals -->


        <!--footer section start-->
        @if (isset($exception))
            @if ($exception->getStatusCode() != 503)
                @include('frontend.default.inc.footer')
                @include('frontend.default.inc.bottomToolbar')
            @endif
        @else
            @include('frontend.default.inc.footer')
            @include('frontend.default.inc.bottomToolbar') @endif
        <!--footer section end-->

    </div>


    <!--scroll bottom to top button start-->
    <button class="scroll-top-btn">
    <i class="fa-regular fa-hand-pointer"></i></button>
    <!--scroll bottom to top button end-->

    <!--build:js-->
    @include('frontend.default.inc.scripts')
    <!--endbuild-->

    <!--page's scripts-->
    @yield('scripts')
    <!--page's script-->

    <!--for pwa-->
    <script src="{{ staticAsset('sw.js') }}"></script>
    <script>
      if (!navigator.serviceWorker?.controller) {
        navigator.serviceWorker?.register("{{ staticAsset('sw.js') }}").then(function(reg) {
          // console.log("Service worker has been registered for scope: " + reg.scope);
        });
      }
    </script>
    <!--for pwa-->

    </body>

    </html>
