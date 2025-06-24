@extends('backend.layouts.app') @section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Update CHSR Research Area</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">CHSR Research Area</li>
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
                <div class="card-header">
                    <a href="{{ route('chsr.manage_research_area') }}" class="btn btn-info btn-sm"><i
                            class="fas fa-stream"></i> View CHSR Research Area</a>
                </div>
                <div class="card-body">
                    <form id="myForm" action="{{ route('chsr.manage_research_area.update', $editData->id) }} " method="post"
                        enctype="multipart/form-data" autocomplete="off">

                        @csrf
                        <div class="form-row">
                            <div class="form-group col-sm-6">
                                <label>Faculty</label>
                                <input class="form-control" name="faculty_id" type="hidden" value="{{ $editData->faculty_id }}">
                                <input class="form-control" type="text" value="{{ $editData->faculty->name }}" disabled>
                                {{-- <select name="faculty_id" class="form-control select2" required>
                                    <option value="" disabled>Please Select</option>
                                    @foreach ($faculties as $list)
                                        <option value="{{ @$list->id }}"
                                            {{ $editData->id == $list->id ? 'selected' : '' }}>{{ $list->name }}</option>
                                    @endforeach
                                </select> --}}
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Status <span class="text-red">*</span></label>
                                <select name="status" class="form-control" required>
                                    <option value="">Please Select</option>
                                    <option value="1" @if ($editData->status == 1) selected @endif>Active</option>
                                    <option value="0" @if ($editData->status == 0) selected @endif>Inactive
                                    </option>
                                </select>
                            </div>
                            <div class="form-group col-sm-12">
                                <label>Description</label>
                                <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror textarea"
                                    name="description">
                                    {{ !empty($editData->description) ? $editData->description : old('description') }}
                                </textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                        <button class="btn bg-gradient-success btn-flat"><i class="fas fa-save mr-1"></i>Update CHSR
                            Research Area</button>
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
            //   $('textarea').each(function(){
            //     $(this).val($(this).val().trim());
            //   });
            $('#myForm').validate({
                rules: {
                  
                    status:{
                        required: true,
                    }
                },

                messages: {             
                    status: {
                        required: "Please select status."
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
