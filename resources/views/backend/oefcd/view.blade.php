@extends('backend.layouts.app')
@section('content')

 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          {{-- <h4 class="m-0 text-dark"> @lang('Newsletter Management')</h4> --}}
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('Home')</a></li>
            <li class="breadcrumb-item active">@lang('OEFCD')</li>
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
            <div class="card">
                <div class="card-header">
                    <h5 class="m-0 text-dark float-left"> @lang('List of OEFCD')</h5>
                </div>
            </div>
            <div class="row">
                {{-- <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="bg-success p-2 text-center">
                                <a href="{{ route('development_program') }}" class="card-link">Faculty Development
                                    Program</a>
                                </h5>
                        </div>
                    </div>
                </div> --}}
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h5 style="height:60px;">About OEFCD</h5>
                        </div>
                        <div class="icon">
                            <i class="fa fa-cog" style="font-size: 34px; top: 50%; transform: translateY(-50%);"></i>
                        </div>
                        <a href="{{ route('about_oefcd') }}" class="small-box-footer">View
                            <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h5 style="height:60px;">Faculty Development</h5>
                        </div>
                        <div class="icon">
                            <i class="fa fa-cog" style="font-size: 34px; top: 50%; transform: translateY(-50%);"></i>
                        </div>
                        <a href="{{ route('development_program') }}" class="small-box-footer">View
                            <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                {{-- <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="bg-success p-2 text-center">
                                <a href="{{ route('oefcd.staff.training.list') }}" class="card-link">Staff Training</a>
                            </h5>
                        </div>
                    </div>
                </div> --}}
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h5 style="height:60px;">Staff Training</h5>
                        </div>
                        <div class="icon">
                            <i class="fa fa-cog" style="font-size: 34px; top: 50%; transform: translateY(-50%);"></i>
                        </div>
                        <a href="{{ route('oefcd.staff.training.list') }}" class="small-box-footer">View
                            <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h5 style="height:60px;">Staff Officers Development Program</h5>
                        </div>
                        <div class="icon">
                            <i class="fa fa-cog" style="font-size: 34px; top: 50%; transform: translateY(-50%);"></i>
                        </div>
                        <a href="{{ route('officers_development_program') }}" class="small-box-footer">View
                            <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                
            
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h5 style="height:60px;">International Affairs</h5>
                        </div>
                        <div class="icon">
                            <i class="fa fa-cog" style="font-size: 34px; top: 50%; transform: translateY(-50%);"></i>
                        </div>
                        <a href="{{ route('international.affair') }}" class="small-box-footer">View
                            <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h5 style="height:60px;">Curriculum Development</h5>
                        </div>
                        <div class="icon">
                            <i class="fa fa-cog" style="font-size: 34px; top: 50%; transform: translateY(-50%);"></i>
                        </div>
                        <a href="{{ route('curriculumn_development') }}" class="small-box-footer">View
                            <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h5 style="height:60px;">Curriculum List</h5>
                        </div>
                        <div class="icon">
                            <i class="fa fa-cog" style="font-size: 34px; top: 50%; transform: translateY(-50%);"></i>
                        </div>
                        <a href="{{ route('oefcd.curriculum.list') }}" class="small-box-footer">View
                            <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h5 style="height:60px;">MoU List</h5>
                        </div>
                        <div class="icon">
                            <i class="fa fa-cog" style="font-size: 34px; top: 50%; transform: translateY(-50%);"></i>
                        </div>
                        <a href="{{ route('oefcd.mou.list') }}" class="small-box-footer">View
                            <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                {{-- <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="bg-success p-2 text-center">
                                <a href="{{ route('oefcd.evaluation.view') }}" target="_blank" class="card-link">Evaluation</a>
                                </h5>
                        </div>
                    </div>
                </div> --}}
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h5 style="height:60px;">Evaluation</h5>
                        </div>
                        <div class="icon">
                            <i class="fa fa-cog" style="font-size: 34px; top: 50%; transform: translateY(-50%);"></i>
                        </div>
                        <a href="{{ route('oefcd.evaluation.view') }}" class="small-box-footer">View
                            <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h5 style="height:60px;">Document</h5>
                        </div>
                        <div class="icon">
                            <i class="fa fa-file" style="font-size: 34px; top: 50%; transform: translateY(-50%);"></i>
                        </div>
                        <a href="{{ route('manage_document', 4) }}" class="small-box-footer">View
                            <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h5 style="height:60px;">OEFCD Gallery</h5>
                        </div>
                        <div class="icon">
                            <i class="fa fa-image" style="font-size: 34px; top: 50%; transform: translateY(-50%);"></i>
                        </div>
                        <a href="{{ route('setup.gallery_category.categoryWiseGallery', [7, @$office->id]) }}" class="small-box-footer">View
                            <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
