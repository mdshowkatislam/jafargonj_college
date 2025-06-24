@extends('frontend.landing')
@php
    $page_title = 'Privacy Policy';
@endphp
@section('title')
    {{ $page_title }}
@endsection
<style>
    .home-privacy-policy p{
        margin: 0;
    }
</style>
@section('content')
    @include('frontend.partials.sections.banner', ['page_title' => $page_title])
    <section class="mt-5">
        <div class="container overview">
            <div class="d-flex justify-content-between align-items-end">
                <h1 class="text-uppercase home-content-heading mb-0">
                    {{ @$infos->title }}
                </h1>
            </div>
            <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;">
            </div>
            <div class="row mb-5">
                <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                    <div class="bg-light p-3 rounded shadow-sm  about-message-content d-flex">
                        <div class="text-justify fs-6 home-privacy-policy">
                            {!! @$infos->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
