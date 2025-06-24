{{-- @extends('frontend.landing') --}}

@php
    //if ($category == 'chsr') {
    //  $extend = 'frontend.chsr.landing';
    //  } else {
    $extend = 'frontend.layouts.master-landing';
    //   }
@endphp
@extends($extend)

@push('styles')
    <style>
        #heading-gradiant {
            background-color: #002147;
            background-image: linear-gradient(to left, #06bdff, #123f73, transparent);
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
    {{ $page_title }}
@endsection
@section('content')
    <link rel="stylesheet"
          href="fontView/assets/modules/pagination.css">
    <!-- Start Breadcrumb
                    ============================================= -->
    <div class="clearfix"></div>
    <div class="breadcrumb-area shadow dark  text-center text-light h-50"
         style="background-image: url(/upload/banner/banner-butex.jpg); background-repeat: no-repeat; background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h2>Butex {{ $page_title }}</h2>
                    <ul class="breadcrumb d-flex justify-content-center mx-auto w-25">
                        <li><a href="{{ url('/') }}"><i class="fas fa-home"></i> Home</a></li>
                        <li class="active">Butex {{ $page_title }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->
    <!-- Start Course Details
                    ============================================= -->
    <div class="blog-area single full-blog right-sidebar full-blog default-padding">
        <div class="container">
            <div class="row">
                <div class="blog-items">
                    <div class="panel panel-primary">

                        <div class="panel-body text-justify px-3 py-3 border">

                            <div class="blog-content col-md-12"
                                 id="showInfo">
                                <div class="content-items">

                                    {{--  =============news//event start==========  --}}
                                    <div class="row">
                                        @foreach (@$news as $item)
                                            @if ($item->type == 1 || $item->type == 2 || $item->type == 4)
                                                <div class="col-md-4 single-item mt-4 ml-4">
                                                    <div class="item">
                                                        @if (!empty($item->image))
                                                            <div class="thumb">
                                                                <a target="_blank"
                                                                   href="{{ route('type.details', ['id' => $item->id, 'type' => $page_title]) }}">
                                                                    <img src="{{ asset('/upload/news/' . $item->image) }}"
                                                                         style="height: 240px; width: 100%;"
                                                                         onerror="this.onerror=null;this.src='{{ asset('/upload/no-image.png') }}';"
                                                                         alt="">
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
                                                <div class="row"
                                                     id="notice-category">

                                                    <div class="item">
                                                        <div class="info"
                                                             style="width: 100%; padding-top: 20px">
                                                            <h5 style="text-align: justify">
                                                                <a href="{{ route('type.details', ['id' => $item->id, 'type' => $page_title]) }}"
                                                                   target="_blank">{{ @$item->title }}</a>
                                                            </h5>
                                                            <ul>
                                                                <li class="border"
                                                                    style="display: inline-block;">
                                                                    <span>
                                                                        Published Date:
                                                                        {{ date('d M,Y', strtotime(@$item->date)) }}
                                                                    </span>
                                                                </li>
                                                                <li style="display: inline-block;"
                                                                    class="pull-right">
                                                                    <a href="{{ route('type.details', ['id' => $item->id, 'type' => $item->type]) }}"
                                                                       target="_blank"
                                                                       class="btn circle btn-dark border btn-sm text-center">
                                                                        <i class="fas fa-plus"
                                                                           style="color: #002147"></i>
                                                                        Read More</a>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                
                                                @endif
                                                <br/> <br/> 
                                            @endforeach

                                            <div style="text-align: center">
                                                {{ $news->links() }}
                                            </div>

                                    </div>

                                </div>
                            </div>

                            <!-- Start Sidebar -->
                            {{-- @include('frontend.partials.side-link') --}}
                        </div>
                        <!-- End Start Sidebar -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Function to filter items based on the search input
            function filterItems() {
                var searchTerm = $('#eventSearching').val()
            .toLowerCase(); // Get the search term and convert it to lowercase

                // Reset all items' visibility and highlight
                $('.single-item').each(function() {
                    var $titleLink = $(this).find('h4 a');
                    var titleText = $titleLink.text()
                .toLowerCase(); // Get the title of the item and convert it to lowercase

                    // Check if the title matches the search term
                    if (titleText.indexOf(searchTerm) > -1) {
                        $(this).show(); // Show the item if the title matches the search term

                        // Highlight matching text
                        var highlightedTitle = titleText.replace(new RegExp(searchTerm, 'gi'), function(
                            match) {
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
                .html(`
                    .highlight {
                        color: red;
                        font-weight: bold;
                    }
                `)
                .appendTo('head');
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
                        program: document.querySelector('input[name="program_category_id"]:checked')
                            .value,
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

    <script>
        // $(document).ready(function(){

        //     $('input[name="notices"]').on('change', function() {
        //         if ($(this).val() === '1' || $(this).val() === '4') {
        //             $('#sub_notices').show();
        //         } else {
        //             $('#sub_notices').hide();
        //         }
        //     });
        // });
    </script>
@endsection
