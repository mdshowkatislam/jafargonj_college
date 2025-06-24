@extends('frontend.landing')
@php
    $page_title = 'Libraries';
@endphp
@section('title')
    {{ $page_title }}
@endsection


@section('content')
@include('frontend.partials.sections.banner-cover', ['page_title' => $page_title])

<div class="course-details-area default-padding">
    <div class="container">
        <div class="row">
            <!-- Start Course Info -->
            <div class="col-md-9">
                <div class="event-items">
                    <div class="item col-sm-11">
                        <div style="border: 1px solid #eee;padding: 15px">
                            <div class="col-md-5 thumb">
                                <img src="fontView/assets/img/central_library.jpg">
                            </div>
                            <div class="col-md-7 info">
                                <div class="info-box">
                                    <div class="content">
                                        <h3> <a href="http://www.library.du.ac.bd/" target="_blank">Central
                                                Library</a></h3>
                                        <p class="text-justify">
                                            Central Library : Library is an integral part of a university. Beginning
                                            with a collection of eighteen thousand books received from Dhaka College
                                            and the Law College, the Library now has over 600,000 books and
                                            periodicals. Dhaka University Library started as a part of the Dhaka
                                            University on the 1st of July, 1921.
                                        </p>
                                        <div class="bottom">
                                            <a href="http://www.library.du.ac.bd/" target="_blank"
                                                class="btn circle btn-dark border btn-sm text-center">
                                                <i class="fas fa-chart-bar"></i> Website
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="item col-sm-11" style="margin-top:30px">
                        <div style="border: 1px solid #eee;padding: 15px">
                            <div class="col-md-5 thumb">
                                <img src="fontView/assets/img/science_libray.jpg">
                            </div>
                            <div class="col-md-7 info">
                                <div class="info-box">
                                    <div class="content">
                                        <h3> <a
                                                href="http://localhost/web/du_post_details/Upcoming-Event-Arabic-Dept/34">Science
                                                Library</a></h3>
                                        <p class="text-justify">
                                            Content is being updated
                                        </p>
                                        <!--
                                        <div class="bottom">
                                            <a href="http://localhost/web/du_post_details/Upcoming-Event-Arabic-Dept/34" class="btn circle btn-dark border btn-sm text-center">
                                                <i class="fas fa-chart-bar"></i> Website
                                            </a>
                                        </div>
                                        -->
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="item col-sm-11" style="margin-top:30px">
                        <div style="border: 1px solid #eee;padding: 15px">
                            <div class="col-md-5 thumb">
                                <img src="fontView/assets/img/e-library.jpg">
                            </div>
                            <div class="col-md-7 info">
                                <div class="info-box">
                                    <div class="content">
                                        <h3> <a href="https://www.fbs-du.com/elibrary/"
                                                target="_blank">E-Library</a></h3>
                                        <p class="text-justify">
                                            The world is transforming itself into an increasing
                                            modern,electronically connected place,Kepping up strongly with the pace
                                            of this revolution,FBS of DU has introducing a new e-library with
                                            state-of-the-art facilities and extensive resources.
                                        </p>
                                        <div class="bottom">
                                            <a href="https://www.fbs-du.com/elibrary/" target="_blank"
                                                class="btn circle btn-dark border btn-sm text-center">
                                                <i class="fas fa-chart-bar"></i> Website
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>




                </div>
            </div>
            <!-- End Course Info -->

            <!-- Start Course Sidebar -->
            <div class="col-md-3">
                <div class="aside">
                    <div class="sidebar-item category">
                        <div class="title">
                            <h4>FACULTY / DEPT./ INSTITUTE</h4>
                        </div>
                        <ul>
                            <li><a href="officesOfDeans.html">Offices of Deans</a></li>
                            <li><a href="departments.html">Departments</a></li>
                            <li><a href="institutes.html">Institutes</a></li>
                            <li><a href="colleges/Constituent.html">Constituent Colleges</a></li>
                            <li><a href="colleges/Affiliated.html">Affiliated Colleges</a></li>
                        </ul>
                    </div>
                    <div class="sidebar-item category">
                        <div class="title">
                            <h4>Admission</h4>
                        </div>
                        <ul>
                            <li><a href="http://admission.eis.du.ac.bd/" target="_blank">Undergraduate Programs</a>
                            </li>
                            <li><a href="graduatePrograms.html">Graduate Programs</a></li>
                            <li><a href="MPhilAdmission.html">MPhil Students</a></li>
                            <li><a href="PhDAdmission.html">PhD Students</a></li>
                            <li><a href="InternationalAdmission.html">International Students</a></li>
                        </ul>
                    </div>
                    <div class="sidebar-item category">
                        <div class="title">
                            <h4>Others</h4>
                        </div>
                        <ul>
                            <li><a href="academicPrograms.html">Academic Programs</a></li>
                            <li><a href="academicCalendar.html">Academic Calendar</a></li>
                            <li><a href="http://iqac.du.ac.bd/home/" target="_blank">Institutional Quality Assurance
                                    Cell (IQAC)</a>
                            </li>
                            <li><a href="libraries.html">Libraries </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End Course Sidebar -->
        </div>
    </div>
</div>


   
@endsection