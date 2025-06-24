@extends('frontend.layouts.master-landing')
@php
$page_title = 'Message from the Registrar';
@endphp
@section('title')
{{ $page_title }}
@endsection
@section('content')

{{-- @include('frontend.partials.sections.banner-cover5', ['page_title' => $page_title]) --}}

@include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])


<div class="section-area my-5">
    <div class="container">
        <div class="row">
            <div class="card box-shadow" style="border-top:5px solid #00c5bf;">
                <div class="row g-0 pb-5">
                    @if (@$register->profile->id)

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="p-4">
                                @if (@$register->profile->id)
                                <img class="img-thumbnail" alt="registrar" src="{{ @$register->profile->photo ? asset('upload/profiles/' . @$register->profile->photo) : @$register->profile->photo_path }}" onerror="this.onerror=null;this.src='{{ asset('dummy/profile_dummy.png') }}';"/>
                                @else
                                
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="mt-5">
                                <a href="{{ route('office.people.details', @$register->profile->id) }}">
                                    <h2 class="text-start" style="color: #009999;">{{@$register->profile->nameEn}}</h2>
                                    <h4 class="text-start">{{ @$register->profile->designation }}</h3>
                                    <h5 class="text-start mb-2">Bangladesh University of Textiles</h5>
                                </a>
                            </div> 
                        </div>
                    </div>

                   
                    <div class="col-sm-12">
                        <div class="card-body">
                            <h5 class="card-title fw-bolder px-3">{{@$register->title_first_part}}</h5>
                            <div class="px-3" style="text-align: justify;">
                                {!! @$register->long_description !!}
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="text-center">
                        <h5 class="mt-5 fs-5">No Information Found</h5>
                    </div>
                    @endif
                </div>

            </div>

        </div>
    </div>
</div>

@endsection

@push('styles')
<style>
    .section-area {
        padding-bottom: 60px;
    }

    .vc_profile_img img {
        width: 45%;
        margin-top: 30px;
        margin-left: 20px;
    }
</style>
@endpush

@push('scripts')
<script>

</script>
@endpush