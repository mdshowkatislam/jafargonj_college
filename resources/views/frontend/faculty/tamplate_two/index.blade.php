<style>
    .business-banner-card {
    background-image: linear-gradient(
            rgba(237, 28, 36, 0.4),
            rgba(237, 28, 36, 0.8)
        ),
        url({{ asset('frontend/assets/img/bup/faculty_dept_banner.png')}});
}
</style>
@extends('frontend.faculty.tamplate_two.partials.main')

@section('content')
    @include('frontend.faculty.slider')

    <!-- Hero Title -->
    <section class="bg-primary">
        <div class="container d-flex justify-content-between align-items-center px-2 py-4 ">
            <h2 class="text-white text-uppercase fs-6 fw-bold mb-0">Latest News</h2>
            <div>
                <p class="mb-0 text-white"><i class="bi bi-back mx-2"></i>37th (Permanent) Recruitment List of c...</p>
            </div>
            <div>
                <p class="mb-0 text-white"><i class="bi bi-back mx-2"></i>37th (Permanent) Recruitment List of c...</p>
            </div>
        </div>
    </section>
    <!-- Profile -->
    <section class="container">
        <div class="container profile">
            <div class="row d-flex justify-content-start align-items-center mt-5">
                <div class="col-lg-3 col-md-6 profile-img mt-5">
                    <img class="" src="{{ asset('upload/profiles/' . @$faculty_head->profile->photo) }}"
                        onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';"
                        style="width: 90%" />
                    <p class="fw-bold mb-0 px-2">{{ @$faculty_head->profile->nameEn }}</p>
                    <p class="fw-bold mb-0 px-2">{{ @$faculty_head->profile->designation }}</p>
                </div>
                <div class="col-9 profile-info">
                    <h2 class="fs-3 fw-bold text-primary">{{ @$faculty_head_message->title_first_part }}</h2>
                    <p style="text-align: justify;">
                        {!! @$faculty_head_message->short_description !!}
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Program -->
    <section class="container mt-5">
        <div class="row">
            <h2 class="fs-3 fw-bold text-primary">Our Program</h2>
            @foreach ($program_cat as $item)
                <div class="col-lg-6 pb-2">
                    <div class="d-flex align-items-center shadow-sm bg-primary rounded px-3 py-5">
                        <div class="col-lg-8 col-md-9 col-sm-9">
                            <h3 class="fs-4 fw-bold mb-3 text-uppercase" id="faculty-program-title">
                                {{ $item->program_category }}
                            </h3>
                            <p class="text-white fw-bold fs-6 text-justify">
                                FBS expanded its academic offer to undergraduate level. The admission procedure of BBA & MBA Programmes commences from October.
                            </p>
                        </div>
                        <div class="col-lg-4 col-md-3 col-sm-3 px-3">
                            <img class="rounded-circle program-img" src="{{ asset('dummy/user-dummy.jpeg') }}"/>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- Our Departments -->
    <section class=" mt-5">
        <div class="business-banner-card">
            <h2 class="uppercase text-white font-poppins mt-6 d-flex justify-content-center pt-3">
                Our Departments
            </h2>
            <div class="container">
                <div class="row" id="faculty-department-div">
                    <div class="carousel-wrap">
                        <div class="owl-carousel owl-theme" id="departmentCarousel">
                            @foreach ($departments as $department)
                                <div class="item">
                                    <div class="card rounded-0 border-0">
                                        <img class="" src="{{ asset('frontend/assets/img/faculty-of-bs/card.png') }}" alt="" />
                                        <div class="card-body bg-primary shadow-lg" style="height: 80px;">
                                            <a href="{{ route('department_home', $department->id) }}" class="card-title fs-6 text-center text-white">
                                                {{ $department->name }}
                                            </a>
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
    <!-- Our Faculty -->
    <section class="container" style="margin-top: 150px;">
        <h2 class="fs-4 fw-bold text-primary d-flex justify-content-center my-5">Our Faculty</h2>
        <div class="row">
            @foreach ($faculty_members as $member)
                <div class="col-12 col-md-6 col-lg-3 mt-3 mb-5">
                    <div class=" card rounded-0 border-0 d-block text-center">
                        <img class="mx-2 mt-2" src="{{ asset('upload/profiles/' . $member->profile->photo) }}"
                            height="200" width="200"
                            onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';"
                            alt="" style="border-radius: 100%;" />
                        <div class="card-body bg-light shadow-lg" style="min-height: 7.75rem">
                            <a href="{{route('faculty_member.details', $member->id)}}">
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
            @endforeach
        </div>
    </section>
    <!-- News & Events --> 
    <section class="bg-light mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h2 class="fs-4 text-secondary text-uppercase mb-0 mt-5">Notice</h2>
                    <hr class="mb-0 mt-0 d-inline-block mx-auto" style="width: 100%; background-color: gray; height: 2px" />
                    {{-- <div class="row"> --}}
                        {{-- <div class="col-lg-6">
                            <img class="mt-3" src="assets/img/faculty-of-bs/eventimg.jpg"
                                style="width:352px; height:250px">
                            <p class="mt-3 mb-0">27 Dec 2020</p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis nemo enim, excepturi harum
                                nesciunt
                                maxime nobis amet qui ipsam, nam praesentium eius dicta tenetur commodi soluta animi quaerat
                                similique
                                dignissimos.</p>
                        </div>
                        <div class="col-lg-6">
                            <div class="d-flex justify-content-center align-items-center mt-3">
                                <div class="col-lg-3">
                                    <img class="" src="assets/img/faculty-of-bs/banner-card.jpg"
                                        style="width: 70px; height: 70px" />
                                </div>
                                <div class="col-lg-9">
                                    <p class="mb-0">Craig Bator - 27 Dec 2020</p>
                                    <h3 class="fs-5">Lorem ipsum dolor sit amet consectetur</h3>
                                </div>
                            </div>
                        </div> --}}
                    {{-- @include('frontend.partials.sections.news_new')

                    </div> --}}
                    <div class="row row-cols-1 row-cols-md-3 upcoming-events mt-3">

                        @include('frontend.partials.sections.news_new')
                    </div>
                </div>

                <div class="col-lg-4">
                    <h1 class="fs-4 text-secondary text-uppercase mt-5 mb-0">Events</h1>
                    <hr class="mb-0 mt-0 d-inline-block mx-auto" style="width: 90%; background-color: gray; height: 2px" />
                    {{-- @foreach ($notices as $notice)
                        <div class="d-flex justify-content-center align-items-center mt-3">
                            <div class="col-lg-3">
                                <img class="" src="{{ asset('upload/news/' . $notice->image) }}"
                                    style="width: 70px; height: 70px" />
                            </div>
                            <div class="col-lg-9">
                                <p class="mb-0">{{date('d M Y', strtotime($notice->date))}}</p>
                                <h3 class="fs-5">{{$notice->title}}</h3>
                            </div>
                        </div>
                    @endforeach --}}
                    @include('frontend.partials.sections.events_new')


                </div>
            </div>
        </div>
    </section>
    
@endsection
