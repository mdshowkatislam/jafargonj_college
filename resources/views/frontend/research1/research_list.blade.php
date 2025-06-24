{{-- @extends('frontend.landing') --}}
@extends('frontend.layouts.master-landing')

@php
    if($type == 1){
        $page_title = 'Funded Research';
    }else{
        $page_title = 'Research';
    }
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
        list-style-type: none;
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
    {{-- @include('frontend.partials.sections.banner', ['page_title' => $page_title]) --}}
    @include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])

    <!-- Section -->

    <section>
        <div class="my-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 year-list">
                        <ul class="list-group">
                            <li class="list-group-item" style="color:#fff; background: #00c5bf;">
                                <h5 class="text-white">Archive</h5>
                            </li>
                            <li class="year list-group-item" data-year="All">
                                <label for="all"><input type="radio" id="all" name="year" value="All"
                                        checked>
                                    <span class="year_name fs-6 py-2">All</span>
                                    <span class="year_count py-1 px-2 rounded" style="color:#fff; background: #00c5bf;">{{ count($infos) }}</span>
                                </label>
                            </li>
                            @foreach ($infos->groupBy('year') as $year => $item)
                                <li class="year list-group-item" data-year="{{ $year }}">
                                    <label for="{{ $year }}"><input type="radio" id="{{ $year }}"
                                            name="year" value="{{ $year }}"> <span
                                            class="year_name fs-6 py-2">{{ $year }}</span>
                                        <span class="year_count py-1 px-2 rounded" style="color:#fff; background: #00c5bf;">{{ count($item) }}</span>
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- <div class="col-md-1">

                    </div> --}}
                    <div class="col-md-8" id="research-list">
                        @foreach ($infos as $key => $info)
                            <div class="row pb-3">
                                {{-- <div class="col-md-4 card card-background">
                                    <img src="{{ asset('upload/journal/' . @$info->attachment1) }}"
                                        onerror="this.onerror=null;this.src='{{ asset('upload/no-image.png') }}';"
                                        height="315px" class=" shadow-1-strong mb-4 over-img" alt="Student Life" />
                                </div> --}}
                                <div class="col-md-12 card card-background pt-3">
                                    <h4 class="content-title"><a href="#"
                                            style="text-decoration: none">{{ $info->title }}</a></h4>
                                    {{-- <h6 class="fs-6"><span class="fw-bold">Chief Patron:</span> {{ @$info->authors }}
                                    </h6>
                                    <h6 class="fs-6"><span class="fw-bold">Editor:</span> {{ @$info->editor }}</h6>
                                    <h6 class="fs-6"><span class="fw-bold">Issn:</span> {{ @$info->issn }}</h6>
                                    <h6 class="fs-6"><span class="fw-bold">Volume:</span> {{ @$info->volume }}</h6>
                                    <h6 class="fs-6"><span class="fw-bold">Issue:</span> {{ @$info->issue }}</h6> --}}
                                    <p class="fs-7 font-work-sans"><i class="fas fa-calendar-alt"></i>
                                        {{ date('M d, Y', strtotime($info->date)) }}</p>

                                    <a href="{{ route('research.details',['id'=>$info->id,'url'=>@$url]) }}"
                                        class="download-btn font-work-sans" type="button">See More</a>
                                    {{-- <a href="{{ route('research_details', [@$info->id, 'issn' => @$info->issn, 'vol' => @$info->volume, 'issue' => @$info->issue]) }}"
                                        class="download-btn font-work-sans" type="button">See More</a> --}}
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).on('click', '.year', function() {
            var url = document.URL;
            var type = url.substring(url.lastIndexOf('/') + 1);
            // alert(type);
            var year = $(this).data('year');
            $.ajax({
                url: "{{ route('research_by_year') }}",
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
