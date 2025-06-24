{{-- @extends('frontend.landing') --}}
@extends('frontend.department.tamplate_four.partials.main-second')
@php
   $page_title = 'About ' . (@$department->name ?? '');
@endphp
@section('title')
    {{ $page_title }}
@endsection
@section('content')
<div class="faculty-profile-banner d-flex justify-content-center align-items-center" style=" background-image: url( {{ @$banner->image ? asset('upload/banner/' . $banner->image) : asset('frontend/assets/img/bup/banner.jpg') }} ) ">
    <h1 class="text-white font-poppins">{{ $page_title }}</h1>
</div>
    {{-- @include('frontend.partials.sections.banner-cover', ['page_title' => $page_title]) --}}
    <div class="course-details-area default-padding">
        <div class="container">
            <div class="row">
                <!-- Start Course Info -->
                <div class="col-md-12">
    
                    <div class="top-author">
                        <div class="author-items px-5 py-3"
                            style="border-top: 3px solid #1C4370;box-shadow:0 0 10px rgba(50, 50, 50, .17);">
                            
                            <div class="col-lg-12">
                                <div class="margin-top-30px">
    
                                    <div class="clearfix"></div>
                                    <h3 class="shadowLevel2">{{@$department->name}}</h3>
                                    <div class="clearfix"></div>
    
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-sm-12 text-justify margin-top-30px">
                                <p> {!! @$department->about !!} </p>
                            </div> 
    
    
                        </div>
                    </div>
                </div>
    
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
    
            </div>
        </div>
    </div>

@endsection
