{{-- @extends('frontend.layouts.app') --}}

@extends('frontend.hall.landing-app')
@php
   $design      = DB::table('cms_theme_designs')->where('page_id', '1')->where('page_tab_id', '1')->first();
   $json_class  = json_decode(@$design->custom_class, true);
   $json_style  = json_decode(@$design->custom_style, true);
@endphp

@php
$page_title='History';
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
    padding: 15px;
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
  .butex-font{
    font-family: "Titillium Web", sans-serif;
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

{{-- @include('frontend.hall.content-blue-header', ['title' => $page_title]) --}}

<section class="container mt-3">
  <div class="card p-4" style="border-top: 5px solid #00C5BF;">
    <div class="card-body">
      <div class="row">
        <div class="col-5">
          <img class="card-img-top" src="{{ asset('upload/hall/'.@$halls->image) }}" onerror="this.onerror=null;this.src='{{ asset('frontend/images/about/dummy.png') }}';" alt="{{@$halls->name}}">
        </div>
        <div class="col-7 butex-font">
          {!!@$halls->about_text!!}
        </div>
      </div>
    </div>
  </div>
</section>

@include('frontend.layouts.footer-nabbar')
@endsection