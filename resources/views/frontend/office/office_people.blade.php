<!-- ===== slider section start ===== -->
@extends('frontend.layouts.master-landing')
@php
    $page_title = 'Officers';
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
</style>
@section('content')
    <!-- ===== Page title section start ===== -->
    {{-- @include('frontend.partials.sections.banner', ['page_title' => $page_title]) --}}
    @include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])

    <!-- Senate Chairman -->
    <section class="container mt-5">
        {{-- <h1 class=" text-secondary text-uppercase fs-3 mb-0 ">VC'S Office</h1>
        <div class="mb-0 mt-0 d-inline-block mx-auto" style="width: 30%; background-color: #8b0101; height: 4px"></div> --}}
        <div class="row">
            @foreach ($offices as $office)
                <div>
                    <h1 class=" text-secondary text-uppercase fs-3 mb-0 ">{{ @$office->name }}</h1>
                    <div class="mb-0 mt-0 d-inline-block mx-auto w-100" style="background-color: #8b0101; height: 4px">
                    </div>
                </div>


                @php
                    $profile_names = \App\Models\PersonnelsToOffice::with('profile')
                        ->where('office_id', @$office->id)
                        ->where('status', 1)
                        ->orderBy('sort_order', 'asc')
                        ->get();
                    
                    // dd($profile_names);

                   
                    
                @endphp
                @if(count($profile_names)>0)
                @foreach ($profile_names as $name)

                            @php
                                    $designations1  = @$name->designations ?? '';
                                    $designations2  = @$name->additional_charge ?? '';
                                    $designations3  = @$name->additional_designation ?? '';
                            @endphp

                    <div class="col-12 col-md-6 col-lg-3 mt-3 mb-5">
                        <a href="{{ route('office.people.details', $name->profile->id) }}">
                            <div class="card rounded-0 member-list-card zoom_in_hover" style="background-color: #00c5bf; height: 450px;">
                                <img class="mb-0"
                                    src="{{ $name->profile->photo ? asset('upload/profiles/' . $name->profile->photo) : $name->profile->photo_path }}"
                                    onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';"
                                    alt="Image" />
                                {{-- <div class="scm-social-icon position-absolute">
                                    <a href="#"><i class="bi bi-facebook"></i></a>
                                    <a href="#"><i class="bi bi-instagram"></i></a>
                                    <a href="#"><i class="bi bi-youtube"></i></a>
                                    <a href="#"><i class="bi bi-skype"></i></a>
                                </div> --}}
                                <div class="card-body" style="min-height: 100px;">
                                    <h5 class="card-title text-white fs-6 mt-0 text-center">
                                        {{ $name->profile->nameEn }}
                                    </h5>

                                    <!-- <p class="card-text text-white text-center">
                                        {{ $name->profile->designation }}
                                    </p> -->

                                    @if(@$designations1)
                                        <h5 class="card-text text-white text-center">
                                            <i class="bi bi-person-fill"></i><span
                                                class="mx-2 text-">{{ @$designations1 }}</span>
                                        </h5>
                                    @endif

                                    @if(@$designations2)
                                        <h6 class="card-text text-white text-center">
                                            <i class="bi bi-person-fill"></i><span
                                                class="mx-2 text-">{{ @$designations2 }}</span>
                                        </h6>
                                    @endif

                                    @if(@$designations3)
                                        <h6 class="card-text text-white text-center">
                                            <i class="bi bi-person-fill"></i><span
                                                class="mx-2 text-">{{ @$designations3 }}</span>
                                        </h6>
                                    @endif

                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                @else
                <div class="col-12 my-3">
                    <h2 class="fs-5 p-3 m-0 bg-light rounded">There are no people in this office at the moment..</h2>
                </div>
                @endif
            @endforeach
        </div>
    </section>

    <!-- ===== Page content section end ===== -->
@endsection
