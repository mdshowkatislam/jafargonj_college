@extends('backend.layouts.app')


@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ !empty($editData)? 'Update ' : 'Add ' }} APA Report </h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Add APA Report</li>
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
                <a href="{{ route('report.list', @$apa_category->id )}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> View Reports</a>
            </div>
            <div class="card-body">
                <form action="{{ !empty($editData)? route('report.update',[$editData->apa_category_id, $editData->id]) : route('report.store', @$apa_category->id) }}" method="post" enctype="multipart/form-data" autocomplete="off" id="myForm">
                    @csrf
                    <input type="hidden" class="form-control @error('apa_category_id') is-invalid @enderror" id="apa_category_id" name="apa_category_id" placeholder="Category" value="{{  @$editData ? $apa_category->id : @$apa_category->id }}" >
                    <h5><label for="">APA Category: </label> {{@$apa_category->title}}</h5>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            {{-- <div class="form-group"> --}}
                                {{--  <input type="text" class="form-control @error('apa_category_id') is-invalid @enderror" id="apa_category_id" name="title" placeholder="Category" value="{{  @$editData ? $apa_category->title : @$apa_report[0]->getCategory->title }}" readonly> --}}


                                {{--  <select class="form-control" id="self_id" name="self_id">
                                  <option value="0" {{ empty($editData)? 'selected' : '' }}>Select an Option</option>
                                  @foreach(@$apa_category as $perman)
                                  <option value="{{ $perman->id }}" {{@$editData->apa_category_id == $perman->id ? 'selected' : ''}}>{{ $perman->title }}</option>
                                  @endforeach
                                </select>  --}}
                            {{-- </div> --}}

                            <div class="form-group">
                                <label for="title">Report Title</label>
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
                                <label>Link</label><br>
                                <input type="text" name="link" value="{{@$editData->url}}" placeholder="Place your link" class="form-control  @error('link') is-invalid @enderror">
                                @error('link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            {{--  <div class="form-group">
                                <label>Publish Data</label><br>
                                <input type="text" name="link" value="{{@$editData->publich_date}}" placeholder="Enter publish date" class="form-control">


                                @error('link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>  --}}
                            <div class="form-group">
                                <label class="control-label">Publish Date</label>
                                <input type="date"
                                       name="publish_date"
                                       class="form-control  @error('publish_date') is-invalid @enderror"
                                       value="{{ !empty($editData->publish_date) ? $editData->publish_date : old('publish_date') }}">
                                       @error('publish_date')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                   @enderror
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

