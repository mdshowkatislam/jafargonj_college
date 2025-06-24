<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.partials.metas')

    @include('frontend.partials.head')
</head>

<body>
    {{-- @include('frontend.preloader') --}}

    @include('frontend.cpc.partials.header')

    @yield('content')

    {{-- @include('frontend.cpc.partials.footer') --}}
    @include('frontend.partials.footer')
    @include('frontend.partials.footer-script')

</body>

</html>
