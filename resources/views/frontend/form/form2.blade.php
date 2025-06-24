@extends('frontend.layouts.master-landing')

@php
    $page_title = 'Application Form';
@endphp

@section('title')
    {{ $page_title }}
@endsection

@section('content')

@include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])

<div class="container mt-3 mb-3">
    <form action="{{ route('butex_form.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="form_type" value="2">
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
                            <input type="text" class="form-control" id="data1" name="data1" placeholder="Admission Test Roll No" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Name (Block Letter) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data2" name="data2" placeholder="Name (Block Letter)" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Father's Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data3" name="data3" placeholder="Father's Name" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Mother's Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data4" name="data4" placeholder="Mother's Name" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Permanent Address <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data5" name="data5" placeholder="Permanent Address" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Present Address <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data6" name="data6" placeholder="Present Address" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Place of Birth <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data7" name="data7" placeholder="Place of Birth" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Nationality <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data8" name="data8" placeholder="Nationality" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Mobile <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data32" name="data32" placeholder="Mobile" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Date of Birth (As per SSC Certificate) <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="data9" name="data9" placeholder="Date of Birth" required>
                        </div>
                    </div>
                </div>

                <h5>Academic Qualification</h5>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name of Exam</th>
                            <th>Name of Institution</th>
                            <th>Passing Year</th>
                            <th>Board/ University</th>
                            <th>Group/Specialization</th>
                            <th>Marks/CGPA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>SSC</td>
                            <td><input type="text" class="form-control form-control-sm" id="data10" name="data10" placeholder="" required></td>
                            <td><input type="text" class="form-control form-control-sm" id="data11" name="data11" placeholder="" required></td>
                            <td><input type="text" class="form-control form-control-sm" id="data12" name="data12" placeholder="" required></td>
                            <td><input type="text" class="form-control form-control-sm" id="data13" name="data13" placeholder="" required></td>
                            <td><input type="text" class="form-control form-control-sm" id="data14" name="data14" placeholder="" required></td>
                        </tr>
                        <tr>
                            <td>HSC</td>
                            <td><input type="text" class="form-control form-control-sm" id="data15" name="data15" placeholder="" required></td>
                            <td><input type="text" class="form-control form-control-sm" id="data16" name="data16" placeholder="" required></td>
                            <td><input type="text" class="form-control form-control-sm" id="data17" name="data17" placeholder="" required></td>
                            <td><input type="text" class="form-control form-control-sm" id="data18" name="data18" placeholder="" required></td>
                            <td><input type="text" class="form-control form-control-sm" id="data19" name="data19" placeholder="" required></td>
                        </tr>
                        <tr>
                            <td>BSc in Textile Engg./Technology</td>
                            <td><input type="text" class="form-control form-control-sm" id="data20" name="data20" placeholder="" required></td>
                            <td><input type="text" class="form-control form-control-sm" id="data21" name="data21" placeholder="" required></td>
                            <td><input type="text" class="form-control form-control-sm" id="data22" name="data22" placeholder="" required></td>
                            <td><input type="text" class="form-control form-control-sm" id="data23" name="data23" placeholder="" required></td>
                            <td><input type="text" class="form-control form-control-sm" id="data24" name="data24" placeholder="" required></td>
                        </tr>
                    </tbody>
                </table>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label for="" class="form-label">Choice of the Department for admission <span class="text-danger">*</span></label>
                            <select class="form-select" id="data25" name="data25" aria-label="Select Engineering Department">
                                <option selected disabled>Select a department...</option>
                                <option value="Yarn Engg.">Yarn Engg.</option>
                                <option value="Fabric Engg.">Fabric Engg.</option>
                                <option value="Wet Process Engg.">Wet Process Engg.</option>
                                <option value="Apparel Engg.">Apparel Engg.</option>
                                <option value="Textile Engg. Mgt.">Textile Engg. Mgt.</option>
                                <option value="Industrial & Production Engg.">Industrial & Production Engg.</option>
                                <option value="Textile Machinery Design & Maintenance">Textile Machinery Design & Maintenance</option>
                                <option value="Environmental Science & Engg.">Environmental Science & Engg.</option>
                            </select>
                        </div>
                    </div>
                </div>

                <h5>Experience (if any)</h5>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name of Education/Industry/Research institute</th>
                            <th>Duration of Service</th>
                            <th>Description of Experience</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><input type="text" class="form-control form-control-sm" id="data26" name="data26" placeholder=""></td>
                            <td><input type="text" class="form-control form-control-sm" id="data27" name="data27" placeholder=""></td>
                            <td><input type="text" class="form-control form-control-sm" id="data28" name="data28" placeholder=""></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><input type="text" class="form-control form-control-sm" id="data29" name="data29" placeholder=""></td>
                            <td><input type="text" class="form-control form-control-sm" id="data30" name="data30" placeholder=""></td>
                            <td><input type="text" class="form-control form-control-sm" id="data31" name="data31" placeholder=""></td>
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