@extends('frontend.layouts.master-landing')
@php
$page_title = 'University at a Glance';
@endphp
@section('title')
{{ $page_title }}
@endsection
@section('content')

<style>
    .accordion-button{
        padding: 10px 15px;
    }
</style>

@include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])

<section>
    <div class="mt-4 mb-3">
        <div class="container">
            <div class="row">
                <div class="col-md-9 mx-auto">
                {{-- @dd($at_a_glance) --}}
                    <div class="accordion mb-2" id="accordionExample1">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                @php
                                    $faculty = App\Models\Faculty::all()->count();
                                @endphp
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1"
                                    aria-expanded="false" aria-controls="collapse1">
                                    Faculties
                                </button>
                            </h2>
                            <div id="collapse1" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
                                <div class="accordion-body">
                                    {{-- Faculties: {{$at_a_glance->faculty_member_number ?? ''}} --}}
                                    Faculties: {{$faculty}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion mb-2" id="accordionExample2">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                @php
                                    $departments = App\Models\Department::all()->count();
                                @endphp
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2"
                                    aria-expanded="false" aria-controls="collapse2">
                                    Departments
                                </button>
                            </h2>
                            <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#accordionExample2">
                                <div class="accordion-body">
                                    Departments: {{$at_a_glance->departments ?? $departments}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion mb-2" id="accordionExample3">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                @php
                                    $affiliations = App\Models\Affiliation::all()->count();
                                @endphp
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3"
                                    aria-expanded="false" aria-controls="collapse3">
                                    Affiliated College/Institute
                                </button>
                            </h2>
                            <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#accordionExample3">
                                <div class="accordion-body">
                                    Affiliated College/Institute: {{$at_a_glance->phd_number ?? $affiliations}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion mb-2" id="accordionExample4">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                @php
                                    $teacher = App\Models\PersonnelsToFaculty::all()->count();
                                @endphp
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse9"
                                    aria-expanded="false" aria-controls="collapse9">
                                    Teachers
                                </button>
                            </h2>
                            <div id="collapse9" class="accordion-collapse collapse" data-bs-parent="#accordionExample4">
                                <div class="accordion-body">
                                    Teachers: {{ $at_a_glance->faculty_member_number ?? $teacher }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion mb-2" id="accordionExample5">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                @php
                                    $offices = App\Models\Office::all()->count();
                                @endphp
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4"
                                    aria-expanded="false" aria-controls="collapse4">
                                    Offices
                                </button>
                            </h2>
                            <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#accordionExample5">
                                <div class="accordion-body">
                                    Offices: {{$at_a_glance->offices ?? $offices}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion mb-2" id="accordionExample6">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5"
                                    aria-expanded="false" aria-controls="collapse5">
                                    Officer Number
                                </button>
                            </h2>
                            <div id="collapse5" class="accordion-collapse collapse" data-bs-parent="#accordionExample6">
                                <div class="accordion-body">
                                    Officer Number: {{$at_a_glance->officer_number ?? ''}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion mb-2" id="accordionExample7">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6"
                                    aria-expanded="false" aria-controls="collapse6">
                                    Student Number
                                </button>
                            </h2>
                            <div id="collapse6" class="accordion-collapse collapse" data-bs-parent="#accordionExample7">
                                <div class="accordion-body">
                                    Student Number: {{$at_a_glance->student_number ?? ''}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion mb-2" id="accordionExample8">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse7"
                                    aria-expanded="false" aria-controls="collapse7">
                                    Staff Number
                                </button>
                            </h2>
                            <div id="collapse7" class="accordion-collapse collapse" data-bs-parent="#accordionExample8">
                                <div class="accordion-body">
                                    Staff Number: {{$at_a_glance->staff_number ?? ''}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion mb-2" id="accordionExample9">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse8"
                                    aria-expanded="false" aria-controls="collapse8">
                                    PHD Number
                                </button>
                            </h2>
                            <div id="collapse8" class="accordion-collapse collapse" data-bs-parent="#accordionExample9">
                                <div class="accordion-body">
                                    PHD Number: {{$at_a_glance->phd_number ?? ''}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion mb-2" id="accordionExample10">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                @php
                                    $halls = App\Models\Hall::all()->count();
                                @endphp
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse10"
                                    aria-expanded="false" aria-controls="collapse10">
                                    Residential Halls
                                </button>
                            </h2>
                            <div id="collapse10" class="accordion-collapse collapse" data-bs-parent="#accordionExample10">
                                <div class="accordion-body">
                                    Residential Halls: {{$halls}}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>


@endsection
@push('styles')
<style>
    h1, h2, h3, h4, h5, h6 {
        font-family: "Titillium Web", sans-serif !important;
    }
    .r, .b {
        
    }
    .r:hover {
        background: white;
        color: black !important;
    }
    .b:hover {
        background: black;
        color: white !important;
    }
    .accordion-header > button {
        color: #000000;
        background-color: #00c5bf;;
        border-color: #ddd;
        font-size: 1.2rem;
        font-weight: 500;
    }
    .accordion-button:not(.collapsed) {
        color: #ffffff;
        background-color: #B5212D;
        box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .125);
    }
    .accordion-body{
        color: #181818;
        font-size: 16px;
        line-height: 1.5;
    }
</style>
@endpush

@push('scripts')
<script>

</script>
@endpush