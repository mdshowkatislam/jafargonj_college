@extends('backend.layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0 text-dark">{{ !empty($editData)? 'Update Banner' : 'Add Banner' }}</h1> --}}
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Logo</li>
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
                    <h5 class="m-0 text-dark float-left">
                        {{ !empty($editData) ? 'Update Logo' : 'Add Logo' }}
                    </h5>
                    <a href="{{ route('site-setting.logo') }}"
                       class="btn btn-info btn-sm float-right">
                        <i class="fas fa-stream"></i> View Logo
                    </a>
                </div>
                <div class="card-body">
                    <form id="myForm"
                          action="{{ !empty($editData) ? route('site-setting.logo.update', $editData->id) : route('site-setting.logo.store') }}"
                          method="post"
                          enctype="multipart/form-data"
                          autocomplete="off">
                        @csrf
                        <div class="form-row">

                            <div class="form-group col-sm-5">
                                <label>Name <span class="text-red">*</span></label>
                                <input type="text"
                                       name="name"
                                       class="form-control  @error('name') is-invalid @enderror"
                                       id="name"
                                       value="{{ !empty($editData->name) ? $editData->name : old('name') }}">
                                @error('name')
                                    <span class="invalid-feedback"
                                          role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-sm-5">
                                <label>Image <small style="color: brown"> (Max 2 mb, Preferred file: jpg,jpeg,png)</small><span
                                          class="text-red">*</span></label>
                                <input type="file"
                                       class="form-control  @error('image') is-invalid @enderror"
                                       name="image">
                                @if (@$editData->image)
                                    <span class="valid-feedback"
                                          role="alert"
                                          style="display:block">
                                        <strong>{{ @$editData->image }}</strong>
                                    </span>
                                @endif

                                @error('image')
                                    <span class="invalid-feedback"
                                          role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-sm-2">
                                <img src="{{ asset('upload/logo/' . @$editData['image']) }}" width="100%" height="auto" onerror="this.onerror=null;this.src='{{ asset('upload/no-image.png') }}';">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="position">Position <span class="text-danger">*</span></label>
                                <select id="position"
                                        name="type_id"
                                        class="form-control select2">
                                    <option value="">Please Position</option>
                                    <option value="1"
                                            {{ @$editData->type_id == 1 ? 'selected' : '' }}> Header Navbar
                                    </option>
                                    <option value="2"
                                            {{ @$editData->type_id == 2 ? 'selected' : '' }}> Header Navbar Fixed
                                    </option>

                                    <option value="3"
                                            {{ @$editData->type_id == 3 ? 'selected' : '' }}> Footer Center
                                    </option>
                                    <option value="4"
                                            {{ @$editData->type_id == 4 ? 'selected' : '' }}> Footer Right Left
                                    </option>
                                    <option value="5"
                                            {{ @$editData->type_id == 5 ? 'selected' : '' }}> Footer Right Right
                                    </option>
                                    
                                    <option value="6"
                                            {{ @$editData->type_id == 5 ? 'selected' : '' }}> Faculty Navber
                                    </option>
                                    <option value="7"
                                            {{ @$editData->type_id == 5 ? 'selected' : '' }}> Department Navber
                                    </option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="status">Status <span class="text-danger">*</span></label>
                                <select id="status"
                                        name="status"
                                        class="form-control select2">
                                    <option value="">Please Select</option>
                                    <option value="1"
                                            {{ @$editData->status == 1 ? 'selected' : '' }}> Active </option>
                                    <option value="0"
                                            {{ @$editData->status == 0 ? 'selected' : '' }}> Inactive
                                    </option>
                                </select>
                            </div>

                        </div>
                          <button class="btn bg-gradient-success ">
                                <i class="fas fa-save"></i> {{ empty($editData) ? 'Save Logo' : 'Update Logo' }}
                            </button>
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
                    name: {
                        required: true,
                    },
                    status: {
                        required: true
                    },
                    <?php if(!@$editData){ ?>
                        image: {
                            required: true,
                            extension: "jpg|jpeg|png",
                        },
                    <?php }else{ ?>
                        image: {
                            extension: "jpg|jpeg|png",
                        },
                    <?php  } ?>

                },

                messages: {
                    name: {
                        required: "Name is required."
                    },
                    status: {
                        required: "Status is required."
                    },
                    image: {
                        required: "Please Upload Image.",
                        extension: "Please upload file in these format only (jpg, jpeg, png)."
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
@endsection
