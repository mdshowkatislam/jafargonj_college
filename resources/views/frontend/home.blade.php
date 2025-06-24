@extends('frontend.landing')
@php
    $page_title = 'Home Page';
@endphp
@section('title')
    {{ $page_title }}
@endsection
@section('content')
    <!-- Start Banner === -->

    @include('frontend.partials.slider_home')

    <div class="features-area">
            <div class="container">
                <div class="row">
                    <div class="features">
                        <div data-aos="fade-left" class="equal-height col-md-3 col-sm-6 aos-init"
                            style="height: 300px;">
                            <div class="item mariner">
                                <a href="#">
                                    <div style="height: 200px;" class="info">
                                        <p class="text-center">
                                            <img src="{{ @$vcInfo['profile']['photo'] ? asset('/upload/profiles/' . @$vcInfo['profile']['photo']) : @$vcInfo['profile']['photo_path'] }}" height="200"
                                                width="160" alt=" Vice Chancellor" srcset="">

                                        </p>
                                        <p style="font-weight: bold; font-size: 12px;">
                                        {{ @$vcInfo['profile']['nameEn'] }}</p>
                                        <h5 class="text-center"><strong>Vice Chancellor</strong></h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div data-aos="fade-up" class="equal-height col-md-9 col-sm-6 aos-init" style="height: 300px;">
                            <div class="item brilliantrose">
                                <a href="#" target="_blank">
                                    <div style="height: 200px; overflow: hidden;" class="info">
                                        <h4>Message from the Vice Chancellor...</h4>
                                        <h5>Respected members of the university community,</h5>
                                        <p class="text-justify">

                                            {!! @$vcInfo->short_description !!}
                                              ...
                                            <button
                                                class="btn circle btn-dark border btn-sm text-center pull-right">Read
                                                more...</button>
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    <!-- End VC Sir Block -->
    <!-- <div class="features-area  bottom-less">
        <div class="container">
            <div class="row">
                <div class="features">
                    <div style="text-align: center;" data-aos="fade-left" class="equal-height col-md-4 col-sm-6">
                        <div class="item mariner">
                            <a href="provcp.html">
                                <div style="height: 220px;" class="info">
                                    <p>
                                        <img src="./assets/img/home/1629097468Photo- Dr- Muhammad Samad 4 - Copy.jpg"
                                            height="200" width="171" alt="Pro Vice Chancellor" srcset="">
                                    </p>
                                    <p style="font-weight: bold; font-size: 14px;">
                                        Professor Dr. Muhammad Samad
                                    </p>
                                    <h5 style="font-weight: bold;">Pro Vice Chancellor (Administration)</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div style="text-align: center;" data-aos="fade-left" class="equal-height col-md-4 col-sm-6">
                        <div class="item mariner">
                            <a href="provca.html">
                                <div style="height: 220px;" class="info">
                                    <p>
                                        <img src="./assets/img/home/1705294221ASM_Maksud_Kamal.jpg" height="200"
                                            width="160" alt=" Vice Chancellor" srcset="">

                                    </p>
                                    <p style="font-weight: bold; font-size: 14px;">
                                        Professor Dr. Sitesh Chandra Bachar
                                    </p>
                                    <h5 style="font-weight: bold;">Pro Vice Chancellor (Academic)</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div style="text-align: center;" data-aos="fade-left" class="equal-height col-md-4 col-sm-6">
                        <div class="item mariner">
                            <a href="treasurer.html">
                                <div style="height: 220px;" class="info">
                                    <p>
                                        <img src="assets/img/images/Momtaj.jpg" height="200" width="196"
                                            alt=" Vice Chancellor" srcset="">

                                    </p>
                                    <p style="font-weight: bold; font-size: 14px;">
                                        Professor Mamtaz Uddin Ahmed
                                    </p>
                                    <h5 style="font-weight: bold;">Treasurer</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <br><br>
    <br>
    <!-- Start Fun Factor === -->
    <div class="row">
        <div class="site-heading text-center">
            <div class="col-md-8 col-md-offset-2">
                <h2>Jafargonj Mir Abdul Gafur College in Numbers</h2>
            </div>
        </div>
    </div>
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
    <br><br>
    <!-- Start About ===== -->
    <div class="about-area default-padding-bottom">
        <div class="container">
            <div class="row">
                <div class="about-items">
                    <div data-aos="fade-down-right" class="col-md-6 about-info">
                        <h3 class="text-justify">
                            {!! $welcome_page->title!!}

                        </h3>
                        <h3 class="text-justify">

                        </h3>
                        @php
                        $orginalText=$welcome_page->description;
                        $truncatedText=Str::limit($welcome_page->description ,800,'....');
                        $textLeft=strlen($orginalText)===strlen($truncatedText);
                        @endphp
                        <p class="text-justify">
                         {!! Str::limit($welcome_page->description ,800,"....")!!}
                        </p>
                        @if(!$textLeft)
                        <a class="btn btn-theme effect btn-block btn-lg btnhome" href="{{route('about_overview')}}">Read
                            More...<i class="fas fa-check-circle fa-2x fa-pull-right"></i></a>
                        @endif
                    </div>



                    <div data-aos="fade-up-left" class="col-md-6 thumb">
                        <div class="thumb bg-success" >
                            <img src="{{ asset('/assets/welcome/' . @$welcome_page->image) }}" alt="Thumb">

                            @if (isset($welcome_page) && !empty($welcome_page->video_url))
                            <a href="{{ $welcome_page->video_url }}" class="popup-youtube light video-play-button">
                                <i class="fa fa-play"></i>
                            </a>
                        @else
                            <p>No video available</p>
                        @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End About -->
    <!-- Start Blog === -->

    @include('frontend.partials.latest_news')

    <!-- End Blog -->

    <!-- Start Event === -->
    <div class="event-area flex-less default-padding" style="background-color: #eee;">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ">
                    <div class="row">
                        <div class="site-heading text-center">
                            <div class="col-md-8 col-md-offset-2">
                                <h2>Recent and Upcoming Events
                                </h2>

                            </div>
                        </div>
                    </div>
                    {{--  @dd($events)  --}}
                    <div class="row">
                        <div class="event-items">
                            <!-- Single Item -->
                            @foreach (@$events as $item )
                            <div data-aos="zoom-in-up" class="col-md-6 col-sm-6 equal-height">
                                <div class="item">
                                    <div class="thumb">
                                        <img src="{{ asset('/upload/news/'.$item->image) }}"
                                            style="height:250px;" alt="Thumb">
                                    </div>
                                    <div class="info">
                                        <div class="info-box" style="padding:35px 35px">
                                            <div class="date">
                                                <strong style="font-size: 30px">{{ date('d',strtotime($item->date)) }}</strong>
                                                {{ date('M Y',strtotime($item->date)) }}
                                            </div>
                                            <br>
                                            <div class="content" style="margin-left: 0px">
                                                <h4 class="text-left " style="height: 180px; word-spacing: 5px">
                                                    <a href="{{ route('type.details', ["id"=>$item->id,"type"=>'events']) }}">
                                                      {{ $item->title }}
                                                    </a>
                                                </h4>
                                                <ul>


                                                </ul>

                                                <div class="bottom" style="margin-top: 20px">
                                                    <div class="col-sm-12">
                                                        <a href="{{ route('type.details', ["id"=>$item->id,"type"=>'events']) }}"
                                                            class="btn circle btn-dark border btn-sm text-center">
                                                            <i style="color: #1C4370" class="fas fa-plus"></i> Read More
                                                        </a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            @endforeach

                            <!-- End Single Item -->

                        </div>
                        <div class="more-btn col-md-12 text-center">
                            <a href="{{ route('type.all',['type'=>'events']) }}" class="btn btn-theme effect btn-md">View All Events</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="row">
                        <div class="site-heading text-center">
                            <div class="col-md-8 col-md-offset-2">
                                <h2>Notices
                                </h2>

                            </div>
                        </div>
                    </div>
                    <div class="top-author" style="padding-left: 20px;">

                        <div class="author-items" style="background-color: white;overflow:scroll;height: 551px">
                            <!---- Single Item -->
                            <div class="item">

                                <div class="info" style="width: 100%">
                                    @foreach (@$notices as $item )
                                    <h5 style="text-align: justify">
                                        <a href="{{ route('type.details', ["id"=>$item->id,"type"=>'notice']) }}" target="_blank">{{ $item->title }}</a>
                                    </h5>
                                    <ul>
                                        <li class="border">
                                            <span>
                                                Published: {{ date('M d,Y',strtotime($item->date)) }}</span>
                                        </li>
                                        <li>
                                            <a href="{{ route('type.details', ["id"=>$item->id,"type"=>'notice']) }}" target="_blank"
                                                class="btn circle btn-dark border btn-sm text-center">
                                                <i class="fas fa-plus" style="color: #002147"></i> Read More</a>
                                        </li>

                                    </ul>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="more-btn col-md-12 text-center" style="padding-top: 25px">
                            <a href="{{ route('type.all',['type'=>'notice']) }}" class="btn btn-theme effect btn-md">View All Notices</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Event -->

    <!-- Start Popular Courses
            ============================================= -->
    <!---Start Research Block
            ============================================= -->

    <div class="popular-courses-area weekly-top-items bg-gray default-padding bottom-less">
        <div class="container">
            <div class="row">
                <div class="site-heading text-center">
                    <div class="col-md-8 col-md-offset-2">
                        <h2> Research Activities</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="top-course-items courses-carousel owl-carousel owl-theme">
                    @foreach (@$chsrResearces as $item)

                    <div data-aos="fade-up">
                        <div class="item">
                            <div class="thumb">
                                <img src="{{ asset('/upload/journal/'.$item->image) }}" style="height: 220px"
                                    alt="Thumb">
                                <div class="overlay">
                                    <a href="#"> Image Not Found
                                    </a>
                                </div>
                            </div>
                            <div class="info">
                                <div class="meta">
                                    <ul>
                                        <li class="bg-success">
                                            <a href="{{ route('research.details',$item->id) }}">{{ date('d M, Y',strtotime($item->date)) }}</a>
                                        </li>
                                    </ul>
                                </div>
                                <h4 class="text-left min-height-130px" style="word-spacing: 5px">
                                    <a href="{{ route('research.details',$item->id) }}">{{ $item->title }}</a>
                                </h4>
                                <div class="footer-meta text-center">
                                    <a href="{{ route("research.details",$item->id) }}" class="btn circle btn-dark border btn-sm text-center">
                                        <i class="fas fa-plus"></i> Read More
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>


                <div class="more-btn col-md-12 text-center" style="padding-top: 20px">
                    <a href="{{ route('research_list') }}" class="btn btn-theme effect btn-md">View All Research Activities</a>
                </div>

            </div>
        </div>
    </div>

 
    

    <!-- End Academic Block -->

    <!---End Research Block-->

    <!-- End Offer Area -->

    <!--- Start Weekly Top
            ============================================= -->
    <div class="weekly-top-items carousel-shadow default-padding-bottom">
        <div class="container">
            <div class="row">
                <div class="site-heading text-center">
                    <div class="col-md-8 col-md-offset-2">

                    </div>
                </div>
                <div class="col-md-8">
                    <div class="top-courses">
                        <div class="heading">
                            <h4><span>Featured- </span><strong>News & Events</strong><span><a href="{{ route('type.all',['type'=>'news_events']) }}"
                                        class="pull-right">View All <i class="fas fa-angle-double-right"></i></a></span>
                            </h4>
                        </div>
                        <div class="top-course-items top-courses-carousel owl-carousel owl-theme">
                            <!-- Single Item -->
                            @foreach (@$featured_news_events as $item )


                            <div data-aos="fade-up" data-aos-duration="3000" class="item">
                                <div class="thumb">
                                    <img src="{{ asset('/upload/news/'.@$item->image) }}" alt="Thumb"
                                        style="height: 262px">

                                </div>
                                <div class="info">
                                    <h4 class="text-left" style="height: 150px; word-spacing: 5px">
                                        <a href="{{ route('type.details', ["id"=>$item->id,"type"=>'news_events']) }}">{{ @$item->title }}</a>
                                    </h4>

                                    <div class="footer-meta">
                                        <a class="btn btn-theme effect btn-block btn-lg btnhome" href="{{ route('type.details', ["id"=>$item->id,"type"=>'news_events']) }}">Read
                                            More...<i class="fas fa-check-circle fa-2x fa-pull-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            @endforeach



                            <!-- Single Item -->

                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="top-author">
                        <h4>Student Achievements</h4>
                        <div class="author-items">
                            @foreach (@$specialAcivment as $item)

                            <div data-aos="fade-up-left" data-aos-duration="3000" class="item">
                                <div class="thumb">
                                    <a href="{{ route('achievement.details',$item->id) }}">

                                        <img src="{{ asset('/upload/special_achievement/'.$item->image) }}" alt="Thumb">

                                    </a>
                                </div>
                                <div class=" info">
                                    <h5> <a href="{{ route('achievement.details',$item->id) }}" target="_blank">{{ $item->title }}</a></h5>
                                    <ul>
                                        <li class="border">
                                            <span>
                                                {{ date('Y',strtotime($item->date)) }}</span>

                                        </li>
                                        <li>
                                            <span> <a href="{{ route('achievement.details',$item->id) }}" target="_blank">
                                                    <i class="fas fa-book-open"></i> View
                                                    Details</a></span>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            @endforeach


                            <a href="{{ route('achievement-student-all') }}">View All<i class="fas fa-angle-double-right"></i></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Start About ===== -->
    <div class="about-area default-padding-bottom">
        <div class="container">
            <div class="row">
                <div class="courses-carousel owl-carousel owl-theme">
                    @foreach (@$vidoe_gallery as $item)
                    <div class="item">
                        <div data-aos="fade-up-right" class="thumb">
                            <div class="thumb">
                                <iframe width="100%" height="180"
                                    src="{{ $item->youtube_link }}" frameborder="0"
                                    allowfullscreen></iframe>
                            </div>
                            <div style="font-size: 14px;text-align:justify;color:blue;">
                                {{ $item->title }}
                               </div>
                        </div>

                    </div>
                    @endforeach

                </div>
                <div class="more-btn col-md-12 text-center" style="padding-top: 20px">
                    <a target="_blank" href="{{ route('videogallery.all') }}" class="btn btn-theme effect btn-md">View All</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End About -->

    <!--- End Weekly Top --->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Jafargonj Mir Abdul Gafur College</h4>
                </div>
                <div class="modal-body">
                    <iframe width="100%" height="500" src="https://www.youtube.com/embed/_njoCucIscE?si=Y_u79tKmGCylOZaY"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>
                        Close</button>
                </div>
            </div>

        </div>
    </div>

    <!-- Start About ===== -->
    <div class="about-area default-padding-bottom">
        <div class="container">
            <div class="row">

                @foreach ($apas as $apa)
                    <div class="col-md-4 pb-3">
                        <div class="card shadow-sm p-2"
                                style="height: 200px; cursor: pointer;">
                            <table class="table">
                                <tbody>
                                    <tr  class="list-group" style="list-style-type:disc">
                                        <td colspan="2"><strong>{{ @$apa->title }}</strong></td>
                                    </tr>


                                    <tr>
                                        <td><img src="{{ asset('/upload/apa_category/' . @$apa->image) }}" width="130px">
                                        </td>
                                        <td>
                                            <ul class="list-group"
                                                style="list-style-type:disc;">
                                                @foreach ($apa->apa_report as $report)
                                                    <li class="my_icon"
                                                        style="list-style-type: circle;font-size:14px !important">
                                                        <i class="ti-arrow-circle-right text-info"></i> &nbsp;&nbsp;
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

    <!-- End About -->


@endsection
