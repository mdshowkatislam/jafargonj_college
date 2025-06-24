@extends('frontend/partials/iqac_layout')

@php
    if (@$iqac_about->type == 1) {
        $page_title = 'About';
    } elseif (@$iqac_about->type == 2) {
        $page_title = 'Story';
    } elseif (@$iqac_about->type == 3) {
        $page_title = 'Mission';
    } elseif (@$iqac_about->type == 4) {
        $page_title = 'Vision';
    } elseif (@$iqac_about->type == 5) {
        $page_title = 'Objective';
    } elseif (@$iqac_about->type == 6) {
        $page_title = 'Function';
    } else {
        $page_title = $message->title_first_part ?? 'Message From Director';
    }
@endphp
@section('title')
    {{ $page_title }}
@endsection
@section('content')
    @include('frontend.partials.sections.banner_chsr', ['page_title' => $page_title])

    <section class="container">
        <div class="container profile">
            <div class="row my-5">
                <div class="col-12 tem-3-profile-info ">
                    <div class="bg-light p-3 rounded shadow">
                        <h2 class="fs-3 fw-bold border-bottom pb-3 mb-3 common-font-color">
                            @if (@$iqac_about->type == 1)
                                <td>About</td>
                            @elseif (@$iqac_about->type == 2)
                                <td>Story</td>
                            @elseif (@$iqac_about->type == 3)
                                <td>Mission</td>
                            @elseif (@$iqac_about->type == 4)
                                <td>Vision</td>
                            @elseif (@$iqac_about->type == 5)
                                <td>Objective</td>
                            @elseif (@$iqac_about->type == 6)
                                <td>Function</td>
                            @elseif(@$message)
                                <td>{{ @$message->title_first_part ?? 'Message From Director' }}</td>
                            @endif
                        </h2>
                        <div class="text-justify fs-6">
                            @if (@$message)
                                {!! @$message->short_description !!}
                            @elseif(@$iqac_about)
                                {!! @$iqac_about->description !!}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
