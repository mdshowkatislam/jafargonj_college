@extends('frontend.chsr.landing')

@php
    $page_title = 'Downloads';
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
                @if (count($chsr_forms)>0)
                @foreach ($chsr_forms as $form)
                <div class="col-lg-12">
                    <div class="p-3 mb-3 border-bottom d-flex justify-content-between align-items-center">
                        <h2 class="fs-5 m-0 fw-bold common-font-color chsr-download-text"><span class="me-2">{{ $loop->iteration}}. </span> {{ $form->title }} </h2>
                        <a href="{{ asset('storage/app/media/training/'.$form->document) }}"  class="text-decoration-none btn shadow about-btn text-white px-3 py-2 fs-7 chsr-download-btn" type="button" download ><i class="fa fa-download me-1"></i> Download</a>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </section>
@endsection
