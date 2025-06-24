<style>
  .slider-size{
    height:450px;
    width: 100%;
  }

  .slider-image{
    width: 100%;
    height:450px;
  }

@media only screen and (max-width: 767px) {
  .slider-size{
    height:200px;
    width: 100%;
  }

  .slider-image{
    width: 100%;
    height:200px;
  }
}

@media only screen and (min-width: 481px) and (max-width: 767px) {
  .slider-size{
    height:200px;
    width: 100%;
  }
  .slider-image{
    width: 100%;
    height:200px;
  }
}

.metaslider{
    position: relative;
}

.metaslider .caption-wrap {
    position: absolute;
    bottom: 0;
    left: 0;
    background: black;
    color: white !important;
    opacity: 0.5;
    margin: 0;
    display: block;
    width: 100%;
    line-height: 1.4em;
}

.metaslider .caption {
    padding-top: 10px;
    padding-left: 10px;
    word-wrap: break-word;
}

</style>

@if (isset($sliders))
  <!--========== hero slider ================-->
  <div id="carouselHomePage" class="carousel slide animate_text carousel-fade slider-size metaslider" data-bs-ride="carousel">
    <div class="carousel-indicators">
      @if(count($sliders) > 0)
        @foreach($sliders as $index => $image)
          <button type="button" data-bs-target="#carouselHomePage" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}" aria-current="{{ $index == 0 ? 'true' : '' }}" aria-label="Slide {{ $index + 1 }}"></button>
        @endforeach
      @else
      <button type="button" data-bs-target="#carouselHomePage" data-bs-slide-to="0" aria-label="Slider"></button>
    </div>
    @endif
  </div>

  
  <div class="carousel-inner slider-size">
    @foreach($sliders as $index => $image)
      <div class="carousel-item {{ $loop->iteration == 1 ? 'active' : '' }}">
        <img src="{{asset('upload/slider/'.$image->image)}}" class="d-block slider-image" alt="{{$index +1}}">
        <!-- <div class="carousel-caption" data-animation="animated slideInDown">
          {{ $image->text_on_banner }}
        </div> -->

        <div class="caption-wrap">
          <div class="caption">
            <div class="custom-font-titillium-web" style="text-color: white !impotent; font-size: 16px; padding: 5px;">{{ $image->text_on_banner }}</div>
          </div>
        </div>
      </div>
    @endforeach
  </div>

  
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselHomePage" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>

  <button class="carousel-control-next" type="button" data-bs-target="#carouselHomePage" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
  <!-- hero slider -->
  
@else

  <div class="faculty-profile-banner d-flex justify-content-center align-items-center" style=" background-image: url( {{ @$banner->image ? asset('upload/banner/' . $banner->image) : asset('frontend/assets/img/butex/banner-butex.png') }} ) ">
      <h1 class="text-white text-center custom-font-titillium-web">{{ $page_title }}</h1>
  </div>

@endif
