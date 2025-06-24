@extends('frontend.landing-without-mainmenu')
@php
$page_title = @$hall_details->name;
@endphp
@section('title')
{{ $page_title }}
@endsection
@section('content')

<style>
    .carousel-inner .carousel-item .carousel-caption {
        position: absolute;
        max-width: 50%;
        max-height: max-content;
        top: 70%;
        left: 10%;
        transform: translateY(-50%);
        background-color: rgba(255, 255, 255, 0.7);
        padding: 15px;
        color: rgb(0, 0, 0);
        display: inline-block;
        text-align: left;
    }

    .carousel-caption p {
        font-size: 20px;
        font-weight: 600;
        display: inline;
    }

    .carousel-fade .carousel-item {
        opacity: 0;
        transition: transform 5s ease, opacity .5s linear;
    }
</style>


<div class="halls-area">
    <!-- Start Banner ========== -->
    <div class="banner-area" style="max-height: 450px;">
        <div id="bootcarousel" class="carousel text-light text-center text-dark slide animate_text" data-ride="carousel" style="height: 450px;!important;">

            <div class="carousel-inner carousel-zoom" id="sliderDiv">
                {{-- @dd($sliders) --}}
                @foreach ($sliders as $slider)
                <div class="item {{ $loop->first ? 'active' : '' }} bg-cover" style="background-image: url('{{ asset('upload/slider/' . $slider->image) }}');">
                    <div class="box-table">
                        <div class="box-cell shadow dark">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="content">
                                            @if ($slider->show_description == 1 && $slider->text_on_banner)
                                            <h2 data-animation="animated slideInDown" class="banner-heading">

                                                {!! $slider->text_on_banner !!}

                                            </h2>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>


            <!-- Left and right controls -->
            <a class="left carousel-control" href="#bootcarousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#bootcarousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <!-- End Banner -->


    <div class="container">
        <div class="content">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="provost_info">
                        <div style="width:20%; float: left; margin-right:20px" class="left_image">
                            <img class="img-thumbnail image-showing" src="{{ isset($hall_details) && $hall_details->provostProfile->photo ? asset('upload/profiles/' . $hall_details->provostProfile->photo) : (isset($hall_details) ? $hall_details->profile->photo_path : asset('upload/user-dummy.jpeg')) }}" onerror="this.onerror=null;" />
                        </div>
                        <div style="width:70%" class="left_description">
                            <h4>{{$hall_details->provostProfile->designation}}</h4>
                            <h3 style="color:#02ac58">{{$hall_details->provostProfile->nameEn}}</h3>

                            <h6>Email: {{$hall_details->provostProfile->email}}</h6>
                            <h6>Call: {{$hall_details->provostProfile->mobile}}</h6>

                        </div>
                    </div>

                </div>

                <div class="panel-body">
                    <h2>{{$message->title_first_part}}</h2>
                    {!!$message->short_description!!}
                </div>
            </div>

        </div>
    </div>
</div>
@endsection