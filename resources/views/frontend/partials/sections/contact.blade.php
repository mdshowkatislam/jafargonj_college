@extends('frontend.layouts.master-landing')
@php
    $page_title = 'Butex Contact';
@endphp
@section('title')
    {{ $page_title }}
@endsection
@section('content')

{{-- @include('frontend.partials.sections.banner-cover5', ['page_title' => $page_title]) --}}
@include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])

<style>
  .circle {
    width: 100px; /* Set the width */
    height: 100px; /* Set the height to the same as the width */
    background-color: #00c5bf; /* Change this to your desired color */
    border-radius: 50%; /* This makes the div circular */
    display: flex; /* Optional: centers content */
    justify-content: center; /* Optional: centers content */
    align-items: center; /* Optional: centers content */
    margin: 30px auto;
}

</style>

<section class="my-5">
    <div class="container overview">
        <div class="d-flex justify-content-between align-items-end">
            <h2 class="text-uppercase home-content-heading mb-0">
                Find us on map
            </h2>
        </div>
        <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;">
        </div>
        <div class="row mt-4">
            <div class="col-md-12 animate__animated animate__fadeInRight" style="animation-delay: 0.4s; opacity: 1;">
                <div class="rounded shadow-sm overflow-hidden h-100">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7303.277238273859!2d90.400586!3d23.760263!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b89db1b5de0f%3A0xe0e333356e676ede!2sBangladesh%20University%20of%20Textiles!5e0!3m2!1sen!2sbd!4v1717647046931!5m2!1sen!2sbd" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
   
<div class="container px-4 py-5" id="featured-3">
    <h2 class="pb-2 border-bottom">Contact with us</h2>
    <div class="row">
    <div class="card-group">
  <div class="card">
  {{-- <img style="width: 35%;margin: 0 auto;" src="{{asset('frontend/images/icons/mail.png')}}">  --}}
  <div class="text-center circle">
    <i class="fa-3x fa-solid fa-envelope" style="color: #ffffff;"></i>
  </div>
    <div class="card-body m-auto">
      <p class="card-title">Email : {{ @$contact_infos['email'] }}</p>
    </div>
    {{-- <div class="card-footer">
    </div> --}}
  </div>
  <div class="card">
  {{-- <img style="width: 35%;margin: 0 auto;" src="{{asset('frontend/images/icons/call_icon.png')}}">  --}}
  <div class="text-center circle">
    <i class="fa-3x fa-solid fa-phone-volume" style="color: #ffffff;"></i>
  </div>
    <div class="card-body m-auto">
      <p class="card-title"> Phone : {{@$contact_infos->phone}}</p>
      <p class="card-title"> Fax : {{@$contact_infos->fax}}</p>
    </div>
    {{-- <div class="card-footer">
     
    </div> --}}
  </div>
  <div class="card">
  {{-- <img style="width: 35%;margin: 0 auto;" alt="location_icon" src="{{asset('frontend/images/icons/location.png')}}">  --}}
  <div class="text-center circle">
    <i class="fa-3x fa-solid fa-location-dot" style="color: #ffffff;"></i>
  </div>
    <div class="card-body m-auto">
      <p class="card-text">{{  @$contact_infos->location  }}</p>
    </div>
    {{-- <div class="card-footer">
      
    </div> --}}
  </div>
</div>
        
    </div>
  
</div>



@endsection
@push('styles')
  <style>
    img {
      filter: hue-rotate(-15deg); /* Adjust the hue */
    }
  </style>
@endpush

@push('scripts')
  <script>
    
  </script>
@endpush
