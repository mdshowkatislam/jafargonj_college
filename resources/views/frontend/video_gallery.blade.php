@extends('frontend.layouts.master-landing')
@php
    $page_title = 'Video Gallery';
@endphp
@section('title')
    {{ $page_title }}
@endsection
@section('content')

{{-- @include('frontend.partials.sections.banner-cover5', ['page_title' => $page_title]) --}}
@include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])

<style>
  .circle {
    width: 100px; /* Set the width */
    height: 100px; /* Set the height to the same as the width */
    background-color: #00c5bf; /* Change this to your desired color */
    border-radius: 50%; /* This makes the div circular */
    display: flex; /* Optional: centers content */
    justify-content: center; /* Optional: centers content */
    align-items: center; /* Optional: centers content */
    margin: 30px auto;
}

</style>

<section class="my-5">
  <div class="container mt-3 mb-3">
    <div class="row">
    @foreach (@$videos as $item)
      <div class="col-sm-4">  
        <div class="item">
            <iframe width="100%" height="180" src="{{ $item->youtube_link }}" frameborder="0" allowfullscreen></iframe>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>


@endsection



