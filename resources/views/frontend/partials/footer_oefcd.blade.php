<style>
    .oefcd-footer-banner {
        background-color: #253b80;
        background-image: url({{ @$banner->image ? asset('upload/banner/' . $banner->image) : '' }});
        z-index: 1;
    }

    .oefcd-footer-banner::before {
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
    <div class="footer-top text-white oefcd-footer-banner" >
        <div class="container">
            <div class="row d-flex justify-content-between pb-4">
                <div class="col-lg-4 col-md-4 footer-contact pt-4">
                    <div class="d-flex align-items-center">
                        @include('frontend.partials.logo.bup_footer')
                        {{-- <img class="mr-2" src="{{ asset('frontend/assets/img/bup/logo.png') }}"
                            style="width: 10%; margin-top: -10px" /> --}}
                        <h3 class="fs-6 fw-bolder ms-2">
                            BANGLADESH UNIVERSITY OF <br> PROFESSIONALS
                        </h3>
                    </div>
                    <h3 class="fs-6 fw-bolder mt-2">
                        Office of the Evaluation, Faculty Curriculum Development (OEFCD)
                    </h3>
                    {{-- <div class="">
                        <p class="mb-0">Mirpur Cantonment, Dhaka-1216</p>
                        <p class="mb-0">Phone: +8809666790790</p>
                        <p class="mb-0">Fax: 88-028000443</p>
                        <p class="mb-0">Email: info@bup.edu.bd</p>
                    </div> --}}
                </div>

                <div class="col-lg-4 col-md-4 footer-links pt-4">
                    <div class="">
                        <p class="mb-0">{{ @$contacts->location }}</p>
                        <p class="mb-0">Phone: {{ @$contacts->phone }}</p>
                        <p class="mb-0">Fax: {{ @$contacts->fax }}</p>
                        <p class="mb-0">Email: {{ @$contacts->email }}</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 footer-links pt-4">
                    <li><a href="{{route('oefcd.staff')}}">Staff Training</a></li>
                    <li><a href="{{route('oefcd.oefcd_gallery')}}">Gallery</a></li>
                    <li><a href="{{route('oefcd.oefcd_faq')}}">FAQ</a></li>
                    <li><a href="{{ route('oefcd.document') }}">Downloads</a></li>
                    <li><a href="#">Contact</a></li>
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
