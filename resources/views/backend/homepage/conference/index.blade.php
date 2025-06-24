@extends('backend.layouts.app')
@section('content')
<div class="col-xl-12">
  <div class="breadcrumb-holder">
    <h2 class="main-title float-left" style="margin-top: 10px">Conference Member</h2>
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><strong>@lang('Home')</strong></a></li>
      <li class="breadcrumb-item active">@lang('Conference Member')</li>
    </ol>
    <div class="clearfix"></div>
  </div>
</div>

@if ($errors->any())
  @foreach ($errors->all() as $error)
  <script type="text/javascript">
    $(function () {
      $.notify("{{$error}}", {globalPosition: 'top right', className: 'error'});
    });
  </script>
  @endforeach
@endif

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Member List
                    <a class="btn btn-sm btn-success float-right" href="{{route('conferences.member.add')}}"><i class="fa fa-plus-circle"></i> Add Conference Member</a>
                </h5>
           </div>

            <div class="card-body">
                <table id="dataTable" class="table table-sm table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Member Type</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Description</td>
                            <th>Status</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($allData as $key => $member)
                          <tr>
                              <td>{{ $key + 1 }}</td>
                              <td>{{ $member->member_type == '1' ? 'ORGANIZING COMMITTEE' : 'GUESTS & SPEAKERS' }}</td>
                              <td>{{ $member->member_name  }}</td>
                              <td>
                                  {{ $member->designation_1 }}<br>
                                  {{ $member->designation_2 }}<br>
                                  {{ $member->designation_3 }}
                              </td>
                              <td>{{ $member->phone }}</td>
                              <td>{{ $member->email }}</td>
                              <td>{{ $member->description }}</td>
                              <td>
                                  @if ($member->status == 1)
                                      <span class="badge bg-success">Active</span>
                                  @else
                                      <span class="badge bg-danger">Inactive</span>
                                  @endif
                              </td>
                            <td>
                                <img src="{{ asset('uploads/conference/' . $member->image) }}" alt="{{ $member->member_name }}" style="width: 50px; height: 50px;">
                            </td>
                            <td>
                                <a href="{{ route('conferences.member.edit', $member->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <a href="{{ route('conferences.member.delete', $member->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
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
