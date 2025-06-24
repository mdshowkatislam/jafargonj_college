
<style type="text/css">
    .dropdown-large{ padding:1rem; }
    .dropdown-menu h6{font-weight: 600 !important;}
    #main_nav .nav-link{
        color: #fff !important;
    }
    .list-unstyled a{
        color: #000;
        font-weight: 400;
        line-height: 32px;
    }
    .list-unstyled a:hover{
        color: #ffb606 !important;
    }
    .dropdown-menu a:hover{
        color: #ffb606 !important;
    }
    .dropdown-item:active{
        background-color: #01803d !important;
    }
    /* ============ desktop view ============ */
    @media all and (min-width: 992px) {
        .dropdown-large{min-width:991px;}
    }
    /* ============ desktop view .end// ============ */
</style>

<div class="header">
    <div class="fixed-top">
        <!-- Top Bar -->
        <section id="topbar" class="d-flex justify-content-center align-items-center d-md-block" style="background: #179bd7 !important">
            <div class="topbar text-end container-fluid">
                @foreach ($top_menus as $item)
                    @if (isset($item->url_link_type) && $item->url_link_type == 1)
                        <a href="{{ route($item->url_link) }}">{{ $item->title_en }}</a>
                    @elseif (isset($item->url_link_type) && $item->url_link_type == 3)
                        <a href="{{ $item->url_link }}" target="_blank">{{ $item->title_en }}</a>
                    @endif
                @endforeach
            </div>
            {{-- <div class="topbar text-end container-fluid">
                <a href="https://old.bup.edu.bd/" target="_blank">Old Website</a>
                <a href="https://forms.office.com/r/0VeZTuBMEZ" target="_blank" >Alumni</a>
                <a href="https://webportal.bup.edu.bd/" target="_blank">UCAM</a>
                <a href="https://login.microsoftonline.com/" target="_blank">Webmail</a>
                <a href="https://admission.bup.edu.bd/" target="_blank">Current Admissions</a>
                <a href="{{ route('career_list') }}">Career</a>
                <a href="{{ route('gallery_list') }}">Gallery</a>
                <a href="{{ route('contact') }}">Contact</a>
                <a href="{{ route('suggestion') }}">Suggestion</a>
            </div> --}}
        </section>
        {{-- <div class="container"> --}}
            <div class="">
                <nav class="navbar navbar-expand-lg navbar-dark bg-light py-0 shadow" style="background: #253b80 !important">
                    <div class="container-fluid">
                        <div class="logo">
                            @include('frontend.partials.logo.bup_header', ['logo_title'=>'BANGLADESH UNIVERSITY OF <br/>PROFESSIONALS', 'route'=>'index'])
                        </div>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav" style="background: #16501d;"  aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="main_nav">
                            <ul class="navbar-nav ms-auto align-items-center">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-dark @if (request()->routeIs(['about_overview','facts_figures', 'citizen_charter','annual_report','chancellor','vc_info','pro_vc_info','treasurer_info','offices','office','senate.member','all_deans','all_chairman','faculty_member','faculty_officer' ])) active @endif" href="#" data-bs-toggle="dropdown"> About </a>
                                    <div class="dropdown-menu dropdown-large" style="left: -280px !important;">
                                    <div class="container">
                                        <div class="row g-3">
                                            <div class="col-lg-3 col-sm-12 col-md-12">
                                                <h6 class="title">About BUP</h6>
                                                <ul class="list-unstyled">
                                                    <li><a href="{{ route('about_overview') }}">History </a></li>
                                                    <li><a href="{{ route('facts_figures') }}">Facts & Figures </a></li>
                                                    <li><a href="{{ route('citizen_charter') }}">Citizen Charter </a></li>
                                                    <li><a href="{{ route('annual_report') }}">Annual Report </a></li>
                                                    {{-- <li><a href="{{ route('newsletter') }}">Brochure & Newsletter </a></li> --}}
                                                    <li><a href="{{ route('contact') }}">Contact Us </a></li>
                                                </ul>
                                            </div><!-- end col-3 -->
                                            <div class="col-lg-3 col-sm-12 col-md-12">
                                                <h6 class="title">Administration</h6>
                                                <ul class="list-unstyled">
                                                    <li><a href="{{ route('chancellor') }}">The Chancellor </a></li>
                                                    <li><a href="{{ route('vc_info') }}">Vice Chancellor </a></li>
                                                    <li><a href="{{ route('pro_vc_info') }}">Pro-Vice Chancellor </a></li>
                                                    <li><a href="{{ route('treasurer_info') }}">Treasurer </a></li>
                                                    <li><a href="{{ route('offices') }}">All Officers </a></li>
                                                    <li><a href="{{ route('office') }}">All Offices </a></li>
                                                </ul>
                                            </div><!-- end col-3 -->
                                            <div class="col-lg-3 col-sm-12 col-md-12">
                                                <h6 class="title">Regulatory Bodies</h6>
                                                <ul class="list-unstyled">
                                                    @php
                                                    $committee = \App\Models\CommitteType::all();
                                                    @endphp
                                                    @foreach ($committee as $item)
                                                    <li><a href="{{ route('senate.member', $item->id) }}">{{$item->name}} </a></li>
                                                    @endforeach
                                                    {{-- <li><a href="#">Submenu item </a></li>
                                                    <li><a href="#">Submenu item </a></li>
                                                    <li><a href="#">Submenu item </a></li>
                                                    <li><a href="#">Submenu item </a></li> --}}
                                                </ul>
                                            </div><!-- end col-3 -->
                                            <div class="col-lg-3 col-sm-12 col-md-12">
                                                <h6 class="title">Academic Personnels</h6>
                                                <ul class="list-unstyled">
                                                    <li><a href="{{route('all_deans')}}">Deans of Faculties </a></li>
                                                    <li><a href="{{route('all_chairman')}}">Chairman of the Departments </a></li>
                                                    <li><a href="{{route('faculty_member')}}">All Faculty Members </a></li>
                                                    <li><a href="{{route('faculty_officer')}}">All Faculty Officers </a></li>
                                                    <li><a href="{{route('department_officer')}}">All Department Officers </a></li>
                                                </ul>
                                            </div><!-- end col-3 -->
                                        </div><!-- end row -->
                                        </div><!-- end row -->
                                    </div> <!-- dropdown-large.// -->
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-dark @if (request()->routeIs(['academics.programCategoryWiseProgram','academic_calender', 'office.office_details' ])) active @endif" href="#" data-bs-toggle="dropdown"> Academics  </a>
                                    <div class="dropdown-menu dropdown-large" style="left: -359px !important;">
                                        <div class="row g-3">
                                            <div class="col-lg-5 col-sm-12 col-md-12">
                                                <h6 class="title">Faculties</h6>
                                                <ul class="list-unstyled">
                                                    @php
                                                    $faculties = \App\Models\Faculty::where('status', 1)->get();
                                                    @endphp
                                                    @foreach ($faculties as $faculty)
                                                    <li><a href="{{ route('faculty_home', $faculty->id) }}">{{ $faculty->name }} </a></li>
                                                    @endforeach
                                                </ul>
                                            </div><!-- end col-3 -->
                                            <div class="col-lg-3 col-sm-12 col-md-12">
                                                <h6 class="title">Academic Programs</h6>
                                                <ul class="list-unstyled">
                                                    @php
                                                    $committee = \App\Models\ProgramCategory::whereIn('id', [1,2])->get();
                                                    // $committee = \App\Models\ProgramCategory::all();
                                                    @endphp
                                                    @foreach ($committee as $item)
                                                    <li><a class="" href="{{ route('academics.programCategoryWiseProgram', $item->id) }}">{{$item->program_category}} </a></li>
                                                    @endforeach

                                                    {{-- <li><a href="#">Submenu item </a></li>
                                                    <li><a href="#">Submenu item </a></li>
                                                    <li><a href="#">Submenu item </a></li>
                                                    <li><a href="#">Submenu item </a></li> --}}
                                                </ul>
                                            </div><!-- end col-3 -->
                                            <div class="col-lg-4 col-sm-12 col-md-12">
                                                <h6 class="title">Important Links</h6>
                                                <ul class="list-unstyled">
                                                    <li><a href="{{ route('oefcd') }}">Office of the Evaluation, Faculty & Curriculum Development (OEFCD) </a></li>
                                                    <li><a href="{{ route('oefcd.affairs') }}">Office of the International Affairs </a></li>
                                                    <li><a href="https://internationalstudents.bup.edu.bd/">Internatonal Students </a></li>
                                                    <li><a href="{{ route('iqac') }}">Institutional of Quality Assurance Cell (IQAC) </a></li>
                                                    <li><a href="{{ route('cpc') }}">Counselling & Placement Center (CPC) </a></li>
                                                    <li><a href="{{ route('office.office_details', 11) }}">Library </a></li>
                                                    <li><a href="{{ route('clubs.list') }}"> All Clubs </a></li>
                                                    <li><a href="{{ route('lab.list') }}"> All Labs </a></li>
                                                    <li><a href="{{ route('academic_calender') }}">Academic Calender </a></li>
                                                    <li><a href="https://forms.office.com/r/0VeZTuBMEZ" target="_blank">Alumni</a></li>
                                                </ul>
                                            </div><!-- end col-3 -->
                                        </div><!-- end row -->
                                    </div> <!-- dropdown-large.// -->
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-dark  @if (request()->routeIs(['journal.list', 'journal_by_faculty'])) active @endif" href="#" data-bs-toggle="dropdown"> Research </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="{{ route('chsr_home') }}"> Centre for Higher Studies and Research (CHSR)</a></li>
                                        <li><a class="dropdown-item" href="https://bchair.bup.edu.bd/"> Bangabandhu Chair </a></li>
                                        {{-- <li><a class="dropdown-item" href="#"> Library Research Support </a></li> --}}
                                        {{-- <li><a class="dropdown-item" href="{{ route('journal.list') }}"> BUP Journal </a></li> --}}
                                        {{-- <li><a class="dropdown-item" href="{{ route('journal_by_faculty', 1) }}"> Faculty Arts and Social Sciences Inquest Journal </a></li> --}}
                                        {{-- <li><a class="dropdown-item" href="{{ route('journal_by_faculty', 3) }}"> Journal of Faculty of Science and Technology </a></li> --}}
                                        {{-- <li><a class="dropdown-item" href="{{ route('journal_by_faculty', 4) }}"> Journal of Innovation in Business Studies </a></li> --}}
                                        <li><a class="dropdown-item" href="http://journal.bup.edu.bd/" target="_blank"> BUP Journal </a></li>
                                        <li><a class="dropdown-item" href="http://journal.bup.edu.bd/Journals/Category/Arts-and-Social-Science" target="_blank"> Faculty Arts and Social Sciences Inquest Journal </a></li>
                                        <li><a class="dropdown-item" href="http://journal.bup.edu.bd/Journals/Category/Science-and-Technology" target="_blank"> Journal of Faculty of Science and Technology </a></li>
                                        <li><a class="dropdown-item" href="http://journal.bup.edu.bd/Journals/Category/Business-and-Management" target="_blank"> Journal of Innovation in Business Studies </a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-dark @if (request()->routeIs('academics.programCategoryWiseProgramAdmission')) active @endif" href="#" data-bs-toggle="dropdown"> Admission </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="{{ route('academics.programCategoryWiseProgramAdmission', 1) }}"> Undergraduate Program </a></li>
                                        <li><a class="dropdown-item" href="{{ route('academics.programCategoryWiseProgramAdmission', 2) }}"> Graduate Program </a></li>
                                        {{-- <li><a class="dropdown-item" href="{{ route('academics.programCategoryWiseProgramAdmission', 3) }}"> Postgraduate Program </a></li> --}}
                                        {{-- <li><a class="dropdown-item" href="{{ route('academics.programCategoryWiseProgramAdmission', 4) }}"> Certificate Courses </a></li> --}}
                                    </ul>
                                </li>

                                {{-- <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-dark" href="#" data-bs-toggle="dropdown"> On Campus  </a>
                                    <div class="dropdown-menu dropdown-large" style="left: -695px !important;">
                                        <div class="row g-3">
                                            <div class="col-lg-4 col-sm-12 col-md-12">
                                                <h6 class="title">Facilities</h6>
                                                <ul class="list-unstyled">
                                                    <li><a href="{{ route('office.office_details', 20) }}">Student Halls </a></li>
                                                    <li><a href="{{ route('office.office_details', 10) }}">Medical Centre </a></li>
                                                    <li><a href="{{ route('clubs.list') }}">Clubs </a></li>
                                                    <li><a href="{{ route('office.office_details', 33) }}">Counselling & Placement Center </a></li>
                                                    <li><a href="{{ route('scholarships_and_financial_aids') }}">Scholarships & Financial Aids </a></li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-4 col-sm-12 col-md-12">
                                                <h6 class="title">Benefits</h6>
                                                <ul class="list-unstyled">
                                                    <li><a href="{{ route('office.office_details', 19) }}">Transport Facilities </a></li>
                                                    <li><a href="{{ route('office.office_details', 13) }}">Sports and Fitness </a></li>
                                                    <li><a href="{{ route('office.office_details', 9) }}">ICT Support </a></li>
                                                    <li><a href="{{ route('office.office_details', 11) }}">Library </a></li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-4 col-sm-12 col-md-12">
                                                <h6 class="title">Services</h6>
                                                <ul class="list-unstyled">
                                                    <li><a href="https://alumni.bup.edu.bd/">Alumni Association </a></li>
                                                    <li><a href="{{ route('apply_for_certificate') }}">Download Certificate Form </a></li>
                                                    <li><a href="{{ route('apply_for_transcript') }}">Download Transcript Form </a></li>
                                                    <li><a href="https://convocation.bup.edu.bd/">Apply for Convocation </a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li> --}}

                                <li class="nav-item dropdown">
                                    <a class="nav-link text-dark @if (request()->routeIs('campus_life')) active @endif " href="{{ route('campus_life') }}"> On Campus </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-dark  @if (request()->routeIs(['news.all', 'events.all', 'notice.all'])) active @endif "
                                    href="#" data-bs-toggle="dropdown">
                                         Announcements
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="{{ route('news.all') }}"> News</a></li>
                                        <li><a class="dropdown-item" href="{{ route('events.all') }}"> Events </a></li>
                                        <li><a class="dropdown-item" href="{{ route('notice.all') }}"> Notice </a></li>
                                        <li><a class="dropdown-item" href="{{ route('career_list') }}"> Career </a></li>
                                        <li><a class="dropdown-item" href="{{ route('procurement') }}"> Procurement </a></li>
                                        <li><a class="dropdown-item" href="{{ route('result') }}"> Results </a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-dark  @if (request()->routeIs(['journal.list', 'events.all', 'newsletter'])) active @endif "
                                    href="#" data-bs-toggle="dropdown">
                                         Publications
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        {{-- <li><a class="dropdown-item" href="{{ route('journal.list') }}"> Journal</a></li> --}}
                                        <li><a class="dropdown-item" href="http://journal.bup.edu.bd/" target="_blank">Journal </a></li>
                                        <li><a class="dropdown-item" href="{{ route('magazine') }}"> Magazine </a></li>
                                        <li><a class="dropdown-item" href="{{ route('newsletter') }}"> Newsletter </a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link text-dark" href="#"> <i class="fas fa-search"></i> </a>
                                </li>
                            </ul>
                        </div> <!-- navbar-collapse.// -->
                    </div>
                    {{-- <a class="navbar-brand" href="#">Brand</a> --}}

                    {{-- <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}"> --}}
                        {{-- <span class="common-font-color fs-6 fw-bold mb-0 logo-title">BANGLADESH UNIVERSITY OF <br/>PROFESSIONALS</span> --}}
                    {{-- </a> --}}

                </nav>
            </div>
    {{-- </div> --}}
    </div>
</div>

<script>
        $(function(){
            var href = "{{ url()->current()}}";
            var thisUrl = $('.dropdown-item[href="'+href+'"]');
            $(thisUrl).parents('.highlight-nav').find('.nav-bar-item-menu').css('borderBottom','3px solid #006a4e');
            $(thisUrl).css('backgroundColor','#006a4e').css('color', '#fff');
        });
</script>

<!-- ===== Header section end ===== -->
