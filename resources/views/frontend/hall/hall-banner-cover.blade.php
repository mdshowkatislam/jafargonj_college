<style>
    .banner-cover-bg {
        background: rgb(2, 0, 36);
        background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(121, 71, 9, 1) 100%, rgba(0, 212, 255, 1) 100%);
        background-repeat: no-repeat;
        background-size: cover;
        height: 250px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 150px;
    }
</style>


<section class="shadow dark banner-cover-bg"
    style="background: url({{ @$bannerImageLink ? asset('upload/banner/' . @$bannerImageLink) : asset('frontend/banner/hall-banner2.png') }})">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="text-center text-white">{{ $page_title }}</h3>
            </div>
        </div>
    </div>
</section>