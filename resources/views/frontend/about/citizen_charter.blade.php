@extends('frontend.landing')
@php
$page_title = $banner->title;
@endphp
@section('title')
{{ $page_title }}
@endsection
<style>
    .about-wrap {
        padding: 25px 0 25px 0;
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
        border: 1px solid #198754;
    }

    .aboutSidebar .sidebarContent {
        margin-left: 32px;
        text-align: justify;
        margin-bottom: 16px;
    }

    .about-title {
        display: inline-block;
        color: #060606;
        font-weight: bold;
        border-bottom: 2px solid #198754;
    }

    .aboutSidebar ul a {
        text-decoration: none;
        display: block;
        width: 300px;
        font-size: 20px;
        font-weight: 600;
    }

    .aboutSidebar {
        position: absolute;
        height: 100%;
        z-index: 1;
    }

    .stickySidebar {
        position: sticky;
        position: -webkit-sticky;
        top: 105px;
    }
</style>
@section('content')

@include('frontend.partials.sections.banner', ['page_title' => $page_title])

<section class="container">
    <div class="citizen-charter-text mt-5 d-flex justify-content-between align-items-end">
        <h1 class="text-uppercase mb-0 home-content-heading">BUP Citizen Charter </h1>
  
        <div class="">
            <a href="{{url('upload/citizen_charter/'.$banner->file_path)}} " download class="text-decoration-none citizen-charter-btn btn shadow about-btn text-white px-3 py-1"><i class="fa fa-download"></i> Download</a>
        </div>
    </div>
    <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;"></div>
    <div class="pdf my-5">
       
        <iframe src="{{url('upload/citizen_charter/'.$banner->file_path)}} "
                type="application/pdf" width="100%" height="600px"
                style="max-width: 100%;"></iframe>      
    </div>
</section>

@endsection