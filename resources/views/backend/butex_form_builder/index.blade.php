@extends('backend.layouts.app')
@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          {{-- <h1 class="m-0 text-dark">Manage Banner</h1> --}}
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Butex Form Builder</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-outline card-primary p-2 mt-3">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <h2>Butex Form Builder</h2>
                        </div>

                            <div class="dropdown" style="margin-right: 5px;">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Butex Form
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ url('site-settings/all_custom_form/1') }}">Form-1</a>
                                    <a class="dropdown-item" href="{{ url('site-settings/all_custom_form/2') }}">Form-2</a>
                                    <a class="dropdown-item" href="{{ url('site-settings/all_custom_form/3') }}">Form-3</a>
                                    <a class="dropdown-item" href="{{ url('site-settings/all_custom_form/4') }}">Form-4</a>
                                    <a class="dropdown-item" href="{{ url('site-settings/all_custom_form/5') }}">Form-5</a>
                                </div>
                            </div>

                        <div class="me-auto">
                            <a href="{{ url('site-settings/all_form_template') }}"><button type="button" class="btn btn-success mb-3">Add New</button></a>
                        </div>
                        
                    </div>
        
                    <div class="table-responsive">
                        <table class="table table-sm table-striped" id="dataTable">
                            <thead class="bg-dark">
                                <tr>
                                    <th>SL</th>
                                    <th>Form Title</th>
                                    <th>Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (@$form_data as $item)
                                    <tr data-id="{{ $item->id }}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>
                                            <select class="form-select status" data-id="{{ $item->id }}">
                                                <option @if ($item->status == 'active') selected @endif value="active">Active</option>
                                                <option @if ($item->status == 'inactive') selected @endif value="inactive">Inactive</option>
                                                <option @if ($item->status == 'draft') selected @endif value="draft">Draft</option>
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ url('site-settings/template_single', ['id' => @$item->id]) }}" data-toggle="tooltip" title="Preview Form">
                                                <i class="fas fa-eye custom-eye-icon-style text-primary pointer p-1 ms-3"></i>
                                            </a>
                                            <a class="" href="{{ url('site-settings/edit_form', ['id' => @$item->id]) }}" data-toggle="tooltip" title="Edit Form Template">
                                                <i class="fas fa-pen custom-pen-icon-style text-info pointer p-1 ms-3"></i>
                                            </a>
                                            <a href="{{ url('site-settings/user_form', ['id' => @$item->id]) }}" data-toggle="tooltip" title="Show User Submitted Form Data">
                                                <i class="fas fa-file-alt custom-pen-icon-style text-success pointer p-1 ms-3"></i>
                                            </a>
                                            <i class="fas fa-trash custom-delete-icon-style text-danger pointer p-1 delete" data-id="{{ $item->id }}" data-toggle="tooltip" title="Delete Form Template"></i>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="d-none">
    <div class="container shadow-sm">
        <div class="row">
            <div class="col-sm-3">
                <h2>Butex Form Builder</h2>
            </div>
            <div class="col-sm-7"></div>
            <div class="col-sm-2">
                <div>
                    <button type="button" class="button-2 save mt-2 mb-3" data-toggle="modal" data-target="#save">Save Form</button>
                </div>
            </div>
        </div>
        <div id="build-wrap"></div>
        {{-- <button id="save-form" class="btn btn-primary mt-2 mb-3">Save Form</button> --}}
    </div>
</section>

@include('backend.butex_form_builder.save-modal')

<script>
    jQuery($ => {
        const fbTemplate = document.getElementById('build-wrap');
        // $(fbTemplate).formBuilder();
        const formBuilder = $(fbTemplate).formBuilder();
    });

    $(document).ready(function() {
        $('.status').change(function(){
            var status = $(this).val();
            var itemId = $(this).data('id');

            $.ajax({
                url: '{{ route("save.StatusFormTemplate") }}', 
                method: 'POST',
                data: {
                    status: status,
                    id: itemId,
                    _token: '{{ csrf_token() }}' 
                },
                success: function(response) {
                    //alert(response.message); 
                    toastr.success(response.message)
                },
                error: function(xhr) {
                    //alert('Error: ' + xhr.responseText); 
                    toastr.error('Error: ' + xhr.responseText)
                }
            });
        });

        $('.delete').click(function() {
            var itemId = $(this).data('id'); // Get the item ID
            var row = $(this).closest('tr'); // Get the closest table row

            if (confirm('Are you sure you want to delete this item?')) {
                $.ajax({
                    url: '{{ route("delete.formTemplate") }}', 
                    method: 'POST',
                    data: {
                        id: itemId,
                        _token: '{{ csrf_token() }}' 
                    },
                    success: function(response) {
                        //alert(response.message); 
                        toastr.success(response.message)
                        row.remove(); 
                    },
                    error: function(xhr) {
                        toastr.error('Error: ' + xhr.responseText)
                        //alert('Error: ' + xhr.responseText); 
                    }
                });
            }
        });

    });

</script>

@endsection
