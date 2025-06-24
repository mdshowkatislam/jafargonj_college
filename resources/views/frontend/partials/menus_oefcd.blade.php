<div class="header">
    <div class="fixed-top">
        <!-- Top Bar -->
        <section id="topbar" class="d-flex align-items-center d-none d-md-block">
            <div class="container-fluid topbar text-end">
                <a href="{{ route('iqac') }}">IQAC</a>
                <a href="{{ url('http://apa.bup.edu.bd/') }}">APA</a>
                <a href="{{ route('oefcd.oefcd_faq') }}">FAQ</a>
                <a href="{{ route('oefcd.document') }}">Download</a>
                <a href="{{ route('contact') }}">Contact</a>
            </div>
        </section>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-light shadow py-0" id="main-menu">
            <div class="container-fluid">
                <div class="logo d-flex align-items-center ">
                    @if (@$bupLogo)
                        <a class="navbar-brand me-1" href="{{ route('index') }}">
                            <img src="{{ asset('upload/logo/' . $bupLogo->image) }}" alt="Logo"
                                class="d-inline-block"  />
                        </a>
                    @else
                    <a href="{{ route('index') }}" class="navbar-brand me-1">
                        <img src="{{ asset('frontend/assets/img/bup/logo.svg') }}" alt="Logo"
                            class="d-inline-block" />
                    </a>
                    @endif
                    <a class="d-flex align-items-center" href="#" style="word-wrap: break-word; width:270px;">
                        <span class="text-secondary text-uppercase fs-6 fw-bold mb-0">Office of the Evaluation, Faculty
                            & Curriculum Development (OEFCD)</span>
                    </a>
                    {{-- @include('frontend.partials.logo.bup_header')
          <a class="d-flex align-items-center" href="#" style="word-wrap: break-word; width:350px;">
            <span class="text-secondary text-uppercase fs-6 fw-bold mb-0 d-none d-sm-block">Office of the Evaluation, Faculty & Curriculum Development (OEFCD)</span>
          </a> --}}
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation" style="background: #16501d;">
                    <span class="navbar-toggler-icon"></span>
                </button>
                @php
                    $curriculum = \App\Models\Page::find(12);
                @endphp
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-sm-center">
                        <li class="nav-item">
                            <a class="nav-link text-dark {{ request()->routeIs('oefcd') ? 'active' : '' }}"
                                aria-current="page" href="{{ route('oefcd') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark {{ request()->routeIs('oefcd.faculty') ? 'active' : '' }}"
                                aria-current="page" href="{{ route('oefcd.faculty') }}">Faculty Development</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link text-dark {{ request()->routeIs('oefcd.affairs') ? 'active' : '' }}"
                                aria-current="page" href="{{ route('oefcd.affairs') }}">International Affairs</a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link text-dark {{ request()->routeIs('oefcd.curriculumn') ? 'active' : '' }}"
                                aria-current="page" href="{{ route('oefcd.curriculumn') }}">Curriculum Development</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark {{ request()->routeIs('oefcd.staff') ? 'active' : '' }}"
                                aria-current="page" href="{{ route('oefcd.staff') }}">Staff Training</a>
                        </li>
                        <li class=" nav-item">
                            <a class="nav-link text-dark {{ request()->routeIs('oefcd.oefcd_gallery') ? 'active' : '' }}"
                                aria-current="page" href="{{ route('oefcd.oefcd_gallery') }}">Gallery</a>
                        </li>
                        {{-- <li class=" nav-item">
              <a class="nav-link text-dark {{ request()->routeIs('oefcd.oefcd_faq') ? 'active' : '' }}" aria-current="page" href="{{route('oefcd.oefcd_faq')}}">FAQ</a>
            </li> --}}
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
