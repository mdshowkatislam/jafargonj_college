{{-- @extends('frontend.landing') --}}
@extends('frontend.layouts.master-landing')
@php
    $page_title = 'All Subjects';
@endphp
@section('title')
    {{ $page_title }}
@endsection
<style>
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
    .faculty_department_text, .faculty_department_text h3 {
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>

@section('content')
    {{-- @include('frontend.partials.sections.banner', ['page_title' => $page_title]) --}}
    @include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])

    {{-- <h1 class="fs-1 fw-bolder font-poppins text-center text-dark mt-3">{{$page_title}}</h1> --}}
    
    <section class="my-4">
        <div class="container overview">
            
            <div class="row">
                @foreach ($departments as $department)
                    <div class="col-md-4 col-sm-6 pt-4">
                        <a href="{{ route('department_home', $department->id) }}">
                            <div class="card rounded-0 overflow-hidden bg-light shadow faculty_department zoom_in_hover"
                                style="height: 20rem;"> {{-- it was 27rem --}}
                                <img class="department-image w-100"
                                    style="height: 12rem;"
                                    src="{{ asset('upload/department/' . @$department->image) }}"
                                    onerror="this.onerror=null;this.src='{{ asset('upload/no-image.png') }}';"
                                    alt="" />
                                <div class="card-body faculty_department_text bg-danger">
                                    <a href="{{ route('department_home', $department->id) }}">
                                        <h3 class="card-title fs-5 text-center fw-bolder text-white" style="height:65px;">
                                            {{ $department->name }}
                                        </h3>
                                    </a>
                                    {{-- <p class="card-text"> --}}
                                    {{-- {!! Str::limit(@$department->about, 120) !!} --}}
                                    {{-- </p> --}}
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
