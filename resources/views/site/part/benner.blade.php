<div id="banner-area" class="banner-area" style="background-image:url({{ asset('siteasset/images/banner/banner1.jpg') }})">
  <div class="banner-text">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <div class="banner-heading">
                <h1 class="banner-title">{{ $titel }}</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                      <li class="breadcrumb-item"><a href="{{ route('site.index') }}">Home</a></li>
                      <li class="breadcrumb-item"><a href="{{ route('site.about') }}">company</a></li>
                      <li class="breadcrumb-item active" aria-current="page">{{ $item }}</li>
                    </ol>
                </nav>
              </div>
          </div><!-- Col end -->
        </div><!-- Row end -->
    </div><!-- Container end -->
  </div><!-- Banner text end -->
</div><!-- Banner area end -->
