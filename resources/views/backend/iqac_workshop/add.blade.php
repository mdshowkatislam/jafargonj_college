@extends('backend.layouts.app') @section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0 text-dark">Add Work Shop Seminar</h1> --}}
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Add Workshop/Self-Assessment Activities/QAC Meeting</li>
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

            <div class="card card-outline card-info">
                <div class="card-header">
                    <h5 class="m-0 text-dark float-left">Add Workshop/Self-Assessment Activities/QAC Meeting</h5>
                    <a href="{{ route('manage_workshop_seminar') }}" class="btn btn-info btn-sm float-right"><i class="fas fa-stream"></i> Workshop/Self-Assessment
                        Activities/QAC Meeting List</a>
                </div>
                <div class="card-body">
                    <form id="myForm" action="{{ @$editData ? route('manage_workshop_seminar.update', $editData->id) : route('manage_workshop_seminar.store') }} " method="post" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-sm-6">
                                <label>Type  <span class="text-red">*</span></label>
                                <select name="type_id" class="form-control select2" required>
                                    <option value="">Please Select</option>
                                    <option value="1" {{ @$editData->type_id == 1 ? 'selected' : '' }}>Workshop/Seminar
                                    </option>
                                    <option value="2" {{ @$editData->type_id == 2 ? 'selected' : '' }}>Self-Assessment
                                        Activities</option>
                                    <option value="3" {{ @$editData->type_id == 3 ? 'selected' : '' }}>QAC Meeting
                                    </option>
                                </select>
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Title  <span class="text-red">*</span></label>
                                <input id="title" type="text" value="{{ !empty($editData->title) ? $editData->title : old('title') }}" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Write Workshop/Seminar Title"> @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Schedule  <span class="text-red">*</span></label>
                                <input id="schedule" type="date" value="{{ !empty($editData->schedule) ? \Carbon\Carbon::parse($editData->schedule)->format('Y-m-d') : '' }}" class="form-control @error('schedule') is-invalid @enderror" name="schedule" placeholder="Write schedule name"> @error('schedule')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Facilator Name  <span class="text-red">*</span></label>
                                <select name="facilator" class="form-control select2">
                                    <option value="" selected>Select facilator Name</option>
                                    @foreach ($members as $item)
                                        <option value="{{ $item->id }}" {{ @$editData->facilator == $item->id ? 'selected' : '' }}>{{ $item->nameEn }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Upload Image<small style="color: brown"> (Max 1 mb,Prefered format: jpg,jpeg,png,doc,pdf)</small></label>
                                <input id="image" type="file" value="{{ @$editData ? $editData->image : '' }}" class="form-control @error('image') is-invalid @enderror" name="image">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Status  <span class="text-red">*</span></label>
                                <select name="status" class="form-control form-control-sm select2">
                                    <option value="">Please Select Type</option>
                                    <option {{ !empty($editData) && $editData->status == 1 ? 'selected' : '' }} value="1">Active</option>
                                    <option {{ !empty($editData) && $editData->status == 0 ? 'selected' : '' }} value="0">Inactive</option>
                                </select>
                            </div>

                            <div class="form-group col-sm-12">
                                <label>Description</label>
                                <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description">{{ !empty($editData->description) ? $editData->description : old('description') }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <button class="btn bg-gradient-info btn-sm"><i class="fas fa-save"></i> Save</button>
                    </form>

                </div>

            </div>
            <!--/. container-fluid -->
    </section>
    <script type="text/javascript">
        $(document).ready(function() {
            //   $('textarea').each(function(){
            //     $(this).val($(this).val().trim());
            //   });
            $('#myForm').validate({
                rules: {
                    type_id: {
                        required: true,
                    },
                    title:{
                        required: true,
                    },
                    schedule: {
                        required: true,
                   
                    },
                    facilator: {
                        required: true,
                    },
                    image: {
                      
                        extension: "jpg|jpeg|png|doc|docx|pdf"
                    },
                    status: {
                        required: true,
                    }
                },

                messages: {
                    type_id: {
                        required: "Type is required."
                    },
                    title: {
                        required: "Title is required."
                    },
                    schedule: {
                        required: "Schedule Time is required."                 
                    },
                    facilator: {
                        required: "Facilator is required."
                    },               
                    status: {
                        required: "Status is required."
                    },
                    image: {
                        
                        extension: "Please upload file in these format only (jpg, jpeg, png,doc,pdf)."
                    }
                },
            //    errorElement: 'span',
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
