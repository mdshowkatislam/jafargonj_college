{{-- @extends('frontend.landing') --}}
{{--  @extends('frontend.layouts.master-landing')  --}}
@php

    if($url=='faculty_home'){
        $layout ='frontend.faculty.tamplate_four.partials.main';
        $faculty = \App\Models\Faculty::find($info->faculty_id);
    }elseif($url=='department_home'){
        $layout ='frontend.department.tamplate_four.partials.main-second';
        $department = \App\Models\Department::find($info->department_id);
    }else{
        $layout ='frontend.layouts.master-landing';

    }
 
   
@endphp
@extends($layout)
@php
   
   if($type==1){
    $page_title = "News";
   }
   if($type==2){
    $page_title =" Events";
   }
   if($type==3){
    $page_title = "Notice";
   }
  
@endphp
@section('title')
    {{ $page_title }}
@endsection
@section('content')


{{-- <div class="clearfix"></div>
<div class="breadcrumb-area shadow dark text-center text-light h-50"
    style="background-image: url(/upload/banner/banner-butex.jpg); background-repeat: no-repeat; background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h2>Butex {{ $page_title }}</h2>
                <ul class="breadcrumb d-flex justify-content-center mx-auto w-25">
                    <li><a href="{{ url('/') }}"><i class="fas fa-home"></i> Home</a></li>
                    <li class="active">Butex Latest {{ $page_title }}</li>
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
                <div class="courses-info mb-2">


                    <div class="tags pull-right float-end mb-2">
                        <a href="#" style="text-decoration: none !important;"><i class="fas fa-calendar-alt"></i>
                            Published: {{ date('d M, Y',strtotime(@$info->date)) }}</a>
                    </div>
                    <div class="clearfix"></div>
                    <h3 class="">
                        {!! @$info->title !!}
                    </h3>
                    <div class="clearfix"></div>
                    <div class="tab-info">
                        <div class="tab-content tab-content-info">
                            <div id="tab1" class="tab-pane active in"> {{-- fade class is not working that's why it is deleted --}}
                                <div class="info title text-justify colored-link">
                             
                                       {!!  @$info->short_description !!}
                                
                                   <br />
                                        {{--  (মাহমুদ আলম)<br />
                                        পরিচালক<br />
                                        জনসংযোগ দফতর<br />
                                        ঢাকা বিশ্ববিদ্যালয়</p>  --}}

                                    <p><br />
                                        
                                        @if(!empty($info->image))
                                        <img alt=""
                                            src="{{ asset("/upload/news/".@$info->image) }}"
                                            style="width: -webkit-fill-available;" />
                                        
                                        @endif
                                            &nbsp;
                                            <br />
                                            
                                       {!!  @$info->long_description !!}

                                        &nbsp;
                                        <br />
                                        &nbsp;
                                    </p>
                                    @if (isset($info->file))
                                    <a class="btn shadow text-light" style="background-color: #0e9e9e;" href="{{ url('upload/news/'.@$info->file) }}"  role="button"><i class="fas fa-download me-1" download="news"></i> View Resources</a>
                                    @endif
                                    <div class="clearfix"></div>
                                    <div class="sharethis-inline-share-buttons"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           @include('frontend.partials.side-latest-new')
        </div>
    </div>
</div>
@endsection
