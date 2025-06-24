@extends('frontend.hall.landing-app')

@php
$pageTitle = @$halls->name;
@endphp

@section('title', $pageTitle)

@section('content')
@include('frontend/hall/hall_header')



<!--========== hero slider ================-->
<div style="margin-top: 100px; height:500px;" id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
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

<div style="height:500px;" class="carousel-inner">
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


@if ($halls->provost)
<section class="about">
  <div class="container">
    <div class="row my-5">
      <div class="col-md-4 mb-md-0">
        <div class="round-image">
          <img class="img-fluid w-100" src="{{ @$halls->provostProfile->photo ?asset('upload/profiles/'.@$halls->provostProfile->photo): asset('dummy/profile_dummy.png') }}" onerror="this.onerror=null;this.src='{{ asset('dummy/profile_dummy.png') }}';" alt="Profile image" />
        </div>
      </div>

      <div class="col-12 col-sm-8">
        @if(@$message->short_description != null)
        <h3>Message from the <span class="text-primary">Provost</span> of {{ $halls->name }} </h3>
        <p class="text-justify">
          {!!@$message->short_description!!}
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
          <a href="{{ route('provost_message', @$halls->id) }}" class="btn btn-primary mt-2 float-right">Read More</a>
        </div>
      </div>
    </div>
  </div>
</section>
@endif



@include('frontend.hall.notice')

<section class="contact-us pt-4  pb-4">
  <div class="container">
    <div class="row">
      <div class="col">
        <h3 class="my-font my-5">Feel <span class="text-primary">Free to Contact </span> With Us</h3>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4">
        <div class="card contact-card">
          <div class="card-body">
            <div class="inner-items-contactas">
              <div class="row">
                <div class="col-4 p-0"><img class="img-fluid d-block" src="{{ asset('frontend/images/icons/envelop.png') }}" alt=""></div>
                <div class="col-8" style="margin-top: 35px; margin-left: -25px;">
                  <h5 class="my-font text-primary">Email</h5>
                </div>
              </div>
            </div>
            <p class="my-font">{{ $halls->email }}</p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card contact-card">
          <div class="card-body">
            <div class="inner-items-contactas">
              <div class="row">
                <div class="col-4 p-0"><img class="img-fluid d-block" src="{{ asset('frontend/images/icons/call.png') }}" alt=""></div>
                <div class="col-8" style="margin-top: 35px; margin-left: -25px;">
                  <h5 class="my-font">Call Us</h5>
                </div>
              </div>
            </div>
            <p class="my-font">{{ $halls->contact_number }}</p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card contact-card">
          <div class="card-body">
            <div class="inner-items-contactas">
              <div class="row">
                <div class="col-4 p-0"><img class="img-fluid d-block" src="{{ asset('frontend/images/icons/location.png') }}" alt=""></div>
                <div class="col-8" style="margin-top: 35px; margin-left: -25px;">
                  <h5 class="my-font text-primary">Location</h5>
                </div>
              </div>
            </div>
            <p class="my-font">{{ $halls->location }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script type="text/javascript">
  // var myCarousel = document.querySelector('#hallCarousel')
  // var carousel = new bootstrap.Carousel(myCarousel, {
  //     interval: 2000,
  //     wrap: false
  // })
</script>
@endsection