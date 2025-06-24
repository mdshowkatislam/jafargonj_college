@extends('frontend.faculty.tamplate_three.partials.main')

@php
    $page_title = 'Research & Publication';
@endphp
@section('title'){{ $page_title }} @endsection


@section('content')
    <div class="faculty-profile-banner d-flex justify-content-center align-items-center" style=" background-image: url( {{ @$banner->image ? asset('upload/banner/' . $banner->image) : asset('frontend/assets/img/bup/banner.jpg') }} ) ">
        <h1 class="text-white font-poppins">{{ $page_title }}</h1>
    </div>
    <!-- Hero Title -->
    <section>
        <div class="mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 year-list mt-5">
                        <div class="shadow pb-3  rounded program-type">
                            <h1 class="text-white text-uppercase fw-bolder py-3 ps-3 fs-5 mb-0 mt-0 common-bg-color"
                            style="width: 100%;">
                            Archive
                        </h1>
                        <input type="hidden" value="{{ $faculty->id }}" name="faculty_id" id="faculty_id">
                        <div class="program-text py-3 mx-3 border-bottom year" data-year="All">
                                <label for="all" class="d-flex justify-content-between align-items-center">
                                    <input type="radio" checked value="All" name="year" id="all">
                                    <h1 class="fs-6 fw-bold ">
                                        All
                                    </h1>
                                    <span class="badge text-bg-warning fs-6">{{ count($infos) }}</span>
                                </label>
                            </div>
                            @foreach ($infos->groupBy('year') as $year => $item)
                                <div class="program-text py-3 mx-3 border-bottom year" data-year="{{ $year }}">
                                    <label for="{{ $year }}"
                                        class="d-flex justify-content-between align-items-center">
                                        <input type="radio" value="{{ $year }}" name="year"
                                            id="{{ $year }}">
                                        <h1 class="fs-6 fw-bold ">
                                            {{ $year }}
                                        </h1>
                                        <span class="badge text-bg-warning fs-6">{{ count($item) }}</span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-md-8 mt-5 " id="research-list">
                        <div class="row">
                            <div class="col-md-12">
                                @foreach ($infos as $key => $info)
                                    <div class="col-md-12 mb-4">
                                        <div class="bg-light shadow p-3 rounded" style="">
                                            <h3 class="fs-5 font-work-sans">
                                                <a href="{{ route('research', $info->id) }}"
                                                    class="font-work-sans">{{ $info->title }}</a>
                                            </h3>
                                            <p class="fs-7 font-work-sans"><i class="fas fa-calendar-alt"></i>
                                                {{ date('M d, Y', strtotime($info->date)) }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).on('click', '.year', function() {
            $(window).scrollTop(0);
            var year = $(this).data('year');
            var faculty_id = $('#faculty_id').val();
            $.ajax({
                url: "{{ route('faculty_research_by_year') }}",
                type: "GET",
                data: {
                    year: year,
                    faculty_id: faculty_id
                },
                success: function(data) {
                    $('#research-list').html(data);
                }
            });
        });
    </script>
@endsection

