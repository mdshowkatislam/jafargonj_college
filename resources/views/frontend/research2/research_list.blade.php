{{-- @extends('frontend.landing') --}}
@php
    if ($research_for == 1) {
        $extend = 'frontend.chsr.landing';
    } elseif ($research_for == 3) {
        $extend = 'frontend.bangabandhu_chair.landing';
    } else {
        $extend = 'frontend.landing';
    }
@endphp
@extends($extend)

@php
    $page_title = 'Research';
@endphp
@section('title')
    {{ $page_title }}
@endsection
<style>
    .card-background {
        border: none;
        background-color: #f1f1f1;
        border-radius: 0;
    }

    .download-btn {
        border: 2px solid #ffb606;
        color: #002147;
        border-radius: 24px;
        width: 10rem;
        text-align: center;
        padding-top: 2px;
        padding-bottom: 2px;
        margin-bottom: 16PX;
        font-weight: 500;
    }

    .download-btn:hover {
        color: #002147 !important;
        background-color: #ffb606;
    }

    .year-list ul {
        padding-left: 0px;
    }

    .year-list li label {
        width: 100%;
        cursor: pointer;
    }

    .year-list li:hover {
        background-color: #f1f1f1;
    }

    input[type='radio']:checked:after {
        width: 13px;
        height: 13px;
        border-radius: 15px;
        top: 0px;
        left: 0px;
        position: relative;
        background-color: #000;
        content: '';
        display: inline-block;
        visibility: visible;
        border: 2px solid #000;
    }

    .year_name {
        font-weight: 400;
        padding-left: 5px;
    }

    .year_count {
        display: inline-block;
        float: right;
        font-weight: 500;
    }

    .search-box:focus {
        box-shadow: none !important;
    }
</style>
@section('content')
    {{-- Banner --}}
    @include('frontend.partials.sections.banner_chsr', ['page_title' => $page_title])

    <!-- Section -->
    @include('frontend.partials.sections.search', ['page_title' => $page_title])
    <section id="chsr-research">
        <div class="mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 year-list">
                        <div class="shadow pb-3 mb-5 rounded program-type">
                            <h1 class="text-white text-uppercase fw-bolder py-3 ps-3 fs-5 mb-0 mt-0 common-bg-color rounded"
                                style="width: 100%; border-bottom-left-radius:0 !important; border-bottom-right-radius: 0!important;">
                                Archive
                            </h1>
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
                        {{-- <ul>
                            <h5 class="text-success">Archive</h5>
                            <li class="year" data-year="All">
                                <label for="all"><input type="radio" id="all" name="year" value="All"
                                        checked>
                                    <span class="year_name">All</span>
                                    <span class="year_count">{{ count($infos) }}</span>
                                </label>
                            </li>
                            @foreach ($infos->groupBy('year') as $year => $item)
                                <li class="year" data-year="{{ $year }}">
                                    <label for="{{ $year }}"><input type="radio" id="{{ $year }}"
                                            name="year" value="{{ $year }}"> <span
                                            class="year_name">{{ $year }}</span>
                                        <span class="year_count">{{ count($item) }}</span>
                                    </label>
                                </li>
                            @endforeach
                        </ul> --}}
                    </div>

                    <div class="col-md-8 mb-3" id="research-list">
                        <div class="row">
                            <div class="col-md-12">
                                @foreach ($infos as $key => $info)
                                    <div class="col-md-12 mb-4">
                                        <div class="">
                                            <div class="bg-light shadow p-3 rounded">
                                                @if ($info->research_for == '1')
                                                    <h5 class="badge text-bg-warning fs-6 mb-3">{{ $info->ref_id == '1' ? 'MPhil' : 'PhD'}}</h5>
                                                @endif
                                                <h3 class="fs-5 font-work-sans content-title">
                                                    <a href="{{ route('research', $info->id) }}"
                                                        class="font-work-sans">{{ $info->title }}</a>
                                                </h3>
                                                <p class="fs-7 font-work-sans"><i class="fas fa-calendar-alt"></i>
                                                    {{ date('M d, Y', strtotime($info->date)) }}</p>
                                                {{-- @php
                                                $files = \App\Models\ResearchFile::where('research_id', $info->id)->get();
                                            @endphp
                                            @if (count($files) > 0)
                                                @foreach ($files as $item)
                                                    <a href="{{ asset('upload/journal/' . @$item->file) }}"
                                                        class="btn about-btn px-3 py-1 text-white shadow font-work-sans"
                                                        target="_blank" type="button">Download</a>
                                                @endforeach
                                            @endif --}}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                {{-- <div class="row ">
                                    <div class="col-sm-12 news-pagination" id="research-pagination">
                                        {{ $infos->links() }}
                                    </div>
                                </div> --}}
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
            var targetDiv = $('#chsr-research');
            var offset = 180; // Adjust the offset as needed
            var targetPosition = targetDiv.offset().top - offset;
            $(window).scrollTop(targetPosition);

            var url = document.URL;
            var type = url.substring(url.lastIndexOf('/') + 1);
            // alert(type);
            var year = $(this).data('year');
            $.ajax({
                url: "{{ route('research_by_year_for') }}",
                type: "GET",
                data: {
                    year: year,
                    type: type,
                },
                success: function(data) {
                    $('#research-list').html(data);
                }
            });
        });
    </script>
@endsection
