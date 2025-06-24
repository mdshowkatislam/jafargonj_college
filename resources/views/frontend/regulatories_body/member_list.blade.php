<!-- ===== slider section start ===== -->
@extends('frontend.layouts.master-landing')
<style>
    .faculty-profile-banner {
        height: 250px;
        background-image: linear-gradient(#00c5bf,
                rgba(1, 39, 11, 0.75)),
            url({{ @$banner->image ? asset('upload/banner/' . $banner->image) : '' }});
    }

    .text-white {
        color: white !important;
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
        /* cursor: pointer; */
    }
</style>
@php
    $page_title = $committee->name;
@endphp
@section('title')
    {{ $page_title }}
@endsection
@section('content')
    <!-- ===== Page title section start ===== -->
    <section>
        <div class="clearfix"></div>
        {{-- @include('frontend.partials.sections.banner-cover', ['page_title' => $page_title]) --}}
        @include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])

    </section>
    <!-- Senate Chairman -->
    <br>
    @if (!isset($members[0]))
    <section class="container mt-2">
        <div class="col-md-12 text-center">
            <h2 class="fs-5 p-3 mt-3  mb-0 bg-light rounded">Currently, there are no available information</h2>
        </div>
    </section>
    @endif
    <section class="container mt-3">
        @foreach (@$members as $member)
            @if ($member->post_id == 1)
                <h1 class="text-uppercase fs-3 mb-0" style="font-weight: 400;">Chairman</h1>
                <div class="mb-0 mt-0 d-inline-block mx-auto"
                     style="width: 100%; background-color: #00c5bf; height: 4px">
                </div>
            @break
        @endif
    @endforeach
    <div class="row ">
        <br>
        @foreach (@$members as $member)
            @if ($member->post_id == 1)
                <div class="col-12 col-md-6 col-lg-3 my-3">
                    <style>
                        .bg-success {
                            opacity: 1;
                            background-color: #00c5bf !important;
                        }
                    </style>
                    <div class="bg-success card rounded-0 member-list-card zoom_in_hover"
                         style="opacity: 1; ">
                        <img class="mb-0"
                             src="{{ @$member->profile->photo ? asset('upload/profiles/' . @$member->profile->photo) : $member->profile->photo_path }}"
                             onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';"
                             alt="{{ @$member->profile->nameEn }}" />
                        {{-- <div class="scm-social-icon position-absolute">
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-youtube"></i></a>
                    <a href="#"><i class="bi bi-skype"></i></a>
                </div> --}}
                        <div class="card-body"
                             style="height: 120px; overflow:hidden;margin-top:10px;">
                            <h5 class="card-title text-white fs-6 mt-0 text-center">
                                {{ @$member->profile->nameEn }}
                            </h5>
                            <p class="card-text text-white text-center">
                                {{ @$member->profile->designation }}
                            </p>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

</section>

<!-- Senate Member  -->
<br>
<section class="container mt-3">
    @foreach (@$members as $member)
        @if ($member->post_id == 3)
            <h1 class="text-uppercase fs-3 mb-0">Member</h1>
            <div class="mb-0 mt-0 d-inline-block mx-auto"
                 style="width: 100%; background-color: #00c5bf; height: 4px">
            </div>
        @break
    @endif
@endforeach
<br>
<div class="row ">
    @foreach (@$members as $member)
        @if ($member->post_id == 3)
            {{-- @dd($member) --}}
            <div class="col-12 col-md-6 col-lg-3 my-3">
                <div class="bg-success card rounded-0 member-list-card zoom_in_hover">
                    <img class="mb-0"
                         src="{{ @$member->profile->photo ? asset('upload/profiles/' . @$member->profile->photo) : @$member->profile->photo_path }}"
                         onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';"
                         alt="{{ @$member->profile->nameEn }}" />
                   
                    <div class="card-body"
                         style="height: 120px; overflow:hidden;margin-top:10px;">
                        <h5 class="card-title text-white fs-6 mt-0 text-center">
                            {{ @$member->profile->nameEn }}
                        </h5>
                        <p class="card-text text-white text-center">
                            {{ @$member->profile->designation }}
                        </p>
                    </div>
                </div>
                <br>
            </div>
          
        @endif
    @endforeach
  
</div>
<br>
<br>
<br>

</section>
<!-- Senate Secretary -->
<section class="container mb-2">
  
@foreach (@$members as $member)
    @if ($member->post_id == 2)
        <h1 class="text-uppercase fs-3 mb-0 ">Member Secretary</h1>
        <div class="mb-0 mt-0 d-inline-block mx-auto"
             style="width: 100%; background-color: #00c5bf; height: 4px">
        </div>
    @break
@endif
@endforeach
<div class="row">
    <br>
@foreach (@$members as $member)
    @if ($member->post_id == 2)
        {{-- @dd($member) --}}
        
        <div class="col-12 col-md-6 col-lg-3 my-3">
            <div class="bg-success card rounded-0 member-list-card zoom_in_hover">
                <img class="mb-0"
                     src="{{ @$member->profile->photo ? asset('upload/profiles/' . @$member->profile->photo) : @$member->profile->photo_path }}"
                     onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';"
                     alt="{{ @$member->profile->nameEn }}" />
                {{-- <div class="scm-social-icon position-absolute">
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-youtube"></i></a>
                    <a href="#"><i class="bi bi-skype"></i></a>
                </div> --}}
                <div class="card-body"
                     style="height: 120px; overflow:hidden;margin-top:10px;">
                    <h5 class="card-title text-white fs-6 mt-0 text-center">
                        {{ @$member->profile->nameEn }}
                    </h5>
                    <p class="card-text text-white text-center">
                        {{ @$member->profile->designation }}
                    </p>
                </div>
            </div>
            <br>
        </div>
    @endif
@endforeach
</div>



</section>

@endsection
