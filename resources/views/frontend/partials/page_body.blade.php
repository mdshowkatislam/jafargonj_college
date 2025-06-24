<main class="mt-4">
    <seciton class="">
        <article class="content py-2">
            {!! $page_info != '' ? $page_info->description : ''  !!}
        </article>    

        <div class="row">
            <div class="mb-2 @if (@$page_info->page_layout == '3' || @$page_info->page_layout == '4') col-sm-12 @else col-sm-6 @endif">
                @if(!empty($page_info->image))
                    <img src="{{ asset('assets/welcome/'.$page_info->image) }}" class="img-fluid" alt="Page Image">
                @endif
            </div>

            <div class="mb-2 @if (@$page_info->page_layout == '3' || @$page_info->page_layout == '4') col-sm-12 @else col-sm-6 @endif">
                @php
                    if (!empty($page_info->video_url)) {
                        // Extract the YouTube video ID from the full URL
                        preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $page_info->video_url, $matches);
                        $video_id = $matches[1] ?? '';
                    }
                @endphp
    
                @if(!empty($video_id))
                    <div class="embed-responsive">
                        <iframe class="embed-responsive-item" width="100%" height="340" 
                                src="https://www.youtube.com/embed/{{ $video_id }}" 
                                allowfullscreen>
                        </iframe>
                    </div>
                @endif
            </div>
        </div>

        



    </seciton>
</main>