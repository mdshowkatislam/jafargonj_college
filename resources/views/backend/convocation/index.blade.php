@extends('backend.layouts.app')
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0 text-dark">Convocation</h1> --}}
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Convocation</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h5 class="m-0 text-dark float-left">Convocation</h5>
                            <a href="{{ route('news.convocation.add') }}" class="btn btn-primary btn-sm float-right"><i
                                    class="fas fa-stream"></i> Add Convocation</a>
                        </div>
                        <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Slug</th>
                                    <th>Short Description</th>
                                    <th>Registration Link</th>
                                    <th>Status</th>
                                    <th>Registration Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($convocations as $convocation)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $convocation->title }}</td>
                                        <td>{{ $convocation->data9 }}</td>
                                        <td>{{ $convocation->short_description }}</td>
                                        <td>
                                            @if($convocation->registration_link)
                                                <a href="{{ $convocation->registration_link }}" target="_blank">Link</a>
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>{{ $convocation->status == '1' ? 'Active' : 'Inactive' }}</td>
                                        <td>{{ $convocation->registration_status == '1' ? 'Open' : 'Closed' }}</td>
                                        <td>
                                            <a href="{{ route('news.convocation.edit', $convocation->id) }}" class="btn btn-success btn-sm mb-1">Edit</a>
                                            <form action="{{ route('news.convocation.destroy', $convocation->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this convocation?');">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">No convocations found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
        <!--/. container-fluid -->
    </section>

@endsection
