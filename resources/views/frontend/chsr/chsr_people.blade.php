@extends('frontend.chsr.landing')

@php
    $page_title = 'CHSR People';
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
    <section class="container mb-5 mt-4">
        <div class="container profile">
            <div class="row ">
            @foreach ($people as $name)
                    <div class="col-12 col-md-6 col-lg-3 mt-4 ">
                        <div class="bg-success card rounded-0 member-list-card zoom_in_hover" style="cursor: auto;">
                            <img class="mb-0" src="{{ $name->profile->photo ? asset('upload/profiles/' . $name->profile->photo) : $name->profile->photo_path }}"
                                onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';"
                                alt="Image"/>
                            {{-- <div class="scm-social-icon position-absolute">
                                <a href="#"><i class="bi bi-facebook"></i></a>
                                <a href="#"><i class="bi bi-instagram"></i></a>
                                <a href="#"><i class="bi bi-youtube"></i></a>
                                <a href="#"><i class="bi bi-skype"></i></a>
                            </div> --}}
                            <div class="card-body">
                                <a href="{{ route('office.people.details', $name->profile->id) }}">
                                    <h5 class="card-title text-white fs-6 mt-0 text-center">
                                        {{ $name->profile->nameEn }}
                                    </h5>
                                </a>
                                <p class="card-text text-white text-center">
                                    {{ $name->profile->designation }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
