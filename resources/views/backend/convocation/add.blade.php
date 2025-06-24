@extends('backend.layouts.app')
@section('content')

<section class="content">
<div class="container">
    <h1 class="mb-4">{{ isset($convocation) ? 'Edit Convocation' : 'Create Convocation' }}</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ isset($convocation) ? route('news.convocation.update', $convocation->id) : route('news.convocation.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        @if(isset($convocation))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $convocation->title ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="short_description" class="form-label">Short Description</label>
            <input type="text" id="short_description" name="short_description" class="form-control" value="{{ old('short_description', $convocation->short_description ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="long_description" class="form-label">Long Description</label>
            <textarea id="long_description" name="long_description" class="form-control textarea">
                {{ old('long_description', $convocation->long_description ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="data1" class="form-label">Who Can Register</label>
            <textarea id="data1" name="data1" class="form-control textarea">{{ old('data1', $convocation->data1 ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="data2" class="form-label">How To Register</label>
            <textarea id="data2" name="data2" class="form-control textarea">{{ old('data1', $convocation->data2 ?? '') }}</textarea>
        </div>
      
        <div class="mb-3">
            <label for="data3" class="form-label">Committees</label>
            <textarea id="data3" name="data3" class="form-control textarea">{{ old('data3', $convocation->data3 ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="data4" class="form-label">Special Instruction</label>
            <textarea id="data4" name="data4" class="form-control textarea">{{ old('data4', $convocation->data4 ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="data5" class="form-label">Frequently Asked Questions</label>
            <textarea id="data5" name="data5" class="form-control textarea">{{ old('data5', $convocation->data5 ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="data6" class="form-label">Contact us</label>
            <textarea id="data6" name="data6" class="form-control textarea">{{ old('data6', $convocation->data6 ?? '') }}</textarea>
        </div>
      
        <div class="row">
            <div class="col-sm-6">
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select id="status" name="status" class="form-control">
                        <option value="1" {{ old('status', $convocation->status ?? '1') == '1' ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('status', $convocation->status ?? '1') == '0' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-3">
                    <label for="registration_status" class="form-label">Registration Status</label>
                    <select id="registration_status" name="registration_status" class="form-control">
                        <option value="1" {{ old('registration_status', $convocation->registration_status ?? '1') == '1' ? 'selected' : '' }}>Open</option>
                        <option value="0" {{ old('registration_status', $convocation->registration_status ?? '1') == '0' ? 'selected' : '' }}>Closed</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="registration_link" class="form-label">Registration Link</label>
            <input type="text" id="registration_link" name="registration_link" class="form-control" value="{{ old('registration_link', $convocation->registration_link ?? '') }}">
        </div>

        <!-- Existing fields here -->

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" id="data10" name="data10" class="form-control">
            @if(isset($convocation) && $convocation->data10)
                <div class="mt-2">
                    <img src="{{ asset('uploads/' . $convocation->data10) }}" alt="Current Image" style="max-height: 150px;">
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">{{ isset($convocation) ? 'Update' : 'Create' }}</button>
        <a href="{{ route('news.convocation.list') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</section>

@endsection