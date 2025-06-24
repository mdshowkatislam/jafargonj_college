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
            <li class="breadcrumb-item active">Butex Form</li>
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
                            <h4>
                                @if(@$type == 1)
                                    Application Form     
                                @elseif(@$type == 2)
                                    Application Form
                                @elseif(@$type == 3)
                                    Student Admission Information Form
                                @elseif(@$type == 4)
                                    Studentship Extension Form
                                @elseif(@$type == 5)
                                    Board scholarship student information form
                                @endif
                            </h4>
                        </div>

                        <div class="dropdown" style="margin-right: 5px;">
                            <button class="btn btn-primary dropdown-toggle mb-2" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Butex Form
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item @if(@$type == 1) active @endif" href="{{ url('site-settings/all_custom_form/1') }}">Form-1</a>
                                <a class="dropdown-item @if(@$type == 2) active @endif" href="{{ url('site-settings/all_custom_form/2') }}">Form-2</a>
                                <a class="dropdown-item @if(@$type == 3) active @endif" href="{{ url('site-settings/all_custom_form/3') }}">Form-3</a>
                                <a class="dropdown-item @if(@$type == 4) active @endif" href="{{ url('site-settings/all_custom_form/4') }}">Form-4</a>
                                <a class="dropdown-item @if(@$type == 5) active @endif" href="{{ url('site-settings/all_custom_form/5') }}">Form-5</a>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-sm table-striped" id="dataTable">
                            <thead class="bg-dark">
                                <tr>
                                    <th>SL</th>
                                    @if(@$type == 1)
                                        <th>Student Name</th>
                                        <th>Father Name</th>
                                        <th>Mother Name</th>
                                    @elseif(@$type == 2)
                                        <th>Admission Test Roll No</th>
                                        <th>Student Name</th>
                                        <th>Father Name</th>
                                    @elseif(@$type == 3)
                                        <th>Admission Test Roll No</th>
                                        <th>Student Name</th>
                                        <th>Father Name</th>
                                    @elseif(@$type == 4)
                                        <th>Student ID</th>
                                        <th>Student Name</th>
                                        <th>Department</th>
                                    @elseif(@$type == 5)
                                        <th>Admission Year</th>
                                        <th>Student Name</th>
                                        <th>Father Name</th>
                                    @endif  
                                    <th>Date</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (@$data as $item)
                                    <tr data-id="{{ $item->id }}">
                                        <td>{{ $loop->iteration }}</td>
                                        @if(@$type == 1)
                                            <td>{{ $item->data1 }}</td>
                                            <td>{{ $item->data3 }}</td>
                                            <td>{{ $item->data4 }}</td>
                                        @elseif(@$type == 2)
                                            <td>{{ $item->data1 }}</td>
                                            <td>{{ $item->data2 }}</td>
                                            <td>{{ $item->data3 }}</td>
                                        @elseif(@$type == 3)
                                            <td>{{ $item->data1 }}</td>
                                            <td>{{ $item->data5 }}</td>
                                            <td>{{ $item->data7 }}</td>
                                        @elseif(@$type == 4)
                                            <td>{{ $item->data1 }}</td>
                                            <td>{{ $item->data2 }}</td>
                                            <td>{{ $item->data3 }}</td>
                                        @elseif(@$type == 5)
                                            <td>{{ $item->data1 }}</td>
                                            <td>{{ $item->data6 }}</td>
                                            <td>{{ $item->data8 }}</td>
                                        @endif
                                        <td>
                                            {{ date('d M, Y',strtotime($item->updated_at)) }}
                                        </td>
                                        <td>
                                            <a href="{{ url('site-settings/single_custom_form_view', ['id' => @$item->id]) }}" data-toggle="tooltip" title="Show User Submitted Form Data">
                                                <i class="fas fa-eye custom-eye-icon-style text-primary pointer p-1 ms-3"></i>
                                            </a>
                                            <!-- <a href="{{ url('site-settings/single_custom_form', ['id' => @$item->id]) }}" data-toggle="tooltip" title="Show User Submitted Form Data">
                                                <i class="fas fa-eye custom-eye-icon-style text-primary pointer p-1 ms-3"></i>
                                            </a> -->
                                            <a href="{{ url('site-settings/single_custom_excel_form', ['id' => @$item->id]) }}" data-toggle="tooltip" title="Show User Submitted Form Data">
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

<script>
        $('.delete').click(function() {
            var itemId = $(this).data('id'); // Get the item ID
            var row = $(this).closest('tr'); // Get the closest table row

            if (confirm('Are you sure you want to delete this item?')) {
                $.ajax({
                    url: '{{ route("delete.customFormTemplateDelete") }}', 
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
</script>


@endsection
