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

        .select2-container {
            width: 100% !important;
        }
    </style>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h4 class="m-0 text-dark">Landing Page Modal Add</h4>  --}}
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">@lang('Home')</a></li>
                        <li class="breadcrumb-item active">@lang('Create')</li>
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
                        @lang('Citizen Charter') @lang('Update')

                        {{--  <a class="btn btn-sm btn-info float-right" href="{{ route('site-setting.citizen-charter.list') }}"><i
                                class="fa fa-list"></i> @lang('Marquee') @lang('Lists')</a>  --}}
                    </h5>
                </div>
                <!-- Form Start-->
                <form method="post"
                      action="{{ route('site-setting.citizen-charter.update') }}"
                      id=""
                      enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="title">Title <span class="text-danger">*</span></label>
                                <input type="text"
                                       name="title"
                                       class="form-control @error('title') is-invalid @enderror"
                                       placeholder="Title"
                                       value="{{ @$singleData->title }}">
                                @error('title')
                                    <span class="invalid-feedback"
                                          role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label class="string optional"
                                       for="setting_Aid resource file">File<span class="text-danger">*</span><small style="color: brown"> (Max 2
                                        mb, Preferred file: pdf)</small> :
                                    @if (!empty($singleData))
                                        <a href="{{ asset('upload/citizen_charter/' . $singleData->file_path) }}">Download
                                            PDF</a>
                                    @endif

                                </label><br>
                                <div class="form-group file optional setting_file">

                                    <input class="form-control-file file optional"
                                           type="file"
                                           name="file_path"
                                           id="setting_file">
                                    @error('file_path')
                                        <span class="invalid-feedback"
                                              role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{--  <div class="form-group col-sm-6">
                                <label>Start Date</label>
                                <input id="start_date" type="date" value="{{ @$singleData->start_date }}"
                                    class="form-control @error('start_date') is-invalid @enderror" name="start_date"
                                    placeholder="Start Date">
                                @error('start_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>  --}}




                            {{--  <div class="form-group col-sm-6">
                                <label for="status">Status <span class="text-danger">*</span></label>
                                <select id="status" name="status" class="form-control select2">
                                    <option value="" disabled>Please Select</option>
                                    <option value="1" {{ @$singleData->status == 1 ? 'selected' : '' }}> Active
                                    </option>
                                    <option value="0" {{ @$singleData->status == 0 ? 'selected' : '' }}> Inactive
                                    </option>
                                </select>
                            </div>  --}}


                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <button type="submit"
                                        class="btn btn-info">update</button>

                            </div>
                        </div>
                    </div>
            </div>
            </form>
            <!--Form End-->
        </div>
    </div>
    </div>


@endsection

<script type="text/javascript">
    $(document).ready(function() {
        $('textarea').each(function() {
            $(this).val($(this).val().trim());
        });

        $('#myForm').validate({
            ignore: [],
            debug: false,
            errorClass: 'text-danger',
            validClass: 'text-success',
            rules: {
                title: {
                    required: true,
                },

                file_path: {
                extension: "pdf",
            }
            },
            messages: {
                title: {
                    required: "Title is required",
                },

                file_path: {

                    extension: "Please upload only pdf file"
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
