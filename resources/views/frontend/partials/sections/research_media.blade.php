{{-- @extends('frontend.landing') --}}
@extends('frontend.layouts.master-landing')
@php
    $page_title = 'Journal';
@endphp
@section('title')
    {{ $page_title }}
@endsection
<style>
    .faculty-aboutt{
        color: #ffffff !important;
    }
    .zoom_in_hover {
        -webkit-transform: scale(1);
        transform: scale(1);
        -webkit-transition: all 200ms linear;
        -moz-transition: all 200ms linear;
        -ms-transition: all 200ms linear;
        -o-transition: all 200ms linear;
        transition: all 200ms linear;

    }

    .zoom_in_hover:hover {
        -webkit-transform: scale(1.05);
        transform: scale(1.05);
        cursor: pointer;
    }
    .text-left a {
        display: -webkit-box;           /* Use flexbox model for clamping */
        -webkit-box-orient: vertical;  /* Set orientation to vertical */
        -webkit-line-clamp: 3;         /* Limit to 3 lines */
        overflow: hidden;               /* Hide overflow */
        text-overflow: ellipsis;        /* Show ellipsis when overflowing */
        color: inherit;                 /* Inherit text color */
        text-decoration: none;          /* Remove underline */
    }

    .text-left a:hover {
        text-decoration: underline;     /* Optional: underline on hover */
    }
    .single-news-content {
        display: flex;
        flex-direction: column
    }
    .single-news-content .btn-theme {
        position: absolute;
        bottom: 30px;
        left: 27%;
    }
</style>

@section('content')
    {{-- @include('frontend.partials.sections.banner', ['page_title' => $page_title]) --}}
    @include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])

    {{-- <h1 class="fs-1 fw-bolder font-poppins text-center text-dark mt-3">{{$page_title}}</h1> --}}

    <section class="my-4">  
        <div class="container overview">
            
            <style>
                .research-news{
                    height: 420px;
                }
            
                @media only screen and (max-width: 576px) {
                    .research-news{
                        height: 420px;
                    }
                }
            </style>
            
            
            <div class="p-2"> 
            
                        <div class="d-flex justify-content-between align-items-end">
                            <h2 class="text-uppercase mb-0 home-content-heading custom-font-titillium-web">{{ @$page_title }}</h2>
                            {{-- <a href="" class="text-uppercase text-decoration-none fw-bold common-font-color">All</a> --}}
                        </div>
                        
                        <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;"></div>
            
                        <div class="row">
                            @forelse (@$infos as $item)
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 mt-3">
                                    <div class="research-news shadow">
                                        <div class="single-news-thumb">
                                            {{-- <a href="{{ route('type.details', ["id"=>$item->id,"type"=>'news','url'=>$url]) }}"> --}}
                                            <a href="{{ route('research.details2',['id'=>$item->id,'url'=>@$url]) }}">
                                                <img class="p-2 w-100 object-cover" height="200px"
                                                    src="{{ asset('/upload/journal/'.$item->attachment1) }}"
                                                    onerror="this.onerror=null;this.src='{{ asset('upload/no-image.png') }}';"
                                                    alt="" />
                                            </a>
                                        </div>
                                        <div class="info">
                                            <div class="single-news-date">
                                                <ul class="m-0">
                                                    <li class="py-1" style="font-size: 14px; list-style-type: none;"><i class="fas fa-calendar-alt pe-1"></i>
                                                        {{ \Carbon\Carbon::parse($item->date)->format('d M, Y') }}</li>
                                                </ul>
                                            </div>
                                            <div class="single-news-content px-2 pt-3 pb-2">
                                                <h4 class="text-left" style="height: 80px; word-spacing: 5px; font-size: 15px; text-align: justify;">
                                                    <a href="{{ route('research.details2',['id'=>$item->id,'url'=>@$url]) }}">{{ $item->paper_title }}</a></h4>
                                                {{-- <p>{!! Str::limit(@$item->short_description, 80) !!}</p> --}}
                                                <a class="btn btn-sm rounded-pill custom-font-titillium-web" href="{{ route('research.details2',['id'=>$item->id,'url'=>@$url]) }}"><i
                                                        class="fas fa-plus"></i> Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="col-md-12">
                                    <h2 class="fs-5 p-3 mt-3  mb-0 bg-light rounded">There are no activities at the moment..</h2>
                                </div>
                            @endforelse
                        </div>
            
            </div> 
           
        </div>
    </section>

@endsection
