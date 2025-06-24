@extends('frontend/partials/iqac_layout')

@php
    $page_title = "News & Event"
@endphp
@section('title'){{$page_title}} @endsection
@section('content')
@include('frontend.partials.sections.banner_chsr', ['page_title' => $page_title])
<style>
  .thumbnail p {
  color: #4f4e4e;
}
  .thumbnail a {
  text-decoration: none; 
  color: black; 
}
  .thumbnail a:hover{
  color: green; 
}
  .thumbnail a h2 {
    font-size: 1.313em;
  margin-top: 0.6em;
  margin-bottom: 0.25em;
}
.dates-calendardate {
  font-family: "PT Sans",'Helvetica Neue',Arial,Helvetica,sans-serif;
  background: #002147;
  color: #fff;
  float: left;
  line-height: 1.5; 
  padding: .7em .5em;
  text-align: center;
  text-transform: uppercase;
  width: 3em;
  top: 2px;
  position: absolute;
}
</style>
  

@if (count($activities) > 0)
        <section class="container mb-5">
            <div class="d-flex justify-content-between align-items-end">
                <h1 class="text-uppercase home-content-heading mb-0">
                    Facilities
                </h1>
                {{-- <a href="{{ route('news.all') }}" class="text-uppercase text-decoration-none fw-bold common-font-color">All</a> --}}
            </div>
            <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;">
            </div>
            {{-- <h2 class="fs-3 text-center my-5 fw-bold"><span class="text-primary">Facilities</span></h2> --}}
            @foreach ($activities as $item)
                <div class="row my-5 shadow rounded">
                    <div class="col-lg-4 p-0">
                        <img class="object-cover" src="{{ asset('upload/office_facility/' . $item->image) }}"
                            onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';"
                            height="320px" width="320px" />
                    </div>
                    <div class="col-lg-8 py-3">
                        <h2 class="fs-4 fw-bold mb-2"> {{ $item->title }} </h2>
                        {!! $item->description !!}
                    </div>
                </div>
            @endforeach
        </section>
    @endif


@endsection