        <!-- Header
        ============================================= -->
        <header id="home">
            <!-- Start Navigation -->
            <nav
                class="navbar top-pad navbar-default attr-border-none navbar-fixed white bootsnav on no-full navbar-transparent">
                <!-- Start Top Search -->
                <div class="container">
                    <div class="row">
                        <div class=" top-search" id="web-search-div">
                            <div class="input-group" style="padding-left: 10px;padding-right: 10px;width:100%">
                                <form action="#find_web" method="GET">
                                    <div class="" style="margin-bottom: 10px;text-align: center">
                                        <input type="radio" name="search_type" value="web" checked=""> <span
                                            class="webSearchRadio">Web</span>
                                        <!-- <input type="radio" name="search_type" value="program"> <span
                                class="webSearchRadio">Program</span>-->
                                        <input type="radio" name="search_type" value="people"> <span
                                            class="webSearchRadio">People</span>
                                    </div>
                                    <input type="text" name="search" class="form-control" placeholder="Search"
                                        required="" style="
                            border-radius: 8px"><br>
                                    <button type=" submit">
                                        <!-- <i class="ti-search"></i> -->
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>

                                </form>
                                <br>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Top Search -->

                <div class="container">
                    <div class="attr-nav">
                        <ul>
                            <li class="search"><a href="https://www.du.ac.bd/#">
                                    <!-- <i class="ti-search"></i> -->
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </a></li>
                        </ul>
                    </div>
                    <!-- Start Header Navigation -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                            <i class="fa fa-bars"></i>
                        </button>
                        <a class="navbar-brand" href="{{ route('index') }}">
                            <img src="{{ asset('frontend/assets/images/dulogo.png') }}" class="logo logo-display" alt="Logo"
                                style="height: 70px;width: 194px;">
                            <img src="{{ asset('frontend/assets/images/dulogo-black.png') }}" class="logo logo-scrolled" style="height: 70px;"
                                alt="Logo">
                        </a>
                    </div>
                    <!-- End Header Navigation -->

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navbar-menu">
                        <ul class="nav navbar-nav" data-in="fadeInDown" data-out="fadeOutUp">

                            <li class="dropdown megamenu-fw">
                                <a href="https://www.du.ac.bd/#" class="dropdown-toggle" data-toggle="dropdown">About
                                    <span></span></a>
                                <ul class="dropdown-menu megamenu-content animated menuBody fadeOutUp" role="menu"
                                    style="display: none; opacity: 1;">
                                    <li>
                                        <div>
                                            <div class="col-menu col-md-4">

                                                <h6 class="title menuTitle">About University
                                                </h6>
                                                <div class="content">
                                                    <ul class="menu-col">
                                                        <li><a href="https://www.du.ac.bd/university/HistoricalOutline"><i
                                                                    class="fas fa-angle-double-right"></i> Historical
                                                                Outline</a>
                                                        </li>

                                                        <li><a href="./pages/about/university-at-glance.html"><i
                                                                    class="fas fa-angle-double-right"></i>
                                                                University at a
                                                                Glance</a></li>
                                                        <li><a href="https://www.du.ac.bd/university/HonorisCausa"><i
                                                                    class="fas fa-angle-double-right"></i>
                                                                Honoris Causa</a>
                                                        </li>
                                                        <li><a href="https://www.du.ac.bd/viceChancellorMessage"><i
                                                                    class="fas fa-angle-double-right"></i>
                                                                Message from the Vice
                                                                Chancellor</a></li>
                                                        <li><a href="https://www.du.ac.bd/listofViceChancellors"><i
                                                                    class="fas fa-angle-double-right"></i>
                                                                List of Vice
                                                                Chancellors</a></li>


                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- end col-3 -->
                                            <div class="col-menu col-md-4">
                                                <h6 class="title menuTitle">University Leadership</h6>
                                                <div class="content">
                                                    <ul class="menu-col">
                                                        <li><a href="https://www.du.ac.bd/leadership/chancellor"><i
                                                                    class="fas fa-angle-double-right"></i>
                                                                Chancellor</a></li>
                                                        <li><a href="https://www.du.ac.bd/leadership/vc"><i
                                                                    class="fas fa-angle-double-right"></i> Vice
                                                                Chancellor</a></li>
                                                        <li><a href="https://www.du.ac.bd/leadership/provcp"><i
                                                                    class="fas fa-angle-double-right"></i> Pro-Vice
                                                                Chancellor
                                                                (Administration)</a></li>
                                                        <li><a href="https://www.du.ac.bd/leadership/provca"
                                                                nowrap=""><i class="fas fa-angle-double-right"></i>
                                                                Pro-Vice Chancellor
                                                                (Academic)</a></li>

                                                        <li><a href="https://www.du.ac.bd/leadership/treasurer"><i
                                                                    class="fas fa-angle-double-right"></i>
                                                                Treasurer</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- end col-3 -->

                                            <div class="col-menu col-md-4">
                                                <h6 class="title menuTitle">Governance Framework</h6>
                                                <div class="content">
                                                    <ul class="menu-col">
                                                        <li><a
                                                                href="https://www.du.ac.bd/university/UniversityOrdinance"><i
                                                                    class="fas fa-angle-double-right"></i>
                                                                University
                                                                Ordinance</a></li>
                                                        <li><a href="https://www.du.ac.bd/senateMember"><i
                                                                    class="fas fa-angle-double-right"></i> Senate
                                                                Members</a>
                                                        </li>
                                                        <li><a href="https://www.du.ac.bd/syndicateMembers"><i
                                                                    class="fas fa-angle-double-right"></i> Syndicate
                                                                Members</a>
                                                        </li>
                                                        <li><a
                                                                href="https://www.du.ac.bd/university/UniversityStatutes"><i
                                                                    class="fas fa-angle-double-right"></i>
                                                                University
                                                                Statutes</a></li>


                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- end col-3 -->
                                        </div>
                                        <!-- end row -->
                                    </li>
                                </ul>
                            </li>

                            <li class="dropdown megamenu-fw">
                                <a href="https://www.du.ac.bd/#" class="dropdown-toggle"
                                    data-toggle="dropdown">Academics <span></span></a>
                                <ul class="dropdown-menu megamenu-content animated menuBody" role="menu">
                                    <li>
                                        <div class="row">
                                            <div class="col-menu col-md-4">
                                                <h6 class="title menuTitle">Academic</h6>
                                                <div class="content">
                                                    <ul class="menu-col">
                                                        <li><a href="https://www.du.ac.bd/find_course"><i
                                                                    class="fas fa-angle-double-right"></i>
                                                                Academic Programs</a>
                                                        </li>
                                                        <li><a href="https://www.du.ac.bd/academicCalendar"><i
                                                                    class="fas fa-angle-double-right"></i> Academic
                                                                Calendar</a>
                                                        </li>
                                                        <!--<li><a href="https://www.du.ac.bd/iqacOffice"><i
                                                            class="fas fa-angle-double-right"></i> Institutional Quality
                                                        Assurance Cell (IQAC)</a></li> -->

                                                        <li><a href="https://www.du.ac.bd/libraries"><i
                                                                    class="fas fa-angle-double-right"></i>
                                                                Libraries </a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- end col-3 -->
                                            <div class="col-menu col-md-4">
                                                <h6 class="title menuTitle">Academic Bodies</h6>
                                                <div class="content">
                                                    <ul class="menu-col">
                                                        <li><a href="https://www.du.ac.bd/officesOfDeans"><i
                                                                    class="fas fa-angle-double-right"></i>
                                                                Faculties</a>
                                                        </li>
                                                        <li><a href="https://www.du.ac.bd/departments"><i
                                                                    class="fas fa-angle-double-right"></i>
                                                                Departments</a></li>
                                                        <li><a href="https://www.du.ac.bd/institutes"><i
                                                                    class="fas fa-angle-double-right"></i>
                                                                Institutes</a></li>
                                                        <li><a href="https://www.du.ac.bd/colleges/Constituent"><i
                                                                    class="fas fa-angle-double-right"></i> Constituent
                                                                Colleges</a></li>
                                                        <li><a href="https://www.du.ac.bd/colleges/Affiliated"><i
                                                                    class="fas fa-angle-double-right"></i> Affiliated
                                                                Colleges</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- end col-3 -->
                                            <div class="col-menu col-md-4">
                                                <h6 class="title menuTitle">Admission</h6>
                                                <div class="content">
                                                    <ul class="menu-col">
                                                        <li><a href="https://www.du.ac.bd/undergraduatePrograms"><i
                                                                    class="fas fa-angle-double-right"></i> Undergraduate
                                                                Programs</a></li>
                                                        <li><a href="https://www.du.ac.bd/graduatePrograms"><i
                                                                    class="fas fa-angle-double-right"></i> Graduate
                                                                Programs</a></li>
                                                        <li><a target="_blank"
                                                                href="https://du.ac.bd/du_post_details/%E0%A6%8F%E0%A6%AE.%E0%A6%AB%E0%A6%BF%E0%A6%B2.-%E0%A6%AA%E0%A7%8D%E0%A6%B0%E0%A7%8B%E0%A6%97%E0%A7%8D%E0%A6%B0%E0%A6%BE%E0%A6%AE%E0%A7%87-(%E0%A7%A8%E0%A7%A6%E0%A7%A8%E0%A7%AA-%E0%A7%A8%E0%A7%A6%E0%A7%A8%E0%A7%AB-%E0%A6%B6%E0%A6%BF%E0%A6%95%E0%A7%8D%E0%A6%B7%E0%A6%BE%E0%A6%AC%E0%A6%B0%E0%A7%8D%E0%A6%B7)-%E0%A6%AD%E0%A6%B0%E0%A7%8D%E0%A6%A4%E0%A6%BF-%E0%A6%93-%E0%A6%AC%E0%A7%83%E0%A6%A4%E0%A7%8D%E0%A6%A4%E0%A6%BF/21006"><i
                                                                    class="fas fa-angle-double-right"></i>
                                                                MPhil Programs</a>
                                                        </li>


                                                        <li><a target="_blank"
                                                                href="https://www.du.ac.bd/du_post_details/%E0%A6%A2%E0%A6%BE%E0%A6%AC%E0%A6%BF%E2%80%99%E0%A6%B0-%E0%A6%AA%E0%A6%BF%E0%A6%8F%E0%A6%87%E0%A6%9A.%E0%A6%A1%E0%A6%BF.-%E0%A6%AA%E0%A7%8D%E0%A6%B0%E0%A7%8B%E0%A6%97%E0%A7%8D%E0%A6%B0%E0%A6%BE%E0%A6%AE%E0%A7%87-%E0%A6%AD%E0%A6%B0%E0%A7%8D%E0%A6%A4%E0%A6%BF%E0%A6%B0-%E0%A6%86%E0%A6%AC%E0%A7%87%E0%A6%A6%E0%A6%A8%E0%A6%AA%E0%A6%A4%E0%A7%8D%E0%A6%B0-%E0%A6%86%E0%A6%B9%E0%A7%8D%E0%A6%AC%E0%A6%BE%E0%A6%A8/18734"><i
                                                                    class="fas fa-angle-double-right"></i> PhD
                                                                Programs</a></li>
                                                        <li><a href="https://www.du.ac.bd/InternationalAdmission"><i
                                                                    class="fas fa-angle-double-right"></i> International
                                                                Students</a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- end col-3 -->
                                        </div>
                                        <!-- end row -->
                                    </li>
                                </ul>
                            </li>

                            <li class="dropdown megamenu-fw">
                                <a href="https://www.du.ac.bd/#" class="dropdown-toggle"
                                    data-toggle="dropdown">Administration <span></span></a>
                                <ul class="dropdown-menu megamenu-content animated menuBody fadeOutUp" role="menu"
                                    style="display: none; opacity: 1;">
                                    <li>
                                        <div class="row">
                                            <div class="col-menu col-md-3">
                                                <h6 class="title menuTitle">Academic Heads</h6>
                                                <div class="content">
                                                    <ul class="menu-col">
                                                        <li><a href="https://www.du.ac.bd/leadershipList/dean"><i
                                                                    class="fas fa-angle-double-right"></i> Deans of
                                                                Faculties</a>
                                                        </li>
                                                        <li><a href="https://www.du.ac.bd/leadershipList/chairman"><i
                                                                    class="fas fa-angle-double-right"></i> Chairman of
                                                                Departments</a></li>
                                                        <li><a href="https://www.du.ac.bd/leadershipList/director"><i
                                                                    class="fas fa-angle-double-right"></i> Directors of
                                                                Institutes</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- end col-3 -->
                                            <div class="col-menu col-md-4">
                                                <h6 class="title menuTitle">Head of Administrative Offices</h6>
                                                <div class="content">
                                                    <ul class="menu-col">
                                                        <li><a
                                                                href="https://www.du.ac.bd/leadershipList/director_research_center"><i
                                                                    class="fas fa-angle-double-right"></i> Directors
                                                                of
                                                                Research Centers &amp; Bureau</a></li>
                                                        <li><a href="https://www.du.ac.bd/leadershipList/provost"><i
                                                                    class="fas fa-angle-double-right"></i> Provosts
                                                                &amp; Wardens of
                                                                Halls and
                                                                Hostel</a></li>
                                                        <li><a href="https://www.du.ac.bd/leadershipList/office_head"><i
                                                                    class="fas fa-angle-double-right"></i> Head of
                                                                Offices</a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-menu col-md-4">
                                                <h6 class="title menuTitle">Others</h6>
                                                <div class="content">
                                                    <ul class="menu-col">
                                                        <li><a href="https://www.du.ac.bd/all_offices"><i
                                                                    class="fas fa-angle-double-right"></i> All
                                                                Offices</a></li>
                                                        <li><a href="https://www.du.ac.bd/faculty_member"><i
                                                                    class="fas fa-angle-double-right"></i>
                                                                Faculty Member
                                                                Profile</a>
                                                        </li>
                                                        <li><a href="https://www.du.ac.bd/staff_information"><i
                                                                    class="fas fa-angle-double-right"></i> Officer
                                                                Profile</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- end col-3 -->
                                        </div>
                                        <!-- end row -->
                                    </li>
                                </ul>
                            </li>










































































                            <li class="dropdown megamenu-fw">
                                <a href="https://www.du.ac.bd/#" class="dropdown-toggle" data-toggle="dropdown">Students
                                    <span></span></a>
                                <ul class="dropdown-menu megamenu-content animated menuBody" role="menu">
                                    <li>
                                        <div class="row">

                                            <div class="col-menu col-md-4">
                                                <h6 class="title menuTitle">Student
                                                    Facilities</h6>
                                                <div class="content">
                                                    <ul class="menu-col">
                                                        <li><a href="https://www.du.ac.bd/scholarship_financial_aid"><i
                                                                    class="fas fa-angle-double-right"></i>
                                                                Scholarships &amp;
                                                                Financial Aids</a></li>
                                                        <li><a href="https://www.du.ac.bd/students/HallsResidence"
                                                                target="_blank"><i
                                                                    class="fas fa-angle-double-right"></i>
                                                                Halls of Residence
                                                            </a></li>
                                                        <li><a href="https://www.du.ac.bd/students/Transport"><i
                                                                    class="fas fa-angle-double-right"></i>
                                                                Transport
                                                                Facilities</a>
                                                        </li>
                                                        <li><a href="https://www.du.ac.bd/students/Insurance"><i
                                                                    class="fas fa-angle-double-right"></i>
                                                                Health Insurance </a>
                                                        </li>
                                                        <li><a href="https://www.du.ac.bd/scholarship_notice"><i
                                                                    class="fas fa-angle-double-right"></i> Scholarship
                                                                Notice </a>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-menu col-md-4">
                                                <h6 class="title menuTitle">Online Services
                                                </h6>
                                                <div class="content">
                                                    <ul class="menu-col">
                                                        <li><a href="https://service.du.ac.bd/home" target="_blank"><i
                                                                    class="fas fa-angle-double-right"></i>
                                                                Apply for
                                                                Certificate/Marksheet</a>
                                                        </li>
                                                        <li><a href="https://studentscholarship.du.ac.bd/"
                                                                target="_blank"><i
                                                                    class="fas fa-angle-double-right"></i>
                                                                Apply
                                                                for Govt. Scholarships</a>
                                                        </li>
                                                        <li><a href="http://result.du.ac.bd/" target="_blank"><i
                                                                    class="fas fa-angle-double-right"></i>
                                                                Examination
                                                                Results</a>
                                                        </li>
                                                        <li><a href="https://eco.du.ac.bd/" target="_blank"><i
                                                                    class="fas fa-angle-double-right"></i>
                                                                Apply for
                                                                Transcript</a>
                                                        </li>
                                                        <li><a href="https://eco.du.ac.bd/" target="_blank"><i
                                                                    class="fas fa-angle-double-right"></i>
                                                                Exam Form Fill-up</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-menu col-md-4">
                                                <h6 class="title menuTitle">Alumni</h6>
                                                <div class="content">
                                                    <ul class="menu-col">



                                                        <li><a href="https://duaa-bd.org/"><i
                                                                    class="fas fa-angle-double-right"></i>
                                                                Alumni
                                                                Association</a>
                                                        </li>









                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="https://www.du.ac.bd/#" class="dropdown-toggle" data-toggle="dropdown"
                                    data-hover="Shortcodes">Research
                                    <span></span></a>

                                <ul class="dropdown-menu menuBody animated">
                                    <li><a href="https://www.du.ac.bd/research_center"><i
                                                class="fas fa-angle-double-right"></i>
                                            Research Centers &amp; Bureaus</a></li>
                                    <li><a href="https://www.du.ac.bd/current_research"><i
                                                class="fas fa-angle-double-right"></i>
                                            Research &amp; Publications</a></li>
                                    <li><a href="https://www.du.ac.bd/research_collaboration"><i
                                                class="fas fa-angle-double-right"></i>
                                            Research Collaboration</a></li>
                                    <li><a href="https://www.du.ac.bd/funded_project"><i
                                                class="fas fa-angle-double-right"></i> Funded
                                            Projects</a></li>
                                    <li><a href="http://journal.library.du.ac.bd/" target="_blank"><i
                                                class="fas fa-angle-double-right"></i>
                                            University Journals</a></li>
                                </ul>
                            </li>


                            <li class="dropdown">
                                <a href="https://www.du.ac.bd/#" class="dropdown-toggle" data-toggle="dropdown"
                                    data-hover="Shortcodes">Links
                                    <span></span></a>

                                <ul class="dropdown-menu menuBody animated fadeOutUp"
                                    style="display: none; opacity: 1;">



                                    <li><a href="https://www.du.ac.bd/media" target="_blank"><i
                                                class="fas fa-angle-double-right"></i>
                                            DU in Media</a></li>
                                    <li><a href="https://reggrad.du.ac.bd/" target="_blank"><i
                                                class="fas fa-angle-double-right"></i>
                                            Registered Graduate</a></li>
                                    <li><a href="https://ssl.du.ac.bd/login"><i class="fas fa-angle-double-right"></i>
                                            DU Login</a></li>
                                    <li><a href="https://ssl.du.ac.bd/studentlogin"><i
                                                class="fas fa-angle-double-right"></i>
                                            Student Login</a></li>
                                    <li><a href="https://www.du.ac.bd/employee_directory"><i
                                                class="fas fa-angle-double-right"></i>
                                            Telephone and Email Index</a></li>

                                    <li><a href="https://www.du.ac.bd/du_forms"><i
                                                class="fas fa-angle-double-right"></i> DU Forms</a>
                                    </li>
                                    <li><a href="https://www.du.ac.bd/du_noc"><i class="fas fa-angle-double-right"></i>
                                            Approved
                                            NOC/GO</a></li>
                                    <li><a href="http://e-tender.univdhaka.edu/" target="_blank"><i
                                                class="fas fa-angle-double-right"></i>
                                            E-Tender</a></li>
                                    <li><a href="https://jobs.du.ac.bd/" target="_blank"><i
                                                class="fas fa-angle-double-right"></i> DU Jobs</a>
                                    </li>
                                    <li><a href="https://www.du.ac.bd/du_trust_funds"><i
                                                class="fas fa-angle-double-right"></i> Trust
                                            Funds</a></li>

                                    <li><a href="https://www.du.ac.bd/notice"><i class="fas fa-angle-double-right"></i>
                                            Notice</a>
                                    </li>
                                    <li><a href="https://www.du.ac.bd/news"><i class="fas fa-angle-double-right"></i>
                                            Latest
                                            News</a>
                                    </li>
                                    <li><a href="https://www.du.ac.bd/events"><i class="fas fa-angle-double-right"></i>
                                            Events</a>
                                    </li>
                                    <li><a href="https://www.du.ac.bd/du_tender"><i
                                                class="fas fa-angle-double-right"></i> Tender</a>
                                    </li>
                                    <li><a href="http://7college.du.ac.bd/" target="_blank"><i
                                                class="fas fa-angle-double-right"></i>
                                            Affiliated Colleges</a></li>



                                    <li><a href="https://www.du.ac.bd/du_barta"><i
                                                class="fas fa-angle-double-right"></i> DU Barta</a>
                                    </li>
                                    <li><a href="https://www.du.ac.bd/media"><i class="fas fa-angle-double-right"></i>
                                            Media</a>
                                    </li>

                                    <li><a href="https://apa.du.ac.bd/"><i class="fas fa-angle-double-right"></i> APA
                                        </a></li>
                                </ul>
                            </li>






                        </ul>
                        <!---Navbar Megamenu End-->


                    </div><!-- /.navbar-collapse -->
                </div>
            </nav>
            <!-- End Navigation -->

            <!--noor right menu -->

        </header>
        <!-- End Header -->