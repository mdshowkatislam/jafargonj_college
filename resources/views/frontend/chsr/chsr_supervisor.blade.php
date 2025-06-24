@extends('frontend.chsr.landing')

@php
$page_title = 'List of Supervisor';
@endphp
@section('title')
{{ $page_title }}
@endsection
<style>

</style>
@section('content')

{{-- Banner --}}
@include('frontend.partials.sections.banner_chsr', ['page_title' => $page_title])


<!-- Section -->

<section class="container">
    <div class="row my-5">
        <div class="col-lg-12">
            <h3>Supervisor Content Here ....</h3>
        </div>
    </div>
</section>
@endsection

@section('script')



@endsection