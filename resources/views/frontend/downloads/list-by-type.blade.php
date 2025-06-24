@foreach ($infos as $key => $info)

<div class="col-lg-12">
    <div class="shadow-sm bg-light rounded p-3 mb-3 d-flex justify-content-between align-items-center">
        <div class="col-8">
            <h4 class="fs-5 fw-bold m-0">
                <a href="{{ asset('storage/app/media/form/' . $info->file) }}"
                    class="text-dark" target="_blank">{{ $info->title }} {{ $info->title }}</a>
            </h4>
        </div>
        <div class="col-2 text-right">
            <small>Uploaded at: <br>{{ date('d-m-Y', strtotime($info->publish_date)) }}</small>
        </div>
        <div class="col-2 text-right">
            <a href="{{ asset('storage/app/media/form/' . $info->file) }}"
                target="_blank"
                class="btn btn-sm downloads-btn m-0 fs-6 common-bg-color text-white"
                type="button">Download</a>
        </div>
    </div>
</div>
@endforeach