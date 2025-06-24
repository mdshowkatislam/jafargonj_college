
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="type">@lang('Type') <span class="text-red">*</span></label>
            <select name="type" class="form-control select2">
                <option value="">@lang('Please Select')</option>
                <option value="1" {{ @$editData->type == '1' ? 'selected' : '' }}>Notice</option>
                <option value="2" {{ @$editData->type == '2' ? 'selected' : '' }}>Form</option>
                <option value="3" {{ @$editData->type == '3' ? 'selected' : '' }}>Result</option>
            </select>
            @error('type')
            <span class="text-red">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="title">@lang('Job Title') <span class="text-red">*</span></label>
            <input id="title" type="text" name="title" value="{{ @$editData->title }}" class="form-control" autocomplete="on">
            @error('title')
            <span class="text-red">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <label for="date">@lang('Posted Date')<span class="text-red">*</span></label>
            <input type="text" name="date" class="form-control singledatepicker" value="{{ @$editData ? date('d-m-Y', strtotime(@$editData->date)) : '' }}" placeholder="dd-mm-y" autocomplete="off">
            @error('date')
            <span class="text-red">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="deadline">@lang('Application Deadline')<span class="text-red">*</span></label>
            <input type="text" name="deadline" class="form-control singledatepicker" value="{{ @$editData ? date('d-m-Y', strtotime(@$editData->deadline)) : '' }}" placeholder="dd-mm-y" autocomplete="off">
            @error('deadline')
            <span class="text-red">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <label for="payscale">@lang('Pay Scale')</label>
            <input type="text" name="payscale" class="form-control" value="{{ @$editData->payscale}}" placeholder="Ex : Grade 9 (22,000-53,060)" autocomplete="off">
            @error('payscale')
            <span class="text-red">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <label for="job_type">@lang('Employment Status')</label>
            <input type="text" name="job_type" class="form-control" value="{{ @$editData->job_type}}" placeholder="Ex: Full Time" autocomplete="on">
            @error('job_type')
            <span class="text-red">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <label for="location">@lang('Work Place')</label>
            <input type="text" name="location" class="form-control" value="{{ @$editData->location}}" placeholder="" autocomplete="on">
            @error('location')
            <span class="text-red">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-sm-6">
            <label for="educationTextarea1" class="form-label">Education</label>
            <textarea class="form-control" name="education" id="educationTextarea1" rows="3">{{ @$editData->education}}</textarea>

        </div>
        <div class="form-group col-sm-6">
            <label>Experience</label>
            <input id="experience" type="text" value="{{ @$editData->experience}}" class="form-control @error('experience') is-invalid @enderror" name="experience">
            @error('experience')
            <span class="text-red">{{ $message }}</span>
            @enderror
        </div>

        @php
        $jobCatagories = \App\Models\JobCategory::all();
        @endphp
        <div class="form-group col-md-6">
            <label for="category">@lang('Job Category') <span class="text-red">*</span></label>
            <select id="category" class="form-control form-control-sm select2" name="category">
                <option value="">Please Select</option>
                @foreach ($jobCatagories as $jobCatagory)
                <option @if (!empty($editData) && $editData->job_categories_id == @$jobCatagory->id) selected @endif
                    value="{{ @$jobCatagory->id }}">{{ @$jobCatagory->title }}</option>
                @endforeach
            </select>
            @error('category')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group col-sm-6">

            @php
            $office_infos = \App\Models\Office::all();
            @endphp
            <label class="control-label">Office</label>
            <select id="office_id" class="form-control form-control-sm select2" name="office_id">
                <option value="">Please Select </option>
                @foreach ($office_infos as $office_info)
                <option @if (!empty($editData) && $editData->office_id == $office_info->id) selected @endif value="{{ $office_info->id }}">{{ $office_info->name }}</option>
                @endforeach

            </select>
            @error('office_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        @include('backend.layouts.pertials.faculty_wise_department')

        <div class="form-group col-sm-6">
            @php
            $hall_infos = \App\Models\Hall::all();
            @endphp
            <label class="control-label">Hall</label>
            <select id="hall_id" class="form-control form-control-sm select2" name="hall_id">
                <option value="">Please Select</option>
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
            $club_infos = \App\Models\Club::all();
            @endphp
            <label class="control-label">Club</label>
            <select id="club_id" class="form-control form-control-sm select2" name="club_id">
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
            <label>Upload Attachment (pdf,docs)</label>
            <input id="attachment" type="file" value="" class="form-control @error('attachment') is-invalid @enderror" name="attachment">
            @error('attachment')
            <span class="text-red">{{ $message }}</span>
            @enderror
        </div>


        <div class="form-group col-md-12">
            <label class="control-label">Job Details</label>
            <textarea name="job_details" class="form-control form-control-sm textarea" rows="7">{{@$editData->job_details}}</textarea>

        </div>

        <div class="form-group col-md-12">
            <label class="control-label">Additional Requirements</label>
            <textarea name="additional_requirements" class="form-control form-control-sm textarea" rows="7">{{@$editData->additional_requirements}}</textarea>
        </div>

        <div class="form-group col-md-12">
            <label class="control-label">Responsibilities & Context</label>
            <textarea name="responsibilities_context" class="form-control form-control-sm textarea" rows="7">{{@$editData->responsibilities_context}}</textarea>
        </div>

        <div class="form-group col-md-12">
            <label class="control-label">Compensation & Other Benefits</label>
            <textarea name="compensation_benefits" class="form-control form-control-sm textarea" rows="5">{{@$editData->compensation_benefits}}</textarea>
        </div>



        <div class="form-group col-md-6">
            <label for="status">@lang('Status') <span class="text-red">*</span></label>
            <select name="status" class="form-control select2">
                <option value="">Please Select</option>
                <option value="1" {{ @$editData->status == '1' ? 'selected' : '' }}>Active</option>
                <option value="0" {{ @$editData->status == '0' ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('status')
            <span class="text-red">{{ $message }}</span>
            @enderror
        </div>

    </div><!--Form ROW-->
    <div class="form-row">
        <div class="form-group col-md-3">
            <button type="submit" class="btn btn-info">{{ @$editData ? 'Update' : 'Submit' }}</button>
        </div>
    </div>