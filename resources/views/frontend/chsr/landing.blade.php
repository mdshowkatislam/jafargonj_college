<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    @include('frontend.partials.metas')

    @include('frontend.partials.head')
</head>

<body>
    {{-- @include('frontend.preloader') --}}

    <!-- Navbar -->
    @include('frontend.partials.menus_chsr')

    @yield('content')
    
    <!-- Footer -->

    @include('frontend.partials.footer_chsr')

    @include('frontend.partials.footer-script')
</body>

</html>