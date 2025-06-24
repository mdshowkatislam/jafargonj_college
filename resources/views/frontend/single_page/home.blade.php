@extends('frontend.layouts.master-landing')

@php
    $page_title = $custom_data->component_title;
@endphp

@section('title')
    {{ $page_title }}
@endsection

@section('content')

<style>
    .banner-cover-bg {
            @if($custom_data->files)
                background-image: url("{{ asset('upload/themes/'. @$custom_data->files) }}");
            @else
            background: rgb(2, 0, 36);
            @endif
          
            background-repeat: no-repeat;
            background-size: cover;
            height: 350px;
            display: flex;
            align-items: center; /* Centers vertically */
            justify-content: center; /* Centers horizontally */
            position: relative;
            /* margin-top: 20px; */
        }

</style>

@include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])


<div class="container p-3">
    <div class="card">
        <div class="card-body shadow-sm">
            {!! $custom_data->long_details_descriptions !!}
        </div>
    </div>
</div>

@endsection