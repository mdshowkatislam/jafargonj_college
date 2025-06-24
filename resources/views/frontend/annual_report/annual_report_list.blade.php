<!-- ===== slider section start ===== -->
@extends('frontend.landing')
@php
    $page_title = 'Annual Report';
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
    @include('frontend.partials.sections.banner', ['page_title' => $page_title])
    <!-- Banner -->

    {{-- <section>
        <div class="container">
            <div class="row mb-3 mt-3" style="height:200px; background-color: #f1f1f1">
                <div class="col-md-4 d-block my-auto justify-content-center align-items-center">
                    <h3 class="text-uppercase fs-4">Brochure & Newsletter SEARCH</h3>
                    <p>Use the filters below to find brochure & newsletter!</p>
                </div>
                <div class="col-md-8 my-auto justify-content-center">
                    <div class="input-group" style="height : 60px;">
                        <input type="search" class="form-control search-box" placeholder="Enter Keywords ..."
                            aria-label="Search" id="input-field" aria-describedby="search-addon"
                            style="border-radius: 0; font-size: 20px; background-color: #F2CD00; border: none;" />
                        <span class="input-group-text" id="search-addon"
                            style="width : 50px; cursor: pointer; border-radius: 0; background-color: #F2CD00">
                            <i class="fas fa-search"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <main>
        <section class="mt-5 mb-3">
            <div class="academic-details ">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 year-list">
                            <div class="shadow pb-3 mb-5 rounded program-type ">
                                <h1 class="text-white text-uppercase fw-bolder py-3 ps-3 fs-5 mb-0 mt-0 common-bg-color"
                                    style="width: 100%; ">Archive</h1>
                                <div class="program-text py-3 mx-3 border-bottom year" data-year="All">
                                    <label for="all" class="d-flex justify-content-between align-items-center">
                                        <input type="radio" id="all" name="year" value="All">
                                        <h1 class="fs-6 fw-bold ">
                                            All &nbsp;
                                        </h1>
                                        <span class="badge text-bg-warning fs-6">{{ count($infos) }}</span>
                                    </label>
                                </div>
                                @foreach ($infos->groupBy('year') as $year => $item)
                                    <div class="program-text py-3 mx-3 border-bottom year" data-year="{{ $year }}">
                                        <label for="{{ $year }}"
                                            class="d-flex justify-content-between align-items-center">
                                            <input type="radio" id="{{ $year }}" name="year"
                                                value="{{ $year }}">
                                            <h1 class="fs-6 fw-bold ">
                                                {{ $year }} &nbsp;
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

                        <div class="col-lg-8" id="annual-report-list">
                            <div class="row">
                                @foreach ($infos as $key => $info)
                                    <div class="col-lg-12 mb-4">
                                        <div class="bg-light shadow p-3 rounded" style="">
                                            <h3 class="fs-5 font-work-sans">
                                                <a href="#"
                                                    class="font-work-sans">{{ $info->title }}</a>
                                            </h3>
                                            <p class="fs-7 font-work-sans"><i class="fas fa-calendar-alt"></i>
                                                {{ date('M d, Y', strtotime($info->publish_date)) }}</p>
                                            <a href="{{ asset('storage/app/media/form/' . @$info->file) }}"
                                                class="btn about-btn px-3 py-1 text-white shadow font-work-sans" target="_blank"
                                                type="button">Download</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('script')
    <script>
        $(document).on('click', '.year', function() {
            // $('#affiliate-list').html('');
            var year = $(this).data('year');
            $.ajax({
                url: "{{ route('annual_report_by_year') }}",
                type: "GET",
                data: {
                    year: year
                },
                success: function(data) {
                    $('#annual-report-list').html(data);
                }
            });
        });
    </script>

    <script>
        const searchInput = document.getElementById('input-field');
        searchInput.addEventListener('input', () => {
            const dataList = document.querySelectorAll('.content-title');
            const searchTerm = searchInput.value;
            for (let i = 0; i < dataList.length; i++) {
                const itemText = dataList[i].textContent;
                if ((itemText.toLowerCase()).includes((searchTerm.toLowerCase()))) {
                    const result = [...itemText.matchAll(new RegExp(searchTerm, 'gi'))];
                    var textsplit = itemText.split(new RegExp(searchTerm, 'gi'));
                    var text = '';
                    const textsplit_length = textsplit.length;
                    for (let i = 0; i < textsplit_length; i++) {
                        if ((textsplit_length - 1) == i) {
                            text += textsplit[i];
                        } else {
                            text += textsplit[i] + "<span class='text-danger text-bold'>" + result[i]['0'] +
                                "</span>";
                        }
                    }
                    dataList[i].childNodes[0].innerHTML = text;
                    dataList[i].parentNode.style.display = 'block';
                } else {
                    dataList[i].parentNode.style.display = 'none';
                }
            }
        });
    </script>
@endsection
