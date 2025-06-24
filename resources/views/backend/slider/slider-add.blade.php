@extends('backend.layouts.app') @section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                {{-- <h1 class="m-0 text-dark">{{ !empty($editData)? 'Update Slider' : 'Add Slider' }}</h1> --}}
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Slider Image</li>
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

        <div class="card card-outline card-info">
            <div class="card-header">
                <h5 class="m-0 text-dark float-left">{{ !empty($editData)? 'Update Slider Image' : 'Add Slider Image' }}</h5>
                <a href="{{route('site-setting.slider',$slider_master_id)}}" class="btn btn-info btn-sm float-right"><i class="fas fa-stream"></i> View Slider Image</a>
            </div>
            <div class="card-body">
                <form id="myForm" action="{{ !empty($editData)? route('site-setting.slider.update',$editData->id) : route('site-setting.slider.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <input name="slider_master_id" type="hidden" value="{{$slider_master_id}}">
                    <div class="form-row">

                        
                        <div class="form-group col-sm-5">
                            <label for="sort_order">@lang('Sort Order') <span class="text-red">*</span></label>
                            <input id="sort_order" type="number" name="sort_order" class="form-control  @error('sort_order') is-invalid @enderror" value="{{@$editData->sort_order}}" placeholder="" >
                             @error('sort_order')
                             <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span> 
                             @enderror 
                          </div>

                        <div class="form-group col-sm-5">
                            <label>Slider Image <small style="color: brown;">(Max 1mb - 600px X 1350px)</small><span class="text-red">*</span></label>
                            <input type="file" class="form-control filer_input_single @error('image') is-invalid @enderror" name="image"> @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>

                        <div class="col-sm-2">
                            <img src="{{ asset('upload/slider/' . @$editData['image']) }}" width="100%" height="auto" onerror="this.onerror=null;this.src='{{ asset('upload/no-image.png') }}';">
                        </div>

                        <div class="col-sm-3" style="margin-top: 15px;">
                            <div class="form-check" style="margin-left: 5px;">
                              <input type="checkbox" name="show_description" class="form-check-input" id="show_description" value="1" {{ @$editData->show_description == 1 ? 'checked':'' }}>
                              <label class="form-check-label" for="show_description">Show Text on Banner</label>
                            </div>
                        </div>



                        <div class="form-group col-sm-12">
                            <label>Text on Banner</label>

                            <input type="text" class="form-control" name="text_on_banner" value="{{ @$editData->text_on_banner }}">
                            
                                @error('text_on_banner')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>

                        {{-- <div class="form-group col-sm-12">
                            <label>Description</label>
                            <textarea type="text" class="form-control @error('description') is-invalid @enderror textarea " name="description">{{ !empty($editData->description)? $editData->description : old('description') }}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div> --}}

                        <button class="btn bg-gradient-success btn-flat"><i class="fas fa-save"></i> {{ !empty($editData)? 'Update Slider' : 'Save Slider' }}</button>
                    </div>
                </form>

            </div>

        </div>
        <!--/. container-fluid -->
    </section>

    <script type="text/javascript">
        $(document).ready(function () {
        //   $('textarea').each(function(){
        //     $(this).val($(this).val().trim());
        //   });
          $('#myForm').validate({
            rules: {
                sort_order: {
                required: true,
                digits:true,
              },
              <?php if(!@$editData){ ?>
                image: {
                    required: true,
                    extension: "jpg|jpeg|png"
                },
                <?php }else{ ?>
                    image: {
                        extension: "jpg|jpeg|png",
                    },
            <?php  } ?>
            },
    
            messages: {
                sort_order: {
                    required: "Sort Order is required.",
                    digits: "Order must be digits"
                },
                image: {
                    required: "Please Upload Image.",
                    extension: "Please upload file in these format only (jpg, jpeg, png)."
                }
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
              error.addClass('text-danger');
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
