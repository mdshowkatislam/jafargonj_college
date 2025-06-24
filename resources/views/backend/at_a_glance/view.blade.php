@extends('backend.layouts.app')
@section('content')
    <div class="col-xl-12">
        <div class="breadcrumb-holder">
            <ol class="breadcrumb float-right mt-3">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><strong>@lang('Home')</strong></a></li>
                <li class="breadcrumb-item active">@lang('At A Glance Numbers')</li>
            </ol>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="container fullbody">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h5>At A Glance Numbers</h5>
                </div>
                <!-- Form Start-->
                <form id="myForm" method="post" action="{{ !empty($editData->id) ? route('site-setting.at_a_glance.update', $editData->id) : route('site-setting.at_a_glance.store') }}" enctype="multipart/form-data" id="myForm">
                    @csrf
                    <div class="card-body">
                        <div class="show_module_more_event">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="student_number">@lang('Number of Student') <span class="text-red">*</span></label>
                                    <input id="student_number" type="text" name="student_number" class="form-control @error('student_number') is-invalid @enderror" value="{{ @$editData->student_number }}" placeholder="">
                                    @error('student_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="faculty_member_number">@lang('Number of Faculty Member') <span class="text-red">*</span></label>
                                    <input id="faculty_member_number" type="text" name="faculty_member_number" class="form-control @error('faculty_member_number') is-invalid @enderror" value="{{ @$editData->faculty_member_number }}" placeholder="">
                                    @error('faculty_member_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="officer_number">@lang('Number of Officer') <span class="text-red">*</span></label>
                                    <input id="officer_number" type="text" name="officer_number" class="form-control @error('officer_number') is-invalid @enderror" value="{{ @$editData->officer_number }}" placeholder="">
                                    @error('officer_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="staff_number">@lang('Number of Staff') <span class="text-red">*</span></label>
                                    <input id="staff_number" type="text" name="staff_number" class="form-control @error('staff_number') is-invalid @enderror" value="{{ @$editData->staff_number }}" placeholder="">
                                    @error('staff_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="phd_number">@lang('Affiliated Colleges') <span class="text-red">*</span></label>
                                    <input id="phd_number" type="text" name="phd_number" class="form-control @error('phd_number') is-invalid @enderror" value="{{ @$editData->phd_number }}" placeholder="">
                                    @error('phd_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="research_time">@lang('Research Date') </label>
                                    <input id="research_time" type="date" name="research_time" class="form-control @error('research_time') is-invalid @enderror" value="{{ @$editData->research_time }}" placeholder="">
                                    @error('research_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                            </div>
                            <div class="form-group col-md-2" style="">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    @if (isset($editData))
                                        @lang('Update')
                                    @else
                                        @lang('Save')
                                    @endif
                                </button>
                            </div>
                        </div>
                    </div>

                </form>
                <!--Form End-->
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
        //   $('textarea').each(function(){
        //     $(this).val($(this).val().trim());
        //   });
          $('#myForm').validate({
            rules: {
                student_number: {
                required: true,
                digits:true
              },
           
              faculty_member_number:{
                required: true,
                digits:true
              },
              officer_number:{
                required: true,
                digits:true
              },
              staff_number:{
                required: true,
                digits:true
              },
              phd_number:{
                required: true,
                digits:true
              }
            },
    
            messages: {
                student_number: {
                    required: "Number of student is required.",
                    digits: "Invalid number"
                },
                faculty_member_number: {
                    required: "Number of faculty is required.",
                    digits: "Invalid number"
                },
                officer_number: {
                    required: "Number of officer is required.",
                    digits: "Invalid number"
                },
              
                staff_number: {
                    required: "Number of staff is required.",
                    digits: "Invalid number"
                },
                phd_number: {
                    required: "Number of PhD holder is required.",
                    digits: "Invalid number"
                },
              
            },

            errorPlacement: function (error, element) {
              error.addClass('text-danger');
              element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
              $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
              $(element).removeClass('is-invalid');
            }
          });
        });
    </script>
@endsection
