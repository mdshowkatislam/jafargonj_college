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
            <p>Web: http://jafargonjcollege.nanoit.biz/</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-7">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d228.5551417642662!2d91.05431184649849!3d23.572671489141968!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x37546ffed6ec1089%3A0x5f61560e28eee17c!2sJafargonj%20Mir%20Abdul%20Gafur%20College!5e0!3m2!1sen!2sbd!4v1756121740129!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        
      </div>
    </div>
  </div>

</section>




@endsection