<div class="form-group col-md-6">
    <label for="faculty_name">@lang('Faculty Name') </label>
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
    @endphp
    <select name="faculty_id"
            class="form-control @error('faculty_id') is-invalid @enderror select2"
            id="faculty_id"
            @if (isset($facultyInfo)) disabled @endif 
            @if (isset($departInfo)) disabled @endif 
            {{ @$role_id == 3 || @$role_id == 8 || @$role_id == 10 || @$role_id == 11 ? 'disabled' : '' }}>
        <option value="">@lang('Please Select')</option>
        <option value="0" {{ @$editData->faculty_id == '0' ? 'selected' : '' }}>All</option>
        @foreach ($faculties as $faculty)
            <option value="{{ @$faculty->id }}" 
                @if (isset($facultyInfo) && ($faculty->id == $facultyInfo->id)) selected @endif 
                @if (isset($departInfo) && ($faculty->id == $departInfo->faculty_id)) selected @endif 
                    {{ @$editData->faculty_id == @$faculty->id ? 'selected' : '' }}>{{ @$faculty->name }}</option>
        @endforeach
    </select>
    @if (isset($facultyInfo))
        <input type="hidden" name="faculty_id" id="faculty_id" value="{{ @$facultyInfo->id }}">
    @endif
    @if (isset($departInfo))
        <input type="hidden" name="faculty_id" id="faculty_id" value="{{ @$departInfo->faculty_id }}">
    @endif
    @error('faculty_id')
        <span class="invalid-feedback"
              role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group col-sm-6">
    @php
        if (!empty($editData) && !empty($editData->faculty_id)) {
            $departmentInfos = \App\Models\Department::where('faculty_id', $editData->faculty_id)->get();
        }
        if(isset($facultyInfo) && empty($editData)){
            $departmentInfos = \App\Models\Department::where('faculty_id', $facultyInfo->id)->get();
        } elseif (isset($departInfo) && empty($editData)) {
            $departmentInfos = \App\Models\Department::where('id', $departInfo->id)->get();
        }
    @endphp

    <label class="control-label">Department</label>
    <select id="department_id"
            class="form-control form-control-sm @error('department_id') is-invalid @enderror select2 "
            name="department_id"
            @if (isset($departInfo)) disabled @endif 
            {{ @$role_id == 3 || @$role_id == 8 || @$role_id == 10 || @$role_id == 11 ? 'disabled' : '' }}>
        <option value="">Please Select</option>
        <option value="0"
                {{ @$editData->department_id == 0 ? 'selected' : '' }}>All</option>
        @if (!empty($editData) && !empty($departmentInfos))
            @foreach ($departmentInfos as $departmentInfo)
                <option @if (!empty($editData) && $editData->department_id == $departmentInfo->id) selected @endif
                        value="{{ $departmentInfo->id }}">{{ $departmentInfo->name }}</option>
            @endforeach
        @endif
        @if (empty($editData) && isset($facultyInfo))
            @foreach ($departmentInfos as $departmentInfo)
                <option value="{{ $departmentInfo->id }}">{{ $departmentInfo->name }}</option>
            @endforeach
        @endif
        @if (empty($editData) && isset($departInfo))
            @foreach ($departmentInfos as $departmentInfo)
                <option value="{{ $departmentInfo->id }}" selected>{{ $departmentInfo->name }}</option>
            @endforeach
        @endif
    </select>
    @if (isset($departInfo))
        <input type="hidden" name="department_id" id="department_id" value="{{ @$departInfo->id }}">
    @endif
    @error('department_id')
        <span class="invalid-feedback"
              role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>


<script type="text/javascript">
    $(document).on('select change', '#faculty_id', function() {
        var faculty_id = $('#faculty_id').val();
        $.ajax({
            url: "{{ route('faculty_wise_department') }}",
            type: "GET",
            data: {
                faculty_id: faculty_id
            },
            success: function(data) {
                if (data != 'fail') {
                    $('#department_id').empty();
                    $('#department_id').append(
                        '<option value="0"{{ @$editData->department_id === 0 ? 'selected' : '' }}>All</option>'
                    );
                    $.each(data.facultyWiseDepartment, function(index, subcatObj) {
                        $('#department_id').append('<option value ="' + subcatObj.id + '">' + subcatObj.name + '</option>');
                    });
                } else {
                    console.log('failed');
                }
            }
        });
    });
</script>
