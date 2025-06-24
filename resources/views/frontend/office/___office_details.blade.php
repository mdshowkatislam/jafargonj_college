<!-- ===== slider section start ===== -->
@extends('frontend.landing')
@php
    $page_title = $office->name;
@endphp
@section('title')
    {{ $page_title }}
@endsection
@section('content')

    <!-- Banner -->
    {{-- <section>
    <div class="vc-banner d-flex justify-content-center align-items-center" style="background-image: url(../../frontend/assets/img/vc/vc-cover.jpg);">
      <h1 class="text-uppercase text-white font-poppins">{{ $office->name }}</h1>
    </div>
  </section> --}}
    @include('frontend.partials.sections.banner', ['page_title' => $page_title])

    <!-- Profile -->
    @if ($office->profile_id)
        <section class="container mt-5">
            {{-- <h1 class="fs-4 text-primary py-3 fw-bold">People of vc Office</h1> --}}
            <div class="profile">
                <div class="row">
                    {{-- <div class="col-lg-3 col-md-6 profile-img">
                        <img class="object-cover"
                            src="{{ @$office->profile->photo ? asset('upload/profiles/' . @$office->profile->photo) : @$office->profile->photo_path }}"
                            onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';" />
                    </div> --}}
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="text-center bg-light shadow rounded" style="height: 550px">
                            <div class="img p-4" style="height:400px ">
                                <img class="rounded w-100 h-100" src="{{ @$office->profile->photo ? asset('upload/profiles/' . @$office->profile->photo) : @$office->profile->photo_path }}" onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';" />
                            </div>
                            <div class="text-center px-3 pb-3 bg-light rounded" style="height: 150px">
                                <div class="border-top pt-3">
                                    @if ($office->profile_id)
                                        <a href="{{ route('office.people.details', @$office->profile_id) }}" class="text-dark fw-bold fs-5 mb-0 lh-sm faculty-title">{{ @$office['profile']['nameEn'] }}</a>
                                        <p class="fw-bold common-font-color fs-6 mb-1 pt-2">
                                            
                                            @if ($office->is_designation == 1)
                                                {{ $office->designation_name }}
                                            @else
                                                {{ @$office['profile']['designation'] }}
                                            @endif
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12">
                        <div class="bg-light p-3 rounded shadow about-message-content" style="height: 550px">
                            <div>
                                @if (@$message['short_description'])
                                    {{-- <a href="{{ route('office.people.details', @$message->profile_id) }}"
                                        class="fs-4 fw-bold border-bottom pb-3 mb-3 common-font-color">{{ @$message['profile']['nameEn'] }}</a>
                                    <h2 class="fs-5 fw-bold text-primary">{{ @$message['profile']['designation'] }}</h2> --}}

                                    <h3 class="fs-3 fw-bold pb-3 mb-3 border-bottom common-font-color">About
                                        {{ $office->name }}</h3>
                                    <div class="text-justify fs-6">
                                        @php
                                            $originalText = @$message['short_description'];
                                            $truncatedText = Str::limit($originalText, 1300, '...');
                                            $textLeft = strlen($originalText) === strlen($truncatedText);
                                        @endphp
                                        {!! Str::limit(@$message['short_description'], 1300, '...') !!}
                                        @if (!$textLeft)
                                            <a href="{{ route('office.office_details_message', $office->id) }}" class="ms-1 fw-bold">Read More
                                            </a>
                                        @endif
                                    </div>
                                @else
                                    {{-- <a href="{{ route('office.people.details', @$office->profile_id) }}"
                                        class="fs-3 fw-bold pb-3 mb-3 common-font-color">
                                        {{ @$office['profile']['nameEn'] }}
                                    </a>
                                    <h2 class="fs-5 fw-bold text-primary">{{ @$office['profile']['designation'] }}</h2> --}}

                                    <h3 class="fs-3 fw-bold pb-3 mb-3 border-bottom common-font-color">About
                                        {{ $office->name }}</h3>
                                    <div class="text-justify fs-6">
                                        @php
                                            $originalText = @$office['about'];
                                            $truncatedText = Str::limit($originalText, 1300, '...');
                                            $textLeft = strlen($originalText) === strlen($truncatedText);
                                        @endphp
                                        {!! Str::limit(@$office['about'], 1300, '...') !!}
                                        @if (!$textLeft)
                                            <a href="{{ route('office.office_details_message', @$office->id) }}" class="ms-1 fw-bold">Read More
                                            </a>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    
                </div>
            </div>
        </section>
    @endif

    @if (count($profiles) > 0)
        <section class="container my-5">

            <div class="d-flex justify-content-between align-items-end">
                <h1 class="text-uppercase home-content-heading mb-0">
                    List of Officers
                </h1>
                {{-- <a href="{{ route('news.all') }}" class="text-uppercase text-decoration-none fw-bold common-font-color">All</a> --}}
            </div>
            <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;">
            </div>

            {{-- <h2 class="fs-3 text-center mt-5 mb-3 fw-bold"><span class="text-primary">Office</span> Staff</h2> --}}
            <div class="row pt-4">
                @foreach ($profiles as $p)
                    <div class="col-12 col-lg-6 col-md-6 d-flex justify-content-center align-items-center ">
                        <div class="container bg-light shadow-sm rounded mb-3">
                            <div class="row py-3 pe-3">
                                <div class="col-lg-3">
                                    <img class="rounded-circle " src="{{ $p->profile->photo ? asset('upload/profiles/' . $p->profile->photo) : $p->profile->photo_path }}" onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';" height="128px" width="128px" style="border: 3px solid #00c5bf; padding: 5px;" />
                                </div>
                                <div class="col-lg-9 profile-info ps-4">
                                    <h2 class="fs-5 fw-bold mb-1"> {{ $p->profile->nameEn }} </h2>
                                    <h2 class="fs-6 fw-bold text-primary"> {{ $p->profile->designation }} </h2>
                                    <p class="fs-7">{{ $p->profile->email }}</p>
                                    <div class="d-flex justify-content-end px-3">
                                        <a href="{{ route('office.people.details', $p->profile->id) }}" class="btn btn-outline-primary fs-7">See Profile</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    @if (count($facilities) > 0)
        <section class="container mb-5">
            <div class="d-flex justify-content-between align-items-end">
                <h1 class="text-uppercase home-content-heading mb-0">
                    Facilities
                </h1>
                {{-- <a href="{{ route('news.all') }}" class="text-uppercase text-decoration-none fw-bold common-font-color">All</a> --}}
            </div>
            <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;">
            </div>
            {{-- <h2 class="fs-3 text-center my-5 fw-bold"><span class="text-primary">Facilities</span></h2> --}}
            <div class="container">
                @foreach ($facilities as $item)
                    <div class="row mt-3 shadow rounded">
                        <div class="col-lg-4 p-0">
                            <img class="object-cover" src="{{ asset('upload/office_facility/' . $item->image) }}" onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';" height="320px" width="320px" />
                        </div>
                        <div class="col-lg-8 py-3">
                            <h2 class="fs-4 fw-bold mb-2"> {{ $item->title }} </h2>
                            {!! $item->description !!}
                        </div>
                    </div>
                @endforeach

            </div>
        </section>
    @endif



    <!-- Gallery -->
    @if (count($galleryCategory) > 0)
        <section class="my-5">
            <div class="container">
                <h1 class="text-uppercase mb-0 home-content-heading">Gallery</h1>
                <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;"></div>
                @include('frontend.partials.sections.gallery-album')
            </div>
        </section>
    @endif

    
@endsection
