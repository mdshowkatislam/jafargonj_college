@extends('backend.layouts.app')
@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          {{-- <h4 class="m-0 text-dark"> @lang('List of Affiliation')</h4> --}}
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('Home')</a></li>
            <li class="breadcrumb-item active">@lang('Affiliation')</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
<!-- /.content-header -->
@if ($errors->any())
  @foreach ($errors->all() as $error)
  <script type="text/javascript">
    $(function () {
      $.notify("{{$error}}", {globalPosition: 'top right', className: 'error'});
    });
  </script>
  @endforeach
  @endif
<div class="content">
  <div class="container-fluid">
    <div class="col-md-12">
      <div class="card card-outline card-primary">
        <div class="card-header">
          <h5>@lang('Affiliation') @lang('List')
             <a class="btn btn-sm btn-primary float-right" href="{{ route('setup.affiliation.add') }}"><i class="fa fa-plus-circle"></i> @lang('Affiliation') @lang('Add')</a> 
            <a class="btn btn-sm btn-primary float-right d-none" href="{{ route('affiliation.api') }}"  style="margin-right: 2px;"><i class="fa fa-plus-circle"></i>@lang('Add') @lang('Affiliation') @lang('From') @lang('API')</a>
          </h5>
        </div>
          <div class="card-body">
            <table id="dataTable" class="table table-sm table-bordered table-striped">
              <thead>
                <tr>
                  <th>@lang('SL')</th>
                  <th>@lang('Institute Name')</th>
                  <th>@lang('Institute Type')</th>
                  <th>@lang('Institute Location')</th>
                  <th>@lang('Logo')</th>
                  <th>@lang('Sort Order')</th>
                  <th>@lang('Status')</th>
                  <th style="width:15%">@lang('Action')</th>
                </tr>
              </thead>
              <tbody>
                @foreach($affiliations as $affiliation)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{@$affiliation->inst_name}}</td>
                  <td>{{@$affiliation->institution_type}}</td>
                  <td>{{@$affiliation->location}}</td>
                  <td><img src="{{asset('upload/affiliation/'.@$affiliation->image) }}" height="60" onerror="this.onerror=null;this.src='{{ asset('upload/no-image.png') }}';"></td>
                  <td>{{@$affiliation->sort_order}}</td>
                  <td>{!! @$affiliation->status == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>' !!}</td>
                  <td>
                    <a class="btn btn-sm btn-primary" title="Edit" href="{{route('setup.affiliation.edit',@$affiliation->id)}}"><i class="fa fa-edit"></i></a>

                    @if (@$affiliation->status == 1)
                        <a role="button" type="button"
                            class="statuschange btn btn-sm btn-danger text-white" title="Active"
                            data-id="{{ @$affiliation->id }}" data-action="0"
                            data-route="{{ route('affiliation.status_change') }}"
                            data-token="{{ csrf_token() }}">
                            <i class="fa fa-ban" aria-hidden="true"></i>
                            Inactive

                        </a>
                    @else
                        <a role="button" type="button"
                            class="statuschange btn btn-sm btn-success text-white" title="Inactive"
                            data-id="{{ @$affiliation->id }}" data-action="1"
                            data-route="{{ route('affiliation.status_change') }}"
                            data-token="{{ csrf_token() }}">
                            <i class="fa fa-check" aria-hidden="true"></i>
                            Active
                        </a>
                    @endif
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
