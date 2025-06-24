
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    @include('frontend.partials.metas')

    @include('frontend.partials.head-new')
</head>

<body data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="0" data-new-gr-c-s-check-loaded="14.1169.0"
    data-gr-ext-installed="">
    <div class="wrapper">
        @include('frontend.partials.topbar')
        <!-- Header Section Start From Here -->
        @include('frontend.partials.header')
    
        @yield('content')
        <!-- Content Here -->

        <!-- Footer Area Start -->
        @include('frontend.partials.footer')
        @include('frontend.partials.footer-script')  
    </div>
</body>
</html>
