@extends('frontend.hall.landing-app')

@php
   $design      = DB::table('cms_theme_designs')->where('page_id', '1')->where('page_tab_id', '1')->first();
   $json_class  = json_decode(@$design->custom_class, true);
   $json_style  = json_decode(@$design->custom_style, true);
@endphp

@php
$page_title='Hall Members';
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
  .chaiman-card-img {
      height: 180px !important;
      width: 180px !important;
      border-radius: 100%;
      padding: 5px;
      border: 5px solid #00c5bf;
      margin: 1rem auto;
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

  .heading-content1 {
    text-align: center;
    font-size: 15px;
    line-height: 1.5;
    height: 180px;

  }

  .heading-content1 .desgination {
    font-size: 16px;
    /* display: inline-block; */
    padding-top: 0px;
  }

  .heading-content1 .pro_name {

    font-size: 16px;
    font-weight: 500;
  }

  .my-font1 {
    font-size: 18px;
    margin-top: 6px;
    margin-bottom: 14px;
    color: #00c5bf;
  }
  .dean_staff{
    /* cursor:pointer; */
    position:relative;
    padding:10px 20px;
    background:white;
    font-size:28px;
    border-top-right-radius:10px;
    border-bottom-left-radius:10px;
    transition:all 1s;
    &:after,&:before{
      content:" ";
      width:10px;
      height:10px;
      position:absolute;
      border :0px solid #fff;
      transition:all 1s;
    }
    &:after{
      top:-1px;
      left:-1px;
      border-top:5px solid #00c5bf;
      border-left:5px solid #00c5bf;
    }
    &:before{
      bottom:-1px;
      right:-1px;
      border-bottom:5px solid #00c5bf;
      border-right:5px solid #00c5bf;
    }
    &:hover{
      border-top-right-radius:0px;
      border-bottom-left-radius:0px;
      /* background:rgba(0,0,0,.5); */
      /* color:white; */
      &:before,&:after{
          width:100%;
          height:100%;
          /* border-color:white; */
      }
    }
  }
  .container .row .footer-text .custom-font-titillium-web {
    float: inline-end;
  }
</style>

@endsection


@section('content')
@include('frontend/hall/hall_header')

<div style="margin-top:80px;"></div>

{{-- @include('frontend.hall.hall-banner-cover', ['page_title' => $page_title]) --}}

@include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])


{{-- @include('frontend.hall.content-blue-header', ['title' => $page_title]) --}}

<section>
  <div class="container mt-3">
    <div class="row">

      @foreach ($houseTutor as $item)

      <div class="col-lg-3 col-md-4 fix-height">
        <div class="card">

          <div class="card-body d-flex flex-column dean_staff">
            <div class="col-md-12 position-relative">
              <div class="" style="display: flex;">
                <img class="chaiman-card-img" src="{{ @$item->member->photo ? asset('upload/profiles/'.@$item->member->photo) : asset('upload/members/member.jpeg') }}" onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';" alt="Image" />
              </div>
            </div>

            @php
              if(@$item->additional_charge == 1 && @$item->additional_designation) {
                  $designation = App\Models\Designation::where('id', $item->additional_designation)->pluck('name')->first();
              }
            @endphp

            @php
                $designations           = @$item->designations ?? '';
                $additional_charge      = @$item->additional_charge ?? '';
                $additional_designation = @$item->additional_designation ?? '';
            @endphp
          
            <div class="heading-content1" style="margin-top: 15px;">
              <h2 class="my-font1 mb-1" style="margin-bottom: 0px !important;">{{@$item->member->nameEn}}</h2>
  
              @if (@$designations)
                <h6 class="p-1">{{ @$designations }}</h6>
              @endif

              @if (@$additional_charge)
                  <span class="p-1">{{ @$additional_charge }}</span><br/>
              @endif

              @if (@$additional_designation)
                  <span>{{ @$additional_designation }}</span><br/>
              @endif

              <small style="">{{@$item->member->phone ? 'Cell:' : '' }} {{@$item->member->phone}}</small>
              <small style="">{{@$item->member->email ? 'Email:' : '' }} {{@$item->member->email}}</small><br>
              
            </div>
            <a href="#" class="btn btn-primary btn-sm justify-self-end d-none" style="color: white; margin-top: auto;"> Details</a>
          </div>
        </div>
      </div>

      @endforeach


    </div>
  </div>
</section>

@include('frontend.layouts.footer-nabbar')
@endsection