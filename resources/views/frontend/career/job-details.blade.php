@extends('frontend.layouts.master-landing')

@section('title')
{{ $page_title }}
@endsection
@section('content')


{{-- @include('frontend.partials.sections.banner-cover5', ['page_title' => $page_title]) --}}

@include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])


<section class="mt-5">
    <div class="container">
        <div class="row">
            <div style="width: 98%;margin: 0 auto;" class="my-2 bg-info text-white">
                <h3 class="title-text my-font text-white p-2" style="font-size: 20px; margin-bottom:0; line-height:30px">Job Title : {{@$job_details->title}}</h3>
            </div>

        </div>
        <span>Category: {{ucfirst(@$job_details->jobCategory->title)}}</span> <span style="margin-left:20px">Published: {{ \Carbon\Carbon::parse(@$career_notice->date)->format('M d Y') }}</span>

        <!-- @if ($job_details->mode_status == 0)
        <span class="card-text text-danger float-end">Application Offline</span>
        @else
        <span class="card-text text-danger float-end">Application Online</span>
        @endif -->
        <div class="border-bottom mt-2 mb-2"></div>
    </div>
</section>

<section class="my-5">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <div class="card p-2">
                    <div class="card-header">
                        Job Summary
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="details_box d-flex align-items-center">
                                    <span><i class="fa-solid fa-building fa-xl"></i></span>
                                    <div class="ps-3">
    Office: {{ ucfirst(optional(@$job_details->jobDepartment)->name ?? @$job_details->jobOffice->name ?? @$job_details->jobHall->name ?? @$job_details->jobClub->name) }}
</div>
                                </div>

                                <div class="details_box">
                                    <span><i class="fa-solid fa-stopwatch fa-xl"></i></span>
                                    <span style="margin-left:10px">Deadline : {{ \Carbon\Carbon::parse(@$job_details->deadline)->format('M d Y') }}</span>
                                </div>

                            </div>

                            <div class="col-6">
                                <div class="details_box d-flex align-items-center">
                                    <span><i class="fa-solid fa-hand-holding-dollar fa-xl"></i></span>
                                    <div class="ps-3">
                                        Pay Scale : {{@$job_details->payscale}}
                                    </div>
                                    
                                </div>
                                <div class="details_box">
                                    <span><i class="fa-solid fa-building-lock fa-xl"></i></span>
                                    <span style="margin-left:10px">Job Type : {{@$job_details->job_type}}</span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div> <!-- card end -->

                <div class="mt-4">
                    <div class="attachment-box">
                        <h4 class="fw-bold">Download Circular Attachments</h4>
                        @if(isset($job_details->attachment))
                        <a class="link-danger" target="_blank" href="{{ asset('upload/career/' . $job_details->attachment) }}">Click here to download</a><br>
                        @endif
                    </div>
                    <div class="attachment-box mt-2">
                        @if(isset($job_details->attachment2))
                        <a class="link-danger" target="_blank" href="{{ asset('upload/career/' . $job_details->attachment2) }}">Click here to download</a>
                        @endif
                    </div>
                </div>

                <div class="mt-3">
                    <div class="jobdetails-box mt-2">
                        @if(isset($job_details->education))
                        <h4>Education</h4>
                        {{@$job_details->education}}
                        @else

                        @endif

                    </div>
                    <div class="jobdetails-box mt-2">
                        @if(isset($job_details->experience))
                        <h4>Experience</h4>
                        {{@$job_details->experience}}
                        @else

                        @endif
                    </div>
                </div>

                <div class="mt-3">
                    <div class="jobdetails-box mt-2">
                        @if(isset($job_details->job_details))
                        <h4>Job Details</h4>
                        {!!@$job_details->job_details!!}
                        @else

                        @endif
                    </div>
                </div>

                <div class="mt-2">
                    <div class="jobdetails-box mt-2">
                        @if(isset($job_details->responsibilities_context))
                        <h4>Responsibilities & Context</h4>
                        {!!@$job_details->responsibilities_context!!}
                        @else

                        @endif
                    </div>
                </div>

                <div class="mt-2">
                    <div class="jobdetails-box mt-2">
                        @if(isset($job_details->compensation_benefits))
                        <h4>Compensation Benefits</h4>
                        {!!@$job_details->compensation_benefits!!}
                        @else

                        @endif
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card p-2">
                    <div class="card-header">
                        Similar jobs
                    </div>

                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            @foreach ($all_jobs as $all_job)
                            <li class="list-group-item jd_list">
                                <a style="margin-bottom:12px" class="text-primary" href="{{route('career_details',@$all_job->id)}}">{{@$all_job->title}}</a><br>
                                <div class="mt-2">
                                    <span class="fw-light">{{@$all_job->job_type}}</span>
                                    <span class="float-end fw-light">{{@$all_job->deadline}}</span>
                                </div>

                            </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>


@endsection

@push('styles')
<style>
    .details_box {
        height: 80px;
    }

    .details_box i {}

    .details_box p {}
</style>
@endpush

@push('scripts')
<script>

</script>
@endpush