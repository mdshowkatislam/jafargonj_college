@extends('backend.layouts.app')
@section('content')
    <style type="text/css">
        .i-style {
            display: inline-block;
            padding: 10px;
            width: 2em;
            text-align: center;
            font-size: 2em;
            vertical-align: middle;
            color: #444;
        }

        .demo-icon {
            cursor: pointer;
        }
    </style>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h4 class="m-0 text-dark">Club Add</h4> --}}
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">@lang('Home')</a></li>
                        <li class="breadcrumb-item active">@lang('Team Member Add')</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h5>
                        @if (isset($editData))
                            @lang('Member') @lang('Update')
                        @else
                            @lang('Member') @lang('Add')
                        @endif
                        <a class="btn btn-sm btn-info float-right" href="{{ route('club.member.list') }}"><i class="fa fa-list"></i> @lang('All Club Members') @lang('List')</a>
                    </h5>
                </div>
                <!-- Form Start-->
                <form id="myForm" method="post" action="{{ @$editData ? route('club.member.update', $editData->id) : route('club.member.store') }}" id="" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="clubName">Student Name<span class="text-red">*</span></label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Name" value="{{ @$editData->name }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="clubName">Student ID <span class="text-red">*</span></label>
                                <input type="text" name="student_id" class="form-control @error('student_id') is-invalid @enderror" placeholder="Student ID" value="{{ @$editData->student_id }}" {{ @$editData ? 'readonly' : '' }}>
                                @error('student_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Student Email <span class="text-red">*</span></label>
                                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Student Email" value="{{ @$editData->email }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone">Student Phone <span class="text-red">*</span></label>
                                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="01XXXXXXXXX" value="{{ @$editData->phone }}">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{--
              <div class="form-group col-md-6">
                 <label for="clubName">Club Name</label>
                 @php
                 $clubs = App\Models\Club::all();
                 @endphp
                <select name="club_id" class="form-control @error('club_id') is-invalid @enderror">
                  <option value="">@lang('Select')</option>
                  @foreach ($clubs as $club)
                      <option value="{{@$club->id}}" {{(@$editData->club_id == @$club->id)?"selected":""}}>{{@$club->name}}</option>
                  @endforeach
                </select>
                 @error('club_id')
                 <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                 @enderror
              </div> --}}
                            {{-- <div class="form-group col-md-6">
                <label for="clubName">Club Designation</label>
                @php
                $club_designations = App\Models\ClubDesignation::all();
                @endphp
               <select name="club_designation_id" class="form-control @error('club_designation_id') is-invalid @enderror">
                 <option value="">@lang('Select')</option>
                 @foreach ($club_designations as $club_designation)
                     <option value="{{@$club_designation->id}}" {{(@$editData->club_id == @$club_designation->id)?"selected":""}}>{{@$club_designation->name}}</option>
                 @endforeach
               </select>
                @error('club_designation_id')
                <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
                @enderror
             </div> --}}
                            <div class="form-group col-md-6">
                                <label for="faculty_name">@lang('Faculty Name') <span class="text-red">*</span></label>
                                @php
                                    $facultyInfo = DB::table('faculties')->where('profile_id', Auth::user()->profile_id)->first();
                                    $departInfo = DB::table('departments')->where('profile_id', Auth::user()->profile_id)->first();
                                    // dd($departInfo->id);
                                    if(isset($facultyInfo)) {
                                        $faculties = App\Models\Faculty::where('profile_id', $facultyInfo->profile_id)->get();
                                    }elseif(isset($departInfo)){
                                        $faculties = App\Models\Faculty::where('id', $departInfo->faculty_id)->get();
                                    }else {
                                        $faculties = App\Models\Faculty::all();
                                    }
                                    // $faculties = App\Models\Faculty::all();
                                @endphp
                              
                                <select name="faculty_id" 
                                        class="form-control 
                                        @error('faculty_id') is-invalid @enderror" 
                                        id="faculty_id"
                                        @if (isset($facultyInfo)) disabled @endif 
                                        @if (isset($departInfo)) disabled @endif 
                                        >
                                    <option value="">@lang('Please Select')</option>
                                    @foreach ($faculties as $faculty)
                                        <option value="{{ @$faculty->id }}" 
                                            @if (isset($facultyInfo) && ($faculty->id == $facultyInfo->id)) selected @endif 
                                            @if (isset($departInfo) && ($faculty->id == $departInfo->faculty_id)) selected @endif 
                                            {{ @$editData->faculty_id == @$faculty->id ? 'selected' : '' }}>
                                            {{ @$faculty->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if (isset($facultyInfo))
                                    <input type="hidden" name="faculty_id" id="faculty_id" value="{{ @$facultyInfo->id }}">
                                @endif
                                @if (isset($departInfo))
                                    <input type="hidden" name="faculty_id" id="faculty_id" value="{{ @$departInfo->faculty_id }}">
                                @endif
                                @error('faculty_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="department_id">@lang('Department Name') <span class="text-red">*</span></label>
                                @php
                                    $departments = App\Models\Department::all();
                                    if (!empty($editData) && !empty($editData->faculty_id)) {
                                        $departments = \App\Models\Department::where('faculty_id', $editData->faculty_id)->get();
                                    }
                                    if(isset($facultyInfo) && empty($editData)){
                                        $departments = \App\Models\Department::where('faculty_id', $facultyInfo->id)->get();
                                    } elseif (isset($departInfo) && empty($editData)) {
                                        $departments = \App\Models\Department::where('id', $departInfo->id)->get();
                                    }
                                @endphp
                                <select class="form-control" 
                                        id="department_id" 
                                        name="department_id" 
                                        aria-label=".form-select-lg example" 
                                        id="department_id"
                                        @if (isset($departInfo)) disabled @endif 
                                        >
                                    <option value="">@lang('Please Select')</option>
                                    @if (@$editData)
                                        @foreach ($departments as $department)
                                            <option value="{{ @$department->id }}" {{ @$editData->department_id == @$department->id ? 'selected' : '' }}>{{ @$department->name }}</option>
                                        @endforeach
                                    @endif
                                    @if (empty($editData) && isset($facultyInfo))
                                        @foreach ($departments as $departmentInfo)
                                            <option value="{{ $departmentInfo->id }}">{{ $departmentInfo->name }}</option>
                                        @endforeach
                                    @endif
                                    @if (empty($editData) && isset($departInfo))
                                        @foreach ($departments as $departmentInfo)
                                            <option value="{{ $departmentInfo->id }}" selected>{{ $departmentInfo->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @if (isset($departInfo))
                                    <input type="hidden" name="department_id" id="department_id" value="{{ @$departInfo->id }}">
                                @endif
                                @error('department_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="status">@lang('Status') <span class="text-red">*</span></label>
                                <select class="form-control" id="status" name="status" aria-label=".form-select-lg example">
                                    <option value="1" {{ @$editData->status == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ @$editData->status == 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">@lang('Short Description')</label>
                                <textarea name="short_description" class="textarea" id="" cols="30" rows="10"> {{ @$editData->short_description }} </textarea>
                                @error('short_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{--
              <div class="form-group col-md-6">
                <label for="">Join Date</label>
                <input type="" name="join_date" class="form-control singledatepicker" value="{{@$editData->join_date}}">
              </div> --}}
                            <div class="form-group col-md-6">
                                <label for="">Image <small style="color: brown"> (Max: 312kb, Preferred size: 70 × 70 px)</small> </label>
                                <input type="file" name="image" id="image" class="form-control form-control-sm @error('image') is-invalid @enderror" autocomplete="off">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <img id="showImage" class="img-fluid shadow rounded" src="{{ !empty(@$editData->image) ? url('upload/club/member/image/' . @$editData->image) : url('upload/no_image.png') }}" style="width:50%;">
                                @if (@$editData->image)
                                <a class="btn btn-danger btn-sm delete mt-1" style="cursor: pointer" id="delete" title="Delete" data-route="{{ route('club.member.delete.photo') }}" data-id="{{ @$editData->id }}" data-token={{ csrf_token() }}><i class="fas fa-trash text-white"></i></a>
                                @endif
                            </div>

                            {{-- <div class="form-group col-md-6">
                            </div> --}}
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <button type="submit" class="btn btn-info">{{ @$editData ? 'Update' : 'Submit' }}</button>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
            <!--Form End-->
        </div>
    </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            var a1 = CKEDITOR.replace('description');
            CKFinder.setupCKEditor(a1, '/ckfinder/');
            var a1 = CKEDITOR.replace('mission');
            CKFinder.setupCKEditor(a1, '/ckfinder/');
            var a1 = CKEDITOR.replace('vision');
            CKFinder.setupCKEditor(a1, '/ckfinder/');
        });
    </script>
    <script>
        $('#faculty_id').on('change', function() {
            var faculty_id = $(this).val();
            var url = "{{ route('get-department', '') }}" + "/" + faculty_id;
            $.ajax({
                url: url,
                type: 'get',
                dataType: 'json',
                success: function(data) {
                    if (data) {
                        $('#department_id').empty();
                        $('#department_id').append('<option hidden>Choose Department</option>');
                        $.each(data, function(key, department) {
                            console.log(key)
                            // let geo_pos= district.lat+"-"+ district.lon
                            $('select[name="department_id"]').append('<option value="' + department.id + '">' + department.name + '</option>');
                        });

                    } else {
                        $('#department_id').empty();
                    }
                }
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) { //show Image before upload
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                };
                reader.readAsDataURL(e.target.files[0]);
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('textarea').each(function() {
                $(this).val($(this).val().trim());
            });

            $('#myForm').validate({
                ignore: [],
                debug: false,
                rules: {
                    name: {
                        required: true,
                    },
                    student_id: {
                        required: true,
                    },
                    email: {
                        required: true,
                        digits: true,
                    },
                    phone: {
                        required: true,
                    },
                    email: {
                        required: true,
                    },
                    faculty_id: {
                        required: true,
                    },
                    department_id: {
                        required: true,
                    },
                    status: {
                        required: true,
                    },
                    status: {
                        required: true
                    },
                    image: {
                        extension: "jpg|jpeg|png",
                   },
        
                },
                messages: {
                    name: {
                        required: "Name is required",
                    },
                    student_id: {
                        required: "Student Id is required",
                    },
                    email: {
                        required: "Email is required",
                    },
                    phone: {
                        required: "Phone Number is required",
                        digits: "Invalid number"
                    },
                    faculty_id: {
                        required: "Faculty Name is required",
                    },
                    department_id: {
                        required: "Department Id is required",
                    },
                    status: {
                        required: "Please select status",
                    },
                    image: {                      
                        extension: "Please upload file in these format only (jpg, jpeg, png)."
                    }                  

                },
               // errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>

@endsection
