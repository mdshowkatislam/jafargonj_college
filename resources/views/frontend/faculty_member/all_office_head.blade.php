<!-- ===== slider section start ===== -->
@extends('frontend.layouts.master-landing')
@php
    $page_title = 'Head of Offices';
@endphp
@section('title')
    {{ $page_title }}
@endsection
<style>
    .dean-card-img {
        height: 180px !important;
        width: 180px !important;
        border-radius: 100%;
        padding: 5px;
        border: 5px solid #00c5bf;
        margin: 1rem auto;
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
        <div class="row mb-5">
            @foreach ($offices as $item)
            @php
                $name = \App\Models\PersonnelsToOffice::where('profile_id', $item->profile_id)->where('status', 1)->first();

                $designations1  = @$name->designations ?? '';
                $designations2  = @$name->additional_charge ?? '';
                $designations3  = @$name->additional_designation ?? '';

            @endphp 
            {{-- @if ($is_active_profile) --}}
                <div class="col-12 col-md-6 col-lg-3 mt-5">
                    {{-- <div>
                        <h1 class="text-secondary fs-5 fw-bold d-flex align-items-end" style="height: 80px; overflow:hidden;">{{ @$item->name }}
                        </h1>
                        <div class="mb-4 d-inline-block mx-auto" style="width: 100%; background-color: #8b0101; height: 4px">
                        </div>
                    </div> --}}
                    {{-- <div class=""> --}}
                        <div class="card  zoom_in_hover shadow" style="cursor:auto;">
                            <img class="dean-card-img"
                                src="{{ asset('upload/profiles/' . @$item->profile->photo) }}"
                                onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';"
                                alt="Image" />

                            {{-- <div class="scm-social-icon position-absolute">
                                    <a href="#"><i class="bi bi-facebook"></i></a>
                                    <a href="#"><i class="bi bi-instagram"></i></a>
                                    <a href="#"><i class="bi bi-youtube"></i></a>
                                    <a href="#"><i class="bi bi-skype"></i></a>
                                </div> --}}
                                <hr class="mx-2">
                            <div class="card-body" style="min-height: 11rem;">
                                <a href="{{ route('office.people.details', $item->profile->id) }}">
                                    <h5 class="card-title fs-6 fw-bold mt-0 text-center" style="min-height:1rem; overflow:hidden">
                                        {{ $item->profile->nameEn }}
                                    </h5>
                                    
                                    <h5 class="card-text text-dark text-center">
                                        Head
                                    </h5>

                                    @if(@$designations1)
                                        <h6 class="card-text text-dark text-center">
                                            <i class="bi bi-person-fill"></i><span
                                                class="mx-2 text-">{{ @$designations1 }}</span>
                                        </h6>
                                    @endif

                                    @if(@$designations2)
                                        <h6 class="card-text text-dark text-center">
                                            <i class="bi bi-person-fill"></i><span
                                                class="mx-2 text-">{{ @$designations2 }}</span>
                                        </h6>
                                    @endif

                                    @if(@$designations3)
                                        <h6 class="card-text text-dark text-center">
                                            <i class="bi bi-person-fill"></i><span
                                                class="mx-2 text-">{{ @$designations3 }}</span>
                                        </h6>
                                    @endif

                                </a>

                            </div>
                        </div>
                    {{-- </div> --}}
                </div>
            {{-- @endif --}}
            @endforeach
        </div>
    </section>

    <!-- ===== Page content section end ===== -->
@endsection
