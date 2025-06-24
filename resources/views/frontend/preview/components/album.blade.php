
<style>
    /* Project filter nav */
  .shuffle-btn-group {
    display: inline-block;
    margin: 20px 0 20px;
    width: 100%;
    border-bottom: 1px solid #0e9e9e;
  }

  .shuffle-btn-group label {
    display: inline-block;
    color: #212121;
    font-size: 14px;
    padding: 6px 25px;
    padding-top: 10px;
    font-weight: 700;
    text-transform: uppercase;
    transition: all 0.3s;
    cursor: pointer;
    margin: 0;
  }

  .shuffle-btn-group label.active {
    color: #ffffff;
    background: #00c5bf;
    border: 1px solid #00c5bf;
  }

  .shuffle-btn-group label input {
    display: none;
  }

  /* Project shuffle Item */
  .shuffle-item {
    padding: 0;
  }

  .shuffle-item .project-img-container {
    position: relative;
    overflow: hidden;
  }

  .shuffle-item .project-img-container img {
    transform: perspective(1px) scale3d(1.1, 1.1, 1);
    transition: all 400ms;
  }

  .shuffle-item .project-img-container:hover img {
    transform: perspective(1px) scale3d(1.15, 1.15, 1);
  }

  .shuffle-item .project-img-container:after {
    opacity: 0;
    position: absolute;
    content: "";
    top: 0;
    right: auto;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
    transition: all 400ms;
  }

  .shuffle-item .project-img-container:hover:after {
    opacity: 1;
  }

  .shuffle-item .project-img-container .gallery-popup .gallery-icon {
    position: absolute;
    top: 0;
    right: 0;
    z-index: 1;
    padding: 5px 12px;
    background: #0e9e9e;
    color: #fff;
    opacity: 0;
    transform: perspective(1px) scale3d(0, 0, 0);
    transition: all 400ms;
  }

  .shuffle-item .project-img-container:hover .gallery-popup .gallery-icon {
    opacity: 1;
    transform: perspective(1px) scale3d(1, 1, 1);
  }

  .shuffle-item .project-img-container .project-item-info {
    position: absolute;
    top: 50%;
    margin-top: -10%;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 0 30px;
    z-index: 1;
  }

  .shuffle-item .project-img-container .project-item-info-content {
    opacity: 0;
    transform: perspective(1px) translate3d(0, 15px, 0);
    transition: all 400ms;
  }

  .shuffle-item .project-img-container .project-item-info-content .project-item-title {
    font-size: 20px;
  }

  .shuffle-item .project-img-container .project-item-info-content .project-item-title a {
    color: #fff;
  }

  .shuffle-item .project-img-container .project-item-info-content .project-item-title a:hover {
    color: #0e9e9e;
  }

  .shuffle-item .project-img-container .project-item-info-content .project-cat {
    background: #0e9e9e;
    display: inline-block;
    padding: 2px 8px;
    font-weight: 700;
    color: #000;
    font-size: 10px;
    text-transform: uppercase;
  }

  .shuffle-item .project-img-container:hover .project-item-info-content {
    opacity: 1;
    transform: perspective(1px) translate3d(0, 0, 0);
  }

  .album-image{
    width: 360px;
    height: 220px;
  }
  
  .image-gallery img:hover {
      opacity: 0.7;
  }
</style>

<div class="container">
    <div class="d-flex justify-content-between align-items-end">
        <h1 class="text-uppercase mb-0 home-content-heading custom-font-titillium-web">
            PHOTO GALLERY
        </h1>
        <a href="{{ route('album', ['ref'=>$page_tab_id, 'id'=>$ref_id]) }}" class="my-auto home-content-heading custom-font-titillium-web">All</a>
    </div>
    <div class="position-relative w-100 common-bg-color mt-1 custom-font-titillium-web" style="height: 4px;"></div>

    <div class="row">
      <div class="col-12">
        <div class="shuffle-btn-group">
          <label class="active" for="all" style="border: 1px solid #00C5BF;">
            <input type="radio" name="shuffle-filter" id="all" value="all" checked="checked">All
          </label>

          @foreach ($galleryCategory as $item)
              <label for="data{{ $item->id }}" style="border: 1px solid #00C5BF;">
                  <input type="radio" name="shuffle-filter" id="data{{ $item->id }}" value="data{{ $item->id }}">{{ $item->name }}
              </label>
          @endforeach

        </div><!-- project filter end -->
      </div>
    </div>

      <div class="container">
        <div class="row shuffle-wrapper">
          {{-- <div class="col-1 shuffle-sizer"></div> --}}
          @forelse ($galleryCategory as $item)
          @php $galleries = \App\Models\Gallery::where('gallery_category_id', $item->id) ->where('status', 1)->where('is_featured', 1)->orderBy('id', 'desc')->take(9)->get(); @endphp
              @foreach ($galleries as $item)
                  <div class="col-xl-4 col-lg-4 col-md-6 shuffle-item mb-3" data-groups="[&quot;data{{ $item->gallery_category_id }}&quot;]">
                      <div class="image-gallery">
                        <img class="album-image img-popup" src="{{ asset('upload/gallery_images/' . @$item->image) }}" style="cursor: pointer;" alt="project-img">
                              {{-- <span class="gallery-icon" src="{{ asset('upload/gallery_images/' . @$item->image) }}"><i class="fa fa-plus"></i></span> --}}
                      </div>
                  </div><!-- shuffle item 1 end -->
              @endforeach
          @empty
              <div class="col-md-12">
                  <h2 class="fs-5 p-3 mt-3  mb-0 bg-light rounded">There are no activities at the moment..</h2>
              </div>
          @endforelse
        </div><!-- shuffle end -->
      </div>
</div>

<script>
    // JavaScript to handle the image click and show the modal
    $(document).ready(function() {
        $('.img-popup').on('click', function() {
            var src = $(this).attr('src'); // Get the image source
            $('#modalImage').attr('src', src); // Set it to the modal image
            $('#imageModalX').modal('show'); // Show the modal
        });
    });
</script>

<script src="{{ asset('js/shuffle.min.js') }}"></script>
<script>
    	// Shuffle js filter and masonry
		function projectShuffle() {
			if ($('.shuffle-wrapper').length !== 0) {
				var Shuffle = window.Shuffle;
				var myShuffle = new Shuffle(document.querySelector('.shuffle-wrapper'), {
					itemSelector: '.shuffle-item',
					sizer: '.shuffle-sizer',
					buffer: 1
				});
				$('input[name="shuffle-filter"]').on('change', function (evt) {
					var input = evt.currentTarget;
					if (input.checked) {
						myShuffle.filter(input.value);
					}
				});
				$('.shuffle-btn-group label').on('click', function () {
					$('.shuffle-btn-group label').removeClass('active');
					$(this).addClass('active');
				});
			}
		}
		projectShuffle();
</script>
