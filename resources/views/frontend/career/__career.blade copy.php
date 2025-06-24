@extends('frontend.layouts.master-landing')
@php
    $page_title = 'Career';
@endphp
@section('title')
    {{ $page_title }}
@endsection
@section('content')

  
    <div class="breadcrumb-area shadow dark text-center text-light"
        style="background-image: url(http://localhost/butex-website/upload/banner/banner-butex.png); background-repeat: no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h2>Approved NOC / GO</h2>
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/') }}"><i class="fas fa-home"></i> Home</a></li>
                        <li class="active">Approved NOC / GO</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
        <div class="container">
            <div class="text-center">
                <div class="list-tabs mt-4">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="nav-tab-job-99" href="#tab-job-99" data-bs-toggle="tab" role="tab" aria-controls="tab-job-99" aria-selected="true">
                                <img src="" alt=""> All
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="nav-tab-job-1" href="#tab-job-1" data-bs-toggle="tab" role="tab" aria-controls="tab-job-1" aria-selected="true">
                                <img src="" alt=""> Teachers
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="nav-tab-job-2" href="#tab-job-2" data-bs-toggle="tab" role="tab" aria-controls="tab-job-2" aria-selected="false">
                                <img src="" alt=""> Officers
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="nav-tab-job-3" href="#tab-job-3" data-bs-toggle="tab" role="tab" aria-controls="tab-job-3" aria-selected="false">
                                <img src="" alt=""> Class III
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="nav-tab-job-4" href="#tab-job-4" data-bs-toggle="tab" role="tab" aria-controls="tab-job-4" aria-selected="false">
                                <img src="" alt=""> Class IV
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="nav-tab-job-5" href="#tab-job-5" data-bs-toggle="tab" role="tab" aria-controls="tab-job-5" aria-selected="false">
                                <img src="" alt=""> Other
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="mt-4">
                <div class="tab-content" id="myTabContent-1">
                    <div class="tab-pane fade show active" id="tab-job-99" role="tabpanel" aria-labelledby="tab-job-99">
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                <div class="card-grid-2 hover-up padder">
                                    <div class="card-block-info">
                                        <div class="custom_min_height1">
                                            <h6><a href="">সচিব, Institute of Business Administration (01 post)</a></h6>
                                        </div>
                                        <div class="mt-5">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <i class="fa fa-user" aria-hidden="true" style="font-size: 16px"></i>
                                                    Officer [Grade 9 (22,000-53,060)]
                                                </li>
                                                <li>
                                                    <i class="fa fa-clock" aria-hidden="true" style="font-size: 16px"></i> Posted on: 2024-06-25
                                                </li>
                                                <li>
                                                    <i class="fa fa-calendar" aria-hidden="true" style="font-size: 16px"></i> Deadline: 
                                                    <span class="text-success fw-bold">2024-07-16 (Open)</span>
                                                </li>
                                                <li>
                                                    <i class="fa fa-globe" aria-hidden="true" style="font-size: 16px"></i> Application Mode: 
                                                    <span class="text-danger">Offline</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <p class="font-sm color-text-paragraph mt-3"></p>
                                        <div class="card-2-bottom mt-3">
                                            <div class="row">
                                                <div class="col-12 text-center">
                                                    <a href="" class="btn btn-apply-now" target="_blank">View Details</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
            </div>
            
        </div>
  

@endsection

