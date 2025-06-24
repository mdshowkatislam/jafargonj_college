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
  /* Toggle switch style */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:checked + .slider:before {
  transform: translateX(26px);
}

/* Rounded slider */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

/* Hide text by default */
.hidden {
  display: none;
}

</style>
<style>
  .select2-container .select2-selection--single {
    height: 35px;
  }
</style>
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          {{-- <h4 class="m-0 text-dark">Custom Page Add</h4> --}}
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('Home')</a></li>
            <li class="breadcrumb-item active">@lang('Custom Page')</li>
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
          @lang('Custom Page') @lang('Update')
          @else
          @lang('Custom Page') @lang('Add')
          @endif
          <a class="btn btn-sm btn-info float-right" href="{{route('setup.custom_page')}}"><i class="fa fa-list"></i> @lang('Custom Page') @lang('List')</a></h5>
      </div>
      <!-- Form Start-->
      <form id="myForm" method="post" action="{{(@$editData)?route('setup.custom_page.update',$editData->id):route('setup.custom_page.store')}}" id="myForm" enctype="multipart/form-data">
          @csrf

          {{-- <input type="hidden" id="form_layout" name="form_layout" class="form_layout" value="{{ $editData->form_layout ?? '' }}"> --}}

          <div class="card-body">
            <div class="row">

              <div class="col-md-8">
                <div class="form-group">
                <label for="title">@lang('Title') <span class="text-red">*</span></label>
                 <input id="title" type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{@$editData->title }}" placeholder="">
                 @error('title')
                 <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span> 
                 @enderror 
                </div>
              </div>

              <div class="col-sm-4">
                <div class="form-group">
                  <label for="title">Are you want custom form in this page?</label>
                  <div class="toggle-container">
                    <label class="switch">
                      <input type="checkbox" name="form_layout" id="toggleSwitch" @if (@$editData->form_layout == 'on') checked @endif>
                      <span class="slider round"></span>
                    </label>
                  </div>                  
                </div>
              </div>
            </div>

            <div id="blockLayout" @if (@$editData->form_layout != 'on') class="hidden" @endif>
              <div class="row" >
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="title">Custom Form</label>
                      <select name="form_template" id="form_template" class="form-control">
                        <option value="">Select custom form</option>
                        @foreach (@$form_template as $item)
                          <option value="{{ $item->id }}" @if(@$editData->form_template == $item->id) selected  @endif>{{ $item->title }}</option>
                        @endforeach
                      </select>
                      @error('form_template')
                      <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span> 
                      @enderror 
                    </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="title">Page Layout</label>
                      <select name="page_layout" id="page_layout" class="form-control">
                        <option value="1" @if(@$editData->page_layout == '1') selected  @endif>Form after description</option>
                        <option value="2" @if(@$editData->page_layout == '2') selected  @endif>Form before description</option>
                        <option value="3" @if(@$editData->page_layout == '3') selected  @endif>Form left & description right</option>
                        <option value="4" @if(@$editData->page_layout == '4') selected  @endif>Form right & description left</option>
                        <option value="5" @if(@$editData->page_layout == '5') selected  @endif>Show form only</option>
                      </select>
                      @error('form_template')
                      <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span> 
                      @enderror 
                    </div>
                </div>
              </div>
            </div> 

              {{-- <div class="col-sm-4 blockLayout" style="@if(@$editData->form_template == '') display: none; @endif">
                <div class="form-group">
                  <label for="title">Form Layout</label> <br/>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#form_modal">Select Form Layout</button>
                </div>
              </div> --}}

            <div class="row">
              <div class="col-md-12">
                  <div class="form-group">
                    <label for="description">@lang('Description') {{-- <span class="text-red">*</span> --}}</label>
                    <textarea id="description" name="description" class="form-control textarea">{{ !empty($editData->description)? $editData->description : "" }}</textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span> @enderror
                  </div>
              </div>

              <div class="form-group col-md-4">
                <label for="image">@lang('Image') <small style="color:red">(Max: 2 mb , preferred format: jpg,jpeg,png)</small> </label>
                <input type="file" name="image"
                    class="image form-control @error('image') is-invalid @enderror" id="file-input">
                @error('image')
                    <span class="text-red">{{ $message }}</span>
                @enderror
              </div>

              <div class="col-sm-2">
                @if(!empty($editData->image))
                    <img src="{{ asset('assets/welcome/'.$editData->image) }}" class="img-fluid" alt="Page Image">
                @endif
              </div>

              <div class="form-group col-sm-6">
                <label>Video Url </label>
                <input id="video_url" type="text" value="{{ !empty($editData->video_url)? $editData->video_url : old('video_url') }}" class="form-control @error('video_url') is-invalid @enderror" name="video_url" placeholder="Enter video_url"> @error('video_url')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span> @enderror
              </div>  
            </div>

            <div class="form-row">
              <div class="form-group col-md-3">
                <button type="submit" class="btn btn-info">{{(@$editData)?"Update":"Submit"}}</button>
              </div>
            </div>
          </div>

          @include('backend.custom_page.form_modal')

        </form>
      <!--Form End-->
    </div>
  </div>
</div>

<script>
  document.getElementById('toggleSwitch').addEventListener('change', function() {
    const text = document.getElementById('blockLayout');
    if (this.checked) {
      text.classList.remove('hidden');
    } else {
      text.classList.add('hidden');
    }
  });

</script>

<script type="text/javascript">
  $(document).ready(function() {
      $('#myForm').validate({
          rules: {
              title: {
                  required: true,
              }
          },
          messages: {
              title: {
                  required: "Title is required."
              }
          },
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
