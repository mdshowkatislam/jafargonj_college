@extends('frontend.layouts.master-landing')
@php
$page_title = 'Career';
@endphp
@section('title')
{{ $page_title }}
@endsection
@section('content')

{{-- @include('frontend.partials.sections.banner-cover5', ['page_title' => $page_title]) --}}

@include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])


<section class="mt-5 d-none">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-secondary text-white fs-4 fw-bolder py-4 d-inline-block">Career Opportunities</div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="my-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header job_header">Archive</div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <button type="button" id="show_jobs" class="btn btn-outline-secondary">Job Circular <span class="badge btn-theme text-dark">{{@$jobs_count}}</span></button>
                        </li>
                        <li class="list-group-item">
                            <button type="button" id="show_forms" class="btn btn-outline-secondary">Forms <span class="badge btn-theme text-dark">{{@$forms_count}}</span></button>
                        </li>
                        <!-- <li class="list-group-item">
                            <button type="button" id="show_results" class="btn btn-outline-secondary">Results <span class="badge btn-theme text-dark">{{@$results_count}}</span></button>
                        </li> -->
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card p-2 d-block" id="jobs-card">
                    <!-- Tabs Navigation -->
                    <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-show-all-tab" data-bs-toggle="pill" data-bs-target="#pills-show-all" type="button" role="tab" aria-controls="pills-show-all" aria-selected="true">
                                Show All
                            </button>
                        </li>
                        @foreach($jobCategories as $index => $category)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-{{ $category->slug }}-tab" data-bs-toggle="pill" data-bs-target="#pills-{{ $category->slug }}" type="button" role="tab" aria-controls="pills-{{ $category->slug }}" aria-selected="false">
                                {{ $category->title }}
                            </button>
                        </li>
                        @endforeach
                    </ul>

                    <!-- Tabs Content -->
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-show-all" role="tabpanel" aria-labelledby="pills-show-all-tab">
                            <div class="row">
                                @foreach($jobCategories as $category)
                                @foreach($category->JobPosts as $notice)
                                <div class="col-lg-4 col-md-6 mt-2">
                                    <div class="card mb-3 box-shadow">
                                        <div style="height:100px; padding: 0px 5px;" class="text-center">
                                            <h5 style="font-size: 18px;" class="mt-3">{{ $notice->title }}</h5>
                                        </div>
                                        <div style="height:130px;" class="card-body">
                                            <span class="card-text icon"><i class="fa-solid fa-user"></i> {{ucfirst(@$category->title)}} : {{@$notice->payscale}}</span><br>
                                            <span class="card-text icon"><i class="fa-solid fa-clock"></i> Posted on : {{ \Carbon\Carbon::parse(@$notice->date)->format('M d Y') }}</span><br>
                                            <span class="card-text icon"><i class="fa-solid fa-clock"></i> Deadline : {{ \Carbon\Carbon::parse(@$notice->deadline)->format('M d Y') }}</span><br>

                                            <span class="card-text icon"><i class="fa-solid fa-calendar-check"></i>Job Type: {{ $notice->job_type }}</span></br>
                                            
                                        </div>
                                        <div class="details_btn d-flex justify-content-center mb-3 mt-4">
                                                <a target="_blank" href="{{route('career_details',$notice->id)}}" class="btn btn-theme btn-sm">View Details</a>
                                        </div>

                                    </div>
                                </div>
                                @endforeach
                                @endforeach
                            </div>
                        </div>
                        @foreach($jobCategories as $index => $category)
                        <div class="tab-pane fade" id="pills-{{ $category->slug }}" role="tabpanel" aria-labelledby="pills-{{ $category->slug }}-tab">
                            <div class="row">
                                @foreach($category->JobPosts as $notice)
                                <div class="col-4 mt-2">
                                    <div class="card mb-3 box-shadow">
                                        <div style="height:100px; padding: 0px 5px;" class="text-center">
                                        <h5 style="font-size: 18px;" class="mt-3">{{ $notice->title }}</h5>
                                        </div>
                                        <div style="height:130px;" class="card-body">
                                            <span class="card-text icon"><i class="fa-solid fa-user"></i> {{ucfirst(@$category->title)}} : {{@$notice->payscale}}</span><br>
                                            <span class="card-text icon"><i class="fa-solid fa-clock"></i> Posted on : {{ \Carbon\Carbon::parse(@$notice->date)->format('M d Y') }}</span><br>
                                            <span class="card-text icon"><i class="fa-solid fa-clock"></i> Deadline : {{ \Carbon\Carbon::parse(@$notice->deadline)->format('M d Y') }}</span><br>

                                            <span class="card-text icon"><i class="fa-solid fa-calendar-check"></i>Job Type: {{ $notice->job_type }}</span></br>
                                            
                                        </div>
                                        <div class="details_btn d-flex justify-content-center mb-3 mt-4">
                                                <a target="_blank" href="{{route('career_details',$notice->id)}}" class="btn btn-theme btn-sm">View Details</a>
                                        </div>

                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="card d-none" id="forms-card">
                    <div class="card-body">
                        @foreach ($career_forms as $career_form)
                        <div class="form_shadow p-3 rounded mt-2">
                            <h3 class="fs-5 font-work-sans">
                                {{@$career_form->title}}
                            </h3>

                            @if(isset($career_form->attachment))
                            <a class="btn btn-sm btn-outline-success" target="_blank" href="{{ asset('upload/career/' . $career_form->attachment) }}">Download</a><br>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="card d-none" id="results-card">
                    <div class="card-body">
                        @foreach ($job_results as $job_result)
                        <div style="border: 1px solid #bebebe;" class="shadow-sm p-3 mb-5 bg-body rounded">
                            <h3 class="fs-5">
                                {{@$job_result->career->title}}
                            </h3>
                            <div class="">
                            {{-- <span>Published Date : {{ \Carbon\Carbon::parse(@$job_result->publish_date)->format('M d Y') }}</span> --}}
                            @if(isset($job_result->attachment))
                                <a class="btn btn-sm btn-outline-success" target="_blank" href="{{ asset('upload/career/' . $job_result->attachment) }}">Download</a><br>
                                {{-- <a href="{{ asset('upload/career/' . $job_result->attachment) }}" class="btn btn-sm_icon" target="_blank" type="button"><i class="fa-solid fa-file fa-lg"></i></a> --}}
                            @endif
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

@push('styles')
<style>
    .form_shadow{
        box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, .15) !important;
    }
    .list-group-item {
        padding: 0;
    }

    .list-group-item button {
        display: flex;
        justify-content: space-between;
        align-items: center;
        height: 60px;
        padding: 1rem;
        color: inherit;
        width: 100%;
        border: none;
    }

    .job_header {
        background-color: #56CCC8;
        padding: 20px;
        color: white;
        font-weight: 700;
        font-size: 20px;
    }

    span.icon i {
        margin-right: 12px;
    }

    .nav-pills .nav-link {
        border: 1px solid transparent;
        color: black;
    }

    .nav-pills .nav-link.active {
        border-color: #00c5bf;
        background-color: #00c5bf;
    }

    .nav-pills .nav-link:not(.active) {
        border-color: gray;
    }

    .nav-pills .nav-item {
        margin: 0px 6px;
        line-height: 30px;
    }

    .btn-sm_icon {
        padding: 3px 10px;
        font-size: 12px;
        color: var(--heading_color);
    }
</style>
@endpush

@push('scripts')
<script>
    $(document).ready(function() {

        $('#show_jobs').click(function(event) {
            event.preventDefault();
            $('#jobs-card').removeClass('d-none').addClass('d-block');
            $('#results-card').removeClass('d-block').addClass('d-none');
            $('#forms-card').removeClass('d-block').addClass('d-none');
        });

        $('#show_forms').click(function(event) {
            event.preventDefault();
            $('#jobs-card').removeClass('d-block').addClass('d-none');
            $('#results-card').removeClass('d-block').addClass('d-none');
            $('#forms-card').removeClass('d-none').addClass('d-block');
        });

        $('#show_results').click(function(event) {
            event.preventDefault();
            $('#jobs-card').removeClass('d-block').addClass('d-none');
            $('#forms-card').removeClass('d-block').addClass('d-none');
            $('#results-card').removeClass('d-none').addClass('d-block');
        });
    });
</script>
@endpush