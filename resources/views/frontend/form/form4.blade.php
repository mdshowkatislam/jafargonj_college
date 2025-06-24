@extends('frontend.layouts.master-landing')

@php
    $page_title = 'Studentship Extension Form';
@endphp

@section('title')
    {{ $page_title }}
@endsection

@section('content')

@include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])

<div class="container mt-3 mb-3">
    <form action="{{ route('butex_form.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="form_type" value="4">
        <div class="card">
            <div class="card-body custom-font-titillium-web">
                <h3 class="text-center">{{ $page_title }}</h3>
                <hr/>
                <br/>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Student ID <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data1" name="data1" placeholder="Student ID" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Student Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data2" name="data2" placeholder="Student Name" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Department <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data3" name="data3" placeholder="Department" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Name of the Program <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data4" name="data4" placeholder="Name of the Program" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Admission Session <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data5" name="data5" placeholder="Admission Session" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Batch <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data6" name="data6" placeholder="Batch" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">CGPA Achieved <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data7" name="data7" placeholder="CGPA Achieved" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Studentship Ended on <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data8" name="data8" placeholder="Studentship Ended on" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Current Status <span class="text-danger">*</span></label>
                            <!-- Default Checkbox -->
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="data9" value="1" id="defaultCheckbox">
                                <label class="form-check-label" for="defaultCheckbox">
                                    Course Work
                                </label>
                            </div>
                            <!-- Checked Checkbox -->
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="data10" value="1" id="checkedCheckbox">
                                <label class="form-check-label" for="checkedCheckbox">
                                    Thesis Work
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Number of Incomplete Courses <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data11" name="data11" placeholder="Number of Incomplete Courses" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Revised Studentship up to [Phase-1]</label>
                            <input type="text" class="form-control" id="data12" name="data12" placeholder="Revised Studentship up to [Phase-1]">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Revised Studentship up to [Phase-2]</label>
                            <input type="text" class="form-control" id="data13" name="data13" placeholder="Revised Studentship up to [Phase-2]">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Revised Studentship up to [Phase-3]</label>
                            <input type="text" class="form-control" id="data14" name="data14" placeholder="Revised Studentship up to [Phase-3]">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Revised Studentship up to [Phase-4]</label>
                            <input type="text" class="form-control" id="data15" name="data15" placeholder="Revised Studentship up to [Phase-4]">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Revised Studentship up to [Phase-5]</label>
                            <input type="text" class="form-control" id="data16" name="data16" placeholder="Revised Studentship up to [Phase-5]">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Supervisor's name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data17" name="data17" placeholder="Supervisor's name" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Requested Revision of Studentship up to <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data18" name="data18" placeholder="Requested Revision of Studentship up to" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="" class="form-label">Attach 1copy pp size attested photograph <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" id="data59" name="data59" placeholder="Attach 1copy pp size attested photograph" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="" class="form-label">Signature of Student <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" id="data60" name="data60" placeholder="Signature of Student" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="" class="form-label">Date: <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="data58" name="data58" placeholder="Date" required>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-success">Submit</button>

            </div>
        </div>
    </form>
</div>

@endsection