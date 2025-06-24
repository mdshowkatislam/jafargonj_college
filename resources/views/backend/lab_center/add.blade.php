@extends('backend.layouts.app')
@section('content')
    <style type="text/css">
        .i-style {
            display: inline-block;
            padding: 10px;
            width: 2em;
            text-align: center;
            font-size: 2em;
            vertical-align: middle;
            color: #444;
        }

        .demo-icon {
            cursor: pointer;
        }
    </style>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="m-0 text-dark">Lab Center Add</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">@lang('Home')</a></li>
                        <li class="breadcrumb-item active">@lang('Create')</li>
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
                            @lang('Lab Center') @lang('Update')
                        @else
                            @lang('New Lab Center') @lang('Add')
                        @endif
                        <a class="btn btn-sm btn-success float-right"
                           href="{{ route('lab-center.list') }}"><i class="fa fa-list"></i> @lang('Lab Center')
                            @lang('Lists')</a>
                    </h5>
                </div>
                <!-- Form Start-->
                <form id="myForm"
                      method="post"
                      action="{{ @$editData ? route('lab-center.update', $editData->id) : route('lab-center.store') }}"
                      id=""
                      enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="clubName">Title <span class="text-red">*</span></label>
                                <input type="text"
                                       name="title"
                                       class="form-control @error('name') is-invalid @enderror"
                                       placeholder="Lab Center Name"
                                       value="{{ @$editData->title }}">
                                @error('name')
                                    <span class="invalid-feedback"
                                          role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            @include('backend.layouts.pertials.faculty_wise_department')
          
                            <div class="form-group col-md-6">
                                <label for="clubName">Gallery <span class="text-red">*</span></label>
                                <select name="gallery_id"
                                        class="form-control @error('gallery_id') is-invalid @enderror select2"
                                        id="gallery_id">
                                    <option value="">@lang('Please Select')</option>
                                        @foreach ($gallery_categories as $item)
                                            <option value="{{ $item->id }}" {{ @$editData->gallery_id == $item->id ? 'selected' : '' }}>  {{ @$item->name }}</option> 
                                        @endforeach
                                            </select>
                                        @error('gallery_id')
                                            <span class="invalid-feedback"
                                                  role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label>Image<small style="color: brown"> (Max 2 mb | Preferred format:
                                        jpg,jpeg,png)</small></label>
                                <input type="file"
                                       class="form-control filer_input_single @error('image') is-invalid @enderror"
                                       name="image"> @error('image')
                                    <span class="invalid-feedback"
                                          role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">@lang('Description') {{-- <span class="text-red">*</span> --}}</label>
                                <textarea name="description"
                                          class="textarea"
                                          cols="30"
                                          rows="10">
                                         @if (!empty($editData))      
                                          {{ $editData->description }}
                                          @endif
                                        </textarea>
                                @error('description')
                                    <span class="invalid-feedback"
                                          role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
            var a1 = CKEDITOR.replace('description');
            CKFinder.setupCKEditor(a1, '/ckfinder/');
            var a1 = CKEDITOR.replace('mission');
            CKFinder.setupCKEditor(a1, '/ckfinder/');
            var a1 = CKEDITOR.replace('vision');
            CKFinder.setupCKEditor(a1, '/ckfinder/');
        });
    </script>

    {{--  <script type="text/javascript">
    
  $(document).on('select change','#faculty_id',function(){
      var faculty_id = $('#faculty_id').val();
      $.ajax({
          url: "{{ route('faculty_wise_department') }}",
          type: "GET",
          data: { faculty_id: faculty_id },
          success: function(data)
          {
              if(data != 'fail')
              {
                  $('#department_id').empty();
                  $('#department_id').append('<option selected value ="">please Select Department</option>');
                  $.each(data,function(index,subcatObj){
                      $('#department_id').append('<option value ="'+subcatObj.ucam_department_id+'">'+subcatObj.name +'</option>');
                  });
              }
              else
              {
                  console.log('failed');
              }
          }
      });
  });

</script>  --}}

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) { //show Image before upload
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                };
                reader.readAsDataURL(e.target.files[0]);
            });
        });
    </script>

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
                    faculty_id: {
                        required: true,
                    },
                    department_id: {
                        required: true,

                    },
                    gallery_id: {
                        required: true,
                    },
                    image: {

                        extension: "jpg|jpeg|png"
                    },

                    status: {
                        required: true
                    }
                },

                messages: {
                    title: {
                        required: "Title is required."
                    },
                    faculty_id: {
                        required: "Faculty Name is required."
                    },
                    department_id: {
                        required: "Department is required.",

                    },
                    gallery_id: {
                        required: "Gallery is required."
                    },

                    image: {

                        extension: "Please upload file in these format only (jpg, jpeg, png)."
                    }
                },
                //   errorElement: 'span',
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
