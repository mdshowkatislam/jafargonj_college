@extends('frontend.landing')
@php
    $page_title = 'Treasurer';
@endphp
@section('title')
    {{ $page_title }}
@endsection
@section('content')
    @include('frontend.partials.sections.banner', ['page_title' => $page_title])

    <section class="container">
        <div class="profile my-5">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="text-center bg-light shadow" style="height: 550px">
                        <div class="img p-4" style="height:400px;">
                            @if (@$treasurer->profile->id)
                                <img class="rounded w-100 h-100"
                                    src="{{ @$treasurer->profile->photo ? asset('upload/profiles/' . @$treasurer->profile->photo) : @$treasurer->profile->photo_path }}"
                                    onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';" />
                            @else
                                <img class="rounded w-100 h-100"
                                    src="{{ @$treasurerProfile->Profile->photo ? asset('upload/profiles/' . @$treasurerProfile->profile->photo) : @$treasurerProfile->profile->photo_path }}"
                                    onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';" />
                            @endif
                        </div>
                        <div class="text-center px-3 pb-3 bg-light rounded" style="height: 150px">
                            <div class="border-top pt-3">
                                @if (@$treasurer->profile->id)
                                    <a href="{{ route('office.people.details', @$treasurer->profile->id) }}"
                                        class="text-dark fw-bold fs-5 mb-0 lh-sm faculty-title">{{ $treasurer->profile->nameEn }}
                                    </a>
                                    <p class="fw-bold common-font-color fs-6 mb-1 pt-2">
                                        {{ $treasurer->profile->designation }}
                                    </p>
                                @else
                                    <a href="{{ route('office.people.details', @$treasurerProfile->Profile->id) }}"
                                        class="text-dark fw-bold fs-5 mb-0 lh-sm faculty-title">
                                        {{ $treasurerProfile->Profile->nameEn }}
                                    </a>
                                    <p class="fw-bold common-font-color fs-6 mb-1 pt-2">
                                        {{ $treasurerProfile->Profile->designation }}
                                    </p>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 profile-info">
                    <div class="bg-light p-3 rounded shadow about-message-content">
                        <div>
                            <h2 class="fs-3 fw-bold border-bottom pb-3 mb-3 common-font-color">Message from Treasurer </h2>
                            <div class="text-justify fs-6">
                                {!! @$treasurer->short_description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if (count(@$treasurerHBM) > 0)
    <section>
        <div class="container my-5 ">
            <h1 class="fs-4 fw-bold text-primary d-flex justify-content-center my-5">
                <span class="text-secondary mx-2">Treasurer</span> Honor Board
            </h1>
            <div class="">
                <div class="owl-carousel owl-theme" id="vcHonorBoardCarousel">
                    @foreach ($treasurerHBM as $item)
                        <div class="item">
                            <div class="card rounded-0 bg-success" style="height: 27rem">
                                <img src="{{ asset('upload/vc_honor_board/' . $item->image) }}" height="320px"
                                    alt="" />
                                <div class="card-body">
                                    <h5 class="card-title text-white fs-6 mb-3 text-center" style="height: 3rem;">
                                        {{ $item->name }}
                                    </h5>
                                    <p class="card-text text-white text-center fs-8 font-work-sans">
                                        {{ date('M d, Y', strtotime($item->start_date)) }} -
                                        {{ $item->end_date ? date('M d, Y', strtotime($item->end_date)) : 'Present' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        </div>
    </section>   
    @endif
@endsection
