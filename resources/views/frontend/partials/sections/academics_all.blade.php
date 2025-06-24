{{-- @extends('frontend.landing') --}}
@extends('frontend.layouts.master-landing')
@php
    $page_title = 'Faculty';
@endphp
@section('title')
    {{ $page_title }}
@endsection
<style>
    .faculty-aboutt{
        color: #ffffff !important;
    }
    .zoom_in_hover {
        -webkit-transform: scale(1);
        transform: scale(1);
        -webkit-transition: all 200ms linear;
        -moz-transition: all 200ms linear;
        -ms-transition: all 200ms linear;
        -o-transition: all 200ms linear;
        transition: all 200ms linear;

    }

    .zoom_in_hover:hover {
        -webkit-transform: scale(1.05);
        transform: scale(1.05);
        cursor: pointer;
    }
</style>

@section('content')
    {{-- @include('frontend.partials.sections.banner', ['page_title' => $page_title]) --}}
    @include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])

    {{-- <h1 class="fs-1 fw-bolder font-poppins text-center text-dark mt-3">{{$page_title}}</h1> --}}

    <section class="my-4">  
        <div class="container overview">
            
            <div class="row">
                @foreach ($faculties as $faculty)
                    <div class="col-lg-3">
                        <div class="faculties">
                            <div class="mb-4">
                                <a href="{{ route('faculty_home', $faculty->id) }}">
                                    <div class="common-bg-color card rounded-0 overflow-hidden zoom_in_hover">
                                        <img class="academic-image"
                                            style="height: 160px; width:100%;"
                                            src="{{ asset('upload/faculty/' . $faculty->image) }}"
                                            onerror="this.onerror=null;this.src='{{ asset('upload/no-image.png') }}';"
                                            alt="" />
                                        <div class="card-body academicAbout" style="background-color:#009999;">
                                            <a class="faculty_title" href="{{ route('faculty_home',$faculty->id) }}">
                                                <h3 class="card-title text-white fs-5 text-center"
                                                    style="text-shadow: 0px 3px 4px rgb(0 0 0 / 25%); height:50px;">
                                                    {{ $faculty->name }}
                                                </h3>
                                            </a>

                                            <div class="pt-3">
                                                <p class="faculty-aboutt" style="color: #ffffff; height: 5rem;">
                                                    {{ Str::limit(strip_tags(@$faculty->about), 80) }}
                                                </p>
                                            </div>
                                            
                                            <a class="text-white academics_details"
                                                href="{{ route('faculty_home', $faculty->id) }}">
                                                <p class="text-white d-flex align-items-center justify-content-end mb-0">
                                                    Find More<i class="fa-solid fa-arrow-right mx-2"></i>
                                                </p>
                                            </a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
