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
                            @lang('Career') @lang('Update')
                            @else
                            @lang('Career') @lang('Add')
                            @endif
                            <a class="btn btn-sm btn-info float-right" href="{{ route('setup.career.view') }}"><i class="fa fa-list"></i> @lang('Career') @lang('List')</a>
                        </h5>
                    </div>
                    <div class="card-body">

                        <form method="post" action="{{ @$editData ? route('setup.career.update', $editData->id) : route('setup.career.store') }}" id="myForm" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="type" value="1">
                            @include('backend.career.job')
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <button type="submit" class="btn btn-info">{{ @$editData ? 'Update' : 'Submit' }}</button>
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
    $(document).ready(function() {
        $(document).on('select change', '#faculty_id', function() {
            var faculty_id = $('#faculty_id').val();
            $.ajax({
                url: "{{ route('faculty_wise_department') }}",
                type: "GET",
                data: {
                    faculty_id: faculty_id
                },
                success: function(data) {
                    if (data != 'fail') {
                        $('#department_id').empty();
                        $('#department_id').append(
                            '<option value="0">Please Select</option>'
                        );
                        $.each(data.facultyWiseDepartment, function(index, subcatObj) {
                            $('#department_id').append('<option value ="' + subcatObj.id + '">' + subcatObj.name + '</option>');
                        });
                    } else {
                        console.log('failed');
                    }
                }
            });
        });

        $('textarea').each(function() {
            $(this).val($(this).val().trim());
        });

        $('#myForm').validate({
            ignore: [],
            debug: false,
            errorPlacement: function(error, element) {
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
