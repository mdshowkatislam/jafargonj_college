@extends('frontend.oefcd.landing')

@section('content')
    @include('frontend.partials.sections.banner_oefcd', ['page_title' => 'Faculty Development'])
    <!-- Mission & Vision -->
    <section class="my-5">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-12 col-md-6 profile-info">
                    <h1 class="text-uppercase fs-3 mb-0 fw-bold">
                        Mission & Vision
                    </h1>
                    <div class="mb-0 mt-0 d-inline-block mx-auto" style="width: 100%; background-color: #86BC42; height: 4px">
                    </div>
                    <div class="p-3 mt-3 bg-light rounded shadow-sm">
                        <p style="text-align: justify;">
                            {!! $info->mission_vision !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Faculty Development Program -->
    <section class="my-5">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-12 col-md-6 profile-info">
                    <h1 class="text-uppercase fs-3 mb-0 fw-bold">
                        Faculty Development Program
                    </h1>
                    <div class="mb-0 mt-0 d-inline-block mx-auto" style="width: 100%; background-color: #86BC42; height: 4px">
                    </div>
                    <div class="p-3 mt-3 bg-light rounded shadow-sm">
                        <p style="text-align: justify;">
                            {!! $info->content !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
