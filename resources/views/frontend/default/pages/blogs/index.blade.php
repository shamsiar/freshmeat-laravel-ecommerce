@extends('frontend.default.layouts.master')

@section('title')
  {{ localize('Blogs') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('breadcrumb-contents')
  <div class="breadcrumb-content">
    <h2 class="mb-2 text-center">{{ localize('Blogs') }}</h2>
    <nav>
      <ol class="breadcrumb justify-content-center">
        <li class="breadcrumb-item fw-bold" aria-current="page"><a href="{{ route('home') }}">{{ localize('Home') }}</a></li>
        <li class="breadcrumb-item fw-bold" aria-current="page"><a
            href="{{ route('home.blogs') }}">{{ localize('Blogs') }}</a></li>
      </ol>
    </nav>
  </div>
@endsection

@section('contents')
  <!--breadcrumb-->
  @include('frontend.default.inc.breadcrumb')
  <!--breadcrumb-->

  <!--blog details start-->
  <section class="blog-listing-section ptb-120">
    <div class="container">
      <div class="row g-4">
        <div class="col-xl-8">
          <div class="row gutter-y-30">
            @foreach ($blogs as $blog)
              <div class="col-md-6 col-lg-6">
                <div class="blog-card wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='000ms'>
                  <div class="blog-card__content">
                    <div class="blog-card__top">
                      <div class="blog-card__date fs-sm fw-medium w-50">{{ date('M d, Y', strtotime($blog->created_at)) }}
                      </div>
                      <!-- /.blog-card__date -->
                      <ul class="list-unstyled blog-card__meta">
                        {{-- <li><a href="#" class="fs-md fw-medium">
                            <span class="icon-user"></span>
                            by Admin</a></li> --}}
                        <li><i class="fa-solid fa-tags me-1 mt-3"
                            style="color: #a42125"></i>{{ optional($blog->blog_category)->name }}</a></li>
                      </ul><!-- /.list-unstyled blog-card__meta -->
                    </div><!-- /.blog-card__top -->

                    <div class="blog-card__image">
                      <img src="{{ uploadedAsset($blog->banner) }}" alt="{{ $blog->collectLocalization('title') }}">
                      <a href="{{ route('home.blogs.show', $blog->slug) }}" class="blog-card__hover">
                        <span class="sr-only">{{ $blog->collectLocalization('title') }}</span>
                        <div class="blog-card__hover__box blog-card__hover__box--1"></div>
                        <div class="blog-card__hover__box blog-card__hover__box--2"></div>
                        <div class="blog-card__hover__box blog-card__hover__box--3"></div>
                        <div class="blog-card__hover__box blog-card__hover__box--4"></div>
                      </a>
                    </div><!-- /.blog-card__image -->

                    <h3 class="blog-card__title"><a
                        href="{{ route('home.blogs.show', $blog->slug) }}">{{ $blog->collectLocalization('title') }}</a>
                    </h3><!-- /.blog-card__title -->
                  </div><!-- /.blog-card__content -->
                  <a href="{{ route('home.blogs.show', $blog->slug) }}" class="blog-card__link">
                    Read more
                    <span class="icon-right"></span>
                  </a><!-- /.blog-card__link -->
                </div><!-- /.blog-card -->
            @endforeach

            <div class="mt-5">
              {{ $blogs->appends(request()->input())->links() }}
            </div>

          </div><!-- /.col-md-6 col-lg-4 -->
        </div>
      </div>
      <div class="col-xl-4">
        @include('frontend.default.pages.partials.blogs.blogSidebar')
      </div>
    </div>

    </div>
  </section>
  <!--blog details end-->
@endsection
