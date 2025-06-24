@extends('frontend.layouts.master-landing')
@php
    $page_title = 'Scholarships & Financial Aids';
@endphp
@section('title')
    {{ $page_title }}
@endsection
@section('content')
    {{-- @include('frontend.partials.sections.banner', ['page_title' => $page_title]) --}}
    @include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])

    <section class="container">
        <div class="row my-5">
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="card shadow-sm bg-light border-0">
                    <div class="card-body">
                        <h1 class="fs-3 fw-bold mb-3">
                            How aid works?
                        </h1>
                        <p class="text-justify">
                            {!! @$sfa->how_aid_works !!}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="card shadow-sm bg-light border-0">
                    <div class="card-body">
                        <h1 class="fs-3 fw-bold mb-3">
                            Types of Aids
                        </h1>
                        <p class="text-justify">
                            {!! @$sfa->type_of_aids !!}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 mt-4">
                <div class="card shadow-sm bg-light border-0">
                    <div class="card-body">
                        <h1 class="fs-3 fw-bold mb-3">
                            Policies and Procedures
                        </h1>
                        <p class="text-justify">
                            {!! @$sfa->policies_and_procedures !!}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 mt-4">
                @if (isset($sfa->aid_file))
                <a class="btn shadow" href="{{ url('upload/financial_aids/'.@$sfa->aid_file) }}"  role="button" style="background-color: #00c5bf;"><i class="fas fa-download me-1" download="Scholarships & Financial Aids"></i> Download Resources</a>
                @endif
            </div>
        </div>
    </section>
@endsection
