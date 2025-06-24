<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="{{ asset('frontend/assets/img/bup/logo.png') }}" />
    <title>Bangladesh University of Professionals| @yield('title')</title>

    <link rel="stylesheet" href="{{ asset('frontend/css/main.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/owl_carousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/owl_carousel/css/owl.theme.default.min.css') }}">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
    <!--bootstrap-icons cdn-->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.2/font/bootstrap-icons.min.css"
        integrity="sha512-YFENbnqHbCRmJt5d+9lHimyEMt8LKSNTMLSaHjvsclnZGICeY/0KYEeiHwD1Ux4Tcao0h60tdcMv+0GljvWyHg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-2.2.4.js"></script>
</head>

<body>
    {{-- @include('frontend.preloader') --}}
    <!-- Top Bar -->
    {{-- <section id="topbar" class="d-flex justify-content-center align-items-center bg-success d-none d-md-block">
  <div class=" container topbar py-2 text-end">
   <a href="#">DSpace</a>
   <a href="#">Library</a>
   <a href="#">Payment Procedure</a>
   <a href="#">Faculty Members</a>
   <a href="#">Degree Verification</a>
   <a href="#">Important Contact</a>
   <a href="#">Apply Online</a>
  </div>
 </section> --}}

    {{-- @include('frontend.partials.topbar') --}}
    <div class="header">
        <div class="fixed-top">
            <!-- Top Bar -->
            <section id="topbar" class="d-flex justify-content-center align-items-center d-none d-md-block">
                <div class="topbar text-end container-fluid">
                    <a href="{{ route('iqac_faq') }}">FAQ</a>
                    <a href="{{ route('iqac_document') }}">Downloads</a>
                    <a href="{{ route('iqac_contact') }}">Contact</a>
                </div>
            </section>
            <div id="main-menu">
                <section class="d-none d-lg-block" style="background: #253b80 !important;">
                    <div class="container d-flex justify-content-start align-items-center ">
                        @if (@$bupLogo)
                            <a class="" href="{{ route('index') }}">
                                <img src="{{ asset('upload/logo/' . $bupLogo->image) }}" alt="Logo"
                                    class="" style="width: 60px;" />
                            </a>
                        @else
                            <a href="{{ route('index') }}">
                                <img src="{{ asset('frontend/assets/img/bup/logo.svg') }}" alt="Logo"
                                    style="width: 60px;">
                            </a>
                        @endif

                        <div class="py-3">
                            <h1 class="text-white text-uppercase fs-4 fw-bold mb-0 mx-2">
                                Institutional Quality Assurance Cell (iqac)<br>
                            </h1>
                            <p class="text-white mx-2 fs-6 mb-0">BANGLADESH UNIVERSITY OF PROFESSIONALS</p>
                        </div>
                    </div>
                </section>
                <!-- Navbar -->
                <nav id="in-menu" class="navbar navbar-expand-lg navbar-dark bg-light shadow py-0">
                    <div class="container-fluid">
                        <div class="logo d-flex align-items-center">
                            <a href="{{ route('index') }}" class="navbar-brand me-0 d-none iqac-logo">
                                <img src="{{ asset('frontend/assets/img/bup/logo.svg') }}" alt="Logo"
                                    class="d-inline-block" />
                            </a>
                            <a class="d-flex align-items-center d-none iqac-logo-text" href="#"
                                style="word-wrap: break-word; width:270px;">
                                <span class="text-secondary text-uppercase fs-6 fw-bold mb-0">Institute of Quality
                                    Assurance Cell - IQAC</span>
                            </a>
                        </div>
                        {{-- <a class="navbar-brand " href="#">
                            <img src="{{ asset('frontend/assets/img/bup/logo.png') }}" alt="Logo"
                                class="d-sm-block d-lg-none" />
                        </a> --}}
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation" style="background: #16501d;">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-center py-2" id="navbarSupportedContent">
                            <ul class="navbar-nav  mb-2 mb-lg-0 text-sm-center">
                                {{-- <li class="nav-item">
                        <a class="nav-link text-uppercase" aria-current="page" href="{{route('index')}}">Home</a>
                        </li> --}}
                                <li class="nav-item me-3">
                                    <a class="nav-link text-dark @if (session()->get('active') == 'about') active @endif "
                                        href="{{ route('iqac') }}">Home</a>
                                </li>

                                <li class="nav-item me-3">
                                    <a class="nav-link text-dark @if (session()->get('active') == 'committee') active @endif "
                                        href="{{ route('iqac_committee') }}">Committee</a>
                                </li>

                                <li class="nav-item me-3">
                                    <a class="nav-link text-dark @if (session()->get('active') == 'team') active @endif "
                                        href="{{ route('iqac_team') }}">Team</a>
                                </li>

                                <li class="nav-item me-3">
                                    <a class="nav-link text-dark @if (session()->get('active') == 'training_workshop') active @endif"
                                        href="{{ route('iqac_training_workshop') }}">Training & Workshops</a>
                                </li>

                                <li class="nav-item me-3">
                                    <a class="nav-link text-dark @if (session()->get('active') == 'document') active @endif"
                                        href="{{ route('iqac_document') }}">Downloads</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link @if (session()->get('active') == 'news_event') active @endif text-uppercase"
                                        href="{{ route('iqac_news_event') }}">News & Event</a>
                                </li> --}}
                                {{-- <li class="nav-item">
                                    <a class="nav-link @if (session()->get('active') == 'faq') active @endif text-uppercase"
                                        href="{{ route('iqac_faq') }}">FAQ</a>
                                </li> --}}
                                <li class="nav-item me-3">
                                    <a class="nav-link text-dark @if (session()->get('active') == 'gallery') active @endif"
                                        href="{{ route('iqac_gallery') }}">Gallery</a>
                                </li>
                                <li class="nav-item me-3">
                                    <a class="nav-link text-dark @if (session()->get('active') == 'contact') active @endif"
                                        href="{{ route('iqac_contact') }}">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

            </div>
        </div>
    </div>

    @yield('content')


    @include('frontend.partials.footer')


    <script src="{{ asset('frontend/assets/owl_carousel/js/owl.carousel.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>

    <script>
        $('.researchCarousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: false,
            autoplay: true,
            autoPlaySpeed: 5000,
            autoPlayTimeout: 5000,
            autoplayHoverPause: true,
            navText: ["<div class='nav-btn prev-slide' style='top: 50% !important;'></div>",
                "<div class='nav-btn next-slide' style='top: 50% !important;'></div>"
            ],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 3
                }
            }
        });
    </script>
    <script>
        $(window).scroll(function() {
            var scroll = $(window).scrollTop();
            var height = $('#topbar').innerHeight();


            if (scroll >= 15) {
                // console.log('object');
                // $("header").addClass("fixed-top");
                $('#topbar').addClass('hide');
                $('#main-menu').removeClass('bg-secondary');
                $('#main-menu').css('margin-top', '-' + height + 'px');

            } else {
                // $("header").removeClass("fixed-top");
                $('#topbar').removeClass('hide');
                $('#main-menu').addClass('bg-secondary');
                $('#main-menu').css('margin-top', '-' + 0 + 'px');
            }
            // Show button after 100px
            var showAfter = 100;
            if ($(this).scrollTop() > showAfter) {
                $('.back-to-top').fadeIn();
            } else {
                $('.back-to-top').fadeOut();
            }
        });
    </script>
</body>

</html>
