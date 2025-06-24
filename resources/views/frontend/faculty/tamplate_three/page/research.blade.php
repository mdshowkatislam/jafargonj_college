@extends('frontend.faculty.tamplate_three.partials.main')

@php
    $page_title = 'Research & Publication';
@endphp
@section('title'){{ $page_title }} @endsection


@section('content')
    <div class="faculty-profile-banner d-flex justify-content-center align-items-center" style=" background-image: url( {{ @$banner->image ? asset('upload/banner/' . $banner->image) : asset('frontend/assets/img/bup/banner.jpg') }} ) ">
        <h1 class="text-white font-poppins">{{ $page_title }}</h1>
    </div>
    @include('frontend.partials.sections.search', ['page_title' => $page_title])
    <!-- Hero Title -->
    <section>
        <div class="mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        @foreach ($profiles as $key => $info)
                            @php
                                $researches = App\Models\ProfileJournal::where('profile_id', $info->profile_id)->get();
                            @endphp
                            @foreach ($researches as $item)
                            @continue(empty($item->JournalDetail))
                            <div class="col-md-12 mb-4">
                                <div class="bg-light shadow p-3 rounded" style="">
                                    <h3 class="fs-4 fw-bold mb-2 content-title">
                                        <a href="#" class="news-title"> {{ $item->profile->nameEn }}

                                        </a>
                                   </h3>
                                   {{--  <h3 class="fs-4 fw-bold mb-2 content-title">
                                    <a href="{{ route($type . '.details', $n->id) }}" class="news-title">{{ $n->title }}
                                    </a>
                                  </h3>  --}}
                                    <h3 class="fs-5">{!! $item->JournalDetail !!}</h3>
                                </div>
                            </div>
                            @endforeach

                        @endforeach
                        {{-- <div class="row ">
                            <div class="col-sm-12 news-pagination">
                                {{ $profiles->links() }}
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
    </section>

@endsection


