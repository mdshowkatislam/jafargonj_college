@extends('backend.layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('site-setting.logo') }}">Logo</a></li>
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
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h5> Manage Logo
                                <a href="{{ route('site-setting.logo.add') }}" class="btn btn-sm btn-primary float-right"><i class="fas fa-plus"></i> Add Logo</a>
                            </h5>
                        </div>
                        <div class="card-body">
                            <table id="dataTable" class="table table-sm table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($logos as $logo)
                                        <tr>
                                            <td> {{ $loop->iteration }}</td>
                                            <td> {{ $logo->name }}</td>
                                            <td>
                                                <img 
                                                  src="{{ asset('upload/logo/' . $logo->image) }}"
                                                  class="rounded"
                                                  height="80">
                                            </td>
                                            <td>{!! $logo->status == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-warning">Inactive</span>' !!}</td>
                                            <td>
                                                <a href="{{ route('site-setting.logo.edit', $logo->id) }}"
                                                    class="btn btn-primary btn-sm edit" data-type="image"
                                                    data-id="" data-table="banners"><i class="fas fa-edit"></i>
                                                </a>
                                                {{-- <a class="delete btn btn-danger btn-flat btn-sm"
                                                    data-route="{{ route('site-setting.logo.delete') }}" id="delete"
                                                    data-token={{ csrf_token() }} data-id="{{ $logo->id }}"><i
                                                        class="fas fa-trash"></i>
                                                </a> --}}
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
