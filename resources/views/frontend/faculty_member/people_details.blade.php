<!-- ===== slider section start ===== -->
{{-- @extends('frontend.landing-new') --}}
{{-- @extends('frontend.faculty.tamplate_four.partials.main') --}}
@extends('frontend.layouts.master-landing')
@php
    $page_title = $profile->profile->nameEn;
    if($profile->faculty_id){
        $faculty = \app\Models\Faculty::find($profile->faculty_id);
    }
@endphp
@section('title')
    {{ $page_title }}
@endsection
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.2/font/bootstrap-icons.min.css" />
@section('content')
    <!-- ===== Page title section start ===== -->
    {{-- @include('frontend.partials.sections.banner', ['page_title' => $page_title]) --}}
    <!-- ===== Page title section end ===== -->

    <!-- Banner -->

        <div class="clearfix"></div>
@include('frontend.partials.sections.banner-with-title')
{{--  @include('frontend\partials\sections\banner-no-title')  --}}
 
    @include('frontend.faculty_member.people_details_part')
    
@endsection
