@extends('frontend.hall.landing-app')
@section('title', 'Provost Message')

@php
   $design      = DB::table('cms_theme_designs')->where('page_id', '1')->where('page_tab_id', '1')->first();
   $json_class  = json_decode(@$design->custom_class, true);
   $json_style  = json_decode(@$design->custom_style, true);
@endphp

@php
// $page_title='Message of the Provost - '. @$halls->name;
$page_title='Message From Provost';
@endphp

@section('title', $page_title)


@section('hall_style')
<style>
  @media (min-width: 1200px) {
    .for_padding_like_container {
      padding-left: 10px;
    }
  }

  @media (min-width: 992px) {
    .for_padding_like_container {
      padding-left: 10px;
    }
  }

  @media (min-width: 768px) {
    .for_padding_like_container {
      padding-left: 10px;
    }
  }

  @media (min-width: 576px) {
    .for_padding_like_container {
      padding-left: 75px;
    }
  }
</style>

<style>
  .mb-3,
  .my-3 {
    margin-bottom: 0.3rem !important;
  }

  .round-image-right-curve img {
    height: 240px;
  }

  .title-text {
    padding: 12px;
    color: #fff;
  }

  .overlay {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    height: 100%;
    width: 100%;
    opacity: 0;
    transition: .5s ease;
    background-color: rgba(0, 178, 255, 0.5);
    z-index: 999;

  }

  .card {
    box-shadow: rgba(129, 126, 126, 0.1) 0px 4px 12px;
    margin-bottom: 20px;
  }

  .card:hover .overlay {
    opacity: 1;
  }

  .text {
    color: white;
    font-size: 20px;
    position: absolute;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    text-align: center;
  }
  .container .row .footer-text .custom-font-titillium-web {
    float: inline-end;
  }
</style>

@endsection
@section('content')
@include('frontend/hall/hall_header')

<div style="margin-top:80px"></div>

{{-- @include('frontend.hall.hall-banner-cover', ['page_title' => $page_title]) --}}
@include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])

{{-- <section>
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-6 bg-primary my-2">
        <h3 class="title-text my-font text-white text-center">Provost Message</h3>
      </div>
    </div>
  </div>
</section> --}}

{{-- <section>
  <div class="container">
    <div class="row my-5">
      <div class="col-12 col-sm-4">
        <div class="round-image">
          <img class="img-fluid w-100" src="{{ asset('upload/profiles/'.@$message->profile->photo) }}" onerror="this.onerror=null;this.src='{{ asset('dummy/profile_dummy.png') }}';" alt="profile image" />
        </div>
      </div>
      <div class="col-12 col-sm-8">
        @if (isset($message->profile->id))
        <h4>
          <a href="{{ route('provost_details', $message->profile->id) }}" class="justify-self-end" style="color: rgb(21, 13, 176); margin-top: auto;">
            {{ $message->profile->nameEn }}
          </a>
        </h4>
        @else
        <h4>
          <span class="justify-self-end" style="color: rgb(21, 13, 176); margin-top: auto;">
            {{ $message->profile->nameEn ?? '' }}
          </span>
        </h4>
        @endif
        <p>{{ @$message->profile->designation }}</p>
        <div class="my-2">
          @if(!empty($message->long_description))
          {!! $message->long_description !!}
          @else
          <p>No detailed message available.</p>
          @endif
        </div>
      </div>
    </div>
  </div>
</section> --}}

<section class="container">
  <div class="profile my-5">
      <div class="row">
          <div class="col-lg-4 col-md-12 col-sm-12">
              <div class="text-center bg-light shadow" style="height: 450px">
                  <div class="img p-4" style="height:330px;">
                      <img class="rounded w-100 h-100"
                          src="{{ asset('upload/profiles/'.@$halls->provostProfile->photo) }}"
                          onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';" />
                      
                  </div>
                  <div class="text-center px-3 pb-3 bg-light rounded" style="height: 120px">
                      <div class="border-top pt-3">
                          {{-- <a href="{{ route('provost_details', $message->profile->id) }}" --}}
                          <a href="#"
                              class="fs-5 mb-0 lh-sm faculty-title" style="color: #00C5BF;">{{ @$halls->provostProfile->nameEn }}
                          </a>
                          <p class="fw-bold text-center common-font-color fs-6 mb-1 pt-2">
                              {{ @$halls->provostProfile->designation }}
                          </p>
                      </div>
                  </div>
              </div>
              {{-- <img class="rounded-circle" src="{{  @$vcInfo->profile->photo ? asset('upload/profiles/' . @$vcInfo->profile->photo) :  @$vcInfo->profile->photo_path }}"/> --}}
          </div>
          <div class="col-lg-8 col-md-12 col-sm-12 profile-info">
              <div class="bg-light p-3 rounded shadow about-message-content">
                  <div>
                      <h2 class="fs-3 border-bottom pb-3 mb-3" style="color: #00C5BF;">Message from {{@$halls->provostProfile->nameEn}}</h2>
                      <div class="text-justify fs-6">
                          @if (@$message)
                            {!! @$message->long_description !!}
                          @else
                            <div class="text-center mt-3 fs-6">
                              No Information Found
                            </div>
                          @endif
                          

                      </div>
                  </div>
              </div>
              {{-- <a href="{{ route('office.people.details', @$vcInfo->profile->id) }}" class="fs-4 fw-bold text-dark mb-0">
                  {{$vcInfo->profile->nameEn}}
              </a>
              <h1 class="fs-5 fw-bold text-primary">{{$vcInfo->profile->designation}}</h1>

              <p>
                  {!! @$vcInfo->short_description !!}
              </p> --}}
          </div>
      </div>
  </div>
</section>

@include('frontend.layouts.footer-nabbar')
@endsection