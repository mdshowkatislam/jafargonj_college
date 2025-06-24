{{-- @extends('frontend.landing') --}}
@extends('frontend.department.tamplate_four.partials.main-second')
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
    <!-- Start Breadcrumb
============================================= -->
<div class="clearfix"></div>
{{-- <div class="breadcrumb-area shadow dark  text-center text-light"
style="background-image: url(http://localhost/butex-website/upload/banner/banner-butex.png); background-repeat: no-repeat;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h1>{{@$message->title_first_part}}</h1>
                <ul class="breadcrumb">
                    <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
                    <li class="active">{{@$message->title_first_part}}</li>
                </ul>
            </div>
        </div>
    </div>
</div> --}}
<!-- End Breadcrumb -->
<div class="faculty-profile-banner d-flex justify-content-center align-items-center" style=" background-image: url( {{ @$banner->image ? asset('upload/banner/' . $banner->image) : asset('frontend/assets/img/butex/banner-butex.png') }} ) ">
    <h1 class="text-white font-poppins">{{ $page_title }}</h1>
</div>
<!-- Start Course Details
============================================= -->
{{-- <div class="course-details-area default-padding">
    <div class="container">
        <div class="row"> --}}
            <!-- Start Course Info -->
            {{-- <div class="col-md-12">

                <div class="top-author">
                    <div class="author-items"
                        style="border-top: 3px solid #1C4370;box-shadow:0 0 10px rgba(50, 50, 50, .17);">
                        <div class="col-sm-3 col-lg-2">
                            <img src="{{ @$profile->photo ? asset('upload/profiles/' . @$profile->photo) : @$profile->photo_path }}"
                                alt="Image Not Found" class="img-thumbnail image-showing"
                                onerror="this.src='{{ asset('dummy/user-dummy.jpeg') }}'" style="width: 250px;">
                        </div>
                        <div class="col-lg-10 col-sm-9">
                            <div class="margin-top-30px">

                                <div class="clearfix"></div>
                                <h3 class="shadowLevel2">{{@$profile->nameEn}}</h3>
                                <div class="clearfix"></div>

                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-sm-12 text-justify margin-top-30px">
                            <p> {!! @$message->long_description !!} </p>
                        </div>


                    </div>
                </div>
            </div> --}}

            <!-- Start Course Sidebar -->
            <!-- Start Course Sidebar -->
            {{-- <div class="col-md-3">
                <div class="aside">
                    <!-- Sidebar Item -->
                    <div class="sidebar-item course-info">
                        <div class="title">
                            <h4>About</h4>
                        </div>
                        <ul>
                            <li><a href="#">History</a></li>
                            <li><a href="#">Mission & Vision</a></li>
                        </ul>
                    </div>

                </div>
            </div> --}}
            <!-- End Course Sidebar -->
            <!-- End Course Sidebar -->

        {{-- </div>
    </div>
</div> --}}
<!-- End content ============================================= -->

<section class="container">
    <div class="profile my-5">
        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="text-center bg-light shadow" style="height: 450px">
                    <div class="img p-4" style="height:330px;">
                        <img class="rounded w-100 h-100"
                            src="{{ asset('upload/profiles/' . @$profile->photo) }}"
                            onerror="this.onerror=null;this.src='{{ asset('dummy/user-dummy.jpeg') }}';" />
                        
                    </div>
                    <div class="text-center px-3 pb-3 bg-light rounded" style="height: 120px">
                        <div class="border-top pt-3">
                            <a href="{{ route('department_member_deatils', $message->profile->id) }}"
                                class="text-dark fw-bold fs-5 mb-0 lh-sm faculty-title">{{ $profile->nameEn }}
                            </a>
                            <p class="fw-bold common-font-color fs-6 mb-1 pt-2">
                                {{ $profile->designation }}
                            </p>
                        </div>
                    </div>
                </div>
                {{-- <img class="rounded-circle" src="{{  @$vcInfo->profile->photo ? asset('upload/profiles/' . @$vcInfo->profile->photo) :  @$vcInfo->profile->photo_path }}"/> --}}
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12 profile-info">
                <div class="bg-light p-3 rounded shadow about-message-content">
                    <div>
                        <h2 class="fs-3 fw-bold border-bottom pb-3 mb-3 common-font-color">Message from {{@$profile->nameEn}}
                        </h2>
                        <div class="text-justify fs-6">
                            
                            {!! @$message->long_description !!}

                        </div>
                    </div>
                </div>
                {{-- <a href="{{ route('office.people.details', @$vcInfo->profile->id) }}" class="fs-4 fw-bold text-dark mb-0">
                    {{$vcInfo->profile->nameEn}}
                </a>
                <h1 class="fs-5 fw-bold text-primary">{{$vcInfo->profile->designation}}</h1>

                <p>
                    {!! @$vcInfo->short_description !!}
                </p> --}}
            </div>
        </div>
    </div>
</section>

@endsection
