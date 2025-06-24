@extends('frontend.landing')
@php
   $page_title = 'Office of Research & Extension (ORE)';
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
        
    </script>

    <div class="course-details-area default-padding">
        <div style="background-color: #efefef" class="ore-banner-hero text-center">
            <img src="{{asset('images/ore-banner-bg.jpg')}}" alt="butex-ore-banner">
            <h3 style="padding: 30px;">Welcome to Office of Research & Extension (ORE)</h3>
        </div>
       
        <div class="container">
            <div class="row">
                
            </div>


        </div>
    </div>
@endsection
