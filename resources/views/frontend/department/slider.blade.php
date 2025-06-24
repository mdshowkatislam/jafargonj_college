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
<div id="carouselExample" class="carousel slide department-slider carousel-fade slider-size" data-bs-ride="carousel" style="margin-top:110px;">
    <div class="carousel-inner slider-size">
        @foreach ($sliders as $slider)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }} slider-img">
                    <img src="{{ asset('upload/slider/' . $slider->image) }}" class="d-block slider-image" alt="...">
                    @if ($slider->show_description == 1 && $slider->text_on_banner)
                        <div class="carousel-caption d-none d-md-block rounded shadow">
                            {!! $slider->text_on_banner !!}
                            {{-- <h5>{{ $slider->discription }}</h5> --}}
                        </div> 
                    @endif
                </div>
        @endforeach

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
