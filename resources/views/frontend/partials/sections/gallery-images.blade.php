<style>
    /*! CSS Used from: /css/app.css */
    *,
    :after,
    :before {
        box-sizing: border-box;
    }

    a {
        color: #1d7099;
        text-decoration: none;
        background-color: transparent;
    }

    a:hover {
        color: #1d7099;
        text-decoration: underline;
    }

    @media print {

        *,
        :after,
        :before {
            text-shadow: none !important;
            box-shadow: none !important;
        }

        a:not(.btn) {
            text-decoration: underline;
        }
    }

    /*! CSS Used from: /css/styles1.css */
    marquee a {
        color: #fff !important;
        font-size: 13px;
        font-weight: 600;
    }

    /*! CSS Used from: /css/styles1_responsive.css */
    @media screen and (max-width:1023px) {
        a {
            font-size: 13px;
        }

        marquee {
            margin-top: 6px;
        }
    }

    a {
        background-color: transparent;
        -webkit-text-decoration-skip: objects;
    }

    a:active,
    a:hover {
        outline-width: 0;
    }

    .whats_new_icon {
        width: 999;
        background: #8AC53C;
        color: black;
        position: absolute;
        margin-top: -36.5px;
        z-index: 99;
        font-size: 13px;
        font-weight: 700;
        padding: 5.7px;
    }



    @media only screen and (max-width: 1026px) {
        .whats_new_icon {
            margin-top: -35.5px !important;
        }
    }

    .owl-carousel: {
        height: auto;
    }

    .owl-theme .owl-nav {
        margin-top: 0px !important;
    }

    .researchCarousel .owl-item {
        height: 34.5rem !important;
    }

    @media only screen and (max-width: 768px) {
        #marquee .whats_new_icon .update_text_news {
            display: none;
            width: 700;
        }
    }

    @media only screen and (min-width: 1399px) {
        #about-section {
            padding-bottom: 4rem;
        }
    }
</style>

<link rel="stylesheet" href="{{ asset('frontend/css/unite-gallery.css') }}" type="text/css" />
<script src="{{ asset('frontend/js/unitegallery.min.js') }}"></script>
<script src="{{ asset('frontend/js/ug-theme-tiles.js') }}"></script>

<!-- Gallery Images -->
<section class="my-5">
    <div class="container">
        <h1 class="text-uppercase mt-3 mb-0 home-content-heading">{{ $title }}</h1>
        <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;"></div>
    </div>
    <div class="container">
        @if (count($images) > 0)
            <div id="gallery" style="display:none;margin:20px 0;">
                @foreach ($images as $item)
                    <img alt="" src="{{ asset('upload/gallery_images/' . @$item->image) }}"
                        data-image="{{ asset('upload/gallery_images/' . @$item->image) }}"
                        data-description="image"
                        onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';"
                        style="display:none" class="shadow rounded">
                @endforeach
            </div>
        @else
            <h2 class="fs-5 p-3 mt-3  mb-0 bg-light rounded">No image found !</h2>
        @endif
    </div>
</section>
<script>
    jQuery(document).ready(function() {

        jQuery("#gallery").unitegallery({
            tiles_col_width: 230,
            tiles_space_between_cols: 20
        });

    });
</script>
