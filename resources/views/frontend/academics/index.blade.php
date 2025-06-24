@extends('frontend.layouts.master-landing')

@php
$page_title = 'Academics';
@endphp
@section('title')
{{ $page_title }}
@endsection
@section('content')

    {{-- @include('frontend.partials.sections.banner-cover5') --}}

@include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])


<main style="padding-top:30px; padding-bottom: 80px" class="container">
    <div class="row">
        @include('frontend.partials.academics_cat')
        <div class="col-lg-8">
            <div id="display_services" class="row">
                {{-- @foreach($programs as $pr)
                <div class="custom-card col-lg-4 col-md-4 col-sm-6 academics-card">
                    <div class="academics-card-icon text-center mt-4">
                        <a href="{{ route('academics.academics_details', $pr->id) }}">
                            <img class="rounded" src="{{ asset('upload/program/'.$pr->image) }}" height="80" width="80" onerror="this.onerror=null;this.src='{{ asset('frontend/images/faculty-icon.png') }}';" alt="icon">

                            <h3 class="fs-6 text-center text-white mt-2">{{$pr->program_category}}</h3>
                            <p>{{$pr->program_title}}</p>
                        </a>
                    </div>
                </div>
                @endforeach --}}
            </div>
            <div id="pagination_links"></div>

        </div>
        <div class="col-12">
            <div class="shadow p-3 mb-3 bg-light rounded program-type mt-4">
                <h5 class="mt-3 card-header-facultys d-flex justify-content-between">
                    <p class="text-white my-auto" style="font-weight: 600;">Notices</p>
                    <form action="news-event-notice-filter" method="get">
                        @csrf
                        <input type="hidden" name="type" value="3">
                        <input type="hidden" name="categorys" value="4">
                        <input type="hidden" name="cate" id="cate">
                        <button type="submit" style="border: none; background: none; color: white; font-weight: 600;">All</button>
                    </form>
                    {{-- <a class="text-white" href="{{ url('/news-event-notice-search-filter-filter') }}?search_type=3">all</a> --}}
                </h5>
                <ul class="list-group" id="notice_service">
                    {{-- @if (count($notices) > 0)
                    @foreach (@$notices as $item)
                    <li class="list-group-item">
                        <div class="card-body">
                            <h5 class="card-title fs-4" style="text-align: justify; font-size:15px;">
                                <a href="{{ route('type.details', ['id' => $item->id, 'type' => 'notice']) }}" target="_blank">{{ $item->title }}</a>
                            </h5>
                            <div class="card-text">
                                <span>Published: {{ date('M d,Y', strtotime($item->date)) }}</span>
                            </div>
                            <a href="{{ route('type.details', ['id' => $item->id, 'type' => 'notice']) }}" target="_blank">
                            <button type="button" class="btn btn-sm rounded-pill"><i class="fas fa-plus" style="color: #1C4370;"></i> Read more</button>
                            </a>
                            
                        </div>
                    </li>
                    @endforeach
                    @else
                        No academic notice have been given yet
                    @endif --}}
                    
                </ul>
            </div>
        </div>

        <div class="col-12">
            <div class="shadow p-3 mb-3 bg-light rounded program-type mt-4">
                <h5 class="mt-3 card-header-facultys">FAQ</h5>
                <ul class="list-group" id="faq_service">
                    {{-- @if (count($notices) > 0)
                    @foreach (@$notices as $item)
                    <li class="list-group-item">
                        <div class="card-body">
                            <h5 class="card-title fs-4" style="text-align: justify; font-size:15px;">
                                <a href="{{ route('type.details', ['id' => $item->id, 'type' => 'notice']) }}" target="_blank">{{ $item->title }}</a>
                            </h5>
                            <div class="card-text">
                                <span>Published: {{ date('M d,Y', strtotime($item->date)) }}</span>
                            </div>
                            <a href="{{ route('type.details', ['id' => $item->id, 'type' => 'notice']) }}" target="_blank">
                            <button type="button" class="btn btn-sm rounded-pill"><i class="fas fa-plus" style="color: #1C4370;"></i> Read more</button>
                            </a>
                            
                        </div>
                    </li>
                    @endforeach
                    @else
                        No academic notice have been given yet
                    @endif --}}
                    {{-- <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                    aria-expanded="false" aria-controls="collapseOne">
                                    What is the minimum qualification for applicant?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>It changes time to time. Please follow the admission notice for the latest requirements.</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Accordion Item #3
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>This is the third item's accordion body.</strong> It is hidden by default, until the
                                    collapse plugin adds the appropriate classes that we use to style each element. These classes
                                    control the overall appearance, as well as the showing and hiding via CSS transitions. You can
                                    modify any of this with custom CSS or overriding our default variables. It's also worth noting that
                                    just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit
                                    overflow.
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </ul>
            </div>
        </div>
    </div>
</main>
@endsection

@push('styles')
   <style>
    .breadcrumb {
        text-align: center;
        color: white;
        font-size: 1.5rem; /* Adjust the font size as needed */
        margin-top: 5px;
    }
    .breadcrumb a {
        color: white; /* Ensures breadcrumb links are white */
    }
    .breadcrumb a:hover {
        color: #ddd; /* Optional: change color on hover */
    }
    </style>
@endpush

@push('scripts')
    <script>

    </script>
@endpush
