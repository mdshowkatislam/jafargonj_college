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
@php
    $page_title = @$faculty->name;
@endphp
@section('title')
    {{ $page_title }}
@endsection

@extends('frontend.faculty.tamplate_three.partials.main')

@section('content')
    <div class="faculty-profile-banner d-flex justify-content-center align-items-center" style=" background-image: url( {{ @$banner->image ? asset('upload/banner/' . $banner->image) : asset('frontend/assets/img/bup/banner.jpg') }} ) ">
        <h1 class="text-white text-center">{{ $page_title }}</h1>
    </div>
    {{-- @include('frontend.faculty.slider') --}}

    <!-- Hero Title -->
    {{-- <section class="bg-primary">
        <div class="container d-flex justify-content-between align-items-center px-2 py-4 ">
            <h2 class="text-white text-uppercase fs-6 fw-bold mb-0">Latest News</h2>
            <div>
                <p class="mb-0 text-white"><i class="bi bi-back mx-2"></i>37th (Permanent) Recruitment List of c...</p>
            </div>
            <div>
                <p class="mb-0 text-white"><i class="bi bi-back mx-2"></i>37th (Permanent) Recruitment List of c...</p>
            </div>
            <div>
                <p class="mb-0 text-white"><i class="bi bi-back mx-2"></i>37th (Permanent) Recruitment List of c...</p>
            </div>
        </div>
    </section> --}}
    <!-- Profile -->
    <section class="about my-5">
        <div class="container profile">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="text-center bg-light shadow rounded" style="height: 550px">
                        <div class="">
                            <div class="img p-4" style="height:400px ">
                                <img class="rounded w-100 h-100" src="{{ @$faculty_head->profile->photo ? asset('upload/profiles/' . @$faculty_head->profile->photo) : @$faculty_head->profile->photo_path }}" onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';" />
                            </div>
                        </div>
                        <div class="text-center px-3 pb-3 bg-light rounded" style="height: 150px; ">
                            @if ($faculty_head->profile_id)
                                <div class="border-top pt-3">
                                    <a href="{{ route('faculty_member_head.details', @$faculty_head->profile_id) }}" class="text-dark fw-bold fs-5 mb-0 lh-sm faculty-title">{{ @$faculty_head->profile->nameEn }}</a>
                                    {{--  <a href="{{ route('faculty_member.details', @$faculty_head->profile_id) }}" class="text-dark fw-bold fs-5 mb-0 lh-sm faculty-title">{{ @$faculty_head->profile->nameEn }}</a>  --}}
                                    <p class="fw-bold common-font-color fs-6 mb-1 pt-2">Dean</p>
                                    {{-- <p class="fw-bold common-font-color fs-6 mb-1 pt-2">{{ @$faculty_head->profile->designation }}</p> --}}
                                </div>
                            @endif
                            {{-- <p class=" fs-6 mb-0 fw-bold"> {{ @$faculty->name }}</p> --}}
                            {{-- <p class=" fs-6 mb-0"><span class="fw-bold">Rank:</span> {{ @$faculty_head->profile->rank }}</p> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="bg-light p-3 rounded shadow about-message-content " style="height: 550px">
                        <div>
                            <h2 class="fs-3 fw-bold border-bottom pb-3 mb-3 common-font-color">About {{ @$faculty->name }}
                            </h2>
                            <div class="text-justify fs-6">
                                @php
                                    $originalText = @$faculty->about;
                                    $truncatedText = Str::limit($originalText, 1300, '...');
                                    $textLeft = strlen($originalText) === strlen($truncatedText);
                                @endphp
                                {!! Str::limit(@$faculty->about, 1300, '...') !!}
                                @if (!$textLeft)
                                    <a href="{{ route('faculty_message', $faculty->id) }}" class="ms-1 fw-bold">
                                        Read More
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- <section class="container">
        <div class="container profile">
            <div class="row my-5">
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="text-center bg-light shadow d-flex align-items-center justify-content-center" style="height: 350px">
                        <div class="" >
                            <img class="rounded shadow" height="200px"
                                src="{{ @$faculty_head->profile->photo ? asset('upload/profiles/' . @$faculty_head->profile->photo) : @$faculty_head->profile->photo_path }}"
                                onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';" />
                            <div class="pt-3">
                                @if ($faculty_head->profile_id)
                                    <a href="{{ route('faculty_member.details', @$faculty_head->profile_id) }}"
                                        class="text-dark fw-bold fs-5 mb-0 lh-sm faculty-title">{{ @$faculty_head->profile->nameEn }}</a>
                                    <p class="fw-bold common-font-color fs-6 mb-1 pt-2">
                                        {{ @$faculty_head->profile->designation }}
                                    </p>
                                @endif</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="bg-light p-3 rounded shadow about-message-content d-flex align-items-center justify-content-center" style="height: 350px">
                        <div>
                            <h2 class="fs-3 fw-bold border-bottom pb-3 mb-3 common-font-color">About {{ @$faculty->name }}
                            </h2>
                            <div class="text-justify fs-6">
                                {!! Str::limit(@$faculty->about, 600, '...') !!}
                                <a href="{{ route('faculty_message', $faculty->id) }}"
                                    class="ms-1 fw-bold">Read More
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Our Departments -->
    <section class=" mt-5">
        <div class="container">
            <div class="d-flex justify-content-between align-items-end">
                <h1 class="text-uppercase mb-0 home-content-heading">
                    Departments
                </h1>
                <a href="{{ route('faculty_department', $faculty->id) }}" class="text-uppercase text-decoration-none fw-bold common-font-color">All</a>
            </div>
            <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;">
            </div>

            <div class=" row">
                @foreach ($departments as $department)
                    <div class="col-lg-4 col-md-6 mt-3">
                        <div class="card rounded-0 overflow-hidden bg-light shadow faculty_department ">
                            <div class="department-image">
                                <img class="h-100 w-100 object-cover" src="{{ asset('upload/department/' . @$department->image) }}" onerror="this.onerror=null;this.src='{{ asset('upload/no-image.png') }}';" alt="" />
                            </div>
                            <div class="card-body faculty_department_text" style="height: 200px;">
                                <a href="{{ route('department_home', $department->id) }}">
                                    <h3 class="card-title  fs-5 text-center fw-bolder overflow-hidden" style="height:48px;">
                                        {{ $department->name }}
                                    </h3>
                                </a>
                                {!! Str::limit(@$department->about, 160) !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Program -->
    @if (count($faculty_programs) > 0)
        <section class="container mt-5">
            <div class="d-flex justify-content-between align-items-end">
                <h1 class="text-uppercase mb-0 home-content-heading">
                    Programs
                </h1>
                {{-- <a href="" class="text-uppercase text-decoration-none fw-bold common-font-color">All</a> --}}
            </div>
            <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;">
            </div>
            <div class="row ">
                @foreach ($program_cat as $item)
                    @php
                        $programs = \App\Models\Program::where('faculty_id', $faculty->id)
                            ->where('program_category_id', $item->id)
                            ->where('status', 1)
                            ->get();
                    @endphp
                    @if (count($programs) > 0)
                        <div class="col-lg-6 mt-3">
                            <div class="card program-cat-card border-0">
                                <div class="card-title py-4 fw-bolder">
                                    {{ $item->program_category }}
                                </div>
                                <div class="card-body p-0">
                                    <div class="list-group border-0 rounded-0">
                                        @foreach ($programs as $program)
                                            <a href="{{ route('academics.academics_details', $program->id) }}" class="list-group-item list-group-item-action d-flex gap-3 py-3 align-items-center" aria-current="true">
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

    <!-- Our Faculty -->
    {{-- 
        <section class="container mb-5">
    <h2 class="fs-4 fw-bold text-primary d-flex justify-content-center my-5">Our Faculty</h2>
    <div class="row">
        @foreach ($faculty_members as $key => $member)
        <div class="col-12 col-md-6 col-lg-3 mb-5">
            <div class="shadow-lg card rounded-0 border-0 d-block text-center pt-3">
                <img class="mx-2 mt-2 object-cover"
                    src="{{ asset('upload/profiles/' . $member->profile->photo) }}" height="200" width="200"
                    onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';" alt=""
                    style="border-radius: 100%;" />
                <div class="card-body bg-light shadow-lg" style="min-height: 7.75rem">
                    <a href="{{ route('faculty_member.details', $member->id) }}">
                        <h5 class="card-title fs-6 text-center text-uppercase">
                            {{ $member->profile->nameEn }}
                        </h5>
                        <p class="card-text text-center text-info">
                            {{ $member->profile->designation }}
                        </p>
                    </a>

                </div>
            </div>
        </div>
        @if ($key == 7)
        @break
        @endif
        @endforeach
    </div>
    <div class="text-center">
        <a href="{{ route('faculty_all_faculties', $faculty->id) }}" type="button"
            class="btn btn-success btn-md rounded-0 text-uppercase">All Faculty Members</a>
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

    <!-- Lab -->
    @if (count($labs) > 0)
        <section class="py-5 bg-light">
            {{-- <div class=" "> --}}
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
                            <div class="col-md-3 mt-3">
                                <div class="card rounded-0 overflow-hidden lab" style=" height: 26rem;">
                                    <img class="department-image w-100" {{-- src="{{ asset('upload/lab/COMPUTER_LAB.jpg') }}" --}} src="{{ asset('upload/lab/' . @$item->image) }}" onerror="this.onerror=null;this.src='{{ asset('upload/no-image.png') }}';" alt="" />
                                    <div class="card-body lab_text">
                                        <a href="{{ route('lab.details', @$item->id) }}">
                                            <h3 class="card-title fs-5 text-center fw-bolder">
                                                {{ @$item->title }}
                                            </h3>
                                        </a>
                                        {{-- <p class="card-text"> --}}
                                        {!! Str::limit(@$item->description, 140) !!}
                                        {{-- </p> --}}
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        {{-- <div class="col-12">
                        <div class="owl-carousel" id="academicCarousel">
                            @foreach ($labs as $item)
                            <div class="mt-3">
                                <div class="card rounded-0 overflow-hidden" style="background-color: #10C45C">
                                    <img class="p-2 academic-image w-100"
                                        src="{{ asset('upload/lab/' . @$item->image) }}"
                                        onerror="this.onerror=null;this.src='{{ asset('upload/no-image.png') }}';"
                                        alt="" />
                                    <div class="card-body academicAbout">
                                        <h3 class="card-title text-white fs-5 text-center text-uppercase">
                                            {{ @$item->title }}
                                        </h3>
                                        <p class="card-text">
                                            {!! Str::limit(@$item->description, 180) !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <div class="mt-3">
                                <div class="card rounded-0 overflow-hidden" style="background-color: #10C45C">
                                    <img class="p-2 academic-image w-100"
                                        src="{{ asset('upload/lab/COMPUTER_LAB.jpg') }}"
                                        onerror="this.onerror=null;this.src='{{ asset('upload/no-image.png') }}';"
                                        alt="" />
                                    <div class="card-body academicAbout">
                                        <h3 class="card-title text-white fs-5 text-center text-uppercase">
                                            Computer Lab
                                        </h3>
                                        <p class="card-text">
                                            Computer Laboratories of BUP provide the best possible
                                            services to the university community...
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <div class="card rounded-0 overflow-hidden" style="background-color: #10C45C">
                                    <img class="p-2 academic-image w-100"
                                        src="{{ asset('upload/lab/media_lab.jpg') }}"
                                        onerror="this.onerror=null;this.src='{{ asset('upload/no-image.png') }}';"
                                        alt="" />
                                    <div class="card-body academicAbout">
                                        <h3 class="card-title text-white fs-5 text-center text-uppercase">
                                            Media Lab
                                        </h3>
                                        <p class="card-text">
                                            The Media Lab of the Department of Mass Communication and
                                            Journalism is fully equipped...
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <div class="card rounded-0 overflow-hidden" style="background-color: #10C45C">
                                    <img class="p-2 academic-image w-100"
                                        src="{{ asset('upload/lab/LAB_03.jpg') }}"
                                        onerror="this.onerror=null;this.src='{{ asset('upload/no-image.png') }}';"
                                        alt="" />
                                    <div class="card-body academicAbout">
                                        <h3 class="card-title text-white fs-5 text-center text-uppercase">
                                            Environmental Lab
                                        </h3>
                                        <p class="card-text">
                                            The Departmental of Environmental Science is having two
                                            modern laboratories aiming...
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <div class="card rounded-0 overflow-hidden" style="background-color: #10C45C">
                                    <img class="p-2 academic-image w-100"
                                        src="{{ asset('upload/lab/LAB_02.jpg') }}"
                                        onerror="this.onerror=null;this.src='{{ asset('upload/no-image.png') }}';"
                                        alt="" />
                                    <div class="card-body academicAbout">
                                        <h3 class="card-title text-white fs-5 text-center text-uppercase">
                                            Communication Lab
                                        </h3>
                                        <p class="card-text">
                                            BUP has a good number of Laboratories with most modern
                                            equipment. “Communication Lab”...
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <div class="card rounded-0 overflow-hidden" style="background-color: #10C45C">
                                    <img class="p-2 academic-image w-100"
                                        src="{{ asset('upload/lab/LAB_02.jpg') }}"
                                        onerror="this.onerror=null;this.src='{{ asset('upload/no-image.png') }}';"
                                        alt="" />
                                    <div class="card-body academicAbout">
                                        <h3 class="card-title text-white fs-5 text-center text-uppercase">
                                            Communication Lab
                                        </h3>
                                        <p class="card-text">
                                            BUP has a good number of Laboratories with most modern
                                            equipment. “Communication Lab”...
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    </div>
                </div>
            </div>
            {{--
    </div> --}}
        </section>
    @endif

    <!-- Club -->
    @if (count($clubs) > 0)
        <section class="">
            <div class="" style="background-image: url({{ asset('frontend/assets/img/bup/oncampus_banner.png') }}); background-repeat: no-repeat; background-position: center; background-size: cover;">
                <div class="container py-5">
                    <div class="d-flex justify-content-between align-items-end">
                        <h1 class="text-uppercase mb-0 home-content-heading">
                            Clubs
                        </h1>
                        {{-- <a href="" class="text-uppercase text-decoration-none fw-bold common-font-color">All</a> --}}
                    </div>
                    <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;">
                    </div>
                    <div class="row">
                        @foreach ($clubs as $item)
                            <div class="col-lg-3 col-md-12 mt-3 ">
                                <a href="{{ route('club.index', $item->slug) }}">
                                    <div class="over-container">
                                        <img src="{{ asset('upload/banner/' . $item['banner']) }}" style="height: 242px; object-fit:cover;" onerror="this.onerror=null;this.src='{{ asset('upload/no-image.png') }}';" class=" shadow-1-strong  over-img" alt="Student Life" />
                                        <div class="position-absolute campus-title" style="right:0px; bottom:20px">
                                            <div class=" text-white d-flex justify-content-center" style="width: 200px; height: 40px; background: #B60404; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">
                                                <p class="mt-2 text-right"> {{ Str::limit(@$item->name, 18, '...') }} </p>
                                            </div>
                                        </div>
                                        <div class="overlay">
                                            <div class="text">{{ @$item->name }}</div>
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

    <!-- Officer of the Dean Office -->
    @if (count($officer_of_dean_office) > 0)
        <section style="background: #00c5bf0d;">
            <div class="container py-5">

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
                    @foreach ($officer_of_dean_office as $member)
                        @continue($member->profile_id == $faculty_head->profile_id)
                        <div class="col-12 col-md-6 col-lg-3 mt-3 ">
                            <div class="card rounded-0 border-0 d-block text-center pt-3 dean_staff">
                                <div class="border-one"></div>
                                <div class="border-two"></div>
                                <img class="mx-2 mt-2 shadow-lg image-circle" src="{{ @$member->profile->photo ? asset('upload/profiles/' . @$member->profile->photo) : @$member->profile->photo_path }}" height="200" width="200" onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';" alt="" />
                                <div class="card-body " style="min-height: 7.75rem">
                                    <a href="{{ route('faculty.officer.details', $member->profile->id) }}">
                                        <h5 class="card-title fs-5 text-center text-captilize border-top pt-3">
                                            {{ strtok(@$member->profile->nameEn, ',') }}
                                            {{-- {{ @$member->profile->nameEn }} --}}
                                        </h5>
                                    </a>
                                    <p class="text-center common-font-color fs-6">
                                        {{ @$member->profile->designation }}
                                    </p>
                                </div>
                            </div>
                        </div>
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
