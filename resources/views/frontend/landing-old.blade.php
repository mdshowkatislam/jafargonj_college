<!DOCTYPE html>
<html class="no-js" lang="en">


<head>
    @include('frontend.partials.metas')

    @include('frontend.partials.head')
</head>

<body>
    {{-- @include('frontend.preloader') --}}
    <!-- Header Section Start From Here -->
    @include('frontend.partials.header')
    <!-- Header Section End Here -->

    @yield('content')
    <!-- Content Here -->

    <!-- Footer Area Start -->
    @include('frontend.partials.footer')
    <!-- Footer Area End -->
    <!-- Modal -->
    @include('frontend.partials.modal')

    @include('frontend.partials.footer-script')
</body>

</html>
