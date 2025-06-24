
@extends('frontend.faculty.tamplate_three.partials.main')

@php
    $page_title = "Department"
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
    {{-- <section class="" style="min-height: 350px">
    </section> --}}
    <section style="background: #FFEDC942;">
        <div class="container">
            <div class="row justify-content-center">
                @foreach ($departments as $department)
                    <div class="col-12 col-md-6 col-lg-4 mt-3 mb-5">
                        <div class="card shadow-lg bg-light rounded-3 border-0" id="fac-dept-section-card">
                            <h2 class="px-3 pt-5 text-uppercase text-center">
                                {{ $department->name }}
                            </h2>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('department_home', $department->id) }}" type="button" class="btn btn-outline-secondary d-flex align-items-center justify-content-center learn-more-dept">Learn more</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </section>
    
@endsection
