<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.partials.metas')

    @include('frontend.partials.head')
</head>

<body>
    
@include('frontend.department.tamplate_two.partials.header')

   @yield('content')

@include('frontend.department.tamplate_two.partials.footer')
@include('frontend.partials.footer-script')

</body>

</html>
