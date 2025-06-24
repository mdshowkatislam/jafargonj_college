@extends('backend.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">APA Categories</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">APA Category</li>
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
          <a href="{{ route('catagory.add') }}" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Add APA Category</a>
        </div>
        
        <div class="card-body">
          <table id="dataTable" class="table table-sm table-bordered table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Title</th>
                <th>Image</th>
                <th>Status</th>      
                <th>Reports</th>      
                <th width="90">Action</th>
              </tr>
            </thead>
            <tbody>
                @if(count($apa_category)>0)
                  @foreach($apa_category as $i => $myper)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                    {{ $myper->title}}
                    </td>
                    <td>
                      <img src="{{ asset('upload/apa_category/'.$myper->image) }}" alt="" class="img-fluid" style="max-height:80px;">
                    </td>
                 
                  
                    <td>{{ $myper->status == 1 ? 'Active' : 'Inactive' }}</td>
                    <td>
                      {{-- <div class="row"> --}}
                      {{-- <a class="btn btn-sm btn-info mx-1" href="{{ route('report.add', $myper->id) }}">Add</a> --}}
                      <a class="btn btn-sm btn-primary mx-1" href="{{ route('report.list', $myper->id) }}">Add Report</a>
                      
                      {{-- </div> --}}
                    </td>
                    <td>
                      {{-- <div class="row"> --}}
                      <a class="btn btn-sm btn-info mx-1" href="{{ route('catagory.edit', $myper->id) }}"><i class="fa fa-edit"></i></a>
                      <a class="btn btn-sm btn-danger delete" id="delete" title="Delete"
                          data-id="{{ $myper->id }}" data-token={{csrf_token()}} data-route="{{ route('catagory.delete') }}"><i class="fa fa-trash"></i></a>
                      {{-- <a class="delete btn btn-sm btn-danger" href="{{ route('catagory.delete', $myper->id) }}">Delete</a> --}}
                      {{-- </div> --}}
                    </td>
                  </tr>
                  @endforeach
                @else
                @endif          
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