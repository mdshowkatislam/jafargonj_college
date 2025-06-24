<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <title>BUTEX | @yield('title')</title>
    @include('frontend.partials.metas')
    @include('frontend.layouts.script-header')

    <style>
        .bg-custom {
            background-color: #343a40; /* Custom UI color */
        }
        .footer a {
            color: #adb5bd;
            text-decoration: none;
        }
        .footer a:hover {
            color: #f8f9fa;
            text-decoration: none;
        }
        .shrink .navbar {
            color: #fafafa;
            background: #00c6ff;
            background: linear-gradient(35deg, #00c5bf 10%, #00bbff 90%);
        }
    </style>
    @stack('styles')
</head>

<body data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="0">
@include('frontend.journal.layouts.nav-menu')

@yield('content')

@include('frontend.layouts.footer-nabbar')
@include('frontend.layouts.script-footer')

@stack('scripts')

<script>
    (function($) {
        $( window ).scroll( function () {
            if ( $(document).scrollTop() > 200 ) {
                // Navigation Bar
                $('.navbar').removeClass('fadeIn');
                $('body').addClass('shrink');
                $('.navbar').addClass('fixed-top animated fadeInDown');
            } else {
                $('.navbar').removeClass('fadeInDown');
                $('.navbar').removeClass('fixed-top');
                $('body').removeClass('shrink');
                $('.navbar').addClass('animated fadeIn');
            }
        });
    })(jQuery);
</script>
</body>

</html>
