@extends('frontend.department.tamplate_three.partials.main')

@php
    $page_title = "All Faculties"
@endphp
@section('title'){{$page_title}} @endsection



@section('content')
<div class="faculty-profile-banner d-flex justify-content-center align-items-center" style=" background-image: url( {{ @$banner->image ? asset('upload/banner/' . $banner->image) : asset('frontend/assets/img/bup/banner.jpg') }} ) ">
        <h1 class="text-white font-poppins">{{ $page_title }}</h1>
    </div>
    @include('frontend.partials.sections.search', ['page_title' => $page_title])
    <!-- Hero Title -->
    {{-- <section class="" style="min-height: 350px">
    </section> --}}
    <section class="container mb-5 mt-4">
        {{-- <h2 class="fs-4 fw-bold text-primary d-flex justify-content-center my-5">Our Faculty</h2> --}}
        <div class="row">
            @foreach ($faculty_members as $key => $member)
            @if ($member->profile->appointment_type != 'Part-time')
            <div class="col-12 col-md-6 col-lg-3 mt-4">
                <div class="shadow-lg card rounded-0 border-0 d-block text-center pt-3 faculty_member">
                    <div class="border-one"></div>
                    <div class="border-two"></div>
                    <img class="mx-2 mt-2 shadow-lg image-circle" src="{{ $member->profile->photo ? asset('upload/profiles/' . $member->profile->photo) : $member->profile->photo_path }}"
                        height="200" width="200"
                        onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';"
                        alt="" />

                    <div class="card-body bg-light shadow-lg" style="min-height: 7.75rem">
                        <a href="{{route('faculty_member.details', $member->profile_id)}}">
                            <div class="faculty-member-title d-flex justify-content-center content-title">
                                <h5 class="card-title fs-5 text-center text-captilize common-font-color">
                                    {{ $member->profile->nameEn }}
                                    </h5>
                            </div>
                            <p class="text-center fs-6 common-font-color">
                                {{ $member->profile->designation }}
                            </p>
                        </a>

                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>

    </section>

@if (count($faculty_members->where('profile.appointment_type', '=', 'Part-time'))>0)
<section class="container mb-5 mt-4">
    <div class="d-flex justify-content-between align-items-end">
        <h1 class="text-uppercase mb-0 home-content-heading">
            Adjunct Faculty
        </h1>
        {{-- <a href="" class="text-uppercase text-decoration-none fw-bold common-font-color">All</a> --}}
    </div>
    <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;">
    </div>
    {{-- <h2 class="fs-4 fw-bold text-primary d-flex justify-content-center my-5">Our Faculty</h2> --}}
    <div class="row">
        @foreach ($faculty_members as $key => $member)
        @if ($member->profile->appointment_type == 'Part-time')
        <div class="col-12 col-md-6 col-lg-3 mt-4">
            <div class="shadow-lg card rounded-0 border-0 d-block text-center pt-3 faculty_member">
                <div class="border-one"></div>
                <div class="border-two"></div>
                <img class="mx-2 mt-2 shadow-lg image-circle" src="{{ $member->profile->photo ? asset('upload/profiles/' . $member->profile->photo) : $member->profile->photo_path }}"
                    height="200" width="200"
                    onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';"
                    alt="" />

                <div class="card-body bg-light shadow-lg" style="min-height: 7.75rem">
                    <a href="{{route('faculty_member.details', $member->profile_id)}}">
                        <div class="faculty-member-title d-flex justify-content-center">
                            <h5 class="card-title fs-5 text-center text-captilize common-font-color">
                                {{ $member->profile->nameEn }}
                                </h5>
                        </div>
                        <p class="text-center fs-6 common-font-color">
                            {{ $member->profile->designation }}
                        </p>
                    </a>

                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</section>
@endif

@endsection
