<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    @include('frontend.partials.metas')
    @include('frontend.partials.head')
    <style>
    .short-nav .navbar-nav > li > a{
        color: white;
    }

    #hall-navbar .navbar{
        margin-bottom:0 !important;
    }
    .dropdown-menu{
     background-color: #fff !important;
    }
    </style>
</head>

<body data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="0" data-new-gr-c-s-check-loaded="14.1169.0" data-gr-ext-installed="">

        <!-- Header Section Start From Here -->
        @include('frontend.partials.hall-navbar')
    
        
        @yield('content')
        <!-- Content Here -->

        <!-- Footer Area Start -->
        @include('frontend.partials.footer')
        @include('frontend.partials.footer-script')
</body>

</html>