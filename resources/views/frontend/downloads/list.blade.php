<!-- ===== slider section start ===== -->
@extends('frontend.layouts.master-landing')
@php
    $page_title = 'Downloads';
@endphp
@section('title')
    {{ $page_title }}
@endsection
<style>
    .downloads-btn {
        color: #473a00;
        background: #fff !important;
        padding: 3px 15px;
    }

    .downloads-btn:hover {
        color: #fff !important;
        background-color: #ffb606 !important;
    }
    .custom-counter {
        counter-reset: li; /* Initializes the counter */
    }
    
    .custom-counter li {
        list-style: none; /* Removes default list styling */
        position: relative; /* Required for positioning the counter */
        padding-left: 2em; /* Space for the counter */
    }
    
    .custom-counter li::before {
        position: absolute; /* Position the counter absolutely */
        left: 0; /* Align it to the left */
    }
</style>
@section('content')
<!-- Start content ============================================= -->
<div class="clearfix"></div>

@include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])

{{-- <div class="breadcrumb-area shadow dark text-center text-light"
    style="background-image: url(http://localhost/butex-website/upload/banner/banner-butex.png); background-repeat: no-repeat;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h2>Butex Forms</h2>
                <ul class="breadcrumb">
                    <li><a href="{{ url('/') }}"><i class="fas fa-home"></i> Home</a></li>
                    <li class="active">Butex Forms</li>
                </ul>
            </div>
        </div>
    </div>
</div> --}}
<style>
    .course-details-area .courses-info {
    padding-right: 50px;
    /* border-right: 1px solid #e7e7e7; */
}
* {
    padding: 0;
    margin: 0;
}
.panel {
    border: 1px solid #ecdcdc !important;
}
.panel-primary {
    border-color: #337ab7;
}
#heading-gradiant {
    background-color: #1BA09B;
    background-image: linear-gradient(to left, #2dcfca, #1BA09B, transparent);
}
.panel-heading {
    padding: 10px 15px !important;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
}
.rectangle-list a {
    position: relative;
    display: block;
    padding: .6em .6em .6em .8em;
    margin: .5em 0 .5em 2.5em;
    background: #ddd;
    color: #444;
    text-decoration: none;
    transition: all .3s ease-out;
    width: 85%;
}
a {
    transition: all 0.35s ease-in-out;
    -webkit-transition: all 0.35s ease-in-out;
    -moz-transition: all 0.35s ease-in-out;
    -ms-transition: all 0.35s ease-in-out;
    -o-transition: all 0.35s ease-in-out;
    text-decoration: none;
    font-family: "Poppins", sans-serif;
}
element.style {
    font-weight: bold;
}
#duForms ol {
    counter-reset: li;
    list-style: none;
    font: 16px 'trebuchet MS', 'lucida sans';
    padding: 0;
    margin-bottom: 4em;
    text-shadow: 0 1px 0 rgba(255, 255, 255, .5);
}

.my-hover:hover{
    background-color: #1ba09b;
    color: white;
}
</style>
<div class="course-details-area mt-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="courses-info">
                    <div class="tab-info">
                        <div class="panel panel-primary">
                            <div style="color:white !important; font-size: 20px;" class="panel-heading text-center" id="heading-gradiant">Bangladesh Textile University Forms</div>
                            <div class="panel-body text-justify">
                            <br>
                                <div class="custom-counter col-sm-12" id="duForms" >
                                    <ul class="rectangle-list pb-5">
                                     @foreach(@$infos as $item)
                                      
                                        <li><a href="{{ asset('upload/media/' . $item->file) }}" class="my-hover" style="font-size: 18px;">{{ $item->title }}
                                                Forms</a>
                                            {{--  <ol>
                                                <li><a href="individualsEmail.html">For Individuals</a></li>
                                                <li><a href="officesEmail.html">For Offices</a></li>

                                            </ol>  --}}
                                        </li>

                                       
                                   
                                    @endforeach
                                    </ul>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            {{--  @include('frontend.partials.side-link')  --}}
            <!-- End Course Sidebar -->
        </div>
    </div>
</div>
@endsection
