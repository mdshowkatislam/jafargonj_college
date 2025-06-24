    <!-- Team -->
    @if (count($teams) > 0)
        <div class="club-moderator">
            <div class="container">
                <h1 class="text-uppercase mb-0 home-content-heading custom-font-titillium-web">Team</h1>
                <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;">
                </div>
                <div class="row">
                    {{-- @php
                    $item = 10;
                @endphp --}}
                    @foreach ($teams as $item)
                        {{-- <div class="col-12 col-md-6 col-lg-3 mt-4">
                        <div class="shadow-lg card rounded-0 border-0 d-block text-center pt-3 faculty_member">
                            <div class="border-one"></div>
                            <div class="border-two"></div>
                            <img class="mx-2 mt-2 shadow-lg image-circle"
                                src="{{ asset('upload/club/member/image'. $item->image) }}" height="200" width="200"
                                onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';"
                                alt="">
                            <div class="card-body bg-light shadow-lg" style="">
                                <a href="#">
                                    <div class="faculty-member-title d-flex justify-content-center align-items-center">
                                        <h5 class="card-title fs-5 custom-font-titillium-web text-center text-captilize common-font-color">
                                            {{ $item->member->name }}
                                        </h5>
                                        <p class="card-text custom-font-titillium-web">
                                            {{ $item->designation->name }}
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div> --}}

                        <div class="col-12 col-md-6 col-lg-3 mt-3">
                            <div class="shadow-lg card rounded-0 border-0 d-block text-center pt-3 faculty_member">
                                <div class="border-one"></div>
                                <div class="border-two"></div>
                                <img class="mx-2 mt-2 shadow-lg image-circle" src="{{ asset('upload/club/member/image/' . @$item->member->image) }}" height="200" width="200" onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';" alt="" />
                                <div class="card-body bg-light shadow-lg" style="min-height: 7.75rem">
                                    <div class="faculty-member-title d-flex justify-content-center">
                                        <h5 class="custom-font-titillium-web card-title fs-5 text-center text-captilize common-font-color">
                                            {{ @$item->member->name }}
                                        </h5>
                                    </div>
                                    <p class="custom-font-titillium-web text-center fs-6 common-font-color">
                                        {{ @$item->designation->name }}
                                    </p>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif