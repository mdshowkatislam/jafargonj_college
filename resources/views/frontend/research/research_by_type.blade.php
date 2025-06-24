@foreach ($infos as $key => $info)
    <div class="row">
        <div class="card card-background" style="padding-top: 10px;margin-bottom: 15px;">
            @if ($info->author)
                <h4 class="content-title"><a
                        href="{{ route('bangabandhu_chair.research.detail', ['completed_research', $info->id]) }}">{{ $info->title }}</a>
                </h4>
                <h6 class="fs-6">Author: {{ @$info->author }}</h6>
            @else
                <h4 class="content-title"><a
                        href="{{ route('bangabandhu_chair.research.detail', ['ongoing_research', $info->id]) }}">{{ $info->title }}</a>
                </h4>
                <h6 class="fs-6">Author: {{ @$info->pi_co }}</h6>
            @endif
            <p class="fs-7 font-work-sans"><i class="fas fa-calendar-alt"></i>
                {{ date('M d, Y', strtotime($info->date)) }}</p>
            @if ($info->file)
                <a href="{{ asset('upload/journal/' . @$info->file) }}" class="download-btn font-work-sans"
                    type="button">Download</a>
            @endif
        </div>
    </div>
@endforeach
