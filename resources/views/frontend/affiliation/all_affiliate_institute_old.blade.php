<!-- ===== slider section start ===== -->
@extends('frontend.landing')
@php
    $page_title = 'Affiliated Institutes';
@endphp
@section('title')
    {{ $page_title }}
@endsection
<style>
    .affiliate-content:last-child{
        margin-bottom: 0 !important;
    }
    .affiliate-text p, .affiliate-text{
        font-size: 14px;
        margin: 0;
    }
    .search-box{
        border-top-right-radius: 0px !important; 
        border-bottom-right-radius: 0px !important; 
        font-size: 18px !important; 
        background-color: #fff !important; 
        border: none !important;
    }
    .search-box:focus {
        box-shadow: none !important;
    }
    .search-icon{
        width : 50px; 
        cursor: pointer; 
        border-radius: 0 !important; 
        background-color: #F2CD00 !important; 
        margin-left:-5px !important; 
        color: #fff !important; 
        justify-content: center;
    }

</style>
@section('content')
   
   
<!-- Start content ============================================= -->
<link rel="stylesheet" href="../fontView/assets/modules/pagination.css">
<div class="clearfix"></div>
<div class="breadcrumb-area shadow dark text-center text-light"
    style="background-image: url(../fontView/assets/img/details_info.jpg); background-repeat: no-repeat;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h1>Affiliated Colleges / Institutes</h1>
                <ul class="breadcrumb">
                    <li><a href="../index.html"><i class="fas fa-home"></i> Home</a></li>
                    <li class="active">Affiliated Colleges / Institutes</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="course-details-area default-padding">
    <div class="container">
        <div class="row">
            <!-- Start Course Info -->
            <div class="col-md-12">
                <div class="courses-info">
                    <!-- Star Tab Info -->
                    <div class="tab-info">
                        <!-- Start Tab Content -->
                        <div class="tab-content tab-content-info">
                            <!-- Single Tab -->
                            <div id="tab1" class="tab-pane fade active in">
                                <div class="info title">
                                    <div class="col-sm-12" style="margin-bottom: 20px;">
                                        <input type="text" id="searchName"
                                            onkeyup="searchCollegesInfo(this.value,'2')"
                                            placeholder="Search Affiliated Colleges / Institutes"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            @php
                                $affiliate_count=count($infos);
                            @endphp
                            <div class="top-course-items" id="show_result_colleges">
                                <h4 class="text-center" style="padding-bottom: 20px;">Total <span
                                        class="badge badge-secondary">{{ @$affiliate_count }}</span> Search
                                    Result found
                                </h4>
                                <div class="row">
                                    @foreach(@$infos as $item)
                                    <div class="col-md-4 col-sm-4 equal-height">
                                        <div class="item">
                                            <div class="thumb">
                                                <img src="{{ asset("/upload/affiliation/".@$item->image) }}"
                                                    alt="Thumb" style="height: 281px;">

                                            </div>
                                            <div class="info">
                                                <h4 class="min-height-45px text-left" style="word-spacing: 3px;">
                                                    @php
                                                    $loc_name=explode(',',$item->location); 
                                                    @endphp
                                                    <a href="{{ $item->url }}">{{ @$item->inst_name }}, {{ $loc_name[0] }} ({{ date('Y',strtotime($item->created_at)) }})</a>

                                                </h4>
                                                <div class="footer-meta">
                                                    <a class="btn btn-theme effect btn-block btn-lg btnhome"
                                                        target="_blank" href="{{ $item->url }}">View
                                                        Website<i
                                                            class="fas fa-check-circle fa-2x fa-pull-right"></i></a>

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
                    </div>
                </div>
            </div>
          
        </div>
    </div>
</div>








  
  
@endsection
