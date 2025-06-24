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
                                            <img src="{{ asset('frontend/assets/images/1705294221ASM_Maksud_Kamal.jpg') }}" height="200"
                                                width="160" alt=" Vice Chancellor" srcset="">

                                        </p>
                                        <p style="font-weight: bold; font-size: 12px;">
                                            Prof. Dr. A. S. M. Maksud Kamal</p>
                                        <h5 class="text-center"><strong>Vice Chancellor</strong></h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div data-aos="fade-up" class="equal-height col-md-9 col-sm-6 aos-init" style="height: 300px;">
                            <div class="item brilliantrose">
                                <a href="#" target="_blank">
                                    <div style="height: 200px; overflow: hidden;" class="info">
                                        <h4>Message from the Vice Chancellor</h4>
                                        <h5>Respected members of the university community,</h5>
                                        <p class="text-justify">
                                             
                                            {!! $vcInfo->short_description !!}
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
        <div class="features-area  bottom-less">
            <div class="container">
                <div class="row">
                    <div class="features">
                        <div style="text-align: center; height: 320px;" data-aos="fade-left"
                            class="equal-height col-md-4 col-sm-6 aos-init">
                            <div class="item mariner">
                                <a href="https://www.du.ac.bd/leadership/provcp">
                                    <div style="height: 220px;" class="info">
                                        <p>
                                            <img src="{{ asset('frontend/assets/images/1629097468Photo- Dr. Muhammad Samad 4 - Copy.jpg') }}"
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
                        <div style="text-align: center; height: 320px;" data-aos="fade-left"
                            class="equal-height col-md-4 col-sm-6 aos-init">
                            <div class="item mariner">
                                <a href="https://www.du.ac.bd/leadership/provca">
                                    <div style="height: 220px;" class="info">
                                        <p>
                                            <img src="{{ asset('frontend/assets/images/1706175623pro_vc_aca.jpg') }}" height="200" width="160"
                                                alt=" Vice Chancellor" srcset="">

                                        </p>
                                        <p style="font-weight: bold; font-size: 14px;">
                                            Professor Dr. Sitesh Chandra Bachar
                                        </p>
                                        <h5 style="font-weight: bold;">Pro Vice Chancellor (Academic)</h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div style="text-align: center; height: 320px;" data-aos="fade-left"
                            class="equal-height col-md-4 col-sm-6 aos-init">
                            <div class="item mariner">
                                <a href="https://www.du.ac.bd/leadership/treasurer">
                                    <div style="height: 220px;" class="info">
                                        <p>
                                            <img src="{{ asset('frontend/assets/images/Momtaj.jpg') }}" height="200" width="196"
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
        </div>

        <br><br>
        <br>
        <!-- Start Fun Factor === -->
        <div class="row">
            <div class="site-heading text-center">
                <div class="col-md-8 col-md-offset-2">
                    <h2>University of Dhaka in Numbers</h2>
                </div>
            </div>
        </div>
        <div class="fun-factor-area default-padding text-center bg-fixed shadow dark-hard"
            style="background-image: url('./assets/images/30.jpg');">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-sm-6 item">
                        <div class="fun-fact">
                            <div class="icon">
                                <i class="fa fa-university"></i>

                            </div>
                            <div class="info">

                                <span class="timer" data-to="1921" data-speed="5000">1921</span>
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
                                <span class="timer" data-to="2000" data-speed="5000" style="display:inline;">2000</span>
                                <span style="display:inline;font-size: 36px">+</span>

                                <div class="clearfix"></div>
                                <span class="medium">Faculty Members</span>
                            </div>
                        </div>
                    </div>
                    <div data-aos="zoom-out" class="col-md-3 col-sm-6 item aos-init">
                        <div class="fun-fact">
                            <div class="icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="info" style="text-align: center">
                                <span class="timer" data-to="37000" data-speed="5000"
                                    style="display:inline;">37000</span>
                                <span style="display:inline;font-size: 36px">+</span>

                                <span class="medium">Regular Students</span>
                            </div>
                        </div>
                    </div>
                    <div data-aos="zoom-out" class="col-md-3 col-sm-6 item aos-init">
                        <div class="fun-fact">
                            <div class="icon">
                                <i class="fas fa-school"></i>
                            </div>
                            <div class="info" style="text-align: center">
                                <span class="timer" data-to="134" data-speed="5000" style="display:inline;">134</span>
                                <span style="display:inline;font-size: 36px"></span>
                                <span class="medium">Constituent &amp; Affiliated Colleges</span>
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
                        <div data-aos="fade-down-right" class="col-md-6 about-info aos-init">
                            <h3 class="text-justify">
                                Welcome to University of Dhaka
                            </h3>
                            <h3 class="text-justify">

                            </h3>
                            <p class="text-justify">
                                On the first day of July 1921 the University of Dhaka opened its doors to students with
                                Sir P.J. Hartog as the first Vice-Chancellor of the University. The University was set
                                up in a picturesque part of the city known as Ramna on 600 acres of land.The University
                                started its activities with 3 Faculties,12 Departments, 60 teachers, 877 students and 3
                                dormitories (Halls of Residence) for the students. At present the University consists of
                                13 Faculties, 83 Departments, 12 Institutes, 20 residential halls, 3 hostels and more
                                than 56 Research Centres. The number of students and teachers has risen to about 37018
                                and 1992 respectively.The main purpose of the University was to create new areas of
                                knowledge and disseminate this knowledge to the society through its students. Since its
                                inception the University has a distinct character of having distinguished scholars as
                                faculties who have enriched the global pool of knowledge by making notable contributions
                                in the fields of teaching and research.
                            </p>
                            <a class="btn btn-theme effect btn-block btn-lg btnhome"
                                href="https://www.du.ac.bd/welcome_message">Read
                                More...<i class="fas fa-check-circle fa-2x fa-pull-right"></i></a>
                        </div>

                        <div data-aos="fade-up-left" class="col-md-6 thumb aos-init">
                            <div class="thumb">
                                <img src="{{ asset('frontend/assets/images/du_library.jpg') }}" alt="Thumb">
                                <a href="https://www.youtube.com/watch?v=3gYMR7ppHbw"
                                    class="popup-youtube light video-play-button">
                                    <i class="fa fa-play"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End About -->
        <!-- Start Blog === -->
        <div class="blog-area default-padding bottom-less">
            <div class="container">
                <div class="row">
                    <div class="site-heading text-center">
                        <div class="col-md-8 col-md-offset-2">
                            <h2>Latest News</h2>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="blog-items  courses-carousel owl-carousel owl-theme owl-loaded owl-drag">
                        <!-- Single Item -->

                        <!-- End Single Item -->

                        <div class="owl-stage-outer">
                            <div class="owl-stage"
                                style="transform: translate3d(-4400px, 0px, 0px); transition: all 0.25s ease 0s; width: 7600px;">
                                <div class="owl-item" style="width: 370px; margin-right: 30px;">
                                    <div data-aos="zoom-in" data-aos-delay="200" class="single-item aos-init">
                                        <div class="item">
                                            <div class="thumb">
                                                <a
                                                    href="https://www.du.ac.bd/du_post_details/DU-VC-returns-home-from-Japan/21064">
                                                    <img src="{{ asset('frontend/assets/images/1714139332web_pp.jpg') }}"
                                                        onerror="this.src=&#39;https://www.du.ac.bd/fontView/assets/img/default_logo.png&#39;"
                                                        style="height: 240px;width: 100%;" alt="Thumb">

                                                </a>
                                            </div>
                                            <div class="info">
                                                <div class="meta">
                                                    <ul>
                                                        <li style="text-transform: capitalize!important;">
                                                            <i class="fas fa-calendar-alt"></i>
                                                            26 Apr, 2024

                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="content">
                                                    <h4 class="text-left" style="height: 150px; word-spacing: 5px">
                                                        <a
                                                            href="https://www.du.ac.bd/du_post_details/DU-VC-returns-home-from-Japan/21064">DU
                                                            VC returns home from Japan</a>
                                                    </h4>
                                                    <a
                                                        href="https://www.du.ac.bd/du_post_details/DU-VC-returns-home-from-Japan/21064"><i
                                                            class="fas fa-plus"></i> Read More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 370px; margin-right: 30px;">
                                    <div data-aos="zoom-in" data-aos-delay="200" class="single-item aos-init">
                                        <div class="item">
                                            <div class="thumb">
                                                <a
                                                    href="https://www.du.ac.bd/du_post_details/%E0%A6%A2%E0%A6%BE%E0%A6%AC%E0%A6%BF-%E0%A6%8F-%E0%A6%9C%E0%A7%88%E0%A6%AC-%E0%A6%B8%E0%A6%AE%E0%A7%8D%E0%A6%AA%E0%A6%A6-%E0%A6%AC%E0%A6%BF%E0%A6%B7%E0%A7%9F%E0%A6%95%C2%A0-%E0%A6%86%E0%A6%A8%E0%A7%8D%E0%A6%A4%E0%A6%B0%E0%A7%8D%E0%A6%9C%E0%A6%BE%E0%A6%A4%E0%A6%BF%E0%A6%95-%E0%A6%B8%E0%A6%AE%E0%A7%8D%E0%A6%AE%E0%A7%87%E0%A6%B2%E0%A6%A8-%E0%A6%85%E0%A6%A8%E0%A7%81%E0%A6%B7%E0%A7%8D%E0%A6%A0%E0%A6%BF%E0%A6%A4%C2%A0/21063">
                                                    <img src="{{ asset('frontend/assets/images/1714139154BiologycalConference.jpg') }}"
                                                        onerror="this.src=&#39;https://www.du.ac.bd/fontView/assets/img/default_logo.png&#39;"
                                                        style="height: 240px;width: 100%;" alt="Thumb">

                                                </a>
                                            </div>
                                            <div class="info">
                                                <div class="meta">
                                                    <ul>
                                                        <li style="text-transform: capitalize!important;">
                                                            <i class="fas fa-calendar-alt"></i>
                                                            26 Apr, 2024

                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="content">
                                                    <h4 class="text-left" style="height: 150px; word-spacing: 5px">
                                                        <a
                                                            href="https://www.du.ac.bd/du_post_details/%E0%A6%A2%E0%A6%BE%E0%A6%AC%E0%A6%BF-%E0%A6%8F-%E0%A6%9C%E0%A7%88%E0%A6%AC-%E0%A6%B8%E0%A6%AE%E0%A7%8D%E0%A6%AA%E0%A6%A6-%E0%A6%AC%E0%A6%BF%E0%A6%B7%E0%A7%9F%E0%A6%95%C2%A0-%E0%A6%86%E0%A6%A8%E0%A7%8D%E0%A6%A4%E0%A6%B0%E0%A7%8D%E0%A6%9C%E0%A6%BE%E0%A6%A4%E0%A6%BF%E0%A6%95-%E0%A6%B8%E0%A6%AE%E0%A7%8D%E0%A6%AE%E0%A7%87%E0%A6%B2%E0%A6%A8-%E0%A6%85%E0%A6%A8%E0%A7%81%E0%A6%B7%E0%A7%8D%E0%A6%A0%E0%A6%BF%E0%A6%A4%C2%A0/21063">ঢাবি-এ
                                                            জৈব সম্পদ বিষয়ক&nbsp; আন্তর্জাতিক সম্মেলন অনুষ্ঠিত&nbsp;</a>
                                                    </h4>
                                                    <a
                                                        href="https://www.du.ac.bd/du_post_details/%E0%A6%A2%E0%A6%BE%E0%A6%AC%E0%A6%BF-%E0%A6%8F-%E0%A6%9C%E0%A7%88%E0%A6%AC-%E0%A6%B8%E0%A6%AE%E0%A7%8D%E0%A6%AA%E0%A6%A6-%E0%A6%AC%E0%A6%BF%E0%A6%B7%E0%A7%9F%E0%A6%95%C2%A0-%E0%A6%86%E0%A6%A8%E0%A7%8D%E0%A6%A4%E0%A6%B0%E0%A7%8D%E0%A6%9C%E0%A6%BE%E0%A6%A4%E0%A6%BF%E0%A6%95-%E0%A6%B8%E0%A6%AE%E0%A7%8D%E0%A6%AE%E0%A7%87%E0%A6%B2%E0%A6%A8-%E0%A6%85%E0%A6%A8%E0%A7%81%E0%A6%B7%E0%A7%8D%E0%A6%A0%E0%A6%BF%E0%A6%A4%C2%A0/21063"><i
                                                            class="fas fa-plus"></i> Read More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 370px; margin-right: 30px;">
                                    <div data-aos="zoom-in" data-aos-delay="200" class="single-item aos-init">
                                        <div class="item">
                                            <div class="thumb">
                                                <a
                                                    href="https://www.du.ac.bd/du_post_details/%E0%A6%86%E0%A6%87%E0%A6%8F%E0%A6%AE%E0%A6%8F%E0%A6%B2-%E0%A6%8F%E0%A6%B0-%E0%A6%B8%E0%A7%82%E0%A6%AC%E0%A6%B0%E0%A7%8D%E0%A6%A3-%E0%A6%9C%E0%A7%9F%E0%A6%A8%E0%A7%8D%E0%A6%A4%E0%A7%80-%E0%A6%8F%E0%A6%AC%E0%A6%82-%E2%80%98%E0%A7%A7%E0%A7%AB%E0%A6%A4%E0%A6%AE-%E0%A6%87%E0%A6%89%E0%A6%8F%E0%A6%A8-%E0%A6%9A%E0%A6%BE%E0%A6%87%E0%A6%A8%E0%A6%BF%E0%A6%9C-%E0%A6%B2%E0%A7%8D%E0%A6%AF%E0%A6%BE%E0%A6%99%E0%A7%8D%E0%A6%97%E0%A7%81%E0%A7%9F%E0%A7%87%E0%A6%9C-%E0%A6%A1%E0%A7%87%E2%80%99-%E0%A6%89%E0%A6%A6%E0%A6%AF%E0%A6%BE%E0%A6%AA%E0%A6%A8/21056">
                                                    <img src="{{ asset('frontend/assets/images/1714037325SUM_1567copy.jpg') }}"
                                                        onerror="this.src=&#39;https://www.du.ac.bd/fontView/assets/img/default_logo.png&#39;"
                                                        style="height: 240px;width: 100%;" alt="Thumb">

                                                </a>
                                            </div>
                                            <div class="info">
                                                <div class="meta">
                                                    <ul>
                                                        <li style="text-transform: capitalize!important;">
                                                            <i class="fas fa-calendar-alt"></i>
                                                            25 Apr, 2024

                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="content">
                                                    <h4 class="text-left" style="height: 150px; word-spacing: 5px">
                                                        <a
                                                            href="https://www.du.ac.bd/du_post_details/%E0%A6%86%E0%A6%87%E0%A6%8F%E0%A6%AE%E0%A6%8F%E0%A6%B2-%E0%A6%8F%E0%A6%B0-%E0%A6%B8%E0%A7%82%E0%A6%AC%E0%A6%B0%E0%A7%8D%E0%A6%A3-%E0%A6%9C%E0%A7%9F%E0%A6%A8%E0%A7%8D%E0%A6%A4%E0%A7%80-%E0%A6%8F%E0%A6%AC%E0%A6%82-%E2%80%98%E0%A7%A7%E0%A7%AB%E0%A6%A4%E0%A6%AE-%E0%A6%87%E0%A6%89%E0%A6%8F%E0%A6%A8-%E0%A6%9A%E0%A6%BE%E0%A6%87%E0%A6%A8%E0%A6%BF%E0%A6%9C-%E0%A6%B2%E0%A7%8D%E0%A6%AF%E0%A6%BE%E0%A6%99%E0%A7%8D%E0%A6%97%E0%A7%81%E0%A7%9F%E0%A7%87%E0%A6%9C-%E0%A6%A1%E0%A7%87%E2%80%99-%E0%A6%89%E0%A6%A6%E0%A6%AF%E0%A6%BE%E0%A6%AA%E0%A6%A8/21056">আইএমএল-এর
                                                            সূবর্ণ জয়ন্তী এবং ‘১৫তম ইউএন চাইনিজ ল্যাঙ্গুয়েজ ডে’
                                                            উদযাপন</a>
                                                    </h4>
                                                    <a
                                                        href="https://www.du.ac.bd/du_post_details/%E0%A6%86%E0%A6%87%E0%A6%8F%E0%A6%AE%E0%A6%8F%E0%A6%B2-%E0%A6%8F%E0%A6%B0-%E0%A6%B8%E0%A7%82%E0%A6%AC%E0%A6%B0%E0%A7%8D%E0%A6%A3-%E0%A6%9C%E0%A7%9F%E0%A6%A8%E0%A7%8D%E0%A6%A4%E0%A7%80-%E0%A6%8F%E0%A6%AC%E0%A6%82-%E2%80%98%E0%A7%A7%E0%A7%AB%E0%A6%A4%E0%A6%AE-%E0%A6%87%E0%A6%89%E0%A6%8F%E0%A6%A8-%E0%A6%9A%E0%A6%BE%E0%A6%87%E0%A6%A8%E0%A6%BF%E0%A6%9C-%E0%A6%B2%E0%A7%8D%E0%A6%AF%E0%A6%BE%E0%A6%99%E0%A7%8D%E0%A6%97%E0%A7%81%E0%A7%9F%E0%A7%87%E0%A6%9C-%E0%A6%A1%E0%A7%87%E2%80%99-%E0%A6%89%E0%A6%A6%E0%A6%AF%E0%A6%BE%E0%A6%AA%E0%A6%A8/21056"><i
                                                            class="fas fa-plus"></i> Read More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 370px; margin-right: 30px;">
                                    <div data-aos="zoom-in" data-aos-delay="200" class="single-item aos-init">
                                        <div class="item">
                                            <div class="thumb">
                                                <a
                                                    href="https://www.du.ac.bd/du_post_details/%E0%A6%A2%E0%A6%BE%E0%A6%AC%E0%A6%BF-%E0%A6%8F-%E2%80%98%E0%A6%AA%E0%A6%9E%E0%A7%8D%E0%A6%9A%E0%A6%AC%E0%A7%8D%E0%A6%B0%E0%A7%80%E0%A6%B9%E0%A6%BF%E2%80%99-%E0%A6%A7%E0%A6%BE%E0%A6%A8-%E0%A6%A8%E0%A6%BF%E0%A7%9F%E0%A7%87-%E0%A6%B8%E0%A7%87%E0%A6%AE%E0%A6%BF%E0%A6%A8%E0%A6%BE%E0%A6%B0-%E0%A6%85%E0%A6%A8%E0%A7%81%E0%A6%B7%E0%A7%8D%E0%A6%A0%E0%A6%BF%E0%A6%A4/21052">
                                                    <img src="{{ asset('frontend/assets/images/171403416724-4-2024Photo-AnwarMojumder(1).jpg') }}"
                                                        onerror="this.src=&#39;https://www.du.ac.bd/fontView/assets/img/default_logo.png&#39;"
                                                        style="height: 240px;width: 100%;" alt="Thumb">

                                                </a>
                                            </div>
                                            <div class="info">
                                                <div class="meta">
                                                    <ul>
                                                        <li style="text-transform: capitalize!important;">
                                                            <i class="fas fa-calendar-alt"></i>
                                                            25 Apr, 2024

                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="content">
                                                    <h4 class="text-left" style="height: 150px; word-spacing: 5px">
                                                        <a
                                                            href="https://www.du.ac.bd/du_post_details/%E0%A6%A2%E0%A6%BE%E0%A6%AC%E0%A6%BF-%E0%A6%8F-%E2%80%98%E0%A6%AA%E0%A6%9E%E0%A7%8D%E0%A6%9A%E0%A6%AC%E0%A7%8D%E0%A6%B0%E0%A7%80%E0%A6%B9%E0%A6%BF%E2%80%99-%E0%A6%A7%E0%A6%BE%E0%A6%A8-%E0%A6%A8%E0%A6%BF%E0%A7%9F%E0%A7%87-%E0%A6%B8%E0%A7%87%E0%A6%AE%E0%A6%BF%E0%A6%A8%E0%A6%BE%E0%A6%B0-%E0%A6%85%E0%A6%A8%E0%A7%81%E0%A6%B7%E0%A7%8D%E0%A6%A0%E0%A6%BF%E0%A6%A4/21052">ঢাবি-এ
                                                            ‘পঞ্চব্রীহি’ ধান নিয়ে সেমিনার অনুষ্ঠিত</a>
                                                    </h4>
                                                    <a
                                                        href="https://www.du.ac.bd/du_post_details/%E0%A6%A2%E0%A6%BE%E0%A6%AC%E0%A6%BF-%E0%A6%8F-%E2%80%98%E0%A6%AA%E0%A6%9E%E0%A7%8D%E0%A6%9A%E0%A6%AC%E0%A7%8D%E0%A6%B0%E0%A7%80%E0%A6%B9%E0%A6%BF%E2%80%99-%E0%A6%A7%E0%A6%BE%E0%A6%A8-%E0%A6%A8%E0%A6%BF%E0%A7%9F%E0%A7%87-%E0%A6%B8%E0%A7%87%E0%A6%AE%E0%A6%BF%E0%A6%A8%E0%A6%BE%E0%A6%B0-%E0%A6%85%E0%A6%A8%E0%A7%81%E0%A6%B7%E0%A7%8D%E0%A6%A0%E0%A6%BF%E0%A6%A4/21052"><i
                                                            class="fas fa-plus"></i> Read More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="owl-nav disabled">
                            <div class="owl-prev"><i class="fa fa-angle-left"></i></div>
                            <div class="owl-next"><i class="fa fa-angle-right"></i></div>
                        </div>
                        <div class="owl-dots">
                            <div class="owl-dot"><span></span></div>
                            <div class="owl-dot"><span></span></div>
                            <div class="owl-dot active"><span></span></div>
                        </div>
                    </div>
                    <div class="more-btn col-md-12 text-center">
                        <a href="https://www.du.ac.bd/news" class="btn btn-theme effect btn-md">View All News</a>
                    </div>
                </div>
            </div>
        </div>
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
                        <div class="row">
                            <div class="event-items">
                                <!-- Single Item -->
                                <div data-aos="zoom-in-up" class="col-md-6 col-sm-6 equal-height aos-init"
                                    style="height: 550px;">
                                    <div class="item">
                                        <div class="thumb">
                                            <img src="{{ asset('frontend/assets/images/17119526681711943128MoU1.jpg') }}"
                                                style="height:250px;" alt="Thumb">
                                        </div>
                                        <div class="info">
                                            <div class="info-box" style="padding:35px 35px">
                                                <div class="date">
                                                    <strong style="font-size: 30px">27</strong>
                                                    Mar, 2024
                                                </div>
                                                <br>
                                                <div class="content" style="margin-left: 0px">
                                                    <h4 class="text-left " style="height: 180px; word-spacing: 5px">
                                                        <a
                                                            href="https://www.du.ac.bd/du_post_details/%E0%A6%A4%E0%A6%A5%E0%A7%8D%E0%A6%AF-%E0%A6%93-%E0%A6%AF%E0%A7%8B%E0%A6%97%E0%A6%BE%E0%A6%AF%E0%A7%8B%E0%A6%97-%E0%A6%AA%E0%A7%8D%E0%A6%B0%E0%A6%AF%E0%A7%81%E0%A6%95%E0%A7%8D%E0%A6%A4%E0%A6%BF-%E0%A6%AC%E0%A6%BF%E0%A6%AD%E0%A6%BE%E0%A6%97-%E0%A6%8F%E0%A6%AC%E0%A6%82-%E0%A6%A2%E0%A6%BE%E0%A6%95%E0%A6%BE-%E0%A6%AC%E0%A6%BF%E0%A6%B6%E0%A7%8D%E0%A6%AC%E0%A6%AC%E0%A6%BF%E0%A6%A6%E0%A7%8D%E0%A6%AF%E0%A6%BE%E0%A6%B2%E0%A7%9F%E0%A7%87%E0%A6%B0-%E0%A6%95%E0%A6%AE%E0%A7%8D%E0%A6%AA%E0%A6%BF%E0%A6%89%E0%A6%9F%E0%A6%BE%E0%A6%B0-%E0%A6%AC%E0%A6%BF%E0%A6%9C%E0%A7%8D%E0%A6%9E%E0%A6%BE%E0%A6%A8-%E0%A6%93-%E0%A6%AA%E0%A7%8D%E0%A6%B0%E0%A6%95%E0%A7%8C%E0%A6%B6%E0%A6%B2-%E0%A6%AC%E0%A6%BF%E0%A6%AD%E0%A6%BE%E0%A6%97%E0%A7%87%E0%A6%B0-%E0%A6%AE%E0%A6%A7%E0%A7%8D%E0%A6%AF%E0%A7%87-%E0%A6%B8%E0%A6%AE%E0%A6%9D%E0%A7%8B%E0%A6%A4%E0%A6%BE-%E0%A6%B8%E0%A7%8D%E0%A6%AE%E0%A6%BE%E0%A6%B0%E0%A6%95-%E0%A6%B8%E0%A7%8D%E0%A6%AC%E0%A6%BE%E0%A6%95%E0%A7%8D%E0%A6%B7%E0%A6%B0%E0%A6%BF%E0%A6%A4/20955">তথ্য
                                                            ও যোগাযোগ প্রযুক্তি বিভাগ এবং ঢাকা বিশ্ববিদ্যালয়ের কম্পিউটার
                                                            বিজ্ঞান ও প্রকৌশল বিভাগের মধ্যে সমঝোতা স্মারক স্বাক্ষরিত</a>
                                                    </h4>
                                                    <ul>


                                                    </ul>

                                                    <div class="bottom" style="margin-top: 20px">
                                                        <div class="col-sm-12">
                                                            <a href="https://www.du.ac.bd/du_post_details/%E0%A6%A4%E0%A6%A5%E0%A7%8D%E0%A6%AF-%E0%A6%93-%E0%A6%AF%E0%A7%8B%E0%A6%97%E0%A6%BE%E0%A6%AF%E0%A7%8B%E0%A6%97-%E0%A6%AA%E0%A7%8D%E0%A6%B0%E0%A6%AF%E0%A7%81%E0%A6%95%E0%A7%8D%E0%A6%A4%E0%A6%BF-%E0%A6%AC%E0%A6%BF%E0%A6%AD%E0%A6%BE%E0%A6%97-%E0%A6%8F%E0%A6%AC%E0%A6%82-%E0%A6%A2%E0%A6%BE%E0%A6%95%E0%A6%BE-%E0%A6%AC%E0%A6%BF%E0%A6%B6%E0%A7%8D%E0%A6%AC%E0%A6%AC%E0%A6%BF%E0%A6%A6%E0%A7%8D%E0%A6%AF%E0%A6%BE%E0%A6%B2%E0%A7%9F%E0%A7%87%E0%A6%B0-%E0%A6%95%E0%A6%AE%E0%A7%8D%E0%A6%AA%E0%A6%BF%E0%A6%89%E0%A6%9F%E0%A6%BE%E0%A6%B0-%E0%A6%AC%E0%A6%BF%E0%A6%9C%E0%A7%8D%E0%A6%9E%E0%A6%BE%E0%A6%A8-%E0%A6%93-%E0%A6%AA%E0%A7%8D%E0%A6%B0%E0%A6%95%E0%A7%8C%E0%A6%B6%E0%A6%B2-%E0%A6%AC%E0%A6%BF%E0%A6%AD%E0%A6%BE%E0%A6%97%E0%A7%87%E0%A6%B0-%E0%A6%AE%E0%A6%A7%E0%A7%8D%E0%A6%AF%E0%A7%87-%E0%A6%B8%E0%A6%AE%E0%A6%9D%E0%A7%8B%E0%A6%A4%E0%A6%BE-%E0%A6%B8%E0%A7%8D%E0%A6%AE%E0%A6%BE%E0%A6%B0%E0%A6%95-%E0%A6%B8%E0%A7%8D%E0%A6%AC%E0%A6%BE%E0%A6%95%E0%A7%8D%E0%A6%B7%E0%A6%B0%E0%A6%BF%E0%A6%A4/20955"
                                                                class="btn circle btn-dark border btn-sm text-center">
                                                                <i style="color: #1C4370" class="fas fa-plus"></i> Read
                                                                More
                                                            </a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div data-aos="zoom-in-up" class="col-md-6 col-sm-6 equal-height aos-init"
                                    style="height: 550px;">
                                    <div class="item">
                                        <div class="thumb">
                                            <img src="{{ asset('frontend/assets/images/17109927341710907589combinear.jpg') }}"
                                                style="height:250px;" alt="Thumb">
                                        </div>
                                        <div class="info">
                                            <div class="info-box" style="padding:35px 35px">
                                                <div class="date">
                                                    <strong style="font-size: 30px">18</strong>
                                                    Mar, 2024
                                                </div>
                                                <br>
                                                <div class="content" style="margin-left: 0px">
                                                    <h4 class="text-left " style="height: 180px; word-spacing: 5px">
                                                        <a
                                                            href="https://www.du.ac.bd/du_post_details/An-Educational-Workshop-on-Informatics-Principles-Held-at-CSEDU/20868">An
                                                            Educational Workshop on Informatics Principles Held at
                                                            CSEDU</a>
                                                    </h4>
                                                    <ul>


                                                    </ul>

                                                    <div class="bottom" style="margin-top: 20px">
                                                        <div class="col-sm-12">
                                                            <a href="https://www.du.ac.bd/du_post_details/An-Educational-Workshop-on-Informatics-Principles-Held-at-CSEDU/20868"
                                                                class="btn circle btn-dark border btn-sm text-center">
                                                                <i style="color: #1C4370" class="fas fa-plus"></i> Read
                                                                More
                                                            </a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Item -->

                            </div>
                            <div class="more-btn col-md-12 text-center">
                                <a href="https://www.du.ac.bd/events" class="btn btn-theme effect btn-md">View All
                                    Events</a>
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
                                        <h5 style="text-align: justify"> <a
                                                href="https://www.du.ac.bd/du_post_details/%E0%A6%AC%E0%A6%BF%E0%A6%AD%E0%A6%BF%E0%A6%A8%E0%A7%8D%E0%A6%A8-%E0%A6%AC%E0%A7%83%E0%A6%A4%E0%A7%8D%E0%A6%A4%E0%A6%BF-%E0%A6%AC%E0%A6%BF%E0%A6%9C%E0%A7%8D%E0%A6%9E%E0%A6%AA%E0%A7%8D%E0%A6%A4%E0%A6%BF/21081"
                                                target="_blank">বিভিন্ন বৃত্তি বিজ্ঞপ্তি</a>
                                        </h5>
                                        <ul>
                                            <li class="border">
                                                <span>
                                                    Published: 29 Apr, 2024</span>
                                            </li>
                                            <li>
                                                <a href="https://www.du.ac.bd/du_post_details/%E0%A6%AC%E0%A6%BF%E0%A6%AD%E0%A6%BF%E0%A6%A8%E0%A7%8D%E0%A6%A8-%E0%A6%AC%E0%A7%83%E0%A6%A4%E0%A7%8D%E0%A6%A4%E0%A6%BF-%E0%A6%AC%E0%A6%BF%E0%A6%9C%E0%A7%8D%E0%A6%9E%E0%A6%AA%E0%A7%8D%E0%A6%A4%E0%A6%BF/21081"
                                                    target="_blank"
                                                    class="btn circle btn-dark border btn-sm text-center">
                                                    <i class="fas fa-plus" style="color: #002147"></i> Read More</a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="info" style="width: 100%">
                                        <h5 style="text-align: justify"> <a
                                                href="https://www.du.ac.bd/du_post_details/%E0%A6%B6%E0%A6%BF%E0%A6%95%E0%A7%8D%E0%A6%B7%E0%A6%95%E0%A6%A6%E0%A7%87%E0%A6%B0-%E0%A6%9C%E0%A6%A8%E0%A7%8D%E0%A6%AF-%E0%A6%95%E0%A6%B0%E0%A7%8D%E0%A6%AE%E0%A6%B6%E0%A6%BE%E0%A6%B2%E0%A6%BE-%E0%A6%85%E0%A6%A8%E0%A7%81%E0%A6%B7%E0%A7%8D%E0%A6%A0%E0%A6%BF%E0%A6%A4/21080"
                                                target="_blank">শিক্ষকদের জন্য কর্মশালা অনুষ্ঠিত</a>
                                        </h5>
                                        <ul>
                                            <li class="border">
                                                <span>
                                                    Published: 29 Apr, 2024</span>
                                            </li>
                                            <li>
                                                <a href="https://www.du.ac.bd/du_post_details/%E0%A6%B6%E0%A6%BF%E0%A6%95%E0%A7%8D%E0%A6%B7%E0%A6%95%E0%A6%A6%E0%A7%87%E0%A6%B0-%E0%A6%9C%E0%A6%A8%E0%A7%8D%E0%A6%AF-%E0%A6%95%E0%A6%B0%E0%A7%8D%E0%A6%AE%E0%A6%B6%E0%A6%BE%E0%A6%B2%E0%A6%BE-%E0%A6%85%E0%A6%A8%E0%A7%81%E0%A6%B7%E0%A7%8D%E0%A6%A0%E0%A6%BF%E0%A6%A4/21080"
                                                    target="_blank"
                                                    class="btn circle btn-dark border btn-sm text-center">
                                                    <i class="fas fa-plus" style="color: #002147"></i> Read More</a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="info" style="width: 100%">
                                        <h5 style="text-align: justify"> <a
                                                href="https://www.du.ac.bd/du_post_details/%E0%A6%AC%E0%A6%99%E0%A7%8D%E0%A6%97%E0%A6%AC%E0%A6%A8%E0%A7%8D%E0%A6%A7%E0%A7%81-%E0%A6%93%E0%A6%AD%E0%A6%BE%E0%A6%B0%E0%A6%B8%E0%A6%BF%E0%A6%B8-%E0%A6%B8%E0%A7%8D%E0%A6%95%E0%A6%B2%E0%A6%BE%E0%A6%B0%E0%A6%B6%E0%A6%BF%E0%A6%AA-%E0%A6%AC%E0%A7%83%E0%A6%A4%E0%A7%8D%E0%A6%A4%E0%A6%BF%E0%A6%B0-%E0%A6%A6%E0%A6%B0%E0%A6%96%E0%A6%BE%E0%A6%B8%E0%A7%8D%E0%A6%A4-%E0%A6%86%E0%A6%B9%E0%A6%AC%E0%A7%8D%E0%A6%A8/21075"
                                                target="_blank">বঙ্গবন্ধু ওভারসিস স্কলারশিপ বৃত্তির দরখাস্ত আহব্ন</a>
                                        </h5>
                                        <ul>
                                            <li class="border">
                                                <span>
                                                    Published: 28 Apr, 2024</span>
                                            </li>
                                            <li>
                                                <a href="https://www.du.ac.bd/du_post_details/%E0%A6%AC%E0%A6%99%E0%A7%8D%E0%A6%97%E0%A6%AC%E0%A6%A8%E0%A7%8D%E0%A6%A7%E0%A7%81-%E0%A6%93%E0%A6%AD%E0%A6%BE%E0%A6%B0%E0%A6%B8%E0%A6%BF%E0%A6%B8-%E0%A6%B8%E0%A7%8D%E0%A6%95%E0%A6%B2%E0%A6%BE%E0%A6%B0%E0%A6%B6%E0%A6%BF%E0%A6%AA-%E0%A6%AC%E0%A7%83%E0%A6%A4%E0%A7%8D%E0%A6%A4%E0%A6%BF%E0%A6%B0-%E0%A6%A6%E0%A6%B0%E0%A6%96%E0%A6%BE%E0%A6%B8%E0%A7%8D%E0%A6%A4-%E0%A6%86%E0%A6%B9%E0%A6%AC%E0%A7%8D%E0%A6%A8/21075"
                                                    target="_blank"
                                                    class="btn circle btn-dark border btn-sm text-center">
                                                    <i class="fas fa-plus" style="color: #002147"></i> Read More</a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="info" style="width: 100%">
                                        <h5 style="text-align: justify"> <a
                                                href="https://www.du.ac.bd/du_post_details/%E0%A6%B6%E0%A6%BF%E0%A6%95%E0%A7%8D%E0%A6%B7%E0%A6%95%E0%A6%A6%E0%A7%87%E0%A6%B0-%E0%A6%9C%E0%A6%A8%E0%A7%8D%E0%A6%AF-%E0%A6%95%E0%A6%B0%E0%A7%8D%E0%A6%AE%E0%A6%B6%E0%A6%BE%E0%A6%B2%E0%A6%BE-%E0%A6%85%E0%A6%A8%E0%A7%81%E0%A6%B7%E0%A7%8D%E0%A6%A0%E0%A6%BF%E0%A6%A4/21068"
                                                target="_blank">শিক্ষকদের জন্য কর্মশালা অনুষ্ঠিত</a>
                                        </h5>
                                        <ul>
                                            <li class="border">
                                                <span>
                                                    Published: 28 Apr, 2024</span>
                                            </li>
                                            <li>
                                                <a href="https://www.du.ac.bd/du_post_details/%E0%A6%B6%E0%A6%BF%E0%A6%95%E0%A7%8D%E0%A6%B7%E0%A6%95%E0%A6%A6%E0%A7%87%E0%A6%B0-%E0%A6%9C%E0%A6%A8%E0%A7%8D%E0%A6%AF-%E0%A6%95%E0%A6%B0%E0%A7%8D%E0%A6%AE%E0%A6%B6%E0%A6%BE%E0%A6%B2%E0%A6%BE-%E0%A6%85%E0%A6%A8%E0%A7%81%E0%A6%B7%E0%A7%8D%E0%A6%A0%E0%A6%BF%E0%A6%A4/21068"
                                                    target="_blank"
                                                    class="btn circle btn-dark border btn-sm text-center">
                                                    <i class="fas fa-plus" style="color: #002147"></i> Read More</a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="info" style="width: 100%">
                                        <h5 style="text-align: justify"> <a
                                                href="https://www.du.ac.bd/du_post_details/Professional-Masters-in-Environmental-Planning,-Management-and-Sustainable-Development-(PMEPMSD)-%E0%A6%AA%E0%A7%8D%E0%A6%B0%E0%A7%8B%E0%A6%97%E0%A7%8D%E0%A6%B0%E0%A6%BE%E0%A6%AE%E0%A7%87%E0%A6%B0-%E0%A6%AD%E0%A6%B0%E0%A7%8D%E0%A6%A4%E0%A6%BF-%E0%A6%AC%E0%A6%BF%E0%A6%9C%E0%A7%8D%E0%A6%9E%E0%A6%AA%E0%A7%8D%E0%A6%A4%E0%A6%BF/21067"
                                                target="_blank">Professional Masters in Environmental Planning,
                                                Management and Sustainable Development (PMEPMSD) প্রোগ্রামের ভর্তি
                                                বিজ্ঞপ্তি</a>
                                        </h5>
                                        <ul>
                                            <li class="border">
                                                <span>
                                                    Published: 28 Apr, 2024</span>
                                            </li>
                                            <li>
                                                <a href="https://www.du.ac.bd/du_post_details/Professional-Masters-in-Environmental-Planning,-Management-and-Sustainable-Development-(PMEPMSD)-%E0%A6%AA%E0%A7%8D%E0%A6%B0%E0%A7%8B%E0%A6%97%E0%A7%8D%E0%A6%B0%E0%A6%BE%E0%A6%AE%E0%A7%87%E0%A6%B0-%E0%A6%AD%E0%A6%B0%E0%A7%8D%E0%A6%A4%E0%A6%BF-%E0%A6%AC%E0%A6%BF%E0%A6%9C%E0%A7%8D%E0%A6%9E%E0%A6%AA%E0%A7%8D%E0%A6%A4%E0%A6%BF/21067"
                                                    target="_blank"
                                                    class="btn circle btn-dark border btn-sm text-center">
                                                    <i class="fas fa-plus" style="color: #002147"></i> Read More</a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="info" style="width: 100%">
                                        <h5 style="text-align: justify"> <a
                                                href="https://www.du.ac.bd/du_post_details/Professional-Master-of-Development-Studies-(MDS)-%E0%A6%AA%E0%A7%8D%E0%A6%B0%E0%A7%8B%E0%A6%97%E0%A7%8D%E0%A6%B0%E0%A6%BE%E0%A6%AE%E0%A7%87%E0%A6%B0-%E0%A6%AD%E0%A6%B0%E0%A7%8D%E0%A6%A4%E0%A6%BF-%E0%A6%AC%E0%A6%BF%E0%A6%9C%E0%A7%8D%E0%A6%9E%E0%A6%AA%E0%A7%8D%E0%A6%A4%E0%A6%BF/21066"
                                                target="_blank">Professional Master of Development Studies (MDS)
                                                প্রোগ্রামের ভর্তি বিজ্ঞপ্তি</a>
                                        </h5>
                                        <ul>
                                            <li class="border">
                                                <span>
                                                    Published: 28 Apr, 2024</span>
                                            </li>
                                            <li>
                                                <a href="https://www.du.ac.bd/du_post_details/Professional-Master-of-Development-Studies-(MDS)-%E0%A6%AA%E0%A7%8D%E0%A6%B0%E0%A7%8B%E0%A6%97%E0%A7%8D%E0%A6%B0%E0%A6%BE%E0%A6%AE%E0%A7%87%E0%A6%B0-%E0%A6%AD%E0%A6%B0%E0%A7%8D%E0%A6%A4%E0%A6%BF-%E0%A6%AC%E0%A6%BF%E0%A6%9C%E0%A7%8D%E0%A6%9E%E0%A6%AA%E0%A7%8D%E0%A6%A4%E0%A6%BF/21066"
                                                    target="_blank"
                                                    class="btn circle btn-dark border btn-sm text-center">
                                                    <i class="fas fa-plus" style="color: #002147"></i> Read More</a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="info" style="width: 100%">
                                        <h5 style="text-align: justify"> <a
                                                href="https://www.du.ac.bd/du_post_details/%E0%A6%95%E0%A7%8D%E0%A6%B7%E0%A7%81%E0%A6%A6%E0%A7%8D%E0%A6%B0-%E0%A6%A8%E0%A7%83-%E0%A6%97%E0%A7%8B%E0%A6%B7%E0%A7%8D%E0%A6%A0%E0%A7%80%E0%A6%AD%E0%A7%81%E0%A6%95%E0%A7%8D%E0%A6%A4-%E0%A6%B6%E0%A6%BF%E0%A6%95%E0%A7%8D%E0%A6%B7%E0%A6%BE%E0%A6%B0%E0%A7%8D%E0%A6%A5%E0%A7%80%E0%A6%A6%E0%A7%87%E0%A6%B0-(%E0%A6%AA%E0%A6%BE%E0%A6%B0%E0%A7%8D%E0%A6%AC%E0%A6%A4%E0%A7%8D%E0%A6%AF-%E0%A6%9A%E0%A6%9F%E0%A7%8D%E0%A6%B0%E0%A6%97%E0%A7%8D%E0%A6%B0%E0%A6%BE%E0%A6%AE-%E0%A6%AC%E0%A7%8D%E0%A6%AF%E0%A6%A4%E0%A7%80%E0%A6%A4)-%E0%A6%89%E0%A6%9A%E0%A7%8D%E0%A6%9A-%E0%A6%B6%E0%A6%BF%E0%A6%95%E0%A7%8D%E0%A6%B7%E0%A6%BE%E0%A6%AC%E0%A7%83%E0%A6%A4%E0%A7%8D%E0%A6%A4%E0%A6%BF-%E0%A6%AC%E0%A6%BF%E0%A6%9C%E0%A7%8D%E0%A6%9E%E0%A6%AA%E0%A7%8D%E0%A6%A4%E0%A6%BF/21057"
                                                target="_blank">ক্ষুদ্র নৃ-গোষ্ঠীভুক্ত শিক্ষার্থীদের (পার্বত্য চট্রগ্রাম
                                                ব্যতীত) উচ্চ শিক্ষাবৃত্তি বিজ্ঞপ্তি</a>
                                        </h5>
                                        <ul>
                                            <li class="border">
                                                <span>
                                                    Published: 25 Apr, 2024</span>
                                            </li>
                                            <li>
                                                <a href="https://www.du.ac.bd/du_post_details/%E0%A6%95%E0%A7%8D%E0%A6%B7%E0%A7%81%E0%A6%A6%E0%A7%8D%E0%A6%B0-%E0%A6%A8%E0%A7%83-%E0%A6%97%E0%A7%8B%E0%A6%B7%E0%A7%8D%E0%A6%A0%E0%A7%80%E0%A6%AD%E0%A7%81%E0%A6%95%E0%A7%8D%E0%A6%A4-%E0%A6%B6%E0%A6%BF%E0%A6%95%E0%A7%8D%E0%A6%B7%E0%A6%BE%E0%A6%B0%E0%A7%8D%E0%A6%A5%E0%A7%80%E0%A6%A6%E0%A7%87%E0%A6%B0-(%E0%A6%AA%E0%A6%BE%E0%A6%B0%E0%A7%8D%E0%A6%AC%E0%A6%A4%E0%A7%8D%E0%A6%AF-%E0%A6%9A%E0%A6%9F%E0%A7%8D%E0%A6%B0%E0%A6%97%E0%A7%8D%E0%A6%B0%E0%A6%BE%E0%A6%AE-%E0%A6%AC%E0%A7%8D%E0%A6%AF%E0%A6%A4%E0%A7%80%E0%A6%A4)-%E0%A6%89%E0%A6%9A%E0%A7%8D%E0%A6%9A-%E0%A6%B6%E0%A6%BF%E0%A6%95%E0%A7%8D%E0%A6%B7%E0%A6%BE%E0%A6%AC%E0%A7%83%E0%A6%A4%E0%A7%8D%E0%A6%A4%E0%A6%BF-%E0%A6%AC%E0%A6%BF%E0%A6%9C%E0%A7%8D%E0%A6%9E%E0%A6%AA%E0%A7%8D%E0%A6%A4%E0%A6%BF/21057"
                                                    target="_blank"
                                                    class="btn circle btn-dark border btn-sm text-center">
                                                    <i class="fas fa-plus" style="color: #002147"></i> Read More</a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="info" style="width: 100%">
                                        <h5 style="text-align: justify"> <a
                                                href="https://www.du.ac.bd/du_post_details/%E0%A6%AA%E0%A6%BF%E0%A6%8F%E0%A6%87%E0%A6%9A%E0%A6%A1%E0%A6%BF-%E0%A6%AB%E0%A7%87%E0%A6%B2%E0%A7%8B%E0%A6%B6%E0%A6%BF%E0%A6%AA-%E0%A6%AC%E0%A6%BF%E0%A6%9C%E0%A7%8D%E0%A6%9E%E0%A6%AA%E0%A7%8D%E0%A6%A4%E0%A6%BF-%E0%A7%A8%E0%A7%A6%E0%A7%A8%E0%A7%AA/21055"
                                                target="_blank">পিএইচডি ফেলোশিপ বিজ্ঞপ্তি-২০২৪</a>
                                        </h5>
                                        <ul>
                                            <li class="border">
                                                <span>
                                                    Published: 25 Apr, 2024</span>
                                            </li>
                                            <li>
                                                <a href="https://www.du.ac.bd/du_post_details/%E0%A6%AA%E0%A6%BF%E0%A6%8F%E0%A6%87%E0%A6%9A%E0%A6%A1%E0%A6%BF-%E0%A6%AB%E0%A7%87%E0%A6%B2%E0%A7%8B%E0%A6%B6%E0%A6%BF%E0%A6%AA-%E0%A6%AC%E0%A6%BF%E0%A6%9C%E0%A7%8D%E0%A6%9E%E0%A6%AA%E0%A7%8D%E0%A6%A4%E0%A6%BF-%E0%A7%A8%E0%A7%A6%E0%A7%A8%E0%A7%AA/21055"
                                                    target="_blank"
                                                    class="btn circle btn-dark border btn-sm text-center">
                                                    <i class="fas fa-plus" style="color: #002147"></i> Read More</a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="info" style="width: 100%">
                                        <h5 style="text-align: justify"> <a
                                                href="https://www.du.ac.bd/du_post_details/%E0%A6%B9%E0%A6%BF%E0%A6%B8%E0%A6%BE%E0%A6%AC-%E0%A6%AA%E0%A6%B0%E0%A6%BF%E0%A6%9A%E0%A6%BE%E0%A6%B2%E0%A6%95%E0%A7%87%E0%A6%B0-%E0%A6%85%E0%A6%AB%E0%A6%BF%E0%A6%B8%E0%A7%87%E0%A6%B0-%E0%A6%9C%E0%A6%B0%E0%A7%81%E0%A6%B0%E0%A7%80-%E0%A6%A8%E0%A7%8B%E0%A6%9F%E0%A6%BF%E0%A6%B6/21054"
                                                target="_blank">হিসাব পরিচালকের অফিসের জরুরী নোটিশ</a>
                                        </h5>
                                        <ul>
                                            <li class="border">
                                                <span>
                                                    Published: 25 Apr, 2024</span>
                                            </li>
                                            <li>
                                                <a href="https://www.du.ac.bd/du_post_details/%E0%A6%B9%E0%A6%BF%E0%A6%B8%E0%A6%BE%E0%A6%AC-%E0%A6%AA%E0%A6%B0%E0%A6%BF%E0%A6%9A%E0%A6%BE%E0%A6%B2%E0%A6%95%E0%A7%87%E0%A6%B0-%E0%A6%85%E0%A6%AB%E0%A6%BF%E0%A6%B8%E0%A7%87%E0%A6%B0-%E0%A6%9C%E0%A6%B0%E0%A7%81%E0%A6%B0%E0%A7%80-%E0%A6%A8%E0%A7%8B%E0%A6%9F%E0%A6%BF%E0%A6%B6/21054"
                                                    target="_blank"
                                                    class="btn circle btn-dark border btn-sm text-center">
                                                    <i class="fas fa-plus" style="color: #002147"></i> Read More</a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="info" style="width: 100%">
                                        <h5 style="text-align: justify"> <a
                                                href="https://www.du.ac.bd/du_post_details/Fudan-YICGG2024-Invitation-to-Participate-in-the-Youth-Innovation-Competition-on-Global-Governance/21035"
                                                target="_blank">Fudan YICGG2024 Invitation to Participate in the Youth
                                                Innovation Competition on Global Governance</a>
                                        </h5>
                                        <ul>
                                            <li class="border">
                                                <span>
                                                    Published: 23 Apr, 2024</span>
                                            </li>
                                            <li>
                                                <a href="https://www.du.ac.bd/du_post_details/Fudan-YICGG2024-Invitation-to-Participate-in-the-Youth-Innovation-Competition-on-Global-Governance/21035"
                                                    target="_blank"
                                                    class="btn circle btn-dark border btn-sm text-center">
                                                    <i class="fas fa-plus" style="color: #002147"></i> Read More</a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>

                            </div>
                            <div class="more-btn col-md-12 text-center" style="padding-top: 25px">
                                <a href="https://www.du.ac.bd/notice" class="btn btn-theme effect btn-md">View All
                                    Notices</a>
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
                            <h2> Research Activities
                            </h2>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="top-course-items courses-carousel owl-carousel owl-theme owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage"
                                style="transform: translate3d(-4400px, 0px, 0px); transition: all 0.25s ease 0s; width: 7600px;">
                                <div class="owl-item cloned" style="width: 370px; margin-right: 30px;">
                                    <div data-aos="fade-up-left" class="aos-init">
                                        <div class="item">
                                            <div class="thumb">
                                                <img src="{{ asset('frontend/assets/images/1627446131Utricularia-FinalPhoto.jpg') }}"
                                                    style="height: 220px" alt="Thumb">
                                                <div class="overlay">
                                                    <a href="https://www.du.ac.bd/#">

                                                    </a>

                                                </div>
                                            </div>
                                            <div class="info">
                                                <div class="meta">
                                                    <ul>
                                                        <li>


                                                        </li>
                                                        <li>
                                                            <a href="https://www.du.ac.bd/#">18 Jul, 2021</a>

                                                        </li>

                                                    </ul>
                                                </div>
                                                <h4 class="text-left min-height-130px" style="word-spacing: 5px">
                                                    <a
                                                        href="https://www.du.ac.bd/du_post_details/Discovery-of-Utricularia-rosettifolia-Alfasane-&amp;-Hassan---A-new-aquatic-insectivorous-plant-species-from-Bangladesh/14761">Discovery
                                                        of Utricularia rosettifolia Alfasane &amp; Hassan - A new
                                                        aquatic insectivorous plant species from Bangladesh</a>
                                                </h4>

                                                <div class="footer-meta text-center">
                                                    <a href="https://www.du.ac.bd/du_post_details/Discovery-of-Utricularia-rosettifolia-Alfasane-&amp;-Hassan---A-new-aquatic-insectivorous-plant-species-from-Bangladesh/14761"
                                                        class="btn circle btn-dark border btn-sm text-center">
                                                        <i class="fas fa-plus"></i> Read More
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item cloned" style="width: 370px; margin-right: 30px;">
                                    <div data-aos="fade-down-right" class="aos-init">
                                        <div class="item">
                                            <div class="thumb">
                                                <img src="{{ asset('frontend/assets/images/1627208205Supercapacitor.png') }}"
                                                    style="height: 220px" alt="Thumb">
                                                <div class="overlay">
                                                    <a href="https://www.du.ac.bd/#">

                                                    </a>

                                                </div>
                                            </div>
                                            <div class="info">
                                                <div class="meta">
                                                    <ul>
                                                        <li>


                                                        </li>
                                                        <li>
                                                            <a href="https://www.du.ac.bd/#">18 Jul, 2021</a>

                                                        </li>

                                                    </ul>
                                                </div>
                                                <h4 class="text-left min-height-130px" style="word-spacing: 5px">
                                                    <a
                                                        href="https://www.du.ac.bd/du_post_details/Invention-of-Algae-Derived-Carbon-for-High-Performance-Supercapacitor-Application--A-Joint-Research-between-the-University-of-Dhaka-and-the-King-Fahd-University-of-Petroleum-&amp;-Minerals,-Saudi-Arabia/14760">Invention
                                                        of Algae Derived Carbon for High Performance Supercapacitor
                                                        Application- A Joint Research between the University of Dhaka
                                                        and the King Fahd University of Petroleum &amp; Minerals, Saudi
                                                        Arabia</a>
                                                </h4>

                                                <div class="footer-meta text-center">
                                                    <a href="https://www.du.ac.bd/du_post_details/Invention-of-Algae-Derived-Carbon-for-High-Performance-Supercapacitor-Application--A-Joint-Research-between-the-University-of-Dhaka-and-the-King-Fahd-University-of-Petroleum-&amp;-Minerals,-Saudi-Arabia/14760"
                                                        class="btn circle btn-dark border btn-sm text-center">
                                                        <i class="fas fa-plus"></i> Read More
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item cloned" style="width: 370px; margin-right: 30px;">
                                    <div data-aos="fade-down-left" class="aos-init">
                                        <div class="item">
                                            <div class="thumb">
                                                <img src="{{ asset('frontend/assets/images/162608865220181016_165614.jpg') }}"
                                                    style="height: 220px" alt="Thumb">
                                                <div class="overlay">
                                                    <a href="https://www.du.ac.bd/#">

                                                    </a>

                                                </div>
                                            </div>
                                            <div class="info">
                                                <div class="meta">
                                                    <ul>
                                                        <li>


                                                        </li>
                                                        <li>
                                                            <a href="https://www.du.ac.bd/#">12 Jul, 2021</a>

                                                        </li>

                                                    </ul>
                                                </div>
                                                <h4 class="text-left min-height-130px" style="word-spacing: 5px">
                                                    <a
                                                        href="https://www.du.ac.bd/du_post_details/Indigenous-Vaccine-for-Foot-and-mouth-Disease-Virus-(FMDV)-in-Bangladesh/14655">Indigenous
                                                        Vaccine for Foot-and-mouth Disease Virus (FMDV) in
                                                        Bangladesh</a>
                                                </h4>

                                                <div class="footer-meta text-center">
                                                    <a href="https://www.du.ac.bd/du_post_details/Indigenous-Vaccine-for-Foot-and-mouth-Disease-Virus-(FMDV)-in-Bangladesh/14655"
                                                        class="btn circle btn-dark border btn-sm text-center">
                                                        <i class="fas fa-plus"></i> Read More
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item cloned" style="width: 370px; margin-right: 30px;">
                                    <div data-aos="flip-left" class="aos-init">
                                        <div class="item">
                                            <div class="thumb">
                                                <img src="{{ asset('frontend/assets/images/1625996940Photo.jpg') }}" style="height: 220px"
                                                    alt="Thumb">
                                                <div class="overlay">
                                                    <a href="https://www.du.ac.bd/#">

                                                    </a>

                                                </div>
                                            </div>
                                            <div class="info">
                                                <div class="meta">
                                                    <ul>
                                                        <li>


                                                        </li>
                                                        <li>
                                                            <a href="https://www.du.ac.bd/#">11 Jul, 2021</a>

                                                        </li>

                                                    </ul>
                                                </div>
                                                <h4 class="text-left min-height-130px" style="word-spacing: 5px">
                                                    <a
                                                        href="https://www.du.ac.bd/du_post_details/Dhaka-University-Scientists-Discover-a-Novel-Antibiotic-%E2%80%98Homicorcin%E2%80%99-from-Jute-Endophytic-Bacteria/14651">Dhaka
                                                        University Scientists Discover a Novel Antibiotic ‘Homicorcin’
                                                        from Jute Endophytic Bacteria</a>
                                                </h4>

                                                <div class="footer-meta text-center">
                                                    <a href="https://www.du.ac.bd/du_post_details/Dhaka-University-Scientists-Discover-a-Novel-Antibiotic-%E2%80%98Homicorcin%E2%80%99-from-Jute-Endophytic-Bacteria/14651"
                                                        class="btn circle btn-dark border btn-sm text-center">
                                                        <i class="fas fa-plus"></i> Read More
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item cloned" style="width: 370px; margin-right: 30px;">
                                    <div data-aos="flip-down" class="aos-init">
                                        <div class="item">
                                            <div class="thumb">
                                                <img src="{{ asset('frontend/assets/images/1627368173shewla.png') }}" style="height: 220px"
                                                    alt="Thumb">
                                                <div class="overlay">
                                                    <a href="https://www.du.ac.bd/#">

                                                    </a>

                                                </div>
                                            </div>
                                            <div class="info">
                                                <div class="meta">
                                                    <ul>
                                                        <li>


                                                        </li>
                                                        <li>
                                                            <a href="https://www.du.ac.bd/#">10 Jul, 2021</a>

                                                        </li>

                                                    </ul>
                                                </div>
                                                <h4 class="text-left min-height-130px" style="word-spacing: 5px">
                                                    <a
                                                        href="https://www.du.ac.bd/du_post_details/A-Bangladeshi-microalgae-species-makes-a-successful-nano-filter-paper-for-removal-of-bacteria-and-virus-from-water-%E2%80%93-a-joint-research-of-Dhaka-University-with-Uppsala-University,-Sweden/14652">A
                                                        Bangladeshi microalgae species makes a successful nano-filter
                                                        paper for removal of bacteria and virus from water – a joint
                                                        research of Dhaka University with Uppsala University, Sweden</a>
                                                </h4>

                                                <div class="footer-meta text-center">
                                                    <a href="https://www.du.ac.bd/du_post_details/A-Bangladeshi-microalgae-species-makes-a-successful-nano-filter-paper-for-removal-of-bacteria-and-virus-from-water-%E2%80%93-a-joint-research-of-Dhaka-University-with-Uppsala-University,-Sweden/14652"
                                                        class="btn circle btn-dark border btn-sm text-center">
                                                        <i class="fas fa-plus"></i> Read More
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 370px; margin-right: 30px;">
                                    <div data-aos="fade-up" class="aos-init">
                                        <div class="item">
                                            <div class="thumb">
                                                <img src="{{ asset('frontend/assets/images/default_logo.png') }}" style="height: 220px"
                                                    alt="Thumb">
                                                <div class="overlay">
                                                    <a href="https://www.du.ac.bd/#">

                                                    </a>

                                                </div>
                                            </div>
                                            <div class="info">
                                                <div class="meta">
                                                    <ul>
                                                        <li>


                                                        </li>
                                                        <li>
                                                            <a href="https://www.du.ac.bd/#">06 Jan, 2024</a>

                                                        </li>

                                                    </ul>
                                                </div>
                                                <h4 class="text-left min-height-130px" style="word-spacing: 5px">
                                                    <a
                                                        href="https://www.du.ac.bd/du_post_details/Dhaka-University-Scientists-Developed-a-Molecular-Diagnostic-for-Rapid-Detection-of-Kala-azar-from-Urine-Samples/20099">Dhaka
                                                        University Scientists Developed a Molecular Diagnostic for Rapid
                                                        Detection of Kala-azar from Urine Samples</a>
                                                </h4>

                                                <div class="footer-meta text-center">
                                                    <a href="https://www.du.ac.bd/du_post_details/Dhaka-University-Scientists-Developed-a-Molecular-Diagnostic-for-Rapid-Detection-of-Kala-azar-from-Urine-Samples/20099"
                                                        class="btn circle btn-dark border btn-sm text-center">
                                                        <i class="fas fa-plus"></i> Read More
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 370px; margin-right: 30px;">
                                    <div data-aos="fade-down" class="aos-init">
                                        <div class="item">
                                            <div class="thumb">
                                                <img src="{{ asset('frontend/assets/images/1636364153rn2.jpg') }}" style="height: 220px"
                                                    alt="Thumb">
                                                <div class="overlay">
                                                    <a href="https://www.du.ac.bd/#">

                                                    </a>

                                                </div>
                                            </div>
                                            <div class="info">
                                                <div class="meta">
                                                    <ul>
                                                        <li>


                                                        </li>
                                                        <li>
                                                            <a href="https://www.du.ac.bd/#">08 Nov, 2021</a>

                                                        </li>

                                                    </ul>
                                                </div>
                                                <h4 class="text-left min-height-130px" style="word-spacing: 5px">
                                                    <a
                                                        href="https://www.du.ac.bd/du_post_details/Genetic-diversity-with-respect-to-salt-tolerance-identified-by-genome-wide-study-of-176-Bangladeshi-traditional-rice-accessions-and-published-in-prestigious-journal,-PLoS-One/15300">Genetic
                                                        diversity with respect to salt tolerance identified by genome
                                                        wide study of 176 Bangladeshi traditional rice accessions and
                                                        published in prestigious journal, PLoS One</a>
                                                </h4>

                                                <div class="footer-meta text-center">
                                                    <a href="https://www.du.ac.bd/du_post_details/Genetic-diversity-with-respect-to-salt-tolerance-identified-by-genome-wide-study-of-176-Bangladeshi-traditional-rice-accessions-and-published-in-prestigious-journal,-PLoS-One/15300"
                                                        class="btn circle btn-dark border btn-sm text-center">
                                                        <i class="fas fa-plus"></i> Read More
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 370px; margin-right: 30px;">
                                    <div data-aos="fade-left" class="aos-init">
                                        <div class="item">
                                            <div class="thumb">
                                                <img src="{{ asset('frontend/assets/images/1629878698rNews2.jpg') }}" style="height: 220px"
                                                    alt="Thumb">
                                                <div class="overlay">
                                                    <a href="https://www.du.ac.bd/#">

                                                    </a>

                                                </div>
                                            </div>
                                            <div class="info">
                                                <div class="meta">
                                                    <ul>
                                                        <li>


                                                        </li>
                                                        <li>
                                                            <a href="https://www.du.ac.bd/#">25 Aug, 2021</a>

                                                        </li>

                                                    </ul>
                                                </div>
                                                <h4 class="text-left min-height-130px" style="word-spacing: 5px">
                                                    <a
                                                        href="https://www.du.ac.bd/du_post_details/Transgenic-salt-tolerant-Rice-produced-by-Dr.-Zeba-Islam-Seraj-and-her-team-at-Biochemistry-and-Molecular-Biology-Department,-University-of-Dhaka./14918">Transgenic
                                                        salt tolerant Rice produced by Dr. Zeba Islam Seraj and her team
                                                        at Biochemistry and Molecular Biology Department, University of
                                                        Dhaka.</a>
                                                </h4>

                                                <div class="footer-meta text-center">
                                                    <a href="https://www.du.ac.bd/du_post_details/Transgenic-salt-tolerant-Rice-produced-by-Dr.-Zeba-Islam-Seraj-and-her-team-at-Biochemistry-and-Molecular-Biology-Department,-University-of-Dhaka./14918"
                                                        class="btn circle btn-dark border btn-sm text-center">
                                                        <i class="fas fa-plus"></i> Read More
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 370px; margin-right: 30px;">
                                    <div data-aos="fade-up-right" class="aos-init">
                                        <div class="item">
                                            <div class="thumb">
                                                <img src="{{ asset('frontend/assets/images/1629878327reseach_news.jpg') }}"
                                                    style="height: 220px" alt="Thumb">
                                                <div class="overlay">
                                                    <a href="https://www.du.ac.bd/#">

                                                    </a>

                                                </div>
                                            </div>
                                            <div class="info">
                                                <div class="meta">
                                                    <ul>
                                                        <li>


                                                        </li>
                                                        <li>
                                                            <a href="https://www.du.ac.bd/#">25 Aug, 2021</a>

                                                        </li>

                                                    </ul>
                                                </div>
                                                <h4 class="text-left min-height-130px" style="word-spacing: 5px">
                                                    <a
                                                        href="https://www.du.ac.bd/du_post_details/Scientists-in-collaboration-with-BRRI-plant-breeders-produce-salt-tolerant-versions-of-commercial-rice-BRRI-Dhan-63-and-74/14917">Scientists
                                                        in collaboration with BRRI plant breeders produce salt tolerant
                                                        versions of commercial rice BRRI Dhan 63 and 74</a>
                                                </h4>

                                                <div class="footer-meta text-center">
                                                    <a href="https://www.du.ac.bd/du_post_details/Scientists-in-collaboration-with-BRRI-plant-breeders-produce-salt-tolerant-versions-of-commercial-rice-BRRI-Dhan-63-and-74/14917"
                                                        class="btn circle btn-dark border btn-sm text-center">
                                                        <i class="fas fa-plus"></i> Read More
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 370px; margin-right: 30px;">
                                    <div data-aos="fade-up-left" class="aos-init">
                                        <div class="item">
                                            <div class="thumb">
                                                <img src="{{ asset('frontend/assets/images/1627446131Utricularia-FinalPhoto.jpg') }}"
                                                    style="height: 220px" alt="Thumb">
                                                <div class="overlay">
                                                    <a href="https://www.du.ac.bd/#">

                                                    </a>

                                                </div>
                                            </div>
                                            <div class="info">
                                                <div class="meta">
                                                    <ul>
                                                        <li>


                                                        </li>
                                                        <li>
                                                            <a href="https://www.du.ac.bd/#">18 Jul, 2021</a>

                                                        </li>

                                                    </ul>
                                                </div>
                                                <h4 class="text-left min-height-130px" style="word-spacing: 5px">
                                                    <a
                                                        href="https://www.du.ac.bd/du_post_details/Discovery-of-Utricularia-rosettifolia-Alfasane-&amp;-Hassan---A-new-aquatic-insectivorous-plant-species-from-Bangladesh/14761">Discovery
                                                        of Utricularia rosettifolia Alfasane &amp; Hassan - A new
                                                        aquatic insectivorous plant species from Bangladesh</a>
                                                </h4>

                                                <div class="footer-meta text-center">
                                                    <a href="https://www.du.ac.bd/du_post_details/Discovery-of-Utricularia-rosettifolia-Alfasane-&amp;-Hassan---A-new-aquatic-insectivorous-plant-species-from-Bangladesh/14761"
                                                        class="btn circle btn-dark border btn-sm text-center">
                                                        <i class="fas fa-plus"></i> Read More
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 370px; margin-right: 30px;">
                                    <div data-aos="fade-down-right" class="aos-init">
                                        <div class="item">
                                            <div class="thumb">
                                                <img src="{{ asset('frontend/assets/images/1627208205Supercapacitor.png') }}"
                                                    style="height: 220px" alt="Thumb">
                                                <div class="overlay">
                                                    <a href="https://www.du.ac.bd/#">

                                                    </a>

                                                </div>
                                            </div>
                                            <div class="info">
                                                <div class="meta">
                                                    <ul>
                                                        <li>


                                                        </li>
                                                        <li>
                                                            <a href="https://www.du.ac.bd/#">18 Jul, 2021</a>

                                                        </li>

                                                    </ul>
                                                </div>
                                                <h4 class="text-left min-height-130px" style="word-spacing: 5px">
                                                    <a
                                                        href="https://www.du.ac.bd/du_post_details/Invention-of-Algae-Derived-Carbon-for-High-Performance-Supercapacitor-Application--A-Joint-Research-between-the-University-of-Dhaka-and-the-King-Fahd-University-of-Petroleum-&amp;-Minerals,-Saudi-Arabia/14760">Invention
                                                        of Algae Derived Carbon for High Performance Supercapacitor
                                                        Application- A Joint Research between the University of Dhaka
                                                        and the King Fahd University of Petroleum &amp; Minerals, Saudi
                                                        Arabia</a>
                                                </h4>

                                                <div class="footer-meta text-center">
                                                    <a href="https://www.du.ac.bd/du_post_details/Invention-of-Algae-Derived-Carbon-for-High-Performance-Supercapacitor-Application--A-Joint-Research-between-the-University-of-Dhaka-and-the-King-Fahd-University-of-Petroleum-&amp;-Minerals,-Saudi-Arabia/14760"
                                                        class="btn circle btn-dark border btn-sm text-center">
                                                        <i class="fas fa-plus"></i> Read More
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item active" style="width: 370px; margin-right: 30px;">
                                    <div data-aos="fade-down-left" class="aos-init">
                                        <div class="item">
                                            <div class="thumb">
                                                <img src="{{ asset('frontend/assets/images/162608865220181016_165614.jpg') }}"
                                                    style="height: 220px" alt="Thumb">
                                                <div class="overlay">
                                                    <a href="https://www.du.ac.bd/#">

                                                    </a>

                                                </div>
                                            </div>
                                            <div class="info">
                                                <div class="meta">
                                                    <ul>
                                                        <li>


                                                        </li>
                                                        <li>
                                                            <a href="https://www.du.ac.bd/#">12 Jul, 2021</a>

                                                        </li>

                                                    </ul>
                                                </div>
                                                <h4 class="text-left min-height-130px" style="word-spacing: 5px">
                                                    <a
                                                        href="https://www.du.ac.bd/du_post_details/Indigenous-Vaccine-for-Foot-and-mouth-Disease-Virus-(FMDV)-in-Bangladesh/14655">Indigenous
                                                        Vaccine for Foot-and-mouth Disease Virus (FMDV) in
                                                        Bangladesh</a>
                                                </h4>

                                                <div class="footer-meta text-center">
                                                    <a href="https://www.du.ac.bd/du_post_details/Indigenous-Vaccine-for-Foot-and-mouth-Disease-Virus-(FMDV)-in-Bangladesh/14655"
                                                        class="btn circle btn-dark border btn-sm text-center">
                                                        <i class="fas fa-plus"></i> Read More
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item active" style="width: 370px; margin-right: 30px;">
                                    <div data-aos="flip-left" class="aos-init">
                                        <div class="item">
                                            <div class="thumb">
                                                <img src="{{ asset('frontend/assets/images/1625996940Photo.jpg') }}" style="height: 220px"
                                                    alt="Thumb">
                                                <div class="overlay">
                                                    <a href="https://www.du.ac.bd/#">

                                                    </a>

                                                </div>
                                            </div>
                                            <div class="info">
                                                <div class="meta">
                                                    <ul>
                                                        <li>


                                                        </li>
                                                        <li>
                                                            <a href="https://www.du.ac.bd/#">11 Jul, 2021</a>

                                                        </li>

                                                    </ul>
                                                </div>
                                                <h4 class="text-left min-height-130px" style="word-spacing: 5px">
                                                    <a
                                                        href="https://www.du.ac.bd/du_post_details/Dhaka-University-Scientists-Discover-a-Novel-Antibiotic-%E2%80%98Homicorcin%E2%80%99-from-Jute-Endophytic-Bacteria/14651">Dhaka
                                                        University Scientists Discover a Novel Antibiotic ‘Homicorcin’
                                                        from Jute Endophytic Bacteria</a>
                                                </h4>

                                                <div class="footer-meta text-center">
                                                    <a href="https://www.du.ac.bd/du_post_details/Dhaka-University-Scientists-Discover-a-Novel-Antibiotic-%E2%80%98Homicorcin%E2%80%99-from-Jute-Endophytic-Bacteria/14651"
                                                        class="btn circle btn-dark border btn-sm text-center">
                                                        <i class="fas fa-plus"></i> Read More
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item active" style="width: 370px; margin-right: 30px;">
                                    <div data-aos="flip-down" class="aos-init">
                                        <div class="item">
                                            <div class="thumb">
                                                <img src="{{ asset('frontend/assets/images/1627368173shewla.png') }}" style="height: 220px"
                                                    alt="Thumb">
                                                <div class="overlay">
                                                    <a href="https://www.du.ac.bd/#">

                                                    </a>

                                                </div>
                                            </div>
                                            <div class="info">
                                                <div class="meta">
                                                    <ul>
                                                        <li>


                                                        </li>
                                                        <li>
                                                            <a href="https://www.du.ac.bd/#">10 Jul, 2021</a>

                                                        </li>

                                                    </ul>
                                                </div>
                                                <h4 class="text-left min-height-130px" style="word-spacing: 5px">
                                                    <a
                                                        href="https://www.du.ac.bd/du_post_details/A-Bangladeshi-microalgae-species-makes-a-successful-nano-filter-paper-for-removal-of-bacteria-and-virus-from-water-%E2%80%93-a-joint-research-of-Dhaka-University-with-Uppsala-University,-Sweden/14652">A
                                                        Bangladeshi microalgae species makes a successful nano-filter
                                                        paper for removal of bacteria and virus from water – a joint
                                                        research of Dhaka University with Uppsala University, Sweden</a>
                                                </h4>

                                                <div class="footer-meta text-center">
                                                    <a href="https://www.du.ac.bd/du_post_details/A-Bangladeshi-microalgae-species-makes-a-successful-nano-filter-paper-for-removal-of-bacteria-and-virus-from-water-%E2%80%93-a-joint-research-of-Dhaka-University-with-Uppsala-University,-Sweden/14652"
                                                        class="btn circle btn-dark border btn-sm text-center">
                                                        <i class="fas fa-plus"></i> Read More
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item cloned" style="width: 370px; margin-right: 30px;">
                                    <div data-aos="fade-up" class="aos-init">
                                        <div class="item">
                                            <div class="thumb">
                                                <img src="{{ asset('frontend/assets/images/default_logo.png') }}" style="height: 220px"
                                                    alt="Thumb">
                                                <div class="overlay">
                                                    <a href="https://www.du.ac.bd/#">

                                                    </a>

                                                </div>
                                            </div>
                                            <div class="info">
                                                <div class="meta">
                                                    <ul>
                                                        <li>


                                                        </li>
                                                        <li>
                                                            <a href="https://www.du.ac.bd/#">06 Jan, 2024</a>

                                                        </li>

                                                    </ul>
                                                </div>
                                                <h4 class="text-left min-height-130px" style="word-spacing: 5px">
                                                    <a
                                                        href="https://www.du.ac.bd/du_post_details/Dhaka-University-Scientists-Developed-a-Molecular-Diagnostic-for-Rapid-Detection-of-Kala-azar-from-Urine-Samples/20099">Dhaka
                                                        University Scientists Developed a Molecular Diagnostic for Rapid
                                                        Detection of Kala-azar from Urine Samples</a>
                                                </h4>

                                                <div class="footer-meta text-center">
                                                    <a href="https://www.du.ac.bd/du_post_details/Dhaka-University-Scientists-Developed-a-Molecular-Diagnostic-for-Rapid-Detection-of-Kala-azar-from-Urine-Samples/20099"
                                                        class="btn circle btn-dark border btn-sm text-center">
                                                        <i class="fas fa-plus"></i> Read More
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item cloned" style="width: 370px; margin-right: 30px;">
                                    <div data-aos="fade-down" class="aos-init">
                                        <div class="item">
                                            <div class="thumb">
                                                <img src="{{ asset('frontend/assets/images/1636364153rn2.jpg') }}" style="height: 220px"
                                                    alt="Thumb">
                                                <div class="overlay">
                                                    <a href="https://www.du.ac.bd/#">

                                                    </a>

                                                </div>
                                            </div>
                                            <div class="info">
                                                <div class="meta">
                                                    <ul>
                                                        <li>


                                                        </li>
                                                        <li>
                                                            <a href="https://www.du.ac.bd/#">08 Nov, 2021</a>

                                                        </li>

                                                    </ul>
                                                </div>
                                                <h4 class="text-left min-height-130px" style="word-spacing: 5px">
                                                    <a
                                                        href="https://www.du.ac.bd/du_post_details/Genetic-diversity-with-respect-to-salt-tolerance-identified-by-genome-wide-study-of-176-Bangladeshi-traditional-rice-accessions-and-published-in-prestigious-journal,-PLoS-One/15300">Genetic
                                                        diversity with respect to salt tolerance identified by genome
                                                        wide study of 176 Bangladeshi traditional rice accessions and
                                                        published in prestigious journal, PLoS One</a>
                                                </h4>

                                                <div class="footer-meta text-center">
                                                    <a href="https://www.du.ac.bd/du_post_details/Genetic-diversity-with-respect-to-salt-tolerance-identified-by-genome-wide-study-of-176-Bangladeshi-traditional-rice-accessions-and-published-in-prestigious-journal,-PLoS-One/15300"
                                                        class="btn circle btn-dark border btn-sm text-center">
                                                        <i class="fas fa-plus"></i> Read More
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item cloned" style="width: 370px; margin-right: 30px;">
                                    <div data-aos="fade-left" class="aos-init">
                                        <div class="item">
                                            <div class="thumb">
                                                <img src="{{ asset('frontend/assets/images/1629878698rNews2.jpg') }}" style="height: 220px"
                                                    alt="Thumb">
                                                <div class="overlay">
                                                    <a href="https://www.du.ac.bd/#">

                                                    </a>

                                                </div>
                                            </div>
                                            <div class="info">
                                                <div class="meta">
                                                    <ul>
                                                        <li>


                                                        </li>
                                                        <li>
                                                            <a href="https://www.du.ac.bd/#">25 Aug, 2021</a>

                                                        </li>

                                                    </ul>
                                                </div>
                                                <h4 class="text-left min-height-130px" style="word-spacing: 5px">
                                                    <a
                                                        href="https://www.du.ac.bd/du_post_details/Transgenic-salt-tolerant-Rice-produced-by-Dr.-Zeba-Islam-Seraj-and-her-team-at-Biochemistry-and-Molecular-Biology-Department,-University-of-Dhaka./14918">Transgenic
                                                        salt tolerant Rice produced by Dr. Zeba Islam Seraj and her team
                                                        at Biochemistry and Molecular Biology Department, University of
                                                        Dhaka.</a>
                                                </h4>

                                                <div class="footer-meta text-center">
                                                    <a href="https://www.du.ac.bd/du_post_details/Transgenic-salt-tolerant-Rice-produced-by-Dr.-Zeba-Islam-Seraj-and-her-team-at-Biochemistry-and-Molecular-Biology-Department,-University-of-Dhaka./14918"
                                                        class="btn circle btn-dark border btn-sm text-center">
                                                        <i class="fas fa-plus"></i> Read More
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item cloned" style="width: 370px; margin-right: 30px;">
                                    <div data-aos="fade-up-right" class="aos-init">
                                        <div class="item">
                                            <div class="thumb">
                                                <img src="{{ asset('frontend/assets/images/1629878327reseach_news.jpg') }}"
                                                    style="height: 220px" alt="Thumb">
                                                <div class="overlay">
                                                    <a href="https://www.du.ac.bd/#">

                                                    </a>

                                                </div>
                                            </div>
                                            <div class="info">
                                                <div class="meta">
                                                    <ul>
                                                        <li>


                                                        </li>
                                                        <li>
                                                            <a href="https://www.du.ac.bd/#">25 Aug, 2021</a>

                                                        </li>

                                                    </ul>
                                                </div>
                                                <h4 class="text-left min-height-130px" style="word-spacing: 5px">
                                                    <a
                                                        href="https://www.du.ac.bd/du_post_details/Scientists-in-collaboration-with-BRRI-plant-breeders-produce-salt-tolerant-versions-of-commercial-rice-BRRI-Dhan-63-and-74/14917">Scientists
                                                        in collaboration with BRRI plant breeders produce salt tolerant
                                                        versions of commercial rice BRRI Dhan 63 and 74</a>
                                                </h4>

                                                <div class="footer-meta text-center">
                                                    <a href="https://www.du.ac.bd/du_post_details/Scientists-in-collaboration-with-BRRI-plant-breeders-produce-salt-tolerant-versions-of-commercial-rice-BRRI-Dhan-63-and-74/14917"
                                                        class="btn circle btn-dark border btn-sm text-center">
                                                        <i class="fas fa-plus"></i> Read More
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item cloned" style="width: 370px; margin-right: 30px;">
                                    <div data-aos="fade-up-left" class="aos-init">
                                        <div class="item">
                                            <div class="thumb">
                                                <img src="{{ asset('frontend/assets/images/1627446131Utricularia-FinalPhoto.jpg') }}"
                                                    style="height: 220px" alt="Thumb">
                                                <div class="overlay">
                                                    <a href="https://www.du.ac.bd/#">

                                                    </a>

                                                </div>
                                            </div>
                                            <div class="info">
                                                <div class="meta">
                                                    <ul>
                                                        <li>


                                                        </li>
                                                        <li>
                                                            <a href="https://www.du.ac.bd/#">18 Jul, 2021</a>

                                                        </li>

                                                    </ul>
                                                </div>
                                                <h4 class="text-left min-height-130px" style="word-spacing: 5px">
                                                    <a
                                                        href="https://www.du.ac.bd/du_post_details/Discovery-of-Utricularia-rosettifolia-Alfasane-&amp;-Hassan---A-new-aquatic-insectivorous-plant-species-from-Bangladesh/14761">Discovery
                                                        of Utricularia rosettifolia Alfasane &amp; Hassan - A new
                                                        aquatic insectivorous plant species from Bangladesh</a>
                                                </h4>

                                                <div class="footer-meta text-center">
                                                    <a href="https://www.du.ac.bd/du_post_details/Discovery-of-Utricularia-rosettifolia-Alfasane-&amp;-Hassan---A-new-aquatic-insectivorous-plant-species-from-Bangladesh/14761"
                                                        class="btn circle btn-dark border btn-sm text-center">
                                                        <i class="fas fa-plus"></i> Read More
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="owl-nav disabled">
                            <div class="owl-prev"><i class="fa fa-angle-left"></i></div>
                            <div class="owl-next"><i class="fa fa-angle-right"></i></div>
                        </div>
                        <div class="owl-dots">
                            <div class="owl-dot"><span></span></div>
                            <div class="owl-dot"><span></span></div>
                            <div class="owl-dot active"><span></span></div>
                        </div>
                    </div>
                    <div class="more-btn col-md-12 text-center" style="padding-top: 20px">
                        <a href="https://www.du.ac.bd/researchNews" class="btn btn-theme effect btn-md">View All
                            Research Activities</a>
                    </div>

                </div>
            </div>
        </div>

        <!-- End Academic Block -->

        <!---End Research Block-->

        <!-- Start Campus Story
    ============================================= -->

        <!-- End Campus Story -->

        <!-- Start Around the University Block
    ============================================= -->
        <!-- End Academic Collaboration Block -->

      

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
                                <h4><span>Featured- </span><strong>News &amp; Events</strong><span><a
                                            href="https://www.du.ac.bd/featured-news-event" class="pull-right">View All
                                            <i class="fas fa-angle-double-right"></i></a></span></h4>
                            </div>
                            <div
                                class="top-course-items top-courses-carousel owl-carousel owl-theme owl-loaded owl-drag">
                                <!-- Single Item -->




                                <!-- Single Item -->

                                <div class="owl-stage-outer">
                                    <div class="owl-stage"
                                        style="transform: translate3d(-1162px, 0px, 0px); transition: all 0.25s ease 0s; width: 3100px;">
                                        <div class="owl-item cloned" style="width: 357.5px; margin-right: 30px;">
                                            <div data-aos="fade-up" data-aos-duration="3000" class="item aos-init">
                                                <div class="thumb">
                                                    <img src="{{ asset('frontend/assets/images/default_logo.png') }}"
                                                        onerror="this.src=&#39;https://www.du.ac.bd/fontView/assets/img/default_logo.png&#39;"
                                                        alt="Thumb" style="height: 262px">

                                                </div>
                                                <div class="info">
                                                    <h4 class="text-left" style="height: 150px; word-spacing: 5px">
                                                        <a
                                                            href="https://www.du.ac.bd/du_post_details/Research-Publication-Fair-2024/20112">Research
                                                            Publication Fair 2024</a>
                                                    </h4>

                                                    <div class="footer-meta">
                                                        <a class="btn btn-theme effect btn-block btn-lg btnhome"
                                                            href="https://www.du.ac.bd/du_post_details/Research-Publication-Fair-2024/20112">Read
                                                            More...<i
                                                                class="fas fa-check-circle fa-2x fa-pull-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="owl-item cloned" style="width: 357.5px; margin-right: 30px;">
                                            <div data-aos="fade-up" data-aos-duration="3000" class="item aos-init">
                                                <div class="thumb">
                                                    <img src="{{ asset('frontend/assets/images/default_logo.png') }}"
                                                        onerror="this.src=&#39;https://www.du.ac.bd/fontView/assets/img/default_logo.png&#39;"
                                                        alt="Thumb" style="height: 262px">

                                                </div>
                                                <div class="info">
                                                    <h4 class="text-left" style="height: 150px; word-spacing: 5px">
                                                        <a
                                                            href="https://www.du.ac.bd/du_post_details/%E0%A6%9C%E0%A7%80%E0%A6%AC%E0%A6%AC%E0%A6%BF%E0%A6%9C%E0%A7%8D%E0%A6%9E%E0%A6%BE%E0%A6%A8-%E0%A6%85%E0%A6%A8%E0%A7%81%E0%A6%B7%E0%A6%A6%E0%A7%87%E0%A6%B0-%E0%A6%95%E0%A6%A8%E0%A6%AB%E0%A6%BE%E0%A6%B0%E0%A7%87%E0%A6%A8%E0%A7%8D%E0%A6%B8-%E0%A6%95%E0%A6%95%E0%A7%8D%E0%A6%B7-%E0%A6%93-%E0%A6%B8%E0%A6%AD%E0%A6%BE%E0%A6%95%E0%A6%95%E0%A7%8D%E0%A6%B7%E0%A7%87%E0%A6%B0-%E0%A6%B6%E0%A7%81%E0%A6%AD-%E0%A6%89%E0%A6%A6%E0%A7%8D%E0%A6%AC%E0%A7%8B%E0%A6%A7%E0%A6%A8/20035">জীববিজ্ঞান
                                                            অনুষদের কনফারেন্স কক্ষ ও সভাকক্ষের শুভ উদ্বোধন</a>
                                                    </h4>

                                                    <div class="footer-meta">
                                                        <a class="btn btn-theme effect btn-block btn-lg btnhome"
                                                            href="https://www.du.ac.bd/du_post_details/%E0%A6%9C%E0%A7%80%E0%A6%AC%E0%A6%AC%E0%A6%BF%E0%A6%9C%E0%A7%8D%E0%A6%9E%E0%A6%BE%E0%A6%A8-%E0%A6%85%E0%A6%A8%E0%A7%81%E0%A6%B7%E0%A6%A6%E0%A7%87%E0%A6%B0-%E0%A6%95%E0%A6%A8%E0%A6%AB%E0%A6%BE%E0%A6%B0%E0%A7%87%E0%A6%A8%E0%A7%8D%E0%A6%B8-%E0%A6%95%E0%A6%95%E0%A7%8D%E0%A6%B7-%E0%A6%93-%E0%A6%B8%E0%A6%AD%E0%A6%BE%E0%A6%95%E0%A6%95%E0%A7%8D%E0%A6%B7%E0%A7%87%E0%A6%B0-%E0%A6%B6%E0%A7%81%E0%A6%AD-%E0%A6%89%E0%A6%A6%E0%A7%8D%E0%A6%AC%E0%A7%8B%E0%A6%A7%E0%A6%A8/20035">Read
                                                            More...<i
                                                                class="fas fa-check-circle fa-2x fa-pull-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="owl-item" style="width: 357.5px; margin-right: 30px;">
                                            <div data-aos="fade-up" data-aos-duration="3000" class="item aos-init">
                                                <div class="thumb">
                                                    <img src="{{ asset('frontend/assets/images/1711448533inagation.jpg') }}"
                                                        onerror="this.src=&#39;https://www.du.ac.bd/fontView/assets/img/default_logo.png&#39;"
                                                        alt="Thumb" style="height: 262px">

                                                </div>
                                                <div class="info">
                                                    <h4 class="text-left" style="height: 150px; word-spacing: 5px">
                                                        <a
                                                            href="https://www.du.ac.bd/du_post_details/Go-Live-of-DU&#39;s-home-grown-LMS-and-Exam-Automation-System/20914">Go-Live
                                                            of DU's home grown LMS and Exam Automation System</a>
                                                    </h4>

                                                    <div class="footer-meta">
                                                        <a class="btn btn-theme effect btn-block btn-lg btnhome"
                                                            href="https://www.du.ac.bd/du_post_details/Go-Live-of-DU&#39;s-home-grown-LMS-and-Exam-Automation-System/20914">Read
                                                            More...<i
                                                                class="fas fa-check-circle fa-2x fa-pull-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="owl-item active" style="width: 357.5px; margin-right: 30px;">
                                            <div data-aos="fade-up" data-aos-duration="3000" class="item aos-init">
                                                <div class="thumb">
                                                    <img src="{{ asset('frontend/assets/images/1705311373DSC_3500.jpg') }}"
                                                        onerror="this.src=&#39;https://www.du.ac.bd/fontView/assets/img/default_logo.png&#39;"
                                                        alt="Thumb" style="height: 262px">

                                                </div>
                                                <div class="info">
                                                    <h4 class="text-left" style="height: 150px; word-spacing: 5px">
                                                        <a
                                                            href="https://www.du.ac.bd/du_post_details/%E0%A6%A2%E0%A6%BE%E0%A6%AC%E0%A6%BF-%E0%A6%8F-%E0%A6%86%E0%A6%97%E0%A6%BE%E0%A6%AE%E0%A7%80-%E0%A7%AA%E0%A6%AE%E0%A6%BE%E0%A6%B0%E0%A7%8D%E0%A6%9A-%E0%A6%87%E0%A6%A8%E0%A7%8B%E0%A6%AD%E0%A7%87%E0%A6%B6%E0%A6%A8-%E0%A6%AE%E0%A7%87%E0%A6%B2%E0%A6%BE/20155">ঢাবি-এ
                                                            আগামী ৪মার্চ ইনোভেশন মেলা</a>
                                                    </h4>

                                                    <div class="footer-meta">
                                                        <a class="btn btn-theme effect btn-block btn-lg btnhome"
                                                            href="https://www.du.ac.bd/du_post_details/%E0%A6%A2%E0%A6%BE%E0%A6%AC%E0%A6%BF-%E0%A6%8F-%E0%A6%86%E0%A6%97%E0%A6%BE%E0%A6%AE%E0%A7%80-%E0%A7%AA%E0%A6%AE%E0%A6%BE%E0%A6%B0%E0%A7%8D%E0%A6%9A-%E0%A6%87%E0%A6%A8%E0%A7%8B%E0%A6%AD%E0%A7%87%E0%A6%B6%E0%A6%A8-%E0%A6%AE%E0%A7%87%E0%A6%B2%E0%A6%BE/20155">Read
                                                            More...<i
                                                                class="fas fa-check-circle fa-2x fa-pull-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="owl-item active" style="width: 357.5px; margin-right: 30px;">
                                            <div data-aos="fade-up" data-aos-duration="3000" class="item aos-init">
                                                <div class="thumb">
                                                    <img src="{{ asset('frontend/assets/images/default_logo.png') }}"
                                                        onerror="this.src=&#39;https://www.du.ac.bd/fontView/assets/img/default_logo.png&#39;"
                                                        alt="Thumb" style="height: 262px">

                                                </div>
                                                <div class="info">
                                                    <h4 class="text-left" style="height: 150px; word-spacing: 5px">
                                                        <a
                                                            href="https://www.du.ac.bd/du_post_details/Research-Publication-Fair-2024/20112">Research
                                                            Publication Fair 2024</a>
                                                    </h4>

                                                    <div class="footer-meta">
                                                        <a class="btn btn-theme effect btn-block btn-lg btnhome"
                                                            href="https://www.du.ac.bd/du_post_details/Research-Publication-Fair-2024/20112">Read
                                                            More...<i
                                                                class="fas fa-check-circle fa-2x fa-pull-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="owl-item" style="width: 357.5px; margin-right: 30px;">
                                            <div data-aos="fade-up" data-aos-duration="3000" class="item aos-init">
                                                <div class="thumb">
                                                    <img src="{{ asset('frontend/assets/images/default_logo.png') }}"
                                                        onerror="this.src=&#39;https://www.du.ac.bd/fontView/assets/img/default_logo.png&#39;"
                                                        alt="Thumb" style="height: 262px">

                                                </div>
                                                <div class="info">
                                                    <h4 class="text-left" style="height: 150px; word-spacing: 5px">
                                                        <a
                                                            href="https://www.du.ac.bd/du_post_details/%E0%A6%9C%E0%A7%80%E0%A6%AC%E0%A6%AC%E0%A6%BF%E0%A6%9C%E0%A7%8D%E0%A6%9E%E0%A6%BE%E0%A6%A8-%E0%A6%85%E0%A6%A8%E0%A7%81%E0%A6%B7%E0%A6%A6%E0%A7%87%E0%A6%B0-%E0%A6%95%E0%A6%A8%E0%A6%AB%E0%A6%BE%E0%A6%B0%E0%A7%87%E0%A6%A8%E0%A7%8D%E0%A6%B8-%E0%A6%95%E0%A6%95%E0%A7%8D%E0%A6%B7-%E0%A6%93-%E0%A6%B8%E0%A6%AD%E0%A6%BE%E0%A6%95%E0%A6%95%E0%A7%8D%E0%A6%B7%E0%A7%87%E0%A6%B0-%E0%A6%B6%E0%A7%81%E0%A6%AD-%E0%A6%89%E0%A6%A6%E0%A7%8D%E0%A6%AC%E0%A7%8B%E0%A6%A7%E0%A6%A8/20035">জীববিজ্ঞান
                                                            অনুষদের কনফারেন্স কক্ষ ও সভাকক্ষের শুভ উদ্বোধন</a>
                                                    </h4>

                                                    <div class="footer-meta">
                                                        <a class="btn btn-theme effect btn-block btn-lg btnhome"
                                                            href="https://www.du.ac.bd/du_post_details/%E0%A6%9C%E0%A7%80%E0%A6%AC%E0%A6%AC%E0%A6%BF%E0%A6%9C%E0%A7%8D%E0%A6%9E%E0%A6%BE%E0%A6%A8-%E0%A6%85%E0%A6%A8%E0%A7%81%E0%A6%B7%E0%A6%A6%E0%A7%87%E0%A6%B0-%E0%A6%95%E0%A6%A8%E0%A6%AB%E0%A6%BE%E0%A6%B0%E0%A7%87%E0%A6%A8%E0%A7%8D%E0%A6%B8-%E0%A6%95%E0%A6%95%E0%A7%8D%E0%A6%B7-%E0%A6%93-%E0%A6%B8%E0%A6%AD%E0%A6%BE%E0%A6%95%E0%A6%95%E0%A7%8D%E0%A6%B7%E0%A7%87%E0%A6%B0-%E0%A6%B6%E0%A7%81%E0%A6%AD-%E0%A6%89%E0%A6%A6%E0%A7%8D%E0%A6%AC%E0%A7%8B%E0%A6%A7%E0%A6%A8/20035">Read
                                                            More...<i
                                                                class="fas fa-check-circle fa-2x fa-pull-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="owl-item cloned" style="width: 357.5px; margin-right: 30px;">
                                            <div data-aos="fade-up" data-aos-duration="3000" class="item aos-init">
                                                <div class="thumb">
                                                    <img src="{{ asset('frontend/assets/images/1711448533inagation.jpg') }}"
                                                        onerror="this.src=&#39;https://www.du.ac.bd/fontView/assets/img/default_logo.png&#39;"
                                                        alt="Thumb" style="height: 262px">

                                                </div>
                                                <div class="info">
                                                    <h4 class="text-left" style="height: 150px; word-spacing: 5px">
                                                        <a
                                                            href="https://www.du.ac.bd/du_post_details/Go-Live-of-DU&#39;s-home-grown-LMS-and-Exam-Automation-System/20914">Go-Live
                                                            of DU's home grown LMS and Exam Automation System</a>
                                                    </h4>

                                                    <div class="footer-meta">
                                                        <a class="btn btn-theme effect btn-block btn-lg btnhome"
                                                            href="https://www.du.ac.bd/du_post_details/Go-Live-of-DU&#39;s-home-grown-LMS-and-Exam-Automation-System/20914">Read
                                                            More...<i
                                                                class="fas fa-check-circle fa-2x fa-pull-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="owl-item cloned" style="width: 357.5px; margin-right: 30px;">
                                            <div data-aos="fade-up" data-aos-duration="3000" class="item aos-init">
                                                <div class="thumb">
                                                    <img src="{{ asset('frontend/assets/images/1705311373DSC_3500.jpg') }}"
                                                        onerror="this.src=&#39;https://www.du.ac.bd/fontView/assets/img/default_logo.png&#39;"
                                                        alt="Thumb" style="height: 262px">

                                                </div>
                                                <div class="info">
                                                    <h4 class="text-left" style="height: 150px; word-spacing: 5px">
                                                        <a
                                                            href="https://www.du.ac.bd/du_post_details/%E0%A6%A2%E0%A6%BE%E0%A6%AC%E0%A6%BF-%E0%A6%8F-%E0%A6%86%E0%A6%97%E0%A6%BE%E0%A6%AE%E0%A7%80-%E0%A7%AA%E0%A6%AE%E0%A6%BE%E0%A6%B0%E0%A7%8D%E0%A6%9A-%E0%A6%87%E0%A6%A8%E0%A7%8B%E0%A6%AD%E0%A7%87%E0%A6%B6%E0%A6%A8-%E0%A6%AE%E0%A7%87%E0%A6%B2%E0%A6%BE/20155">ঢাবি-এ
                                                            আগামী ৪মার্চ ইনোভেশন মেলা</a>
                                                    </h4>

                                                    <div class="footer-meta">
                                                        <a class="btn btn-theme effect btn-block btn-lg btnhome"
                                                            href="https://www.du.ac.bd/du_post_details/%E0%A6%A2%E0%A6%BE%E0%A6%AC%E0%A6%BF-%E0%A6%8F-%E0%A6%86%E0%A6%97%E0%A6%BE%E0%A6%AE%E0%A7%80-%E0%A7%AA%E0%A6%AE%E0%A6%BE%E0%A6%B0%E0%A7%8D%E0%A6%9A-%E0%A6%87%E0%A6%A8%E0%A7%8B%E0%A6%AD%E0%A7%87%E0%A6%B6%E0%A6%A8-%E0%A6%AE%E0%A7%87%E0%A6%B2%E0%A6%BE/20155">Read
                                                            More...<i
                                                                class="fas fa-check-circle fa-2x fa-pull-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-nav">
                                    <div class="owl-prev"><i class="fa fa-angle-left"></i></div>
                                    <div class="owl-next"><i class="fa fa-angle-right"></i></div>
                                </div>
                                <div class="owl-dots disabled"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="top-author">
                            <h4>Student Achievements</h4>
                            <div class="author-items">
                                <div data-aos="fade-up-left" data-aos-duration="3000" class="item aos-init">
                                    <div class="thumb">
                                        <a href="https://www.du.ac.bd/student-achievements-details/627">
                                            <img src="{{ asset('frontend/assets/images/1710741949NCPC.jpg') }}" alt="Thumb">

                                        </a>
                                    </div>
                                    <div class=" info">
                                        <h5> <a href="https://www.du.ac.bd/student-achievements-details/627"
                                                target="_blank">CSEDU team Ascending secured Champions Trophy in
                                                NCPC</a></h5>
                                        <ul>
                                            <li class="border">
                                                <span>
                                                    2024</span>

                                            </li>
                                            <li>
                                                <span> <a href="https://www.du.ac.bd/student-achievements-details/627"
                                                        target="_blank">
                                                        <i class="fas fa-book-open"></i> View
                                                        Details</a></span>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <div data-aos="fade-up-left" data-aos-duration="3000" class="item aos-init">
                                    <div class="thumb">
                                        <a href="https://www.du.ac.bd/student-achievements-details/625">
                                            <img src="{{ asset('frontend/assets/images/1710085590du_language_fest_nlp.jpg') }}" alt="Thumb">

                                        </a>
                                    </div>
                                    <div class=" info">
                                        <h5> <a href="https://www.du.ac.bd/student-achievements-details/625"
                                                target="_blank">CSEDU Team DU_Bayanno: NLP Segment Champion at Language
                                                Fest in DU Linguistics Department</a></h5>
                                        <ul>
                                            <li class="border">
                                                <span>
                                                    2024</span>

                                            </li>
                                            <li>
                                                <span> <a href="https://www.du.ac.bd/student-achievements-details/625"
                                                        target="_blank">
                                                        <i class="fas fa-book-open"></i> View
                                                        Details</a></span>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <div data-aos="fade-up-left" data-aos-duration="3000" class="item aos-init">
                                    <div class="thumb">
                                        <a href="https://www.du.ac.bd/student-achievements-details/626">
                                            <img src="{{ asset('frontend/assets/images/1710086252uiu_inter_university_nlp.jpg') }}"
                                                alt="Thumb">

                                        </a>
                                    </div>
                                    <div class=" info">
                                        <h5> <a href="https://www.du.ac.bd/student-achievements-details/626"
                                                target="_blank">CSEDU Team_Khita_Kortesi Secures 1st Runners-Up Position
                                                in UIU Inter University NLP Competition</a></h5>
                                        <ul>
                                            <li class="border">
                                                <span>
                                                    2024</span>

                                            </li>
                                            <li>
                                                <span> <a href="https://www.du.ac.bd/student-achievements-details/626"
                                                        target="_blank">
                                                        <i class="fas fa-book-open"></i> View
                                                        Details</a></span>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <a href="https://www.du.ac.bd/student-achievements">View All <i
                                        class="fas fa-angle-double-right"></i></a>
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
                    <div class="courses-carousel owl-carousel owl-theme owl-loaded owl-drag">

                        <div class="owl-stage-outer">
                            <div class="owl-stage"
                                style="transform: translate3d(-1600px, 0px, 0px); transition: all 0.25s ease 0s; width: 4000px;">
                                <div class="owl-item cloned" style="width: 370px; margin-right: 30px;">
                                    <div class="item">
                                        <div data-aos="fade-up-right" class="thumb aos-init">
                                            <div class="thumb">
                                                <iframe width="100%" height="180"
                                                    src="./Home __ Dhaka University_files/WY-scMDBRx0.html"
                                                    frameborder="0" allowfullscreen=""></iframe>
                                            </div>
                                            <div style="font-size: 14px;text-align:justify;color:blue;">ঢাকা
                                                বিশ্ববিদ্যালয় বিজ্ঞান ইউনিট আন্ডারগ্র্যাজুয়েট ভর্তি পরীক্ষা ২০২৩-২০২৪
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item cloned" style="width: 370px; margin-right: 30px;">
                                    <div class="item">
                                        <div data-aos="fade-up-right" class="thumb aos-init">
                                            <div class="thumb">
                                                <iframe width="100%" height="180"
                                                    src="./Home __ Dhaka University_files/7fkmhigF4Ec.html"
                                                    frameborder="0" allowfullscreen=""></iframe>
                                            </div>
                                            <div style="font-size: 14px;text-align:justify;color:blue;">ঢাকা
                                                বিশ্ববিদ্যালয় আন্ডারগ্র্যাজুয়েট ভর্তি পরীক্ষা ২০২৩-২০২৪ | চারুকলা ইউনিট
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item cloned" style="width: 370px; margin-right: 30px;">
                                    <div class="item">
                                        <div data-aos="fade-up-right" class="thumb aos-init">
                                            <div class="thumb">
                                                <iframe width="100%" height="180"
                                                    src="./Home __ Dhaka University_files/9CEeMhmCqQ0.html"
                                                    frameborder="0" allowfullscreen=""></iframe>
                                            </div>
                                            <div style="font-size: 14px;text-align:justify;color:blue;">ঢাকা
                                                বিশ্ববিদ্যালয় আন্ডারগ্র্যাজুয়েট ভর্তি পরীক্ষা ২০২৩-২০২৪ | ব্যবসায় শিক্ষা
                                                ইউনিট</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 370px; margin-right: 30px;">
                                    <div class="item">
                                        <div data-aos="fade-up-right" class="thumb aos-init">
                                            <div class="thumb">
                                                <iframe width="100%" height="180"
                                                    src="./Home __ Dhaka University_files/eK2zoQw79t8.html"
                                                    frameborder="0" allowfullscreen=""></iframe>
                                            </div>
                                            <div style="font-size: 14px;text-align:justify;color:blue;">Dhaka University
                                                IT Society | SPACEVERSE 1.0 Fest</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item active" style="width: 370px; margin-right: 30px;">
                                    <div class="item">
                                        <div data-aos="fade-up-right" class="thumb aos-init">
                                            <div class="thumb">
                                                <iframe width="100%" height="180"
                                                    src="./Home __ Dhaka University_files/WY-scMDBRx0(1).html"
                                                    frameborder="0" allowfullscreen=""></iframe>
                                            </div>
                                            <div style="font-size: 14px;text-align:justify;color:blue;">ঢাকা
                                                বিশ্ববিদ্যালয় বিজ্ঞান ইউনিট আন্ডারগ্র্যাজুয়েট ভর্তি পরীক্ষা ২০২৩-২০২৪
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item active" style="width: 370px; margin-right: 30px;">
                                    <div class="item">
                                        <div data-aos="fade-up-right" class="thumb aos-init">
                                            <div class="thumb">
                                                <iframe width="100%" height="180"
                                                    src="./Home __ Dhaka University_files/7fkmhigF4Ec(1).html"
                                                    frameborder="0" allowfullscreen=""></iframe>
                                            </div>
                                            <div style="font-size: 14px;text-align:justify;color:blue;">ঢাকা
                                                বিশ্ববিদ্যালয় আন্ডারগ্র্যাজুয়েট ভর্তি পরীক্ষা ২০২৩-২০২৪ | চারুকলা ইউনিট
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item active" style="width: 370px; margin-right: 30px;">
                                    <div class="item">
                                        <div data-aos="fade-up-right" class="thumb aos-init">
                                            <div class="thumb">
                                                <iframe width="100%" height="180"
                                                    src="./Home __ Dhaka University_files/9CEeMhmCqQ0(1).html"
                                                    frameborder="0" allowfullscreen=""></iframe>
                                            </div>
                                            <div style="font-size: 14px;text-align:justify;color:blue;">ঢাকা
                                                বিশ্ববিদ্যালয় আন্ডারগ্র্যাজুয়েট ভর্তি পরীক্ষা ২০২৩-২০২৪ | ব্যবসায় শিক্ষা
                                                ইউনিট</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item cloned" style="width: 370px; margin-right: 30px;">
                                    <div class="item">
                                        <div data-aos="fade-up-right" class="thumb aos-init">
                                            <div class="thumb">
                                                <iframe width="100%" height="180"
                                                    src="./Home __ Dhaka University_files/eK2zoQw79t8(1).html"
                                                    frameborder="0" allowfullscreen=""></iframe>
                                            </div>
                                            <div style="font-size: 14px;text-align:justify;color:blue;">Dhaka University
                                                IT Society | SPACEVERSE 1.0 Fest</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item cloned" style="width: 370px; margin-right: 30px;">
                                    <div class="item">
                                        <div data-aos="fade-up-right" class="thumb aos-init">
                                            <div class="thumb">
                                                <iframe width="100%" height="180"
                                                    src="./Home __ Dhaka University_files/WY-scMDBRx0(2).html"
                                                    frameborder="0" allowfullscreen=""></iframe>
                                            </div>
                                            <div style="font-size: 14px;text-align:justify;color:blue;">ঢাকা
                                                বিশ্ববিদ্যালয় বিজ্ঞান ইউনিট আন্ডারগ্র্যাজুয়েট ভর্তি পরীক্ষা ২০২৩-২০২৪
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item cloned" style="width: 370px; margin-right: 30px;">
                                    <div class="item">
                                        <div data-aos="fade-up-right" class="thumb aos-init">
                                            <div class="thumb">
                                                <iframe width="100%" height="180"
                                                    src="./Home __ Dhaka University_files/7fkmhigF4Ec(2).html"
                                                    frameborder="0" allowfullscreen=""></iframe>
                                            </div>
                                            <div style="font-size: 14px;text-align:justify;color:blue;">ঢাকা
                                                বিশ্ববিদ্যালয় আন্ডারগ্র্যাজুয়েট ভর্তি পরীক্ষা ২০২৩-২০২৪ | চারুকলা ইউনিট
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="owl-nav disabled">
                            <div class="owl-prev"><i class="fa fa-angle-left"></i></div>
                            <div class="owl-next"><i class="fa fa-angle-right"></i></div>
                        </div>
                        <div class="owl-dots">
                            <div class="owl-dot active"><span></span></div>
                            <div class="owl-dot"><span></span></div>
                        </div>
                    </div>
                    <div class="more-btn col-md-12 text-center" style="padding-top: 20px">
                        <a target="_blank" href="https://www.youtube.com/channel/UCp_Zue-1sFaTuZvhxUoKpGQ"
                            class="btn btn-theme effect btn-md">View All</a>
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
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h4 class="modal-title">University of Dhaka</h4>
                    </div>
                    <div class="modal-body">
                        <iframe width="100%" height="500" src="./Home __ Dhaka University_files/-R3klF_td0c.html"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen=""></iframe>
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
                                                        <td><img src="{{ asset('upload/apa_category/' . @$apa->image) }}" width="130px">
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