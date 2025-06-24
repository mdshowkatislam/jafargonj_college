@extends('frontend.landing')
@php
    $page_title = $office->name;
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
                            <table class="table table-bordered table-striped" style="width: 70%">
                                <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Section Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Administrative Section, Registrar Office</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Academic Section, Registrar Office</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="tab3">
                            <div class="info title">
                                <div class="advisor-area bottom-less bg-cover">
                                    <div class="container">
                                        <div class="row">
                                            <div class="advisor-items col-3 text-light text-center">
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
                                                                        <p style="color: black">{{ $profile->profile->designation ?? '' }}
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
                        </div>

                        <div class="tab-pane" id="tab4">
                            <div class="panel panel-default" style="width:50%">
                                <div class="panel-body">
                                    <div class="contacts-tab">
                                        <p>Office of the Registrar</p>
                                        <p>Bangladesh University of Textiles</p>
                                        <p>Ex-127, 02-48112442</p>
                                        <p>Phone: +88 01832-363335</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endsection
