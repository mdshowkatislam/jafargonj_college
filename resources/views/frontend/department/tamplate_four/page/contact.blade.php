@extends('frontend.department.tamplate_four.partials.main-second')

@php
    $page_title = "Contact - " .  $department->name;
@endphp
@section('title'){{$page_title}} @endsection


@section('content')
<div class="faculty-profile-banner d-flex justify-content-center align-items-center" style=" background-image: url( {{ @$banner->image ? asset('upload/banner/' . $banner->image) : asset('frontend/assets/img/butex/banner-butex.png') }} ) ">
    <h1 class="text-white font-poppins fs-2">{{ $page_title }}</h1>
</div>
<section>
	<div class="container">
		<div class="">
			<div class="text-center" style="background-color: #00c5bf; margin: 40px 0;">
				<h3 class="title-text  my-font text-white p-3" style="font-size: 25px">Contact</h3>
			</div>
		</div>
	</div>
</section>
{{-- <i class="far fa-location"></i> --}}
<section>
  <div class="container my-4">
    <div class="row">
      <div class="col-12 col-sm-5">
        <div class="shadow py-5 px-3 border h-100">
          <div class="p-address mb-4">
            <h3 class="my-font form-title fs-4">
                <i class="fas fa-map-marker-alt"></i> Address:
            </h3>
            <p>
              {{$department->location}}
            </p>
          </div>
          <div class="phone mb-4">
            <h3 class="my-font form-title fs-4">
              <i class="fas fa-phone"></i> Phone:
            </h3>
            <p>
              Phone: {{$department->contact}} <br>
              {{-- Fax: (+88) 02334411135 --}}
            </p>
          </div>
          <div class="email mb-4">
            <h3 class="my-font form-title fs-4">
              <i class="fas fa-envelope"></i> Email:
            </h3>
            <p>{{$department->email}}</p>
          </div>
          <div class="website mb-4">
            <h3 class="my-font form-title fs-4">
              <i class="fas fa-globe"></i> Web:
            </h3>
            <p>Web: https://butex.edu.bd</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-7">
        <iframe
          src="https://www.google.com/maps/embed/v1/place?q=butex&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"
          width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade">
        </iframe>
        
      </div>
    </div>
  </div>

</section>




@endsection