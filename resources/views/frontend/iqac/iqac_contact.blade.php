@extends('frontend/partials/iqac_layout')

@php
    $page_title = 'Contact';
@endphp
@section('title')
    {{ $page_title }}
@endsection
@section('content')
    @include('frontend.partials.sections.banner_chsr', ['page_title' => $page_title])

    <!-- Contact -->
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-end  chsr-research-title">
            <h1 class="text-uppercase  mb-0 home-content-heading">
                Find us on map
            </h1>
        </div>
        <div class="position-relative w-100 common-bg-color mt-1 " style="height: 4px;"></div>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    {{-- <div class="col-md-4 container">
                            <div class=" ">
                                <div class="">
                                    <div
                                        class="overlay_bg_danger_90 icon_box text_white radius_all_10 background_bg animation animated fadeInUp">
                                        <div class="intro_desc">
                                            <b style="font-size: 20px;">Contact Form</b>
                                            <div class="col-md-12 animation animated fadeInLeft" data-animation="fadeInLeft"
                                                data-animation-delay="0.02s"
                                                style="animation-delay: 0.02s; opacity: 1;margin-top: 10px;">
                                                <div class="padding_eight_all">
                                                    <div class="field_form">
                                                        <form method="post" action="">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="form-group col-12">
                                                                    <input name="name" required="required"
                                                                        placeholder="Full Name *" id="first-name"
                                                                        class="form-control" name="name" type="text">
                                                                </div><br><br><br>
                                                                <div class="form-group col-12">
                                                                    <input name="email" required="required"
                                                                        placeholder="Email *" id="email"
                                                                        class="form-control" name="email" type="email">
                                                                </div><br><br><br>
                                                                <div class="form-group col-12">
                                                                    <input name="phone" required="" placeholder="Phone"
                                                                        id="phone" class="form-control" name="phone"
                                                                        type="tel">
                                                                </div><br><br><br>
                                                                <div class="form-group col-12">
                                                                    <input name="subject" placeholder="Subject *"
                                                                        id="subject" class="form-control" name="subject"
                                                                        type="text">
                                                                </div><br><br><br>
                                                                <div class="form-group col-lg-12">
                                                                    <textarea name="message" required="required" placeholder="Message *" id="description" class="form-control"
                                                                        name="message" rows="3"></textarea>
                                                                </div><br><br><br><br><br>
                                                                <div class="col-lg-12">
                                                                    <button class="btn btn-success" type="submit"
                                                                        value="Submit">Submit</button>
                                                                </div><br><br><br>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    <div class="col-md-12 mt-3 animation animated fadeInRight" data-animation="fadeInRight" data-animation-delay="0.4s" style="animation-delay: 0.4s; opacity: 1;">
                        <div class="contact_map map_radius_rtrb overflow-hidden h-100">
                            <iframe src="https://maps.google.com/maps?q=23.839626528920533,90.35765790749666&hl=en&z=14&amp;output=embed" width="100%" height="500" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <section class="py-5" style="background: #57a8dc33;">
        <div class="container">
            <div class="d-flex justify-content-between align-items-end">
                <h1 class="text-uppercase home-content-heading mb-0">
                    Contact With Us
                </h1>
            </div>
            <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;"></div>
            <div class="row mt-4">
                <div class="col-lg-4">
                    <div class="p-3 rounded shadow" style="background: #fff;">
                        <div class="contact-icon d-flex align-items-center justify-content-center">
                            <i class="bi bi-envelope fs-2 text-white d-flex justify-content-center align-items-center" style="background: #253b80;"></i>
                        </div>
                        <div class="mt-3">
                            <ul class="list-group list-group-flush  align-items-center">
                                <li class="list-group-item">{{ @$office->email }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="p-3 rounded shadow" style="background: #fff;">
                        <div class="contact-icon d-flex align-items-center justify-content-center">
                            <i class="bi bi-telephone fs-2 text-white d-flex justify-content-center align-items-center" style="background: #253b80;"></i>
                        </div>
                        <div class="mt-3">
                            <ul class="list-group list-group-flush  align-items-center">
                                <li class="list-group-item"> {{ @$office->contact }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="p-3 rounded shadow" style="background: #fff;">
                        <div class="contact-icon d-flex align-items-center justify-content-center">
                            <i class="bi bi-geo-alt  fs-2 text-white d-flex justify-content-center align-items-center" style="background: #253b80;"></i>
                        </div>
                        <div class="mt-3">
                            <ul class="list-group list-group-flush  align-items-center">
                                <li class="list-group-item">{{ @$office->location }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
