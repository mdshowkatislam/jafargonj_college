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
                    {{-- <h4 class="m-0 text-dark">Ongoing Research Add</h4> --}}
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('Home')</a></li>
                        <li class="breadcrumb-item active">@lang('Publication Status')</li>
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
                            @lang('Publication Status') @lang('Update')
                        @else
                            @lang('Publication Status') @lang('Add')
                        @endif
                        <a class="btn btn-sm btn-info float-right" href="{{ route('news.publication_status') }}"><i
                                class="fa fa-list"></i> @lang('Publication Status') @lang('List')</a>
                    </h5>
                </div>
                <!-- Form Start-->
                <form method="post" action="{{ route('news.publication_status.store') }}" id="myForm" >
                    @csrf
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-sm-12">
                                <label>Publication Status Title</label>
                                <input id="title" type="text"
                                    value="{{ !empty($editData->title) ? $editData->title : old('title') }}"
                                    class="form-control @error('title') is-invalid @enderror" name="title"
                                    placeholder="Enter Publication Title"> @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Status</label>
                                <select id="status" name="status" class="form-control form-control-sm select2">
                                    <option value="">Select Type</option>
                                    <option {{ !empty($editData) && $editData->status == 1 ? 'selected' : '' }}
                                        value="1">Active</option>
                                    <option {{ !empty($editData) && $editData->status == 0 ? 'selected' : '' }}
                                        value="0">Inactive</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Sort Order</label>
                                <input id="sort_order" type="number"
                                    value="{{ !empty($editData->sort_order) ? $editData->sort_order : old('sort_order') }}"
                                    class="form-control @error('sort_order') is-invalid @enderror" name="sort_order"
                                    placeholder="Sort Publication Title"> @error('sort_order')
                                    <span class="invalid-feedback" role="alert">
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
                    status: {
                        required: true,
                    },
                    sort_order:{
                        required: true,
                    }
                },
                messages: {

                },
                errorElement: 'span',
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
