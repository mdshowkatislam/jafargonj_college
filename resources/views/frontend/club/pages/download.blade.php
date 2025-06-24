@extends('frontend.club.landing')

@section('title')
    {{ $page_title }}
@endsection
@push('style-bup')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/style-bup.css') }}">
 <link rel="stylesheet" href="{{ asset('frontend/css/main.min.css') }}">

@endpush
@section('content')
    {{-- @include('frontend.partials.sections.banner', ['page_title' => $page_title]) --}}
    @include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])

    <!-- Download -->
    <section>
        <div class="container my-5">
            <div class="col-md">
                <div class="d-flex justify-content-between align-items-end">
                </div>
                <div class=" position-relative" style="width: 100%; background-color: #00c5bf; height: 1px;">
                    <div class="position-absolute"
                        style="width: 40%; background-color: #00c5bf; height: 8px; margin-top: -4px;">
                    </div>
                </div>
                <div class="shadow-lg p-3 mb-5 bg-light">
                    @forelse ($documents as $n)
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
                    @empty
                    <section class="container">
                        <div class="col-md-12 text-center">
                            <h2 class="fs-5 p-3  mb-0 bg-light rounded">No Information Found</h2>
                        </div>
                    </section>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
@endsection
