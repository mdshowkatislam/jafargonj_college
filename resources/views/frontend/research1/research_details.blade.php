@extends('frontend.landing')

@php
    $page_title = 'BUP Journal';
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
    @include('frontend.partials.sections.banner', ['page_title' => $page_title])

    <!-- Section -->

    <section>
        <div class="my-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12" id="journal-list">
                        <div class="row pb-3">
                            <div class="col-md-4">
                                <img src="{{ asset('upload/journal/' . @$info->attachment1) }}"
                                    onerror="this.onerror=null;this.src='{{ asset('upload/no-image.png') }}';"
                                    class=" shadow-1-strong mb-4 over-img" alt="Student Life" />
                            </div>
                            <div class="col-md-8 pt-3 ps-5">
                                <h4 class="content-title"><a href="#"
                                        style="text-decoration: none">{{ $info->paper_title }}</a></h4>
                                <h6 class="fs-6"><span class="fw-bold">Chief Patron:</span> {{ @$info->authors }}</h6>
                                <h6 class="fs-6"><span class="fw-bold">Editor:</span> {{ @$info->editor }}</h6>
                                <h6 class="fs-6"><span class="fw-bold">Issn:</span> {{ @$info->issn }}</h6>
                                <h6 class="fs-6"><span class="fw-bold">Volume:</span> {{ @$info->volume }}</h6>
                                <h6 class="fs-6"><span class="fw-bold">Issue:</span> {{ @$info->issue }}</h6>
                                <p class="fs-7 font-work-sans"><i class="fas fa-calendar-alt"></i>
                                    {{ date('M d, Y', strtotime($info->date)) }}</p>

                                <a target="_blank" href="{{ asset('upload/journal/' . @$info->attachment2) }}"
                                    class="download-btn font-work-sans" type="button">Download</a>
                                <br><br>
                                @if (count($articles) > 0)
                                <div class="card card-outline">
                                    <div class="card-body">
                                        <h6 class="fs-6 pb-2"><span class="fw-bold">Articles: </span></h6>

                                        <table id="dataTable" class="table table-sm table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="font-work-sans">SL</th>
                                                    <th class="font-work-sans">Article Title</th>
                                                    <th class="font-work-sans">Author</th>
                                                    <th class="font-work-sans">Co Author</th>
                                                    {{-- <th>Date</th> --}}
                                                    <th class="font-work-sans" width="5%">Attachment</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($articles as $item)
                                                    <tr>
                                                        <td class="font-work-sans">{{ $loop->iteration }}</td>
                                                        <td class="font-work-sans">{{ @$item->title }}</td>
                                                        <td class="font-work-sans">{{ @$item->author }}</td>
                                                        <td class="font-work-sans">{{ @$item->co_author }}</td>
                                                        {{-- <td>{{ date('M d, Y', strtotime(@$item->date) ) }}</td> --}}
                                                        <td class="font-work-sans">
                                                            @if (@$item->attachment)
                                                                <a href="{{ asset('upload/article/' . @$item->attachment) }}"
                                                                    download=""><i class="fas fa-download"></i></a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
