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
    <style>
        .select2-container .select2-selection--single {
            height: 35px;
        }
    </style>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h4 class="m-0 text-dark">Career Add</h4> --}}
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">@lang('Home')</a></li>
                        <li class="breadcrumb-item active">@lang('Job Categories')</li>
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
                            @lang('Job Categories') @lang('Update')
                        @else
                            @lang('Job Categories') @lang('Add')
                        @endif
                        <a class="btn btn-sm btn-info float-right" href="{{ route('setup.job-categories.view') }}"><i
                                class="fa fa-list"></i> @lang('Job Categories') @lang('List')</a>
                    </h5>
                </div>
                <!-- Form Start-->
                <form method="post"
                    action="{{ @$editData ? route('setup.job-categories.update', $editData->id) : route('setup.job-categories.store') }}"
                    id="myForm" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="title">@lang('Title') <span class="text-red">*</span></label>
                                <input id="title" type="text" name="title" value="{{ @$editData->title }}"
                                    class="form-control">
                                @error('title')
                                    <span class="text-red">{{ $message }}</span>
                                @enderror
                            </div>
                           
                            
                            <div class="form-group col-md-6">
                                <label for="status">@lang('Status') <span class="text-red">*</span></label>
                                <select name="status" class="form-control select2">
                                    <option value="">Please Select</option>
                                    <option value="1" {{ @$editData->status == '1' ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ @$editData->status == '0' ? 'selected' : '' }}>Inactive</option>
                                </select>
                                @error('status')
                                    <span class="text-red">{{ $message }}</span>
                                @enderror
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
            var a1 = CKEDITOR.replace('long_title_en');
            CKFinder.setupCKEditor(a1, '/ckfinder/');
            var a1 = CKEDITOR.replace('long_title_bn');
            CKFinder.setupCKEditor(a1, '/ckfinder/');
        });
    </script>

    <script>
        $(document).ready(function() {
            $('textarea').each(function() {
                $(this).val($(this).val().trim());
            });

            $('#myForm').validate({
                ignore: [],
                debug: false,
                errorPlacement: function(error, element) {
                    if (element.attr("name") == "type") {
                        error.insertAfter(element.next());
                    }else if (element.attr("name") == "status") {
                        error.insertAfter(element.next());
                    }else {
                        error.insertAfter(element);
                    }
                },
                errorClass: 'text-danger',
                validClass: 'text-success',
                rules: {
                    type: {
                        required: true,
                    },
                    title: {
                        required: true,
                    },
                    status: {
                        required: true,
                    },
                    attachment: {
                        extension: "pdf|doc|docx",
                    },
                   
                },
                messages: {
                    type: {
                        required: "Type is required",
                    },
                    title: {
                        required: "Title is required",
                    },
                    status: {
                        required: "Status is required",
                    },
                    attachment: {
                        extension: "Preferred format: pdf,doc,docx",
                    },
                }
            });
        });
    </script>
@endsection
