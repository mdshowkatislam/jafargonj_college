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

        .select2-container {
            width: 100% !important;
        }
    </style>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h4 class="m-0 text-dark">Landing Page Modal Add</h4>  --}}
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">@lang('Home')</a></li>
                        <li class="breadcrumb-item active">@lang('Create')</li>
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
                        @if (isset($singleData))
                            @lang('Modal') @lang('Update')
                        @else
                            @lang('New Modal') @lang('Add')
                        @endif
                        <a class="btn btn-sm btn-info float-right" href="{{ route('landing-modal.modal_list') }}"><i
                                class="fa fa-list"></i> @lang('Landing Page Modal') @lang('Lists')</a>
                    </h5>
                </div>
                <!-- Form Start-->
                <form id="myForm" method="post"
                    action="{{ @$singleData ? route('landing-modal.update', $singleData->id) : route('landing-modal.store') }}"
                    id="" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="clubName">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror" placeholder="Name"
                                    value="{{ @$singleData->name }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="faculty_name">@lang('Use For') <span class="text-red">*</span></label>
                                <select name="use_for" class="form-control select2 @error('use_for') is-invalid @enderror"
                                    id="use_for">
                                    <option value="" >@lang('Please Select')</option>
                                    <option value="1" {{ !@$singleData || @$singleData->use_for == '1' ? 'selected' : '' }}>
                                        Home</option>
                                    <option value="2" {{ @$singleData->use_for == '2' ? 'selected' : '' }}>
                                        Faculties</option>
                                    <option value="3" {{ @$singleData->use_for == '3' ? 'selected' : '' }}>
                                        Departments
                                    </option>
                                    <option value="4" {{ @$singleData->use_for == '4' ? 'selected' : '' }}>
                                        Offices
                                    </option>
                                    <option value="5" {{ @$singleData->use_for == '5' ? 'selected' : '' }}>
                                        Clubs
                                    </option>
                                    <option value="6" {{ @$singleData->use_for == '6' ? 'selected' : '' }}>
                                        Halls
                                    </option>
                                </select>
                                @error('use_for')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6" id="faculty-section" style="display: none;">
                                <label for="faculty_name">@lang('Faculty Name') </label>
                                @php
                                    $facultyInfo = DB::table('faculties')->where('profile_id', Auth::user()->profile_id)->first();
                                    // dd($departInfo->id);
                                    if(isset($facultyInfo)) {
                                        $faculties = App\Models\Faculty::where('profile_id', $facultyInfo->profile_id)->get();
                                    }else {
                                        $faculties = App\Models\Faculty::all();
                                    }
                                @endphp
                                <select name="faculty_id"
                                        class="form-control select2"
                                        id="faculty_id"
                                        @if (isset($facultyInfo)) disabled @endif 
                                        >
                                    <option value="">@lang('Please Select')</option>
                                    {{-- <option value="0" {{ @$singleData->faculty_id == '0' ? 'selected' : '' }}>All</option> --}}
                                    @foreach ($faculties as $faculty)
                                        <option value="{{ @$faculty->id }}" 
                                            @if (isset($facultyInfo) && ($faculty->id == $facultyInfo->id)) selected @endif 
                                                {{ @$singleData->use_for_id == @$faculty->id ? 'selected' : '' }}>{{ @$faculty->name }}</option>
                                    @endforeach
                                </select>
                                @if (isset($facultyInfo))
                                    <input type="hidden" name="faculty_id" id="faculty_id" value="{{ @$facultyInfo->id }}">
                                @endif
                                
                            </div>
                            <div class="form-group col-md-6" id="department-section" style="display: none;">
                                <label for="department_name">@lang('Department Name') </label>
                                @php
                                    // $facultyInfo = DB::table('faculties')->where('profile_id', Auth::user()->profile_id)->first();
                                    $departInfo = DB::table('departments')->where('profile_id', Auth::user()->profile_id)->first();
                                    // dd($departInfo->id);
                                    if(isset($departInfo)) {
                                        $departments = App\Models\Department::where('profile_id', $departInfo->profile_id)->get();
                                    }else {
                                        $departments = App\Models\Department::all();
                                    }
                                @endphp
                                <select name="department_id"
                                        class="form-control select2"
                                        id="department_id"
                                        @if (isset($departInfo)) disabled @endif 
                                        {{ @$role_id == 3 || @$role_id == 8 || @$role_id == 10 || @$role_id == 11 ? 'disabled' : '' }}>
                                    <option value="">@lang('Please Select')</option>
                                    {{-- <option value="0" {{ @$singleData->faculty_id == '0' ? 'selected' : '' }}>All</option> --}}
                                    @foreach ($departments as $department)
                                        <option value="{{ @$department->id }}" 
                                            @if (isset($departInfo) && ($department->id == $departInfo->id)) selected @endif 
                                                {{ @$singleData->use_for_id == @$department->id ? 'selected' : '' }}>{{ @$department->name }}</option>
                                    @endforeach
                                </select>
                                @if (isset($departInfo))
                                    <input type="hidden" name="department_id" id="department_id" value="{{ @$departInfo->id }}">
                                @endif
                                
                            </div>
                            <div class="form-group col-md-6" id="office-section" style="display: none;">
                                <label for="office_name">@lang('Office Name') </label>
                                @php
                                    // $facultyInfo = DB::table('faculties')->where('profile_id', Auth::user()->profile_id)->first();
                                    $officeInfo = DB::table('offices')->where('profile_id', Auth::user()->profile_id)->first();
                                    // dd($officeInfo->id);
                                    if(isset($officeInfo)) {
                                        $offices = App\Models\Office::where('profile_id', $officeInfo->profile_id)->get();
                                    }else {
                                        $offices = App\Models\Office::all();
                                    }
                                @endphp
                                <select name="office_id"
                                        class="form-control select2"
                                        id="office_id"
                                        @if (isset($officeInfo)) disabled @endif 
                                        >
                                    <option value="">@lang('Please Select')</option>
                                    {{-- <option value="0" {{ @$singleData->faculty_id == '0' ? 'selected' : '' }}>All</option> --}}
                                    @foreach ($offices as $office)
                                        <option value="{{ @$office->id }}" 
                                            @if (isset($officeInfo) && ($office->id == $officeInfo->id)) selected @endif 
                                                {{ @$singleData->use_for_id == @$office->id ? 'selected' : '' }}>{{ @$office->name }}</option>
                                    @endforeach
                                </select>
                                @if (isset($officeInfo))
                                    <input type="hidden" name="office_id" id="office_id" value="{{ @$officeInfo->id }}">
                                @endif
                                
                            </div>
                            <div class="form-group col-md-6" id="hall-section" style="display: none;">
                                <label for="hall_name">@lang('Hall Name') </label>
                                @php
                                    // $facultyInfo = DB::table('faculties')->where('profile_id', Auth::user()->profile_id)->first();
                                    $hallInfo = DB::table('halls')->where('provost', Auth::user()->profile_id)->first();
                                    // dd($officeInfo->id);
                                    if(isset($hallInfo)) {
                                        $halls = App\Models\Hall::where('provost', $hallInfo->profile_id)->get();
                                    }else {
                                        $halls = App\Models\Hall::all();
                                    }
                                @endphp
                                <select name="hall_id"
                                        class="form-control select2"
                                        id="hall_id"
                                        @if (isset($hallInfo)) disabled @endif 
                                        >
                                    <option value="">@lang('Please Select')</option>
                                    {{-- <option value="0" {{ @$singleData->hall_id == '0' ? 'selected' : '' }}>All</option> --}}
                                    @foreach ($halls as $hall)
                                        <option value="{{ @$hall->id }}" 
                                            @if (isset($hallInfo) && ($hall->id == $hallInfo->id)) selected @endif 
                                                {{ @$singleData->use_for_id == @$hall->id ? 'selected' : '' }}>{{ @$hall->name }}</option>
                                    @endforeach
                                </select>
                                @if (isset($hallInfo))
                                    <input type="hidden" name="hall_id" id="hall_id" value="{{ @$hallInfo->id }}">
                                @endif
                                
                            </div>
                            <div class="form-group col-md-6" id="club-section" style="display: none;">
                                <label for="club_name">@lang('Club Name') </label>
                                @php
                                    $clubs = App\Models\Club::all();
                                @endphp
                                <select name="club_id"
                                        class="form-control select2"
                                        id="club_id" 
                                        >
                                    <option value="">@lang('Please Select')</option>
                                    {{-- <option value="0" {{ @$singleData->hall_id == '0' ? 'selected' : '' }}>All</option> --}}
                                    @foreach ($clubs as $club)
                                        <option value="{{ @$club->id }}" 
                                            {{ @$singleData->use_for_id == @$club->id ? 'selected' : '' }}>{{ @$club->name }}</option>
                                    @endforeach
                                </select>
                            </div>


                            @php
                                if (@$singleData->image) {
                                    $col = 'col-sm-4';
                                } else {
                                    $col = 'col-sm-6';
                                }
                            @endphp
                            <div class="form-group {{ @$col }}">
                                <label>Image <small style="color: red"> (Max: 2 mb, Preferred size: 260px X 770px)</small></label>
                                <input id="image" type="file" value=""
                                    class="form-control @error('image') is-invalid @enderror" name="image"
                                    placeholder="Image">

                                @if (@$singleData->image)
                                    <span class="valid-feedback" role="alert" style="display:block">
                                        <strong>{{ @$singleData->image }}</strong>
                                    </span>

                                @endif

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            @if (@$singleData->image)
                            <div class="form-group col-sm-2">
                                <img id="icon" src="{{ asset('upload/modal/' . @$singleData->image) }}"
                                     width="80"
                                     height="80">
                                {{-- <button class="btn btn-danger btn-sm delete-image" data-id="{{ @$singleData->id }}">Delete</button> --}}
                                <a title="Delete" class="btn btn-danger btn-sm mx-1" id="delete" data-route="{{ route('landing-modal.img.delete') }}" data-token="{{csrf_token()}}" data-id="{{ $singleData->id }}" ><i class="fas fa-trash"></i></a> 
                            </div>
                            @endif

                            <div class="form-group col-sm-6">
                                <label for="status">Status <span class="text-danger">*</span></label>
                                <select id="status" name="status" class="form-control select2">
                                    <option value="">Please Select</option>
                                    <option value="1" {{ @$singleData->status == 1 ? 'selected' : '' }}> Active
                                    </option>
                                    <option value="0" {{ @$singleData->status == 0 ? 'selected' : '' }}> Inactive
                                    </option>
                                </select>
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Start Date</label>
                                <input id="start_date" type="date" value="{{ @$singleData->start_date }}"
                                    class="form-control @error('start_date') is-invalid @enderror" name="start_date"
                                    placeholder="Start Date">
                                @error('start_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6">
                                <label>End Date</label>
                                <input id="end_date" type="date" value="{{ @$singleData->end_date }}"
                                    class="form-control @error('end_date') is-invalid @enderror" name="end_date"
                                    placeholder="End Date">
                                @error('end_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="form-group col-md-12">
                                <label for="">@lang('Description')</label>
                                <textarea name="description" class="textarea" cols="30" rows="10">
                                  @if (!empty($singleData))
                                {{ $singleData->description }}
                                @endif
                                </textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <button type="submit"
                                    class="btn btn-info">{{ @$singleData ? 'Update' : 'Submit' }}</button>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
            <!--Form End-->
        </div>
    </div>
    </div>

    <script>
        $(document).ready(function () {
            function handleVisibility() {
                var useFor = $('#use_for').val();

                $("#faculty-section").hide();
                $("#department-section").hide();
                $("#office-section").hide();
                $("#club-section").hide();
                $("#hall-section").hide();

                if (useFor == '2') {
                    $("#faculty-section").show();
                } 
                if (useFor == '3') {
                    $("#department-section").show();
                } 
                if (useFor == '4') {
                    $("#office-section").show();
                } 
                if (useFor == '5') {
                    $("#club-section").show();
                } 
                if (useFor == '6') {
                    $("#hall-section").show();
                }
            }

            // Initial check on page load
            handleVisibility();

            $('#use_for').on('change', function() {
                var use_for = $(this).val();
                //console.log(use_for);
                if (use_for == '2') {
                    $("#faculty-section").show();
                    $("#department-section").hide();
                    $("#office-section").hide();
                    $("#club-section").hide();
                    $("#hall-section").hide();
                } else if (use_for == '3') {
                    $("#faculty-section").hide();
                    $("#department-section").show();
                    $("#office-section").hide();
                    $("#club-section").hide();
                    $("#hall-section").hide();
                } else if (use_for == '4') {
                    $("#faculty-section").hide();
                    $("#department-section").hide();
                    $("#office-section").show();
                    $("#club-section").hide();
                    $("#hall-section").hide();
                } else if (use_for == '5') {
                    $("#faculty-section").hide();
                    $("#department-section").hide();
                    $("#office-section").hide();
                    $("#club-section").show();
                    $("#hall-section").hide();
                } else if (use_for == '6') {
                    $("#faculty-section").hide();
                    $("#department-section").hide();
                    $("#office-section").hide();
                    $("#club-section").hide();
                    $("#hall-section").show();
                } else {
                    $("#faculty-section").hide();
                    $("#department-section").hide();
                    $("#office-section").hide();
                    $("#club-section").hide();
                    $("#hall-section").hide();
                }
            });
        });
    </script>

    {{-- <script type="text/javascript">
        $(document).on('select change', '#faculty_id', function() {
            var faculty_id = $('#faculty_id').val();
            //console.log(faculty_id);
            $.ajax({
                url: "{{ route('faculty_wise_department') }}",
                type: "GET",
                data: {
                    faculty_id: faculty_id
                },
                success: function(data) {
                    //console.log(data);
                    if (data != 'fail') {
                        $('#department_id').empty();
                        $('#department_id').append(
                            '<option disabled selected value ="">Select Department</option>');
                        $.each(data, function(index, subcatObj) {
                            $('#department_id').append('<option value ="' + subcatObj
                                .ucam_department_id + '">' + subcatObj.name + '</option>');
                        });
                    } else {
                        console.log('failed');
                    }
                }
            });
        });
    </script> --}}
    

<script type="text/javascript">
        $(document).ready(function () {
        //   $('textarea').each(function(){
        //     $(this).val($(this).val().trim());
        //   });
          $('#myForm').validate({
            rules: {
                name: {
                required: true,
              },
                use_for: {
                required: true,
              },
                image: {
                    extension: "jpg|jpeg|png",
                },
              status:{
                required: true
              }
            },
    
            messages: {
                name: {
                    required: "Name is required."
                },
                use_for: {
                    required: "Type is required."
                },
                status: {
                    required: "Status is required."
                },
                image: {
                    extension: "Please upload file in these format only (jpg, jpeg, png)."
                }
            },
        
            errorPlacement: function (error, element) {
              error.addClass('text-danger');
              element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
              $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
              $(element).removeClass('is-invalid');
            }
          });
        });
    </script>
@endsection
