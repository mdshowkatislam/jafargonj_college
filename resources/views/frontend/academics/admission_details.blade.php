@extends('frontend.landing')

@php
    $page_title = $info->program_title;
@endphp
@section('title')
    {{ $page_title }}
@endsection
<style>
    #description {
        border: 2px solid #00c5bf;
        border-radius: 32px;
        font-size: 18px;
        line-height: 18px;
        padding: 18px 40px;
        color: #292b2c;
        margin-right: 30px;
        -webkit-transition: all 200ms linear !important;
        -moz-transition: all 200ms linear !important;
        -ms-transition: all 200ms linear !important;
        -o-transition: all 200ms linear !important;
        transition: all 200ms linear !important;
    }

    #apply_now {
        border-radius: 32px;
        font-size: 18px;
        line-height: 18px;
        padding: 18px 40px;
        margin-right: 30px;
        background-color: #00c5bf;
        color: white;
        -webkit-transition: all 200ms linear !important;
        -moz-transition: all 200ms linear !important;
        -ms-transition: all 200ms linear !important;
        -o-transition: all 200ms linear !important;
        transition: all 200ms linear !important;
    }
</style>

@section('content')
    {{-- @include('frontend.partials.sections.banner', ['page_title' => $page_title]) --}}

    @include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])

    <section>
        <div class="academic-details">
            <div class="container">
                <div class="row my-4 align-items-center">
                    <div class="col-7">
                        <div class="card bg-light border-0">
                            <div class="card-body">
                                <h2 class="fs-3 fw-bold border-bottom pb-3 mb-3 common-font-color">Admission Criteria</h2>
                                <h3 class="fs-5">{{ $info->program_title }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="mt-4 text-center">
                            <a href="{{ route('academics.academics_details', $info->id) }}" class="font-work-sans"
                                 id="description" style="">Description</a>
                            @if ($info->program_category_id == 1)
                                <a href="https://admission.bup.edu.bd/Admission/Candidate/SelectProgramV3?ecat=4"
                                    class="font-work-sans" target="_blank" id="apply_now">Apply now</a>
                            @elseif ($info->program_category_id == 2)
                                <a href="https://admission.bup.edu.bd/Admission/Candidate/SelectProgram?ecat=6"
                                    class="font-work-sans" target="_blank" id="apply_now">Apply now</a>
                            @elseif ($info->program_category_id == 3)
                                <a href="https://admission.bup.edu.bd/Admission/Candidate/SelectProgramPhd"
                                    class="font-work-sans" target="_blank" id="apply_now">Apply now</a>
                            @else
                                <a href="https://admission.bup.edu.bd/Admission/Home" class="font-work-sans" target="_blank"
                                    id="apply_now">Apply now</a>
                            @endif
                        </div>
                    </div>
                </div>
                @if ($info->admission_criteria)
                <div class="mb-4 bg-light rounded p-3">
                    {!! $info->admission_criteria !!}
                </div>
                @endif
                
            </div>

    </section>
@endsection
