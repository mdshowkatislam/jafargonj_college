@extends('backend.layouts.app') @section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0 text-dark">Add Team Member</h1> --}}
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Add Procurement</li>
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

    {{-- @php
    foreach ($variable as $key => $value) {
       echo $value->nameEn;
    }
  @endphp --}}

    <section class="content">
        <div class="container-fluid">

            <div class="card card-outline card-info">
                <div class="card-header">
                    <h5 class="m-0 text-dark float-left">Add Procurement </h5>
                    <a href="{{ route('manage_procurement') }}"
                       class="btn btn-info btn-sm float-right"><i class="fas fa-stream"></i> View Procurement</a>
                </div>
                <div class="card-body">
                    <form id="myForm1"
                          action="{{ route('manage_procurement.store') }} "
                          method="post"
                          enctype="multipart/form-data"
                          autocomplete="off">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-sm-6">
                                <label>Title <span class="text-red">*</span></label>
                                <input type="text"
                                       value="{{ $title }}"
                                       name="title"
                                       placeholder="Title"
                                       id="title"
                                       class="form-control @error('title') is-invalid @enderror">
                                @error('title')
                                    <span class="invalid-feedback"
                                          role="alert">
                                     <strong> {{ $message }}</strong>  
                                    </span>
                                @enderror

                            </div>

                            <div class="form-group col-sm-6">
                                <label>File <small style="color: red"> (Max: 2 mb, Preferred files:
                                        jpg,jpeg,png,pdf,doc,docx)</small></label>
                                <input type="file"
                                       name="image"
                                       class="form-control">
                                <img width="50px"
                                     src="{{ asset('storage/app/media/procurement/' . $image) }}"
                                     alt="">
                                @error('image')
                                    <div class="text-red"
                                         role="alert">
                                         <strong> {{ $message }}</strong>  
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="status">@lang('Status') <span class="text-red">*</span></label>
                                <select name="status"
                                        class="form-control select2">
                                    <option value="">@lang('Please Select')</option>
                                    <option value="1"
                                            {{ @$status == '1' ? 'selected' : '' }}>Active</option>
                                    <option value="0"
                                            {{ @$status == '0' ? 'selected' : '' }}>Inactive</option>
                                </select>
                                @error('status')
                                    <span class="text-red">  <strong> {{ $message }}</strong>  </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Publish Date</label>
                                <input type="date"
                                       value="{{ $publish_date }}"
                                       name="publish_date"
                                       placeholder="Publish Date"
                                       class="form-control">
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Start Date</label>
                                <input type="date"
                                       value="{{ $start_date }}"
                                       name="start_date"
                                       placeholder="Start Date"
                                       class="form-control">
                            </div>

                            <div class="form-group col-sm-6">
                                <label>End Date</label>
                                <input type="date"
                                       value="{{ $end_date }}"
                                       name="end_date"
                                       placeholder="End Date"
                                       class="form-control">
                            </div>


                            <div class="form-group col-md-12">
                                <label for="short_description">Short Description</label>
                                <textarea name="short_description"
                                          class="textarea"
                                          id=""
                                          cols="5"
                                          rows="5">{{ $short_des }}</textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="long_description">Long Description</label>
                                <textarea name="long_description"
                                          class="textarea"
                                          id=""
                                          cols="5"
                                          rows="5">{{ $long_des }}</textarea>
                            </div>
                        </div>

                        <input type="hidden"
                               name="id"
                               value="{{ $id }}">
                        <button class="btn bg-gradient-info btn-flat"><i class="fas fa-save"></i> Add Procurement</button>
                    </form>

                </div>

            </div>
            <!--/. container-fluid -->
    </section>
    <script type="text/javascript">
        $(function() {
            $('#tour_name').on('keyup', function() {
                var Text = $(this).val();
                Text = Text.toLowerCase();
                Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');
                $("#tour_slug").val(Text);
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
              $('textarea').each(function() {
                  $(this).val($(this).val().trim());
               });
           
            $('#myForm1').validate({
              
                rules: {
                    title: {
                        required: true,
                    },
                    status: {
                        required: true,
                    },
                    image: {
                        extends: "jpg|jpeg|png|pdf|doc|docx",
                    }
                },
                messages: {
                    title: {
                        required: "Title is required",
                    },
                    status: {
                        required: "Please select a Status",
                    },
                    image: {
                        extends: "Preferred files: jpg,jpeg,png,pdf,doc,docx",
                    }

                },
                // errorElement: 'span',
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
