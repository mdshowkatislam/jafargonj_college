{{-- @extends('frontend.department.tamplate_four.partials.main') --}}
@extends('frontend.office.template.partials.main')

@php
    $url=request()->route()->getName();
    $page_title = 'About';
@endphp

@section('title')
    {{ $page_title }}
@endsection

@section('content')
    <div class="faculty-profile-banner d-flex justify-content-center align-items-center" style="background-image: url( {{ @$banner->image ? asset('upload/banner/' . $banner->image) : asset('frontend/assets/img/bup/banner.jpg') }} ) ">
        <h1 class="text-white font-poppins">About {{ @$office->name }}</h1>
    </div>

    <!-- Hero Title -->
    <main class="container">
        <section>
            <div class="container mt-3">
                <div class="card mb-3" style="max-width: 100%; border-top: 5px solid #29ACBB;">
          
                    <div class="p-3">
                        <p class="card-text">{!! @$office->about !!}</p>
                    </div>
                </div>
            </div>
        </section>

    </main>

@endsection
