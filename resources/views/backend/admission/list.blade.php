@extends('backend.layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Admission Information</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Admission Information</li>
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
                            <a href="{{ route('admission.add') }}" class="btn btn-sm btn-info"><i class="fas fa-plus"></i>
                                Add Admission</a>
                        </div>

                        <div class="card-body">
                            <table id="dataTable" class="table table-sm table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Program Category</th>
                                        <th>Title</th>
                                        <th width="8%">Session</th>
                                        <th width="10%">Start Date</th>
                                        <th width="10%">End Date</th>
                                        <th>File</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($admissions as $admission)
                                        <tr> 
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ @$admission['programCategory']['program_category'] }}</td>
                                            <td>{{ $admission['title'] }}</td>
                                            <td>{{ @$admission->session }}</td>
                                            <td>{{ $admission->start_date ? date('d-M-Y', strtotime($admission->start_date)) : '' }}
                                            </td>
                                            <td>{{ $admission->end_date ? date('d-M-Y', strtotime($admission->end_date)) : '' }}
                                            </td>
                                            <td style="text-align: center;">
                                                @php
                                                    if ($admission->file != null) {
                                                        $ext = explode('.', $admission->file);
                                                    }
                                                @endphp
                                                @if ($admission->file != null && $ext[1] == 'pdf')
                                                    <a target="_blank"
                                                        href="{{ asset('storage/upload/admission/' . $admission->file) }}"><span class="fa fa-download"></span></a>
                                                @endif
                                                @if ($admission->file != null && ($ext[1] == 'doc' || $ext[1] == 'docm' || $ext[1] == 'docx'))
                                                    <a target="_blank"
                                                        href="{{ asset('storage/upload/admission/' . $admission->file) }}"><span class="fa fa-download"></span></a>
                                                @endif
                                            </td>

                                            <td><a href="{{ route('admission.edit', $admission->id) }}"
                                                    class="btn btn-primary btn-flat btn-sm edit" data-type="image"
                                                    data-id="" data-table="Slider"><i class="fas fa-edit"></i></a> | <a
                                                    class="delete btn btn-danger btn-flat btn-sm"
                                                    data-route="{{ route('admission.delete') }}"
                                                    data-id="{{ $admission->id }}"><i class="fas fa-trash"></i></a>
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
