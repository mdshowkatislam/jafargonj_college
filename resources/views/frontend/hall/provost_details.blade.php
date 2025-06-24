@extends('frontend.layouts.faculty-app')

@php
$pageTitle= $facultyMember->name
@endphp

@section('title', $pageTitle)

@section('my_style')

<link rel="stylesheet" href="{{ asset('frontend/dist/css/profile.css') }}">

@endsection

@section('content')
@include('frontend/layouts/hall_header')

{{-- <header class="header fixed-top">
  <div class="container-fluid top-header" style="background-color: #11f2ff;">
    <div class="row">
      <div class="col-12">
        <div class="container">
          <div class="row">
            <div class="col-12 text-center">
              <a href="{{ route('home') }}">
                <img class="img-fluid d-block mx-auto" style="max-height: 80px;"
                  src="{{ asset('frontend/images/logo.png') }}" alt="logo" /></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="navigation w-100">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-dark p-0">
        <a class="navbar-brand" style="white-space: normal;" href="#"> {{ $halls->name }}</a>
        <button class="navbar-toggler rounded-0" type="button" data-toggle="collapse" data-target="#navigation"
          aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
          <i class="ti-menu text-black"></i>
        </button>
        <div class="collapse navbar-collapse" id="navigation">
          <ul class="navbar-nav ml-auto text-center">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                About
              </a>
              <div class="dropdown-menu p-3" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('halls.hall_history', $halls->short_url) }}">History</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('halls.all_hall_provost', $halls->short_url) }}">All
                  Provosts</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Administration
              </a>
              <div class="dropdown-menu p-3" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('halls.provost_message', $halls->short_url) }}">Provost
                  Message</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('halls.house_tutor', $halls->short_url) }}">House Tutor</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item"
                  href="{{ route('halls.administrative_staff', $halls->short_url) }}">Administrative Staff</a>
              </div>
            </li>

            <li class="nav-item @@blog">
              <a class="nav-link" href="{{ route('halls.hall_contact',$halls->short_url) }}">Contact</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
</header> --}}

@include('frontend.partial.content-header', ['pageTitle' => $pageTitle, 'bannerImageLink' => 'faculty.png'])

@include('frontend.partial.profile')


@include('frontend/layouts/footer')

@endsection

@section('java_script')

<script>
  $( function() {
			$( "#tabs" ).tabs();
		} );
</script>

@endsection