@extends('frontend.layouts.master-landing')

@php
    $page_title = 'Employee Directory';
@endphp

@section('title', $page_title)

@push('styles')
    <style>
        @media (min-width: 1200px) {
            .for_padding_like_container {
                padding-left: 10px;
            }
        }

        @media (min-width: 992px) {
            .for_padding_like_container {
                padding-left: 10px;
            }
        }

        @media (min-width: 768px) {
            .for_padding_like_container {
                padding-left: 10px;
            }
        }

        @media (min-width: 576px) {
            .for_padding_like_container {
                padding-left: 75px;
            }
        }

        @media (max-width: 758px) and (min-width: 278px) {
            .wrapper .option span {
                font-size: 11px !important;
            }

            .wrapper .option .dot {
                height: 10px !important;
                width: 12px !important;
            }

            .col-3 {
                /* width: 70% !important;
                     flex: 0 0 24% !important; */
                max-width: 23% !important;
            }

            .col-3 {
                /* width: 70% !important;
                     flex: 0 0 24% !important; */
                max-width: 21% !important;
            }

            .col-3 {
                max-width: 19% !important;
            }
        }

        @media (max-width: 404px) {
            .col-3 {
                /* width: 68% !important;
                flex: 0 0 6% !important;
                max-width: 21% !important;
                height: 69% !important; */
            }
        }

        @media (max-width: 991px) {
            .heading-content {
                font-size: 11px;
            }
        }

        @media (max-width: 760px) {
            .directory-content input {
                margin-top: 10px;
            }
        }
    </style>

    <style>
        .mb-3,
        .my-3 {
            margin-bottom: 0.3rem !important;
        }

        .round-image-right-curve img {
            height: 240px;
        }

        .title-text {
            padding: 15px;
            color: #fff;
        }

        .overlay {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            height: 100%;
            width: 100%;
            opacity: 0;
            transition: .5s ease;
            background-color: rgba(0, 178, 255, 0.5);
            z-index: 999;
        }

        .card {
            box-shadow: rgba(129, 126, 126, 0.1) 0px 4px 12px;
            margin-bottom: 20px;
        }

        .card:hover .overlay {
            opacity: 1;
        }

        .text {
            color: white;
            font-size: 20px;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            text-align: center;
        }

        .myRadioGroup {
            text-align: center;
        }

        .myRadioGroup input[type=checkbox],
        input[type=radio] {
            box-sizing: border-box;
            padding: 5px;
            margin-left: 6px;
        }

        .myRadioGroup span {
            margin-left: 5px;
        }

        .directory-content {
            margin-top: 14px;
        }

        .directory-content .OfficeName {
            height: 34px;
            /* width: 217px; */
            text-align: center;
        }

        .officerDetails {
            margin-top: 20px;
        }

        #category_id,
        #dept_id {
            padding: 10px;
        }

        .wrapper {
            /* display: inline-flex; */
            background: #fff;
            height: 100px;
            width: 80%;
            /* align-items: center;
                  justify-content: space-evenly; */
            border-radius: 5px;
            padding: 20px 15px;
            box-shadow: 5px 5px 30px rgba(0, 0, 0, 0.2);
            margin: 0 auto;
        }

        .wrapper .option {
            background: #fff;
            /* height: 100%;
            width: 100%; */
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            margin: 0 auto;
            border-radius: 5px;
            cursor: pointer;
            padding: 0 10px;
            border: 2px solid lightgrey;
            transition: all 0.3s ease;
        }

        .wrapper .option .dot {
            height: 20px;
            width: 20px;
            background: #d9d9d9;
            border-radius: 50%;
            position: relative;
        }

        .wrapper .option .dot::before {
            position: absolute;
            content: "";
            top: 4px;
            left: 4px;
            width: 12px;
            height: 12px;
            background: #00c5bf;
            border-radius: 50%;
            opacity: 0;
            transform: scale(1.5);
            transition: all 0.3s ease;
        }
        @media (max-width: 759px) {
            .wrapper .option .dot::before {
                top: 1px;
                left: 2px;
                width: 8px;
                height: 8px;
            }
        }
        .wrapper input[type="radio"] {
            display: none;
        }

        #radio_faculty:checked:checked~.radio_faculty,
        #radio_office:checked:checked~.radio_office,
        #radio_hall:checked:checked~.radio_hall {
            border-color: #00c5bf;
            background: #00c5bf;
        }

        #radio_faculty:checked:checked~.radio_faculty .dot,
        #radio_office:checked:checked~.radio_office .dot,
        #radio_hall:checked:checked~.radio_hall .dot {
            background: #fff;
        }

        #radio_faculty:checked:checked~.radio_faculty .dot::before,
        #radio_office:checked:checked~.radio_office .dot::before,
        #radio_hall:checked:checked~.radio_hall .dot::before {
            opacity: 1;
            transform: scale(1);
        }

        .wrapper .option span {
            font-size: 20px;
            color: #808080;
        }

        #radio_faculty:checked:checked~.radio_faculty span,
        #radio_hall:checked:checked~.radio_hall span,
        #radio_office:checked:checked~.radio_office span {
            color: #fff;
        }
    </style>

@endpush

@section('content')
@include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])
    {{-- <section class="counter-numbers" style="background: url({{ asset('public/frontend/images/banner/faculty.png') }})">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3 class="text-center my-font" style="color:white;">Employee Directory</h3>
                </div>
            </div>
        </div>
    </section> --}}

    <section>
        <div class="container">
            <div class="row">

                {{-- <div class="col-12 col-sm-6" style="background-color: #00c5bf; margin: 40px 0;">
                    <div class="row">
                        <div class="col-10 offset-0 offset-sm-2">
                            <h3 class="title-text my-font">Employee Directory</h3>
                        </div>
                    </div>

                </div> --}}
            </div>
        </div>
    </section>

    <section class="mt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12 fix-height">
                    <div class="card">
                        <div class="card-body ">
                            <div class="wrapper row text-center">

                                <input type="radio" onclick="radio_handle(1)" name="select" class="opt"
                                    id="radio_faculty" value="1">
                                <input type="radio" onclick="radio_handle(2)" name="select" class="opt"
                                    id="radio_office" value="2">
                                <input type="radio" onclick="radio_handle(3)" name="select" class="opt"
                                    id="radio_hall" value="3">
                                <label for="radio_faculty" class="option radio_faculty col-md-3  col-sm-4">
                                    <div class="dot"></div>
                                    <span>Faculty</span>
                                </label>
                                <label for="radio_office" class="option radio_office col-md-3  col-sm-4">
                                    <div class="dot"></div>
                                    <span>Office</span>
                                </label>
                                <label for="radio_hall" class="option radio_hall col-md-3  col-sm-4">
                                    <div class="dot"></div>
                                    <span>Hall</span>
                                </label>
                            </div>
                            <div class="heading-content ">
                                <div id="myRadioGroup" class="myRadioGroup">

                                    <div class="directory-content container">
                                        <div class="container row d-flex justify-content-center align-items-center">
                                            <div class="col-md-4 col-sm-8 d-flex flex-row justify-content-evenly align-items-center">
                                                <label for=""><span id="directoryName"></span></label>
                                                <select id="category_id" name="category_id" class="text-left" style="width: 60%;">
                                                    <option value="" selected>Please Select</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4 col-sm-8 d-flex flex-row justify-content-evenly align-items-center">
                                                <label for=""><span id="departmentName"></span></label>
                                                <select id="dept_id" name="dept_id" class="text-left" style="width: 60%;">
                                                    <option value="" selected>Please Select</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3 col-sm-6">
                                                <input type="radio" onclick="radio_rem(1)" class="mem_type" name="mem_type"
                                                    id="radio_all" value="1" checked>
                                                <label for="radio_all">All</label>
                                                <input type="radio" onclick="radio_rem(2)" class="mem_type" name="mem_type"
                                                    id="radio_teacher" value="2">
                                                <label for="radio_teacher">Teacher</label>
                                                <input type="radio" onclick="radio_rem(3)" class="mem_type" name="mem_type"
                                                    id="radio_officer" value="3">
                                                <label for="radio_officer">Officer</label>
                                            </div>

                                        </div>
                                        <br>
                                        <button class="btn btn-danger btn-lg border-0" id="resetBtn"
                                            style="float: left; color: #ffffff;">Reset</button>

                                        {{-- <a href="{{route('offices.employee_directory')}}" class="btn btn-danger btn-sm"
                                        style="float: left">Reset</a> --}}
                                        <br> <br>
                                    </div>
                                    <div class="table-responsive directory-content">
                                        <div class="card">
                                            <div class="directoryDetails card-header text-left">Details </div>
                                            <table id="employee_table1"
                                                class="table table-sm table-bordered table-striped text-left">
                                                <thead>
                                                    <tr>
                                                        <th width="5%">S/N</th>
                                                        <th width="10%">Image</th>
                                                        <th width="15%">Name</th>
                                                        <th width="10%">Designation</th>
                                                        <th width="15%">Email</th>
                                                        <th width="15%">Phone</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="employee_table">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function() {
            $(".directory-content").hide();
        });

        $(document).ready(function() {
            $('#resetBtn').on('click', function() {
                $("#category_id").val('');
                $("#dept_id").val('');
                $('#radio_all').prop('checked', true);
                $('#employee_table').html("");

            });
        });

        function radio_handle(val) {
            var category_type = val;
            if (category_type == 1) {
                $('#directoryName').html('Faculty Name: ');
                $(".directory-content").show();
                $('#departmentName').html('Department Name: ');
                $("#dept_id").show();
                $('#dept_id').closest('div').removeClass('d-none');
            } else if (category_type == 2) {
                $('#directoryName').html('Office Name: ');
                $(".directory-content").show();
                $('#departmentName').html('');
                $('#dept_id').hide();
                $('#dept_id').closest('div').addClass('d-none');
            } else if (category_type == 3) {
                $('#directoryName').html('Hall Name: ');
                $(".directory-content").show();
                $('#departmentName').html('');
                $('#dept_id').hide();
                $('#dept_id').closest('div').addClass('d-none');
            }
            $.ajax({
                url: "{{ route('type_wise_category_directory') }}",
                type: "GET",
                data: {
                    category_type: category_type,
                },
                success: function(data) {
                    if (data != 'fail') {
                        $('#category_id').html('<option value ="">Please Select</option>');

                        $.each(data, function(index, category) {
                            $('#category_id').append('<option value ="' + category.id + '">' + category.name + '</option>');
                        });
                        // alert(category_type);
                        // if (category_type == 2) {
                        //     $('#category_id').append('<option value ="-1">IQAC</option>');
                        // }
                        $('#category_id').trigger('change');
                    }
                }
            });

            // if (category_type == 1) {
                $('#category_id').on('change', function() {
                    var faculty_id = this.value;
                    $('#employee_table').html("");
                    if(faculty_id){
                        $.ajax({
                            url: "{{ route('faculty_wise_departments') }}",
                            type: "GET",
                            data: {
                                faculty_id: faculty_id
                            },
                            success: function(data) {
                            if (data != 'fail') {
                                $('#dept_id').html('<option value ="">Please Select</option>');
                                $.each(data.facultyWiseDepartment, function(index, department) {
                                    $('#dept_id').append('<option value ="' + department.id +
                                    '">' + department.name + '</option>');
                                });
                            } else {}
                            $('#dept_id').trigger('change');
                        }
                    });
                }else{
                    $('#dept_id').html('<option value ="">Please Select</option>');
                    $('#dept_id').trigger('change');
                }
                });
            // }
        };
    </script>

    <script>
        $('#dept_id').on('change', function() {
            member_list();
        });

        $('[name="mem_type"]').on('click', function() {
            member_list();
        });

        function member_list() {
            var category_type = $('input[name="select"]:checked').val();
            var category_id = $('#category_id').val();
            var dept_id = $('#dept_id').val();
            var radio_teacher = $('[name="mem_type"]:checked').val();
            $.ajax({
                url: "{{ route('category_wise_member') }}",
                type: "GET",
                data: {
                    category_id: category_id,
                    category_type: category_type,
                    dept_id: dept_id,
                    radio_teacher: radio_teacher,
                },
                success: function(data) {
                    $('#employee_table').html("");
                    let html = '';
                    if (data != 'fail') {
                        let sl = 1;
                        if (data.head) {
                            html += '<tr>';
                            html += '<td>' + (sl++) + '</td>';
                            html +=
                                '<td class="image_employee"> <img width=60 src = {{ asset('upload/profiles') }}/' +
                                data.head.photo + ' onerror="imgError(this);"></td>';
                            html += '<td>' + data.head.nameEn + '</td>';
                            if(category_type == 3){
                                html += '<td>Provost</td>';
                            }
                            else if(category_type == 1 && dept_id){
                                html += '<td>' + data.head.designation +' & Head of The Department</td>';
                            }
                            else if(category_type == 1){
                                html += '<td>Dean</td>';
                            }
                            else{
                                html += '<td>' + (data.head.designation ? data.head.designation : (data.head
                                        .additional_designation ? additional_designation : data.head
                                        .designation)) +
                                        '</td>';
                            }
                            html += '<td>' + data.head.email + '</td>';
                            html += '<td>' + data.head.phone + '</td>';
                            html += '</tr>';
                        }

                        if (data.members.length > 0) {
                            $.each(data.members, function(index, member) {
                                html += '<tr>';
                                html += '<td>' + (sl++) + '</td>';
                            if(category_type != 3){
                                html +=
                                    '<td class="image_employee"> <img width=60 src = {{ asset('upload/profiles') }}/' +
                                        member?.profile?.photo + ' onerror="imgError(this);"></td>';
                                html += '<td>' + member.profile.nameEn + '</td>';
                                html += '<td>' + (member.additional_designation ? member.designation.name : (member
                                    .designation ? member.designation :
                                    member.profile.designation)) +
                                    '</td>';
                                
                                html += '<td>' + member.profile.email + '</td>';
                                html += '<td>' + member.profile.phone + '</td>';
                                html += '</tr>';
                            }
                            if(category_type == 3){
                                html +=
                                    '<td class="image_employee"> <img width=60 src = {{ asset('upload/profiles') }}/' +
                                        member?.member?.photo + ' onerror="imgError(this);"></td>';
                                html += '<td>' + member.member.nameEn + '</td>';
                                html += '<td>' + (member.member.designation ? member.member.designation :
                                    (member.member.personnel_type == 1 ? 'House Tutor' : member.member.designation)) +
                                    '</td>';
                                html += '<td>' + member.member.email + '</td>';
                                html += '<td>' + member.member.phone + '</td>';
                                html += '</tr>';
                            }
                        });
                        }
                        $('#employee_table').html(html);
                    }
                }
            });
        }

        function imgError(image) {
            image.onerror = "";
            image.src = "{{ asset('upload/user-dummy.jpeg') }}";
            return true;
        }
    </script>

@endsection
