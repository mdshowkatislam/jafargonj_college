<div class="row">
    <div class="form-group col-md-6">
        <label for="inputTitle">Form Title</label>
        <input id="inputTitle" type="text" name="title" value="{{ @$editData->title }}" class="form-control" autocomplete="on">
        @error('title')
        <span class="text-red">{{ $message }}</span>
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
