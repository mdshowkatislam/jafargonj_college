<style>
    .office-message-card{
        height: 350px;
    }

    @media only screen and (max-width: 600px) {
        .office-message-card{
            height: auto;
        }
    }
</style>

<div class="p-3 mb-3 office-message-card">
    <div class="img" style="min-height: 340px; text-align: justify;">
        <h3 class="fs-5 fw-bold border-bottom p-1 common-font-color custom-font-titillium-web">
            Office Head
        </h3>
    
        @if(isset($office->profile->id))
            <div style="text-align: justify !important;">
                <a href="{{ route('office_member_deatils', $office->id) }}">
                    <img class="chair-msg"
                        src="{{ @$office->profile->photo ? asset('upload/profiles/' . @$office->profile->photo) : @$office->profile->photo_path }}"
                        alt="..."
                        onerror="this.src='{{ asset('dummy/user-dummy.jpeg') }}'" style="width: 35%;float: left; box-shadow: 3px 3px 1px #ccc;margin-right: 10px">
                    <h4 class="text-left custom-font-titillium-web" style="word-spacing: 3px;">
                        {{ @$message->profile->nameEn }}
                    </h4>
                </a>
                @php
                    $originalText2  = @$message->long_description;
                    $truncatedText2 = Str::limit(@$message->long_description, 600, '...');
                    $textLeft2      = strlen($originalText2) === strlen($truncatedText2);
                @endphp

                <span class="custom-font-titillium-web">{!! Str::limit(@$message->long_description, 400,'...') !!} </span>
                
                @if (!$textLeft2)
                    <a href="{{ route('office_message', @$office->id) }}" class="ms-1 fw-bold custom-font-titillium-web">
                        Read More
                    </a>
                @endif
            </div>
        @else
            No Data Set For Department Head   
        @endif
    </div>
</div>