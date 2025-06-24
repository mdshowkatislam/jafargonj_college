<div style="position: relative;">
    <div style="height:84%" class="thumb mycolorgreen">
        @if (!empty($welcome_page->image) && file_exists(public_path('assets/welcome/' . $welcome_page->image)))
        <img src="{{ asset('assets/welcome/' . $welcome_page->image) }}" style="width: 100%; height: 100%;" alt="welcome">
        @else
        <img src="{{ asset('assets/welcome/welcome.jpg') }}" style="width: 100%; height: 100%;" alt="welcome">
        @endif

        @if (isset($welcome_page) && !empty($welcome_page->video_url))
        <a href="{{ $welcome_page->video_url }}" target="_blank" class="popup-youtube light video-play-button">
            <i class="fa fa-play"></i>
        </a>
        @else
        <p>No video available</p>
        @endif
    </div>
</div>