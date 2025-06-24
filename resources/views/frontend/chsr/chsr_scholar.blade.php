@extends('frontend.chsr.landing')

@php
    $page_title = 'Scholars';
@endphp
@section('title')
    {{ $page_title }}
@endsection
<style>

</style>
@section('content')
    {{-- Banner --}}
    @include('frontend.partials.sections.banner_chsr', ['page_title' => $page_title])


    <!-- CHSR Scholar -->
    <section class="chsr-research-person mt-5">
        <div class="container">
            <div class="row mb-3">
                @foreach ($supervisors as $item)
                    <div class="col-lg-3 item mb-4">
                        <div class="card rounded-0 bg-success zoom_in_hover" style="height: 27rem">
                            <img src="{{ @$item->profile->photo ? asset('upload/profiles/' . @$item->profile->photo) : @$item->profile->photo_path }}" height="320"
                                alt="" />
                            <div class="card-body">
                                <h5 class="card-title text-white fs-6 fw-bold mb-3 text-center" style="height: 3rem;">
                                    {{ @$item->profile->nameEn }}
                                </h5>
                                <p class="card-text text-white text-center fs-8 font-work-sans">
                                    {{ @$item->profile->designation }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        </div>
    </section>
@endsection

@section('script')
@endsection
