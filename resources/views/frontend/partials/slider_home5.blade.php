
<!--========== hero slider ================-->
<div id="carouselHomePage" class="carousel slide animate_text carousel-fade slider-size" data-bs-ride="carousel">
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
      <div class="carousel-caption" data-animation="animated slideInDown">
        {!!$image->text_on_banner!!}
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
