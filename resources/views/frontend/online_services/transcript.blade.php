@extends('frontend.landing')
@php
    $page_title = 'Apply For Transcript';
@endphp
@section('title')
    {{ $page_title }}
@endsection
@section('content')
    @include('frontend.partials.sections.banner', ['page_title' => $page_title])

    <section class="container">
        <div class="row my-5">
            
        </div>
    </section>
@endsection
