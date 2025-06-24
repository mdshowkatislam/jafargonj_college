@extends('frontend.landing')
@php
    $page_title = 'Butex Short Story';
@endphp
@section('title')
    {{ $page_title }}
@endsection


@section('content')
    @include('frontend.partials.sections.banner-cover', ['page_title' => $page_title])

    <style>
        .image-container {
            position: relative;
            display: inline-block;
        }

        .image-container img {
            display: block;
            width: 100%;
            height: auto;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            background-color: rgba(0, 0, 0, 0.5);
            transition: opacity 0.3s ease;
        }

        .overlay-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            text-align: center;
            opacity: 0;
            transition: opacity 0.3s ease;
            width: 90%;
        }

        .image-container:hover .overlay {
            opacity: 1;
        }

        .image-container:hover .overlay-content {
            opacity: 1;
        }

        .overlay-content h3 {
            font-size: 24px;
            margin-bottom: 10px;
            color: white;
        }

        .overlay-content p {
            font-size: 16px;
            color: white;
        }
    </style>

    <script>
        var currentDate = new Date();

        // Get day, month, and year
        var day = currentDate.getDate();
        var month = currentDate.toLocaleString('default', {
            month: 'short'
        });
        var year = currentDate.getFullYear();

        // Update the HTML elements
        document.getElementById("day").innerHTML = day;
        document.getElementById("month").innerHTML = month;
        document.getElementById("year").innerHTML = year;
    </script>

    <div class="course-details-area default-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="date-area-container">
                        <div class="date-area data updated">
                            <a href="#" class="escapea">
                                <div class="day-area" id="day"></div>
                                <span class="month-area" id="month"></span>
                                <span class="year-area" id="year"></span>
                            </a>
                        </div>
                    </div>
                    <div class="courses-info">
                        
                        <div class="tab-info">
                            <div class="panel panel-default">
                                <div class="panel-body text-justify">
                                    <div style="margin-bottom: 20px;" class="image-container">
                                        <img src="{{ asset('frontend/images/BUTEX-Inception.jpg') }}"
                                            class="img-thumbnail" alt="">
                                        <div class="overlay">
                                            <div class="overlay-content">
                                                <h3>BUTEX: A Short History</h3>
                                                <p>Bangladesh University of Textiles is the only public university among all textile universities in Bangladesh established in order</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="wrapper center-block description_box">
                                        <h1>{{$shortStories->title}}</h1>

                                        <a style="margin-bottom:40px" href="{{$shortStories->url}}" class="btn btn-info">New Desk</a>
                                        <div class="description">
                                            <p> {!!$shortStories->description!!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="aside">
                        <div class="sidebar-item category">
                            <div class="panel panel-default">
                                <div class="panel-body text-justify">
                                    <h4>Latest Updates</h4>
                                    <ul>
                                        <li><a href="#">Historical Outline</a></li>

                                        <li><a href="#">University at a Glance</a></li>
                                        <li><a href="#">Honoris Causa</a></li>
                                        <li><a href="#">Message from the Vice Chancellor</a>
                                        </li>
                                        <li><a href="#">List of Vice Chancellors</a></li>
                                        <li><a href="#">Notable Alumni</a></li>
                                    </ul>
                                </div>
                            </div>


                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
