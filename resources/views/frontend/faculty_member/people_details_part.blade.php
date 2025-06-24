<style>
    .nav-tabs .nav-link:hover {
        background: #b61e2b !important;
    }

    .nav-tabs .nav-link.active {
        background: #b61e2b !important;
    }

    .faculty-profile-banner {
        background-image: #00c5bf,
            url({{ asset('frontend/assets/img/bup/banner.jpg') }});
    }

    .content ol,
    .content ul,
    .profile-details-tab-content ol {
        padding: 0 !important;
    }

    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        color: #fff !important;
        background-color: #00c5bf !important ;
        box-shadow: 0 0.5rem 1rem rgb(0 0 0 / 30%) !important;
    }
    .faculty-profile-content h1{
        font-size: 18px;
        color: #00c5bf;
    }
    .faculty-profile-content p {
        font-size: 12px;
    }
    .faculty-social-icon {
        width: 30px;
        height: 30px;
        background-color: #b61e2b;
        margin: 0 5px;
    }
    .faculty-contact h1 {
        font-size: 14px;
    }

    .break-wrap-text {
        word-break: break-all;
        overflow-wrap: break-word;
    }
    .text-success, .text-primary {
        color: #00c5bf !important;
    }
    .nav-link {
        color: black !important;
    }

</style>

<main class="container mt-5">
    <!-- Proffessor Profile -->
    <div class="row">
        <div class="col-lg-3 ">
            <div class="shadow-sm p-3 mb-3 bg-light rounded">
                <div class="faculty-profile-content">
                    <div class="d-flex justify-content-center">
                        <img class="rounded object-cover"
                            src="{{ $profile->profile->photo ? asset('upload/profiles/' . $profile->profile->photo) : $profile->profile->photo_path }}"
                            onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';"
                            style="width: 100%" />
                    </div>
                    <div class="text-center mt-3">
                        <h1 class="text-uppercase fw-bold">{{ $profile->profile->nameEn }}</h1>
                        <p class="text-uppercase fw-bolder">{{ $profile->profile->designation }}</p>
                    </div>
                </div>
                <div class="social-section d-flex justify-content-center">
                    <div class="faculty-social-icon text-center">
                        <a target="_blank" href="{{ @$social->facebook_link ? $social->facebook_link : '#' }}"><img
                                class=""
                                style="height: 30px; width: 30px;"
                                src="{{ asset('frontend/assets/img/faculty-of-bs/fb-icon.png') }}"
                                alt="icon"></a>
                    </div>
                    <div class="faculty-social-icon text-center">
                        <a target="_blank" href="{{ @$social->google_scholar_link ? $social->google_scholar_link : '#' }}"><img
                                class=""
                                src="{{ asset('frontend/assets/img/faculty-of-bs/social-icon (1).png') }}"
                                alt="icon"></a>
                    </div>
                    <div class="faculty-social-icon text-center">
                        <a target="_blank" href="{{ @$social->research_gate_link ? $social->research_gate_link : '#' }}"><img
                                class=""
                                src="{{ asset('frontend/assets/img/faculty-of-bs/social-icon (2).png') }}"
                                alt="icon"></a>
                    </div>
                    <div class="faculty-social-icon text-center">
                        <a target="_blank" href="{{ @$social->linkedin_link ? $social->linkedin_link : '#' }}"><img class=""
                                src="{{ asset('frontend/assets/img/faculty-of-bs/social-icon (3).png') }}"
                                alt="icon"></a>
                    </div>
                    <div class="faculty-social-icon text-center">
                        <a target="_blank" href="{{ @$social->website_link ? $social->website_link : '#' }}"><img class=""
                                src="{{ asset('frontend/assets/img/faculty-of-bs/social-icon (4).png') }}"
                                alt="icon"></a>
                    </div>
                </div>
                <p class="text-center mt-3">{{ @$profile->department->name }}<br>
                    {{ @$profile->faculty->name }}
                </p>
                <div class="faculty-contact">
                    @if (@$profile->profile->email)
                    <div class="break-wrap-text" style="width: 240px; ">
                         <i class="bi bi-envelope-at text-primary fs-5 mx-2"></i>
                         {{ $profile->profile->email }}
                     </div>
                    @endif
                    <br>
                    @if (@$profile->profile->phone)
                    <p class="d-flex justify-content-start align-items-center"><i
                        class="bi bi-phone text-primary fs-5 mx-2 "></i>{{ @$profile->profile->phone }}</p>
                    @endif
                    <hr>
                    <p class="d-flex justify-content-start align-items-center"><i
                            class="bi bi-geo-alt text-primary fs-3 mx-2 "></i>
                            92 Shaheed Tajuddin Ahmed Avenue Tejgaon Industrial Area, Dhaka - 1208, Bangladesh</p>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="row shadow-sm p-3 mb-3 bg-light rounded g-2">
                <div class="nav nav-tabs border-0" id="myTab" role="tablist">
                    <div class="nav-item col-lg-2 col-md-6 d-flex justify-content-center" role="presentation">
                        <div class="nav-link card border-0 active justify-content-center" id="one-tab" data-bs-toggle="tab"
                            data-bs-target="#one-tab-pane" type="button" role="tab" aria-controls="one-tab-pane"
                            aria-selected="true"
                            style="width: 120px; height: 140px; background: linear-gradient(180deg, #00c5bf 0%, rgba(4, 124, 59, 0.3) 100%);">
                            <div class="text-center">
                                <img class="rounded"
                                    src="{{ asset('frontend/assets/img/faculty-of-bs/icon (6).png') }}"
                                    alt="icon">
                                <h1 class="card-title fs-6 text-center text-white mt-2">Overview</h1>
                            </div>
                        </div>
                    </div>
                    <div class="nav-item col-lg-2 col-md-6 d-flex justify-content-center" role="presentation">
                        <div class="nav-link card border-0 justify-content-center" id="two-tab" data-bs-toggle="tab"
                            data-bs-target="#two-tab-pane" type="button" role="tab" aria-controls="two-tab-pane"
                            aria-selected="false"
                            style="width: 120px; height: 140px; background: linear-gradient(180deg, #00c5bf 0%, rgba(4, 114, 124, 0.3) 100%);">
                            <div class="text-center">
                                <img class="rounded"
                                    src="{{ asset('frontend/assets/img/faculty-of-bs/icon (5).png') }}"
                                    alt="icon">
                                <h1 class="card-title fs-6 text-center text-white mt-2">Education</h1>
                            </div>
                        </div>
                    </div>
                    <div class="nav-item col-lg-2 col-md-6 d-flex justify-content-center" role="presentation">
                        <div class="nav-link card border-0 justify-content-center" id="three-tab" data-bs-toggle="tab"
                            data-bs-target="#three-tab-pane" type="button" role="tab"
                            aria-controls="three-tab-pane" aria-selected="false"
                            style="width: 120px; height: 140px; background: linear-gradient(180deg, #00c5bf 0%, rgba(4, 124, 59, 0.3) 100%);">
                            <div class="text-center">
                                <img class="rounded"
                                    src="{{ asset('frontend/assets/img/faculty-of-bs/icon (4).png') }}"
                                    alt="icon">
                                <h1 class="card-title fs-6 text-center text-white mt-2">Publication</h1>
                            </div>
                        </div>
                    </div>
                    <div class="nav-item col-lg-2 col-md-6 d-flex justify-content-center" role="presentation">
                        <div class="nav-link card border-0 justify-content-center" id="four-tab" data-bs-toggle="tab"
                            data-bs-target="#four-tab-pane" type="button" role="tab"
                            aria-controls="four-tab-pane" aria-selected="false"
                            style="width: 120px; height: 140px; background: linear-gradient(180deg, #00c5bf 0%, rgba(4, 124, 59, 0.3) 100%);">
                            <div class="text-center">
                                <img class="rounded"
                                    src="{{ asset('frontend/assets/img/faculty-of-bs/icon (5).png') }}"
                                    alt="icon">
                                <h1 class="card-title fs-6 text-center text-white mt-2">Research Activites</h1>
                            </div>
                        </div>
                    </div>
                    <div class="nav-item col-lg-2 col-md-6 d-flex justify-content-center" role="presentation">
                        <div class="nav-link card border-0 justify-content-center" id="five-tab" data-bs-toggle="tab"
                            data-bs-target="#five-tab-pane" type="button" role="tab"
                            aria-controls="five-tab-pane" aria-selected="false"
                            style="width: 120px; height: 140px; background: linear-gradient(180deg, #00c5bf 0%, rgba(4, 124, 59, 0.3) 100%);">
                            <div class="text-center">
                                <img class="rounded"
                                    src="{{ asset('frontend/assets/img/faculty-of-bs/icon (2).png') }}"
                                    alt="icon">
                                <h1 class="card-title fs-6 text-center text-white mt-2">Awards</h1>
                            </div>
                        </div>
                    </div>

                    <div class="nav-item col-lg-2 col-md-6 d-flex justify-content-center" role="presentation">
                        <div class="nav-link card border-0 justify-content-center" id="six-tab" data-bs-toggle="tab"
                            data-bs-target="#six-tab-pane" type="button" role="tab"
                            aria-controls="six-tab-pane" aria-selected="false"
                            style="width: 120px; height: 140px; background: linear-gradient(180deg, #00c5bf 0%, rgba(4, 124, 59, 0.3) 100%);">
                            <div class="text-center">
                                <img class="rounded"
                                    src="{{ asset('frontend/assets/img/faculty-of-bs/icon (1).png') }}"
                                    alt="icon">
                                <h1 class="card-title fs-6 text-center text-white mt-2">Course Taught</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-content shadow-sm px-3 pb-3 mb-5 bg-light rounded" id="myTabContent">
                <div class="tab-pane fade show active profile-details-tab-content" id="one-tab-pane" role="tabpanel"
                    aria-labelledby="one-tab" tabindex="0">

                    @if (count($biographys) > 0)
                        <div class="pt-3 border-bottom">
                            <h1 class="text-captilize m-0 fs-6 fw-bold text-white rounded shadow"
                                style="background: #00c5bf !important; padding:10px;">Biography</h1>
                            <div class="content p-3">
                                @foreach ($biographys as $biography)
                                    {!! @$biography->Biography !!}
                                    {{-- <div class="pt-3">
                                        <p class="text-right text-success fs-7 m-0">Last Updated:
                                            {{ count($biographys)>0 ? date('d M Y', strtotime(@$biographys[0]->updated_at)) : date('d M Y', strtotime(@$profile->updated_at)) }}</p>
                                    </div> --}}
                                @endforeach
                            </div>
                        </div>
                    @endif

                    @if (count($professionalActivity) > 0)
                        <div class="pt-3">
                            <h6 class="text-captilize m-0 fs-6 fw-bold text-white rounded shadow"
                                style="background: #00c5bf !important; padding:10px;">Professional Activity</h6>
                            <div class="content p-3">
                                @foreach ($professionalActivity as $index => $course)
                                <p class="">{!! @$course->ProfessionalActivity !!}</p>
                                @endforeach
                                    {{-- <div class="pt-3">
                                        <p class="text-right text-success fs-7 m-0">Last Updated:
                                            {{ count($professionalActivity)>0 ? date('d M Y', strtotime(@$professionalActivity[0]->updated_at)) : date('d M Y', strtotime(@$profile->updated_at)) }}</p>
                                    </div> --}}
                            </div>
                        </div>
                    @endif

                    @php
                        $edu = explode(';', $profile->profile->detail_education);
                    @endphp
                    @if (count($edu) > 0)
                        <div class="pt-3 border-bottom">
                            <h6 class="text-captilize m-0 fs-6 fw-bold text-white rounded shadow"
                                style="background: #00c5bf !important; padding:10px;">Education</h6>
                            <div class="content p-3">
                                @foreach ($edu as $key => $item)
                                    {{ $item }}<br>
                                @endforeach
                            </div>
                            {{-- <div class="pt-3 mx-3">
                                <p class="text-right text-success fs-7 mb-3">Last Updated:
                                    {{ date('d M Y', strtotime(@$profile->updated_at)) }}</p>
                            </div> --}}
                        </div>
                    @endif

                    @if (count($journals) > 0)
                        <div class="pt-3 border-bottom">
                            <h6 class="text-captilize m-0 fs-6 fw-bold text-white rounded shadow"
                                style="background: #00c5bf !important; padding:10px;">Journal Publication</h6>
                            <div class="content p-3">
                                @foreach ($journals as  $index=>$journal)
                                    <p class="mb-3"><a href="{{ @$journal->DOI }}" target="_blank">{{ @$journal->JournalTitle }} </a></p>
                                    @endforeach
                                    {{-- <div class="pt-3">
                                        <p class="text-right text-success fs-7 m-0">Last Updated:
                                            {{ count($journals)>0 ? date('d M Y', strtotime($journals[0]->updated_at)) : date('d M Y', strtotime(@$profile->updated_at)) }}</p>
                                    </div> --}}
                            </div>
                        </div>
                    @endif

                    @if (count($conferences) > 0)
                        <div class="pt-3 border-bottom">
                            <h6 class="text-captilize m-0 fs-6 fw-bold text-white rounded shadow text-color"
                                style="background: #00c5bf !important; padding:10px;">Conference Papers</h6>
                            <div class="content p-3">
                                @foreach ($conferences as  $index=>$conference)
                                    <p class="mb-3">{!! @$conference->ConferenceDetail !!}</p>
                                @endforeach
                                    {{-- <div class="pt-3">
                                        <p class="text-right text-success fs-7 m-0">Last Updated:
                                            {{ count($conferences)>0 ? date('d M Y', strtotime(@$conferences[0]->updated_at)) : date('d M Y', strtotime(@$profile->updated_at)) }}</p>
                                    </div> --}}
                            </div>
                        </div>
                    @endif

                    @if (count($books) > 0)
                        <div class="pt-3 border-bottom">
                            <h6 class="text-captilize m-0 fs-6 fw-bold text-white rounded shadow"
                                style="background: #00c5bf !important; padding:10px;">Books</h6>
                            <div class="content p-3">
                                @foreach ($books as $index => $book)
                                <p class="mb-3">{!! @$book->BookDetail !!}</p>
                                    {{-- <div class="pt-3">
                                        <p class="text-right text-success fs-7 m-0">Last Updated:
                                            {{ count($books)>0 ? date('d M Y', strtotime(@$books[0]->updated_at)) : date('d M Y', strtotime(@$profile->updated_at)) }}</p>
                                    </div> --}}
                                @endforeach
                            </div>
                        </div>
                    @endif

                    @if (count($researchs) > 0)
                        <div class="pt-3 border-bottom">
                            <h6 class="text-captilize m-0 fs-6 fw-bold text-white rounded shadow"
                                style="background: #00c5bf !important; padding:10px;">Researchs</h6>
                            <div class="content p-3">
                                @foreach ($researchs as $index => $research)
                                    <p class="">{!! @$research->ResearchAreasOrInterest !!}</p>
                                @endforeach
                                    {{-- <div class="pt-3">
                                        <p class="text-right text-success fs-7 m-0">Last Updated:
                                            {{ count($researchs)>0 ? date('d M Y', strtotime(@$researchs[0]->updated_at)) : date('d M Y', strtotime(@$profile->updated_at)) }}</p>
                                    </div> --}}
                            </div>
                        </div>
                    @endif

                    @if (count($awards) > 0)
                        <div class="pt-3 border-bottom">
                            <h6 class="text-captilize m-0 fs-6 fw-bold text-white rounded shadow"
                                style="background: #00c5bf !important; padding:10px;">Awards</h6>
                            <div class="content p-3">
                                @foreach ($awards as $index => $award)
                                <p class="">{!! @$award->AwardHonor !!}</p>
                                @endforeach
                                    {{-- <div class="pt-3">
                                        <p class="text-right text-success fs-7 m-0">Last Updated:
                                            {{ count($awards)>0 ? date('d M Y', strtotime(@$awards[0]->updated_at)) : date('d M Y', strtotime(@$profile->updated_at)) }}</p>
                                    </div> --}}
                            </div>
                        </div>
                    @endif

                    @if (count($courses) > 0)
                        <div class="pt-3 border-bottom">
                            <h6 class="text-captilize m-0 fs-6 fw-bold text-white rounded shadow"
                                style="background: #00c5bf !important; padding:10px;">Courses</h6>
                            <div class="content p-3">
                                @foreach ($courses as $index => $course)
                                <p class="">{!! @$course->CourseTaught !!}</p>
                                @endforeach
                                    {{-- <div class="pt-3">
                                        <p class="text-right text-success fs-7 m-0">Last Updated:
                                            {{ count($courses)>0 ? date('d M Y', strtotime(@$courses[0]->updated_at)) : date('d M Y', strtotime(@$profile->updated_at)) }}</p>
                                    </div> --}}
                            </div>
                        </div>
                    @endif
                    @if (count($training) > 0)
                        <div class="pt-3 border-bottom">
                            <h6 class="text-captilize m-0 fs-6 fw-bold text-white rounded shadow"
                                style="background: #00c5bf !important; padding:10px;">Training</h6>
                            <div class="content p-3">
                                @foreach ($training as $index => $course)
                                <p class="">{!! @$course->training !!}</p>
                                @endforeach
                                    {{-- <div class="pt-3">
                                        <p class="text-right text-success fs-7 m-0">Last Updated:
                                            {{ count($training)>0 ? date('d M Y', strtotime(@$training[0]->updated_at)) : date('d M Y', strtotime(@$profile->updated_at)) }}</p>
                                    </div> --}}
                            </div>
                        </div>
                    @endif
                    @if (count($memberShip) > 0)
                        <div class="pt-3 border-bottom">
                            <h6 class="text-captilize m-0 fs-6 fw-bold text-white rounded shadow"
                                style="background: #00c5bf !important; padding:10px;">Membership</h6>
                            <div class="content p-3">
                                @foreach ($memberShip as $index => $course)
                                <p class="">{!! @$course->Membership !!}</p>
                                @endforeach
                                    {{-- <div class="pt-3">
                                        <p class="text-right text-success fs-7 m-0">Last Updated:
                                            {{ count($memberShip)>0 ? date('d M Y', strtotime(@$memberShip[0]->updated_at)) : date('d M Y', strtotime(@$profile->updated_at)) }}</p>
                                    </div> --}}
                            </div>
                        </div>
                    @endif
                    @if (count($achievement) > 0)
                        <div class="pt-3 border-bottom">
                            <h6 class="text-captilize m-0 fs-6 fw-bold text-white rounded shadow"
                                style="background: #00c5bf !important; padding:10px;">Achievement</h6>
                            <div class="content p-3">
                                @foreach ($achievement as $index => $course)
                                <p class="">{!! @$course->achievement !!}</p>
                                @endforeach
                                    {{-- <div class="pt-3">
                                        <p class="text-right text-success fs-7 m-0">Last Updated:
                                            {{ count($achievement)>0 ? date('d M Y', strtotime(@$achievement[0]->updated_at)) : date('d M Y', strtotime(@$profile->updated_at)) }}</p>
                                    </div> --}}
                            </div>
                        </div>
                    @endif
                    
                    

                </div>

                <div class="tab-pane fade profile-details-tab-content pt-3" id="two-tab-pane" role="tabpanel"
                    aria-labelledby="two-tab" tabindex="0">
                    @php
                        $edu = explode(';', $profile->profile->detail_education);
                        // dd($edu);
                    @endphp
                    @foreach ($edu as $key => $item)
                        {{ $item }}<br>
                    @endforeach
                    {{-- {{ @$profile->profile->detail_education }} --}}
                    {{-- <div class="pt-3">
                        <p class="text-right text-success fs-7">Last Updated:
                            {{ date('d M Y', strtotime(@$profile->updated_at)) }}</p>
                    </div> --}}
                </div>

                {{-- <div class="tab-pane fade profile-details-tab-content" id="three-tab-pane" role="tabpanel"
                        aria-labelledby="three-tab" tabindex="0">
                        <div class="shadow-sm p-3 mb-5 bg-light rounded ccc">
                            <div class="card program-cat-card border-0">
                                <div class="card-title py-3 mb-3 fw-bolder">
                                    Journal Publication
                                </div>
                                <div class="card-body p-0">
                                    <div class="list-group border-0 rounded-0">
                                        @foreach ($journals as $journal)
                                            {!! @$journal->JournalDetail !!}
                                        @endforeach
                                        <div class="pt-3">
                                            <p class="text-right text-success fs-7">Last Updated:
                                                {{ date('d M Y', strtotime(@$journal->updated_at)) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card program-cat-card border-0">
                                <div class="card-title py-3 mb-3 fw-bolder">
                                    Conference Papers
                                </div>
                                <div class="card-body p-0">
                                    <div class="list-group border-0 rounded-0">
                                        @foreach ($conferences as $conference)
                                        {!! @$conference->ConferenceDetail !!}
                                        @endforeach
                                        <div class="pt-3">
                                            <p class="text-right text-success fs-7">Last Updated:
                                                {{ date('d M Y', strtotime(@$conference->updated_at)) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card program-cat-card border-0">
                                <div class="card-title py-3 mb-3 fw-bolder">
                                    Books
                                </div>
                                <div class="card-body p-0">
                                    <div class="list-group border-0 rounded-0">
                                        @foreach ($books as $book)
                                            {!! @$book->BookDetail !!}
                                        @endforeach
                                        <div class="pt-3">
                                            <p class="text-right text-success fs-7">Last Updated:
                                                {{ date('d M Y', strtotime(@$book->updated_at)) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                <div class="tab-pane fade profile-details-tab-content pt-3" id="three-tab-pane" role="tabpanel"
                    aria-labelledby="three-tab" tabindex="0">
                    <div class="row nav nav-pills mb-3 " id="pills-tab" role="tablist">
                        <li class="col-4 nav-item text-center" role="presentation">
                            <a class="nav-link fw-bold active" id="pills-journal-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-journal" type="button" role="tab"
                                aria-controls="pills-journal" aria-selected="true">Journal Publication</a>
                        </li>
                        <li class="col-4 nav-item text-center" role="presentation">
                            <a class="nav-link fw-bold" id="pills-conference-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-conference" type="button" role="tab"
                                aria-controls="pills-conference" aria-selected="true">Conference
                                Papers</a>
                        </li>
                        <li class="col-4 nav-item text-center" role="presentation">
                            <a class="nav-link fw-bold" id="pills-book-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-book" type="button" role="tab"
                                aria-controls="pills-book" aria-selected="true">Books</a>
                        </li>
                    </div>
                    <div class="tab-content shadow p-3" id="pills-tabContent">
                        <div class="tab-pane fade show profile-details-tab-content active " id="pills-journal"
                            role="tabpanel" aria-labelledby="pills-journal-tab" tabindex="0">
                            @foreach ($journals as $index => $journal)
                                {{-- <p class="mb-3"><span>{{ $index+1 }}. </span>{!! @$journal->JournalDetail !!}</p> --}}
                                <p class="mb-3"><a href="{{ @$journal->DOI }}" target="_blank">{{ @$journal->JournalTitle }} </a></p>
                            @endforeach
                            {{-- <div class="pt-3">
                                <p class="text-right text-success fs-7">Last Updated:
                                    {{ count($journals)>0 ? date('d M Y', strtotime($journals[0]->updated_at)) : date('d M Y', strtotime(@$profile->updated_at)) }}</p>
                            </div> --}}
                        </div>
                        <div class="tab-pane profile-details-tab-content fade" id="pills-conference" role="tabpanel"
                            aria-labelledby="pills-conference-tab" tabindex="0">
                            @foreach ($conferences as $index => $conference)
                                <p class="mb-3">{!! @$conference->ConferenceDetail !!}</p>
                            @endforeach
                            {{-- <div class="pt-3">
                                <p class="text-right text-success fs-7">Last Updated:
                                    {{ count($conferences)>0 ? date('d M Y', strtotime(@$conferences[0]->updated_at)) : date('d M Y', strtotime(@$profile->updated_at)) }}</p>
                            </div> --}}
                        </div>
                        <div class="tab-pane profile-details-tab-content fade" id="pills-book" role="tabpanel"
                            aria-labelledby="pills-book-tab" tabindex="0">
                            @foreach ($books as $index => $book)
                                <p class="mb-3">{!! @$book->BookDetail !!}</p>
                            @endforeach
                            {{-- <div class="pt-3">
                                <p class="text-right text-success fs-7">Last Updated:
                                    {{ count($books)>0 ? date('d M Y', strtotime(@$books[0]->updated_at)) : date('d M Y', strtotime(@$profile->updated_at)) }}</p>
                            </div> --}}
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade profile-details-tab-content pt-3" id="four-tab-pane" role="tabpanel"
                    aria-labelledby="four-tab" tabindex="0">
                    @foreach ($researchs as $research)
                        {!! @$research->ResearchAreasOrInterest !!}
                    @endforeach
                    {{-- <div class="pt-3">
                        <p class="text-right text-success fs-7">Last Updated:
                            {{ count($researchs)>0 ? date('d M Y', strtotime(@$researchs[0]->updated_at)) : date('d M Y', strtotime(@$profile->updated_at)) }}</p>
                    </div> --}}
                </div>

                <div class="tab-pane fade profile-details-tab-content pt-3" id="five-tab-pane" role="tabpanel"
                    aria-labelledby="five-tab" tabindex="0">
                    @foreach ($awards as $award)
                        {!! @$award->AwardHonor !!}
                    @endforeach
                    {{-- <div class="pt-3">
                        <p class="text-right text-success fs-7">Last Updated:
                            {{ count($awards)>0 ? date('d M Y', strtotime(@$awards[0]->updated_at)) : date('d M Y', strtotime(@$profile->updated_at)) }}</p>
                    </div> --}}
                </div>

                <div class="tab-pane fade profile-details-tab-content pt-3" id="six-tab-pane" role="tabpanel"
                    aria-labelledby="six-tab" tabindex="0">
                    @foreach ($courses as $course)
                        {!! @$course->CourseTaught !!}
                    @endforeach
                    {{-- <div class="pt-3">
                        <p class="text-right text-success fs-7">Last Updated:
                            {{ count($courses)>0 ? date('d M Y', strtotime(@$courses[0]->updated_at)) : date('d M Y', strtotime(@$profile->updated_at)) }}</p>
                    </div> --}}
                </div>
            </div>

        </div>
    </div>
</main>
<script>
    $('#myTab .nav-link').click(function() {
        $('#myTab .nav-link').each(function() {
            $(this).removeClass('active');
        });

        $(this).addClass('active');

    });

    $('#pills-tab .nav-link').click(function() {
        $('#pills-tab .nav-link').each(function() {
            $(this).removeClass('active');
        });

        $(this).addClass('active');
    });
</script>