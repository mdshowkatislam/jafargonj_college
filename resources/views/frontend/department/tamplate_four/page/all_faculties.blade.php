@extends('frontend.department.tamplate_four.partials.main-second')

@php
    $page_title = "All Faculties"
@endphp
@section('title'){{$page_title}} @endsection

@section('content')

    <div class="faculty-profile-banner d-flex justify-content-center align-items-center" style=" background-image: url( {{ @$banner->image ? asset('upload/banner/' . $banner->image) : asset('frontend/assets/img/butex/banner-butex.png') }} ) ">
        <h1 class="text-white font-poppins">{{ $page_title }}</h1>
    </div>

    {{-- @include('frontend.partials.sections.search', ['page_title' => $page_title]) --}}
    <section>
        <div class="container my-5">
            <div class="row rounded" style="height:11rem; background-color: #f1f1f1">
                <div class="col-md-4 d-block my-auto justify-content-center align-items-center">
                    <h3 class="text-uppercase fs-4">{{ $page_title }} SEARCH</h3>
                    <p>Use the filters to find {{ $page_title }}!</p>
                </div>
                <div class="col-md-8 my-auto justify-content-center">
                    <div class="input-group" style="height : 60px;">
                        <input type="search" class="form-control search-box" placeholder="Enter Keywords ..."
                            aria-label="Search" id="input-field" aria-describedby="search-addon"
                            style="border-radius: 0; font-size: 20px; background-color: #00c5bf; border: none;" />
                        <span class="input-group-text" id="search-addon"
                            style="width : 50px; cursor: pointer; border-radius: 0; background-color: #00c5bf">
                            <i class="fas fa-search"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Title -->
    {{-- <section class="" style="min-height: 350px">
    </section> --}}
    <section class="container mb-5 mt-4">
        {{-- <h2 class="fs-4 fw-bold text-primary d-flex justify-content-center my-5">Our Faculty</h2> --}}
        <div class="row">
            @foreach (@$faculty_members as $key => $member)
            @if (@$member->profile->appointment_type != 'Part-time')
            <div class="col-12 col-md-6 col-lg-3 mt-4">
                <a href="{{route('department_member_deatils', $member->profile_id)}}">
                    <div class="shadow-lg card rounded-0 border-0 d-block text-center pt-3 faculty_member">
                        <div class="border-one"></div>
                        <div class="border-two"></div>
                        <img class="mx-2 mt-2 shadow-lg image-circle" src="{{ @$member->profile->photo ? asset('upload/profiles/' . @$member->profile->photo) : @$member->profile->photo_path }}"
                            height="200" width="200"
                            onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';"
                            alt="" />

                        <div class="card-body bg-light shadow-lg" style="min-height: 7.75rem">
                            <a href="{{route('department_member_deatils', @$member->profile_id)}}">
                                <div class="faculty-member-title d-flex justify-content-center content-title">
                                    <h5 class="card-title fs-5 text-center text-captilize common-font-color">
                                        {{ @$member->profile->nameEn }}
                                        </h5>
                                </div>
                                <p class="text-center fs-6 common-font-color">
                                    {{ @$member->profile->designation }}
                                </p>
                            </a>

                        </div>
                    </div>
                </a>
            </div>
            @endif
            @endforeach
        </div>

    </section>

@if (count(@$faculty_members->where('profile.appointment_type', '=', 'Part-time'))>0)
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
        @foreach ($faculty_members as $key => $member)
        @if ($member->profile->appointment_type == 'Part-time')
        <div class="col-12 col-md-6 col-lg-3 mt-4">
            <div class="shadow-lg card rounded-0 border-0 d-block text-center pt-3 faculty_member">
                <div class="border-one"></div>
                <div class="border-two"></div>
                <img class="mx-2 mt-2 shadow-lg image-circle" src="{{ $member->profile->photo ? asset('upload/profiles/' . $member->profile->photo) : $member->profile->photo_path }}"
                    height="200" width="200"
                    onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';"
                    alt="" />

                <div class="card-body bg-light shadow-lg" style="min-height: 7.75rem">
                    <a href="{{route('department_member_deatils', $member->profile_id)}}">
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
        @endforeach
    </div>
</section>
@endif
<script>
    const searchInput = document.getElementById('input-field');

    searchInput.addEventListener('input', () => {
        const dataList = document.querySelectorAll('.content-title');
        const searchTerm = searchInput.value;

        for (let i = 0; i < dataList.length; i++) {
            const itemText = dataList[i].textContent;
           // console.log(itemText);
            if ((itemText.toLowerCase()).includes((searchTerm.toLowerCase()))) {
                const result = [...itemText.matchAll(new RegExp(searchTerm, 'gi'))];
                var textsplit = itemText.split(new RegExp(searchTerm, 'gi'));
                var text = '';
                const textsplit_length = textsplit.length;
                for (let i = 0; i < textsplit_length; i++) {
                    if ((textsplit_length - 1) == i) {
                        text += textsplit[i];
                    } else {
                        text += textsplit[i] + "<span class='text-danger text-bold'>" + result[i]['0'] +
                            "</span>";
                    }
                }
                dataList[i].childNodes[1].innerHTML = text;

                dataList[i].parentNode.parentNode.parentNode.parentNode.style.display = 'block';
            } else {
                dataList[i].parentNode.parentNode.parentNode.parentNode.style.display = 'none';
            }
        }
    });
</script>
@endsection
