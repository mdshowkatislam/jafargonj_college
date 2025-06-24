
    <div class="container">
        {{-- <div class="">
            <div class="site-heading2">
                <h2 class="text-uppercase mb-0 custom-font-titillium-web">Annual Performance Agreement</h2>
            </div>
        </div>
        <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;">
        </div> --}}
        <div class="d-flex justify-content-between align-items-end">
            <h1 class="text-uppercase mb-0 home-content-heading custom-font-titillium-web">Annual Performance Agreement</h1>
            {{-- <a href="" class="text-uppercase text-decoration-none fw-bold common-font-color">All</a> --}}
        </div>
        
        <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;"></div>
    </div>

    <div id="carouselExample" class="container carousel slide mt-3">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="affiliations-container rounded-2 mb-3">
                    <div class="d-flex justify-content-around flex-sm-row align-items-center">
                        <div class="row" style="padding:0px;">
                            @foreach ($apas as $apa)
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 pb-3">
                                <div class="card shadow-sm p-2" style="height: 220px; cursor: pointer;">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td colspan="2"><strong style="color:#00c5bf !important;">{{ @$apa->title }}</strong>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td><img src="{{ asset('upload/apa_category/' . @$apa->image) }}" width="80px">
                                                </td>
                                                <td>
                                                    <ul class="list-group" style="list-style-type:disc;">
                                                        @foreach ($apa->apa_report as $report)
                                                        <li class="my_icon" style="list-style-type: circle;font-size:14px !important">
                                                            &nbsp;&nbsp;
                                                            <a href="{{ @$report->url }}">{{ @$report->title }}</a>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

