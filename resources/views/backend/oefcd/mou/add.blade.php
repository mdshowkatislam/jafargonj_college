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
                    <h1 class="m-0 text-dark">{{ !empty($editData) ? 'Update Mou' : 'Add Mou' }}
                    </h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Mou</li>
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
                    <a href="{{ route('oefcd.mou.list') }}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> MoU
                        List</a>
                </div>
                <form id="myForm"
                    action="{{ !empty($editData) ? route('oefcd.mou.update', $editData->id) : route('oefcd.mou.store') }}"
                    method="post" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <div class="card-body">

                        <div class="form-row">
                            
                            <div class="form-group col-sm-6">
                                <label class="control-label">Types of Institutions <span class="text-red">*</span></label>
                                <select id="institute_type" class="form-control form-control-sm select2"
                                    name="institute_type">
                                    <option value="">Please Select</option>
                                    <option value="1" {{ @$editData->institute_type == '1' ? 'selected' : '' }}>Local
                                        Institutes
                                    </option>
                                    <option value="2" {{ @$editData->institute_type == '2' ? 'selected' : '' }}>Foreign
                                        Institutes
                                    </option>

                                </select>
                            </div>


                            
                            <div class="form-group col-sm-6">
                                <label class="control-label">Name of Institute  <span class="text-red">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" id="name" autocomplete="off"
                                    value="{{ !empty($editData->name) ? @$editData->name : old('name') }}">
                                @error('rank')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label">Country  <span class="text-red">*</span></label>
                                <input type="text" class="form-control @error('country') is-invalid @enderror"
                                    name="country" id="country" autocomplete="off"
                                    value="{{ !empty($editData->country) ? @$editData->country : old('country') }}">
                                @error('rank')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              
                            </div>

                            <div class="form-group col-sm-6" >
                                <label class="control-label">Date </label>
                                <input type="text"
                                    class="form-control singledatepicker @error('date') is-invalid @enderror" name="date"
                                    placeholder="DD-MM-YYYY"
                                    value="{{ !empty($editData->date) ? date('d-m-Y', strtotime($editData->date)) : old('date') }}">
                                @error('rank')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Signing Authority</label>
                                <textarea id="signature" type="text" class="form-control @error('signature') is-invalid @enderror" name="signature">{{ !empty($editData->signature) ? $editData->signature : old('signature') }}</textarea>
                                @error('signature')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group  col-sm-2">
                                <div class="form-check" style="margin-left: 10px; margin-top:40px;">
                                    <input type="checkbox" name="status" class="form-check-input" id="status"
                                        value="1" {{ @$editData->status == 0 ? 'unchecked' : 'checked' }}>
                                    <label class="form-label" for="status">Active/Inactive</label>
                                </div>
                            </div>

                        </div>
                        <button class="btn bg-gradient-success btn-sm"><i class="fas fa-save"></i>
                            {{ !empty($editData) ? 'Update ' : 'Save' }}</button>

                    </div>
                </form>

            </div>
            <!--/. container-fluid -->
    </section>

    <script type="text/javascript">
        $(document).ready(function() {

            $(".btn-success").click(function() {
                var html = $(".clone").html();
                $(".increment").after(html);
            });

            $("body").on("click", ".btn-danger", function() {
                $(this).parents(".control-group").remove();
            });

        });
    </script>

    <script id="extra_taught_courses_templete" type="text/x-handlebars-template">
    <div class="row remove_taught_courses_extra_div" style="margin-top: 2px;margin-left: 0; margin-right:0;">
        <div class="col-11" style="border: 2px solid #e6e6b9;padding: 20px;border-radius: 10px 0px 0px 10px;">
            <div class="row">
                <div class="form-group col-sm-12">
                    <label>Upload new Attachments</label>
                    <input id="attachment" type="file" value="" multiple="multiple" class="form-control @error('attachment') is-invalid @enderror" name="attachment[@{{counter}}]"> @error('attachment')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span> @enderror
                </div>
            </div>
        </div>
        <div class="col-1" style="text-align: center;writing-mode: vertical-lr;background: #e6e6b9;border-radius: 0px 10px 10px 0px;">

            <div class="form-group col-md-2">
                <i class="btn btn-info fa fa-plus-circle add_taught_courses_extra"></i>
                <i class="btn btn-danger fa fa-minus-circle remove_taught_courses_extra"> </i>
            </div>

        </div>
    </div>
</script>

<script>
    $(document).ready(function() {
        

        $('#myForm').validate({
    
            ignore: [],
            debug: false,
            errorPlacement: function(error, element) {
                if (element.attr("name") == "institute_type") {
                    error.insertAfter(element.next());
                }else {
                    error.insertAfter(element);
                }
            },
            errorClass: 'text-danger',
            validClass: 'text-success',
            rules: {
                institute_type: {
                    required: true,
                },
                name: {
                    required: true,
                },
                country: {
                    required: true,
                }
            },
            messages: {
                institute_type: {
                    required: "Institute Type is required",
                },
                name: {
                    required: "Name is required",
                },
                country: {
                    required: "Country is required",
                },
            }
        });
    });
</script>
@endsection
