

        <h3 class="fs-5 fw-bold border-bottom p-1 common-font-color custom-font-titillium-web">About
            {{ @$department->name }}
        </h3>

        <div class="text-justify fs-6 custom-font-titillium-web">
            @php
                $originalText = @$department->about;
                $truncatedText = Str::limit($originalText, 700, '...');
                $textLeft = strlen($originalText) === strlen($truncatedText);
            @endphp

            <span class="custom-font-titillium-web">{!! Str::limit(@$department->about, 700,'...') !!} </span>

            @if (!$textLeft)
                <a href="{{ route('department_message', @$department->id) }}" class="ms-1 fw-bold custom-font-titillium-web">
                    Read More
                </a>
            @endif

        </div>
  