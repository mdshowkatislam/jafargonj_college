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
          {{-- <h4 class="m-0 text-dark">{{ !empty($editData)? "Update":"Add" }} Personnels to Office</h4> --}}
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('Home')</a></li>
            <li class="breadcrumb-item active">@lang('Personnels to Office')</li>
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
          @lang('Update') @lang('Personnels to Office')
          @else
          @lang('Add') @lang('Personnels to Office')
          @endif
          <a class="btn btn-sm btn-info float-right" href="{{route('manage_profile.personnels_to_office')}}"><i class="fa fa-list"></i> @lang('View') @lang('List')</a></h5>
      </div>
      <!-- Form Start-->
      <div class="card-body">
        <form method="post" action="{{(@$editData)?route('manage_profile.personnels_to_office.update',$editData->id):route('manage_profile.personnels_to_office.store')}}" id="myForm" enctype="multipart/form-data">
          @csrf
          <div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="profile_id">@lang('Personnels') <span class="text-red">*</span></label>
                @php
                  $personnelsToOfficesIds = App\Models\PersonnelsToOffice::pluck('profile_id');
                
                  // if(!empty($editData))
                  // {
                    $profiles = App\Models\Profile::all();
                 
                  // }
                  // else {
                  //   $profiles = App\Models\Profile::whereNotIn('id',$personnelsToOfficesIds)->get();
                  // }
                  //dd($editData);
                @endphp
                <select @if(!empty($editData)) disabled @endif name="profile_id" id="profile_id" class="form-control select2 @error('profile_id') is-invalid @enderror">
                  <option selected value="">@lang('Please Select')</option>
                  @foreach ($profiles as $profile )            
                      <option value="{{@$profile->id}}" {{(@$editData->profile_id == @$profile->id)? "selected" : "" }}>{{@$profile->nameEn}}</option>
                  @endforeach
                </select>
                @if(!empty($editData))
                <input type="hidden" name="profile_id" value="{{ $editData->profile_id }}">
                @endif
                @error('profile_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span> 
                @enderror
              </div>
              
              <div class="form-group col-sm-6">
                <label>Designation</label>
                <input type="text" class="form-control @error('designation_id') is-invalid @enderror"
                    name="designation_id" id="designation_id" autocomplete="off"
                    value="{{ !empty($editData->designation_id) ? $editData->designation_id : old('designation_id') }} "
                    readonly>
                @error('designation_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group col-md-6">
                <label for="office_id">@lang('Office Name') <span class="text-red">*</span></label>
                @php
                  $offices = App\Models\Office::all();
                @endphp
                <select name="office_id" class="form-control select2 @error('office_id') is-invalid @enderror">
                  <option selected value="">@lang('Please Select')</option>
                  @foreach ($offices as $office)
                      <option value="{{@$office->id}}" {{(@$editData->office_id == @$office->id)?"selected":""}}>{{@$office->name}}</option>
                  @endforeach
                </select>
                  @error('office_id')
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
                <label for="additional_charge">Designations </label>
                <input id="designations" type="text" name="designations" class="form-control  @error('designations') is-invalid @enderror" value="{{@$editData->designations}}" placeholder="">
                 @error('designations')
                 <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span> 
                 @enderror 
              </div>

              <div class="form-group col-md-6">
                <label for="additional_charge">Additional Designation 1</label>
                <input id="additional_charge" type="text" name="additional_charge" class="form-control  @error('additional_charge') is-invalid @enderror" value="{{@$editData->additional_charge}}" placeholder="">
                 @error('additional_charge')
                 <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span> 
                 @enderror 
              </div>

              <div class="form-group col-md-6">
                <label for="additional_designation">Additional Designation 2</label>
                <input id="additional_designation" type="text" name="additional_designation" class="form-control  @error('additional_designation') is-invalid @enderror" value="{{@$editData->additional_designation}}" placeholder="">
                 @error('additional_designation')
                 <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span> 
                 @enderror 
              </div>

            </div>
            <div class="form-row mt-2">
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
              office_id: {
                  required: true,
              },
              sort_order: {
                  required: true,
                  digits:true
              }
          },
          messages: {
            profile_id: {
                  required: "Profile is required",
              },
              office_id: {
                  required: "Office is required",
              },
              sort_order: {
                  required: "Sort Order is required",
            
                  digits: "Invalid Order",
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

<script type="text/javascript">
  $('#additional_charge').click(function() {
      if ($(this).is(':checked')) {
          $('#additional_designation_div').show();
      } else {
          $('#additional_designation_div').hide();
      }
  });
</script>
<script type="text/javascript">
  $(function() {
      $('#profile_id').trigger('change');
  });

  $(document).on('select change', '#profile_id', function() {
      var profile_id = $('#profile_id').val();
      console.log(profile_id);
      $.ajax({
          url: "{{ route('person_wise_designation') }}",
          type: "GET",
          data: {
            profile_id: profile_id
          },
          success: function(data) {
              console.log(data);
              if (data != 'fail') {
                  $("#designation_id").val(data);
              } else {
                  // $("#designation_id").val(data);
                  $('#designation_id').append('');
                  //console.log('failed');
              }
          }
      });
  });
</script>

@endsection
