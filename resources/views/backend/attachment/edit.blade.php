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
          <h4 class="m-0 text-dark">Academic Attachment Edit</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">@lang('Home')</a></li>
            <li class="breadcrumb-item active">@lang('Academic Attachment')</li>
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
          @if(isset($editData))
          @lang('Academic Attachment') @lang('Update')
          @else
          @lang('Academic Attachment') @lang('Add')
          @endif
          <a class="btn btn-sm btn-success float-right" href="{{route('setup.attachment')}}"><i class="fa fa-list"></i> @lang('Academic Attachment') @lang('List')</a></h5>
      </div>
      <!-- Academic Attachment Start-->
      <form method="post" action="{{route('setup.attachment.update', $editData->id)}}"   id="myForm" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-6">

                  <label for="Title">@lang('Title') {{-- <span class="text-red">*</span> --}}</label>
                  <input type="text" value="{{$editData->title}}" name="title" placeholder="Title" class="form-control">

                   @error('title')
                   {{-- {{ $message }} --}}
                   <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }} </strong>
                    </span>
                   @enderror

                </div>

                <div class="form-group col-md-6">
                  <label for="pdf_file">@lang('PDF File') {{-- <span class="text-red">*</span> --}}</label>
                  <input type="file" name="pdf_file" placeholder="PDF File" class="form-control">
                   @error('pdf_file')
                   <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                   @enderror
                </div>

                <div class="form-group col-md-4">
                  <label class="control-label">Type</label>
                  <select id="type_id" class="form-control form-control-sm select2" name="type_id">
                      <option value="">Please Select</option>
                      <option value="1" {{  @$editData->type_id == 1 ? 'selected' : '' }}>Academic Calender</option>
                      <option value="2" {{  @$editData->type_id == 2 ? 'selected' : '' }}>Procedure</option>
                      <option value="3" {{  @$editData->type_id == 3 ? 'selected' : '' }}>Software/Application</option>
                      <option value="4" {{  @$editData->type_id == 4 ? 'selected' : '' }}>Annual Report</option>
                      <option value="5" {{  @$editData->type_id == 5 ? 'selected' : '' }}>Annual Performance Agreement</option>
                      <option value="6" {{  @$editData->type_id == 6 ? 'selected' : '' }}>Citizen Charter</option>
                  </select>
                  @error('type_id')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>

                <div class="form-group col-md-4">
                  <label for="publish Date">@lang('Publish Date') {{-- <span class="text-red">*</span> --}}</label>
                  <input type="date" value="{{$editData->publish_date}}" name="publish_date" placeholder="publish Date" class="form-control">
                   @error('publish_date')
                   <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                   @enderror
                </div>

                <div class="form-group col-md-4">
                  <label class="control-label">Status</label>
                  <select id="status" class="form-control form-control-sm select2" name="status">
                      <option value="1" {{  @$editData->status == 1 ? 'selected' : '' }}>Active</option>
                      <option value="0" {{  @$editData->status == '0' ? 'selected' : '' }}>Inactive</option>
                  </select>
                  @error('status')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              </div>



            <div class="form-row">
              <div class="form-group col-md-3">
                <button type="submit" class="btn btn-primary">Update</button>
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

      $('#myForm').validate({
        ignore : [],
        debug : false,
        rules: {
          date: {
            required: true,
          },
          short_title_en: {
            required: true,
          },
          short_title_bn: {
            required: true,
          },
          long_title_en: {
            required: true,
          },
          long_title_bn: {
            required: true,
          },
          status: {
            required: true,
          }
        },
        messages: {

        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
  </script>

@endsection
