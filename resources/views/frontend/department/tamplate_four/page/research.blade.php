{{-- @extends('frontend.department.tamplate_three.partials.main') --}}
@extends('frontend.department.tamplate_four.partials.main-second')

@php
    $page_title = "Research & Publication"
@endphp
@section('title'){{$page_title}} @endsection

@section('content')
    <div class="faculty-profile-banner d-flex justify-content-center align-items-center" style=" background-image: url( {{ @$banner->image ? asset('upload/banner/' . $banner->image) : asset('frontend/assets/img/bup/banner.jpg') }} ) ">
        <h1 class="text-white font-poppins">{{ $page_title }}</h1>
    </div>

    <!-- Hero Title -->
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
                            @continue(empty($item->JournalDetail))
                            <div class="col-md-12 mb-4">
                                <div class="bg-light shadow p-3 rounded" style="">
                                    <p class="fs-6 font-work-sans"><i class="fas fa-user"></i>
                                        {{ @$item->profile->nameEn }}</p>
                                    <h3 class="fs-5 ps-4">{!! @$item->JournalDetail !!}</h3>
                                </div>
                            </div>
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection
