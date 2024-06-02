<header class="main-header main-header--one sticky-header sticky-header--normal">
  @php
    $bgClass = 'bg-primary';
    if (getTheme() == 'halal') {
        $bgClass = 'bg-meat-primary';
    }
  @endphp
  <div class="main-header__container-fluid container-fluid">
    <div class="main-header__inner">
      <div class="main-header__logo">
        <a href="{{ route('home') }}" class="logo">
          <img src="{{ uploadedAsset(getSetting('navbar_logo')) }}" alt="Fresh Meat" width="100" class="img-fluid">
        </a>
      </div><!-- /.main-header__logo -->
      <div class="main-header__right">
        <div class="topbar">
          <div class="container-fluid">
            <div class="topbar__inner">
              <ul class="list-unstyled topbar__info">
                <li>
                  @if (getSetting('topbar_email'))
                    <i class="icon-paper-plane"></i>
                    <a href="mailto:{{ getSetting('topbar_email') }}" class="text-light">
                      {{ getSetting('topbar_email') }}
                    </a>
                  @endif
                </li>
              </ul>

              <div class="topbar__middle">
                <marquee behavior="scroll">{{ getSetting('topbar_welcome_text') }}</marquee>
              </div>

              <div class="topbar__right">
                <nav class="main-menu">
                  <ul class="main-menu__list">

                    @if (\App\Models\Location::count() > 1 || getSetting('topbar_location'))
                      <span class="me-1">
                        <svg width="12" height="17" viewBox="0 0 12 17" fill="none"
                          xmlns="http://www.w3.org/2000/svg">
                          <path
                            d="M6.00011 8.16427C7.44543 8.16427 8.62131 6.98781 8.62131 5.54175C8.62131 4.09569 7.44543 2.91925 6.00011 2.91925C4.55478 2.91925 3.37891 4.09569 3.37891 5.54175C3.37891 6.98781 4.55478 8.16427 6.00011 8.16427ZM6.00011 3.85662C6.92883 3.85662 7.68441 4.61259 7.68441 5.54175C7.68441 6.47093 6.92886 7.2269 6.00011 7.2269C5.07136 7.2269 4.31581 6.47093 4.31581 5.54175C4.31581 4.61259 5.07139 3.85662 6.00011 3.85662Z"
                            fill="white" stroke="white" stroke-width="0.3" />
                          <path
                            d="M3.14593 10.2541C3.85594 11.2159 3.57069 10.8418 5.61579 13.7635C5.80167 14.0301 6.19695 14.0314 6.38389 13.7639C8.43824 10.8284 8.15557 11.2002 8.85403 10.254C9.56155 9.29555 10.2932 8.30443 10.6941 7.14299C11.2744 5.46171 11.0236 3.79818 9.9879 2.45881C9.98787 2.45881 9.98787 2.45878 9.98784 2.45878C9.03913 1.23225 7.54834 0.5 5.99998 0.5C4.45163 0.5 2.96083 1.23225 2.01209 2.45884C0.976407 3.79821 0.725568 5.46177 1.30588 7.14305C1.70675 8.30446 2.43841 9.29558 3.14593 10.2541ZM2.75305 3.03246C3.52562 2.03369 4.73944 1.43737 5.99998 1.43737C7.26052 1.43737 8.47434 2.03369 9.24691 3.03246L9.24684 3.03243C10.0828 4.11343 10.2822 5.46462 9.80852 6.83705C9.4544 7.86293 8.76606 8.79539 8.10039 9.69717C7.5821 10.3993 7.73721 10.1845 5.99998 12.6763C4.26456 10.187 4.41771 10.399 3.89957 9.69717C3.2339 8.79539 2.54556 7.86289 2.19144 6.83705C1.71775 5.46459 1.91718 4.11343 2.75305 3.03246Z"
                            fill="white" stroke="white" stroke-width="0.3" />
                          <path
                            d="M3.53116 12.2865C3.393 12.0677 3.10369 12.0023 2.88495 12.1405L1.55299 12.9823C1.26243 13.1659 1.26214 13.591 1.55299 13.7748L5.75031 16.4276C5.90312 16.5242 6.09787 16.5241 6.25065 16.4276L10.448 13.7748C10.7386 13.5912 10.7388 13.1661 10.448 12.9823L9.116 12.1405C8.8972 12.0023 8.60792 12.0677 8.46979 12.2865C8.3316 12.5053 8.39693 12.7948 8.61567 12.933L9.32065 13.3786L6.00046 15.4769L2.6803 13.3786L3.38529 12.933C3.60402 12.7948 3.66933 12.5053 3.53116 12.2865Z"
                            fill="white" stroke="white" stroke-width="0.3" />
                        </svg>
                      </span>
                    @endif
                    @if (\App\Models\Location::count() > 1)
                      @php
                        if (Session::has('stock_location_id')) {
                            $location_id = session('stock_location_id');
                        } else {
                            $location_id = \App\Models\Location::where('is_default', 1)->first()->id;
                        }
                        $location = \App\Models\Location::where('id', $location_id)->first();
                      @endphp
                      <li class="dropdown p-0">
                        <a href="javascript:void(0)" class="text-light">{{ $location->name }}<span class="ms-1"><i
                              class="fa-solid fa-angle-down"></i></span></a>
                        <ul class="sub-menu">
                          @foreach (\App\Models\Location::where('is_published', 1)->get() as $key => $location)
                            <li>
                              <a class="dropdown-item fs-xs text-capitalize" href="javascript:void(0);"
                                onclick="changeLocation(this)" data-location="{{ $location->id }}">
                                {{ $location->name }}
                              </a>
                            </li>
                          @endforeach
                        </ul>
                      @else
                        {{ getSetting('topbar_location') }}
                    @endif
                    </li>
                  </ul>
                </nav>

                @if (getSetting('facebook_link') ||
                        getSetting('twitter_link') ||
                        getSetting('linkedin_link') ||
                        getSetting('youtube_link'))
                  <div class="topbar__social">

                    @if (getSetting('facebook_link'))
                      <a href="{{ getSetting('facebook_link') }}"><i class="fab fa-facebook-f"></i></a>
                    @endif
                    @if (getSetting('twitter_link'))
                      <a href="{{ getSetting('twitter_link') }}"><i class="fab fa-twitter"></i></a>
                    @endif
                    @if (getSetting('linkedin_link'))
                      <a href="{{ getSetting('linkedin_link') }}"><i class="fab fa-linkedin-in"></i></a>
                    @endif
                    @if (getSetting('youtube_link'))
                      <a href="{{ getSetting('youtube_link') }}"><i class="fab fa-youtube"></i></a>
                    @endif
                  </div>
                @endif
              </div>
            </div><!-- /.topbar__inner -->
          </div><!-- /.container-fluid -->
        </div><!-- /.topbar -->

        <div class="main-header__right__inner">
          <div class="main-header__right__left">
            <nav class="main-header__nav main-menu">
              <ul class="main-menu__list">

                @if (getSetting('show_navbar_categories') != 0 || getSetting('show_navbar_categories') == null)
                  <li class="dropdown">
                    <a href="javascript:void(0)">{{ localize('Categories') }}<span class="ms-1"><i
                          class="fa-solid fa-angle-down"></i></span></a>
                    <ul class="sub-menu">
                      @php
                        $categories = [];
                        if (getSetting('navbar_categories') != null) {
                            $categories = \App\Models\Category::whereIn(
                                'id',
                                json_decode(getSetting('navbar_categories')),
                            )->get();
                        }
                      @endphp
                      @foreach ($categories as $navbarCat)
                        <li>
                          <a href="{{ route('products.index') }}?&category_id={{ $navbarCat->id }}"
                            class="d-flex align-items-center">
                            <div class="me-2 avatar-icon">
                              <img src="{{ uploadedAsset($navbarCat->collectLocalization('thumbnail_image')) }}"
                                alt="" class="rounded-circle h-100 w-100">
                            </div>
                            <span>{{ $navbarCat->collectLocalization('name') }}</span>
                          </a>
                        </li>
                      @endforeach
                    </ul>
                  </li>
                @endif

                <li class="dropdown megamenu">
                  <a href="{{ route('home') }}">{{ localize('Home') }}</a>
                </li>
                <li class="dropdown megamenu"><a href="{{ route('products.index') }}">{{ localize('Deals & Bundle') }}
                  </a></li>
                <li class="dropdown megamenu"><a href="{{ route('home.blogs') }}">{{ localize('Blogs') }}</a></li>
                <li class="dropdown megamenu"><a
                    href="{{ route('home.pages.aboutUs') }}">{{ localize('About Us') }}</a>
                </li>
                {{-- <li class="dropdown megamenu"><a
                    href="{{ route('home.pages.contactUs') }}">{{ localize('Contact Us') }}</a>
                </li> --}}
              </ul>
            </nav><!-- /.main-header__nav -->
          </div><!-- /.main-header__right__left -->


          <div class="main-header__right__right">
            <div class="mobile-nav__btn mobile-nav__toggler">
              <span></span>
              <span></span>
              <span></span>
            </div><!-- /.mobile-nav__toggler -->
            <div class="gshop-header-icons d-none d-md-inline-flex align-items-center justify-content-end ms-3">
              <div class="gshop-header-search dropdown">
                <button type="button" class="header-icon" data-bs-toggle="dropdown">
                  <svg width="18" height="23" viewBox="0 0 22 23" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M9.68859 0.5C4.34645 0.5 0 4.84646 0 10.1886C0 15.5311 4.34645 19.8772 9.68859 19.8772C15.031 19.8772 19.3772 15.5311 19.3772 10.1886C19.3772 4.84646 15.031 0.5 9.68859 0.5ZM9.68859 18.0886C5.33261 18.0886 1.78866 14.5447 1.78866 10.1887C1.78866 5.83266 5.33261 2.28867 9.68859 2.28867C14.0446 2.28867 17.5885 5.83262 17.5885 10.1886C17.5885 14.5446 14.0446 18.0886 9.68859 18.0886Z"
                      fill="#5D6374" />
                    <path
                      d="M21.7406 20.9824L16.6436 15.8853C16.2962 15.538 15.7338 15.538 15.3865 15.8853C15.0391 16.2323 15.0391 16.7954 15.3865 17.1424L20.4835 22.2395C20.6571 22.4131 20.8845 22.5 21.1121 22.5C21.3393 22.5 21.5669 22.4131 21.7406 22.2395C22.0879 21.8925 22.0879 21.3294 21.7406 20.9824Z"
                      fill="#5D6374" />
                  </svg>
                </button>
                <div class="dropdown-menu dropdown-menu-end border-0">
                  <form class="search-form d-flex align-items-center" action="{{ route('products.index') }}">
                    <input type="text" placeholder="{{ localize('Search products') }}" class="w-100"
                      name="search" @isset($searchKey) value="{{ $searchKey }}" @endisset>
                    <button type="submit" class="submit-icon-btn-secondary"><i
                        class="fa-solid fa-magnifying-glass"></i></button>
                  </form>
                </div>
              </div>

              <div class="gshop-header-user position-relative">
                <button type="button" class="header-icon">
                  <svg width="18" height="25" viewBox="0 0 22 25" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M11.092 11.9546C12.6656 11.9546 14.0281 11.3902 15.1416 10.2766C16.2547 9.16322 16.8193 7.80093 16.8193 6.2271C16.8193 4.65382 16.2549 3.29134 15.1414 2.1776C14.0279 1.0644 12.6654 0.5 11.092 0.5C9.51825 0.5 8.156 1.0644 7.04266 2.17778C5.92931 3.29116 5.36475 4.65363 5.36475 6.2271C5.36475 7.80093 5.92931 9.1634 7.04266 10.2768C8.15636 11.39 9.51879 11.9546 11.092 11.9546ZM8.0281 3.16308C8.88239 2.30877 9.88453 1.89349 11.092 1.89349C12.2993 1.89349 13.3017 2.30877 14.1561 3.16308C15.0104 4.01757 15.4259 5.01992 15.4259 6.2271C15.4259 7.43464 15.0104 8.43681 14.1561 9.2913C13.3017 10.1458 12.2993 10.5611 11.092 10.5611C9.88489 10.5611 8.88275 10.1456 8.0281 9.2913C7.17364 8.43699 6.7582 7.43464 6.7582 6.2271C6.7582 5.01992 7.17364 4.01757 8.0281 3.16308Z"
                      fill="#5D6374" stroke="#5D6374" stroke-width="0.2" />
                    <path
                      d="M21.1339 18.893C21.1012 18.4201 21.0352 17.9043 20.9379 17.3596C20.8397 16.8108 20.7133 16.292 20.562 15.8178C20.4055 15.3277 20.1931 14.8438 19.9301 14.38C19.6575 13.8986 19.3371 13.4794 18.9776 13.1345C18.6016 12.7736 18.1414 12.4835 17.6091 12.2719C17.0787 12.0614 16.4909 11.9547 15.8621 11.9547C15.6152 11.9547 15.3763 12.0564 14.9151 12.3576C14.6313 12.5433 14.2993 12.7581 13.9287 12.9956C13.6118 13.1982 13.1825 13.3879 12.6523 13.5598C12.135 13.7277 11.6098 13.8129 11.0912 13.8129C10.5729 13.8129 10.0477 13.7277 9.53001 13.5598C9.00034 13.3881 8.57088 13.1984 8.25455 12.9958C7.88747 12.7605 7.55527 12.5457 7.26718 12.3574C6.80634 12.0562 6.56753 11.9545 6.32059 11.9545C5.69163 11.9545 5.10401 12.0614 4.57378 12.2721C4.04189 12.4833 3.58143 12.7734 3.20512 13.1347C2.84561 13.4798 2.52522 13.8988 2.25281 14.38C1.99019 14.8438 1.77758 15.3276 1.62108 15.818C1.46993 16.2922 1.34351 16.8108 1.24533 17.3596C1.14788 17.9035 1.082 18.4195 1.04933 18.8935C1.01722 19.3569 1.00098 19.8393 1.00098 20.3266C1.00098 21.5934 1.40238 22.6189 2.19394 23.3752C2.97572 24.1216 4.00996 24.5 5.26808 24.5H16.9157C18.1735 24.5 19.2077 24.1216 19.9897 23.3752C20.7814 22.6194 21.1828 21.5935 21.1828 20.3264C21.1826 19.8374 21.1662 19.3551 21.1339 18.893ZM19.0123 22.3449C18.4957 22.8381 17.8099 23.0779 16.9155 23.0779H5.26808C4.37354 23.0779 3.68773 22.8381 3.17135 22.3451C2.66474 21.8613 2.41854 21.2008 2.41854 20.3266C2.41854 19.8718 2.43349 19.4229 2.46339 18.9918C2.49255 18.569 2.55216 18.1044 2.64056 17.6108C2.72786 17.1233 2.83896 16.6658 2.9711 16.2516C3.09789 15.8545 3.27082 15.4612 3.48527 15.0824C3.68995 14.7214 3.92544 14.4116 4.18529 14.1621C4.42835 13.9286 4.73471 13.7375 5.0957 13.5942C5.42956 13.4616 5.80476 13.3891 6.21208 13.3781C6.26172 13.4046 6.35012 13.4552 6.49334 13.5488C6.78475 13.7394 7.12064 13.9567 7.49197 14.1946C7.91054 14.4624 8.44981 14.7042 9.09409 14.9128C9.75277 15.1265 10.4245 15.235 11.0913 15.235C11.7581 15.235 12.4301 15.1265 13.0884 14.913C13.7333 14.704 14.2723 14.4624 14.6915 14.1943C15.0715 13.9506 15.3979 13.7395 15.6894 13.5488C15.8326 13.4553 15.921 13.4046 15.9706 13.3781C16.3781 13.3891 16.7533 13.4616 17.0874 13.5942C17.4482 13.7375 17.7545 13.9288 17.9976 14.1621C18.2574 14.4114 18.4929 14.7212 18.6976 15.0826C18.9122 15.4612 19.0854 15.8547 19.212 16.2515C19.3443 16.6662 19.4556 17.1235 19.5427 17.6106C19.6309 18.1052 19.6907 18.5699 19.7199 18.992V18.9924C19.7499 19.4218 19.7651 19.8705 19.7653 20.3266C19.7651 21.201 19.5189 21.8613 19.0123 22.3449Z"
                      fill="#5D6374" stroke="#5D6374" stroke-width="0.2" />
                  </svg>
                </button>
                <div class="user-menu-wrapper" style="z-index: 10;">
                  <ul class="user-menu">
                    @auth
                      @if (auth()->user()->user_type == 'customer')
                        <li><a href="{{ route('customers.dashboard') }}"><span class="me-2"><i
                                class="fa-solid fa-user"></i></span>{{ localize('My Account') }}</a>
                        </li>
                        <li><a href="{{ route('customers.orderHistory') }}"><span class="me-2"><i
                                class="fa-solid fa-tags"></i></span>{{ localize('My Orders') }}</a>
                        </li>
                        <li><a href="{{ route('customers.wishlist') }}"><span class="me-2"><i
                                class="fa-solid fa-heart"></i></span>{{ localize('My Wishlist') }}</a>
                        </li>
                      @elseif(auth()->user()->user_type == 'deliveryman')
                        <li><a href="{{ route('deliveryman.dashboard') }}"><span class="me-2"><i
                                class="fa-solid fa-bars"></i></span>{{ localize('Dashboard') }}</a>
                        </li>
                      @else
                        <li><a href="{{ route('admin.dashboard') }}"><span class="me-2"><i
                                class="fa-solid fa-bars"></i></span>{{ localize('Dashboard') }}</a>
                        </li>
                      @endif

                      <li><a href="{{ route('logout') }}"><span class="me-2"><i
                              class="fa-solid fa-arrow-right-from-bracket"></i></span>{{ localize('Log Out') }}
                        </a></li>
                    @endauth

                    @guest
                      <li><a href="{{ route('login') }}"><span class="me-2"><i
                              class="fa-solid fa-arrow-right-from-bracket"></i></span>{{ localize('Log In / Register') }}</a>
                      </li>
                      {{-- <li><a href="{{ route('register') }}"><span class="me-2"><i
                              class="fa-solid fa-user-plus"></i></span>{{ localize('Registration') }}</a>
                      </li> --}}
                    @endguest

                  </ul>
                </div>
              </div>

              <div class="gshop-header-cart position-relative">
                @php
                  $carts = [];
                  if (Auth::check()) {
                      $carts = App\Models\Cart::where('user_id', Auth::user()->id)
                          ->where('location_id', session('stock_location_id'))
                          ->get();
                  } else {
                      if (isset($_COOKIE['guest_user_id'])) {
                          $carts = App\Models\Cart::where('guest_user_id', (int) $_COOKIE['guest_user_id'])
                              ->where('location_id', session('stock_location_id'))
                              ->get();
                      }
                  }
                @endphp


                <button type="button" class="header-icon">
                  <svg width="18" height="25" viewBox="0 0 22 25" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M21.1704 23.9559L19.6264 7.01422C19.5843 6.55156 19.1908 6.19718 18.7194 6.19718H15.5355V4.78227C15.5355 2.14533 13.3583 0 10.6823 0C8.00628 0 5.82937 2.14533 5.82937 4.78227V6.19718H2.6433C2.17192 6.19718 1.77839 6.55156 1.73625 7.01422L0.186259 24.0225C0.163431 24.2735 0.248671 24.5223 0.421216 24.7082C0.593761 24.8941 0.837705 25 1.0933 25H20.2695C20.2702 25 20.2712 25 20.2719 25C20.775 25 21.1826 24.5982 21.1826 24.1027C21.1825 24.0528 21.1784 24.0036 21.1704 23.9559ZM7.65075 4.78227C7.65075 3.1349 9.01071 1.79465 10.6824 1.79465C12.3542 1.79465 13.7142 3.1349 13.7142 4.78227V6.19718H7.65075V4.78227ZM2.08948 23.2055L3.47591 7.99183H5.82937V9.59649C5.82937 10.0921 6.237 10.4938 6.74006 10.4938C7.24313 10.4938 7.65075 10.0921 7.65075 9.59649V7.99183H13.7142V9.59649C13.7142 10.0921 14.1219 10.4938 14.6249 10.4938C15.128 10.4938 15.5356 10.0921 15.5356 9.59649V7.99183H17.8869L19.2733 23.2055H2.08948Z"
                      fill="#5D6374" />
                  </svg>
                  <span
                    class="cart-counter badge bg-danger rounded-circle p-1 {{ count($carts) > 0 ? '' : 'd-none' }}">{{ count($carts) }}</span>
                </button>
                <div class="cart-box-wrapper">
                  <div class="apt_cart_box theme-scrollbar">
                    <ul class="at_scrollbar scrollbar cart-navbar-wrapper">
                      <!--cart listing-->
                      @include('frontend.default.pages.partials.carts.cart-navbar', [
                          'carts' => $carts,
                      ])
                      <!--cart listing-->

                    </ul>
                    <div class="d-flex align-items-center justify-content-between mt-3">
                      <h6 class="mb-0">{{ localize('Subtotal') }}:</h6>
                      <span
                        class="fw-bold text-dark sub-total-price">{{ formatPrice(getSubTotal($carts, false)) }}</span>
                    </div>
                    <div class="row align-items-center justify-content-between">
                      <div class="col-6">
                        <a href="{{ route('carts.index') }}"
                          class="cart-page__update-btn boskery-btn btn-md mt-4 w-100">
                          <span class="boskery-btn__hover"></span>
                          <span class="boskery-btn__hover"></span>
                          <span class="boskery-btn__hover"></span>
                          <span class="boskery-btn__hover"></span>
                          <span class="boskery-btn__hover"></span>
                          <span class="boskery-btn__hover"></span>
                          <span class="boskery-btn__text">{{ localize('View Cart') }}</span>
                          <i class="fa-solid fa-shopping-bag"></i>
                        </a>
                      </div>
                      <div class="col-6">
                        <a href="{{ route('checkout.proceed') }}"
                          class="boskery-btn product__item__link  btn-md mt-4 w-100">
                          <span class="boskery-btn__hover"></span>
                          <span class="boskery-btn__hover"></span>
                          <span class="boskery-btn__hover"></span>
                          <span class="boskery-btn__hover"></span>
                          <span class="boskery-btn__hover"></span>
                          <span class="boskery-btn__hover"></span>
                          <span class="boskery-btn__text">{{ localize('Checkout') }}</span>
                          <i class="fa-solid fa-credit-card"></i>
                        </a>
                        {{-- <a href="{{ route('checkout.proceed') }}" class="btn btn-primary btn-md mt-4 w-100"><span
                            class="me-2"><i
                              class="fa-solid fa-credit-card"></i></span>{{ localize('Checkout') }}</a> --}}
                      </div>


                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div
              class="gshop-header-contact align-items-center ms-7 position-relative d-none d-lg-flex d-xl-none d-xxl-flex">
              <div class="main-header__call">
                <span class="main-header__call__icon icon-mobile"></span><!-- /.main-header__call__icon -->
                <div class="main-header__call__inner">
                  <span class="main-header__call__tagline">{{ localize('Call Anytime') }}</span>
                  <!-- /.main-header__call__tagline -->
                  <a href="tel:{{ getSetting('navbar_contact_number') }}"
                    class="main-header__call__number">{{ getSetting('navbar_contact_number') }}</a>
                  <!-- /.main-header__call__number -->
                </div><!-- /.main-header__call__inner -->
              </div>
              {{-- <a href="tel:{{ getSetting('navbar_contact_number') }}" class="d-flex align-items-center">
                <span
                  class="icon d-inline-flex rounded-circle justify-content-center align-items-center bg-secondary-light">
                  <svg width="20" height="24" viewBox="0 0 23 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M1.98193 3.44444C1.98193 2.09441 2.97352 1 4.19672 1H7.82812C8.30477 1 8.72795 1.33664 8.87867 1.83572L10.5373 7.3277C10.7116 7.90472 10.475 8.53538 9.98206 8.8074L7.48236 10.1868C8.70297 13.1748 10.884 15.5821 13.5913 16.9292L14.8411 14.1703C15.0876 13.6263 15.659 13.3651 16.1818 13.5575L21.1577 15.3881C21.61 15.5545 21.915 16.0215 21.915 16.5476V20.5556C21.915 21.9056 20.9234 23 19.7002 23H18.5928C9.41887 23 1.98193 14.7919 1.98193 4.66667V3.44444Z"
                      stroke="#FF7C08" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                </span>
                <div class="ms-3">
                  <span class="text-muted fs-xs">{{ localize('Call Anytime') }}</span>
                  <h6 class="mb-0 mt-1 fs-sm text-dark">{{ getSetting('navbar_contact_number') }}</h6>
                </div>
              </a> --}}
            </div>

            <a href="{{ route('home.pages.contactUs') }}" class="boskery-btn main-header__btn">
              <span class="boskery-btn__hover"></span>
              <span class="boskery-btn__hover"></span>
              <span class="boskery-btn__hover"></span>
              <span class="boskery-btn__hover"></span>
              <span class="boskery-btn__hover"></span>
              <span class="boskery-btn__hover"></span>
              <span class="boskery-btn__text">{{ localize('Contact Us') }}</span>
              <i class="icon-meat-3"></i>
            </a><!-- /.thm-btn main-header__btn -->
          </div><!-- /.main-header__right__right -->
        </div><!-- /.main-header__right__inner -->
      </div><!-- /.main-header__right -->
    </div><!-- /.main-header__inner -->
  </div><!-- /.container-fluid -->
</header><!-- /.main-header -->
