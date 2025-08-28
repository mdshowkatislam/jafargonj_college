<div class="p-2">
    
    <div class="d-flex justify-content-between align-items-end">
        <h1 class="text-uppercase mb-0 home-content-heading custom-font-titillium-web">Class Teachers</h1>
        <a class="my-auto home-content-heading custom-font-titillium-web" href="{{ route('department_all_faculties', $department->id) }}">All</a>
    </div>

    <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;"></div>

    <div class="row mb-4">
        @php
            $i = 0;
        @endphp
{{-- @dd($faculty_members) --}}
        @foreach($faculty_members as $key => $member)
            @if(@$member->profile->appointment_type != 'Part-time')

            @php
                $i++;
            @endphp

            <div class="col-12 col-md-6 col-lg-3 mt-4">
                <a href="{{ route('department_member_deatils', $member->profile_id) }}" style="cursor: pointer;">
                    <div class="shadow-lg card rounded-0 border-0 d-block text-center pt-3 faculty_member">
                        <div class="border-one"></div>
                        <div class="border-two"></div>
                        {{-- <img class="mx-2 mt-2 shadow-lg image-circle"
                            src="{{ @$member->profile->photo ? asset('upload/profiles/' . $member->profile->photo) : $member->profile->photo_path }}"
                            height="200" width="200"
                            onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';"
                            alt="" /> --}}
                        <img class="mx-2 mt-2 shadow-lg image-circle"
                            src="{{ asset('upload/profiles/' . @$member->profile->photo) }}"
                            height="200" width="200"
                            onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';"
                            alt="" />
                        <div class="card-body" style="min-height: 7.75rem">
                            <a href="{{ route('department_member_deatils', $member->profile_id) }}">
                                <div class="faculty-member-title d-flex justify-content-center">
                                    <h5 class="custom-font-titillium-web card-title fs-5 text-center text-captilize common-font-color">
                                        {{ @$member->profile->nameEn }}
                                    </h5>
                                </div>

                                <p class="text-center fs-6 common-font-color custom-font-titillium-web">
                                    {{ @$member->profile->designation }}
                                </p>
                            </a>
                        </div>
                    </div>
                </a>
            </div>
            
            @endif
            {{-- @if ($i == 12)
            @break
           @endif --}}
    @endforeach

    </div>


    {{-- <div class="text-center">
        <a href="{{ route('faculty_all_faculties', $faculty->id) }}" type="button"
            class="btn btn-theme effect btn-md custom-font-titillium-web">All Faculty Members</a>
    </div> --}}


  

</div>