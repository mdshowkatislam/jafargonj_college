@php
    $page_title = 'Frequently Asked Questions';
@endphp
@section('title')
    {{ $page_title }}
@endsection
<style>
    .faculty-profile-banner {
        background-image: linear-gradient(rgba(13, 202, 76, 0.75),
                rgba(1, 39, 11, 0.75)),
            url({{ @$banner->image ? asset('upload/banner/' . $banner->image) : '' }});
    }
</style>
@extends('frontend.cpc.partials.main')

@section('content')
    <div class="faculty-profile-banner d-flex justify-content-center align-items-center">
        <h1 class="text-white text-center">{{ $page_title }}</h1>
    </div>

    <section class="my-5">
        <div class="container">
            @include('frontend.partials.sections.faq')
        </div>
    </section>
@endsection
