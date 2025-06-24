@extends('backend.layouts.app')
@section('content')
    <style>
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

        .hidden {
            display: none;
        }

        .select2-container .select2-selection--single {
            height: 35px;
        }
    </style>

    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">@lang('Home')</a></li>
                        <li class="breadcrumb-item active">@lang('Career Opportunities')</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h5>
                                @if (isset($editData))
                                    @lang('Job Result') @lang('Update')
                                @else
                                    @lang('Job Result') @lang('Add')
                                @endif
                                <a class="btn btn-sm btn-info float-right" href="{{ route('setup.career.job_result.view') }}"><i
                                        class="fa fa-list"></i> @lang('Result') @lang('List')</a>
                            </h5>
                        </div>
                        <div class="card-body">
                            <form method="post"
                                  action="{{ @$editData ? route('setup.career.job_result.update', $editData->id) : route('setup.job-result.store') }}"
                                  id="myForm" enctype="multipart/form-data">
                                @csrf
                            
                                @include('backend.career.result')
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <button type="submit"
                                                class="btn btn-info">{{ @$editData ? 'Update' : 'Submit' }}</button>
        
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {

            $('textarea').each(function () {
                $(this).val($(this).val().trim());
            });

            $('#myForm').validate({
                ignore: [],
                debug: false,
                errorPlacement: function (error, element) {
                    if (element.attr("name") == "type") {
                        error.insertAfter(element.next());
                    } else if (element.attr("name") == "status") {
                        error.insertAfter(element.next());
                    } else {
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
