
    {{-- <div class="text-center site-heading">
        <h5 class="custom-font-titillium-web">Recent and Upcoming Events</h2>
    </div> --}}
    <div class="d-flex justify-content-between align-items-end">
        <h1 class="text-uppercase mb-0 home-content-heading custom-font-titillium-web">Recent and Upcoming Events</h1>
        {{-- <a href="" class="text-uppercase text-decoration-none fw-bold common-font-color">All</a> --}}
    </div>

    <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;"></div>

    <div class="row">
        @foreach ($events as $item)
        <div class="col-sm-6 mb-2 mt-3">
            <div class="item equal-height box-shadow">
                <div class="thumb">
                    <img src="{{ asset('/upload/news/' . $item->image) }}" style="height:230px; 
                                    width: 100%;" alt="Thumb">
                </div>
                <div class="info">
                    <div class="info-box" style="padding:35px 25px">
                        <div class="date custom-font-titillium-web">
                            <strong style="font-size: 30px">{{ date('d', strtotime($item->date)) }}</strong>
                            {{ date('M Y', strtotime($item->date)) }}
                        </div>
                        <br>
                        <div class="content" style="margin-left: 0px">
                            <h4 class="text-left" style="height: 120px; word-spacing: 5px; 
                                        font-size: 15px;
                                        text-align: justify;">
                                <a href="{{ route('type.details', ['id' => $item->id, 'type' => 'events']) }}">
                                    {{ $item->title }}
                                </a>
                            </h4>
                            <div class="bottom">
                                <div class="d-flex justify-content-between align-items-center footer-meta text-center mt-4 pt-4 border-top">
                                    <div class="btn-group">
                                        <a href="{{ route('type.details', ['id' => $item->id, 'type' => 'events']) }}">
                                            <button type="button" class="btn btn-sm rounded-pill custom-font-titillium-web myplusclass"><i class="fas fa-plus" style="color: #1C4370;"></i> Read more</button>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <div class="more-btn text-center mb-2">
            <a href="{{ route('type.all', ['type' => 'events']) }}" class="btn btn-theme effect btn-md custom-font-titillium-web">View All Events</a>
        </div>
    </div>
