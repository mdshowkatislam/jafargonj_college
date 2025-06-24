@extends('frontend.alumni.landing')

@section('title')
{{$page_title}} 
@endsection

@section('content')

@include('frontend.partials.sections.banner', ['page_title' => $page_title])
  
    <div class="container" style="min-height:350px;"> 
        <p style="text-align:justify">{!! $alumni->mission !!}</p>
    </div>

@endsection