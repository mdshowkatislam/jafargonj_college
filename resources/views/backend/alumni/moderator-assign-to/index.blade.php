@extends('backend.layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0 text-dark"> @lang('List of alumni')</h1> --}}
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('Home')</a></li>
                        <li class="breadcrumb-item active">@lang('Alumni Committee')</li>
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
                        <h5>@lang('alumni Committee Member') @lang('List')
                            <a class="btn btn-sm btn-primary float-right" href="{{ route('alumni.moderator.assign.to.alumni') }}"><i
                                    class="fa fa-plus-circle"></i> @lang('alumni Committee Member ') @lang('Add')</a>
                        </h5>
                    </div>
                    <div class="card-body">
                        <table id="dataTable" class="table table-sm table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>@lang('SL')</th>
                                    <th>@lang('alumni Name')</th>
                                    <th>@lang('Member')</th>
                                    <th>@lang('Designation')</th>
                                    <th>@lang('Start Date')</th>
                                    <th>@lang('End Date')</th>
                                    <th>@lang('Status')</th>
                                    <th style="width:10%">@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($profiles as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ @$item->alumni->name }}</td>
                                        <td>{{ @$item->profile->nameEn }}</td>
                                        <td>{{ @$item->designation->name }}</td>
                                        <td>{{ @$item->join_date ? date('d-M-Y', strtotime(@$item->join_date)) : '' }}</td>
                                        <td>{{ @$item->expire_date ? date('d-M-Y', strtotime(@$item->expire_date)) : '' }}</td>
                                        <td>{!! $item->status == 1 ? '<span class="badge badge-success" >Active</span>' : '<span class="badge badge-warning" >Inactive</span>' !!}</td>
                                        <td>
                                            <a href="{{ route('alumni.moderator.assign.to.alumni.edit', $item->id) }}" class="btn btn-primary btn-sm mt-1"
                                                title="Edit alumni"><i class="fa fa-edit"></i></a>
                                            <a  class="btn btn-danger btn-sm delete mt-1" style="cursor: pointer" id="delete" title="Delete" data-route = "{{ route('alumni.moderator.delete') }}" data-id="{{ $item->id }}" data-token={{csrf_token()}} ><i class="fas fa-trash text-white"></i></a>
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
