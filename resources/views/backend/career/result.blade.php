<div class="row">

    <div class="form-group col-sm-6">
        @php
        $carrerTitles = \App\Models\Career::all();
        @endphp
        <label for="career_id">@lang('Title') <span class="text-red">*</span></label>
        <select name="career_id" class="form-control select2" style="width: 100%;">
            <option value="">Please Select</option>
            @foreach ($carrerTitles as $carrerTitle)
            <option @if (!empty($editData) && $editData->career_id == @$carrerTitle->id) selected @endif
                value="{{ @$carrerTitle->id }}">{{ @$carrerTitle->title }}</option>
            @endforeach
        </select>
        @error('career_id')
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
</div>

<div class="row">
    <div class="form-group col-md-6">
        <label for="date">@lang('Publish Date')<span class="text-red">*</span></label>
        <input type="text" name="publish_date" class="form-control singledatepicker" value="{{ @$editData ? date('d-m-Y', strtotime(@$editData->publish_date)) : '' }}" placeholder="dd-mm-y" autocomplete="off">
        @error('publish_date')
        <span class="text-red">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group col-sm-6">
        <label for="status">@lang('Status') <span class="text-red">*</span></label>
        <select class="form-control" name="status">
            <option value="">Please Select</option>
            <option value="1" {{ @$editData->status == '1' ? 'selected' : '' }}>Active</option>
            <option value="0" {{ @$editData->status == '0' ? 'selected' : '' }}>Inactive</option>
        </select>
        @error('status')
        <span class="text-red">{{ $message }}</span>
        @enderror
    </div>
</div>