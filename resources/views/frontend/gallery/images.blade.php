@php
    if ($type == 4) {
        $extend = 'frontend.chsr.landing';
    } elseif ($type == 5) {
        $extend = 'frontend.cpc.partials.main';
    } elseif ($type == 6) {
        $extend = 'frontend/partials/iqac_layout';
    } elseif ($type == 8) {
        $extend = 'frontend.club.landing';
    } elseif ($type == 10) {
        $extend = 'frontend.landing';
    } 
    else {
        $extend = 'frontend.landing';
    }
@endphp
@extends($extend)

{{-- @php
    if ($research_for == 1) {
        $page_title = 'Centre for Higher Education and Research (CHSR)';
    } else {
        $page_title = 'Research';
    }
@endphp --}}


{{-- @extends('frontend.landing') --}}
@php
    $page_title = $title;
@endphp

@section('title')
    {{ $page_title }}
@endsection

@section('content')
    @if ($type == 4 || $type == 6)
        @include('frontend.partials.sections.banner_chsr', ['page_title' => $page_title])
    @else
        @include('frontend.partials.sections.banner', ['page_title' => $page_title])
    @endif

    @include('frontend.partials.sections.gallery-images')
@endsection
