@extends('backend.layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h4 class="m-0 text-dark"> @lang('List of CPC')</h4> --}}
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">@lang('Home')</a></li>
                        <li class="breadcrumb-item active">@lang('CLUB')</li>
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
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="m-0 text-dark float-left"> @lang('List of CLUB')</h5>
                            {{-- <a href="{{ route('cpc.add') }}" class="btn btn-success float-right">Add CPC Service</a> --}}
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h5 style="height:60px;">CLUB Document</h5>
                        </div>
                        <div class="icon">
                            <i class="fa fa-file" style="font-size: 34px; top: 50%; transform: translateY(-50%);"></i>
                        </div>
                        <a href="{{ route('manage_document', 3) }}"
                            class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div> --}}
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h5 style="height:60px;">CLUB Gallery</h5>
                        </div>
                        <div class="icon">
                            <i class="fa fa-image" style="font-size: 34px; top: 50%; transform: translateY(-50%);"></i>
                        </div>
                        <a href="{{ route('setup.gallery_category.categoryWiseGallery', 8) }}"
                            class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                {{-- <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="bg-success p-2 text-center">IQAC Documnet</h5>
                                <a href="{{ route('manage_document', 1) }}" class="card-link">View</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="bg-success p-2 text-center">Image Gallery</h5>
                                <a href="{{ route('setup.gallery_category.categoryWiseGallery', 6) }}" class="card-link">Edit</a>
                        </div>
                    </div>
                </div> --}}
            </div>

        </div>
    </div>

@endsection
