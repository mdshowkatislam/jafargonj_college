@php
   $design      = DB::table('cms_theme_designs')->where('page_id', @$page_id)->where('page_tab_id', @$page_tab_id)->first(); 
   $json_class  = json_decode(@$design->custom_class, true);
   $json_style  = json_decode(@$design->custom_style, true);
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    @include('frontend.partials.metas')
    {{-- @include('frontend.partials.head') --}}
    @include('frontend.faculty.tamplate_four.partials.head')
</head>

<body>
    {{-- @include('frontend.preloader') --}}

    @include('frontend.conference.header')

    @yield('content')

    {{-- @include('frontend.faculty.tamplate_three.partials.footer') --}}

    {{-- @include('frontend.faculty.tamplate_four.partials.footer') --}}
    @include('frontend.conference.footer')

    {{-- @include('frontend.partials.footer-script') --}}
    @include('frontend.faculty.tamplate_four.partials.footer-script')

    @stack('scripts')
</body>

</html>
