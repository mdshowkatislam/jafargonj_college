@extends('backend.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                {{-- <h1 class="m-0 text-dark">{{ !empty($editData)? 'Update News | Event | Notice' : 'Add News | Event | Notice' }}</h1> --}}
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">News | Event | Notice</li>
                </ol>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="card card-outline card-info">
                <div class="card-header">
                    <h5 class="m-0 text-dark float-left">{{ !empty($editData) ? 'Update News | Event | Notice' : 'Add News | Event | Notice' }}</h5>
                    <a href="{{ route('news.list') }}" class="btn btn-info btn-sm float-right"><i class="fas fa-stream"></i> View News | Event | Notice</a>
                </div>
                <div class="card-body">
                    <form id="newsForm" action="{{ !empty($editData) ? route('news.update', $editData->id) : route('news.store') }}" method="post" enctype="multipart/form-data">

                        @csrf
                        <div class="form-row">

                            <div class="form-group col-sm-6">
                                <label for="title">Title <span class="text-red">*</span></label>
                                <input id="title" type="text" value="{{ !empty($editData->title) ? $editData->title : old('title') }}" class="form-control @error('title') is-invalid @enderror" name="title" autocomplete="on">
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6">
                                <label>File<small style="color: brown"> (Max 10 mb,Preferred files: pdf,doc,docx)</small></label>
                                @if (!empty(@$editData['file']))
                                    <a target="_blank" href="{{ asset('upload/news/' . @$editData['file']) }}">View File</a>
                                @endif
                                <input type="file" class="form-control filer_input_single @error('file') is-invalid @enderror" name="file"> @error('file')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Date </label>
                                <input id="date" type="date" value="{{ @$editData->date ? @$editData->date : old('date') }}" class="form-control @error('date') is-invalid @enderror" name="date" placeholder="Date"> @error('date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <label>Image<small style="color: brown"> (Max 2 mb, Preferred files:jpg,jpeg,png)</small></label>
                                        <input type="file" class="form-control filer_input_single @error('image') is-invalid @enderror" name="image"> @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <img src="{{ asset('upload/news/' . @$editData['image']) }}" width="100%" height="auto" onerror="this.onerror=null;this.src='{{ asset('upload/no-image.png') }}';">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-sm-3">
                                <label>Type <span class="text-red">*</span></label>
                                <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                                    <option value="">Please Select Type</option>
                                    <option value="1" {{ @$editData->type == '1' ? 'selected' : '' }}>News</option>
                                    <option value="2" {{ @$editData->type == '2' ? 'selected' : '' }}>Event</option>
                                    <option value="3" {{ @$editData->type == '3' ? 'selected' : '' }}>Notice</option>
                                </select>
                                @error('type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-3" id="category-section" style="display: none;">
                                <label for="category">Category</label>
                                <select name="category" id="category" class="form-control @error('category') is-invalid @enderror">
                                    <option value="">Please Select Category</option>
                                    <option value="1" {{ @$editData->category == '1' ? 'selected' : '' }}>Results</option>
                                    <option value="2" {{ @$editData->category == '2' ? 'selected' : '' }}>Administrative</option>
                                    <option value="3" {{ @$editData->category == '3' ? 'selected' : '' }}>Academic</option>
                                    <option value="4" {{ @$editData->category == '4' ? 'selected' : '' }}>Programs</option>
                                    <option value="5" {{ @$editData->category == '5' ? 'selected' : '' }}>Affiliated</option>
                                    <option value="6" {{ @$editData->category == '6' ? 'selected' : '' }}>Tender</option>
                                    <option value="7" {{ @$editData->category == '7' ? 'selected' : '' }}>Other</option>
                                    @foreach ($convocations as $convocation)
                                        <option value="1{{ $convocation->id }}" 
                                            {{ isset($editData->category) && $editData->category == '1' . $convocation->id ? 'selected' : '' }}>
                                            {{ $convocation->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group col-md-6" id="programs-section" style="display: none;">
                                <label for="program_category">Program Category </label>
                                <select name="program_category_id" id="program_category"
                                        class="form-control @error('program_category_id') is-invalid @enderror">
                                    <option value="">@lang('Please Select')</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                                {{ @$editData->program_category_id == $category->id ? 'selected' : '' }}>
                                            {{ @$category->program_category }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <div class="form-group  col-md-3" style="margin-top: 32px;">

                            <input id="display_on_scrollbar" type="checkbox" value="1" class="form-check-input @error('display_on_scrollbar') is-invalid @enderror" name="display_on_scrollbar" checked>
                            <label for="display_on_scrollbar" class="form-check-label">Display on Scrollbar</label>
                            @error('display_on_scrollbar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div> --}}
                        <div class="col-sm-3" style="margin-top: 35px;">
                            <div class="form-check" style="margin-left: 5px;">
                                <input type="checkbox" name="display_on_scrollbar" class="form-check-input" id="display_on_scrollbar" value="1" {{ @$editData->display_on_scrollbar == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="display_on_scrollbar">Display on Scrollbar</label>
                            </div>
                        </div>
                        <div class="col-sm-3" style="margin-top: 35px;">
                            <div class="form-check d-none" style="margin-left: 5px;">
                                <input type="checkbox" name="is_featured" class="form-check-input" id="is_featured" value="1" {{ @$editData->is_featured == 1 ? 'checked':'' }}>
                                <label class="form-check-label" for="is_featured">Is Featured?</label>
                            </div>
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Short Description</label>
                            <textarea id="short_description" type="text" class="form-control @error('short_description') is-invalid @enderror" name="short_description">{{ !empty($editData->short_description) ? $editData->short_description : old('short_description') }}</textarea>
                            @error('short_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Start Date <small style="color: brown"> (For Event)</small></label>
                            <input id="start_date" type="date" value="{{ @$editData->start_date  ? @$editData->start_date  : old('start_date') }}" class="form-control @error('start_date') is-invalid @enderror" name="start_date" placeholder="Start Date"> @error('start_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-6">
                            <label>End Date <small style="color: brown"> (For Event)</small> </label>
                            <input id="end_date" type="date" value="{{ @$editData->end_date ? @$editData->end_date : old('end_date') }}" class="form-control @error('end_date') is-invalid @enderror" name="end_date" placeholder="End Date"> @error('end_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        @include('backend.layouts.pertials.faculty_wise_department')

                        <div class="form-group col-sm-6">
                            @php
                                if (!empty($editData) && !empty($editData->department_id)) {
                                    $programInfos = \App\Models\Program::where('department_id', $editData->department_id)->get();
                                }
                            @endphp
                            <label class="control-label">Please Select Program</label>
                            <select id="program_id" @if (!empty($editData))  @endif
                                class="form-control form-control-sm select2" name="program_id">
                                <option value="" selected>Select Program</option>
                                @if (!empty($editData) && !empty($programInfos))
                                    @foreach ($programInfos as $programInfo)
                                        <option @if (!empty($editData) && $editData->program_id == $programInfo->id) selected @endif
                                                value="{{ $programInfo->id }}">{{ $programInfo->program_title }}</option>
                                    @endforeach
                                @endif

                            </select>
                        </div>

                        <div class="form-group col-sm-6">
                            @php
                            // $office_infos = \App\Models\Office::all();
                            $facultyInfo = DB::table('faculties')->where('profile_id', Auth::user()->profile_id)->first();
                            $departInfo = DB::table('departments')->where('profile_id', Auth::user()->profile_id)->first();
                            // dd(isset($departInfo));
                            @endphp
                            <label class="control-label">Office</label>
                            <select id="office_id" 
                                class="form-control form-control-sm select2" 
                                name="office_id" 
                                {{ @$role_id == 3 || @$role_id == 8 ? 'disabled' : '' }}
                                @if (isset($facultyInfo)) disabled @endif 
                                @if (isset($departInfo)) disabled @endif 
                                >
                                <option value="">Please Select </option>

                                @if (!$role_id || @$role_id == 1)
                                <option value="0" {{ @$editData->office_id === 0 ? 'selected' : '' }}>All</option>
                                @endif
                                @foreach ($office_infos as $office_info)
                                {{-- <option value="">Please Select </option> --}}
                                <option @if (!empty($editData) && $editData->office_id == $office_info->id) selected @endif value="{{ $office_info->id }}">{{ $office_info->name }}</option>
                                @endforeach
                            </select>
                            @error('office_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group col-sm-6">
                            @php
                                $hall_infos = \App\Models\Hall::all();
                                $facultyInfo = DB::table('faculties')->where('profile_id', Auth::user()->profile_id)->first();
                                $departInfo = DB::table('departments')->where('profile_id', Auth::user()->profile_id)->first();
                                // dd(isset($departInfo));
                            @endphp
                            <label class="control-label">Hall</label>
                            <select id="hall_id" 
                                class="form-control form-control-sm select2" 
                                name="hall_id" 
                                {{ @$role_id == 3 || @$role_id == 8 ? 'disabled' : '' }}
                                @if (isset($facultyInfo)) disabled @endif 
                                @if (isset($departInfo)) disabled @endif 
                                >
                                {{-- @if (!$role_id) --}}
                                    <option value="">Please Select</option>
                                    <option value="0" {{ isset($editData) && $editData->hall_id === 0 ? 'selected' : '' }}>All</option>
                                {{-- @endif --}}
                                @foreach ($hall_infos as $hall_info)
                                    <option value="{{ $hall_info->id }}" {{ isset($editData) && $editData->hall_id == $hall_info->id ? 'selected' : '' }}>{{ $hall_info->name }}</option>
                                @endforeach
                            </select>
                            @error('hall_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-sm-6">
                            @php
                            // $club_infos = \App\Models\Club::all();
                            $facultyInfo = DB::table('faculties')->where('profile_id', Auth::user()->profile_id)->first();
                            $departInfo = DB::table('departments')->where('profile_id', Auth::user()->profile_id)->first();
                            // dd(isset($departInfo));
                            @endphp
                            <label class="control-label">Club</label>
                            <select id="club_id" 
                                class="form-control form-control-sm select2" 
                                name="club_id" 
                                {{ @$role_id == 10 || @$role_id == 8 || @$role_id == 11 ? 'disabled' : '' }}
                                @if (isset($facultyInfo)) disabled @endif 
                                @if (isset($departInfo)) disabled @endif 
                                >
                                <option value="">Please Select </option>
                                <option value="0" {{ @$editData->club_id === 0 ? 'selected' : '' }}>All</option>
                                @foreach ($club_infos as $club_info)
                                <option @if (!empty($editData) && $editData->club_id == $club_info->id) selected @endif value="{{ $club_info->id }}">{{ $club_info->name }}</option>
                                @endforeach

                            </select>
                            @error('club_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group col-sm-6">
                            <label>Author</label>
                            <input id="author" type="text" value="{{ !empty($editData->author) ? $editData->author : old('author') }}" class="form-control @error('author') is-invalid @enderror" name="author" placeholder=""> @error('author')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        {{-- <div class="form-group col-sm-6">
                            <label>Short Description</label>
                            <textarea id="short_description" type="text" class="form-control @error('short_description') is-invalid @enderror textarea" name="short_description">{{ !empty($editData->short_description)? $editData->short_description : old('short_description') }}</textarea>
                        @error('short_description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span> @enderror
                        </div> --}}
                <div class="form-group col-sm-12">
                    <label>Long Description</label>
                    <textarea id="long_description" type="text" class="form-control @error('long_description') is-invalid @enderror textarea" name="long_description">{{ !empty($editData->long_description) ? $editData->long_description : old('long_description') }}</textarea>
                    @error('long_description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <button class="btn bg-gradient-success btn-flat"><i class="fas fa-save"></i>
                {{ !empty($editData) ? 'Update ' : 'Save' }}</button>
            </form>

        </div>
</div>

<!--/. container-fluid -->
</section>

<script type="text/javascript">
    $(document).ready(function() {
        $('textarea').each(function() {
            $(this).val($(this).val().trim());
        });

        $('#newsForm').validate({
            ignore: [],
            debug: false,
            errorClass: 'text-danger',
            validClass: 'text-success',
            rules: {
                title: {
                    required: true,
                },
                type: {
                    required: true,
                },
                image: {
                    extension: "jpg|jpeg|png",
                },
                file: {
                    extension: "pdf|doc|docx",
                }
            },
            messages: {
                title: {
                    required: "Title is required",
                },
                type: {
                    required: "Type is required",
                },
                image: {

                    extension: "Please upload file in these format only (jpg, jpeg, png)."
                },
                file: {

                    extension: "Please upload file in these format only (pdf,doc,docx)."
                }
            },
            //  errorElement: 'span',
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
{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        const typeSelect = document.getElementById('type');
        const categorySection = document.getElementById('category-section');

        function toggleCategorySection() {
            if (typeSelect.value === '3') { // If "Notice" is selected
                categorySection.style.display = 'block';
            } else {
                categorySection.style.display = 'none';
            }
        }

        // Initial check on page load
        toggleCategorySection();

        // Listen for changes to the type select
        typeSelect.addEventListener('change', toggleCategorySection);
    });
</script> --}}

<script>
    $(document).ready(function() {
        // Function to handle the visibility of sections
        function handleVisibility() {
            var typeValue = $('#type').val();
            var categoryValue = $('#category').val();

            // Hide both sections initially
            $('#category-section').hide();
            $('#programs-section').hide();

            // Show category section if 'Notice' is selected
            if (typeValue === '3') {
                $('#category-section').show();
            }

            // Show programs section if 'Programs' is selected in category section
            if (typeValue === '3' && (categoryValue === '4' || categoryValue === '1')) {
                $('#programs-section').show();
            }
        }

        // Initial check on page load
        handleVisibility();

        // Listen for changes to the type select
        $('#type').change(function() {
            handleVisibility();
        });

        // Listen for changes to the category select
        $('#category').change(function() {
            // Show programs section if 'Programs' is selected
            if ($(this).val() === '4' || $(this).val() === '1') {
                $('#programs-section').show();
            } else {
                $('#programs-section').hide();
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).on('select change', '#department_id', function() {
        var department_id = $('#department_id').val();
        console.log(department_id);
        $.ajax({
            url: "{{ route('department_wise_program') }}",
            type: "GET",
            data: {
                department_id: department_id
            },
            success: function(data) {
                // console.log(data);
                if (data != 'fail') {
                    $('#program_id').html('<option value ="">Please Select Program</option>');
                    // $('#program_id').html('');
                    var selected = "{{ @$editData->program_id }}";

                    $.each(data, function(index, program) {
                        $('#program_id').append('<option value ="' + program.id + '"' + ((
                                program.id == selected) ? ('selected') : '') + '>' +
                            program.program_title + '</option>');
                    });
                } else {
                    $('#program_id').append('');
                }
            }
        });
    });
</script>
@endsection