@extends('frontend.oefcd.landing')

@php
    $page_title = 'Frequently Asked Questions';
@endphp
@section('title')
    {{ $page_title }}
@endsection
@section('content')
    @include('frontend.partials.sections.banner', ['page_title' => $page_title])
    <section class="container">
        @include('frontend.partials.sections.faq')
    </section>
@endsection
