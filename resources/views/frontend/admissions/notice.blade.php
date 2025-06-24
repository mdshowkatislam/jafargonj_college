@extends('frontend.layouts.master-landing')
@php
    $page_title = 'Admissions';
@endphp
@section('title')
    {{ $page_title }}
@endsection
@section('content')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables/dataTables.bootstrap4.css') }}">

    <script src="{{ asset('backend/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables/dataTables.bootstrap4.js') }}"></script>

    <style>
        .table thead tr th,
        .table tbody tr td {
            padding-top: 0.5rem !important;
            padding-bottom: 0.5rem !important;
        }
    </style>

    @include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])

    <section class="container">
        <div class="row my-5">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-sm table-bordered table-striped fs-6">
                        <thead>
                            <tr>
                                <th>SI</th>
                                {{-- <th>Faculty</th> --}}
                                {{-- <th>Department</th> --}}
                                <th>Program</th>
                                <th>Title</th>
                                <th width="8%">Session</th>
                                <th width="10%">Start Date</th>
                                <th width="10%">End Date</th>
                                <th>Attachments</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($academics as $academic)
                                <tr> 
                                    <td>{{ $loop->iteration }}</td>
                                    {{-- <td>{{ $academic->faculty->name }}</td> --}}
                                    {{-- <td>{{ $academic->department->name }}</td> --}}
                                    <td>{{ @$academic->programCategory->program_category }}</td>
                                    <td>{{ @$academic->title }}</td>
                                    <td>{{ @$academic->session }}</td>
                                    <td>{{ $academic->start_date ? date('d-M-Y', strtotime($academic->start_date)) : '' }}
                                    </td>
                                    <td>{{ $academic->end_date ? date('d-M-Y', strtotime($academic->end_date)) : '' }}
                                    </td>
                                    <td style="text-align: center;">
                                        @php
                                            if ($academic->file != null) {
                                                $ext = explode('.', $academic->file);
                                                //dd($ext[1]);
                                            }
                                        @endphp
                                        @if ($academic->file != null && $ext[1] == 'pdf')
                                            <a target="_blank"
                                                href="{{ asset('storage/upload/admission/' . $academic->file) }}"><i class="fa fa-download"></i></a>
                                        @endif
                                        @if ($academic->file != null && ($ext[1] == 'doc' || $ext[1] == 'docm' || $ext[1] == 'docx'))
                                            <a target="_blank"
                                                href="{{ asset('storage/upload/admission//' . $academic->file) }}"><i class="fa fa-download"></i></a>
                                        @endif
                                    </td>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <script>
        $('#dataTable').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": false,
            "autoWidth": true,
        });
    </script>
@endsection
