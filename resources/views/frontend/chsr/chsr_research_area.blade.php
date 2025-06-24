@extends('frontend.chsr.landing')

@php
    $page_title = 'Research Area';
@endphp
@section('title')
    {{ $page_title }}
@endsection
<style>

</style>
@section('content')
    {{-- Banner --}}
    @include('frontend.partials.sections.banner_chsr', ['page_title' => $page_title])


    <!-- Section -->
    <section class="mt-5 mb-4">
        <div class="academic-details ">
            <div class="container">
                <div class="row">
                    @foreach ($infos as $key => $info)
                    <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="bg-light p-3 mb-4 rounded shadow about-message-content">
                                <div>
                                    <h2 class="fs-3 fw-bold border-bottom pb-3 mb-3 common-font-color">
                                        {{ $info->faculty->name }}
                                    </h2>
                                    <div class="text-justify fs-6">
                                        {!! $info->description !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
@endsection
