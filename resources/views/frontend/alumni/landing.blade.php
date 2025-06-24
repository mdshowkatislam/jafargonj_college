<!DOCTYPE html>
<html lang="en">
<head>
    @include('frontend.partials.metas')
    @include('frontend.faculty.tamplate_four.partials.head')
</head>

<body>
    @include('frontend.alumni.nav')

    @yield('content')

    @include('frontend.layouts.footer-nabbar')
    @include('frontend.faculty.tamplate_four.partials.footer-script')

    @stack('scripts')
</body>
</html>
