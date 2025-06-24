@extends('frontend.landing')
@php
    $page_title = 'Offices Of Deans';
@endphp
@section('title')
    {{ $page_title }}
@endsection


@section('content')
@include('frontend.partials.sections.banner-cover', ['page_title' => $page_title])

<style></style>

<div class="course-details-area default-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="courses-info">
                    <div class="tab-info">
                        <div class="tab-content tab-content-info">
                            <div id="tab1" class="tab-pane fade active in">
                                <div class="info title">

                                    <div class="col-sm-12">
                                        <div class="col-sm-4" style="margin-bottom: 20px;">
                                            <input type="text" placeholder="Enter Faculty Name"
                                                name="faculty_search" id="faculty_search" class="form-control">
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="top-course-items" id="faculty_search_result">
                                            <div data-aos="fade-left" class="col-md-4 col-sm-6 equal-height">
                                                <div class="item">
                                                    <div class="thumb">
                                                        <img src="../ssl.du.ac.bd/fontView/images/body/16127684091610020740DU-aparajeo-bangla-Mahmud-Hossain-Opu_edited.jpg"
                                                            alt="Thumb" style="height: 281px;">

                                                    </div>
                                                    <div class="info">
                                                        <h4 class="min-height-45px text-left"
                                                            style="word-spacing: 3px;">
                                                            <a href="faculty/FACARTS.html">Faculty of Arts</a>
                                                        </h4>
                                                        <div class="footer-meta">
                                                            <a class="btn btn-theme effect btn-block btn-lg btnhome"
                                                                href="faculty/FACARTS.html">View Website...<i
                                                                    class="fas fa-check-circle fa-2x fa-pull-right"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div data-aos="fade-left" class="col-md-4 col-sm-6 equal-height">
                                                <div class="item">
                                                    <div class="thumb">
                                                        <img src="../ssl.du.ac.bd/fontView/images/body/1630900921ScienceFaculty.jpg"
                                                            alt="Thumb" style="height: 281px;">

                                                    </div>
                                                    <div class="info">
                                                        <h4 class="min-height-45px text-left"
                                                            style="word-spacing: 3px;">
                                                            <a href="faculty/FACSCI.html">Faculty of Science</a>
                                                        </h4>
                                                        <div class="footer-meta">
                                                            <a class="btn btn-theme effect btn-block btn-lg btnhome"
                                                                href="faculty/FACSCI.html">View Website...<i
                                                                    class="fas fa-check-circle fa-2x fa-pull-right"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div data-aos="fade-left" class="col-md-4 col-sm-6 equal-height">
                                                <div class="item">
                                                    <div class="thumb">
                                                        <img src="../ssl.du.ac.bd/fontView/images/body/16127685661610598004faclaw.jpg"
                                                            alt="Thumb" style="height: 281px;">

                                                    </div>
                                                    <div class="info">
                                                        <h4 class="min-height-45px text-left"
                                                            style="word-spacing: 3px;">
                                                            <a href="faculty/FACLAW.html">Faculty of Law</a>
                                                        </h4>
                                                        <div class="footer-meta">
                                                            <a class="btn btn-theme effect btn-block btn-lg btnhome"
                                                                href="faculty/FACLAW.html">View Website...<i
                                                                    class="fas fa-check-circle fa-2x fa-pull-right"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
       
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    

@endsection