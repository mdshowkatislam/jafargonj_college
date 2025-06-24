@extends('frontend.landing')

@php
$page_title = 'cpc';
@endphp
@section('title')
{{ $page_title }}
@endsection
 
@section('content')
 
<!-- ///////slider -->
<section> 
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="false">
        <div class="carousel-inner">
                            <div class="carousel-item active slider-img">
                    <img src="https://bup.nanohost.biz/upload/slider/20230210_1676007933987.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block" style="color:white; text-align:left">
                        <h1 class="text-uppercase fw-bold list-light"></h1>
                        <h5></h5>
                    </div>
                </div>
                            <div class="carousel-item  slider-img">
                    <img src="https://bup.nanohost.biz/upload/slider/20230210_1676007955718.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block" style="color:white; text-align:left">
                        <h1 class="text-uppercase fw-bold list-light"></h1>
                        <h5></h5>
                    </div>
                </div>
                    </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
 
<!-- Phd & Mphil -->
<section class="container">
    <div class=" d-flex justify-content-center align-items-center px-2 py-4 ">
      <h1 class="text-dark fs-6 mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit adipisicing elitisicing
        elit adipisicing elit..</h1>
    </div>
</section>
<section>
    <div class="chsr-Degree-section d-flex justify-content-center align-items-center ">
      <div class="container">
        <div class="row gx-5 justify-content-center">
          <div class="col-12 col-md-6 col-lg-5 mt-3 mb-5 border border-3 border-white mx-3">
            <h1 class="text-white text-center my-3" style="">MPhil</h1>
          </div>
          <div class="col-12 col-md-6 col-lg-5 mt-3 mb-5 border border-3 border-white mx-3">
            <h1 class="text-white text-center my-3" style="">Phd</h1>
          </div>
        </div>

      </div>
    </div>
</section>

 <!-- Message from the dean chsr -->
<section class="my-5">
    <div class="container align-items-center">
      <div class="row d-flex justify-content-between align-items-center">
        <div class="col-md col-lg-8  mt-0">
          <h1 class="text-uppercase fs-3 mb-0 fw-bold text-primary">Message from the dean chsr</h1>
          <p>Centre for Higher Studies and Research (CHSR) is mainly responsible for conducting the programmes like MPhil &amp; PhD. Besides running these programmes, the centre is involved in various research and project works. These project works are under taken by our researchers. With this motto, CHSR started its journey in the year 2011. The centre had its humble beginning under HEQEP. Faculty of General Study (Now Faculty of Arts and Social Sciences) was assigned with the responsibility of running the programmes initially. It continued till 2013. A separate office named Office of the Higher Studies and Research was established in the year 2013 to carry out the responsibility of running these programmes. Subsequently in the year 2015 (November) it turned into Centre named as CHSR. Presently a good number of professionals and academicians from diversified background are undergoing these programmes. CHSR is also directly involved in coordinating research works being carried out under&nbsp;<strong>Bangabandhu Sheikh Mujib Chair&nbsp;</strong>which was established on 26 December 2017. &nbsp; &nbsp;</p>
        </div>
        <div class="col-md col-lg-4">
          <div class="align-items-center">
            <img class="border border-5 border-primary rounded-circle" src="https://bup.nanohost.biz/upload/profiles/202303240239WhatsApp Image 2023-03-22 at 13.06.27.jpeg" onerror="this.onerror=null;this.src='https://bup.nanohost.biz/upload/user-dummy.jpeg';" alt="" height="230px">
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Video -->
<section class="" style="background-color:#2d3e50;">
    <div class="container">
      <div class="row d-flex justify-content-between align-items-center">
        <div class="col-12 col-lg-6 col-md-6">
                          <iframe src="https://www.youtube.com/embed/qv7C_yp3h5E" max-width="90%" style="border:0;max-width: 100%;" allowfullscreen="" width="100%;" height="320px" frameborder="0"></iframe>
                    </div>
        <div class=" col-12 col-lg-6 col-md-6 text-white">
          <p style="text-align:justify"><strong>History:</strong>&nbsp;The Office of International Affairs, under the Office of External Affairs was established in February 2015 at North South University. Since then, an International Affairs Officer has been a constant guide for the international students. Currently, the International Affairs Officer is Ms. Samina Alam Miti.</p>

  <p style="text-align:justify"><strong>Purpose:</strong>&nbsp;The purpose of the Office of International Affairs is to support both international students and institutional collaborations. The OIA has&nbsp;developed this guideline&nbsp;to help international organizations/students to know how to engage with and benefit from this office.</p>
        </div>
      </div>
    </div>
</section>

<!-- Our Research Person -->
<section>
    <div class="container mt-5">
      <h1 class=" text-danger fs-3 mb-0 text-center pb-3">Our Research Person</h1>
      <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-3 my-3">
          <div class="bg-danger card rounded-0 border-0" style="height: 350px;">
            <img class="card-img-top rounded-0 border-0" src="https://bup.nanohost.biz/upload/user-dummy.jpeg" onerror="this.onerror=null;this.src='https://bup.nanohost.biz/upload/user-dummy.jpeg';" alt="" height="250px">
            <div class="bs-social-icon position-absolute">
              <a href="#"><i class="bi bi-facebook"></i></a>
              <a href="#"><i class="bi bi-instagram"></i></a>
              <a href="#"><i class="bi bi-youtube"></i></a>
              <a href="#"><i class="bi bi-skype"></i></a>
            </div>

            <div class="card-body">
              <h5 class="card-title text-white fs-6 mt-0 text-center">
                
              </h5>
              <p class="card-text text-white text-center mb-0">
                
              </p>
            </div>

          </div>
        </div>
                <div class="col-12 col-md-6 col-lg-3 my-3">
          <div class="bg-danger card rounded-0 border-0" style="height: 350px;">
            <img class="card-img-top rounded-0 border-0" src="https://bup.nanohost.biz/upload/user-dummy.jpeg" onerror="this.onerror=null;this.src='https://bup.nanohost.biz/upload/user-dummy.jpeg';" alt="" height="250px">
            <div class="bs-social-icon position-absolute">
              <a href="#"><i class="bi bi-facebook"></i></a>
              <a href="#"><i class="bi bi-instagram"></i></a>
              <a href="#"><i class="bi bi-youtube"></i></a>
              <a href="#"><i class="bi bi-skype"></i></a>
            </div>

            <div class="card-body">
              <h5 class="card-title text-white fs-6 mt-0 text-center">
                
              </h5>
              <p class="card-text text-white text-center mb-0">
                
              </p>
            </div>

          </div>
        </div>
                <div class="col-12 col-md-6 col-lg-3 my-3">
          <div class="bg-danger card rounded-0 border-0" style="height: 350px;">
            <img class="card-img-top rounded-0 border-0" src="https://bup.nanohost.biz/upload/user-dummy.jpeg" onerror="this.onerror=null;this.src='https://bup.nanohost.biz/upload/user-dummy.jpeg';" alt="" height="250px">
            <div class="bs-social-icon position-absolute">
              <a href="#"><i class="bi bi-facebook"></i></a>
              <a href="#"><i class="bi bi-instagram"></i></a>
              <a href="#"><i class="bi bi-youtube"></i></a>
              <a href="#"><i class="bi bi-skype"></i></a>
            </div>

            <div class="card-body">
              <h5 class="card-title text-white fs-6 mt-0 text-center">
                
              </h5>
              <p class="card-text text-white text-center mb-0">
                
              </p>
            </div>

          </div>
        </div>
        
      </div>
    </div>
</section>




<!-- News, Events & Notice -->
<section>
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md shadow-lg p-3 mb-5 bg-white rounded">
          <h1 class="bg-info text-white text-uppercase py-2 px-2 fs-3 mb-0 mt-0 " style="width: 100%;">Events</h1>
                      <div class="d-flex justify-content-start align-items-center mt-3">
              <div class="col-lg-2">
                <a href="https://bup.nanohost.biz/events/details/36">
                  <img class="" src="https://bup.nanohost.biz/upload/news/20230212_1676180148.jpg" style="width: 70px; height: 70px">
                </a>
              </div>
              <div class="col-lg-10 ms-4">
                <a href="https://bup.nanohost.biz/events/details/36" class="text-decoration-none">
                  <p class="mb-0">12 Feb 2023</p>
                  <h1 class="fs-5">BUP Career Edge 2021</h1>
                </a>
              </div>
            </div>
                    <div class="d-flex justify-content-start align-items-center mt-3">
              <div class="col-lg-2">
                <a href="https://bup.nanohost.biz/events/details/35">
                  <img class="" src="https://bup.nanohost.biz/upload/news/20230212_1676180037.jpg" style="width: 70px; height: 70px">
                </a>
              </div>
              <div class="col-lg-10 ms-4">
                <a href="https://bup.nanohost.biz/events/details/35" class="text-decoration-none">
                  <p class="mb-0">12 Feb 2023</p>
                  <h1 class="fs-5">Webinar on "Rising Teen-G...</h1>
                </a>
              </div>
            </div>
                    <div class="d-flex justify-content-start align-items-center mt-3">
              <div class="col-lg-2">
                <a href="https://bup.nanohost.biz/events/details/33">
                  <img class="" src="https://bup.nanohost.biz/upload/news/20230212_1676179578.jpg" style="width: 70px; height: 70px">
                </a>
              </div>
              <div class="col-lg-10 ms-4">
                <a href="https://bup.nanohost.biz/events/details/33" class="text-decoration-none">
                  <p class="mb-0">12 Feb 2023</p>
                  <h1 class="fs-5">MIC- Make It Count 2022</h1>
                </a>
              </div>
            </div>
                    <div class="d-flex justify-content-start align-items-center mt-3">
              <div class="col-lg-2">
                <a href="https://bup.nanohost.biz/events/details/31">
                  <img class="" src="https://bup.nanohost.biz/upload/news/20230212_1676179449.jpg" style="width: 70px; height: 70px">
                </a>
              </div>
              <div class="col-lg-10 ms-4">
                <a href="https://bup.nanohost.biz/events/details/31" class="text-decoration-none">
                  <p class="mb-0">12 Feb 2023</p>
                  <h1 class="fs-5">BUP Film Fest, 22 ( openi...</h1>
                </a>
              </div>
            </div>
                    <div class="d-flex justify-content-start align-items-center mt-3">
              <div class="col-lg-2">
                <a href="https://bup.nanohost.biz/events/details/30">
                  <img class="" src="https://bup.nanohost.biz/upload/news/20230212_1676179211.jpg" style="width: 70px; height: 70px">
                </a>
              </div>
              <div class="col-lg-10 ms-4">
                <a href="https://bup.nanohost.biz/events/details/30" class="text-decoration-none">
                  <p class="mb-0">12 Feb 2023</p>
                  <h1 class="fs-5">Trust Bank BUP IV (Inter...</h1>
                </a>
              </div>
            </div>
                </div>
        <div class="col-lg-4 col-md shadow-lg p-3 mb-5 bg-white rounded">
          <h1 class="bg-info text-white text-uppercase py-2 px-2 fs-3 mb-0 mt-0 " style="width: 100%;">News</h1>
                      <div class="d-flex justify-content-start align-items-center mt-3">
              <div class="col-lg-2">
                <a href="https://bup.nanohost.biz/events/details/15">
                  <img class="" src="https://bup.nanohost.biz/upload/news/20230307_1678176590.jpg" style="width: 70px; height: 70px">
                </a>
              </div>
              <div class="col-lg-10 ms-4">
                <a href="https://bup.nanohost.biz/events/details/15" class="text-decoration-none">
                  <p class="mb-0">12 Feb 2023</p>
                  <h1 class="fs-5">Visit of Professor Adam M...</h1>
                </a>
              </div>
            </div>
                    <div class="d-flex justify-content-start align-items-center mt-3">
              <div class="col-lg-2">
                <a href="https://bup.nanohost.biz/events/details/14">
                  <img class="" src="https://bup.nanohost.biz/upload/news/20230212_1676175063.jpg" style="width: 70px; height: 70px">
                </a>
              </div>
              <div class="col-lg-10 ms-4">
                <a href="https://bup.nanohost.biz/events/details/14" class="text-decoration-none">
                  <p class="mb-0">08 Feb 2023</p>
                  <h1 class="fs-5">Inter-Department Badminto...</h1>
                </a>
              </div>
            </div>
                    <div class="d-flex justify-content-start align-items-center mt-3">
              <div class="col-lg-2">
                <a href="https://bup.nanohost.biz/events/details/13">
                  <img class="" src="https://bup.nanohost.biz/upload/news/20230212_1676175621.jpg" style="width: 70px; height: 70px">
                </a>
              </div>
              <div class="col-lg-10 ms-4">
                <a href="https://bup.nanohost.biz/events/details/13" class="text-decoration-none">
                  <p class="mb-0">18 Jan 2023</p>
                  <h1 class="fs-5">Visit of DA, UK to BUP</h1>
                </a>
              </div>
            </div>
                    <div class="d-flex justify-content-start align-items-center mt-3">
              <div class="col-lg-2">
                <a href="https://bup.nanohost.biz/events/details/12">
                  <img class="" src="https://bup.nanohost.biz/upload/news/20230212_1676175847.jfif" style="width: 70px; height: 70px">
                </a>
              </div>
              <div class="col-lg-10 ms-4">
                <a href="https://bup.nanohost.biz/events/details/12" class="text-decoration-none">
                  <p class="mb-0">18 Jan 2023</p>
                  <h1 class="fs-5">MoU signed between Three...</h1>
                </a>
              </div>
            </div>
                    <div class="d-flex justify-content-start align-items-center mt-3">
              <div class="col-lg-2">
                <a href="https://bup.nanohost.biz/events/details/11">
                  <img class="" src="https://bup.nanohost.biz/upload/news/20230212_1676175952.jpg" style="width: 70px; height: 70px">
                </a>
              </div>
              <div class="col-lg-10 ms-4">
                <a href="https://bup.nanohost.biz/events/details/11" class="text-decoration-none">
                  <p class="mb-0">18 Jan 2023</p>
                  <h1 class="fs-5">Fresher’s Reception of MP...</h1>
                </a>
              </div>
            </div>
                </div>
        <div class="col-lg-4 col-md shadow-lg p-3 mb-5 bg-white rounded">
          <h1 class="bg-info text-white text-uppercase py-2 px-2 fs-3 mb-0 mt-0 " style="width: 100%;">Notice</h1>
                      <div class="d-flex justify-content-start align-items-center mt-3">
              <div class="col-lg-2">
                <a href="https://bup.nanohost.biz/events/details/37">
                  <img class="" src="https://bup.nanohost.biz/upload/news/20230309_1678344728.jpg" style="width: 70px; height: 70px">
                </a>
              </div>
              <div class="col-lg-10 ms-4">
                <a href="https://bup.nanohost.biz/events/details/37" class="text-decoration-none">
                  <p class="mb-0">08 Nov 1978</p>
                  <h1 class="fs-5">Aute dicta voluptatu</h1>
                </a>
              </div>
            </div>
                    <div class="d-flex justify-content-start align-items-center mt-3">
              <div class="col-lg-2">
                <a href="https://bup.nanohost.biz/events/details/34">
                  <img class="" src="https://bup.nanohost.biz/upload/news/20230212_1676179953.png" style="width: 70px; height: 70px">
                </a>
              </div>
              <div class="col-lg-10 ms-4">
                <a href="https://bup.nanohost.biz/events/details/34" class="text-decoration-none">
                  <p class="mb-0">12 Feb 2023</p>
                  <h1 class="fs-5">BUPGAC presents BUP Inter...</h1>
                </a>
              </div>
            </div>
                    <div class="d-flex justify-content-start align-items-center mt-3">
              <div class="col-lg-2">
                <a href="https://bup.nanohost.biz/events/details/28">
                  <img class="" src="https://bup.nanohost.biz/upload/news/20230212_1676178809.png" style="width: 70px; height: 70px">
                </a>
              </div>
              <div class="col-lg-10 ms-4">
                <a href="https://bup.nanohost.biz/events/details/28" class="text-decoration-none">
                  <p class="mb-0">12 Feb 2023</p>
                  <h1 class="fs-5">BA-BSS Admission Circular...</h1>
                </a>
              </div>
            </div>
                    <div class="d-flex justify-content-start align-items-center mt-3">
              <div class="col-lg-2">
                <a href="https://bup.nanohost.biz/events/details/27">
                  <img class="" src="https://bup.nanohost.biz/upload/news/20230212_1676178710.png" style="width: 70px; height: 70px">
                </a>
              </div>
              <div class="col-lg-10 ms-4">
                <a href="https://bup.nanohost.biz/events/details/27" class="text-decoration-none">
                  <p class="mb-0">12 Feb 2023</p>
                  <h1 class="fs-5">MPH (Master of Public Hea...</h1>
                </a>
              </div>
            </div>
                    <div class="d-flex justify-content-start align-items-center mt-3">
              <div class="col-lg-2">
                <a href="https://bup.nanohost.biz/events/details/24">
                  <img class="" src="https://bup.nanohost.biz/upload/news/20230212_1676178509.png" style="width: 70px; height: 70px">
                </a>
              </div>
              <div class="col-lg-10 ms-4">
                <a href="https://bup.nanohost.biz/events/details/24" class="text-decoration-none">
                  <p class="mb-0">12 Feb 2023</p>
                  <h1 class="fs-5">LLM Professional Extended...</h1>
                </a>
              </div>
            </div>
                </div>
      </div>
    </div>
</section>

@endsection