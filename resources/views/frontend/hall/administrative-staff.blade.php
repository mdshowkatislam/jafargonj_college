{{-- @extends('frontend.layouts.app') --}}
@extends('frontend.hall.landing-app')

@php
$page_title='Officers & Staff';
@endphp

@section('title', $page_title)

@section('my_style')
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
    height: 140px;

  }

  .heading-content1 .desgination {

    font-size: 14px;
    display: inline-block;
    padding-top: 10px;
  }

  .heading-content1 .pro_name {

    font-size: 16px;
    font-weight: 500;
  }

  .my-font1 {
    font-size: 14px;
    margin-top: 6px;
    margin-bottom: 14px;
    color: #00c5bf;
  }
</style>

@endsection


@section('content')
@include('frontend/hall/hall_header')
<div style="margin-top:80px"></div>
{{-- @include('frontend.hall.hall-banner-cover', ['page_title' => $page_title]) --}}

@include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])

{{-- @include('frontend.hall.content-blue-header', ['title' => 'Officers & Staff']) --}}

<section style="padding:40px 20px">
  <div class="container">
    <div class="row">
      @foreach ($addministrationStuff as $item)
      <div class="col-lg-3 col-md-4 fix-height">
        <div class="card">

          <div class="card-body d-flex flex-column dean_staff">
            <div class="col-md-12 position-relative">
              <div class="" style="display: flex; justify-content: center;">
                <img class="chaiman-card-img" src="{{ @$item->member->photo ? asset('upload/profiles/'.@$item->member->photo) : asset('upload/members/member.jpeg') }}" onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';" alt="Image" 
                style="height: 180px; width: 180px; border-radius: 100%; padding: 5px; border: 5px solid #00c5bf; margin: 1rem auto;"
                >
              </div>
            </div>

            <div class="heading-content1 text-center" style="margin-top: 15px;">
              {{-- <h3 class="my-font"> Provost Of {{@$item->name}}</span></h3> --}}
              <h2 class="card-title fs-6 fw-bold mt-0 text-center" style="margin-bottom: 0px !important;">{{@$item->member->nameEn}}</h2>
              <p class="text-center">{{@$item->designation ? @$item->designation :
                @$item->member->designation}}</p>
              <p class="text-center" style="">{{$item->member->phone ? 'Cell:' : '' }} {{@$item->member->phone}}</p><br>
              <p class="text-center" style="">{{$item->member->email ? 'Email:' : '' }} {{@$item->member->email}}</p><br><br>
              <div class="button">
              </div>
            </div>
           
          </div>
        </div>
      </div>
      @endforeach


    </div>
  </div>
</section>


@include('frontend.layouts.footer-nabbar')

<style>
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
</style>
@endsection