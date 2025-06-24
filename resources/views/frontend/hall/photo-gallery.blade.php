@if(count($photo_galleries)>0)
{{-- @dd($photo_galleries) --}}
<section class="">
  <div class="container">
    <h3 class="text-left">Latest <span class="text-primary">Photos</h3>
  </div>
  <div class="container">
    <div class="row" style="margin-right: -7px; margin-left: -7px;">
      @foreach($photo_galleries as $item)
      <div class="col-4 mb-3" style="padding-right: 7px; padding-left: 7px;">
        <div class="latest-photo-div">
          <img style="width: 100%" src="{{ asset('upload/photo_gallery/'.$item->image) }}" alt="Latest Photos"
            class="img-fluid latest-photo">
        </div>
      </div>
      @endforeach

      {{-- <div class="col-4 mb-3" style="padding-right: 7px; padding-left: 7px;">
        <div class="latest-photo-div">
          <img src="{{ asset('frontend/cuimages/8.jpg') }}" alt="Latest Photos" class="img-fluid latest-photo"
            style="width: 100%">
        </div>
      </div>
      <div class="col-4 mb-3" style="padding-right: 7px; padding-left: 7px;">
        <div class="latest-photo-div">
          <img src="{{ asset('frontend/cuimages/9.jpg') }}" alt="Latest Photos" class="img-fluid latest-photo"
            style="width: 100%">
        </div>
      </div>
      <div class="col-4 mb-3" style="padding-right: 7px; padding-left: 7px;">
        <div class="latest-photo-div">
          <img src="{{ asset('frontend/cuimages/15.jpg') }}" alt="Latest Photos" class="img-fluid latest-photo"
            style="width: 100%">
        </div>
      </div>
      <div class="col-4 mb-3" style="padding-right: 7px; padding-left: 7px;">
        <div class="latest-photo-div">
          <img src="{{ asset('frontend/cuimages/19.jpg') }}" alt="Latest Photos" class="img-fluid latest-photo"
            style="width: 100%">
        </div>
      </div> --}}

    </div>
  </div>
  {{-- <img src="{{ asset('frontend/images/faculty/science//Frame75.png') }}" width="100%" alt=""> --}}
</section>
@endif