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
        <div class="row my-5">
            @forelse ($teams as $item)

                <div class="col-12 col-md-6 col-lg-3 mb-5">
                    <div class="shadow-lg card rounded-0 border-0 d-block text-center pt-3 faculty_member">
                        <div class="border-one"></div>
                        <div class="border-two"></div>
                        <img class="mx-2 mt-2 shadow-lg image-circle"
                            src="{{ asset('upload/alumni/member/image/' . @$item->member->image) }}" height="200"
                            width="200"
                            onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';"
                            alt="" />
                        <div class="card-body bg-light shadow-lg" style="min-height: 7.75rem">
                            <div class="faculty-member-title d-flex justify-content-center">
                                <h5 class="card-title fs-5 text-center text-captilize">
                                    {{ @$item->member->name }}
                                </h5>
                            </div>
                            <p class="text-center fs-6 common-font-color">
                                {{ @$item->designation->name }}
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