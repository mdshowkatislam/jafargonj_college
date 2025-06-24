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

    <main class="container mb-3">
        <div class="row">
            <div class="col-12">
                <h3 class="text-uppercase mb-0 home-content-heading custom-font-titillium-web">Office Member</h3>
                <div class="position-relative w-100 common-bg-color mt-0" style="height: 4px;"></div>
            </div>
            @foreach ($profiles as $profile)
                @if (isset($profile->profile->id) && !empty($profile->profile->id))
              
                <div class="col-md-3 col-sm-6 col-xl-3 mt-3 mb-3">
                    <div style="height: 20rem;" class="card box-shadow faculty_member">
                        <div class="border-one"></div>
                        <div class="border-two"></div>
                        <img style="max-width:40%; margin-top:12px" class="img-thumbnail rounded-circle mx-auto d-block" src="{{ @$profile->profile->photo ? asset('upload/profiles/' . @$profile->profile->photo) : @$profile->profile->photo_path }}" onerror="this.onerror=null;this.src='{{ asset('dummy/user-dummy.jpeg') }}';" alt="{{@$profile->profile->nameEn}}" />
                        <div class="card-body mt-2">
                            <h6 class="card-title text-center">
                                {{ @$profile->profile->nameEn ?? '' }}
                            </h6>
                            <div class="details_info text-center">
                                @php
                                    if(@$profile->additional_charge == 1 && @$profile->additional_designation) {
                                        $designation = App\Models\Designation::where('id', $profile->additional_designation)->pluck('name')->first();
                                    } else {
                                        $designation = @$profile->profile->designation ?? '';
                                    }
                                @endphp
                                @if (@$designation)
                                <span>{{ @$designation }}</span><br>
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

