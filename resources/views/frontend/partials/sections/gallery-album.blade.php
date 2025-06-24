<div class="row">
    @foreach ($galleryCategory as $item)
        @php
            $image = \App\Models\Gallery::where('gallery_category_id', $item->id)
                ->where('is_featured', 1)
                ->first();

                
        @endphp
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 mt-4">
            <a href="{{ url('gallery', $item->id)}}">
                <div class="zoom_in_hover border rounded">
                    <div class="image overflow-hidden" style="height:200px;">
                        <img class="img-fluid rounded object-cover h-100 w-100" src="{{ asset('upload/gallery_images/' . @$item->image) }}"
                            onerror="this.onerror=null;this.src='{{ asset('upload/gallery.png') }}';"
                            style="border-bottom-left-radius:0 !important; border-bottom-right-radius:0 !important;" />
                    </div>

                    <div class="title text-center p-3">
                        <h4 class="fs-6 fw-bold">{{ @$item->name }}</h4>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>
