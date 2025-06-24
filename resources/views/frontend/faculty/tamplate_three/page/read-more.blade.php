@extends('frontend.faculty.tamplate_three.partials.main')
@php
    $page_title = @$faculty->name;
@endphp
@section('title')
    {{ $page_title }}
@endsection


@section('content')
    <div class="faculty-profile-banner d-flex justify-content-center align-items-center" style=" background-image: url( {{ @$banner->image ? asset('upload/banner/' . $banner->image) : asset('frontend/assets/img/bup/banner.jpg') }} ) ">
        <h1 class="text-white text-center">{{ @$faculty->name }}</h1>
    </div>
    <!-- Profile -->
    <section class="container">
        <div class="container profile">
            <div class="row my-5">
                <div class="col-12 tem-3-profile-info ">
                    <div class="bg-light p-3 rounded shadow">
                        <h2 class="fs-3 fw-bold border-bottom pb-3 mb-3 common-font-color">About {{ @$faculty->name }}</h2>
                        <div class="text-justify fs-6">
                            {!! @$faculty->about !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
