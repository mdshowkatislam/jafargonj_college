@extends('backend.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4 class="m-0 text-dark"> @lang('Job Results')</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">@lang('Home')</a></li>
                    <li class="breadcrumb-item active">@lang('Results')</li>
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
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h5>@lang('Result') @lang('List')
                        <a class="btn btn-sm btn-primary float-right" href="{{ route('setup.career.job_result') }}"><i class="fa fa-plus-circle"></i> @lang('Result') @lang('Add')</a>
                    </h5>
                </div>
                <div class="card-body">
                    <table id="dataTable" class="table table-sm table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>@lang('SL')</th>
                                <th>@lang('Title')</th>
                                <th>@lang('Published Date')</th>
                                <th>@lang('Status')</th>
                                <th>@lang('Attachments')</th>
                                <th style="width:10%">@lang('Action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jobResults as $jobResult)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ @$jobResult->career->title }}</td>
                                <td>
                                    @if (!empty($jobResult->publish_date))
                                    {{ date('d-m-Y', strtotime($jobResult->publish_date)) }}
                                    @else
                                    @endif
                                </td>
                               
                                <td>{!! @$jobResult->status == 1 ? '<span class="text-success">Active</span>' : '<span class="text-danger">Inactive</span>' !!}
                                </td>
                                <td style="text-align: center;">
                                    @if ($jobResult->attachment != null)
                                    <a target="_blank" href="{{ asset('upload/career/' . $jobResult->attachment) }}"><img src="{{ asset('images/pdf_icon.png') }}" height="40"></a>
                                    @endif
                                </td>

                                <td>
                                    <a class="btn btn-sm btn-primary" title="Edit" href="{{ route('setup.career.job_result.edit', @$jobResult->id) }}"><i class="fa fa-edit"></i></a>
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