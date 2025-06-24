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
                        <li class="breadcrumb-item active">Assign Committee Member to alumni</li>
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
                            @lang('Update Committee Member to alumni')
                        @else
                            @lang('Assign Committee Member to alumni')
                        @endif
                        <a class="btn btn-sm btn-success float-right" href="{{route('alumni.moderator.list')}}"><i class="fa fa-list"></i> @lang('Committee Member') @lang('List')</a></h5>
                </div>
                <!-- Form Start-->
                <form method="post"
                    action="{{ @$editData ? route('alumni.moderator.assign.to.alumni.update', $editData->id) : route('alumni.moderator.assign.to.alumni.store') }}"
                    id="myForm" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="profile_id">Moderator <span class="text-red">*</span></label>

                                <select class="form-control select2 @error('profile_id') is-invalid @enderror"
                                    name="profile_id" id="profile_id" data-live-search="true">
                                    <option value="">Please Select</option>
                                    @foreach ($profiles as $item)
                                        <option value="{{ @$item->profile->id }}"
                                            {{ @$editData->profile_id == @$item->profile->id ? 'selected' : '' }}>
                                            {{ @$item->profile->nameEn }} - {{ @$item->profile->designation }} <span>
                                            </span></option>
                                    @endforeach
                                </select>
                                @error('profile_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="faculty_name">alumni <span class="text-red">*</span></label>

                                <select class="form-control select2 @error('alumni_id') is-invalid @enderror" name="alumni_id"
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
                                <label for="faculty_name">alumni Designations <span class="text-red">*</span></label>

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

                            <div class="form-group col-md-3">
                                <label for="">Start Date</label>
                                <input type="text"
                                    class="form-control singledatepicker @error('sort') is-invalid @enderror"
                                    name="start_date" value="{{ @$editData->join_date }}">
                                @error('sort')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="">End Date</label>
                                <input type="text"
                                    class="form-control singledatepicker @error('sort') is-invalid @enderror"
                                    name="end_date" value="{{ @$editData->expire_date }}">
                                @error('sort')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-sm-6">
                              <label>Status <span class="text-red">*</span></label>
                              <select name="status" class="form-control" required>
                                  <option value="">Please Select</option>
                                     <option value="1" {{ @$editData->status == '1' ? 'selected' : '' }}>Active</option>
                                     <option value="0" {{ @$editData->status == '0' ? 'selected' : '' }}>Inactive</option>
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

    <!-- <script type="text/javascript">
        $(document).ready(function() {
            $('#selectNameAndBup').on('change', function() {
                 alert('hi');
            });
        });
    </script> -->


  
    <script type="text/javascript">
        $(document).ready(function() {
            //   $('textarea').each(function(){
            //     $(this).val($(this).val().trim());
            //   });
            $('#myForm').validate({
                rules: {
                    profile_id: {
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
                    profile_id: {
                        required: "Moderator name is required."
                    },
                    alumni_id: {
                        required: "alumni ID is required."
                    },
                    alumni_designation_id: {
                        required: "Contact is required.",
                     
                    },     
                    status: {
                        required: "Status is required."
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
