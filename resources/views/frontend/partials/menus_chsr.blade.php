<div class="header">
    <div class="fixed-top">
        <!-- Top Bar -->
        <section id="topbar" class="d-flex justify-content-center align-items-center d-none d-md-block">
            <div class=" container-fluid topbar text-end">
                <a href="{{ route('all_chsr_notice') }}">Notice</a>
                <a href="{{ route('chsr_faq') }}">FAQ</a>
                <a href="{{ route('chsr_downloads') }}">Downloads</a>
            </div>
        </section>
        <div id="main-menu">
            <section class="d-none d-lg-block" style="background-color: #002a5c;">
                <div class="container d-flex justify-content-center align-items-center ">
                    {{-- <img src="assets/img/bup/logo.png" alt="" style="width: 60px;"> --}}
                    @if (@$bupLogo)
                        <a  class="navbar-brand d-flex align-items-center"
                            href="{{ route('index') }}">
                            <img src="{{ asset('upload/logo/' . $bupLogo->image) }}"
                                alt="Logo" class="d-inline-block align-text-top" style="width: 60px;" />
                        </a>
                    @endif
                    {{-- <a class="navbar-brand d-flex align-items-center" href="{{ route('index') }}">
                        <img src="{{ asset('frontend/assets/img/bup/logo.svg') }}" style="width: 60px;"
                            alt="Logo" class="d-inline-block align-text-top" /></a> --}}
                    <div class="py-3">
                        <h1 class="text-white text-uppercase fs-4 fw-bold mb-0 mx-2 font-italic">
                            Centre for Higher Studies and Research
                        </h1>
                        <p class="text-white mx-2 fs-6 mb-0 text-center d-none d-sm-block">BANGLADESH UNIVERSITY OF
                            PROFESSIONALS</p>
                    </div>
                </div>
            </section>
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg shadow nav-bg" style="background-color: #012147;">
                <div class="container-fluid">
                    <div class="logo chsr-logo">
                        @include('frontend.partials.logo.bup_header', [
                            'logo_title' => 'Centre for Higher Studies <br/>and Research',
                            'route' => 'chsr_home',
                        ])
                    </div>
                    <button class="navbar-toggler chsr-navber" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse text-center justify-content-center"
                        id="navbarSupportedContent">
                        <ul class="navbar-nav chsr-nav text-md-center" style="color: white;">
                            <li class="nav-item">
                                <a class="nav-link text-uppercase {{ request()->routeIs('chsr_home') ? 'active' : '' }}"
                                    aria-current="page" href="{{ route('chsr_home') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase {{ request()->routeIs('chsr_about') ? 'active' : '' }}"
                                    aria-current="page" href="{{ route('chsr_about') }}">About CHSR</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase {{ request()->routeIs('chsr_mphil') ? 'active' : '' }}"
                                    href="{{ route('chsr_mphil') }}">Mphil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase {{ request()->routeIs('chsr_phd') ? 'active' : '' }}"
                                    href="{{ route('chsr_phd') }}">Phd</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase {{ request()->routeIs('chsr_research_area') ? 'active' : '' }}"
                                    href="{{ route('chsr_research_area') }}">Area of research</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link text-uppercase {{ request()->routeIs('chsr_supervisor') ? 'active' : '' }}"
                                    href="{{ route('chsr_supervisor') }}">list of supervisor</a>
                            </li> --}}
                            <li class="nav-item">
                                <a class="nav-link text-uppercase {{ request()->routeIs('chsr_people') ? 'active' : '' }}"
                                    href="{{ route('chsr_people') }}">People</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase {{ request()->routeIs('chsr_awardee') ? 'active' : '' }}"
                                    href="{{ route('chsr_awardee') }}">Awardee</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase {{ request()->routeIs('chsr_research') ? 'active' : '' }}"
                                    href="{{ route('chsr_research') }}">Research Project</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>
        </div>



    </div>
</div>
