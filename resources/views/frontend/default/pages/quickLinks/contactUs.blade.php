@extends('frontend.default.layouts.master')

@section('title')
  {{ localize('Conatct Us') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('breadcrumb-contents')
  <div class="breadcrumb-content">
    <h2 class="mb-2 text-center">{{ localize('Get In Touch') }}</h2>
    <nav>
      <ol class="breadcrumb justify-content-center">
        <li class="breadcrumb-item fw-bold" aria-current="page"><a href="{{ route('home') }}">{{ localize('Home') }}</a></li>
        <li class="breadcrumb-item fw-bold" aria-current="page"><a
            href="{{ route('home.pages.contactUs') }}">{{ localize('Contact Us') }}</a></li>
      </ol>
    </nav>
  </div>
@endsection

@section('contents')
  <!--breadcrumb-->
  @include('frontend.default.inc.breadcrumb')
  <!--breadcrumb-->
  <!--contact us section start-->
  <section class="contact-page section-space-top">
    <div class="container">
      <div class="contact-page__wrapper">
        <div class="contact-page__content">
          <div class="contact-page__sec-title">
            <h3 class="mb-6">{{ localize('Need Help? Send Message') }}</h3>
          </div><!-- /.contact-page__sec-title -->
          <form action="{{ route('contactUs.store') }}" method="POST" id="contact-form"
            class="contact-page__form contact-form-validated form-one">
            @csrf
            {{-- {!! RecaptchaV3::field('recaptcha_token') !!} --}}
            <div class="row g-4">

              <div class="col-sm-12">
                <div class="label-input-field">
                  <label>{{ localize('Name') }}</label>
                  <input type="text" name="name" placeholder="{{ localize('Your name') }}" required>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="label-input-field">
                  <label>{{ localize('Email') }}</label>
                  <input type="email" name="email" placeholder="{{ localize('You email') }}" required>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="label-input-field">
                  <label>{{ localize('Phone') }}</label>
                  <input type="text" name="phone" placeholder="{{ localize('You phone') }}" required>
                </div>
              </div>

              <div class="col-12">
                <div class="checkbox-fields d-flex align-items-center gap-3 flex-wrap my-2">
                  <div class="single-field d-inline-flex align-items-center gap-2">
                    <div class="theme-checkbox">
                      <input type="radio" name="support_for" value="delivery_problem" checked>
                      <span class="checkbox-field"><i class="fas fa-check"></i></span>
                    </div>
                    <label class="text-dark fw-semibold">{{ localize('Delivery Problem') }}</label>
                  </div>
                  <div class="single-field d-inline-flex align-items-center gap-2">
                    <div class="theme-checkbox">
                      <input type="radio" name="support_for" value="customer_service">
                      <span class="checkbox-field"><i class="fas fa-check"></i></span>
                    </div>
                    <label class="text-dark fw-semibold">{{ localize('Customer Service') }}</label>
                  </div>
                  <div class="single-field d-inline-flex align-items-center gap-2">
                    <div class="theme-checkbox">
                      <input type="radio" name="support_for" value="other_service">
                      <span class="checkbox-field"><i class="fas fa-check"></i></span>
                    </div>
                    <label class="text-dark fw-semibold">{{ localize('Others Service') }}</label>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="label-input-field">
                  <label>{{ localize('Messages') }}</label>
                  <textarea name="message" placeholder="{{ localize('Write your message') }}" rows="6" required></textarea>
                </div>
              </div>
            </div>
            <div class="form-one__control form-one__control--full wow fadeInUp mt-6" data-wow-duration="1500ms"
              data-wow-delay="150ms">
              <button type="submit" class="boskery-btn">
                <span class="boskery-btn__hover"></span>
                <span class="boskery-btn__hover"></span>
                <span class="boskery-btn__hover"></span>
                <span class="boskery-btn__hover"></span>
                <span class="boskery-btn__hover"></span>
                <span class="boskery-btn__hover"></span>
                <span class="boskery-btn__text">{{ localize('Send Message') }}</span>
                <i class="icon-meat-3"></i>
              </button>
            </div>
          </form>

          <div class="result"></div>
        </div>
        <div class="contact-page__image wow fadeInRight" data-wow-duration="1500ms">
          <img src="{{ staticAsset('frontend/freshmeat/assets/images/resources/contact-1-1.jpg') }}" alt="contact">
        </div><!-- /.contact-page__image -->
      </div><!-- /.contact-page__wrapper -->
    </div><!-- /.container -->
  </section><!-- /.contact-page section-space-top -->

  <section class="contact-info section-space-bottom">
    <div class="contact-info__bg boskery-jarallax" data-jarallax data-speed="0.3"
      data-background="{{ staticAsset('frontend/freshmeat/assets/images/backgrounds/contact.jpg') }}"></div>
    <!-- /.contact-info__bg -->
    <div class="container">
      <div class="row gutter-y-30">
        <div class="col-lg-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
          <div class="contact-info__contact">
            <div class="contact-info__contact__bg"
              data-background="{{ staticAsset('frontend/freshmeat/assets/images/shapes/contact-bg-1-1.png') }}"></div>
            <!-- /.contact-info__contact__bg -->
            <div class="contact-info__contact__content">
              <div class="contact-info__top">
                <h4 class="contact-info__title">You’re always welcome to visit us</h4><!-- /.contact-info__title -->
                <p class="contact-info__text">Our friendly staff will be happy to assist you with any questions or
                  concerns you may have.</p><!-- /.contact-info__text -->
              </div><!-- /.contact-info__top -->
              <div class="contact-info__contact-list">
                <div class="contact-info__contact-list__item">
                  <span
                    class="contact-info__contact-list__icon icon-phone-call"></span><!-- /.contact-info__contact-list__icon -->
                  <div class="contact-info__contact-list__content">
                    <span class="contact-info__contact-list__title">call
                      now</span><!-- /.contact-info__contact-list__title -->
                    <a href="tel:{{ getSetting('navbar_contact_number') }}"
                      class="contact-info__contact-list__link">{{ getSetting('navbar_contact_number') }}</a><!-- /.contact-info__contact-list__link -->
                  </div><!-- /.contact-info__contact-list__content -->
                </div><!-- /.contact-info__contact-list__item -->
                <div class="contact-info__contact-list__item">
                  <span
                    class="contact-info__contact-list__icon icon-paper-plane"></span><!-- /.contact-info__contact-list__icon -->
                  <div class="contact-info__contact-list__content">
                    <span
                      class="contact-info__contact-list__title">email</span><!-- /.contact-info__contact-list__title -->
                    <a href="mailto:{{ getSetting('topbar_email') }}"
                      class="contact-info__contact-list__link">{{ getSetting('topbar_email') }}</a><!-- /.contact-info__contact-list__link -->
                  </div><!-- /.contact-info__contact-list__content -->
                </div><!-- /.contact-info__contact-list__item -->
                <div class="contact-info__contact-list__item">
                  <span
                    class="contact-info__contact-list__icon icon-maps-and-flags"></span><!-- /.contact-info__contact-list__icon -->
                  <div class="contact-info__contact-list__content">
                    <span
                      class="contact-info__contact-list__title">{{ getSetting('topbar_location') }}</span><!-- /.contact-info__contact-list__title -->
                    <a href="https://maps.app.goo.gl/BGEEPPnogKLavEVV8"
                      class="contact-info__contact-list__link">{{ getSetting('topbar_location') }}</a><!-- /.contact-info__contact-list__link -->
                  </div><!-- /.contact-info__contact-list__content -->
                </div><!-- /.contact-info__contact-list__item -->
              </div><!-- /.contact-info__contact-list -->
            </div><!-- /.contact-info__contact__content -->
          </div><!-- /.contact-info__contact -->
        </div><!-- /.col-lg-6 -->
        <div class="col-lg-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="200ms">
          <div class="contact-info__business-hours">
            <div class="contact-info__business-hours__bg"
              data-background="{{ staticAsset('frontend/freshmeat/assets/images/shapes/contact-bg-1-2.png') }}"></div>
            <!-- /.contact-info__business-hours__bg -->
            <div class="contact-info__business-hours__content">
              <div class="contact-info__top contact-info__top--business-hours">
                <h4 class="contact-info__title contact-info__title--business-hours">Our business hours</h4>
                <!-- /.contact-info__title -->
                <p class="contact-info__text contact-info__text--business-hours">Our friendly staff will be happy to
                  assist you with any questions or concerns you may have.</p><!-- /.contact-info__text -->
              </div><!-- /.contact-info__top -->
              <div class="table-responsive">
                <table class="table contact-info__business-hours__table">
                  <tbody>
                    <tr>
                      <td class="table__left-data"><i class="icon-check"></i>Monday</td>
                      <td class="table__border">
                        <div class="table__border__line"></div><!-- /.table__border -->
                      </td>
                      <td class="table__right-data">10:00AM - 07:00PM</td>
                    </tr>
                    <tr>
                      <td class="table__left-data"><i class="icon-check"></i>Tuesday</td>
                      <td class="table__border">
                        <div class="table__border__line"></div><!-- /.table__border -->
                      </td>
                      <td class="table__right-data">10:00AM - 07:00PM</td>
                    </tr>
                    <tr>
                      <td class="table__left-data"><i class="icon-check"></i>Wednesday</td>
                      <td class="table__border">
                        <div class="table__border__line"></div><!-- /.table__border -->
                      </td>
                      <td class="table__right-data">10:00AM - 07:00PM</td>
                    </tr>
                    <tr>
                      <td class="table__left-data"><i class="icon-check"></i>Thursday</td>
                      <td class="table__border">
                        <div class="table__border__line"></div><!-- /.table__border -->
                      </td>
                      <td class="table__right-data">10:00AM - 07:00PM</td>
                    </tr>
                    <tr>
                      <td class="table__left-data"><i class="icon-check"></i>Friday</td>
                      <td class="table__border">
                        <div class="table__border__line"></div><!-- /.table__border -->
                      </td>
                      <td class="table__right-data">10:00AM - 07:00PM</td>
                    </tr>
                    <tr>
                      <td class="table__left-data"><i class="icon-check"></i>Saturday</td>
                      <td class="table__border">
                        <div class="table__border__line"></div><!-- /.table__border -->
                      </td>
                      <td class="table__right-data">closed</td>
                    </tr>
                  </tbody>
                </table><!-- /.table -->
              </div><!-- /.table-responsive -->
            </div><!-- /.contact-info__business-hours__content -->
          </div><!-- /.contact-info__business-hours -->
        </div><!-- /.col-lg-6 -->
      </div><!-- /.row -->
    </div><!-- /.container -->
  </section><!-- /.contact-info section-space-bottom -->

  <section class="contact-map">
    <div class="container-fluid">
      <div class="google-map google-map__contact">
        <iframe title="template google map"
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3606.5663457229693!2d55.39568628685958!3d25.31876996910791!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f5b8fa912d36b%3A0x3ad8225aeed4ec04!2sBMW%20ROAD!5e0!3m2!1sen!2sbd!4v1712352488380!5m2!1sen!2sbd"
          class="map__contact" allowfullscreen></iframe>
      </div>
      <!-- /.google-map -->
    </div><!-- /.container-fluid -->
  </section><!-- /.contact-map -->
  <!--contact us section end-->
@endsection
