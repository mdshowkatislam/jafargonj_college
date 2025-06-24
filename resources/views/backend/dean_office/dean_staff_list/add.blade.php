@extends('backend.layouts.app')
@section('content')
<style type="text/css">
  .i-style {
    display: inline-block;
    padding: 10px;
    width: 2em;
    text-align: center;
    font-size: 2em;
    vertical-align: middle;
    color: #444;
  }

  .demo-icon {
    cursor: pointer;
  }
</style>
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h4 class="m-0 text-dark">Dean's Staff Add</h4>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">@lang('Home')</a></li>
          <li class="breadcrumb-item active">@lang('Create')</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h5>
          @if(isset($editData))
          @lang('') @lang('Update')
          @else
          @lang('New') @lang('Add')
          @endif
          <a class="btn btn-sm btn-success float-right"
            href="{{route('dean-office.staff_list',$faculty_id)}}"><i class="fa fa-list"></i> @lang('Dean
            Staff') @lang('Lists')</a>
        </h5>
      </div>
      <!-- Form Start-->
      <form method="post"
        action="{{(@$editData) ? route('dean-office.staff_list.update',$editData->id) : route('dean-office.staff_list.store')}}"
        id="" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
          <div class="form-row">
            <input type="hidden" name="faculty_id" value="{{ $faculty_id }}">

            <div class="form-group col-sm-4">
              <label>Member</label>
              <select name="profile_id" id="profile_id" class="form-control select2">
                <option value=""> Please Select</option>
                @foreach ($members as $member)
                <option value="{{ $member->id }}" {{ @$editData->profile_id == $member->id ? 'selected' :
                  '' }}> {{ $member->nameEn }}
                </option>
                @endforeach

              </select>
            </div>
            <div class="form-group col-sm-4">
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
            <div class="col-sm-4" style="margin-top: 35px;">
              <div class="form-check" style="margin-left: 5px;">
                <input type="checkbox" name="additional_charge" class="form-check-input" id="additional_charge"
                  style="margin-top: 6px;" {{ @$editData->additional_charge ==
                1 ? 'checked' : '' }}>
                <label class="form-check-label" for="additional_charge">Is Additional Charge?</label>
              </div>
            </div>
            <div class="form-group col-sm-4">
              <label>Sort Order</label>
              <input id="sort_order" type="number" value="{{ @$editData->sort_order }}"
                class="form-control @error('sort_order') is-invalid @enderror" name="sort_order"
                placeholder="Sort Order" required> @error('sort_order')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span> @enderror
            </div>
            <div class="form-group col-sm-4">
              <label>Status</label>
              <select name="status" class="form-control select2">
                <option value="">Select Type</option>
                <option {{ @$editData->status == 1 ? 'selected' : '' }} value="1">Active</option>
                <option {{ @$editData->status == '0' ? 'selected' : '' }} value="0">Inactive</option>

              </select>
            </div>
            <div class="form-group col-sm-4" id="additional_designation_div"
              style="display: {{ @$editData->additional_charge == 0 ? 'none': 'block' }}">
              <label>Additional Designation</label>
              <input id="additional_designation" type="text" value="{{ @$editData->additional_designation }}"
                class="form-control @error('additional_designation') is-invalid @enderror" name="additional_designation"
                placeholder="Write Designation">
              @error('additional_designation')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-3">
              <button type="submit" class="btn btn-primary">{{(@$editData)?"Update":"Submit"}}</button>
            </div>
          </div>
        </div>
    </div>
    </form>
  </div>
</div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
      var a1 = CKEDITOR.replace('description');
      CKFinder.setupCKEditor( a1, '/ckfinder/' );
      var a1 = CKEDITOR.replace('mission');
      CKFinder.setupCKEditor( a1, '/ckfinder/' );
      var a1 = CKEDITOR.replace('vision');
      CKFinder.setupCKEditor( a1, '/ckfinder/' );
    });
</script>
{{-- <script>
  $('#faculty_id').on('change',function() {
        var faculty_id = $(this).val();
        var url = "{{route('get-department','')}}"+"/"+faculty_id;
            $.ajax({
                url:url,
                type:'get',
                dataType:'json',
                success:function(data){
                    if(data){
                        $('#department_id').empty();
                        $('#department_id').append('<option hidden>Choose Department</option>');
                        $.each(data, function(key, department){
                            console.log(key)
                            $('select[name="department_id"]').append('<option value="'+ department.id+'">' + department.name+ '</option>');
                        });

                    }else{
                        $('#department_id').empty();
                    }
                }
            });
        });
</script> --}}
<script type="text/javascript">
  $('#additional_charge').click(function(){
            if($(this).is(':checked')){
                $('#additional_designation_div').show();
            } else {
                $('#additional_designation_div').hide();
            }
        });
</script>
<script>
  $(document).on('select change', '#profile_id', function() {
      var profile_id = $('#profile_id').val();
      $.ajax({ 
          url: "{{ route('member_wise_designation') }}",
          type: "GET",
          data: {
            member_id: profile_id
          },
          success: function(data) {
              console.log(data);
              if (data != 'fail') {
                  $("#designation_id").val(data);
              } else {
                  $('#designation_id').append('');
              }
          }
      });
  });
</script>
{{-- <script type="text/javascript">
  $(document).on('select change','#faculty_id',function(){
        var faculty_id = $('#faculty_id').val();
        console.log(faculty_id);
        $.ajax({
            url: "{{ route('faculty_wise_department') }}",
            type: "GET",
            data: { faculty_id: faculty_id },
            success: function(data)
            {
                console.log(data);
                if(data != 'fail')
                {
                    $('#department_id').empty();
                    $('#department_id').append('<option disabled selected value ="">Select Department</option>');
                    $.each(data,function(index,subcatObj){
                        $('#department_id').append('<option value ="'+subcatObj.ucam_department_id+'">'+subcatObj.name +'</option>');
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
        $('#image').change(function (e) { //show Image before upload
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#showImage').attr('src', e.target.result);
            };
            reader.readAsDataURL(e.target.files[0]);
        });
    });
</script> --}}

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
          name: {
            required: true,
          },
        },
        messages: {

        },
        errorElement: 'span',
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

@endsection