<div class="">
    <div class="text-center">
        <h4 class="custom-font-titillium-web mycolorgreen" style="font-weight: bold;">{!! $welcome_page->title !!}</h4>
    </div>
    @php
    $originalText = $welcome_page->description;
    $truncatedText = Str::limit($welcome_page->description, 800, '....');
    $textLeft = strlen($originalText) === strlen($truncatedText);
    @endphp

    <div class="welcome-description text-justify custom-font-titillium-web" style="text-align: justify;">
        {!! $truncatedText !!}

        <a href="{{ route('about_overview') }}" style="text-decoration: underline;"><u>[Read more]</u></a>
    </div>
    <!-- @if (!$textLeft)
    <a style="width:100%" class="btn btn-theme effect btn-block btn-lg btnhome" href="{{ route('about_overview') }}">Read More...<i class="fas fa-check-circle fa-2x fa-pull-right"></i></a>
    @endif -->
        <!-- <p class="text-justify">
                            {!! Str::limit($welcome_page->description, 400, '....') !!}
                        </p>
                        @if (!$textLeft)
            <a style="width:100%" target="_blank" class="btn btn-theme effect btn-block btn-lg btnhome"
                               href="{{ route('about_overview') }}">Read
                                More...<i class="fas fa-check-circle fa-2x fa-pull-right"></i></a>
    @endif -->
</div>