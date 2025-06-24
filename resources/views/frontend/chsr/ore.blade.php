@extends('frontend.layouts.master-landing')
@php
$page_title = 'Welcome to Office of Research & Extension (ORE)';
@endphp
@section('title')
{{ $page_title }}
@endsection
@section('content')

{{-- @include('frontend.partials.sections.banner-cover5', ['page_title' => $page_title]) --}}

@include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])

<section class="page_padding">
    <div class="container">
        <div class="row">
            <div class="col-md-8">

            @foreach ($about_ore as $ore)
                <div class="card ore_card">
                        <div style="background-color:#1fb4af; font-size: 16px;" class="card-header text-white text-center">
                           {{ $ore->title}}
                        </div>
                        <div class="card-body">
                            {!!$ore->description!!}
                      </div>
                </div>
            @endforeach
            
            </div>
            <div class="col-md-4">
                <div class="card sidebar-forms-formats sidebar-box ore_sidebarcard">
                    <div style="background-color:#1fb4af; font-size: 16px;" class="card-header mb-2 text-white">
                        <h5 class="text-white">Forms & Formats</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            @foreach ($documentList as $document)
                            <a target="_blank" href="{{ asset('uploads/' . @$document->document) }}" alt="_blank"><li class="list-group-item my-hover">{{$document->title}}</li></a>
                            @endforeach
                        </ul>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
    .my-hover {
        transition: background-color 0.3s ease, color 0.3s ease; /* Smooth transition */
    }

    .my-hover:hover {
        background-color: #00c5bf; /* Background color on hover */
        color: #ffffff; /* Text color on hover */
    }
    .page_padding{
        padding-top: 60px;
        padding-bottom: 60px;
        font-family: "Poppins", sans-serif;
    }
    .ore_card:not(:first-child) {
        margin-top: 20px; 
    }
    .ore_card {
        padding: 15px;
        border: 1px solid rgba(255, 255, 255, 0.25);
        border-radius: 20px;
        background-color: rgba(255, 255, 255, 0.45);
        box-shadow: 0 0 10px 1px rgba(0, 0, 0, 0.25);

        backdrop-filter: blur(15px);
    }
    .ore_sidebarcard {
        border-radius: 10px;
        box-shadow: 2px 2px 10px 1px rgba(197, 197, 197, 0.5);
        backdrop-filter: blur(15px);
        font-family: "Poppins", sans-serif;
        font-size: 16px;
        color: #0a0a0a;
    }

    .about-box {
        margin: 40px 10px;
    }


</style>
@endpush

@push('scripts')
<script>

</script>
@endpush