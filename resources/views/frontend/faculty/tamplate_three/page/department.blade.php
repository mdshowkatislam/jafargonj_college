
@extends('frontend.faculty.tamplate_three.partials.main')

@php
    $page_title = "Department"
@endphp
@section('title'){{$page_title}} @endsection



@section('content')
<div class="faculty-profile-banner d-flex justify-content-center align-items-center" style=" background-image: url( {{ @$banner->image ? asset('upload/banner/' . $banner->image) : asset('frontend/assets/img/bup/banner.jpg') }} ) ">
        <h1 class="text-white font-poppins text-center">{{ $page_title }}</h1>
    </div>
    <!-- Hero Title -->
    

    <section class="pb-5 pt-4" style="background: #FFEDC942;">
        <div class="container">
            <div class=" row ">
                @foreach ($departments as $department)
                    <div class="col-md-4  pt-4">
                        <div class="card rounded-0 overflow-hidden bg-light shadow faculty_department "
                            style="height: 27rem;">
                            <img class="department-image w-100"
                                src="{{ asset('upload/department/' . @$department->image) }}"
                                onerror="this.onerror=null;this.src='{{ asset('upload/no-image.png') }}';"
                                alt="" />
                            <div class="card-body faculty_department_text">
                                <a href="{{ route('department_home', $department->id) }}">
                                    <h3 class="card-title  fs-5 text-center fw-bolder" style="height:48px;">
                                        {{ $department->name }}
                                    </h3>
                                </a>
                                {{-- <p class="card-text"> --}}
                                {!! Str::limit(@$department->about, 160) !!}
                                {{-- </p> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    
@endsection
