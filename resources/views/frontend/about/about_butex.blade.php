@extends('frontend.layouts.master-landing')
@php
$page_title = 'Jafargonj Mir Abdul Gafur College Short History';
@endphp
@section('title')
{{ $page_title }}
@endsection
@section('content')

{{-- @include('frontend.partials.sections.banner-cover5', ['page_title' => $page_title]) --}}
@include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])


<section>
    <div class="default-padding">
        <div class="container">
            <div class="card" style="border-top:5px solid #00c5bf;">
                <!-- <img style="height: 300px;" class="card-img-top" alt="WellCome image" src="{{ @$welcome_page->about_image_1 ? asset('upload/about/' . @$welcome_page->about_image_1) : @$welcome_page->about_image_1 }}" onerror="this.onerror=null;this.src='{{ asset('dummy/img-2x1.png') }}';" /> -->
                <div class="card-body">
    
                    {!! @$welcome_page->history!!}
                    
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
@push('styles')
<style>

</style>
@endpush

@push('scripts')
<script>

</script>
@endpush