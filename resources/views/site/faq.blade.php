@extends('site.master')
@section('titel','Faq | '.env('APP_NAME'))
@section('content')
@include('site.part.benner',['titel'=>'Faq','item'=>'Faq'])


<section id="main-container" class="main-container">
  <div class="container">

    <div class="row">
      <div class="col-lg-8">
        <h3 class="border-title border-left mar-t0">Construction general</h3>

        <div class="accordion accordion-group accordion-classic" id="construction-accordion">
            @foreach ($faqs as $faq)
              @include('site.part.cart',['number'=>$faq->id.'1'])
            @endforeach

        </div>
        <!--/ Accordion end -->

        <div class="gap-40"></div>

        <h3 class="border-title border-left">Safety</h3>

        <div class="accordion accordion-group accordion-classic" id="safety-accordion">
            @foreach ($faqs as $faq)
              @include('site.part.cart',['number'=>$faq->id.'2'])
            @endforeach

        </div>
        <!--/ Accordion end -->

      </div><!-- Col end -->

      <div class="col-lg-4 mt-5 mt-lg-0">

        <div class="sidebar sidebar-right">
          <div class="widget recent-posts">
            <h3 class="widget-title">Recent Posts</h3>
            <ul class="list-unstyled">
                @foreach ($posts as $post)
                    <li class="d-flex align-items-center">
                        <div class="posts-thumb">
                        <a href="#"><img loading="lazy" alt="news-image" src="{{ asset('image/posts/'.$post->image) }}"></a>
                        </div>
                        <div class="post-info">
                        <h4 class="entry-title">
                            <a href="#">{{ $post->content}}</a>
                        </h4>
                        </div>
                    </li><!-- 1st post end-->
                @endforeach
            </ul>

          </div><!-- Recent post end -->
        </div><!-- Sidebar end -->

      </div><!-- Col end -->

    </div><!-- Content row end -->

  </div><!-- Container end -->
</section><!-- Main container end -->

 @stop
