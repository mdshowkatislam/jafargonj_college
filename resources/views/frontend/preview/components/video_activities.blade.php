<section id="Videos_Activities" class="py-2 text-center container">
    {{-- <div class="row py-lg-1">
        <div class="col-lg-6 col-md-8 mx-auto">
            <div class="site-heading">
                <h2 class="custom-font-titillium-web">Videos Activities</h2>
            </div>
        </div>
    </div> --}}
    <div class="d-flex justify-content-between align-items-end">
        <h1 class="text-uppercase mb-0 home-content-heading custom-font-titillium-web">Videos Activities</h1>
        <a href="video_gallery/all" class="text-uppercase text-decoration-none fw-bold common-font-color">All</a>
    </div>
    
    <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;"></div>
</section>

<div class="album py-3 pb-5">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <div class="video-carousel owl-carousel owl-theme">
                @foreach ($vidoe_gallery as $vdo)
                <div data-aos="flip-left" class="col item">
                    <div class="card shadow-sm">
                        @if(strpos($vdo->youtube_link, 'youtube') !== false)
                            <!-- YouTube Video Embed -->
                            <iframe width="100%" height="315" src="{{ $vdo->youtube_link }}" title="Butex" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        @elseif(strpos($vdo->youtube_link, 'facebook') !== false)
                            <!-- Facebook Video Embed -->
                            <iframe width="100%" height="315" src="{{ ($vdo->youtube_link) }}" frameborder="0" allowfullscreen allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>
                        @endif
                        <div class="card-body">
                            <p class="card-text fs-6" style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">{{ @$vdo->title }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>           
    </div>
</div>