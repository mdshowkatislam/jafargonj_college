@extends('frontend.layouts.master-landing')
@php
    $page_title ='Principal';
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
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 vc_profile_img">
                        @if (@$vcInfo->profile->id)
                        <img style="width: -webkit-fill-available;" class="img-thumbnail" alt="VC Sir" src="{{ @$vcInfo->profile->photo ? asset('upload/profiles/' . @$vcInfo->profile->photo) : @$vcInfo->profile->photo_path }}" onerror="this.onerror=null;this.src='{{ asset('dummy/profile_dummy.png') }}';" />
                        @else
                        <img class="" style="width: 65%;" alt="VC Sir" src="{{ asset('upload/profiles/chancellors.jpeg') }}" onerror="this.onerror=null;this.src='{{ asset('dummy/profile_dummy.png') }}';" />
                        @endif
                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-9">
                        <div class="card-body">
                            <div class="vc_profile_meta mt-5">
                                <h2 class="card-title" style="color: #009999;">Md Shafikur Rahman</h2>
                                <h4 class="card-text">Principal{{ @$vcProfile->profile->designation }}</h4>
                                <h5 class="card-text mb-2">Jafargonj degree college</h5>
                            </div> 
                        </div>
                    </div>

                    <div class="col-sm-12">
                       <div class="container p-3">
                            {!! @$vcInfo->long_description !!}
                            <p style="text-align: justify">Jafargonj Mir Abdul Gafur College cumilla is a well renowned and prestigious educational institution under the Ministry of Education, Secondary and Higher Secondary Directorate, Board of Intermediate and Secondary Education (BISE) . The school is efficiently and successfully run by the Bangladesh Air Force, alongside seven other campuses all over the country.

 

The motto of this institution is Education - Restraint - Discipline and every activity is run in the respect of this motto. Every student that passes the halls of this institute are endearingly known as a ‘Shaheen’, therefore they emulate and embrace the traits that BAFSD stands for. The next generation of this progressive society will be well educated, restrained in their morals and behavior, alongside being taught discipline.

 

Other than focusing on academic performances, we also provide a broader perspective of the extracurriculars. Our aim is to nurture a student into a well-rounded individual. Our college facilitates a student's needs by providing proper equipment and necessities to progress in life. The students can utilize our vast fields, hockey turf, basketball and squash courts to advance forward in sports. Our amenities include science laboratories, well equipped computer labs and, for enrichment of knowledge, a library for the betterment and skill development of a student. Our green and natural environment ensures open air and a refreshing view for the students. Above all, there are highly qualified teachers devoted to the wellbeing of the students. Their goal is to create an outstanding future for all students.

 

It is my firestorm belief that, with the cooperation and combined effort of all the students, teachers and parents we can look forward to a better honest and ideal society</p>
                    </div>
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
