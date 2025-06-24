{{-- @extends('frontend.layouts.master-landing') --}}
@extends('frontend.department.tamplate_four.partials.main-second')

@php
    $page_title = $info->program_title;
@endphp
@section('title')
    {{ $page_title }}
@endsection
@section('content')
    {{-- @include('frontend.partials.sections.banner', ['page_title' => $page_title]) --}}

    @include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])
    
    <style>
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
            background: #00c5bf;
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
        .accordion-header > button {
            border-color: #ddd;
        }
        .accordion-button:not(.collapsed) {
            color: #ffffff;
            background-color: #B5212D;
            box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .125);
        }
        .accordion-button:focus {
            box-shadow: none;
        }
    </style>
@php
    $department = \App\Models\Department::find($info->department_id);
@endphp
    <section class="my-5">
        <div class="academic-details">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="aboutSidebar">
                            <ul class="m-0">
                                <li class="tablinks active  fs-6 fw-bold rounded shadow" onclick="openTab(event, 'outline')"> Outline</li>
                                <li class="tablinks fs-6 fw-bold rounded shadow" onclick="openTab(event, 'admission')"> Admission Criteria
                                </li>
                                <li class="tablinks fs-6 fw-bold rounded shadow" onclick="openTab(event, 'general')"> General Guideline</li>
                                <li class="tablinks fs-6 fw-bold rounded shadow" onclick="openTab(event, 'course')"> Course List</li>
                                <li class="tablinks fs-6 fw-bold rounded shadow" onclick="openTab(event, 'news')"> News</li>
                                <li class="tablinks fs-6 fw-bold rounded shadow" onclick="openTab(event, 'event')"> Event</li>
                                <li class="tablinks fs-6 fw-bold rounded shadow" onclick="openTab(event, 'notice')"> Notice</li>
                                <li class="tablinks fs-6 fw-bold rounded shadow" onclick="openTab(event, 'faq')"> Faq</li>

                            </ul>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="fs-4 fw-bold pt-2">Faculty: {{ $info->fname }}</h2>
                                <h2 class="fs-6">Department: {{ $info->dname }}</h2>
                                <h2 class="fs-6 fw-bolder">Program: {{ $info->program_title }}</h2>
                                {{-- <h2 class="fs-6 fw-bolder">Program: {{ $info->pcname }}</h2> --}}
                            </div>

                            <div class="card-body">
                                <div class="tab-content">
                                    <div id="outline" class="tabcontent active">
                                        {{--  @if ($info->objective)
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
                                        @endif  --}}
                                        @if ($info->outline)
                                            <h3 class="fs-4 pt-2">Course Outline</h3>
                                            <p class="text-justify">{!! $info->outline !!}</p>
                                        @endif



                                    </div>
                                    <div id="admission" class="tabcontent">
                                        <p> {!! $info->admission_criteria !!}</p>
                                    </div>
                                    <div id="general" class="tabcontent">
                                        <p> {!! $info->general_guidline !!}</p>
                                    </div>
                                    <div id="course" class="tabcontent">
                                        {{-- @foreach ($courses->groupBy('semester_no') as $key => $item)
                                            <section class="rounded shadow" style="background: #00c5bf !important;">
                                                @if ($key == 1)
                                                    <p class="text-white fs-5 p-2 fw-bold text-uppercase" style="letter-spacing: 2px;">1st Semester</p>
                                                @elseif ($key == 2)
                                                    <p class="text-white fs-5 p-2 fw-bold text-uppercase" style="letter-spacing: 2px;">2nd Semester</p>
                                                @elseif ($key == 3)
                                                    <p class="text-white fs-5 p-2 fw-bold text-uppercase" style="letter-spacing: 2px;">3rd Semester</p>
                                                @elseif ($key == 4)
                                                    <p class="text-white fs-5 p-2 fw-bold text-uppercase" style="letter-spacing: 2px;">4th Semester</p>
                                                @elseif ($key == 5)
                                                    <p class="text-white fs-5 p-2 fw-bold text-uppercase" style="letter-spacing: 2px;">5th Semester</p>
                                                @elseif ($key == 6)
                                                    <p class="text-white fs-5 p-2 fw-bold text-uppercase" style="letter-spacing: 2px;">6th Semester</p>
                                                @elseif ($key == 7)
                                                    <p class="text-white fs-5 p-2 fw-bold text-uppercase" style="letter-spacing: 2px;">7th Semester</p>
                                                @elseif ($key == 8)
                                                    <p class="text-white fs-5 p-2 fw-bold text-uppercase" style="letter-spacing: 2px;">8th Semester</p>
                                                @else
                                                    <p class="text-white fs-5 p-2 fw-bold text-uppercase" style="letter-spacing: 2px;">--</p>
                                                @endif
                                            </section>
                                            @foreach ($item as $course)
                                                @php
                                                    $objectives = App\Models\CourseObjective::where('course_id', $course->id)->get();
                                                    $outcomes = App\Models\CourseOutcome::where('course_id', $course->id)->get();
                                                    $references = App\Models\CourseReference::where('course_id', $course->id)->get();

                                                @endphp
                                                <div class="border-bottom py-3 px-2 course-header d-flex justify-content-between" data-course-id="{{ @$course->id }}" style="cursor: pointer" data-bs-toggle="collapse" data-bs-target="#collapse{{ @$course->id }}" aria-expanded="false">
                                                    <span>{{ @$course->formal_code }} | {{ @$course->title }}</span>
                                                    <span class=""><i class="fas fa-chevron-down slide-icon" id="chevron-{{ $course->id }}"></i></span>
                                                </div>
                                                <div class="collapse m-3 course-details course-{{ @$course->id }}" id="collapse{{ $course->id }}" data-course-id="{{ @$course->id }}">
                                                    <div class="card card-body shadow-sm">
                                                        <div>
                                                            <p class="fw-bold ">Objectives</p>
                                                            <ul class="list-group list-group-flush">
                                                                @forelse ($objectives as $objective)
                                                                    <li class="list-group-item">{{ $objective->title }}</li>
                                                                @empty
                                                                    <li class="list-group-item">No objective found!</li>
                                                                @endforelse
                                                            </ul>
                                                        </div>
                                                        <div class="mt-3">
                                                            <p class="fw-bold ">Outcomes</p>
                                                            <ul class="list-group list-group-flush">
                                                                @forelse ($outcomes as $outcome)
                                                                    <li class="list-group-item">{{ $outcome->title }}</li>
                                                                @empty
                                                                    <li class="list-group-item">No outcome found!</li>
                                                                @endforelse
                                                            </ul>
                                                        </div>

                                                        <div class="mt-3">
                                                            <p class="fw-bold ">References</p>
                                                            <ul class="list-group list-group-flush">
                                                                @forelse ($references as $reference)
                                                                    <li class="list-group-item">{{ $reference->title }}</li>
                                                                @empty
                                                                    <li class="list-group-item">No reference found!</li>
                                                                @endforelse
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endforeach --}}
                                        <p> {!! $info->course_list !!}</p>
                                    </div>
                                    <div id="news" class="tabcontent">
                                        <ul class="list-group" id="program_news">
                                            @forelse ($news as $item)
                                                <li class="list-group-item">
                                                    <div class="card-body">
                                                        <h5 class="card-title fs-4" style="text-align: justify; font-size:15px;">
                                                            <a href="{{ route('type.details', ["id"=>$item->id,"type"=>'news']) }}" target="_blank">{{ $item->title }}</a>
                                                        </h5>
                                                        <div class="card-text mb-1">
                                                            <span>Published: {{ \Carbon\Carbon::parse($item->date)->format('d M, Y') }}</span>
                                                        </div>
                                                        <a href="{{ route('type.details', ["id"=>$item->id,"type"=>'news']) }}" target="_blank">
                                                            <button type="button" class="btn btn-sm rounded-pill"><i class="fas fa-plus" style="color: #1C4370;"></i> Read more</button>
                                                        </a>
                                                    </div>
                                                </li>
                                            @empty
                                                <p class="m-2">No News Found For This Program</p>
                                            @endforelse
                                        </ul>
                                    </div>
                                    <div id="event" class="tabcontent">
                                        <ul class="list-group" id="program_event">
                                            @forelse ($events as $item)
                                                <li class="list-group-item">
                                                    <div class="card-body">
                                                        <h5 class="card-title fs-4" style="text-align: justify; font-size:15px;">
                                                            <a href="{{ route('type.details', ["id"=>$item->id,"type"=>'event']) }}" target="_blank">{{ $item->title }}</a>
                                                        </h5>
                                                        <div class="card-text mb-1">
                                                            <span>Published: {{ \Carbon\Carbon::parse($item->date)->format('d M, Y') }}</span>
                                                        </div>
                                                        <a href="{{ route('type.details', ["id"=>$item->id,"type"=>'event']) }}" target="_blank">
                                                            <button type="button" class="btn btn-sm rounded-pill"><i class="fas fa-plus" style="color: #1C4370;"></i> Read more</button>
                                                        </a>
                                                    </div>
                                                </li>
                                            @empty
                                                <p class="m-2">No Events Found For This Program</p>
                                            @endforelse
                                        </ul>
                                    </div>

                                    <div id="notice" class="tabcontent">
                                        <div class="d-flex justify-content-around">
                                            <div class="form-check">
                                                <input class="form-check-input" ref="notices" value="" type="radio" name="notices" id="notices1" checked>
                                                <label class="form-check-label" for="notices1" style="margin-top: 2px;">
                                                    All
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" ref="notices" value="1" type="radio" name="notices" id="notices2">
                                                <label class="form-check-label" for="notices2" style="margin-top: 2px;">
                                                    Results
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" ref="notices" value="2" type="radio" name="notices" id="notices3">
                                                <label class="form-check-label" for="notices3" style="margin-top: 2px;">
                                                    Administrative
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" ref="notices" value="3" type="radio" name="notices" id="notices4">
                                                <label class="form-check-label" for="notices4" style="margin-top: 2px;">
                                                    Academic
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" ref="notices" value="4" type="radio" name="notices" id="notices5">
                                                <label class="form-check-label" for="notices5" style="margin-top: 2px;">
                                                    Program
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" ref="notices" value="6" type="radio" name="notices" id="notices7">
                                                <label class="form-check-label" for="notices7" style="margin-top: 2px;">
                                                    Tender 
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" ref="notices" value="5" type="radio" name="notices" id="notices6">
                                                <label class="form-check-label" for="notices6" style="margin-top: 2px;">
                                                    Affiliated
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" ref="notices" value="7" type="radio" name="notices" id="notices8">
                                                <label class="form-check-label" for="notices8" style="margin-top: 2px;">
                                                    Others 
                                                </label>
                                            </div>
                                        </div>
                                        <ul class="list-group" id="program_notice"> 
                                        </ul>
                                    </div>
                                    <div id="faq" class="tabcontent">
                                        @foreach ($faqs as $key => $item)
                                        <div class="accordion" id="accordionExample">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$key}}"
                                                        aria-expanded="false" aria-controls="collapse{{$key}}">
                                                        {{$item->question}}
                                                    </button>
                                                </h2>
                                                <div id="collapse{{$key}}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        {!! $item->answer !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

    </section>

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
        $(document).ready(function () {
            var programId = {{ $info->id }}; 
            // Function to handle updating notices via AJAX
            function updateNotices(url) {
                $.ajax({
                    url: url,  // The URL to fetch data from (pagination or filter)
                    method: 'GET',
                    data: { 
                        program_id: programId,  // Send program_id to the controller
                        type: $('input[name="notices"]:checked').val()  // Send the selected filter type
                    },
                    success: function(response) {
                        // Replace the #program_notice content with the new filtered notices
                        $('#program_notice').html(response);
                    },
                    error: function(xhr, status, error) {
                        console.error('An error occurred:', error);
                    }
                });
            }
        
            // Handle radio button change (filtering notices)
            $('input[name="notices"]').on('change', function () {
                var selectedType = $(this).val();  // Get the selected radio button value
                var url = '{{ route('academics.academics_details.notices.filter') }}';  // Construct the URL for the request
                updateNotices(url);  // Update the notices via AJAX
            });
        
            // Handle pagination clicks
            $(document).on('click', '.pagination a', function (e) {
                e.preventDefault();  // Prevent the default link behavior (which would cause a page reload)
                var url = $(this).attr('href');  // Get the href attribute of the pagination link
                updateNotices(url);  // Update the notices list with the new page of data
            });
            var selectedType = $('input[name="notices"]').val();  
            var url = '{{ route('academics.academics_details.notices.filter') }}';  // Construct the URL for the request
            updateNotices(url);
        });
    </script>        
        
@endsection
