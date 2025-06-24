<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    @include('frontend.partials.metas')

    @include('frontend.partials.head')
    
</head>
 

<body>
    <!-- Navbar -->
    @include('frontend.partials.menus_oefcd')
    @php
        $page_title = "Project"
    @endphp
    @section('title'){{$page_title}} @endsection
    @include('frontend.partials.sections.banner', ['page_title' => $page_title])
    <!-- Contact -->
   
   
    <div class="container my-5" style="min-height:350px;"> 
        <h2>Content goes here ...</h2> 
    </div>






    @include('frontend.partials.footer_oefcd')

    @include('frontend.partials.footer-script')

  </body>

</html>