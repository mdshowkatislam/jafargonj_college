@extends('backend.layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0 text-dark">Research</h1> --}}
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Research</li>
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
                                <h5 class="m-0 text-dark float-left">Research</h5>
                                <a href="{{ route('news.research.add') }}"
                                        class="btn btn-sm btn-primary float-right"><i class="fas fa-plus"></i> Add Research</a>
                        </div>

                        <div class="card-body">
                            <table id="dataTable" class="table table-sm table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        {{-- <th>Type</th> --}}
                                        <th>Research For</th>
                                        {{-- <th>Supervisor</th> --}}
                                        {{-- <th>Author</th> --}}
                                        <th>Publish Status</th>
                                        <th>Year</th>
                                        <th>Image</th>
                                        <th>File</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($researches as $item)
                                        <tr>
                                            <td> {{ $loop->iteration }}</td>
                                            <td>{{ @$item['title'] }}</td>
                                            {{-- <td>@if(@$item['research_type'] == '4') Media @else Research @endif</td> --}}
                                            @if (@$item['research_for']==1)
                                            <td>CHSR</td>
                                            @elseif (@$item['research_for']==2)
                                            <td>Department</td>
                                            @elseif (@$item['research_for']==3)
                                            <td>Faculty</td>
                                            @else
                                            <td>--</td>
                                            @endif
                                            {{-- <td>{{ @$item['research_for'] }}</td> --}}
                                            {{-- <td>{{ @$item->profile->nameEn }}</td> --}}
                                            {{-- <td>{{ @$item['author'] }}</td> --}}
                                            <td>{{ @$item->publication_status->title}}</td>
                                            <td>{{ @$item['year'] }}</td>
                                            
                                            <td>
                                                <img src="{{ asset('upload/journal/' . $item['image']) }}"
                                                    width="80" height="80"
                                                    onerror="this.onerror=null;this.src='{{ asset('upload/no-image.png') }}';">
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-primary"
                                                    href="{{ asset('upload/journal/' . @$item->attachment) }}"
                                                    download="">Download</a>
                                            </td>
                                            <td><a href="{{ route('news.research.edit', @$item->id) }}"
                                                    class="btn btn-primary btn-flat btn-sm edit" data-type="text"
                                                    data-id="" data-table="Slider"><i class="fas fa-edit"></i></a>
                                                {{-- <a  class="delete btn btn-danger btn-flat btn-sm" data-route = "{{ route('frontend-menu.completed_research.delete') }}" data-id="{{ @$item->id }}" ><i class="fas fa-trash"></i></a> --}}
                                            </td>
                                        </tr>
                                    @endforeach
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
