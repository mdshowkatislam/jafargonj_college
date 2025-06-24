@extends('frontend.landing')
@php
    $page_title = 'Vice Chancellor';
@endphp
@section('title')
    {{ $page_title }}
@endsection


@section('content')
@include('frontend.partials.sections.banner-cover', ['page_title' => $page_title])

<style></style>


    <!-- Start Course Details
    ============================================= -->
    
    
    <!-- End content ============================================= -->

@endsection