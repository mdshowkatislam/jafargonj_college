<style>
    /* news design */
.single-news {
    position: relative;
    -webkit-transition: all 800ms ease;
    -moz-transition: all 800ms ease;
    -ms-transition: all 800ms ease;
    -o-transition: all 800ms ease;
    transition: all 800ms ease;

}

.research-card:before,
.single-news:before {
    position: absolute;
    content: '';
    left: 0px;
    bottom: 0px;
    width: 0px;
    height: 5px;
    background-color: #00c5bf;
    -webkit-transition: all 800ms ease;
    -moz-transition: all 800ms ease;
    -ms-transition: all 800ms ease;
    -o-transition: all 800ms ease;
    transition: all 800ms ease;
}

.research-card:after,
.single-news:after {
    position: absolute;
    content: '';
    right: 0px;
    bottom: 0px;
    width: 0px;
    height: 5px;
    background-color: #00c5bf;
    -webkit-transition: all 800ms ease;
    -moz-transition: all 800ms ease;
    -ms-transition: all 800ms ease;
    -o-transition: all 800ms ease;
    transition: all 800ms ease;
}

.research-card:hover,
.single-news:hover {
    -webkit-transform: translateY(10px);
    -moz-transform: translateY(10px);
    -ms-transform: translateY(10px);
    -o-transform: translateY(10px);
    transform: translateY(10px);
}

.single-news:hover::before,
.single-news:hover::after {
    width: 100%;
}
</style>
<div class="event-area flex-less">
    <div class="container">
        <div class="row">
            {{-- @if (!empty($events) && $events->count()) --}}
                <div class="col-sm-12 col-md-12 col-lg-8">
                    {{-- <div class="text-center site-heading">
                        <h2 class="custom-font-titillium-web">Recent and Upcoming Events</h2>
                    </div> --}}

                    <div class="d-flex justify-content-between align-items-end">
                        <h1 class="text-uppercase mb-0 home-content-heading custom-font-titillium-web">Recent and Upcoming Events</h1>
                        {{-- <a href="" class="text-uppercase text-decoration-none fw-bold common-font-color">All</a> --}}
                    </div>
                
                    <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;"></div>

                    <div class="row">
                        @forelse ($events as $item)
                        <div class="col-md-6 col-lg-6 mb-2 mt-3">
                            <div class="item equal-height box-shadow single-news">
                                <div class="thumb">
                                    <img src="{{ asset('/upload/news/' . $item->image) }}" style="height:230px; 
                                                    width: 100%;" alt="Thumb" onerror="this.src='{{ asset('upload/no-image.png') }}'">
                                </div>
                                <div class="info">
                                    <div class="info-box" style="padding:35px 25px">
                                        <div class="date">
                                            <strong class="custom-font-titillium-web" style="font-size: 30px">{{ date('d', strtotime($item->date)) }}</strong>
                                            {{ date('M Y', strtotime($item->date)) }}
                                        </div>
                                        <br>
                                        <div class="content" style="margin-left: 0px;">
                                            <h4 class="text-left" style="height: 120px; word-spacing: 5px; font-size: 15px; text-align: justify;">
                                                @if($page_id == '1')
                                                    <a class="custom-font-titillium-web" href="{{ route('type.details', ['id' => $item->id, 'type' => 'events']) }}">
                                                        {{ Str::limit($item->title, 120) }}
                                                    </a>
                                                @elseif($page_id == '2')
                                                    <a class="custom-font-titillium-web" href="{{ route('type.details', ["id"=>$item->id,"type"=>'events','url'=>$url]) }}">
                                                        {{ Str::limit($item->title, 120) }}
                                                    </a>
                                                @elseif($page_id == '3')
                                                    <a class="custom-font-titillium-web" href="{{ route('type.details', ["id"=>$item->id,"type"=>'events','url'=>$url]) }}">
                                                        {{ Str::limit($item->title, 120) }}
                                                    </a>
                                                @elseif($page_id == '4')
                                                    <a class="custom-font-titillium-web" href="{{ route('type.details', ["id"=>$item->id,"type"=>'events','url'=>$url]) }}">
                                                        {{ Str::limit($item->title, 120) }}
                                                    </a>
                                                @elseif($page_id == '5')
                                                    <a class="custom-font-titillium-web" href="{{ route('type.details', ["id"=>$item->id,"type"=>'events']) }}">
                                                        {{ Str::limit($item->title, 120) }}
                                                    </a>
                                                @endif

                                            </h4>
                                            <div class="bottom">
                                                <div class="d-flex justify-content-between align-items-center footer-meta text-center mt-4 pt-4 border-top">
                                                    <div class="btn-group">
                                                        @if($page_id == '1')
                                                            <a href="{{ route('type.details', ['id' => $item->id, 'type' => 'events']) }}">
                                                                <button type="button" class="btn btn-sm rounded-pill"><i class="fas fa-plus" style="color: #1C4370;"></i> Read more</button>
                                                            </a>
                                                        @elseif($page_id == '2')
                                                            <a href="{{ route('type.details', ["id"=>$item->id,"type"=>'notice','url'=>$url]) }}">
                                                                <button type="button" class="btn btn-sm rounded-pill"><i class="fas fa-plus" style="color: #1C4370;"></i> Read more</button>
                                                            </a>
                                                        @elseif($page_id == '3')
                                                            <a href="{{ route('type.details', ["id"=>$item->id,"type"=>'notice','url'=>$url]) }}">
                                                                <button type="button" class="btn btn-sm rounded-pill"><i class="fas fa-plus" style="color: #1C4370;"></i> Read more</button>
                                                            </a>
                                                        @elseif($page_id == '4')
                                                            <a href="{{ route('type.details', ["id"=>$item->id,"type"=>'notice','url'=>$url]) }}">
                                                                <button type="button" class="btn btn-sm rounded-pill"><i class="fas fa-plus" style="color: #1C4370;"></i> Read more</button>
                                                            </a>
                                                        @elseif($page_id == '5')
                                                            <a href="{{ route('type.details', ["id"=>$item->id,"type"=>'notice']) }}">
                                                                <button type="button" class="btn btn-sm rounded-pill"><i class="fas fa-plus" style="color: #1C4370;"></i> Read more</button>
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-md-12">
                            <h2 class="fs-5 p-3 mt-3  mb-0 bg-light rounded">There are no activities at the moment..</h2>
                        </div>
                        @endforelse

                            <div class="more-btn text-center mb-2">
                                @if($page_id == '1')
                                    <a href="{{ route('type.all', ['type' => 'events']) }}" class="btn btn-theme effect btn-md custom-font-titillium-web">View All Events</a>
                                @elseif($page_id == '2')
                                    <a href="{{ route('faculty_event', $faculty->id) }}" class="btn btn-theme effect btn-md custom-font-titillium-web">View All Events</a>
                                @elseif($page_id == '3')
                                    <a href="{{ route('department_event', $department->id) }}" class="btn btn-theme effect btn-md custom-font-titillium-web">View All Events</a>
                                @elseif($page_id == '4')
                                    <a href="{{ route('office_event', $office->id) }}" class="btn btn-theme effect btn-md custom-font-titillium-web">View All Events</a>
                                @elseif($page_id == '5')
                                    <a href="{{ route('type.all', ['type' => 'events']) }}" class="btn btn-theme effect btn-md custom-font-titillium-web">View All Events</a>
                                @endif
                            </div>

                    </div>
                </div>
            {{-- @endif --}}

            @if (!empty($notices) && $notices->count())
                <div class="col-sm-12 col-md-12 col-lg-4 mb-3">
                    {{-- <div class="text-center site-heading">
                        <h2 class="custom-font-titillium-web">Notices</h2>
                    </div> --}}

                    <div class="d-flex justify-content-between align-items-end">
                        <h1 class="text-uppercase mb-0 home-content-heading custom-font-titillium-web">Notices</h1>
                        {{-- <a href="" class="text-uppercase text-decoration-none fw-bold common-font-color">All</a> --}}
                    </div>
                    
                    <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;"></div>

                    <div class="top-author">
                        <div class="author-items mt-3" style="background-color: white; overflow-y:scroll; height: 568px;">
                            <!---- Single Item -->
                            <div class="item">
                                <div class="info" style="width: 100%">
                                    @foreach (@$notices as $item)
                                    <div style="border-bottom: 1px solid #8b8b8b;">
                                        <div class="mb-3 mt-3">
                                            <h5 style="text-align: justify; font-size:15px; font-weight: 400;">
                                                @if($page_id == '1')
                                                    <a href="{{ route('type.details', ['id' => $item->id, 'type' => 'notice']) }}" class="custom-font-titillium-web" target="_blank">{{ $item->title }}</a>
                                                @elseif($page_id == '2')
                                                    <a href="{{ route('type.details', ["id"=>$item->id,"type"=>'notice','url'=>$url]) }}" class="custom-font-titillium-web" target="_blank">{{ $item->title }}</a>
                                                @elseif($page_id == '3')
                                                    <a href="{{ route('type.details', ["id"=>$item->id,"type"=>'notice','url'=>$url]) }}" class="custom-font-titillium-web" target="_blank">{{ $item->title }}</a>
                                                @elseif($page_id == '4')
                                                    <a href="{{ route('type.details', ["id"=>$item->id,"type"=>'notice','url'=>$url]) }}" class="custom-font-titillium-web" target="_blank">{{ $item->title }}</a>
                                                @elseif($page_id == '5')
                                                    <a href="{{ route('type.details', ["id"=>$item->id,"type"=>'notice','url'=>$url]) }}" class="custom-font-titillium-web" target="_blank">{{ $item->title }}</a>
                                                @endif
                                            </h5>
                                            
                                            <li style="border: none; text-align: left;">
                                                <span>Published: {{ date('d M,Y', strtotime($item->date)) }}</span>
                                                {{--@if (isset($item->category))
                                                    @if ($item->category == 1)
                                                    Results
                                                    @elseif ($item->category == 2)
                                                    Administrative
                                                    @elseif ($item->category == 3)
                                                    Academic
                                                    @elseif ($item->category == 4)
                                                    Programs
                                                    @elseif ($item->category == 5)
                                                    Affiliated
                                                    @else 
                                                    Others
                                                    @endif
                                                @endif --}}
                                            </li>

                                            <li>
                                                @if($page_id == '1')
                                                    <a href="{{ route('type.details', ['id' => $item->id, 'type' => 'notice']) }}">
                                                        <button type="button" class="btn btn-sm rounded-pill custom-font-titillium-web"><i class="fas fa-plus" style="color: #1C4370;"></i> Read more</button>
                                                    </a>
                                                @elseif($page_id == '2')
                                                    <a href="{{ route('type.details', ["id"=>$item->id,"type"=>'notice','url'=>$url]) }}">
                                                        <button type="button" class="btn btn-sm rounded-pill custom-font-titillium-web"><i class="fas fa-plus" style="color: #1C4370;"></i> Read more</button>
                                                    </a>
                                                @elseif($page_id == '3')
                                                    <a href="{{ route('type.details', ["id"=>$item->id,"type"=>'notice','url'=>$url]) }}">
                                                        <button type="button" class="btn btn-sm rounded-pill custom-font-titillium-web"><i class="fas fa-plus" style="color: #1C4370;"></i> Read more</button>
                                                    </a>
                                                @elseif($page_id == '4')
                                                    <a href="{{ route('type.details', ["id"=>$item->id,"type"=>'notice','url'=>$url]) }}">
                                                        <button type="button" class="btn btn-sm rounded-pill custom-font-titillium-web"><i class="fas fa-plus" style="color: #1C4370;"></i> Read more</button>
                                                    </a>
                                                @elseif($page_id == '5')
                                                    <a href="{{ route('type.details', ["id"=>$item->id,"type"=>'notice','url'=>$url]) }}">
                                                        <button type="button" class="btn btn-sm rounded-pill custom-font-titillium-web"><i class="fas fa-plus" style="color: #1C4370;"></i> Read more</button>
                                                    </a>
                                                @endif
                                                {{-- <a href="{{ route('type.details', ['id' => $item->id, 'type' => 'notice']) }}" target="_blank"
                                                class="btn circle btn-dark border btn-sm text-center readmore-common-button custom-font-titillium-web">
                                                <i class="fas fa-plus" style="color: #002147"></i> Read More</a> --}}
                                                
                                            </li>
                                        </div>

                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                      
                            <div class="more-btn col-md-12 text-center" style="padding-top: 0px;">
                                @if($page_id == '1')
                                    <a href="{{ route('type.all', ['type' => 'notice']) }}" class="btn btn-theme effect btn-md custom-font-titillium-web">View All Notices</a>
                                @elseif($page_id == '2')
                                    <a href="{{ route('faculty_notice', $faculty->id) }}" class="btn btn-theme effect btn-md custom-font-titillium-web">View All Notices</a>
                                @elseif($page_id == '3')
                                    <a href="{{ route('department_notice', $department->id) }}" class="btn btn-theme effect btn-md custom-font-titillium-web">View All Notices</a>
                                @elseif($page_id == '4')
                                    <a href="{{ route('office_notice', $office->id) }}" class="btn btn-theme effect btn-md custom-font-titillium-web">View All Notices</a>
                                @elseif($page_id == '5')
                                    <a href="{{ route('type.all', ['type' => 'notice']) }}" class="btn btn-theme effect btn-md custom-font-titillium-web">View All Notices</a>
                                @endif
                            </div>
                    

                    </div>
                </div>
            @endif

        </div>
    </div>
</div>