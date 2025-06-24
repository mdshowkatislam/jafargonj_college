@extends('frontend/partials/iqac_layout')

@php
    $page_title = 'Committee';
@endphp

@section('title')
    {{ $page_title }}
@endsection

@section('content')
    @include('frontend.partials.sections.banner_chsr', ['page_title' => $page_title])

    @if (count($QACMembers) > 0)
        <section class="my-5">
            <div class="container">
                <div class="d-flex justify-content-between align-items-end  chsr-research-title">
                    <h1 class="text-uppercase  mb-0 home-content-heading">
                        Quality Assurance Committee (QAC)
                    </h1>
                </div>
                <div class="position-relative w-100 common-bg-color mt-1 " style="height: 4px;"></div>
                <div class="row ">
                    @foreach ($QACMembers->groupBy('designation') as $designationId => $members)
                        @php
                            $designation = \App\Models\Designation::find($designationId);
                        @endphp
                        <div class="">
                            <h3 class="text-uppercase fs-6 fw-bold py-3 border-bottom">{{ $designation->name ?? 'Members' }}</h3>
                        </div>
                        @foreach ($members as $member)
                            @include('frontend.iqac.iqac_profile')
                        @endforeach
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if (count($FQACMembers) > 0)
        <section class="my-5">
            <div class="container">
                <div class="d-flex justify-content-between align-items-end  chsr-research-title">
                    <h1 class="text-uppercase  mb-0 home-content-heading">
                        Faculty Quality Assurance Committee (FQAC)
                    </h1>
                </div>
                <div class="position-relative w-100 common-bg-color mt-1 " style="height: 4px;"></div>
                <div class="row ">
                    @foreach ($FQACMembers->groupBy('designation') as $designationId => $members)
                        @php
                            $designation = \App\Models\Designation::find($designationId);
                        @endphp
                        <div class="">
                            <h3 class="text-uppercase fs-6 fw-bold py-3 border-bottom">{{ $designation->name ?? 'Members' }}</h3>
                        </div>
                        @foreach ($members as $member)
                            @include('frontend.iqac.iqac_profile')
                        @endforeach
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if (count($PSACMembers) > 0)
        <section class="my-5">
            <div class="container">
                <div class="d-flex justify-content-between align-items-end  chsr-research-title">
                    <h1 class="text-uppercase  mb-0 home-content-heading">
                        Programme Self-Assessment Committee (PSAC)
                    </h1>
                </div>
                <div class="position-relative w-100 common-bg-color mt-1 " style="height: 4px;"></div>
                <div class="row ">
                    @foreach ($PSACMembers->groupBy('designation') as $designationId => $members)
                        @php
                            $designation = \App\Models\Designation::find($designationId);
                        @endphp
                        <div class="">
                            <h3 class="text-uppercase fs-6 fw-bold py-3 border-bottom">{{ $designation->name ?? 'Members' }}</h3>
                        </div>
                        @foreach ($members as $member)
                            @include('frontend.iqac.iqac_profile')
                        @endforeach
                    @endforeach
                </div>
            </div>
        </section>
    @endif
