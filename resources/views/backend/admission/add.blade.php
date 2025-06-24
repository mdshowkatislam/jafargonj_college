@extends('backend.layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <style>
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 20px;
        }
    </style>

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ !empty($editData) ? 'Update Admission' : 'Add Admission' }}</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Admission</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('admission.list') }}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> View
                        Admission</a>
                </div>
                <div class="card-body">
                    <form
                        action="{{ !empty($editData) ? route('admission.update', $editData->id) : route('admission.store') }}"
                        method="post" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        <div class="form-row">
                            {{-- <div class="form-group col-sm-4">
                            <label class="control-label">Select Faculty</label>
                            <select id="faculty_id" @if (!empty($editData)) @endif
                                class="form-control form-control-sm select2" name="faculty_id">
                                <option value="" selected>Select Faculty</option>

                                @foreach ($faculties as $faculty)
                                <option @if (!empty($editData) && $editData->faculty_id == $faculty->id) selected @endif
                                    value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-sm-4">
                            <label class="control-label">Select Department</label>
                            <select id="department_id" @if (!empty($editData)) @endif
                                class="form-control form-control-sm select2" name="department_id">
                                <option value="" selected>Select Department</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="control-label">Select Program</label>
                            <select id="program_category_id" @if (!empty($editData)) @endif
                                class="form-control form-control-sm select2" name="program_category_id">
                                <option value="" selected>Select Program</option>
                            </select>
                        </div> --}}

                            <div class="form-group col-sm-6">
                                <label class="control-label">Select Program Category</label>
                                <select id="program_category_id" @if (!empty($editData))  @endif
                                    class="form-control form-control-sm select2" name="program_category_id">
                                    <option value="" selected>Select Program Category</option>

                                    @foreach ($program_categories as $item)
                                        <option @if (!empty($editData) && $editData->program_category_id == $item->id) selected @endif
                                            value="{{ $item->id }}" data-grid="{{ $item->grid }}" >{{ $item->program_category }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-sm-6" style="" id="type-div">
                                <label>Type</label>
                                <select name="type_id" class="form-control form-control-sm select2">
                                    <option value="">Select Type</option>
                                    <option {{ !empty($editData) && $editData->type_id == 1 ? 'selected' : '' }}
                                        value="1">Circular</option>
                                    <option {{ !empty($editData) && $editData->type_id == 2 ? 'selected' : '' }}
                                        value="2">Result</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">

                            <div class="form-group col-sm-6">
                                <label>Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    name="title" id="title" autocomplete="off"
                                    value="{{ !empty($editData->title) ? $editData->title : old('title') }}">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Session</label>
                                <input type="text" class="form-control @error('session') is-invalid @enderror"
                                    name="session" autocomplete="off"
                                    value="{{ !empty($editData->session) ? $editData->session : old('session') }}">
                                @error('session')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-sm-4">
                                <label>Status</label>
                                <select name="status" class="form-control form-control-sm select2">
                                    <option value="">Select Type</option>
                                    <option {{ !empty($editData) && $editData->status == 1 ? 'selected' : '' }}
                                        value="1">Active</option>
                                    <option {{ !empty($editData) && $editData->status == '0' ? 'selected' : '' }}
                                        value="0">Inactive</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-4">
                                <label>Start Date</label>
                                <input type="date" class="form-control @error('start_date') is-invalid @enderror"
                                    name="start_date" autocomplete="off"
                                    value="{{ !empty($editData->start_date) ? $editData->start_date : old('start_date') }}">
                                @error('start_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-4">
                                <label>End Date</label>
                                <input type="date" class="form-control @error('end_date') is-invalid @enderror"
                                    name="end_date" autocomplete="off"
                                    value="{{ !empty($editData->end_date) ? $editData->end_date : old('end_date') }}">
                                @error('end_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-sm-12">
                                <label>Upload New Attachment<small style="color: brown"> (Max 2 mb)</small></label>
                                <input id="file" type="file" value="" multiple="multiple"
                                    class="form-control @error('file') is-invalid @enderror" name="file"> @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <button class="btn bg-gradient-success btn-flat"><i class="fas fa-save"></i>
                            {{ !empty($editData) ? 'Update Admission' : 'Save Admission' }}</button>
                    </form>

                </div>

            </div>
            <!--/. container-fluid -->
    </section>
    <script type="text/javascript">
        $(document).on('change', '#program_category_id', function() {
            var grid = $('#program_category_id').find(':selected').attr('data-grid');

            // if(grid != 1){
            //     $('#type-div').show();
            //     $('.select2').select2();
            // }
            // else{
            //     $('#type-div').hide();
            // }

        });

        $(function() {
            $('#faculty_id').trigger('change');
        });

        $(document).on('select change', '#faculty_id', function() {
            var faculty_id = $('#faculty_id').val();
            // console.log(faculty_id);
            $.ajax({
                url: "{{ route('faculty_wise_department') }}",
                type: "GET",
                data: {
                    faculty_id: faculty_id
                },
                success: function(data) {
                    console.log(data);
                    if (data != 'fail') {
                        $('#department_id').html('<option value ="">Select Department</option>');
                        // $('#department_id').html('');
                        var selected = "{{ @$editData->department_id }}";
                        $.each(data, function(index, department) {
                            $('#department_id').append('<option value ="' + department.id +
                                '"' + ((department.id == selected) ? ('selected') : '') +
                                '>' + department.name + '</option>');
                        });
                    } else {
                        $('#department_id').append('');
                    }

                    $('#department_id').trigger('change');
                }
            });
        });

        $(document).on('select change', '#department_id', function() {
            var department_id = $('#department_id').val();
            console.log(department_id);
            $.ajax({
                url: "{{ route('department_wise_program') }}",
                type: "GET",
                data: {
                    department_id: department_id
                },
                success: function(data) {
                    if (data != 'fail') {
                        $('#program_category_id').html('<option value ="">Select Program</option>');

                        var selected = "{{ @$editData->program_category_id }}";

                        $.each(data, function(index, program) {
                            $('#program_category_id').append('<option value ="' + program.id +
                                '"' + ((
                                    program.id == selected) ? ('selected') : '') + '>' +
                                program.name + '</option>');
                        });
                    } else {
                        $('#program_category_id').append('');
                    }
                }
            });
        });
    </script>
@endsection
