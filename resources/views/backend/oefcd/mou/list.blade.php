@extends('backend.layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="m-0 text-dark">MoU Lists</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">@lang('Home')</a></li>
                        <li class="breadcrumb-item active">@lang('OEFCD')</li>
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
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('oefcd.mou.create') }}" class="btn btn-sm btn-info"><i
                                    class="fas fa-plus"></i>
                                Add MoU</a>
                        </div>
                        <div class="card-body">
                            <table id="dataTable" class="table table-sm table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%">SL</th>
                                        <th width="15%">Institute Type</th>
                                        <th width="30%">Name</th>
                                        <th width="15%">Country</th>
                                        <th width="10%">Date</th>
                                        <th width="20%">Authority</th>
                                        <th width="5%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mous as $list)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $list->institute_type == 1 ? 'Local Institute' : 'Foreign Institute' }}</td>
                                            <td>{{ $list->name }}</td>
                                            <td>{{ $list->country }}</td>
                                            <td>{{ date('d-M-Y', strtotime(@$list->date)) }}</td>
                                            <td>{!! $list->signature !!}</td>

                                            <td>
                                                <a class="btn btn-sm btn-success" title="Edit"
                                                    href="{{ route('oefcd.mou.edit', $list->id) }}"><i
                                                        class="fa fa-edit"></i></a>
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
    </div>

@endsection
