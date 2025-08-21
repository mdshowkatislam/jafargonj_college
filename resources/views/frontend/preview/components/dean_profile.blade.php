
    <div class="">
        <div class="img p-2" style="height: 350px;">
            <img class="rounded w-100 h-100" src="{{ @$faculty_head->profile->photo ? asset('upload/profiles/' . @$faculty_head->profile->photo) : @$faculty_head->profile->photo_path }}" onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';" />
        </div>

        @if ($faculty_head->profile_id)
            <div class="text-center">
                <a href="{{ route('faculty_member_head.details', @$faculty_head->profile_id) }}" class="text-dark fw-bold fs-6 mb-0 lh-sm faculty-title">{{ @$faculty_head->profile->nameEn }}</a>
                {{--  <a href="{{ route('faculty_member.details', @$faculty_head->profile_id) }}" class="text-dark fw-bold fs-5 mb-0 lh-sm faculty-title">{{ @$faculty_head->profile->nameEn }}</a>  --}}
                <p class="fw-bold common-font-color fs-6 mb-1  custom-font-titillium-web">Professor</p>
                {{-- <p class="fw-bold common-font-color fs-6 mb-1 pt-2 custom-font-titillium-web">{{ @$faculty_head->profile->designation }}</p> --}}
            </div>
        @endif

    </div>
