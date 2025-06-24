<style>
    .research-news{
        height: 400px;
    }

    @media only screen and (max-width: 576px) {
        .research-news{
            height: 420px;
        }
    }
</style>


<div class="p-2"> 

            <div class="d-flex justify-content-between align-items-end">
                <h2 class="text-uppercase mb-0 home-content-heading custom-font-titillium-web">Butex Media</h2>
                {{-- <a href="" class="text-uppercase text-decoration-none fw-bold common-font-color">All</a> --}}
            </div>
            
            <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;"></div>

            <div class="row">
                @forelse (@$infos as $item)
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 mt-3">
                        <div class="research-news shadow">
                            <div class="single-news-thumb">
                                {{-- <a href="{{ route('type.details', ["id"=>$item->id,"type"=>'news','url'=>$url]) }}"> --}}
                                <a href="{{ route('research.details',['id'=>$item->id,'url'=>@$url]) }}">
                                    <img class="p-2 w-100 object-cover" height="200px"
                                        src="{{ asset('/upload/journal/'.$item->image) }}"
                                        onerror="this.onerror=null;this.src='{{ asset('upload/no-image.png') }}';"
                                        alt="" />
                                </a>
                            </div>
                            <div class="info">
                                <div class="single-news-date">
                                    <ul class="m-0">
                                        <li class="py-1" style="font-size: 14px; list-style-type: none;"><i class="fas fa-calendar-alt pe-1"></i>
                                            {{ \Carbon\Carbon::parse($item->date)->format('d M, Y') }}</li>
                                    </ul>
                                </div>
                                <div class="single-news-content px-2 pt-3 pb-2">
                                    <h4 class="text-left" style="height: 80px; word-spacing: 5px; font-size: 15px; text-align: justify;">
                                        <a href="{{ route('research.details',['id'=>$item->id,'url'=>@$url]) }}">{{ $item->title }}</a></h4>
                                    {{-- <p>{!! Str::limit(@$item->short_description, 80) !!}</p> --}}
                                    <a class="btn btn-sm rounded-pill custom-font-titillium-web" href="{{ route('research.details',['id'=>$item->id,'url'=>@$url]) }}"><i
                                            class="fas fa-plus"></i> Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-md-12">
                        <h2 class="fs-5 p-3 mt-3  mb-0 bg-light rounded">There are no activities at the moment..</h2>
                    </div>
                @endforelse
            </div>

            <div class="p-2 mt-3">
                {{ $infos->links() }}
            </div>
 

</div>