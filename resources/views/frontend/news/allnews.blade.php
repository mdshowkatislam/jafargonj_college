
@php
    $extend = 'frontend.layouts.master-landing';
@endphp

@extends($extend)

@push('styles')

<style>
   #heading-gradiant {
        background-color: #009999;
        background-image: linear-gradient(to left, #009999, #0b7272, transparent);
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

    /* news design */
    .single-news {
        position: relative;
        -webkit-transition: all 800ms ease;
        -moz-transition: all 800ms ease;
        -ms-transition: all 800ms ease;
        -o-transition: all 800ms ease;
        transition: all 800ms ease;
    }

    .research-card:before,
    .single-news:before {
        position: absolute;
        content: '';
        left: 0px;
        bottom: 0px;
        width: 0px;
        height: 5px;
        background-color: #00c5bf;
        -webkit-transition: all 800ms ease;
        -moz-transition: all 800ms ease;
        -ms-transition: all 800ms ease;
        -o-transition: all 800ms ease;
        transition: all 800ms ease;
    }

    .research-card:after,
    .single-news:after {
        position: absolute;
        content: '';
        right: 0px;
        bottom: 0px;
        width: 0px;
        height: 5px;
        background-color: #00c5bf;
        -webkit-transition: all 800ms ease;
        -moz-transition: all 800ms ease;
        -ms-transition: all 800ms ease;
        -o-transition: all 800ms ease;
        transition: all 800ms ease;
    }

    .research-card:hover,
    .single-news:hover {
        -webkit-transform: translateY(10px);
        -moz-transform: translateY(10px);
        -ms-transform: translateY(10px);
        -o-transform: translateY(10px);
        transform: translateY(10px);
    }

    .single-news:hover::before,
    .single-news:hover::after {
        width: 100%;
    }
</style>

@endpush

@php
    if ($type == 1) {
        $page_title = 'News';

    } elseif ($type == 2) {
        $page_title = 'Events';

    } elseif ($type == 3) {
        $page_title = 'Notice';

    } elseif ($type == 4) {
        $page_title = 'Events';
    }
@endphp

@section('title')
    {{ $page_title }}
@endsection
@section('content')

<link rel="stylesheet" href="fontView/assets/modules/pagination.css">
<!-- Start Breadcrumb ============================================= -->
{{--     
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
--}}

@include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])

<!-- End Breadcrumb -->
<!-- Start Course Details ============================================= -->

    <div class="blog-area single full-blog right-sidebar full-blog mt-4">
        <div class="container">
            <div class="">
                <div class="blog-items">
                    <div class="panel panel-primary">
                        <div class="panel-heading" id="heading-gradiant">
                            <div class="col-sm-10">
                                <span style="font-size: 18px;">
                                    @if (@$item->type == '1')
                                        News
                                    @elseif(@$item->type == '2')
                                        Events
                                    @elseif(@$item->type == '3')
                                        Notice
                                    @elseif(@$item->type == '4')
                                        Featured &nbsp; News & Events
                                    @else
                                        &nbsp; {{ ucfirst($page_title) }}
                                    @endif
                                </span>
                            </div>
                            <div class="col-sm-2 text-right">
                                 {{-- <a href="news.html" class="btn btn-info btn-xs"> Refresh</a>  --}}
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="panel-body text-justify px-3 py-3 border mb-3">
                            <div class="col-sm-12" style="margin-bottom: 10px; background-color: #eee; padding:10px; border-radius: 5px">
                                <form method="GET" action="{{ url('/news-event-notice-filter') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" name="title" class="form-control" placeholder="Search By Title">
                                            <input type="hidden" name="eventSearchingId" id="eventSearchingId">
                                            <input type="hidden" id="type" name="type" value="{{ @$cat_type }}">
                                            <input type="hidden" name="noticesCat" id="noticesCat" value="">
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
                                    <div class="row">
                                        @if ($type == 3)
                                        <div class="col-xl-3 col-lg-3">
                                            <div class="p-2">
                                                <ul class="list-group">
                                                    <li class="list-group-item">
                                                        <div class="program-text d-flex align-items-center">
                                                            <div class="form-check">
                                                                <input class="form-check-input" ref="notices" value="" type="radio" name="notices" id="notices1" checked>
                                                                <label class="form-check-label" for="notices1" style="margin-top: 2px;">
                                                                    All
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </li>

                                                    <li class="list-group-item">
                                                        <div class="program-text d-flex align-items-center">
                                                            <div class="form-check">
                                                                <input class="form-check-input" ref="notices" value="1" type="radio" name="notices" id="notices2">
                                                                <label class="form-check-label" for="notices2" style="margin-top: 2px;">
                                                                    Results
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </li>

                                                    <li class="list-group-item">
                                                        <div class="program-text d-flex align-items-center">
                                                            <div class="form-check">
                                                                <input class="form-check-input" ref="notices" value="2" type="radio" name="notices" id="notices3">
                                                                <label class="form-check-label" for="notices3" style="margin-top: 2px;">
                                                                    Administrative
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </li>

                                                    <li class="list-group-item">
                                                        <div class="program-text d-flex align-items-center">
                                                            <div class="form-check">
                                                                <input class="form-check-input" ref="notices" value="3" type="radio" name="notices" id="notices4">
                                                                <label class="form-check-label" for="notices4" style="margin-top: 2px;">
                                                                    Academic
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </li>
   
                                                    <li class="list-group-item">
                                                        <div class="program-text d-flex align-items-center">
                                                            <div class="form-check">
                                                                <input class="form-check-input" ref="notices" value="4" type="radio" name="notices" id="notices5">
                                                                <label class="form-check-label" for="notices5" style="margin-top: 2px;">
                                                                    Program
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </li>

                                                    <li class="list-group-item">
                                                        <div class="program-text d-flex align-items-center">
                                                            <div class="form-check">
                                                                <input class="form-check-input" ref="notices" value="6" type="radio" name="notices" id="notices7">
                                                                <label class="form-check-label" for="notices7" style="margin-top: 2px;">
                                                                    Tender 
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </li>

                                                    <li class="list-group-item">
                                                        <div class="program-text d-flex align-items-center">
                                                            <div class="form-check">
                                                                <input class="form-check-input" ref="notices" value="5" type="radio" name="notices" id="notices6">
                                                                <label class="form-check-label" for="notices6" style="margin-top: 2px;">
                                                                    Affiliated
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </li>

                                                    <li class="list-group-item">
                                                        <div class="program-text d-flex align-items-center">
                                                            <div class="form-check">
                                                                <input class="form-check-input" ref="notices" value="7" type="radio" name="notices" id="notices8">
                                                                <label class="form-check-label" for="notices8" style="margin-top: 2px;">
                                                                    Others 
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xl-9 col-lg-9">
                                            <div class="shadow-sm">
                                                <div class="blog-content" id="showInfo">
                                                    <div class="content-items">
                                                            {{--  =============Notice Div start===========  --}}
                                                            <div class="top-author">
                                                                <div class="author-items" style="border: 1px solid white;">
                                                                    <div class="row" id="notice-category">
                                                                        @foreach (@$news as $item)
                                                                            <div class="item mt-2">
                                                                                <div class="info" style="width: 100%;">
                                                                                    <h5 style="line-height: 1.5; font-size: 18px; font-weight: 400;">
                                                                                        <a href="{{ route('type.details', ['id' => $item->id, 'type' => $page_title]) }}" target="_blank">{{ @$item->title }}</a>
                                                                                    </h5>
                                                                                    <ul style="padding-left: 0px;">
                                                                                        <li class="text-start">
                                                                                            <div>
                                                                                                <span style="margin-right: 20px; font-size: 15px;">
                                                                                                    <span style="color: #068888;">
                                                                                                        @if (@$item->type == '1')
                                                                                                            News
                                                                                                        @elseif(@$item->type == '2')
                                                                                                            Events
                                                                                                        @elseif(@$item->type == '3')
                                                                                                            @if (@$item->category == '1')
                                                                                                                Results
                                                                                                            @elseif (@$item->category == '2')
                                                                                                                Administrative
                                                                                                            @elseif (@$item->category == '3')
                                                                                                                Academic
                                                                                                            @elseif (@$item->category == '4')
                                                                                                                Programs
                                                                                                            @elseif (@$item->category == '5')
                                                                                                                Affiliated
                                                                                                            @elseif (@$item->category == '6')
                                                                                                                Tender
                                                                                                            @elseif (@$item->category == '7')
                                                                                                                Other
                                                                                                            @endif
                                                                                                                Notice
                                                                                                        @endif                                                                                                  
                                                                                                    </span>
                                                                                                </span>
                                                                                                <i class="fas fa-calendar-alt" style="font-size: 15px;"></i>&nbsp; {{ date('d M,Y', strtotime(@$item->date)) }}
                                                                                            </div>
                                                                                            <div class="me-3">
                                                                                                <a href="{{ route('type.details', ['id' => $item->id, 'type' =>   $page_title]) }}" target="_blank" class="btn btn-sm rounded-pill">
                                                                                                <i class="fas fa-plus" style="color: #014042"></i> Read More</a>
                                                                                            </div>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                    
                                                                        <div style="text-align: center">
                                                                            {{ $news->links() }}
                                                                        </div>
                    
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            {{--  =======================Notice div end==========================  --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    {{--  =============news//event start==========  --}}
                                        <div class="row">
                                            @foreach (@$news as $item)
                                                <div class="col-xl-4 col-lg-4 single-item">
                                                    <div class="item single-news">
                                                        @if (!empty($item->image))
                                                            <div class="thumb">
                                                                <a target="_blank" href="{{ route('type.details', ['id' => $item->id, 'type' =>  $page_title]) }}">
                                                                    <img src="{{ asset('/upload/news/' . $item->image) }}" style="height: 240px; width: 100%;" 
                                                                    onerror="this.onerror=null;this.src='{{ asset('/upload/no-image.png') }}';" alt="">
                                                                </a>
                                                            </div>
                                                        @else
                                                            <div class="thumb">
                                                                <a target="_blank" href="{{ route('type.details', ['id' => $item->id, 'type' =>  $page_title]) }}">
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
                                                                    <h4 class="text-justify" style="text-align: justify; font-size: 15px; height: 70px;">
                                                                        <a target="_blank" href="{{ route('type.details', ['id' => $item->id, 'type' =>   $page_title]) }}">{{ @$item->title }}</a>
                                                                    </h4>
                                                                    <a target="_blank" href="{{ route('type.details', ['id' => $item->id, 'type' =>   $page_title]) }}"><i class="fas fa-plus"></i>Read More</a>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                @endforeach
                                                            
                                                <div style="text-align: center">
                                                    {{ $news->links() }}
                                                </div>                                              
                                        </div>
                                            {{--  =============news/event end===========  --}}
                                        @endif

                                        <div class="col-md-8" id="sub_notices" style="display: none;">
                                            <div class="sub_notices">
                                                @php
                                                    $pall = App\Models\Program::count('program_category_id');
                                                @endphp
                                                    <div class="program-text mt-3 d-flex align-items-center">
                                                        <label for="program_id2222" class="d-flex me-2">
                                                            <input type="radio" ref="program" checked value="" name="program_category_id"
                                                                   id="program_id2222">
                                                        </label>
                                                        <span class="title me-2">All</span>
                                                    </div>

                                                @foreach ($program_categories as $key => $pc)
                                                    @php
                                                        $a = App\Models\Program::where('program_category_id', $pc->id)->count('program_category_id');
                                                    @endphp
                                                        <div class="program-text mt-3 d-flex align-items-center">
                                                            <input type="radio" ref="program" value="{{ $pc->id }}" name="program_category_id" id="program_id{{ $key }}">
                                                            <label for="program_id{{ $key }}" class="me-2"></label>
                                                            <span class="title me-2">{{ $pc->program_category }}</span>
                                                        </div>
                                                @endforeach
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
        $(function(){
            $(document).on('change','[ref="notices"],[ref="program"]',function(){
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
                    success: function (data) {
                        let htmlNotice = '';
                        let type = '';
                        let category = '';
                       console.log(data['notices']);
                       if(data['notices'].length > 0) {
                            for (let j = 0; j < data['notices'].length; j++) {
                                if(data['notices'][j]['type'] == '1'){
                                    type = 'News';
                                }else if(data['notices'][j]['type'] == '2'){
                                    type = 'Events';
                                }else if(data['notices'][j]['type'] == '3'){
                                    type = 'Notice';
                                }

                                if(data['notices'][j]['category'] == '1'){
                                    category = 'Results';
                                }else if(data['notices'][j]['category'] == '2'){
                                    category = 'Administrative';
                                }else if(data['notices'][j]['category'] == '3'){
                                    category = 'Academic';
                                }else if(data['notices'][j]['category'] == '4'){
                                    category = 'Programs';
                                }else if(data['notices'][j]['category'] == '5'){
                                    category = 'Affiliated';
                                }else if(data['notices'][j]['category'] == '6'){
                                    category = 'Tender';
                                }else if(data['notices'][j]['category'] == '7'){
                                    category = 'Other';
                                }
                                // Example date string
                                var dateString = data['notices'][j]['date']; // e.g., "2024-10-20"

                                // Convert to Date object
                                var dateObj = new Date(dateString);

                                // Format the date to "20 Oct, 2024"
                                var options = { day: '2-digit', month: 'short', year: 'numeric' };
                                var formattedDate = dateObj.toLocaleDateString('en-GB', options);

                                htmlNotice += `<div class="item mt-2">
                                                    <div class="info px-3" style="width: 100%;">
                                                        <h5 style="font-size: 18px; line-height: 1.5; font-weight: 400;">
                                                            <a href="/archive/notice/details/${data['notices'][j]['id']}"
                                                                target="_blank">${data['notices'][j]['title']}</a>
                                                        </h5>
                                                        <ul style="padding-left: 0px;">
                                                            <li class="text-start">
                                                                <div>
                                                                    <span style="margin-right: 20px; font-size: 15px;"> 
                                                                        <span style="color: #068888;">
                                                                            ${category} ${type}                                                
                                                                        </span>
                                                                    </span>
                                                                    <i class="fas fa-calendar-alt" style="font-size: 15px;"></i>&nbsp; ${formattedDate}
                                                                </div>
                                                            
                                                                <div class="me-3">
                                                                    <a href="/archive/notice/details/${data['notices'][j]['id']}"
                                                                        target="_blank"
                                                                        class="btn btn-sm rounded-pill">
                                                                        <i class="fas fa-plus"
                                                                        style="color: #014042"></i>
                                                                            Read More
                                                                    </a>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>`;

                            }
                        } else {
                            htmlNotice += `<div class="item m-2">
                                                <div class="info p-2" style="width: 100%;">
                                                    <h5 style="font-size: 18px; text-align: center;">
                                                        No Information Found
                                                    </h5>
                                                </div>
                                            </div>`;
                        }
                        document.getElementById('notice-category').innerHTML = htmlNotice;
                    },
                    error: function (xhr, status, error) {
                        console.log('AJAX Error:', status, error);
                        console.log('Response:', xhr.responseText);
                    },
                });
            });

            var request_notices = "{{request()->notices}}";
            $('[ref="notices"][value="'+request_notices+'"]').trigger('click');
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
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const radios = document.querySelectorAll('input[name="notices"]');
            radios.forEach(radio => {
                radio.addEventListener('change', function () {
                    document.getElementById('noticesCat').value = this.value;
                });
            });
        });
    </script>


@endsection
