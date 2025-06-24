@extends('backend.layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0 text-dark">Article</h1> --}}
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Article</li>
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
                            <h5 class="m-0 text-dark float-left">Article</h5>
                            @if ($type==1)
                            <a href="{{ route('news.journal_paper.list') }}" class="btn btn-success btn-sm float-right "><i class="fas fa-stream"></i> Journal List</a>
                            @elseif ($type==2)
                            <a href="{{ route('news.research') }}" class="btn btn-success btn-sm float-right "><i class="fas fa-stream"></i> Research List</a>
                            @endif
                            <a href="{{ route('news.article.add', [$type, $info->id]) }}" class="btn btn-primary btn-sm float-right mr-1"><i class="fas fa-stream"></i> Add Article</a>
                        </div>
                        <div class="card-body">
                            @if ($type==1)
                            <h4>Journal Title: {{ $info->paper_title }}</h4>
                            @elseif ($type==2)
                            <h4>Research Title: {{ $info->title }}</h4>
                            @endif
                            <table id="dataTable" class="table table-sm table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Paper Title</th>
                                        <th>Author</th>
                                        <th>Co Author</th>
                                        <th>Date</th>
                                        <th>Attachment</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($articles as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ @$item->title }}</td>
                                            <td>{{ @$item->author }}</td>
                                            <td>{{ @$item->co_author }}</td>
                                            <td>{{ @$item->date }}</td>
                                            <td>
                                                @if (@$item->attachment)
                                                    <a href="{{ asset('upload/article/' . @$item->attachment) }}"
                                                        download="">Download</a>
                                                @endif
                                            </td>
                                            <td><a href="{{ route('news.article.edit',[ $type, $info->id, @$item->id]) }}"
                                                    class="btn btn-primary btn-sm btn-sm edit" data-type="image"
                                                    data-id=""><i class="fas fa-edit"></i></a>
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
