<!-- ===== slider section start ===== -->
{{-- @extends('frontend.landing') --}}
@extends('frontend.layouts.master-landing')

@php
$page_title = $lab->title;
@endphp
@section('title')
{{ $page_title }}
@endsection

@section('content')
<!-- Banner -->
{{-- @include('frontend.partials.sections.banner', ['page_title' => $page_title]) --}}
@include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])

{{-- <section>
    <div class="campus-banner d-flex justify-content-center align-items-center">
        <h1 class="uppercase text-white font-poppins">Campus Life</h1>
    </div>
</section> --}}
<!-- Card Gallery -->
<section class="container">
    <div class="container profile">
        <div class="row my-5">
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="text-center bg-light shadow d-flex align-items-center justify-content-center" style="height: 350px">
                    <div class="" >
                        <img src="{{ asset('upload/lab/' . $lab->image) }}" class="" alt="labs" height="350px" width="350px"
                        onerror="this.onerror=null;this.src='{{ asset('upload/no-image.png') }}';" />
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="bg-light p-3 rounded shadow about-message-content" style="height: 350px">
                    <div>
                        <h2 class="fs-3 fw-bold border-bottom pb-3 mb-3 common-font-color">About {{ @$lab->title }}
                        </h2>
                        <div class="text-justify fs-6">
                            {!! @$lab->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    @include('frontend.partials.sections.gallery_slider')

@endsection