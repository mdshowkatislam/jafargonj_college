@extends('frontend.layouts.master-landing')

@php
    $page_title = $convocations->title;
@endphp

@section('title')
    {{ $page_title }}
@endsection

@section('content')

<style>

    .my-hover-tab{
        color: #00C5BF !important;
    }

    .my-hover-tab:hover{
        background-color: #bd4450;
        color: white !important;
    }

    /* Selected tab styling */
    .active-tab .my-hover-tab {
        background-color: #bd4450;
        color: white !important;
    }

    .about-wrap {
        /* padding: 25px 0 25px 0; */
        font-size: 1rem;
    }

    .aboutSidebar ul li {
        background: #f1f1f1;
        color: white;
        margin-bottom: 5px;
        cursor: pointer;
        padding: 2px 0 3px 10px;
        display: block;
    }

    .aboutSidebar ul li:hover {
        /* background: #50A2CA; */
        border: 1px solid #00c5bf;
    }

    .aboutSidebar .sidebarContent {
        margin-left: 32px;
        text-align: justify;
        margin-bottom: 16px;
    }

    .about-title {
        display: inline-block;
        color: #00C5BF;
        font-weight: 600;
        padding-bottom: 10px;
        font-family: "Titillium Web", sans-serif;
    }

    .aboutSidebar ul a {
        text-decoration: none;
        display: block;
        width: 300px;
        font-size: 20px;
        font-weight: 600;
    }

    .aboutSidebar {
        position: relative;
        z-index: 9999;
        width: 90%;
        background: #FFF;
        
    }

    .stickySidebar {
        position: sticky;
        position: -webkit-sticky;
        top: 130px;
    }
    .sticky-content p{
        font-family: "Titillium Web", sans-serif;
    }

    
</style>

<style>
                                            table {
                                                border-collapse: collapse;
                                                width: 100%;
                                                margin: 10px 0;
                                            }
                                            table, th, td {
                                                border: 1px solid #ddd;
                                                padding: 8px;
                                            }
                                            th {
                                                background-color: #f4f4f4;
                                                text-align: left;
                                            }
                                        </style>

<div class="">
    <div class="container">
        <div class="large-12 medium-12 columns mt-4 mb-4"><div class="azoom-single-image  center-text">
            <img src="{{ asset('uploads/' . @$convocations->data10) }}" class="img-fluid"></div>
        </div>
    </div>

    <div style="background:rgba(233, 233, 233, 0.72);">
        <div class="container">
            <h2 class="text-center p-3" style="font-weight: 600;">{{ $convocations->title }}</h2>
            <div class="row mt-4 mb-4">
                <div class="col-sm-9">
                    <div class="p-2 mb-4" style="background: #FCECE8; border-radius: 5px;">
                        <p>{!! @$convocations->long_description !!}</p>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4 mb-5">
                            <div class="stickySidebar">
                                <div class="aboutSidebar shadow-sm pb-3 mb-5  rounded program-type">
                                    <!-- <h1 class="text-white text-uppercase fw-bolder py-3 ps-3 fs-5 mb-0 mt-0 common-bg-color" style="width: 100%; ">About</h1> -->
                                    
                                    <a href="#history" class="fs-6 fw-bold active-tab" onclick="selectTab(this)">
                                        <div class="border-bottom my-hover-tab p-3 " onclick="stickyPaddingTop('history',130)">
                                        Who Can Register &nbsp; 
                                        </div>
                                    </a>

                                    <a href="#vision" class="fs-6 fw-bold" onclick="selectTab(this)">
                                        <div class="p-3 border-bottom my-hover-tab" onclick="stickyPaddingTop('vision',130)" >
                                        How To Register &nbsp; 
                                        </div>
                                    </a>

                                    <a href="#mission" class="fs-6 fw-bold" onclick="selectTab(this)">
                                        <div class="p-3 border-bottom my-hover-tab" onclick="stickyPaddingTop('mission',130)" >
                                        Committees &nbsp; 
                                        </div>
                                    </a>

                                    <a href="#value" class="fs-6 fw-bold" onclick="selectTab(this)">
                                        <div class="p-3 border-bottom my-hover-tab" onclick="stickyPaddingTop('value',130)">
                                        Special Instruction &nbsp; 
                                        </div>
                                    </a>

                                    <a href="#object" class="fs-6 fw-bold" onclick="selectTab(this)">
                                        <div class="p-3 border-bottom my-hover-tab" onclick="stickyPaddingTop('object',130)">  
                                        Frequently Asked Questions &nbsp; 
                                        </div>
                                    </a>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8 shadow-sm mb-3 bg-light">
                            <div id="accordion">
                                <div class="rightSidebar">
                                    <div id="history" class="sticky-content">
                                        <h3 class="about-title">Who Can Register : </h3>
                                        {!! $convocations->data1 !!}
                                    </div>
                                    <div id="vision" class="sticky-content">
                                        <h3 class="about-title">How To Register : </h3>
                                        {!! $convocations->data2 !!}
                                        <p>&nbsp;</p>
                                    </div>
                                    
                                    <div id="mission" class="sticky-content">
                                        <h3 class="about-title">Committees : </h3>
                                        {!! $convocations->data3 !!}

                                        <p>&nbsp;</p>
                                    </div>
                                    <div id="value" class="sticky-content">
                                        <h3 class="about-title">Special Instruction : </h3>
                                        {!! $convocations->data4 !!}
                                    </div>
                                    <div id="object" class="sticky-content">
                                        <h3 class="about-title">Frequently Asked Questions : </h3>
                                        {!! $convocations->data5 !!}

                                        <p>&nbsp;</p>
                                    </div>    
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-sm-3">
                    @if(@$convocations->registration_status == 1)
                        <div class="text-center p-4" style="background-color:rgb(243, 111, 111); height: 90px; margin-top: 30px;">
                            <a href="{{ @$convocations->registration_link }}" target="_blank"><button class="btn text-light" style="border: 2px solid white;">Registration Now</button></a>
                        </div>
                    @else 
                        <div class="text-center p-4" style="background-color:rgb(245, 112, 112); height: 90px; margin-top: 30px;">
                            <a href="#"><button class="btn text-light" style="border: 2px solid white;">Registration Closed</button></a>
                        </div>
                    @endif

                        <div style="margin-top: 60px;">
                            <div class="">
                                <div class="d-flex justify-content-between align-items-end">
                                    <h1 class="text-uppercase mb-0 home-content-heading custom-font-titillium-web" style="font-size: 1.14rem !important;">Convocation Updates</h1>
                                </div>
                                <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;"></div>
                                    @foreach(@$notice as $data)
                                        <div class="top-author p-2" style="border-bottom: 1px solid black;">
                                            <h5 style="text-align: justify; font-size:15px;">
                                                <a href="{{ route('type.details', ['id' => $data->id, 'type' => 'notice']) }}" class="custom-font-titillium-web" target="_blank">{{ $data->title }}</a>
                                            </h5>
                                            <li style="border: none; text-align: left;">
                                                <span>Published: {{ \Carbon\Carbon::parse($data->date)->format('d M, Y') }}</span>
                                            </li>
                                        </div>
                                    @endforeach
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

<script>
    function stickyPaddingTop(id, paddingTopValue) {
        var element = document.getElementById(id);
        element.style.paddingTop = paddingTopValue + "px";

        var allElements = document.querySelectorAll(".rightSidebar .sticky-content");
        for (var i = 0; i < allElements.length; i++) {
            var currentElement = allElements[i];
            if (currentElement.id !== id) {
                currentElement.style.paddingTop = 0;
            }
        }
    }

    function selectTab(element) {
        document.querySelectorAll('.fs-6.fw-bold').forEach(tab => {
            tab.classList.remove('active-tab');
        });
        element.classList.add('active-tab');
    }
    
</script>



@endsection