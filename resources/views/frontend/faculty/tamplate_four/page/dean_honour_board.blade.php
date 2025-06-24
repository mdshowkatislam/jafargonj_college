@extends('frontend.faculty.tamplate_four.partials.main')


@php
    $page_title = "Dean's Honour Board"
@endphp
@section('title'){{$page_title}} @endsection



@section('content')
<div class="faculty-profile-banner d-flex justify-content-center align-items-center" style=" background-image: url( {{ @$banner->image ? asset('upload/banner/' . $banner->image) : asset('frontend/assets/img/bup/banner.jpg') }} ) ">
        <h1 class="text-white font-poppins">{{ $page_title }}</h1>
    </div>
    <!-- Hero Title -->
    {{-- <section class="" style="min-height: 350px">
    </section> --}}

    <section>
        <div class="container mb-5 mt-4">
            <div class="row justify-content-center">
                @if(count($members)>0)
                @foreach ($members as $member)
                <div class="col-12 col-md-6 col-lg-3 my-3">
                    <div class="card rounded-0 border-0 d-block text-center pt-3 dean_staff" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                        <div class="border-one"></div>
                        <div class="border-two"></div>
                        <img class="mx-2 mt-2 shadow-lg image-circle" src="{{ asset('upload/dean_honor_board/' . $member->image) }}" height="200" width="200" onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';" alt="" />
                        <div class="card-body" style="min-height: 9.2rem;">
                            <h5 class="custom-font-titillium-web card-title fs-5 text-center text-capitalize border-top pt-3">
                                {{ $member->name }}
                            </h5>
                            <p class="text-center common-font-color fs-6 custom-font-titillium-web">
                                {{ date('d M Y', strtotime($member->start_date)) }} - {{ $member->end_date ? date('d M Y', strtotime($member->end_date)) : 'Present'}}
                            </p>                                
                        </div>
                    </div>
                </div>
                    
                @endforeach
                @else
                <h2 class="text-center">No Information Found</h2>
                @endif
            </div>
        </div>
    </section>
    
@endsection
