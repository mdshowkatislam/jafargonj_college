@extends('backend.layouts.app')
@section('content')
    <style>
        .radio_container {
            display: flex;
            justify-content: space-around;
            align-items: center;
            background-color: #cecece;
            width: 280px;
            border-radius: 9999px;
            box-shadow: inset 0.5px 0.5px 2px 0 rgba(0, 0, 0, 0.15);
        }

        input[type="radio"] {
            appearance: none;
            display: none;
        }

        .radio_container label {
            font-size: .875rem;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: inherit;
            width: 110px;
            text-align: center;
            border-radius: 9999px;
            overflow: hidden;
            transition: linear 0.3s;
            margin-top: 8px;
        }

        input[type="radio"]:checked+label {
            background-color: #1e90ff;
            color: #f1f3f5;
            font-weight: 900;
            transition: 0.3s;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 20px;
        }
    </style>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ !empty($editData) ? 'Update Curriculum' : 'Add Curriculum' }}
                    </h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Curriculum</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header row">
                    <a href="{{ route('oefcd.curriculum.list') }}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i>
                        Curriculum List</a>
                </div>
                <form id="myForm"
                    action="{{ !empty($editData) ? route('oefcd.curriculum.update', $editData->id) : route('oefcd.curriculum.store') }}"
                    method="post" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <div class="card-body">
                        <div class="form-row">
                            {{-- <div class="form-group col-sm-4">
                                <label class="control-label">Training Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    name="title" id="title" autocomplete="off"
                                    value="{{ !empty($editData->title) ? @$editData->title : old('title') }} ">
                                @error('rank')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> --}}

                            <div class="form-group col-md-6">
                                <label for="department_id">@lang('Department') <span class="text-red">*</span></label>
                                <select name="department_id" id="department_id" class="form-control select2">
                                    <option value="">@lang('Please Select Department')</option>
                                    @foreach ($departments as $item)
                                        <option value="{{ $item->id }}"
                                            {{ @$editData->department_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('department_id')
                                    <span class="is-invalid" role="alert" >{{ $message }}</span>
                                @enderror
                            </div>


                            
                            <div class="form-group col-md-6">
                                <label for="program_id">@lang('Program') <span class="text-red">*</span></label>
                                <select name="program_id" id="program_id" class="form-control select2">
                                    <option value="">Please Select</option>
                                </select>
                                @error('program_id')
                                    <span class="text-red">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-sm-6">
                                <label class="control-label">Date </label>
                                <input type="text"
                                    class="form-control singledatepicker @error('date') is-invalid @enderror" name="date"
                                    placeholder="DD-MM-YYYY"
                                    value="{{ !empty($editData->date) ? date('d-m-Y', strtotime($editData->date)) : old('date') }}">
                                @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group  col-sm-4">
                                <div class="form-check" style="margin-top: 40px; margin-left:10px;">
                                    <input type="checkbox" name="status" class="form-check-input" id="status"
                                        value="1"
                                        {{ @$editData->status == 0 ? 'unchecked' : 'checked' }}>
                                    <label class="form-label" for="status">Active/Inactive</label>
                                </div>
                            </div>
                        </div>
                        <button class="btn bg-success btn-sm"><i class="fas fa-save"></i>
                            {{ !empty($editData) ? 'Update ' : 'Save' }}</button>

                    </div>
                </form>

            </div>
            <!--/. container-fluid -->
    </section>


    <script>
        $(document).on('change', '#department_id', function() {
            var department_id = $('#department_id').val();
            $.ajax({
                url: "{{ route('department_wise_program') }}",
                type: "GET",
                data: {
                    department_id: department_id
                },
                success: function(data) {
                    if (data != 'fail') {
                        $('#program_id').html('<option value ="">Please Select Program</option>');
                        var selected = "{{ @$editData->program_id }}";

                        $.each(data, function(index, program) {
                            $('#program_id').append('<option value ="' + program.id + '"' + ((
                                    program.id == selected) ? ('selected') : '') + '>' +
                                program.program_title + '</option>');
                        });
                    } else {
                        $('#program_id').append('');
                    }
                    $('#program_id').trigger('change');
                }
            });
        });
        $(document).ready(function() {
            $('#department_id').trigger('change');
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            //   $('textarea').each(function(){
            //     $(this).val($(this).val().trim());
            //   });
            $('#myForm').validate({
                rules: {
                    department_id: {
                        required: true,
                    },
                    program_id: {
                        required: true,
                    },
                },

                messages: {
                    department_id: {
                        required: "Department is required."
                    },
                    program_id: {
                        required: "Program is required."
                    },
               
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
