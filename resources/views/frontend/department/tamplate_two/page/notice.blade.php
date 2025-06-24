
@extends('frontend.department.tamplate_two.partials.main')

@php
    $page_title = "Notice"
@endphp
@section('title'){{$page_title}} @endsection
<style>
    .faculty-profile-banner {
    background-image: linear-gradient(
            rgba(13, 202, 76, 0.75),
            rgba(1, 39, 11, 0.75)
        ),
        url({{asset('frontend/assets/img/bup/banner.jpg')}});
    }
</style>


@section('content')
<div class="faculty-profile-banner d-flex justify-content-center align-items-center">
        <h1 class="text-white font-poppins">{{ $page_title }}</h1>
    </div>
    <!-- Hero Title -->
    <section class="" style="min-height: 350px">
    </section>
    
@endsection
