@php
    $page_title = 'Image Gallery';
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
    <!-- Gallery -->
    <section class="my-5">
        <div class="container">
            <h1 class="text-uppercasemb-0 home-content-heading">Album</h1>
            <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;"></div>
            @if (count($galleryCategory) > 0)
                @include('frontend.partials.sections.gallery-album')
            @else
                <h2 class="fs-5 p-3 mt-3  mb-0 bg-light rounded">No album found !</h2>
            @endif
        </div>
    </section>
@endsection
