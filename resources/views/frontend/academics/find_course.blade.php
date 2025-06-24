@extends('frontend.landing')
@php
    $page_title = 'Search Program';
@endphp
@section('title')
    {{ $page_title }}
@endsection


@section('content')
@include('frontend.partials.sections.banner-cover', ['page_title' => $page_title])

<style></style>


<div class="search-area text-center" style="margin-top: 35px;">
    <div class="container">
        <div class="search-course">
            <div class="search-content"
                style="background: linear-gradient(90deg, rgba(0, 33, 71, 1) 0%, rgba(6, 63, 130, 1) 49%);">
                <div class="row">
                    <div class="col-md-10">
                        <form action="#" id="searchProgramForm">
                            <input type="text" placeholder="Enter program name" class="form-control" value=""
                                name="programName" id="programName">
                            <input type="hidden" class="form-control" name="programNameID" id="programNameID">
                        </form>
                    </div>
                    <div class="col-md-2">
                        <div class="row pu">
                            <a href="find_course.html" class="btn btn-danger" style="margin:10px auto;"><i
                                    class="fas fa-sync-alt"></i> Reset Filter</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="blog-area single full-blog left-sidebar full-blog" style="margin-top: 35px;">
    <div class="container">
        <div class="row">
            <div class="blog-items">
                <div class="blog-content col-md-8">
                    <div class="col-sm-offset-4 col-sm-4">
                        <img class="loadlater" src="fontView/assets/img/loaderNew.gif"
                            style="height: 50px;display: none" />
                    </div>
                    <div class="content-items" id="showCourseFinder">
                        <div class="clearfix"></div>
                        <h4 class="text-center">Total <span class="badge badge-secondary">418</span> Search Result
                            found
                        </h4>
                        <div class="row">
                            <div class="single-item">
                                <div class="item">
                                    <div class="info">
                                        <div class="content">
                                            <h4>
                                                <a href="programDetails/RME/8.html" target="_blank">B.Sc. in
                                                    Robotics and Mechatronics Engineering
                                                    (48 Months)</a>
                                            </h4>
                                            <div class="sidebar-item tags">
                                                <div class="sidebar-info">
                                                    <ul>
                                                        <li><a href="body/RME.html" target="_blank">Department of
                                                                Robotics and Mechatronics Engineering</a>
                                                        </li>
                                                        <li><a href="#">Undergraduate</a>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div style="text-align: justify">
                                                B.Sc. in Robotics and Mechatronics Engineering

                                                Session: 2017-18 and 2018-19



                                                1. Duration of the Program: 4 years.

                                                2. Total Semester: 8 (2 semester per year).

                                                3. Total Credits: 160

                                                4. Class: 15 active weeks.

                                                5. Preparatory Leave: 2 weeks

                                                6. Teaching ... </div>
                                            <a href="programDetails/RME/8.html" target="_blank"><i
                                                    class="fas fa-plus"></i> Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-item">
                                <div class="item">
                                    <div class="info">
                                        <div class="content">
                                            <h4>
                                                <a href="programDetails/RME/9.html" target="_blank">M.Sc. in
                                                    Robotics and Mechatronics Engineering
                                                    (18 Months)</a>
                                            </h4>
                                            <div class="sidebar-item tags">
                                                <div class="sidebar-info">
                                                    <ul>
                                                        <li><a href="body/RME.html" target="_blank">Department of
                                                                Robotics and Mechatronics Engineering</a>
                                                        </li>
                                                        <li><a href="#">Graduate</a>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div style="text-align: justify">
                                                M.Sc. in Robotics and Mechatronics Engineering

                                                Session: 2019-20



                                                There are three semesters in the M.Sc program, Semester-1 and 3
                                                (January-June session) and Semester 2 (July-December Session). A
                                                student must complete 36 credit hours to achieve the ... </div>
                                            <a href="programDetails/RME/9.html" target="_blank"><i
                                                    class="fas fa-plus"></i> Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-item">
                                <div class="item">
                                    <div class="info">
                                        <div class="content">
                                            <h4>
                                                <a href="programDetails/RME/10.html" target="_blank">M.Phil. in
                                                    Robotics and Mechatronics Engineering
                                                    (24 Months)</a>
                                            </h4>
                                            <div class="sidebar-item tags">
                                                <div class="sidebar-info">
                                                    <ul>
                                                        <li><a href="body/RME.html" target="_blank">Department of
                                                                Robotics and Mechatronics Engineering</a>
                                                        </li>
                                                        <li><a href="#">MPhil</a>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div style="text-align: justify">
                                                MPhil in Robotics and Mechatronics Engineering

                                                Session: 2019-2020

                                                MPhil in RMEDU (Department of Robotics and Mechatronics Engineering,
                                                University of Dhaka) is a two-year program: The course work should
                                                be finished in 1st year. However, the validation of ... </div>
                                            <a href="programDetails/RME/10.html" target="_blank"><i
                                                    class="fas fa-plus"></i> Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-item">
                                <div class="item">
                                    <div class="info">
                                        <div class="content">
                                            <h4>
                                                <a href="programDetails/RME/11.html" target="_blank">Ph.D. in
                                                    Robotics and Mechatronics Engineering
                                                    (48 Months)</a>
                                            </h4>
                                            <div class="sidebar-item tags">
                                                <div class="sidebar-info">
                                                    <ul>
                                                        <li><a href="body/RME.html" target="_blank">Department of
                                                                Robotics and Mechatronics Engineering</a>
                                                        </li>
                                                        <li><a href="#">PhD</a>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div style="text-align: justify">
                                                PhD in Robotics and Mechatronics Engineering

                                                Session: 2019-2020

                                                PhD in RMEDU (Department of Robotics and Mechatronics Engineering,
                                                University of Dhaka) is a four-year program. However, a researcher
                                                can submit the thesis after the first 2 (Two) years.

                                                The ... </div>
                                            <a href="programDetails/RME/11.html" target="_blank"><i
                                                    class="fas fa-plus"></i> Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-item">
                                <div class="item">
                                    <div class="info">
                                        <div class="content">
                                            <h4>
                                                <a href="programDetails/IER/12.html" target="_blank">Master of
                                                    Education (MEd)
                                                    (12 Months)</a>
                                            </h4>
                                            <div class="sidebar-item tags">
                                                <div class="sidebar-info">
                                                    <ul>
                                                        <li><a href="body/IER.html" target="_blank">Institute of
                                                                Education and Research</a>
                                                        </li>
                                                        <li><a href="#">Graduate</a>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div style="text-align: justify">
                                                Master of Education Program (Regular)

                                                Keeping pace with the newly introduced Bachelor of Education (Hons.)
                                                program, Master of Education Program has been reoriented and
                                                modernized under ten departments of IER. Students are to select any
                                                one ... </div>
                                            <a href="programDetails/IER/12.html" target="_blank"><i
                                                    class="fas fa-plus"></i> Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-item">
                                <div class="item">
                                    <div class="info">
                                        <div class="content">
                                            <h4>
                                                <a href="programDetails/IER/13.html" target="_blank">Bachelor of
                                                    Education (Hons)
                                                    (48 Months)</a>
                                            </h4>
                                            <div class="sidebar-item tags">
                                                <div class="sidebar-info">
                                                    <ul>
                                                        <li><a href="body/IER.html" target="_blank">Institute of
                                                                Education and Research</a>
                                                        </li>
                                                        <li><a href="#">Undergraduate</a>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div style="text-align: justify">
                                                Bachelor of Education (Honours) Programme


                                                Title of Programme: Bachelor of Education (Honours)
                                                Duration of the Programme : Four (4) Academic Years divided into
                                                Eight Semesters



                                                Eligibility for Admission






                                                3.1


                                                Higher Secondary School Certificate (HSC) or Equivalent




                                                3.2


                                                Other conditions of ... </div>
                                            <a href="programDetails/IER/13.html" target="_blank"><i
                                                    class="fas fa-plus"></i> Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-item">
                                <div class="item">
                                    <div class="info">
                                        <div class="content">
                                            <h4>
                                                <a href="programDetails/IER/14.html" target="_blank">Master of
                                                    Philosophy
                                                    (24 Months)</a>
                                            </h4>
                                            <div class="sidebar-item tags">
                                                <div class="sidebar-info">
                                                    <ul>
                                                        <li><a href="body/IER.html" target="_blank">Institute of
                                                                Education and Research</a>
                                                        </li>
                                                        <li><a href="#">MPhil</a>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div style="text-align: justify">
                                                M. Phil Program in Education

                                                Two years Master of Philosophy (M. Phil) is a higher research degree
                                                in any branch of Education. Students can seek admission in any
                                                disciplines, i. e. Primary education, Secondary education, ...
                                            </div>
                                            <a href="programDetails/IER/14.html" target="_blank"><i
                                                    class="fas fa-plus"></i> Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-item">
                                <div class="item">
                                    <div class="info">
                                        <div class="content">
                                            <h4>
                                                <a href="programDetails/IER/15.html" target="_blank">Doctor of
                                                    Philosophy
                                                    (48 Months)</a>
                                            </h4>
                                            <div class="sidebar-item tags">
                                                <div class="sidebar-info">
                                                    <ul>
                                                        <li><a href="body/IER.html" target="_blank">Institute of
                                                                Education and Research</a>
                                                        </li>
                                                        <li><a href="#">PhD</a>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div style="text-align: justify">
                                                Thesis Based Ph. D Program in Education

                                                This is a fully research based advanced education program aimed at
                                                producing highly qualified and specialized professionals. Students
                                                must have a Masters degree in education and have to pass ... </div>
                                            <a href="programDetails/IER/15.html" target="_blank"><i
                                                    class="fas fa-plus"></i> Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-item">
                                <div class="item">
                                    <div class="info">
                                        <div class="content">
                                            <h4>
                                                <a href="programDetails/GLG/17.html" target="_blank">Bachelor of
                                                    Science in Geology
                                                    (48 Months)</a>
                                            </h4>
                                            <div class="sidebar-item tags">
                                                <div class="sidebar-info">
                                                    <ul>
                                                        <li><a href="body/GLG.html" target="_blank">Department of
                                                                Geology</a>
                                                        </li>
                                                        <li><a href="#">Undergraduate</a>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div style="text-align: justify">
                                                Title of the Programme: Bachelor of Science with Honours in Geology

                                                Duration of the Programme: Four (4) Academic Years

                                                Medium of Instruction: English

                                                Eligibility for Admission:



                                                HSC or Equivalent degree in science group


                                                Other conditions of admission are determined by ... </div>
                                            <a href="programDetails/GLG/17.html" target="_blank"><i
                                                    class="fas fa-plus"></i> Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-item">
                                <div class="item">
                                    <div class="info">
                                        <div class="content">
                                            <h4>
                                                <a href="programDetails/GLG/18.html" target="_blank">Master of
                                                    Science in Geology
                                                    (12 Months)</a>
                                            </h4>
                                            <div class="sidebar-item tags">
                                                <div class="sidebar-info">
                                                    <ul>
                                                        <li><a href="body/GLG.html" target="_blank">Department of
                                                                Geology</a>
                                                        </li>
                                                        <li><a href="#">Graduate</a>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div style="text-align: justify">
                                                Master of science in Geology is a one-year program. There are two
                                                groups- one group is termed as General Group (Group A) and the other
                                                as Thesis Group (Group B). The degree is offered in ... </div>
                                            <a href="programDetails/GLG/18.html" target="_blank"><i
                                                    class="fas fa-plus"></i> Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>

                            <div style="text-align: center">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination">
                                      <li>
                                        <a href="#" aria-label="Previous">
                                          <span aria-hidden="true">&laquo;</span>
                                        </a>
                                      </li>
                                      <li><a href="#">1</a></li>
                                      <li><a href="#">2</a></li>
                                      <li><a href="#">3</a></li>
                                      <li><a href="#">4</a></li>
                                      <li><a href="#">5</a></li>
                                      <li>
                                        <a href="#" aria-label="Next">
                                          <span aria-hidden="true">&raquo;</span>
                                        </a>
                                      </li>
                                    </ul>
                                  </nav>
                            </div>
                        </div>
                    </div>
                    <!-- End Blog Items -->
                </div>

                <!-- Start Sidebar -->
                <div class="sidebar col-md-4">
                    <aside>

                        <div class="sidebar-item category">
                            <div class="sidebar-info">
                                <div class="panel-group" id="accordion1" role="tablist" aria-multiselectable="true">

                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne1"
                                            style="background: #1C4370">
                                            <h4 class="panel-title">
                                                <a style="color: white" role="button" data-toggle="collapse"
                                                    data-parent="#accordion1" href="#collapseOne1"
                                                    aria-expanded="true" aria-controls="collapseOne1">
                                                    Program Level

                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne1" class="panel-collapse in" role="tabpanel"
                                            aria-labelledby="headingOne1">
                                            <div class="panel-body">
                                                <ul>
                                                    <li><input type="checkbox" class="programLevel"
                                                            name="programLevel" value="1">
                                                        Undergraduate</li>
                                                    <li><input type="checkbox" class="programLevel"
                                                            name="programLevel" value="2">
                                                        Graduate</li>
                                                    <li><input type="checkbox" class="programLevel"
                                                            name="programLevel" value="3"> MPhil
                                                    </li>
                                                    <li><input type="checkbox" class="programLevel"
                                                            name="programLevel" value="4"> PhD /
                                                        DBA</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="sidebar-item category">
                            <div class="sidebar-info">
                                <div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">

                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne2"
                                            style="background: #1C4370">
                                            <h4 class="panel-title">
                                                <a style="color: white" role="button" data-toggle="collapse"
                                                    data-parent="#accordion2" href="#collapseOne2"
                                                    aria-expanded="true" aria-controls="collapseOne2">
                                                    Faculty

                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne2" class="panel-collapse in" role="tabpanel"
                                            aria-labelledby="headingOne2">
                                            <div class="panel-body">
                                                <ul>
                                                    <li>
                                                        <input type="checkbox" name="programFaculty"
                                                            class="programFaculty" value="53">
                                                        Faculty of Arts
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" name="programFaculty"
                                                            class="programFaculty" value="64">
                                                        Faculty of Science
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" name="programFaculty"
                                                            class="programFaculty" value="60">
                                                        Faculty of Law
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" name="programFaculty"
                                                            class="programFaculty" value="55">
                                                        Faculty of Business Studies
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" name="programFaculty"
                                                            class="programFaculty" value="65">
                                                        Faculty of Social Sciences
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" name="programFaculty"
                                                            class="programFaculty" value="54">
                                                        Faculty of Biological Sciences
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" name="programFaculty"
                                                            class="programFaculty" value="63">
                                                        Faculty of Pharmacy
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" name="programFaculty"
                                                            class="programFaculty" value="57">
                                                        Faculty of Earth and Environmental Sciences
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" name="programFaculty"
                                                            class="programFaculty" value="58">
                                                        Faculty of Engineering and Technology
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" name="programFaculty"
                                                            class="programFaculty" value="59">
                                                        Faculty of Fine Art
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" name="programFaculty"
                                                            class="programFaculty" value="105">
                                                        Institutes
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" name="programFaculty"
                                                            class="programFaculty" value="56">
                                                        Faculty of Education
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" name="programFaculty"
                                                            class="programFaculty" value="61">
                                                        Faculty of Medicine
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" name="programFaculty"
                                                            class="programFaculty" value="62">
                                                        Faculty of Postgraduate Medical Sciences and Research
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </aside>
                </div>
                <!-- End Start Sidebar -->
            </div>
        </div>
    </div>
</div>


@endsection