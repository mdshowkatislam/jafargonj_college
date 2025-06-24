@foreach ($infos as $key => $info)
<div class="row pb-3">
    {{-- <div class="col-md-4 card card-background">
        <img src="{{ asset('upload/journal/' . @$info->attachment1) }}"
            onerror="this.onerror=null;this.src='{{ asset('upload/no-image.png') }}';"
            height="315px" class=" shadow-1-strong mb-4 over-img" alt="Student Life" />
    </div> --}}
    <div class="col-md-12 card card-background pt-3">
        <h4 class="content-title"><a href="#"
                style="text-decoration: none">{{ $info->title }}</a></h4>
        {{-- <h6 class="fs-6"><span class="fw-bold">Chief Patron:</span> {{ @$info->authors }}
        </h6>
        <h6 class="fs-6"><span class="fw-bold">Editor:</span> {{ @$info->editor }}</h6>
        <h6 class="fs-6"><span class="fw-bold">Issn:</span> {{ @$info->issn }}</h6>
        <h6 class="fs-6"><span class="fw-bold">Volume:</span> {{ @$info->volume }}</h6>
        <h6 class="fs-6"><span class="fw-bold">Issue:</span> {{ @$info->issue }}</h6> --}}
        <p class="fs-7 font-work-sans"><i class="fas fa-calendar-alt"></i>
            {{ date('M d, Y', strtotime($info->date)) }}</p>

        <a href=""
            class="download-btn font-work-sans" type="button">See More</a>
        {{-- <a href="{{ route('journal_details', [@$info->id, 'issn' => @$info->issn, 'vol' => @$info->volume, 'issue' => @$info->issue]) }}"
            class="download-btn font-work-sans" type="button">See More</a> --}}
    </div>
</div>
@endforeach