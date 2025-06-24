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
<style>
  .select2-container .select2-selection--single {
    height: 35px;
  }
</style>
<style>
  /* Hide the default radio button */
  input[type="radio"] {
      display: none;
  }

  /* Create a custom radio button */
  .custom-radio {
      position: relative;
      display: inline-block;
      cursor: pointer;
      font-size: 18px;
      padding-left: 35px; /* Space for the custom radio circle */
      margin-right: 20px;
      color: #333;
  }

  /* The custom radio button circle */
  .custom-radio::before {
      content: '';
      position: absolute;
      left: 0;
      top: 50%;
      transform: translateY(-50%);
      width: 20px;
      height: 20px;
      border: 2px solid #333;
      border-radius: 50%;
      background-color: transparent;
  }

  /* The checked state (filled circle) */
  input[type="radio"]:checked + .custom-radio::after {
      content: '';
      position: absolute;
      left: 5px;
      top: 50%;
      transform: translateY(-50%);
      width: 10px;
      height: 10px;
      background-color: #333;
      border-radius: 50%;
  }

  /* Style the text container */
  .text-container {
      display: none;
      margin-top: 15px;
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

          <input type="hidden" id="form_layout" name="form_layout" class="form_layout" value="{{ $editData->form_layout ?? '' }}">

          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
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

              <div class="col-sm-12">
                <div class="form-group">
                  <label>
                    <input type="radio" name="form_layout" value="yes" @if(empty($editData->form_layout) || $editData->form_layout == 'yes') checked @endif >
                      <span class="custom-radio">Custom Page</span>
                  </label>
                  <label>
                      <input type="radio" name="form_layout" value="no" @if(@$editData->form_layout == 'no') checked @endif>
                      <span class="custom-radio">Custom Form</span>
                  </label>
                </div>
              </div>
            </div>

              {{-- <div class="col-sm-4 blockLayout" style="@if(@$editData->form_template == '') display: none; @endif">
                <div class="form-group">
                  <label for="title"></label>
                    <select name="page_layout" id="page_layout" class="form-control">
                      <option value="" @if(@$editData->page_layout == '') selected  @endif>Select Page Layout</option>
                      <option value="1" @if(@$editData->page_layout == '1') selected  @endif>Form after description</option>
                      <option value="2" @if(@$editData->page_layout == '2') selected  @endif>Form before description</option>
                      <option value="3" @if(@$editData->page_layout == '3') selected  @endif>Show form only</option>
                    </select>
                     @error('form_template')
                     <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span> 
                     @enderror 
                  </div>
              </div> --}}

              {{-- <div class="col-sm-4 blockLayout" style="@if(@$editData->form_template == '') display: none; @endif">
                <div class="form-group">
                  <label for="title">Form Layout</label> <br/>
                    <button type="button" class="button-2" data-toggle="modal" data-target="#form_modal">Select Form Layout</button>
                </div>
              </div> --}}

              <div id="text1" @if(@$editData->form_layout == 'no') style="display:none;" @endif>
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
  
                  <div class="col-md-4">
                      <div class="form-group">
                      <label for="image">@lang('Image') <small style="color:red">(Max: 2 mb , preferred format: jpg,jpeg,png)</small> </label>
                      <input type="file" name="image"
                          class="image form-control @error('image') is-invalid @enderror" id="file-input">
                      @error('image')
                          <span class="text-red">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-sm-2">
                    @if(!empty($editData->image))
                        <img src="{{ asset('assets/welcome/'.$editData->image) }}" class="img-fluid" alt="Page Image">
                    @endif
                  </div>
  
                  <div class="col-sm-6">
                    <div class="form-group ">
                      <label>Video Url </label>
                      <input id="video_url" type="text" value="{{ !empty($editData->video_url)? $editData->video_url : old('video_url') }}" class="form-control @error('video_url') is-invalid @enderror" name="video_url" placeholder="Enter video_url"> @error('video_url')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span> @enderror
                    </div>  
                  </div>
                </div>
              </div>

              <div id="text2" @if(empty($editData->form_layout) || $editData->form_layout == 'yes') style="display:none;" @endif>
                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="title">Select Custom Form</label>
                        <select name="form_template" id="form_template" class="form-control">
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
                </div>
              </div>  
            
              <div class="form-row">
                <div class="form-group col-md-3">
                  <button type="submit" class="btn btn-info">{{(@$editData)?"Update":"Submit"}}</button>
                </div>
              </div>

            </div>
          </div>

          {{-- @include('backend.custom_page.form_modal') --}}

        </form>
      <!--Form End-->
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
      const radioButtons = document.querySelectorAll('input[name="form_layout"]');
      const text1 = document.getElementById('text1');
      const text2 = document.getElementById('text2');

      // Add change event listeners to all radio buttons
      radioButtons.forEach(function(radio) {
          radio.addEventListener('change', function() {
              if (this.value === 'yes') {
                  text1.style.display = 'block';  // Show text1
                  text2.style.display = 'none';   // Hide text2
              } else {
                  text1.style.display = 'none';   // Hide text1
                  text2.style.display = 'block';  // Show text2
              }
          });
      });
  });
</script>

<script>
  $(document).ready(function() {
    $('#form_template').change(function() {
        // Get the selected value
        var selectedValue = $(this).val();

        // Check if the selected value is not empty
        if (selectedValue !== "") {
            $('.blockLayout').css('display', 'block');  // Show the block layout
        } else {
            $('.blockLayout').css('display', 'none');   // Hide the block layout
        }
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
