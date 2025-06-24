@extends('frontend.landing')
{{-- @extends('frontend.layouts.master-landing') --}}
@php
$page_title = 'Welcome To ' . (@$office->name ?? '');
@endphp
@section('title')
{{ $page_title }}
@endsection
@section('content')
@include('frontend.partials.sections.banner-cover', ['page_title' => $page_title])

<style>
    .course-details-area ul.nav-pills li a {
        border-radius: inherit;
        text-transform: uppercase;
        font-weight: 600;
        padding: 15px 25px;
        letter-spacing: 0.6px;
    }


    .card {
        display: block;
        margin-bottom: 20px;
        line-height: 1.42857143;
        background-color: #fff;
        border-radius: 2px;
        box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
        transition: box-shadow .25s;
    }

    .card:hover {
        box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .img-card {
        width: 50%;
        height: 160px;
        border-top-left-radius: 2px;
        border-top-right-radius: 2px;
        display: block;
        overflow: hidden;
        margin: 0px auto;
    }

    .img-card img {
        width: 100%;
        object-fit: cover;
        transition: all .25s ease;
        margin-top: 12px;
    }

    .card-content {
        padding: 15px;
        text-align: left;
    }

    .card-title {
        margin-top: 0px;
        font-weight: 700;
        font-size: 1em;
    }

    .card-title a {
        color: #000;
        text-decoration: none !important;
    }

    .card-read-more {
        border-top: 1px solid #D4D4D4;
    }

    .card-read-more a {
        text-decoration: none !important;
        padding: 10px;
        font-weight: 600;
        text-transform: uppercase
    }
</style>

<div class="course-details-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <ul class="nav nav-pills">
                    <li role="presentation" class="active"><a href="#tab1" data-toggle="tab" class="nav-link">Abouts</a>
                    </li>

                    <li role="presentation"><a href="#tab2" data-toggle="tab" class="nav-link">People</a></li>
                    <li role="presentation"><a href="#tab3" data-toggle="tab" class="nav-link">Contact</a></li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="tab1">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div style="margin-bottom: 20px;" class="profile-box">
                                    @if (@$message->profile->id)
                                    <img class="w-100 h-100 img-thumbnail image-showing" src="{{ @$message->profile->photo ? asset('upload/profiles/' . @$message->profile->photo) : @$message->profile->photo_path }}" onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';" />
                                    @else
                                    <img class="w-100 h-100 img-thumbnail image-showing" src="{{ @$message->Profile->photo ? asset('upload/profiles/' . @$message->profile->photo) : @$message->profile->photo_path }}" onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';" />
                                    @endif
                                </div>
                                {!! @$message->short_description !!}

                            </div>
                        </div>

                    </div>
                    <div class="tab-pane" id="tab2">

                        <div class="content">
                            <div class="container">
                                <div class="row">
                                    @php
                                    $sortedProfiles = $profiles->sortBy(function($profile) {
                                    return $profile->sort_order == 1 ? 0 : 1;
                                    });
                                    @endphp
                                    @foreach ($sortedProfiles as $profile)
                                    @if (isset($profile->profile->id) && !empty($profile->profile->id))
                                    <div class="col-xs-12 col-sm-3">
                                        <div class="card">
                                            <a class="img-card" href="#">
                                            <img class="img-thumbnail img-circle" src="{{ @$profile->profile->photo ? asset('upload/profiles/' . @$profile->profile->photo) : @$profile->profile->photo_path }}" onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';" />
                                            </a>
                                            <div class="card-content">
                                                <h4 class="card-title">
                                                {{ @$profile->profile->nameEn ?? '' }}
                                                </h4>
                                                <p class="">
                                                    <h6>Designation : {{ @$profile->profile->designation ?? '' }}</h6>
                                                    <h6>Email : {{ @$profile->profile->email ?? '' }}</h6>
                                                    <h6>Contact : {{ @$profile->profile->mobile ?? '' }}</h6>
                                                </p>
                                            </div>
                                            <div class="card-read-more">
                                                <a href="#" class="btn btn-link btn-block">
                                                Profile
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    @else
                                    <div class="profile-item">
                                        <div class="profile-info">
                                            <h4>Profile Information Not Available</h4>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane" id="tab3">
                        <div class="info title">
                            <div class="panel panel-primary">
                                <div class="panel-body">
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

@endsection

<script>
    $(document).ready(function() {
        $('.nav-link').click(function() {
            alert('click tab');
            $('.nav-pills li').removeClass('active');
            $(this).closest('li').addClass('active');
        });
    });
</script>