<!-- ===== slider section start ===== -->
@extends('frontend.landing')
@php
    $page_title = $office->name;
@endphp
@section('title')
    {{ $page_title }}
@endsection

@section('content')
    @include('frontend.partials.sections.banner', ['page_title' => $page_title])
    <!-- Profile -->
    <section class="container">
        <div class="container profile">
            <div class="row my-5">
                <div class="col-12">
                    <div class="bg-light p-3 rounded shadow">
                        @if (@$message['short_description'])
                            <a href="{{ route('office.people.details', @$message->profile_id) }}"
                                class="fs-4 fw-bold  pb-3 mb-3 common-font-color">{{ @$message['profile']['nameEn'] }}</a>
                            <h2 class="fs-5 fw-bold text-primary">{{ @$message['profile']['designation'] }}</h2>
                            <div class="text-justify fs-6 mt-3">
                                {!! @$message['short_description'] !!}
                            </div>
                        
                        @else
                            <a href="{{ route('office.people.details', @$office->profile_id) }}"
                                class="fs-3 fw-bold pb-3 mb-3 common-font-color">
                                {{ @$office['profile']['nameEn'] }}
                            </a>
                            <h2 class="fs-5 fw-bold text-primary">{{ @$office['profile']['designation'] }}</h2>
                            <div class="text-justify fs-6 mt-3">
                                {!! @$office['about'] !!}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
