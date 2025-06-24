{{-- @extends('frontend.department.tamplate_three.partials.main') --}}
@extends('frontend.landing')
@php
   $page_title = 'Research News'
@endphp
@section('title')
    {{ $page_title }}
@endsection
@section('content')
    @include('frontend.partials.sections.banner-cover', ['page_title' => $page_title])
    <!-- Hero Title -->
    <!-- Start Course Details
    ============================================= -->
    <div class="course-details-area default-padding" >
        <div class="container">
            <div class="row">
                <!-- Start Course Info -->
                <div class="col-md-12">
                    <div class="top-author">
                        <h4>Research News</h4>
                        <div class="author-items">
                            @foreach($infos as $item)
                            <div  class="item">
                                <div class=" text-justify">
                                    <h5><a href="{{ route('research.details',$item->id) }}"
                                            target="_blank">{{ $item->title }}</a>
                                    </h5>
                                    <ul>
                                        <li class="border">
                                            <span> Published on: {{ date('M d,Y',strtotime($item->date)) }}</span>
                                            <a href="{{ route('research.details',$item->id) }}"
                                                class="btn  btn-sm text-center"> <i class="fas fa-book-open"></i> Read More </a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div style="text-align: center">
                    
                </div>
            </div>
        </div>
    </div>
    
@endsection
