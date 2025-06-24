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
                    {{-- <h4 class="m-0 text-dark">alumni Add</h4> --}}
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">@lang('Home')</a></li>
                        <li class="breadcrumb-item active">@lang('Alumni')</li>
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
                            @lang('Alumni') @lang('Update')
                        @else
                            @lang('New Alumni') @lang('Add')
                        @endif
                        <a class="btn btn-sm btn-info float-right" href="{{ route('alumni.list') }}"><i class="fa fa-list"></i> @lang('Alumni') @lang('Lists')</a>
                    </h5>
                </div>
                <!-- Form Start-->
                <form method="post" action="{{ @$editData ? route('alumni.update', $editData->id) : route('alumni.store') }}" id="myForm" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="alumniName">Alumni Name <span class="text-red">*</span></label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Alumni Name" value="{{ @$editData ? @$editData->name : old('name') }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            @include('backend.layouts.pertials.faculty_wise_department')
                            <div class="form-group col-md-6">
                                <label for="status">@lang('Status')</label>
                                <select class="form-control" id="status" name="status" aria-label=".form-select-lg example">
                                    {{-- <option value="">Please Select</option> --}}
                                    <option value="1" {{ @$editData->status == '1' ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ @$editData->status == '0' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="control-label">Alumni Top Menu Bar</label>
                                <select id="slider_id"
                                        class="form-control form-control-sm select2"
                                        name="top_menu">
                                    <option selected
                                            value=""> Please Select</option>
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
                                <label class="control-label"> Alumni Navigation Menu Bar</label>
                                <select id="slider_id"
                                        class="form-control form-control-sm select2"
                                        name="nav_menu">
                                    <option selected
                                            value=""> Please Select</option>
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

                            <div class="form-group col-md-6">
                                <label for="Slider">@lang('Slider')</label>
                                <select class="form-control select2 @error('slider_id') is-invalid @enderror" id="slider_id" name="slider_id"  aria-label=".form-select-lg example">
                                    <option value="" disabled selected>Select Slider</option>
                                    @foreach (@$slider_categories as $slider_category)
                                        <option value="{{ @$slider_category->id }}" {{ @$editData->slider_id == @$slider_category->id ?  'selected' : ''  }} >{{ @$slider_category->name }} | {{ @$slider_category->animation_type }}</option>
                                    @endforeach
                                </select>
                                @error('slider_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Banner">@lang('Banner')</label>
                                <select class="form-control select2 @error('banner_id') is-invalid @enderror" id="banner_id" name="banner_id"  aria-label=".form-select-lg example">
                                    <option value="" disabled selected>Select Banner</option>
                                    @foreach (@$banners as $banner)
                                        <option value="{{ @$banner->id }}" {{ @$editData->banner_id == @$banner->id ?  'selected' : ''  }}>{{ @$banner->title }}</option>
                                    @endforeach
                                </select>
                                @error('banner_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label for="">@lang('Description') {{-- <span class="text-red">*</span> --}}</label>
                                <textarea name="description" class="textarea" id="" cols="30" rows="10"> {{ @$editData->description }} </textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">@lang('Mission') {{-- <span class="text-red">*</span> --}}</label>
                                <textarea name="mission" class="textarea" id="" cols="30" rows="10"> {{ @$editData->mission }} </textarea>
                                @error('mission')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">@lang('Vision') {{-- <span class="text-red">*</span> --}}</label>
                                <textarea name="vision" class="textarea" id="" cols="30" rows="10">{{ @$editData->vision }}</textarea>
                                @error('vision')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="motto">@lang('Motto')</label>
                                <input id="motto" type="text" name="motto" class="form-control  @error('motto') is-invalid @enderror" value="{{ @$editData->motto }}" placeholder="Motto">
                                @error('motto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">@lang('Url')</label>
                                <input id="" type="url" name="url_address" class="form-control  @error('url_address') is-invalid @enderror" value="{{ @$editData ? @$editData->url : old('url_address') }}" placeholder="Https://">
                                @error('url_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">@lang('Facebook')</label>
                                <input id="facebook" type="url" name="facebook" class="form-control @error('facebook') is-invalid @enderror" value="{{ @$editData ? @$editData->facebook : old('facebook') }}" placeholder="Https://">
                                @error('facebook')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">@lang('Youtube')</label>
                                <input id="youtube" type="url" name="youtube" class="form-control @error('youtube') is-invalid @enderror" value="{{ @$editData ? @$editData->youtube : old('youtube') }}" placeholder="Https://">
                                @error('youtube')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">@lang('Instagram')</label>
                                <input id="instagram" type="url" name="instagram" class="form-control @error('instagram') is-invalid @enderror" value="{{ @$editData ? @$editData->instagram : old('instagram') }}" placeholder="Https://">
                                @error('instagram')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">@lang('Linkedin')</label>
                                <input id="linkedin" type="url" name="linkedin" class="form-control @error('linkedin') is-invalid @enderror" value="{{ @$editData ? @$editData->linkedin : old('linkedin') }}" placeholder="Https://">
                                @error('linkedin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">@lang('Email')</label>
                                <input id="email" type="text" name="email" class="form-control " value="{{ @$editData->email }}" placeholder="Https://">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">@lang('Twitter')</label>
                                <input id="twitter" type="url" name="twitter" class="form-control @error('twitter') is-invalid @enderror" value="{{ @$editData ? @$editData->twitter : old('twitter') }}" placeholder="Https://">
                                @error('twitter')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Established Date</label>
                                <input type="" name="establish_date" class="form-control singledatepicker" value="{{ @$editData ? @$editData->establish_date : old('establish_date') }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">@lang('Thumbnail') <small style="color: brown"> (Max: 512kb, Preferred size:340 × 250 px)</small> <span class="text-red"></span></label>
                                <input type="file" name="banner" id="image" class="form-control form-control-sm @error('banner') is-invalid @enderror" autocomplete="off">
                                @error('banner')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">

                            </div>

                            <div class="form-group col-md-6">
                                <img id="showImage" class="img-fluid" src="{{ !empty(@$editData->banner) ? url('upload/banner/' . @$editData->banner) : url('upload/no_image.png') }}">
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <button type="submit" class="btn btn-info">{{ @$editData ? 'Update' : 'Submit' }}</button>
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
            var a1 = CKEDITOR.replace('description');
            CKFinder.setupCKEditor(a1, '/ckfinder/');
            var a1 = CKEDITOR.replace('mission');
            CKFinder.setupCKEditor(a1, '/ckfinder/');
            var a1 = CKEDITOR.replace('vision');
            CKFinder.setupCKEditor(a1, '/ckfinder/');
        });
    </script>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) { //show Image before upload
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                };
                reader.readAsDataURL(e.target.files[0]);
            });
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
                    name: {
                        required: true,
                    },
                    url_address: {
                        url: true,
                    },
                    facebook: {
                        url: true,
                    },
                    youtube: {
                        url: true,
                    },
                    instagram: {
                        url: true,
                    },
                    linkedin: {
                        url: true,
                    },
                    email: {
                        email: true
                    },
                    twitter: {
                        url: true,
                    },
                    banner: {
                        extension: "jpg|jpeg|png",
                    },
                    
                },
                messages: {
                    name:{
                        required:"Name is required",
                    },
                    url_address:{
                        url:"Invalid Url",
                    },
                    facebook:{
                        url:"Invalid Url",
                    },
                    youtube:{
                        url:"Invalid Url",
                    },
                    instagram:{
                        url:"Invalid Url",
                    },
                    linkedin:{
                        url:"Invalid Url",
                    },
                    twitter:{
                        url:"Invalid Url",
                    },
                    email: {
                        email: "Please enter a valid email address",
                      },
                   
                    image: {                    
                        extension: "Please upload file in these format only (jpg, jpeg, png)."
                    }

                },
             
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
    </script>
@endsection
