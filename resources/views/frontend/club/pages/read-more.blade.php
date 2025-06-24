@extends('frontend.club.landing')

@section('title')
    {{ @$club->name }}
@endsection
@push('style-bup')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/style-bup.css') }}">
 <link rel="stylesheet" href="{{ asset('frontend/css/main.min.css') }}">

@endpush

@section('content')
    {{-- @include('frontend.partials.sections.banner', ['page_title' => @$club->name]) --}}
    @include('frontend.partials.sections.banner-with-title', ['page_title' => 'Clubs'])


    <!-- Profile -->
    <section class="container">
        <div class="container profile">
            <div class="row my-5">
                <div class="col-12">
                    <div class="bg-light p-3 rounded shadow">
                        @if (@$club->id)
                            <h2 class="fs-5 fw-bold">{{ @$club->name }}</h2>
                            <div class="text-justify fs-6 mt-3">
                                {!! @$club->description !!}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
