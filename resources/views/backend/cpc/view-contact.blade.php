@extends('backend.layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0 text-dark">Add Document</h1> --}}
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item">CPC</li>
                        <li class="breadcrumb-item active">Contact</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content pb-3">
        <div class="container-fluid">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h5>CPC Contact Information</h5>
                </div>
                <div class="card-body">
                    <!-- Form Start-->
                    <form method="post" action="{{ !empty($editData->id) ? route('cpc.home.contact.update', $editData->id) : route('cpc.home.contact.store') }}" enctype="multipart/form-data" id="myForm">
                        @csrf
                        <div class="show_module_more_event">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="email">@lang('Email') <span class="text-red">*</span></label>
                                    <input id="email" type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ @$editData->email }}" placeholder="">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="phone">@lang('Phone') <span class="text-red">*</span></label>
                                    <input id="phone" type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ @$editData->phone }}" placeholder="">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="fax">@lang('Fax') <span class="text-red">*</span></label>
                                    <input id="fax" type="text" name="fax" class="form-control @error('fax') is-invalid @enderror" value="{{ @$editData->fax }}" placeholder="">
                                    @error('fax')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="location">@lang('Location') <span class="text-red">*</span></label>
                                    <input id="location" type="text" name="location" class="form-control @error('location') is-invalid @enderror" value="{{ @$editData->location }}" placeholder="">
                                    @error('location')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-2" style="">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        @if (isset($editData))
                                            @lang('Update')
                                        @else
                                            @lang('Save')
                                        @endif
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!--Form End-->
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        $(document).ready(function() {
            //   $('textarea').each(function(){
            //     $(this).val($(this).val().trim());
            //   });
            $('#myForm').validate({
                rules: {
                 
                    email: {
                        required: true,
                    },
                   
                    phone: {
                        required: true,
                    },
                   
                    fax: {
                        required: true,
                    },
                   
                    location: {
                        required: true,
                    }
                   
                },

                messages: {
                   phone : {
                        required: "Phone is required."
                    },
                    fax: {
                        required: "Fax is required."
                    },
                    location: {
                        required: "location is required."
                    },
                    email: {
                        required: "Email is required."
                    }
                },
               // errorElement: 'span',
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
