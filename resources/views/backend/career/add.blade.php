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
</style>
<style>
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
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="type">@lang('Type') <span class="text-red">*</span></label>
                                <select name="type" class="form-control select2" id="type_change">
                                    <option value="">@lang('Please Select')</option>
                                    <option value="1">Job Circular</option>
                                    <option value="2">Form</option>
                                    <option value="3">Result</option>
                                </select>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        function handleSelection(selectedValue) {
            $('#job_circular').addClass('hidden');
            $('#form').addClass('hidden');
            $('#result').addClass('hidden');


            if (selectedValue == '1') {
                $('#job_circular').removeClass('hidden');
                window.location.href = "{{ route('setup.career.job_circular') }}";
            } else if (selectedValue == '2') {
                $('#form').removeClass('hidden');
                window.location.href = "{{ route('setup.career.job_form') }}";
            } else if (selectedValue == '3') {
                $('#result').removeClass('hidden');
                window.location.href = "{{ route('setup.career.job_result') }}";
            }
        }

        $('#type_change').change(function () {
            var selectedValue = $(this).val();
            handleSelection(selectedValue);
        });


        // function toggleDivs() {
        //     var selectedValue = $('#type_change').val();
        //     $('#job_circular').addClass('hidden');
        //     $('#form').addClass('hidden');
        //     $('#result').addClass('hidden');
        //
        //     if (selectedValue == '1') {
        //         $('#job_circular').removeClass('hidden');
        //     } else if (selectedValue == '2') {
        //         $('#form').removeClass('hidden');
        //     } else if (selectedValue == '3') {
        //         $('#result').removeClass('hidden');
        //     }
        // }
        //
        // toggleDivs();
        // $('#type_change').change(function() {
        //     toggleDivs();
        // });

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
    });
</script>
@endsection
