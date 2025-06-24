@extends('backend.layouts.app')
@section('content')

<style src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css"></style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script src="https://formbuilder.online/assets/js/form-builder.min.js"></script>

<style>
    body{
       padding: 0;
       margin: 10px 0;
       background: #f2f2f2 url('https://formbuilder.online/assets/img/noise.png');
    }

    .save-template{
        display: none !important;
    }

    .get-data{
        display: none !important;
    }

    .clear-all{
        width: 200px !important;
        border-radius: 10px !important;
    }

    .className-wrap{
        display: none !important;
    }

    .description-wrap{
        display: none !important;
    }

    .name-wrap{
        display: none !important;
    }

    .access-wrap{
        display: none !important;
    }

    .value-wrap{
        display: none !important;
    }

    .maxlength-wrap{
        display: none !important;
    }

    .style-wrap{
        display: none !important;
    }

    .min-wrap{
        display: none !important;
    }

    .max-wrap{
        display: none !important;
    }

    .step-wrap{
        display: none !important;
    }

    .inline-wrap{
        display: none !important;
    }

    .other-wrap{
        display: none !important;
    }

    /* .multiple-wrap{
        display: none !important;
    } */

    .input-control-0{
        display: none !important;
    }

    .input-control-2{
        display: none !important;
    }
</style>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          {{-- <h1 class="m-0 text-dark">Manage Banner</h1> --}}
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{ url('site-settings/butex_form_builder') }}">Back to Form Builder Home</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<section class="">
    <div class="container shadow-sm">
        <div class="d-flex">
            <div class="flex-grow-1">
                <h2>Butex Form Builder</h2>
            </div>
            <div class="me-auto">
                @if ($userData >= 1)
                    <button type="button" class="btn btn-success restrict mt-2 mb-3">Update Form</button>
                @else
                    <button type="button" class="btn btn-success update mt-2 mb-3" data-title="{{ @$Template->title }}" data-toggle="modal" data-target="#update">Update Form</button>
                @endif
                <a href="{{ url('site-settings/butex_form_builder') }}">
                    <button type="button" class="btn btn-danger update mt-2 mb-3">Back</button>
                </a>
                
            </div>
        </div>
        <div id="build-wrap" @if ($userData >= 1) class="restrict" @endif>
           
        </div>
        {{-- <button id="save-form" class="btn btn-primary mt-2 mb-3">Save Form</button> --}}
    </div>
</section>

@include('backend.butex_form_builder.update-modal')

<script>
    $('.update').click(function() {
        var title     = $(this).data('title');
        $('.title').val(title);
    });

     $('.restrict').click(function() {
        toastr.warning('You can not edit form at this moment!');
    });

    jQuery($ => {
        const formTemplateData = @json($formTemplate);

        const fbEditor = document.getElementById('build-wrap')
        const formData = JSON.stringify(formTemplateData)
        const formBuilder = $(fbEditor).formBuilder({formData})

        // Can be used 2 different ways
        formBuilder.actions.toggleAllFieldEdit() // first
        $(fbEditor).formBuilder('toggleAllFieldEdit') // second


        $('#update-form').click(function(){
            const formData      = formBuilder.actions.getData('json');
            const csrfToken     = $('meta[name="csrf-token"]').attr('content');
            const templateTitle = $('#template_title').val();
            const templateId    = $('#template_id').val();

            if (templateTitle === '') {
                toastr.error('Please provide a template title.');
                return;
            }

            // Check if formData is empty
            if (formData.length === 0) {
                toastr.error('Form cannot be empty. Please add at least one field.');
                return;
            }

            $.ajax({
                    //url: '/save-form-template',
                    url: '{{ route("update.formTemplate") }}',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken  // Include the CSRF token in the request header
                    },
                    data: {
                        formData: formData,
                        templateTitle: templateTitle,
                        templateId: templateId,
                    },
                    success: function(response) {
                        //alert(response.message);
                        toastr.success(response.message)
                        //formBuilder.actions.clearFields();
                        $('#update').modal('hide');
                        //$('#template_title').val('');
                    },
                    error: function(error) {
                        toastr.error('An error occurred while saving the template.')
                       // alert('An error occurred while saving the template.');
                    }
            });
        });
    });

  

</script>

@endsection