{{-- @extends('frontend.landing') --}}

@php

    //if ($category == 'chsr') {
    // $extend = 'frontend.chsr.landing';
    // } else {
    $extend = 'frontend.layouts.master-landing';
    // }
@endphp
@extends($extend)

@push('styles')
    <style>
        #heading-gradiant {
            background-color: #00c5bf;
            background-image: linear-gradient(to left, #13b1ea, #00c5bf, transparent);
        }

        .panel-primary>.panel-heading {
            color: #fff;
            background-color: #337ab7;
            border-color: #337ab7;
        }

        .panel-heading {
            padding: 10px 15px;
            border-bottom: 1px solid transparent;
            border-top-left-radius: 3px;
            border-top-right-radius: 3px;
        }

        .blog-area .pagination {
            margin-bottom: -5px;
            margin-top: 15px;
        }

        .page-item:not(:first-child) .page-link {
            margin-left: 5px;
        }

        .blog-area .pagination li a {
            margin-right: 0px;
            margin-bottom: 14px;
            padding: 6px 12px;
        }
    </style>
@endpush

@section('title')
    {{ @$page_title }}
@endsection
@section('content')

    <link rel="stylesheet" href="fontView/assets/modules/pagination.css">

    <!-- Start Breadcrumb
                                ============================================= -->
    {{-- <div class="clearfix"></div>
    <div class="breadcrumb-area shadow dark  text-center text-light h-50"
         style="background-image: url(/upload/banner/banner-butex.jpg); background-repeat: no-repeat; background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h2>{{ $page_title }}</h2>
                    <ul class="breadcrumb d-flex justify-content-center mx-auto w-25">
                        <li><a href="{{ url('/') }}"><i class="fas fa-home"></i> Home</a></li>
                        <li class="active">{{ $page_title }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div> --}}
    
    @include('frontend.partials.sections.banner-with-title', ['page_title' => @$page_title])
    
    <!-- End Breadcrumb -->
    <!--     ========= Start Course Details =========== -->
    <div class="blog-area single full-blog right-sidebar full-blog mt-4 mb-4">
        <div class="container">
            <div class="panel-heading d-flex"
                 id="heading-gradiant">
                <div class="col-sm-10 fs-4 text-light my-auto">
                    {{ @$page_title }}
                </div>
                <div class="col-sm-2">
                    <a href="{{ route('type.all', ['type' => strtolower($page_title)]) }}" class="btn btn-info btn-xs bg-light float-end" style="color: #00c5bf;"> Refresh</a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-sm-12" style="margin-bottom: 10px; background-color: #eee; padding:10px; border-radius: 5px">
                <form method="GET" action="{{ url('/news-event-notice-filter') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" name="title" class="form-control" placeholder="Search By Title">
                            <input type="hidden" name="eventSearchingId" id="eventSearchingId">
                            <input type="hidden" id="type" name="type" value="{{ @$type }}">
                        </div>
                        <div class="col-md-2">
                            <input type="text" name="fromDate" id="fromDate" class="form-control singledatepicker" placeholder="Search From Date">
                        </div>
                        <div class="col-md-2">
                            <input type="text" name="toDate" id="toDate" class="form-control singledatepicker" placeholder="Search To Date">
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-theme effect btn-md custom-font-titillium-web w-100"><i class="fa fa-search"></i> Search</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="">
                <div class="blog-items">
                    <div class="panel panel-primary">
                        <div class="panel-body text-justify px-3 py-3 border">
                            <div class="blog-content col-md-12" id="showInfo">
                                <div class="content-items">
                                    @if ($news->isNotEmpty())
                                        <div class="row">
                                            @foreach (@$news as $item)
                                                @if ($item->type == 1 || $item->type == 2 || $item->type == 4)
                                                    <div class="col-md-4 single-item mt-4 ml-4">
                                                        <div class="item">
                                                            @if (!empty($item->image))
                                                                <div class="thumb">
                                                                    <a target="_blank" href="{{ route('type.details', ['id' => $item->id, 'type' => $page_title]) }}">
                                                                        <img src="{{ asset('/upload/news/' . $item->image) }}"
                                                                             style="height: 240px; width: 100%;"
                                                                             onerror="this.onerror=null;this.src='{{ asset('/upload/no-image.png') }}';"
                                                                             alt=""
                                                                            >
                                                                    </a>
                                                                </div>
                                                            @else
                                                                <div class="thumb">
                                                                    <a target="_blank"
                                                                       href="{{ route('type.details', ['id' => $item->id, 'type' => $item->type]) }}">
                                                                        <img src="{{ asset('/upload/no-image.png' . $item->image) }}"
                                                                             style="height: 240px; width: 100%;"
                                                                             onerror="this.onerror=null;this.src='{{ asset('/upload/no-image.png') }}';"
                                                                             alt="">
                                                                    </a>
                                                                </div>
                                                            @endif
                                                            <div class="info">
                                                                <div class="meta">
                                                                    <ul>
                                                                        <li style="text-transform: capitalize!important;">
                                                                            <i class='fas fa-calendar-alt'></i>
                                                                            {{ date('d M, Y', strtotime(@$item->date)) }}
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="content">
                                                                    <h4 class="text-justify"
                                                                        style="height: 140px; font-size: 18px;">
                                                                        <a target="_blank"
                                                                           href="{{ route('type.details', ['id' => $item->id, 'type' => $page_title]) }}">{{ @$item->title }}</a>
                                                                    </h4>
                                                                    <a target="_blank"
                                                                       href="{{ route('type.details', ['id' => $item->id, 'type' => $page_title]) }}"><i
                                                                           class="fas fa-plus"></i>Read More
                                                                    </a>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                @else
                                                    <div id="notice-category" class="p-2" style="border-bottom: 1px solid #068888;">
                                                        <div class="item mt-2">
                                                            <div class="info" style="width: 100%;">
                                                                <h5 style="line-height: 1.5; font-size: 18px;">
                                                                    <a href="{{ route('type.details', ['id' => $item->id, 'type' => @$page_title]) }}" target="_blank">{{ @$item->title }}</a>
                                                                </h5>

                                                                <div class="d-flex justify-content-between">
                                                                    <div class="">
                                                                        <div>
                                                                            <span style="margin-right: 20px; font-size: 15px;">Type: 
                                                                                <span style="color: #068888;">
                                                                                    @if (@$item->type == '1')
                                                                                        News
                                                                                    @elseif(@$item->type == '2')
                                                                                        Events
                                                                                    @elseif(@$item->type == '3')
                                                                                        Notice
                                                                                    @endif                                                                                                  
                                                                                </span>
                                                                            </span>
                                                                            <i class="fas fa-calendar-alt" style="font-size: 15px;"></i> &nbsp; {{ date('d M, Y', strtotime(@$item->date)) }}
                                                                        </div>
                                                                    </div>
                                                                    <div class="">
                                                                        <div class="">
                                                                            <a href="{{ route('type.details', ['id' => $item->id, 'type' => $item->type]) }}" target="_blank" class="btn btn-sm rounded-pill">
                                                                            <i class="fas fa-plus" style="color: #014042"></i> Read More</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>

                                        <div style="text-align: center">
                                            {{-- {{ $news->links() }} --}}
                                        </div>

                                    @else
                                        <div class="row">
                                            <h4>No matches. Let’s search differently!</h4>
                                        </div>
                                    @endif


                                </div>
                            </div>

                            {{-- @include('frontend.partials.side-link') --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Function to filter items based on the search input
            function filterItems() {
                var searchTerm = $('#eventSearching').val().toLowerCase(); // Get the search term and convert it to lowercase

                // Reset all items' visibility and highlight
                $('.single-item').each(function() {
                    var $titleLink = $(this).find('h4 a');
                    var titleText = $titleLink.text().toLowerCase(); // Get the title of the item and convert it to lowercase
                    // Check if the title matches the search term
                    if (titleText.indexOf(searchTerm) > -1) {
                        $(this).show(); // Show the item if the title matches the search term

                        // Highlight matching text
                        var highlightedTitle = titleText.replace(new RegExp(searchTerm, 'gi'), function(match) {
                            return '<span class="highlight">' + match + '</span>';
                        });
                        $titleLink.html(highlightedTitle); // Update the title with highlighted text
                    } else {
                        $(this).hide(); // Hide the item if the title does not match the search term

                    }

                });
            }

            // Bind the filterItems function to the keyup event of the search input
            $('#eventSearching').on('keyup', filterItems);

            // Bind the filterItems function to the form submission
            $('#searchingForm').on('submit', function(e) {
                e.preventDefault(); // Prevent the form from actually submitting
                filterItems(); // Call the filter function
            });

            // Add CSS for the highlight class
            $('<style>')
                .prop('type', 'text/css')
                .html(`.highlight {
                        color: red;
                        font-weight: bold;
                    }`).appendTo('head');
        });
    </script>

    <script>

        $(function() {
            $(document).on('change', '[ref="notices"],[ref="program"]', function() {
                $.ajax({
                    // url: 'academics_srch',
                    url: "{{ route('notices_cat_result') }}",
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        notices: document.querySelector('input[name="notices"]:checked').value,
                        program: document.querySelector('input[name="program_category_id"]:checked').value,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        let htmlNotice = '';
                        // console.log(data);
                        for (let j = 0; j < data['notices'].length; j++) {
                            htmlNotice += `<div class="item">
                                                <div class="info" style="width: 100%; padding-top: 20px">
                                                    <h5 style="text-align: justify">
                                                        <a href="/archive/notice/details/${data['notices'][j]['id']}"
                                                            target="_blank">${data['notices'][j]['title']}</a>
                                                    </h5>
                                                    <ul>
                                                        <li class="border"
                                                            style="display: inline-block;">
                                                            <span>
                                                                Published Date: ${data['notices'][j]['date']}</span>
                                                        </li>
                                                        <li style="display: inline-block;"
                                                            class="pull-right">
                                                            <a href="/archive/notice/details/${data['notices'][j]['id']}"
                                                                target="_blank"
                                                                class="btn circle btn-dark border btn-sm text-center">
                                                                <i class="fas fa-plus"
                                                                    style="color: #002147"></i>
                                                                Read More</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>`;
                        }

                        document.getElementById('notice-category').innerHTML = htmlNotice;

                    },

                    error: function(xhr, status, error) {
                        console.log('AJAX Error:', status, error);
                        console.log('Response:', xhr.responseText);
                    },
                });
            });

            var request_notices = "{{ request()->notices }}";
            $('[ref="notices"][value="' + request_notices + '"]').trigger('click');
        })
    </script>

@endsection
