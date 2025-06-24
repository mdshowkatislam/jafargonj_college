<div class="header">
    <div class="fixed-top">
        <!-- Top Bar -->
        <section id="topbar" class="d-flex justify-content-center align-items-center d-none d-md-block">
            <div class="topbar text-end container-fluid">
                <a href="https://webportal.bup.edu.bd/">UCAM</a>
                <a href="https://login.microsoftonline.com/">Webmail</a>
                <a href="https://admission.bup.edu.bd/">Current Admissions</a>
                <a href="{{ route('cpc.faq') }}">FAQ</a>
            </div>
        </section>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-light shadow py-0" id="main-menu">
            <div class="container-fluid">
                <div class="logo d-flex align-items-center ">
                    @if (@$bupLogo)
                        <a class="navbar-brand me-0" href="{{ route('index') }}">
                            <img src="{{ asset('upload/logo/' . $bupLogo->image) }}" alt="Logo"
                                class="d-inline-block" />
                        </a>
                    @else
                        <a href="{{ route('index') }}" class="navbar-brand me-0">
                            <img src="{{ asset('frontend/assets/img/bup/logo.svg') }}" alt="Logo"
                                class="d-inline-block" />
                        </a>
                    @endif

                    <a class="d-flex align-items-center faculty-title" href="#"
                        style="word-wrap: break-word; width:270px;">
                        <span class="text-secondary text-uppercase fs-6 fw-bold mb-0 ">Counselling & Placement Centre</span>
                    </a>
                    {{-- @include('frontend.partials.logo.bup_header') --}}
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation" style="background: #16501d;">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-sm-center align-items-center">
                        <li class="nav-item">
                            <a class="nav-link text-dark @if (request()->routeIs('cpc')) active @endif"
                                aria-current="page" href="{{ route('cpc') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark  @if (request()->routeIs('cpc.about')) active @endif"
                                aria-current="page" href="{{ route('cpc.about') }}">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark  @if (request()->routeIs('cpc.academic_counselling')) active @endif"
                                aria-current="page" href="{{ route('cpc.academic_counselling') }}">Academic
                                Counselling</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark  @if (request()->routeIs('cpc.socio_emotional')) active @endif"
                                aria-current="page" href="{{ route('cpc.socio_emotional') }}">Socio-emotional
                                Counselling</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark  @if (request()->routeIs('cpc.placement_enter')) active @endif"
                                aria-current="page" href="{{ route('cpc.placement_enter') }}">Placement Centre</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark  @if (request()->routeIs('cpc.appointment')) active @endif"
                                aria-current="page" href="{{ route('cpc.appointment') }}">Appointment Procedure</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark  @if (request()->routeIs('cpc.resources')) active @endif"
                                aria-current="page" href="{{ route('cpc.resources') }}">Resources</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark  @if (request()->routeIs('cpc.gallery')) active @endif"
                                aria-current="page" href="{{ route('cpc.gallery') }}">Image Gallery</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
