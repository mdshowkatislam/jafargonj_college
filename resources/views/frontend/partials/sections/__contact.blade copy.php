@extends('frontend.layouts.master-landing')
@php
    $page_title = 'Butex Contact';
@endphp
@section('title')
    {{ $page_title }}
@endsection
@section('content')
@include('frontend.partials.sections.banner-cover5', ['page_title' => $page_title])
   

<section class="my-5">
    <div class="container overview">
        <div class="d-flex justify-content-between align-items-end">
            <h1 class="text-uppercase home-content-heading mb-0">
                Find us on map
            </h1>
        </div>
        <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;">
        </div>
        <div class="row mt-4">
            <div class="col-md-12 animate__animated animate__fadeInRight" style="animation-delay: 0.4s; opacity: 1;">
                <div class="rounded shadow-sm overflow-hidden h-100">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7303.277238273859!2d90.400586!3d23.760263!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b89db1b5de0f%3A0xe0e333356e676ede!2sBangladesh%20University%20of%20Textiles!5e0!3m2!1sen!2sbd!4v1717647046931!5m2!1sen!2sbd" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="py-5" style="background: #57a8dc33;">
    <div class="container overview">
        <div class="d-flex justify-content-between align-items-end">
            <h1 class="text-uppercase home-content-heading mb-0">
                Contact With Us
            </h1>
        </div>
        <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;">
        </div>
        <div class="row mt-4">
            <div class="col-lg-4">
                <div class="p-3 rounded shadow" style="background: #fff; height:205px;">
                    <div class="contact-icon d-flex align-items-center justify-content-center">
                    <img alt="location_icon" src="{{asset('frontend/images/icons/mail.png')}}">
                    </div>
                    <div class="mt-3">
                        <ul class="list-group list-group-flush align-items-center">
                            <li class="list-group-item">Email: {{ @$contact_infos['email'] }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="p-3 rounded shadow" style="background: #fff; height:205px;">
                    <div class="contact-icon d-flex align-items-center justify-content-center">
                    <img alt="location_icon" src="{{asset('frontend/images/icons/call_icon.png')}}">
                    </div>
                    <div class="mt-3">
                        <ul class="list-group list-group-flush align-items-center">
                            <li class="list-group-item">Phone: {{ @$contact_infos['phone'] }}</li>
                            <li class="list-group-item">Fax: {{ @$contact_infos['fax'] }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="p-3 rounded" style="background: #fff; height:205px;">
                    <div class="contact-icon d-flex align-items-center justify-content-center">
                        <img alt="location_icon" src="{{asset('frontend/images/icons/location_icon.png')}}">
                    </div>
                    <div class="mt-3">
                        <ul class="list-group list-group-flush align-items-center">
                            <li class="list-group-item">{{ @$contact_infos['location'] }}</li>
                        </ul>
                    </div>
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
