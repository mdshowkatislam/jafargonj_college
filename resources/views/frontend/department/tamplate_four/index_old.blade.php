{{-- <style>
    .business-banner-card {
        background-image: linear-gradient(rgba(237, 28, 36, 0.4),
                rgba(237, 28, 36, 0.8)),
            url({{ asset('frontend/assets/img/bup/faculty_dept_banner.png') }});
    }
    #exampleModal {
        background: rgba(255, 255, 255, 0.4);
        backdrop-filter: blur(2px);
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .modal-content {
        border: none !important;
    }

    .modal-body p {
        text-align: justify;
    }
</style> --}}
{{-- @extends('frontend.department.tamplate_three.partials.main') --}}

{{-- @extends('frontend.department.tamplate_four.partials.main-second') --}}

<style>
     #ticker {
            position: absolute;
            width: 100%;
            height: 40px;
            white-space: nowrap;
            overflow: hidden;
            box-sizing: border-box;
            padding-top: 5px;
            padding-bottom: 5px;
        }

        #ticker p {
            margin: 0;
            display: inline-block;
            padding-left: 100%;
            animation: ticker-tape 20s linear infinite;
        }

        #ticker p a {
            font-size: 14px;
            color: blue;
            font-weight: 600;
            margin-right: 5px;
        }

        #ticker p .dot {
            display: inline-block;
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background-color: #fff;
            margin-right: 5px;
        }

        #ticker p:hover {
            animation-play-state: paused;
        }


        @keyframes ticker-tape {
            0% {
                transform: translate(0, 0);
            }

            100% {
                transform: translate(-100%, 0);
            }
        }
</style>
{{-- @extends('frontend.landing') --}}
@extends('frontend.department.tamplate_four.partials.main')

@section('content')
    @include('frontend.department.slider')

    <!-- Start Department Chair Block ======= -->
    <div class="features-area bottom-less" style="margin-top: 15px;">

        <div class="container">
            <div class="row" style="margin-bottom: 5px">
                <div class="col-md-6">
                    <section class="bg-secondary" style="height: 40px; position:relative;">
                        <div id="ticker">
                            <p>
                                @foreach(@$latest_news as $n)
                                @if($n->display_on_scrollbar == 1)
                                <a href="{{ route('type.details', ["id"=>$n->id,"type"=>'news']) }}"><span class="dot"></span> {{$n->title}}</a>
                                @endif
                                @endforeach
                            </p>
                        </div>
                    </section>
                </div>
                <div class="col-md-6">
                    <a class="btn btn-theme effect btn-block btn-lg btnhome" href="#">Citizen Charter<i class="fas fa-check-circle fa-2x fa-pull-right"></i></a>
                </div>
            </div>

            <div class="row">
                <div class="features">
                    <div data-aos="fade-up" class="equal-height col-md-6 col-sm-6">
                        <div class="item brilliantrose">
                            <a href="{{route('department_message', $department->id)}}">
                                <div class="info" style="min-height: 340px;text-align: justify !important;">
                                    <h4>About {!! $department->name !!}</h4>
                                    <p class="text-justify">{!! Str::limit($department->about,700,'...') !!}</p>
                                    <span class="btn btn-sm btn-primary pull-right">Read more...</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                    <div data-aos="fade-up" class="equal-height col-md-6 col-sm-6">
                        <div class="item brilliantrose">
                            <a href="{{route('chair-message.details', $message->profile->id)}}">
                                <div class="info" style="min-height: 340px; text-align: justify;">
                                    <h3>{{$message->title_first_part}}</h3>

                                    <p style="text-align: justify !important;">
                                        <img class="chair-msg"
                                            src="{{ @$message->profile->photo ? asset('upload/profiles/' . @$message->profile->photo) : @$message->profile->photo_path }}"
                                            alt="..."
                                            onerror="this.src='{{ asset('dummy/user-dummy.jpeg') }}'" style="width: 150px;float: left;box-shadow: 3px 3px 1px #ccc;margin-right: 10px">
                                    <h4 class="text-left" style="word-spacing: 3px;"><strong>{{ @$message->profile->nameEn }}</strong></h4>{!! Str::limit($message->short_description,500,'...') !!} </p>
                                    <span class="btn btn-sm btn-primary pull-right">Read more...</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End VC Sir Block -->

    <!-- Start Popular Courses
        ============================================= -->
        <div class="popular-courses-area carousel-shadow weekly-top-items default-padding bottom-less">
            <div class="container">
                <div class="row">
                    <div class="site-heading text-center">
                        <div class="col-md-8 col-md-offset-2">
                            <h2>Academic Programs</h2>
    
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="top-course-items courses-carousel owl-carousel owl-theme">
                            {{-- @dd($programs) --}}
                            @foreach(@$programs as $prog)
                            <!-- Single Item -->
                            <div class="item">
                                <div class="thumb">
                                    <img src="{{ asset('upload/program/' . $prog->image) }}"
                                        alt="Thumb" class="card-img-height">
                                </div>
                                <div class="info">
                                    <h4><a href="{{route('academics.academics_details', $prog->id)}}">{{@$prog->program_title}}</a>
                                    </h4>
                                    <p></p>
                                    <div class="footer-meta">
                                        <a class="btn btn-theme effect btn-block btn-lg btnhome"
                                            href="{{route('academics.academics_details', $prog->id)}}">Read More...<i class="fas fa-check-circle fa-2x fa-pull-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Item -->
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Popular Courses -->

        <!-- Start Blog
    ============================================= -->
    <div class="blog-area default-padding bottom-less" id="newsDiv">
        <div class="container">
            <div class="row">
                <div class="site-heading text-center">
                    <div class="col-md-8 col-md-offset-2">
                        <h2>Latest News</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="blog-items">
                    @foreach(@$latest_news as $n)
                    <!-- Single Item -->
                    <div class="col-md-4 single-item">
                        <div class="item">
                            <div class="thumb">
                                <a href="{{ route('type.details', ["id"=>$n->id,"type"=>'news']) }}">
                                    <img src="{{ asset('upload/news/' . $n['image']) }}" style="height: 240px;width: 100%;" alt="Thumb"
                                        class="img-min-width card-img-height"
                                        onerror="this.src='{{ asset('dummy/no-image.png') }}'">
                                </a>
                            </div>
                            <div class="info">
                                <div class="meta">
                                    <ul>
                                        <li><i class="fas fa-calendar-alt"></i>{{ date('M d,Y',strtotime(@$n->date)) }}</li>
                                    </ul>
                                </div>
                                <div class="content">
                                    <h4 class="text-left min-height-130px"><a href="{{ route('type.details', ["id"=>$n->id,"type"=>'news']) }}">{{ @$n->title }}</a>
                                    </h4>
                                    <p> {{ Str::limit(@$n->short_description,100,'...') }} </p>
                                    <a href="{{ route('type.details', ["id"=>$n->id,"type"=>'news']) }}"><i class="fas fa-plus"></i> Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
        <div class="more-btn col-md-12 text-center">
            <a href="{{ route('type.all', ['type'=>'news']) }}" class="btn btn-theme effect btn-md">View All News</a>
        </div>
    </div>
    <!-- End Blog -->

    <!-- Start Event
    ============================================= -->
    <div class="event-area default-padding" id="upcomingEventDiv">
        <div class="container">
            <div class="row">
                <div class="site-heading text-center">
                    <div class="col-md-8 col-md-offset-2">
                        <h2>Recent and Upcoming Events</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="event-items">
                        {{-- @dd($events) --}}
                        @foreach(@$events as $item)
                        <!-- Single Item -->
                        <div class="item">
                            <div class="col-md-5 thumb"
                                style="background-image: url('{{ asset('/upload/news/'.$item->image) }}');">
                            </div>
                            <div class="col-md-7 info">
                                <div class="info-box">
                                    <div class="date">
                                        <strong>{{ date('d',strtotime($item->date)) }}</strong> {{ date('M, Y',strtotime($item->date)) }}
                                    </div>
                                    <div class="content">
                                        <h4> <a href="{{ route('type.details', ["id"=>$item->id,"type"=>'events']) }}">{{ $item->title }}</a></h4>
                                        <ul>
                                            <li><i class="fas fa-clock"></i> </li>
                                            <li><i class="fas fa-map-marked-alt"></i> </li>
                                        </ul>
                                        <p> {{ Str::limit(@$item->short_description,100,'...')}} </p>
                                        <div class="bottom">
                                            <a href="{{ route('type.details', ["id"=>$item->id,"type"=>'events']) }}"
                                                class="btn circle btn-dark border btn-sm text-center">
                                                <i class="fas fa-plus"></i> Read More
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Item -->
                        @endforeach
                    </div>
                </div>
                <div class="more-btn col-md-12 text-center">
                    <a href="{{ route('type.all',['type'=>'events']) }}" class="btn btn-theme effect btn-md">View All Events</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Event -->

    <!-- Start Weekly Top
    ============================================= -->
    <div class="weekly-top-items carousel-shadow default-padding" id="researchNewsDiv">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="top-courses">
                        <div class="heading">
                            <h4>Research News</h4>
                        </div>
                        <div class="top-course-items top-courses-carousel-modified owl-carousel owl-theme">
                            {{-- @dd($infos) --}}
                            @foreach(@$infos as $item)
                            <!-- Single Item -->
                            <div class="item">
                                <div class="thumb">
                                    <img src="{{ asset('/upload/journal/'.$item->image) }}"
                                    style="height: 240px;width: 100%;"    
                                    alt="Thumb" class="card-img-height">
                                </div>
                                <div class="info">
                                    <h4>
                                        <a href="{{ route('research.details',$item->id) }}">{{ @$item->title }}</a>
                                    </h4>
                                    <p> {!! Str::limit(@$item->description,100,'...') !!} </p>
                                    <ul>
                                        <strong>
                                            <li>Published on:
                                        </strong>{{ date('M d,Y',strtotime(@$item->date)) }}</li>
                                    </ul>
                                    <div class="footer-meta">
                                        <a class="btn btn-theme effect btn-block btn-sm"
                                            href="{{ route('research.details',$item->id) }}">Read More...</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="more-btn col-md-12 text-center" style="margin-top: 15px;">
                        <a href="{{ route('department_research',$department->id) }}" class="btn btn-theme effect btn-sm">View All
                            Research News</a>
                    </div>
                </div>
                <div class="col-md-4" id="noticeBoardDiv">
                    <div class="top-author">
                        <h4>Notice Board</h4>
                        <div class="author-items">
                            @foreach (@$notices as $item )
                            <!-- Single Item -->
                            <div class="item">
                                <div class="text-justify">
                                    <h5><a href="{{ route('type.details', ["id"=>$item->id,"type"=>'notice']) }}">{{ @$item->title }}</a></h5>
                                    <ul>
                                        <strong>
                                            <li>Published on:
                                        </strong>{{ date('M d,Y',strtotime(@$item->date)) }}</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End Single Item -->
                            @endforeach

                            <a href="{{ route('type.all',['type'=>'notice']) }}">View All <i
                                    class="fas fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Weekly Top -->

    <!-- start dept members ================================ -->
    {{-- <div class="advisor-area bg-gray default-padding bg-cover" id="notableAlumniDiv">
        <div class="container">
            <div class="row">
                <div class="site-heading text-center">
                    <div class="col-md-8 col-md-offset-2">
                        <h2>Department Members</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="advisor-items col-3 advisor-carousel-modified owl-carousel owl-theme text-light text-center">
                        @php
                            $i = 0;
                        @endphp

                        <!-- Single item -->
                        @foreach ($faculty_members as $key => $member)
                        @php
                            $i++;
                        @endphp

                        <div class="item">
                            <div class="thumb">
                                <a href="{{ route('faculty_member.details', $member->profile_id) }}">
                                    <img class="mx-2 mt-2 shadow-lg image-circle"
                                    src="{{ $member->profile->photo ? asset('upload/profiles/' . $member->profile->photo) : $member->profile->photo_path }}"
                                    height="200" width="200"
                                    onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';"
                                    alt="Thumb">
                                </a>

                            </div>
                            <div class="info" style="min-height: 140px">
                                <h4><a href="{{ route('faculty_member.details', $member->profile_id) }}">{{ $member->profile->nameEn }}</a></h4>
                                <span>{{ $member->profile->designation }}</span>
                            </div>
                            <div class="footer-meta">
                                <a class="btn circle btn-dark border btn-md" style="margin:10px;" href="{{ route('faculty_member.details', $member->profile_id) }}">View Profile<i class="fas fa-check-circle fa-2x fa-pull-right"></i></a>
                            </div>
                        </div>
                        @if ($i == 12)
                            @break
                        @endif

                        @endforeach
                        <!-- End Single item -->

                    </div>
                </div>
                <div class="more-btn col-md-12 text-center" style="margin-top: 50px">
                    <a href="{{ route('department_all_faculties', $department->id) }}" type="button"
                        class="btn btn-dark border btn-md px-5 py-2">All Department Members</a>
                </div>        
            </div>
        </div>
    </div> --}}

    <!-- End dept members ================================= -->

    <!-- Start Advisor
    ============================================= -->
    {{-- <div class="advisor-area bg-gray default-padding bg-cover" id="notableAlumniDiv">
        <div class="container">
            <div class="row">
                <div class="site-heading text-center">
                    <div class="col-md-8 col-md-offset-2">
                        <h2>Notable Alumni</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div
                        class="advisor-items col-3 advisor-carousel-modified owl-carousel owl-theme text-light text-center">
                        <!-- Single item -->

                        <div class="item">
                            <div class="thumb">
                                <a href="#">
                                    <img src=""
                                        alt="Thumb">
                                </a>

                            </div>
                            <div class="info" style="min-height: 140px">
                                <span>50th Anniversary of Accounting Department &amp; Accounting Alumni 25th Anniversary
                                    Celebration which will be held on Friday and Saturday, January 24 and 25,
                                    2020</span>
                                <h4><a href="#">Accounting Alumni</a></h4>
                            </div>
                        </div>

                        <!-- End Single item -->

                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- End Advisor -->

    <!-- Start Fun Factor
    ============================================= -->
    <div class="fun-factor-area default-padding text-center bg-fixed shadow dark-hard"
        style="background-image: url(assets/img/banner/30.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-6 item">
                    <div class="fun-fact">
                        <div class="icon">
                            <i class="fas fa-university"></i>
                        </div>
                        <div class="info">

                            <span class="timer" data-to="1921" data-speed="5000"></span>
                            <span class="medium">Founded </span>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 item">
                    <div class="fun-fact">
                        <div class="icon">
                            <i class="fas fa-user-shield"></i>
                        </div>
                        <div class="info" style="text-align: center">
                            <span class="timer" data-to="2000" data-speed="5000" style="display:inline;"></span>
                            <span style="display:inline;font-size: 36px">+</span>

                            <div class="clearfix"></div>
                            <span class="medium">Faculty Members</span>
                        </div>
                    </div>
                </div>
                <div data-aos="zoom-out" class="col-md-3 col-sm-6 item">
                    <div class="fun-fact">
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="info" style="text-align: center">
                            <span class="timer" data-to="37000" data-speed="5000" style="display:inline;"></span>
                            <span style="display:inline;font-size: 36px">+</span>

                            <span class="medium">Regular Students</span>
                        </div>
                    </div>
                </div>
                <div data-aos="zoom-out" class="col-md-3 col-sm-6 item">
                    <div class="fun-fact">
                        <div class="icon">
                            <i class="fas fa-school"></i>
                        </div>
                        <div class="info" style="text-align: center">
                            <span class="timer" data-to="134" data-speed="5000" style="display:inline;"></span>
                            <span style="display:inline;font-size: 36px"></span>
                            <span class="medium">Constituent & Affiliated Colleges</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Fun Factor -->

    @if (@$modal)
        @include('frontend.partials.modal.view')
    @endif
@endsection
