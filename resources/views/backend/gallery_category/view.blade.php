@extends('backend.layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0 text-dark">{{ @$gallery_type ? @$gallery_type : 'All' }}&nbsp;Photo Gallery</h1> --}}
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">@lang('Home')</a></li>
                        <li class="breadcrumb-item active">@lang('Photo Gallery')</li>
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
                <div class="card">
                    <div class="card-header">

                        <h5>{{ @$gallery_type ? @$gallery_type : 'All' }} @lang(' Photo Gallery')
                            <a class="btn btn-sm btn-success float-right" href="{{ $category_id ? route('setup.gallery_category.categoryWiseGallery.add', [$category_id, @$ref_id]) : route('setup.gallery_category.add') }}"><i class="fa fa-plus-circle mr-1"></i>Add Photo
                                Gallery</a>
                        </h5>
                    </div>
                    <div class="card-body">
                        <table id="dataTable" class="table table-sm table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>@lang('SL')</th>
                                    <th>@lang('Album Name')</th>
                                    <th>@lang('Category')</th>
                                    <th>@lang('Sort Order')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Created By')</th>
                                    <th>@lang('Add Photo')</th>
                                    <th style="width:10%">@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allCategories as $category)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ @$category->name }}</td>
                                        @php
                                            $sub_category = \App\Services\TypeService::singletype('gallery_category', $category->sub_category);
                                        @endphp
                                        <td>{{ $sub_category }}</td>
                                        <td>{{ @$category->sort }}</td>
                                        <td>{!! @$category->status == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>' !!}</td>
                                        <td>
                                            @php
                                                $user = \App\Models\User::where('id', $category->created_by)->first(['id', 'name']);
                                            @endphp
                                            {{ $user->name ?? 'No user found !' }}
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-primary" title="Edit" href="{{ route('setup.photo', [@$category->id, $category_id, @$ref_id]) }}"><i class="fa fa-plus"></i> Add Photo</a>
                                            {{-- <a class="btn btn-sm btn-danger" id="delete" title="Delete" data-id="{{@$category->id}}" data-token="{{csrf_token()}}" data-route="{{route('setup.program_category.delete')}}"><i class="fa fa-trash"></i></a> --}}
                                            {{-- <a class="delete btn btn-sm btn-danger" data-id="{{$u['id']}}" data-table="users"><i class="fa fa-trash"></i></a> --}}
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-success" title="Edit" href="{{ @$category_id ? route('setup.gallery_category.categoryWiseGallery.edit', [@$category->id, $category_id, @$ref_id]) : route('setup.gallery_category.edit', @$category->id) }}"><i class="fa fa-edit"></i></a>
                                            {{-- <a class="btn btn-sm btn-danger" id="delete" title="Delete" data-id="{{@$category->id}}" data-token="{{csrf_token()}}" data-route="{{route('setup.program_category.delete')}}"><i class="fa fa-trash"></i></a> --}}
                                            {{-- <a class="delete btn btn-sm btn-danger" data-id="{{$u['id']}}" data-table="users"><i class="fa fa-trash"></i></a> --}}
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
