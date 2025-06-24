{{-- @extends('frontend.department.tamplate_four.partials.main') --}}
@extends('frontend.office.template.partials.main')

@php
    $url=request()->route()->getName();
    $page_title = 'Notice';
@endphp

@section('title')
    {{ $page_title }}
@endsection

@section('content')
    <div class="faculty-profile-banner d-flex justify-content-center align-items-center" style="background-image: url( {{ @$banner->image ? asset('upload/banner/' . $banner->image) : asset('frontend/assets/img/bup/banner.jpg') }} ) ">
        <h1 class="text-white font-poppins">{{ $page_title }}</h1>
    </div>
    {{-- @include('frontend.partials.sections.search', ['page_title' => $page_title]) --}}
    <section>
        <div class="container my-5">
            <div class="row rounded" style="height:11rem; background-color: #f1f1f1">
                <div class="col-md-4 d-block my-auto justify-content-center align-items-center">
                    <h3 class="text-uppercase fs-4">{{ $page_title }} SEARCH</h3>
                    <p>Use the filters to find {{ $page_title }}!</p>
                </div>
                <div class="col-md-8 my-auto justify-content-center">
                    <form action="{{ route('office_officeNewsEventNoticeFilter', $office->id) }}" method="post" enctype="multipart/form-data" autocomplete="off" id="myForm">
                        @csrf
                        <div class="input-group" style="height : 60px;">
                            <input type="hidden" name="office_id" id="office_id" value="{{$office->id}}">
                            <input type="hidden" name="news_type" id="news_type" value="{{$page_title}}">
                            <input type="hidden" name="news_type_id" id="news_type_id" value="{{$news[0]['type']}}">
                            <input type="search" name="search" class="form-control search-box" placeholder="Enter Keywords ..."
                                aria-label="Search" id="input-field" aria-describedby="search-addon"
                                style="border-radius: 0; font-size: 20px; background-color: #00c5bf; border: none;" />
                            <button type="submit" style="width : 50px; cursor: pointer; border-radius: 0; background-color: #00c5bf; border: none;">
                                <span class="" id="search-addon">
                                    <i class="fas fa-search"></i>
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Title -->
    <main class="container">
        <section>
            <div class="container">
                <div class="row">
                    @if (count($news) > 0)
                    {{-- <div class="mt-5 col-12 border-bottom pb-5">
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-12 shadow bg-light rounded p-3 content-title">
                                <div class=" content-title">
                                <h1 class="fs-4 fw-bold mb-2">
                                    <a href="{{ route('type.details', ["id"=>$n->id,"type"=>'notice','url'=>$url]) }}"
                                        class="news-title">{{ $n->title }}
                                    </a>
                                </h1>
                            </div>
                                <h1 class="fs-6 fw-bold">
                                    <i class="fas fa-calendar-alt"></i>
                                    {{ date('d M Y', strtotime(@$n->date)) }}
                                </h1>
                                <p class="fs-6 m-0"> {{ $n->short_description }} </p>
                            </div>
                        </div>
                    </div> --}}
                        @foreach ($news as $key => $item)
                        <div class="item my-2 border-bottom">
                            <div class="info" style="width: 100%;">
                                <h5 style="line-height: 1.5; font-size: 18px;">
                                    <a href="{{ route('type.details', ['id' => $item->id, 'type' => $page_title]) }}" target="_blank">{{ @$item->title }}</a>
                                </h5>
                                <ul style="padding-left: 0px;">
                                    <li class="text-start d-flex justify-content-between">
                                        <div>
                                            <span style="margin-right: 20px; font-size: 15px;">Type: 
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
                                        <div class="me-3 mb-3 float-end">
                                            <a href="{{ route('type.details', ['id' => $item->id, 'type' =>   $page_title]) }}" target="_blank" class="btn btn-sm rounded-pill">
                                            <i class="fas fa-plus" style="color: #014042"></i> Read More</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div class="mt-5 col-12 border-bottom pb-5">
                            <div class="row d-flex justify-content-center">
                                <h1 class="fs-4 fw-bold mb-2">There are no notices at this moment!</h1>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="my-3">
                    {{$news->links()}}
                </div>
            </div>
        </section>

    </main>

    {{-- <script>
        const searchInput = document.getElementById('input-field');
    
        searchInput.addEventListener('input', () => {
            const dataList = document.querySelectorAll('.content-title');
            const searchTerm = searchInput.value.trim().toLowerCase();
    
            for (let i = 0; i < dataList.length; i++) {
                const itemText = dataList[i].textContent.toLowerCase();
    
                if (searchTerm === '') {
                    // Show all items if search term is empty
                    dataList[i].closest('.mt-5').style.display = 'block';
                    // Reset the title to original without highlighting
                    dataList[i].querySelector('.news-title').innerHTML = dataList[i].querySelector('.news-title').textContent;
                } else if (itemText.includes(searchTerm)) {
                    // Highlight the search term
                    const regex = new RegExp(`(${searchTerm})`, 'gi');
                    const highlightedText = dataList[i].querySelector('.news-title').textContent.replace(regex, "<span class='text-danger text-bold'>$1</span>");
                    
                    dataList[i].querySelector('.news-title').innerHTML = highlightedText;
                    dataList[i].closest('.mt-5').style.display = 'block';
                } else {
                    // Hide the parent container if no match
                    dataList[i].closest('.mt-5').style.display = 'none';
                }
            }
        });
    </script> --}}
    <script>
        const searchInput = document.getElementById('input-field');
    
        searchInput.addEventListener('input', () => {
            // Select all titles inside the news items
            const dataList = document.querySelectorAll('.item h5 > a');
            const searchTerm = searchInput.value.trim();
    
            dataList.forEach((element) => {
                const itemText = element.textContent;
                const parentContainer = element.closest('.item'); // Parent container for the news item
    
                if (searchTerm === '') {
                    // Show all items and reset highlighting
                    parentContainer.style.display = 'block';
                    element.innerHTML = itemText; // Reset any highlighted content
                } else {
                    const regex = new RegExp(`(${searchTerm})`, 'gi'); // Case-insensitive regex
    
                    if (regex.test(itemText)) {
                        // Highlight the matching search term while preserving the original casing
                        const highlightedText = itemText.replace(regex, "<span class='text-danger text-bold'>$1</span>");
                        element.innerHTML = highlightedText;
                        parentContainer.style.display = 'block';
                    } else {
                        // Hide items that don't match the search term
                        parentContainer.style.display = 'none';
                    }
                }
            });
        });
    </script>
@endsection
