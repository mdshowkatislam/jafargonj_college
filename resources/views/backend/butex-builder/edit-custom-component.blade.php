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
        <form method="post" action="{{ route('store.component') }}" enctype="multipart/form-data">
          @csrf
          <div class="card card-outline card-primary">
            <div class="card-header">
              <div class="d-flex">
                <div class="flex-grow-1">
                  <h5 class="text-effect"><i class="nav-icon ion-settings"></i> Butex Custom Components</h5>
                </div>
                <div class="">
                  <button type="submit" role="button" class="btn btn-success" id="submitBtn">Update</button>
                  <a href="{{ url('site-settings/butex_builder/' . $page_id . '/' . $page_tab_id ) }}">
                      <button type="button" class="btn btn-danger" role="button">Back</button>
                  </a>
                </div>
              </div>
            </div>
            <div class="card-body">
                  <div class="">
                      <div class="">
                          <input type="hidden" name="action" class="action" id="action" value="custom">
                          <input type="hidden" name="id" class="id" id="id" value="{{ @$data->id }}">

                          <div class="form-group col-sm-12">
                            <label class="mt-2">Component Ttile</label>    
                            <input type="text" class="form-control" name="component_title" value="{{ @$data->component_title }}">
                          </div>

                          <div class="form-group col-sm-12">
                            <label class="mt-2">Component Description</label>    
                            <textarea type="text" id="long_descriptions" name="long_descriptions" class="form-control long_descriptions textarea">{{ @$data->long_descriptions }}</textarea>
                            @error('long_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>

                          <div class="form-group col-sm-12">
                            <label class="mt-2">Details Page</label>    
                            <textarea type="text" id="long_details_descriptions" name="long_details_descriptions" class="form-control long_details_descriptions textarea">{{ @$data->long_details_descriptions }}</textarea>
                            @error('long_details_descriptions')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>

                          <div class="row">
                            <div class="col-sm-4">
                              <div class="form-group">
                                <label class="">Image</label>
                                <input type="file" class="form-control" id="file" name="file">
                              </div>
                              <div class="form-group">
                                <label class="">Image Align</label>
                                <select name="image_class" class="form-control" id="image_class">
                                  <option value="banner" @if($data->image_class == 'banner') selected @endif>Banner</option>
                                  <option value="text-left" @if($data->image_class == 'text-left') selected @endif>Left</option>
                                  <option value="text-center" @if($data->image_class == 'text-center') selected @endif>Center</option>
                                  <option value="text-end" @if($data->image_class == 'text-end') selected @endif>Right</option>
                                </select>
                              </div>
                            </div>

                            <div class="col-sm-4">
                              <div class="">
                                <label class="">Custom CSS (Learge Devices)</label>
                                <textarea name="image_style" class="form-control" id="image_style" cols="0" rows="2">{{ @$data->image_style }}</textarea>
                              </div>

                              <div class="mt-2">
                                <label class="">Custom CSS (Small Devices)</label>
                                <textarea name="image_style2" class="form-control" id="image_style2" cols="0" rows="2">{{ @$data->image_style2 }}</textarea>
                              </div>
                            </div>

                            <div class="col-sm-4">
                              <label class="">Image</label><br/>
                              @if (!empty($data->files) && file_exists(public_path('upload/themes/'.$data->files)))
                                <img src="{{ asset('upload/themes/'.$data->files) }}" style="width: 300px;" alt="">
                              @else
                                <h4 class="text-center mt-5">No Image Uploaded</h4>
                              @endif
                            </div>
                          </div>
                      </div>

                
            </div>
          </div> 
        </form>     
        </div>
      </div>

    </div>
  </div>
  <!--/. container-fluid -->
</section>


@endsection