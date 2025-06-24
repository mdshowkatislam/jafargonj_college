@php
    $top_menus = DB::table('frontend_menus')
        ->where('menu_type_id', $club['top_menu'])
        ->select('id', 'url_link', 'title_en')
        ->get();
    $nav_menus = DB::table('frontend_menus')
        ->where('menu_type_id', $club['nav_menu'])
        ->select('id', 'url_link', 'title_en')
        ->get();
@endphp

<div class="header">
    <div class="fixed-top">
        <!-- Top Bar -->
        <section id="topbar" class="d-flex justify-content-center align-items-center d-none d-md-block" style="background: #b11a25 !important">
            <div class="topbar text-end container-fluid">
                @if (@$club->facebook)
                    <a href="{{ @$club->facebook }}"
                       target="_blank">
                        <i class="bi bi-facebook"></i>
                    </a>
                @endif
                @if (@$club->twitter)
                    <a href="{{ @$club->twitter }}"
                       target="_blank">
                        <i class="bi bi-twitter"></i>
                    </a>
                @endif
                @if (@$club->youtube)
                    <a href="{{ @$club->youtube }}"
                       target="_blank">
                        <i class="bi bi-youtube"></i>
                    </a>
                @endif
                @if (@$club->instagram)
                    <a href="{{ @$club->instagram }}"
                       target="_blank">
                        <i class="bi bi-instagram"></i>
                    </a>
                @endif
                @if (@$club->linkedin)
                    <a href="{{ @$club->linkedin }}"
                       target="_blank">
                        <i class="bi bi-linkedin"></i>
                    </a>
                @endif
                @if (@$club->email)
                    <a href="{{ @$club->email }}"
                       target="_blank">
                        <i class="bi bi-envelope"></i>
                    </a>
                @endif

                @if(count($top_menus)<=3)
                    @foreach ($top_menus as $item)
                    {{--  @dd($item->url_link)  --}}
                    <a href="{{ route('club.index',$item->url_link) }}">{{ $item->title_en }}</a>
                    @endforeach
                @endif

            </div>
        </section>

        <nav class="navbar navbar-expand-lg navbar-dark bg-light shadow py-0" id="main-menu">
            <div class="container-fluid">
                <div class="logo d-flex align-items-center">
                    <a class="navbar-brand d-flex align-items-center me-0" href="{{ route('index') }}">
                    {{-- <img style="margin-right: 0px;" src="{{ asset('frontend/assets/img/butex/bup-logo.svg') }}" alt="Logo" class="d-inline-block align-text-top" /></a> --}}
                    <img style="margin-right: 0px;" src="{{ asset('frontend/assets/img/butex/butex-logo.png') }}" alt="Logo" class="d-inline-block align-text-top"/></a>
                        <a class="navbar-brand d-flex align-items-center" href="{{ route('club.index', $club->slug) }}">
                            <span class="text-secondary text-uppercase fs-6 fw-bold mb-0">{{ @$club->name }}</span>
                        </a>

                        <button class="navbar-toggler"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent"
                                aria-controls="navbarSupportedContent"
                                aria-expanded="false"
                                style="background: #16cbd1;"
                                aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                </div>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-sm-center">
                        <li class="nav-item">
                            <a class="nav-link text-dark {{ request()->routeIs('club.index') ? 'active' : '' }}" href="{{ route('club.index', @$club->slug) }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark {{ request()->routeIs('club.about') ? 'active' : '' }}" href="{{ route('club.about', $club->slug) }}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark {{ request()->routeIs('club.committee') ? 'active' : '' }}" href="{{ route('club.committee', $club->slug) }}">Committee</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark {{ request()->routeIs('club.member') ? 'active' : '' }}" href="{{ route('club.member', $club->slug) }}">Member</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-dark {{ request()->routeIs('club.activities') ? 'active' : '' }}" href="{{ route('club.activities', $club->slug) }}">Activities</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark {{ request()->routeIs('club.gallery') ? 'active' : '' }}" href="{{ route('club.gallery', $club->slug) }}">Gallery</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('club.download') ? 'active' : '' }}" href="{{ route('club.download', $club->slug) }}">Download</a>
                        </li> --}}
                    </ul>
                </div>

            </div>
        </nav>

    </div>
</div>
