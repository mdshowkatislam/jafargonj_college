
@extends('frontend.department.tamplate_four.partials.main-second')

@php
    $page_title = "Program"
@endphp
@section('title'){{$page_title}} @endsection



@section('content')
<div class="faculty-profile-banner d-flex justify-content-center align-items-center" style=" background-image: url( {{ @$banner->image ? asset('upload/banner/' . $banner->image) : asset('frontend/assets/img/bup/banner.jpg') }} ) ">
        <h1 class="text-white font-poppins">{{ $page_title }}</h1>
    </div>
    <!-- Hero Title -->
    @if (count($dept_programs) > 0)
    <section class="container my-5">
        {{-- <div class="d-flex justify-content-between align-items-end">
            <h1 class="text-uppercase mb-0 home-content-heading">
                Programs
            </h1>
            <a href="" class="text-uppercase text-decoration-none fw-bold common-font-color">All</a>
        </div>
        <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;">
        </div> --}}
        <div class="row pt-3">
            @foreach ($program_cat as $item)
                @php
                    $programs = \App\Models\Program::where('department_id', $department->id)
                        ->where('program_category_id', $item->id)
                        ->where('status', 1)
                        ->get();
                @endphp
                @if (count($programs) > 0)
                    <div class="col-lg-6 pb-2">
                        <div class="card program-cat-card border-0">
                            <div class="card-title py-4 fw-bolder">
                                {{ $item->program_category }}
                            </div>
                            <div class="card-body p-0">
                                <div class="list-group border-0 rounded-0">
                                    @foreach ($programs as $program)
                                        <a href="{{ route('academics.academics_details', $program->id) }}"
                                            class="list-group-item list-group-item-action d-flex gap-3 py-3 align-items-center"
                                            aria-current="true">
                                            <div class="program_icon">
                                                <i class="fas fa-graduation-cap"></i>
                                            </div>
                                            <div class="d-flex">
                                                <div>
                                                    <h6 class="mb-0 hover-on-text">
                                                        {{ $program->program_title }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </section>
@endif
    
@endsection
