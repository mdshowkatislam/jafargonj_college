@extends('frontend.oefcd.landing')

@section('content')
    @include('frontend.partials.sections.banner_oefcd', ['page_title' => 'Evaluation'])
    <!-- Mission & Vision -->
    <section class="">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-12 col-md-6 profile-info my-5">
                    <h1 class="text-uppercase fs-3 mb-0 fw-bold">
                        Evaluation
                    </h1>
                    <div class="mb-0 mt-0 d-inline-block mx-auto" style="width: 100%; background-color: #86BC42; height: 8px">
                    </div>

                    <p style="text-align: justify;">
                        {!! $about->description !!}
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
