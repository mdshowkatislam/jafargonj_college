@php
    // Fetch parent menus
    $menus = DB::table('frontend_menus')
        ->select('rand_id', 'title_en')
        ->where('parent_id', '0')
        ->where('menu_type_id', '1')
        ->where('status', 1)
        ->orderBy('sort_order', 'asc')
        ->get();

    // For each parent menu, fetch its child menus and submenus
    $menusWithChildren = $menus->map(function ($menu) {
        // Fetch child menus
        $childMenus = DB::table('frontend_menus')
            ->where('parent_id', $menu->rand_id)
            ->where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->get();

        // For each child menu, fetch its submenus
        foreach ($childMenus as $child) {
            $submenus = DB::table('frontend_menus')
                ->where('parent_id', $child->rand_id)
                ->where('status', 1)
                ->orderBy('sort_order', 'asc')
                ->get();

            // Attach submenus to the child menu
            $child->submenus = $submenus;
        }

        // Attach child menus to the parent menu
        $menu->children = $childMenus;
        return $menu;
    });
@endphp

<style>
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 160px;
        /* overflow: auto; */
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
        color: #00c5bf !important;
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
        margin-right: 20px;
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

    .list-unstyled .custom-child-menu .effect:hover {
        padding-left: 10px;
        color: #00c5bf;
    }

    .top-search {
        background-color: #ffffff;
        border: medium none;
        border-radius: 10px;
        box-shadow: 0 10px 40px -15px #00C5BE;
        display: none;
        /* height: 500px; */
        position: absolute;
        right: 10px;
        top: 90px;
        z-index: 99;
        border: 1px solid #e7e7e7;
        background: linear-gradient(90deg, rgb(54, 196, 221) 0%, rgb(2, 117, 138) 49%);
        /* padding-top: 20px; */
        padding-bottom: 0px;
        width: 350px;
    }

    @media only screen and (min-width:200px) and (max-width:991px) {
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

{{-- <div class="top-bar-area text-light desktop-menu" style="{{ @$design->css_preview_top }}">
    <div class="container">
        <div class="col-md-12 link text-end">
            <ul class="list-inline">
                <li>
                    <a href="https://www.butex.edu.bd/ugp/" target="_blank" style="margin-left: 10px; font-size:12px">
                        Admission
                    </a>
                    <a href="https://old.butex.edu.bd/" target="_blank" style="margin-left: 10px; font-size:12px">
                        Old Site
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
</div> --}}

<!-- ============= Desktop Desive ============== -->
<nav style="height: 90px; z-index:99;"
     id="navbar_top"
     class="desktop-menu navbar navbar-expand-lg navbar-dark bg-light">
    <div class="container"
         style="justify-content: none !important;">

        @php
            $logoNav = DB::table('logos')->where('type_id', 1)->first();
            $logoNavFixed = DB::table('logos')->where('type_id', 2)->first();
        @endphp

        <a class="navbar-brand"
           href="{{ url('/') }}">
            <img src="{{ asset('upload/logo/' . @$logoNav->image) }}"
                 class="logo logo-display logo-responsive"
                 alt="{{ $logoNav->name }}">
            <img src="{{ asset('upload/logo/' . @$logoNavFixed->image) }}"
                 class="logo logo-scrolled"
                 alt="Logo"
                 style="height: 70px; width: 225px; display: none;">
        </a>
        <span style="color:#DD90B3"><span style="font-family:Papyrus;font-size:16px;">JMAGC</span><br>
            <span style="font-size: 15px;color:#1bcc7a">জাফরগঞ্জ মীর আব্দুল
                গফুর কলেজ</span><br>
            <span>Jafargonj Mir Abdul Gafur College</span></span>

        <div class="collapse navbar-collapse"
             id="main_nav_butex">
            <ul id="main-nav"
                class="navbar-nav ms-auto">
                @if (count($menus) != 0)
                    @php $count = 0; @endphp
                    @foreach ($menus as $menu)
                        @php $count++; @endphp
                        <li class="nav-item dropdown has-megamenu">
                            <a onclick="toggleSearchBoxClose()"
                               class="nav-link dropdown-toggle custom-nav-title custom-font-titillium-web dropbtn text-uppercase"
                               data-dropdown-id="{{ $count }}"
                               href="#"
                               data-bs-toggle="dropdown">
                                {{ $menu->title_en }}
                            </a>
                            @php $count2 = count($menu->children) @endphp
                            @if ($menu->children->isNotEmpty())
                                <div class="megamenu dropdown-content"
                                     id="myDropdown{{ $count }}"
                                     role="menu"
                                     style="margin-top: 1.7rem; @if ($count2 == 1) width: 350px; margin-left: 60%; @endif">
                                    <div class="row g-2">
                                        @foreach ($menu->children as $child)
                                            <div
                                                 class="col-xl-4 col-lg-4 @if ($count2 == 1) col-xl-12 col-lg-12 @endif ">
                                                <div class="col-megamenu">
                                                    <span
                                                          class="title custom-sub-menu p-2">{{ $child->title_en }}</span>
                                                    <ul class="list-unstyled mt-2">
                                                        @foreach ($child->submenus as $submenu)
                                                            @if ($submenu->pages_id != null)
                                                                <li class="custom-child-menu p-2">
                                                                    <a class="custom-font-titillium-web effect"
                                                                       href="{{ $submenu->url_link ? url('/pages/' . $submenu->url_link . '/' . $submenu->pages_id) : '#' }}">
                                                                        <i class="fas fa-angle-double-right"></i>
                                                                        {{ $submenu->title_en }}
                                                                    </a>
                                                                </li>
                                                            @else
                                                                @if ($submenu->url_link_type == 4)
                                                                    <li class="custom-child-menu p-2">
                                                                        <a class="custom-font-titillium-web"
                                                                           href="{{ $submenu->url_link ? url('backend/menu_fle/' . $submenu->url_link) : '#' }}"
                                                                           target="{{ $submenu->target }}">
                                                                            <i class="fas fa-angle-double-right"></i>
                                                                            {{ $submenu->title_en }}
                                                                        </a>
                                                                    </li>
                                                                @else
                                                                    <li class="custom-child-menu p-2">
                                                                        <a class="custom-font-titillium-web effect"
                                                                           href="{{ $submenu->url_link ? url($submenu->url_link) : '#' }}">
                                                                            <i class="fas fa-angle-double-right"></i>
                                                                            {{ $submenu->title_en }}
                                                                        </a>
                                                                    </li>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </li>
                    @endforeach
                @endif

                <li>
                    <div class="search-icon-style">
                        <div class="btn search_icon-color">
                            <i id="toggleFormButton"
                               class="fa-solid fa-magnifying-glass"
                               onclick="toggleSearchBox()"></i>
                        </div>

                        <div class="top-search"
                             id="searchBox"
                             style="display: none;">
                            <div class="input-group"
                                 style="padding-left: 10px; padding-right: 10px; width:100%">
                                <form action="{{ url('/news-event-notice-search-filter-filter') }}"
                                      method="GET">
                                    <div class=""
                                         style="margin-bottom: 10px;text-align: center">
                                        <input type="radio"
                                               name="search_type"
                                               value="1"
                                               checked=""
                                               style="cursor: pointer;"> <span class="webSearchRadio">News.</span>
                                        <input type="radio"
                                               name="search_type"
                                               value="3"
                                               style="cursor: pointer;"> <span class="webSearchRadio">Notice.</span>
                                        <input type="radio"
                                               name="search_type"
                                               value="2"
                                               style="cursor: pointer;"> <span class="webSearchRadio">Event</span>
                                    </div>
                                    <input type="hidden"
                                           name="fromDate"
                                           value="">
                                    <input type="hidden"
                                           name="toDate"
                                           value="">
                                    <input type="text"
                                           name="title"
                                           class="form-control"
                                           placeholder="Search"
                                           required=""
                                           style="border-radius: 8px; height: 40px; width: 320px;"><br>
                                    <button type="submit">
                                        <i class="ti-search"></i>
                                    </button>
                                </form>
                                <br>
                            </div>
                        </div>
                    </div>
                </li>

            </ul>

        </div>

        <!-- navbar-collapse.// -->
    </div> <!-- container-fluid.// -->
</nav>
<!-- ============= Desktop Desive end ============== -->

<!-- ============= Mobile Desive ============== -->
<nav style="height: 90px;"
     id="navbar_top"
     class="mobile-menu navbar navbar-expand-lg navbar-dark bg-light">
    <div class="container-fluid"
         style="justify-content: none !important;">
        @php
            $logoNav = DB::table('logos')->where('type_id', 1)->first();
            $logoNavFixed = DB::table('logos')->where('type_id', 2)->first();
        @endphp

        <a class="navbar-brand"
           href="{{ url('/') }}">
            <img src="{{ asset('upload/logo/' . @$logoNav->image) }}"
                 class="logo logo-display logo-responsive"
                 alt="{{ $logoNav->name }}">
            <img src="{{ asset('upload/logo/' . @$logoNavFixed->image) }}"
                 class="logo logo-scrolled"
                 alt="Logo"
                 style="height: 70px; width: 225px; display: none;">
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

        <div class="collapse navbar-collapse"
             id="main_nav_butex">
            <div class="container-fluid mt-1">
                <div class="accordion"
                     id="accordionMenu">
                    @php $count = 0; @endphp
                    @foreach ($menus as $menu)
                        @php $count++; @endphp
                        <div class="accordion-item"
                             style="border: none;">
                            <div class="accordion-header"
                                 id="headingOne{{ $count }}">
                                <button class="accordion-button collapsed"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne{{ $count }}"
                                        aria-expanded="false"
                                        aria-controls="collapseOne{{ $count }}"
                                        style="border-bottom: 1px solid rgb(97, 97, 97); background: white;">
                                    <span class="custom-sub-menu custom-font-titillium-web"
                                          style="color:black !important; font-size: 20px;">
                                        {{ @$menu->title_en }}
                                    </span>
                                </button>
                            </div>
                            <div id="collapseOne{{ $count }}"
                                 class="accordion-collapse collapse"
                                 aria-labelledby="headingOne{{ $count }}"
                                 data-bs-parent="#accordionMenu">
                                <div class="accordion-body">
                                    @php $child_count = 0; @endphp
                                    @foreach ($menu->children as $child)
                                        @php $child_count++; @endphp
                                        <div class="accordion"
                                             id="subMenu{{ $child_count }}">
                                            <div class="accordion-item"
                                                 style="border: none;">
                                                <div class="accordion-header"
                                                     id="headingOneSub{{ $child_count }}">
                                                    <button class="accordion-button collapsed"
                                                            type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#collapseOneSub{{ $child_count }}"
                                                            aria-expanded="false"
                                                            aria-controls="collapseOneSub{{ $child_count }}"
                                                            style="border-bottom: 1px solid #717070; background: white;">
                                                        <span class="custom-sub-menu"
                                                              style="color:black !important; font-size: 18px;">
                                                            {{ $child->title_en }}
                                                        </span>
                                                    </button>
                                                </div>

                                                <div id="collapseOneSub{{ $child_count }}"
                                                     class="accordion-collapse collapse"
                                                     aria-labelledby="headingOneSub{{ $child_count }}"
                                                     data-bs-parent="#subMenu{{ $child_count }}">
                                                    <div class="accordion-body">
                                                        <ul class="list-unstyled mt-2">
                                                            @foreach ($child->submenus as $submenu)
                                                                @if ($submenu->pages_id != null)
                                                                    <li class="custom-child-menu p-2">
                                                                        <a class="custom-font-titillium-web"
                                                                           href="{{ $submenu->url_link ? url('/pages/' . $submenu->url_link . '/' . $submenu->pages_id) : '#' }}">
                                                                            <i class="fas fa-angle-double-right"></i>
                                                                            {{ $submenu->title_en }}
                                                                        </a>
                                                                    </li>
                                                                @else
                                                                    @if ($submenu->url_link_type == 4)
                                                                        <li class="custom-child-menu p-2">
                                                                            <a class="custom-font-titillium-web"
                                                                               href="{{ $submenu->url_link ? url('backend/menu_fle/' . $submenu->url_link) : '#' }}"
                                                                               target="{{ $submenu->target }}">
                                                                                <i
                                                                                   class="fas fa-angle-double-right"></i>
                                                                                {{ $submenu->title_en }}
                                                                            </a>
                                                                        </li>
                                                                    @else
                                                                        <li class="custom-child-menu p-2">
                                                                            <a class="custom-font-titillium-web"
                                                                               href="{{ $submenu->url_link ? url($submenu->url_link) : '#' }}">
                                                                                <i
                                                                                   class="fas fa-angle-double-right"></i>
                                                                                {{ $submenu->title_en }}
                                                                            </a>
                                                                        </li>
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{-- end dyna --}}
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

                // Reset color for all dropdown buttons
                $(".dropbtn").css("color", ""); // Reset to original color

                // Change the text color of the currently clicked button
                $(this).css("color", "#00c5bf");

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

                    $(".dropbtn").css("color", ""); // Reset to original color
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

    function toggleSearchBoxClose() {
        const searchBox = document.getElementById('searchBox');
        searchBox.style.display = 'none';
    }

    // Close the searchBox if clicked outside
    document.addEventListener('click', function(event) {
        const searchBox = document.getElementById('searchBox');
        const toggleButton = document.getElementById('toggleFormButton');

        // Check if the click is outside the searchBox and toggle button
        if (searchBox.style.display === 'block' && !searchBox.contains(event.target) && !toggleButton.contains(
                event.target)) {
            //searchBox.style.display = 'none';
            toggleSearchBox();
        }
    });
</script>
