{{-- @extends('frontend.landing') --}}
@extends('frontend.layouts.master-landing')
@php
    $page_title = 'Butex Media';
@endphp
@section('title')
    {{ $page_title }}
@endsection
<style>
    .faculty-aboutt{
        color: #ffffff !important;
    }
    .zoom_in_hover {
        -webkit-transform: scale(1);
        transform: scale(1);
        -webkit-transition: all 200ms linear;
        -moz-transition: all 200ms linear;
        -ms-transition: all 200ms linear;
        -o-transition: all 200ms linear;
        transition: all 200ms linear;

    }

    .zoom_in_hover:hover {
        -webkit-transform: scale(1.05);
        transform: scale(1.05);
        cursor: pointer;
    }
    .text-left a {
        display: -webkit-box;           /* Use flexbox model for clamping */
        -webkit-box-orient: vertical;  /* Set orientation to vertical */
        -webkit-line-clamp: 3;         /* Limit to 3 lines */
        overflow: hidden;               /* Hide overflow */
        text-overflow: ellipsis;        /* Show ellipsis when overflowing */
        color: inherit;                 /* Inherit text color */
        text-decoration: none;          /* Remove underline */
    }

    .text-left a:hover {
        text-decoration: underline;     /* Optional: underline on hover */
    }
    .single-news-content {
        display: flex;
        flex-direction: column
    }
    .single-news-content .btn-theme {
        position: absolute;
        bottom: 30px;
        left: 27%;
    }
</style>

@section('content')
    {{-- @include('frontend.partials.sections.banner', ['page_title' => $page_title]) --}}
    @include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])

    {{-- <h1 class="fs-1 fw-bolder font-poppins text-center text-dark mt-3">{{$page_title}}</h1> --}}

    <section class="my-4">  
        <div class="container overview">
            
            {{-- <div class="row">
                
            </div> --}}
            @include('frontend.preview.components.media')

        </div>
    </section>

@endsection
