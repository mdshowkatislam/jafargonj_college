@extends('frontend.landing')
@php
    $page_title = 'Academic Calendar';
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
            <!-- Start Course Info -->
            <div class="col-md-12">
                <div>

                    <div class="default-padding-top"
                        style="border-top: 3px solid #1C4370;box-shadow:0 0 10px rgba(50, 50, 50, .17);min-height: 400px;">
                        <p style="text-align: center;color:green;font-weight: bold">Please Select Faculty,
                            Department /
                            Institute to get
                            the Academic Calendar</p>
                        <form class="form-horizontal" id='search_academic_calender_info_form' action="#">
                            <div class="form-group">
                                <div class="col-sm-10 margin-bottom-10px">
                                    <label class="control-label col-sm-2" for="type"> </label>
                                    <div class="col-sm-10">
                                        <label class="radio-inline">
                                            <input type="radio" value='faculty' checked
                                                name="searching_type_aca_program">Faculty/Department
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" value='institute'
                                                name="searching_type_aca_program">Institute
                                        </label>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10 margin-bottom-10px " id='faculty_portion_academic'>
                                    <label class="control-label col-sm-2" for="faculty">Faculty</label>
                                    <div class="col-sm-4">
                                        <select name="faculty_name" class="form-control"
                                            onchange="showDeptByFacultyID($('#faculty_name').val())"
                                            id="faculty_name">
                                            <option value=''>Select Faculty</option>
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
                                    <label class="control-label col-sm-2" for="department">Department</label>
                                    <div class="col-sm-4">
                                        <select name="department" id="department_aca"
                                            onchange="showAcademicCalenderInfo()" class="department form-control">
                                            <option value="">Select Department</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-10 margin-bottom-10px" id='institute_portion_academic'>
                                    <label class="control-label col-sm-2" for="institute_info">Institute </label>
                                    <div class="col-sm-6">
                                        <select name="institute_name" class="form-control institute_name_aca"
                                            onchange="showAcademicCalenderInfo()" id="institute_name_aca">
                                            <option value="">Select Institute</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group" id="searching_portion">
                                <div class="col-sm-offset-2 col-sm-4">
                                </div>
                                <div class="col-sm-4">
                                    <img src="fontView/assets/img/loader.gif" style="height:40px;display:none;"
                                        class="loader">
                                </div>
                            </div>
                        </form>

                        <div>
                            <div id="show_result">
                            </div>
                        </div>


                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- Start Course Sidebar -->
            <!--
            <div class="col-md-3">

            </div>
            -->
            <!-- End Course Sidebar -->
        </div>
    </div>
</div>

@endsection