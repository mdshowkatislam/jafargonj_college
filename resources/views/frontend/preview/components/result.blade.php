<style>
/* Hide scrollbar but keep scrolling functionality */
.result-notices {
    padding: 10px;
    border: 1px solid #e7e7e7;
    overflow-y: scroll;
    -ms-overflow-style: none;  /* for IE and Edge */
    scrollbar-width: none;     /* for Firefox */
}

</style>
<div class="container">
    <div class="row my-1">
        <div class="col-xl-3 col-md-6 mb-2">
            <div class="d-flex justify-content-between align-items-end">
                <h1 class="text-uppercase mb-0 home-content-heading custom-font-titillium-web" style="font-size: 1.14rem !important;">Results Published</h1>
                {{-- <a href="" class="text-uppercase text-decoration-none fw-bold common-font-color">All</a> --}}
            </div>
            <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;"></div>
            <div class="top-author">
                <div class="result-notices mt-3 shadow-sm" style="background-color: white; height: 500px;">
                    <!---- Single Item -->
                    <div class="item">
                        <div class="info" style="width: 100%">
                            @foreach (@$home_notice1 as $item)
                            <div style="border-bottom: 1px solid #8b8b8b;">
                                <div class="mb-2 mt-1">
                                    <h5 style="text-align: justify; font-size:15px;">
                                        <a href="{{ route('type.details', ['id' => $item->id, 'type' => 'notice']) }}" class="custom-font-titillium-web" target="_blank">{{ $item->title }}</a>
                                    </h5>
                                    
                                    <li style="border: none; text-align: left;">
                                        <span>Published: {{ date('d M,Y', strtotime($item->date)) }}</span>
                                    </li>

                                    <li class="pt-1">
                                        <a href="{{ route('type.details', ['id' => $item->id, 'type' => 'notice']) }}">
                                            <button type="button" class="btn btn-sm rounded-pill custom-font-titillium-web" style="padding: 1px 10px !important;"><i class="fas fa-plus" style="color: #1C4370; font-size: smaller;"></i> Read more</button>
                                        </a>
                                    </li>
                                </div>

                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="more-btn col-md-12 text-center" style="padding-top: 10px;">
                    <a href="{{ route('type.all', ['type' => 'notice', 'notices' => '1']) }}" class="btn btn-theme effect btn-md custom-font-titillium-web">View All Notices</a>  
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-2">
            <div class="d-flex justify-content-between align-items-end">
                <h1 class="text-uppercase mb-0 home-content-heading custom-font-titillium-web" style="font-size: 1.14rem !important;">Administrative Notices</h1>
                {{-- <a href="" class="text-uppercase text-decoration-none fw-bold common-font-color">All</a> --}}
            </div>
            <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;"></div>
            <div class="top-author">
                <div class="result-notices mt-3 shadow-sm" style="background-color: white; overflow-y:auto; height: 500px;">
                    <!---- Single Item -->
                    <div class="item">
                        <div class="info" style="width: 100%">
                            @foreach (@$home_notice2 as $item)
                            <div style="border-bottom: 1px solid #8b8b8b;">
                                <div class="mb-2 mt-1">
                                    <h5 style="text-align: justify; font-size:15px;">
                                        <a href="{{ route('type.details', ['id' => $item->id, 'type' => 'notice']) }}" class="custom-font-titillium-web" target="_blank">{{ $item->title }}</a>
                                    </h5>
                                    
                                    <li style="border: none; text-align: left;">
                                        <span>Published: {{ date('d M,Y', strtotime($item->date)) }}</span>
                                    </li>

                                    <li class="pt-1">
                                        <a href="{{ route('type.details', ['id' => $item->id, 'type' => 'notice']) }}">
                                            <button type="button" class="btn btn-sm rounded-pill custom-font-titillium-web" style="padding: 1px 10px !important;"><i class="fas fa-plus" style="color: #1C4370; font-size: smaller;"></i> Read more</button>
                                        </a>
                                    </li>
                                </div>

                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="more-btn col-md-12 text-center" style="padding-top: 10px;">
                    <a href="{{ route('type.all', ['type' => 'notice', 'notices' => '2']) }}" class="btn btn-theme effect btn-md custom-font-titillium-web">View All Notices</a>  
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-2">
            <div class="d-flex justify-content-between align-items-end">
                <h1 class="text-uppercase mb-0 home-content-heading custom-font-titillium-web" style="font-size: 1.14rem !important;">Academic Notices</h1>
                {{-- <a href="" class="text-uppercase text-decoration-none fw-bold common-font-color">All</a> --}}
            </div>
            <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;"></div>
            <div class="top-author">
                <div class="result-notices mt-3 shadow-sm" style="background-color: white; overflow-y:auto; height: 500px;">
                    <!---- Single Item -->
                    <div class="item">
                        <div class="info" style="width: 100%">
                            @foreach (@$home_notice3 as $item)
                            <div style="border-bottom: 1px solid #8b8b8b;">
                                <div class="mb-2 mt-1">
                                    <h5 style="text-align: justify; font-size:15px;">
                                        <a href="{{ route('type.details', ['id' => $item->id, 'type' => 'notice']) }}" class="custom-font-titillium-web" target="_blank">{{ $item->title }}</a>
                                    </h5>
                                    
                                    <li style="border: none; text-align: left;">
                                        <span>Published: {{ date('d M,Y', strtotime($item->date)) }}</span>
                                    </li>

                                    <li class="pt-1">
                                        <a href="{{ route('type.details', ['id' => $item->id, 'type' => 'notice']) }}">
                                            <button type="button" class="btn btn-sm rounded-pill custom-font-titillium-web" style="padding: 1px 10px !important;"><i class="fas fa-plus" style="color: #1C4370; font-size: smaller;"></i> Read more</button>
                                        </a>
                                    </li>
                                </div>

                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="more-btn col-md-12 text-center" style="padding-top: 10px;">
                    <a href="{{ route('type.all', ['type' => 'notice', 'notices' => '3']) }}" class="btn btn-theme effect btn-md custom-font-titillium-web">View All Notices</a>  
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-2">
            <div class="d-flex justify-content-between align-items-end">
                <h1 class="text-uppercase mb-0 home-content-heading custom-font-titillium-web" style="font-size: 1.14rem !important;">Affiliated Colleges Notices</h1>
                {{-- <a href="" class="text-uppercase text-decoration-none fw-bold common-font-color">All</a> --}}
            </div>
            <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;"></div>
            <div class="top-author">
                <div class="result-notices mt-3 shadow-sm" style="background-color: white; overflow-y:auto; height: 500px;">
                    <!---- Single Item -->
                    <div class="item">
                        <div class="info" style="width: 100%">
                            @foreach (@$home_notice4 as $item)
                            <div style="border-bottom: 1px solid #8b8b8b;">
                                <div class="mb-2 mt-1">
                                    <h5 style="text-align: justify; font-size:15px;">
                                        <a href="{{ route('type.details', ['id' => $item->id, 'type' => 'notice']) }}" class="custom-font-titillium-web" target="_blank">{{ $item->title }}</a>
                                    </h5>
                                    
                                    <li style="border: none; text-align: left;">
                                        <span>Published: {{ date('d M,Y', strtotime($item->date)) }}</span>
                                    </li>

                                    <li class="pt-1">
                                        <a href="{{ route('type.details', ['id' => $item->id, 'type' => 'notice']) }}">
                                            <button type="button" class="btn btn-sm rounded-pill custom-font-titillium-web" style="padding: 1px 10px !important;"><i class="fas fa-plus" style="color: #1C4370; font-size: smaller;"></i> Read more</button>
                                        </a>
                                    </li>
                                </div>

                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="more-btn col-md-12 text-center" style="padding-top: 10px;">
                    <a href="{{ route('type.all', ['type' => 'notice', 'notices' => '5']) }}" class="btn btn-theme effect btn-md custom-font-titillium-web">View All Notices</a>  
                </div>
            </div>
        </div>

    </div>
</div>