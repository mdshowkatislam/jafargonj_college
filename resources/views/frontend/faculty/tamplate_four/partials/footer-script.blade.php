<!-- ==== Jquery Link ==== -->
{{-- <script src="https://code.jquery.com/jquery-2.2.4.js"></script> --}}

<script src="{{ asset('butex/css/aos/dist/aos.js') }}"></script>
<script src="{{ asset('butex/css/js/bootstrap.bundle.min.js') }}"></script>
{{-- <script src="{{ asset('frontend/assets/owl_carousel/js/owl.carousel.js') }}"></script> --}}
<script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/progress-bar.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/imagesloaded.pkgd.min.js') }}"></script>

<!-- DataTables -->
{{-- <script src="{{ asset('backend/plugins/datatables/jquery.dataTables.js') }}"></script> --}}
<script src="{{ asset('butex/css/plugins/datatables/jquery.dataTables.js') }}"></script>
{{-- <script src="{{ asset('backend/plugins/datatables/dataTables.bootstrap4.js') }}"></script> --}}
<script src="{{ asset('butex/css/plugins/datatables/dataTables.bootstrap4.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
{{-- <script src="{{ asset('frontend/node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script> --}}
{{-- <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> --}}

@yield('script')

<script>
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        var height = $('#topbar').innerHeight();

        if (scroll >= 15) {
            // console.log('object');
            // $("header").addClass("fixed-top");
            $('#topbar').addClass('hide');
            $('#main-menu').removeClass('nav-bg');
            $('#main-menu').css('margin-top', '-' + height + 'px');

        } else {
            // $("header").removeClass("fixed-top");
            $('#topbar').removeClass('hide');
            $('#main-menu').addClass('nav-bg');
            $('#main-menu').css('margin-top', '-' + 0 + 'px');
        }
        // Show button after 100px
        var showAfter = 100;
        if ($(this).scrollTop() > showAfter) {
            $('.back-to-top').fadeIn();
        } else {
            $('.back-to-top').fadeOut();
        }
    });
</script>

<script>
    function stickyPaddingTop(id, paddingTopValue) {
        var element = document.getElementById(id);
        element.style.paddingTop = paddingTopValue + "px";

        var allElements = document.querySelectorAll(".rightSidebar .sticky-content");
        for (var i = 0; i < allElements.length; i++) {
            var currentElement = allElements[i];
            if (currentElement.id !== id) {
                currentElement.style.paddingTop = 0;
            }
        }
    }
</script>

<script>
    AOS.init();

    $('#dataTable').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": false,
        "info": true,
        "autoWidth": true,

    });
</script>
<script>
    $(document).ready(function() {

        $('#academicCarousel').owlCarousel({
            loop: true,
            margin: 10,
            // autoplay: true,
            responsiveClass: true,
            nav: true,
            navText: ["<div class='nav-btn prev-slide' style='top: 50% !important;'></div>",
                "<div class='nav-btn next-slide' style='top: 50% !important;'></div>"
            ],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 4
                }
            }
        });

        $('#admissionCarousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            autoplay: true,
            autoPlaySpeed: 5000,
            autoPlayTimeout: 5000,
            autoplayHoverPause: true,
            navText: ["<div class='nav-btn prev-slide' style='top: 135px !important;'></div>",
                "<div class='nav-btn next-slide' style='top: 135px !important;'></div>"
            ],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 4
                },
                1000: {
                    items: 4
                }
            }
        });

        $('#gallerySlider').owlCarousel({
            loop: true,
            // margin: 24,
            nav: true,
            navText: ["<div class='nav-btn prev-slide' style='top: 50% !important; transform: translateY(-50%);'></div>",
                "<div class='nav-btn next-slide' style='top: 50% !important; transform: translateY(-50%);'></div>"
            ],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 4
                },
                1000: {
                    items: 4
                }
            }
        });

        $('.researchCarousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            navText: ["<div class='nav-btn prev-slide'></div>",
                "<div class='nav-btn next-slide'></div>"
            ],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 3
                }
            }
        });

        $('#qouteCarousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            navText: ["<div class='nav-btn prev-slide'></div>",
                "<div class='nav-btn next-slide'></div>"
            ],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });

        $('#departmentCarousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });

        $('#vcHonorBoardCarousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            navText: ["<div class='nav-btn prev-slide' style='top: 50% !important;'></div>",
                "<div class='nav-btn next-slide' style='top: 50% !important;'></div>"
            ],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        });
    });
</script>
<script>
    //  Count Up
    function counter() {
        var oTop;
        if ($('.count').length !== 0) {
            oTop = $('.count').offset().top - window.innerHeight;
        }
        if ($(window).scrollTop() > oTop) {
            $('.count').each(function() {
                var $this = $(this),
                    countTo = $this.attr('data-count');
                $({
                    countNum: $this.text()
                }).animate({
                    countNum: countTo
                }, {
                    duration: 1000,
                    easing: 'swing',
                    step: function() {
                        $this.text(Math.floor(this.countNum));
                    },
                    complete: function() {
                        $this.text(this.countNum);
                    }
                });
            });
        }
    }
    $(window).on('scroll', function() {
        counter();
    });
</script>

@yield('script-bottom')
