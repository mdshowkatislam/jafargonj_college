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
                    {{-- <h4 class="m-0 text-dark">Department Add</h4> --}}
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">@lang('Home')</a></li>
                        <li class="breadcrumb-item active">@lang('Department')</li>
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
                            @lang('Department') @lang('Update')
                        @else
                            @lang('Department') @lang('Add')
                        @endif
                        <a class="btn btn-sm btn-info float-right"
                           href="{{ route('setup.manage_department') }}"><i class="fa fa-list"></i> @lang('Department')
                            @lang('List')</a>
                    </h5>
                </div>
                <!-- Form Start-->
                <form method="post"
                      action="{{ @$editData ? route('setup.manage_department.update', $editData->id) : route('setup.manage_department.store') }}"
                      id="myForm"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-row">
                            @php
                                if(isset($admin_faculty_id)) {
                                    $faculty = App\Models\Faculty::find($admin_faculty_id);
                                    // dd($faculty);
                                }
                            @endphp
                            @if (isset($admin_faculty_id)) 
                            <div class="form-group col-md-6">
                                <label for="faculty_name">@lang('Faculty') </label>
                                <input type="hidden" name="faculty_id" id="faculty_name" value="{{ @$faculty->id }}">
                                <div class="card p-2">
                                    {{ @$faculty->name }}
                                </div>
                            </div>
                            @endif
                            <div class="form-group col-md-6 @if(isset($admin_faculty_id)) d-none @endif">
                                <label for="faculty_name">@lang('Faculty') <span class="text-red">*</span></label>
                                @php
                                    $faculties = App\Models\Faculty::all();
                                @endphp
                                <select name="faculty_id"
                                    class="form-control @error('faculty_id') is-invalid @enderror select2"
                                    @if (!empty($editData) && $isFacultyHead || $isDepartmentHead) disabled @endif
                                    @if ($isFacultyHead) disabled @endif
                                    >
                                        class="form-control @error('faculty_id') is-invalid @enderror select2">
                                    <option value="">@lang('Please Select')</option>
                                    @foreach ($faculties as $faculty)
                                        <option value="{{ @$faculty->id }}"
                                                {{ @$editData->faculty_id == @$faculty->id ? 'selected' : '' }}>
                                            {{ @$faculty->name }}</option>
                                    @endforeach
                                </select>
                                @if (!empty($editData) && $isFacultyHead || $isDepartmentHead)
                                <input type="hidden" name="faculty_id" id="" value="{{ $editData->faculty_id }}">
                                @endif
                                @error('faculty_id')
                                    <span class="invalid-feedback"
                                          role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="department_name">@lang('Department Name') <span class="text-red">*</span></label>
                                <input id="department_name"
                                       type="text"
                                       name="name"
                                       class="form-control @error('name') is-invalid @enderror"
                                       value="{{ @$editData->name }}"
                                       placeholder="Department Name">
                                @error('name')
                                    <span class="invalid-feedback"
                                          role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            @php
                                $profiles = \App\Models\Profile::get(['id', 'nameEn', 'designation']);
                            @endphp
                            <div class="form-group col-md-6">
                                <label class="control-label">Department Head</label>
                                <select id=""
                                        class="form-control form-control-sm select2"
                                        name="profile_id" @if ($isDepartmentHead) disabled @endif>
                                    <option value="">Select Department Head</option>
                                    @foreach ($profiles as $profile)
                                        <option @if (!empty($editData) && $editData->profile_id == $profile->id) selected @endif
                                                value="{{ $profile->id }}">{{ $profile->nameEn }} |
                                            {{ $profile->designation }}</option>
                                    @endforeach
                                </select>
                                @if (!empty($editData) && $isDepartmentHead)
                                <input type="hidden" name="profile_id" id="" value="{{ $editData->profile_id }}">
                                @endif
                                @error('')
                                    <span class="invalid-feedback"
                                          role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- <div class="form-group col-md-6">
                                            <label for="ucam_department_id">@lang('Ucam Department ID') <span class="text-red">*</span></label>
                                            <input id="ucam_department_id" type="text" name="ucam_department_id"
                                                class="form-control  @error('ucam_department_id') is-invalid @enderror"
                                                value="{{ @$editData->ucam_department_id }}" placeholder="Ucam Department ID">
                                            @error('ucam_department_id')
                                          <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                          </span>
                                           @enderror
                                        </div> -->
                            <div class="form-group col-md-6">
                                <label for="contact">@lang('Contact Number') <span class="text-red">*</span></label>
                                <input id="contact"
                                       type="text"
                                       name="contact"
                                       class="form-control  @error('contact') is-invalid @enderror"
                                       value="{{ @$editData->contact }}"
                                       placeholder="">
                                @error('contact')
                                    <span class="invalid-feedback"
                                          role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label class="control-label">Department Top Menu Bar</label>
                                <select id="slider_id"
                                        class="form-control form-control-sm select2"
                                        name="top_menu">
                                    <option selected
                                            value="">Select Top Menu Bar</option>
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
                                <label class="control-label">Department Navigation Menu Bar</label>
                                <select id="slider_id"
                                        class="form-control form-control-sm select2"
                                        name="nav_menu">
                                    <option selected
                                            value="">Select menu bar</option>
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

                            @php
                                $sliderMasters = \App\Models\SliderMaster::all();
                            @endphp
                            <div class="form-group col-md-6">
                                <label class="control-label">Slider <span class="text-danger">(Home page slider for this department)</span></label>
                                <select id="slider_id"
                                        class="form-control form-control-sm select2"
                                        name="slider_id">
                                    <option selected value="">Select Slider</option>
                                    {{-- <option value="1">Slider 1</option>
                                 <option value="2">Slider 2</option> --}}
                                    @foreach ($sliderMasters as $sliderMaster)
                                        <option @if (!empty($editData) && $editData->slider_id == $sliderMaster->id) selected @endif
                                                value="{{ $sliderMaster->id }}">{{ $sliderMaster->name }}</option>
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
                                <label class="control-label">Banner <span class="text-danger">(Inner page banner for this department)</span></label>
                                <select id="banner_id"
                                        class="form-control form-control-sm select2"
                                        name="banner_id">
                                    <option selected
                                            value="">Select banner</option>
                                    @foreach (@$banners as $banner)
                                        <option value="{{ $banner->id }}"
                                                {{ @$editData->banner_id == $banner->id ? 'selected' : '' }}>
                                            {{ $banner->title }}</option>
                                    @endforeach
                                </select>
                                @error('banner_id')
                                    <span class="invalid-feedback"
                                          role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            @php if(@$themes){  $page_id = @$themes->page_id; }else{ $page_id = 0; } @endphp

                            <div class="form-group col-md-6">
                                <label class="control-label">Instaled Themes <span><a target="_blank" href="{{ url('site-settings/butex_themes/3/' . @$page_id) }}">Go to Themes</a></span></label>
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
                                <label for="contact">Email</label>
                                <input id="email"
                                       type="email"
                                       name="email"
                                       class="form-control  @error('email') is-invalid @enderror"
                                       value="{{ @$editData->email }}"
                                       placeholder="Email">
                                @error('email')
                                    <span class="invalid-feedback"
                                          role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="location">@lang('Location')</label>
                                <input id="location"
                                       type="text"
                                       name="location"
                                       class="form-control  @error('location') is-invalid @enderror"
                                       value="{{ @$editData->location }}"
                                       placeholder="">
                                @error('location')
                                    <span class="invalid-feedback"
                                          role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="form-group col-md-6">
                                <label for="sort_order">@lang('Sort Order') <span class="text-red">*</span></label>
                                <input id="sort_order"
                                       type="number"
                                       name="sort_order"
                                       class="form-control  @error('sort_order') is-invalid @enderror"
                                       value="{{ @$editData->sort_order }}"
                                       placeholder="">
                                @error('sort_order')
                                    <span class="invalid-feedback"
                                          role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label">Status <span class="text-red">*</span></label>
                                <select id="status"
                                        class="form-control form-control-sm select2"
                                        name="status">
                                    <option value="1"
                                            {{ @$editData->status == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0"
                                            {{ @$editData->status == 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                                @error('status')
                                    <span class="invalid-feedback"
                                          role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Image<small style="color: brown"> (Max 1 mb - 354px X 240px)</small> <span
                                          class="text-red">*</span></label>
                                <input type="file"
                                       class="form-control filer_input_single @error('image') is-invalid @enderror"
                                       name="image"> @error('image')
                                    <span class="invalid-feedback"
                                          role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-12">
                                <label>About</label>
                                <textarea id="about"
                                          type="text"
                                          class="form-control @error('about') is-invalid @enderror textarea"
                                          name="about">{{ !empty($editData->about) ? $editData->about : old('about') }}</textarea>
                                @error('about')
                                    <span class="invalid-feedback"
                                          role="alert">
                                        <strong>{{ $message }}</strong>
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
            //   $('textarea').each(function(){
            //     $(this).val($(this).val().trim());
            //   });
            $('#myForm').validate({
                rules: {
                    faculty_id: {
                        required: true,
                    },
                    name: {
                        required: true,
                    },

                    ucam_department_id: {
                        required: true,
                    },
                    contact: {
                        required: true,
                    },

                    sort_order: {
                        required: true,
                        digits: true,
                    },

                    status: {
                        required: true
                    },

                    <?php if(!@$editData){ ?>
                    image: {
                        required: true,
                        extension: "jpg|jpeg|png"
                    },
                    <?php }else{ ?>
                    image: {
                        extension: "jpg|jpeg|png",
                    },
                    <?php  } ?>
                },

                messages: {
                    faculty_id: {
                        required: "Faculty is required."
                    },
                    name: {
                        required: "Name is required."
                    },
                    ucam_department_id: {
                        required: "UCAM Department Id is required."
                    },
                    contact: {
                        required: "Contact Number is required."
                    },

                    sort_order: {
                        required: "Sort Order is required.",
                        digits: "Invalid Order."
                    },
                    status: {
                        required: "Status is required."
                    },
                    image: {
                        required: "Please Upload Image.",
                        extension: "Please upload file in these format only (jpg, jpeg, png)."
                    }
                },

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
