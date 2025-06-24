<style>
    .dean_staff,
    .faculty_member {
        position: relative;
        transition: all 900ms ease;
        -moz-transition: all 900ms ease;
        -webkit-transition: all 900ms ease;
        -ms-transition: all 900ms ease;
        -o-transition: all 900ms ease;
    }

    .image-circle {
        border-radius: 100%;
        border: 5px solid #00c5bf;
        padding: 5px;
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
</style>
    <div class="container">
        <div class="d-flex justify-content-between align-items-end">
            <h1 class="text-uppercase mb-0 home-content-heading custom-font-titillium-web">
                List of Officers
            </h1>
            {{-- <a href="" class="text-uppercase text-decoration-none fw-bold common-font-color">All</a> --}}
        </div>

        <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;"></div>

        <div class="row">
            {{-- @dd(count($dean_staffs)) --}}
            @forelse ($officer_of_dean_office as $member)
                @continue($member->profile_id == @$faculty_head->profile_id)
                <div class="col-12 col-md-6 col-lg-3 mt-3">
                    <div class="card rounded-0 border-0 d-block text-center pt-3 dean_staff" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                        <div class="border-one"></div>
                        <div class="border-two"></div>
                        <img class="mx-2 mt-2 shadow-lg image-circle" src="{{ @$member->profile->photo ? asset('upload/profiles/' . @$member->profile->photo) : @$member->profile->photo_path }}" height="200" width="200" onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';" alt="" />
                        <div class="card-body" style="min-height: 9rem;">
                            {{-- <a href="{{ route('faculty.officer.details', $member->profile->id) }}"> --}}
                            <a href="{{ route('faculty_member_deatils', $member->profile->id) }}">
                                <h5 class="custom-font-titillium-web card-title fs-5 text-center text-captilize border-top pt-3">
                                    {{ strtok(@$member->profile->nameEn, ',') }}
                                    {{-- {{ @$member->profile->nameEn }} --}}
                                </h5>
                            </a> 
                            <p class="text-center common-font-color fs-6 custom-font-titillium-web">
                                {{ @$member->profile->designation }}
                            </p>
                        </div>
                    </div>
                </div>
            @empty
            <div class="col-md-12">
                <h2 class="fs-5 p-3 mt-3  mb-0 bg-light rounded">There are no activities at the moment..</h2>
            </div>
            @endforelse
        </div>
    </div>