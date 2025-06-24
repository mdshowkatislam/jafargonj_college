@php
    $page_title = 'Gallery';
@endphp
@section('title')
    {{ $page_title }}
@endsection

@extends('frontend.conference.main')

@section('content')

@include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])

<div class="container mt-3 mb-3">

    @include('frontend.conference.album')
    
</div>

<div class="modal fade" id="imageModalX" tabindex="-1" aria-labelledby="imageModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel2">Image Preview</h5>
                <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button> 
            </div>
            <div class="modal-body text-center">
                <img id="modalImage" src="" alt="Selected Image" style="width: 100%;">
            </div>
        </div>
    </div>
</div>


@endsection