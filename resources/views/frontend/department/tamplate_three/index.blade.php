<style>
    .business-banner-card {
        background-image: linear-gradient(rgba(237, 28, 36, 0.4),
                rgba(237, 28, 36, 0.8)),
            url({{ asset('frontend/assets/img/bup/faculty_dept_banner.png') }});
    }
    #exampleModal {
        background: rgba(255, 255, 255, 0.4);
        backdrop-filter: blur(2px);
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .modal-content {
        border: none !important;
    }

    .modal-body p {
        text-align: justify;
    }
</style>
@extends('frontend.department.tamplate_three.partials.main')

@section('content')
    @include('frontend.department.slider')

    <!-- Profile -->
    <section class="container">
        <div class="container profile">
            <div class="row my-5">
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="text-center bg-light shadow rounded" style="height: 550px">
                        <div class="">
                            <div class="img p-4" style="height:400px ">
                                <img class="rounded w-100 h-100"
                                    src="{{ @$department->profile->photo ? asset('upload/profiles/' . @$department->profile->photo) : @$department->profile->photo_path }}"
                                    onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';" />
                            </div>

                        </div>
                        <div class="text-center px-3 pb-3 bg-light rounded" style="height: 150px">
                            <div class="border-top pt-3">
                                @if ($department->profile_id)
                                    <a href="{{ route('faculty_member_head.details', @$department->profile_id) }}"
                                        class="text-dark fw-bold fs-5 mb-0 lh-sm faculty-title">{{ @$department->profile->nameEn }}</a>
                                    <p class="fw-bold common-font-color fs-6 mb-1 pt-2">Chairman</p>
                                    {{-- <p class="fw-bold common-font-color fs-6 mb-1 pt-2">{{ @$department->profile->designation }}</p> --}}
                                @endif
                                <p class="fs-6 mb-0 fw-bold"> {{ @$faculty->name }}</p>
                                {{-- <p class=" fs-6 mb-0"><span class="fw-bold">Rank:</span> {{ @$department->profile->rank }}</p> --}}
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="bg-light p-3 rounded shadow about-message-content" style="height: 550px">
                        <div class="">
                            <h2 class="fs-3 fw-bold border-bottom pb-3 mb-3 common-font-color">About
                                {{ @$department->name }}
                            </h2>
                            <div class="text-justify fs-6">
                                @php
                                    $originalText = @$department->about;
                                    $truncatedText = Str::limit($originalText, 800, '...');
                                    $textLeft = strlen($originalText) === strlen($truncatedText);
                                @endphp
                                {!! Str::limit(@$department->about, 800, '...') !!}
                                @if (!$textLeft)
                                    <a href="{{ route('department_message', @$department->id) }}" class="ms-1 fw-bold">
                                        Read More
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="row my-5">
                <div class="col-lg-4 col-md-4 tem-3-profile-img">
                <img class="" src="{{ asset('upload/profiles/' . @$faculty_head->profile->photo) }}"
                onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';" />

                </div>
                <div class="col-lg-8 col-md-8">
                <h2 class="fs-3 fw-bold text-primary">Dean</h2>
                @if ($faculty_head->profile_id)
                <a href="{{ route('faculty_member.details', @$faculty_head->profile_id)}}" class="text-dark fw-bold fs-4 mb-0">{{ @$faculty_head->profile->nameEn }}</a>
                <p class="fw-bold fs-6 mb-0">{{ @$faculty_head->profile->designation }}</p>
                <div class="pt-2">
                <p class=" fs-6 mb-0"><span class="fw-bold">Faculty:</span> {{ @$faculty->name }}</p>
                <p class=" fs-6 mb-0"><span class="fw-bold">Rank:</span> {{ @$faculty_head->profile->rank }}</p>
                <p class=" fs-6 mb-0"><span class="fw-bold">Appointment Type:</span> {{ @$faculty_head->profile->appointment_type }}</p>

                </div>
                @endif
                </div>
                </div> --}}
        </div>
    </section>

    <!-- Our Faculty -->
    <section class="container mb-5">
        <div class="d-flex justify-content-between align-items-end">
            <h1 class="text-uppercase mb-0 home-content-heading">
                Faculty Members
            </h1>
            <a href="{{ route('department_all_faculties', $department->id) }}"
                class="text-uppercase text-decoration-none fw-bold common-font-color">All</a>
        </div>
        <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;">
        </div>
        <div class="row">
            @php
                $i = 0;
            @endphp
            @foreach ($faculty_members as $key => $member)
            @if ($member->profile->appointment_type != 'Part-time')
                    @php
                        $i++;
                    @endphp
                <div class="col-12 col-md-6 col-lg-3 mt-4">
                    <div class="shadow-lg card rounded-0 border-0 d-block text-center pt-3 faculty_member">
                    
                        <div class="border-one"></div>
                        <div class="border-two"></div>
                        <img class="mx-2 mt-2 shadow-lg image-circle"
                            src="{{ $member->profile->photo ? asset('upload/profiles/' . $member->profile->photo) : $member->profile->photo_path }}"
                            height="200" width="200"
                            onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';"
                            alt="" />
                        <div class="card-body" style="min-height: 7.75rem">
                            <a href="{{ route('faculty_member.details', $member->profile_id) }}">
                                <div class="faculty-member-title d-flex justify-content-center">
                                    <h5 class="card-title fs-5 text-center text-captilize common-font-color">
                                        {{ $member->profile->nameEn }}
                                    </h5>
                                </div>

                                <p class="text-center fs-6 common-font-color">
                                    {{ $member->profile->designation }}
                                </p>
                            </a>

                        </div>
                    </div>
                </div>
                @endif
                @if ($i == 12)
                @break
               @endif
        @endforeach
    </div>
  
    @if (count($faculty_members->where('profile.appointment_type', '=', 'Part-time')) > 0)
    <section class="container mb-5 mt-4">
        <div class="d-flex justify-content-between align-items-end">
            <h1 class="text-uppercase mb-0 home-content-heading">
                Adjunct Faculty
            </h1>
            {{-- <a href="" class="text-uppercase text-decoration-none fw-bold common-font-color">All</a> --}}
        </div>
        <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;">
        </div>
        {{-- <h2 class="fs-4 fw-bold text-primary d-flex justify-content-center my-5">Our Faculty</h2> --}}
        <div class="row">
            @php
                $i = 0;
            @endphp
            @foreach ($faculty_members as $key => $member)
                @if ($member->profile->appointment_type == 'Part-time')
                    @php
                        $i++;
                    @endphp
                    <div class="col-12 col-md-6 col-lg-3 mt-4">
                        <div class="shadow-lg card rounded-0 border-0 d-block text-center pt-3 faculty_member">
                        
                            <div class="border-one"></div>
                            <div class="border-two"></div>
                            <img class="mx-2 mt-2 shadow-lg image-circle"
                                src="{{ $member->profile->photo ? asset('upload/profiles/' . $member->profile->photo) : $member->profile->photo_path }}"
                                height="200" width="200"
                                onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';"
                                alt="" />

                            <div class="card-body bg-light shadow-lg" style="min-height: 7.75rem">
                                <a href="{{ route('faculty_member.details', $member->profile_id) }}">
                                    <div class="faculty-member-title d-flex justify-content-center">
                                        <h5 class="card-title fs-5 text-center text-captilize common-font-color">
                                            {{ $member->profile->nameEn }}
                                        </h5>
                                    </div>
                                    <p class="text-center fs-6 common-font-color">
                                        {{ $member->profile->designation }}
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                @endif
                @if ($i==12)
                    @break
                @endif
            @endforeach
        </div>
    </section>
@endif
    <div class="text-center mt-5">
        <a href="{{ route('department_all_faculties', $department->id) }}" type="button"
            class="btn shadow about-btn text-white px-5 py-2">All Faculty Members</a>
    </div>
</section>

 

<!-- Program -->
@if (count($dept_programs) > 0)
    <section class="container my-5">
        <div class="d-flex justify-content-between align-items-end">
            <h1 class="text-uppercase mb-0 home-content-heading">
                Programs
            </h1>
            {{-- <a href="" class="text-uppercase text-decoration-none fw-bold common-font-color">All</a> --}}
        </div>
        <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;">
        </div>
        <div class="row pt-3">
            @foreach ($program_cat as $item)
                @php
                    $programs = \App\Models\Program::where('department_id', $department->id)
                        ->where('program_category_id', $item->id)
                        ->where('status', 1)
                        ->get();
                @endphp
                @if (count($programs) > 0)
                    <div class="col-lg-6 pb-2">
                        <div class="card program-cat-card border-0">
                            <div class="card-title py-4 fw-bolder">
                                {{ $item->program_category }}
                            </div>
                            <div class="card-body p-0">
                                <div class="list-group border-0 rounded-0">
                                    @foreach ($programs as $program)
                                        <a href="{{ route('academics.academics_details', $program->id) }}"
                                            class="list-group-item list-group-item-action d-flex gap-3 py-3 align-items-center"
                                            aria-current="true">
                                            <div class="program_icon">
                                                <i class="fas fa-graduation-cap"></i>
                                            </div>
                                            <div class="d-flex">
                                                <div>
                                                    <h6 class="mb-0 hover-on-text">
                                                        {{ $program->program_title }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </section>
@endif

<!-- Latest News -->
<section>
    <div class="container">

        <div class="d-flex justify-content-between align-items-end">
            <h1 class="text-uppercase mb-0 home-content-heading">
                Latest Activities
            </h1>
            {{-- <a href="" class="text-uppercase text-decoration-none fw-bold common-font-color">All</a> --}}
        </div>
        <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;">
        </div>
        <div class="row">
            {{-- <div class="col-md-4">
                    <div class="single-news">
                    <div class="single-news-thumb">
                    <a href="#">
                    <img class="p-2 w-100 object-cover" height="250px"
                    src="{{ asset('upload/lab/COMPUTER_LAB.jpg') }}"
                    onerror="this.onerror=null;this.src='{{ asset('upload/no-image.png') }}';"
                    alt="" />
                    </a>
                    </div>
                    <div class="info">
                    <div class="single-news-date">
                    <ul>
                    <li><i class="fas fa-calendar-alt"></i> March 25, 2023</li>
                    </ul>
                    </div>
                    <div class="single-news-content px-4 pt-3 pb-5">
                    <h4 class="text-left"><a href="#">QS World University Rankings by Subject 2023:
                    Accounting &amp; by Subject 2023: Accounting &amp; Finance (301-330) QS World
                    University Rankings by Subject 2023: Accounting &amp; by Subject 2023:
                    Accounting &amp; Finance (301-330)</a></h4>
                    <p>Discover where to study with the QS World University Rankings ... </p>
                    <a class="latest-news-btn" href="#"><i class="fas fa-plus"></i> Read More</a>
                    </div>
                    </div>
                    </div>
                    </div> --}}

            @forelse ($latest_news as $item)
                <div class="col-md-4 mt-3">
                    <div class="single-news">
                        <div class="single-news-thumb">
                            <a href="{{ route('news.details', $item->id) }}">
                                <img class="p-2 w-100 object-cover" height="250px"
                                    src="{{ asset('upload/news/' . $item->image) }}"
                                    onerror="this.onerror=null;this.src='{{ asset('upload/no-image.png') }}';"
                                    alt="" />
                            </a>
                        </div>
                        <div class="info">
                            <div class="single-news-date">
                                <ul class="m-0">
                                    <li class="py-1" style="font-size: 14px"><i class="fas fa-calendar-alt pe-1"></i>
                                        {{ date('M d, Y'), strtotime($item->date) }}</li>
                                </ul>
                            </div>
                            <div class="single-news-content px-4 pt-3 pb-5">
                                <h4 class="text-left"><a
                                        href="{{ route('news.details', $item->id) }}">{{ $item->title }}</a></h4>
                                <p>{!! Str::limit(@$item->short_description, 80) !!}</p>
                                <a class="latest-news-btn" href="{{ route('news.details', $item->id) }}"><i
                                        class="fas fa-plus"></i> Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12">
                    <h2 class="fs-5 p-3 mt-3  mb-0 bg-light rounded">There are no activities at the moment..</h2>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Notice & Events -->
<section class="my-5">
    <div class="container">
        @include('frontend.partials.sections.faculty_notice_event')
    </div>
</section>

<!-- Notice & Events -->
{{-- <section class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h2 class="fs-4 text-secondary text-uppercase mb-0 mt-5">Notice</h2>
                    <hr class="mb-0 mt-0 d-inline-block mx-auto" style="width: 100%; background-color: gray; height: 2px" />
                    <div class="row row-cols-1 row-cols-md-3 upcoming-events mt-3">

                        @include('frontend.partials.sections.news_new')
                    </div>
                </div>

                <div class="col-lg-4">
                    @if (count($events) > 0)
                        <h1 class="fs-4 text-secondary text-uppercase mt-5 mb-0">Events</h1>
                        <hr class="mb-0 mt-0 d-inline-block mx-auto"
                            style="width: 90%; background-color: gray; height: 2px" />
                        @include('frontend.partials.sections.events_new')
                    @endif

                </div>
            </div>
        </div>
    </section> --}}

<!-- Lab -->
@if (count($labs) > 0)
    <section class="py-5 bg-light">
        {{-- <div class=" " > --}}
        <div class="home-academics">
            <div class=" container">
                <div class="d-flex justify-content-between align-items-end">
                    <h1 class="text-uppercase mb-0 home-content-heading">
                        Laboratory
                    </h1>
                    {{-- <a href="" class="text-uppercase text-decoration-none fw-bold common-font-color">All</a> --}}
                </div>
                <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;">
                </div>
                <div class="row">
                    @foreach ($labs as $item)
                        <div class="col-md-3 pt-3">
                            <div class="card rounded-0 overflow-hidden lab" style="height: 26rem;">
                                <img class="department-image w-100" {{-- src="{{ asset('upload/lab/COMPUTER_LAB.jpg') }}" --}}
                                    src="{{ asset('upload/lab/' . @$item->image) }}"
                                    onerror="this.onerror=null;this.src='{{ asset('upload/no-image.png') }}';"
                                    alt="" />
                                <div class="card-body lab_text">
                                    <a href="{{ route('lab.details', @$item->id) }}">
                                        <h3 class="card-title fs-5 text-center fw-bolder">
                                            {{ @$item->title }}
                                        </h3>
                                    </a>
                                    <p class="card-text">
                                        {!! Str::limit(@$item->description, 180) !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
        {{-- </div> --}}
    </section>
@endif

<!-- Club -->
@if (count($clubs) > 0)
    <section class="">
        <div class="py-5"
            style="background-image: url({{ asset('frontend/assets/img/bup/oncampus_banner.png') }}); background-repeat: no-repeat; background-position: center; background-size: cover;">
            <div class="container">
                <div class="d-flex justify-content-between align-items-end">
                    <h1 class="text-uppercase mb-0 home-content-heading">
                        Clubs
                    </h1>
                    {{-- <a href="" class="text-uppercase text-decoration-none fw-bold common-font-color">All</a> --}}
                </div>
                <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;">
                </div>
                <div class="row ">
                    @foreach ($clubs as $item)
                        <div class="col-lg-3 col-md-12 mt-3 ">
                            <a href="{{ route('club.index', $item->slug) }}">
                                <div class="over-container">
                                    <img src="{{ asset('upload/banner/' . $item['banner']) }}"
                                        style="height: 242px; object-fit:cover;"
                                        onerror="this.onerror=null;this.src='{{ asset('upload/no-image.png') }}';"
                                        class=" shadow-1-strong over-img" alt="Student Life" />
                                    <div class="position-absolute campus-title" style="right:0px; bottom:20px">
                                        <div class=" text-white d-flex justify-content-center"
                                            style="width: 200px; height: 40px; background: #B60404; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">
                                            <p class="mt-2 text-right">{{ Str::limit(@$item->name, 18, '...') }} </p>
                                        </div>
                                    </div>
                                    <div class="overlay">
                                        <div class="text">{{ $item->name }}</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
@endif

<!-- Officer of Department-->
@if (count($officer_of_department) > 0)
    <section style="background: #00c5bf0d;">
        <div class="container pt-5">

            <div class="d-flex justify-content-between align-items-end">
                <h1 class="text-uppercase mb-0 home-content-heading">
                    List of Officers
                </h1>
                {{-- <a href="" class="text-uppercase text-decoration-none fw-bold common-font-color">All</a> --}}
            </div>
            <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;">
            </div>
            <div class="row">
                {{-- @dd(count($dean_staffs)) --}}
                @foreach ($officer_of_department as $member)
                    @if ($member->profile_id != $department->profile_id)
                        <div class="col-12 col-md-6 col-lg-3 mt-3 mb-5">
                            <div class="card rounded-0 border-0 d-block text-center pt-3 dean_staff">
                                <div class="border-one"></div>
                                <div class="border-two"></div>
                                <img class="mx-2 mt-2 shadow-lg image-circle"
                                    src="{{ @$member->profile->photo ? asset('upload/profiles/' . @$member->profile->photo) : @$member->profile->photo_path }}"
                                    height="200" width="200"
                                    onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';"
                                    alt="" />
                                <div class="card-body bg-light shadow-lg" style="min-height: 7.75rem">
                                    <a href="{{ route('faculty.officer.details', $member->profile->id) }}">
                                        <h5 class="card-title fs-5 text-center text-captilize">
                                            {{ @$member->profile->nameEn }}
                                        </h5>
                                    </a>
                                    <p class="text-center common-font-color fs-6">
                                        {{ @$member->profile->designation }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
@endif

<!-- Contact -->
{{-- <section>
        <div class="container">
            <h1 class="fs-4 text-center mt-5 mb-3 fw-bold"><span class="text-secondary">Contact</span> With Us</h1>
            <div class="row d-flex justify-content-between">
                <div class=" vc-contact-card shadow p-3 mb-5 bg-white rounded" style="width: 22rem">
                    <div class="card-body">
                        <div class="contact-icon d-flex align-items-center">
                            <i
                                class="bi bi-envelope bg-secondary fs-2 text-white d-flex justify-content-center align-items-center"></i>
                            <h1 class="fs-4 fw-bold mx-2 text-secondary">Email</h1>
                        </div>
                        <p class="card-text mb-0 mt-3">
                            support@gmail.com
                        </p>
                        <p class="card-text">
                            bup@gmail.com
                        </p>
                    </div>
                </div>
                <div class="vc-contact-card shadow p-3 mb-5 bg-white rounded" style="width: 22rem">
                    <div class="card-body">
                        <div class="contact-icon d-flex align-items-center">
                            <i
                                class="bi bi-telephone bg-secondary fs-2 text-white d-flex justify-content-center align-items-center"></i>
                            <h1 class="fs-4 fw-bold mx-2 text-secondary">Call Us</h1>
                        </div>
                        <p class="card-text mb-0 mt-3">
                            support@gmail.com
                        </p>
                        <p class="card-text">
                            bup@gmail.com
                        </p>
                    </div>
                </div>
                <div class=" vc-contact-card shadow p-3 mb-5 bg-white rounded" style="width: 22rem">
                    <div class="card-body">
                        <div class="contact-icon d-flex align-items-center">
                            <i
                                class="bi bi-geo-alt bg-secondary fs-2 text-white d-flex justify-content-center align-items-center"></i>
                            <h1 class="fs-4 fw-bold mx-2 text-secondary">Location</h1>
                        </div>
                        <p class="card-text mb-0 mt-3">
                            support@gmail.com
                        </p>
                        <p class="card-text">
                            bup@gmail.com
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    @if (@$modal)
        @include('frontend.partials.modal.view')
    @endif
@endsection
