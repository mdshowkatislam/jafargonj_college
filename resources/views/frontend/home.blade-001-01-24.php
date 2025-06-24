@extends('frontend.landing')
@php
    $page_title = 'Home Page';
@endphp
@section('title')
    {{ $page_title }}
@endsection
 
@section('content')
       
<div class="d-flex justify-content-center">
    <div class="d-block p-2 bg-primary text-white text-center position-absolute admission_details">
        <a href="https://admission.bup.edu.bd/Admission/Candidate/SelectProgramV3?ecat=4"
            class="card-title my-2 text-uppercase">
            Bachelors Program
        </a>
    </div>
</div>
</div>
</div>
<div class="item">
    <div class="mt-3 mb-5">
        <div class="card">
            <img class="rounded-2"
                src="{{ asset('frontend/assets/img/admission/masters.jpg') }}"
                onerror="this.onerror=null;this.src='{{ asset('upload/no-image.png') }}';"
                alt="" />
        </div>
        <div class="d-flex justify-content-center">
            <div class="d-block p-2 bg-primary text-white text-center position-absolute admission_details">
                <a href="https://admission.bup.edu.bd/Admission/Candidate/SelectProgram?ecat=6"
                    class="card-title my-2 text-uppercase">
                    Masters Program
                </a>
            </div>
        </div>
    </div>
</div>
<div class="item">
    <div class="mt-3 mb-5">
        <div class="card">
            <img class="rounded-2"
                src="{{ asset('frontend/assets/img/admission/mphil.jpg') }}"
                onerror="this.onerror=null;this.src='{{ asset('upload/no-image.png') }}';"
                alt="" />
        </div>
        <div class="d-flex justify-content-center">
            <div class="d-block p-2 bg-primary text-white text-center position-absolute admission_details">
                <a href="https://admission.bup.edu.bd/Admission/Candidate/SelectProgramPhd"
                    class="card-title my-2 text-uppercase">
                    MPhil And PhD Programs
                </a>
            </div>
        </div>
    </div>
</div>
<div class="item">
    <div class="mt-3 mb-5">
        <div class="card">
            <img class="rounded-2"
                src="{{ asset('frontend/assets/img/admission/international_students.jpg') }}"
                onerror="this.onerror=null;this.src='{{ asset('upload/no-image.png') }}';"
                alt="" />
        </div>
        <div class="d-flex justify-content-center">
            <div class="d-block p-2 bg-primary text-white text-center position-absolute admission_details">
                <a href="https://admission.bup.edu.bd/Admission/Candidate/foreignStudentProgramSelection?ecat=4"
                    class="card-title my-2 text-uppercase">
                    International Students
                </a>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</section> --}}
    <!-- Current Admissions -->
    <section class="my-5 home-admission">
        <div class="container">
            <div class="d-flex justify-content-between align-items-end">
                <h1 class="text-uppercase  mb-0 home-content-heading">Current Admissions</h1>
                {{-- <a href="#" class="text-uppercase text-decoration-none fw-bold common-font-color">All</a> --}}
            </div>
            <div class="position-relative w-100 common-bg-color mt-1"
                 style="height: 4px;">
            </div>
            <div class="row mb-5">
                <div class="col-md-3">
                    <div class="card mt-3 current-admission"
                         style="height: 230px; background-color: #1d1f37; position:relative">
                        <h3 class="fs-5 text-white font-work-sans text-center current-admission-program"><span
                                  class="fw-bold fs-4 font-work-sans">Bachelors<br> Program</span></h3>
                    </div>
                    <div class="d-flex justify-content-center current-admission">
                        <div class="d-block p-3 text-white text-center position-absolute admission_details rounded"
                             style="background-color: #1d7099">
                            <a href="https://admission.bup.edu.bd/Admission/Candidate/SelectProgramV3?ecat=4"
                               class="card-title my-2 text-uppercase">
                                Apply Now
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mt-3 current-admission"
                         style="height: 230px; background-color: #1d7099; position:relative">
                        <h3 class="fs-5 text-white font-work-sans text-center current-admission-program"><span
                                  class="fw-bold fs-4 font-work-sans">Masters Program</span></h3>
                    </div>
                    <div class="d-flex justify-content-center current-admission">
                        <div class="d-block p-3 text-white text-center position-absolute admission_details rounded"
                             style="background-color: #1d1f37">
                            <a href="https://admission.bup.edu.bd/Admission/Candidate/SelectProgram?ecat=6"
                               class="card-title my-2 text-uppercase">
                                Apply Now
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mt-3 current-admission"
                         style="height: 230px; background-color: #1d1f37; position:relative">
                        <h3 class="fs-5 text-white font-work-sans text-center current-admission-program"><span
                                  class="fw-bold fs-4 font-work-sans">MPhil And PhD Programs</span></h3>
                    </div>
                    <div class="d-flex justify-content-center current-admission">
                        <div class="d-block p-3 rounded text-white text-center position-absolute admission_details"
                             style="background-color: #1d7099">
                            <a href="https://admission.bup.edu.bd/Admission/Candidate/SelectProgramPhd"
                               class="card-title my-2 text-uppercase">
                                Apply Now
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mt-3 current-admission"
                         style="height: 230px; background-color: #1d7099; position:relative">
                        <h3 class="fs-5 text-white font-work-sans text-center current-admission-program"><span
                                  class="fw-bold fs-4 font-work-sans">International Students Only</span></h3>
                    </div>
                    <div class="d-flex justify-content-center current-admission">
                        <div class="d-block p-3 rounded text-white text-center position-absolute admission_details"
                             style="background-color: #1d1f37">
                            <a href="https://admission.bup.edu.bd/Admission/Candidate/foreignStudentProgramSelection?ecat=4"
                               class="card-title my-2 text-uppercase">
                                Apply Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Research in BUP -->
    <section class="my-5 home-research"
             style="background: #57a8dc33;">
        <div class="container">
            <div class="d-flex justify-content-between align-items-end pt-5">
                <h1 class="text-uppercase mb-0 home-content-heading">
                    Research in Bup
                </h1>
                <a href="{{ route('research_list') }}"
                   class="text-uppercase text-decoration-none fw-bold common-font-color">All</a>
            </div>
            <div class="position-relative w-100 common-bg-color mt-1"
                 style="height: 4px;">
            </div>
            <div class="row  research-div pb-5">
                <div class="col-lg-4 col-md mt-3">
                    <div class="bg-light pb-2 shadow research-card">
                        <div>
                            <h2 class="text-white text-uppercase fw-bold p-3 fs-5 my-0"
                                style="width: 100%; background-color: #00c5bf">Research <br>Under CHSR
                            </h2>
                        </div>
                        @foreach ($chsrResearces as $item)
                            <div class="m-3 border-bottom">
                                <a href="{{ route('research', $item->id) }}">
                                    <p class="mb-1 fs-7"
                                       style="color: #00c5bf;"><i class="fas fa-calendar-alt pe-1"></i>
                                        {{ @$item->year }}</p>
                                    {{-- <p class="mb-0 fs-7" style="color: #94C35B;">{{@$item->author }}
                                - {{ @$item->year }}</p> --}}
                                    <h3 class="fs-6 research_title"
                                        style="">
                                        {{ Str::limit(@$item->title, 90, '...') }}</h3>
                                </a>
                            </div>
                        @endforeach

                        <div class="ps-3 pb-2">
                            <a href="{{ route('chsr_research_list') }}"
                               type="button"
                               class="btn text-white shadow fs-7"
                               style="background-color:#00c5bf">See More
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md mt-3">
                    <div class="bg-light pb-2 shadow research-card">
                        <div>
                            <h2 class="text-white text-uppercase fw-bold p-3 fs-5 my-0"
                                style="width: 100%; background-color: #1d7099">Published<br>Faculty Research
                            </h2>
                        </div>

                        {{-- @php
                            $researches = App\Models\ProfileJournal::where('profile_id', 119)->take(5)->get();
@endphp
@foreach ($researches as $item)
                            <div class="m-3 border-bottom">
                                <p class="mb-1 fs-7" style="color: #1d7099;"><i class="fas fa-calendar-alt pe-1"></i></p>
                                    <h3 class="fs-6 research_title" style=""> {!! @$item->JournalDetail !!}</h3>
                            </div>
@endforeach --}}

                        @foreach ($facultyResearces as $item)
                            <div class="m-3 border-bottom">
                                <a href="{{ route('research', $item->id) }}">
                                    <p class="mb-1 fs-7"
                                       style="color: #1d7099;"><i class="fas fa-calendar-alt pe-1"></i>
                                        {{ @$item->year }}</p>
                                    <h3 class="fs-6 research_title"
                                        style="">
                                        {{ Str::limit(@$item->title, 90, '...') }}</h3>
                                </a>
                            </div>
                        @endforeach

                        <div class="ps-3 pb-2">
                            <a href="{{ route('faculty_research_list') }}"
                               type="button"
                               class="btn text-white shadow fs-7"
                               style="background-color:#1d7099">See More
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md mt-3">
                    <div class="bg-light pb-2 shadow research-card">
                        <div>
                            <h2 class="text-white text-uppercase fw-bold p-3 fs-5 my-0"
                                style="width: 100%; background-color:#1d1f37">Bangabandhu<br>Chair
                            </h2>
                        </div>

                        @foreach ($bbResearces as $item)
                            <div class="m-3 border-bottom">
                                <a href="{{ route('research', $item->id) }}">
                                    <p class="mb-1 fs-7"
                                       style="color: #1d1f37;"><i class="fas fa-calendar-alt pe-1"></i>
                                        {{ @$item->year }}</p>
                                    <h3 class="fs-6"
                                        style="">
                                        {{ Str::limit(@$item->title, 90, '...') }}</h3>
                                </a>
                            </div>
                        @endforeach

                        <div class="ps-3 pb-2">
                            <a href="{{ route('bb_research_list') }}"
                               type="button"
                               class="btn text-white shadow fs-7"
                               style="background-color:#1d1f37">See More
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <!-- On Campus Gallery -->
    <section class="home-gallery my-5">
        <div class=""
             style="background-image: url({{ asset('frontend/assets/img/bup/oncampus_banner.png') }}); background-repeat: no-repeat; background-position: center; background-size: cover;">
            <div class="container">
                <h1 class="text-uppercase mb-0 home-content-heading">On Campus </h1>
                <div class="position-relative w-100 common-bg-color mt-1"
                     style="height: 4px;">
                </div>
                <div class="row mt-3">
                    @foreach ($on_campus_facilities as $facility)
                        <div class="col-lg-3 col-md-12 mb-4 mb-lg-0 ">
                            <a
                               href="{{ $facility->office_id ? route('office.office_details', $facility->office_id) : '' }}">
                                <div class="over-container">
                                    <img src="{{ asset('upload/on_campus/' . $facility['image']) }}"
                                         onerror="this.onerror=null;this.src='{{ asset('upload/no-image.png') }}';"
                                         class=" shadow-1-strong mb-4 over-img"
                                         alt="Student Life" />
                                    <div class="position-absolute campus-title"
                                         style="right:0px; bottom:20px">
                                        <div class=" text-white d-flex justify-content-center"
                                             style="width: 200px; height: 40px; background: #B60404; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">
                                            <p class="mt-2 text-right"> {{ @$facility->title }} </p>
                                        </div>
                                    </div>
                                    <div class="overlay">
                                        <div class="text">{{ @$facility->title }}</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!-- Glance -->
    <section class="counter-numbers-2 home-glance">
        <div class=""
             style="background-image:linear-gradient(
          rgba(0, 0, 0, 0.75),
          rgba(0, 0, 0, 0.75)
        ), url({{ asset('frontend/assets/img/bup/banner.jpg') }}); background-repeat: no-repeat;
      background-position: center;
      background-size: cover;">
            <div class=" container">
                <h1 class="text-white fs-2 mb-0 text-center pt-5 pb-3 fw-bold">We are in <span
                          class="text-primary">Numbers
                    </span> at a glance
                </h1>
                <div class="row pb-5">
                    <div class="col-12 col-md-3 my-3">
                        <div class="inside bg-info bg-opacity-50 card rounded-0 glance-div">
                            <div class="text-center card-body">
                                <img class="pt-3"
                                     src="{{ asset('frontend/assets/img/bup/glance1.svg') }}"
                                     alt="" />
                                <h2 class="count text-white fw-bold pt-3"
                                    data-count="{{ @$at_a_glance->student_number }}">0</h2>
                                <h5 class="text-white fw-bold">Students</h5>
                                <p class="text-white fw-bold fs-7"
                                   style="visibility: hidden">I'm hidden</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 my-3">
                        <div class="inside bg-info bg-opacity-50 card rounded-0 glance-div">
                            <div class="text-center card-body">
                                <img class="pt-3"
                                     src="{{ asset('frontend/assets/img/bup/glance2.svg') }}"
                                     alt="" />
                                <h2 class="count text-white fw-bold pt-3"
                                    data-count="{{ @$at_a_glance->faculty_member_number }}">0</h2>
                                <h5 class="text-white fw-bold">Faculty Members</h5>
                                <p class="text-white fw-bold fs-7">
                                    PhDs : <span class="count"
                                          data-count="{{ @$at_a_glance->phd_number }}">0</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 my-3">
                        <div class="inside bg-info bg-opacity-50 card rounded-0 glance-div">
                            <div class="text-center card-body">
                                <img class="pt-3"
                                     src="{{ asset('frontend/assets/img/bup/glance3.svg') }}"
                                     alt="" />
                                <h2 class="count text-white fw-bold pt-3"
                                    data-count="{{ @$at_a_glance->officer_number }}">0</h2>
                                <h5 class="text-white fw-bold">Officers</h5>
                                <p class="text-white fw-bold fs-7"
                                   style="visibility: hidden">I'm hidden</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 my-3">
                        <div class="inside bg-info bg-opacity-50 card rounded-0 glance-div">
                            <div class="text-center card-body">
                                <img class="pt-3"
                                     src="{{ asset('frontend/assets/img/bup/glance4.svg') }}"
                                     alt="" />
                                <h2 class="count text-white fw-bold pt-3"
                                    data-count="{{ @$at_a_glance->staff_number }}">
                                    0</h2>
                                <h5 class="text-white fw-bold">Staffs</h5>
                                <p class="text-white fw-bold fs-7"
                                   style="visibility: hidden">I'm hidden</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    {{-- @include('frontend.partials.sections.gallery_slider') --}}

    <!-- News & Events -->
    <section class="my-5 home-news">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
                    <div class="d-flex justify-content-between align-items-end">
                        <h1 class="text-uppercase home-content-heading mb-0">
                            News
                        </h1>
                        <a href="{{ route('news.all') }}"
                           class="text-uppercase text-decoration-none fw-bold common-font-color">All</a>
                    </div>
                    <div class="position-relative w-100 common-bg-color mt-1"
                         style="height: 4px;">
                    </div>
                    <div class="row row-cols-1 row-cols-md-3 upcoming-events mt-3">

                        @include('frontend.partials.sections.news_new')
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
                    <div class="d-flex justify-content-between align-items-end">
                        <h1 class="text-uppercase home-content-heading mb-0"> Events </h1>
                        <a href="{{ route('events.all') }}"
                           class="text-uppercase text-decoration-none fw-bold common-font-color">All</a>
                    </div>
                    <div class="position-relative w-100 common-bg-color mt-1"
                         style="height: 4px;">
                    </div>
                    @include('frontend.partials.sections.events_new')

                </div>
            </div>
        </div>

    </section>

    <!-- Notice -->
    <section class="home-notice">
        <div style="background: #00c5bf0d;"
             class="pt-5">
            <div class="container">
                @include('frontend.partials.sections.notice')
            </div>
        </div>
    </section>

    <!-- Affiliations -->
    <section class="my-5 home-affiliations">
        <div class="container">
            <div class="d-flex justify-content-between align-items-end">
                <h1 class="text-uppercase  mb-0 home-content-heading">
                    Affiliated Institutes
                </h1>
                <a href="{{ route('all.affiliate.institutes') }}"
                   class="text-uppercase text-decoration-none fw-bold common-font-color">All</a>
            </div>

            <div class="position-relative w-100 common-bg-color mt-1"
                 style="height: 4px;">
            </div>
        </div>
        <div id="carouselExample"
             class="container carousel slide mt-3">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="affiliations-container bg-light rounded-2 mb-3">
                        <div class="row d-flex justify-content-around flex-sm-row align-items-center">
                            @foreach ($affiliations as $affiliation)
                                <div class="col-lg-2 my-3 affiliation_item">
                                    <div class="text-center">
                                        <img src="{{ asset('upload/affiliation/' . @$affiliation->image)  }}"
                                        onerror="this.onerror=null;this.src='{{ asset('upload/no-image.png') }}';" alt="">
                                        {{-- <img src="{{ $affiliation->image ? asset('upload/affiliation/' . @$affiliation->image) : asset('frontend/assets/img/home/brnad (1).png') }}"
                                        onerror="this.onerror=null;this.src='{{ asset('upload/no-image.png') }}';" alt=""> --}}
                                        <p class="text-center pt-1"><a
                                               href="{{ route('affiliation', $affiliation->id) }}"
                                               style="text-decoration: none; font-weight: 600;"
                                               class="affiliation_items_btn fs-6">{{ $affiliation->inst_name }}</a>
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <!-- Special Achievments -->
    @if (count($special_achievements) > 0)
        <section class="home-achievements">
            <div style="background: rgba(0, 178, 255, 0.05);">
                <div class="container py-5">
                    <div class="d-flex justify-content-between align-items-end">
                        <h1 class="text-uppercase mb-0 home-content-heading">
                            Achievments
                        </h1>
                        <a href=""
                           class="text-uppercase text-decoration-none fw-bold common-font-color">All</a>
                    </div>
                    <div class="position-relative w-100 common-bg-color mt-1"
                         style="height: 4px;">
                    </div>

                    <div class="row">
                        <div class="carousel-wrap col-auto w-100">
                            <div class="owl-carousel owl-theme"
                                 id="achievementCarousel">
                                @foreach ($special_achievements as $special_achievement)
                                    <div class="item">
                                        <div class="my-4">
                                            <div class="achivement-bg card border-0 pb-3"
                                                 style="">
                                                <div class="achievment-image"
                                                     data-aos="zoom-in"
                                                     data-aos-delay="30"
                                                     data-aos-duration="500"
                                                     data-aos-easing="linear">
                                                    <img class="p-2 rounded-2 object-cover"
                                                         style="border-radius: 15px !important; height:290px;"
                                                         src="{{ asset('upload/special_achievement/' . $special_achievement['image']) }}"
                                                         alt="" />
                                                </div>

                                                <div class="align-self-end position-absolute">
                                                    <div class=" text-white d-flex justify-content-center achievement_ribbon1"
                                                         style="">
                                                        <p class="mt-3">
                                                            {{ @$special_achievement->category == 1 ? 'Student' : (@$special_achievement->category == 2 ? 'Teacher' : 'BUP') }}
                                                        </p>
                                                    </div>
                                                    <div class="achievement_ribbon2">

                                                    </div>
                                                </div>
                                                <div class="card-body"
                                                     style="min-height:290px">
                                                    <h5 class="card-title fs-5 mt-2">
                                                        {{ Str::limit(@$special_achievement->title, 50) }}
                                                    </h5>
                                                    <p
                                                       class="d-flex justify-content-start align-items-center my-2 mb-0">
                                                        <i
                                                           class="bi bi-clock-history text-primary me-2 py-3 fs-6"></i></i>{{ date('F d, Y', strtotime($special_achievement->date)) }}
                                                    </p>
                                                    <p class="d-flex justify-content-start align-items-center"
                                                       style="text-align:justify; min-height:100px;">
                                                        {{ Str::limit(@$special_achievement->short_description, 150) }}
                                                    </p>
                                                    <div class="achievement-btn">
                                                        <a href="{{ url('achievement/' . $special_achievement->id) }}"
                                                           type="button"
                                                           class="btn shadow about-btn text-white px-4 read_more_btn pt-2">Read
                                                            More
                                                        </a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- Important Links -->

    <section class="my-5 home-links">
        <div class="container">
            <div class="d-flex justify-content-between align-items-end">
                <h1 class="text-uppercase mb-0 home-content-heading common-font-color">
                    Important Links
                </h1>
                {{-- <a href="{{ route('all.affiliate.institutes') }}"
            class="text-uppercase text-primary mb-0 text-decoration-none fw-bold">All</a> --}}
            </div>

            <div class="position-relative w-100 common-bg-color mt-1"
                 style="height: 4px;">
            </div>
        </div>
        <div id="carouselExample"
             class="container carousel slide mt-3">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="affiliations-container bg-light rounded-2 mb-3">
                        <div class="row d-flex justify-content-around flex-sm-row align-items-center">
                            {{-- @foreach ($affiliations as $affiliation) --}}
                            <div class="col-lg-2 my-3 important_links">
                                <div class="text-center">
                                    <img src="{{ asset('frontend/assets/img/home/education.jpg') }}"
                                         height="60"
                                         width="60"
                                         alt="">
                                    <p class="text-center pt-1"><a href="http://www.moedu.gov.bd/"
                                           style="text-decoration: none; font-weight: 600;"
                                           class="important_links_btn fs-6">Ministry Of Education</a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-2 my-3 important_links">
                                <div class="text-center">
                                    <img src="{{ asset('frontend/assets/img/home/defence.jpg') }}"
                                         height="60"
                                         width="60"
                                         alt="">
                                    <p class="text-center pt-1"><a href="http://www.mod.gov.bd/"
                                           style="text-decoration: none; font-weight: 600;"
                                           class="important_links_btn fs-6">Ministry Of Defense</a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-2  my-3 important_links">
                                <div class="text-center">
                                    <img src="{{ asset('frontend/assets/img/home/ugc.jpg') }}"
                                         height="60"
                                         width="60"
                                         alt="">
                                    <p class="text-center pt-1"><a href="http://www.ugc.gov.bd/"
                                           style="text-decoration: none; font-weight: 600;"
                                           class="important_links_btn fs-6">University Grants Commission
                                            (UGC)</a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-2 my-3 important_links">
                                <div class="text-center">
                                    <img src="{{ asset('frontend/assets/img/home/army.jpg') }}"
                                         height="60"
                                         width="60"
                                         alt="">
                                    <p class="text-center pt-1"><a href="https://www.army.mil.bd/"
                                           style="text-decoration: none; font-weight: 600;"
                                           class="important_links_btn fs-6">Bangladesh Army</a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-2 my-3 important_links">
                                <div class="text-center">
                                    <img src="{{ asset('frontend/assets/img/home/president.jpg') }}"
                                         height="60"
                                         width="60"
                                         alt="">
                                    <p class="text-center pt-1"><a href="http://www.bangabhaban.gov.bd/"
                                           style="text-decoration: none; font-weight: 600;"
                                           class="important_links_btn fs-6">Office of the President of
                                            Bangladesh</a>
                                    </p>
                                </div>
                            </div>
                            {{-- @endforeach --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="my-5 home-affiliations">
        <div class="container">
            <div class="d-flex justify-content-between align-items-end">
                <h1 class="text-uppercase  mb-0 home-content-heading">
                    Annual Performance Agreement
                </h1>
                <a href=""
                   class="text-uppercase text-decoration-none fw-bold common-font-color">All</a>
            </div>

            <div class="position-relative w-100 common-bg-color mt-1"
                 style="height: 4px;">
            </div>
        </div>
        <div id="carouselExample"
             class="container carousel slide mt-3">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="affiliations-container rounded-2 mb-3">
                        <div class="row d-flex justify-content-around flex-sm-row align-items-center">
                            <div class="row" style="padding:0px;">
                                @foreach ($apas as $apa)
                                    <div class="col-md-4 pb-3">
                                        <div class="card shadow-sm p-2"
                                             style="height: 200px; cursor: pointer;">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="2"><strong style="color:#00c5bf !important;">{{ @$apa->title }}</strong></td>
                                                    </tr>


                                                    <tr>
                                                        <td><img src="{{ asset('upload/apa_category/' . @$apa->image) }}"
                                                                 width="80px">
                                                        </td>
                                                        <td>
                                                            <ul class="list-group"
                                                                style="list-style-type:disc;">
                                                                @foreach ($apa->apa_report as $report)
                                                                    <li class="my_icon"
                                                                        style="list-style-type: circle;font-size:14px !important"> &nbsp;&nbsp;
                                                                        <a href="{{ @$report->url }}">{{ @$report->title }}</a>
                                                                    </li>
                                                                @endforeach
                                                                <!-- <li style="list-style-type: circle;color:#00c5bf !important;"> &nbsp;&nbsp; <a href="http://apa.bup.edu.bd/get_content/1/2">ফোকাল পয়েন্ট কর্মকর্তা ও বিকল্প কর্মকর্তা</a></li> -->

                                                                <!-- <li style="list-style-type: circle;"> &nbsp;&nbsp; <a href="http://apa.bup.edu.bd/get_content/1/3">ত্রৈমাসিক/ষান্মাসিক পরিবীক্ষণ/মূল্যায়ন প্রতিবেদন</a></li> -->

                                                            </ul>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if (@$modal)
        @include('frontend.partials.modal.view')
    @endif
@endsection
 

@section('script')
    <script>
        $('#researchCarousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            autoplay: true,
            autoPlaySpeed: 5000,
            autoPlayTimeout: 5000,
            autoplayHoverPause: true,
            navText: ["<div class='nav-btn prev-slide' style='top: 50% !important;'></div>",
                "<div class='nav-btn next-slide' style='top: 50% !important;'></div>"
            ],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 3
                }
            }
        });
    </script>
    <script>
        $('#achievementCarousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            // autoplay: true,
            autoPlaySpeed: 5000,
            autoPlayTimeout: 5000,
            autoplayHoverPause: true,
            navText: ["<div class='nav-btn prev-slide' style='top: 50% !important;'></div>",
                "<div class='nav-btn next-slide' style='top: 50% !important;'></div>"
            ],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });
    </script>

    <script>
        //  Count Up
        function counter() {
            var oTop;
            if ($('.count').length !== 0) {
                oTop = $('.count').offset().top - window.innerHeight;
            }
            if ($(window).scrollTop() > oTop) {
                $('.count').each(function() {
                    var $this = $(this),
                        countTo = $this.attr('data-count');
                    $({
                        countNum: $this.text()
                    }).animate({
                        countNum: countTo
                    }, {
                        duration: 1000,
                        easing: 'swing',
                        step: function() {
                            $this.text(Math.floor(this.countNum));
                        },
                        complete: function() {
                            $this.text(this.countNum);
                        }
                    });
                });
            }
        }
        $(window).on('scroll', function() {
            counter();
        });
    </script>
@endsection
