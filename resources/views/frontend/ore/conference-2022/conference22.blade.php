@extends('frontend.layouts.master-landing')
@php
$page_title = 'Conference - 2022';
@endphp
@section('title')
{{ $page_title }}
@endsection
@section('content')

@include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])


{{-- <nav class="banner-cover-bg" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
    <ol class="breadcrumb mt-5">
        <li class="breadcrumb-item"><a class="text-white" href="{{url('/')}}">Home</a></li><span style="font-size: 20px;color: white; margin: 0px 6px 0px 6px;" class="ti-angle-double-right"></span>
        <li class="breadcrumb-item text-white" aria-current="page">{{ $page_title }}</li>
    </ol>
</nav> --}}


<section style="background-color: #f8f0e3;" class="conference_header">
<div class="container mb-4">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="heading_box1">
          <img src="{{asset('frontend/images/ictse_logo/ConfLogo.png')}}" alt="ConfLogo" class="img-fluid">
          <h1 class="text-info fs-3 fw-bold">1st International Conference On Textile Science & Engineering</h1>
          <h2>With special focus on advanced and sustainable technology for textiles</h2>
        </div>
        <div class="heading_box2 mt-4">
          <h3>19-20 January 2023, BUTEX, Dhaka, Bangladesh</h3>
          <h4 class="text-info">ISSN : 2958-8197</h4>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="page_padding bg-light">
    <div class="container">
        <div class="row mb-4">
            <div class="d-flex justify-content-center">
                <h3 class="fs-3 fw-bold">Proceedings of The ICTSE-2022</h3>
            </div>
        </div>
        <div class="bd-example bg-light">
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            ICTSE-101: The absorption mode of CO2 in Ionic Liquids: DFT study
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample" style="">
                        <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            ICTSE-101: The absorption mode of CO2 in Ionic Liquids: DFT study
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            ICTSE-101: The absorption mode of CO2 in Ionic Liquids: DFT study
                        </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
    .banner-cover-bg {
        background: rgb(0 166 168 / 89%);
        background-repeat: no-repeat;
        background-size: cover;
        height: 100px;
        display: flex;
        justify-content: center;
        /* Centers horizontally */
        position: relative;
        /* margin-top: 20px; */
    }

    .page_padding {
        padding-top: 60px;
        padding-bottom: 60px;
        font-family: "Poppins", sans-serif;
    }

    .conference_header {
        padding: 40px;
        font-family: "Poppins", sans-serif;
    }

    .ore_card {
        padding: 15px;
        border: 1px solid rgba(255, 255, 255, 0.25);
        border-radius: 20px;
        background-color: rgba(255, 255, 255, 0.45);
        box-shadow: 0 0 10px 1px rgba(0, 0, 0, 0.25);
        backdrop-filter: blur(15px);
    }
    .heading_box1, .heading_box2 {
      text-align: center;
    }
    .heading_box1 img {
      display: block;
      margin: 0 auto; /* Center the image horizontally */
    }
    .heading_box1 h1{
        font-size: 1.8 rem;
    }
    .heading_box1 h2{
        font-weight: 300;
        font-size: 24px;
    }
    
</style>
@endpush

@push('scripts')
<script>

</script>
@endpush