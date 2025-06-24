@extends('frontend.landing')
@php
    $page_title = $category->program_category . ' Program';
@endphp
@section('title')
    {{ $page_title }}
@endsection
@section('content')
    @include('frontend.partials.sections.banner', ['page_title' => $page_title])

    <main class="container my-5">
        <!-- Academics Card -->
        <section class="">
            <div class="row">
                <div class="col-lg-4 ">
                    <div class="mb-3 program-type">
                        <form class="filter-form">
                            <input name="program_category_id" type="hidden" value="{{ request()->id }}">
                            <div class="shadow pb-3 mb-5 rounded program-type ">
                                <h1 class="text-white text-uppercase fw-bolder py-3 ps-3 fs-5 mb-0 mt-0 common-bg-color"
                                    style="width: 100%;">Faculty</h1>
                                @php
                                    $fall = App\Models\Program::where('program_category_id', request()->id)->count('faculty_id');
                                @endphp
                                <div class="program-text py-3 mx-3 border-bottom">
                                    <label for="faculty_id2222" class="d-flex justify-content-between align-items-center">
                                        <input type="radio" ref="faculty" checked value="" name="faculty_id"
                                            id="faculty_id2222">
                                        <h1 class="fs-6 fw-bold ">
                                            All &nbsp
                                            {{-- <span class="badge text-bg-warning">{{ $fall }}</span> --}}
                                        </h1>
                                        <span class="badge text-bg-warning fs-6">{{ $fall }}</span>
                                    </label>
                                </div>
                                @foreach ($faculties as $key => $f)
                                    @php
                                        $b = App\Models\Program::where('program_category_id', request()->id)
                                            ->where('faculty_id', $f->id)
                                            ->count('faculty_id');
                                    @endphp
                                    @continue($b == 0)
                                    <div id="faculty_div{{ $key }}" class="program-text  py-3 mx-3 border-bottom">
                                        <input type="radio" ref="faculty" value="{{ $f->id }}" name="faculty_id"
                                            id="faculty_id{{ $key }}">
                                        <label for="faculty_id{{ $key }}"
                                            class=" d-flex justify-content-between align-items-center">
                                            <h1 class="fs-6 pe-3 fw-bold">
                                                {{ $f->name }} &nbsp
                                                {{-- <span class="badge text-bg-warning">{{ $b }}</span> --}}
                                            </h1>
                                            <span class="badge text-bg-warning fs-6">{{ $b }}</span>
                                        </label>
                                    </div>
                                    @php
                                        $dall = App\Models\Program::where('program_category_id', request()->id)->count('department_id');
                                    @endphp
                                    <script>
                                        $(document).on('select change', '[id^="faculty_id{{ isset($key) ? $key : '' }}"]', function() {
                                            var faculty_id = $('#faculty_id{{ $key }}').val();
                                            //    var faculty_id = $(this).val();
                                            //    alert(faculty_id);
                                            // Scroll to the top of the window
                                            $(window).scrollTop(0);
                                            $.ajax({
                                                url: "{{ route('faculty_wise_department_front') }}",
                                                type: "GET",
                                                data: {
                                                    faculty_id: faculty_id,
                                                    program_category_id: document.querySelector('input[name="program_category_id"]').value,
                                                },
                                                success: function(data) {
                                                    if (data != 'fail') {
                                                        let html = '';
                                                        for (let i = 0; i < data.facultyWiseDepartment.length; i++) {
                                                            var departmentCount;
                                                            $.ajax({
                                                                url: "{{ route('department_wise_program_count') }}",
                                                                type: "GET",
                                                                data: {
                                                                    department_id: data.facultyWiseDepartment[i]['id'],
                                                                    program_category_id: document.querySelector(
                                                                        'input[name="program_category_id"]').value,
                                                                },
                                                                success: function(response) {


                                                                    // Handle the response data here
                                                                    departmentCount = response.countDepartment;
                                                                    // console.log(response.countDepartment);
                                                                    // console.log("count = " + departmentCount);
                                                                    html += ` <div class="program-text py-3 mx-3 border-bottom">
                                                                        <input type="radio" ref="department" value="${data.facultyWiseDepartment[i]['id']}"
                                                                            name="department_id" id="department_id${i}">
                                                                        <label for="department_id${i}" class="d-flex justify-content-between align-items-center">
                                                                            <h1 class="fs-6 pe-3 fw-bold">
                                                                                ${data.facultyWiseDepartment[i]['name']} &nbsp    
                                                                            </h1>
                                                                            <span class="badge text-bg-warning fs-6">${departmentCount}</span>
                                                                        </label>
                                                                    </div>`
                                                                    // console.log(html);
                                                                    htmlOuterDiv = `<h1 class="text-white text-uppercase fw-bolder py-3 ps-3 fs-5 mb-0 mt-0 "
                                                                        style="width: 100%; background-color: #50A2CA">Department</h1>
                                                                        <div class="program-text py-3 mx-3 border-bottom">
                                                                            <label for="department_id2222" class="d-flex justify-content-between align-items-center">
                                                                                <input type="radio" ref="department" checked value="" name="department_id" id="department_id2222">
                                                                                <h1 class="fs-6 fw-bold"> All</h1> 
                                                                                <span class="badge text-bg-warning fs-6">${data.countFacultyWiseAllProgram}</span>
                                                                            </label>
                                                                        </div>
                                                                        ${html}`

                                                                    document.getElementById('department_div').innerHTML =
                                                                        htmlOuterDiv;


                                                                }

                                                            });

                                                        }
                                                    } else {
                                                        console.log('failed');
                                                    }
                                                }
                                            });
                                        });
                                    </script>
                                @endforeach
                            </div>

                            <div id="department_div" class="shadow pb-3 rounded">
                                <h1 class="text-white text-uppercase fw-bolder py-3 ps-3 fs-5 mb-0 mt-0 "
                                    style="width: 100%; background-color: #50A2CA">Department</h1>
                                @php
                                    $dall = App\Models\Program::where('program_category_id', request()->id)->count('department_id');
                                @endphp
                                <div class="program-text py-3 mx-3 border-bottom">
                                    <label for="department_id2222"
                                        class=" d-flex justify-content-between align-items-center">
                                        <input type="radio" ref="department" checked value="" name="department_id"
                                            id="department_id2222">
                                        <h1 class="fs-6 fw-bold">
                                            All &nbsp
                                            {{-- <span class="badge text-bg-warning">{{ $dall }}</span> --}}
                                        </h1>
                                        <span class="badge text-bg-warning fs-6">{{ $dall }}</span>
                                    </label>
                                </div>
                                @foreach ($departments as $key => $d)
                                    @php
                                        $b = App\Models\Program::where('program_category_id', request()->id)
                                            ->where('department_id', $d->id)
                                            ->count('department_id');
                                    @endphp
                                    @continue($b == 0)
                                    <div class="program-text py-3 mx-3 border-bottom">
                                        <input type="radio" ref="department" value="{{ $d->id }}"
                                            name="department_id" id="department_id{{ $key }}">
                                        <label for="department_id{{ $key }}"
                                            class=" d-flex justify-content-between align-items-center">
                                            <h1 class="fs-6 pe-3 fw-bold">
                                                {{ $d->name }} &nbsp
                                                {{-- <span class="badge text-bg-warning">{{ $b }}</span> --}}
                                            </h1>
                                            <span class="badge text-bg-warning fs-6">{{ $b }}</span>
                                        </label>
                                    </div>
                                @endforeach

                            </div>
                        </form>

                    </div>
                </div>

                <div class="col-lg-8">
                    <div id="display_services" class=" row">
             {{--  Data show    --}}
                        @foreach (@$programs as $pr)
                            {{-- <div class="academics-card mb-4 rounded col-lg-4 col-md-6">
                                <div class="academics-card-icon text-center p-3 shadow rounded">
                                    <a href="{{ route('academics.academics_admission_details', $pr->id) }}">
                                    <p class="fs-6 text-center mt-3">{{ $pr->program_title }}</p>
                                    </a>
                                </div>
                            </div> --}}
                            <div class="col-12 pb-3">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-12 shadow rounded p-3 common-bg-color" style="background: #10C45C !important;">
                                        <h1 class="fs-5 fw-bold m-0">
                                            <a href="{{ route('academics.academics_admission_details', $pr->id) }}"
                                                class="news-title text-dark">{{ $pr->program_title }}
                                            </a>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script>
        //  $(document).on('select change','#faculty_id',function(){
        //     var faculty_id = $('#faculty_id').val();
        //     $.ajax({
        //         url: "{{ route('faculty_wise_department') }}",
        //         type: "GET",
        //         data: { faculty_id: faculty_id },
        //         success: function(data)
        //         {
        //             if(data != 'fail')
        //             {
        //                 $('#department_id').empty();
        //                 $('#department_id').append('<option disabled selected value ="">Select Department</option>');
        //                 $.each(data,function(index,subcatObj){
        //                     $('#department_id').append('<option value ="'+subcatObj.id+'">'+subcatObj.name +'</option>');
        //                 });
        //             }
        //             else
        //             {
        //                 console.log('failed');
        //             }
        //         }
        //     });
        // });


        addEventListener('click', (e) => {
            if (e.target.getAttribute("ref") == "faculty" || e.target.getAttribute("ref") == "department") {
                // Scroll to the top of the window
                $(window).scrollTop(0);
                if (e.target.getAttribute("ref") == "faculty") {
                    document.querySelector('input[name="department_id"]:checked').value = null;
                }
                console.log("faculty id second" + document.querySelector('input[name="faculty_id"]:checked').value);
                console.log("department id second" + document.querySelector('input[name="department_id"]:checked')
                    .value);
                $.ajax({
                    // url: 'academicsId_srch',
                    url: "{{ route('academicsId_srch') }}",
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        faculty: document.querySelector('input[name="faculty_id"]:checked') == null ? null :
                            document.querySelector('input[name="faculty_id"]:checked').value,
                        department: document.querySelector('input[name="department_id"]:checked') == null ?
                            null : document.querySelector('input[name="department_id"]:checked').value,
                        program_category_id: document.querySelector('input[name="program_category_id"]')
                            .value,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        let html = '';
                        for (let i = 0; i < data.length; i++) {
                            //   console.log(data[i]['program_title'])
                            html +=
                                //         `<div class="academics-card mb-4 rounded col-lg-4 col-md-6">
                            //     <div class="academics-card-icon text-center p-3 shadow rounded">
                            //         <a href="../../academics/academics_admission_details/${data[i]['id']}">

                            //             <p class="fs-6 text-center mt-3">${data[i]['program_title']}</p>
                            //         </a>
                            //     </div>
                            // </div>`
                                `<div class="col-12 pb-3">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-12 shadow rounded p-3" style="background: #10C45C !important;">
                                        <h1 class="fs-5 fw-bold m-0">
                                            <a href="../../academics/academics_admission_details/${data[i]['id']}"
                                                class="news-title text-dark">${data[i]['program_title']}
                                            </a>
                                        </h1>
                                    </div>
                                </div>
                            </div>`
                        }

                        document.getElementById('display_services').innerHTML = html;
                    },
                    error: function(response) {},
                });
            }
        });
    </script>

@endsection
