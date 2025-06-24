@extends('backend.layouts.app')
@section('content')
<style>
    .select2-container .select2-selection--single {
      height: 35px;
    }
  </style>
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          {{-- <h4 class="m-0 text-dark">{{ !empty($editData)? "Update":"Add" }} Personnels to Faculty</h4> --}}
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('Home')</a></li>
            <li class="breadcrumb-item active">@lang('Personnels to Faculty')</li>
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
          @if(isset($editData))
          @lang('Update') @lang('Personnels to Faculty')
          @else
          @lang('Add') @lang('Personnels to Faculty')
          @endif
          <a class="btn btn-sm btn-info float-right" href="{{route('manage_profile.personnels_to_faculty')}}"><i class="fa fa-list"></i> @lang('View') @lang('List')</a></h5>
      </div>
      <!-- Form Start-->
      <div class="card-body">
        <form method="post" action="{{(@$editData)?route('manage_profile.personnels_to_faculty.update',$editData->id):route('manage_profile.personnels_to_faculty.store')}}" id="myForm" enctype="multipart/form-data">
          @csrf
          <div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="profile_id">@lang('Personnels') <span class="text-red">*</span></label>
                @php
                  $personnelsToFacultiesIds = App\Models\PersonnelsToFaculty::whereNotNull('profile_id')->pluck('profile_id')->toArray();
                  // dd($personnelsToFacultiesIds);
                  if(!empty($editData))
                  {
                    $profiles = App\Models\Profile::all();
                  }
                  else {
                    $profiles = App\Models\Profile::whereNotIn('id', $personnelsToFacultiesIds)->get();
                    // dd($profiles->toArray());
                  }
                @endphp
                <select id="mySelect" @if(!empty($editData)) disabled @endif name="profile_id" class="form-control select2 @error('profile_id') is-invalid @enderror">
            
                  <option selected value="">@lang('Please Select') </option>
                   
                  @foreach ($profiles as $profile )
                      <option value="{{@$profile->id}}" {{(@$editData->profile_id == @$profile->id)?"selected":""}}>{{@$profile->nameEn}}</option>
                      
                  @endforeach
                  
                </select>
                  
                @if(!empty($editData))
              
                <input type="hidden" name="profile_id"  value="{{ $editData->profile_id }}">
                @endif
                @error('profile_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span> 
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="sort_order">@lang('Sort Order') <span class="text-red">*</span></label>
                <input id="sort_order" type="number" name="sort_order" class="form-control  @error('sort_order') is-invalid @enderror" value="{{@$editData->sort_order}}" placeholder="Sort Order">
                 @error('sort_order')
                 <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span> 
                 @enderror 
              </div>
              <div class="form-group col-md-6">
                <label for="faculty_id">@lang('Faculty Name') <span class="text-red">*</span></label>
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
                  // $faculties = App\Models\Faculty::all();
                @endphp
                <select id="faculty_id" 
                        name="faculty_id" 
                        class="form-control select2 @error('faculty_id') is-invalid @enderror"
                        @if (isset($facultyInfo)) disabled @endif 
                        @if (isset($departInfo)) disabled @endif 
                        >
                  <option selected value="">@lang('Please Select')</option>
                  @foreach ($faculties as $faculty )
                      <option value="{{@$faculty->id}}"  
                          @if (isset($facultyInfo) && ($faculty->id == $facultyInfo->id)) selected @endif 
                          @if (isset($departInfo) && ($faculty->id == $departInfo->faculty_id)) selected @endif 
                         {{(@$editData->faculty_id == @$faculty->id)?"selected":""}}>{{@$faculty->name}}</option>
                  @endforeach
                </select>
                @if (isset($facultyInfo))
                    <input type="hidden" name="faculty_id" id="faculty_id" value="{{ @$facultyInfo->id }}">
                @endif
                @if (isset($departInfo))
                    <input type="hidden" name="faculty_id" id="faculty_id" value="{{ @$departInfo->faculty_id }}">
                @endif
                  @error('faculty_id')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span> 
                  @enderror
              </div>
              <div class="form-group col-sm-6">

                @php
                if(!empty($editData) && !empty($editData->faculty_id))
                {
                    $departmentInfos = \App\Models\Department::where('faculty_id',$editData->faculty_id)->get();
                }
                if(isset($facultyInfo) && empty($editData)){
                    $departmentInfos = \App\Models\Department::where('faculty_id', $facultyInfo->id)->get();
                } elseif (isset($departInfo) && empty($editData)) {
                    $departmentInfos = \App\Models\Department::where('id', $departInfo->id)->get();
                }
                @endphp

                <label class="control-label">Department</label>
                    <select id="department_id" 
                        class="form-control form-control-sm select2" 
                        name="department_id"
                        @if (isset($departInfo)) disabled @endif >
                        <option selected value="">@lang('Please Select')</option>
                        @if(!empty($editData) && !empty($departmentInfos))
                            @foreach($departmentInfos as $departmentInfo)
                                <option @if( !empty($editData) && $editData->department_id == $departmentInfo->id) selected @endif value="{{ $departmentInfo->id }}">{{ $departmentInfo->name }}</option>                 
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
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span> 
                @enderror
            </div>
            
              {{-- <div class="form-group col-md-6">
                <label for="office_id">@lang('Office Name')</label>
                @php
                  $offices = App\Models\Office::all();
                @endphp
                <select name="office_id" class="form-control select2 @error('office_id') is-invalid @enderror">
                  <option disabled selected value="">@lang('Select')</option>
                  @foreach ($offices as $office )
                      <option value="{{@$office->ucam_office_id}}" {{(@$editData->office_id == @$office->ucam_office_id)?"selected":""}}>{{@$office->name}}</option>
                  @endforeach
                </select>
                  @error('office_id')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span> 
                  @enderror
              </div> --}}
            </div>
            <div class="form-row">
              <div class="form-group col-md-3">
                <button type="submit" class="btn btn-info">{{(@$editData)?"Update":"Save"}}</button>
              </div>
            </div>
          </div>
        </form>
        <!--Form End-->
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
    
    $(document).on('select change','#faculty_id',function(){
        var faculty_id = $('#faculty_id').val();
        console.log(faculty_id);
        $.ajax({
            url: "{{ route('faculty_wise_department') }}",
            type: "GET",
            data: { faculty_id: faculty_id },
            success: function(data)
            {
              if(data != 'fail')
              {
                $('#department_id').empty();
                    $('#department_id').append('<option selected value ="">Please Select Department</option>');
                    $.each(data.facultyWiseDepartment, function(index,subcatObj){
                        $('#department_id').append('<option value ="'+subcatObj.id+'">'+subcatObj.name +'</option>');
                    });
                }
                else
                {
                    console.log('failed');
                }
            }
        });
    });
  
</script>



<script type="text/javascript">
  $(document).ready(function() {
      $('textarea').each(function() {
          $(this).val($(this).val().trim());
      });

      $('#myForm').validate({
          ignore: [],
          debug: false,
          errorClass: 'text-danger',
          validClass: 'text-success',
          rules: {
            profile_id: {
                  required: true,
              },
              sort_order: {
                  required: true,
                  digits:true
              },
          
              faculty_id: {
                  required: true,
              }
          },
          messages: {
            profile_id: {
                  required: "Profile is required",
              },
              sort_order: {
                  required: "Sort Order is required",
                  digits: "Invalid Order",
              },
              
              faculty_id: {
                  required: "Faculty is required",
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
