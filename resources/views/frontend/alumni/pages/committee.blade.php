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
  
   
<section class="mt-5 club-moderator">
    <div class="container">
        <div class="row mb-5">
            @forelse ($moderators as $index => $item)
                <div class="col-12 col-md-6 col-lg-3 mt-4">
                    <div class="card rounded-0 member-list-card zoom_in_hover" style="background: #00c5bf;">
                        <img class=""
                            src="{{ @$item->profile->photo ? asset('upload/profiles/' . @$item->profile->photo) : @$item->profile->photo_path }}"
                            onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';"
                            {{-- onerror="this.onerror=null;this.src='{{ asset('upload/no_image.jpg') }}';" --}} alt="">
                        <div class="card-body">
                            <h5 class="card-title text-white fs-6 mt-0 text-center">

                                {{ @$item->profile->nameEn }}
                            </h5>
                            <p class="card-text text-white text-center">
                                {{ isset($item->alumni_designation_id) ? $item->designation->name : ' ' }}

                            </p>
                        </div>
                    </div>
                </div>
            @empty
            <section class="container">
                <div class="col-md-12 text-center">
                    <h2 class="fs-5 p-3  mb-0 bg-light rounded">No Information Found</h2>
                </div>
            </section>
            @endforelse
        </div>
    </div>
</section>


 
 

@endsection