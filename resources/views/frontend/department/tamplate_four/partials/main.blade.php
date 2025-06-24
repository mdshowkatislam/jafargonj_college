<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.partials.metas')

    @include('frontend.partials.head')
</head>
<style>
    .faculty-profile-banner {
        /* background-color: linear-gradient(rgba(13, 202, 76, 0.75), rgba(1, 39, 11, 0.75)), url({{ asset('upload/banner/' . @$banner->image) }}); */
        z-index: 1;
        position: relative;
    }

    .faculty-profile-banner::before {
        position: absolute;
        content: '';
        width: 100%;
        height: 100%;
        z-index: -1;
        top: 0;
        left: 0;
        background: linear-gradient(rgba(13, 202, 76, 0.75), rgba(1, 39, 11, 0.75));
    }
</style>

<body>
    {{-- @include('frontend.preloader') --}}

    @include('frontend.department.tamplate_four.partials.header')

    @yield('content')

    @include('frontend.partials.footer')
    @include('frontend.partials.footer-script')

</body>

</html>
