@extends('backend.layouts.app')
@section('content')
    <!-- Content Header (Page header) -->

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0 text-dark">List of Team Member</h1> --}}
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">CHSR Research Area</li>
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
                            <h5 class="m-0 text-dark float-left">List of CHSR Research Area</h5>
                            {{-- <a href="{{ route('chsr.manage_research_area.add') }}" class="btn btn-sm btn-primary float-right"><i class="fas fa-plus"></i>
                                Add CHSR Research Area</a> --}}
                        </div>

                        <div class="card-body">
                            <table id="dataTable" class="table table-sm table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%">#</th>
                                        <th width="35%">Faculty</th>
                                        <th width="40%">Description</th>
                                        <th width="10%">Status</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($chsrResearchAreaList as $item)
                                        <tr>
                                            <td> {{ $loop->iteration }}</td>
                                            <td>{{ @$item->faculty->name }}</td>
                                            <td>{!! Str::limit(@$item->description, 50, '...') !!}</td>
                                            <td>
                                                @if (@$item->status == 1)
                                                    <span class="badge badge-success">Active</span>
                                                @elseif(@$item->status == 0)
                                                    <span class="badge badge-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('chsr.manage_research_area.edit', $item->id) }}"
                                                    class="btn btn-primary btn-flat btn-sm edit" data-type="image"
                                                    data-id="" data-table="Slider"><i class="fas fa-edit"></i>
                                                </a> |
                                                <a class="delete btn btn-danger btn-flat btn-sm"
                                                    data-route="{{ route('chsr.manage_research_area.delete') }}"
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
