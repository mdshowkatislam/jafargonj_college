@extends('frontend.oefcd.landing')

@section('content')
    @include('frontend.partials.sections.banner_oefcd', ['page_title' => 'International Affairs'])
    <!-- Mission & Vision -->
    <section class="my-5">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-12 col-md-6 profile-info">
                    <h1 class="text-uppercase fs-3 mb-0 fw-bold">
                        About
                    </h1>
                    <div class="mb-0 mt-0 d-inline-block mx-auto" style="width: 100%; background-color: #86BC42; height: 4px">
                    </div>

                    <div class="p-3 mt-3 bg-light rounded shadow-sm">
                        <p style="text-align: justify;">
                            {!! $about->content !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if (count($foreign_mous) > 0)
        <section class="my-5">
            <div class="container">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-lg-12 col-md-6 profile-info">
                        <h1 class="text-uppercase fs-3 mb-0 fw-bold">
                            List of MoU (Foreign Institutes)
                        </h1>
                        <div class="mb-0 mt-0 d-inline-block mx-auto"
                            style="width: 100%; background-color: #86BC42; height: 4px">
                        </div>

                        <div class="bg-light p-3 mt-3 shadow-sm rounded">
                            <table id="dataTable" class="table table-sm table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%">SL</th>
                                        <th width="">Name</th>
                                        <th width="25%">Country</th>
                                        {{-- <th width="">Date</th>  --}}
                                        {{-- <th width="">Authority</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($foreign_mous as $list)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $list->name }}</td>
                                            <td>{{ $list->country }}</td>
                                            {{-- <td>{{ date('d-M-Y', strtotime(@$list->date)) }}</td> --}}
                                            {{-- <td>{!! $list->signature !!}</td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if (count($local_mous) > 0)
        <section class="my-5">
            <div class="container">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-lg-12 col-md-6 profile-info">
                        <h1 class="text-uppercase fs-3 mb-0 fw-bold">
                            List of MoU (Local Institutes)
                        </h1>
                        <div class="mb-0 mt-0 d-inline-block mx-auto"
                            style="width: 100%; background-color: #86BC42; height: 4px">
                        </div>

                        <div class="bg-light p-3 mt-3 shadow-sm rounded">
                            <table id="dataTable" class="table table-sm table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%">SL</th>
                                        <th width="">Name</th>
                                        <th width="25%">Country</th>
                                        {{-- <th width="">Date</th>  --}}
                                        {{-- <th width="">Authority</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($local_mous as $list)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $list->name }}</td>
                                            <td>{{ $list->country }}</td>
                                            {{-- <td>{{ date('d-M-Y', strtotime(@$list->date)) }}</td> --}}
                                            {{-- <td>{!! $list->signature !!}</td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
