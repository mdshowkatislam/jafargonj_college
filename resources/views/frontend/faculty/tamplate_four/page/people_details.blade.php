<!-- ===== slider section start ===== -->
@php
    $page_title = $profile->profile->nameEn;
    // dd($profile);
    if($profile->faculty_id){
        $faculty = \app\Models\Faculty::find($profile->faculty_id);
    }
@endphp
@extends('frontend.faculty.tamplate_four.partials.main')
@section('title')
    {{ $page_title }}
@endsection

@section('content')
    <!-- ===== Page title section start ===== -->
    {{-- @include('frontend.partials.sections.banner', ['page_title' => $page_title]) --}}
    <!-- ===== Page title section end ===== -->

    <!-- Banner -->

        <div class="clearfix"></div>
        <div class="faculty-profile-banner d-flex justify-content-center align-items-center" style=" background-image: url( {{ @$banner->image ? asset('upload/banner/' . $banner->image) : asset('frontend/assets/img/butex/banner-butex.png') }} ) ">
            <h1 class="text-white font-poppins">{{ $page_title }}</h1>
        </div>
{{-- @include('frontend\partials\sections\banner-cover') --}}
{{--  @include('frontend\partials\sections\banner-no-title')  --}}
 
    @include('frontend.faculty_member.people_details_part')
@endsection
