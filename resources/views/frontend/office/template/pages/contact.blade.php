{{-- @extends('frontend.department.tamplate_four.partials.main') --}}
@extends('frontend.office.template.partials.main')

@php
    $url=request()->route()->getName();
    $page_title = 'Contact';
@endphp

@section('title')
    {{ $page_title }}
@endsection

@section('content')
    <div class="faculty-profile-banner d-flex justify-content-center align-items-center" style="background-image: url( {{ @$banner->image ? asset('upload/banner/' . $banner->image) : asset('frontend/assets/img/bup/banner.jpg') }} ) ">
        <h1 class="text-white font-poppins">{{ $page_title }}</h1>
    </div>

    <!-- Hero Title -->
    <main class="container">
        <section>
            <div class="container mt-3">
                <div class="card mb-3" style="max-width: 90%; border-top: 5px solid #29ACBB;">
                    <div class="row g-0">
                        <div class="col-md-8">
                            <div class="card-body">
                                {!! @$office->contact_info !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

@endsection
