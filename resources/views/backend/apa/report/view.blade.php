@extends('backend.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">APA Reports</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">APA Reports</li>
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
          <a href="{{ route('report.add', $apa_category->id) }}" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Add APA Report</a>
          <a href="{{ route('catagory.list') }}" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> APA Category List</a>

        </div>
        <div class="card-body">
          <h5><label for="">APA Category: </label> {{@$apa_category->title}}</h5>
          <table id="dataTable" class="table table-sm table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                {{-- <th>Category Name</th> --}}
                <th>Title</th>
                <th>Url</th>
                <th>Status</th>
                <th>Publish date</th>
                <th width="90">Action</th>
              </tr>
            </thead>
            <tbody>
                @if(count($apa_report)>0)
                  @foreach($apa_report as $i => $myper)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    {{-- <td>
                     {{ $myper->getCategory->title }}
                    </td> --}}
                    <td>{{ $myper->title }} </td>
                    <td>{{ $myper->url }} </td>

                    <td>{{ $myper->status == 1 ? 'Active' : 'Inactive' }}</td>
                    <td>{{ $myper->publish_date }} </td>
                    <td>
                      {{-- <div class="row"> --}}
                      <a class="btn btn-sm btn-info mx-1" href="{{ route('report.edit',[$apa_category->id, $myper->id]) }}"><i class="fa fa-edit"></i></a>

                      <a class="btn btn-sm btn-danger delete" id="delete" title="Delete" data-id="{{ $myper->id }}" data-token={{csrf_token()}} data-route="{{ route('report.delete') }}"><i class="fa fa-trash"></i></a>

                      {{-- <a class="btn btn-sm btn-danger delete" id="delete" title="Delete"  href="{{ route('report.delete', $myper->id) }}">Delete</a> --}}
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
