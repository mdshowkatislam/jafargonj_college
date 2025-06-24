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
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0 text-dark"> VC's Honor Board Member</h1> --}}
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">@lang('Home')</a></li>
                        <li class="breadcrumb-item active">Honor Board Member</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <div class="container fullbody">
        <div class="col-md-12">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h5>New Honor Board Member
                        <a class="btn btn-sm btn-info float-right"
                           href="{{ route('vc.honor.board.list') }}"
                           style="margin-right: 2px;"><i class="fa fa-plus-circle"></i> @lang('View List')</a>
                    </h5>
                </div>
                <!-- Form Start-->
                <form method="post"
                      action="{{ !empty($editData) ? route('vc.honor.board.update', @$editData->id) : route('vc.honor.board.store') }}"
                      enctype="multipart/form-data"
                      id="myForm">
                    @csrf
                    <div class="card-body">
                        <div class="show_module_more_event">

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="control-label">Name <span class="text-red">*</span></label>
                                    <input type="text"
                                           name="name"
                                           class="form-control"
                                           placeholder="Enter Name"
                                           value="{{ !empty($editData->name) ? $editData->name : old('name') }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Type <span class="text-red">*</span></label>
                                    <select class="select2 form-control @error('type_id') is-invalid @enderror"
                                            name="type_id">
                                        <option value="">Please Select Type</option>
                                        <option value="1"
                                                {{ @$editData->type_id == 1 ? 'selected' : '' }}>VC</option>
                                        <option value="2"
                                                {{ @$editData->type_id == 2 ? 'selected' : '' }}>Pro VC
                                        </option>
                                        <option value="3"
                                                {{ @$editData->type_id == 3 ? 'selected' : '' }}>Treasurer
                                        </option>
                                    </select>
                                    @error('type_id')
                                        <span class="invalid-feedback"
                                              role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label">Designation <span class="text-red">*</span></label>
                                    <input type="text"
                                           name="designation"
                                           class="form-control"
                                           placeholder="Enter Designation"
                                           value="{{ !empty($editData->designation) ? $editData->designation : old('designation') }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label">Start Date <span class="text-red">*</span></label>
                                    <input type="date"
                                           name="start_date"
                                           class="form-control"
                                           value="{{ !empty($editData->start_date) ? $editData->start_date : old('start_date') }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label">End Date <span class="text-red">*</span></label>
                                    <input type="date"
                                           name="end_date"
                                           class="form-control"
                                           value="{{ !empty($editData->end_date) ? $editData->end_date : old('end_date') }}">
                                        @if ($errors->has('end_date'))
                                           <span class="text-danger" style="font-size: 0.8rem;">{{ $errors->first('end_date') }}</span>
                                        @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Status <span class="text-red">*</span></label>
                                    <select class="select2 form-control @error('status') is-invalid @enderror"
                                            name="status">
                                        <option value="">Please Select Type</option>
                                        <option value="1"
                                                {{ @$editData->status == 1 ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="0"
                                                {{ @$editData->status == 0 ? 'selected' : '' }}>Inactive
                                        </option>
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback"
                                              role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <label class="control-label">Image<small style="color: brown"> (Max 2 mb, Preferred file: jpg,jpeg,png)</small>  <span class="text-red">*</span></label>
                                            <input type="file"
                                                   name="image"
                                                   id="Vcimage"
                                                   class="form-control @error('image') is-invalid @enderror">
                                            @error('image')
                                                <span class="invalid-feedback"
                                                      role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="card-body">
                                            <img id="show_Vcimage"
                                                 class="img-fluid"
                                                 src="{{ !empty(@$editData->image) ? url('upload/vc_honor_board/' . @$editData->image) : url('upload/no_image.png') }}">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit"
                                class="btn btn-info btn-sm">
                            @if (isset($editData))
                                @lang('Update')
                            @else
                                @lang('Save')
                            @endif
                        </button>
                    </div>
                </form>
                <!--Form End-->
            </div>
        </div>
    </div>
    <script type="text/javascript">
      
        $(document).ready(function() {
            var editData = '{{@$editData}}';
            $('#myForm').validate({
                ignore: [],
                debug: false,
                errorClass: 'text-danger',
                validClass: 'text-success',
                rules: {
                 
                    name: {
                        required:true,
                     
                   },
                   type_id: {
                        required:true,
                        digits:true                 
                   },
                   designation: {
                        required:true,
                     
                   },
                   start_date: {
                        required:true,
                     
                   },
                //    end_date: {
                //         required:true,
                     
                //    },
                   status: {
                        required:true,
                     
                   },
                   
                    image: {
                        required: function(element) {
                            return !editData;
                        },
                        extension: "jpg|jpeg|png"
                    },
                    
                    
                },

                messages: {
                    name: {
                        required:"Name is required"                    
                    },
                    type_id: {
                        required:"Type_id is required" ,                  
                        digits:"Invalide number"                    
                    },
                    designation: {
                        required:"Designation is required"                    
                    },
                    start_date: {
                        required:"Start Date is required"                    
                    },
                    // end_date: {
                    //     required:"End Date is required"                    
                    // },
                    status: {
                        required:"Please select a Status"                    
                    },
                    image: {
                        required:"Image is required",
                        extension: "Please upload file in these format only (jpg, jpeg, png)."
                    },
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

    <script type="text/javascript">
    
        $(document).ready(function() {
            $('#Vcimage').change(function(e) { //show Image before upload
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#show_Vcimage').attr('src', e.target.result);
                };
                reader.readAsDataURL(e.target.files[0]);
            });
        });
       
    </script>

   
@endsection
