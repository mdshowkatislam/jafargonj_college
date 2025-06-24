@extends('frontend.landing')
@php
    $page_title = "Welcome To Accounts Office";
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
                        <li role="presentation" class="active"><a href="#tab1" data-toggle="tab" class="nav-link">Abouts</a></li>
                        <li role="presentation"><a href="#tab2" data-toggle="tab" class="nav-link">Sections</a></li>
                        <li role="presentation"><a href="#tab3" data-toggle="tab" class="nav-link">People</a></li>
                        <li role="presentation"><a href="#tab4" data-toggle="tab" class="nav-link">Contact</a></li>
                    </ul>


                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">
                            @if (@$register->profile->id)
                                <img class="w-100 h-100 img-thumbnail image-showing"
                                     src="{{ @$register->profile->photo ? asset('upload/profiles/' . @$register->profile->photo) : @$register->profile->photo_path }}"
                                     onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';" />
                            @else
                                <img class="w-100 h-100 img-thumbnail image-showing"
                                     src="{{ @$register->Profile->photo ? asset('upload/profiles/' . @$register->profile->photo) : @$register->profile->photo_path }}"
                                     onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';" />
                            @endif

                            {!! @$register->short_description !!}

                        </div>
                        <div class="tab-pane" id="tab2">

                        </div>
                        <div class="tab-pane" id="tab3">
                            <div class="panel panel-default" style="width:50%">
                                <div class="panel-body">
                                    <h5>Office of the Finance & Accounts</h5>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab4">
                            <div class="panel panel-default" style="width:50%">
                                <div class="panel-body">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
