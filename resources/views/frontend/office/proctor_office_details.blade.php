@extends('frontend.landing')
@php
    $page_title = 'Welcome To Proctor Office';
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
    </style>

    <script>
        $(document).ready(function() {
            $('.nav-link').click(function() {
                $('.nav-pills li').removeClass('active');
                $(this).closest('li').addClass('active');
            });
        });
    </script>

    <div class="course-details-area default-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <ul class="nav nav-pills">
                        <li role="presentation" class="active"><a href="#tab1" data-toggle="tab" class="nav-link">Abouts</a>
                        </li>
                        <li role="presentation"><a href="#tab2" data-toggle="tab" class="nav-link">Assistant of
                                Proctors</a></li>
                        <li role="presentation"><a href="#tab3" data-toggle="tab" class="nav-link">People</a></li>
                        <li role="presentation"><a href="#tab4" data-toggle="tab" class="nav-link">Contact</a></li>
                    </ul>


                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div style="margin-bottom: 40px" class="about_proctor">
                                        <h2> ABOUT</h2>

                                        The University has a Proctorial system. The existing proctorial team consists of one
                                        Proctor and three Assistant Proctor. The role of the Proctors is to ensure the
                                        enforcement of the rules and regulations of the university specified by the BUTEX
                                        act
                                        and syndicate. The team also perform other duties required by the Vice-Chancellor
                                        regarding discipline of the students. Prof. Dr. Ummul Khair Fatema is the present
                                        Proctor of the university.
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h2>{{ @$proctor->title_first_part }}</h2>

                                    @if (@$proctor->profile->id)
                                        <img class="w-100 h-100 img-thumbnail image-showing"
                                            src="{{ @$proctor->profile->photo ? asset('upload/profiles/' . @$proctor->profile->photo) : @$proctor->profile->photo_path }}"
                                            onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';" />
                                    @else
                                        <img class="w-100 h-100 img-thumbnail image-showing"
                                            src="{{ @$proctor->Profile->photo ? asset('upload/profiles/' . @$proctor->profile->photo) : @$proctor->profile->photo_path }}"
                                            onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';" />
                                    @endif
                                    {!! @$proctor->short_description !!}


                                    

                                </div>
                            </div>

                        

                        </div>
                        <div class="tab-pane" id="tab2">
                            <div class="panel panel-default" style="width:50%">
                                <div class="panel-body">
                                    <div class="info title">
                                        <div class="advisor-area bottom-less bg-cover">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="advisor-items col-3 text-light text-center">
                                                        @foreach ($profiles as $profile)
                                                            @if (isset($profile->profile->id) && !empty($profile->profile->id))
                                                                <div class="col-md-4 col-sm-6 single-item">
                                                                    <div class="item">
                                                                        <div class="thumb">
                                                                            <img class="w-100 h-100 img-thumbnail image-showing"
                                                                                src="{{ @$profile->profile->photo ? asset('upload/profiles/' . @$profile->profile->photo) : @$profile->profile->photo_path }}"
                                                                                onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';" />
                                                                        </div>
                                                                        <div class="info">
                                                                            <div class="min-height-45px">
                                                                                <h4>{{ $profile->profile->nameBn ?? '' }}
                                                                                </h4>
                                                                            </div>

                                                                        </div>
                                                                        <div class="footer-meta">
                                                                            <a class="btn circle btn-dark border btn-sm"
                                                                                target="_blank" style="margin:10px;"
                                                                                href="#">View
                                                                                Profile<i
                                                                                    class="fas fa-check-circle fa-2x fa-pull-right"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <div class="profile-item">
                                                                    <div class="profile-info">
                                                                        <h4>Profile Information Not
                                                                            Available</h4>
                                                                        <p>Please contact support for more
                                                                            information.</p>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                        <div class="col-md-6 single-item">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab3">
                            <div class="info title">
                                <div class="advisor-area bottom-less bg-cover">
                                    <div class="container">
                                        <div class="row">
                                            <div class="advisor-items col-3 text-light text-center">
                                                @foreach ($profiles as $profile)
                                                @if (isset($profile->profile->id) && !empty($profile->profile->id))
                                                    <div class="col-md-6 single-item">
                                                        <div class="item">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="thumb">
                                                                        <img class="w-100 h-100 img-thumbnail image-showing"
                                                                            src="{{ @$profile->profile->photo ? asset('upload/profiles/' . @$profile->profile->photo) : @$profile->profile->photo_path }}"
                                                                            onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';" />
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6"
                                                                    style="text-align: center; margin-top: 12%;">
                                                                    <p
                                                                        style="color: black; font-style: italic; font-weight: bold">
                                                                    <h4>{{ $profile->profile->nameBn ?? '' }}</h4>
                                                                    </p>
                                                                    <p style="color: black">
                                                                        {{ $profile->profile->designation ?? '' }}
                                                                    </p>
                                                                    <p style="color: black"><i
                                                                            class="fas fa-envelope-square"></i>
                                                                        {{ $profile->profile->email ?? '' }}</p>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="profile-item">
                                                        <div class="profile-info">
                                                            <h4>Profile Information Not
                                                                Available</h4>
                                                            <p>Please contact support for more
                                                                information.</p>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab4">

                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
