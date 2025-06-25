<div class="text-center site-heading">
    <h5 class="custom-font-titillium-web">Notices</h5>
</div>

<div class="top-author" style="padding-left: 10px;">
    <div class="author-items" style="background-color: white; overflow:scroll; height: 568px">
        <!---- Single Item -->
        <div class="item">
            <div class="info" style="width: 100%">
                @foreach (@$notices as $item)
                <div style="border-bottom: 1px solid #8b8b8b;">
                    <div class="mb-3 mt-3">
                        <h5 style="text-align: justify; font-size:15px;">
                            <a href="{{ route('type.details', ['id' => $item->id, 'type' => 'notice']) }}" target="_blank">{{ $item->title }}</a>
                        </h5>

                        <li style="border: none; text-align: left;">
                            <span class="custom-font-titillium-web">Published: {{ date('M d,Y', strtotime($item->date)) }}</span>
                        </li>
                        <li>
                            <a href="{{ route('type.details', ['id' => $item->id, 'type' => 'notice']) }}" target="_blank">
                                <button type="button" class="btn btn-sm rounded-pill custom-font-titillium-web myplusclass"><i class="fas fa-plus"></i> Read more..</button>
                            </a>

                            {{-- <a href="{{ route('type.details', ['id' => $item->id, 'type' => 'notice']) }}"
                            target="_blank"
                            class="btn circle btn-dark border btn-sm text-center readmore-common-button custom-font-titillium-web">
                            <i class="fas fa-plus" style="color: #002147"></i> Read More</a> --}}

                        </li>
                    </div>

                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="more-btn col-md-12 text-center" style="padding-top: 0px;">
        <a href="{{ route('type.all', ['type' => 'notice']) }}" class="btn btn-theme effect btn-md custom-font-titillium-web custom-font-titillium-web">View All Notices..</a>
    </div>
</div>