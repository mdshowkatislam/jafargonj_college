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
          <h1 class="m-0 text-dark"></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('Home')</a></li>
            <li class="breadcrumb-item active">@lang('Designation')</li>
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
					@lang('Designation') @lang('Update')
					@else
					@lang('Designation') @lang('Add')
					@endif
					<a class="btn btn-sm btn-info float-right" href="{{route('user.designation')}}"><i class="fa fa-list"></i> @lang('Designation') @lang('List')</a></h5>
			</div>
			<!-- Form Start-->
			<form method="post" action="{{!empty($editData->id) ? route('user.designation.update',$editData->id) : route('user.designation.store')}}" id="myForm">
				{{csrf_field()}}
				<div class="card-body">
                  <div class="row justify-content-center">
                      <div class="col-md-12">
                        <div class="show_module_more_event">
                            <div class="form-row">
                                <div class="form-group col-sm-6">
                                    <label>Designation <span class="text-red">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" autocomplete="off" value="{{ !empty($editData->name)? $editData->name : old('name') }}">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label">Purpose <span class="text-red">*</span></label>
                                    <select id="purpose_id" class="form-control form-control-sm select2" name="purpose">
                                        <option selected value="" selected>Please Select Purpose</option>
                                        <option @if( !empty($editData) && $editData->purpose == 1) selected @endif value="1">Faculty</option>
                                        <option @if( !empty($editData) && $editData->purpose == 2) selected @endif value="2">Office Staff</option>
                                        <option @if( !empty($editData) && $editData->purpose == 3) selected @endif value="3">Syndicate Committee</option>
                                        <option @if( !empty($editData) && $editData->purpose == 4) selected @endif value="4">Senate Committee</option>
                                        <option @if( !empty($editData) && $editData->purpose == 5) selected @endif value="5">CHSR Office</option>
                                        <option @if( !empty($editData) && $editData->purpose == 6) selected @endif value="6">Academic Committee</option>
                                        <option @if( !empty($editData) && $editData->purpose == 7) selected @endif value="7">Finance Committee</option>
                                        <option @if( !empty($editData) && $editData->purpose == 8) selected @endif value="8">IQAC Committee</option>
                                        <option @if( !empty($editData) && $editData->purpose == 9) selected @endif value="9">Department</option>
                                        <option @if( !empty($editData) && $editData->purpose == 10) selected @endif value="10">Hall Committee</option>
                                    </select>
                                </div>

                                <div class="form-group col-sm-6">
                                    <label class="control-label">Layer <span class="text-red">*</span></label>
                                    <select id="layer_id" class="form-control form-control-sm select2" name="layer">
                                        <option selected value="" selected>Please Select Layer</option>
                                        <option @if( !empty($editData) && $editData->layer == 1) selected @endif value="1">Top</option>
                                        <option @if( !empty($editData) && $editData->layer == 2) selected @endif value="2">Middle</option>
                                        <option @if( !empty($editData) && $editData->layer == 3) selected @endif value="3">Low</option>
                                    </select>
                                    
                                </div>


                                <div class="form-group col-sm-6">
                                    <label>Sort Order <span class="text-red">*</span></label>
                                    <input type="text" class="form-control @error('sort_order') is-invalid @enderror" name="sort_order" autocomplete="off" value="{{ !empty($editData->sort_order)? $editData->sort_order : old('sort_order') }}">
                                    @error('sort_order')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-sm-6">
                                    <label class="control-label">Status <span class="text-red">*</span></label>
                                    <select id="status" class="form-control form-control-sm select2" name="status">
                                        <option selected value="" selected>Please Select Status</option>
                                        <option @if( !empty($editData) && $editData->status == 1) selected @endif value="1">Active</option>
                                        <option @if( !empty($editData) && $editData->status == 2) selected @endif value="2">Inactive</option>

                                    </select>
                                </div>


                            </div>
                        </div>
                        <button type="submit" class="btn btn-info btn-sm" style="">
                            @if(isset($editData))
                            @lang('Update')
                            @else
                            @lang('Save')
                            @endif
                        </button>
                      </div>
                  </div>
				</div>
			</form>
			<!--Form End-->
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
	  $('[data-toggle="tooltip"]').tooltip();
	});
</script>

<script type="text/javascript">
  $(document).ready(function() {
      $('textarea').each(function() {
          $(this).val($(this).val().trim());
      });

      $('#myForm').validate({
          ignore: [],
          debug: false,
          errorClass: 'text-danger',
          validClass: 'text-success',
          rules: {
            name: {
                  required: true,
              },
              purpose: {
                  required: true,
              },
              layer: {
                  required: true,
              },
              sort_order: {
                  required: true,
                  number: true,        
                  integer:true,
                  digit:true,

              },
              status: {
                  required: true,
              }
             
          },
          messages: {
            name: {
                  required: "Name is required",
              },
              purpose: {
                  required: "Purpose is required",
              },
              layer: {
                  required: "Layer is required",
              },
              sort_order: {
                  required: "Sort Order is required",
                  number: "Order Must be Number ",               
                  integer: "Order Must be integer",
                  digit: "Order Must be digit",
              },
              status: {
                  required: "Status is required",
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
