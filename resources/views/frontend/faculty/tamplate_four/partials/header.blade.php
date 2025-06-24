@php
    $top_menus = DB::table('frontend_menus')
        ->where('menu_type_id', $faculty['top_menu'])
        ->where('status', 1)
        ->select('id', 'url_link', 'title_en', 'url_link_type', 'parent_id', 'target', 'pages_id')
        ->get();
    $nav_menus = DB::table('frontend_menus')
        ->where('menu_type_id', $faculty['nav_menu'])
        ->where('status', 1)
        ->select('id', 'url_link', 'title_en', 'url_link_type', 'parent_id', 'target', 'pages_id')
        ->get();
    // $fec_id = request()->id;
    if(session('facult_id')){
        $fec_id = session('facult_id');
    } else {
        $fec_id = request()->id;
    }
@endphp

<div class="header">
    <div class="fixed-top">
        <!-- Top Bar -->
        <section id="topbar"
                 class="d-flex justify-content-center align-items-end d-none d-md-block"
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
                            <a href="{{ url($item->url_link) }}"  target="{{ @$item->target }}">{{ $item->title_en }}</a>
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
                    <a href="{{ route('index') }}"
                       class="navbar-brand me-0">
                        @php
                            $logoNav = DB::table('logos')->where('type_id', 3)->first();
                            $logoNavFixed = DB::table('logos')->where('type_id', 6)->first();
                        @endphp
                        <img src="{{ asset('upload/logo/' . @$logoNav->image) }}"
                             alt="Logo"
                             class="d-inline-block" />
                    </a>
                    <a class="d-flex align-items-center faculty-title"
                       href="{{ route('faculty_home', $faculty->id) }}"
                       style="word-wrap: break-word; width:300px;">
                        <span class="text-secondary text-uppercase fs-6 fw-bold mb-0">{{ $faculty->name }}</span>
                    </a>
                    {{-- @include('frontend.partials.logo.bup_header') --}}
                </div>

                <button class="navbar-toggler"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                        style="background: #16cbd1;">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-sm-center">
                      @foreach ($nav_menus as $item)
                       @if($item->url_link)
                            <li class="nav-item">
                                <a style="font-weight: bold; font-size: 14px;" class="nav-link text-dark @if (request()->routeIs($item->url_link)) active @endif"
                                    aria-current="page" href="{{ route($item->url_link, $fec_id) }}">{{ $item->title_en }}
                                </a>
                            </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link text-dark " style="font-weight: bold; font-size: 14px;"
                            aria-current="page" href="">{{ $item->title_en }}</a>
                        </li>
                    @endif
               
                  @endforeach
                    
                  </ul>
              </div>


             {{--  <div class="collapse navbar-collapse"
                     id="navbarSupportedContent">
                       <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-sm-center">
                        <li class="nav-item">
                            <a class="nav-link text-dark  @if (request()->routeIs('faculty_home')) active @endif"
                               aria-current="page"
                               href="{{ route('faculty_home', $faculty->id) }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark @if (request()->routeIs('faculty_all_faculties') || request()->routeIs('faculty_member.details')) ) active @endif "
                               href="{{ route('faculty_all_faculties', $faculty->id) }}">Faculty
                                Member</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark @if (request()->routeIs('faculty_dean_honour_board')) active @endif"
                               href="{{ route('faculty_dean_honour_board', $faculty->id) }}">Dean's
                                Honour Board</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark @if (request()->routeIs('faculty_department')) active @endif"
                               href="{{ route('faculty_department', $faculty->id) }}">Departments</a>
                        </li>

                        <li class=" nav-item">
                            <a class="nav-link text-dark @if (request()->routeIs('faculty_notice')) active @endif"
                               href="{{ route('faculty_notice', $faculty->id) }}">Notice</a>

                        </li>
                    </ul>
                 </div>  
            </div>  --}}
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