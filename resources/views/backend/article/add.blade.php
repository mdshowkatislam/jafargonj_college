@extends('backend.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                {{-- <h1 class="m-0 text-dark">Add Article</h1> --}}
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Article</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <div class="card card-outline card-info">
            <div class="card-header">
                <div class="col-md-12">
                    <h5 class="m-0 text-dark float-left">Add Article</h5>
                    <a href="{{ route('news.article.list', [$type, $info->id]) }}" class="btn btn-info btn-sm float-right"><i
                            class="fas fa-stream"></i> View Article</a>
                </div>
            </div>
            <div class="row px-4 pt-2">
                @if ($type==1)
                <h4>Journal Title: {{ $info->paper_title }}</h4>
                @elseif ($type==2)
                <h4>Research Title: {{ $info->title }}</h4>
                @endif
            </div>

            {{-- @dd($editData) --}}
            <form id="" action="{{ !empty($editData) ? route('news.article.update', [ $type, $info->id, $editData->id]) : route('news.article.store', [$type, $info->id]) }}"
                method="post" enctype="multipart/form-data" autocomplete="off">
                @csrf
                <div class="card-body">
                    <div class="form-row">
                        <input id="type_id" type="hidden" value="{{ $type }}" class="form-control @error('type_id') is-invalid @enderror" name="type_id" > 
                        <input id="ref_id" type="hidden" value="{{ $info->id }}" class="form-control @error('ref_id') is-invalid @enderror" name="ref_id" > 
                        <div class="form-group col-sm-6">
                            <label>Title</label>
                            <input id="title" type="text"
                                value="{{ !empty($editData->title) ? $editData->title : old('title') }}"
                                class="form-control @error('title') is-invalid @enderror" name="title"
                                placeholder="Title"> 
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group col-sm-6">
                            <label>Date</label>
                            <input id="date" type="text"
                                value="{{ !empty($editData->date) ? date('d-m-Y', strtotime($editData->date)) : old('date') }}"
                                class="form-control singledatepicker @error('date') is-invalid @enderror" name="date"
                                placeholder="Date"> @error('date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        

                        <div class="form-group col-sm-6">
                            <label>Author</label>
                            <input type="text" class="form-control @error('author') is-invalid @enderror"
                                name="author" id="author" autocomplete="off" placeholder="Author"
                                value="{{ !empty($editData->author) ? $editData->author : old('author') }}">
                            @error('authors')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group col-sm-6">
                            <label>Co-Author</label>
                            <input type="text" class="form-control @error('co_author') is-invalid @enderror"
                                name="co_author" id="co_author" autocomplete="off" placeholder="Co-Author"
                                value="{{ !empty($editData->co_author) ? $editData->co_author : old('co_author') }}">
                            @error('co_author')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-12">
                            <label>Upload File<small style="color: brown"> (Max 10 mb)</small></label>
                            <input id="attachment" type="file" value="" 
                                class="form-control @error('attachment') is-invalid @enderror" name="attachment">
                            @error('attachment')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group col-sm-12">
                            <label>Abstrtact</label>
                            <textarea id="abstract" type="text"
                                class="form-control @error('abstract') is-invalid @enderror textarea" name="abstract">{{ !empty($editData->abstract) ? $editData->abstract : old('abstract') }}</textarea>
                            @error('abstract')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                    </div>
                    <button class="btn bg-gradient-info btn-flat"><i class="fas fa-save"></i>
                        {{ !empty($editData) ? 'Update ' : 'Save' }}</button>

                </div>
            </form>

        </div>
        <!--/. container-fluid -->
</section>
@endsection