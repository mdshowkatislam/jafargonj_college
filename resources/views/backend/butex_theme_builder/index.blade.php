@extends('backend.layouts.app')
@section('content')

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<style>
.active{
    color: black !important;
}
</style>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        {{-- <h1 class="m-0 text-dark">Manage Banner</h1> --}}
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{route('butex_builder')}}">Site Settings</a></li>
          <li class="breadcrumb-item active">Butex Builder</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card card-outline card-primary">
          <div class="card-header">
            <h5 class="text-effect"><i class="nav-icon ion-settings"></i> Butex Theme Builder</h5>
          </div>
          <div class="card-body">
            <!-- start page link here -->
            <a href="{{ url('site-settings/butex_builder/1') }}"><button class="@if(@$page_id == 1) active-menu @else button-1 @endif" role="button">Home Page Design</button></a>
            <a href="{{ url('site-settings/theme_builder/2') }}"><button class="@if(@$page_id == 2) active-menu @else button-1 @endif" role="button">Theme Builder</button></a>
            <a href="{{ url('site-settings/theme_builder/3') }}" class="d-none"><button class="@if(@$page_id == 3) active-menu @else button-1 @endif" role="button">Create Themes</button></a>
            <hr/>
            <!-- end page link here -->

            {{-- start tab section --}}

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>

  </div>
  <!--/. container-fluid -->
</section>

@include('backend.butex_theme_builder.designer')

@endsection