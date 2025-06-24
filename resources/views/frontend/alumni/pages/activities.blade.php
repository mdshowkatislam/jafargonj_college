@extends('frontend.alumni.landing')

@section('title')
{{$page_title}} 
@endsection
@push('style-bup')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/style-bup.css') }}">
 <link rel="stylesheet" href="{{ asset('frontend/css/main.min.css') }}">

@endpush

@section('content')

{{-- @include('frontend.partials.sections.banner', ['page_title' => $page_title]) --}}
@include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])
  
   
<section class="my-5">
    <div class="container">
        @include('frontend.partials.sections.alumni_activities')
    </div>
</section>


 
 

@endsection