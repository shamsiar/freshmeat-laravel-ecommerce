{{-- @extends('layouts.auth') --}}
@extends('frontend.default.layouts.master')

@section('title')
  {{ localize('Login') }}
@endsection

@section('contents')
  <section class="page-header">
    <div class="page-header__bg"
      data-background="{{ staticAsset('frontend/freshmeat/assets/images/backgrounds/page-header-bg.jpg') }}"></div>
    <!-- /.page-header__bg -->
    <div class="container">
      <h2 class="page-header__title">Log In / Register</h2>
      <ul class="boskery-breadcrumb list-unstyled">
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><span>Log In</span></li>
      </ul><!-- /.thm-breadcrumb list-unstyled -->
    </div><!-- /.container -->
  </section><!-- /.page-header -->

  <section class="login-page">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="login-page__inner">
            <div class="login-page__image wow fadeInLeft" data-wow-duration="1500ms">
              <img src="{{ staticAsset('frontend/freshmeat/assets/images/resources/login-1-1.jpg') }}" alt="login">
            </div><!-- /.login-page__image -->
            <div class="login-page__wrap login-page__main-tab-box tabs-box wow fadeInRight" data-wow-duration="1500ms">
              <div class="login-page__wrap__bg"
                data-background="{{ staticAsset('frontend/freshmeat/assets/images/shapes/login-bg-1.png') }}">
              </div><!-- /.login-page__wrap__bg -->
              <div class="login-page__wrap__top">
                <div class="login-page__wrap__content">
                  <a href="{{ route('home') }}">
                    <img src="{{ uploadedAsset(getSetting('navbar_logo')) }}" alt="logo" width="100">
                  </a>
                </div><!-- /.login-page__content -->
                <ul class="tab-buttons">
                  <li data-tab="#login" class="tab-btn boskery-btn active-btn">
                    <span class="boskery-btn__hover"></span>
                    <span class="boskery-btn__hover"></span>
                    <span class="boskery-btn__hover"></span>
                    <span class="boskery-btn__hover"></span>
                    <span class="boskery-btn__hover"></span>
                    <span class="boskery-btn__hover"></span>
                    <span class="boskery-btn__text">log in</span>
                  </li>
                  <li data-tab="#register" class="tab-btn boskery-btn">
                    <span class="boskery-btn__hover"></span>
                    <span class="boskery-btn__hover"></span>
                    <span class="boskery-btn__hover"></span>
                    <span class="boskery-btn__hover"></span>
                    <span class="boskery-btn__hover"></span>
                    <span class="boskery-btn__hover"></span>
                    <span class="boskery-btn__text">register</span>
                  </li>
                </ul><!-- /.tab-buttons -->
              </div><!-- /.login-page__wrap__top -->
              <div class="tabs-content">
                <div class="tab active-tab fadeInUp animated" data-wow-delay="200ms" id="login"
                  style="display: block;">
                  <h3 class="">{{ localize('Welcome back to Fresh Meat Store.') }}</h3>
                  <form class="tt-login-form-wrap p-3 p-md-6 p-lg-6 py-7 w-100 login-page__form"
                    action="{{ route('login') }}" method="POST" id="login-form">
                    @csrf
                    @if (getSetting('enable_recaptcha') == 1)
                      {!! RecaptchaV3::field('recaptcha_token') !!}
                    @endif

                    <div class="row g-3">
                      <div class="col-sm-12">
                        <div class="input-field">
                          <input type="hidden" name="login_with" class="login_with" value="email">

                          <span class="login-email @if (old('login_with') == 'phone') d-none @endif">
                            <div class="login-page__form__input-box">
                              <input type="email" id="email" name="email"
                                placeholder="{{ localize('Enter your email') }}" class="theme-input mb-1"
                                value="{{ old('email') }}" required>
                              <span class="icon-email"></span>
                            </div><!-- /.login-page__form__input-box -->
                            <small class="">
                              <a href="javascript:void(0);" class="fs-sm login-with-phone-btn"
                                onclick="handleLoginWithPhone()">
                                {{ localize('Login with phone?') }}</a>
                            </small>
                          </span>

                          <span class="login-phone @if (old('login_with') == 'email' || old('login_with') == '') d-none @endif">
                            <div class="login-page__form__input-box">
                              <input type="text" id="phone" name="phone"
                                placeholder="{{ localize('Enter your phone') }}" class="theme-input mb-1"
                                value="{{ old('email') }}">
                              <span class="icon-mobile"></span>
                            </div><!-- /.login-page__form__input-box -->
                            {{-- <label class="fw-bold text-dark fs-sm mb-1">{{ localize('Phone') }}</label>
                            <input type="text" id="phone" name="phone" placeholder="+xxxxxxxxxx"
                              class="theme-input mb-1" value="{{ old('phone') }}"> --}}

                            <small class="">
                              <a href="javascript:void(0);" class="fs-sm login-with-email-btn"
                                onclick="handleLoginWithEmail()">
                                {{ localize('Login with email?') }}</a>
                            </small>
                          </span>
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="login-page__form__input-box input-field check-password">
                          <div class="check-password">
                            <input type="password" name="password" id="password"
                              placeholder="{{ localize('Password') }}" class="login-page__password theme-input" required>
                            <span class="icon-padlock"></span>
                            <i class="toggle-password pass-field-icon fa fa-fw fa-eye-slash"></i>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between mt-4">
                      <div class="checkbox d-inline-flex align-items-center gap-2">
                        <div class="theme-checkbox flex-shrink-0">
                          <input type="checkbox" id="save-password">
                          <span class="checkbox-field"><i class="fa-solid fa-check"></i></span>
                        </div>
                        <label for="save-password" class="fs-sm"> {{ localize('Remember me') }}</label>
                      </div>
                      <a href="{{ route('password.request') }}" class="fs-sm">{{ localize('Forgot Password') }}</a>
                    </div>

                    @if (env('DEMO_MODE') == 'On')
                      <div class="row mt-5">
                        <div class="col-12">
                          <label class="fw-bold">Admin Access</label>
                          <div class="d-flex flex-wrap align-items-center justify-content-between border-bottom pb-3">
                            <small>admin@themetags.com</small>
                            <small>123456</small>
                            <button class="btn btn-sm btn-secondary py-0 px-2" type="button"
                              onclick="copyAdmin()">Copy</button>
                          </div>
                        </div>

                        <div class="col-12 mt-3">
                          <label class="fw-bold">Customer Access</label>
                          <div class="d-flex flex-wrap align-items-center justify-content-between">
                            <small>customer@themetags.com</small>
                            <small>123456</small>

                            <button class="btn btn-sm btn-secondary py-0 px-2" type="button"
                              onclick="copyCustomer()">Copy</button>
                          </div>
                        </div>
                        <div class="col-12 mt-3">
                          <label class="fw-bold">Delivery Access</label>
                          <div class="d-flex flex-wrap align-items-center justify-content-between">
                            <small>delivery-man@themetags.com</small>
                            <small>123456</small>

                            <button class="btn btn-sm btn-secondary py-0 px-2" type="button"
                              onclick="copyDeliveryMan()">Copy</button>
                          </div>
                        </div>
                      </div>
                    @endif

                    <div class="row g-4 mt-3">
                      <div class="col-sm-12">
                        <button type="submit" class="boskery-btn login-page__form__btn sign-in-btn"
                          onclick="handleSubmit()">{{ localize('Sign In') }}</button>
                      </div>
                    </div>
                  </form>

                  <div class="login-page__signin">
                    <h4 class="login-page__signin__title">{{ localize("Don't have an Account?") }} <a
                        href="{{ route('login') }}">{{ localize('Register') }}</a></h4>
                    <!-- /.login-page__signin__title -->
                    <div class="login-page__signin__buttons">
                      @include('frontend.default.inc.social')
                    </div><!-- /.login-page__signin__buttons -->
                  </div><!-- /.login-page__signin -->
                </div><!-- /.login-tab -->

                <div class="tab fadeInUp animated" data-wow-delay="200ms" id="register" style="display: none;">
                  <h3 class="">{{ localize('Sign up your Fresh Meat account.') }}</h3>
                  <form class="tt-login-form-wrap p-3 p-md-6 p-lg-6 py-7 w-100 " action="{{ route('register') }}"
                    method="POST" id="login-form">
                    @csrf
                    @if (getSetting('enable_recaptcha') == 1)
                      {!! RecaptchaV3::field('recaptcha_token') !!}
                    @endif

                    <div class="row g-3">
                      <div class="col-sm-12">
                        <div class="login-page__form__input-box input-field">
                          <input type="text" id="name" name="name"
                            placeholder="{{ localize('Enter your name') }}" class="theme-input"
                            value="{{ old('name') }}" required>
                          <span class="icon-user"></span>
                        </div><!-- /.login-page__form__input-box -->
                      </div>
                      <div class="col-sm-12">
                        <div class="login-page__form__input-box input-field">
                          <input type="email" id="email" name="email"
                            placeholder="{{ localize('Enter your email') }}" class="theme-input"
                            value="{{ old('email') }}" required>
                          <span class="icon-email"></span>
                        </div><!-- /.login-page__form__input-box -->
                      </div>

                      <div class="col-sm-12">
                        <div class="login-page__form__input-box input-field">
                          <input type="text" id="phone" name="phone"
                            placeholder="{{ localize('Enter Phone number with country code') }}" class="theme-input"
                            value="{{ old('phone') }}" @if (getSetting('registration_with') == 'email_and_phone') required @endif>
                          <span class="icon-mobile"></span>
                        </div><!-- /.login-page__form__input-box -->
                      </div>

                      <div class="col-sm-12">
                        <div class="login-page__form__input-box input-field check-password">
                          <input type="password" name="password" id="password"
                            placeholder="{{ localize('Password') }}" class="login-page__password theme-input" required>
                          <span class="icon-padlock"></span>
                          <i class="toggle-password pass-field-icon fa fa-fw fa-eye-slash"></i>
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="login-page__form__input-box input-field check-password">
                          <input type="password" name="password_confirmation"
                            placeholder="{{ localize('Confirm Password') }}" class="login-page__password theme-input"
                            required>
                          <span class="icon-padlock"></span>
                          <i class="toggle-password pass-field-icon fa fa-fw fa-eye-slash"></i>
                        </div>
                      </div>
                    </div>

                    <div class="login-page__form__input-box login-page__form__input-box--bottom mt-2">
                      <div class="login-page__form__checked-box">
                        <input type="checkbox" name="accept-policy" id="accept-policy">
                        <label for="accept-policy"><span></span>I accept company privacy policy.</label>
                      </div>
                    </div><!-- /.login-page__form__input-box -->
                    <div class="row g-4 mt-3">
                      <div class="col-sm-12">
                        <button type="submit" class="boskery-btn login-page__form__btn sign-in-btn"
                          onclick="handleSubmit()">{{ localize('Sign Up') }}</button>
                      </div>

                    </div>
                  </form>

                  <div class="login-page__signin">
                    <h4 class="login-page__signin__title">{{ localize('Already have an Account?') }} <a
                        href="{{ route('login') }}">{{ localize('Log In') }}</a></h4>
                    <!-- /.login-page__signin__title -->
                    <div class="login-page__signin__buttons">
                      @include('frontend.default.inc.social')
                    </div><!-- /.login-page__signin__buttons -->
                  </div><!-- /.login-page__signin -->

                </div><!-- /.register-tab -->
              </div><!-- /.tab-content -->
            </div>
          </div><!-- /.login-page__inner -->
        </div>
      </div>
    </div>
  </section><!-- /.login-page -->
@endsection


@section('scripts')
  <script>
    "use strict";

    // copyAdmin
    function copyAdmin() {
      $('#email').val('admin@themetags.com');
      $('#password').val('123456');
    }

    // copyCustomer
    function copyCustomer() {
      $('#email').val('customer@themetags.com');
      $('#password').val('123456');
    }
    // copyCustomer
    function copyDeliveryMan() {
      $('#email').val('delivery-man@themetags.com');
      $('#password').val('123456');
    }

    // change input to phone
    function handleLoginWithPhone() {
      $('.login_with').val('phone');

      $('.login-email').addClass('d-none');
      $('.login-email input').prop('required', false);

      $('.login-phone').removeClass('d-none');
      $('.login-phone input').prop('required', true);
    }

    // change input to email
    function handleLoginWithEmail() {
      $('.login_with').val('email');
      $('.login-email').removeClass('d-none');
      $('.login-email input').prop('required', true);

      $('.login-phone').addClass('d-none');
      $('.login-phone input').prop('required', false);
    }


    // disable login button
    function handleSubmit() {
      $('#login-form').on('submit', function(e) {
        $('.sign-in-btn').prop('disabled', true);
      });
    }
  </script>
@endsection
