
    <div class="overview">
        <div class="d-flex justify-content-between align-items-end">
            <h1 class="text-uppercase home-content-heading mb-0 custom-font-titillium-web">
                About Club
            </h1>
            {{-- <a href="{{ route('news.all') }}" class="text-uppercase text-decoration-none fw-bold common-font-color">All</a> --}}
        </div>
        <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;">
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="bg-light p-3 rounded shadow-sm  about-message-content d-flex mt-3">
                    <div>
                        <h2 class="fs-5 fw-bold border-bottom pb-3 mb-3 common-font-color custom-font-titillium-web">Mission</h2>
                        <div class="text-justify fs-6 custom-font-titillium-web">
                            {!! Str::limit(@$club->mission, 400, '...') !!}
                        </div>
                    </div>
                </div>
                <div class="bg-light p-3 rounded shadow-sm  about-message-content d-flex mt-3">
                    <div>
                        <h2 class="fs-5 fw-bold border-bottom pb-3 mb-3 common-font-color custom-font-titillium-web">Vision</h2>
                        <div class="text-justify fs-6 custom-font-titillium-web">
                            {!! Str::limit(@$club->vision, 400, '...') !!}
                        </div>
                    </div>
                </div>
                <div class="bg-light p-3 rounded shadow-sm  about-message-content d-flex mt-3">
                    <div>
                        <h2 class="fs-5 fw-bold border-bottom pb-3 mb-3 common-font-color custom-font-titillium-web">Motto</h2>
                        <div class="text-justify fs-6 custom-font-titillium-web">
                            {!! Str::limit(@$club->motto, 400, '...') !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
