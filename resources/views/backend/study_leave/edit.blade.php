@extends('backend.layouts.app') @section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Update Leave</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Leave</li>
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
                <a href="{{route('manage_leave')}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> View Leave</a>
            </div>
            <div class="card-body">
                <form id="myForm" action="{{ route('manage_leave.update', $editData->id)}} " method="post" enctype="multipart/form-data" autocomplete="off">

                    @csrf
                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label>Purpose Name <span class="text-red">*</span></label>
                            <input id="purpose" type="text" value="{{$editData->purpose}}" class="form-control @error('purpose') is-invalid @enderror" name="purpose" placeholder="Write Some Purposes" > @error('purpose')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>

                        <div class="form-group col-sm-6">
                            <label>Passport Number <span class="text-red">*</span></label>
                            <input id="passport" type="text" value="{{$editData->passport}}" class="form-control @error('passport') is-invalid @enderror" name="passport" placeholder="Write a passport number" >
                            @error('passport')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>



                        <div class="form-group col-sm-6">
                            <label>Country <span class="text-red">*</span></label>
                            <input id="country" type="text" value="{{$editData->country}}" class="form-control @error('country') is-invalid @enderror" name="country" placeholder="Write country name" > @error('country')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>

                        <div class="form-group col-sm-6">
                            <label>Member <span class="text-red">*</span></label>
                            <select name="profile_id" class="form-control select2">
                                <option value="">Please Select Member</option>
                                @foreach($profiles as $profile)

                               <option value="{{$profile->id}}" {{ $editData->profile_id == $profile->id ? "selected" : "" }} > {{$profile->nameEn}}</option>

                               @endforeach

                            </select>
                        </div>

                        <div class="form-group col-sm-6">
                            <label>Start Date <span class="text-red">*</span></label>
                            <input id="start_by" type="date" value="{{date('Y-m-d', strtotime($editData->start_by))}}" class="form-control @error('start_by') is-invalid @enderror" name="start_by" placeholder="Write start date" > @error('start_by')
                            <span class="invalid-feedback" role="alert">

                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>

                        <div class="form-group col-sm-6">
                            <label>End Date <span class="text-red">*</span></label>
                            <input id="end_by" type="date" value="{{date('Y-m-d', strtotime($editData->start_by))}}" class="form-control @error('end_by') is-invalid @enderror" name="end_by" placeholder="Write end date" > @error('end_by')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Status <span class="text-red">*</span></label>
                            <select name="status" class="form-control">
                                <option value="">Please Select Type</option>
                                <option {{ $editData->status == 1 ? "selected" : ""}} value="1">Active</option>
                                <option {{ $editData->status == 0 ? "selected" : ""}} value="0">Inactive</option>
                            </select>

                        </div>
                    </div>
                    <button class="btn bg-gradient-success btn-flat"><i class="fas fa-save"></i> Update Leave</button>
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

            $('#myForm').validate({
                ignore: [],
                debug: false,
                errorPlacement: function(error, element) {
                    if (element.attr("name") == "profile_id") {
                        error.insertAfter(element.next());
                    }else {
                        error.insertAfter(element);
                    }
                },
                errorClass: 'text-danger',
                validClass: 'text-success',
                rules: {
                    purpose: {
                        required: true,
                    },
                    passport: {
                        required: true,
                    },
                    country: {
                        required: true,
                    },
                    profile_id: {
                        required: true,
                    },
                    start_by: {
                        required: true,
                    },
                    end_by: {
                        required: true,
                    },
                },
                messages: {
                    purpose: {
                        required: "Purpose is required",
                    },
                    passport: {
                        required: "Passport Number is required",
                    },
                    country: {
                        required: "Country is required",
                    },
                    profile_id: {
                        required: "Member is required",
                    },
                    start_by: {
                        required: "Start Date is required",
                    },
                    end_by: {
                        required: "End Date is required",
                    },
                }
            });
        });
    </script>
    @endsection
