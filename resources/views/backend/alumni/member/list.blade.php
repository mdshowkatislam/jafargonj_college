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
                        <h5>@lang('All Members for Alumni')
                            <a class="btn btn-sm btn-primary float-right" href="{{ route('alumni.member.add') }}"><i class="fa fa-plus-circle"></i> @lang('Add') @lang('Member')</a>
                        </h5>
                    </div>
                    <div class="card-body">
                        <table id="dataTable" class="table table-sm table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>@lang('SL')</th>
                                    <th>@lang('Student Name')</th>
                                    <th>@lang('Created By')</th>
                                    <th>@lang('Email')</th>
                                    {{-- <th>@lang('alumni Name')</th> --}}
                                    {{-- <th>@lang('Designation')</th> --}}
                                    <th>@lang('Status')</th>
                                    <th>@lang('Image')</th>
                                    <th style="width:10%">@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alumni_members as $index => $alumni_member)
                                    @php
                                        $user_id = $alumni_member->created_by;
                                        // dd($user_id);
                                        if ($user_id == 1 || $user_id == null) {
                                            $created_by = 'Admin';
                                        }
                                        else{
                                            $user = \App\Models\User::where('id', $user_id)->first();
                                            if($user){
                                                $alumni = \App\Models\AssignToAlumni::where('alumni_member_id', $user->profile_id)->first();
                                                $created_by = @$alumni->alumni->name;
                                            }
                                        }
                                    @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $alumni_member->name }}</td>
                                        <td>{{ @$created_by}}</td>
                                        <td>{{ $alumni_member->email }}</td>
                                        {{-- <td>{{ optional($alumni_member->member_detail)->name }}</td> --}}
                                        {{-- <td>{{ !empty($detail->c_name) ? $detail->c_name : 'Not Assign' }}</td> --}}
                                        {{-- <td>{{ isset($detail->d_name) ? $detail->d_name : 'Not Assign'}}</td> --}}
                                        @if ($alumni_member->status == 1)
                                            <td> <span class="badge badge-success">Active</span></td>
                                        @else
                                            <td><span class="badge badge-danger">Inactive</span></td>
                                        @endif
                                        <td>
                                            <img src="{{ asset('upload/alumni/member/image/' . $alumni_member->image) }}" onerror="this.onerror=null;this.src='{{ asset('upload/no_image.jpg') }}';" alt="alumni_member_image" style="width:40px; height:40px;">
                                        </td>
                                        <td>
                                            {{-- <a href="" class="btn btn-primary btn-sm" title="Event List"><i class="fa fa-list"></i></a> --}}
                                            <a href="{{ route('alumni.member.edit', $alumni_member->id) }}" class="btn btn-primary btn-sm mt-1" title="Edit Alumni"><i class="fa fa-edit"></i></a>
                                            <a  class="btn btn-danger btn-sm delete mt-1" style="cursor: pointer" id="delete" title="Delete" data-route = "{{ route('alumni.member.delete') }}" data-id="{{ $alumni_member->id }}" data-token={{csrf_token()}} ><i class="fas fa-trash text-white"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
