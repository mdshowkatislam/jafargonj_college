<style>
    .faculty-profile-banner {
    background-image: linear-gradient(
            rgba(13, 202, 76, 0.75),
            rgba(1, 39, 11, 0.75)
        ),
        url({{asset('frontend/assets/img/bup/banner.jpg')}});
    }
</style>
@php
    $page_title = @$department->name;
@endphp
@section('title')
    {{ $page_title }}
@endsection
<style>
    .business-banner-card {
        background-image: linear-gradient(rgba(237, 28, 36, 0.4),
                rgba(237, 28, 36, 0.8)),
            url({{ asset('frontend/assets/img/bup/faculty_dept_banner.png') }});
    }
</style>
@extends('frontend.department.tamplate_three.partials.main')

@section('content')
    <div class="faculty-profile-banner d-flex justify-content-center align-items-center">
        <h1 class="text-white text-center">{{ @$department->name }}</h1>
    </div>
    <!-- Profile -->
    <section class="container">
        <div class="container profile">
            <div class="row my-5">
                <div class="col-12 tem-3-profile-info ">
                    <div class="bg-light p-3 rounded shadow">
                        <h2 class="fs-3 fw-bold border-bottom pb-3 mb-3 common-font-color">About {{ @$department->name }}</h2>
                        <div class="text-justify fs-6">
                            {!! @$department->about !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
