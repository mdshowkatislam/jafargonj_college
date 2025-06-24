<header class="header sticky-top">
    <div class="nav">
        <div class="container">
            <div class="row">
                <nav class="navbar navbar-expand-lg navbar-dark">
                    <div class="container-fluid px-0">
                        @php
                            $logoNav =
                            DB::table('logos')->where('type_id',1)->first();
                            $logoNavFixed =
                            DB::table('logos')->where('type_id',2)->first();
                        @endphp
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{ asset('upload/logo/' . @$logoNav->image) }}" class="logo logo-display" alt="Logo" style="height: 70px; width: 225px;">
                            <img src="{{ asset('upload/logo/' . @$logoNavFixed->image) }}" class="logo logo-scrolled" alt="Logo" style="height: 70px; width: 225px; display: none;">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ms-md-auto gap-2">
                                <li class="nav-item dropdown dropdown-mega position-static">
                                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                        data-bs-auto-close="outside">About</a>
                                    <div class="dropdown-menu shadow-lg border-0">
                                        <div class="mega-content px-4">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-12 col-sm-10 col-md-6 col-xl-4 py-4">
                                                        <div class="border-end">
                                                            <ul>
                                                                <li class="py-2">ABOUT UNIVERSITY</li>
                                                                <li class="py-2"><a href="#"
                                                                        class="d-flex gap-2 align-items-center">
                                                                        <i class="fa-solid fa-angles-right"></i>
                                                                        Historical Outline</a></li>
                                                                <li class="py-2"><a href="#"
                                                                        class="d-flex gap-2 align-items-center">
                                                                        <i class="fa-solid fa-angles-right"></i>
                                                                        University at a Glance</a></li>
                                                                <li class="py-2"><a href="#"
                                                                        class="d-flex gap-2 align-items-center">
                                                                        <i class="fa-solid fa-angles-right"></i>
                                                                        Honoris
                                                                        Causa</a></li>
                                                                <li class="py-2"><a href="#"
                                                                        class="d-flex gap-2 align-items-center">
                                                                        <i class="fa-solid fa-angles-right"></i>
                                                                        Message from the Vice Chancellor.</a></li>
                                                                <li class="py-2"><a href="#"
                                                                        class="d-flex gap-2 align-items-center">
                                                                        <i class="fa-solid fa-angles-right"></i>
                                                                        List of Vice Chancellors</a></li>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-10 col-md-6 col-xl-4 py-4">
                                                        <div class="border-end">
                                                            <ul>
                                                                <li class="py-2">ABOUT UNIVERSITY</li>
                                                                <li class="py-2"><a href="#"
                                                                        class="d-flex gap-2 align-items-center">
                                                                        <i class="fa-solid fa-angles-right"></i>
                                                                        Historical Outline</a></li>
                                                                <li class="py-2"><a href="#"
                                                                        class="d-flex gap-2 align-items-center">
                                                                        <i class="fa-solid fa-angles-right"></i>
                                                                        University at a Glance</a></li>
                                                                <li class="py-2"><a href="#"
                                                                        class="d-flex gap-2 align-items-center">
                                                                        <i class="fa-solid fa-angles-right"></i>
                                                                        Honoris
                                                                        Causa</a></li>
                                                                <li class="py-2"><a href="#"
                                                                        class="d-flex gap-2 align-items-center">
                                                                        <i class="fa-solid fa-angles-right"></i>
                                                                        Message from the Vice Chancellor</a></li>
                                                                <li class="py-2"><a href="#"
                                                                        class="d-flex gap-2 align-items-center">
                                                                        <i class="fa-solid fa-angles-right"></i>
                                                                        List of Vice Chancellors</a></li>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-10 col-md-6 col-xl-4 py-4">
                                                        <div class="">
                                                            <ul>
                                                                <li class="py-2">ABOUT UNIVERSITY</li>
                                                                <li class="py-2"><a href="#"
                                                                        class="d-flex gap-2 align-items-center">
                                                                        <i class="fa-solid fa-angles-right"></i>
                                                                        Historical Outline</a></li>
                                                                <li class="py-2"><a href="#"
                                                                        class="d-flex gap-2 align-items-center">
                                                                        <i class="fa-solid fa-angles-right"></i>
                                                                        University at a Glance</a></li>
                                                                <li class="py-2"><a href="#"
                                                                        class="d-flex gap-2 align-items-center">
                                                                        <i class="fa-solid fa-angles-right"></i>
                                                                        Honoris
                                                                        Causa</a></li>
                                                                <li class="py-2"><a href="#"
                                                                        class="d-flex gap-2 align-items-center">
                                                                        <i class="fa-solid fa-angles-right"></i>
                                                                        Message from the Vice Chancellor</a></li>
                                                                <li class="py-2"><a href="#"
                                                                        class="d-flex gap-2 align-items-center">
                                                                        <i class="fa-solid fa-angles-right"></i>
                                                                        List of Vice Chancellors</a></li>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item dropdown dropdown-mega position-static">
                                    <a class="nav-link dropdown-toggle mb-4" href="#" data-bs-toggle="dropdown"
                                        data-bs-auto-close="outside">Academic</a>
                                </li>
                                <li class="nav-item dropdown dropdown-mega position-static">
                                    <a class="nav-link dropdown-toggle mb-4" href="#" data-bs-toggle="dropdown"
                                        data-bs-auto-close="outside">Administration</a>

                                </li>
                                <li class="nav-item dropdown dropdown-mega position-static">
                                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                        data-bs-auto-close="outside">Students</a>
                                    <div class="dropdown-menu shadow-lg border-0">
                                        <div class="mega-content px-4">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-12 col-sm-10 col-md-6 col-xl-4 py-4">
                                                        <div class="border-end">
                                                            <ul>
                                                                <li class="py-2">ABOUT UNIVERSITY</li>
                                                                <li class="py-2"><a href="#"
                                                                        class="d-flex gap-2 align-items-center">
                                                                        <i class="fa-solid fa-angles-right"></i>
                                                                        Historical Outline</a></li>
                                                                <li class="py-2"><a href="#"
                                                                        class="d-flex gap-2 align-items-center">
                                                                        <i class="fa-solid fa-angles-right"></i>
                                                                        University at a Glance</a></li>


                                                                <li class="py-2"><a href="#"
                                                                        class="d-flex gap-2 align-items-center">
                                                                        <i class="fa-solid fa-angles-right"></i>
                                                                        List of Vice Chancellors</a></li>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-10 col-md-6 col-xl-4 py-4">
                                                        <div class="border-end">
                                                            <ul>
                                                                <li class="py-2">ABOUT UNIVERSITY</li>
                                                                <li class="py-2"><a href="#"
                                                                        class="d-flex gap-2 align-items-center">
                                                                        <i class="fa-solid fa-angles-right"></i>
                                                                        Historical Outline</a></li>
                                                                <li class="py-2"><a href="#"
                                                                        class="d-flex gap-2 align-items-center">
                                                                        <i class="fa-solid fa-angles-right"></i>
                                                                        University at a Glance</a></li>
                                                                <li class="py-2"><a href="#"
                                                                        class="d-flex gap-2 align-items-center">
                                                                        <i class="fa-solid fa-angles-right"></i>
                                                                        Honoris
                                                                        Causa</a></li>
                                                                <li class="py-2"><a href="#"
                                                                        class="d-flex gap-2 align-items-center">
                                                                        <i class="fa-solid fa-angles-right"></i>
                                                                        Message from the Vice Chancellor</a></li>
                                                                <li class="py-2"><a href="#"
                                                                        class="d-flex gap-2 align-items-center">
                                                                        <i class="fa-solid fa-angles-right"></i>
                                                                        List of Vice Chancellors</a></li>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-10 col-md-6 col-xl-4 py-4">
                                                        <div class="">
                                                            <ul>
                                                                <li class="py-2">ABOUT UNIVERSITY</li>
                                                                <li class="py-2"><a href="#"
                                                                        class="d-flex gap-2 align-items-center">
                                                                        <i class="fa-solid fa-angles-right"></i>
                                                                        Historical Outline</a></li>
                                                                <li class="py-2"><a href="#"
                                                                        class="d-flex gap-2 align-items-center">
                                                                        <i class="fa-solid fa-angles-right"></i>
                                                                        University at a Glance</a></li>
                                                                <li class="py-2"><a href="#"
                                                                        class="d-flex gap-2 align-items-center">
                                                                        <i class="fa-solid fa-angles-right"></i>
                                                                        Honoris
                                                                        Causa</a></li>
                                                                <li class="py-2"><a href="#"
                                                                        class="d-flex gap-2 align-items-center">
                                                                        <i class="fa-solid fa-angles-right"></i>
                                                                        Message from the Vice Chancellor</a></li>
                                                                <li class="py-2"><a href="#"
                                                                        class="d-flex gap-2 align-items-center">
                                                                        <i class="fa-solid fa-angles-right"></i>
                                                                        List of Vice Chancellors</a></li>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item dropdown dropdown-single">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">Research</a>
                                    <ul class="dropdown-menu shadow-lg border-0 bg-white" style="width: 250px;"
                                        aria-labelledby="navbarDropdown">
                                        <li class="py-2 px-2"><a href="#"
                                                class="d-flex gap-2 align-items-center text-capitalize text-nowrap">
                                                <i class=" fa-solid fa-angles-right"></i>
                                                Historical Outline</a></li>
                                        <li class="py-2 px-2"><a href="#"
                                                class="d-flex gap-2 align-items-center text-capitalize text-nowrap">
                                                <i class=" fa-solid fa-angles-right"></i>
                                                Telephone and Email Index</a></li>
                                        <li class="py-2 px-2"><a href="#"
                                                class="d-flex gap-2 align-items-center text-capitalize text-nowrap">
                                                <i class=" fa-solid fa-angles-right"></i>
                                                Historical Outline</a></li>
                                        <li class="py-2 px-2"><a href="#"
                                                class="d-flex gap-2 align-items-center text-capitalize text-nowrap">
                                                <i class=" fa-solid fa-angles-right"></i>
                                                Historical Outline</a></li>
                                        <li class="py-2 px-2"><a href="#"
                                                class="d-flex gap-2 align-items-center text-capitalize text-nowrap">
                                                <i class=" fa-solid fa-angles-right"></i>
                                                Historical Outline</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown dropdown-single">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">Links</a>

                                </li>
                                <li>
                                    <div class="search-icon-style">
                                        <div id="toggleFormButton" class="btn search_icon-color">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </div>

                                        <div class="bg-white top-search">
                                            <form id="myForm" class="mt-3 py-3" style="display: none;">
                                                <div class="d-flex justify-content-center gap-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="flexRadioDefault" id="flexRadioDefault1">
                                                        <label class="form-check-label text-white"
                                                            for="flexRadioDefault1">
                                                            Web
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="flexRadioDefault" id="flexRadioDefault2" checked>
                                                        <label class="form-check-label text-white"
                                                            for="flexRadioDefault2">
                                                            People
                                                        </label>
                                                    </div>
                                                </div>
                                                
                                                <div class="mb-3 mx-4">
                                                    <div class="search position-relative mb-3 mt-1">
                                                        <input class="search_input" type="text" placeholder="Search..."
                                                            name="">
                                                        <a href="#" class="search_icon" style="margin-left: -1.5rem;"><i
                                                                class="fa-solid fa-magnifying-glass"></i></a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
