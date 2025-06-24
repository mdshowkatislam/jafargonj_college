@extends('frontend.layouts.master-landing')
@php
    $page_title = 'Message from the Pro Vice Chancellor';
@endphp
@section('title')
    {{ $page_title }}
@endsection
@section('content')

@include('frontend.partials.sections.banner-cover5', ['page_title' => $page_title])
   
<div class="section-area my-5">
    <div class="container">
        <div class="row">
            <div class="card box-shadow">
               <div class="card-body">
                    <h2>This Page Under Construction !!</h2>
               </div>
            </div>

        </div>
    </div>
</div>    


<div class="section-area">
    <div class="container-fluid">
            <div class="row">
                    
            </div>
        </div>
    </div>
</div>


@endsection
@push('styles')
   <style>
   
    </style>
@endpush

@push('scripts')
    <script>
     
    </script>
@endpush
