<!-- ===== News section start ===== -->

<section>
    <div class="container my-5">
        <div class="row">
            <div class="col-12 col-sm-8 shadow-sm" style="border: 1px solid #00c5bf38;        border-radius: 5px;">
                <h2 class="event-title mb-4" style="padding: 9px 0 0 0;">Recent and Upcoming <span class="text-color-one"> Events</span> </h2>
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="row">

                        <div class="col-12 col-sm-6">
                            <div class="carousel-inner">
                                @foreach ($events as $event)
                                <div class="carousel-item @if ($loop->first) active @endif">
                                    <img class="d-block w-100" height="450px" src="{{ $event->image ? asset('upload/news/'.$event->image) : asset('frontend/cuimages/dummy.png') }}" onerror="this.onerror=null;this.src='{{ asset('frontend/cuimages/dummy.png') }}';" alt="First slide">
                                    <div class="news-content">
                                        <p class="news_notice_event_date"><small>{{mydate($event->date)}}</small></p>

                                        <a class="news_notice_event_title" href="#"><h5>{{$event->title}}</h5></a>
                                        {{-- <p>{{$event->short_description}}</p> --}}
                                        <p>{{ Str::limit($event->short_description, 100) }}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="col-12 col-sm-6">
                            <ul class="list-unstyled mt-3 mt-sm-0">
                                @foreach ($events as $event)
                                <li class="mb-3 eventlist">
                                    <a href="#">
                                        <div class="row">
                                            <div class="col-4">
                                                <img src="{{ asset('upload/news/'.$event->image) }}" onerror="this.onerror=null;this.src='{{ asset('frontend/cuimages/dummy.png') }}';" alt="" class="img-fluid">
                                            </div>
                                            <div class="col-8">
                                                <p class="news_notice_event_date"><small> {{mydate($event->date)}}</small></p>
                                                <p class="news_notice_event_title">{{$event->title}}</p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-4">
                <div class="holder shadow-sm" style="padding: 0px">
                    <h2 class="notice-title text-color-one" style="letter-spacing: 0px;">Notices
                        <button class="control_btn float-end btnUp"><i class="fa-solid fa-arrow-up"></i></button>
                        <button class="control_btn float-end btnDown"><i class="fa-solid fa-arrow-down"></i></button>
                    </h2>
                    
                    <div class="demo" style="margin: 10px; color: #2D2D2D; ">
                        <ul id="ticker1111">
                            @foreach($notices as $i => $notice)
                                <li>
                                    <a href="#">
                                        <div class="row">
                                            {{-- <div class="col-4 a">
                                                <img src="{{ asset('upload/news/'.$notice->image) }}" onerror="myFunction()"  alt="" class="img-fluid">
                                            </div> --}}
                                            <div class="col-12 b">
                                                <p class="news_notice_event_date"><small>{{ mydate($notice->start_date) }}</small></p>
                                                <p class="news_notice_event_title">{{ $notice->title }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function myFunction() {
      $('.a').hide();
    }
    </script>
<!-- ===== News section End ===== -->
