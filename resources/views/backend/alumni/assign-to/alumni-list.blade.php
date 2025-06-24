@extends('backend.layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0 text-dark"> @lang('List of alumni')</h1> --}}
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">@lang('Home')</a></li>
                        <li class="breadcrumb-item active">@lang('Alumni')</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script type="text/javascript">
                $(function() {
                    $.notify("{{ $error }}", {
                        globalPosition: 'top right',
                        className: 'error'
                    });
                });
            </script>
        @endforeach
    @endif
    <div class="content">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h5>@lang('Assign Member to Alumni') @lang('List')
                            <a class="btn btn-sm btn-primary float-right" href="{{ route('alumni.assign.to.alumni') }}"><i class="fa fa-plus-circle"></i> Assign member to Alumni </a>
                            @if (auth()->user()->id == 1)
                                <a class="btn btn-sm btn-success float-right mx-2" href="{{ route('alumni_member_user.add') }}"><i class="fa fa-plus-circle"></i> @lang('alumni Member To') @lang('User')</a>
                            @endif
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="border border-info p-3 rounded mb-3">
                            <div>
                                <label class="control-label">Please Select alumni : </label>
                                <select name="alumni_id" id="alumni_id" class="form-control select2">
                                    <option value="" selected >All</option>
                                    @foreach ($alumnis as $alumni)
                                        <option value="{{ $alumni->id }}">
                                            {{ $alumni->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <table id="" class="table table-sm table-bordered table-striped" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>@lang('SL')</th>
                                    <th>@lang('ID')</th>
                                    <th>@lang('Student Name')</th>
                                    <th>@lang('Student Email')</th>
                                    <th>@lang('Designation')</th>
                                    <th>@lang('Start Date')</th>
                                    <th>@lang('End Date')</th>
                                    <th>@lang('Status')</th>
                                    <th style="width:10%">@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody class="table_body_container">

                                @foreach ($alumnis as $alumni)
                                    @php
                                        $assign_to_alumnis = \App\Models\AssignToAlumni::leftjoin('alumni_members', 'alumni_members.id', '=', 'assign_to_alumnis.alumni_member_id')
                                            ->leftJoin('alumni_designations', 'alumni_designations.id', '=', 'assign_to_alumnis.alumni_designation_id')
                                            ->select('assign_to_alumnis.*', 'alumni_members.name as member_name', 'alumni_members.student_id as student_id', 'alumni_members.email as email', 'alumni_members.status as member_status', 'alumni_designations.name as designations_name')
                                            ->where('alumni_id', $alumni->id)
                                            ->where('alumni_members.status', 1)
                                            ->orderBy('alumni_designations.id')
                                            ->get();
                                        //dd($assign_to_alumnis);
                                    @endphp
                                    @if (count($assign_to_alumnis) > 0)
                                        <tr>
                                            <td colspan="9" style="padding:15px;font-weight: bold;color: #3f8b62;">
                                                {{ $alumni->name }}
                                            </td>
                                        </tr>
                                        @foreach ($assign_to_alumnis as $assign_to_alumni)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $assign_to_alumni->student_id }}</td>
                                                <td>{{ $assign_to_alumni->member_name }}</td>
                                                <td>{{ $assign_to_alumni->email }}</td>
                                                <td>{{ $assign_to_alumni->designations_name }}</td>
                                                <td>{{ @$assign_to_alumni->join_date ? date('d-M-Y', strtotime(@$assign_to_alumni->join_date)) : '' }}</td>
                                                <td>{{ @$assign_to_alumni->expire_date ? date('d-M-Y', strtotime(@$assign_to_alumni->expire_date)) : '' }}</td>
                                                <td>{!! $assign_to_alumni->status == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>' !!}</td>
                                                <td>
                                                    <a href="{{ route('alumni.assign.to.alumni.edit', $assign_to_alumni->id) }}" class="btn btn-primary btn-sm " title="Edit alumni"><i class="fa fa-edit"></i></a>
                                                    <a class="btn btn-danger btn-sm delete " style="cursor: pointer" id="delete" title="Delete" data-route="{{ route('alumni.assign.to.alumni.delete') }}" data-id="{{ $assign_to_alumni->id }}" data-token={{ csrf_token() }}><i class="fas fa-trash text-white"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).on('select change', '#alumni_id', function() {
            var alumni_id = $('#alumni_id').val();
            $.ajax({
                url: "{{ route('assign.member.by.alumni') }}",
                type: "GET",
                data: {
                    alumni_id: alumni_id
                },
                beforeSend: function() {
                    // $('.preload').show();
                },
                success: function(response) {
                    $('.table_body_container').html(response);
                    // showToast('Data fetch successfully!', 'info');
                },
                error: function() {
                    // showToast('Something went wrong!', 'warning');
                },
                complete: function() {
                    // $('.preload').hide();
                }
            });
        });


        // function showToast(message, type) {
        //     Swal.fire({
        //         icon: type,
        //         customClass: {
        //             popup: 'colored-toast'
        //         },
        //         iconColor: 'white',
        //         title: message,
        //         toast: true,
        //         position: 'top-end',
        //         showConfirmButton: false,
        //         timer: 3000,
        //         timerProgressBar: true
        //     });
        // }
    </script>

@endsection
