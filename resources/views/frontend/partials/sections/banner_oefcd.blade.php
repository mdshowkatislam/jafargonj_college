{{-- <div class="faculty-profile-banner d-flex justify-content-center align-items-center">
    <h1 class="text-white">{{$page_title}}</h1>
</div> --}}
<style>
    .faculty-profile-banner {
        background-image: linear-gradient(rgba(13, 202, 76, 0.75),
                rgba(1, 39, 11, 0.75)),
            url({{  @$banner->image ? asset('upload/banner/' . $banner->image) : ''  }});
    }
</style>

<section>
    <div class=" mt-5"> 
        {{-- <div class="faculty-profile-banner d-flex justify-content-center align-items-center banner_img">
            <div class="col-md-3 profile-info my-5">   
                <h1 class="text-uppercase text-white font-poppins">{{$page_title}}</h1>
            </div>   
            <div class="col-md-9 "></div>  
        </div>  --}}
        <div class="faculty-profile-banner d-flex justify-content-center align-items-center">
            <h1 class="text-white text-center">{{ $page_title }}</h1>
        </div>
    </div> 
</section>
