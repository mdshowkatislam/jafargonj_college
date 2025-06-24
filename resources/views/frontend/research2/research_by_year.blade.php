@foreach ($infos as $key => $info)
    <div class="col-md-12 mb-4">
        <div class="bg-light shadow p-3 rounded" style="">
            <h3 class="fs-5 font-work-sans">
                <a href="{{ route('research', $info->id) }}" class="font-work-sans">{{ $info->title }}</a>
            </h3>
            <p class="fs-7 font-work-sans"><i class="fas fa-calendar-alt"></i>
                {{ date('M d, Y', strtotime($info->date)) }}</p>
            @php
                $files = \App\Models\ResearchFile::where('research_id', $info->id)->get();
            @endphp
            {{-- @if (count($files) > 0)
                @foreach ($files as $item)
                    <a href="{{ asset('upload/journal/' . @$item->file) }}"
                        class="btn about-btn px-3 py-1 text-white shadow font-work-sans" target="_blank"
                        type="button">Download</a>
                @endforeach
            @endif --}}
        </div>
    </div>
@endforeach



