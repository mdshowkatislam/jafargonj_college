@extends('backend.layouts.app')
@section('content')
<style type="text/css">
  .i-style{
        display: inline-block;
        padding: 10px;
        width: 2em;
        text-align: center;
        font-size: 2em;
        vertical-align: middle;
        color: #444;
  }
  .demo-icon{cursor: pointer; }
</style>
<style>
  /* body {font-family: Arial;} */

  /* Style the tab */
  .tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color:#d9e4d5;
  }

  /* Style the buttons inside the tab */
  .tab a {
    background-color: #d9e4d5;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
  }

  /* Change background color of buttons on hover */
  .tab a:hover {
    background-color: #97d182;
  }

  /* Create an active/current tablink class */
  .tab a.active {
    background-color: #afdfc4;
  }
</style>
<style>
    .select2-container .select2-selection--single {
      height: 35px;
    }
  </style>
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          {{-- <h4 class="m-0 text-dark">{{ !empty($editData)? "Update":"Add" }} Profile</h4> --}}
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('Home')</a></li>
            <li class="breadcrumb-item active">@lang('Profile')</li>
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
          @lang('Update') @lang('Profile')
          @else
          @lang('Add') @lang('Profile')
          @endif
          <a class="btn btn-sm btn-info float-right" href="{{route('manage_profile.from_database')}}"><i class="fa fa-list"></i> @lang('Profile') @lang('List')</a>
          @if (@$editData->id && (Auth::user()->profile_id == $editData->id))
          <a class="btn btn-sm btn-info float-right mx-2" href="{{ route('department_member_deatils', $editData->id)}}" target="_blank">View Profile</a>
          @endif
        </h5>
        </div>
      <!-- Form Start-->
      @if(@$editData)
      <div class="tab">
        {{-- <button class="tablinks active" onclick="openCity(event, 'basic_info')">Basic Info</button>
        <button class="tablinks" onclick="openCity(event, 'journal_info')">Journal</button> --}}
        <a class="tablinks active" style="color: black;">Basic Info</a>
        @if(@$editData)
        <a class="tablinks" href="{{ route('profile_journal_info_edit',@$editData->id) }}" style="color: black;">Journal</a>
        {{-- @else
        <a class="tablinks" href="{{ route('profile_journal_info_add') }}" style="color: black;">Journal</a> --}}
        @endif
        @if(@$editData)
        <a class="tablinks" href="{{ route('profile_conference_info_edit',@$editData->id) }}" style="color: black;">Conference</a>
        @endif
        @if(@$editData)
        <a class="tablinks" href="{{ route('profile_book_info_edit',@$editData->id) }}" style="color: black;">Book</a>
        @endif
        @if(@$editData)
        <a class="tablinks" href="{{ route('profile_biography_info_edit',@$editData->id) }}" style="color: black;">Biography</a>
        @endif
        @if(@$editData)
        <a class="tablinks" href="{{ route('profile_professional_activity_info_edit',@$editData->id) }}" style="color: black;">Professional Activity</a>
        @endif
        @if(@$editData)
        <a class="tablinks" href="{{ route('profile_course_taught_info_edit',@$editData->id) }}" style="color: black;">Course Taught</a>
        @endif
        @if(@$editData)
        <a class="tablinks" href="{{ route('profile_award_honor_info_edit',@$editData->id) }}" style="color: black;">Award Honor</a>
        @endif
        @if(@$editData)
        <a class="tablinks" href="{{ route('profile_membership_info_edit',@$editData->id) }}" style="color: black;">Membership</a>
        @endif
        @if(@$editData)
        <a class="tablinks" href="{{ route('profile_research_area_interest_info_edit',@$editData->id) }}" style="color: black;">Research Area Interest</a>
        @endif

        @if(@$editData)
        <a class="tablinks" href="{{ route('profile_training_info_edit',@$editData->id) }}" style="color: black;">Training</a>
        @endif

        @if(@$editData)
        <a class="tablinks" href="{{ route('profile_achievement_info_edit',@$editData->id) }}" style="color: black;">Achievement</a>
        @endif
        
        {{-- @if(@$editData)
        <a class="tablinks" href="{{ route('profile_google_scholar_info_edit',@$editData->id) }}" style="color: black;">Google Scholar</a>
        @endif
        @if(@$editData)
        <a class="tablinks" href="{{ route('profile_research_gate_info_edit',@$editData->id) }}" style="color: black;">Research Gate</a>
        @endif
        @if(@$editData)
        <a class="tablinks" href="{{ route('profile_website_info_edit',@$editData->id) }}" style="color: black;">Website</a>
        @endif --}}
        @if(@$editData)
        <a class="tablinks" href="{{ route('profile_Social_media_info_edit',@$editData->id) }}" style="color: black;">Social Media Link</a>
        @endif
      </div>
      @endif
      <div class="card-body">
        <form method="post" action="{{(@$editData)?route('manage_profile.from_database.update',$editData->id):route('manage_profile.from_database.store')}}" id="myForm" enctype="multipart/form-data">
          @csrf
          <div id="basic_info" class="tabcontent">
            @if(@$editData)
            <h4>Basic Info</h4>
            @endif
            <div class="form-row">
             
              <div class="form-group col-md-6">
                <label for="bup_no">@lang('Butex No') </label>
                <input id="bup_no" type="text" name="butex_no" class="form-control  @error('butex_no') is-invalid @enderror" value="{{@$editData->butex_no}}" placeholder="">
                  @error('butex_no')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="nameEn">@lang('Name (English)') <span class="text-red">*</span></label>
                <input id="nameEn" type="text" name="nameEn" class="form-control  @error('nameEn') is-invalid @enderror" value="{{@$editData->nameEn}}" placeholder="">
                  @error('nameEn')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="nameBn">@lang('Name (Bangla)')</label>
                <input id="nameBn" type="text" name="nameBn" class="form-control  @error('nameBn') is-invalid @enderror" value="{{@$editData->nameBn}}" placeholder="">
                  @error('nameBn')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="email">@lang('Email') <span class="text-red">*</span></label>
                <input id="email" type="text" name="email" class="form-control  @error('email') is-invalid @enderror" value="{{@$editData->email}}" placeholder="">
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="designation">@lang('Designation')</label>
                <input id="designation" type="text" name="designation" class="form-control  @error('designation') is-invalid @enderror" value="{{@$editData->designation}}" placeholder="">
                  @error('designation')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>
             
              <div class="form-group col-md-6">
                <label for="phone">@lang('Phone') <span class="text-red">*</span></label>
                <input id="phone" type="text" name="phone" class="form-control  @error('phone') is-invalid @enderror" value="{{@$editData->phone}}" placeholder="">
                  @error('phone')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>
              
              <div class="form-group col-md-6">
                <label for="mobile">@lang('Mobile')</label>
                <input id="mobile" type="text" name="mobile" class="form-control  @error('mobile') is-invalid @enderror" value="{{@$editData->mobile}}" placeholder="">
                  @error('mobile')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="phone">@lang('Office Telephone')</label>
                <input id="phone" type="text" name="office_telephone" class="form-control  @error('office_telephone') is-invalid @enderror" value="{{@$editData->office_telephone}}" placeholder="Enter office telephone number">
                  @error('office_telephone')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="phone">@lang('Office Extension')</label>
                <input id="phone" type="text" name="office_extension" class="form-control  @error('office_extension') is-invalid @enderror" value="{{@$editData->office_extension}}" placeholder="Enter office Extension">
                  @error('office_extension')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="blood_group">@lang('Blood Group')</label>
                <input id="blood_group" type="text" name="blood_group" class="form-control  @error('blood_group') is-invalid @enderror" value="{{@$editData->blood_group}}" placeholder="">
                  @error('blood_group')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="rank">@lang('Personnel Type') <span class="text-red">*</span></label>
                <!-- <input id="rank" type="text" name="rank" class="form-control  @error('rank') is-invalid @enderror" value="{{@$editData->rank}}" placeholder=""> -->
                <select id="personnel_type" class="form-control form-control-sm select2" name="personnel_type" required>
                    <option value="1">Faculty</option>
                    <option value="2">Office</option>
                    <option value="3">Others</option>
                </select>
                  @error('personnel_type')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="appointment_type">@lang('Appointment Type')</label>
                <input id="appointment_type" type="text" name="appointment_type" class="form-control  @error('appointment_type') is-invalid @enderror" value="{{@$editData->appointment_type}}" placeholder="">
                  @error('appointment_type')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="detail_education">@lang('Detail Education')</label>
                <textarea id="detail_education" name="detail_education" class="form-control  @error('detail_education') is-invalid @enderror">{{@$editData->detail_education}}</textarea>
                  @error('detail_education')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="experience">@lang('Experience')</label>
                <textarea id="experience" name="experience" class="form-control  @error('experience') is-invalid @enderror">{{@$editData->experience}}</textarea>
                  @error('experience')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>
              <div class="form-group col-md-3">
                <label for="photo">@lang('New Photo')</label>
                <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror" id="photo">
                @error('photo')
                <span class="text-red">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group col-md-3">
                {{-- @if(explode("/",@$editData->photo_path)[0] == "http:" || explode("/",@$editData->photo_path)[0] == "https:")
                    <img src="{{$editData->photo ? asset('upload/profiles/'.@$editData->photo) : @$editData->photo_path}}" style="height: 80px; width: 80px;">
                @else --}}
                    <img id="personalImg" src="{{asset('upload/profiles/'.@$editData->photo) }}" style="height: 160px; width: 160px;">
                {{-- @endif --}}
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-3">
                <button type="submit" class="btn btn-info">{{(@$editData)?"Update":"Save"}}</button>
              </div>
            </div>
          </div>
        </form>
        <form method="post" action="" id="" enctype="multipart/form-data">
          @csrf
          <div id="education_info" class="tabcontent">
            <h4>Education Info</h4>
          </div>
        </form>
        <!--Form End-->
      </div>
    </div>
  </div>
</div>

    {{-- For tab content --}}
    <script>
      $(document).ready(function(){

          // openCity(event, 'basic_info');

          var i, tabcontent, tablinks;
          tabcontent = document.getElementsByClassName("tabcontent");
          for (i = 0; i < tabcontent.length; i++) {
              tabcontent[i].style.display = "none";
          }
          document.getElementById("basic_info").style.display = "block";

      });

      function openCity(evt, cityName) {
          console.log(evt);
          var i, tabcontent, tablinks;
          tabcontent = document.getElementsByClassName("tabcontent");
          for (i = 0; i < tabcontent.length; i++) {
              tabcontent[i].style.display = "none";
          }
          tablinks = document.getElementsByClassName("tablinks");
          for (i = 0; i < tablinks.length; i++) {
              tablinks[i].className = tablinks[i].className.replace(" active", "");
          }
          document.getElementById(cityName).style.display = "block";
          evt.currentTarget.className += " active";
      }
  </script>
  {{-- End For tab content --}}

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
                //console.log(data);
                if(data != 'fail')
                {
                    $('#department_id').empty();
                    $('#department_id').append('<option disabled selected value ="">Select Department</option>');
                    $.each(data,function(index,subcatObj){
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
    $(document).ready(function(){
      var a1 = CKEDITOR.replace('long_title_en');
      CKFinder.setupCKEditor( a1, '/ckfinder/' );
      var a1 = CKEDITOR.replace('long_title_bn');
      CKFinder.setupCKEditor( a1, '/ckfinder/' );
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function () {
      $('textarea').each(function(){
              $(this).val($(this).val().trim());
          }
      );

      $('#myForm').validate({
        ignore : [],
        debug : false,
        rules: {
          butex_no: {
            required: true,
          },
          nameEn: {
            required: true,
          },
          email: {
            required: true,
            maxlength : 20, 
             email : true,
          },
          phone: {
            required: true,
             rangelength: [11, 12],
              number: true
          },
          personnel_type: {
            required: true,
          
          },
          
        },
        messages: {
          butex_no: {
            required: "Butex Number is required",
        }
          nameEn: {
            required: "English Name is required",
        }
          email: {
            required: "Email is required",
             email : 'Enter Valid Email Detail',
            maxlength : 'Email should not be more than 20 character'
        }
          phone: {
            required: "Please Enter Valide Contact",
             rangelength: 'Contact should be 11 digit number.'
        }
          personnel_type: {
            required: "Please Enter Personnel Type",
             
        }
        }, 
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
  </script>

<script type="text/javascript">
  $(document).ready(function(){
      $('#photo').change(function (e) { //show Image before upload
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#personalImg').attr('src', e.target.result);
          };
          reader.readAsDataURL(e.target.files[0]);
      });
  });
</script>

@endsection
