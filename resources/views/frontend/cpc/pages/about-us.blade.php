@php
    $page_title = 'About Us';
@endphp
@section('title')
    {{ $page_title }}
@endsection
<style>
    .faculty-profile-banner {
        background-image: linear-gradient(rgba(13, 202, 76, 0.75),
                rgba(1, 39, 11, 0.75)),
            url({{ @$banner->image ? asset('upload/banner/' . $banner->image) : '' }});
    }
    .cpc-about-us ul{
        padding: 0;
        margin: 0;
    }
</style>
@extends('frontend.cpc.partials.main')

@section('content')
    <div class="faculty-profile-banner d-flex justify-content-center align-items-center">
        <h1 class="text-white text-center">{{ $page_title }}</h1>
    </div>

    <section class="mt-5">
        @foreach ($infos as $item)
            <div class="container overview">
                <div class="d-flex justify-content-between align-items-end">
                    <h1 class="text-uppercase home-content-heading mb-0">
                        {{ $item->title }}
                    </h1>
                </div>
                <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;">
                </div>
                @if ($item->title == 'Services Offered')
                    <div class="row mb-5">
                        <div class="col-lg-12 mt-3">
                            {!! Str::limit(@$item->description, 400, '...') !!}
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 mt-3">
                            <div
                                class="academics-card-icon cpc-service achademic d-flex align-items-center justify-content-center flex-column shadow rounded text-center">
                                <div class="icon mb-3">
                                    <i class="fas fa-graduation-cap"></i>
                                </div>
                                <a href="{{ route('cpc.academic_counselling') }}">
                                    <p class="fs-4 fw-bold m-0">Academic <br> Counselling</p>
                                </a>

                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 mt-3">
                            <div
                                class="academics-card-icon  cpc-service socio d-flex align-items-center justify-content-center flex-column  shadow rounded text-center">
                                <div class="icon mb-3">
                                    <i class="fas fa-basketball-ball"></i>
                                </div>
                                <a href="{{ route('cpc.socio_emotional') }}" class="">
                                    <p class="fs-4 fw-bold m-0">Socio-emotional <br> Counselling</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 mt-3">
                            <div
                                class=" academics-card-icon cpc-service carrer d-flex align-items-center justify-content-center flex-column shadow rounded text-center">
                                <div class="icon mb-3">
                                    <i class="fas fa-sun"></i>
                                </div>
                                <a href="{{ route('cpc.placement_enter') }}">
                                    <p class="fs-4 fw-bold m-0">Career <br> Counselling</p>
                                </a>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="row mb-5">
                        <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                            <div class="bg-light p-3 rounded shadow-sm  about-message-content d-flex">
                                <div>
                                    {{-- <h2 class="fs-5 fw-bold border-bottom pb-3 mb-3 common-font-color">{{ $item->title }}</h2> --}}
                                    <div class="text-justify fs-6 cpc-about-us">
                                        {{-- {!! Str::limit(@$item->description, 400, '...') !!} --}}
                                        {!! @$item->description!!}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                @endif
            </div>
        @endforeach
    </section>

    @if (count($profiles) > 0)
        <section class="container mb-5">

            <div class="d-flex justify-content-between align-items-end">
                <h1 class="text-uppercase home-content-heading mb-0">
                    Our Team
                </h1>
                {{-- <a href="{{ route('news.all') }}" class="text-uppercase text-decoration-none fw-bold common-font-color">All</a> --}}
            </div>
            <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;">
            </div>

            {{-- <h2 class="fs-3 text-center mt-5 mb-3 fw-bold"><span class="text-primary">Office</span> Staff</h2> --}}
            <div class="row">
                @foreach ($profiles as $p)
                    <div class="col-12 col-lg-6 col-md-6 d-flex justify-content-center align-items-center mt-3">
                        <div class="container bg-light shadow-sm rounded">
                            <div class="row py-3 pe-3">
                                <div class="col-lg-3">
                                    <img class="rounded-circle "
                                        src="{{ $p->profile->photo ? asset('upload/profiles/' . $p->profile->photo) : $p->profile->photo_path }}"
                                        onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';"
                                        height="128px" width="128px" style="border: 3px solid #00c5bf; padding: 5px;" />
                                </div>
                                <div class="col-lg-9 profile-info ps-4">
                                    <h2 class="fs-5 fw-bold mb-1" style="height: 47px;"> {{ $p->profile->nameEn }} </h2>
                                    <h2 class="fs-6 fw-bold text-primary"> {{ $p->profile->designation }} </h2>
                                    <p class="fs-7">{{ $p->profile->email }}</p>
                                    <div class="d-flex justify-content-end px-3">
                                        <a href="{{ route('office.people.details', $p->profile->id) }}"
                                            class="btn btn-outline-primary fs-7">See Profile</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    <!-- FAQ -->
    @if (count($faqs) > 0)
        <section class="my-5 cpc-faq">
            <div class="container">
                <div class="d-flex justify-content-between align-items-end">
                    <h1 class="text-uppercase mb-0 home-content-heading">FAQ</h1>
                </div>
                <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;">
                </div>

            </div>
            @include('frontend.partials.sections.faq')
        </section>
    @endif


@endsection
