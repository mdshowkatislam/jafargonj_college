@extends('backend.layouts.app')
@section('content')
    <style>
        .select2-container .select2-selection--single {
            height: 35px;
        }
    </style>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h4 class="m-0 text-dark">{{ !empty($editData)? "Update":"Add" }} Personnels to Faculty</h4> --}}
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">@lang('Home')</a></li>
                        <li class="breadcrumb-item active">@lang('Personnels to Faculty')</li>
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
                            @lang('Update') @lang('Personnels to Faculty')
                        @else
                            @lang('Add') @lang('Personnels to Faculty')
                        @endif
                        <a class="btn btn-sm btn-info float-right"
                            href="{{ route('manage_profile.personnels_to_faculty') }}"><i class="fa fa-list"></i>
                            @lang('View') @lang('List')</a>
                    </h5>
                </div>
                <!-- Form Start-->
                <div class="card-body">
                    <form method="post"
                        action="{{ @$editData ? route('manage_profile.personnels_to_faculty.update', $editData->id) : route('manage_profile.personnels_to_faculty.store') }}"
                        id="myForm" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="profile_id">@lang('Personnels') <span class="text-red">*</span></label>
                                    @php
                                        $personnelsToFacultiesIds = App\Models\PersonnelsToFaculty::whereNotNull(
                                            'profile_id',
                                        )
                                            ->pluck('profile_id')
                                            ->toArray();
                                        // dd($personnelsToFacultiesIds);
                                        if (!empty($editData)) {
                                            $profiles = App\Models\Profile::all();
                                        } else {
                                            $profiles = App\Models\Profile::whereNotIn(
                                                'id',
                                                $personnelsToFacultiesIds,
                                            )->get();
                                            // dd($profiles->toArray());
                                        }
                                    @endphp
                                    <select id="mySelect" @if (!empty($editData)) disabled @endif
                                        name="profile_id"
                                        class="form-control select2 @error('profile_id') is-invalid @enderror">

                                        <option selected value="">@lang('Please Select') </option>

                                        @foreach ($profiles as $profile)
                                            <option value="{{ @$profile->id }}"
                                                {{ @$editData->profile_id == @$profile->id ? 'selected' : '' }}>
                                                {{ @$profile->nameEn }}</option>
                                        @endforeach

                                    </select>

                                    @if (!empty($editData))
                                        <input type="hidden" name="profile_id" value="{{ $editData->profile_id }}">
                                    @endif
                                    @error('profile_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="sort_order">@lang('Sort Order') <span class="text-red">*</span></label>
                                    <input id="sort_order" type="number" name="sort_order"
                                        class="form-control @error('sort_order') is-invalid @enderror"
                                        value="{{ @$editData->sort_order }}" placeholder="Sort Order">
                                    @error('sort_order')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                {{-- ====================================== --}}
                                <div class="form-group col-md-6">
                                    <label for="faculty_id">@lang('Faculty Name') <span class="text-red">*</span></label>
                                    @php
                                        $facultyInfo = DB::table('faculties')
                                            ->where('profile_id', Auth::user()->profile_id)
                                            ->first();
                                        $departInfo = DB::table('departments')
                                            ->where('profile_id', Auth::user()->profile_id)
                                            ->first();

                                        if (isset($facultyInfo)) {
                                            $allfaculties = App\Models\Faculty::where(
                                                'profile_id',
                                                $facultyInfo->profile_id,
                                            )->get();
                                        } elseif (isset($departInfo)) {
                                            $allfaculties = App\Models\Faculty::where(
                                                'id',
                                                $departInfo->faculty_id,
                                            )->get();
                                        } else {
                                            $allfaculties = App\Models\Faculty::all();
                                        }

                                        // Common Department option
                                        $faculties = collect([
                                            (object) ['id' => 0, 'name' => 'Common Department'],
                                        ])->merge($allfaculties);
                                    @endphp

                                    <select id="faculty_id" name="faculty_id"
                                        class="form-control select2 @error('faculty_id') is-invalid @enderror"
                                        @if (isset($facultyInfo) || isset($departInfo)) disabled @endif>


                                        <option selected value="">@lang('Please Select')</option>
                                        @foreach ($faculties as $faculty)
                                            <option value="{{ $faculty->id }}"
                                                {{ !empty($editData) && $editData->faculty_id == $faculty->id ? 'selected' : '' }}>
                                                {{ $faculty->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @if (isset($facultyInfo))
                                        <input type="hidden" name="faculty_id" value="{{ $facultyInfo->id }}">
                                    @endif
                                    @if (isset($departInfo))
                                        <input type="hidden" name="faculty_id" value="{{ $departInfo->faculty_id }}">
                                    @endif

                                    @error('faculty_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                {{-- ======== =============== ======= --}}

                                <div class="form-group col-sm-6">
                                    <label class="control-label">Department</label>
                                    @php
                                        if (!empty($editData) && !empty($editData->faculty_id)) {
                                            $departmentInfos = \App\Models\Department::where(
                                                'faculty_id',
                                                $editData->faculty_id,
                                            )->get();
                                        } elseif (isset($facultyInfo) && empty($editData)) {
                                            $departmentInfos = \App\Models\Department::where(
                                                'faculty_id',
                                                $facultyInfo->id,
                                            )->get();
                                        } elseif (isset($departInfo) && empty($editData)) {
                                            $departmentInfos = \App\Models\Department::where(
                                                'id',
                                                $departInfo->id,
                                            )->get();
                                        }
                                    @endphp

                                    <select id="department_id" class="form-control form-control-sm select2"
                                        name="department_id" @if (isset($departInfo)) disabled @endif>
                                        <option selected value="">@lang('Please Select Department')</option>

                                        @if (!empty($departmentInfos))
                                            @foreach ($departmentInfos as $departmentInfo)
                                                <option value="{{ $departmentInfo->id }}"
                                                    {{ !empty($editData) && $editData->department_id == $departmentInfo->id ? 'selected' : '' }}>
                                                    {{ $departmentInfo->name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>

                                    @if (isset($departInfo))
                                        <input type="hidden" name="department_id" value="{{ $departInfo->id }}">
                                    @endif

                                    @error('department_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <button type="submit"
                                        class="btn btn-info">{{ @$editData ? 'Update' : 'Save' }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!--Form End-->
                </div>
            </div>
        </div>
    </div>



    <script>
        $(document).ready(function() {
            $('#faculty_id').on('change', function() {
                var faculty_id = $(this).val();
                if (faculty_id === "") {
                    $('#department_id').empty().append(
                        '<option selected value="">Please Select Department</option>');
                    return;
                }

                $.ajax({
                    url: "{{ route('faculty_wise_department') }}",
                    type: "GET",
                    data: {
                        faculty_id: faculty_id
                    },
                    success: function(data) {
                        $('#department_id').empty();
                        $('#department_id').append(
                            '<option selected value="">Please Select Department</option>');
                        if (data != 'fail') {
                            $.each(data.facultyWiseDepartment, function(index, dept) {
                                $('#department_id').append('<option value="' + dept.id +
                                    '">' + dept.name + '</option>');
                            });
                        }
                    }
                });
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
                errorClass: 'text-danger',
                validClass: 'text-success',
                rules: {
                    profile_id: {
                        required: true,
                    },
                    sort_order: {
                        required: true,
                        digits: true
                    },

                    faculty_id: {
                        required: true,
                    }
                },
                messages: {
                    profile_id: {
                        required: "Profile is required",
                    },
                    sort_order: {
                        required: "Sort Order is required",
                        digits: "Invalid Order",
                    },

                    faculty_id: {
                        required: "Faculty is required",
                    }
                },

                errorPlacement: function(error, element) {
                    error.addClass('text-danger');
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
