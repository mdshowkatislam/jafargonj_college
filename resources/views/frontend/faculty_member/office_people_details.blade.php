<!-- ===== slider section start ===== -->
@extends('frontend.landing')
@php
    $page_title = 'Faculty Officer\'s Profile';
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
</style>

@section('content')
    <!-- ===== Page title section start ===== -->
    @include('frontend.partials.sections.banner', ['page_title' => $page_title])
    <!-- ===== Page title section end ===== -->

    <!-- ===== Page content section start ===== -->
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
                <div class="col-10 profile-info">
                    <h1 class="fs-4 fw-bold text-primary">{{ $profile->profile->nameEn }}</h1>
                    <h1 class="fs-6">
                        <i class="bi bi-person-fill"></i><span
                            class="mx-2 text-">{{ $profile->profile->designation }}</span>
                    </h1>
                    {{-- <h1 class="fs-6">
                        <i class="bi bi-telephone-fill"></i><span class="mx-2">{{ $profile->profile->mobile }}</span>
                    </h1> --}}
                    @if ($profile->profile->email != 'N/A' || $profile->profile->email == '')
                        <h1 class="fs-6">
                            <i class="bi bi-at"></i><span class="mx-2">{{ $profile->profile->email }}</span>
                        </h1>
                    @endif
                    <h2 class="fs-6 fw-bolder">
                        {{ $profile->office_id ? $profile->office->name : (!$profile->department_id ? $profile->faculty->name : $profile->department->name) }}
                    </h2>
                </div>
            </div>
            <hr />
            <div class="profile-nav nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link  active bg-light" id="pills-overview-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-overview" type="button" role="tab" aria-controls="pills-overview"
                        aria-selected="true">Overview</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link bg-light" id="pills-edu-tab" data-bs-toggle="pill" data-bs-target="#pills-edu"
                        type="button" role="tab" aria-controls="pills-edu" aria-selected="true">Education</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link bg-light" id="pills-exp-tab" data-bs-toggle="pill" data-bs-target="#pills-exp"
                        type="button" role="tab" aria-controls="pills-exp" aria-selected="true">Experience</a>
                </li>
                @if ($publication)
                    <li class="nav-item" role="presentation">
                        <a class="nav-link bg-light" id="pills-publication-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-publication" type="button" role="tab"
                            aria-controls="pills-publication" aria-selected="true">Publication</a>
                    </li>
                @endif
                <li class="nav-item" role="presentation">
                    <a class="nav-link bg-light" id="pills-achievement-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-achievement" type="button" role="tab" aria-controls="pills-achievement"
                        aria-selected="true">Achievement</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link bg-light" id="pills-training-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-training" type="button" role="tab" aria-controls="pills-training"
                        aria-selected="true">Training</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link bg-light" id="pills-soc-tab" data-bs-toggle="pill" data-bs-target="#pills-soc"
                        type="button" role="tab" aria-controls="pills-soc" aria-selected="true">Media</a>
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
                                style="background: #ed1c24  !important; padding:10px;">Biography</h1>
                            <div class="content p-3">
                                @foreach ($biographys as $biography)
                                    {!! @$biography->Biography !!}
                                @endforeach
                            </div>
                            <div class="pt-3">
                                <p class="text-right text-success fs-7 m-0">Last Updated:
                                    {{ date('d M Y', strtotime(@$biography->updated_at)) }}</p>
                            </div>
                        </div>
                    @endif

                    @php
                        $education = explode(';', $profile->profile->detail_education);
                    @endphp

                    @if ($profile->profile->detail_education != null)
                        <div class="pt-3 border-bottom">
                            <h1 class="text-captilize m-0 fs-6 fw-bold text-white rounded shadow"
                                style="background: #ed1c24  !important; padding:10px;">Education</h1>
                            <div class="content p-3">
                                @foreach ($education as $item)
                                    {{ $item }}<br>
                                @endforeach
                            </div>
                            <div class="pt-3">
                                <p class="text-right text-success fs-7 m-0">Last Updated:
                                    {{ date('d M Y', strtotime(@$profile->updated_at)) }}</p>
                            </div>
                        </div>
                    @endif
                    
                    @if ($profile->profile->experience != null)
                        <div class="pt-3 border-bottom">
                            <h1 class="text-captilize m-0 fs-6 fw-bold text-white rounded shadow"
                                style="background: #ed1c24  !important; padding:10px;">Experience</h1>
                            <div class="content p-3">
                                {{ @$profile->profile->experience }}
                            </div>
                            <div class="pt-3">
                                <p class="text-right text-success fs-7 m-0">Last Updated:
                                    {{ date('d M Y', strtotime(@$profile->updated_at)) }}</p>
                            </div>
                        </div>
                    @endif

                    @if ($achievement)
                        <div class="pt-3 border-bottom">
                            <h1 class="text-captilize m-0 fs-6 fw-bold text-white rounded shadow"
                                style="background: #ed1c24  !important; padding:10px;">Achievement</h1>
                            <div class="content p-3">
                                {!! @$achievement->achievement !!}
                            </div>
                            <div class="pt-3">
                                <p class="text-right text-success fs-7 m-0">Last Updated:
                                    {{ date('d M Y', strtotime(@$achievement->updated_at)) }}</p>
                            </div>
                        </div> 
                    @endif

                    @if ($training)
                        <div class="pt-3">
                            <h1 class="text-captilize m-0 fs-6 fw-bold text-white rounded shadow"
                                style="background: #ed1c24  !important; padding:10px;">Training</h1>
                            <div class="content p-3">
                                {!! @$training->training !!}
                            </div>
                            <div class="pt-3">
                                <p class="text-right text-success fs-7 m-0">Last Updated:
                                    {{ date('d M Y', strtotime(@$training->updated_at)) }}</p>
                            </div>
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
                    <div class="pt-3">
                        <p class="text-right text-success fs-7">Last Updated:
                            {{ date('d M Y', strtotime(@$profile->updated_at)) }}</p>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-exp" role="tabpanel" aria-labelledby="pills-exp-tab"
                    tabindex="0">
                    {{ @$profile->profile->experience }}
                    <div class="pt-3">
                        <p class="text-right text-success fs-7">Last Updated:
                            {{ date('d M Y', strtotime(@$profile->updated_at)) }}</p>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-publication" role="tabpanel"
                    aria-labelledby="pills-publication-tab" tabindex="0">
                    {!! @$publication->JournalDetail !!}
                    <div class="pt-3">
                        <p class="text-right text-success fs-7">Last Updated:
                            {{ date('d M Y', strtotime(@$publication->updated_at)) }}</p>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-achievement" role="tabpanel" aria-labelledby="pills-achievement-tab"
                    tabindex="0">
                    {!! @$achievement->achievement !!}
                    <div class="pt-3">
                        <p class="text-right text-success fs-7">Last Updated:
                            {{ date('d M Y', strtotime(@$achievement->updated_at)) }}</p>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-training" role="tabpanel"
                    aria-labelledby="pills-training-tab" tabindex="0">
                    {!! @$training->training !!}
                    <div class="pt-3">
                        <p class="text-right text-success fs-7">Last Updated:
                            {{ date('d M Y', strtotime(@$training->updated_at)) }}</p>
                    </div>
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
                    <div class="pt-3">
                        <p class="text-right text-success fs-7">Last Updated:
                            {{ date('d M Y', strtotime(@$social->updated_at)) }}</p>
                    </div>

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
