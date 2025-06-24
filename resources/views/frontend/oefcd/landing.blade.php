<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    @include('frontend.partials.metas')

    @include('frontend.partials.head')
</head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" />
<style>
    body {
        overflow-x: hidden
    }

    .oefcd_about p {
        text-align: justify !important;
        color: #fff !important;
    }

    .section_two {
        background-image: url(frontend/assets/img/oefcd/bg2.jpg);
        background-color: #4db151;
        background-position: right top;
        background-repeat: repeat-y;
        background-size: 52%;
    }

    .banner_img {
        background-image: url(../frontend/assets/img/oefcd/banner.jpg);
        background-position: right top;
        background-size: 70% 100%;
        background-color: rgba(13, 202, 76, 0.75);
    }

    .lightboxContainer {
        position: relative;
        display: inline-block;
    }

    .lightboxContainer:after {
        content: url("frontend/assets/img/oefcd/playbutton.png");
        z-index: 999;
        position: absolute;
        cursor: pointer;
        top: 50%;
        left: 50%;
        margin-left: -32px;
        margin-top: -32px;
        opacity: 0.8;
    }

    .lightboxContainer:hover:after {
        opacity: 1;
    }

    .lightboxContainer img {
        width: 100%;
        height: 450px;
    }

    .carousel-item .d-block {
        height: 500px;
    }

  

    .section_three {
        background-image: url(frontend/assets/img/oefcd/bg3.jpg);
        background-position: right top;
        background-repeat: repeat-y;
        background-size: 42.1%;
    }

    .main-div {
        position: relative;
        height: 500px;
    }

    .main-nav {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        margin: 0;
        padding: 0;
        width: 600px;
        height: 150px;
    }

    .main-nav li {
        list-style: none;
        position: absolute;
        width: 185px;
        height: 185px;
        /* background: #000; */
        transform: rotate(45deg);
        transition: 0.5s;
        margin: -100px;
        /* overflow: hidden; */
        /* opacity: 1; */
        cursor: pointer;
    }

    .item1 div:hover {
        /* opacity: 0.7; */
        color: #000 #;
    }

    .main-nav .item-icon {
        transform: rotate(-45deg);
        transition: 0.5s;
        width: 40%;
        margin-top: 15px;
        margin-left: 15px;
    }

    .main-nav .item-title {
        transform: rotate(-45deg);
        text-align: center;
        color: #fff;
        line-height: 18px;
        font-size: 14px;
        font-weight: 600;
    }

    .main-nav .item-title3 {
        margin-left: 20px;
        margin-top: -5px;
    }

    .main-nav .item-title4 {
        margin-left: 15px;
    }

    .main-nav .item-title5 {
        margin-left: 11px;
    }

    .main-nav li.item1 {
        top: 0;
        left: 0;
        z-index: 9;
        /* background-image: url(frontend/assets/img/oefcd/a.jpg);
    background-size: 25px;
    background-position: 169px 86px;
    background-repeat: no-repeat; */
    }

    .main-nav li.item2 {
        bottom: 16px;
        left: 24%;
        z-index: 8;
    }

    .main-nav li.item3 {
        top: -3px;
        left: 47%;
        z-index: 7;
    }

    .main-nav li.item4 {
        bottom: 17px;
        left: 70.2%;
        z-index: 6;
    }

    .main-nav li.item5 {
        top: 0px;
        right: 50px;
    }

    .main-nav li .bg,
    .main-nav li .bg_border {
        width: 100%;
        height: 100%;
        /* transform: scale(1.1); */
    }

    .main-nav li .bg_width {
        width: 160px;
        height: 160px;
    }

    .main-nav li.item1 .bg_border {
        border: 1px solid #05bcc0;
        border-radius: 30px;
    }

    .main-nav li.item1 .bg {
        background: #05bcc0;
        border-radius: 30px;
        margin-top: 10px;
        margin-left: 10px;
        /*! box-shadow: 9px 4px 12px 3px rgba(0,0,0,0.75); */
        -webkit-box-shadow: 9px 7px 10px -2px rgba(23, 23, 23, 0.51);
        -moz-box-shadow: -2px 4px 12px 3px rgba(0, 0, 0, 0.75);
    }

    .main-nav li.item1 .arrow {
        position: absolute;
        bottom: 41%;
        right: -27px;
        width: 30px;
    }

    .main-nav li.item2 .bg_border {
        border: 1px solid #a3ce38;
        border-radius: 30px;
    }

    .main-nav li.item2 .bg {
        /* background: url(frontend/assets/img/oefcd/d2.jpg);
    background-size: cover;
    background-position: center; */
        background: #a3ce38;
        border-radius: 30px;
        margin-top: 10px;
        margin-left: 10px;
        /*! box-shadow: 9px 4px 12px 3px rgba(0,0,0,0.75); */
        -webkit-box-shadow: 9px 7px 10px -2px rgba(23, 23, 23, 0.51);
        -moz-box-shadow: -2px 4px 12px 3px rgba(0, 0, 0, 0.75);
    }

    .main-nav li.item2 .arrow {
        position: absolute;
        top: -32px;
        left: 82px;
        width: 30px;
    }

    .main-nav li.item3 .bg_border {
        border: 1px solid #f76059;
        border-radius: 30px;
    }

    .main-nav li.item3 .bg {
        /* background: url(frontend/assets/img/oefcd/d3.jpg);
    background-size: cover;
    background-position: center; */
        background: #f76059;
        border-radius: 30px;
        margin-top: 10px;
        margin-left: 10px;
        /*! box-shadow: 12px 4px 12px 3px rgba(0,0,0,0.75); */
        -webkit-box-shadow: 12px 7px 5px -2px rgba(68, 67, 67, 0.51);
        -moz-box-shadow: -2px 4px 12px 3px rgba(0, 0, 0, 0.75);
    }

    .main-nav li.item3 .arrow {
        position: absolute;
        bottom: 66px;
        right: -25px;
        width: 30px;
    }

    .main-nav li.item4 .bg_border {
        border: 1px solid #efa222;
        border-radius: 30px;
    }

    .main-nav li.item4 .bg {
        /* background: url(frontend/assets/img/oefcd/d4.png);
    background-size: cover;
    background-position: center; */
        background: #efa222;
        border-radius: 30px;
        margin-top: 10px;
        margin-left: 10px;
        /*! box-shadow: 9px 4px 12px 3px rgba(0,0,0,0.75); */
        -webkit-box-shadow: 9px 7px 10px -2px rgba(23, 23, 23, 0.51);
        -moz-box-shadow: -2px 4px 12px 3px rgba(0, 0, 0, 0.75);
    }

    .main-nav li.item4 .arrow {
        position: absolute;
        top: -35.4px;
        right: 75px;
        width: 30px;
    }

    .main-nav li.item5 .bg_border {
        border: 1px solid #8f4882;
        border-radius: 30px;
    }

    .main-nav li.item5 .bg {
        /* background: url(frontend/assets/img/oefcd/d5.png);
    background-size: cover;
    background-position: center; */
        background: #8f4882;
        border-radius: 30px;
        margin-top: 10px;
        margin-left: 10px;
        box-shadow: 14px 13px 0px -7px rgb(132, 185, 135);
    }

    @media (min-width:1920px) {
        .carousel-item .d-block {
            height: 600px;
        }

        .main-div {
            height: 600px;
        }

        .main-nav {
            width: 860px;
        }

        .main-nav .item-icon {
            margin-top: 20px;
            margin-left: 20px;
        }

        .main-nav .item-title {
            line-height: 25px;
            font-size: 19px;
            margin-left: 20px;
            margin-top: -8px;
        }

        .main-nav li {
            width: 235px;
            height: 235px;
        }

        .main-nav li .bg_width {
            width: 210px;
            height: 210px;
        }

        .main-nav li.item1 {
            bottom: -72px;
            left: 0 !important;
        }

        .main-nav li.item2 .main-nav li.item1 {
            left: 0 !important;
        }

        .main-nav li.item2 {
            bottom: -71px;
            left: 23.5% !important;
        }

        .main-nav li.item2 .arrow {
            left: 110px;
        }

        .main-nav li.item3 {
            left: 47% !important
        }

        .main-nav li.item3 .arrow {
            bottom: 100px;
        }

        .main-nav li.item4 {
            bottom: -71px;
            left: 70.2%;
        }

        .main-nav li.item5 {
            right: 7px !important;
        }

        .profile-img {
            padding-left: 54px !important;
        }
    }

    @media (min-width:1680px) {
        .main-nav {
            width: 730px;
        }

        .main-nav li.item1 {
            left: 12%;
        }

        .main-nav li.item2 {
            left: 12%;
        }

        .main-nav li.item2 {
            left: 32%;
        }

        .main-nav li.item3 {
            left: 51%;
        }

        .main-nav li.item5 {
            right: 90px;
        }

        .profile-img {
            padding-left: 27px;
        }
    }

    @media (max-width:1440px) {
        .profile-img {
            padding-left: 0;
        }
    }

    @media (max-width:1366px) {
        .lightboxContainer img {
            height: 450px;
        }

        .profile-img {
            padding-left: 13px;
        }
    }

    @media (max-width:1280px) {
        .profile-img {
            padding-left: 4px;
        }

        .profile-img img {
            height: 442px;
        }
    }

    @media (max-width:1024px) {
        .profile-img {
            padding-left: 0px;
        }

        .profile-img img {
            height: 490px;
            width: 100%;
            /* margin-left: -5px; */
        }
    }

    @media (max-width:768px) {
        .section_two {
            background-size: 0%;
        }
        /* .oefcd-img{
            margin-bottom: 34px;
        } */
        .oefcd_about{
            padding-right: 0 !important;
        }
    }

    @media (max-width:600px) {
        .carousel-item .d-block {
            height: auto;
        }

        .main-nav {
            width: 450px;
        }

        .main-nav li {
            width: 100px;
            height: 100px;
        }

        .main-nav li .bg_width {
            width: 80px;
            height: 80px;
        }

        .main-nav .item-icon {
            width: 30px;
            margin-top: 15px;
            margin-left: 15px;
        }

        .main-nav .item-title {
            line-height: 9px;
            font-size: 8px;
            font-weight: 600;
            margin-left: 18px;
        }

        .main-nav li.item1 .bg,
        .main-nav li.item2 .bg,
        .main-nav li.item3 .bg,
        .main-nav li.item4 .bg,
        .main-nav li.item5 .bg,
        .main-nav li.item1 .bg_border,
        .main-nav li.item2 .bg_border,
        .main-nav li.item3 .bg_border,
        .main-nav li.item4 .bg_border,
        .main-nav li.item5 .bg_border {
            border-radius: 10px;
        }

        main-nav li.item1 .bg {
            -webkit-box-shadow: 4px 7px 10px -2px rgba(23, 23, 23, 0.51);
        }

        .main-nav li.item1 {
            top: 5px;
            left: 29%;
        }

        .main-nav li.item1 .arrow {
            bottom: 41%;
            right: -18px;
            width: 20px;
        }

        .main-nav li.item2 {
            top: 65%;
            left: 45%;
        }

        .main-nav li.item2 .arrow {
            top: -21px;
            left: 38px;
            width: 20px;
        }

        .main-nav li.item3 {
            top: 5%;
            left: 61%;
        }

        .main-nav li.item3 .bg {
            -webkit-box-shadow: 7px 7px 5px -2px rgba(68, 67, 67, 0.51);
        }

        .main-nav li.item3 .arrow {
            right: -16px;
            width: 20px;
            bottom: 40px;
        }

        .main-nav li.item4 {
            top: 66%;
            left: 76.5%;
        }

        .main-nav li.item4 .bg {
            -webkit-box-shadow: 7px 7px 5px -2px rgba(68, 67, 67, 0.51);
        }

        .main-nav li.item4 .arrow {
            top: -23.4px;
            right: 43px;
            width: 20px;
        }

        .main-nav li.item5 {
            top: 10px;
            right: 30%;
        }

        .main-nav li.item5 .bg {
            box-shadow: 13px 10px 5px -8px rgba(247, 228, 228, 0.51);
        }

        .section_two {
            background-image: unset;
        }

        .profile-img {
            padding-left: 16px;
        }
    }
</style>

<body>
    {{-- @include('frontend.preloader') --}}
    <!-- Navbar -->
    @include('frontend.partials.menus_oefcd')

    @yield('content')

    <!-- Footer -->
    @include('frontend.partials.footer_oefcd')

    <script>
        $(function() {
            $('.popup-youtube, .popup-vimeo').magnificPopup({
                disableOn: 700,
                type: 'iframe',
                mainClass: 'mfp-fade',
                removalDelay: 160,
                preloader: false,
                fixedContentPos: false
            });
        });
    </script>

    @include('frontend.partials.footer-script')
</body>
