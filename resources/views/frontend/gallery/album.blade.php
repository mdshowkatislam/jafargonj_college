@extends('frontend.layouts.master-landing')
@php
    $page_title = $title;
@endphp
@section('title')
    {{ $page_title }}
@endsection

@section('content')


@include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])

    <!-- Gallery Album -->
    <section class="my-5">
        <div class="container">
            <h1 class="text-uppercasemb-0 home-content-heading">Album</h1>
            <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;"></div>
            @if (count($galleryCategory) > 0)
                @include('frontend.partials.sections.gallery-album')
            @else
                <h2 class="fs-5 p-3 mt-3  mb-0 bg-light rounded">No album found !</h2>
            @endif
        </div>
    </section>

@endsection


@push('styles')
   <style>
    /*! CSS Used from: /css/app.css */
    *,
    :after,
    :before {
        box-sizing: border-box;
    }

    a {
        color: #1d7099;
        text-decoration: none;
        background-color: transparent;
    }

    a:hover {
        color: #1d7099;
        text-decoration: underline;
    }

    @media print {

        *,
        :after,
        :before {
            text-shadow: none !important;
            box-shadow: none !important;
        }

        a:not(.btn) {
            text-decoration: underline;
        }
    }

    /*! CSS Used from: /css/styles1.css */
    marquee a {
        color: #fff !important;
        font-size: 13px;
        font-weight: 600;
    }

    /*! CSS Used from: /css/styles1_responsive.css */
    @media screen and (max-width:1023px) {
        a {
            font-size: 13px;
        }

        marquee {
            margin-top: 6px;
        }
    }

    a {
        background-color: transparent;
        -webkit-text-decoration-skip: objects;
    }

    a:active,
    a:hover {
        outline-width: 0;
    }

    .whats_new_icon {
        width: 999;
        background: #8AC53C;
        color: black;
        position: absolute;
        margin-top: -36.5px;
        z-index: 99;
        font-size: 13px;
        font-weight: 700;
        padding: 5.7px;
    }



    @media only screen and (max-width: 1026px) {
        .whats_new_icon {
            margin-top: -35.5px !important;
        }
    }

    .owl-carousel: {
        height: auto;
    }

    .owl-theme .owl-nav {
        margin-top: 0px !important;
    }

    .researchCarousel .owl-item {
        height: 34.5rem !important;
    }

    @media only screen and (max-width: 768px) {
        #marquee .whats_new_icon .update_text_news {
            display: none;
            width: 700;
        }
    }

    @media only screen and (min-width: 1399px) {
        #about-section {
            padding-bottom: 4rem;
        }
    }
    </style>
@endpush

@push('scripts')
    <script>
      
    </script>
@endpush

