@extends('backend.layouts.app')
@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          {{-- <h1 class="m-0 text-dark"> @lang('List of Programs')</h1> --}}
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('Home')</a></li>
            <li class="breadcrumb-item active">@lang('Program')</li>
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
          <h5>@lang('Course') @lang('List')
            {{-- <a class="btn btn-sm btn-primary float-right" href="{{ route('setup.course.add') }}"><i class="fa fa-plus-circle"></i> @lang('Course') @lang('Add')</a> --}}
            <a class="btn btn-sm btn-success mr-2 float-right" href="{{ route('setup.course_from_api') }}"><i class="fa fa-plus-circle"></i> @lang('Course') @lang('From') @lang('Api')</a>
          </h5>
        </div>
          <div class="card-body">
            <table id="dataTable" class="table table-sm table-bordered table-striped">
              <thead>
                <tr>
                  <th>@lang('SL')</th>
                  <th>@lang('Program')</th>
                  <th>@lang('Course Code')</th>
                  <th>@lang('Title')</th>
                  <th>@lang('Credit')</th>
                  {{-- <th style="width:10%">@lang('Action')</th> --}}
                </tr>
              </thead>
              <tbody>
                @foreach($courses as $item)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{@$item->program->program_title}}</td>
                  <td>{{@$item->formal_code}}</td>
                  <td>{{@$item->title}}</td>
                  <td>{{@$item->credit}}</td>
                  {{-- <td>
                    <a class="btn btn-sm btn-primary" title="Edit" href="{{route('setup.course.edit',@$item->id)}}"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-sm btn-danger" id="delete" title="Delete" data-id="{{@$program->id}}" data-token="{{csrf_token()}}" data-route="{{route('setup.program.delete')}}"><i class="fa fa-trash"></i></a>
                </td> --}}
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

@endsection
