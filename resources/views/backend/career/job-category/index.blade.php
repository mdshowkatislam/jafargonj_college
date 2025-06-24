@extends('backend.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                {{-- <h4 class="m-0 text-dark"> @lang('List of Career')</h4> --}}
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">@lang('Home')</a></li>
                    <li class="breadcrumb-item active">@lang('Job Categories')</li>
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
                    <h5>@lang('Job Categories') @lang('List')
                        <a class="btn btn-sm btn-primary float-right" href="{{ route('setup.job-categories.add') }}"><i class="fa fa-plus-circle"></i> @lang('Job Categories') @lang('Add')</a>
                    </h5>
                </div>
                <div class="card-body">
                    <table id="dataTable" class="table table-sm table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>@lang('SL')</th>
                                <th>@lang('Title')</th>
                                <th>@lang('Status')</th>
                                <th style="width:15%">@lang('Action')</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jobCategories as $categories)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $categories->title }}</td>
                                <td>{!!$categories->status == 1 ? '<span class="text-success">Active</span>' : '<span class="text-danger">Inactive</span>' !!}
                                </td>

                                <td>

                                    <a href="{{ route('setup.job-categories.edit', $categories->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('setup.job-categories.delete') }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{ $categories->id }}">
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this job category?');">Delete</button>
                                    </form>
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