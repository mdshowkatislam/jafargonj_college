@extends('frontend.faculty.tamplate_three.partials.main')

@php
    $page_title = 'Notice';
@endphp
@section('title')
    {{ $page_title }}
@endsection


@section('content')
    <div class="faculty-profile-banner d-flex justify-content-center align-items-center" style=" background-image: url( {{ @$banner->image ? asset('upload/banner/' . $banner->image) : asset('frontend/assets/img/bup/banner.jpg') }} ) ">
        <h1 class="text-white font-poppins">{{ $page_title }}</h1>
    </div>
    <!-- Hero Title -->
    <main class="container">
        <section>
            <div class="container">
                <div class="row">
                    @if (count($news) > 0)
                        @foreach ($news as $key => $n)
                            <div class="mt-5 col-12 border-bottom pb-5">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-12 shadow bg-light rounded p-3">
                                        <h1 class="fs-4 fw-bold mb-2">
                                            <a href="{{ route('notice.details', $n->id) }}" class="news-title">{{ $n->title }}
                                            </a>
                                        </h1>
                                        <h1 class="fs-6 fw-bold">
                                            <i class="fas fa-calendar-alt"></i>
                                            {{ date('d M Y', strtotime(@$n->date)) }}
                                        </h1>
                                        <p class="fs-6 m-0"> {{ $n->short_description }} </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="my-5 col-12 ">
                            <div class="p-3 bg-light rounded">
                                <h1 class="fs-5 fw-bold m-0">There are no notices at this moment !</h1>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </section>

    </main>
@endsection
