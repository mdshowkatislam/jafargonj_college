<div class="d-flex justify-content-between align-items-end">
    <h1 class="text-uppercase mb-0 home-content-heading">
        Latest News
    </h1>
    {{-- <a href="" class="text-uppercase text-decoration-none fw-bold common-font-color">All</a> --}}
</div>

<div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;">
</div>
<div class="row">
    @if (count($latest_news) > 0)
        @foreach ($latest_news as $item)
            <div class="col-md-4 mt-3">
                <div class="single-news">
                    <div class="single-news-thumb">
                        <a href="{{ route('type.details', ["id"=>$item->id,"type"=>'news',"url"=>$url]) }}">
                            <img class="p-2 w-100 object-cover" height="250px"
                                src="{{ asset('upload/news/' . @$item->image) }}"
                                onerror="this.onerror=null;this.src='{{ asset('upload/no-image.png') }}';"
                                alt="" />
                        </a>
                    </div>
                    <div class="info">
                        <div class="single-news-date">
                            <ul class="m-0">
                                <li class="py-1" style="font-size: 14px"><i class="fas fa-calendar-alt pe-1"></i>
                                    {{ date('M d, Y'), strtotime($item->date) }}
                                </li>
                            </ul>
                        </div>
                        <div class="single-news-content px-4 pt-3 pb-5">
                            <h4 class="text-left"><a
                                    href="{{ route('type.details', ["id"=>$item->id,"type"=>'news',"url"=>$url]) }}">{{ $item->title }}</a>
                            </h4>
                            <p>{!! Str::limit(@$item->short_description, 80) !!}</p>
                            <a class="latest-news-btn" href="{{ route('type.details', ["id"=>$item->id,"type"=>'news',"url"=>$url]) }}"><i
                                    class="fas fa-plus"></i> Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="col-12 mt-3">
            <h2 class="fs-5 p-3 m-0 bg-light rounded">There are no news at the moment..</h2>
        </div>
    @endif
</div>
