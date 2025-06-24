@extends('frontend/partials/iqac_layout')

@php
    $page_title = @$office->name;
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
    <section class="container">
        <div class="container profile">
            <div class="row my-5">
                <div class="col-12 tem-3-profile-info ">
                    <div class="bg-light p-3 rounded shadow">
                        <h2 class="fs-3 fw-bold border-bottom pb-3 mb-3 common-font-color">Dean's Message</h2>
                        <div class="text-justify fs-6">
                            {!! @$message->long_description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
