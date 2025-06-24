@extends('frontend.layouts.master-landing')
@php
   $page_title = (@$message->title_first_part ?? '');
@endphp
@section('title')
    {{ $page_title }}
@endsection
@section('content')
    {{-- @include('frontend.partials.sections.banner-cover', ['page_title' => $page_title]) --}}

    <style>
        .course-details-area ul.nav-pills li a {
            border-radius: inherit;
            text-transform: uppercase;
            font-weight: 600;
            padding: 15px 25px;
            letter-spacing: 0.6px;
        }
    </style>

    <script>
        $(document).ready(function() {
            $('.nav-link').click(function() {
                $('.nav-pills li').removeClass('active');
                $(this).closest('li').addClass('active');
            });
        });
    </script>

    <!-- Start content ============================================= -->
<div class="clearfix"></div>
{{-- <div class="faculty-profile-banner d-flex justify-content-center align-items-center" style=" background-image: url( {{ @$banner->image ? asset('upload/banner/' . $banner->image) : asset('frontend/assets/img/butex/banner-butex.png') }} ) ">
    <h1 class="text-white font-poppins">{{ $page_title }}</h1>
</div> --}}


<section class="container">
    <div class="profile my-5">
        <div class="row">
            {{-- <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="text-center bg-light shadow" style="height: 350px"> --}}
                    {{-- <div class="img p-4" style="height:auto;">
                        <img class="rounded w-100"
                            src="{{ asset('upload/profiles/' . @$profile->photo) }}"
                            onerror="this.onerror=null;this.src='{{ asset('dummy/user-dummy.jpeg') }}';" />
                        
                    </div> --}}
                    {{-- <div class="text-center px-3 pb-3 bg-light rounded" style="height: 50px">
                        <div class="border-top pt-3">
                            <a href=""
                                class="text-dark fw-bold fs-5 mb-0 lh-sm faculty-title">{{ @$profile->nameEn }}
                            </a>
                            <p class="fw-bold common-font-color fs-6 mb-1 pt-2">
                                {{ @$profile->designation }}
                            </p>
                        </div>
                    </div> --}}
                {{-- </div> --}}
                {{-- <img class="rounded-circle" src="{{  @$vcInfo->profile->photo ? asset('upload/profiles/' . @$vcInfo->profile->photo) :  @$vcInfo->profile->photo_path }}"/> --}}
            {{-- </div> --}}
            <div class="col-lg-12 col-md-12 col-sm-12 profile-info">
                <div class="bg-light p-3 rounded shadow about-message-content">
                    <div class="w-100 p-5" style="display: flex; flex-direction: column; align-items: center;">
                        <i class="fa-solid fa-5x fa-person-digging mb-3"></i>
                        <h2 class="fs-3 fw-bold pb-3 mb-3 common-font-color"> This Page is Under Construction </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
