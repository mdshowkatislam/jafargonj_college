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
          <li class="breadcrumb-item"><a href="{{route('butex_builder')}}">Butex Builder</a></li>
          <li class="breadcrumb-item active">Butex Themes</li>
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
            <div class="d-flex">
              <div class="flex-grow-1">
                <h5 class="text-effect"><i class="nav-icon ion-settings"></i> Butex Themes</h5>
              </div>
              <div class="">
                <a href="{{ url('site-settings/butex_builder', ['id' => @$page_id, 'tab_id' => @$page_tab_id]) }}">
                  <button type="button" class="btn btn-danger" role="button">Back</button>
                </a>
              </div>
            </div>
          </div>
          <div class="card-body">
           
            <div class="row">

              @foreach (@$themes as $key=>$theme)
                <div class="col-sm-4">
                  <div class="card">
                    <div class="image-container" onclick="selectImage(this)">
                      <h5 class="text-center">{{ @$theme->theme_name }}</h5>
                      @if (@$theme->theme_image)
                        <img src="{{asset('upload/themes/'.$theme->theme_image) }}" style="width: 330px; height: 220px;" alt="{{ @$theme->theme_name }}">
                      @else 
                        <img src="{{asset('upload/no-image.png') }}" style="width: 330px; height: 220px;" alt="{{ @$theme->theme_name }}">
                      @endif
                      
                      <div class="text-center mt-2 p-2">

                        @if(@$page_id == 1)
                            <a href="/" target="_blank">
                              <button type="button" class="btn btn-success">Preview</button>
                            </a>
                          @elseif (@$page_id == 2)
                            <a href="{{ url('faculty_home/'. $page_tab_id ) }}" target="_blank">
                              <button type="button" class="btn btn-success">Preview</button>
                            </a>
                          @elseif (@$page_id == 3)
                            <a href="{{ url('department_home/'. $page_tab_id ) }}" target="_blank">
                              <button type="button" class="btn btn-success">Preview</button>
                            </a>
                          @elseif (@$page_id == 4)
                            <a href="{{ url('office_home/'. $page_tab_id ) }}" target="_blank">
                              <button type="button" class="btn btn-success">Preview</button>
                            </a>
                          @endif

                     
                        <button type="button" class="btn btn-primary install" data-id="{{ @$theme->id }}" data-toggle="modal" data-target="#install">Install</button>
                        <button type="button" class="btn btn-danger deleteTheme" data-id="{{ @$theme->id }}" data-toggle="modal" data-target="#deleteTheme">Delete</button>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
             
            </div>

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>

  </div>
  <!--/. container-fluid -->
</section>

@include('backend.butex_themes.install-modal')
@include('backend.butex_themes.uninstall-modal')
@include('backend.butex_themes.delete-modal')

<script>
  function selectImage(element) {
    const allImages = document.querySelectorAll('.image-container');
    allImages.forEach(img => img.classList.remove('selected'));
    element.classList.add('selected');
  }

  $('.install').click(function() {
      var id     = $(this).data('id');
      $('.install_theme_id').val(id);
  });

  $('.uninstall').click(function() {
      var theme_id     = $(this).data('id');
      var page_id      = $(this).data('page');
      var tab_id       = $(this).data('tab');

      $('.uninstall_theme_id').val(theme_id);
      $('.uninstall_page_id').val(page_id);
      $('.uninstall_tab_id').val(tab_id);
  });

  $('.deleteTheme').click(function() {
      var theme_id     = $(this).data('id');
      var num1 = Math.floor(Math.random() * 10) + 1;
      var num2 = Math.floor(Math.random() * 10) + 1;

      $('.theme_id').val(theme_id);
      $('.num1').val(num1);
      $('.number1').text(num1);
      $('.num2').val(num2);
      $('.number2').text(num2);
  });
</script>

@endsection