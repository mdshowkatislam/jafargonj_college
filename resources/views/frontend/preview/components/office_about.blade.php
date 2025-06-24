<style>
    .office-about-card{
        height: 350px;
    }

    @media only screen and (max-width: 600px) {
        .office-about-card{
            height: auto;
        }
    }
</style>
<div class="p-3 mb-3 office-about-card">
    <h3 class="fs-5 fw-bold border-bottom p-1 common-font-color custom-font-titillium-web">About
        {{ @$office->name }}
    </h3>
    <div class="text-justify fs-6 custom-font-titillium-web">
        @php
            $originalText = @$office->about;
            $truncatedText = Str::limit($originalText, 600, '...');
            $textLeft = strlen($originalText) === strlen($truncatedText);
        @endphp
        <span class="custom-font-titillium-web">{!! Str::limit(@$office->about, 600,'...') !!} </span>
        @if (!$textLeft)
            <a href="{{ route('office_about', @$office->id) }}" class="ms-1 fw-bold custom-font-titillium-web">
                Read More
            </a>
        @endif
    </div>
</div>
    

