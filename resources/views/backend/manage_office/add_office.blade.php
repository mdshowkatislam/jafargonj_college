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
                    {{-- <h4 class="m-0 text-dark">Office Add</h4> --}}
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">@lang('Home')</a></li>
                        <li class="breadcrumb-item active">@lang('Office')</li>
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
                            @lang('Office') @lang('Update')
                        @else
                            @lang('Office') @lang('Add')
                        @endif
                        <a class="btn btn-sm btn-info float-right" href="{{ route('setup.manage_office') }}"><i class="fa fa-list"></i> @lang('Office') @lang('List')</a>
                    </h5>
                </div>
                <!-- Form Start-->
                <form method="post" action="{{ @$editData ? route('setup.manage_office.update', $editData->id) : route('setup.manage_office.store') }}" id="myForm" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="office_name">@lang('Office Name') <span class="text-red">*</span></label>
                                <input id="office_name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ @$editData->name }}" placeholder="Office Name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- <div class="form-group col-md-6">
                                <label for="ucam_office_id">@lang('Ucam Office ID') <span class="text-red">*</span></label>
                                <input id="ucam_office_id" type="text" name="ucam_office_id" class="form-control  @error('ucam_office_id') is-invalid @enderror" value="{{ @$editData->ucam_office_id }}" placeholder="Ucam Office ID">
                                @error('ucam_office_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> -->
                            @php
                                $profiles = \App\Models\Profile::all();
                            @endphp
                            <div class="form-group col-md-6">
                                <label class="control-label">Office Head</label>
                                <select class="form-control form-control-sm select2" name="profile_id" id="profile_id">
                                    <option selected value="">Please Select</option>
                                    @foreach ($profiles as $profile)
                                        <option @if (!empty($editData) && $editData->profile_id == $profile->id) selected @endif value="{{ $profile->id }}">{{ $profile->nameEn }}</option>
                                    @endforeach
                                </select>
                                @error('')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Designation</label>
                                <input type="text" class="form-control @error('designation_id') is-invalid @enderror" name="designation_id" id="designation_id" value="" readonly>
                                @error('designation_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 d-flex align-items-center" >
                                <label for="show_additional_designation" class="mb-0 pr-1" style="cursor: pointer">Add Additional Designation</label>
                                <input id="show_additional_designation" type="checkbox" name="is_designation" style="cursor: pointer" {{ @$editData->is_designation == 1 ? 'checked' : '' }}>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label">Department Top Menu Bar</label>
                                <select id="slider_id"
                                        class="form-control form-control-sm select2"
                                        name="top_menu">
                                    <option selected
                                            value=""> PleaseSelect</option>
                                    {{-- <option value="1">Slider 1</option>
                                 <option value="2">Slider 2</option> --}}
                                    @foreach ($menu_types as $item)
                                        <option @if (!empty($editData) && $editData->top_menu == $item->id) selected @endif
                                                value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('slider_id')
                                    <span class="invalid-feedback"
                                          role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label class="control-label"> Department Navigation Menu Bar</label>
                                <select id="slider_id"
                                        class="form-control form-control-sm select2"
                                        name="nav_menu">
                                    <option selected
                                            value=""> PleaseSelect</option>
                                    {{-- <option value="1">Slider 1</option>
                                 <option value="2">Slider 2</option> --}}
                                    @foreach ($menu_types as $item)
                                        <option @if (!empty($editData) && $editData->nav_menu == $item->id) selected @endif
                                                value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('slider_id')
                                    <span class="invalid-feedback"
                                          role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6" id="additional_designation_div"  @if(!isset($editData) || $editData->is_designation != 1) style="display: none" @endif>
                                <label>@lang('Add Designation')</label>
                                <input id="designation_name" type="text" name="designation_name" class="form-control " value="{{ @$editData->designation_name }}" placeholder="">
                                @error('designation_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            @php
                                $sliderMasters = \App\Models\SliderMaster::all();
                                //dd($sliderMasters);
                            @endphp
                            
                            <div class="form-group col-md-6">
                                <label class="control-label">Slider <span class="text-danger">(Home page slider for this office)</span></label>
                                <select id="slider_id" class="form-control form-control-sm select2" name="slider_id">
                                    <option selected value="">Please Select</option>
                                    {{-- <option value="1">Slider 1</option>
                                    <option value="2">Slider 2</option> --}}
                                    @foreach ($sliderMasters as $sliderMaster)
                                        <option @if (!empty($editData) && $editData->slider_id == $sliderMaster->id) selected @endif value="{{ $sliderMaster->id }}">{{ $sliderMaster->name }}</option>
                                    @endforeach
                                </select>
                                @error('slider_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label class="control-label">Banner <span class="text-danger">(Inner page banner for this office)</span></label>
                                <select id="banner_id" class="form-control form-control-sm select2" name="banner_id">
                                    <option selected value="">Please Select</option>
                                    {{-- <option value="1">Slider 1</option>
                                    <option value="2">Slider 2</option> --}}
                                    @foreach ($banners as $item)
                                        <option @if (!empty($editData) && $editData->banner_id == $item->id) selected @endif value="{{ $item->id }}">{{ $item->title }}</option>
                                    @endforeach
                                </select>
                                @error('banner_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            @php if(@$themes){  $page_id = @$themes->page_id; }else{ $page_id = 0; } @endphp

                            <div class="form-group col-md-6">
                                <label class="control-label">Instaled Themes <span><a target="_blank" href="{{ url('site-settings/butex_themes/4/' . @$page_id) }}">Go to Themes</a></span></label>
                                <select id="themes" class="form-control form-control-sm select2" name="themes" disabled>
                                    <option>{{ @$themes->theme_name }}</option>
                                </select>
                                @error('status')
                                    <span class="invalid-feedback"
                                          role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="location">@lang('Location') </label>
                                <input id="location" type="text" name="location" class="form-control  @error('location') is-invalid @enderror" value="{{ @$editData->location }}" placeholder="">
                                @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="contact">@lang('Contact Number') <span class="text-red">*</span></label>
                                <input id="contact" type="text" name="contact" class="form-control  @error('contact') is-invalid @enderror" value="{{ @$editData->contact }}" placeholder="">
                                @error('contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">@lang('Email')</label>
                                <input id="email" type="text" name="email" class="form-control  @error('email') is-invalid @enderror" value="{{ @$editData->email }}" placeholder="">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="sort_order">@lang('Sort Order') <span class="text-red">*</span></label>
                                <input id="sort_order" type="number" name="sort_order" class="form-control  @error('sort_order') is-invalid @enderror" value="{{ @$editData->sort_order }}" placeholder="">
                                @error('sort_order')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label">Status <span class="text-red">*</span></label>
                                <select id="status" class="form-control form-control-sm select2" name="status">
                                    <option value="1" {{ @$editData->status == '1' ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ @$editData->status == '0' ? 'selected' : '' }}>Inactive</option>
                                </select>
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-12">
                                <label>About</label>
                                <textarea id="about" type="text" class="form-control @error('about') is-invalid @enderror textarea" name="about">{{ !empty($editData->about) ? $editData->about : old('about') }}</textarea>
                                @error('about')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-sm-12">
                                <label>Office Contact Info</label>
                                <textarea id="contact_info" type="text" class="form-control @error('contact_info') is-invalid @enderror textarea" name="contact_info">{{ !empty($editData->contact_info) ? $editData->contact_info : old('contact_info') }}</textarea>
                                @error('contact_info')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <button type="submit" class="btn btn-info">{{ @$editData ? 'Update' : 'Submit' }}</button>
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
            $('#profile_id').trigger('change');
            var a1 = CKEDITOR.replace('long_title_en');
            CKFinder.setupCKEditor(a1, '/ckfinder/');
            var a1 = CKEDITOR.replace('long_title_bn');
            CKFinder.setupCKEditor(a1, '/ckfinder/');
        });
    </script>

    

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var showAdditionalFieldsCheckbox = document.getElementById('show_additional_designation');
            var additionalFieldsDiv = document.getElementById('additional_designation_div');

            showAdditionalFieldsCheckbox.addEventListener('change', function() {
                if (showAdditionalFieldsCheckbox.checked) {
                    additionalFieldsDiv.style.display = 'block';
                } else {
                    additionalFieldsDiv.style.display = 'none';
                }
            });
        });
    </script>

    <script>
        $(document).on('change', '#profile_id', function() {
            var member_id = $('#profile_id').val();
            console.log('Selected member ID:', member_id);

            $.ajax({
                url: "{{ route('member_wise_designation') }}",
                type: "GET",
                data: {
                    member_id: member_id
                },
                success: function(data) {
                    $('#designation_id').val('');
                    console.log(data);
                    if (data != 'fail') {
                        $("#designation_id").val(data);
                    } else {
                        $('#designation_id').append('');
                    }
                }

            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
        //   $('textarea').each(function(){
        //     $(this).val($(this).val().trim());
        //   });
          $('#myForm').validate({
            rules: {
                name: {
                required: true,
                unique:true,
              },
              ucam_office_id:{
                required: true,
                 unique:true,
                
              },
              contact:{
                required: true,
                digits: true,
                
              },
              sort_order:{
                required: true,
                digits: true,
                
              },
              status:{
                required: true,
              }
            },
    
            messages: {
                name: {
                    required: "Name is required.",
                    unique: "Name already taken."
                },
                ucam_office_id: {
                    required: "UCAM Office Id is required.",
                    unique: "Office already taken."
                },
                contact: {
                    required: "Contact Number is required.",
                    digits: "Invalid Contact Number."
                },
                sort_order: {
                    required: "Sort Order is required.",
                    digits: "Invalid Order."
                },
                status: {
                    required: "Status is required."
                }
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
