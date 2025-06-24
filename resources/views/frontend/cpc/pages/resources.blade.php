@php
    $page_title = 'Resources';
@endphp
@section('title')
    {{ $page_title }}
@endsection
<style>
   .faculty-profile-banner {
        background-image: linear-gradient(rgba(13, 202, 76, 0.75),
                rgba(1, 39, 11, 0.75)),
            url({{ @$banner->image ? asset('upload/banner/' . $banner->image) : '' }});
    }
</style>
@extends('frontend.cpc.partials.main')

@section('content')
    <div class="faculty-profile-banner d-flex justify-content-center align-items-center">
        <h1 class="text-white text-center">{{ $page_title }}</h1>
    </div>
    <!-- Resource -->
    <section class="my-5">
        <div class="container">
            <div class="col-md">
                <div class="d-flex justify-content-between align-items-end">
                </div>
                <div class=" position-relative" style="width: 100%; background-color: #10C45C; height: 1px;">
                    <div class="position-absolute"
                        style="width: 40%; background-color: #10C45C; height: 8px; margin-top: -4px;">
                    </div>
                </div>
                <div class="shadow-lg p-3 mb-5 bg-light">
                    @foreach ($documents as $n)
                        <div class="d-flex latest_newsevents justify-content-start align-items-center mt-3">
                            {{-- <div class="col-lg-4">
                                <img class="" src="{{ asset('storage/app/media/trainingimage/' . $n['image']) }}"
                                    onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';"
                                    style="width: 70px; height: 70px" />
                            </div> --}}
                            <div class="col-lg-10">
                                <h1 class="fs-5">{{ @$n->title }}</h1>
                            </div>
                            <div class="col-lg-2">
                                <h1 class="fs-5">
                                    <a target="_blank" class="btn btn-sm btn-info download_link"
                                        href="{{ asset('storage/app/media/training/' . @$n->document) }}"> <i
                                            class="bi bi-eye"></i> View</a>
                                    <a target="_blank" class="btn btn-sm btn-primary download_link"
                                        href="{{ asset('storage/app/media/training/' . @$n->document) }}"
                                        download=""> <i class="bi bi-download"></i> Download</a>
                                </h1>
                            </div>
                        </div>
                        @if (!$loop->last)
                            <hr>
                        @endif
                    @endforeach

                </div>

            </div>
        </div>
    </section>

@endsection
