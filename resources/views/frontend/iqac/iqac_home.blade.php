@extends('frontend/partials/iqac_layout')



@section('content')
    {{-- @include('frontend.partials.iqac_slider') --}}
    <section class="iqac-message" style="margin-top: 170px;">
        <div class="row" style="--bs-gutter-x: 0;">
            <div class="col-md-12 col-sm-12 col-lg-5" style="background-color: #2d3e50;">
                <div class="container vc-message-div">
                    <h1 class="text-uppercase fs-5 my-4 fw-bold" style="color:#86BC42">{{ @$message->title_first_part ?? 'Message From Director' }}
                    </h1>
                    <div class="text-center px-2">
                        <img style="border:2px solid #86BC42; float: left; width: 25%;margin-left: -5px;" class="left-side me-3 mt-2" src="{{ asset('upload/profiles/' . @$message->profile->photo) }}" onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';" alt="">
                    </div>
                    <div class="" id="vc-message" style="color:#fff">
                        {!! Str::limit(@$message->short_description, 700) !!}
                        <a class="text-uppercase fs-7 fw-bold" href="{{ route('iqac_message') }}">Read More</a>
                    </div>
                    <h5 class="row card-title text-white fs-5 text-start mt-2">
                        <span class="">{{ @$message->profile->nameEn }}</span><br>
                        <span class="text-info fs-6" style="line-height: 40px">
                            @if ($office->is_designation == 1)
                                {{ $office->designation_name }}
                            @else
                                {{ @$message->profile->designation }}
                            @endif
                        </span>
                    </h5>

                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-lg-7" id="home-slider">

                @include('frontend.partials.iqac_slider')

            </div>
        </div>
    </section>
    <!-- Card -->
    <section class="container my-5 ">
        <div class="row">
            <div class="">
                <div class="owl-carousel owl-theme researchCarousel">
                    @foreach ($iqac_abouts as $iqac_about)
                        <div class="col-12">
                            <div class="rounded bg-light shadow-sm d-flex jusitfy-content-center  p-3">
                                {{-- <img class="" src="{{ asset('storage/app/media/igabout/'.@$iqac_about->image) }}" height="197px" alt="" /> --}}
                                <div class="iqac_about_card ">
                                    <h5 class="pb-2 border-bottom text-secondary fs-3">
                                        @if ($iqac_about->type == 1)
                                            About
                                        @elseif ($iqac_about->type == 2)
                                            Story
                                        @elseif ($iqac_about->type == 3)
                                            Mission
                                        @elseif ($iqac_about->type == 4)
                                            Vision
                                        @elseif ($iqac_about->type == 5)
                                            Objective
                                        @elseif ($iqac_about->type == 6)
                                            Function
                                        @endif
                                    </h5>
                                    <p class="iqac_about_text m-0">
                                        {{-- {!! @$iqac_about->description !!} --}}
                                        {!! Str::limit(@$iqac_about->description, 100) !!} <a class="text-uppercase fs-7 fw-bold" href="{{ route('iqac_about', $iqac_about->id) }}">Read More</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>



        </div>
    </section>
    <!-- Recent Activites -->
    <section class="py-5" style="background: #57a8dc33;">
        <div class="container">
            {{-- <h1 class="text-uppercase text-secondary text-center fs-2 fw-bold">Recent Activites</h1> --}}
            <div class="d-flex justify-content-between align-items-end  chsr-research-title">
                <h1 class="text-uppercase  mb-0 home-content-heading">
                    Recent Activites
                </h1>
                <div class="">
                    <a href="{{ route('iqac_training_workshop') }}" class="text-uppercase text-decoration-none fw-bold common-font-color">All</a>

                </div>
                {{-- <a href="#" class="text-uppercase text-decoration-none fw-bold common-font-color">All</a> --}}
            </div>
            <div class="position-relative w-100 common-bg-color mt-1 mb-3" style="height: 4px;"></div>
            <div class="row">
                @foreach ($trainingWorkshopSeminars as $trainingWorkshopSeminar)
                    <div class="col-md col-lg-6 d-flex justify-content-start align-items-center mt-3 ">
                        <div class="col-lg-2 d-flex flex-column align-items-center p-3" style="border: 1px dotted green">
                            <div class="text-center">
                                <h1 class="mb-0 text-primary">{{ date('d', strtotime(@$trainingWorkshopSeminar->schedule)) }}
                                </h1>
                                <p class="m-0" style="font-size: 14px;">{{ date('F Y', strtotime(@$trainingWorkshopSeminar->schedule)) }}
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-10 ms-2 iqac-activities">
                            <a href="{{ route('iqac_training_workshop_details', $trainingWorkshopSeminar->id) }}">
                                <h2 class="fs-5 mb-2">{{ Str::limit(@$trainingWorkshopSeminar->title, 100, '...') }}
                                </h2>
                            </a>
                            <div class="mb-0" style="color: #000; font-size:14px;">
                                {!! Str::limit(@$trainingWorkshopSeminar->description, 200) !!}
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <!-- Latest News -->
    <section class="mt-5 chsr-news">
        <div class="container">
            @include('frontend.partials.sections.latest_news')
        </div>
    </section>
    <!-- Notice & Events -->
    <section class="my-5 chsr-notice">
        <div class="container">
            @include('frontend.partials.sections.faculty_notice_event')
        </div>
    </section>
@endsection
