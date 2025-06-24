@extends('frontend/partials/iqac_layout')

@php
    $page_title = $title;
@endphp
@section('title')
    {{ $page_title }}
@endsection
@section('content')
    @include('frontend.partials.sections.banner_chsr', ['page_title' => $page_title])

    <!-- Gallery -->
    <section class="my-5">
        <div class="container">
            <h1 class="text-uppercase mb-0 home-content-heading">Album</h1>
            <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;"></div>
            @if (count($galleryCategory) > 0)
                @include('frontend.partials.sections.gallery-album')
            @else
                <h2 class="fs-5 p-3 mt-3  mb-0 bg-light rounded">No album found !</h2>
            @endif
        </div>
    </section>
@endsection
