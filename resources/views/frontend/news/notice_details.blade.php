@extends('frontend.landing')
@php
    $page_title = $info->title;
@endphp
@section('title')
    {{ $page_title }}
@endsection
@section('content')
    {{-- <div class="clearfix"></div>

    <div class="breadcrumb-area shadow dark text-center text-light"
         style="background-image: url(http://localhost/butex-website/upload/banner/banner-butex.png); background-repeat: no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h2>Notice</h2>
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/') }}"><i class="fas fa-home"></i> Home</a></li>
                        <li class="active">Notice</li>
                    </ul>
                </div>
            </div>
        </div>
    </div> --}}

    @include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])

    <div class="course-details-area default-padding">
        <div class="container">
            <div class="row">
                <!-- Start Course Info -->
           
            
              
                <div class="col-md-8">
                    <div class="courses-info">
                        <div class="tags pull-right">
                            <a href="#"
                               style="text-decoration: none !important;"><i class="fas fa-calendar-alt"></i>
                                Published: {{ date('d M,Y',strtotime(@$info->date)) }}</a>
                        </div>
                        <div class="clearfix"></div>
                        <h3 class="">
                           {!! @$info->title !!}
                        </h3>
                        <div class="clearfix"></div>
                        <div class="tab-info">
                            <div class="tab-content tab-content-info">
                                <div id="tab1"
                                     class="tab-pane fade active in">
                                        <div class="info title text-justify colored-link">
                                            <img style="height: 280px; width:300px" src="{{ asset('/upload/news/'.@$info->image) }}"  alt="">
                                       <br>
                                       <br>
                                   
                                          <p>
                                            <a href="{{ asset('/upload/news/'.@$info->file) }}" target="_blank">Open PDF in New Tab</a>
                                            </p>

                                        <p>
                                            {{--  <a href="https://ssl.du.ac.bd/images/project guide line 24-25 (1)_1716109974.pdf">গাইডলাইন</a>  --}}
                                        </p>
                                        <div class="clearfix"></div>
                                        <div class="sharethis-inline-share-buttons"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
         
                <div class="col-md-4">
                    <div class="top-author">
                        <h4>Notice</h4>
                        <div class="author-items">
                            @foreach($notice as $item)
                          
                            <div class="item">
                                <div class=" text-justify">
                                    <h5>
                                         <a href="{{ route('notice.details',$item->id) }}"
                                           target="_blank">
                                           {{  $item->title}}
                                        </a></h5>
                                    <ul>
                                        <li class="border">
                                            <span>
                                                Published: {{ date('d M,Y',strtotime($item->date)) }}</span>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            @endforeach
                        
                            <a href="{{ route('notice.all') }}">View All <i class="fas fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
