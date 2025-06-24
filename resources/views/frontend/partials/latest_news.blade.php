@if (!empty($news) && $news->count())
    <div class="blog-area default-padding bottom-less">
        <div class="container text-center">
            <div class="row">
                <div class="text-center site-heading">
                    <h2 class="custom-font-titillium-web">Latest News</h2>
                </div>
            </div>
            
                <div class="row">    
                    @forelse ($news as $item)
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
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
                                                {{ \Carbon\Carbon::parse($item->date)->format('M d, Y') }}</li>
                                        </ul>
                                    </div>
                                        <div class="single-news-content px-4 pt-3 pb-5">
                                            <h4 class="text-left custom-font-titillium-web" style="text-align: justify; font-size: 15px; height: 60px;">
                                                @if($page_tab_id == '1')
                                                    <a href="{{ route('type.details', ["id"=>$item->id,"type"=>'news']) }}">{{ $item->title }}</a>
                                                @elseif($page_tab_id == '2')
                                                    <a href="{{ route('type.details', ["id"=>$item->id,"type"=>'news','url'=>$url]) }}">{{ $item->title }}</a>
                                                @elseif($page_tab_id == '3')
                                                    <a href="{{ route('type.details', ["id"=>$item->id,"type"=>'news','url'=>$url]) }}">{{ $item->title }}</a>
                                                @elseif($page_tab_id == '4')
                                                    <a href="{{ route('type.details', ["id"=>$item->id,"type"=>'news','url'=>$url]) }}">{{ $item->title }}</a>
                                                @endif
                                            </h4>

                                        <p style="text-align: justify;">{!! Str::limit(@$item->short_description, 80) !!}</p>

                                        @if($page_tab_id == '1')
                                            <a class="custom-font-titillium-web" href="{{ route('type.details', ["id"=>$item->id,"type"=>'news']) }}">
                                                <button type="button" class="btn btn-sm rounded-pill"><i class="fas fa-plus" style="color: #1C4370;"></i> Read more</button>
                                            </a>
                                        @elseif($page_tab_id == '2')
                                            <a href="{{ route('type.details', ["id"=>$item->id,"type"=>'news','url'=>$url]) }}">
                                                <button type="button" class="btn btn-sm rounded-pill custom-font-titillium-web"><i class="fas fa-plus" style="color: #1C4370;"></i> Read more</button>
                                            </a>
                                        @elseif($page_tab_id == '3')
                                            <a href="{{ route('type.details', ["id"=>$item->id,"type"=>'news','url'=>$url]) }}">
                                                <button type="button" class="btn btn-sm rounded-pill custom-font-titillium-web"><i class="fas fa-plus" style="color: #1C4370;"></i> Read more</button>
                                            </a>
                                        @elseif($page_tab_id == '4')
                                            <a href="{{ route('type.details', ["id"=>$item->id,"type"=>'news','url'=>$url]) }}">
                                                <button type="button" class="btn btn-sm rounded-pill custom-font-titillium-web"><i class="fas fa-plus" style="color: #1C4370;"></i> Read more</button>
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
            
                <div class="more-btn col-md-12 text-center mt-3">
                    @if($page_tab_id == '1')
                        <a href="{{ route('type.all',['type'=>'news']) }}" class="btn btn-theme effect btn-md custom-font-titillium-web">View All News</a>
                    @elseif($page_tab_id == '2')
                        <a href="{{ route('faculty_news', @$faculty->id) }}" class="btn btn-theme effect btn-md custom-font-titillium-web">View All News</a>
                    @elseif($page_tab_id == '3')
                        <a href="{{ route('department_news', @$department->id) }}" class="btn btn-theme effect btn-md custom-font-titillium-web">View All News</a>
                    @elseif($page_tab_id == '4')
                        <a href="{{ route('office_news', @$office->id) }}" class="btn btn-theme effect btn-md custom-font-titillium-web">View All News</a>
                    @endif
                </div>
        </div>
    </div>

@endif