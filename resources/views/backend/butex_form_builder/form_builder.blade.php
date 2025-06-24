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
                <button type="button" class="btn btn-success save mt-2 mb-3" data-toggle="modal" data-target="#save">Save Form</button>
                <a href="{{ url('site-settings/butex_form_builder') }}">
                    <button type="button" class="btn btn-danger update mt-2 mb-3">Back</button>
                </a>
            </div>
        </div>
        <div id="build-wrap"></div>
        {{-- <button id="save-form" class="btn btn-primary mt-2 mb-3">Save Form</button> --}}
    </div>
</section>

@include('backend.butex_form_builder.save-modal')

<script>
    jQuery($ => {
        const fbTemplate = document.getElementById('build-wrap');
        // $(fbTemplate).formBuilder();
        const formBuilder = $(fbTemplate).formBuilder();

        $('#save-form').click(function(){
            const formData = formBuilder.actions.getData('json');
            const csrfToken = $('meta[name="csrf-token"]').attr('content');
            const templateTitle = $('#template_title').val();
            const start_date = $('#start_date').val();
            const end_date   = $('#end_date').val();

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
                    url: '{{ route("save.formTemplate") }}',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken  // Include the CSRF token in the request header
                    },
                    data: {
                        formData: formData,
                        templateTitle: templateTitle,
                        start_date: start_date,
                        end_date: end_date,
                    },
                    success: function(response) {
                        //alert(response.message);
                        toastr.success(response.message)
                        formBuilder.actions.clearFields();
                        $('#save').modal('hide');
                        $('#template_title').val('');
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