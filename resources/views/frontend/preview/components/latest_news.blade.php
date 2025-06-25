<style>
    /* news design */
    li{
        list-style: none;
    }
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
    width: 100%;myplusclass
}


 .myplusclass {
        background-color: #f8f9fa; /* light background */
        transition: background-color 0.4s ease, transform 0.4s ease;
    }

  
</style>
@if (!empty($news) && $news->count())
    <div class="blog-area bottom-less">
        <div class="container text-center">
            <div class="d-flex justify-content-between align-items-end">
                <h1 class="text-uppercase mb-0 home-content-heading custom-font-titillium-web mycolorgreen">Latest News</h1>
                {{-- <a href="" class="text-uppercase text-decoration-none fw-bold common-font-color">All</a> --}}
            </div>
        
            <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;"></div>
            
                <div class="row">    
                    @forelse ($news as $item)
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mt-3">
                            <div class="single-news shadow">
                                <div class="single-news-thumb">
                                    <a href="{{ route('type.details', ["id"=>$item->id,"type"=>'news']) }}">
                                    <img class="p-2 w-100 object-cover" height="250px"
                                    src="{{ asset('upload/news/' . $item->image) }}"
                                    onerror="this.onerror=null;this.src='{{ asset('upload/no-image.png')}}';"
                                    alt="Butex news" />
                                    </a>
                                </div>
                                <div class="info">
                                    <div class="single-news-date">
                                        <ul class="m-0">
                                            <li class="py-1 custom-font-titillium-web" style="font-size: 14px"><i class="fas fa-calendar-alt pe-1"></i>
                                                {{ \Carbon\Carbon::parse($item->date)->format('d M, Y') }}</li>
                                        </ul>
                                    </div>
                                        <div class="single-news-content px-4 pt-3 pb-5">
                                            <h4 class="text-left custom-font-titillium-web" style="text-align: justify; font-size: 15px; height: 60px;">
                                                @if($page_id == '1')
                                                    <a href="{{ route('type.details', ["id"=>$item->id,"type"=>'news']) }}">{{ $item->title }}</a>
                                                @elseif($page_id == '2')
                                                    <a href="{{ route('type.details', ["id"=>$item->id,"type"=>'news','url'=>$url]) }}">{{ $item->title }}</a>
                                                @elseif($page_id == '3')
                                                    <a href="{{ route('type.details', ["id"=>$item->id,"type"=>'news','url'=>$url]) }}">{{ $item->title }}</a>
                                                @elseif($page_id == '4')
                                                    <a href="{{ route('type.details', ["id"=>$item->id,"type"=>'news','url'=>$url]) }}">{{ $item->title }}</a>
                                                @elseif($page_id == '5')
                                                    <a href="{{ route('type.details', ["id"=>$item->id,"type"=>'news']) }}">{{ $item->title }}</a>
                                                @endif
                                            </h4>

                                        <p style="text-align: justify;">{!! Str::limit(@$item->short_description, 80) !!}</p>

                                        @if($page_id == '1')
                                            <a class="custom-font-titillium-web" href="{{ route('type.details', ["id"=>$item->id,"type"=>'news']) }}">
                                                <button type="button" class="btn btn-sm rounded-pill myplusclass"><i class="fas fa-plus" ></i> Read more</button>
                                            </a>
                                        @elseif($page_id == '2')
                                            <a href="{{ route('type.details', ["id"=>$item->id,"type"=>'news','url'=>$url]) }}">
                                                <button type="button" class="btn btn-sm rounded-pill custom-font-titillium-web myplusclass"><i class="fas fa-plus" ></i> Read more</button>
                                            </a>
                                        @elseif($page_id == '3')
                                            <a href="{{ route('type.details', ["id"=>$item->id,"type"=>'news','url'=>$url]) }}">
                                                <button type="button" class="btn btn-sm rounded-pill custom-font-titillium-web myplusclass"><i class="fas fa-plus" ></i> Read more</button>
                                            </a>
                                        @elseif($page_id == '4')
                                            <a href="{{ route('type.details', ["id"=>$item->id,"type"=>'news','url'=>$url]) }}">
                                                <button type="button" class="btn btn-sm rounded-pill custom-font-titillium-web myplusclass"><i class="fas fa-plus" ></i> Read more</button>
                                            </a> 
                                        @elseif($page_id == '5')
                                            <a href="{{ route('type.details', ["id"=>$item->id,"type"=>'news']) }}">
                                                <button type="button" class="btn btn-sm rounded-pill custom-font-titillium-web myplusclass"><i class="fas fa-plus" ></i> Read more</button>
                                            </a>
                                        @endif   
                                                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-md-12">
                            <h2 class="fs-5 p-3 mt-3  mb-0 bg-light rounded custom-font-titillium-web">There are no activities at the moment..</h2>
                        </div>
                    @endforelse
                    
                </div>
            
                <div class="more-btn col-md-12 text-center mt-5 mb-4">
                    @if($page_id == '1')
                        <a href="{{ route('type.all',['type'=>'news']) }}" class="btn btn-theme effect btn-md custom-font-titillium-web">View All News</a>
                    @elseif($page_id == '2')
                        <a href="{{ route('faculty_news', @$faculty->id) }}" class="btn btn-theme effect btn-md custom-font-titillium-web">View All News</a>
                    @elseif($page_id == '3')
                        <a href="{{ route('department_news', @$department->id) }}" class="btn btn-theme effect btn-md custom-font-titillium-web">View All News</a>
                    @elseif($page_id == '4')
                        <a href="{{ route('office_news', @$office->id) }}" class="btn btn-theme effect btn-md custom-font-titillium-web">View All News</a>
                    @elseif($page_id == '5')
                        <a href="{{ route('type.all',['type'=>'news']) }}" class="btn btn-theme effect btn-md custom-font-titillium-web">View All News</a>
                    @endif
                </div>
        </div>
    </div>

@endif