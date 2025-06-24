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

        .radio_container {
            display: flex;
            justify-content: space-around;
            align-items: center;
            background-color: #cecece;
            width: 420px;
            border-radius: 9999px;
            box-shadow: inset 0.5px 0.5px 2px 0 rgba(0, 0, 0, 0.15);
        }

        input[type="radio"] {
            appearance: none;
            display: none;
        }

        .radio_container label {
            font-size: .875rem;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: inherit;
            width: 160px;
            text-align: center;
            border-radius: 9999px;
            overflow: hidden;
            transition: linear 0.3s;
            margin-top: 8px;
        }

        input[type="radio"]:checked+label {
            background-color: #1e90ff;
            color: #f1f3f5;
            font-weight: 900;
            transition: 0.3s;
        }
    </style>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h4 class="m-0 text-dark">Academic Result Add</h4> --}}
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">@lang('Home')</a></li>
                        <li class="breadcrumb-item active">@lang('Academic Result')</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h5>
                        @if (isset($editData))
                            @lang('Academic Result') @lang('Update')
                        @else
                            @lang('Academic Result') @lang('Add')
                        @endif
                        <a class="btn btn-sm btn-info float-right" href="{{ route('setup.academic_result') }}"><i
                                class="fa fa-list"></i>
                            @lang('Academic Result') @lang('List')</a>
                    </h5>
                </div>
                <!-- Form Start-->
                <form method="post" action="{{ route('setup.academic_result.store') }}" id="myForm"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group col-sm-12">
                            <div class="container">
                                <div class="radio_container" id="type" name="type">
                                    <input type="radio" onclick="radio_handle(1)" class="type_id" name="type_id"
                                        id="radio_bup" value="1"
                                        {{ @$editData->type_id == '1' || @$editData->type_id == '' ? 'checked' : '' }}>
                                    <label for="radio_bup">In House</label>

                                    <input type="radio" onclick="radio_handle(2)" class="type_id" name="type_id"
                                        id="radio_affiliate" value="2" {{ @$editData->type_id == '2' ? 'checked' : '' }}>
                                    <label for="radio_affiliate">Affiliate Institute</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-sm-6">
                                <label class="control-label">Please Select Faculty</label>
                                <select id="faculty_id" @if (!empty($editData))  @endif
                                    class="form-control form-control-sm select2" name="faculty_id" >
                                    <option value="" selected>Please Select Faculty</option>

                                    @foreach ($faculties as $faculty)
                                        <option @if (!empty($editData) && $editData->faculty_id == $faculty->id) selected @endif
                                            value="{{ $faculty->id }}">
                                            {{ $faculty->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-sm-6">
                                <label class="control-label">Please Select Department</label>
                                <select id="department_id" @if (!empty($editData))  @endif
                                    class="form-control form-control-sm select2" name="department_id" >
                                    <option value="" selected>Please Select Department</option>
                                </select>

                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label">Please Select Program</label>
                                <select id="program_id" @if (!empty($editData))  @endif
                                    class="form-control form-control-sm select2" name="program_id">
                                    <option value="" selected>Select Program</option>
                                </select>

                            </div>
                            <div class="form-group col-sm-6">
                                <label>Session</label>
                                <input type="text" class="form-control @error('session') is-invalid @enderror"
                                    name="session" autocomplete="off" id="session"
                                    value="{{ !empty($editData->session) ? $editData->session : old('session') }}">
                                @error('session')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6">
                              <label>Date <span class="text-red">*</span></label>
                              <input id="date" type="date" value="{{ @$editData->date ? @$editData->date : old('date') }}" class="form-control @error('date') is-invalid @enderror" name="date" placeholder="Date"> @error('date')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>

                            <div class="form-group col-sm-6">
                                <label>Title <span class="text-red">*</span></label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    name="title" id="title" autocomplete="off"
                                    value="{{ !empty($editData->title) ? $editData->title : old('title') }}">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Status <span class="text-red">*</span></label>
                                <select name="status" class="form-control form-control-sm select2">
                                    <option value="">Please Select Type</option>
                                    <option {{ !empty($editData) && $editData->status == 1 ? 'selected' : '' }}
                                        value="1">
                                        Active</option>
                                    <option {{ !empty($editData) && $editData->status == 0 ? 'selected' : '' }}
                                        value="0">
                                        Inactive</option>
                                </select>
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Upload New Attachment<small style="color: brown"> (Max 2 mb,Preferred file: pdf,doc,docx,xlsx)</small><span
                                        class="text-red">*</span></label>
                                <input id="file" type="file" value="" multiple="multiple"
                                    class="form-control @error('file') is-invalid @enderror" name="file">
                                @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong> {{ $message }} </strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <button type="submit"
                                    class="btn btn-info">{{ @$editData ? 'Update' : 'Submit' }}</button>
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
        $(document).ready(function() {
            $('textarea').each(function() {
                $(this).val($(this).val().trim());
            });

            $('#myForm').validate({
              
                ignore: [],
                debug: false,
                rules: {
                    title: {
                        required: true,
                    },
                    status:{
                        required: true,
                    },
                    date: {
                        required: true,
                       
                    },
                    file: {
                        extension: "pdf|doc|docx|xlsx"
                    }
                },
    
                messages: {
                    title: {
                        required: "Title is required"
                    },
                    date: {
                        required: "Date is required"
                    },
                   
                    status: {
                        required: "Status is required"
                    },
                    file: {
                    
                        extension: "Please upload file in these format only (pdf,doc,docx,xlsx)."
                    }
                },
              //  errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
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



        $(document).on('select change', '#faculty_id', function() {
            var faculty_id = $('#faculty_id').val();
            // console.log(faculty_id);
            $.ajax({
                url: "{{ route('faculty_wise_department') }}",
                type: "GET",
                data: {
                    faculty_id: faculty_id
                },
                success: function(data) {
                    console.log(data);
                    if (data != 'fail') {
                        $('#department_id').html('<option value ="">Please Select Department</option>');
                        // $('#department_id').html('');
                        var selected = "{{ @$editData->department_id }}";
                        $.each(data.facultyWiseDepartment, function(index, department) {
                            console.log(department);
                            $('#department_id').append('<option value ="' + department.id +
                                '"' + ((department.id == selected) ? ('selected') : '') +
                                '>' + department.name + '</option>');
                        });
                    } else {
                        $('#department_id').append('');
                    }

                    $('#department_id').trigger('change');
                }
            });
        });

        $(document).on('select change', '#department_id', function() {
            var department_id = $('#department_id').val();
            console.log(department_id);
            $.ajax({
                url: "{{ route('department_wise_program') }}",
                type: "GET",
                data: {
                    department_id: department_id
                },
                success: function(data) {
                    // console.log(data);
                    if (data != 'fail') {
                        $('#program_id').html('<option value ="">Please Select Program</option>');
                        // $('#program_id').html('');
                        var selected = "{{ @$editData->program_id }}";

                        $.each(data, function(index, program) {
                            $('#program_id').append('<option value ="' + program.id + '"' + ((
                                    program.id == selected) ? ('selected') : '') + '>' +
                                program.program_title + '</option>');
                        });
                    } else {
                        $('#program_id').append('');
                    }
                }
            });
        });
    </script>

<script>
 
  $(function() {
      @if (@$editData->type_id == 2)
          radio_handle(2);
      @else
          radio_handle(1);
      @endif
  });


  function radio_handle(val) {
      var type_id_value = val;

      if(type_id_value == 2){
        $('#faculty_id').attr('disabled','disabled');
        $('#department_id').attr('disabled','disabled');
        $('#program_id').attr('disabled','disabled');
        $('#session').attr('disabled','disabled');
      }
      else{
        $('#faculty_id').removeAttr('disabled');
        $('#department_id').removeAttr('disabled');
        $('#program_id').removeAttr('disabled');
        $('#session').removeAttr('disabled');
      }
  };

</script>


@endsection
