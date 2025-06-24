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
        .select2 {
          width:100% !important;
        }
    </style>

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h4 class="m-0 text-dark">{{ @$gallery_type ? @$gallery_type : 'All' }}&nbsp;Photo Gallery</h4> --}}
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">@lang('Home')</a></li>
                        <li class="breadcrumb-item active">@lang('Photo Gallery')</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>
                        @if (isset($editData))
                            {{ @$gallery_type ? @$gallery_type : '' }} @lang('Photo Gallery') @lang('Update')
                        @else
                            {{ @$gallery_type ? @$gallery_type : '' }} @lang('Photo Gallery Add')
                        @endif
                        <a class="btn btn-sm btn-success float-right" href="{{ $category_id ? route('setup.gallery_category.categoryWiseGallery', [$category_id, @$ref_id]) : route('setup.gallery_category') }}"><i class="fa fa-list mr-1"></i>Photo Gallery List</a>
                    </h5>
                </div>
                <!-- Form Start-->
                <form method="post" action="{{ @$editData ? route('setup.gallery_category.update', $editData->id) : route('setup.gallery_category.store') }}" id="myForm" enctype="multipart/form-data">
                    @csrf
                    @if (@$ref_id)
                        <input type="hidden" name="ref_id" class="form-control" value="{{ @$ref_id }}">
                    @endif
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">@lang('Album Name') <span class="text-red">*</span></label>
                                <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ @$editData->name }}" placeholder="">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="sub_category">@lang('Category') </label>
                                @if ($category_id)
                                    <input type="hidden" name="sub_category" class="form-control" value="{{ @$category_id }}" placeholder="">
                                    <input id="type" type="hidden" name="type" class="form-control @error('type') is-invalid @enderror" value="1" placeholder="">

                                    <select name="sub_category" class="form-control" disabled>
                                        <option selected value="">@lang('Please Select')</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ @$category->id == $category_id ? 'selected' : '' }}>
                                                {{ @$category->name }}</option>
                                        @endforeach
                                        <option value="101" {{ @$editData->sub_category == '101' ? 'selected' : '' }}>Conference</option>
                                    </select>
                                @else
                                    <select id="sub_category" name="sub_category" class="form-control @error('sub_category') is-invalid @enderror">
                                        <option value="">@lang('Please Select Category')</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ @$editData->sub_category == $category->id ? 'selected' : '' }}>
                                                {{ @$category->name }}</option>
                                        @endforeach
                                        <option value="101" {{ @$editData->sub_category == '101' ? 'selected' : '' }}>Conference</option>
                                    </select>
                                @endif
                                @error('sub_category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div id="faculty_div" class="form-group col-md-6" style="display:{{ @$category_id == 1 || @$editData->sub_category == 1 ? '' : 'none' }}">
                                <label for="">@lang('Faculty')</label>
                                <select id="" name="faculty_id" class="form-control select2">
                                    <option value="">Please Select</option>
                                    @foreach ($faculties as $faculty)
                                        <option value="{{ $faculty->id }}" {{ @$editData->sub_category == 1 && @$editData->ref_id == $faculty->id ? 'selected' : '' }}>
                                            {{ @$faculty->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div id="department_div" class="form-group col-md-6" style="display:{{ @$category_id == 2 || @$editData->sub_category == 2 ? '' : 'none' }}">
                                <label for="">@lang('Department') </label>
                                <select id="" name="department_id" class="form-control select2">
                                    <option value="">Please Select</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}" {{ @$editData->sub_category == 2 && @$editData->ref_id == $department->id ? 'selected' : '' }}>
                                            {{ @$department->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div id="office_div" class="form-group col-md-6" style="display:{{ @$category_id == 7 || @$editData->sub_category == 7 ? '' : 'none' }}">
                                <label for="">@lang('Office')</label>
                                <select id="" name="office_id" class="form-control select2">
                                    {{-- <option value="">Select</option> --}}
                                    @foreach ($offices as $office)
                                        <option value="{{ $office->id }}" {{ @$editData->sub_category == 7 && @$editData->ref_id == $office->id || @$ref_id == $office->id ? 'selected' : '' }}>
                                            {{ @$office->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div id="club_div" class="form-group col-md-6" style="display:{{ @$category_id == 8 || @$editData->sub_category == 8 ? '' : 'none' }}">
                                <label for="">@lang('Club') </label>
                                <select id="" name="club_id" class="form-control select2">
                                    {{-- <option value="">Select</option> --}}
                                    @foreach ($clubs as $club)
                                        <option value="{{ $club->id }}" {{ @$editData->sub_category == 8 && @$editData->ref_id == $club->id ? 'selected' : '' }}>
                                            {{ @$club->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="sub_category">@lang('Status') <span class="text-red">*</span></label>
                                <select name="status" class="form-control select2  @error('status') is-invalid @enderror">
                                    <option selected value="">@lang('Please Select')</option>
                                    <option value="1" {{ @$editData->status == 1 ? 'selected' : '' }}> Active </option>
                                    <option value="0" {{ @$editData->status == 0 ? 'selected' : '' }}> Inactive </option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Sort Order<span class="text-red"></span></label>
                                <input type="number" class="form-control @error('sort') is-invalid @enderror" name="sort" autocomplete="off" value="{{ !empty($editData->sort) ? $editData->sort : old('sort') }}">
                                @error('sort')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <button type="submit" class="btn btn-primary" style="margin-top: 32px;">{{ @$editData ? 'Update' : 'Submit' }}</button>
                            </div>
                        </div>
                    </div>
                </form>
                <!--Form End-->
            </div>
        </div>
    </div>

    <script>
        // Get references to the select element and the div elements
        let subCategorySelect = document.getElementById('sub_category');
        let facultyDiv = document.getElementById('faculty_div');
        let departmentDiv = document.getElementById('department_div');
        let officeDiv = document.getElementById('office_div');
        let clubDiv = document.getElementById('club_div');

        // Add an event listener for the 'change' event on the select element
        subCategorySelect.addEventListener('change', function() {
            let subCategoryValue = subCategorySelect.value;

            switch (subCategoryValue) {
                case '1':
                    facultyDiv.style.display = '';
                    departmentDiv.style.display = 'none';
                    officeDiv.style.display = 'none';
                    clubDiv.style.display = 'none';
                    break;
                case '2':
                    facultyDiv.style.display = 'none';
                    departmentDiv.style.display = '';
                    officeDiv.style.display = 'none';
                    clubDiv.style.display = 'none';
                    break;
                case '7':
                    facultyDiv.style.display = 'none';
                    departmentDiv.style.display = 'none';
                    officeDiv.style.display = '';
                    clubDiv.style.display = 'none';
                    break;
                case '8':
                    facultyDiv.style.display = 'none';
                    departmentDiv.style.display = 'none';
                    officeDiv.style.display = 'none';
                    clubDiv.style.display = '';
                    break;
                default:
                    facultyDiv.style.display = 'none';
                    departmentDiv.style.display = 'none';
                    officeDiv.style.display = 'none';
                    clubDiv.style.display = 'none';
                    break;
            }
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            //   $('textarea').each(function(){
            //     $(this).val($(this).val().trim());
            //   });
            $('#myForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    sub_category: {
                        required: true,
                    },
                                             
                    status: {
                        required: true
                    },
                },

                messages: {
                    name: {
                        required: "Name is required."
                    },                                 
                    sub_category: {
                        required: "Category is required."
                    },                                 
                    status: {
                        required: "Status is required."
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
