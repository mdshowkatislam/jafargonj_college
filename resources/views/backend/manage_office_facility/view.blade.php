@extends('backend.layouts.app')
@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          {{-- <h1 class="m-0 text-dark"> @lang('List of Offices')</h1> --}}
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('Home')</a></li>
            <li class="breadcrumb-item active">@lang('Office')</li>
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
          <h5>@lang('Office Facility') @lang('List')
          <a class="btn btn-sm btn-success float-right" href="{{route('setup.manage_office')}}"><i class="fa fa-list"></i> @lang('Office') @lang('List')</a>

            <a class="btn btn-sm btn-primary float-right mr-2" href="{{ route('setup.office.facility.add', $office->id) }}" style="margin-right: 2px;"><i class="fa fa-plus-circle"></i> @lang('Office Facility') @lang('Add')</a>
          </h5>
        </div>
          <div class="card-body">
            <table id="dataTable" class="table table-sm table-bordered table-striped">
              <thead>
                <tr>
                  <th>@lang('SL')</th>
                  <th>@lang('Office Name')</th>
                  <th>@lang('Title')</th>
                  <th>@lang('Description')</th>
                  <th>@lang('Action')</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($facilities as $item )
               <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{@$item->office->name}}</td>
                  <td>{{@$item->title}}</td>
                  <td>{!! $item->description !!}</td>
                  <td>
                    <a class="btn btn-sm btn-primary" title="Edit" href="{{route('setup.office.facility.edit',[@$item->id, $office->id])}}"><i class="fa fa-edit"></i></a>
                    {{-- <a class="btn btn-sm btn-danger" id="delete" title="Delete" data-id="{{$office->id}}" data-token="{{csrf_token()}}" data-route="{{route('setup.manage_office.delete')}}"><i class="fa fa-trash"></i></a>                     --}}
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
