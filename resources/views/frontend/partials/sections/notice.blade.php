<div class="row ">
    <div class="col-lg-5 col-md pb-5">
        <div class="notice_main shadow-sm border">
            <div class="d-flex justify-content-between align-items-end common-bg-color">
                <h1 class="text-white text-uppercase fw-bolder p-3 fs-3 m-0 ">Notices</h1>
                <a href="{{ route('notice.all') }}"
                    class="text-uppercase text-decoration-none text-white text-uppercase p-3 fs-6 m-0 fw-bolder">All</a>
            </div>
            @foreach ($notices as $notice)
                <div class="col-md m-3 notice-div border-bottom">
                    <a href="{{ route('notice.details', $notice->id) }}">
                        <p class="mb-2 fs-7"><i class="fas fa-calendar-alt"></i>
                            {{ date('M d, Y', strtotime(@$notice->date)) }}</p>
                        <h3 class="fs-6 hover-on-text">{{ Str::limit(@$notice->title, 100, '...') }}</h3>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    @php
        if (!empty($featuredVideo->youtube_link)) {
            $str = $featuredVideo->youtube_link;
            $exp = explode('/', $str);
            $len = count($exp);
        }
    @endphp
    <div class="col-lg-7 pb-5">
        {{-- <img class="" src="{{ asset('frontend/assets/img/home/video.png') }}" width="100%" /> --}}
        @if (!empty(@$featuredVideo->youtube_link))
            {{-- <iframe id="myVideo" preload="none" style="pointer-events:none;" width="100%;" height="350vw" src="{{ !empty($featuredVideo->youtube_link) ? $featuredVideo->youtube_link : '' }}?playlist={{ !empty($exp) ? $exp[$len-1] : '' }}&loop=1&enablejsapi=1&autoplay=1&mute=1&modestbranding=1&autohide=1&showinfo=0&controls=0" title="YouTube video player" frameborder="0" allow=""></iframe> --}}
            {{-- <iframe id="myVideo" preload="none" style="border-top-left-radius: 5000px;border-bottom-left-radius: 5000px;pointer-events:none;" width="100%;" height="350vw" src="https://www.youtube.com/embed/Fb57AZ8wBtU?playlist=Fb57AZ8wBtU&loop=1&enablejsapi=1&autoplay=1&mute=1&modestbranding=1&autohide=1&showinfo=0&controls=0" title="YouTube video player" frameborder="0" allow=""></iframe> --}}
            <iframe src="{{ @$featuredVideo->youtube_link }}" max-width="90%" width="100%;" height="100%"
                frameborder="0" style="border:0;max-width: 100%;" allowfullscreen=""></iframe>
        @endif
    </div>
</div>
