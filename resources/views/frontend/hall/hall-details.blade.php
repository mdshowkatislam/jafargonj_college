@extends('frontend.hall.landing-app')
@php
   $design      = DB::table('cms_theme_designs')->where('page_id', '1')->where('page_tab_id', '1')->first();
   $json_class  = json_decode(@$design->custom_class, true);
   $json_style  = json_decode(@$design->custom_style, true);
@endphp

@php
$page_title = @$halls->name;
$url=request()->route()->getName();
@endphp

@section('title', $page_title)

@section('content')
@include('frontend/hall/hall_header')

<style>
  .butex-font{
    font-family: "Titillium Web", sans-serif;
  }
  .hall-slider-top {
    margin-top: 50px; 
    height:auto;
  }
  @media only screen and (max-width: 600px) {
    .hall-slider-top {
      margin-top: 80px; 
      height:auto;
    }
  }
  .container .row .footer-text .custom-font-titillium-web {
    float: inline-end;
  }
</style>


<!--========== hero slider ================-->
<div style="" id="carouselExampleCaptions" class="carousel slide hall-slider-top" data-bs-ride="carousel">
  <div class="carousel-indicators">
    @if(count($slider_images) > 0)
    @foreach($slider_images as $index => $image)
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}" aria-current="{{ $index == 0 ? 'true' : '' }}" aria-label="Slide {{ $index + 1 }}"></button>
    @endforeach
    @else
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" aria-label="Slider"></button>

  </div>
  @endif
</div>

<div style="height:auto;" class="carousel-inner">
  @foreach($slider_images as $index => $image)

  <div class="carousel-item {{ $loop->iteration == 1 ? 'active' : '' }}">
    <img src="{{asset('upload/slider/'.$image->image)}}" class="d-block w-100" alt="{{$index +1}}">
    <div class="carousel-caption d-none d-md-block">
      {!!$image->text_on_banner!!}
    </div>
  </div>
  @endforeach
</div>

<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  <span class="visually-hidden">Previous</span>
</button>
<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
  <span class="carousel-control-next-icon" aria-hidden="true"></span>
  <span class="visually-hidden">Next</span>
</button>
</div>
<!-- hero slider -->

{{-- @dd($halls->provostProfile->designation) --}}
@if ($halls->provost)
<section class="about bg-white">
  <div class="container">
    <div class="row my-2">
      {{-- <div class="col-md-4 mb-md-0">
        <div class="round-image">
          <img class="img-fluid w-100" src="{{ @$halls->provostProfile->photo ?asset('upload/profiles/'.@$halls->provostProfile->photo): asset('dummy/profile_dummy.png') }}" onerror="this.onerror=null;this.src='{{ asset('dummy/profile_dummy.png') }}';" alt="about image" />
        </div>
      </div> --}}

      <div class="col-md-4 col-sm-12">
        <div class="text-center bg-light shadow" style="height: 450px">
            <div class="img p-4" style="height:330px;">
                <img class="rounded w-100 h-100"
                    src="{{ asset('upload/profiles/' . @$halls->provostProfile->photo) }}"
                    onerror="this.onerror=null;this.src='{{ asset('dummy/user-dummy.jpeg') }}';" />
                
            </div>
            <div class="text-center px-3 pb-3 bg-light rounded" style="height: 120px">
                <div class="border-top pt-3">
                    <a href="#" class="fw-bold fs-5 mb-0 lh-sm faculty-title butex-font" style="color: #00C5BF;">{{ @$halls->provostProfile->nameEn }}
                    </a>
                    <p class="fw-bold text-center common-font-color fs-6 mb-1 pt-2 butex-font">
                        {{ @$halls->provostProfile->designation }}
                    </p>
                </div>
            </div>
        </div>
        {{-- <img class="rounded-circle" src="{{  @$vcInfo->profile->photo ? asset('upload/profiles/' . @$vcInfo->profile->photo) :  @$vcInfo->profile->photo_path }}"/> --}}
      </div>

      <div class="col-md-8 col-sm-12">
        <div class="shadow p-3" style="height: 450px">
          @if(@$message->short_description != null)
          <h3>Message from the Provost of {{ $halls->name }} </h3>
          <p class="text-justify">
            {!! Str::limit(@$message->short_description, 1000, '...') !!}
            {{-- <br> --}}
            {{-- {!!@$message->long_description!!} --}}
          </p>
          @elseif ($halls->provost)
          <h3><span class="text-primary">Provost</span></h3>
          @endif
          <div class="d-inline">
            <h3>{{ @$halls->member->name }}</h3>
  
            @if($halls->additional_designation)
            <b class="text-primary">{{@$halls->additional_designation}}</b> <br />
            @else
            <b class="text-primary">{{@$halls->member->designation->name}}</b> <br />
            @endif
            <a href="{{ route('provost_message', @$halls->id) }}" class="btn btn-sm btn-primary mt-2 float-right">Read More</a>
          </div>
        </div>
        
      </div>

    </div>
  </div>
</section>
@endif


{{-- hall about --}}
<section class="container my-3">
  <div class="card p-4">
    <h6 class="text-center text-uppercase fs-2">
      About
    </h6>
    <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;"></div>
    <div class="card-body mt-2">
      <div class="row">
        <div class="col-md-5">
          <img class="card-img-top" src="{{ asset('upload/hall/'.@$halls->image) }}" onerror="this.onerror=null;this.src='{{ asset('frontend/images/about/dummy.png') }}';" alt="{{@$halls->name}}">
        </div>
        <div class="col-md-7 butex-font">
          {!!@$halls->about_text!!}
        </div>
      </div>
    </div>
  </div>
</section>
{{-- hall about --}}



<section class="container my-3 eventNoticeSection">
  <style>
    /* news design */
    * {
      scrollbar-width: thin;
      scrollbar-color: #888 #f1f1f1;
    }
    .single-news {
        position: relative;
        -webkit-transition: all 800ms ease;
        -moz-transition: all 800ms ease;
        -ms-transition: all 800ms ease;
        -o-transition: all 800ms ease;
        transition: all 800ms ease;

    }

    .single-news:before {
        position: absolute;
        content: '';
        left: 0px;
        bottom: 0px;
        width: 0px;
        height: 5px;
        background-color: #00c5bf;
        -webkit-transition: all 800ms ease;
        -moz-transition: all 800ms ease;
        -ms-transition: all 800ms ease;
        -o-transition: all 800ms ease;
        transition: all 800ms ease;
    }

    .single-news:after {
        position: absolute;
        content: '';
        right: 0px;
        bottom: 0px;
        width: 0px;
        height: 5px;
        background-color: #00c5bf;
        -webkit-transition: all 800ms ease;
        -moz-transition: all 800ms ease;
        -ms-transition: all 800ms ease;
        -o-transition: all 800ms ease;
        transition: all 800ms ease;
    }

    .single-news:hover {
        -webkit-transform: translateY(10px);
        -moz-transform: translateY(10px);
        -ms-transform: translateY(10px);
        -o-transform: translateY(10px);
        transform: translateY(10px);
    }

    .single-news:hover::before,
    .single-news:hover::after {
        width: 100%;
    }
    .box-shadow {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    }
    .custom-font-titillium-web {
        font-family: "Titillium Web", "Tiro Bangla", sans-serif !important;
    }
    .home-content-heading {
        color: #002147;
        font-size: 1.75rem !important;
        text-shadow: 0px 3px 4px rgb(0 0 0 / 25%);
        /* font-family: "Work Sans"; */
        font-style: normal;
        font-weight: 600;
        /* line-height: 123.6%; */
    }
    .common-bg-color {
        background: #00c5bf !important;
    }
    .event-area .item .info-box .content h4 {
        font-weight: 600;
        margin-bottom: 20px;
        line-height: 1.4;
        margin-top: -3px;
    }
    .btn-theme {
        background-color: #00c5bf;
        color: #ffffff !important;
        border: #00c5bf;
    }
    .rounded-pill {
        padding: 3px 20px;
        font-size: 14px;
        color: #002147;
        border: 2px solid #00c5bf;
    }
    li {
        list-style: none;
        font-family: "Titillium Web", sans-serif;
        margin-bottom: 5px;
    }
    a {
      color: #002147;
    }
  </style>
  
    <div class="event-area flex-less mt-5">
        <div class="container">
            <div class="row">
                {{-- @if (!empty($events) && $events->count()) --}}
                    <div class="col-sm-12 col-md-12 col-lg-8">
                        {{-- <div class="text-center site-heading">
                            <h2 class="custom-font-titillium-web">Recent and Upcoming Events</h2>
                        </div> --}}

                        <div class="d-flex justify-content-between align-items-end">
                            <h1 class="text-uppercase mb-0 home-content-heading custom-font-titillium-web">Recent and Upcoming Events</h1>
                            {{-- <a href="" class="text-uppercase text-decoration-none fw-bold common-font-color">All</a> --}}
                        </div>
                    
                        <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;"></div>

                        <div class="row">
                            @forelse ($events as $item)
                            <div class="col-md-6 col-lg-6 mb-2 mt-3">
                                <div class="item equal-height box-shadow single-news">
                                    <div class="thumb">
                                        <img src="{{ asset('/upload/news/' . $item->image) }}" style="height:230px; 
                                                        width: 100%;" alt="Thumb" onerror="this.src='{{ asset('upload/no-image.png') }}'">
                                    </div>
                                    <div class="info">
                                        <div class="info-box" style="padding:35px 25px">
                                            <div class="date">
                                                <strong class="custom-font-titillium-web" style="font-size: 30px">{{ date('d', strtotime($item->date)) }}</strong>
                                                {{ date('M Y', strtotime($item->date)) }}
                                            </div>
                                            <br>
                                            <div class="content" style="margin-left: 0px">
                                                <h4 class="text-left" style="height: 120px; word-spacing: 5px; font-size: 15px; text-align: justify;">
                                                  <a class="custom-font-titillium-web" href="{{ route('type.details', ["id"=>$item->id,"type"=>'events']) }}">
                                                    {{ Str::limit($item->title, 120) }}
                                                  </a>
                                                </h4>
                                                <div class="bottom">
                                                    <div class="d-flex justify-content-between align-items-center footer-meta text-center mt-4 pt-4 border-top">
                                                        <div class="btn-group">
                                                          <a href="{{ route('type.details', ["id"=>$item->id,"type"=>'events']) }}">
                                                            <button type="button" class="btn btn-sm rounded-pill"><i class="fas fa-plus" style="color: #1C4370;"></i> Read more</button>
                                                          </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                              @if ($notices->count())
                                <div class="col-md-12" style="height: 568px;">
                                  <h2 class="fs-5 p-3 mt-3  mb-0 bg-light rounded">There are no activities at the moment..</h2>
                                </div>
                              @else
                                <div class="col-md-12">
                                    <h2 class="fs-5 p-3 mt-3  mb-0 bg-light rounded">There are no activities at the moment..</h2>
                                </div>
                              @endif  
                            @endforelse

                                <div class="more-btn text-center my-3">
                                  <a href="{{ route('type.all', ['type' => 'events']) }}" class="btn btn-sm btn-theme rounded effect btn-md custom-font-titillium-web">View All Events</a>
                                </div>

                        </div>
                    </div>
                {{-- @endif --}}

                @if (!empty($notices) && $notices->count())
                    <div class="col-sm-12 col-md-12 col-lg-4 mb-3">
                        {{-- <div class="text-center site-heading">
                            <h2 class="custom-font-titillium-web">Notices</h2>
                        </div> --}}

                        <div class="d-flex justify-content-between align-items-end">
                            <h1 class="text-uppercase mb-0 home-content-heading custom-font-titillium-web">Notices</h1>
                            {{-- <a href="" class="text-uppercase text-decoration-none fw-bold common-font-color">All</a> --}}
                        </div>
                        
                        <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;"></div>

                        <div class="top-author">
                            <div class="author-items mt-3" style="background-color: white; overflow-y:scroll; height: 568px;">
                                <!---- Single Item -->
                                <div class="item">
                                    <div class="info" style="width: 100%">
                                        @foreach (@$notices as $item)
                                        <div style="border-bottom: 1px solid #8b8b8b;">
                                            <div class="mb-3 mt-3">
                                                <h5 style="text-align: justify; font-size:15px;">
                                                  <a href="{{ route('type.details', ["id"=>$item->id,"type"=>'notice','url'=>$url]) }}" class="custom-font-titillium-web">{{ $item->title }}</a>
                                                </h5>
                                                
                                                <li style="border: none; text-align: left;">
                                                  <span>Published: {{ date('M d,Y', strtotime($item->date)) }}</span>
                                                </li>

                                                <li>
                                                  <a href="{{ route('type.details', ["id"=>$item->id,"type"=>'notice','url'=>$url]) }}">
                                                    <button type="button" class="btn btn-sm rounded-pill custom-font-titillium-web"><i class="fas fa-plus" style="color: #1C4370;"></i> Read more</button>
                                                  </a>
                                                </li>
                                            </div>

                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                              <div class="more-btn col-md-12 text-center" style="padding-top: 0px;">
                                <a href="{{ route('type.all', ['type' => 'notice']) }}" class="btn btn-sm btn-theme rounded effect btn-md custom-font-titillium-web">View All Notices</a>
                              </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>


    @if (@$modal)
      @include('frontend.partials.modal.view')
    @endif



</section>


<section class="mb-3 mt-4">
      <!-- video Gallery -->
      <div class="container">
        @if(@$halls->short_url)
            <h6 class="text-center text-uppercase fs-2">
              Video Gallery
            </h6>

              <div class="card">
                {!! @$halls->short_url !!}
              </div>
        @endif
    </div>
    <!-- video Gallery -->
</section>

@include('frontend.layouts.footer-nabbar')

@endsection