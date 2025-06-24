<style>
    /* .faculty-profile-banner {
        background-image: linear-gradient(#000, #555),
        url({{ @$banner->image ? asset('upload/banner/'. $banner->image ): '' }});
    } */
    .faculty-profile-banner {
        background-image: url({{ @$banner->image ? asset('upload/banner/'. $banner->image ): '' }});
        height: 350px;
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
</style>

<section>
    <div class="faculty-profile-banner d-flex justify-content-center align-items-center text-center">
        
    </div>
</section>
