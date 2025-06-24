@foreach ($infos as $key => $info)

<div class="col-lg-12">
    <div class="p-3 card card-background rounded shadow" style="padding-top: 10px;margin-bottom: 15px;">
        <h4 class="content-title font-work-sans"><a href="#" class="font-work-sans">{{ $info->title }}</a></h4>
        <p class="fs-7 font-work-sans"><i class="fas fa-calendar-alt"></i> {{ date('M d, Y', strtotime($info->publish_date)) }}</p>
        <a href="{{ asset('storage/app/media/form/'.$info->file) }}" target="_blank" class="download-btn font-work-sans" type="button">Download</a>
    </div>
</div>
@endforeach