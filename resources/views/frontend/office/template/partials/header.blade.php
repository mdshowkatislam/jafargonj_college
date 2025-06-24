@php

    $top_menus = DB::table('frontend_menus')
        ->where('menu_type_id', $office['top_menu'])
        ->where('status', 1)
        ->select('id', 'url_link', 'title_en', 'url_link_type', 'parent_id', 'target', 'pages_id')
        ->get();
    $nav_menus = DB::table('frontend_menus')
        ->where('menu_type_id', $office['nav_menu'])
        ->where('status', 1)
        ->select('id', 'url_link', 'title_en', 'url_link_type', 'parent_id', 'target', 'pages_id')
        ->get();
    $office_id = request()->id;
    //dd( $office_id);
   

@endphp

<div class="header">
    <div class="fixed-top">
        <!-- Top Bar -->
        <section id="topbar" class="d-flex justify-content-center align-items-center d-none d-md-block"
            style="background: #00c5bf !important">
            <div class="topbar text-end container pt-1">
                @foreach ($top_menus as $item)
                    @if ($item->url_link)
                        @if ($item->pages_id != null)
                  
                            <a href="{{ url('/pages/' . $item->url_link . '/' . $item->pages_id) }}" target="{{ @$item->target }}">

                                {{ $item->title_en }}
                            </a>
                        @endif

                        @if ($item->pages_id == null)
                            <a href="{{ url($item->url_link) }}" target="{{ @$item->target }}">{{ $item->title_en }}</a>
                        @endif
                    @else
                        <a href="#">{{ $item->title_en }}</a>
                    @endif
                @endforeach
            </div>
        </section>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-light shadow py-0" id="main-menu">
            <div class="container">
                <div class="logo d-flex align-items-center">
                    <a href="{{ route('index') }}" class="navbar-brand me-0">
                        @php
                        $logoNav =
                        DB::table('logos')->where('type_id',3)->first();
                        $logoNavFixed =
                        DB::table('logos')->where('type_id',7)->first();
                        @endphp
                        <img src="{{ asset('upload/logo/' . @$logoNav->image) }}" alt="Logo"
                            class="d-inline-block" />
                    </a>
                    <a class="d-flex align-items-center faculty-title"
                        href="{{ route('office_home', $office->id) }}"
                        style="word-wrap: break-word; width:300px;">
                        <span class="text-secondary text-uppercase fs-6 fw-bold mb-0">{{ $office->name }}</span>
                    </a>
                    {{-- @include('frontend.partials.logo.bup_header')
                    <a class="d-flex align-items-center" href="{{ route('department_home', $department->id) }}"
                        style="word-wrap: break-word; width:270px;">
                        <span
                            class="text-secondary text-uppercase fs-6 fw-bold mb-0 d-none d-sm-block">{{ $department->name }}</span>
                    </a> --}}
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation" style="background: #16501d;">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-sm-center">

                    @foreach ($nav_menus as $item)
                    @if ($item->url_link)
                        @if ($item->pages_id != null)
                            <li class="nav-link text-dark @if (request()->routeIs($item->url_link)) active @endif">
                                <a aria-current="page" style="font-weight: bold; font-size: 14px;"
                                   href="{{ url('/pages/' . $item->url_link . '/' . $item->pages_id) }}">

                                    {{ $item->title_en }}
                                </a>
                            </li>
                        @endif

                        @if ($item->pages_id == null)
                            <li class="nav-item">
                                <a style="font-weight: bold; font-size: 14px;" class="nav-link text-dark @if (request()->routeIs($item->url_link)) active @endif" href="{{ route($item->url_link, $office_id) }}">{{ $item->title_en }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item">
                            <a class="nav-link text-dark "
                               aria-current="page"
                               href="">{{ $item->title_en }}</a>
                        </li>
                    @endif
                @endforeach
            </ul>
                </div>

            </div>
        </nav>
    </div>
</div>


<div class="default_margin_top"></div>

<style>
    .default_margin_top {
        margin-top: 100px;
    }
    @media screen and (max-width: 768px) {
        .default_margin_top {
            margin-top: 55px;
        }
    }
</style>