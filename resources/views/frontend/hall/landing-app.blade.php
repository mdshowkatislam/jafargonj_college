<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Butex | @yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="@yield('meta_description', 'Construction Html5 Template')">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="Nano Information Technology">
    <meta name="generator" content="Nano Information Technology">
    <link rel="icon" href="{{ asset('images/logo/favicon.ico') }}" type="image/x-icon">

    <!-- External CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">

    <!-- Local CSS -->
    <link rel="stylesheet" href="{{ asset('hall_assets/plugins/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('hall_assets/plugins/animate/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('hall_assets/plugins/aos/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('hall_assets/plugins/venobox/venobox.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables/dataTables.bootstrap4.css') }}">
    <!-- <link href="{{ asset('frontend/assets/css/custom.css') }}" rel="stylesheet"> -->
    <!-- <link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet"> -->

    <link href="{{ asset('hall_assets/css/style.css') }}" rel="stylesheet">
    <script src="{{ asset('hall_assets/plugins/jQuery/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Inline Styles -->
    <style type="text/css">
        body{
            font-family: "Titillium Web", sans-serif;
        }
        .hall-header .navbar-nav .nav-item:hover {
            background-color: transparent;
            transition: 0.5s;
            color: white;
        }

        .hall-header .nav-item .dropdown-menu {
            padding: 10px;
        }

        .back-to-top {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 30px;
            z-index: 99;
            font-size: 18px;
            border: none;
            outline: none;
            background-color: red;
            color: white;
            cursor: pointer;
            padding: 15px;
            border-radius: 4px;
            scroll-behavior: smooth;
        }

        #back2Top:hover {
            background-color: #555;
        }

        .navbar-dark .navbar-brand {
            color: #fff;
            font-weight: 700;
            font-size: 18px;
            padding: 15px 0px;
        }

        .nav-fill .nav-item {
            border: 1px solid gray;
            color: #000;
        }

        .top-banner {
            margin-top: 80px;
            padding-top: 135px;
            padding-bottom: 100px;
        }

        @media only screen and (max-width: 990px) {
            .navbar-dark .nav-item>.dropdown-toggle::after {
                content: "+";
                float: right;
                font-size: 16px;
                font-weight: 700;
            }

            .navbar-dark .nav-item>.dropdown-toggle[aria-expanded="true"]::after {
                content: "-";
            }

            .dropdown-menu {
                background-color: transparent;
            }

            .navbar .dropdown-item {
                color: #fff;
                font-size: 16px;
                font-weight: 600;
            }

            .top-banner {
                margin-top: 80px;
                padding-top: 80px;
                padding-bottom: 30px;
            }
        }
    </style>

    @yield('hall_style')
</head>

<body id="butex-website">
    <a href="#" class="back-to-top"><i class="fa-solid fa-arrow-up"></i></a>

    @yield('content')
    <script src="{{ asset('hall_assets/plugins/aos/aos.js') }}"></script>
    <script src="{{ asset('hall_assets/plugins/venobox/venobox.min.js') }}"></script>
    <script src="{{ asset('hall_assets/plugins/filterizr/jquery.filterizr.min.js') }}"></script>
    <script src="{{ asset('hall_assets/plugins/scroll/jquery.autoscroll.js') }}"></script>
    <script src="{{ asset('hall_assets/plugins/google-map/gmap.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.easy-ticker.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery-ui.js') }}"></script>

    <!-- Main Script -->
    <script src="{{ asset('hall_assets/js/script.js') }}"></script>
    @stack('custom-scripts')
    <script>
        AOS.init();
    </script>
    <script type="text/javascript">

        // $('.link').click(function(e) {
        //     e.preventDefault();
        //     $.scrollTo('2000px', 300);
        // });
    </script>
    <script type="text/javascript">
        $(window).scroll(function() {
            var scroll = $(window).scrollTop();
            var height = $('.top-header').innerHeight();

            if (scroll >= 15) {
                $('.top-header').addClass('hide');
                $('.navigation').removeClass('nav-bg').css('margin-top', '-' + height + 'px');
            } else {
                $('.top-header').removeClass('hide');
                $('.navigation').addClass('nav-bg').css('margin-top', '0');
            }

            var showAfter = 100;
            if ($(this).scrollTop() > showAfter) {
                $('.back-to-top').fadeIn();
            } else {
                $('.back-to-top').fadeOut();
            }
        });

        $('.back-to-top').click(function() {
            $('html, body').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
    </script>
    @section('extraa_script')
    <script>
        $(function() {
            $('.demo').easyTicker({
                direction: 'up',
                easing: 'swing',
                speed: 'slow',
                interval: 3000,
                height: 'auto',
                visible: 0,
                mousePause: true,
                autoplay: false,
                controls: {
                    up: '.btnUp',
                    down: '.btnDown'
                }
            });
        });
    </script>
    <script>
        $('#dataTable').DataTable({
            paging: true,
            lengthChange: true,
            searching: true,
            ordering: true,
            info: false,
            autoWidth: true
        });
    </script>
    @endsection
    @yield('extraa_script')
</body>

</html>
