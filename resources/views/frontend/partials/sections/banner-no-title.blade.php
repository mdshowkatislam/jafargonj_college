<style>
    .faculty-profile-banner {
        background-image: linear-gradient(#000, #555),
         url({{ @$banner->image ? asset('upload/banner/'. $banner->image ): '' }});
         background-repeat: no-repeat; /* Moved outside of the background-image property */
    }
 </style>


<div class="clearfix"></div>
<div class="breadcrumb-area text-center text-light faculty-profile-banner">
    
</div>
