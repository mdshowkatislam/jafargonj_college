<style>
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 160px;
        overflow: auto;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content a {
        pointer-events: auto;
        cursor: pointer;
    }

    .show {
        display: block;
    }

    .custom-nav-title {
        font-family: "Titillium Web", sans-serif;
        font-weight: 600;
        color: #00172b;
    }

    .custom-sub-menu {
        font-weight: 600;
        text-transform: uppercase;
        font-family: "Titillium Web", sans-serif;
        font-size: 14px;
        color: #428bca !important;
    }

    .custom-child-menu {
        font-weight: 500;
        font-family: "Titillium Web", sans-serif;
    }

    .search-container {
        position: relative;
    }

    .search-box {
        display: none;
        position: absolute;
        top: 100%;
        right: 0;
        background-color: white;
        border: 1px solid #ddd;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 10px;
        z-index: 10;
    }

    .search-box input {
        width: 250px;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .logo-responsive {
        height: 80px;
    }

    .mobile-menu {
        display: none;
    }

    @media only screen and (min-width:200px) and (max-width:979px) {
        .logo-responsive {
            height: 50px;
        }

        #main-nav li {
            padding: 3px 20px;
        }

        .desktop-menu {
            display: none;
        }

        .mobile-menu {
            display: block;
        }
    }
</style>

<div class="top-bar-area text-light desktop-menu"
    style="{{ @$design->css_preview_top }}">
    <div class="container">
        <div class="col-md-12 link text-end">
            <ul class="list-inline">
                <li>
                    <a href="/career" style="margin-left: 10px; font-size:12px">
                        Career
                    </a>
                    <a href="/contact" style="margin-left: 10px; font-size:12px">
                        Contact
                    </a>
                    <a href="/noc" style="margin-left: 10px; font-size:12px">
                        NOC
                    </a>
                    <a href="/downloads" style="margin-left: 10px; font-size:12px">
                        Download
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- ============= Desktop Desive ============== -->

<nav style="height: 90px; z-index:99;" id="navbar_top" class="desktop-menu navbar navbar-expand-lg navbar-dark bg-light">
    <div class="container" style="justify-content: none !important;">

        @php
        $logoNav = DB::table('logos')->where('type_id', 1)->first();
        $logoNavFixed = DB::table('logos')->where('type_id', 2)->first();
        @endphp

        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('upload/logo/' . @$logoNav->image) }}" class="logo logo-display logo-responsive" alt="{{ $logoNav->name }}">
            <img src="{{ asset('upload/logo/' . @$logoNavFixed->image) }}" class="logo logo-scrolled" alt="Logo" style="height: 70px; width: 225px; display: none;">
        </a>
        {{--
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#main_nav_butex"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> --}}

        <div class="collapse navbar-collapse" id="main_nav_butex">
            <ul id="main-nav" class="navbar-nav ms-auto">
                <?php $parents = DB::table('frontend_menus')
                    ->where('parent_id', operator: '0')
                    ->where('status', operator: 1)
                    ->whereIn('title_en', ['About', 'Academics', 'Administrator', 'Students', 'Research', 'Links'])
                    ->orderBy('sort_order', 'asc')
                    ->pluck('rand_id', 'title_en')
                    ->toArray();
                ?>

                {{-- @dd($parents)  --}}
                {{-- @if (count($parents) != 0)  --}}

                <li class="nav-item dropdown has-megamenu">
                    <a class="nav-link dropdown-toggle custom-nav-title custom-font-titillium-web dropbtn"
                        data-dropdown-id="1" href="#" data-bs-toggle="dropdown">ABOUT</a>
                    <div class="megamenu dropdown-content" id="myDropdown1" role="menu">
                        <div class="row g-2">
                            <?php $fmenu = DB::table('frontend_menus')
                                ->where('parent_id', $parents['About'])
                                ->where('status', 1)
                                ->orderBy('sort_order', 'asc')
                                ->get(); ?>

                            @if (count($fmenu) != 0)
                                @foreach ($fmenu as $item)
                                    <div class="col-lg-4 col-6">
                                        <div class="col-megamenu">
                                            <span class="title custom-sub-menu p-2">
                                                {{ $item->title_en }}
                                            </span>

                                            <?php $submenu = DB::table('frontend_menus')
                                                ->where('parent_id', $item->rand_id)
                                                ->where('status', 1)
                                                ->orderBy('sort_order', 'asc')
                                                ->get(); ?>

                                            @include('frontend.layouts.scrool-top-menu-include-submenu')

                                        </div>
                                    </div>
                                @endforeach
                            @endif

                        </div>
                    </div>
                    {{-- ===============  --}}
                </li>

                <li class="nav-item dropdown has-megamenu">
                    <a class="nav-link dropdown-toggle custom-nav-title custom-font-titillium-web dropbtn" data-dropdown-id="2" href="#" data-bs-toggle="dropdown">ACADEMICS</a>
                    <div class="megamenu dropdown-content" id="myDropdown2" role="menu">
                        <div class="row g-2">

                            <?php $fmenu = DB::table('frontend_menus')
                                ->where('parent_id', $parents['Academics'])
                                ->where('status', 1)
                                ->orderBy('sort_order', 'asc')
                                ->get(); ?>
                            @if (count($fmenu) != 0)
                            @foreach ($fmenu as $item)
                            <div class="col-lg-4 col-6">
                                <div class="col-megamenu">
                                    {{-- <span class="title custom-sub-menu p-2">ABOUT UNIVERSITY</span>  --}}
                                    <span class="title custom-sub-menu p-2">
                                        {{ $item->title_en }}
                                    </span>

                                    <?php $submenu = DB::table('frontend_menus')
                                        ->where('parent_id', $item->rand_id)
                                        ->where('status', 1)
                                        ->orderBy('sort_order', 'asc')
                                        ->get(); ?>
                                    {{-- @dd($submenu)  --}}

                                    @include('frontend.layouts.scrool-top-menu-include-submenu')

                                </div>
                            </div>
                            @endforeach
                            @endif

                        </div>
                    </div>
                    {{-- ===============  --}}
                </li>

                <li class="nav-item dropdown has-megamenu">
                    <a class="nav-link dropdown-toggle custom-nav-title custom-font-titillium-web dropbtn" data-dropdown-id="3" href="#" data-bs-toggle="dropdown">ADMINISTRATOR</a>
                    <div class="megamenu dropdown-content" id="myDropdown3" role="menu">
                        <div class="row g-2">
                            <?php $fmenu = DB::table('frontend_menus')
                                ->where('parent_id', $parents['Administrator'])
                                ->where('status', 1)
                                ->orderBy('sort_order', 'asc')
                                ->get(); ?>
                            @if (count($fmenu) != 0)
                            @foreach ($fmenu as $item)
                            <div class="col-lg-4 col-6">
                                <div class="col-megamenu">
                                    {{-- <span class="title custom-sub-menu p-2">ABOUT UNIVERSITY</span>  --}}
                                    <span class="title custom-sub-menu p-2">
                                        {{ $item->title_en }}
                                    </span>

                                    <?php $submenu = DB::table('frontend_menus')
                                        ->where('parent_id', $item->rand_id)
                                        ->where('status', 1)
                                        ->orderBy('sort_order', 'asc')
                                        ->get(); ?>
                                    {{-- @dd($submenu)  --}}

                                    @include('frontend.layouts.scrool-top-menu-include-submenu')

                                </div>
                            </div>
                            @endforeach
                            @endif

                        </div>
                    </div>
                    {{-- ===============  --}}
                </li>


                <li class="nav-item dropdown has-megamenu">
                    <a class="nav-link dropdown-toggle custom-nav-title custom-font-titillium-web dropbtn" data-dropdown-id="4" href="#" data-bs-toggle="dropdown">STUDENTS</a>
                    <div class="megamenu dropdown-content" id="myDropdown4" role="menu">
                        <div class="row g-2">
                            <?php $fmenu = DB::table('frontend_menus')
                                ->where('parent_id', $parents['Students'])
                                ->where('status', 1)
                                ->orderBy('sort_order', 'asc')
                                ->get(); ?>
                            @if (count($fmenu) != 0)
                            @foreach ($fmenu as $item)
                            <div class="col-lg-4 col-6">
                                <div class="col-megamenu">
                                    {{-- <span class="title custom-sub-menu p-2">ABOUT UNIVERSITY</span>  --}}
                                    <span class="title custom-sub-menu p-2">
                                        {{ $item->title_en }}
                                    </span>

                                    <?php $submenu = DB::table('frontend_menus')
                                        ->where('parent_id', $item->rand_id)
                                        ->where('status', 1)
                                        ->orderBy('sort_order', 'asc')
                                        ->get(); ?>
                                    {{-- @dd($submenu)  --}}

                                    @include('frontend.layouts.scrool-top-menu-include-submenu')

                                </div>
                            </div>
                            @endforeach
                            @endif

                        </div>
                    </div>
                    {{-- ===============  --}}
                    <!-- dropdown-mega-menu.// -->
                </li>

                <li class="nav-item dropdown has-megamenu">
                    <a class="nav-link dropdown-toggle custom-nav-title custom-font-titillium-web dropbtn" data-dropdown-id="5" href="#" data-bs-toggle="dropdown">RESEARCH</a>
                    <div class="megamenu dropdown-content" id="myDropdown5" style="width: 350px; margin-left: 60%;" role="menu">
                        <div class="row g-2">
                            <?php $fmenu = DB::table('frontend_menus')
                                ->where('parent_id', $parents['Research'])
                                ->where('status', 1)
                                ->orderBy('sort_order', 'asc')
                                ->get(); ?>
                            @if (count($fmenu) != 0)
                            <div class="col-lg-12 col-sm-12">
                                <div class="col-megamenu">
                                    @include('frontend.layouts.scrool-top-menu-include')
                                </div> <!-- col-megamenu.// -->
                            </div><!-- end col-3 -->
                            @endif
                        </div><!-- end row -->
                    </div> <!-- dropdown-mega-menu.// -->
                </li>

                <li class="nav-item dropdown has-megamenu">
                    <a class="nav-link dropdown-toggle custom-nav-title custom-font-titillium-web dropbtn" data-dropdown-id="6" href="#" data-bs-toggle="dropdown">LINKS</a>
                    <div class="megamenu dropdown-content" id="myDropdown6" style="width: 350px; margin-left: 60%;" role="menu">
                        <div class="row g-2">
                            <?php $fmenu = DB::table('frontend_menus')
                                ->where('parent_id', $parents['Links'])
                                ->where('status', 1)
                                ->orderBy('sort_order', 'asc')
                                ->get();
                            ?>
                            @if (count($fmenu) != 0)
                            <div class="col-lg-12 col-sm-12">
                                <div class="col-megamenu">
                                    @include('frontend.layouts.scrool-top-menu-include')
                                </div> <!-- col-megamenu.// -->
                            </div><!-- end col-3 -->
                            @endif
                        </div><!-- end row -->
                    </div> <!-- dropdown-mega-menu.// -->
                </li>

                <li>
                    <div class="search-icon-style" class="search-container">
                        <div id="toggleFormButton" onclick="toggleSearchBox()" class="btn search_icon-color search-icon">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>

                        <div class="search-box" id="searchBox" style="display: none;">
                            <form method="GET" action="{{ url('/news-event-notice-filter') }}">
                                @csrf
                                <!-- <input type="hidden" name="type" value="3"> -->
                                <input type="hidden" name="fromDate" value="">
                                <input type="hidden" name="toDate" value="">
                                <input type="text" name="title" placeholder="Search...">
                            </form>
                        </div>

                        <div class="bg-white top-search">
                            <form id="myForm" class="mt-3 py-3" style="display: none;">
                                <div class="d-flex justify-content-center gap-2">
                                    <div class="form-check">
                                        <input class="form-check-input"
                                            type="radio"
                                            name="flexRadioDefault"
                                            id="flexRadioDefault1">
                                        <label class="form-check-label text-white"
                                            for="flexRadioDefault1">
                                            Web
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input"
                                            type="radio"
                                            name="flexRadioDefault"
                                            id="flexRadioDefault2"
                                            checked>
                                        <label class="form-check-label text-white"
                                            for="flexRadioDefault2">
                                            People
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3 mx-4">
                                    <div class="search position-relative mb-3 mt-1">
                                        <input class="search_input" type="text" placeholder="search" name="">
                                        <a href="#" class="search_icon" style="margin-left: -1.5rem;"><i class="fa-solid fa-magnifying-glass"></i></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </li>
            </ul>

        </div> <!-- navbar-collapse.// -->
    </div> <!-- container-fluid.// -->
</nav>
<!-- ============= Desktop Desive end ============== -->

<!-- ============= Mobile Desive ============== -->
<nav style="height: 90px;" id="navbar_top" class="mobile-menu navbar navbar-expand-lg navbar-dark bg-light">
    <div class="container-fluid" style="justify-content: none !important;">

        @php
        $logoNav = DB::table('logos')->where('type_id', 1)->first();
        $logoNavFixed = DB::table('logos')->where('type_id', 2)->first();
        @endphp

        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('upload/logo/' . @$logoNav->image) }}" class="logo logo-display logo-responsive" alt="{{ $logoNav->name }}">
            <img src="{{ asset('upload/logo/' . @$logoNavFixed->image) }}" class="logo logo-scrolled" alt="Logo" style="height: 70px; width: 225px; display: none;">
        </a>

        <button class="navbar-toggler"
            style="background-color: #40b2b2;"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#main_nav_butex"
            aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <?php $parents = DB::table('frontend_menus')
            ->where('parent_id', '0')
            ->where('status', 1)
            ->whereIn('title_en', ['About', 'Academics', 'Administrator', 'Students', 'Research', 'Links'])
            ->orderBy('sort_order', 'asc')
            ->pluck('rand_id', 'title_en')
            ->toArray();
        ?>

        <div class="collapse navbar-collapse" id="main_nav_butex">
            <div class="container-fluid mt-1">
                <div class="accordion" id="accordionMenu">
                    {{-- start about menu --}}
                    <div class="accordion-item" style="border: none;">
                        <div class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne"
                                style="border-bottom: 1px solid rgb(97, 97, 97); background: white;">
                                <span class="custom-sub-menu custom-font-titillium-web" style="color:black !important; font-size: 20px;">
                                    ABOUT
                                </span>
                            </button>
                        </div>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionMenu">
                            <div class="accordion-body">
                                <div class="accordion" id="subMenu1">
                                    <div class="accordion-item" style="border: none;">
                                        <?php $fmenu = DB::table('frontend_menus')
                                            ->where('parent_id', $parents['About'])
                                            ->where('status', 1)
                                            ->orderBy('sort_order', 'asc')
                                            ->get();
                                        ?>
                                        @if (count($fmenu) != 0)
                                        @foreach ($fmenu as $item)
                                        <div class="accordion-header" id="headingOneSub1{{ $item->id }}">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOneSub1{{ $item->id }}" aria-expanded="false" aria-controls="collapseOneSub1{{ $item->id }}"
                                                style="border-bottom: 1px solid #717070; background: white;">
                                                <span class="custom-sub-menu" style="color:black !important; font-size: 18px;">
                                                    {{ $item->title_en }}
                                                </span>
                                            </button>
                                        </div>

                                        <?php $submenu = DB::table('frontend_menus')
                                            ->where('parent_id', $item->rand_id)
                                            ->where('status', 1)
                                            ->orderBy('sort_order', 'asc')
                                            ->get();
                                        ?>

                                        <div id="collapseOneSub1{{ $item->id }}" class="accordion-collapse collapse" aria-labelledby="headingOneSub1{{ $item->id }}" data-bs-parent="#subMenu1">
                                            <div class="accordion-body">
                                                @include('frontend.layouts.scrool-top-menu-include-submenu')
                                            </div>
                                        </div>

                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end about menu --}}

                    {{-- start academic menu --}}
                    <div class="accordion-item" style="border: none;">
                        <div class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"
                                style="border-bottom: 1px solid rgb(97, 97, 97); background: white;">
                                <span class="custom-sub-menu custom-font-titillium-web" style="color:black !important; font-size: 20px;">
                                    ACADEMICS
                                </span>
                            </button>
                        </div>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionMenu">
                            <div class="accordion-body">
                                <div class="accordion" id="subMenu2">
                                    <div class="accordion-item" style="border: none;">
                                        <?php $fmenu = DB::table('frontend_menus')
                                            ->where('parent_id', $parents['Academics'])
                                            ->where('status', 1)
                                            ->orderBy('sort_order', 'asc')
                                            ->get();
                                        ?>
                                        @if (count($fmenu) != 0)
                                        @foreach ($fmenu as $item)
                                        <div class="accordion-header" id="headingOneSub2{{ $item->id }}">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOneSub2{{ $item->id }}" aria-expanded="false" aria-controls="collapseOneSub2{{ $item->id }}"
                                                style="border-bottom: 1px solid #717070; background: white;">
                                                <span class="custom-sub-menu" style="color:black !important; font-size: 18px;">
                                                    {{ $item->title_en }}
                                                </span>
                                            </button>
                                        </div>

                                        <?php $submenu = DB::table('frontend_menus')
                                            ->where('parent_id', $item->rand_id)
                                            ->where('status', 1)
                                            ->orderBy('sort_order', 'asc')
                                            ->get();
                                        ?>

                                        <div id="collapseOneSub2{{ $item->id }}" class="accordion-collapse collapse" aria-labelledby="headingOneSub2{{ $item->id }}" data-bs-parent="#subMenu2">
                                            <div class="accordion-body">
                                                @include('frontend.layouts.scrool-top-menu-include-submenu')
                                            </div>
                                        </div>

                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end academic menu --}}

                    {{-- start administration menu --}}
                    <div class="accordion-item" style="border: none;">
                        <div class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"
                                style="border-bottom: 1px solid rgb(97, 97, 97); background: white;">
                                <span class="custom-sub-menu custom-font-titillium-web" style="color:black !important; font-size: 20px;">
                                    ADMINISTRATOR
                                </span>
                            </button>
                        </div>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionMenu">
                            <div class="accordion-body">
                                <div class="accordion" id="subMenu3">
                                    <div class="accordion-item" style="border: none;">
                                        <?php $fmenu = DB::table('frontend_menus')
                                            ->where('parent_id', $parents['Administrator'])
                                            ->where('status', 1)
                                            ->orderBy('sort_order', 'asc')
                                            ->get();
                                        ?>
                                        @if (count($fmenu) != 0)
                                        @foreach ($fmenu as $item)
                                        <div class="accordion-header" id="headingOneSub3{{ $item->id }}">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOneSub3{{ $item->id }}" aria-expanded="false" aria-controls="collapseOneSub3{{ $item->id }}"
                                                style="border-bottom: 1px solid #717070; background: white;">
                                                <span class="custom-sub-menu" style="color:black !important; font-size: 18px;">
                                                    {{ $item->title_en }}
                                                </span>
                                            </button>
                                        </div>

                                        <?php $submenu = DB::table('frontend_menus')
                                            ->where('parent_id', $item->rand_id)
                                            ->where('status', 1)
                                            ->orderBy('sort_order', 'asc')
                                            ->get();
                                        ?>

                                        <div id="collapseOneSub3{{ $item->id }}" class="accordion-collapse collapse" aria-labelledby="headingOneSub3{{ $item->id }}" data-bs-parent="#subMenu3">
                                            <div class="accordion-body">
                                                @include('frontend.layouts.scrool-top-menu-include-submenu')
                                            </div>
                                        </div>

                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end administration menu --}}

                    {{-- start student menu --}}
                    <div class="accordion-item" style="border: none;">
                        <div class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour"
                                style="border-bottom: 1px solid rgb(97, 97, 97); background: white;">
                                <span class="custom-sub-menu custom-font-titillium-web" style="color:black !important; font-size: 20px;">
                                    STUDENTS
                                </span>
                            </button>
                        </div>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionMenu">
                            <div class="accordion-body">
                                <div class="accordion" id="subMenu4">
                                    <div class="accordion-item" style="border: none;">
                                        <?php $fmenu = DB::table('frontend_menus')
                                            ->where('parent_id', $parents['Students'])
                                            ->where('status', 1)
                                            ->orderBy('sort_order', 'asc')
                                            ->get();
                                        ?>
                                        @if (count($fmenu) != 0)
                                        @foreach ($fmenu as $item)
                                        <div class="accordion-header" id="headingOneSub4{{ $item->id }}">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOneSub4{{ $item->id }}" aria-expanded="false" aria-controls="collapseOneSub4{{ $item->id }}"
                                                style="border-bottom: 1px solid #717070; background: white;">
                                                <span class="custom-sub-menu" style="color:black !important; font-size: 18px;">
                                                    {{ $item->title_en }}
                                                </span>
                                            </button>
                                        </div>

                                        <?php $submenu = DB::table('frontend_menus')
                                            ->where('parent_id', $item->rand_id)
                                            ->where('status', 1)
                                            ->orderBy('sort_order', 'asc')
                                            ->get();
                                        ?>

                                        <div id="collapseOneSub4{{ $item->id }}" class="accordion-collapse collapse" aria-labelledby="headingOneSub4{{ $item->id }}" data-bs-parent="#subMenu4">
                                            <div class="accordion-body">
                                                @include('frontend.layouts.scrool-top-menu-include-submenu')
                                            </div>
                                        </div>

                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end student menu --}}

                    {{-- start research menu --}}
                    <div class="accordion-item" style="border: none;">
                        <div class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive"
                                style="border-bottom: 1px solid rgb(97, 97, 97); background: white;">
                                <span class="custom-sub-menu custom-font-titillium-web" style="color:black !important; font-size: 20px;">
                                    RESEARCH
                                </span>
                            </button>
                        </div>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionMenu">
                            <div class="accordion-body">
                                <div class="accordion" id="subMenu5">
                                    <div class="accordion-item" style="border: none;">
                                        <?php $fmenu = DB::table('frontend_menus')
                                            ->where('parent_id', $parents['Research'])
                                            ->where('status', 1)
                                            ->orderBy('sort_order', 'asc')
                                            ->get();
                                        ?>
                                        @if (count($fmenu) != 0)
                                            @include('frontend.layouts.scrool-top-menu-include')
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end research menu --}}

                    {{-- start link menu --}}
                    <div class="accordion-item" style="border: none;">
                        <div class="accordion-header" id="headingSix">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix"
                                style="border-bottom: 1px solid rgb(97, 97, 97); background: white;">
                                <span class="custom-sub-menu custom-font-titillium-web" style="color:black !important; font-size: 20px;">
                                    LINKS
                                </span>
                            </button>
                        </div>

                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionMenu">
                            <div class="accordion-body">
                                <div class="accordion" id="subMenu6">
                                    <div class="accordion-item" style="border: none;">
                                        <?php $fmenu = DB::table('frontend_menus')
                                            ->where('parent_id', $parents['Links'])
                                            ->where('status', 1)
                                            ->orderBy('sort_order', 'asc')
                                            ->get();
                                        ?>
                                        @if (count($fmenu) != 0)
                                            @include('frontend.layouts.scrool-top-menu-include')
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end link menu --}}

                </div>
            </div>
        </div>

    </div>
</nav>
<!-- ============= Mobile Desive End ============== -->

@push('scripts')

<script type="text/javascript">
    $(document).ready(function() {
        // Toggle dropdown visibility
        $(".dropbtn").click(function(event) {
            event.preventDefault();
            event.stopPropagation();

            var dropdownId = $(this).data("dropdown-id");
            //  console.log('Dropdown ID:', dropdownId); // Debugging statement

            var dropdown = document.getElementById("myDropdown" + dropdownId);
            if (dropdown) {
                dropdown.classList.toggle("show");
            } else {
                console.error('Dropdown element not found for ID:', dropdownId);
            }

            $(".dropdown-content").not(dropdown).removeClass("show");
        });

        // Close dropdowns when clicking outside
        $(window).click(function(event) {
            if (!$(event.target).closest('.dropbtn, .dropdown-content').length) {
                $(".dropdown-content").removeClass("show");
            }
        });

        // Ensure inner links work properly using event delegation
        $(".dropdown-content").on("click", "a", function(event) {
            event.stopPropagation(); // Ensure event doesn't bubble up to close the dropdown
            //  console.log('Link clicked:', $(this).attr('href'));

            // Navigate to the link's href if it exists
            if ($(this).attr('href')) {
                window.location.href = $(this).attr('href');
            }
        });
    });
</script>

@endpush

<script>
    function toggleSearchBox() {
        const searchBox = document.getElementById('searchBox');
        if (searchBox.style.display === 'block') {
            searchBox.style.display = 'none';
        } else {
            searchBox.style.display = 'block';
        }
    }

    // Close the searchBox if clicked outside
    document.addEventListener('click', function(event) {
        const searchBox = document.getElementById('searchBox');
        const toggleButton = document.getElementById('toggleFormButton');

        // Check if the click is outside the searchBox and toggle button
        if (searchBox.style.display === 'block' && !searchBox.contains(event.target) && !toggleButton.contains(event.target)) {
            //searchBox.style.display = 'none';
            toggleSearchBox();
        }
    });
</script>
