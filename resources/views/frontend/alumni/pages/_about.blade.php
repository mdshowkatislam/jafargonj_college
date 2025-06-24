@extends('frontend.club.landing')

@section('title')
{{$page_title}} 
@endsection
@push('style-bup')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/style-bup.css') }}">
 <link rel="stylesheet" href="{{ asset('frontend/css/main.min.css') }}">

@endpush

@section('content')

{{-- @include('frontend.partials.sections.banner', ['page_title' => $page_title]) --}}
@include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])
  
   
    <!-- Overview -->
    <section class="my-5">
        <div class="container overview">
            {{-- <h1 class="text-uppercase mb-0 home-content-heading">About Club</h1>
            <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;">
            </div> --}}
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12 ">
                    <div class="text-center bg-light rounded shadow-sm d-flex align-items-center justify-content-center"
                        style="height: 350px">
                        <div class="">
                            <img class="rounded shadow" height="220px"
                                src="{{ @$cheif_advisor->profile->photo ? asset('upload/profiles/' . @$cheif_advisor->profile->photo) : @$cheif_advisor->profile->photo_path }}"
                                onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';" />
                            <div class="pt-3">
                                <h3 class="text-dark fw-bold fs-5 mb-0 lh-sm faculty-title">
                                    {{ @$cheif_advisor->profile->nameEn }}</h3>
                                <p class="fw-bold common-font-color fs-6 mb-1 pt-2">
                                    {{ @$cheif_advisor->designation->name }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="bg-light p-3 rounded shadow-sm  about-message-content d-flex justify-content-center"
                        style="height: 350px">
                        <div>
                            <h2 class="fs-3 fw-bold border-bottom pb-3 mb-3 common-font-color">Overview</h2>
                            <div class="text-justify fs-6">
                                {!! Str::limit(@$club->description, 400, '...') !!}
                            </div>
                            {{-- <div class="row d-flex justify-content-center align-items-center pt-3">
                                <div id="page-252" class="col-xs-12 col-sm-4 subpage-items">
                                    <div class="subpage-item-style">
                                        <a href="{{ route('club.mission', $club->id) }}" class="page-link">
                                            <span class="sr">Mission</span>
                                        </a>
                                    </div>
                                </div>
                                <div id="page-252" class="col-xs-12 col-sm-4 subpage-items">
                                    <div class="subpage-item-style">
                                        <a href="{{ route('club.vision', $club->id) }}" class="page-link">
                                            <span class="sr">Vision</span>
                                        </a>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Overview -->
    <section class="my-5">
        <div class="container overview">
            <div class="d-flex justify-content-between align-items-end">
                <h1 class="text-uppercase home-content-heading mb-0">
                    About Club
                </h1>
                {{-- <a href="{{ route('news.all') }}" class="text-uppercase text-decoration-none fw-bold common-font-color">All</a> --}}
            </div>
            <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;">
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="bg-light p-3 rounded shadow-sm  about-message-content d-flex mt-3">
                        <div>
                            <h2 class="fs-5 fw-bold border-bottom pb-3 mb-3 common-font-color">Mission</h2>
                            <div class="text-justify fs-6">
                                {!! Str::limit(@$club->mission, 400, '...') !!}
                            </div>
                        </div>
                    </div>
                    <div class="bg-light p-3 rounded shadow-sm  about-message-content d-flex mt-3">
                        <div>
                            <h2 class="fs-5 fw-bold border-bottom pb-3 mb-3 common-font-color">Vision</h2>
                            <div class="text-justify fs-6">
                                {!! Str::limit(@$club->vision, 400, '...') !!}
                            </div>
                        </div>
                    </div>
                    <div class="bg-light p-3 rounded shadow-sm  about-message-content d-flex mt-3">
                        <div>
                            <h2 class="fs-5 fw-bold border-bottom pb-3 mb-3 common-font-color">Motto</h2>
                            <div class="text-justify fs-6">
                                {!! Str::limit(@$club->motto, 400, '...') !!}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


 
 

@endsection