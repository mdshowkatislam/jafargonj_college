<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    @include('frontend.partials.metas')

    @include('frontend.partials.head')
    <link rel="stylesheet" href="{{ asset('frontend/css/office.css') }}">
</head>

<body>
    

    <!-- Navbar -->
    @include('frontend.partials.nav')

    @yield('content')
    
    <!-- Footer -->

    @include('frontend.partials.footer')

    @include('frontend.partials.footer-script')
</body>

</html>

