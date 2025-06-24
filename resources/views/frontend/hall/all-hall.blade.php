@extends('frontend.layouts.master-landing')
@php
$page_title = 'Residential Hall';
@endphp
@section('title')
{{ $page_title }}
@endsection
@section('content')

@include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])

{{-- <section class="shadow dark banner-hall-bg"
    style="background: url({{ @$bannerImageLink ? asset('upload/banner/' . @$bannerImageLink) : asset('frontend/banner/hall-banner2.png') }})">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="text-center text-white">{{ $page_title }}</h3>
            </div>
        </div>
    </div>
</section> --}}

{{-- <section>
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12 text-center" style="background-color: #00c5bf; margin: 40px 0;">
        <h3 class="title-text  my-font text-white p-3" style="font-size: 25px">Residential Hall</h3>
      </div>
    </div>
  </div>
</section> --}}


<section id="hall" style="margin-top: 40px;margin-bottom: 50px;">
  <div class="container" style="margin-top: 40px;">
    <div class="row">
      @foreach($halls as $hall)
      <div class="col-md-4 hall_div mt-2" data-aos="fade-up" data-aos-duration="400" data-aos-easing="ease-in-out">
        <div style="height: 300px; position: relative;" class="card">
          <div class="round-image-right-curve">
            <img class="card-img-top" src="{{asset('upload/hall/'.$hall->image)}}" onerror="this.onerror=null;this.src='{{ asset('upload/no-image.jpg') }}';" alt="{{@$hall->name}}">
          </div>

          <div class="card-body" style="padding-bottom: 10px;">
            <p class="card-text" style="font-weight: 700;font-size: 19px;">{{$hall->name}}</p>
          </div>
          <div class="overlay">
            <div class="text">
              <a href="{{route('hall_details', $hall->id)}}" style="font-size: 14px; background-color:#00c5bf; color: #ffffff;" class="btn">{{$hall->name}}</a>
            </div>
          </div>
        </div>
      </div>
      @endforeach

    </div>
  </div>
</section>


@endsection
@push('styles')
  <style>
  .round-image-right-curve img {
    height: 240px;
    border: 1px solid #9de1ff;
  }

  .title-text {
    padding: 15px;
    color: #fff;
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

    
/* overlay */
.overlay {
    position: relative;
}

.overlay::before {
    position: absolute;
    content: "";
    height: 100%;
    width: 100%;
    top: 0;
    left: 0;
    /* background: #1a1a37; */
    /* opacity: 0.8; */
}

.card:hover .overlay {
    opacity: 1;
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
    background-color: rgba(14, 180, 210, 0.5);
    z-index: 999;
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

  .round-image-right-curve {
    position: relative;
    width: 100%;
}
.round-image-right-curve img {
    height: 240px;
}

.round-image-right-curve img {
    /* border-top-right-radius: 50%;
    border-bottom-right-radius: 50%; */
    /* margin-left: 8%; */
    width: 100% !important;
    position: relative;
    z-index: 5;
    /* box-shadow: rgb(129 126 126 / 10%) 0px 4px 12px; */
}

.round-image-right-curve::after {
    /* content: "";
    position: absolute;
    width: 95%;
    height: 92%;
    left: 5%;
    top: 14%;
    border: 1px solid #00c5bf;
    background: #fff;
    border-top-right-radius: 50%;
    border-bottom-right-radius: 50%; */
    /* box-shadow: rgb(0 0 0 / 24%) 0px 3px 8px; */
}

.banner-hall-bg {
        background: rgb(2, 0, 36);
        background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(121, 71, 9, 1) 100%, rgba(0, 212, 255, 1) 100%);
        background-repeat: no-repeat;
        background-size: cover;
        height: 250px;
        display: flex;
        align-items: center;
        justify-content: center;
        /* margin-top: 10px; */
    }
  </style>
@endpush

@push('scripts')
<script>
 
</script>
@endpush