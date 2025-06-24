@extends('frontend.landing')
@php
    $page_title = $featured_details->title;
@endphp
@section('title')
    {{ $page_title }}
@endsection
@section('content')

    {{-- @include('frontend.partials.sections.banner', ['page_title' => $page_title]) --}}

    @include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])

    <section class="container my-5">
        <div class="row">
            <div class="col-lg-8">
                <div class="card news-detail bg-light shadow rounded">
                    <img class="card-img-top object-cover" src="{{ asset('upload/news/' . $featured_details->image) }}"
                        onerror="this.onerror=null;this.src='{{ asset('upload/no-image.png') }}';" />
                    <div class="card-body">
                        <h1 class="fs-4 text-primary fw-bold mb-2">{{ $featured_details->title }}</h1>
                        <h6 class="fs-6 fw-bold">
                            <i class="fas fa-calendar-alt pe-1"></i> {{ date('d M Y', strtotime(@$featured_details->date)) }}
                        </h6>
                        <div class="fs-6 text-justify">
                            {!! $featured_details->long_description !!}
                        </div>
                    </div>
            </div>
        </div>
            {{--  @include('frontend.partials.latest_news')  --}}
    </section>
@endsection
