@extends('backend.layouts.app') @section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0 text-dark">Add Committee Member</h1> --}}
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Add Committee</li>
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
                    <h5 class="m-0 text-dark float-left">Add Committee Member</h5>
                    <a href="{{ route('manage_team') }}" class="btn btn-info btn-sm float-right"><i class="fas fa-stream"></i> View Committee</a>
                </div>
                <div class="card-body">

                    <form id="myForm" action="{{ route('manage_team.store') }} " method="post" enctype="multipart/form-data" autocomplete="off">

                        @csrf
                        <div class="form-row">

                            <div class="form-group col-sm-6">
                                <label>Committee Member Type <span class="text-red">*</span></label>
                                <select name="type_id" class="form-control select2" required>
                                    <option value="">Please Select</option>
                                    <option value="1" {{ @$editData->type_id == 1 ? 'selected' : '' }}>Quality Assurance Committee (QAC)</option>
                                    <option value="2" {{ @$editData->type_id == 2 ? 'selected' : '' }}>Faculty Quality Assurance Committee (FQAC)</option>
                                    <option value="3" {{ @$editData->type_id == 3 ? 'selected' : '' }}>Programme Self-Assessment Committee (PSAC)</option>
                                </select>
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Committee Member <span class="text-red">*</span></label>
                                <select name="team_member" class="form-control select2" required>
                                    <option value="">Please Select</option>
                                    @foreach ($teaMember as $list)
                                        <option value="{{ $list->id }}">{{ $list->nameEn }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Designation <span class="text-red">*</span></label>
                                <select name="designation" class="form-control select2" required>
                                    <option value="">Please Select</option>
                                    @foreach ($designations as $designation)
                                        <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Sort Order <span class="text-red">*</span></label>
                                <input id="sort_order" type="text" value="{{ @$editData->sort_order }}" class="form-control @error('sort_order') is-invalid @enderror" name="sort_order" placeholder="Sort Order">
                                 @error('sort_order')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Status <span class="text-red">*</span></label>
                                <select name="status" class="form-control" required>
                                    <option value="">Please Select</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>

                        <button class="btn bg-gradient-info btn-flat"><i class="fas fa-save"></i> Add Committee</button>
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
                    type_id: {
                        required: true,
                    },
                    team_member:{
                        required: true,
                    },
                    designation: {
                        required: true,
                        digits: true,
                        {{--  minlength: 11  --}}
                    },
                    sort_order: {
                        required: true,
                        digits: true,
                    },
                    status: {
                        required: true
                    }
                },

                messages: {
                    type_id: {
                        required: "Type Id is required."
                    },
                    team_member: {
                        required: "Team Member is required."
                    },
                    
                    designation: {
                        required: "Designation is required."
                    },
                    sort_order: {
                        required: "Sort Order is required",
                        digits: "Invalid Order"
                    },
                    status: {
                        required: "Status is required."
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
