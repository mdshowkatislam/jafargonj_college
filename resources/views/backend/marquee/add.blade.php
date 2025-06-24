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
                            @lang('Marquee') @lang('Update')
                        @else
                            @lang('New Marquee') @lang('Add')
                        @endif
                        <a class="btn btn-sm btn-info float-right" href="{{ route('marquee.list') }}"><i
                                class="fa fa-list"></i> @lang('Marquee') @lang('Lists')</a>
                    </h5>
                </div>
                <!-- Form Start-->
                <form method="post"
                    action="{{ @$singleData ? route('marquee.update', $singleData->id) : route('marquee.store') }}"
                    id="" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="title">Title</label>
                                <input type="text" name="title"
                                    class="form-control @error('title') is-invalid @enderror" placeholder="Title"
                                    value="{{ @$singleData->title }}">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="url">Url</label>
                                <input type="url" name="url" class="form-control @error('url') is-invalid @enderror"
                                    placeholder="Url" value="{{ @$singleData->url }}">
                                @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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



                            <div class="form-group col-sm-6">
                                <label for="status">Status <span class="text-danger">*</span></label>
                                <select id="status" name="status" class="form-control select2">
                                    <option value="" disabled>Please Select</option>
                                    <option value="1" {{ @$singleData->status == 1 ? 'selected' : '' }}> Active
                                    </option>
                                    <option value="0" {{ @$singleData->status == 0 ? 'selected' : '' }}> Inactive
                                    </option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="clubName">Sort Order</label>
                                <input type="text" name="sort_order"
                                    class="form-control @error('url') is-invalid @enderror" placeholder="Sort Order"
                                    value="{{ @$singleData->sort_order }}">
                                @error('sort_order')
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

    {{--
    <script type="text/javascript">
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
@endsection
