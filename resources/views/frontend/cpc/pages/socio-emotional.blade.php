@php
    $page_title = 'Socio-emotional Counselling';
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

    <section class="mt-5">
        @foreach ($infos as $item)
            <div class="container overview">
                <div class="d-flex justify-content-between align-items-end">
                    <h1 class="text-uppercase home-content-heading mb-0">
                        {{ $item->title }}
                    </h1>
                </div>
                <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;">
                </div>
                <div class="row mb-5">
                    <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                        <div class="bg-light p-3 rounded shadow-sm  about-message-content d-flex">
                            <div>
                                {{-- <h2 class="fs-5 fw-bold border-bottom pb-3 mb-3 common-font-color">{{ $item->title }}</h2> --}}
                                <div class="text-justify fs-6">
                                    {!! @$item->description !!}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </section>

    @if (count($faqs) > 0)
        <section class="my-5 cpc-faq">
            <div class="container">
                <div class="d-flex justify-content-between align-items-end">
                    <h1 class="text-uppercase mb-0 home-content-heading">FAQ</h1>
                </div>
                <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;">
                </div>

            </div>
            @include('frontend.partials.sections.faq')
        </section>
    @endif
@endsection
