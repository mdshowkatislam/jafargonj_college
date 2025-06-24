@php
    $route_name=Route::currentRouteName();    
@endphp
@if($route_name=='news.all' || $route_name=='research_list')
@php
$class_name="col-md-4";
@endphp
  
     <style>
        .sidebar{
            padding-left: 35px; 
        }
        
          li {
            display: block;
            padding: 8px 0;
            position: relative;
          }
          li a {
            display: inline-block;
            /* text-transform: capitalize;*/
            padding-left: 25px;
            font-size: 14px;
          }
        </style>
        @else
        @php
$class_name="col-md-3";
@endphp
    @endif

<div class="sidebar {{ $class_name }}">
    <div class="aside">
        <div class="sidebar-item category">
            <div class="title">
                <h4>Useful Links</h4>
            </div>
            <ul>

                <li>Telephone and Email Index</li>
                <li>Butex Forms</li>
                <li>Approved NOCs</li>
                <li>E-Tender</li>
                <li>Butex Jobs</li>
                <li>Trust Funds</li>
                <li>Notice</li>
                <li>Scholarship Notice</li>
                <li>Latest News</li>
                <li>Events</li>
                <li>E-Tender</li>
                <li>Affiliated Colleges</li>
                <li>Butex Barta</li>
                <li>Butex in Media</li>
                <li>Contact Us</li>

            </ul>
        </div>
    </div>
</div>