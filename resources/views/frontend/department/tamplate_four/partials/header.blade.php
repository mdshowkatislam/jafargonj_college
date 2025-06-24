<div class="header">
    <div class="fixed-top">
      <div class="top-bar-area bg-dark text-light">
        <div class="container">
            <div class="row">
                <div class="col-md-3 logo-box">
                    <div class="logo"></div>
                </div>
                <div class="col-md-9">
                    <a href=""><span class="deptHeading">{!! $department->name !!}</span> 
                    </a>    
                </div>

            </div>
        </div>
    </div>
        <!-- Navbar -->
        <nav class="navbar navbar-default attr-border navbar-sticky bootsnav">
                <!-- Start Top Search -->
                {{-- <div class="container">
                    <div class="row">
                        <div class=" top-search" id="web-search-div">
                            <div class="input-group" style="padding-left: 10px;padding-right: 10px;width:100%">
                                <form action="#" method="GET">
                                    <div class="" style="margin-bottom: 10px;text-align: center">
                                        <input type="radio" name="search_type" value="web" checked> <span
                                            class="webSearchRadio">Web</span>
                                        <input type="radio" name="search_type" value="people"> <span
                                            class="webSearchRadio">People</span>
                                    </div>
                                    <input type="text" name="search" class="form-control" placeholder="Search"
                                        required style="
                                border-radius: 8px"><br>
                                    <button type=" submit">
                                        <i class="ti-search"></i>
                                    </button>

                                </form>
                                <br>

                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- End Top Search -->

                <div class="container">
                    
                    <!-- Start Header Navigation -->
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                          <i class="fa fa-bars"></i>
                      </button>
                      <a class="navbar-brand" href="{{ route('index') }}">
                        @php
                            $logoNav = DB::table('logos')->where('type_id',1)->first();
                            $logoNavFixed = DB::table('logos')->where('type_id',2)->first();
                        @endphp
                          <img src="{{ asset('upload/logo/' . @$logoNav->image) }}" width="177px" height="50px;" class="logo" alt="Logo">
                      </a>
                    </div>
                    {{-- <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                            <i class="fa fa-bars"></i>
                        </button>
                        <a class="navbar-brand" href="{{ route('index') }}">
                        @php
                        $logoNav =
                        DB::table('logos')->where('type_id',1)->first();
                        $logoNavFixed =
                        DB::table('logos')->where('type_id',2)->first();
                        @endphp
                            <img src="{{ asset('upload/logo/' . @$logoNav->image) }}" class="logo logo-display"
                                alt="Logo" style="height: 70px;width: 225px;">
                        </a>
                    </div> --}}
                    <!-- End Header Navigation -->

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    
                    <div class="collapse navbar-collapse" id="navbar-menu">

                        <ul class="nav navbar-nav navbar-left" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item">
                            <a class="nav-link text-dark @if (request()->routeIs('department_home')) active @endif"
                                aria-current="page" href="{{ route('department_home', $department->id) }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark @if (request()->routeIs('department_all_faculties')) active @endif"
                                href="{{ route('department_all_faculties', $department->id) }}">
                                Faculty Members<span class=" ms-2 dropdown-toggle d-lg-none"></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark @if (request()->routeIs('department_research')) active @endif"
                                href="{{ route('department_research', $department->id) }}">
                                Research<span class=" ms-2 dropdown-toggle d-lg-none"></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark @if (request()->routeIs('department_program')) active @endif"
                                href="{{ route('department_program', $department->id) }}">Program</a>
                        </li>
                        <li class=" nav-item">
                            <a class="nav-link text-dark @if (request()->routeIs('department_notice')) active @endif"
                                href="{{ route('department_notice', $department->id) }}">Notice</a>
                            
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
