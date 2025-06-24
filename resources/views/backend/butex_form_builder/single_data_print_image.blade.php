@extends('backend.layouts.app')
@section('content')

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
        border: 1px solid rgb(19, 19, 19);
        text-align: left;
        padding: 8px;
    }


    @media print {
        body{
            visibility: hidden;
        }
        .my-form {
            visibility: visible;
            position: absolute;
            top: -30px;
            left: 0;
        }
        .d-hidden{
            visibility: hidden;
        }
    }

    @media print {
        .page-break {
            /* page-break-before: always;  */
            page-break-after: always;  /* Forces a page break after this element */
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
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><b>Home</b></a></li>
            <li class="breadcrumb-item active"><a href="{{ url('site-settings/user_form', ['id' => @$user_form_data->form_id]) }}">Back</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

    <section class="content bn">
        <div class="container">
            <div class="d-flex">
                <div class="flex-grow-1">
                    <div class="dropdown d-hidden" style="margin-right: 5px;">
                        <button id="print-button" class="btn btn-sm btn-success mb-2">Print / PDF</button>
                        <a href="{{ url('site-settings/user_form', ['id' => @$user_form_data->form_id]) }}"><button class="btn btn-sm btn-danger mb-2">Back</button></a>      
                    </div>
                </div>
        </div>
    </section>

    <section class="container-fluid bn my-form">
            <div class="card">
                <div class="card-body">
                    <div class="">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="text-center">
                                    <img src="{{ asset('/logo.png') }}" style="width: 140px; height: 130px;" alt="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <h1 class="text-center">বাংলাদেশ টেক্সটাইল বিশ্ববিদ্যালয়</h2>
                                <h3 class="text-center">তেজগাঁও, ঢাকা-১২০৮।</h4>
                                <h2 class="text-center">{{ @$formTemplate->title }}</h3>
                            </div>
                            <div class="col-sm-3">
                                <div class="text-center">
                                @if(isset($decodedFormData['files']) && is_array($decodedFormData['files']))
                                    @if(isset($decodedFormData['files'][0]))
                                        <img src="{{ asset($decodedFormData['files'][0]) }}" style="width: 200px; height: 200px;" alt="">
                                    @endif
                                @endif
                                </div>
                            </div>
                        </div>


                        <div class="mt-3">
                            <table class="bn" style="font-size: 22px;">
                                <thead>
                                    <tr>
                                        <td><b>Title</b></td>                         
                                        <td><b>Value</b></td>             
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach ($user_form_data_row->form_data as $key => $value)
                                            @if ($key !== '_token' && $key !== 'form_id' && $key !== 'files')
                                            <tr>
                                                <td>{!! $key !!}</td>
                                                <td>{!! $value !!}</td>
                                            </tr>
                                            @endif   
                                        @endforeach                      
                                </tbody>
                            </table>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                               
                            </div>
                            <div class="col-sm-6">
                            <div class="text-right mt-4">
                                    @if(isset($decodedFormData['files']) && is_array($decodedFormData['files']))
                                        @if(isset($decodedFormData['files'][1]))
                                            <img src="{{ asset($decodedFormData['files'][1]) }}" style="width: 200px; height: 80px;" alt="">
                                        @endif
                                    @endif
                                    <div style="font-size: 20px;">{{ date('d M, Y',strtotime($user_form_data->created_at)) }}</div>
                                    <div class="">........................................................................................</div>
                                    <div style="font-size: 22px;">স্বাক্ষর ও তারিখ</div>
                                </div>
                            </div>
                        </div>

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
