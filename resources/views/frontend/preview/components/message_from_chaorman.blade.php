
        <div class="img" style="min-height: 340px; text-align: justify;">
            {{-- <img class="rounded"
                src="{{ @$department->profile->photo ? asset('upload/profiles/' . @$department->profile->photo) : @$department->profile->photo_path }}"
                onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';" /> --}}
                {{-- <h3 class="custom-font-titillium-web">{{@$message->title_first_part}}</h3> --}}

                <h3 class="fs-5 fw-bold border-bottom p-1 common-font-color custom-font-titillium-web">
                    {{@$message->title_first_part}}
                </h3>
            {{-- @dd($message->profile->id) --}}

                @if(isset($message->profile->id))
                    <div style="text-align: justify !important;">
                        <a href="{{ route('department_member_deatils', $message->profile->id) }}">
                            <img class="chair-msg"
                                src="{{ @$message->profile->photo ? asset('upload/profiles/' . @$message->profile->photo) : @$message->profile->photo_path }}"
                                alt="..."
                                onerror="this.src='{{ asset('dummy/user-dummy.jpeg') }}'" style="width: 30%;float: left; box-shadow: 3px 3px 1px #ccc;margin-right: 10px">
                            <h4 class="text-left custom-font-titillium-web" style="word-spacing: 3px;">
                                {{ @$message->profile->nameEn }}
                            </h4>
                        </a>
                        
                        <span class="custom-font-titillium-web">{!! Str::limit(@$message->long_description, 400,'...') !!} </span>

                        <a href="{{ route('chair-message.details', $message->profile->id) }}" class="ms-1 fw-bold custom-font-titillium-web">
                            Read More
                        </a>

                    </div>
                @else
                    No Data Set For Department Head   
                @endif
        </div>