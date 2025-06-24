@extends('frontend.layouts.master-landing')
@php
    $page_title = "Offices"
@endphp
@section('title'){{$page_title}} @endsection

@section('content')

<style>
.office_title {
  color: #262626;
  font-size: 17px;
  line-height: 24px;
  font-weight: 700;
  margin-bottom: 4px;
}

p {
  /* font-size: 17px; */
  font-weight: 400;
  line-height: 20px;
  color: #666666;

  &.small {
    font-size: 14px;
  }
}

.go-corner {
  display: flex;
  align-items: center;
  justify-content: center;
  position: absolute;
  width: 32px;
  height: 32px;
  overflow: hidden;
  top: 0;
  right: 0;
  background-color: #00c5bf;
  border-radius: 0 4px 0 32px;
}

.go-arrow {
  margin-top: -4px;
  margin-right: -4px;
  color: white;
  font-family: "Titillium Web", sans-serif;
}

.card10 {
  display: block;
  position: relative;
  max-width: 262px;
  background-color: #f2f8f9;
  border-radius: 4px;
  padding: 32px 24px;
  margin: 12px;
  text-decoration: none;
  z-index: 0;
  overflow: hidden;

  &:before {
    content: "";
    position: absolute;
    z-index: -1;
    top: -16px;
    right: -16px;
    background: #00c5bf;
    height: 32px;
    width: 32px;
    border-radius: 32px;
    transform: scale(1);
    transform-origin: 50% 50%;
    transition: transform 0.25s ease-out;
    -webkit-transition: transform 0.25s ease-out; /* Safari */
    -moz-transition: transform 0.25s ease-out; /* Firefox */
    -o-transition: transform 0.25s ease-out; /* Opera */
    /* Fallback for older Edge and IE */
    -ms-transform: scale(1); /* For IE 10 */
  }

  &:hover:before {
    transform: scale(21);
    -webkit-transform: scale(21); /* Safari */
    -moz-transform: scale(21); /* Firefox */
    -o-transform: scale(21); /* Opera */
  }
}

.card10:hover {
  p {
    transition: all 0.3s ease-out;
    -webkit-transition: all 0.3s ease-out; /* Safari */
    -moz-transition: all 0.3s ease-out; /* Firefox */
    -o-transition: all 0.3s ease-out; /* Opera */
    color: rgba(255, 255, 255, 0.8);
  }
  .office_title {
    transition: all 0.3s ease-out;
    -webkit-transition: all 0.3s ease-out; /* Safari */
    -moz-transition: all 0.3s ease-out; /* Firefox */
    -o-transition: all 0.3s ease-out; /* Opera */
    color: #ffffff;
  }
}

  
</style>

{{-- @include('frontend.partials.sections.banner-cover', ['page_title' => $page_title]) --}}
@include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])

<section class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="fs-3 py-2 my-4 border-bottom custom-font-titillium-web">All Offices</h2>
            </div>

            {{-- <div class="col-md-4 d-none">
                <!-- Left Sidebar -->
                <div class="bg-light p-3 border">
                    <ul class="list-group">
                        @foreach($all as $office)
                            <li style="height: 60px;line-height: 40px;" class="list-group-item list-group-item-action">
                                <a href="{{ route('office_home', @$office->id) }}">{{ @$office->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div> --}}

            <div class="col-md-12">
                <div class="p-3 border">
                    <div class="row d-flex flex-wrap">
                        @foreach($all as $office_card)
                            <div class="col-lg-3 col-md-4 col-sm-6 d-flex">
                                <a class="card10 flex-fill" href="{{ route('office_home', @$office_card->id) }}">
                                    <h3 class="office_title">{{ @$office_card->name }}</h3>
                                    {{-- <p class="small">Card description with lots of great facts and interesting details.</p> --}}
                                    <div class="go-corner" href="{{ route('office_home', @$office_card->id) }}">
                                      <div class="go-arrow">
                                        →
                                      </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
