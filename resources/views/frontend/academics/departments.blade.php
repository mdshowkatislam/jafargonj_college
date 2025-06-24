@extends('frontend.landing')
@php
    $page_title = 'Departments';
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
            <div class="panel panel-primary">
                <div class="panel-heading"
                    style="background-color: #002147;background-image: linear-gradient(to left, #ffb606, #002147, transparent);">
                    Departments</div>
                <div class="panel-body text-justify">
                    <div class="col-sm-4" style="margin-bottom: 20px;">
                        <input type="text" placeholder="Enter Department Name" name="depatmentName"
                            id="depatmentName" class="form-control">
                    </div>
                    <div class="col-sm-offset-4 col-sm-4" style="margin-bottom: 20px;">
                        <select name="facultyName" id="facultyName" class="form-control">
                            <option value="">Select Faculty</option>
                            <option value="FACARTS">
                                Faculty of Arts</option>
                            <option value="FACSCI">
                                Faculty of Science</option>
                            <option value="FACLAW">
                                Faculty of Law</option>
                            <option value="FACBUSNS">
                                Faculty of Business Studies</option>
                            <option value="FACSOCSCI">
                                Faculty of Social Sciences</option>
                            <option value="FACBIO">
                                Faculty of Biological Sciences</option>
                            <option value="FACPHAR">
                                Faculty of Pharmacy</option>
                            <option value="FACEESC">
                                Faculty of Earth and Environmental Sciences</option>
                            <option value="FACENGG">
                                Faculty of Engineering and Technology</option>
                            <option value="FACFART">
                                Faculty of Fine Art</option>
                            <option value="INST">
                                Institutes</option>
                            <option value="FACED">
                                Faculty of Education</option>
                            <option value="FACMED">
                                Faculty of Medicine</option>
                            <option value="FACPGMR">
                                Faculty of Postgraduate Medical Sciences and Research</option>
                        </select>
                    </div>

                    <div class="clearfix"></div>
                    <div class="top-course-items" id="show_result">
                        <div data-aos="fade-left" class="col-md-4 col-sm-6 equal-height">
                            <div class="item">
                                <div class="thumb">
                                    <img src="" alt="Thumb" style="height: 281px;">

                                </div>
                                <div class="info">
                                    <h4 class="min-height-45px text-left" style="word-spacing: 3px;">
                                        <a href="body/ACC.html">Department of Accounting &amp; Information
                                            Systems</a>
                                    </h4>
                                    <div class="footer-meta">
                                        <a class="btn btn-theme effect btn-block btn-lg btnhome"
                                            href="body/ACC.html">View
                                            Website<i class="fas fa-check-circle fa-2x fa-pull-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-aos="fade-left" class="col-md-4 col-sm-6 equal-height">
                            <div class="item">
                                <div class="thumb">
                                    <img src="" alt="Thumb" style="height: 281px;">

                                </div>
                                <div class="info">
                                    <h4 class="min-height-45px text-left" style="word-spacing: 3px;">
                                        <a href="body/ANT.html">Department of Anthropology</a>
                                    </h4>
                                    <div class="footer-meta">
                                        <a class="btn btn-theme effect btn-block btn-lg btnhome"
                                            href="body/ANT.html">View
                                            Website<i class="fas fa-check-circle fa-2x fa-pull-right"></i></a>
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