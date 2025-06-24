@extends('frontend.landing')
@php
    $page_title = 'University at a Glance';
@endphp
@section('title')
    {{ $page_title }}
@endsection


@section('content')
@include('frontend.partials.sections.banner-cover', ['page_title' => $page_title])

<style>
 

</style>



<div class="course-details-area default-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="courses-info">
                    <div class="tab-info">
                        <div class="tab-content tab-content-info">
                            <div id="tab1" class="tab-pane fade active in">
                                <div class="info title text-justify">

                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-body text-justify">
                                        <div class="wrapper center-block">
                                            <div class="panel-group" id="accordion" role="tablist"
                                                aria-multiselectable="true">
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_0"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Faculties
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_0" class="panel-collapse in"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            Faculties : 13
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_1"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Departments
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_1" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            Departments : 83
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_2"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Institutes
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_2" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            Institutes : 13
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_3"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Research Center &amp; Bureaus
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_3" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            Research Center &amp; Bureaus : 56
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_4"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Residential Halls
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_4" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            Residential Halls : 20
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_5"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Hostels
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_5" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            Hostels : 03
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_6"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Students
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_6" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            Students : 37018
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_7"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Male
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_7" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            Male : 20773
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_8"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Female
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_8" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            Female : 12028
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_9"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Examinee
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_9" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            Examinee : 4221
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_10"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                PhDs Researchers
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_10" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            PhDs Researchers : 1201
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_11"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                MPhils Researchers
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_11" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            MPhils Researchers : 1956
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_12"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Teachers
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_12" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            Teachers : 1992
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_13"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Male
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_13" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            Male : 1327
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_14"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Female
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_14" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            Female : 638
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_15"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Others
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_15" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            Others : 27
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_16"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Officers
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_16" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            Officers : 1030
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_17"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Class-III Employees
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_17" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            Class-III Employees : 1137
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_18"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Class-IV Employees
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_18" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            Class-IV Employees : 2250
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_19"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                PhDs
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_19" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            PhDs : 1429
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_20"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                MPhils
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_20" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            MPhils : 1377
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_21"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Trust Funds
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_21" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            Trust Funds : 327
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_22"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Land Area
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_22" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            Land Area : 275.083 acres
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_23"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Constituent Colleges and Institutes
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_23" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            Constituent Colleges and Institutes : 105
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_24"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Students in Constituent Colleges
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_24" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            Students in Constituent Colleges : 45374
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_25"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Male
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_25" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            Male : 16922
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_26"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Female
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_26" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            Female : 28452
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_27"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Teachers in Constituent Colleges
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_27" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            Teachers in Constituent Colleges : 7981
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_28"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Male
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_28" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            Male : 4260
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_29"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Female
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_29" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            Female : 3721
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
            <div class="col-md-3">
                <div class="aside">
                    <div class="sidebar-item category">
                        <div class="title">
                            <h4>About University</h4>
                        </div>
                        <ul>
                            <li><a href="#HistoricalOutline.html">Historical Outline</a></li>

                            <li><a href="#DuataGlance.html">University at a Glance</a></li>
                            <li><a href="#HonorisCausa.html">Honoris Causa</a></li>
                            <li><a href="#../viceChancellorMessage.html">Message from the Vice Chancellor</a></li>
                            <li><a href="#../listofViceChancellors.html">List of Vice Chancellors</a></li>
                            <li><a href="#../notableAlumni.html">Notable Alumni</a></li>
                        </ul>
                    </div>

                    <div class="sidebar-item category">
                        <div class="title">
                            <h4>DU Leadership</h4>
                        </div>
                        <ul>
                            <li><a href="#../leadership/chancellor.html">Chancellor</a></li>
                            <li><a href="#../leadership/vc.html">Vice Chancellor</a></li>
                            <li><a href="#../leadership/provca.html" nowrap>Pro-Vice Chancellor (Academic)</a></li>
                            <li><a href="#../leadership/provcp.html">Pro-Vice Chancellor (Admin)</a></li>
                            <li><a href="#../leadership/treasurer.html">Treasurer</a></li>
                        </ul>
                    </div>
                    <div class="sidebar-item category">
                        <div class="title">
                            <h4>Governance Framework</h4>
                        </div>
                        <ul>
                            <li><a href="UniversityOrdinance.html">University Ordinance</a></li>
                            <li><a href="#../senateMember.html">Senate Members</a></li>
                            <li><a href="#../syndicateMembers.html">Syndicate Members</a></li>
                            <li><a href="#UniversityStatutes.html">University Statutes</a></li>
                            <li><a href="#FinanceCommittee.html">Finance Committee</a></li>
                            <li><a href="#AcademicCouncil.html">Academic Council</a></li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection







