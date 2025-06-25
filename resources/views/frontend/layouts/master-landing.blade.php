@php
    $design = DB::table('cms_theme_designs')->where('page_id', '1')->where('page_tab_id', '1')->first();
    $json_class = json_decode(@$design->custom_class, true);
    $json_style = json_decode(@$design->custom_style, true);
@endphp

<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type"
      content="text/html;charset=UTF-8" />

<head>
    <title>Jafargonj Mir Abdul Gafur College | @yield('title')</title>
    @include('frontend.partials.metas')
    @include('frontend.layouts.script-header')

    <style>
        .fixed-top {
            top: -40px;
            transform: translateY(40px);
            transition: transform .3s;
        }

        #navbar_top .navbar-nav .dropdown-menu {
            background: white;
        }

        .navbar .megamenu {
            left: 15%;
            right: 0;
            width: 70%;
            margin-top: 20px;
        }

        #navbar_top .navbar-nav .dropdown-menu li {
            padding: 6px 10px 0px 0px;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
            opacity: 1;
            visibility: visible;
            animation: slideDown 1s ease forwards;
        }

        #main-nav .nav-item .nav-link {
            color: #01000f;
            font-family: "Poppins", sans-serif;
        }

        #main-nav li {
            padding: 30px 0px;

        }

        .navbar .megamenu {
            padding: 1rem;
        }

        /* ============ desktop view ============ */
        @media all and (min-width: 992px) {
            .navbar .has-megamenu {
                position: static !important;
            }

            .navbar .megamenu {
                left: 5%;
                right: 0;
                width: 75%;
                margin: auto;
            }

        }

        /* ============ desktop view .end// ============ */
        /* ============ mobile view ============ */
        @media(max-width: 991px) {

            .navbar.fixed-top .navbar-collapse,
            .navbar.sticky-top .navbar-collapse {
                overflow-y: auto;
                overflow-x: hidden;
                max-height: 90vh;
                margin-top: 10px;
            }

            .navbar-toggler {
                background: #01000f;
                color: #ffffff;
            }

            #main_nav_butex {
                z-index: 9 !important;
                background: #ffffff;
            }

            .has-megamenu,
            .megamenu,
            .custom-nav-title {
                width: 100% !important;
                margin-left: 0 !important;
            }
        }

        @media(max-width: 420px) {
            .university_description {
                display: none !important;
            }
        }

        /* ============ mobile view .end// ============ */
        .top-search form button {
            background: transparent none repeat scroll 0 0;
            border: medium none;
            box-shadow: inherit;
            color: #666666;
            /* height: 50px; */
            position: absolute;
            right: 0;
            text-align: center;
            top: 43px;
            width: 50px;
            z-index: 9;
        }

        .top-search {
            background-color: #ffffff;
            border: medium none;
            border-radius: 10px;
            box-shadow: 0 10px 40px -15px rgba(0, 0, 0, 0.5);
            display: none;
            /* height: 500px; */
            position: absolute;
            right: 10px;
            top: 90px;
            z-index: 99;
            border: 1px solid #e7e7e7;
            background: linear-gradient(90deg, rgb(66, 215, 235) 0%, rgb(90, 157, 233) 49%);
            padding-top: 20px;
            padding-bottom: 20px;
            width: 400px
        }

        nav.bootsnav.navbar-default.small-pad .top-search {
            top: 90px;
        }

        nav.bootsnav.navbar-default.small-pad.logo-less .top-search {
            top: 75px;
        }

        .top-search input.form-control {
            background-color: white;
            border: medium none !important;
            box-shadow: inherit;
            color: #1c1c1c;
            padding: 0 20px;
        }

        .top-search .input-group-addon {
            background-color: transparent;
            border: medium none;
            color: #666666;
            padding-left: 0;
            padding-right: 0;
            position: absolute;
            right: 20px;
            top: 10px;
            z-index: 9;
        }

        .top-search .input-group-addon.close-search {
            cursor: pointer;
        }

        body {
            font-family: "Titillium Web", sans-serif !important;
            padding: 0px;
        }

        .custom-font-titillium-web {
            font-family: "Titillium Web", "Tiro Bangla", sans-serif !important;
        }

        .mycolorpink {
            color: #da347c !important;
        }

        .mycolorgreen {
            color: #1bcc7a !important;
        }

        .myplusclass i {
            color: #1C4370;
            transition: color 0.4s ease;
        }

        .myplusclass:hover {
            background-color: #1C4370;
            /* dark background on hover */
            transform: scale(1.05);
            /* slight zoom effect */
        }

        .myplusclass:hover i {
            color: white;
        }
    </style>
    @stack('styles')
</head>

<body data-aos-easing="ease"
      data-aos-duration="1200"
      data-aos-delay="0"
      style="overflow-x: hidden;">
    @include('frontend.layouts.scrool-top-menu')

    @yield('content')

    @include('frontend.layouts.footer-nabbar')
    @include('frontend.layouts.script-footer')

    @stack('scripts')

    <script type="text/javascript">
        $(function() {
            $('.singledatepicker').daterangepicker({
                    singleDatePicker: true,
                    showDropdowns: true,
                    autoUpdateInput: false,
                    // drops: "up",
                    autoApply: true,
                    locale: {
                        format: 'DD-MM-YYYY',
                        daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                        firstDay: 0
                    },
                    minDate: '01/01/1930',
                },
                function(start) {
                    this.element.val(start.format('DD-MM-YYYY'));
                    this.element.parent().parent().removeClass('has-error');
                },
                function(chosen_date) {
                    this.element.val(chosen_date.format('DD-MM-YYYY'));
                });

            $('.singledatepicker').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('DD-MM-YYYY'));
            });
        });
    </script>

    <script>
        AOS.init();

        document.addEventListener("DOMContentLoaded", function() {
            window.addEventListener('scroll', function() {
                if (window.scrollY > 200) {
                    document.getElementById('navbar_top').classList.add('fixed-top');
                    // add padding top to show content behind navbar
                    navbar_height = document.querySelector('.navbar').offsetHeight;
                    document.body.style.paddingTop = navbar_height + 'px';
                } else {
                    document.getElementById('navbar_top').classList.remove('fixed-top');
                    // remove padding top from body
                    document.body.style.paddingTop = '0';
                }
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            /////// Prevent closing from click inside dropdown
            document.querySelectorAll('.dropdown-menu').forEach(function(element) {
                element.addEventListener('click', function(e) {
                    e.stopPropagation();
                });
            })
        });

        // for datatable
        // $('#example').DataTable();
        /////////////////////////

        document.getElementById('toggleFormButton').addEventListener('click', function() {
            const form = document.getElementById('myForm');
            const icon = this.querySelector('i');
            if (form.style.display === 'none' || form.style.display === '') {
                form.style.display = 'block';
                this.innerHTML = '<i class="fa-solid fa-magnifying-glass"></i>';
            } else {
                form.style.display = 'none';
                this.innerHTML = '<i class="fa-solid fa-magnifying-glass"></i>';
            }
        });

        var cu = new counterUp({
            start: 0,
            duration: 6000,
            intvalues: true,
            interval: 100,
            prepend: '',
            append: ''
        });

        cu.start();

        CKEDITOR.config.allowedContent = true; // or configure allowed content in detail
    </script>
</body>

</html>
