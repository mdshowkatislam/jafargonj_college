@extends('backend.layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0 text-dark">CHSR Office</h1> --}}
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">@lang('Home')</a></li>
                        <li class="breadcrumb-item active">CHSR Office</li>
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
                <div class="col-md-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Office List
                                <a href="{{ route('chsr.about.create') }}" class="btn btn-success float-right">Add Member to
                                    Office</a>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h5 style="height:60px;">Dean's Info</h5>
                        </div>
                        <div class="icon">
                            <i class="fa fa-cog" style="font-size: 34px; top: 50%; transform: translateY(-50%);"></i>
                        </div>
                        <a href="{{ route('chsr.dean.list') }}" class="small-box-footer">View <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h5 style="height:60px;">Director's Info</h5>
                        </div>
                        <div class="icon">
                            <i class="fa fa-cog" style="font-size: 34px; top: 50%; transform: translateY(-50%);"></i>
                        </div>
                        <a href="{{ route('chsr.director.list') }}" class="small-box-footer">View <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h5 style="height:60px;">Deputy Director's Info</h5>
                        </div>
                        <div class="icon">
                            <i class="fa fa-cog" style="font-size: 34px; top: 50%; transform: translateY(-50%);"></i>
                        </div>
                        <a href="{{ route('chsr.deputy.director.list') }}" class="small-box-footer">View <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h5 style="height:60px;">Assistant Director's Info</h5>
                        </div>
                        <div class="icon">
                            <i class="fa fa-cog" style="font-size: 34px; top: 50%; transform: translateY(-50%);"></i>
                        </div>
                        <a href="{{ route('chsr.assistant.director.list') }}" class="small-box-footer">View <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h5 style="height:60px;">Officers's Info</h5>
                        </div>
                        <div class="icon">
                            <i class="fa fa-cog" style="font-size: 34px; top: 50%; transform: translateY(-50%);"></i>
                        </div>
                        <a href="{{ route('chsr.officer.list') }}" class="small-box-footer">View <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
