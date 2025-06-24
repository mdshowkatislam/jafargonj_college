@extends('frontend.chsr.landing')

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
                        <h2 class="fs-3 fw-bold border-bottom pb-3 mb-3 common-font-color">About Centre for Higher Studies & Research (CHSR)</h2>
                        @foreach ($abouts as $item)
                            
                        <div class="text-justify fs-6">
                            {!! @$item->description !!}
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
