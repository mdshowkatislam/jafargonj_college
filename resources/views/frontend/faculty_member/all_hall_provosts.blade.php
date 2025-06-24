<!-- ===== slider section start ===== -->
@extends('frontend.layouts.master-landing')
@php
    $page_title = 'Provost of Halls';
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
    
    <section class="container">
        {{-- <h1 class=" text-secondary text-uppercase fs-3 mb-0 ">VC'S Office</h1>
        <div class="mb-0 mt-0 d-inline-block mx-auto" style="width: 30%; background-color: #8b0101; height: 4px"></div> --}}
        <div class="row mb-5">
            @foreach ($provosts as $item)
            {{-- @php
                $is_active_profile = \App\Models\PersonnelsToFaculty::where('profile_id', $item->profile_id)->where('status', 1)->first();
            @endphp --}}
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
                                src="{{ asset('upload/profiles/' . @$item->provostProfile->photo) }}"
                                onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';"
                                alt="Image" />

                            {{-- <div class="scm-social-icon position-absolute">
                                    <a href="#"><i class="bi bi-facebook"></i></a>
                                    <a href="#"><i class="bi bi-instagram"></i></a>
                                    <a href="#"><i class="bi bi-youtube"></i></a>
                                    <a href="#"><i class="bi bi-skype"></i></a>
                                </div> --}}
                                <hr class="mx-2">
                            <div class="card-body" style="min-height: 12rem;">
                                <a href="{{ route('faculty_member.details', $item->provostProfile->id) }}">
                                    <h5 class="card-title fs-6 fw-bold mt-0 text-center" style="min-height:3rem; overflow:hidden">
                                        {{ $item->provostProfile->nameEn }}
                                    </h5>
                                    <p class="text-center common-font-color fs-6 custom-font-titillium-web my-0">
                                        Provost
                                    </p>
                                    <p class="text-center common-font-color fs-6 custom-font-titillium-web">
                                        {{ @$item->name }}
                                    </p>
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
