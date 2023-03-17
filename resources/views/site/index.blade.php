@extends('site.master')
@section('titel','Home | '.env('APP_NAME'))
@section('content')

<div class="banner-carousel banner-carousel-2 mb-0">
    @foreach ($sliders as $slider)
        <div class="banner-carousel-item" style="background-image:url({{ asset('siteasset/images/slider-main/bg5.jpg') }})">
            @if($loop->index==1)
             <div class="slider-content text-left">
            @endif
                <div class="container">
                <div class="box-slider-content">
                    <div class="box-slider-text">
                        <h2 class="box-slide-title">{{ $slider->titel }}</h2>
                        <h3 class="box-slide-sub-title">{{ $slider->sub_titel }}</h3>
                        <p class="box-slide-description">{{ $slider->description }}</p>
                        <p>@php
                            if($slider->btn_url=='ser')
                              $btn = 'site.services';
                            else {
                              $btn = 'site.about';
                            }
                        @endphp<a href="{{ route( $btn) }}" class="slider btn btn-primary" aria-label="about-us">{{ $slider->btn }}</a></p>
                    </div>
                </div>
                </div>
              @if($loop->index==1)
                 </div>
              @endif

        </div>
    @endforeach
</div>

<section class="call-to-action no-padding">
  <div class="container">
    <div class="action-style-box">
        <div class="row">
          <div class="col-md-8 text-center text-md-left">
              <div class="call-to-action-text">
                <h3 class="action-title">We understand your needs on construction</h3>
              </div>
          </div><!-- Col end -->
          <div class="col-md-4 text-center text-md-right mt-3 mt-md-0">
              <div class="call-to-action-btn">
                <a class="btn btn-primary" href="{{ route('site.contact') }}">Request Quote</a>
              </div>
          </div><!-- col end -->
        </div><!-- row end -->
    </div><!-- Action style box -->
  </div><!-- Container end -->
</section><!-- Action end -->

<section id="ts-features" class="ts-features pb-2">
  <div class="container">
    <div class="row">
        @foreach ($services as $service)
        <div class="col-lg-4 col-md-6 mb-5">
            <div class="ts-service-box">
                <div class="ts-service-image-wrapper">
                  <img loading="lazy" class="w-100" src="{{ asset('image/services/'.$service->image) }}" alt="service-image">
                </div>
                <div class="d-flex">
                  <div class="ts-service-box-img">
                      <img loading="lazy"  width="60" src="{{ asset('image/services/'.$service->image) }}" alt="service-icon" />
                  </div>
                  <div class="ts-service-info">
                      <h3 class="service-box-title"><a href="{{ route('site.service-single',$service->id) }}">{{ $service->titel }}</h3>
                      <p>{{ $service->small_description }}</p>
                      <a class="learn-more d-inline-block" href="{{ route('site.service-single',$service->id) }}" aria-label="service-details"><i class="fa fa-caret-right"></i>Learn more</a>
                  </div>
                </div>
            </div>
          </div>
        @endforeach
    </div><!-- Content row end -->
  </div><!-- Container end -->
</section><!-- Feature are end -->

<section id="facts" class="facts-area dark-bg">
  <div class="container">
    <div class="facts-wrapper">
        <div class="row">
            @foreach ($facts as $fact)
            <div class="col-md-3 col-sm-6 ts-facts {{ $loop->index==0?'':'mt-sm-0'}}">
                <div class="ts-facts-img">
                  <img loading="lazy" width="60" src="{{ asset('image/facts/'.$fact->icoun) }}" alt="facts-img">
                </div>
                <div class="ts-facts-content">
                  <h2 class="ts-facts-num"><span class="counterUp" data-count="{{ $fact->count }}">0</span></h2>
                  <h3 class="ts-facts-title">{{ $fact->titel }}</h3>
                </div>
            </div>
            @endforeach
        </div> <!-- Facts end -->
    </div>
    <!--/ Content row end -->
  </div>
  <!--/ Container end -->
</section><!-- Facts end -->

<section id="ts-service-area" class="ts-service-area pb-0">
  <div class="container">
    <div class="row text-center">
        <div class="col-12">
          <h2 class="section-title">We Are Specialists In</h2>
          <h3 class="section-sub-title">What We Do</h3>
        </div>
    </div>
    <!--/ Title row end -->

    <div class="row">
        <div class="col-lg-4">
            @foreach ( $services as $service )
            <div class="ts-service-box d-flex">
                <div class="ts-service-box-img">
                  <img loading="lazy" width="50" src="{{ asset('image/services/'.$service->image) }}" alt="service-icon">
                </div>
                <div class="ts-service-box-info">
                  <h3 class="service-box-title"><a href="{{ route('site.service-single',$service->id) }}">{{ $service->titel }}</a></h3>
                  <p>{{ $service->small_description }}</p>
                </div>
            </div>
            @endforeach
        </div><!-- Col end -->

        <div class="col-lg-4 text-center">
          <img loading="lazy" class="img-fluid" src="{{ asset('siteasset/images/services/service-center.jpg') }}" alt="service-avater-image">
        </div><!-- Col end -->

        <div class="col-lg-4 mt-5 mt-lg-0 mb-4 mb-lg-0">
            @foreach ( $services as $service )
            <div class="ts-service-box d-flex">
                <div class="ts-service-box-img">
                  <img loading="lazy" width="50" src="{{ asset('image/services/'.$service->image) }}" alt="service-icon">
                </div>
                <div class="ts-service-box-info">
                  <h3 class="service-box-title"><a href="{{ route('site.service-single',$service->id) }}">{{ $service->titel }}</a></h3>
                  <p>{{ $service->small_description }}</p>
                </div>
            </div>
            @endforeach

        </div><!-- Col end -->
    </div><!-- Content row end -->

  </div>
  <!--/ Container end -->
</section><!-- Service end -->

<section id="project-area" class="project-area solid-bg">
  <div class="container">
    <div class="row text-center">
      <div class="col-lg-12">
        <h2 class="section-title">Work of Excellence</h2>
        <h3 class="section-sub-title">Recent Projects</h3>
      </div>
    </div>
    <!--/ Title row end -->

    <div class="row">
      <div class="col-12">
        <div class="shuffle-btn-group">
          <label class="active" for="all">
            <input type="radio" name="shuffle-filter" id="all" value="all" checked="checked">Show All
          </label>
          @foreach ($projects as $project )
          <label for="{{ $project->name }}">
            <input type="radio" name="shuffle-filter" id="{{ $project->name }}" value="{{ $project->name }}">{{ $project->name }}
          </label>
          @endforeach
        </div><!-- project filter end -->

        <div class="row shuffle-wrapper">
          <div class="col-1 shuffle-sizer"></div>
          @foreach ($details as $detail)
            <div class="col-lg-4 col-md-6 shuffle-item" data-groups="[&quot;{{ $detail->project->name }}&quot;]">
                <div class="project-img-container">
                <a class="gallery-popup" href="{{ asset('image/detailes/'. $detail->image) }}" aria-label="project-img">
                    <img class="img-fluid" src="{{ asset('image/detailes/'. $detail->image) }}" alt="project-img">
                    <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                </a>
                <div class="project-item-info">
                    <div class="project-item-info-content">
                    <h3 class="project-item-title">
                        <a href="{{ route('site.project-single',$detail->id) }}">{{ $detail->name }}</a>
                    </h3>
                    <p class="project-cat">{{ $detail->project->name }}</p>
                    </div>
                </div>
                </div>
            </div>
          @endforeach
        </div>
      </div>

      <div class="col-12">
        <div class="general-btn text-center">
          <a class="btn btn-primary" href="{{ route('site.projects') }}">View All Projects</a>
        </div>
      </div>

    </div><!-- Content row end -->
  </div>
  <!--/ Container end -->
</section><!-- Project area end -->

<section class="content">
  <div class="container">
    <div class="row">
        <div class="col-lg-6">
          <h3 class="column-title">Testimonials</h3>

          <div id="testimonial-slide" class="testimonial-slide">
            @foreach ($testimonials as $testimonial)
                <div class="item">
                    <div class="quote-item">
                        <span class="quote-text">{{ $testimonial->text }} </span>
                        <div class="quote-item-footer">
                        <img loading="lazy" class="testimonial-thumb" src="{{ asset('image/testimonials/'. $testimonial->image) }}" alt="testimonial">
                        <div class="quote-item-info">
                            <h3 class="quote-author">{{ $testimonial->author }}</h3>
                            <span class="quote-subtext">{{ $testimonial->sub_text }}</span>
                        </div>
                        </div>
                    </div>
                </div>
            @endforeach
          </div>
          <!--/ Testimonial carousel end-->
        </div><!-- Col end -->

        <div class="col-lg-6 mt-5 mt-lg-0">

          <h3 class="column-title">Happy Clients</h3>

          <div class="row all-clients">
            @foreach ($clients as $client)
              <div class="col-sm-4 col-6">
                    <figure class="clients-logo">
                        <a href="#!"><img loading="lazy" class="img-fluid" src="{{ asset('image/clients/'.$client->image) }}" alt="clients-logo" /></a>
                    </figure>
              </div><!-- Client 1 end -->
            @endforeach
          </div>
        </div>

    </div>
    <!--/ Content row end -->
  </div>
  <!--/ Container end -->
</section><!-- Content end -->

<section class="subscribe no-padding">
  <div class="container">
    <div class="row">
        <div class="col-lg-4">
          <div class="subscribe-call-to-acton">
            <a href="tel:847-291-4353">
                <h3>Can We Help?</h3>
                <h4>(+9) 847-291-4353</h4></a>
          </div>
        </div><!-- Col end -->

        <div class="col-lg-8">
          <div class="ts-newsletter row align-items-center">
              <div class="col-md-5 newsletter-introtext">
                <h4 class="text-white mb-0">Newsletter Sign-up</h4>
                <p class="text-white">Latest updates and news</p>
              </div>

              <div class="col-md-7 newsletter-form">
                <form action="#" method="post">
                    <div class="form-group">
                      <label for="newsletter-email" class="content-hidden">Newsletter Email</label>
                      <input type="email" name="email" id="newsletter-email" class="form-control form-control-lg" placeholder="Your your email and hit enter" autocomplete="off">
                    </div>
                </form>
              </div>
          </div><!-- Newsletter end -->
        </div><!-- Col end -->

    </div><!-- Content row end -->
  </div>
  <!--/ Container end -->
</section>
<!--/ subscribe end -->

<section id="news" class="news">
  <div class="container">
    <div class="row text-center">
        <div class="col-12">
          <h2 class="section-title">Work of Excellence</h2>
          <h3 class="section-sub-title">Recent posts</h3>
        </div>
    </div>
    <!--/ Title row end -->

    <div class="row">
        @foreach ($posts as $post)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="latest-post">
                    <div class="latest-post-media">
                    <a href="{{ route('site.news-single',$post->id) }}" class="latest-post-img">
                        <img loading="lazy" class="img-fluid" src="{{ asset('image/posts/'.$post->image) }}" alt="img">
                    </a>
                    </div>
                    <div class="post-body">
                    <h4 class="post-title">
                        <a href="{{ route('site.news-single',$post->id) }}" class="d-inline-block">{{ $post->titel }}</a>
                    </h4>
                    <div class="latest-post-meta">
                        <span class="post-item-date">
                            <i class="fa fa-clock-o"></i> {{ $post->created_at }}
                        </span>
                    </div>
                    </div>
                </div><!-- Latest post end -->
            </div>
        @endforeach
    </div>
    <!--/ Content row end -->

    <div class="general-btn text-center mt-4">
        <a class="btn btn-primary" href="{{ route('site.news') }}">See All Posts</a>
    </div>

  </div>
  <!--/ Container end -->
</section>
<!--/ News end -->
@stop
