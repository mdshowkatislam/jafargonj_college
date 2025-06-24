@extends('backend.layouts.app')


@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ !empty($editData)? 'Update ' : 'Add ' }} APA Category</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">APA Category</li>
                </ol>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                <a href="{{ route('catagory.list') }}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> APA Category List</a>
            </div>
            <div class="card-body">
                <form action="{{ !empty($editData)? route('catagory.update',$editData->id) : route('catagory.store') }}" method="post" enctype="multipart/form-data" autocomplete="off" id="myForm">
              
                    @csrf

                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Title" value="{{@$editData->title}}">
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            
                           
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" >
                                  <option value="" {{ empty($editData)? 'selected' : '' }}>Select an Option</option>
                                  <option value="1" {{@$editData->status == '1' ? 'selected' : ''}}>Active</option>
                                  <option value="0" {{@$editData->status == '0' ? 'selected' : ''}}>Inactive</option>
                                </select>
                                @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                
                            <div class="form-group">

                                <label for="images">Upload Image</label>
                                <input class="form-control-file @error('image') is-invalid @enderror" type="file" id="files" name="photo_image">
                                <p class="help-block text-danger">File size must be less than 3mb</p>
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label>Selected Image</label><br>
                                @if(empty($editData))
                                <img style="max-height: 100px;"  class="img-responsive" id="image" />
                                @else
                                <img style="max-height: 100px;" src="{{ asset('upload/apa_category/'.$editData->image) }}" class="img-responsive" id="image" />
                                @endif
                            </div>

                        </div>
                       

                    </div>

                    <div class="form-group col-sm-3">
                        <button class="btn btn-sm btn-primary"> {{ !empty($editData)? 'Update ' : 'Save ' }}</button>
                    </div>
                </div>
            </form>

        </div>

    </div>
    <!--/. container-fluid -->
</section>

@endsection

@section('script')
<script type="text/javascript">
    document.getElementById("files").onchange = function () {
    var reader = new FileReader();
    reader.onload = function (e) {
    // get loaded data and render thumbnail.
    document.getElementById("image").src = e.target.result;
    };
    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
    };
</script>
@endsection
