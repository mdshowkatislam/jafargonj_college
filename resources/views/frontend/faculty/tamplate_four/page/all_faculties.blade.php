@extends('frontend.faculty.tamplate_four.partials.main')

@php
    $page_title = 'All Departments';
@endphp
@section('title')
    {{ $page_title }}
@endsection

@section('content')
    <div class="faculty-profile-banner d-flex justify-content-center align-items-center"
        style="background-image: url( {{ @$banner->image ? asset('upload/banner/' . $banner->image) : asset('frontend/assets/img/bup/banner.jpg') }} ) ">
        <h1 class="text-white font-poppins">{{ $page_title }}</h1>
    </div>

    <section class="container">

        <div class="row">
            @foreach ($departments as $item)
                @php
                    $profiles = \App\Models\PersonnelsToFaculty::with('profile')
                        ->whereHas('department')
                        ->whereHas('profile')
                        ->where('department_id', @$item->id)
                        ->where('status', 1)
                        ->orderBy('sort_order', 'asc')
                        ->get();
                @endphp
                @if (count($profiles) > 0)
                    <div>
                        <h1 class="text-secondary fs-3 mt-5 ">{{ @$item->name }}</h1>
                        <div class="mb-3 d-inline-block mx-auto" style="width: 100%; background-color: #8b0101; height: 4px">
                        </div>
                    </div>
                @endif

                @foreach ($profiles as $list)
                    @if (@$list->profile->appointment_type != 'Part-time')
                    <div class="col-12 col-md-6 col-lg-3 mt-4">
                        <div class="shadow card rounded-0 border-0 d-block text-center pt-3 faculty_member">
                            <div class="border-one"></div>
                            <div class="border-two"></div>
                            <img class="mx-2 mt-2 shadow-lg image-circle"
                                src="{{  @$list->profile->photo ? asset('upload/profiles/' .  @$list->profile->photo) :  @$list->profile->photo_path }}"
                                height="200" width="200"
                                onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';"
                                alt="" />
                            <div class="card-body bg-light shadow-lg" style="min-height: 7.75rem">
                                <a href="{{ route('faculty_member.details',  @$list->profile_id) }}">
                                    <div class="faculty-member-title d-flex justify-content-center">
                                        <h5 class="card-title fs-5 text-center text-captilize common-font-color">
                                            {{  @$list->profile->nameEn }}
                                        </h5>
                                    </div>
                                    <p class="text-center fs-6 common-font-color">
                                        {{  @$list->profile->designation }}
                                    </p>
                                </a>

                            </div>
                        </div>
                    </div>


                    @endif
                @endforeach

                @if (count($profiles->where('profile.appointment_type', '=', 'Part-time')) > 0)
                    <div class="pt-3">
                        <h4 class="mb-0 text-secondary" style="font-weight: bold">
                            Adjunct Faculty
                        </h4>
                    </div>
                @endif
                <div class="row">
                    @foreach ($profiles as $list)
                        @if (@$list->profile->appointment_type == 'Part-time')
                        <div class="col-12 col-md-6 col-lg-3 mt-4">
                            <div class="shadow-lg card rounded-0 border-0 d-block text-center pt-3 faculty_member">
                                <div class="border-one"></div>
                                <div class="border-two"></div>
                                <img class="mx-2 mt-2 shadow-lg image-circle"
                                    src="{{ $list->profile->photo ? asset('upload/profiles/' . $list->profile->photo) : $list->profile->photo_path }}"
                                    height="200" width="200"
                                    onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';"
                                    alt="" />

                                <div class="card-body bg-light shadow-lg" style="min-height: 7.75rem">
                                    <a href="{{ route('faculty_member.details', $list->profile_id) }}">
                                        <div class="faculty-member-title d-flex justify-content-center">
                                            <h5 class="card-title fs-5 text-center text-captilize common-font-color">
                                                {{ $list->profile->nameEn }}
                                            </h5>
                                        </div>
                                        <p class="text-center fs-6 common-font-color">
                                            {{ $list->profile->designation }}
                                        </p>
                                    </a>
                                </div>
                            </div>
                        </div>
                       
                        @endif
                    @endforeach
                </div>
            @endforeach
        </div>
      <br>
      <br>
    </section>

@endsection
