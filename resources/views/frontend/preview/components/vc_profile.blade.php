<div class="equal-height aos-init features">
    <div class="item">
        @if (@$vcInfo->profile)
        <a href="{{ route('vc_info') }}">
            <div style="height: auto; box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;" class="info text-center pt-5 pb-4">
                <p class="text-center">
                    <img class="image-fluid" src="{{ @$vcInfo->profile->photo ? asset('upload/profiles/' . @$vcInfo->profile->photo) : @$vcInfo->profile->photo_path }}" onerror="this.onerror=null;this.src='{{ asset('dummy/user-dummy.jpeg') }}';" alt="VC Profile" height="160" width="160" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 5px 0px, rgba(0, 0, 0, 0.1) 0px 0px 1px 0px;">
                </p>

                <div class="custom-font-titillium-web mycolorpink" style="font-size: 14px;">
                    {{ @$vcInfo['profile']['nameEn'] }}
                </div>

                <h5 class="text-center custom-font-titillium-web mycolorgreen">Principal</h5>
            </div>
        </a>
        @else
        <div style="height: auto;box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;" class="info text-center pt-5 pb-4">
            <p class="text-center">
                <img class="image-fluid" src="{{ asset('upload/profiles/' . @$vcInfo->profile->photo) }}" onerror="this.onerror=null;this.src='{{ asset('dummy/user-dummy.jpeg') }}';" alt="VC Profile" height="160" width="160">
            </p>
            <h5 class="text-center custom-font-titillium-web">Vc Information Not Found</h5>
        </div>
        @endif
    </div>
</div>