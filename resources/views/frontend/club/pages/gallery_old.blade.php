@extends('frontend.club.landing')

@section('title')
{{$page_title}} 
@endsection
@push('style-bup')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/style-bup.css') }}">
 <link rel="stylesheet" href="{{ asset('frontend/css/main.min.css') }}">

@endpush
{{-- <style>
    #gallery {
        -webkit-column-count: 4;
        -moz-column-count: 4;
        column-count: 4;

        -webkit-column-gap: 20px;
        -moz-column-gap: 20px;
        column-gap: 15px;
    }

    @media (max-width:1200px) {
        #gallery {
            -webkit-column-count: 3;
            -moz-column-count: 3;
            column-count: 3;

            -webkit-column-gap: 20px;
            -moz-column-gap: 20px;
            column-gap: 20px;
        }
    }

    @media (max-width:800px) {
        #gallery {
            -webkit-column-count: 2;
            -moz-column-count: 2;
            column-count: 2;

            -webkit-column-gap: 20px;
            -moz-column-gap: 20px;
            column-gap: 20px;
        }
    }

    @media (max-width:600px) {
        #gallery {
            -webkit-column-count: 1;
            -moz-column-count: 1;
            column-count: 1;
        }
    }

    #gallery img,
    #gallery video {
        width: 100%;
        height: auto;
        margin: 4% auto;
        cursor: pointer;
        -webkit-transition: all 0.2s;
        transition: all 0.2s;
    }
</style> --}}
@section('content')

{{-- @include('frontend.partials.sections.banner', ['page_title' => $page_title]) --}}
@include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])
  
   
{{-- <!-- Activities gallery-->
<section class="club-activites">
    <div class="container mt-4">
        <!-- Photo Grid -->
        <div class="row">
            <div id="gallery" class="container-fluid">
                @php
                    $galleries = \App\Models\Gallery::where('gallery_category_id', @$gallery_category->id)->get();
                @endphp
                @foreach ($galleries as $gallery)
                    <img alt="{{ $gallery->title }}"
                        src="{{ asset('upload/gallery_images/' . $gallery->image) }}"
                        onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';"
                        class="img-responsive">
                @endforeach

            </div>
        </div>
    </div>
</section> --}}

<!-- Gallery -->
<section class="my-5">
    <div class="container">
        <h1 class="text-uppercase mb-0 home-content-heading">Album</h1>
        <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;"></div>
        @include('frontend.partials.sections.gallery-album')
    </div>
</section>

@endsection