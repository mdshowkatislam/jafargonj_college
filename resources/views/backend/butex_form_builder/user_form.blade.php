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
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><b>Home</b></a></li>
            <li class="breadcrumb-item active"><a href="{{ url('site-settings/butex_form_builder') }}">Back to Form Builder Home</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
    <div class="container">
        <div class="card shadow">
            <div class="card-header">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <h3>{{ $formTemplate->title }}</h3>
                    </div>
                    <div class="me-auto">
                        <button type="button" class="btn btn-success clear" data-id="{{ @$user_form_data_row->form_id }}">Clear All Contact Data</button>
                        <a href="{{ url('site-settings/butex_form_builder') }}"><button type="button" class="btn btn-danger">Back</button></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable2">
                        <thead class="bg-dark">
                            <tr>
                                @if($user_form_data_row && $user_form_data_row->form_data)
                                    <th>SL </th>
                                    @forelse ($user_form_data_row->form_data as $key => $value)
                                        @if ($key !== '_token' && $key !== 'form_id' && $key !== 'files') 
                                            <th>{!! $key !!} </th>
                                        @endif 
                                    @empty
                                        <th>No items found.</th>
                                    @endforelse
                                        <th>Files </th>
                                        <th>Date </th>
                                        <th>View</th>
                                    @else
                                    <th>No data available.</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse (@$user_form_data as $item)
                            @php
                                // Decode the form data JSON
                                $files = $item->form_data['files'] ?? [];
                                //$files = isset($formData['files']) ? $formData['files'] : [];
                            @endphp
                                <tr data-id="{{ $item->id }}">
                                    <td>{{ $loop->iteration }}</td>
                                    @foreach ($item->form_data as $key => $value)
                                        @if ($key !== '_token' && $key !== 'form_id' && $key !== 'files')
                                            <td>{!! $value !!}</td>
                                        @endif
                                    @endforeach
                                    <td>
                                        @foreach (@$files as $file)
                                            <span>
                                                <a href="{{ asset($file) }}" target="_blank"><button type="button" class="btn btn-sm btn-success mb-2">Uploaded File-{{ $loop->iteration }}</button></a>
                                            </span>
                                        @endforeach
                                    </td>
                                    
                                    <td>
                                        {{ date('d-M-Y | m:h:s A', strtotime($item->created_at)) }}
                                    </td>
                                    <td>
                                        <a href="{{ url('site-settings/data_single_print', ['id' => @$item->id]) }}" data-toggle="tooltip" title="Preview Form">
                                            <i class="fas fa-eye custom-eye-icon-style text-primary pointer p-1 ms-3"></i>
                                        </a>
                                        <a href="{{ url('site-settings/data_single_print_image', ['id' => @$item->id]) }}" data-toggle="tooltip" title="Preview Form">
                                            <i class="fas fa-camera custom-eye-icon-style text-primary pointer p-1 ms-3"></i>
                                        </a>
                                        <a href="{{ url('site-settings/data_single', ['id' => @$item->id]) }}" data-toggle="tooltip" title="Preview Form">
                                            <i class="fas fa-file-alt custom-eye-icon-style text-primary pointer p-1 ms-3"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <th>No items found.</th>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')

<script>
    $('#dataTable2').DataTable({
         "paging": true,
         "lengthChange": true,
         "searching": true,
         "ordering": true,
         "info": true,
         "autoWidth": true,
         dom: 'Bfrtip',
         buttons: [
            {
                extend: 'excel',
                title: '{{ $formTemplate->title }}'  // Fixed table name for export
            },
            // {
            //     extend: 'pdf',
            //     title: '{{ $formTemplate->title }}'
            // }
        ]
    });

    $('.clear').click(function(){
        var itemId = $(this).data('id'); // Get the item ID

        if (confirm('Are you sure you want to clear all data?')) {
            $.ajax({
                url: '{{ route("delete.userForm") }}', 
                method: 'POST',
                data: {
                    id: itemId,
                    _token: '{{ csrf_token() }}' 
                },
                success: function(response) {
                    //alert(response.message); 
                    toastr.success(response.message)
                    window.location.reload();
                },
                error: function(xhr) {
                    toastr.error('Error: ' + xhr.responseText)
                    //alert('Error: ' + xhr.responseText); 
                }
            });
        }
    });
</script>

@endpush