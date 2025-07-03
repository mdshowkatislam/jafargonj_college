@extends('frontend.landing')
@php
    // $page_title = $page_info->title;
    $page_title = 'জাফরগঞ্জ মীর আব্দুল গফুর কলেজ';
@endphp
@section('title')
    {{ $page_title }}
@endsection

@section('content')
    @include('frontend.partials.sections.banner', ['page_title' => $page_title])

    @include('frontend.partials.page_body') 
 
@endsection
