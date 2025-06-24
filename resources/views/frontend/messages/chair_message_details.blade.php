@extends('frontend.landing')
@php
   $page_title = (@$message->title_first_part ?? '');
@endphp
@section('title')
    {{ $page_title }}
@endsection
@section('content')
    @include('frontend.partials.sections.banner-cover', ['page_title' => $page_title])

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
<!-- Start Course Details
============================================= -->
<div class="course-details-area default-padding">
    <div class="container">
        <div class="row">
            <!-- Start Course Info -->
            <div class="col-md-9">

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
            </div>

            <!-- Start Course Sidebar -->
            <!-- Start Course Sidebar -->
            <div class="col-md-3">
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
            </div>
            <!-- End Course Sidebar -->
            <!-- End Course Sidebar -->

        </div>
    </div>
</div>
<!-- End content ============================================= -->
@endsection
