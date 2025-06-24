<style>
    .faculty-profile-banner {
        height: 200px;
        /* background-image: linear-gradient(
                rgba(13, 202, 76, 0.75),
                rgba(1, 39, 11, 0.75)
            ),
            url("../img/bup/banner.jpg"); */
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        /* margin-top: 110px; */
    }
    .faculty-profile-banner {
        /* background-color: linear-gradient(rgba(13, 202, 76, 0.75), rgba(1, 39, 11, 0.75)), url(https://bup.edu.bd/upload/banner/20230301_1677671258.jpg); */
        z-index: 1;
        position: relative;
        /* margin-top: 4rem; */
    }

    .faculty-profile-banner::before {
        position: absolute;
        content: '';
        width: 100%;
        height: 100%;
        z-index: -1;
        top: 0;
        left: 0;
        background: linear-gradient(rgba(13, 196, 202, 0.75), rgba(1, 36, 39, 0.75));
    }
</style>

<div class="faculty-profile-banner d-flex justify-content-center align-items-center" 
style="background-image: url( {{ @$banner->image ? asset('upload/banner/' . $banner->image) : asset('frontend/assets/img/butex/banner-butex.png') }} ) ">
    <h1 class="text-white">{{ $page_title }}</h1>
</div>