@extends('backend.layouts.app') @section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">About</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item">About</li>
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
                    <a href="{{route('oefcd.index')}}" class="btn btn-info btn-sm"><i
                            class="fas fa-stream"></i> Back</a>
                </div>
                <div class="card-body">
                    <form
                        action="{{ route('about_oefcd.update', @$data->id) }}"
                        method="post" enctype="multipart/form-data" autocomplete="off" id="myForm">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-sm-12">
                                <label>Mission <span class="text-red">*</span></label>
                                <textarea name="mission" class="textarea" required="">{{ @$data->mission }}</textarea>
                            </div>
                            <div class="form-group col-sm-12">
                                <label>Vision <span class="text-red">*</span></label>
                                <textarea name="vision" class="textarea" required="">{{ @$data->vision }}</textarea>
                            </div>
                            <div class="form-group col-sm-12">
                                <label>Objectives <span class="text-red">*</span></label>
                                <textarea name="objective" class="textarea" required="">{{ @$data->objective }}</textarea>
                            </div>
                            <div class="form-group col-sm-12">
                                <label>Functions of OEFCD <span class="text-red">*</span></label>
                                <textarea name="functions" class="textarea" required="">{{ @$data->functions }}</textarea>
                            </div>
                            <div class="form-group col-sm-3">
                                <button class="btn btn-sm btn-primary">
                                   Update</button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
            <!--/. container-fluid -->
    </section>
    <script type="text/javascript">
        $(document).ready(function() {
            // var a1 = CKEDITOR.replace('description');
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
                errorPlacement: function(error, element) {
                    if (element.attr("name") == "mission") {
                        error.insertAfter(element.next());
                    }else if (element.attr("name") == "vision") {
                        error.insertAfter(element.next());
                    }
                    else if (element.attr("name") == "objective") {
                        error.insertAfter(element.next());
                    }
                    else if (element.attr("name") == "functions") {
                        error.insertAfter(element.next());
                    }
                    else {
                        error.insertAfter(element);
                    }
                },
                errorClass: 'text-danger',
                validClass: 'text-success',
                rules: {
                    mission: {
                        required: true,
                    },
                    vision: {
                        required: true,
                    },
                    objective: {
                        required: true,
                    },
                    functions: {
                        required: true,
                    }
                    
                },
                messages: {
                    mission: {
                        required: "Mission is required",
                    },
                    vision: {
                        required: "Vision is required",
                    },
                    objective: {
                        required: "Objectives is required",
                    },
                    functions: {
                        required: "Functions is required",
                    }

                }
            });
        });
    </script>
@endsection
