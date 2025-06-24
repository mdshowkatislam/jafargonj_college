@extends('backend.layouts.app')
@section('content')
<style type="text/css">
  .i-style{
        display: inline-block;
        padding: 10px;
        width: 2em;
        text-align: center;
        font-size: 2em;
        vertical-align: middle;
        color: #444;
  }
  .demo-icon{cursor: pointer; }
</style>
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          {{-- <h4 class="m-0 text-dark">Office Add</h4> --}}
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('Home')</a></li>
            <li class="breadcrumb-item active">@lang('Office')</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

<div class="container-fluid">
  <div class="col-md-12">
    <div class="card card-outline card-info">
      <div class="card-header">
        <h5>
          @if(isset($editData))
          @lang('Office Facility') @lang('Update')
          @else
          @lang('Office Facility') @lang('Add')
          @endif
          <a class="btn btn-sm btn-success float-right" href="{{route('setup.manage_office')}}"><i class="fa fa-list"></i> @lang('Office') @lang('List')</a>

          <a class="btn btn-sm btn-info float-right mr-2" href="{{route('setup.office.facility', $office->id)}}"><i class="fa fa-list"></i> @lang('Office Facility') @lang('List')</a>
        </h5>
      </div>
      <!-- Form Start-->
      <form method="post" action="{{(@$editData)?route('setup.office.facility.update',[$editData->id, $office->id]):route('setup.office.facility.store', $office->id)}}" id="myForm" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="office_id" value="{{ $office->id }}">
          <div class="card-body">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="title">@lang('Office Facility Title') <span class="text-red">*</span></label>
                <input id="title" type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{@$editData->title}}" placeholder="Office Facility Title">
                 @error('title')
                 <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span> 
                 @enderror 
              </div>

              <div class="form-group col-md-6">
                <label>Image<small style="color: brown"> (Max 2 mb - 320px X 320px)</small> <span class="text-red">*</span></label>
                <input type="file" class="form-control filer_input_single @error('image') is-invalid @enderror" name="image"> @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span> @enderror
            </div>

              <div class="form-group col-md-6">
                <label for="sort_order">@lang('Sort Order') <span class="text-red">*</span></label>
                <input id="sort_order" type="number" name="sort_order" class="form-control  @error('sort_order') is-invalid @enderror" value="{{@$editData->sort_order}}" placeholder="">
                 @error('sort_order')
                 <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span> 
                 @enderror 
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Status <span class="text-red">*</span></label>
                <select id="status" class="form-control form-control-sm select2" name="status">
                    <option value="1" {{ @$editData->status == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ @$editData->status == '0' ? 'selected' : '' }}>Inactive</option>
                </select>
                @error('status')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group col-sm-12">
                <label>Description</label>
                <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror textarea" name="description">{{ !empty($editData->description)? $editData->description : old('description') }}</textarea>
                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span> @enderror
              </div>
              <div class="form-group col-md-3">
                <button type="submit" class="btn btn-info">{{(@$editData)?"Update":"Submit"}}</button>
              </div>
            </div>
          </div>
        </form>
      <!--Form End-->
    </div>
  </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
      var a1 = CKEDITOR.replace('long_title_en');
      CKFinder.setupCKEditor( a1, '/ckfinder/' );
      var a1 = CKEDITOR.replace('long_title_bn');
      CKFinder.setupCKEditor( a1, '/ckfinder/' );
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function () {
      $('textarea').each(function(){
              $(this).val($(this).val().trim());
          }
      );
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
               
                sort_order: {
                    required: true,
                },
                
                <?php if(!@$editData){ ?>
                  image: {
                      required: true,
                      extension: "jpg|jpeg|png",
                  },
              <?php }else{ ?>
                  image: {
                      extension: "jpg|jpeg|png",
                  },
              <?php  } ?>
              
                status: {
                    required: true
                }
            },

            messages: {
              title: {
                    required: "Title is required."
                },
               
                sort_order: {
                    required: "Sort Order is required"
                },
                status: {
                    required: "Status is required."
                },
                image: {
                  
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
