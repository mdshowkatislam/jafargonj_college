@foreach ($infos as $key => $info)

{{-- <div class="row">
    <div class="card card-background" style="padding-top: 10px;margin-bottom: 15px;">
        <h4 class="content-title font-work-sans"><a href="#" class="font-work-sans">{{ $info->title }}</a></h4>
        <p class="fs-7 font-work-sans"><i class="fas fa-calendar-alt"></i> {{ date('M d, Y', strtotime($info->publish_date)) }}</p>
        <a href="{{ asset('storage/app/media/form/'. @$info->file) }}" target="_blank" class="download-btn font-work-sans" type="button">Download</a>
    </div>
</div> --}}
<div class="col-lg-12 mb-4">
    <div class="bg-light shadow p-3 rounded" style="">
        <h3 class="fs-5 font-work-sans">
            <a href="#"
                class="font-work-sans">{{ $info->title }}</a>
        </h3>
        <p class="fs-7 font-work-sans"><i class="fas fa-calendar-alt"></i>
            {{ date('M d, Y', strtotime($info->publish_date)) }}</p>
        <a href="{{ asset('storage/app/media/form/' . @$info->file) }}"
            class="btn about-btn px-3 py-1 text-white shadow font-work-sans" target="_blank"
            type="button">Download</a>
    </div>
</div>
@endforeach