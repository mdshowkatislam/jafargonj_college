@extends('backend.layouts.app')
@section('content')
    <!-- Content Header (Page header) -->



    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">User Logs</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">@lang('Home')</a></li>
                        <li class="breadcrumb-item active">@lang('User Logs')</li>
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
            <form method="get" action="{{ route('user.date.wise.logs') }}" id="" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col-sm-3">
                        <label class="control-label" style="float: left;">From Date</label>
                        <input type="date" name="from_date" value="{{ @$from_date }}" id="from-date" class="form-control form-control-sm " placeholder="From Date" autocomplete="off">
                     </div>
                     <div class="form-group col-sm-3">
                        <label class="control-label" style="float: left;">To Date</label>
                        <input type="date" name="to_date" value="{{ @$to_date }}" id="to-date" class="form-control form-control-sm " placeholder="To Date" autocomplete="off">
                     </div>
                     <div class="col-sm-3">
                        <label class="control-label" style="visibility:hidden;width:100%">To Date</label>
                        <button type="submit" class="btn btn-sm btn-success">Submit</button>
                     </div>
                </div>
            </form>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body" >
                            <table id="dataTable" class="table table-sm table-bordered table-striped" style="width: 100%">
                                <thead>
                                    <tr>

                                        <th>@lang('SL')</th>
                                        <th>@lang('User IP')</th>
                                        <th>@lang('User Name')</th>
                                        <th>@lang('Url')</th>
                                        <th>@lang('Description')</th>
                                        <th>@lang('Time')</th>
                                        <th>@lang('Created By')</th>
                                        <th>@lang('Updated By')</th>
                                        <th>@lang('Deleted By')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($logs as $log)
                                    @php
                                     $server_infos = json_decode($log->server_info, true);
                                    @endphp
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ @$server_infos['Remote Address'] }}</td>
                                            <td>{{ (@$log->updated_by ? @$log->user_updated->name : @$log->user_created->name) ?? @$log->user_deleted->name }}</td>
                                            <td>{{ @$log->url }}</td>
                                            <td>{{ @$log->action }}</td>
                                            <td>{{ date('d-M-Y h:i:s', strtotime(@$log->created_at)) }}</td>
                                            <td>{{ @$log->user_created->name }}</td>
                                            <td>{{ @$log->user_updated->name }}</td>
                                            <td>{{ @$log->user_deleted->name }}</td>
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

