@extends('frontend.layouts.master-landing')
@php
$page_title = 'Vice Principal';
@endphp
@section('title')
{{ $page_title }}
@endsection
@section('content')

@include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])

<div class="section-area my-5">
    <div class="container">
        <div class="row">
            <div class="card box-shadow" style="border-top:5px solid #00c5bf;">
                <div class="row g-0 pb-5">
                    @if (@$vcInfo->profile->id)
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="p-4">
                                @if (@$vcInfo->profile->id)
                                <img class="img-thumbnail" alt="VC Sir" src="{{ @$vcInfo->profile->photo ? asset('upload/profiles/' . @$vcInfo->profile->photo) : @$vcInfo->profile->photo_path }}" onerror="this.onerror=null;this.src='{{ asset('dummy/user-dummy.jpeg') }}';" />
                                @else
                                <img class="img-thumbnail" alt="VC Sir" src="{{ @$vcProfile->Profile->photo ? asset('upload/profiles/' . @$vcProfile->profile->photo) : @$vcProfile->profile->photo_path }}" onerror="this.onerror=null;this.src='{{ asset('dummy/user-dummy.jpeg') }}';" />
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="mt-5">
                                <a href="{{ route('office.people.details', @$vcInfo->profile->id) }}">
                                    <h2 class="text-start" style="color: #009999;">{{ @$vcProfile->Profile->nameEn }}</h2>
                                    <h4 class="text-start">{{ @$vcProfile->profile->designation }}</h4>
                                    <h5 class="text-start mb-2">Jafargonj Mir Abdul Gafur College</h5>
                                </a>
                            </div> 
                        </div>
                    </div>

                   
                    <div class="col-sm-12">
                        <div class="card-body">
                            <div style="text-align: center;">
                                {!! @$vcInfo->long_description !!}
                            </div>
                        </div>
                    </div>
                    @else
                    <h5 class="text-center custom-font-titillium-web my-5">No Information Found</h5>
                    @endif
                </div>

            </div>

        </div>
    </div>
</div>    

@endsection


    @push('styles')
    <style>
        .section-area{
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