{{-- @extends('frontend.department.tamplate_four.partials.main') --}}
@extends('frontend.office.template.partials.main')

@php
    $url=request()->route()->getName();
    $page_title = 'Committee';
@endphp

@section('title')
    {{ $page_title }}
@endsection

@section('content')
    <div class="faculty-profile-banner d-flex justify-content-center align-items-center" style="background-image: url( {{ @$banner->image ? asset('upload/banner/' . $banner->image) : asset('frontend/assets/img/bup/banner.jpg') }} ) ">
        <h1 class="text-white font-poppins">{{ $page_title }}</h1>
    </div>

    <!-- Hero Title -->
    <main class="container">
        <section>
            <div class="container mt-3">
                <div class="card mb-3" style="max-width: 90%; border-top: 5px solid #29ACBB;">
                    <div class="row g-0">
                        {{-- @dd($committee) --}}
                        @if (@$committee[1])
                            <div class="container mt-2">
                                <h5 class="text-center fs-4">Quality Assurance Committee (QAC)</h5>
                            </div>
                            <div class="col-md-12">
                                <div class="card-body">
                                    <div class="row">
                                        @foreach (@$committee[1] as $com) 
                                        <div class="col-12 col-md-6 col-lg-4 mt-4">
                                            {{-- <a href="{{route('department_member_deatils', $com['member']->profile_id)}}"> --}}
                                                <div class="shadow-lg card rounded-0 border-0 d-block text-center pt-3 faculty_member">
                                                    <div class="border-one"></div>
                                                    <div class="border-two"></div>
                                                    <img class="mx-2 mt-2 shadow-lg image-circle" src="{{ @$com['member']->photo ? asset('upload/profiles/' . @$member->profile->photo) : @$member->profile->photo_path }}"
                                                        height="200" width="200"
                                                        onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';"
                                                        alt="" />
                            
                                                    <div class="card-body bg-light shadow-lg" style="min-height: 7.75rem">
                                                        {{-- <a href="{{route('department_member_deatils', @$com['member']->profile_id)}}"> --}}
                                                            <div class="faculty-member-title d-flex justify-content-center content-title">
                                                                <h5 class="card-title fs-5 text-center text-captilize common-font-color">
                                                                    {{ @$com['member']['nameEn'] }}
                                                                    </h5>
                                                            </div>
                                                            <p class="text-center fs-6 common-font-color">
                                                                {{ @$com['committee_designation']['name'] }}
                                                            </p>
                                                        {{-- </a> --}}
                            
                                                    </div>
                                                </div>
                                            {{-- </a> --}}
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if (@$committee[2])
                        <div class="container mt-5">
                            <h5 class="text-center fs-4">Faculty Quality Assurance Committee (FQAC)</h5>
                        </div>
                        
                        <div class="col-md-8">
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                @foreach (@$faculty as $fac) 
                                    <h5 class="list-group-item fs-5">{{ @$fac->name }}</h6>
                                    @if (@$committee[2])
                                        @foreach (@$committee[2] as $com)  
                                            <div class="container">
                                            @if (@$com->team_member == @$fac->profile_id)
                                                <p>{{ @$com['committee_designation']['name'] }}, {{ @$fac->name }}, BUTEX</p>
                                            @endif
                                            @foreach (@$department as $dep)
                                                @if ((@$dep->faculty_id == @$fac->id) && (@$dep->profile_id == @$com->team_member))
                                                <p>{{ @$com['committee_designation']['name'] }}, {{ @$dep->name }}, BUTEX</p>
                                                @endif
                                            @endforeach
                                            </div>
                                        @endforeach
                                    @endif
                                @endforeach
                                </ul>
                            </div>
                        </div>
                        @endif
                        
                    </div>
                </div>
            </div>
        </section>

    </main>

@endsection
