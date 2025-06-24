@extends('backend.layouts.app') @section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Update {{ $document_type }} Document</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Update {{ $document_type }} Document</li>
                </ol>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->



<section class="content">
    <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                <a href="{{route('manage_document', $editData->type_id)}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> View {{ $document_type }} Document</a>
            </div>
            <div class="card-body">
                <form id="myForm" action="{{ route('manage_document.update', $editData->id) }} " method="post" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label>Title <span class="text-red">*</span></label>
                            <input id="title" type="text" value="{{$editData->title}}" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Write a title"> @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Document Type <span class="text-red">*</span></label>
                            <select class="select2 form-control @error('type_id') is-invalid @enderror" name="type_id" disabled>
                                <option value="">--Select Type--</option>
                                <option  value="1" {{ $editData->type_id == 1 ? 'selected' : '' }}>IQAC</option>
                                <option  value="2" {{ $editData->type_id == 2 ? 'selected' : '' }}>CPC</option>
                                <option  value="3" {{ $editData->type_id == 3 ? 'selected' : '' }}>Club</option>
                                <option  value="4"  {{ $editData->type_id == 4 ? 'selected' : '' }}>OEFCD</option>
                                <option  value="5"  {{ $editData->type_id == 5 ? 'selected' : '' }}>OEFCD</option>
                            </select>
                            <input id="type_id" type="text" value="{{ $editData->type_id }}" placeholder="Write a title"  class="form-control" name="type_id" hidden> 
                            @error('type_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div id="club_div" class="form-group col-md-6" style="display:{{ @$type_id == 3 || @$editData->type_id == 3 ? '' : 'none' }}">
                            <label for="">@lang('Club') <span class="text-red">*</span></label>
                            <select id="" name="club_id" class="form-control select2">
                                {{-- <option value="">Select</option> --}}
                                @foreach ($clubs as $club)
                                    <option value="{{ $club->id }}" {{ @$editData->type_id == 3 && @$editData->ref_id == $club->id ? 'selected' : '' }}>
                                        {{ @$club->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-sm-6">
                            <label>Status <span class="text-red">*</span></label>
                            <select class="select2 form-control @error('status') is-invalid @enderror" name="status"
                                id="status">
                                <option value="">Please Select</option>
                                <option value="1" @if ($editData->status == 1) selected @endif>Active</option>
                                <option value="0" @if ($editData->status == 0) selected @endif>Inactive</option>
                            </select>
                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-sm-6">
                            <label>Image <small style="color: red"> (Max: 1 mb)</small></label>
                            <input id="image" type="file" value="" class="form-control @error('image') is-invalid @enderror" name="image" >
                            <img height="50px" src="{{asset('storage/app/media/trainingimage/'.@$editData->image)}}" alt="">
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>

                        <div class="form-group col-sm-6">
                            <label>Document</label>
                            <input id="document" type="file" value="" class="form-control @error('document') is-invalid @enderror" name="document" >
                            <a href="{{asset('storage/app/media/training/'.$editData->document)}}" alt="_blank"><img style="cursor: pointer" height="30px" src="{{asset('storage/app/media/training/pdf.png')}}" alt=""></a>
                            @error('document')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                         </div>
                    <button class="btn bg-gradient-success btn-flat"><i class="fas fa-save"></i> Update Document</button>
                </form>

            </div>

        </div>
        <!--/. container-fluid -->
    </section>
    <script type="text/javascript">
        $(function() {
            $('#tour_name').on('keyup', function() {
                var Text = $(this).val();
                Text = Text.toLowerCase();
                Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');
                $("#tour_slug").val(Text);
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            //   $('textarea').each(function(){
            //     $(this).val($(this).val().trim());
            //   });
            $('#myForm').validate({
                rules: {
                    title: {
                        required: true,
                    },
                    type_id:{
                        required: true,
                    },
                     
                     @if (!@$editData)
                        image: {
               
                            extension: "jpg|jpeg|png"
                        },
                        @else 
                        image: {
                            extension: "jpg|jpeg|png",
                        },
                    @endif
                    status: {
                        required: true
                    },
                    document: {
                        extension: "pdf|doc|docx",
                    }
                },

                messages: {
                    title: {
                        required: "Title is required."
                    },
                    type_id: {
                        required: "TYPE ID is required."
                    },               
                    status: {
                        required: "Status is required."
                    },
                    image: {
                      
                        extension: "Please upload file in these format only (jpg, jpeg, png)."
                    },
                    document: {
                      
                        extension: "Please upload file in these format only (pdf,doc,docx)."
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
