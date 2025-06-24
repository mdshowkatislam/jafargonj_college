@extends('frontend.landing')
@php
    $page_title = 'Chancellor';
@endphp
@section('title')
    {{ $page_title }}
@endsection


@section('content')
@include('frontend.partials.sections.banner-cover', ['page_title' => $page_title])

<!-- Start Course Details
    ============================================= -->
    <div class="course-details-area default-padding">
        <div class="container">
            <div class="row">
                <!-- Start Course Info -->
                <div class="col-md-12">

                    <div class="top-author">
                        <div class="author-items"
                            style="border-top: 3px solid #1C4370;box-shadow:0 0 10px rgba(50, 50, 50, .17);">
                            <div class="col-sm-3 col-lg-2">
                                <img src="{{asset('frontend/images/all-vc/HP PP Small.jpeg')}}" alt="Thumb" class="img-thumbnail image-showing">
                            </div>
                            <div class="col-lg-10 col-sm-9">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="margin-top-30px">
                                            <h2 class="font-weight-bold">Mohammed Shahabuddin</h2>
                                            <div class="clearfix"></div>
                                            <h3 class="">Chancellor</h3>
                                            <h4 style="all: revert;color:#002147">
                                                University of BUTEX
                                            </h4>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 vh-100 d-flex justify-content-center align-items-center">
                                    </div>
                                </div>

                            </div>
                            <div class="clearfix"></div>
                            <div class="col-sm-12 text-justify margin-top-30px">
                                <p style="text-align:justify"><strong>Introduction</strong></p>

                                <p style="text-align:justify">Mr. Mohammed Shahabuddin was born on December 10, 1949 in
                                    Jubilee Tank Para of Shibrampur, Pabna city. His father's name is Sharfuddin Ansari,
                                    mother's name is Khairunnessa...</p>

                                <p style="text-align:justify"><a
                                        href="https://bangabhaban.portal.gov.bd/site/biography/98df052f-9432-4c43-acb2-9bc91b9f0e90/জীবনালেখ্য"
                                        target="_blank">For details click here...</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLongTitle" style="text-align: center"> Full Biography of
                        Mohammed Shahabuddin</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe src="../biography/Honorable-Vice_Chancellor_full_Biography.pdf" width="100%"
                        height="500px"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalBiographyEng" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLongTitle" style="text-align: center"> Short Biography of
                        Mohammed Shahabuddin</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe src="../biography/Honorable-Vice_Chancellor_short_Biography.pdf" width="100%"
                        height="500px"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalPVCALong" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalPVCALongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalPVCALongTitle" style="text-align: center"> Full Biography of
                        Mohammed Shahabuddin</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe src="../biography/Full_Biography_Sitesh_Chandra_Bachar.pdf" width="100%"
                        height="500px"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>
    <!-- End content ============================================= -->

@endsection







