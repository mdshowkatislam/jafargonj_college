@extends('frontend.department.tamplate_four.partials.main-second')

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
    @include('frontend.partials.sections.search', ['page_title' => $page_title])
    <!-- Hero Title -->
    <main class="container">
        <section>
            <div class="container">
                <div class="row">
                    @if (count($news) > 0)
                        @foreach ($news as $key => $n)
                            <div class="mt-5 col-12 border-bottom pb-5">
                                <div class="row d-flex justify-content-center ">
                                    <div class="col-lg-12 shadow bg-light rounded p-3 content-title">
                                        <div class=" content-title">
                                        <h1 class="fs-4 fw-bold mb-2">
                                            <a href="{{ route('notice.details', $n->id) }}"
                                                class="news-title">{{ $n->title }}
                                            </a>
                                        </h1>
                                    </div>
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
                        <div class="mt-5 col-12 border-bottom pb-5">
                            <div class="row d-flex justify-content-center">
                                <h1 class="fs-4 fw-bold mb-2">There are no notices at this moment!</h1>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>

    </main>

@endsection
