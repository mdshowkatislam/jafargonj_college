@php
    $page_title = 'Counselling & Placement Centre';
@endphp
@section('title')
    {{ $page_title }}
@endsection
<style>
    .faculty-profile-banner {
        background-image: linear-gradient(rgba(13, 202, 76, 0.75),
                rgba(1, 39, 11, 0.75)),
            url({{ @$banner->image ? asset('upload/banner/' . $banner->image) : '' }});
    }
</style>
@extends('frontend.cpc.partials.main')

@section('content')
    <div class="faculty-profile-banner d-flex justify-content-center align-items-center">
        <h1 class="text-white text-center">{{ $page_title }}</h1>
    </div>

    <!-- Profile -->
    <section class="profile">
        <div class="container">
            <div class="row my-5">
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="text-center bg-light shadow rounded" style="height: 550px">
                        <div class="img p-4" style="height:400px ">
                            <img class="rounded w-100 h-100" src="{{ @$message->profile->photo ? asset('upload/profiles/' . @$message->profile->photo) : @$message->profile->photo_path }}" onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';" />

                        </div>
                        <div class="text-center px-3 pb-3 bg-light rounded" style="height: 150px">
                            <div class="border-top pt-3">
                                <a href="#" class="text-dark fw-bold fs-5 mb-0 lh-sm faculty-title">{{ @$message->profile->nameEn }}</a>
                                <p class="fw-bold common-font-color fs-6 mb-1 pt-2">
                                    @if ($cpc->is_designation == 1)
                                        {{ $cpc->designation_name }}
                                    @else
                                        {{ @$message->profile->designation }}
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="bg-light p-3 rounded shadow about-message-content " style="height: 550px">
                        <div>
                            <h2 class="fs-3 fw-bold border-bottom pb-3 mb-3 common-font-color">Message from Director
                            </h2>
                            <div class="text-justify fs-6">
                                @php
                                    $originalText = @$message->short_description;
                                    $truncatedText = Str::limit($originalText, 1300, '...');
                                    $textLeft = strlen($originalText) === strlen($truncatedText);
                                @endphp
                                {!! Str::limit(@$message->short_description, 1300, '...') !!}
                                @if (!$textLeft)
                                    <a href="{{ route('cpc.message') }}" class="ms-1 fw-bold">Read More </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- News & Events -->
    <section class="py-5 cpc-news" style="background: rgba(0, 178, 255, 0.05);">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
                    <div class="d-flex justify-content-between align-items-end">
                        <h1 class="text-uppercase home-content-heading mb-0">
                            News
                        </h1>
                        <a href="{{ route('news.all') }}" class="text-uppercase text-decoration-none fw-bold common-font-color">All</a>
                    </div>
                    <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;">
                    </div>
                    @if (count($news) > 0)
                        <div class="row row-cols-1 row-cols-md-3 upcoming-events mt-3">
                            @include('frontend.partials.sections.news_new')
                        </div>
                    @else
                        <h2 class="fs-5 p-3 mt-3 bg-light rounded shadow-sm">There is no news at the moment..</h2>
                    @endif
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
                    <div class="d-flex justify-content-between align-items-end">
                        <h1 class="text-uppercase home-content-heading mb-0"> Events </h1>
                        <a href="{{ route('events.all') }}" class="text-uppercase text-decoration-none fw-bold common-font-color">All</a>
                    </div>
                    <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;">
                    </div>
                    @if (count($events) > 0)
                        @include('frontend.partials.sections.events_new')
                    @else
                        <h2 class="fs-5 p-3 mt-3 bg-light rounded shadow-sm">There is no events at the moment..</h2>
                    @endif

                </div>
            </div>
        </div>

    </section>

    <!-- Contact -->
    <section class="my-5 cpc-contact">
        <div class="container">
            <div class="d-flex justify-content-between align-items-end">
                <h1 class="text-uppercase mb-0 home-content-heading">Contact Us</h1>
            </div>
            <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;">
            </div>
            <div class="row">
                {{-- <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="contact-form mt-4">
                        <form action="" method="" >
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Your name">
                                <label for="name">Your name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                                <label for="email">Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Leave a comment here" id="message" name="message"></textarea>
                                <label for="message">Message</label>
                            </div>
                           
                            <button type="submit" class="btn btn-primary" disabled>Submit</button>
                        </form>
                    </div>
                </div> --}}
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="contact-info mt-3">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Counselling & Placement Center (CPC)</li>
                            <li class="list-group-item">Multipurpose Shade</li>
                            <li class="list-group-item">BANGLADESH UNIVERSITY OF PROFESSIONALS(BUP)</li>
                            <li class="list-group-item">{{ $contact->location }}</li>
                            <li class="list-group-item">{{ $contact->phone }}</li>
                            <li class="list-group-item">{{ $contact->fax }}</li>
                            <li class="list-group-item">{{ $contact->email }}</li>
                            {{-- <li class="list-group-item">Mirpur Cantonment, Dhaka- 1216</li>
                            <li class="list-group-item"> +8809666790790</li>
                            <li class="list-group-item"> 88-02-8000443</li>
                            <li class="list-group-item">info@bup.edu.bd</li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
