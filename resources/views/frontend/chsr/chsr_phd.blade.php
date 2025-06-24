@extends('frontend.chsr.landing')

@php
    $page_title = 'PHD';
@endphp
@section('title')
    {{ $page_title }}
@endsection
<style>
    .academic-details {
        
        font-size: 1rem;
    }

    .aboutSidebar ul li {
        background: #00c5bf;
        color: white;
        margin-bottom: 16px;
        border-left: 8px solid #ffb606;
        cursor: pointer;
        padding: 10px;
        color: #fff;
        -webkit-transition: all 200ms linear !important;
        -moz-transition: all 200ms linear !important;
        -ms-transition: all 200ms linear !important;
        -o-transition: all 200ms linear !important;
        transition: all 200ms linear !important;

    }

    .aboutSidebar ul li:hover, .aboutSidebar ul li.active {
        background: #ffb606;
        border-left: 8px solid #00c5bf;
        color: #000;
    }

    .aboutSidebar ul a {
        color: black;
        text-decoration: none;
    }

    .tab-content div {
        display: none
    }
</style>
@section('content')

{{-- Banner --}}
@include('frontend.partials.sections.banner_chsr', ['page_title' => $page_title])

<section>
    <div class="academic-details my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="aboutSidebar">
                        <ul>
                            <li class="tablinks active  fs-6 fw-bold rounded shadow" onclick="openTab(event, 'outline')"> Outline</li>
                            <li class="tablinks fs-6 fw-bold rounded shadow" onclick="openTab(event, 'admission')"> Admission Criteria
                            </li>
                            <li class="tablinks fs-6 fw-bold rounded shadow" onclick="openTab(event, 'general')"> General Guideline</li>
                            <li class="tablinks fs-6 fw-bold rounded shadow" onclick="openTab(event, 'course')"> Course List</li>

                        </ul>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="fs-4 fw-bold text-primary pt-2">Faculty: {{ $info->fname }}</h2>
                            <h2 class="fs-6">Department: {{ $info->dname }}</h2>
                            <h2 class="fs-6 fw-bolder">Program: {{ $info->program_title }}</h2>
                            {{-- <h2 class="fs-6 fw-bolder">Program: {{ $info->pcname }}</h2> --}}
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div id="outline" class="tabcontent active">
                                    @if ($info->objective)
                                        <h3 class="text-success fs-4">Objective</h3>
                                        <p class="text-justify"> {!! $info->objective !!}</p>
                                    @endif
                                    @if ($info->mission)
                                        <h3 class="text-success fs-4 pt-2">Mission</h3>
                                        <p class="text-justify">{!! $info->mission !!}</p>
                                    @endif
                                    @if ($info->vision)
                                        <h3 class="text-success fs-4 pt-2">Vision</h3>
                                        <p class="text-justify">{!! $info->vision !!}</p>
                                    @endif



                                </div>
                                <div id="admission" class="tabcontent">
                                    <p> {!! $info->admission_criteria !!}</p>
                                </div>
                                <div id="general" class="tabcontent">
                                    <p> {!! $info->general_guidline !!}</p>
                                </div>
                                <div id="course" class="tabcontent">
                                    @foreach ($courses->groupBy('semester_no') as $key => $item)
                                        <section class="bg-success rounded">
                                            @if ($key == 1)
                                                <p class="text-white fs-5 p-2 fw-bold text-uppercase"
                                                    style="letter-spacing: 2px;">1st Semester</p>
                                            @elseif ($key == 2)
                                                <p class="text-white fs-5 p-2 fw-bold text-uppercase"
                                                    style="letter-spacing: 2px;">2nd Semester</p>
                                            @elseif ($key == 3)
                                                <p class="text-white fs-5 p-2 fw-bold text-uppercase"
                                                    style="letter-spacing: 2px;">3rd Semester</p>
                                            @elseif ($key == 4)
                                                <p class="text-white fs-5 p-2 fw-bold text-uppercase"
                                                    style="letter-spacing: 2px;">4th Semester</p>
                                            @elseif ($key == 5)
                                                <p class="text-white fs-5 p-2 fw-bold text-uppercase"
                                                    style="letter-spacing: 2px;">5th Semester</p>
                                            @elseif ($key == 6)
                                                <p class="text-white fs-5 p-2 fw-bold text-uppercase"
                                                    style="letter-spacing: 2px;">6th Semester</p>
                                            @elseif ($key == 7)
                                                <p class="text-white fs-5 p-2 fw-bold text-uppercase"
                                                    style="letter-spacing: 2px;">7th Semester</p>
                                            @elseif ($key == 8)
                                                <p class="text-white fs-5 p-2 fw-bold text-uppercase"
                                                    style="letter-spacing: 2px;">8th Semester</p>
                                            @else
                                                <p class="text-white fs-5 p-2 fw-bold text-uppercase"
                                                    style="letter-spacing: 2px;">--</p>
                                            @endif
                                        </section>

                                        @foreach ($item as $course)
                                            <p class="fs-6 font-work-sans">{{ $course->formal_code }} |
                                                {{ $course->title }} </p>
                                        @endforeach
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

</section>

@endsection

@section('script')

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


@endsection