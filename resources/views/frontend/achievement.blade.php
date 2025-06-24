@extends('frontend.landing')
@php
    $page_title = 'Special Achievement';
@endphp
@section('title')
    {{ $page_title }}
@endsection
@section('content')
@include('frontend.partials.sections.banner', ['page_title' => $page_title])


<style>
      .content{
         padding: 0px 0 25px 0;
      }
      .content img{
          display: block;
          width: 400px;
          height: 300px;
          float: right;
          margin-left: 10px;
          margin-top: 16px;
          /* border: 1px solid #000; */
      }
      .content h3{
         padding: 20px 0 0px 0;
      }

    content .content-text{
      margin: 0 !important;
      padding: 0 !important;

    }
    .content-text p{
      margin: 0 !important;
      padding: 0 !important;
      margin-top: 15px;
      float: left;
      text-align: justify
    }
    .content h3{
         font-size: 40px;
         font-weight: 300;
         color: #198754
      }
      .content p{
        text-align: justify;
        padding-right: 10px
      }

</style>

<div class="container">
  @foreach (@$achievements as $item)
    
  
    <div class="content">
      
      <h3 class="fs-4">{{@$item->title}}</h3>
      <img class="ms-4 mb-3 bg-light shadow" src="{{asset('upload/special_achievement/'. @$item->image)}}" alt="" onerror="this.onerror=null;this.src='{{ asset('upload/no-image.png') }}';">

      <p>{!! @$item->long_description !!}</p>
      <div class="content-text">

    </div>
    </div>
    @endforeach
</div>

@endsection







