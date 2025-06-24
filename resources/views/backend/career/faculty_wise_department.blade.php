<div class="row">
    <div class="form-group col-sm-6">
        @php
        $faculties = App\Models\Faculty::all();
        @endphp
        <label for="faculty_name">@lang('Faculty Name') </label>
        <select name="faculty_id" id="faculty_id" class="form-control select2 @error('faculty_id') is-invalid @enderror" style="width: 100%;">
            <option value="">Please Select</option>
            @foreach ($faculties as $faculty)
            <option value="{{ @$faculty->id }}" {{ @$editData->faculty_id == @$faculty->id ? 'selected' : '' }}>{{ @$faculty->name }}</option>
            @endforeach
        </select>
        @error('faculty_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>


    <div class="form-group col-sm-6">
        @php
        if (!empty($editData) && !empty($editData->faculty_id)) {
        $departmentInfos = \App\Models\Department::where('faculty_id', $editData->faculty_id)->get();
        }
        @endphp
        <label class="control-label">Department</label>
        <select id="department_id" class="form-control  @error('department_id') is-invalid @enderror select2" name="department_id" style="width: 100%;">
            <option value="">Please Select</option>
            @if (!empty($editData) && !empty($departmentInfos))
            @foreach ($departmentInfos as $departmentInfo)
            <option @if (!empty($editData) && $editData->department_id == $departmentInfo->id) selected @endif
                value="{{ $departmentInfo->id }}">{{ $departmentInfo->name }}</option>
            @endforeach
            @endif
        </select>
        @error('department_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>