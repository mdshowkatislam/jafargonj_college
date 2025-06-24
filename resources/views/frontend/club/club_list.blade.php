<!-- ===== slider section start ===== -->
{{-- @extends('frontend.landing') --}}
@extends('frontend.layouts.master-landing')

@php
$page_title = 'Clubs';
@endphp
@section('title')
{{ $page_title }}
@endsection
{{-- @push('style-bup')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/style-bup.css') }}">
 <link rel="stylesheet" href="{{ asset('frontend/css/main.min.css') }}">

@endpush --}}
{{--  @push('style-bup')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/style-bup.css') }}">
 <link rel="stylesheet" href="{{ asset('frontend/css/main.min.css') }}">
@endpush  --}}

@section('content')
<!-- Banner -->


<style>
 .campus-life-gallery {
    border: 10px solid #00c5bf;
    padding: 10px 0px 10px 10px;
    transition: 0.5s;
}

.campus-life-gallery:hover {
    border: 10px solid #ba313c ;
}

#campus-img-div {
    width: 110%;
    height: 255px;
    box-shadow: 2px 2px 3px rgb(0 0 0 / 45%);
}

#campus-img-div img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
</style>

{{-- @include('frontend\partials\sections\banner-cover') --}}
{{-- @include('frontend.partials.sections.banner', ['page_title' => $page_title]) --}}

@include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])

<!-- Card Gallery -->
<section class="container my-5">
    {{-- <h2 class="text-center">Clubs</h2> --}}

    <div class="row gx-5 d-flex justify-content-center">
        @foreach ($clubs as $club)
        <div class="col-md-6 col-lg-4 mt-3 mb-4">
            <a href="{{ route('club.index', @$club->slug) }}">
            <div class="campus-life-gallery">
                <div id="campus-img-div">
                    <img src="{{ asset('upload/banner/' . @$club->banner) }}" class="" alt="club" onerror="this.onerror=null;this.src='{{ asset('upload/no-image.png') }}';" />
                </div>
            </div>
            </a>
            <div class="mt-3">
                <a href="{{ route('club.index', @$club->slug) }}" class="fs-5 text-dark fw-bold">{{ @$club->name }}</a>
            </div>
        </div>
        @endforeach
    </div>
</section>

@endsection