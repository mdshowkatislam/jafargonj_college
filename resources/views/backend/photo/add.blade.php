@extends('backend.layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h4 class="m-0 text-dark text-capitalize">{{@$gallery_type? @$gallery_type : ''}}&nbsp;Photo Add</h4> --}}
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">@lang('Home')</a></li>
                        <li class="breadcrumb-item active">@lang('Photo')</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h5>
                        @if (isset($editData))
                            Update {{@$gallery_type? @$gallery_type : ''}} Photo
                        @else
                            Add {{@$gallery_type? @$gallery_type : ''}} Photo 
                        @endif
                        <a class="btn btn-sm btn-primary float-right ml-1" href="{{ route('setup.photo', [$category_id,$type, @$ref_id]) }}"><i
                                class="fa fa-list"></i> @lang('Photo') @lang('List')</a>
                        <a class="btn btn-sm btn-success float-right" 
                        href="{{ $type ? route('setup.gallery_category.categoryWiseGallery', [$type, @$ref_id]) : route('setup.gallery_category')}}"><i
                                class="fa fa-list"></i> @lang('Photo Gallery') @lang('List')
                        </a>

                    </h5>
                </div>

                <form method="post"
                    action="{{ @$editData ? route('setup.photo.update', [$category_id, $editData->id]) : route('setup.photo.store', $category_id) }}"
                    id="myForm" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-row align-items-center">
                            <input name="gallery_category_id" type="hidden" value="{{ $category_id }}">
                            <input name="gallery_type" type="hidden" value="{{ $type }}">
                            <input name="ref_id" type="hidden" value="{{ @$ref_id }}">
                            {{-- <div class="form-group col-md-6">
                                    <label for="gallery_category_id">@lang('Gallery Category') <span class="text-red">*</span></label>
                                    <select name="gallery_category_id"
                                        class="form-control select2  @error('gallery_category_id') is-invalid @enderror">
                                        <option disabled selected value="">@lang('Select')</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ @$editData->gallery_category_id == $category->id ? 'selected' : '' }}>
                                                {{ @$category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('gallery_category_id')
                                        <span class="text-red">{{ $message }}</span>
                                    @enderror
                                </div> --}}
                            <div class="form-group col-md-5">
                                <label for="title">@lang('Title') <span class="text-red">*</span></label>
                                <input id="title" type="text" name="title" class="form-control"
                                    value="{{ @$editData->title }}" placeholder="">
                            </div>
                          
                            <div class="form-group col-md-4">
                                <label for="image">@lang('Image') <small style="color:red">(Max: 1 mb , preferred format: jpg,jpeg,png)</small> <span class="text-red">*</span></label>
                                <input type="file" name="image"
                                    class="image form-control @error('image') is-invalid @enderror" id="file-input">
                                @error('image')
                                    <span class="text-red">{{ $message }}</span>
                                @enderror
                            </div>

                            
                            <div class="col-sm-3">
                                <img src="{{ asset('upload/gallery_images/' . @$editData->image) }}" width="100%" height="auto" onerror="this.onerror=null;this.src='{{ asset('upload/no-image.png') }}';">
                            </div>


                            @if (@$editData->photo_path)
                            <input type="hidden" name="image" value="{{ @$editData->photo_path }}"
                                class="form-control @error('image') is-invalid @enderror" id="image">
                        @endif
                        <div class="form-group col-md-3 m-0">
                            <label class="mr-1" for="is_featured">@lang('Is featured?') </label>
                            <input type="checkbox" name="is_featured" class="" id="is_featured"
                            {{ @$editData->is_featured == 1 ? 'checked' : '' }} >
                        </div>


                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <button type="submit"
                                    class="btn btn-primary">{{ @$editData ? 'Update' : 'Submit' }}</button>
                            </div>
                        </div>
                    </div>
            </div>

            </form>
            <!--Form End-->
        </div>


    </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            //   $('textarea').each(function(){
            //     $(this).val($(this).val().trim());
            //   });
            $('#myForm').validate({
                rules: {
                    title: {
                        required: true,
                    },
                  
                     @if (!@$editData)
                        image: {
                            required: true,
                            extension: "jpg|jpeg|png"
                        }
                        @else 
                        image: {
                            extension: "jpg|jpeg|png",
                        }
                    @endif
                    
                },

                messages: {
                    title: {
                        required: "Title is required."
                    },
                   
                    image: {
                        required:"Image is required",
                        extension: "Please upload file in these format only (jpg, jpeg, png)."
                    }
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('text-danger');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@endsection
