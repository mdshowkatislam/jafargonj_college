@extends('backend.layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h4 class="m-0 text-dark">CHSR</h4> --}}
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">@lang('Home')</a></li>
                        <li class="breadcrumb-item active">@lang('ORE')</li>
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
                            <h5 class="m-0 text-dark float-left"> @lang('List of ORE')</h5>
                        </div>
                    </div>
                </div>

                @foreach ($chsrs as $chsr)
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h5 style="height:60px;">{{ $chsr->title }}</h5>
                            </div>
                            <div class="icon">
                                <i class="fa fa-cog" style="font-size: 34px; top: 50%; transform: translateY(-50%);"></i>
                            </div>
                            <a href="{{ route('chsr.edit', $chsr->id) }}" class="small-box-footer">View <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                @endforeach

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h5 style="height:60px;">Document</h5>
                        </div>
                        <div class="icon">
                            <i class="fa fa-file" style="font-size: 34px; top: 50%; transform: translateY(-50%);"></i>
                        </div>
                        <a href="{{ route('manage_document', 5) }}" class="small-box-footer">View <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
@endsection
