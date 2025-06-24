
        <div class="overview">
            {{-- <h1 class="text-uppercase mb-0 home-content-heading custom-font-titillium-web">About Club</h1>
            <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;">
            </div> --}}
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="text-center bg-light shadow" style="height: 550px">
                        <div class="img p-4" style="height:400px">
                            <img class="rounded w-100 h-100" src="{{ @$cheif_advisor->profile->photo ? asset('upload/profiles/' . @$cheif_advisor->profile->photo) : @$cheif_advisor->profile->photo_path }}" onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';" />
                        </div>
                        <div class="text-center px-3 pb-3 bg-light rounded" style="height: 150px">
                            <div class="border-top pt-3">
                                <h3 class="custom-font-titillium-web text-dark fw-bold fs-5 mb-0 lh-sm faculty-title">
                                    {{ @$cheif_advisor->profile->nameEn }}</h3>
                                <p class="custom-font-titillium-web fw-bold common-font-color fs-6 mb-1 pt-2">
                                    {{ @$cheif_advisor->designation->name }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="bg-light p-3 rounded shadow about-message-content" style="height: 550px">
                        <div>
                            <h2 class="fs-3 fw-bold border-bottom pb-3 mb-3 common-font-color">Overview</h2>
                            <div class="text-justify fs-6">
                                @php
                                    $originalText = @$club->description;
                                    $truncatedText = Str::limit($originalText, 1300, '...');
                                    $textLeft = strlen($originalText) === strlen($truncatedText);
                                @endphp
                                {!! Str::limit(@$club->description, 1300, '...') !!}
                                @if (!$textLeft)
                                    <a href="{{ route('club.message', @$club->id) }}" class="ms-1 fw-bold">Read More </a>
                                @endif
                            </div>
                            {{-- <div class="row d-flex justify-content-center align-items-center pt-3">
                                <div id="page-252" class="col-xs-12 col-sm-4 subpage-items">
                                    <div class="subpage-item-style">
                                        <a href="{{ route('club.mission', $club->id) }}" class="page-link">
                                            <span class="sr custom-font-titillium-web">Mission</span>
                                        </a>
                                    </div>
                                </div>
                                <div id="page-252" class="col-xs-12 col-sm-4 subpage-items">
                                    <div class="subpage-item-style">
                                        <a href="{{ route('club.vision', $club->id) }}" class="page-link">
                                            <span class="sr custom-font-titillium-web">Vision</span>
                                        </a>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
