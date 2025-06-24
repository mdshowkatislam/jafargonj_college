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
        .sidebar-forms-formats {
            margin: 40px 10px;
        }

        .box-header-common {
            color: #56ccc8;
            text-align: center;
            font-size: 24px;
            font-weight: 700;

        }
    </style>

    <div style="background-color: #efefef; margin-top:40px;" class="ore-banner-hero text-center">
    @if (@$aboutFirst->image)
    <img class="w-100 h-100 img-thumbnail"
        src="{{ @$aboutFirst->photo ? asset('upload/chsr/' . @$aboutFirst->image) : @$aboutFirst->image }}"
        onerror="this.onerror=null;this.src='{{ asset('images/ore-banner-bg.jpg') }}';" />
@else
    <img class="w-100 h-100 img-thumbnail"
        src="{{ asset('images/ore-banner-bg.jpg') }}"
        onerror="this.onerror=null;this.src='{{ asset('images/ore-banner-bg.jpg') }}';" /> 
@endif

    <h3 style="padding: 30px;">Welcome to Office of Research & Extension (ORE)</h3>
  
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                @foreach ($about as $aboutBox)
                    <div class="about-ore-box">
                        <h4 class="box-header-common">{{ @$aboutBox->title }}</h4>
                        {!! @$aboutBox->description !!}
                    </div>
                @endforeach

            </div>
            <div class="col-md-3">
                <div class="sidebar-forms-formats">
                    <h4 style="text-align: center;">Forms & Formats</h4>
                </div>
            </div>
        </div>
    </div>




    <script></script>
@endsection
