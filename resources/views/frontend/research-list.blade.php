@extends('frontend.landing')

@php
    if ($research_type == 'chsr') {
        $page_title = 'CHSR Research';
    } elseif ($research_type == 'faculty') {
        $page_title = 'Faculty Research';
    } elseif ($research_type == 'bb') {
        $page_title = 'Bangabondhu Chair Research';
    } elseif ($research_type == 'ongoing') {
        $page_title = 'Ongoing Research';
    } else {
        $page_title = 'All Research';
    }
@endphp
@section('title')
    {{ $page_title }}
@endsection
<style>
    .download-btn {
        border: 2px solid #ffb606;
        color: #002147;
        border-radius: 24px;
        width: 10rem;
        text-align: center;
        padding-top: 2px;
        padding-bottom: 2px;
        margin-bottom: 16PX;
        font-weight: 500;
    }

    .download-btn:hover {
        color: #002147 !important;
        background-color: #ffb606;
    }

    .search-box:focus {
        box-shadow: none !important;
    }
</style>
@section('content')
    {{-- Banner --}}
    <div class="clearfix"></div>
    <div class="breadcrumb-area shadow dark  text-center text-light"
         style="background-image: url(http://localhost/butex-website/upload/banner/banner-butex.png); background-repeat: no-repeat;">
    </div>

    <!-- Section -->
    <div class="blog-area single full-blog right-sidebar full-blog default-padding">
        <div class="container">
            <div class="row">
                <div class="blog-items">
                    <div class="panel panel-primary ">
                        <div class="panel-heading"
                             id="heading-gradiant">
                            <div class="col-sm-10">
                                Research News
                            </div>
                            <div class="col-sm-2 text-right">
                                {{--  <a href="#"
                                   class="btn btn-info btn-xs"> Refresh</a>  --}}
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body text-justify">
                            <div class="col-sm-12"
                                 style="margin-bottom: 10px;background-color: #eee;padding:10px;border-radius: 5px">
                                <form action=""
                                      method="post"
                                      id="searchingForm">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <input type="text"
                                                   id="eventSearching"
                                                   class="form-control"
                                                   onkeyup="autoCompleteSearchingPosting(this)"
                                                   placeholder="Search By Research News Title">
                                            <input type="hidden"
                                                   name="eventSearchingId"
                                                   id="eventSearchingId">
                                            <input type="hidden"
                                                   id="type"
                                                   name="type"
                                                   value="6">
                                        </div>
                                        <div class="col-sm-6 ">
                                            <div class="col-sm-offset-1 col-sm-4">
                                                <input type="text"
                                                       name="fromDate"
                                                       id="fromDate"
                                                       class="form-control datepicker"
                                                       placeholder="Search From Date">
                                            </div>

                                            <div class="col-sm-4">
                                                <input type="text"
                                                       name="toDate"
                                                       id="toDate"
                                                       class="form-control datepicker"
                                                       placeholder="Search To Date">
                                            </div>
                                            <div class="col-sm-3">
                                                <button type="button"
                                                        onclick="searchingEventInfo()"
                                                        class="btn btn-primary btn-sm"><i class="fa fa-search"></i>
                                                    Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-offset-4 col-sm-4">
                                {{--  <img class="loadlater"
                                     src="https://www.du.ac.bd/fontView/assets/img/loaderNew.gif"
                                     style="height: 50px;display: none" />  --}}
                            </div>
                            <div class="blog-content col-md-8"
                                 id="showInfo">
                                <div class="content-items">
                                    <div class="row">
                                        @foreach ($infos as $item)
                                            <div class="col-md-6 single-item">
                                                <div class="item">
                                                    <div class="thumb">
                                                        <a target="_blank"
                                                           href="">
                                                            <img src="{{ asset('/upload/journal/' . $item->image) }}"
                                                                 style="height: 240px;width: 100%;"
                                                                 alt="Thumb">
                                                        </a>
                                                    </div>
                                                    <div class="info">
                                                        <div class="meta">
                                                            <ul>
                                                                <li style="text-transform: capitalize!important;">
                                                                    <i class='fas fa-calendar-alt'></i>
                                                                    {{ date('d M,Y', strtotime($item->date)) }}

                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="content">
                                                            <h4 class="text-justify"
                                                                style="height: 150px">
                                                                <a target="_blank"
                                                                   href="">{{ $item->title }}
                                                                </a>
                                                            </h4>
                                                            <a target="_blank"
                                                               href=""><i class="fas fa-plus"></i> Read More</a>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        @endforeach
                                        <div style="text-align: center">

                                        </div>


                                    </div>
                                    
                                </div>
                            
                            </div>
                            
                            <!-- Start Sidebar -->
                            @include('frontend.partials.side-link')
                        </div>
                        <style>
                            .active{
                                height: 50 !important;
                            }
                        </style>
                        <span style="display: inline-block !important">   
                              {{ $infos->links() }}</span>
                        <!-- End Start Sidebar -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
