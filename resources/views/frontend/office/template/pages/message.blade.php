{{-- @extends('frontend.department.tamplate_four.partials.main') --}}
@extends('frontend.office.template.partials.main')

@php
    $url=request()->route()->getName();
    $page_title = 'About';
@endphp

@section('title')
    {{ $page_title }}
@endsection

@section('content')
    <div class="faculty-profile-banner d-flex justify-content-center align-items-center" style="background-image: url( {{ @$banner->image ? asset('upload/banner/' . $banner->image) : asset('frontend/assets/img/bup/banner.jpg') }} ) ">
        <h1 class="text-white font-poppins">Message From Office Head</h1>
    </div>

    <!-- Hero Title -->
    <main class="container">
        <section>
            <div class="container mt-3">
                <div class="card mb-3" style="max-width: 100%; border-top: 5px solid #29ACBB;">
                    <div class="row g-0">
                        <div class="col-md-3 office_details_messgae p-3">
                            <img class="img-fluid rounded-start" style="width: 200px;"
                                src="{{ @$office->profile->photo ? asset('upload/profiles/' . @$office->profile->photo) : @$office->profile->photo_path }}"
                                onerror="this.onerror=null;this.src='{{ asset('public/dummy/user-dummy.jpeg') }}';" />
                        </div>
                        <div class="col-md-9">
                            <div class="card-body mt-4">
                                <h4 class="card-title">{{@$office->profile->nameEn}}</h4>
                                <p class="card-title">{{@$office->profile->designation}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-3">
                        <p class="card-text">{!! @$message->long_description !!}</p>
                    </div>
                </div>
            </div>
        </section>

    </main>

@endsection
