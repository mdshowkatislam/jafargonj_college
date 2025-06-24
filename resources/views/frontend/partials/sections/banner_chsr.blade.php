<style>
    .chsr-profile-banner {
        background-image: linear-gradient(rgba(13, 202, 76, 0.75),
                rgba(1, 39, 11, 0.75)),
            url({{ @$banner->image ? asset('upload/banner/' . $banner->image) : '' }});
    }

    .chsr-profile-banner {
        height: 200px;
        margin-top: 170px;

        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;

    }
</style>
<section>
    <div class="chsr-profile-banner d-flex justify-content-center align-items-center">
        <h1 class="fs-1 fw-bolder text-white font-poppins text-center">{{ $page_title }}</h1>
    </div>
</section>
