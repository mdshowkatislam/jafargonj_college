@extends('frontend.layouts.master-landing')

@php
    $page_title = $info->pcname . ' Program';
@endphp
@section('title')
    {{ $page_title }}
@endsection
@section('content')
    {{-- @include('frontend.partials.sections.banner-cover', ['page_title' => $page_title]) --}}

    @include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])

    {{-- <style>
        .aboutSidebar ul li {
            background: #adb5bd;
            color: white;
            margin-bottom: 16px;
            border-left: 8px solid #00c5bf;
            cursor: pointer;
            padding: 10px;
            color: #fff;
            -webkit-transition: all 200ms linear !important;
            -moz-transition: all 200ms linear !important;
            -ms-transition: all 200ms linear !important;
            -o-transition: all 200ms linear !important;
            transition: all 200ms linear !important;

        }

        .aboutSidebar ul li:last-child {
            margin-bottom: 0 !important;
        }

        .aboutSidebar ul li:hover,
        .aboutSidebar ul li.active {
            background: #179bd7;
            border-left: 8px solid #6c757d;
            color: #fff;
        }

        .aboutSidebar ul a {
            color: #fff;
            text-decoration: none;
        }

        /* .tab-content {
                        display: none
                    } */

        .tab-content .tabcontent:not(.active) {
            display: none;
        }

        .slide-icon {
            transition: transform 0.3s ease-in-out;
            transform-origin: center;
        }
    </style> --}}
    <style>
        .nav-link.active {
            border-bottom: 3px solid black;
        }
        
        .accordion-button::after {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-plus' viewBox='0 0 16 16'%3E%3Cpath d='M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z'/%3E%3C/svg%3E");
            transition: all 0.5s;
        }
        .accordion-button:not(.collapsed)::after {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-dash' viewBox='0 0 16 16'%3E%3Cpath d='M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z'/%3E%3C/svg%3E");
        }
        .accordion-button::after {
            transition: all 0.5s;
        }
    </style>
    {{-- @dd($info->fname) --}}
    <!-- Start Course Details
                ============================================= -->
    <div class="course-details-area default-padding">
        <div class="container">
            <div class="row">
                <!-- Start Course Info -->
                <div class="col-md-9">
                    <div class="courses-info">
                        <h2>
                            {{ $info->program_title }}
                        </h2>
                        <div class="course-meta">
                            <div class="item category">
                                <h4>Faculty</h4>
                                <a href="#"> {{ $info->fname }}</a>
                            </div>
                            <div class="item rating">
                                <h4>Duration</h4>

                                <span style="font-size: 1.65em; color: Tomato;">
                                    <i class="fas fa-clock 2x"></i>
                                </span>
                                <span>
                                    {{ $info->duration }}
                                </span>
                            </div>

                            <div class="align-right">



                            </div>
                        </div>

                        <!-- Star Tab Info -->
                        <div class="tab-info" style="border: none;">
                            <!-- Tab Nav -->
                            <ul class="nav nav-pills d-flex" style="border: none;">
                                <li class="nav-item border">
                                    <a class="nav-link link-secondary active" id="overview-tab" data-bs-toggle="tab" data-bs-target="#tab1"
                                        href="#">Overview</a>
                                </li>
                                <li class="nav-item border">
                                    <a class="nav-link link-secondary" id="course-tab" data-bs-toggle="tab" data-bs-target="#tab2"
                                        href="#">Curriculum & Courses</a>
                                </li>
                                <li class="nav-item border">
                                    <a class="nav-link link-secondary" id="syllabus-tab" data-bs-toggle="tab" data-bs-target="#tab3"
                                        href="#">All Syllabus</a>
                                </li>
                            </ul>
                            <!-- End Tab Nav -->
                            <!-- Start Tab Content -->
                            <div class="tab-content tab-content-info">
                                <!-- Single Tab -->
                                <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="overview-tab">
                                    <p>{!! $info->outline !!}</p>
                                </div>
                                <!-- End Single Tab -->

                                <!-- Single Tab -->
                                {{-- static courses needed update for dynamic course --}}
                                <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="course-tab">
                                    <h4>List of Courses(Year/Semester)</h4>
                                    {{-- <div class="accordion accordion-flush" id="accordionFlushExample">
                                        <div class="accordion-item rounded-3 border-0 shadow mb-2">
                                          <h2 class="accordion-header">
                                            <button class="accordion-button border-bottom collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                                First Year | 1st Semester
                                            </button>
                                          </h2>
                                          <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                <ul>
                                                    <div class="title">
                                                        <i class="fas fa-file"></i>
                                                        AIS1105 | Business Communication | 3 Cr.
                                                        <a data-bs-toggle="modal" data-bs-target="#myModal_1_2_1"
                                                            href="#"><i class="fa fa-eye"
                                                                aria-hidden="true"></i>Preview</a>
                                                    </div>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="myModal_1_2_1" tabindex="-1"
                                                        role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header"
                                                                    style="background: #1C4370">
                                                                    <button type="button" class="close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"><span
                                                                            aria-hidden="true">&times;</span></button>
                                                                    <h4 class="modal-title" id="myModalLabel"
                                                                        style="color: white">Course Title: Business Communication
                                                                    </h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>
                                                                        Course Credit:
                                                                        3
                                                                    </p>
                                                                    <br>
                                                                    <p>
                                                                        This course attempts to develop the
                                                                        skill of students in exchanging messages
                                                                        with others in order to develop a mutual
                                                                        understanding of business deals. The
                                                                        students, with their professional oral
                                                                        and written communication skills, will
                                                                        be able to build the expertise needed to
                                                                        succeed in today’s
                                                                        technologically-superior workplaces.
                                                                    </p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button"
                                                                        class="btn btn-default"
                                                                        data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </ul>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="accordion-item rounded-3 border-0 shadow mb-2">
                                          <h2 class="accordion-header">
                                            <button class="accordion-button border-bottom collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                                Second Year | 1st Semester
                                            </button>
                                          </h2>
                                          <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                <ul>
                                                    <div class="title">
                                                        <i class="fas fa-file"></i>
                                                        AIS2101 | Advanced Financial Accounting-I | 3 Cr.
                                                        <a data-bs-toggle="modal" data-bs-target="#myModal_2_2_1"
                                                            href="#"><i class="fa fa-eye"
                                                                aria-hidden="true"></i>Preview</a>

                                                    </div>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="myModal_2_2_1" tabindex="-1"
                                                        role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header"
                                                                    style="background: #1C4370">
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal"
                                                                        aria-label="Close"><span
                                                                            aria-hidden="true">&times;</span></button>
                                                                    <h4 class="modal-title" id="myModalLabel"
                                                                        style="color: white">Course Title:
                                                                        Advanced Financial Accounting-I
                                                                    </h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>
                                                                        Course Credit:
                                                                        3
                                                                    </p>
                                                                    <br>
                                                                    <p>
                                                                        The objective of this course is to
                                                                        enhance students’ understanding of the
                                                                        recognition, measurement and disclosure
                                                                        issues relating to revenues, expenses,
                                                                        liabilities and equities that are
                                                                        reported in the interim and annual
                                                                        financial statements. 
                                                                    </p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button"
                                                                        class="btn btn-default"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="title">
                                                        <i class="fas fa-file"></i>
                                                        AIS2102 | Macroeconomics | 3 Cr.
                                                        <a data-bs-toggle="modal" data-bs-target="#myModal_2_2_2"
                                                            href="#"><i class="fa fa-eye"
                                                                aria-hidden="true"></i>Preview</a>
                                                    </div>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="myModal_2_2_2" tabindex="-1"
                                                        role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header"
                                                                    style="background: #1C4370">
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal"
                                                                        aria-label="Close"><span
                                                                            aria-hidden="true">&times;</span></button>
                                                                    <h4 class="modal-title" id="myModalLabel"
                                                                        style="color: white">Course Title:
                                                                        Macroeconomics
                                                                    </h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>
                                                                        Course Credit:
                                                                        3
                                                                    </p>
                                                                    <br>
                                                                    <p>
                                                                        The objective of this course is to give
                                                                        students a background of basic
                                                                        macro-economic theories, concepts and
                                                                        indicators and their relevance to
                                                                        different policy actions. The course is
                                                                        designed to provide students the tools
                                                                        to analyze how macroeconomic indicators
                                                                        like national income, consumption,
                                                                        savings and investments are determined
                                                                        and how macro policies such as fiscal,
                                                                        financial and trade policies are related
                                                                        to economic management.
                                                                    </p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button"
                                                                        class="btn btn-default"
                                                                        data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="title">
                                                        <i class="fas fa-file"></i>
                                                        AIS2103 | Programming and Database Management | 3 Cr.
                                                        <a data-bs-toggle="modal" data-bs-target="#myModal_2_2_3"
                                                            href="#"><i class="fa fa-eye"
                                                                aria-hidden="true"></i>Preview</a>

                                                    </div>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="myModal_2_2_3" tabindex="-1"
                                                        role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header"
                                                                    style="background: #1C4370">
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal"
                                                                        aria-label="Close"><span
                                                                            aria-hidden="true">&times;</span></button>
                                                                    <h4 class="modal-title" id="myModalLabel"
                                                                        style="color: white">Course Title: Programming and Database Management
                                                                    </h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>
                                                                        Course Credit: 3
                                                                    </p>
                                                                    <br>
                                                                    <p>
                                                                        The objective of this course is to
                                                                        introduce visual tools for programming
                                                                        and basic concepts of programming
                                                                        languages so that student can develop
                                                                        their own software. Moreover, students
                                                                        will be familiar with the common and
                                                                        contemporary business programming
                                                                        languages along with their applications
                                                                        in real-life situations.
                                                                    </p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button"
                                                                        class="btn btn-default"
                                                                        data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="title">
                                                        <i class="fas fa-file"></i>

                                                        AIS2104 | General Science and Environment | 3 Cr.
                                                        <a data-bs-toggle="modal" data-bs-target="#myModal_2_2_4"
                                                            href="#"><i class="fa fa-eye"
                                                                aria-hidden="true"></i>Preview</a>

                                                    </div>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="myModal_2_2_4" tabindex="-1"
                                                        role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header"
                                                                    style="background: #1C4370">
                                                                    <button type="button" class="close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"><span
                                                                            aria-hidden="true">&times;</span></button>
                                                                    <h4 class="modal-title" id="myModalLabel"
                                                                        style="color: white">Course Title: General Science and Environment
                                                                    </h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>
                                                                        Course Credit: 3
                                                                    </p>
                                                                    <br>
                                                                    <p>
                                                                        The objective of this course is to give
                                                                        some basic concepts of matter of earth,
                                                                        energy, chemistry and issues of
                                                                        environmental chemistry which we see and
                                                                        use in our day-to-day life. The outcome
                                                                        of this course is to develop certain
                                                                        abilities such as ability to sense a
                                                                        problem, organize and interpret,
                                                                        analyze, generalize and predict.
                                                                    </p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button"
                                                                        class="btn btn-default"
                                                                        data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="title">
                                                        <i class="fas fa-file"></i> AIS2105 | Business Statistics-I | 3 Cr.
                                                        <a data-bs-toggle="modal" data-bs-target="#myModal_2_2_5"
                                                            href="#"><i class="fa fa-eye"
                                                                aria-hidden="true"></i>Preview</a>

                                                    </div>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="myModal_2_2_5" tabindex="-1"
                                                        role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header"
                                                                    style="background: #1C4370">
                                                                    <button type="button" class="close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"><span
                                                                            aria-hidden="true">&times;</span></button>
                                                                    <h4 class="modal-title" id="myModalLabel"
                                                                        style="color: white">Course Title:
                                                                        Business Statistics-I
                                                                    </h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>
                                                                        Course Credit:
                                                                        3
                                                                    </p>
                                                                    <br>
                                                                    <p>
                                                                        This course is intended to provide
                                                                        students with an understanding of the
                                                                        data, basic
                                                                        terminology of statistics, and methods
                                                                        of statistical too basic statistics
                                                                        that will develop their ability to deal
                                                                        with quantitative issues in business and
                                                                        economics, analyze and interpret them
                                                                        and forms the basis of decision-making
                                                                        in business.

                                                                    </p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button"
                                                                        class="btn btn-default"
                                                                        data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </ul>
                                            </div>
                                          </div>
                                        </div>
                                    </div> --}}
                                    <div class="accordion accordion-flush" id="accordionFlushExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="flush-headingOne">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                                    First Year | 1st Semester
                                                </button>
                                            </h2>
                                            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                                                data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body">
                                                    <ul>
                                                        <div class="title">
                                                            <i class="fas fa-file"></i>
                                                            AIS1105 | Business Communication | 3 Cr.
                                                            <a data-bs-toggle="modal" data-bs-target="#myModal_1_2_1"
                                                                href="#"><i class="fa fa-eye"
                                                                    aria-hidden="true"></i>Preview</a>
                                                        </div>
    
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="myModal_1_2_1" tabindex="-1"
                                                            role="dialog" aria-labelledby="myModalLabel">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header"
                                                                        style="background: #1C4370">
                                                                        <h4 class="modal-title fs-5" id="myModalLabel"
                                                                            style="color: white">Course Title: Business Communication
                                                                        </h4>
                                                                        <button type="button" class="close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>
                                                                            Course Credit:
                                                                            3
                                                                        </p>
                                                                        <br>
                                                                        <p>
                                                                            This course attempts to develop the
                                                                            skill of students in exchanging messages
                                                                            with others in order to develop a mutual
                                                                            understanding of business deals. The
                                                                            students, with their professional oral
                                                                            and written communication skills, will
                                                                            be able to build the expertise needed to
                                                                            succeed in today’s
                                                                            technologically-superior workplaces.
                                                                        </p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-default"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="flush-headingTwo">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                                    Second Year | 1st Semester
                                                </button>
                                            </h2>
                                            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                                                data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body">
                                                    <ul>
                                                        <div class="title">
                                                            <i class="fas fa-file"></i>
                                                            AIS2101 | Advanced Financial Accounting-I | 3 Cr.
                                                            <a data-bs-toggle="modal" data-bs-target="#myModal_2_2_1"
                                                                href="#"><i class="fa fa-eye"
                                                                    aria-hidden="true"></i>Preview</a>
    
                                                        </div>
    
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="myModal_2_2_1" tabindex="-1"
                                                            role="dialog" aria-labelledby="myModalLabel">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header"
                                                                        style="background: #1C4370">
                                                                        <h4 class="modal-title fs-5" id="myModalLabel"
                                                                            style="color: white">Course Title:
                                                                            Advanced Financial Accounting-I
                                                                        </h4>
                                                                        <button type="button" class="close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"><span
                                                                                aria-hidden="true">&times;</span></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>
                                                                            Course Credit:
                                                                            3
                                                                        </p>
                                                                        <br>
                                                                        <p>
                                                                            The objective of this course is to
                                                                            enhance students’ understanding of the
                                                                            recognition, measurement and disclosure
                                                                            issues relating to revenues, expenses,
                                                                            liabilities and equities that are
                                                                            reported in the interim and annual
                                                                            financial statements. 
                                                                        </p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-default"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="title">
                                                            <i class="fas fa-file"></i>
                                                            AIS2102 | Macroeconomics | 3 Cr.
                                                            <a data-bs-toggle="modal" data-bs-target="#myModal_2_2_2"
                                                                href="#"><i class="fa fa-eye"
                                                                    aria-hidden="true"></i>Preview</a>
                                                        </div>
    
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="myModal_2_2_2" tabindex="-1"
                                                            role="dialog" aria-labelledby="myModalLabel">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header"
                                                                        style="background: #1C4370">
                                                                        <h4 class="modal-title fs-5" id="myModalLabel"
                                                                            style="color: white">Course Title:
                                                                            Macroeconomics
                                                                        </h4>
                                                                        <button type="button" class="close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"><span
                                                                                aria-hidden="true">&times;</span></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>
                                                                            Course Credit:
                                                                            3
                                                                        </p>
                                                                        <br>
                                                                        <p>
                                                                            The objective of this course is to give
                                                                            students a background of basic
                                                                            macro-economic theories, concepts and
                                                                            indicators and their relevance to
                                                                            different policy actions. The course is
                                                                            designed to provide students the tools
                                                                            to analyze how macroeconomic indicators
                                                                            like national income, consumption,
                                                                            savings and investments are determined
                                                                            and how macro policies such as fiscal,
                                                                            financial and trade policies are related
                                                                            to economic management.
                                                                        </p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-default"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
    
                                                        <div class="title">
                                                            <i class="fas fa-file"></i>
                                                            AIS2103 | Programming and Database Management | 3 Cr.
                                                            <a data-bs-toggle="modal" data-bs-target="#myModal_2_2_3"
                                                                href="#"><i class="fa fa-eye"
                                                                    aria-hidden="true"></i>Preview</a>
    
                                                        </div>
    
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="myModal_2_2_3" tabindex="-1"
                                                            role="dialog" aria-labelledby="myModalLabel">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header"
                                                                        style="background: #1C4370">
                                                                        <h4 class="modal-title fs-5" id="myModalLabel"
                                                                            style="color: white">Course Title: Programming and Database Management
                                                                        </h4>
                                                                        <button type="button" class="close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"><span
                                                                                aria-hidden="true">&times;</span></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>
                                                                            Course Credit: 3
                                                                        </p>
                                                                        <br>
                                                                        <p>
                                                                            The objective of this course is to
                                                                            introduce visual tools for programming
                                                                            and basic concepts of programming
                                                                            languages so that student can develop
                                                                            their own software. Moreover, students
                                                                            will be familiar with the common and
                                                                            contemporary business programming
                                                                            languages along with their applications
                                                                            in real-life situations.
                                                                        </p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-default"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
    
                                                        <div class="title">
                                                            <i class="fas fa-file"></i>
    
                                                            AIS2104 | General Science and Environment | 3 Cr.
                                                            <a data-bs-toggle="modal" data-bs-target="#myModal_2_2_4"
                                                                href="#"><i class="fa fa-eye"
                                                                    aria-hidden="true"></i>Preview</a>
    
                                                        </div>
    
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="myModal_2_2_4" tabindex="-1"
                                                            role="dialog" aria-labelledby="myModalLabel">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header"
                                                                        style="background: #1C4370">
                                                                        <h4 class="modal-title fs-5" id="myModalLabel"
                                                                            style="color: white">Course Title: General Science and Environment
                                                                        </h4>
                                                                        <button type="button" class="close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"><span
                                                                                aria-hidden="true">&times;</span></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>
                                                                            Course Credit: 3
                                                                        </p>
                                                                        <br>
                                                                        <p>
                                                                            The objective of this course is to give
                                                                            some basic concepts of matter of earth,
                                                                            energy, chemistry and issues of
                                                                            environmental chemistry which we see and
                                                                            use in our day-to-day life. The outcome
                                                                            of this course is to develop certain
                                                                            abilities such as ability to sense a
                                                                            problem, organize and interpret,
                                                                            analyze, generalize and predict.
                                                                        </p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-default"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
    
                                                        <div class="title">
                                                            <i class="fas fa-file"></i> AIS2105 | Business Statistics-I | 3 Cr.
                                                            <a data-bs-toggle="modal" data-bs-target="#myModal_2_2_5"
                                                                href="#"><i class="fa fa-eye"
                                                                    aria-hidden="true"></i>Preview</a>
    
                                                        </div>
    
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="myModal_2_2_5" tabindex="-1"
                                                            role="dialog" aria-labelledby="myModalLabel">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header"
                                                                        style="background: #1C4370">
                                                                        <h4 class="modal-title fs-5" id="myModalLabel"
                                                                            style="color: white">Course Title:
                                                                            Business Statistics-I
                                                                        </h4>
                                                                        <button type="button" class="close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"><span
                                                                                aria-hidden="true">&times;</span></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>
                                                                            Course Credit:
                                                                            3
                                                                        </p>
                                                                        <br>
                                                                        <p>
                                                                            This course is intended to provide
                                                                            students with an understanding of the
                                                                            data, basic
                                                                            terminology of statistics, and methods
                                                                            of statistical too basic statistics
                                                                            that will develop their ability to deal
                                                                            with quantitative issues in business and
                                                                            economics, analyze and interpret them
                                                                            and forms the basis of decision-making
                                                                            in business.
    
                                                                        </p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-default"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                
                                </div>
                                
                                <!-- End Single Tab -->

                                <!-- Single Tab -->
                                <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="syllabus-tab">
                                    <div class="info title">
                                        <div class="advisor-list-items">
                                            <h4>List of Syllabus</h4>
                                            <ul class="list">
                                                <h5>Data not available</h5>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Tab -->

                            </div>
                            <!-- End Tab Content -->
                        </div>
                        <!-- End Tab Info -->
                    </div>
                </div>
                <!-- End Course Info -->

                <!-- Start Course Sidebar -->
                <div class="col-md-3">
                    <div class="aside">

                        <!-- Sidebar Item -->
                        <div class="sidebar-item category">
                            <div class="title">
                                <h4>Academic</h4>
                            </div>
                            <ul>
                                @foreach ($program_categories as $item)
                                    <li><a href="#">{{ $item->program_category }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- End Sidebar Item -->

                    </div>
                </div>
                <!-- End Course Sidebar -->
            </div>
        </div>
    </div>
    <!-- End Course Details -->

    <script>
        function openTab(evt, tabName) {

            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>
    <script>
        // Add click event listeners to all course headers
        document.querySelectorAll('.course-header').forEach(function(header) {
            header.addEventListener('click', function() {
                // Get the associated course ID from the data attribute
                let courseId = header.getAttribute('data-course-id');
                let chevron = document.getElementById('chevron-' + courseId);

                // Hide all other course details divs except for the one being clicked
                document.querySelectorAll('.course-details').forEach(function(details) {
                    var detailsCourseId = details.getAttribute('data-course-id');

                    if (detailsCourseId !== courseId) {
                        details.classList.remove('show'); // Hide the other course details
                    }
                });

                if (chevron) {
                    if (header.classList.contains('collapsed')) {
                        // chevron.classList.remove('fa-chevron-up');
                        // chevron.classList.add('fa-chevron-down');
                        chevron.style.transform = 'rotate(0deg)';
                    } else {
                        // chevron.classList.remove('fa-chevron-down');
                        // chevron.classList.add('fa-chevron-up');
                        chevron.style.transform = 'rotate(180deg)';
                    }
                }
            });
        });
    </script>
    <script>
        /*Scroll to top when arrow up clicked BEGIN*/
        $(window).scroll(function() {
            var height = $(window).scrollTop();
            if (height > 100) {
                $('#back2Top').fadeIn();
            } else {
                $('#back2Top').fadeOut();
            }
        });
        $(document).ready(function() {
            $("#back2Top").click(function(event) {
                event.preventDefault();
                $("html, body").animate({
                    scrollTop: 0
                }, "slow");
                return false;
            });

        });
        /*Scroll to top when arrow up clicked END*/
    </script>
@endsection
