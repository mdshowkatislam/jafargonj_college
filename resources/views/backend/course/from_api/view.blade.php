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
            <li class="breadcrumb-item active">@lang('Course From Api')</li>
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
          <h5>@lang('Course') @lang('List') @lang('From') @lang('Api')
            <a class="btn btn-sm btn-success float-right" href="{{ route('setup.course') }}"><i class="fa fa-list"></i> @lang('Course') @lang('List')</a>
            <a class="btn btn-sm btn-primary mr-2 float-right" href="{{ route('setup.course_from_api.store') }}"><i class="fa fa-plus-circle"></i> @lang('Course') @lang('Add') @lang('To DB')</a>
          </h5>
        </div>
          <div class="card-body">
            <table id="dataTable" class="table table-sm table-bordered table-striped">
              <thead>
                <tr>
                  <th>@lang('SL')</th>
                  <th>@lang('Course Code')</th>
                  <th>@lang('Title')</th>
                  <th>@lang('Program')</th>
                  <th>@lang('Credits')</th>
                  <th>@lang('SemesterNo')</th>
                  <th>@lang('Short Description')</th>
                </tr>
              </thead>
              <tbody>
                @foreach($clientdata as $item)
                @foreach($item['CourseList'] as $list)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{@$list['FormalCode']}}</td>
                  <td>{{@$list['Title']}}</td>
                  @php
                    $program = \App\Models\Program::where('ucam_program_id', $item['ProgramID'])->first();
                  @endphp
                  <td>{{@$program->program_title}}</td>
                  {{-- <td>{{'pro-'.@$item['ProgramID'].'@'}}</td> --}}
                  <td>{{@$list['Credits']}}</td>
                  <td>{{@$list['SemesterNo']}}</td>
                  <td>{{@$list['ShortDescription']}}</td>
              </tr>
              @endforeach
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

@endsection
