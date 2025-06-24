    <!------ slider ------>
    <section style="margin-top:110px">
        <div id="carouselExampleControls" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($sliders as $slider)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }} slider-img">
                        <img src="{{ asset('upload/slider/' . $slider->image) }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block" style="color:white; text-align:left">
                            <h1 class="text-uppercase fw-bold list-light"></h1>
                            <h5></h5>
                        </div>
                    </div>
                @endforeach

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>