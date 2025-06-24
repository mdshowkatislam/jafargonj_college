@extends('backend.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">List of Hall Member</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Hall Member</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->


<section class="content">
  <div class="container-fluid">
    <div class="row">
     <div class="col-lg-12">
      <div class="card">

        <div class="card-header">
                <a href="{{route('setup.manage_hall')}}" class="btn btn-success btn-sm"><i class="fas fa-stream"></i> Hall List</a>
                <a href="{{ route('setup.manage_hall_member.add', $hall_id) }}" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Add Hall Member</a>
        </div>

        <div class="card-body">
          <table id="dataTable" class="table table-sm table-bordered table-striped">
            <thead>
              <tr>
                <th width="5%">#</th>
                <th width="20%">Hall Name</th>
                <th width="20%">Hall Member Type</th>
                <th width="20%">Member</th>
                <th width="10%">Sort Order</th>
                <th width="10%">Status</th>
                <th width="5%">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($members_list as $d)
            
              <tr>
                <td> {{$loop->iteration}}</td>
                <td>{{ @$d['hall']['name'] }}</td>
                @if(@$d['type_id']==1)
                <td>House tutor</td>
                @elseif(@$d['type_id']==2)
                <td>Administrative Staff</td>
                @endif
                <td>{{ @$d->member->nameEn }}</td>
                <td>{{ @$d['sort_order'] }}</td>
                <td>
                  @if(@$d['status'] == 1)
                  <span class="badge badge-success">Active</span>
                  @else
                  <span class="badge badge-danger">Inctive</span>
                  @endif
                </td>
                <td>
                <a href="{{ route('setup.manage_hall_member.edit',[$d->id]) }}" class="btn btn-primary btn-flat btn-sm edit" data-type="image" data-id="{{$d->id}}"><i class="fas fa-edit"></i></a>
                <a href="{{ route('setup.manage_hall_member.delete',[$d->id]) }}"  class="btn btn-danger btn-flat btn-sm"><i class="fas fa-trash"></i></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
</div>
<!--/. container-fluid -->
</section>
@endsection

