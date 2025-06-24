    <!-- ===== Footer section start ===== -->
    <style>
        .home-footer-banner {
            background-color: #253b80;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            z-index: 1;

        }

        .home-footer-banner::before {
            position: absolute;
            content: '';
            width: 100%;
            height: 100%;
            z-index: -1;
            top: 0;
            left: 0;
            background: #253b80;
            opacity: .8;
        }
    </style>
    <footer>
        {{-- <div class="footer-top text-white home-footer-banner pb-5" style=" background-image: url( {{ @$banner->image ? asset('upload/banner/' . $banner->image) : asset('frontend/assets/img/butex/banner-butex.jpg') }} ) " > --}}
        <div class="footer-top text-white home-footer-banner pb-5" style=" background-image: url( {{ asset('frontend/assets/img/butex/banner-butex.png') }} ) " >
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 footer-contact mt-5">
                        <div class="d-flex justify-content-center align-items-center ">
                            @include('frontend.partials.logo.bup_footer')
                            <h3 class="fs-6 fw-bolder">
                                Bangladesh University of Textiles
                            </h3>
                        </div>
                        <div class="mt-3">
                            <p class="mb-0">{{ @$contacts->location }}</p>
                            <p class="mb-0">Phone: {{ @$contacts->phone }}</p>
                            <p class="mb-0">Fax: {{ @$contacts->fax }}</p>
                            <p class="mb-0">Email: {{ @$contacts->email }}</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links mt-5">
                        <li><a href="{{ url('about') }}">About the University</a></li>
                        <li><a href="{{ route('career_list') }}">Career</a></li>
                        <li><a href="{{ route('procurement') }}">Procurement</a></li>
                        <li><a href="{{ route('noc_list') }}">NOC</a></li>
                        <li><a href="#">Admission</a></li>
                        {{-- <li><a href="{{ route('academics.programCategoryWiseProgram', 5) }}">MPhil Programs</a></li> --}}
                        {{-- <li><a href="{{ route('academics.programCategoryWiseProgram', 6) }}">PhD Programs</a></li> --}}
                        <li><a href="{{ route('chsr_home') }}">Research at BUTEX</a></li>
                        <li><a href="{{ route('ongoing_research') }}">Ongoing Research</a></li>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links mt-5">
                        {{-- <li><a href="{{ route('chsr_home') }}">Research at BUTEX</a></li> --}}
                        {{-- <li><a href="http://journal.BUTEX.edu.bd/" target="_blank">BUTEX Journal</a></li> --}}
                        {{--  <li><a href="{{ route('journal.list') }}">BUTEX Journal</a></li>  --}}
                        <li><a href="{{ route('pages', 11) }}">Anti Sexual Harassment</a></li>
                        <li><a href="https://login.microsoftonline.com/">Web Mail</a></li>
                        <li><a href="{{ route('downloads') }}">Downloads</a></li>
                        <li><a href="{{ route('facts_figures') }}">FAQ</a></li>
                        <li><a href="{{ route('office.office_details', 11) }}">Library</a></li>
                        <li><a href="{{ url('http://apa.BUTEX.edu.bd/') }}" target="_blank">APA</a></li>
                        <li><a href="{{ route('privacy_policy') }}">Privacy Policy</a></li>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links mt-5">
                        <div class="p-3 shadow-lg rounded">
                            <div class="social-icon d-flex">
                                <a href="https://www.facebook.com/BUTEXOfficialPage" target="_blank">
                                    <i class="bi bi-facebook rounded"></i>
                                </a>
                                <a href="https://www.youtube.com/@bangladeshuniversityofprof9662/videos"
                                    target="_blank">
                                    <i class="bi bi-youtube rounded m-0"></i>
                                </a>
                            </div>
                            <div class="number d-flex justify-content-between mt-3">
                                <img src="{{ asset('frontend/assets/img/BUTEX/number1.jpg') }}" style="width: 45%"
                                    class="rounded" />
                                <img src="{{ asset('frontend/assets/img/BUTEX/number2.jpg') }}" style="width: 45%"
                                    class="rounded" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-2 align-items-center" style="background: #179bd7 ">
            <div class="container text-white d-flex justify-content-between align-items-center">
                <div>
                    <p class="mb-0 fs-7">All Rights Reserved &copy; BUTEX, {{ date('Y') }}</p>
                </div>
                <div>
                    <p class="mb-0 fs-7">
                        Developed by
                        <a rel="nofollow" href="http://www.nanoit.biz/" target="_blank" class="text-white fw-bold">
                            <span>Nanosoft</span>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- ===== Footer section end ===== -->
