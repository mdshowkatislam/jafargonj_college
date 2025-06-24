<!-- ===== slider section start ===== -->
{{-- @extends('frontend.landing') --}}
@extends('frontend.layouts.master-landing')

@php
    $page_title = 'Academic Calender';
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
        border: 2px solid #00c5bf;
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
        color: #ffffff !important;
        background-color: #00c5bf;
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
    .program-text label h1:hover {
        color: #00c5bf;
        padding-left: 5px;
        cursor: pointer;
    }
    .program-text label h1 {
        transition: all 0.2s linear;
        -webkit-transition: all 0.2s linear;
        -moz-transition: all 0.2s linear;
        -o-transition: all 0.2s linear;
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
    .badge {
        background-color: #00c5bf;
        color: #ffffff;
    }
</style>
@section('content')
    {{-- @include('frontend.partials.sections.banner', ['page_title' => $page_title]) --}}
    @include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])
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
        <section class="my-5">
            <div class="academic-details">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 year-list">
                            <div class="shadow pb-3  rounded program-type ">
                                <h1 class="text-white text-uppercase fw-bolder py-3 ps-3 fs-5 mb-0 mt-0 common-bg-color"
                                    style="width: 100%; ">Archive</h1>
                                <div class="program-text py-3 mx-3 border-bottom year" data-year="All">
                                    <label for="all" class="d-flex justify-content-between align-items-center">
                                        <input type="radio" value="All" name="year"
                                            id="all" checked class="d-none">
                                        <h1 class="fs-6 fw-bold my-auto">
                                            All &nbsp;
                                        </h1>
                                        <span class="badge text-bg-warning fs-6">{{ count($infos) }}</span>
                                    </label>
                                </div>
                                @foreach ($infos->groupBy('year') as $year => $item)
                                    <div class="program-text py-3 mx-3 border-bottom year" data-year="All">
                                        <label for="{{ $year }}" class="d-flex justify-content-between align-items-center">
                                            <input type="radio" value="{{ $year }}" name="year"
                                                id="{{ $year }}" class="d-none">
                                            <h1 class="fs-6 fw-bold my-auto">
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

                        <div class="col-md-8" id="academic-calender-list">
                            <div class="row">
                                @foreach ($infos as $key => $info)
                                    <div class="col-lg-12">
                                        <div class="p-3 card card-background rounded shadow" style="padding-top: 10px;margin-bottom: 15px;">
                                            <h4 class="content-title font-work-sans"><a href="#"
                                                    class="font-work-sans">{{ $info->title }}</a></h4>
                                            <p class="fs-7 font-work-sans"><i class="fas fa-calendar-alt"></i>
                                                {{ date('M d, Y', strtotime($info->publish_date)) }}</p>
                                            <a href="{{ asset('upload/media/' . $info->file) }}" target="_blank"
                                                class="download-btn font-work-sans" type="button">Download</a>
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
                url: "{{ route('academic_calender_by_year') }}",
                type: "GET",
                data: {
                    year: year
                },
                success: function(data) {
                    $('#academic-calender-list').html(data);
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
