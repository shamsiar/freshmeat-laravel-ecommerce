@extends('frontend.default.layouts.master')

@section('title')
  {{ localize('Blog Details') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('breadcrumb-contents')
  <div class="breadcrumb-content">
    <h2 class="mb-2 text-center">{{ $blog->collectLocalization('title') }}</h2>
    <nav>
      <ol class="breadcrumb justify-content-center">
        <li class="breadcrumb-item fw-bold" aria-current="page"><a href="{{ route('home') }}">{{ localize('Home') }}</a></li>
        <li class="breadcrumb-item fw-bold" aria-current="page"><a
            href="{{ route('home.blogs') }}">{{ localize('Blogs') }}</a></li>
        <li class="breadcrumb-item fw-bold" aria-current="page">{{ localize('Blog Details') }}</li>
      </ol>
    </nav>
  </div>
@endsection

@section('contents')
  <!--breadcrumb-->
  @include('frontend.default.inc.breadcrumb')
  <!--breadcrumb-->

  <!--blog details start-->
  <section class="blog-details ptb-120">
    <div class="container">
      <div class="row g-4">
        <div class="col-xl-8">

          <div class="blog-details">
            <div class="blog-card blog-card--four rounded-2 wow fadeInUp shadow" data-wow-delay="00ms"
              data-wow-duration="1500ms">

              <div class="blog-card__image">
                <img src="{{ uploadedAsset($blog->banner) }}" alt="{{ $blog->collectLocalization('title') }}"
                  class="img-fluid">
                <div class="blog-card__date p-3">{{ date('M d, Y', strtotime($blog->created_at)) }}</div>
                <div class="position-absolute top-0 end-0 p-3 text-center text-light fs-md fw-bold"
                  style="background-color: var(--boskery-base, #a42125);">
                  {{ optional($blog->blog_category)->name }}
                </div>
                <!-- /.blog-card__date -->
              </div><!-- /.blog-card__image -->

              <div class="blog-card__content p-3">
                <h3 class="blog-card__title">{{ $blog->collectLocalization('title') }}</h3>
                <!-- /.blog-card__title -->

                <div class="blog-card__content__inner blog-details-content">
                  <span class="hr-line w-100 position-relative d-block my-4"></span>
                  {!! $blog->collectLocalization('description') !!}
                </div><!-- /.blog-card__content__inner -->

                <div class="blog-details__meta p-3">
                  <div class="blog-details__tags">
                    {{-- <div class="tags-social d-flex align-items-center justify-content-between flex-wrap gap-4 mt-6"> --}}
                    <div class="tags-list d-flex align-items-center gap-2 flex-wrap">
                      <span class="title text-secondary fw-bold me-2">Tags:</span>

                      @foreach ($blog->tags as $tag)
                        <a href="javacript:void(0);">{{ $tag->name }}</a>
                      @endforeach
                    </div>
                  </div><!-- /.blog-details__tag__box-->
                  <div class="blog-details__social">
                    <h4 class="blog-details__meta__title">Share:</h4><!-- /.blog-details__meta__title -->
                    <div class="boskery-social">
                      <a href="https://facebook.com">
                        <i class="fab fa-facebook-f" aria-hidden="true"></i>
                        <span class="sr-only">Facebook</span>
                      </a>
                      <a href="https://twitter.com">
                        <i class="fab fa-twitter" aria-hidden="true"></i>
                        <span class="sr-only">Twitter</span>
                      </a>
                      <a href="https://linkedin.com">
                        <i class="fab fa-linkedin-in" aria-hidden="true"></i>
                        <span class="sr-only">Linkedin</span>
                      </a>
                      <a href="https://youtube.com" aria-hidden="true">
                        <i class="fab fa-youtube"></i>
                        <span class="sr-only">Youtube</span>
                      </a>
                    </div><!-- /.social-link -->
                  </div><!-- /.blog-details__social -->
                </div><!-- /.blog-details__tags -->
              </div><!-- /.blog-card-four__content -->
            </div><!-- /.blog-card -->
          </div>

        </div><!-- /.blog-details__meta -->

        <div class="col-xl-4">
          @include('frontend.default.pages.partials.blogs.blogSidebar')
        </div>
      </div>
  </section>
  <!--blog details end-->
@endsection
