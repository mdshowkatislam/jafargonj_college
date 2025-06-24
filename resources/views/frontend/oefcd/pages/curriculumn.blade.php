@extends('frontend.oefcd.landing')

@section('content')
    @include('frontend.partials.sections.banner_oefcd', ['page_title' => 'Curriculum Development'])
    <!-- Mission & Vision -->
    <section class="my-5">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-12 col-md-6 profile-info">
                    <h1 class="text-uppercase fs-3 mb-0 fw-bold">
                        Curriculum Development
                    </h1>
                    <div class="mb-0 mt-0 d-inline-block mx-auto" style="width: 100%; background-color: #86BC42; height: 4px">
                    </div>

                    <div class="p-3 mt-3 bg-light rounded shadow-sm">
                        <p style="text-align: justify;">
                            {!! $about->description !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="my-5">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-12 col-md-6 profile-info">
                    <h1 class="text-uppercase fs-3 mb-0 fw-bold">
                        Recently Reviewed Curriculum
                    </h1>
                    <div class="mb-0 mt-0 d-inline-block mx-auto" style="width: 100%; background-color: #86BC42; height: 4px">
                    </div>

                    <div class="bg-light p-3 mt-3 shadow-sm rounded">
                        <table id="dataTable" class="table table-sm table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="5%">SL</th>
                                    {{-- <th width="">Name</th> --}}
                                    <th width="">Department</th>
                                    <th width="">Program</th>
                                    <th width="">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($curriculums as $list)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $list->department->name }}</td>
                                        <td>{{ $list->program->program_title }}</td>
                                        <td>{{ date('d-M-Y', strtotime($list->date)) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
