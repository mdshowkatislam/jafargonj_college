@php
    $page_title = $office->name;
@endphp
@section('title')
    {{ $page_title }}
@endsection
<style>
    .faculty-profile-banner {
        background-image: linear-gradient(rgba(13, 202, 76, 0.75),
                rgba(1, 39, 11, 0.75)),
            url({{ @$banner->image ? asset('upload/banner/' . $banner->image) : '' }});
    }
</style>
@extends('frontend.cpc.partials.main')

@section('content')
    <div class="faculty-profile-banner d-flex justify-content-center align-items-center">
        <h1 class="text-white text-center">{{ $page_title }}</h1>
    </div>
    <!-- Profile -->
    <section class="container">
        <div class="container profile">
            <div class="row my-5">
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="text-center bg-light shadow rounded" style="height: 550px">
                        <div class="img p-4" style="height:400px ">
                            <img class="rounded w-100 h-100"
                                src="{{ @$message->profile->photo ? asset('upload/profiles/' . @$message->profile->photo) : @$message->profile->photo_path }}"
                                onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';" />

                        </div>
                        <div class="text-center px-3 pb-3 bg-light rounded" style="height: 150px">
                            <div class="border-top pt-3">
                                <a href="#"
                                    class="text-dark fw-bold fs-5 mb-0 lh-sm faculty-title">{{ @$message->profile->nameEn }}</a>
                                <p class="fw-bold common-font-color fs-6 mb-1 pt-2">
                                    {{ @$message->profile->designation }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="bg-light p-3 rounded shadow">
                        @if (@$message['short_description'])
                            <a href="{{ route('office.people.details', @$message->profile_id) }}"
                                class="fs-4 fw-bold  pb-3 mb-3 common-font-color">{{ @$message['profile']['nameEn'] }}</a>
                            <h2 class="fs-5 fw-bold text-primary">{{ @$message['profile']['designation'] }}</h2>
                            <div class="text-justify fs-6 mt-3">
                                {!! @$message['short_description'] !!}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
