{{-- @extends('frontend.department.tamplate_four.partials.main') --}}
@extends('frontend.office.template.partials.main')

@php
    $url=request()->route()->getName();
    $page_title = 'People';
@endphp

@section('title')
    {{ $page_title }}
@endsection

@section('content')

<style>
    .faculty_member {
        position: relative;
        transition: all 900ms ease;
        -moz-transition: all 900ms ease;
        -webkit-transition: all 900ms ease;
        -ms-transition: all 900ms ease;
        -o-transition: all 900ms ease;
    }
    .border-one:before {
        position: absolute;
        content: '';
        left: 0px;
        top: 0px;
        width: 0px;
        height: 2px;
        background-color: #00c5bf;
        transition: all 900ms ease;
        -moz-transition: all 900ms ease;
        -webkit-transition: all 900ms ease;
        -ms-transition: all 900ms ease;
        -o-transition: all 900ms ease;
    }

    .border-one:after {
        position: absolute;
        content: '';
        right: 0px;
        bottom: 0px;
        width: 2px;
        height: 0px;
        background-color: #00c5bf;
        transition: all 900ms ease;
        -moz-transition: all 900ms ease;
        -webkit-transition: all 900ms ease;
        -ms-transition: all 900ms ease;
        -o-transition: all 900ms ease;
    }

    .border-two:before {
        position: absolute;
        content: '';
        left: 0px;
        top: 0px;
        width: 2px;
        height: 0px;
        background-color: #00c5bf;
        transition: all 900ms ease;
        -moz-transition: all 900ms ease;
        -webkit-transition: all 900ms ease;
        -ms-transition: all 900ms ease;
        -o-transition: all 900ms ease;
    }

    .border-two:after {
        position: absolute;
        content: '';
        right: 0px;
        bottom: 0px;
        width: 0px;
        height: 2px;
        background-color: #00c5bf;
        transition: all 900ms ease;
        -moz-transition: all 900ms ease;
        -webkit-transition: all 900ms ease;
        -ms-transition: all 900ms ease;
        -o-transition: all 900ms ease;
    }
    .faculty_member:hover .border-one:before {
        width: 100%;
    }

    .faculty_member:hover .border-one:after {
        height: 100%;
    }

    .faculty_member:hover .border-two:before {
        height: 100%;
    }

    .faculty_member:hover .border-two:after {
        width: 100%;
    }
</style>

    <div class="faculty-profile-banner d-flex justify-content-center align-items-center" style="background-image: url( {{ @$banner->image ? asset('upload/banner/' . $banner->image) : asset('frontend/assets/img/bup/banner.jpg') }} ) ">
        <h1 class="text-white font-poppins">{{ $page_title }}</h1>
    </div>

    @php
        $sortedProfiles = $profiles->sortBy(function($profile) {
            return $profile->sort_order == 1 ? 0 : 1; 
        });
    @endphp
{{-- @dd($office->profile_id); --}}
    <!-- Hero Title -->
    <main class="container my-4">
        <div class="row">
            <div class="col-12">
                <h3 class="">Office Head</h3>
                <div class="position-relative w-100 common-bg-color mt-0" style="height: 4px;"></div>
            </div>
            
            @foreach ($sortedProfiles as $profile)
                @if (isset($profile->profile->id) && !empty($profile->profile->id))
                @continue($office->profile_id != @$profile->profile->id)
                <div class="col-md-3 col-sm-6 col-xl-3 mt-3 mb-3">
                    <div style="height: 21rem;" class="card box-shadow faculty_member">
                        <div class="border-one"></div>
                        <div class="border-two"></div>
                        <img style="max-width:50%; margin-top:12px" class="img-thumbnail rounded-circle mx-auto d-block" src="{{ @$profile->profile->photo ? asset('upload/profiles/' . @$profile->profile->photo) : @$profile->profile->photo_path }}" onerror="this.onerror=null;this.src='{{ asset('dummy/user-dummy.jpeg') }}';" alt="{{@$profile->profile->nameEn}}" />
                        <div class="card-body mt-2">
                            <h6 class="card-title text-center" style="color:rgb(6, 151, 146);">
                                {{ @$profile->profile->nameEn ?? '' }}
                            </h6>
                            <div class="details_info text-center">
                                @php
                                    $designations           = @$profile->designations ?? '';
                                    $additional_charge      = @$profile->additional_charge ?? '';
                                    $additional_designation = @$profile->additional_designation ?? '';
                                @endphp

                                @if (@$designations)
                                    <h6 class="p-1">{{ @$designations }}</h6>
                                @endif

                                @if (@$additional_charge)
                                    <span class="p-1">{{ @$additional_charge }}</span><br/>
                                @endif

                                @if (@$additional_designation)
                                    <span>{{ @$additional_designation }}</span><br/>
                                @endif


                                @if (@$profile->profile->email)
                                <span>{{ @$profile->profile->email }}</span><br>
                                @endif
                                @if (@$profile->profile->phone)
                                <span>{{ @$profile->profile->phone }}</span>    
                                @endif
                            </div>   
                        </div>
                    </div>
                </div>

                @else
                    <div class="profile-item">
                        <div class="profile-info">
                            <p>Profile information not found!</p>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="row">
            <div class="col-12">
                <h3 class="">Office Member</h3>
                <div class="position-relative w-100 common-bg-color mt-0" style="height: 4px;"></div>
            </div>
            @foreach ($sortedProfiles as $profile)
                @if (isset($profile->profile->id) && !empty($profile->profile->id))
                @continue($office->profile_id == @$profile->profile->id)
                <div class="col-md-3 col-sm-6 col-xl-3 mt-3 mb-3">
                    <div style="height: 21rem;" class="card box-shadow faculty_member">
                        <div class="border-one"></div>
                        <div class="border-two"></div>
                        <img style="max-width:50%; margin-top:12px" class="img-thumbnail rounded-circle mx-auto d-block" src="{{ @$profile->profile->photo ? asset('upload/profiles/' . @$profile->profile->photo) : @$profile->profile->photo_path }}" onerror="this.onerror=null;this.src='{{ asset('dummy/user-dummy.jpeg') }}';" alt="{{@$profile->profile->nameEn}}" />
                        <div class="card-body mt-2">
                            <h6 class="card-title text-center" style="color:rgb(6, 151, 146);">
                                {{ @$profile->profile->nameEn ?? '' }}
                            </h6>

                            <div class="details_info text-center">
                                @php
                                    $designations            = @$profile->designations ?? '';
                                    $additional_charge      = @$profile->additional_charge ?? '';
                                    $additional_designation = @$profile->additional_designation ?? '';
                                @endphp

                                @if (@$designations)
                                    <h6 class="p-1">{{ @$designations }}</h6>
                                @endif

                                @if (@$additional_charge)
                                    <span class="p-1">{{ @$additional_charge }}</span><br/>
                                @endif

                                @if (@$additional_designation)
                                    <span>{{ @$additional_designation }}</span><br/>
                                @endif

                                @if (@$profile->profile->email)
                                    <span>{{ @$profile->profile->email }}</span><br>
                                @endif

                                @if (@$profile->profile->phone)
                                <span>{{ @$profile->profile->phone }}</span>    
                                @endif   

                            </div>   
                        </div>
                    </div>
                </div>

                @else
                    <div class="profile-item">
                        <div class="profile-info">
                            <p>Profile information not found!</p>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </main>

@endsection
