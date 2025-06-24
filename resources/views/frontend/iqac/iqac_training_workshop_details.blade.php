
@extends('frontend/partials/iqac_layout')

@php
    $page_title = @$workshop->title;
@endphp
@section('title')
    {{ $page_title }}
@endsection
@section('content')
    @include('frontend.partials.sections.banner_chsr', ['page_title' => $page_title])

    <section class="container">
        <div class="container profile">
            <div class="row my-5">
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="text-center bg-light shadow d-flex align-items-center justify-content-center" style="height: 350px">
                        <div class="" >
                            <img src="{{ asset('upload/workshop/' . $workshop->image) }}" class="" alt="labs" height="350px" width="430px"
                            onerror="this.onerror=null;this.src='{{ asset('upload/no-image.png') }}';" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="bg-light p-3 rounded shadow about-message-content" style="min-height: 350px">
                        <div>
                            <h2 class="fs-3 fw-bold border-bottom pb-3 mb-3 common-font-color">{{ @$workshop->title }}
                            </h2>
                            <p class="card-text mb-0 mt-3 fs-7"><i class="fas fa-calendar-alt pe-1"></i> {{ date('d M Y', strtotime(@$workshop->schedule)) }}</p>

                            <div class="text-justify fs-6 pt-2">
                                {!! @$workshop->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection





