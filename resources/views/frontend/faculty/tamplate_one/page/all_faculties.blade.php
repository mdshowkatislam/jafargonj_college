
    @extends('frontend.faculty.tamplate_two.partials.main')


@php
    $page_title = "All Faculties"
@endphp
@section('title'){{$page_title}} @endsection
<style>
    .faculty-profile-banner {
    background-image: linear-gradient(
            rgba(13, 202, 76, 0.75),
            rgba(1, 39, 11, 0.75)
        ),
        url({{asset('frontend/assets/img/bup/banner.jpg')}});
    }
</style>


@section('content')
<div class="faculty-profile-banner d-flex justify-content-center align-items-center">
        <h1 class="text-white font-poppins">{{ $page_title }}</h1>
    </div>
    <!-- Hero Title -->
    {{-- <section class="" style="min-height: 350px">
    </section> --}}
    <section class="container mb-5">
        <h2 class="fs-4 fw-bold text-primary d-flex justify-content-center my-5">Our Faculty</h2>
        <div class="row">
            @foreach ($faculty_members as $key => $member)
                <div class="col-12 col-md-6 col-lg-3 mb-5">
                    <div class="shadow-lg card rounded-0 border-0 d-block text-center pt-3">
                        <img class="mx-2 mt-2 object-cover" src="{{ asset('upload/profiles/' . $member->profile->photo) }}"
                            height="200" width="200"
                            onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';"
                            alt="" style="border-radius: 100%;" />
                        <div class="card-body bg-light shadow-lg" style="min-height: 7.75rem">
                            <a href="{{route('faculty_member.details', $member->id)}}">
                                <h5 class="card-title fs-6 text-center text-uppercase">
                                    {{ $member->profile->nameEn }}
                                </h5>
                                <p class="card-text text-center text-info">
                                    {{ $member->profile->designation }}
                                </p>
                            </a>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    
@endsection
