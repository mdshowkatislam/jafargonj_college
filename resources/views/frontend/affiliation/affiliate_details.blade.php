<!-- ===== slider section start ===== -->
{{-- @extends('frontend.landing') --}}
{{-- @extends('frontend.second-landing') --}}
@extends('frontend.layouts.master-landing')

@php
$page_title = 'Affiliate Institute';
@endphp
@section('title')
{{ $page_title }}
@endsection

@section('content')
{{-- <style>
    .card-background {
        border: none;
        background-color: #f1f1f1;
        border-radius: 0;
    }
</style> --}}
{{-- @include('frontend.partials.sections.banner', ['page_title' => $page_title]) --}}
@include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])
<!-- Banner -->
<section>
    {{-- @dd($info) --}}
    <div class="academic-details my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-background">
                        <div class="card-body" style="min-height: 375px">
                            <div class="text-center">
                                <img class=""
                                    src="{{ asset('upload/affiliation/'. @$info->image ) }}"
                                    onerror="this.onerror=null;this.src='{{ asset('upload/no-image.png') }}';""
                                    style="width: 100%" />
                            </div>
                            <div class="pt-3">
                                <h1 class="fs-4 fw-bold" style="color: #00c5bf;">{{ $info->inst_name }}</h1>
                                <h1 class="fs-6">Type: {{ $info->institution_type }}</h1>
                                <h1 class="fs-6">Location: {{ $info->location }}</h1>
                                <h1 class="fs-6">URL: <a href="{{ $info->url }}" target="_blank"><span style="font-weight: 600;">{{ $info->url }}</span></a></h1>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card card-background">
                        <div class="card-body">
                            <div class="tab-content">
                                <div id="outline" class="tabcontent active">
                                    <p>{!! $info->inst_description !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
