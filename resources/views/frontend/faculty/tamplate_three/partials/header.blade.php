<div class="header">
    <div class="fixed-top">
        <!-- Top Bar -->
        <section id="topbar" class="d-flex justify-content-center align-items-center d-none d-md-block"
            style="background: #179bd7 !important">
            <div class="topbar text-end container-fluid">
                <a href="https://webportal.bup.edu.bd/">UCAM</a>
                <a href="https://login.microsoftonline.com/">Webmail</a>
                <a href="https://admission.bup.edu.bd/">Current Admissions</a>
                <a href="{{ route('career_list') }}">Career</a>
                <a href="{{ route('gallery_list') }}">Gallery</a>
                <a href="{{ route('contact') }}">Contact</a>
            </div>
        </section>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-light shadow py-0" id="main-menu">
            <div class="container-fluid">
                <div class="logo d-flex align-items-center ">
                    <a href="{{ route('index') }}" class="navbar-brand me-0">
                        <img src="{{ asset('frontend/assets/img/bup/logo.svg') }}" alt="Logo"
                            class="d-inline-block" />
                    </a>
                    <a class="d-flex align-items-center faculty-title" href="{{ route('faculty_home', $faculty->id) }}"
                        style="word-wrap: break-word; width:270px;">
                        <span class="text-secondary text-uppercase fs-6 fw-bold mb-0 ">{{ $faculty_name }}</span>
                    </a>
                    {{-- @include('frontend.partials.logo.bup_header') --}}
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation" style="background: #16501d;">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-sm-center">
                        <li class="nav-item">
                            <a class="nav-link text-dark  @if (request()->routeIs('faculty_home')) active @endif"
                                aria-current="page" href="{{ route('faculty_home', $faculty->id) }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark @if (request()->routeIs('faculty_all_faculties')) active @endif "
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
                        <li class="nav-item">
                            <a class="nav-link text-dark @if (request()->routeIs('faculty_research')) active @endif"
                                href="{{ route('faculty_research', $faculty->id) }}">
                                Research<span class=" ms-2 dropdown-toggle d-lg-none"></span>
                            </a>
                        </li>
                        <li class=" nav-item">
                            <a class="nav-link text-dark @if (request()->routeIs('faculty_notice')) active @endif"
                                href="{{ route('faculty_notice', $faculty->id) }}">Notice</a>
                            {{-- <div class="dropdown-menu w-100 mt-0 border-0 rounded-0" aria-labelledby="navbarDropdown"
                style="border-top-left-radius: 0;border-top-right-radius: 0;">
                <div class="container">
                  <div class="row my-4">
                    <div class="col-md-6 col-lg-3 mb-3 mb-lg-0 ">
                      <div class="list-group list-group-flush">
                        <a href="" class="list-group-item list-group-item-action">Lorem ipsum</a>
                        <a href="" class="list-group-item list-group-item-action">Dolor sit</a>
                        <a href="" class="list-group-item list-group-item-action">Amet consectetur</a>
                        <a href="" class="list-group-item list-group-item-action">Cras justo odio</a>
                        <a href="" class="list-group-item list-group-item-action">Adipisicing elit</a>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-3 mb-md-0">
                      <div class="list-group list-group-flush">
                        <a href="" class="list-group-item list-group-item-action">Iste quaerato</a>
                        <a href="" class="list-group-item list-group-item-action">Cras justo odio</a>
                        <a href="" class="list-group-item list-group-item-action">Est iure</a>
                        <a href="" class="list-group-item list-group-item-action">Praesentium</a>
                        <a href="" class="list-group-item list-group-item-action">Laboriosam</a>
                        <a href="" class="list-group-item list-group-item-action">Laboriosam</a>
                        <a href="" class="list-group-item list-group-item-action">Laboriosam</a>
                        <a href="" class="list-group-item list-group-item-action">Laboriosam</a>
                        <a href="" class="list-group-item list-group-item-action">Laboriosam</a>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-3 mb-md-0">
                      <div class="list-group list-group-flush">
                        <a href="" class="list-group-item list-group-item-action">Iste quaerato</a>
                        <a href="" class="list-group-item list-group-item-action">Cras justo odio</a>
                        <a href="" class="list-group-item list-group-item-action">Est iure</a>
                        <a href="" class="list-group-item list-group-item-action">Praesentium</a>
                        <a href="" class="list-group-item list-group-item-action">Laboriosam</a>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                      <div class="list-group list-group-flush">
                        <a href="" class="list-group-item list-group-item-action">Cras justo odio</a>
                        <a href="" class="list-group-item list-group-item-action">Saepe</a>
                        <a href="" class="list-group-item list-group-item-action">Vel alias</a>
                        <a href="" class="list-group-item list-group-item-action">Sunt doloribus</a>
                        <a href="" class="list-group-item list-group-item-action">Cum dolores</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div> --}}
                        </li>



                        {{-- <li class="nav-item">
              <a class="nav-link text-uppercase" href="#">Research</a>
            </li> --}}
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
