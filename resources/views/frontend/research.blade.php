{{-- @extends('frontend.landing') --}}
@extends($layout)

@php
    $page_title = $info->title;
@endphp
@section('title')
    {{ $page_title }}
@endsection
@section('content')
    <div class="clearfix"></div>

    {{-- <div class="breadcrumb-area shadow dark text-center text-light"
    style="background-image: url({{ asset('upload/banner/banner-butex.jpg') }}); background-repeat: no-repeat; padding-top:190px;background-position: center; background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h2>Research</h2>
                    <ul class="breadcrumb d-flex justify-content-center mx-auto w-25">
                        <li><a href="{{ url('/') }}"><i class="fas fa-home"></i> Home</a></li>
                        <li>Research</li>
                    </ul>
                </div>
            </div>
        </div>
    </div> --}}

    @include('frontend.partials.sections.banner-with-title', ['page_title' => 'Research'])


    <div class="course-details-area default-padding">
        <div class="container">
            <div class="row">
                <!-- Start Course Info -->
           
            
              
                <div class="col-md-8">
                    <div class="courses-info">
                        <div class="tags pull-right float-end mb-2">
                            <a href="#"
                               style="text-decoration: none !important;"><i class="fas fa-calendar-alt"></i>
                                Published: {{ date('d M,Y',strtotime(@$info->date)) }}</a>
                        </div>
                        <div class="clearfix"></div>
                        <h3 class="fs-4">
                           {!! @$info->title !!} 
                        </h3>
                        <div class="clearfix"></div>
                        <div class="tab-info">
                            <div class="tab-content tab-content-info">
                                <div id="tab1"
                                     class="tab-pane active in"> {{-- fade class is not working that's why it is deleted --}}
                                    <div class="info title text-justify colored-link">
                                       @if(!empty($info->image))
                                        <img style="height: 280px; width: 100%;" src="{{ asset('/upload/journal/'.@$info->image) }}"  alt="">
                                       @else
                                       <span>Image Not Found</span>
                                       @endif
                                           
                                       <div>
                                            {!! @$info->description !!} 
                                        </div>
                                    

                                        <p>
                                            {{--  <a href="https://ssl.du.ac.bd/images/project guide line 24-25 (1)_1716109974.pdf">গাইডলাইন</a>  --}}
                                        </p>
                                        <div class="clearfix"></div>
                                        <div class="sharethis-inline-share-buttons"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @php
                        $researchFiles = DB::table('research_files')
                            ->where('research_id', @$info->id)
                            ->get();
                     @endphp

                    <div class="container">
                        <h4>Attached Files</h4>
                        
                        @if($researchFiles->isEmpty())
                            <p>No files found for this research.</p>
                        @else
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>File Name</th>
                                        <th>File</th>
                                        <th>Uploaded At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($researchFiles as $file)
                                        <tr>
                                            <td>{{ $file->file_title }}</td>
                                            <td><a href="{{ asset('/upload/journal/'.@$file->file) }}" target="_blank">Open in New Tab</a></td>
                                            <td>{{ date('d M,Y',strtotime(@$file->created_at)) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>

                    </div>
                </div>
         
                <div class="col-md-4">
                    <div class="top-author">
                        <h4>Research</h4>
                        <div class="author-items">
                            
                            @foreach($research as $item)
                          
                            <div class="item">
                                <div class=" text-justify">
                                    <h5 class="fs-6">
                                         <a href="{{ route('research.details',$item->id) }}"
                                           >
                                           {{  $item->title}}
                                        </a>
                                    </h5>
                                    {{-- <ul>
                                        <li class="border">
                                            <span>
                                                Published: {{ date('d M,Y',strtotime($item->date)) }}
                                            </span>
                                        </li>
                                    </ul> --}}
                                    <span>
                                        Published: {{ date('d M,Y',strtotime($item->date)) }}
                                    </span>
                                </div>
                            </div>
                            @endforeach
                        
                            {{-- <a href="{{ route('research.list.by.type',$id=1) }}">View All <i class="fas fa-angle-double-right"></i></a> --}}
                            <a href="/research_and_publication">View All <i class="fas fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
