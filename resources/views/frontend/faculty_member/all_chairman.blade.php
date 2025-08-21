<!-- ===== slider section start ===== -->
@extends('frontend.layouts.master-landing')
@php
    $page_title = 'Lecturer of the Classes';
@endphp
@section('title')
    {{ $page_title }}
@endsection
<style>
    .chaiman-card-img {
        height: 180px !important;
        width: 180px !important;
        border-radius: 100%;
        padding: 5px;
        border: 5px solid #00c5bf;
        margin: 1rem auto;
    }
    .zoom_in_hover {
        -webkit-transform: scale(1);
        transform: scale(1);
        -webkit-transition: all 200ms linear;
        -moz-transition: all 200ms linear;
        -ms-transition: all 200ms linear;
        -o-transition: all 200ms linear;
        transition: all 200ms linear;

    }

    .zoom_in_hover:hover {
        -webkit-transform: scale(1.05);
        transform: scale(1.05);
        cursor: pointer;
    }
</style>
@section('content')
@include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])
    <!-- ===== Page title section start ===== -->
    <!-- Banner -->
    {{-- <section>
        <div class="faculty-profile-banner d-flex justify-content-center align-items-center" style="background-image: linear-gradient(rgba(17, 223, 226, 0.75), rgba(1, 39, 39, 0.75)), url('{{ asset('frontend/assets/img/bup/banner.jpg') }}');">
            <h1 class="text-white font-poppins">{{ $page_title }}</h1>
        </div>
    </section> --}}
    <!-- Senate Chairman -->
    <section class="container">
        {{-- <h1 class=" text-secondary text-uppercase fs-3 mb-0 ">VC'S Office</h1>
        <div class="mb-0 mt-0 d-inline-block mx-auto" style="width: 30%; background-color: #8b0101; height: 4px"></div> --}}
        <div class="row mb-5">
            @foreach ($departments as $item)
                <div class="col-12 col-md-6 col-lg-3 mt-5">
                    {{-- <div class="align-bottom">
                        <h1 class="text-secondary fs-5 fw-bold d-flex align-items-end" style="height: 70px; overflow:hidden;">{{ @$item->name }}
                        </h1>
                        <div class="mb-4 d-inline-block mx-auto" style="width: 100%; background-color: #8b0101; height: 4px">
                        </div>
                    </div> --}}
                    <div class="">
                        <div class="card  zoom_in_hover shadow">
                            <img class="chaiman-card-img"
                                src="{{ asset('upload/profiles/' . @$item->profile->photo) }}"
                                onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';"
                                alt="Image" />
                                <hr class="mx-2">
                            <div class="card-body" style="min-height: 12rem;">
                                <a href="{{ route('faculty_member.details', $item->profile->id) }}">
                                    <h5 class="card-title fs-6 fw-bold mt-0 text-center"
                                        style="height:55px; overflow:hidden">
                                        {{ $item->profile->nameEn }}
                                    </h5>
                                    <p class="text-center common-font-color fs-6 custom-font-titillium-web my-0 fw-bold" style="color: #00c5bf;">
                                        Lecturer
                                    </p>
                                    <p class="text-center common-font-color fs-6 custom-font-titillium-web">
                                        {{ @$item->name }}
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- ===== Page content section end ===== -->
@endsection
