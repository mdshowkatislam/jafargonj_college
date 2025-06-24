@extends('backend.layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h4 class="m-0 text-dark"> @lang('Landing Modal Management')</h4> --}}
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">@lang('Home')</a></li>
                        <li class="breadcrumb-item active">@lang('Add Marquee')</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h5 class="m-0 text-dark float-left"> @lang('Marquee Management')</h5>
                            <a class="btn btn-sm btn-primary float-right" href="{{ route('marquee.add') }}"><i
                                    class="fa fa-plus-circle"></i> @lang('Add') @lang('Marquee')</a>
                        </div>
                        <div class="card-body">
                            <table id="dataTable" class="table table-sm table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>@lang('ID')</th>
                                        <th>@lang('Title')</th>
                                        <th>@lang('URL')</th>
                                        <th>@lang('Start Date')</th>
                                        <th>@lang('End Date')</th>
                                        <th>@lang('Sort Order')</th>
                                        <th>@lang('Status')</th>
                                        <th>@lang('Action')</th>
                                    </tr>
                                </thead>
                                @if (count($marquees) > 0)
                                    <tbody>
                                        @foreach ($marquees as $data)
                                            <tr>
                                                <th>{{ $loop->iteration }}</th>
                                                <td>{{ $data->title }}</td>
                                                <td>{{ $data->url }}</td>
                                                <td>{{ $data->start_date }}</td>
                                                <td>{{ $data->end_date }}</td>
                                                <td>{{ $data->sort_order }}</td>



                                                <td>{!! $data->status == 1
                                                    ? '<span class="badge badge-success">Active</span>'
                                                    : '<span class="badge badge-warning">Inactive</span>' !!}</td>
                                                <td>
                                                    <a class="btn btn-sm btn-primary" title="Edit"
                                                        href="{{ route('marquee.edit', $data->id) }}"><i
                                                            class="fa fa-edit"></i></a>
                                                    {{-- @if ($data->status == 1)
                                                    <a class="statuschange btn btn-sm btn-success" title="Inactive" data-id="{{$data->id}}" data-action="0" data-route="{{route('landing-modal.status_change')}}" data-token="{{csrf_token()}}" href="">
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                        Active
                                                    </a>
                                                    @else
                                                    <a class="statuschange btn btn-sm btn-danger" title="Inactive" data-id="{{$data->id}}" data-action="1" data-route="{{route('landing-modal.status_change')}}" data-token="{{csrf_token()}}" href="">
                                                    <i class="fa fa-ban" aria-hidden="true"></i>
                                                        Inactive
                                                    </a>
                                                    @endif --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
