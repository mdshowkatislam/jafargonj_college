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
            <li class="breadcrumb-item active"><a href="{{ url('site-settings/user_form', ['id' => @$user_form_data->form_id]) }}">Back</a></li>
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
                        <h3>Show {{ @$formTemplate->title }} Data</h3>
                    </div>
                  
                    <div class="me-auto">
                        <a href="{{ url('site-settings/user_form', ['id' => @$user_form_data->form_id]) }}" data-toggle="tooltip" title="Back">
                        <button type="button" class="btn btn-danger">Back</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-sm" id="dataTable2">
                        <thead class="bg-dark">
                            <tr>
                                <td>Title</td>                         
                                <td>Value</td>             
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($user_form_data_row->form_data as $key => $value)
                                    @if ($key !== '_token' && $key !== 'form_id' && $key !== 'files')
                                    <tr>
                                        <td>{!! $key !!}</td>
                                        <td>{!! $value !!}</td>
                                    </tr>
                                    @endif
                                @endforeach
                            
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
        ]
    });

</script>

@endpush