<!-- ===== slider section start ===== -->
@extends('frontend.landing')

@php
    $page_title = 'Campus Life';
@endphp
@section('title')
    {{ $page_title }}
@endsection

@section('content')
    <!-- Banner -->
    @include('frontend.partials.sections.banner', ['page_title' => $page_title])

    {{-- <section>
    <div class="campus-banner d-flex justify-content-center align-items-center">
        <h1 class="uppercase text-white font-poppins">Campus Life</h1>
    </div>
</section> --}}
    <!-- Card Gallery -->
    <section class="container mt-5">
        <div class="row">
            @foreach ($on_campus_facilities as $facility)
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="mb-5 shadow row">
                        @if ($loop->odd)
                            <div class="faculty-content col-lg-8 col-md-8 col-sm-9 p-4 border">
                                <div class="border-bottom pb-3 mb-3 hover-on-text">
                                    <a href="{{ $facility->office_id ? route('office.office_details', $facility->office_id) : '' }}" class="mb-1 fs-5 fw-bold">{{ @$facility->title }}</a>
                                </div>
                                
                                {!! Str::limit(@$facility->description, 750, '...') !!}
                            </div>
                            <div class="faculty-image col-lg-4 col-md-4 col-sm-3 p-0">
                                <a href="{{ $facility->office_id ? route('office.office_details', $facility->office_id) : '' }}">
                                    <img src="{{ asset('upload/on_campus/' . $facility->image) }}" alt=""
                                    class=""  data-aos="zoom-in" data-aos-delay="30" data-aos-duration="500" data-aos-easing="linear"
                                    onerror="this.onerror=null;this.src='{{ asset('upload/no-image.png') }}';">
                                </a>
                            </div>
                        @endif
                        @if ($loop->even)
                            <div class="faculty-image col-lg-4 col-md-4 col-sm-3 p-0">
                                <a href="{{ $facility->office_id ? route('office.office_details', $facility->office_id) : '' }}">
                                    <img src="{{ asset('upload/on_campus/' . $facility->image) }}" alt=""
                                    class=""  data-aos="zoom-in" data-aos-delay="30" data-aos-duration="500" data-aos-easing="linear"
                                    onerror="this.onerror=null;this.src='{{ asset('upload/no-image.png') }}';">
                                </a>
                            </div>
                            <div class="faculty-content col-lg-8 col-md-8 col-sm-9 p-4 border">
                                <div class="border-bottom pb-3 mb-3 hover-on-text">
                                    <a href="{{ $facility->office_id ? route('office.office_details', $facility->office_id) : '' }}" class="mb-1 fs-5 fw-bold">{{ @$facility->title }}</a>
                                </div>
                                {!! Str::limit(@$facility->description, 750, '...') !!}
                            </div>
                        @endif
                    </div>
                </div>
                {{-- <div class="col-md-6 col-lg-4 mb-4">
                    <div class="campus-life-gallery">
                        <div id="campus-img-div">
                            <img src="{{ asset('upload/on_campus/' . $facility->image) }}" class=""
                                alt="Student Life"
                                onerror="this.onerror=null;this.src='{{ asset('upload/no-image.png') }}';" />
                        </div>
                    </div>
                    <div class="mt-3">
                        <h1 class="fs-6 text-secondary">BUP Library and Archive</h1>
                        <a href="#" class="fs-5 text-dark fw-bold">{{ @$facility->title }}</a>
                    </div>
                </div> --}}
            @endforeach


            {{-- <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
            <div class="card-border d-flex align-items-center">
                <img class="" src="{{asset('frontend/assets/img/campus-life/card (4).jpg')}}" width="110%" />
            </div>
            <div class="mt-3">
                <h1 class="fs-6 text-secondary">BUP Library and Archive</h1>
                <h1 class="fs-6">Art, Exercise And Escapism In Nature</h1>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
            <div class="card-border d-flex align-items-center">
                <img class="" src="{{asset('frontend/assets/img/campus-life/card (2).jpg')}}" width="110%" />
            </div>
            <div class="mt-3">
                <h1 class="fs-6 text-secondary">BUP Library and Archive</h1>
                <h1 class="fs-6">Art, Exercise And Escapism In Nature</h1>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
            <div class="card-border d-flex align-items-center">
                <img class="" src="{{asset('frontend/assets/img/campus-life/card (3).jpg')}}" width="110%" />
            </div>
            <div class="mt-3">
                <h1 class="fs-6 text-secondary">BUP Library and Archive</h1>
                <h1 class="fs-6">Art, Exercise And Escapism In Nature</h1>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
            <div class="card-border d-flex align-items-center">
                <img class="" src="{{asset('frontend/assets/img/campus-life/card (4).jpg')}}" width="110%" />
            </div>
            <div class="mt-3">
                <h1 class="fs-6 text-secondary">BUP Library and Archive</h1>
                <h1 class="fs-6">Art, Exercise And Escapism In Nature</h1>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
            <div class="card-border d-flex align-items-center">
                <img class="" src="{{asset('frontend/assets/img/campus-life/card (1).jpg')}}" width="110%" />
            </div>
            <div class="mt-3">
                <h1 class="fs-6 text-secondary">BUP Library and Archive</h1>
                <h1 class="fs-6">Art, Exercise And Escapism In Nature</h1>
            </div>
        </div> --}}
        </div>
    </section>
@endsection
