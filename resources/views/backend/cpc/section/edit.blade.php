@extends('backend.layouts.app')
@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4 class="m-0 text-dark">About the Journal</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">@lang('Home')</a></li>
            <li class="breadcrumb-item active">@lang('Journal')</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
<!-- /.content-header -->
@if ($errors->any())
  @foreach ($errors->all() as $error)
  <script type="text/javascript">
    $(function () {
      $.notify("{{$error}}", {globalPosition: 'top right', className: 'error'});
    });
  </script>
  @endforeach
@endif 
<div class="content">
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('cpc.section', $section_id) }}" class="btn btn-success">Back</a>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{@$data->title}}</div>
                <form method="post" action="{{route('cpc.section.update', $data->id)}}" id="myForm">
                {{-- <form method="post" action="{{ route('cpc.section.update') }}" id="myForm"> --}}
                    {{csrf_field()}}
                    <div class="card-body">
                      <div class="row justify-content-center">
                          <div class="col-md-12">
                            <div class="form-row">
                              {{-- <input type="hidden" name="cpc_id" id="cpc_id" class="form-control form-control-sm" value="{{$id}}"> --}}
                                <div class="form-group col-md-12">
                                    <label class="control-label">Title <span class="text-red">*</span></label>
                                    <input type="text" name="title" id="name" class="form-control form-control-sm" value="{{@$data->title}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label">Sort Order <span class="text-red">*</span></label>
                                    <input type="text" name="sort_order" id="sort_order" class="form-control form-control-sm" value="{{@$data->sort_order}}">
                                </div>
                                <div class="form-group col-sm-6">
                                  <label>Status</label>
                                  <select id="status" name="status" class="form-control form-control-sm">
                                      <option value="">Please Select Type</option>
                                      <option {{ !empty($data) && $data->status == 1 ? 'selected' : '' }}
                                          value="1">Active</option>
                                      <option {{ !empty($data) && $data->status == 0 ? 'selected' : '' }}
                                          value="0">Inactive</option>
                                  </select>
                              </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label class="control-label">Description</label>
                                    <textarea name="description" class="textarea" id="" cols="30" rows="10"> {{ @$data->description}} </textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success btn-sm" style="">
                                @if(isset($data))
                                @lang('Update')
                                @else
                                @lang('Save')
                                @endif
                            </button>
                          </div>
                      </div>
                    </div>
                </form>
            </div>
        </div>
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
              required: ture,
            },
            sort_order: {
              required: true,
            }
              
          },

          messages: {
            sort_order: {
              required: "Sort Order is required."
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
