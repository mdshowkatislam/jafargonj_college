@extends('backend.layouts.app')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Manage Menu</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Menu</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="content-header">
    <div class="conyainer-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{route('frontend-menu.menu_type.view')}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> View Menu Type</a>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{!empty($editData->id) ? route('frontend-menu.menu_type.update',$editData->id) : route('frontend-menu.menu_type.store')}}" id="myForm">
                            {{csrf_field()}}

                            <div class="row">
                                <div class=" form-group col-md-6">
                                    <label>Menu Type <span class="text-red">*</span></label>
                                    <input type="text" id="name" name="name" value="{{ !empty($editData->name)? $editData->name : old('name')  }}" class="form-control"  placeholder="Menu type name" >
                                </div>
                                <div class=" form-group col-md-6">
                                    <label>Menu Position <span class="text-red">*</span></label>
                                    <input type="text" id="position" name="position" value="{{ !empty($editData->position)? $editData->position : old('position')  }}" class="form-control"  placeholder="Menu Position" >
                                </div>

                                <div class="col-md-12">

                                    <br>
                                    <button type="submit" class="btn btn-primary">{{(@$editData) ? 'Update' : 'Submit'}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
                }
            },
            messages: {
                name: {
                    required: "Name is required.",
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
