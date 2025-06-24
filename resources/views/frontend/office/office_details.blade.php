@extends('frontend.layouts.master-landing')
@php
    $page_title = @$office->name;
@endphp
@section('title')
{{ $page_title }}
@endsection
@section('content')


<div class="section-area mt-1">
    <div class="banner">
        <div class="banner-content">
            <h1 class="text-white">{{ $page_title }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>/
                    <li class="breadcrumb-item"><a href="{{route('office')}}">Office</a></li>/
                    <li class="breadcrumb-item active" aria-current="page">{{ $page_title }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container mt-5 pb-5">
        <div class="row">
            <div class="col-12 office-details-area">
                <ul class="nav nav-fill nav-tabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="fill-tab-0" data-bs-toggle="tab" href="#fill-tabpanel-0"
                            role="tab" aria-controls="fill-tabpanel-0" aria-selected="true">About</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="fill-tab-1" data-bs-toggle="tab" href="#fill-tabpanel-1" role="tab"
                            aria-controls="fill-tabpanel-1" aria-selected="false">People</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="fill-tab-2" data-bs-toggle="tab" href="#fill-tabpanel-2" role="tab"
                            aria-controls="fill-tabpanel-2" aria-selected="false">Contact</a>
                    </li>
                </ul>
                <div class="tab-content pt-5" id="tab-content">
                    <div class="tab-pane active" id="fill-tabpanel-0" role="tabpanel" aria-labelledby="fill-tab-0">
                        <div class="card mb-3" style="max-width: 90%;">
                            <div class="row g-0">
                                <div class="col-md-4 office_details_messgae">
                                    <img class="img-fluid rounded-start"
                                        src="{{ @$office->profile->photo ? asset('upload/profiles/' . @$office->profile->photo) : @$office->profile->photo_path }}"
                                        onerror="this.onerror=null;this.src='{{ asset('public/dummy/user-dummy.jpeg') }}';" />
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h4 class="card-title">{{@$office->profile->nameEn}}</h4>
                                        <p class="card-title">{{@$office->profile->designation}}</p>
                                        <p class="card-text">{!! @$message->short_description !!}</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="fill-tabpanel-1" role="tabpanel" aria-labelledby="fill-tab-1">
                        <div class="office_album py-5 bg-light">
                            <div class="container">
                                <div class="row">
                                    @php
                                        $sortedProfiles = $profiles->sortBy(function($profile) {
                                        return $profile->sort_order == 1 ? 0 : 1; 
                                    });
                                    @endphp
                                     @foreach ($sortedProfiles as $profile)
                                     @if (isset($profile->profile->id) && !empty($profile->profile->id))
                                    <div class="col-md-4 col-sm-6 col-xl-4 mt-2">
                                        <div style="height: 360px;" class="card box-shadow">
                                            <img style="max-width:45%; margin-top:12px" class="img-thumbnail rounded-circle mx-auto d-block" src="{{ @$profile->profile->photo ? asset('upload/profiles/' . @$profile->profile->photo) : @$profile->profile->photo_path }}" onerror="this.onerror=null;this.src='{{ asset('dummy/user-dummy.jpeg') }}';" alt="{{@$profile->profile->nameEn}}" />
                                            <div class="card-body mt-2">
                                                <h6 class="card-title">
                                                    {{ @$profile->profile->nameEn ?? '' }}
                                                </h6>
                                                <div class="details_info">
                                                    <span>Designation : {{ @$profile->profile->designation ?? '' }}</span><br>
                                                    <span>Email : {{ @$profile->profile->email ?? '' }}</span><br>
                                                    <span>Contact : {{ @$profile->profile->mobile ?? '' }}</span>    
                                                </div>   
                                            </div>
                                        </div>
                                    </div>

                                    @else
                                        <div class="profile-item">
                                            <div class="profile-info">
                                                <p>Profile information not found!</p>
                                            </div>
                                        </div>
                                    @endif
                                    @endforeach
                                   
                                </div>
                            </div>
                        </div>
                       
                    </div>

                    <div class="tab-pane" id="fill-tabpanel-2" role="tabpanel" aria-labelledby="fill-tab-2">
                            <div class="card mb-3" style="max-width: 90%;">
                                <div class="row g-0">
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            {!! @$office->contact_info !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


@endsection

@push('styles')
    <style>
        .banner {
            position: relative;
            height: 250px;
            background: url("{{@$banner->image ? asset('upload/banner/' . @$banner->image) : ''}}") no-repeat center center;
            background-size: cover;
            color: white;
        }

        .banner::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            /* Semi-transparent overlay */
            z-index: 1;
        }

        .banner .banner-content {
            position: relative;
            z-index: 2;
            text-align: center;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .banner .banner-content h1 {
            margin-bottom: 20px;
        }

        .breadcrumb-item a {
            color: white;
        }

        .breadcrumb-item.active {
            color: #ffffff;
        }

        .office_details_messgae img {
            width: 70%;
            padding: 20px;
        }
    </style>
@endpush

@push('scripts')
    <script>
        console.log('script office details page');
    </script>
@endpush