<style>
    .chsr-footer-banner {
        background-color: #253b80;
        background-image: url({{ @$banner->image ? asset('upload/banner/' . $banner->image) : '' }});
        z-index: 1;
    }

    .chsr-footer-banner::before {
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
    <div class="footer-top text-white chsr-footer-banner pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 footer-contact mt-5">
                    <div class="d-flex justify-content-center align-items-center">
                        @include('frontend.partials.logo.bup_footer')
                        <h3 class="fs-6 fw-bolder">
                            BANGLADESH UNIVERSITY OF PROFESSIONALS
                        </h3>
                    </div>
                    <div class="mt-3">
                        <p class="mb-0">Centre For higher study and research</p>
                        <p class="mb-0">Phone: +8809666790790</p>
                        <p class="mb-0">Fax: 88-028000443</p>
                        <p class="mb-0">Email: info@bup.edu.bd</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 footer-links mt-5">
                    <li><a href="{{ route('chsr_about') }}">About CHSR</a></li>
                    <li><a href="{{ route('chsr_mphil') }}">MPhil</a></li>
                    <li><a href="{{ route('chsr_phd') }}">PhD</a></li>
                    <li><a href="{{ route('chsr_people') }}">CHSR People</a></li>
                    <li><a href="{{ route('all_chsr_notice') }}">Notice</a></li>
                    <li><a href="{{ route('chsr_faq') }}">FAQ</a></li>
                    <li><a href="{{ route('chsr_downloads') }}">Downloads</a></li>
                </div>

                <div class="col-lg-4 col-md-6 footer-links mt-5">
                    <div class="p-3 shadow-lg rounded">
                        <div class="social-icon d-flex">
                            <a href="https://www.facebook.com/BUPOfficialPage" target="_blank">
                                <i class="bi bi-facebook rounded"></i>
                            </a>
                            <a href="https://www.youtube.com/@bangladeshuniversityofprof9662/videos" target="_blank">
                                <i class="bi bi-youtube rounded m-0"></i>
                            </a>
                        </div>
                        <div class="number d-flex justify-content-between mt-3">
                            <img src="{{ asset('frontend/assets/img/bup/number1.jpg') }}" style="width: 45%"
                                class="rounded" />
                            <img src="{{ asset('frontend/assets/img/bup/number2.jpg') }}" style="width: 45%"
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
                <p class="mb-0 fs-7">All Rights Reserved &copy; BUP, {{ date('Y') }}</p>
            </div>
            <div>
                <p class="mb-0 fs-7">
                    Developed by
                    <a href="http://www.nanoit.biz/" target="_blank" class="text-white fw-bold">
                        <span>Nanosoft</span>
                    </a>
                </p>
            </div>
        </div>
    </div>
</footer>
