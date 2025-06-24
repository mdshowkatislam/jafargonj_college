@extends('frontend.landing')


{{--  @extends($extend)  --}}



@php

        $page_title = 'Featured News and Events';
  
@endphp
@section('title')
    {{ $page_title }}
@endsection
@section('content')
    @include('frontend.partials.sections.banner', ['page_title' => $page_title])<br><br>


    @include('frontend.partials.sections.search', ['page_title' => $page_title])

    <main class="container">
        <section>
            <div class="container">
                <div class="row">
                    @foreach (@$all_featured as $key => $n)
                        @php
                            if ($n->type == 1) {
                                $type = 'news';
                            } elseif ($n->type == 2) {
                                $type = 'events';
                            } else {
                                $type = 'notice';
                            }
                        @endphp

                        <div class="mb-5 col-12 border-bottom pb-5">
                            <div class="row d-flex justify-content-center">
                                @if (!empty($n->image) && $n->type != 3)
                                    <div class="col-lg-4 col-md-6 text-center ">
                                        <img class="shadow rounded zoom_in_hover" style="width: 90%" src="{{ asset('upload/news/' . $n->image) }}" onerror="this.onerror=null;this.src='{{ asset('upload/no-image.png') }}';" />
                                    </div>
                                    <div class="col-lg-8 shadow bg-light rounded p-3">
                                        <h3 class="fs-4 fw-bold mb-2 content-title">
                                            <a href="{{ route($type . '.details', $n->id) }}" class="news-title">{{ $n->title }}
                                            </a>
                                        </h3>
                                        <h3 class="fs-6 fw-bold">
                                            <i class="fas fa-calendar-alt"></i>

                                            @if ($n->type == 2)
                                                {{ date('d M Y', strtotime(@$n->end_date)) }}
                                            @else
                                                {{ date('d M Y', strtotime(@$n->date)) }}
                                            @endif
                                        </h3>
                                        <p class="fs-6 m-0"> {{ Str::limit($n->short_description, 300, '...') }} </p>
                                    </div>
                            </div>
                        @else
                            <div class="col-lg-12 shadow bg-light rounded p-3 d-flex justify-content-between align-items-start">
                                <div>
                                    <h3 class="fs-4 fw-bold mb-2 content-title">
                                        <a href="{{ route($type . '.details', $n->id) }}" class="news-title">{{ $n->title }}
                                        </a>
                                    </h3>
                                    <h3 class="fs-7 fw-bold">
                                        <i class="fas fa-calendar-alt"></i>
                                        @if ($n->type == 2)
                                            {{ date('d M Y', strtotime(@$n->end_date)) }}
                                        @else
                                            {{ date('d M Y', strtotime(@$n->date)) }}
                                        @endif
                                    </h3>
                                    <p class="fs-6 m-0"> {{ Str::limit($n->short_description, 200, '...') }} </p>
                                </div>
                                @if ($n->file)
                                    <div class="">
                                        <a class="btn btn-sm btn-primary fs-7 fw-bold shadow download_links" href="{{ asset('upload/news/' . $n->file) }}" download="">Download</a>
                                    </div>
                                @endif
                            </div>
                    @endif
                </div>
            </div>
            @endforeach


            </div>

            <div class="row ">
                <div class="col-sm-12 news-pagination">
                    {{ $all_featured->links() }}
                 
                </div>
            </div>
            </div>
        </section>

    </main>
@endsection
