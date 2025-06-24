@php
   $design      = DB::table('cms_theme_designs')->where('page_id', @$page_id)->where('page_tab_id', @$page_tab_id)->first(); 
   $json_class  = json_decode(@$design->custom_class, true);
   $json_style  = json_decode(@$design->custom_style, true);
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    @include('frontend.partials.metas')
    @include('frontend.department.tamplate_four.partials.head')
</head>
<style>
    .faculty-profile-banner {
        /* background-color: linear-gradient(rgba(13, 202, 76, 0.75), rgba(1, 39, 11, 0.75)), url(https://bup.edu.bd/upload/banner/20230301_1677671258.jpg); */
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
        background: linear-gradient(rgba(13, 196, 202, 0.75), rgba(1, 36, 39, 0.75));
    }
</style>

<body>
    {{-- @include('frontend.preloader') --}}

    @include('frontend.department.tamplate_four.partials.header-second')

    @yield('content')

    {{-- @include('frontend.department.tamplate_four.partials.footer') --}}
    @include('frontend.layouts.footer-nabbar')
    @include('frontend.department.tamplate_four.partials.footer-script')

    @stack('scripts')

</body>

</html>
