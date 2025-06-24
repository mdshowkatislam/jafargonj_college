@extends('backend.layouts.app')
@section('content')


<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        {{-- <h1 class="m-0 text-dark">Manage Banner</h1> --}}
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('create.component')}}">Componets</a></li>
          <li class="breadcrumb-item active">Edit Component</li>
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
        <form method="post" action="{{ route('store.component') }}">
          @csrf
        <div class="card card-outline card-primary">
          <div class="card-header">
            <div class="d-flex">
              <div class="flex-grow-1">
                <h5 class="text-effect"><i class="nav-icon ion-settings"></i> Butex Custom Components</h5>
              </div>
              <div class="">
                <button type="submit" role="button" class="btn btn-success" id="submitBtn">Update</button>
                <a href="{{route('create.component')}}">
                    <button type="button" class="btn btn-danger" role="button">Back</button>
                </a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="">
                
                    <div class="">
                          <input type="hidden" name="action" class="action" id="action" value="update">
                          <input type="hidden" name="id" class="id" id="id" value="{{ @$data->id }}">
                          <div class="form-group col-sm-12">
                            <label class="mt-2">Componenet Title</label>
                            <input type="text" class="form-control" id="component_title" name="component_title" value="{{ @$data->component_title }}" style="border:1px solid #13aa52;" required>
                            <label class="mt-2">Componenet Description</label>    
                            <textarea type="text" id="component_description" name="component_description" class="form-control component_description textarea">{{ @$data->component_description }}</textarea>
                            @error('long_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                          
                    </div>

               
            </div>
          </div>      
        </div>
      </form>
      </div>

    </div>
  </div>
  <!--/. container-fluid -->
</section>


@endsection