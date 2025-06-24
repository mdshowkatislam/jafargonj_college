@extends('backend.layouts.app')
@section('content')
<div class="col-xl-12">
  <div class="breadcrumb-holder">
    <h2 class="main-title float-left" style="margin-top: 10px">Conference Member</h2>
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><strong>@lang('Home')</strong></a></li>
      <li class="breadcrumb-item active">@lang('Conference Member')</li>
    </ol>
    <div class="clearfix"></div>
  </div>
</div>

@if ($errors->any())
  @foreach ($errors->all() as $error)
  <script type="text/javascript">
    $(function () {
      $.notify("{{$error}}", {globalPosition: 'top right', className: 'error'});
    });
  </script>
  @endforeach
@endif

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Member Add
                    <a class="btn btn-sm btn-success float-right" href="{{route('conferences.member')}}"><i class="fa fa-plus-circle"></i> Show Conference Member</a>
                </h5>
           </div>

            <div class="card-body">
                <!-- Form for Add/Update -->
                <form action="{{ isset($editData) ? route('conferences.member.update', $editData->id) : route('conferences.member.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @if (isset($editData))
                        @method('POST') <!-- Add this for update requests -->
                    @endif

                    <input type="hidden" name="id" id="id" value="{{ @$editData->id ?? '' }}">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="member_type" class="form-label">Member Type <span class="text-danger">*</span></label>
                                <select class="form-control" id="member_type" name="member_type">
                                    <option value="1" {{ (isset($editData) && $editData->member_type == '1') ? 'selected' : '' }}>ORGANIZING COMMITTEE</option>
                                    <option value="2" {{ (isset($editData) && $editData->member_type == '2') ? 'selected' : '' }}>GUESTS & SPEAKERS</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="member_name" class="form-label">Member Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="member_name" name="member_name" value="{{ $editData->member_name ?? '' }}" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="designation_1" class="form-label">Designation 1 <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="designation_1" name="designation_1" value="{{ $editData->designation_1 ?? '' }}" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="designation_2" class="form-label">Designation 2</label>
                                <input type="text" class="form-control" id="designation_2" name="designation_2" value="{{ $editData->designation_2 ?? '' }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="designation_3" class="form-label">Designation 3</label>
                                <input type="text" class="form-control" id="designation_3" name="designation_3" value="{{ $editData->designation_3 ?? '' }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ $editData->phone ?? '' }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{ $editData->email ?? '' }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="1" {{ (isset($editData) && $editData->status == '1') ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ (isset($editData) && $editData->status == '0') ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <input type="text" class="form-control" id="description" name="description" value="{{ $editData->description ?? '' }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                                
                            </div>
                        </div>
                        <div class="col-sm-6">
                            @if (isset($editData) && $editData->image)
                                <img src="{{ asset('uploads/conference/' . $editData->image) }}" alt="{{ $editData->member_name }}" style="width: 100px; margin-top: 10px;">
                            @endif
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>

            </div>
        </div>
      </div>
  </div>
</div>
@endsection
