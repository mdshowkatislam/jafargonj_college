
@extends('frontend.faculty.tamplate_two.partials.main')


@php
    $page_title = "Dean's Honour Board"
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

    <section>
        @if(count($members)>0)
        <div class="container">
            <div class="row justify-content-center">
                @foreach ($members as $member)
                    <div class="col-12 col-md-6 col-lg-6 my-5">
                        <div class="card bg-light border-0">
                            <div class="row">
                                <div class="col-md-5">
                                    <img class="object-cover dean-honor-board-img"
                                    onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';"
                                    src="{{ asset('upload/dean_honor_board/' . $member->image) }}" alt=""/>
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <p class="card-text text-success fw-bold fs-6">
                                            {{ date('d M Y', strtotime($member->start_date)) }} - {{ $member->end_date ? date('d M Y', strtotime($member->end_date)) : 'Present'}}
                                        </p>
                                        <h5 class="card-title fs-6 mt-3">
                                            {{ $member->name }}
                                        </h5>
                                            
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif
    </section>
    {{-- <section>
        <div class="container">
            <div class="row justify-content-center">
                @foreach ($members as $member)
                    <div class="col-12 col-md-6 col-lg-3 my-5">
                        <div class="bg-success card rounded-0 border-0" style="height: 400px;">
                            <img class="card-img-top rounded-0 border-0 object-cover"
                                onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';"
                                src="{{ asset('upload/dean_honor_board/' . $member->image) }}" alt=""
                                height="300px" />
                            <div class="card-body">
                                    <h5 class="card-title text-white fs-6 mt-0 text-center">
                                        {{ $member->name }}
                                    </h5>
                                    <p class="card-text text-white text-center mb-0 fs-7">
                                        {{ date('d M Y', strtotime($member->start_date)) }} - {{ $member->end_date ? date('d M Y', strtotime($member->end_date)) : 'Present'}}
                                    </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section> --}}
    
@endsection
