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
<!-- Start Banner ========== -->
<div class="banner-area" style="height: 450px;">
    <div id="bootcarousel" class="carousel text-light text-center text-dark slide animate_text" data-ride="carousel"
        style="height: 450px;!important;">

        <!-- Wrapper for slides -->

        <div class="carousel-inner carousel-zoom" id="sliderDiv">
            {{-- @dd($sliders) --}}
            @foreach ($sliders as $slider)
                <div class="item {{ $loop->first ? 'active' : '' }} bg-cover"
                style="background-image: url('{{ asset('upload/slider/' . $slider->image) }}');">
                    <div class="box-table">
                        <div class="box-cell shadow dark">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="content">
                                            @if ($slider->show_description == 1 && $slider->text_on_banner)
                                            <h2 data-animation="animated slideInDown" class="banner-heading">
                                                {{-- Welcome to Department of Accounting &amp; Information Systems,
                                                University of Dhaka. --}}
                                                {!! $slider->text_on_banner !!}
                                                {{-- <h5>{{ $slider->discription }}</h5> --}}
                                            </h2>
                                            @endif
                                            {{-- <a data-animation="animated slideInUp" class="btn btn-light effect btn-md"
                                            href="#">Read More...</a> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            

        </div>
        <!-- End Wrapper for slides -->

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
