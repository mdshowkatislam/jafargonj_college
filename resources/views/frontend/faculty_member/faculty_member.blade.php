<!-- ===== slider section start ===== -->
{{-- @extends('frontend.landing') --}}
@extends('frontend.layouts.master-landing')
@php
    $page_title = 'Faculty Members';
@endphp
@section('title')
    {{ $page_title }}
@endsection
<style>
    /* .chaiman-card-img {
        height: 180px !important;
        width: 180px !important;
        border-radius: 100%;
        padding: 5px;
        border: 5px solid #00c5bf;
        margin: 1rem auto;
    } */
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
    .member-list-card {
        height: 22rem !important;
    }
    .member-list-card img {
        height: 15rem;
        width: 100%;
        /* object-fit: cover; */
    }
    .card-body {
        flex: 1 1 auto;
        padding: var(--bs-card-spacer-y) var(--bs-card-spacer-x);
        color: var(--bs-card-color);
    }
    .bg-paste {
        --bs-bg-opacity: 1;
        background-color: #00c5bf !important;
    }
</style>
@section('content')
@include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])
    <!-- ===== Page title section start ===== -->
    <!-- Banner -->
    {{-- <section>
        <div class="faculty-profile-banner d-flex justify-content-center align-items-center">
            <h1 class="text-white font-poppins">{{ $page_title }}</h1>
        </div>
    </section> --}}
    <!-- Senate Chairman -->
    <section class="container">
        {{-- <h1 class=" text-secondary text-uppercase fs-3 mb-0 ">VC'S Office</h1>
        <div class="mb-0 mt-0 d-inline-block mx-auto" style="width: 30%; background-color: #8b0101; height: 4px"></div> --}}
        <div class="row">
            @foreach ($departments as $item)
                @php
                    $profiles = \App\Models\PersonnelsToFaculty::with('profile')
                        ->whereHas('department')
                        ->whereHas('profile')
                        ->where('department_id', @$item->id)
                        ->where('status', 1)
                        ->orderBy('sort_order', 'asc')
                        ->get();
                @endphp
                @if (count($profiles) > 0)
                    <div>
                        <h1 class="text-secondary fs-3 mt-5 ">{{ @$item->name }}</h1>
                        <div class="mb-3 d-inline-block mx-auto" style="width: 100%; background-color: #00c5bf; height: 4px">
                        </div>
                    </div>
                @endif

                @foreach ($profiles as $list)
                    {{-- @if (@$list->profile->appointment_type != 'Part-time') --}}
                        <div class="col-12 col-md-6 col-lg-3 my-3">
                            <a href="{{ route('faculty_member.details', $list->profile_id) }}">
                                <div class="bg-paste card rounded-0 member-list-card zoom_in_hover">
                                    <img class="mb-0"
                                        src="{{ asset('upload/profiles/' . @$list->profile->photo) }}"
                                        onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';"
                                        alt="Image" />
                                    {{-- <div class="scm-social-icon position-absolute">
                                            <a href="#"><i class="bi bi-facebook"></i></a>
                                            <a href="#"><i class="bi bi-instagram"></i></a>
                                            <a href="#"><i class="bi bi-youtube"></i></a>
                                            <a href="#"><i class="bi bi-skype"></i></a>
                                        </div> --}}
                                    <div class="card-body">
                                        <h5 class="card-title text-white fs-6 mt-0 text-center">
                                            {{ @$list->profile->nameEn }}
                                        </h5>
                                        <p class="card-text text-white text-center">
                                            {{ @$list->profile->designation }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    {{-- @endif --}}
                @endforeach

                {{-- @if (count($profiles->where('profile.appointment_type', '=', 'Part-time')) > 0)
                    <div class="pt-3">
                        <h4 class="mb-0 text-secondary" style="font-weight: bold">
                            Adjunct Faculty
                        </h4>
                    </div>
                @endif --}}
                {{-- <div class="row">
                    @foreach ($profiles as $list)
                        @if (@$list->profile->appointment_type == 'Part-time')
                            <div class="col-12 col-md-6 col-lg-3 my-3">
                                <a href="{{ route('faculty_member.details', @$list->profile_id) }}">
                                    <div class="bg-success card rounded-0 member-list-card zoom_in_hover">
                                        <img class="mb-0"
                                            src="{{ @$list->profile->photo ? asset('upload/profiles/' . @$list->profile->photo) : @$list->profile->photo_path }}"
                                            onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';"
                                            alt="Image" />
                                        <div class="card-body">
                                            <h5 class="card-title text-white fs-6 mt-0 text-center">
                                                {{ @$list->profile->nameEn }}
                                            </h5>
                                            <p class="card-text text-white text-center">
                                                {{ @$list->profile->designation }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div> --}}
            @endforeach
        </div>
    </section>
    <!-- ===== Page content section end ===== -->
@endsection
