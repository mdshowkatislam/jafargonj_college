
@extends('frontend.landing')
@php
    $page_title = 'Procurement';
@endphp
@section('title')
    {{ $page_title }}
@endsection
@section('content')
@include('frontend.partials.sections.banner', ['page_title' => $page_title])

<main class="container mb-5">
<div class="row">
        @foreach ($procurementSingle as $item)
          <div class="col-lg-8 mt-4">
          <h2 class="fs-4 text-primary fw-bold">{{$item->title}}</h1>
          <h6 class="text-secondary fw-bold"><i class="fas fa-calendar-alt"></i> {{$item->start_date}}</h6>
          <p>{!! $item->long_desc !!}</p>

          <a href="{{ asset('storage/app/media/procurement/'. @$item->file) }}"
            class="btn about-btn px-3 py-1 text-white shadow font-work-sans"
            target="_blank" type="button">Download</a>
      </div>
      @endforeach
</main>
@endsection
