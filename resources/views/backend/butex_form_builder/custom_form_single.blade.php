@extends('backend.layouts.app')
@section('content')

@section('title')
        @if(@$data->form_type == 1)
            Application Form     
        @elseif(@$data->form_type == 2)
            Application Form
        @elseif(@$data->form_type == 3)
            Student Admission Information Form
        @elseif(@$data->form_type == 4)
            Studentship Extension Form
        @elseif(@$data->form_type == 5)
            Board scholarship student information form
        @endif
     - {{ @$data->data1 }}
@endsection

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Tiro+Bangla:ital@0;1&family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">

<style>
    .bn{
        font-family: "Titillium Web", "Tiro Bangla", sans-serif
    }

    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }

    @media print {
        body{
            visibility: hidden;
        }
        .my-form {
            visibility: visible;
            position: absolute;
            top: 0;
            left: 0;
        }
        .d-hidden{
            visibility: hidden;
        }
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
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Butex Form</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content bn my-form">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-primary p-2 mt-3">
               
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <h4>
                                @if(@$data->form_type == 1)
                                    Application Form     
                                @elseif(@$data->form_type == 2)
                                    Application Form
                                @elseif(@$data->form_type == 3)
                                    Student Admission Information Form
                                @elseif(@$data->form_type == 4)
                                    Studentship Extension Form
                                @elseif(@$data->form_type == 5)
                                    Board scholarship student information form
                                @endif
                            </h4>
                        </div>

                        <div class="dropdown d-hidden" style="margin-right: 5px;">
                            <button id="print-button" class="btn btn-sm btn-success mb-2">Print Form Data</button>
                            <a href="{{ url('site-settings/all_custom_form',  ['id' => @$data->form_type]) }}"><button class="btn btn-sm btn-danger mb-2">Back</button></a>      
                        </div>
                    </div>

                    @if(@$data->form_type == 1)
                        @include('backend.butex_form_builder.custom_form1')  
                    @elseif(@$data->form_type == 2)
                        @include('backend.butex_form_builder.custom_form2')
                    @elseif(@$data->form_type == 3)
                        @include('backend.butex_form_builder.custom_form3')
                    @elseif(@$data->form_type == 4)
                        @include('backend.butex_form_builder.custom_form4')
                    @elseif(@$data->form_type == 5)
                        @include('backend.butex_form_builder.custom_form5')
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Add event listener to the print button
    document.getElementById("print-button").addEventListener("click", function () {
        window.print();
    });
</script>

@endsection
