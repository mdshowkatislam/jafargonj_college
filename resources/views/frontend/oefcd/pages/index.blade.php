@extends('frontend.oefcd.landing')

@section('content')
    <!-- Hero -->
    @include('frontend.partials.slider_oefcd')

    <!-- Profile -->
    <section class="section_two oefcd-profile">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center py-5">
                <div class="col-lg-8 col-md-8 col-sm-12 profile-info pe-5">
                    <div class="oefcd_about pe-4">
                        @php
                            $originalText = @$message->short_description;
                            $truncatedText = Str::limit($originalText, 1000, '...');
                            $textLeft = strlen($originalText) === strlen($truncatedText);
                        @endphp
                        {!! Str::limit(@$message->short_description, 1000, '...') !!}
                    </div>
                    @if (!$textLeft)
                        <a href="{{ route('oefcd.message') }}" class="text-uppercase text-white pt-5">Explore More</a>
                    @endif
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 oefcd-img ">
                    <div class="text-center bg-light shadow " style="height: 450px;">
                        <div class="p-3" style="height:340px">
                            <img class="rounded w-100 h-100" src="{{ $office->profile->photo ? asset('upload/profiles/' . $office->profile->photo) : $office->profile->photo_path }}" onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';" alt="">

                        </div>
                        <div class="text-center px-3 pb-3 bg-light rounded" style="height: 110px">
                            <div class="border-top pt-3">
                                <h5 class="fs-5 text-center text-captilize common-font-color">
                                    {{ @$office->profile->nameEn }}
                                </h5>
                                <p class="fw-bold common-font-color fs-6 mb-1">
                                    
                                    @if ($office->is_designation == 1)
                                        {{ $office->designation_name }}
                                    @else
                                        {{ @$office->profile->designation }}
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- daimond box -->
    <section class="section_three oefcd-diamond">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 main-div">

                    <ul class="main-nav">

                        <li class="item1">
                            <a href="{{ route('oefcd.faculty') }}">
                                <div class="bg_border">
                                    <div class="bg bg_width">
                                        <img src="frontend/assets/img/oefcd/icon-1.jpg" class="item-icon">
                                        <div class="item-title">
                                            Faculty Development
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <img src="{{ asset('frontend/assets/img/oefcd/a.jpg') }}" class="arrow">
                        </li>
                        <li class="item2">
                            <a href="{{ route('oefcd.staff') }}">
                                <div class="bg_border">
                                    <div class="bg bg_width">
                                        <img src="frontend/assets/img/oefcd/icon-2.jpg" class="item-icon">
                                        <div class="item-title">
                                            Staff Training
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <img src="{{ asset('frontend/assets/img/oefcd/b.jpg') }}" class="arrow">
                        </li>

                        <li class="item3">
                            {{-- {{ route('oefcd.affairs') }} --}}
                            <a href="http://apa.bup.edu.bd/" target="_blank">
                                <div class="bg_border">
                                    <div class="bg bg_width">
                                        <img src="frontend/assets/img/oefcd/icon-3.jpg" class="item-icon">
                                        <div class="item-title item-title3">APA Cell</div>
                                    </div>
                                </div>
                            </a>
                            <img src="{{ asset('frontend/assets/img/oefcd/c.jpg') }}" class="arrow">
                        </li>

                        <li class="item4">
                            <a href="{{ route('oefcd.curriculumn') }}">
                                <div class="bg_border">
                                    <div class="bg bg_width">
                                        <img src="frontend/assets/img/oefcd/icon-4.jpg" class="item-icon">
                                        <div class="item-title item-title4">
                                            Curriculum Development
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <img src="{{ asset('frontend/assets/img/oefcd/d.jpg') }}" class="arrow">
                        </li>

                        <li class="item5">
                            <a href="{{ route('oefcd.evaluation') }}">
                                <div class="bg_border">
                                    <div class="bg bg_width">
                                        <img src="frontend/assets/img/oefcd/icon-5.jpg" class="item-icon">
                                        <div class="item-title item-title5">
                                            Evaluation
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision -->
    @if (@$about->vision)
    <section class="my-5">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-12 col-md-6 profile-info">
                    <div class="d-flex justify-content-between align-items-end">
                        <h2 class="text-uppercase home-content-heading mb-0">
                            Vision
                        </h2>
                    </div>
                    <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;">
                    </div>

                    <div class="p-3 mt-3 bg-light rounded shadow-sm">
                        <p style="text-align: justify;">
                            {!! @$about->vision !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Mission -->
    @if ($about->mission)
    <section class="my-5">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-12 col-md-6 profile-info">
                    <div class="d-flex justify-content-between align-items-end">
                        <h2 class="text-uppercase home-content-heading mb-0">
                            Mission
                        </h2>
                    </div>
                    <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;">
                    </div>

                    <div class="p-3 mt-3 bg-light rounded shadow-sm">
                        <p style="text-align: justify;">
                            {!! @$about->mission !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Objectives -->
    @if ($about->objective)
    <section class="my-5">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-12 col-md-6 profile-info">
                    <div class="d-flex justify-content-between align-items-end">
                        <h2 class="text-uppercase home-content-heading mb-0">
                            Objectives
                        </h2>
                    </div>
                    <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;">
                    </div>

                    <div class="p-3 mt-3 bg-light rounded shadow-sm">
                        <p style="text-align: justify;">
                            {!! @$about->objective !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Functions -->
    @if ($about->functions)
    <section class="my-5">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-12 col-md-6 profile-info">
                    <div class="d-flex justify-content-between align-items-end">
                        <h2 class="text-uppercase home-content-heading mb-0">
                            Functions of OEFCD
                        </h2>
                    </div>
                    <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;">
                    </div>

                    <div class="p-3 mt-3 bg-light rounded shadow-sm">
                        <p style="text-align: justify;">
                            {!! @$about->functions !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>   
    @endif
    
    @if (count($profiles) > 0)
        <section class="container my-5">

            <div class="d-flex justify-content-between align-items-end">
                <h2 class="text-uppercase home-content-heading mb-0">
                    OEFCD Team
                </h2>
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
                                    <img class="rounded-circle " src="{{ $p->profile->photo ? asset('upload/profiles/' . $p->profile->photo) : $p->profile->photo_path }}" onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';" height="128px" width="128px" style="border: 3px solid #00c5bf; padding: 5px;" />
                                </div>
                                <div class="col-lg-9 profile-info ps-4">
                                    <h2 class="fs-5 fw-bold mb-1"> {{ $p->profile->nameEn }} </h2>
                                    <h2 class="fs-6 fw-bold text-primary"> {{ $p->profile->designation }} </h2>
                                    <p class="fs-7">{{ $p->profile->email }}</p>
                                    <div class="d-flex justify-content-end px-3">
                                        <a href="{{ route('office.people.details', $p->profile->id) }}" class="btn btn-outline-primary fs-7">See Profile</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    <!-- Infographic -->
    <!-- News & Events -->
    {{-- <section class="oefcd-events">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h1 class="fs-4 text-secondary text-uppercase mb-0 mt-3" style="float:left">News</h1>
                    <a href="{{ route('news.all') }}" style="float:right;margin-top: 20px;"
                        class="text-uppercase text-secondary mb-0 text-decoration-none fw-bold">All</a>
                    <hr class="mb-0 mt-0 d-inline-block mx-auto" style="width: 100%; background-color: gray; height: 2px" />
                    <div class="row">


                        @foreach ($news as $key => $n)
                            <div class="col-lg-6">
                                @if (!empty($n->image))
                                    <img class="mt-3" src="{{ asset('upload/news/' . $n['image']) }}"
                                        style="width:352px; height:250px">
                                @endif
                                <p class="mt-3 mb-0">{{ date('d M Y', strtotime(@$n->date)) }}</p>
                                <h1 class="fs-5">{{ $n->title }}</h1>
                                <p><a
                                        href="{{ route('news.details', $n->id) }}">{{ Str::limit($n->short_description, 70) }}</a>
                                </p>
                            </div>
                        @endforeach

                    </div>
                </div>

                <div class="col-lg-4">
                    <h1 class="fs-4 text-secondary text-uppercase mt-3 mb-0" style="float:left;">Events</h1>
                    <a href="{{ route('events.all') }}"
                        class="text-uppercase text-secondary mb-0 text-decoration-none fw-bold"
                        style="float: right;margin-top: 20px;margin-right: 40px;">All</a>
                    <hr class="mb-0 mt-0 d-inline-block mx-auto" style="width: 90%; background-color: gray; height: 2px" />

                    @foreach ($events as $key => $e)
                        <div class="d-flex justify-content-center align-items-center mt-3">
                            <div class="col-lg-3">
                                @if (!empty($e->image))
                                    <img src="{{ asset('upload/news/' . $e['image']) }}"
                                        style="width: 70px; height: 70px" />
                                @endif
                            </div>
                            <div class="col-lg-9">
                                <p class="mb-0">{{ date('d M Y', strtotime(@$e->date)) }}</p>
                                <h1 class="fs-6"><a
                                        href="{{ route('events.details', $e->id) }}">{{ Str::limit($e->title, 38) }}</a>
                                </h1>
                            </div>
                        </div>
                    @endforeach



                </div>
            </div>
        </div>
    </section> --}}
    <!-- Latest News -->
    @if (count($latest_news) > 0)
        <section class="mt-5">
            <div class="container">
                @include('frontend.partials.sections.latest_news')
            </div>
        </section>
    @endif
    <!-- Notice & Events -->
    <section class="my-5">
        <div class="container">
            @include('frontend.partials.sections.faculty_notice_event')
        </div>
    </section>
@endsection
