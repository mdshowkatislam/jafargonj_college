@extends('frontend.layouts.master-landing')

@php
    $page_title = 'Student Admission Information Form';
@endphp

@section('title')
    {{ $page_title }}
@endsection

@section('content')

@include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])

<div class="container mt-3 mb-3">
    <form action="{{ route('butex_form.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="form_type" value="3">
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
                            <label for="" class="form-label">Admission Test Roll No <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data1" name="data1" placeholder="Admission Test Roll NoD" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Merit Position <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data2" name="data2" placeholder="Merit Position" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Name of the Department <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data3" name="data3" placeholder="Name of the Department" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Student ID <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data4" name="data4" placeholder="Student ID" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Student's Name (In Bengali) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data5" name="data5" placeholder="Student's Name" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Student's Name (In English) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data6" name="data6" placeholder="Student's Name" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Father's Name (In Bengali) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data7" name="data7" placeholder="Father's Name" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Father's Name (In English) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data8" name="data8" placeholder="Father's Name" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Mother's Name (In Bengali) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data9" name="data9" placeholder="Mother's Name" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Mother's Name (In English) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data10" name="data10" placeholder="Mother's Name" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Date of Birth <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="data11" name="data11" placeholder="Date of Birth" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Permanent Address <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data12" name="data12" placeholder="Permanent Address" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Mailing Address <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data13" name="data13" placeholder="Mailing Address" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Student's Mobile No <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data14" name="data14" placeholder="Student's Mobile No" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="" class="form-label">Father's/Mother's Mobile No <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data15" name="data15" placeholder="Father's/Mother's Mobile No" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="" class="form-label">Nationality <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data16" name="data16" placeholder="Nationality" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="" class="form-label">Religion <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data17" name="data17" placeholder="Religion" required>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="mb-3">
                            <label for="" class="form-label">Name & Address and Phone/Mobile no of Local Guardian in case of Emergency <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data18" name="data18" placeholder="" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="" class="form-label">Blood Group <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data19" name="data19" placeholder="Blood Group" required>
                        </div>
                    </div>
                </div>

                <h5>Academic Information</h5>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name of Exam</th>
                            <th>Name of Institute</th>
                            <th>Board/ University</th>
                            <th>Year of Exam</th>
                            <th>Exam. Roll</th>
                            <th>Division/GPA/Class/CGPA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>SSC/Equivalent</td>
                            <td><input type="text" class="form-control form-control-sm" id="data20" name="data20" placeholder="" required></td>
                            <td><input type="text" class="form-control form-control-sm" id="data21" name="data21" placeholder="" required></td>
                            <td><input type="text" class="form-control form-control-sm" id="data22" name="data22" placeholder="" required></td>
                            <td><input type="text" class="form-control form-control-sm" id="data23" name="data23" placeholder="" required></td>
                            <td><input type="text" class="form-control form-control-sm" id="data24" name="data24" placeholder="" required></td>
                        </tr>
                        <tr>
                            <td>HSC/Equivalent</td>
                            <td><input type="text" class="form-control form-control-sm" id="data25" name="data25" placeholder="" required></td>
                            <td><input type="text" class="form-control form-control-sm" id="data26" name="data26" placeholder="" required></td>
                            <td><input type="text" class="form-control form-control-sm" id="data27" name="data27" placeholder="" required></td>
                            <td><input type="text" class="form-control form-control-sm" id="data28" name="data28" placeholder="" required></td>
                            <td><input type="text" class="form-control form-control-sm" id="data29" name="data29" placeholder="" required></td>
                        </tr>
                        <tr>
                            <td>BSc in Textile</td>
                            <td><input type="text" class="form-control form-control-sm" id="data30" name="data30" placeholder="" required></td>
                            <td><input type="text" class="form-control form-control-sm" id="data31" name="data31" placeholder="" required></td>
                            <td><input type="text" class="form-control form-control-sm" id="data32" name="data32" placeholder="" required></td>
                            <td><input type="text" class="form-control form-control-sm" id="data33" name="data33" placeholder="" required></td>
                            <td><input type="text" class="form-control form-control-sm" id="data34" name="data34" placeholder="" required></td>
                        </tr>
                    </tbody>
                </table>

                <h5>Sports/Cultural/Other Activities (Should be mentioned if received prize):</h5>

                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>Sports:</td>
                            <td><input type="text" class="form-control form-control-sm" id="data35" name="data35" placeholder=""></td>
                        </tr>
                        <tr>
                            <td>Singing:</td>
                            <td><input type="text" class="form-control form-control-sm" id="data36" name="data36" placeholder=""></td>
                        </tr>
                        <tr>
                            <td>Debate:</td>
                            <td><input type="text" class="form-control form-control-sm" id="data37" name="data37" placeholder=""></td>
                        </tr>
                        <tr>
                            <td>Others:</td>
                            <td><input type="text" class="form-control form-control-sm" id="data38" name="data38" placeholder=""></td>
                        </tr>
                    </tbody>
                </table>

                <h6 class="text-center">Declaration</h6>
                <p>I do hereby declare that I will abide by all the Rules & Regulation of this University after getting admission and I will not involve in any activity subversive of the State or of discipline.</p>

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