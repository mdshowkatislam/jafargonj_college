{{-- resources/views/frontend/alumni/pages/about.blade.php --}}

@extends('frontend.alumni.landing')

@section('title')
{{$page_title}}
@endsection

@push('style-bup')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/style-bup.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/main.min.css') }}">
@endpush

@section('content')

{{-- @include('frontend.partials.sections.banner', ['page_title' => $page_title]) --}}
@include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])


    <!-- Overview -->
    <section class="my-5">
        <div class="container overview">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12 ">
                    <div class="text-center bg-light rounded shadow d-flex align-items-center justify-content-center"
                        style="height: 350px">
                        <div class="">
                            <img class="rounded" height="220px"
                                src="{{ @$cheif_advisor->profile->photo ? asset('upload/profiles/' . @$cheif_advisor->profile->photo) : @$cheif_advisor->profile->photo_path }}"
                                onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';" />
                            <div class="pt-3">
                                <h3 class="text-dark fw-bold fs-5 mb-0 lh-sm faculty-title">
                                    {{ @$cheif_advisor->profile->nameEn }}</h3>
                                <p class="fw-bold common-font-color fs-6 mb-1 pt-2">
                                    {{ @$cheif_advisor->designation->name }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12 col-sm-12">
                    <div class="bg-light p-3 rounded shadow  about-message-content d-flex justify-content-center"
                        style="height: 350px">
                        <div>
                            <h2 class="fs-3 fw-bold border-bottom pb-3 mb-3 common-font-color">Overview</h2>
                            {{-- <div class="text-justify fs-6">
                                {!! Str::limit(@$alumni->description, 400, '...') !!}
                            </div> --}}

                            <div class="text-justify fs-6">
                                @php
                                    $originalText = @$alumni->description;
                                    $truncatedText = Str::limit($originalText, 800, '...');
                                    $textLeft = strlen($originalText) === strlen($truncatedText);
                                @endphp
                                {!! Str::limit(@$alumni->description, 800, '...') !!}
                                @if (!$textLeft)
                                    <a href="{{ route('alumni.message', @$alumni->id) }}" class="ms-1 fw-bold common-font-color">Read More </a>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Overview -->
    <section class="my-5">
        <div class="container overview">
            <div class="d-flex justify-content-between align-items-end">
                <h1 class="text-uppercase home-content-heading mb-0">
                    About Alumni
                </h1>
                {{-- <a href="{{ route('news.all') }}" class="text-uppercase text-decoration-none fw-bold common-font-color">All</a> --}}
            </div>
            <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;">
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="bg-light p-3 rounded shadow-sm  about-message-content d-flex mt-3">
                        <div>
                            <h2 class="fs-5 fw-bold border-bottom pb-3 mb-3 common-font-color">Mission</h2>
                            <div class="text-justify fs-6">
                                {!! Str::limit(@$alumni->mission, 400, '...') !!}
                            </div>
                        </div>
                    </div>
                    <div class="bg-light p-3 rounded shadow-sm  about-message-content d-flex mt-3">
                        <div>
                            <h2 class="fs-5 fw-bold border-bottom pb-3 mb-3 common-font-color">Vision</h2>
                            <div class="text-justify fs-6">
                                {!! Str::limit(@$alumni->vision, 400, '...') !!}
                            </div>
                        </div>
                    </div>
                    <div class="bg-light p-3 rounded shadow-sm  about-message-content d-flex mt-3">
                        <div>
                            <h2 class="fs-5 fw-bold border-bottom pb-3 mb-3 common-font-color">Motto</h2>
                            <div class="text-justify fs-6">
                                {!! Str::limit(@$alumni->motto, 400, '...') !!}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
