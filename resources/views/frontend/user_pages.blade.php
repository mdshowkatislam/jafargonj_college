@extends('frontend.layouts.master-landing')
@php
    // $page_title = $page_info->title;
    $page_title = 'জাফরগঞ্জ মীর আব্দুল গফুর কলেজ';
   $file_array= json_decode($page_info['image']);
@endphp
@section('title')
    {{ $page_title }}
@endsection
@section('content')

@include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])

<div class="container mt-3 mb-3">
    {{-- <div class="shadow-sm p-3 mb-3 bg-light rounded program-type">
        <h1 class="fs-4 fw-bold mb-0 text-uppercase" style="color: #00c5bf;">
            {{ $page_info != '' ? $page_info->title : 'No Data Found' }}
        </h1>
    </div>    --}}

    @if (@$page_info->form_layout != 'on')
        @include('frontend.partials.page_body') 
    @else 

        @if (@$page_info->page_layout == '1')

            @include('frontend.partials.page_body') 

            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <div class="shadow p-3">
                        @include('frontend.preview.components.form_template')
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>

        @elseif (@$page_info->page_layout == '2')

            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <div class="shadow p-3">
                        @include('frontend.preview.components.form_template')
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
            @include('frontend.partials.page_body') 

        @elseif (@$page_info->page_layout == '3')

            <div class="row">
                <div class="col-sm-6 p-4">
                    <div class="shadow p-3">
                        @include('frontend.preview.components.form_template')
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="">
                        @include('frontend.partials.page_body') 
                    </div>
                </div>
            </div>
            
            @elseif (@$page_info->page_layout == '4')

            <div class="row">
                <div class="col-sm-6">
                    <div class="">
                        @include('frontend.partials.page_body') 
                    </div>
                </div>
                <div class="col-sm-6 p-4">
                    <div class="shadow p-3">
                        @include('frontend.preview.components.form_template')
                    </div>
                </div>
            </div>

            @elseif (@$page_info->page_layout == '5')

            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <div class="shadow p-3">
                        @include('frontend.preview.components.form_template')
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>

        @endif

    @endif
    
</div>

@endsection
