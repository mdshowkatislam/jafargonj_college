    <!-- Gallery Slider -->
    <link rel="stylesheet" href="owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css">
    <style>
        .gallery-list {
            height: 200px; /* Set a fixed height for the container */
            overflow: hidden; /* Hide overflow to ensure consistent height */
        }
    
        .gallery-list img {
            width: 100%; /* Make the image fill the container width */
            height: 100%; /* Make the image fill the container height */
            object-fit: cover; /* Maintain the aspect ratio and cover the container */
        }
    </style>
    <section class="">
        <div style="background: rgba(0, 178, 255, 0.05);">
            <div class="container py-4">
                <div class="d-flex justify-content-between align-items-end">
                    <h1 class="text-uppercase mb-0 home-content-heading">
                        Gallery
                    </h1>
                    {{-- <a href="{{ route('gallery_list') }}" class="text-uppercase text-decoration-none fw-bold common-font-color">All</a> --}}
                </div>
                <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;">
                </div>
                <div class="row">
                    <div class="col-12">
                        @if (count($gallary_images)>0)
                        <div class="owl-carousel" id="gallerySlider">
                            @foreach ($gallary_images as $item)
                            <div class="mx-3 my-4 zoom_in_hover gallery-list">
                                <a href="#">
                                    <img class="img-fluid rounded" src="{{ asset('upload/gallery_images/'. @$item->image) }}" />
                                    {{--  <img class="img-fluid rounded" src="http://localhost/bup/upload/gallery_images/63b518a64608a.jpg" />  --}}
                                </a>
                            </div>
                            @endforeach
                        </div>
                        @else
                        <h2 class="fs-5 p-3 mt-3  mb-0 bg-light rounded">No image found !</h2>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="jquery.min.js"></script>
    <script src="owlcarousel/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".owl-carousel").owlCarousel();
        });
    </script>