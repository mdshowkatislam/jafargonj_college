<!-- ===== slider section start ===== -->
@extends('frontend.landing')

@php
$page_title = 'Labs';
@endphp
@section('title')
{{ $page_title }}
@endsection

@section('content')
<!-- Banner -->
@include('frontend.partials.sections.banner', ['page_title' => $page_title])

{{-- <section>
    <div class="campus-banner d-flex justify-content-center align-items-center">
        <h1 class="uppercase text-white font-poppins">Campus Life</h1>
    </div>
</section> --}}
<!-- Card Gallery -->
<section class="container my-5">
    <div class="row gx-5 d-flex justify-content-between">
        @foreach ($labs as $item)
        <div class="col-md-6 col-lg-4 mt-3">
            <a href="{{ route('lab.details',@$item->id ) }}">
                <div class="campus-life-gallery">
                    <div id="campus-img-div">
                        <img src="{{ asset('upload/lab/' . $item->image) }}" class="" alt="item"
                            onerror="this.onerror=null;this.src='{{ asset('upload/no-image.png') }}';" />
                    </div>
                </div>
            </a>
            <div class="mt-3">
                <a href="{{ route('lab.details',@$item->id ) }}" class="fs-5 text-dark fw-bold">{{ @$item->title }}</a>
            </div>
        </div>

        @endforeach
    </div>
</section>
@endsection