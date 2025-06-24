@extends('backend.layouts.app')
@section('content')


<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        {{-- <h1 class="m-0 text-dark">Manage Banner</h1> --}}
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{route('butex_builder')}}">Butex Builder</a></li>
          <li class="breadcrumb-item active">Butex Custom Components</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card card-outline card-primary">
          <div class="card-header">
            <h5 class="text-effect"><i class="nav-icon ion-settings"></i> Butex Custom Components</h5>
          </div>
          <div class="card-body">
            <div class="section-create">
              {{-- <a href="{{route('butex_builder')}}">
                <button type="button" class="button-77"><i class="nav-icon ion-settings"></i> Butex Builder</button>
              </a> --}}
              <button type="button" class="button-79" role="button" data-toggle="modal" data-target="#createCustomComponent"><i class="fas fa-plus"></i> Create New Component</button>
            </div>

            <hr/>
            <!-- components table -->
            <h2 class="text-effect3 text-center">Custom Components</h2>
            <hr/>
  
            <div class="row">
              @foreach (@$components as $key => $component)
                <div class="col-sm-3">
                  <div class="form-group">
                    <button type="button" role="button" id="1" class="button-77 add-component" onclick="addComponent(1, 0)" style="width:100%;">{{ @$component->component_title }}
                      <div class="text-center mt-2">
                        <a href="{{ url('site-settings/delete-compoenet', ['id' => $component->id]) }}"><i class="fas fa-pen text-light"></i></a>
                        <i class="fas fa-trash delete-component" data-toggle="modal" data-target="#deleteComponent" data-comid="{{ @$component->id }}" style="margin-left: 7px;"></i>
                      </div>
                    </button>
                  </div>
                </div>
              @endforeach
            </div>

          </div>      

        </div>
      </div>

    </div>
  </div>
  <!--/. container-fluid -->
</section>

<!-- Modal Create Custom Components-->
<div class="modal fade" id="createCustomComponent" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" style="border: none;">
      <div class="modal-content">
        <form method="post" action="{{ route('store.component') }}">
          @csrf
          <div class="header-custom">
            <h5 class="text-effect2 text-center">Component</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" style="color: white;">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="">
                <input type="hidden" name="action" class="action" id="action" value="insert">
                <input type="hidden" name="id" class="id" id="id">

                <div class="form-group col-sm-12">
                  <label class="mt-2">Componenet Title</label>
                  <input type="text" class="form-control" id="component_title" name="component_title" style="border:1px solid #13aa52;" required>
                  <label class="mt-2">Componenet Description</label>
                  
                  <textarea type="text" id="component_description" name="component_description" class="form-control component_description textarea"></textarea>
                 
                  @error('long_description')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" role="button" class="btn btn-success" id="submitBtn"><i class="fas fa-arrow-up"></i> Save</button>
            <div id="spinner" class="spinner" style="display:none;"></div>
            <button class="btn btn-danger" role="button" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
</div>

<!-- Modal Delete Component Confirmation-->
<div class="modal fade" id="deleteComponent" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" style="border: none;">
    <div class="modal-content">
      <div class="modal-body">
        <div class="">
            <h3 class="text-center p-2">Are you sure to delete this component?</h3>
            <div class="text-center p-3">
              <input type="hidden" name="comid" class="comid" id="comid">
              <button type="button" role="button" class="btn btn-success" onclick="deleteComponent()">YES</button>
              <button class="btn btn-danger" role="button" data-dismiss="modal">NO</button>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
    $('.delete-component').click(function() {
      var comid     = $(this).data('comid');
      $('.comid').val(comid);
    });
    
  function deleteComponent() {
        var row = $(this).closest('.data-row');
        var id  = $('#comid').val(); 

            $.ajax({
                type: 'get',
                url: '{{ route("component.delete") }}',
                data: {
                  id: id,
                },
                success: function (data) {
                 // toastr.success(data.message)
                  //location.reload();
                  //row.hide();
                  $('#deleteComponent').modal('hide');
                  location.reload();
                  //$('.data-row[data-id="' + id + '"]').hide();
                },
                error: function (error) {
                  toastr.error("Anything Wrong! Please try again.");
                }
            });
  }  
</script>

@endsection