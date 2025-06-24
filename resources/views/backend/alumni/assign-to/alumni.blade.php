@extends('backend.layouts.app')
@section('content')
    <style type="text/css">
        .i-style {
            display: inline-block;
            padding: 10px;
            width: 2em;
            text-align: center;
            font-size: 2em;
            vertical-align: middle;
            color: #444;
        }

        .demo-icon {
            cursor: pointer;
        }
    </style>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h4 class="m-0 text-dark">Assign member to alumni</h4> --}}
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">@lang('Home')</a></li>
                        <li class="breadcrumb-item active">Assign member to Alumni</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h5>
                        @if (isset($editData))
                            @lang('Update member to alumni')
                        @else
                            @lang('Assign member to alumni')
                        @endif
                        <a class="btn btn-sm btn-success float-right" href="{{ route('alumni.assign.to.alumni.list') }}"><i
                                class="fa fa-list"></i> @lang('Assign Member to Alumni List')</a>
                    </h5>
                </div>
                <!-- Form Start-->
                <form method="post"
                    action="{{ @$editData ? route('alumni.assign.to.alumni.update', $editData->id) : route('alumni.member.assign.to.alumni') }}"
                    id="myForm" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="faculty_name">Student <span class="text-red">*</span></label>

                                @if (@$editData->alumni_member_id)
                                    <input type="hidden" name="alumni_member_id" value="{{ @$editData->alumni_member_id }}">
                                @endif
                                <select class="form-control select2 @error('alumni_member_id') is-invalid @enderror"
                                    name="alumni_member_id" id="alumni_member_id" data-live-search="true"
                                    {{ @$editData ? 'disabled' : '' }}>
                                    <option value="">Please Select</option>
                                    @foreach ($students as $student)
                                        <option value="{{ $student->id }}"
                                            {{ @$editData->alumni_member_id == $student->id ? 'selected' : '' }}>
                                            {{ $student->name }} - {{ $student->student_id }} <span>
                                            </span></option>
                                    @endforeach
                                </select>
                                @error('alumni_member_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="faculty_name">Alumni <span class="text-red">*</span></label>
                                <select class="form-control @error('alumni_id') is-invalid @enderror select2" name="alumni_id"
                                    id="alumni_id" data-live-search="true">
                                    <option value="">Please Select</option>
                                    @foreach ($alumnis as $alumni)
                                        <option value="{{ $alumni->id }}"
                                            {{ @$editData->alumni_id == $alumni->id ? 'selected' : '' }}>
                                            {{ $alumni->name }}<span>
                                            </span></option>
                                    @endforeach
                                </select>
                                @error('alumni_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="faculty_name">Alumni Designations <span class="text-red">*</span></label>
                                {{-- @if(@$editData->alumni_designation_id)
                                @else
                                @endif --}}
                                <select class="form-control select2 @error('alumni_designation_id') is-invalid @enderror"
                                    name="alumni_designation_id" id="alumni_designation_id" data-live-search="true">
                                    <option value="">Please Select</option>
                                    @foreach ($alumni_designations as $alumni_designation)
                                        <option value="{{ $alumni_designation->id }}"
                                            {{ @$editData->alumni_designation_id == $alumni_designation->id ? 'selected' : '' }}>
                                            {{ $alumni_designation->name }}<span>
                                            </span></option>
                                    @endforeach
                                </select>
                                @error('alumni_designation_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>                    
                        
                         {{--  Start Date   --}}
                            <div class="form-group col-md-3">
                                <label for="">Start Date </label>
                                <input type="text" id="start_date"
                                    class="form-control @error('sort') is-invalid @enderror"
                                    name="start_date" value="{{ @$editData->join_date }}">
                                @error('sort')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                         {{--  End date   --}}
                            <div class="form-group col-md-3">
                                <label for="">End Date </label>
                                <input type="text" id="end_date"
                                    class="form-control @error('sort') is-invalid @enderror"
                                    name="end_date" value="{{ @$editData->expire_date }}">
                                @error('sort')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="status">@lang('Status') <span class="text-red">*</span></label>
                                <select class="form-control" id="status" name="status"
                                    aria-label=".form-select-lg example">
                                    <option value="">Please Select</option> 
                                    <option value="1" {{ @$editData->status == '1' ? 'selected' : '' }}>Active
                                    </option>
                                    <option value="0" {{ @$editData->status == '0' ? 'selected' : '' }}>Inactive
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <button type="submit"
                                    class="btn btn-primary">{{ @$editData ? 'Update' : 'Submit' }}</button>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
            <!--Form End-->
        </div>
    </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            var a1 = CKEDITOR.replace('long_title_en');
            CKFinder.setupCKEditor(a1, '/ckfinder/');
            var a1 = CKEDITOR.replace('long_title_bn');
            CKFinder.setupCKEditor(a1, '/ckfinder/');
        });
    </script>

    <script type="text/javascript">
        $(function() {
            $('#start_date').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                locale: {
                    format: 'DD-MM-YYYY',
                    daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                    firstDay: 0
                },
                minDate: "{{ !@$editData->join_date ? date('d-m-Y') : date('d-m-Y', strtotime(@$editData->join_date)) }}",
            });
        });
        $(function() {
            $('#end_date').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                locale: {
                    format: 'DD-MM-YYYY',
                    daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                    firstDay: 0
                },
                minDate: "{{ !@$editData->expire_date ? date('d-m-Y', strtotime("+1 day")) : date('d-m-Y', strtotime(@$editData->expire_date)) }}",
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            //   $('textarea').each(function(){
            //     $(this).val($(this).val().trim());
            //   });
            $('#myForm').validate({
                rules: {
                    alumni_member_id: {
                        required: true,
                    },
                    alumni_id:{
                        required: true,
                    },
                    alumni_designation_id: {
                        required: true,
                    
                    },
                               
                    status: {
                        required: true
                    }
                },

                messages: {
                    alumni_member_id: {
                        required: "Student Name is required."
                    },
                    alumni_id: {
                        required: "alumni ID is required."
                    },
                    alumni_designation_id: {
                        required: "alumni Designation is required.",
                        
                    },
                  
                    status: {
                        required: "Please select a status."
                    }
                },
                // errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('text-danger');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@endsection
