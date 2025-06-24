

@extends('frontend.hall.landing-app')
@php
   $design      = DB::table('cms_theme_designs')->where('page_id', '1')->where('page_tab_id', '1')->first();
   $json_class  = json_decode(@$design->custom_class, true);
   $json_style  = json_decode(@$design->custom_style, true);
@endphp

@php
$page_title='Contact';
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
</style>
<style type="text/css">
  .contact-form {
    /*background-color: #f3f3f3;*/
    padding: 50px 0;
  }

  .query-form {
    border: 1px solid #00c5bf;
    box-shadow: 0px 1px 10px rgb(0 0 0 / 10%);
    padding: 25px;
  }

  .form-title {
    color: #00c5bf;
    font-size: 22px;
  }
  .container .row .footer-text .custom-font-titillium-web {
    float: inline-end;
  }
</style>

@endsection


@section('content')

@include('frontend/hall/hall_header')
<div style="margin-top:80px"></div>

{{-- @include('frontend.hall.content-blue-header', ['title' => 'Hall Contact']) --}}

{{-- @include('frontend.hall.hall-banner-cover', ['page_title' => $page_title]) --}}

@include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])


<section>
  <div class="container my-4">
    <div class="row">
      <div class="col-12 col-sm-5">
        <div class="query-form shadow">
          <div class="p-address mb-4">
            <h3 class="my-font form-title"><i class="ti-location-pin text-primary"></i> Address:</h3>
            <p>
              {{$halls->location}}<br>
              Bangladesh University of Textiles<br>
              92 Shaheed Tajuddin Ahmed Ave, Dhaka 1208, Bangladesh
            </p>
          </div>
          <div class="phone mb-4">
            <h3 class="my-font form-title">
              <i class="ti-mobile text-primary"></i> Phone:
            </h3>
            <p>
              Phone: {{$halls->contact_number}} <br>
              Fax: (+88) 02334411135
            </p>
          </div>
          <div class="email mb-4">
            <h3 class="my-font form-title">
              <i class="ti-email text-primary"></i> Email:
            </h3>
            <p>Email: {{$halls->email}}</p>
          </div>
          <div class="website mb-4">
            <h3 class="my-font form-title">
              <i class="ti-world text-primary"></i> Web:
            </h3>
            <p>Web: butex.edu.bd</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-7">
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7303.277238273859!2d90.400586!3d23.760263!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b89db1b5de0f%3A0xe0e333356e676ede!2sBangladesh%20University%20of%20Textiles!5e0!3m2!1sen!2sbd!4v1717647046931!5m2!1sen!2sbd" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

      </div>
    </div>
  </div>

</section>
{{-- @section('extraa_script') --}}

{{-- @include('frontend/layouts/footer')--}}
@include('frontend.layouts.footer-nabbar')
@endsection