@php
    $top_menus = DB::table('frontend_menus')
        ->where('menu_type_id', @$menu['top_menu'])
        ->where('status', 1)
        ->select('id', 'url_link', 'pages_id', 'url_link_type', 'parent_id', 'target', 'title_en')
        ->get();
    $nav_menus = DB::table('frontend_menus')
        ->where('menu_type_id', @$menu['nav_menu'] )
        ->where('status', 1)
        ->select('id', 'url_link', 'pages_id', 'url_link_type', 'parent_id', 'target', 'title_en')
        ->get();
   
@endphp


<div class="header">
    <div class="fixed-top">
        <!-- Top Bar -->
        <section id="topbar" class="d-flex justify-content-center align-items-center d-none d-md-block" style="{{ @$design->css_preview_top }}">

            <div class="topbar text-end container pt-1">
                @foreach ($top_menus as $item)
                     @if ($item->url_link)
                        @if ($item->pages_id != null)
                            <a href="{{ url('/conferences/' . $item->url_link . '/' . $item->pages_id) }}" target="{{ @$item->target }}">{{ $item->title_en }}</a>
                        @endif

                        @if ($item->pages_id == null)
                            @if ($item->url_link_type == 3) 
                                <a href="{{ @$item->url_link }}" target="{{ @$item->target }}">{{ $item->title_en }}</a>    
                            @else 
                                <a href="{{ url($item->url_link) }}" target="{{ @$item->target }}">{{ $item->title_en }}</a>     
                            @endif
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
                            $logoNav = DB::table('logos')->where('type_id', 3)->first();
                            $logoNavFixed = DB::table('logos')->where('type_id', 6)->first();
                        @endphp
                        <img src="{{ asset('upload/logo/' . @$logoNav->image) }}" alt="Logo" class="d-inline-block" />
                    </a>
                    <a class="d-flex align-items-center faculty-title" href="{{ url('/conferences') }}" style="word-wrap: break-word; width:300px;">
                        <span class="text-secondary text-uppercase fs-6 fw-bold mb-0">Conference</span>
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
                        
                            @if ($item->pages_id != null)
                                <li class="nav-item">
                                    <a style="font-weight: bold; font-size: 14px;" class="nav-link text-dark {{ request()->is('conferences/' . $item->url_link . '/' . $item->pages_id) ? 'active' : '' }}" href="{{ url('/conferences/' . $item->url_link . '/' . $item->pages_id) }}" target="{{ @$item->target }}">{{ $item->title_en }}</a>
                                </li>
                            @endif
  
                            @if ($item->pages_id == null)
                                @if ($item->url_link_type == 3)
                                    <li class="nav-item">
                                        <a style="font-weight: bold; font-size: 14px;" class="nav-link text-dark @if (request()->routeIs($item->url_link)) active @endif"  href="{{ @$item->url_link }}">{{ $item->title_en }}</a>
                                    </li>
                                @else 
                                    <li class="nav-item">
                                        <a style="font-weight: bold; font-size: 14px;" class="nav-link text-dark @if (request()->routeIs($item->url_link)) active @endif" href="{{ route($item->url_link) }}">{{ $item->title_en }}</a>
                                    </li>
                                @endif
                            @endif

                        @endforeach
                  </ul>
              </div>
        </nav>
    </div>
</div>

