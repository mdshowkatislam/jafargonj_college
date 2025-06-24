@extends('backend.layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0 text-dark">News | Event | Notice</h1> --}}
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">News | Event | Notice</li>
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
                            <h5 class="m-0 text-dark float-left">News | Event | Notice</h5>
                            <a href="{{ route('news.add') }}" class="btn btn-sm btn-primary float-right"><i
                                    class="fas fa-plus"></i> Add News | Event | Notice</a>

                      
                            {{-- <a href="{{ route('news.filter_general_notice') }}" class="btn btn-sm btn-primary float-right" style="margin-right: 2px;"><i class="fas fa-stream"></i> General Notice</a>
                            <a href="{{ route('news.filter_special_notice') }}" class="btn btn-sm btn-primary float-right" style="margin-right: 2px;"><i class="fas fa-stream"></i> Special Notice</a>
                            <a href="{{ route('news.filter_tender_notice') }}" class="btn btn-sm btn-primary float-right" style="margin-right: 2px;"><i class="fas fa-stream"></i> Tender Notice</a> --}}
                         

                                @if (!empty($faculty) && $faculty->isNotEmpty())
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-primary float-right dropdown-toggle mx-1" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Faculty
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            @foreach ($faculty as $item)
                                                <a class="dropdown-item @if(isset($type_id) && $type_id == $item->id) active @endif" 
                                                href="{{ url('/news/news-event-notice/filter_faculty/' . $item->id) }}">
                                                    {{ $item->name }}
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                @if (!empty($department) && $department->isNotEmpty())
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-primary float-right dropdown-toggle mx-1" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Department
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            @foreach ($department as $item)
                                                <a class="dropdown-item @if(isset($type_id) && $type_id == $item->id) active @endif" 
                                                href="{{ url('/news/news-event-notice/filter_department/' . $item->id) }}">
                                                    {{ $item->name }}
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                @if (!empty($office) && $office->isNotEmpty())
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-primary float-right dropdown-toggle mx-1" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Office
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            @foreach ($office as $item)
                                                <a class="dropdown-item @if(isset($type_id) && $type_id == $item->id) active @endif" 
                                                href="{{ url('/news/news-event-notice/filter_office/' . $item->id) }}">
                                                    {{ $item->name }}
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                @if (!empty($club) && $club->isNotEmpty())
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-primary float-right dropdown-toggle mx-1" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Club
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            @foreach ($club as $item)
                                                <a class="dropdown-item @if(isset($type_id) && $type_id == $item->id) active @endif" 
                                                href="{{ url('/news/news-event-notice/filter_club/' . $item->id) }}">
                                                    {{ $item->name }}
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                @if (!empty($hall) && $hall->isNotEmpty())
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-primary float-right dropdown-toggle mx-1" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Hall
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            @foreach ($hall as $item)
                                                <a class="dropdown-item @if(isset($type_id) && $type_id == $item->id) active @endif" 
                                                href="{{ url('/news/news-event-notice/filter_hall/' . $item->id) }}">
                                                    {{ $item->name }}
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                <div class="dropdown">
                                    <button class="btn btn-sm btn-primary float-right dropdown-toggle mx-1" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        For
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        {{-- <a class="dropdown-item" href="{{ url('/news/list') }}">All</a> --}}
                                        <a class="dropdown-item @if(@$type == 'faculty') active @endif" href="{{ url('/news/news-event-notice/filter_faculty/0') }}">Faculty</a>
                                        <a class="dropdown-item @if(@$type == 'department') active @endif" href="{{ url('/news/news-event-notice/filter_department/0') }}">Department</a>
                                        <a class="dropdown-item @if(@$type == 'office') active @endif" href="{{ url('/news/news-event-notice/filter_office/0') }}">Office</a>
                                        <a class="dropdown-item @if(@$type == 'club') active @endif" href="{{ url('/news/news-event-notice/filter_club/0') }}">Club</a>
                                        <a class="dropdown-item @if(@$type == 'hall') active @endif" href="{{ url('/news/news-event-notice/filter_hall/0') }}">Hall</a>
                                    </div>
                                </div>

                                @if(@$type == 'notice')
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-primary float-right dropdown-toggle mx-1" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Select Notice
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item  @if(isset($type_id) && $type_id == '1') active @endif" href="{{ url('/news/news-event-notice/filter_notice/1') }}">Results</a>
                                            <a class="dropdown-item  @if(isset($type_id) && $type_id == '2') active @endif" href="{{ url('/news/news-event-notice/filter_notice/2') }}">Administrative</a>
                                            <a class="dropdown-item  @if(isset($type_id) && $type_id == '3') active @endif" href="{{ url('/news/news-event-notice/filter_notice/3') }}">Academic</a>
                                            <a class="dropdown-item  @if(isset($type_id) && $type_id == '4') active @endif" href="{{ url('/news/news-event-notice/filter_notice/4') }}">Programs</a>
                                            <a class="dropdown-item  @if(isset($type_id) && $type_id == '5') active @endif" href="{{ url('/news/news-event-notice/filter_notice/5') }}">Affiliated</a>
                                            <a class="dropdown-item  @if(isset($type_id) && $type_id == '6') active @endif" href="{{ url('/news/news-event-notice/filter_notice/6') }}">Tender</a>
                                            <a class="dropdown-item  @if(isset($type_id) && $type_id == '7') active @endif" href="{{ url('/news/news-event-notice/filter_notice/7') }}">Other</a>
                                            @foreach ($convocations as $convocation)
                                                <a class="dropdown-item  @if(isset($type_id) && $type_id == '1' . $convocation->id) active @endif" href="{{ url('/news/news-event-notice/filter_notice', '1' . $convocation->id) }}">{{ $convocation->title }}</a>       
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
  
                                {{-- @if (auth()->user()->id == 1) --}}
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-primary float-right dropdown-toggle mx-1" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Type
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{ route('news.filter_news') }}">News</a>
                                            <a class="dropdown-item" href="{{ route('news.filter_event') }}">Event</a>
                                            <a class="dropdown-item" href="{{ route('news.filter_notice') }}">Notice</a>
                                        </div>
                                    </div>
                                {{-- @endif --}}

                            <a href="{{ route('news.list') }}" class="btn btn-sm btn-primary float-right" style="margin-right: 2px;"><i class="fas fa-stream"></i> All</a>
                        </div>


                        <div class="card-body">
                            <table id="dataTable" class="table table-sm table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Type</th>
                                        <th>Date</th>
                                        <th>Title</th>
                                        <th>Display on Home</th>
                                        <th>Created By</th>
                                        {{-- <th>Program Info</th>
                                            <th>Course Info</th> --}}
                                        <th>Image</th>
                                        <th>File</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($news as $n)
                                    @php 
                                        $n->faculty_id;
                                    @endphp
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                @if ($n['type'] == 1)
                                                    News
                                                @elseif($n['type'] == 2)
                                                    Event
                                                @elseif($n['type'] == 3)
                                                    Notice
                                                @elseif($n['type'] == 4)
                                                    General Notice
                                                @elseif($n['type'] == 5)
                                                    Special Notice
                                                @elseif($n['type'] == 6)
                                                    Tender Notice
                                                @endif
                                            </td>
                                            <td>{{ date('d/m/Y', strtotime($n['date'])) }}</td>
                                            <td>{{ $n['title'] }}</td>
                                            <td>{{ $n['display_on_scrollbar'] == 1 ? 'Yes' : 'No' }}</td>
                                            <td>{{ $n['user']['name'] }}</td>
                                            <td><img src="{{ asset('upload/news/' . $n['image']) }}" width="80"
                                                    height="80"
                                                    onerror="this.onerror=null;this.src='{{ asset('upload/no-image.png') }}';">
                                            </td>
                                            @if (!empty($n['file']))
                                                <td><a target="_blank"
                                                        href="{{ asset('upload/news/' . $n['file']) }}"><i
                                                            class="fas fa-eye fa-2x"></i></a></td>
                                            @else
                                                <td><a><i class="fas fa-eye fa-2x"></i></a></td>
                                            @endif

                                            <td class="text-center">
                                                <div class="row mb-2 d-flex" style="justify-content: center;">
                                                    <a href="{{ route('news.edit', $n->id) }}"
                                                        class="btn btn-primary btn-sm mx-1" data-type="image"><i
                                                            class="fas fa-edit"></i></a>
                                                    <a title="Delete" class="btn btn-danger btn-sm mx-1" id="delete" data-route="{{ route('news.delete') }}" data-token="{{csrf_token()}}" data-id="{{ $n->id }}" ><i class="fas fa-trash"></i></a>  
                                                </div>
                                                <div class="row d-flex" style="justify-content: space-around;">
                                                    @if (auth()->check())
                                                        @if (auth()->user()->id == 1 || auth()->user()->user_role[0]->role_id == 1 || auth()->user()->user_role[0]->role_id == 13 || auth()->user()->user_role[0]->role_id == 17 )
                                                            <a href="{{ $n->is_approved == 0 ? route('news.approve', $n->id) : route('news.reject', $n->id) }}"
                                                                class="{{ $n->is_approved == 0 ? 'btn-success' : 'btn-danger' }} btn-sm fw-bold">{{ $n->is_approved == 1 ? 'Reject' : 'Approve' }}</a>
                                                        @else
                                                            {!! $n->is_approved == 1
                                                                ? '<span class="badge badge-success">Approved</span>'
                                                                : '<span class="badge badge-warning">Pending for Approval</span>' !!}
                                                        @endif
                                                    @endif
                                                </div>
                                                {{-- | <a class="delete btn btn-danger btn-flat btn-sm" data-route="{{ route('news.delete') }}" data-id="{{ $n->id }}" ><i class="fas fa-trash"></i></a> --}}
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
