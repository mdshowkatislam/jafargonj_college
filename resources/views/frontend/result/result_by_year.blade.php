@foreach ($infos as $key => $info)
<div class="col-lg-12">
    <div class="p-3 bg-light rounded shadow-sm mb-3" style="">
        <h4 class="fs-5 font-work-sans"><a href="#"
                class="font-work-sans">{{ $info->title }}</a></h4>
        <p class="fs-7 font-work-sans"><i class="fas fa-calendar-alt"></i>
            {{ date('M d, Y', strtotime($info->created_at)) }}</p>
        <a href="{{ asset('storage/app/upload/academic/' . $info->file) }}"
            target="_blank" class="btn btn-danger px-3 py-1 text-white shadow font-work-sans"
            type="button">Download</a>
    </div>
</div>
@endforeach