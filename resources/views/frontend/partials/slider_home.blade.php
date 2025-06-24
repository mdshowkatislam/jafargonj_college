<div class="banner-area mycolorgreen" id="homeBanner">
    <div id="bootcarousel" class="carousel text-light top-pad text-dark slide animate_text slider-size" data-ride="carousel"> 
        <!-- Wrapper for slides -->
       
        <div class="carousel-inner carousel-zoom slider-size">
            @foreach ($sliders as $slider)
                <div class="item d-block slider-image  bg-cover {{ $loop->first ? 'active' : 'next' }} left"
                    style="background-image: url({{ asset('upload/slider/' . $slider->image) }});">

                    <div class="box-table">
                        <div class="box-cell shadow dark">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-7 col-sm-7 col-7">
                                        <div class="content" style="padding-top: 250px">
                                            
                                        @if($slider->text_on_banner)
                                            <h3 data-animation="animated slideInDown" class="">
                                                {!! $slider->text_on_banner !!}
                                                <strong></strong>
                                            </h3>
                                            @endif
                                            <a data-animation="animated slideInUp"
                                                class="btn btn-theme effect btn-sm"
                                                href="#">Read
                                                More...</a>
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
        <a class="left carousel-control shadow" href="#bootcarousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control shadow" href="#bootcarousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<div class="row" style="margin-top:50px"></div>

 
      
<!-- ===== slider section end ===== -->
