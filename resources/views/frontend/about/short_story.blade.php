@extends('frontend.layouts.master-landing')
@php
$page_title = 'Butex About';
@endphp
@section('title')
{{ $page_title }}
@endsection
@section('content')

{{-- @include('frontend.partials.sections.banner-cover5', ['page_title' => $page_title]) --}}
@include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])

{{-- @dd($about) --}}

<section>
    <div class="about-wrap pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4  mb-5">
                    <div class="stickySidebar">
                        <div class="aboutSidebar shadow pb-3 mb-5  rounded program-type">
                            <h1 class="text-white text-uppercase fw-bolder py-3 ps-3 fs-5 mb-0 mt-0 common-bg-color" style="width: 100%; ">About</h1>
                            
                            <a href="#history" class="fs-6 fw-bold" onclick="selectTab(this)">
                                <div class="border-bottom my-hover-tab p-3" onclick="stickyPaddingTop('history',130)">
                                    History &nbsp; 
                                </div>
                            </a>

                            <a href="#vision" class="fs-6 fw-bold" onclick="selectTab(this)">
                                <div class="p-3 border-bottom my-hover-tab" onclick="stickyPaddingTop('vision',130)" >
                                    Vision &nbsp; 
                                </div>
                            </a>

                            <a href="#mission" class="fs-6 fw-bold" onclick="selectTab(this)">
                                <div class="p-3 border-bottom my-hover-tab" onclick="stickyPaddingTop('mission',130)" >
                                    Mission &nbsp; 
                                </div>
                            </a>

                            <a href="#value" class="fs-6 fw-bold" onclick="selectTab(this)">
                                <div class="p-3 border-bottom my-hover-tab" onclick="stickyPaddingTop('value',130)">
                                    Core Values &nbsp; 
                                </div>
                            </a>

                            <a href="#object" class="fs-6 fw-bold" onclick="selectTab(this)">
                                <div class="p-3 border-bottom my-hover-tab" onclick="stickyPaddingTop('object',130)">  
                                    Objectives &nbsp; 
                                </div>
                            </a>
                            
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 shadow mb-3">
                    <div id="accordion">
                        <div class="rightSidebar">
                            <div id="history" class="sticky-content">
                                <h3 class="about-title">History : </h3>
                                {!! $about->history !!}
                            </div>
                            <div id="vision" class="sticky-content">
                                <h3 class="about-title">Vision : </h3>
                                {!! $about->vision !!}
                                <p>&nbsp;</p>
                            </div>
                            
                            <div id="mission" class="sticky-content">
                                <h3 class="about-title">Mission : </h3>
                                {!! $about->mission !!}

                                <p>&nbsp;</p>
                            </div>
                            <div id="value" class="sticky-content">
                                <h3 class="about-title">Core Values : </h3>
                                {!! $about->core_values !!}
                            </div>
                            <div id="object" class="sticky-content">
                                <h3 class="about-title">Objectives : </h3>
                                {!! $about->objective !!}

                                <p>&nbsp;</p>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
@push('styles')
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



@endpush

@push('scripts')
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

@endpush