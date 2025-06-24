@extends('frontend/partials/iqac_layout')

@php
    $page_title = 'Training and Workshop';
@endphp
@section('title')
    {{ $page_title }}
@endsection
@section('content')
    @include('frontend.partials.sections.banner_chsr', ['page_title' => $page_title])


    @if (count($trainingWorkshopSeminars) > 0)
        <section class="my-5">
            <div class="container">
                <div class="d-flex justify-content-between align-items-end  chsr-research-title">
                    <h1 class="text-uppercase  mb-0 home-content-heading">
                        Workshop/Seminar
                    </h1>
                </div>
                <div class="position-relative w-100 common-bg-color mt-1 mb-3" style="height: 4px;"></div>

                <div class="row ">
                    @foreach ($trainingWorkshopSeminars as $single)
                        <div class="card rounded-0 col-lg-4 col-md-12 mt-3  border-0">
                            <div class="card-body bg-light shadow zoom_in_hover overflow-hidden">
                                <img class="text-center object-cover" src="{{ asset('upload/workshop/' . $single->image) }}" onerror="this.onerror=null;this.src='{{ asset('upload/no-image.png') }}';" height="220px" width="100%" />
                                <p class="card-text mb-0 mt-3 fs-7"><i class="fas fa-calendar-alt pe-1"></i> {{ date('d M Y', strtotime(@$single->schedule)) }}</p>
                                <a href="{{ route('iqac_training_workshop_details', @$single->id) }}">
                                    <h5 class="card-title mt-2 common-font-color">{{ @$single->title }}</h5>
                                </a>
                                <p class="card-text">
                                    {{-- {!! @$single->description !!} --}}
                                    {!! Str::limit(@$single->description, 200) !!}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if (count($iqacActivities) > 0)
        <section class="my-5">
            <div class="container">
                <div class="d-flex justify-content-between align-items-end  chsr-research-title">
                    <h1 class="text-uppercase  mb-0 home-content-heading">
                        Self-Assessment Activities
                    </h1>
                </div>
                <div class="position-relative w-100 common-bg-color mt-1 mb-3" style="height: 4px;"></div>

                <div class="row ">
                    @foreach ($iqacActivities as $single)
                        <div class="card rounded-0 col-lg-4 col-md-12 mt-3  border-0">
                            <div class="card-body bg-light shadow zoom_in_hover overflow-hidden">
                                <img class="text-center object-cover" src="{{ asset('upload/workshop/' . $single->image) }}" onerror="this.onerror=null;this.src='{{ asset('upload/no-image.png') }}';" height="220px" width="100%" />
                                <p class="card-text mb-0 mt-3 fs-7"><i class="fas fa-calendar-alt pe-1"></i> {{ date('d M Y', strtotime(@$single->schedule)) }}</p>
                                <a href="{{ route('iqac_training_workshop_details', @$single->id) }}">
                                    <h5 class="card-title mt-2 common-font-color">{{ @$single->title }}</h5>
                                </a>
                                <p class="card-text">
                                    {{-- {!! @$single->description !!} --}}
                                    {!! Str::limit(@$single->description, 200) !!}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if (count($iqacMeeting) > 0)
        <section class="my-5">
            <div class="container">
                <div class="d-flex justify-content-between align-items-end  chsr-research-title">
                    <h1 class="text-uppercase  mb-0 home-content-heading">
                        QAC Meeting
                    </h1>
                </div>
                <div class="position-relative w-100 common-bg-color mt-1 mb-3" style="height: 4px;"></div>

                <div class="row ">
                    @foreach ($iqacMeeting as $single)
                        <div class="card rounded-0 col-lg-4 col-md-12 mt-3  border-0">
                            <div class="card-body bg-light shadow zoom_in_hover overflow-hidden">
                                <img class="text-center object-cover" src="{{ asset('upload/workshop/' . $single->image) }}" onerror="this.onerror=null;this.src='{{ asset('upload/no-image.png') }}';" height="220px" width="100%" />
                                <p class="card-text mb-0 mt-3 fs-7"><i class="fas fa-calendar-alt pe-1"></i> {{ date('d M Y', strtotime(@$single->schedule)) }}</p>
                                <a href="{{ route('iqac_training_workshop_details', @$single->id) }}">
                                    <h5 class="card-title mt-2 common-font-color">{{ @$single->title }}</h5>
                                </a>
                                <p class="card-text">
                                    {{-- {!! @$single->description !!} --}}
                                    {!! Str::limit(@$single->description, 200) !!}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
