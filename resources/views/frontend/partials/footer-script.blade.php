

        <!-- jQuery Frameworks ============================================= -->
        <script src="{{ asset('frontend/assets/js/jquery-1.12.4.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/equal-height.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/jquery.appear.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/jquery.easing.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/modernizr.custom.13711.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/progress-bar.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/count-to.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/YTPlayer.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/loopcounter.js') }}"></script>

        <script src="{{ asset('frontend/assets/js/bootsnav.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/aos.js') }}"></script>

        <script src="{{ asset('frontend/assets/js/jquery.dataTables.min.js') }}"></script>

        <script src="{{ asset('frontend/assets/js/dataTables.bootstrap.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/moment.min.js') }}"></script>

        <script src="{{ asset('frontend/assets/js/jquery-ui.js') }}"></script>

        <script src="{{ asset('frontend/assets/js/script.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/du_home.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/custom.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

        @yield('script')
 
        <script>
            // $(document).ready( function () {
            //    $('#convocation_modal').modal('show');
            // } );

            // setTimeout(function(){
            //     $('#convocation_modal').modal('hide')
            // }, 10000);

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

@yield('script-bottom')
