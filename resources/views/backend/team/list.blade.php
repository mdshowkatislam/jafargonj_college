@extends('backend.layouts.app')
@section('content')
    <!-- Content Header (Page header) -->




    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0 text-dark">List of Committee Member</h1> --}}
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Committee Member</li>
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
                            <h5 class="m-0 text-dark float-left">List of Committee Member</h5>
                            <a href="{{ route('manage_team.add') }}" class="btn btn-sm btn-primary float-right"><i class="fas fa-plus"></i>
                                Add Committee Member</a>
                        </div>

                        <div class="card-body">
                            <table id="dataTable" class="table table-sm table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%">#</th>
                                        <th width="40%">Committee Member</th>
                                        <th width="20%">Designation</th>
                                        <th width="10%">Sort Order</th>
                                        <th width="10%">Status</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($traningList as $item)
                                        <tr>
                                            <td> {{ $loop->iteration }}</td>
                                            <td>{{ @$item->member->nameEn }}</td>
                                            <td>{{ @$item->committee_designation->name }}</td>
                                            <td>{{ @$item->sort_order }}</td>
                                            @if (@$item->status == 1)
                                            <td><span class="badge badge-success">Active</span></td>
                                            @else
                                            <td><span class="badge badge-danger">Inactive</span></td>
                                            @endif
                                            <td><a href="{{ route('manage_team.edit', $item->id) }}"
                                                    class="btn btn-primary btn-flat btn-sm edit" data-type="image"
                                                    data-id="" data-table="Slider"><i class="fas fa-edit"></i></a> | <a
                                                    class="delete btn btn-danger btn-flat btn-sm"
                                                    data-route="{{ route('manage_team.delete') }}"
                                                    data-id="{{ $item->id }}"><i class="fas fa-trash"></i></a>
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
