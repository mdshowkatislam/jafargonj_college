<!-- ===== slider section start ===== -->
{{-- @extends('frontend.landing-new') --}}
{{-- @extends('frontend.faculty.tamplate_four.partials.main') --}}
@extends('frontend.layouts.master-landing')

@php
    $page_title = 'Officer\'s Profile';
@endphp
@section('title')
    {{ $page_title }}
@endsection
<style>
    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        color: #ed1c24 !important;
        border-bottom: 3px solid #ed1c24;
        border-radius: 0;
    }
    

    /* .faculty-profile-banner {
        height: 250px;
        background-image: linear-gradient(#00c5bf),
                rgba(1, 38, 39, 0.75)),
            url({{ @$banner->image ? asset('upload/banner/' . $banner->image) : '' }});
    } */

    .bg-light {

        background-color: #F8F9FA !important;
    }
    .faculty-social-icon img{ background-color:#00c5bf; margin-left:4px;padding:1px;width:24px;}
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.2/font/bootstrap-icons.min.css" />
@section('content')
    <!-- ===== Page title section start ===== -->
    <div class="clearfix"></div>
    {{-- @include('frontend.partials.sections.banner-cover') --}}
    @include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])
    {{--  @include('frontend\partials\sections\banner-no-title')  --}}
    <!-- ===== Page title section end ===== -->
    {{--  <div class="faculty-profile-banner d-flex justify-content-center align-items-center" style=" background-image: url( {{ @$banner->images ? asset('upload/banner/' . $banner->image) : asset('frontend/assets/img/butex/banner-butex.png') }} ) ">
        <h1 class="text-white font-poppins">{{ $page_title }}</h1>
    </div>  --}}

    <!-- ===== Page content section start ===== -->
<br>
<main class="container mt-5">
    <!-- Profile -->
    <div class="profile shadow-sm p-3 mb-4 bg-light rounded">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-2 col-md-6 profile-img">
                <img class="rounded object-cover"
                    src="{{ $profile->profile->photo ? asset('upload/profiles/' . $profile->profile->photo) : $profile->profile->photo_path }}"
                    onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';"
                    style="width: 100%" />

            </div>

            @php
                $designations1  = @$profile->designations ?? '';
                $designations2  = @$profile->additional_charge ?? '';
                $designations3  = @$profile->additional_designation ?? '';
            @endphp

            <div class="col-10 profile-info">
                <h1 class="fs-4 fw-bold" style="color: #00c5bf;">{{ $profile->profile->nameEn }}</h1>
                @if(@$designations1)
                    <h1 class="fs-6">
                        <i class="bi bi-person-fill"></i><span
                            class="mx-2 text-">{{ @$designations1 }}</span>
                    </h1>
                @endif

                @if(@$designations2)
                <h1 class="fs-6">
                    <i class="bi bi-person-fill"></i><span
                        class="mx-2 text-">{{ @$designations2 }}</span>
                </h1>
                @endif

                @if(@$designations3)
                <h1 class="fs-6">
                    <i class="bi bi-person-fill"></i><span
                        class="mx-2 text-">{{ @$designations3 }}</span>
                </h1>
                @endif

                {{-- <h1 class="fs-6">
                    <i class="bi bi-telephone-fill"></i><span class="mx-2">{{ $profile->profile->mobile }}</span>
                </h1> --}}

            <div class="col-10 d-flex">
                @if ($profile->profile->office_telephone)
                <div class="">
                    <h1 class="fs-6">
                    <i class="bi bi-telephone"></i><span class="mx-2">Phone: {{ $profile->profile->office_telephone }}</span>
                    </h1>
                </div>
                    @if ($profile->profile->office_extension)
                    <div style="">
                        <h1 class="fs-6">
                            <span class="mx-2">Ext. {{ $profile->profile->office_extension }}</span>
                        </h1>      
                    </div>
                    @endif
                @endif
            </div>


                @if ($profile->profile->email != 'N/A' || $profile->profile->email == '')
                    <h1 class="fs-6">
                        <i class="bi bi-at"></i><span class="mx-2">{{ $profile->profile->email }}</span>
                    </h1>
                @endif

                <!-- <h2 class="fs-6 fw-bolder">
                    {{ $profile->office_id ? @$profile->office->name : (!$profile->department_id ? @$profile->faculty->name : @$profile->department->name) }}
                </h2> -->
            </div>
        </div>
        <hr />
        <div class="profile-nav nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link  active bg-light" id="pills-overview-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-overview" type="button" role="tab" aria-controls="pills-overview"
                    aria-selected="true" style="color: #00c5bf;">Overview</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link bg-light" id="pills-edu-tab" data-bs-toggle="pill" data-bs-target="#pills-edu"
                    type="button" role="tab" aria-controls="pills-edu" aria-selected="true" style="color: #00c5bf;">Education</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link bg-light" id="pills-exp-tab" data-bs-toggle="pill" data-bs-target="#pills-exp"
                    type="button" role="tab" aria-controls="pills-exp" aria-selected="true" style="color: #00c5bf;">Experience</a>
            </li>
            @if ($publication)
                <li class="nav-item" role="presentation">
                    <a class="nav-link bg-light" id="pills-publication-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-publication" type="button" role="tab"
                        aria-controls="pills-publication" aria-selected="true" style="color: #00c5bf;">Publication</a>
                </li>
            @endif
            <li class="nav-item" role="presentation">
                <a class="nav-link bg-light" id="pills-achievement-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-achievement" type="button" role="tab" aria-controls="pills-achievement"
                    aria-selected="true" style="color: #00c5bf;">Achievement</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link bg-light" id="pills-training-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-training" type="button" role="tab" aria-controls="pills-training"
                    aria-selected="true" style="color: #00c5bf;">Training</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link bg-light" id="pills-soc-tab" data-bs-toggle="pill" data-bs-target="#pills-soc"
                    type="button" role="tab" aria-controls="pills-soc" aria-selected="true" style="color: #00c5bf;">Media</a>
            </li>
        </div>
    </div>
    <article class="content shadow-sm p-2 mb-5 bg-light rounded">
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-overview" role="tabpanel"
                aria-labelledby="pills-overview-tab" tabindex="0">

                @if (count($biographys) > 0)
                    <div class="pt-3 border-bottom">
                        <h1 class="text-captilize m-0 fs-6 fw-bold text-white rounded shadow"
                            style="background: #00c5bf  !important; padding:10px;">Biography</h1>
                        <div class="content p-3">
                            @foreach ($biographys as $biography)
                                {!! @$biography->Biography !!}
                                {{-- <div class="pt-3">
                                    <p class="text-right fs-7 m-0">
                                        {{ @$biography->updated_at ? 'Last Updated:'. date('d M Y', strtotime(@$biography->updated_at)) : 'Last Updated:' }}
                                    </p>
                                </div> --}}
                            @endforeach
                        </div>
                    </div>
                @endif

                @php
                    $education = explode(';', $profile->profile->detail_education);
                @endphp

                @if ($profile->profile->detail_education != null)
                    <div class="pt-3 border-bottom">
                        <h1 class="text-captilize m-0 fs-6 fw-bold text-white rounded shadow"
                            style="background: #00c5bf  !important; padding:10px;">Education</h1>
                        <div class="content p-3">
                            @foreach ($education as $item)
                                {{ $item }}<br>
                            @endforeach
                        </div>
                        {{-- <div class="pt-3">
                            <p class="text-right fs-7 mb-3">
                                {{ @$profile->updated_at ? 'Last Updated:'. date('d M Y', strtotime(@$profile->updated_at)) : '' }}
                            </p>
                        </div> --}}
                    </div>
                @endif

                @if (count($journals) > 0)
                    <div class="pt-3 border-bottom">
                        <h6 class="text-captilize m-0 fs-6 fw-bold text-white rounded shadow"
                            style="background: #00c5bf  !important; padding:10px;">Journal Publication</h6>
                        <div class="content p-3">
                            @foreach ($journals as $journal)
                                {{-- {!! @$journal->JournalDetail !!} --}}
                                <p><a href="{{ @$journal->DOI }}" target="_blank">{{ @$journal->JournalTitle }} </a></p>
                                {{-- <div class="pt-1">
                                    <p class="text-right fs-7 m-0">
                                        {{ @$journal->updated_at ? 'Last Updated:'. date('d M Y', strtotime(@$journal->updated_at)) : '' }}
                                    </p>
                                </div> --}}
                            @endforeach
                        </div>
                    </div>
                @endif

                @if (count($conferences) > 0)
                    <div class="pt-3 border-bottom">
                        <h6 class="text-captilize m-0 fs-6 fw-bold text-white rounded shadow"
                            style="background: #00c5bf  !important; padding:10px;">Conference Papers</h6>
                        <div class="content p-3">
                            @foreach ($conferences as $conference)
                                {!! @$conference->ConferenceDetail !!}
                                {{-- <div class="pt-3">
                                    <p class="text-right fs-7 m-0">
                                        {{ @$conference->updated_at ? 'Last Updated:'. date('d M Y', strtotime(@$conference->updated_at)) : '' }}
                                    </p>
                                </div> --}}
                            @endforeach
                        </div>
                    </div>
                @endif

                @if (count($books) > 0)
                    <div class="pt-3 border-bottom">
                        <h6 class="text-captilize m-0 fs-6 fw-bold text-white rounded shadow"
                            style="background: #00c5bf  !important; padding:10px;">Books</h6>
                        <div class="content p-3">
                            @foreach ($books as $book)
                                {!! @$book->BookDetail !!}
                                {{-- <div class="pt-3">
                                    <p class="text-right fs-7 m-0">
                                        {{ @$book->updated_at ? 'Last Updated:'. date('d M Y', strtotime(@$book->updated_at)) : '' }}
                                    </p>
                                </div> --}}
                            @endforeach
                        </div>
                    </div>
                @endif

                @if ($profile->profile->experience != null)
                    <div class="pt-3 border-bottom">
                        <h1 class="text-captilize m-0 fs-6 fw-bold text-white rounded shadow"
                            style="background: #00c5bf  !important; padding:10px;">Experience</h1>
                        <div class="content p-3">
                            {{ @$profile->profile->experience }}
                        </div>
                        {{-- <div class="pt-3">
                            <p class="text-right fs-7 mb-3">
                                {{ @$profile->updated_at ? 'Last Updated:'. date('d M Y', strtotime(@$profile->updated_at)) : '' }}
                            </p>
                        </div> --}}
                    </div>
                @endif

                @if ($achievement)
                    <div class="pt-3 border-bottom">
                        <h1 class="text-captilize m-0 fs-6 fw-bold text-white rounded shadow"
                            style="background: #00c5bf  !important; padding:10px;">Achievement</h1>
                        <div class="content p-3">
                            {!! @$achievement->achievement !!}
                        </div>
                        {{-- <div class="pt-3">
                            <p class="text-right fs-7 mb-3">
                                {{ @$achievement->updated_at ? 'Last Updated:'. date('d M Y', strtotime(@$achievement->updated_at)) : '' }}
                            </p>
                        </div> --}}
                    </div>
                @endif

                @if ($training)
                    <div class="pt-3">
                        <h1 class="text-captilize m-0 fs-6 fw-bold text-white rounded shadow"
                            style="background: #00c5bf  !important; padding:10px;">Training</h1>
                        <div class="content p-3">
                            {!! @$training->training !!}
                        </div>
                        {{-- <div class="pt-3">
                            <p class="text-right fs-7 mb-3">
                                {{ @$training->updated_at ? 'Last Updated:'. date('d M Y', strtotime(@$training->updated_at)) : '' }}
                            </p>
                        </div> --}}
                    </div>
                @endif
            </div>
            <div class="tab-pane fade" id="pills-edu" role="tabpanel" aria-labelledby="pills-edu-tab"
                tabindex="0">
                @php
                    $edu = explode(';', $profile->profile->detail_education);
                    // dd($edu);
                @endphp
                @foreach ($edu as $item)
                    {{ $item }}<br>
                @endforeach
                {{-- {{ @$profile->profile->detail_education }} --}}
                {{-- <div class="pt-3">
                    <p class="text-right fs-7">Last Updated:
                        {{ date('d M Y', strtotime(@$profile->updated_at)) }}</p>
                </div> --}}
            </div>
            <div class="tab-pane fade" id="pills-exp" role="tabpanel" aria-labelledby="pills-exp-tab"
                tabindex="0">
                {{ @$profile->profile->experience }}
                {{-- <div class="pt-3">
                    <p class="text-right fs-7">Last Updated:
                        {{ date('d M Y', strtotime(@$profile->updated_at)) }}</p>
                </div> --}}
            </div>
            <div class="tab-pane fade" id="pills-publication" role="tabpanel"
                aria-labelledby="pills-publication-tab" tabindex="0">
                {{-- {!! @$publication->JournalDetail !!} --}}
                <p><a href="{{ @$journal->DOI }}" target="_blank">{{ @$journal->JournalTitle }} </a></p>
                {{-- <div class="pt-1">
                    <p class="text-right fs-7">Last Updated:
                        {{ date('d M Y', strtotime(@$publication->updated_at)) }}</p>
                </div> --}}
            </div>
            <div class="tab-pane fade" id="pills-achievement" role="tabpanel"
                aria-labelledby="pills-achievement-tab" tabindex="0">
                {!! @$achievement->achievement !!}
                {{-- <div class="pt-3">
                    <p class="text-right fs-7">Last Updated:
                        {{ date('d M Y', strtotime(@$achievement->updated_at)) }}</p>
                </div> --}}
            </div>
            <div class="tab-pane fade" id="pills-training" role="tabpanel" aria-labelledby="pills-training-tab"
                tabindex="0">
                {!! @$training->training !!}
                {{-- <div class="pt-3">
                    <p class="text-right fs-7">Last Updated:
                        {{ date('d M Y', strtotime(@$training->updated_at)) }}</p>
                </div> --}}
            </div>

            <div class="tab-pane fade" id="pills-soc" role="tabpanel" aria-labelledby="pills-soc-tab"
                tabindex="0">
                <div class="social-section d-flex">
                    <div class="faculty-social-icon text-center">
                        <a href="{{ @$social->google_scholar_link ? $social->google_scholar_link : '#' }}"><img
                                class=""
                                src="{{ asset('frontend/assets/img/faculty-of-bs/social-icon (1).png') }}"
                                alt="icon"></a>
                    </div>
                    <div class="faculty-social-icon text-center">
                        <a href="{{ @$social->research_gate_link ? $social->research_gate_link : '#' }}"><img
                                class=""
                                src="{{ asset('frontend/assets/img/faculty-of-bs/social-icon (2).png') }}"
                                alt="icon"></a>
                    </div>
                    <div class="faculty-social-icon text-center">
                        <a href="{{ @$social->linkedin_link ? $social->linkedin_link : '#' }}"><img class=""
                                src="{{ asset('frontend/assets/img/faculty-of-bs/social-icon (3).png') }}"
                                alt="icon"></a>
                    </div>
                    <div class="faculty-social-icon text-center">
                        <a href="{{ @$social->website_link ? $social->website_link : '#' }}"><img class=""
                                src="{{ asset('frontend/assets/img/faculty-of-bs/social-icon (4).png') }}"
                                alt="icon"></a>
                    </div>
                </div>
                {{-- <div class="pt-3">
                    <p class="text-right fs-7">Last Updated:
                        {{ date('d M Y', strtotime(@$social->updated_at)) }}</p>
                </div> --}}

            </div>
        </div>
    </article>
</main>

    <!-- ===== Page content section end ===== -->

    <script>
        $('#pills-tab .nav-link').click(function() {
            $('#pills-tab .nav-link').each(function() {
                $(this).removeClass('active');
            });
            $(this).addClass('active');
        });
    </script>
@endsection
