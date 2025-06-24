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

<!-- Footer -->
<footer>

    {{-- <div class="footer-top bg-secondary text-white" style=" background-image: url( {{ @$banner->image ? asset('upload/banner/' . $banner->image) : asset('frontend/assets/img/butex/banner-butex.jpg') }} ) " > --}}
    <div class="footer-top home-footer-banner text-white" style=" background-image: url( {{ asset('frontend/assets/img/butex/banner-butex.png') }} ) " >
      <div class="container">
        <div class="row d-flex justify-content-between">
          <div class="col-lg-4 col-md-6 footer-contact my-4">
            <div class="d-flex justify-content-center align-items-center">
                @include('frontend.partials.logo.bup_footer')
              <h3 class="fs-6 fw-bolder">
                Bangladesh University of Textiles
              </h3>
            </div>
            <div class="mt-3">
              <p class="mb-0">Mirpur Cantonment, Dhaka-1216</p>
              <p class="mb-0">Phone: +8809666790790</p>
              <p class="mb-0">Fax: 88-028000443</p>
              <p class="mb-0">Email: info@butex.edu.bd</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 footer-links my-5">
            <li><a href="#">Accessibility</a></li>
            <li><a href="#">Financial Aid</a></li>
            <li><a href="#">News & Events</a></li>
            <li><a href="#">Food Service</a></li>
            <li><a href="#">Notice Board</a></li>
            <li><a href="#">Directories</a></li>
          </div>

          <div class="col-lg-3 col-md-6 footer-links mt-5">
            <li><a href="#">Central Library</a></li>
            <li><a href="#">Financial Aid</a></li>
            <li><a href="#">Campus Safety</a></li>
            <li><a href="#">Registrar Office</a></li>
            <li><a href="#">Facility Services</a></li>
            <li><a href="#">Medical Center</a></li>
          </div>

          <div class="col-lg-2 col-md-6 footer-links mt-5">
            <li><a href="#">Nanosoft</a></li>
            <li><a href="#">Forms & Downloads</a></li>
            <li><a href="#">Result Archive</a></li>
            <li><a href="#">Residence Halls</a></li>
            <li><a href="#">Conference</a></li>
            <li><a href="#">Campus Attractions</a></li>
          </div>
        </div>
      </div>
    </div>

    <div class="py-2 align-items-center" style="background: #179bd7 ">
      <div class="container text-white d-flex justify-content-between align-items-center">
        <div>
          <p class="px-2 mb-0 fs-6">All rights Reserved &copy; BUTEX, {{date('Y')}}</p>
        </div>
        <div>
          <p class="mb-0 fs-6">
            Made with heart by <a href="http://www.nanoit.biz/" target="_blank"><span style="color: orange">Nanosoft</span></a>
          </p>
        </div>
      </div>
    </div>

</footer>
