<!-- Hero -->
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
<section class="oefcd-slider" style="margin-top: 110px;">
    <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($sliders as $slider)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <img src="{{ asset('upload/slider/' . $slider->image) }}" class="d-block w-100 object-cover" alt="iqac banner">
                    @if ($slider->show_description == 1 && $slider->text_on_banner)
                        <div class="carousel-caption d-none d-md-block rounded shadow">
                            <h1 class="text-uppercase fw-bold list-light" style="position: relative; top: 50%; transform: translateY(-50%);">{!! $slider->text_on_banner !!}</h1>
                        </div>
                    @endif
                </div>
            @endforeach

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="" aria-hidden="true">
                <i class="bi bi-chevron-compact-left fs-1 fw-bold"></i>
            </span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="" aria-hidden="true"><i class="bi bi-chevron-compact-right fs-1 fw-bold"></i></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
