@foreach ($infos as $key => $info)
    <div class="col-md-12 mb-4">
        <div class="bg-light shadow p-3 rounded" style="">
            <h3 class="fs-5 font-work-sans">
                <a href="#" class="font-work-sans">{{ @$info->title }}</a>
            </h3>
            @if (@$info->type != 2)
                <p class="fs-7 font-work-sans"><i class="fas fa-calendar-alt"></i>
                    {{ date('M d, Y', strtotime(@$info->date)) }}</p>
            @endif

            <a href="{{ asset('upload/career/' . @$info->attachment) }}"
                class="btn about-btn px-3 py-1 mt-2 text-white shadow font-work-sans" target="_blank"
                type="button">Download</a>
        </div>
    </div>
@endforeach
