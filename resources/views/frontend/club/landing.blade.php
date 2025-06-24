@php
   $design      = DB::table('cms_theme_designs')->where('page_id', @$page_id)->where('page_tab_id', @$page_tab_id)->first(); 
   $json_class  = json_decode(@$design->custom_class, true);
   $json_style  = json_decode(@$design->custom_style, true);
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    @include('frontend.partials.metas')
    @include('frontend.faculty.tamplate_four.partials.head')
</head>

<body>
    @include('frontend.club.nav')

    @yield('content')

    @include('frontend.layouts.footer-nabbar')
    @include('frontend.faculty.tamplate_four.partials.footer-script')

    @stack('scripts')
</body>
</html>
