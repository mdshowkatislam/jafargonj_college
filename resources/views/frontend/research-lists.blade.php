@extends('frontend.landing')

@php
    if ($research_type == 'chsr') {
        $page_title = 'CHSR Research';
    } elseif ($research_type == 'faculty') {
        $page_title = 'Faculty Research';
    } elseif ($research_type == 'bb') {
        $page_title = 'Bangabondhu Chair Research';
    } elseif ($research_type == 'ongoing') {
        $page_title = 'Ongoing Research';
    } else {
        $page_title = 'All Research';
    }
@endphp
@section('title')
    {{ $page_title }}
@endsection
<style>
    .download-btn {
        border: 2px solid #ffb606;
        color: #002147;
        border-radius: 24px;
        width: 10rem;
        text-align: center;
        padding-top: 2px;
        padding-bottom: 2px;
        margin-bottom: 16PX;
        font-weight: 500;
    }

    .download-btn:hover {
        color: #002147 !important;
        background-color: #ffb606;
    }

    .search-box:focus {
        box-shadow: none !important;
    }
</style>
@section('content')
    {{-- Banner --}}
    @include('frontend.partials.sections.banner', ['page_title' => $page_title])

    <!-- Section -->
    <section>
        <div class="mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        @foreach ($profiles as $key => $info)
                            @php
                                $researches = App\Models\ProfileJournal::where('profile_id', $info->profile_id)->get()
                            @endphp
                            @foreach ($researches as $item)
                            <div class="col-md-12 mb-4">
                                <div class="bg-light shadow p-3 rounded" style="">
                                    <p class="fs-6 font-work-sans"><i class="fas fa-user"></i>
                                        {{ $item->profile->nameEn }}</p>
                                    <h3 class="fs-5">{!! $item->JournalDetail !!}</h3>
                                </div>
                            </div>
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
    </section>
@endsection
