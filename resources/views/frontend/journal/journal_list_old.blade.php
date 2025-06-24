@extends('frontend.layouts.master-landing')
@php
    $page_title = 'Butex Journal ';
@endphp
@section('title')
    {{ $page_title }}
@endsection


@section('content')
    {{-- @include('frontend.partials.sections.banner-cover', ['page_title' => $page_title]) --}}
    @include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])

    <section>
        <div class="container my-5">
            <div class="row">
                <div class="col-md-3 col-sm-12">
                    <div class="list-group" id="list-tab" role="tablist">
                        @foreach ($journalList as $item)
                            <a class="list-group-item list-group-item-action" id="list-{{$item->id}}-list" data-bs-toggle="list" href="#list-{{$item->id}}" role="tab" aria-controls="list-{{$item->id}}">{{ $item->title }}</a>                      
                        {{-- <a class="list-group-item list-group-item-action menu" href="/Home/AboutBUPJournal">{{ $item->title }}</a> --}}
                        @endforeach
                    </div>
                </div>
                <div class="col-md-9 col-sm-12">
                    <div class="tab-content" id="nav-tabContent">
                        @foreach ($journalList as $item)
                        {{-- <div class="tab-pane active" id="home-{{$item->id}}">{!! @$item->description !!}</div> --}}
                        <div class="tab-pane fade custom-font-titillium-web" id="list-{{$item->id}}" role="tabpanel" aria-labelledby="list-{{$item->id}}-list">{!! @$item->description !!}</div>
                        @endforeach
                        {{-- <div class="tab-pane active" id="home-v">Home Tab.</div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
{{-- <div class="description">
    {!! Str::limit(@$journal->description, 200) !!}
    @if(Str::length(@$journal->description) > 200)
        <a href="#">Read more</a>
    @endif
</div> --}}
@push('styles')
   <style>
        #list-tab .list-group-item {
            font-size: 1rem;
            padding-top: 1rem;
            padding-bottom: 1rem;
        }
        #list-tab .active {
            background: #56ccc8;
            border: none;
        }
        .tab-content .tab-pane strong {
            font-weight: bold !important;
        }
        .tab-content .tab-pane {
            text-align: justify;
        }
        /* table tbody, td, tfoot, th, thead, tr {
            border-width: 1px;
        } */
    </style>
@endpush
@push('scripts')
    <script>
        $(document).ready(function() {
            // Add 'show' and 'active' classes to the first tab and its corresponding content
            $('#list-tab .list-group-item').first().addClass('active');
            $('#nav-tabContent .tab-pane').first().addClass('show active');
        });
    </script>
@endpush
