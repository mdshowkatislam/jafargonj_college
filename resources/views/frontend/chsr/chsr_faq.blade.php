@extends('frontend.chsr.landing')

@php
    $page_title = 'Frequently Asked Questions';
@endphp
@section('title')
    {{ $page_title }}
@endsection
<style>

</style>

@section('content')
    {{-- Banner --}}
    @include('frontend.partials.sections.banner_chsr', ['page_title' => $page_title])

    <!-- Profile -->

    
    <section class="container">
        @include('frontend.partials.sections.faq')
    </section>

@endsection
