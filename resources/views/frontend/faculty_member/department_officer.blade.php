<!-- ===== slider section start ===== -->
@extends('frontend.landing')
@php
    $page_title = 'Department Officers';
@endphp
@section('title')
    {{ $page_title }}
@endsection
<style>
    .faculty-profile-banner {
        background-image: linear-gradient(rgba(13, 202, 76, 0.75),
                rgba(1, 39, 11, 0.75)),
            url({{ asset('frontend/assets/img/bup/banner.jpg') }});
    }
</style>
@section('content')
    <!-- ===== Page title section start ===== -->
    <!-- Banner -->
    <section>
        <div class="faculty-profile-banner d-flex justify-content-center align-items-center">
            <h1 class="text-white font-poppins">{{ $page_title }}</h1>
        </div>
    </section>
    <!-- Senate Chairman -->
    <section class="container">
        {{-- <h1 class=" text-secondary text-uppercase fs-3 mb-0 ">VC'S Office</h1>
        <div class="mb-0 mt-0 d-inline-block mx-auto" style="width: 30%; background-color: #8b0101; height: 4px"></div> --}}
        <div class="row">
            @foreach ($profiles as $profile)
                <div>
                    <h1 class=" text-secondary text-uppercase fs-3 mt-5 ">{{ @$profile->department->name }}</h1>
                    <div class="mb-3 d-inline-block mx-auto" style="width: 100%; background-color: #8b0101; height: 4px">
                    </div>
                </div>
                @php
                    // $profile_names = \App\Models\Perso::with('profile')
                    //     ->where('faculty_id', $profile->faculty->id)
                    //     ->get();
                    $profile_names = \App\Models\PersonnelsToFacultyOfficer::whereHas('profile')
                        ->where('department_id', $profile->department->id)
                        ->where('status', 1)
                        ->orderBy('sort_order', 'asc')
                        ->get();
                @endphp
                @foreach ($profile_names as $name)
                    <div class="col-12 col-md-6 col-lg-3 my-3">
                        <a href="{{ route('faculty.officer.details', $name->profile_id) }}">
                            <div class="bg-success card rounded-0 member-list-card zoom_in_hover">
                                <img class="mb-0"
                                    src="{{ @$name->profile->photo ? asset('upload/profiles/' . @$name->profile->photo) : @$name->profile->photo_path }}"
                                    onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';"
                                    alt="Image" />
                                {{-- <div class="scm-social-icon position-absolute">
                                    <a href="#"><i class="bi bi-facebook"></i></a>
                                    <a href="#"><i class="bi bi-instagram"></i></a>
                                    <a href="#"><i class="bi bi-youtube"></i></a>
                                    <a href="#"><i class="bi bi-skype"></i></a>
                                </div> --}}
                                <div class="card-body">
                                    <h5 class="card-title text-white fs-6 mt-0 text-center">
                                        {{ @$name->profile->nameEn }}
                                    </h5>
                                    <p class="card-text text-white text-center">
                                        {{ @$name->profile->designation }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endforeach
        </div>
    </section>

    <!-- ===== Page content section end ===== -->
@endsection
