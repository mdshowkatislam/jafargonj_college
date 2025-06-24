@extends('backend.layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h4 class="m-0 text-dark">Financial Aid Update</h4>  --}}
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">@lang('Home')</a></li>
                        <li class="breadcrumb-item active">@lang('Edit')</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h5>
                        @lang('Update Financial Aid')
                    </h5>
                </div>
                <!-- Form Start-->
                <form id="myForm"
                      method="post"
                      action="{{ route('financial-aid.update', 1) }}"
                      id=""
                      enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-row">


                            <div class="form-group col-md-12">
                                <label for="">@lang('How aid works') <span class="text-red">*</span></label>
                                <textarea name="how_aid_works"
                                          class="textarea"
                                          cols="30"
                                          rows="10">
                                              @if (!empty($singleData))
{{ $singleData->how_aid_works }}
@endif
                                              </textarea>
                                @error('how_aid_works')
                                    <span class="invalid-feedback"
                                          role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label for="">@lang('Type of aids') <span class="text-red">*</span></label>
                                <textarea name="type_of_aids"
                                          class="textarea"
                                          cols="30"
                                          rows="10">
                                            @if (!empty($singleData))
{{ $singleData->type_of_aids }}
@endif
                                            </textarea>
                                @error('type_of_aids')
                                    <span class="invalid-feedback"
                                          role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label for="">@lang('Policies and procedures') <span class="text-red">*</span></label>
                                <textarea name="policies_and_procedures"
                                          class="textarea"
                                          cols="30"
                                          rows="10">
                                            @if (!empty($singleData))
{{ $singleData->policies_and_procedures }}
@endif
                                            </textarea>
                                @error('policies_and_procedures')
                                    <span class="invalid-feedback"
                                          role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label class="string optional"
                                       for="setting_Aid resource file">Aid resource file <small style="color: brown"> (Max 2
                                        mb, Preferred file: pdf,doc,docx,zip)</small> :
                                    @if (!empty($singleData))
                                        <a href="{{ asset('upload/financial_aids/' . $singleData->aid_file) }}">Download
                                            PDF</a>
                                    @endif

                                </label><br>
                                <div class="form-group file optional setting_file">

                                    <input class="form-control-file file optional"
                                           type="file"
                                           name="aid_file"
                                           id="setting_file">
                                    @error('aid_file')
                                        <span class="invalid-feedback"
                                              role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <button type="submit"
                                        class="btn btn-primary">{{ 'Update' }}</button>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
            <!--Form End-->
        </div>
    </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            //   $('textarea').each(function(){
            //     $(this).val($(this).val().trim());
            //   });
            $('#myForm').validate({
                ignore: [],
                debug: false,

                errorClass: 'text-danger',
                validClass: 'text-success',
                rules: {
                    how_aid_works: {
                        required: true,
                    },
                    aid_file: {

                        extension: "pdf|doc|zip"
                    },
                    type_of_aids: {
                        required: true
                    },
                    policies_and_procedures: {
                        required: true
                    }
                },

                messages: {
                    how_aid_works: {
                        required: "Please write How aid works"
                    },
                    type_of_aids: {
                        required: "Please Type is required."
                    },
                    policies_and_procedures: {
                        required: "Policies and procedures is required."
                    },
                    aid_file: {

                        extension: "Please upload file in these format only (pdf,doc,zip)."
                    }
                },
                errorElement: 'span',
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
