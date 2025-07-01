<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>
        @if(trim($__env->yieldContent('title')))
            @yield('title')
        @else
            Admin Panel
        @endif
    </title>
    <link rel="icon" href="{{ asset('images/logo/favicon.ico') }}" />
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backend/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/cms.css') }}">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- summernote -->
    {{-- <link rel="stylesheet" href="{{asset('backend/plugins/summernote/summernote-bs4.css')}}"> --}}
    <!-- select2 -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/select2/css/select2.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/toastr/toastr.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables/dataTables.bootstrap4.css') }}">
    <!-- Css for tree view -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/plugins/jstree/style.css') }}">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/daterangepicker/daterangepicker.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/boostrap-select/bootstrap-select.min.css') }}">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Sweet alert -->
    <script src="{{ asset('backend') }}/sweetalert/sweetalert.js"></script>
    <link href="{{ asset('backend') }}/sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />
    <!-- Switchery -->
    {{--
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css"> --}}
    <link href="{{ asset('lou-multi-select/css/multi-select.css') }}" media="screen" rel="stylesheet"
        type="text/css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <style type="text/css">
        .nav-tabs .nav-item {
            margin-bottom: 0px;
        }

        input[type="file"] {
            padding: 0.175rem 0.75rem;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #17a2b8 !important;
            border-color: #17a2b8 !important;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            color: #000 !important;
        }

        .bg-gradient-success {
            background: #17a2b8 !important;
            border-color: #17a2b8 !important;
        }

        table :where(thead th) {
            vertical-align: middle !important;
        }
    </style>
    
    <style>
        .select2-container .select2-selection--single {
            height: 38px;
        }
    </style>

    <!-- jQuery -->
    <script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>

</head>
<style>
    .sidebar a {
    color: #fff;
    }
    .nav-treeview > .nav-item > .nav-link {
        color: #e4dfdf !important;
    }    
    .nav-treeview > .nav-item > .nav-link.active, [class*="sidebar-light-"] .nav-treeview > .nav-item > .nav-link.active:hover {
        background-color: #f4f4f54d !important; 
    }
    .nav-treeview > .nav-item > .nav-link:hover {
        background-color: #f4f4f54d !important; 
    }
    .navbar-light .navbar-nav .nav-link
    {
        color: rgb(255, 255, 255);
    }
    .navbar-nav .show > .nav-link
    {
        color: rgb(255, 255, 255) !important;
    }
    [class*='sidebar-light-'] .sidebar a {
        color: #fff;
    }
</style>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: #b01220;">
            <!-- Left navbar links -->
            @include('backend.layouts.navbar')
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('backend.layouts.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer" style="font-size: 14px;">
            <strong>@lang('Copyright') &copy; {{ date('Y') }} <span
                    style="color:#17a2b8">@lang('Jafargonj Mir Abdul Gafur Degree College')</span></strong>
           
            <div class="float-right d-none d-sm-inline-block">
                <b>@lang('Developed by:') </b> <a target="_blank" href="http://www.nanoit.biz"> <span
                        style="color:#17a2b8;font-weight:bold">@lang('Nanosoft')</span></a>
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- Bootstrap -->
    <script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

    <!-- DataTables -->
    <script src="{{ asset('backend/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables/dataTables.bootstrap4.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('backend/js/adminlte.js') }}"></script>
    <!-- Jquery validation -->
    <!-- <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.js"></script> -->

    <script src="{{ asset('backend/js/validate.min.js') }}"></script>
    <script src="{{ asset('backend/js/additional-methods.js') }}"></script>
    <!-- Handle bar -->
    <script src="{{ asset('backend/js/handlebars-v4.0.12.js') }}"></script>
    <!-- OPTIONAL SCRIPTS -->
    <script src="{{ asset('backend/js/demo.js') }}"></script>
    <script src="{{ asset('backend') }}/plugins/moment/moment.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('backend') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
    </script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="{{ asset('backend/plugins/boostrap-select/bootstrap-select.min.js') }}"></script>
    <!-- Summernote -->
    {{-- <script src="{{asset('backend/plugins/summernote/summernote-bs4.min.js')}}"></script> --}}
    <!-- select2 -->
    <script src="{{ asset('backend/plugins/select2/js/select2.min.js') }}"></script>

    <!-- Js for tree view -->
    <script src="{{ asset('backend/plugins/jstree/jstree.js') }}"></script>
    <!-- Validate js -->
    <script src="{{ asset('backend/js/validate.min.js') }}"></script>
    <script src="{{ asset('backend/js/additional-methods.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ asset('backend/plugins/toastr/toastr.min.js') }}"></script>
    <!-- Notifyjs -->
    <script src="{{ asset('backend/js/notify.js') }}"></script>
    <script src="{{ asset('backend/js/nestable.js') }}"></script>
    <script src="{{ asset('backend/ckeditor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('backend/ckeditor/ckfinder/ckfinder.js') }}"></script>


    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
    <!-- JSZip (for CSV export) and PDFMake (for PDF export) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.7.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>

    <!-- Buttons for CSV, Excel, PDF, and Print -->
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script>

    @stack('scripts')

    <script type="text/javascript">
        $(function() {
            var ck = CKEDITOR.replaceAll('textarea');
            CKFinder.setupCKEditor(ck, '/ckfinder/');
        })
    </script>
    <script type="text/javascript">
        $(function() {
            CKEDITOR.editorConfig = function(config) {
                config.toolbarGroups = [{
                        name: 'document',
                        groups: ['mode', 'document', 'doctools']
                    },
                    {
                        name: 'clipboard',
                        groups: ['clipboard', 'undo']
                    },
                    {
                        name: 'editing',
                        groups: ['find', 'selection', 'spellchecker', 'editing']
                    },
                    {
                        name: 'forms',
                        groups: ['forms']
                    },
                    '/',
                    {
                        name: 'basicstyles',
                        groups: ['basicstyles', 'cleanup']
                    },
                    {
                        name: 'paragraph',
                        groups: ['list', 'indent', 'blocks', 'align', 'bidi', 'paragraph']
                    },
                    {
                        name: 'links',
                        groups: ['links']
                    },
                    {
                        name: 'insert',
                        groups: ['insert']
                    },
                    '/',
                    {
                        name: 'styles',
                        groups: ['styles']
                    },
                    {
                        name: 'colors',
                        groups: ['colors']
                    },
                    {
                        name: 'tools',
                        groups: ['tools']
                    },
                    {
                        name: 'others',
                        groups: ['others']
                    },
                    {
                        name: 'about',
                        groups: ['about']
                    },
                  //  extraAllowedContent: 'img[*]'
                ];
            };
        })
    </script>
    <script src="{{ asset('lou-multi-select/js/jquery.multi-select.js') }}"></script>
    <script>
        $('.lou-multi-select').multiSelect({
            keepOrder: true
        });
    </script>
    <!--Switchery-->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>

    <script>
        let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
      elems.forEach(function(html) {
          let switchery = new Switchery(html,  { size: 'small' });
      });
    </script> --}}
    <!--End Switchery-->

    <script>
        $(document).ready(function() {
            $(document).on('click', '.js-switch', function() {
                let status = $(this).prop('checked') === true ? 1 : 0;
                let sliderId = $(this).data('id');
                //let sliderId = $(this).closest('td').data('id')
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('user.status.change') }}',
                    data: {
                        'status': status,
                        'id': sliderId
                    },
                    success: function(data) {
                        toastr.options.closeButton = true;
                        toastr.options.closeMethod = 'fadeOut';
                        toastr.options.closeDuration = 100;
                        toastr.success(data.success);
                    }
                });

            });
        });
    </script>


    <script>
        $(function() {
            $('.select2').select2();
            // $('.textarea').summernote({
            //    height: 150
            // });
            // Summernote
            // $('.textarea').summernote({
            //   toolbar: [
            //     // [groupName, [list of button]]
            //     ['style', ['bold', 'italic', 'underline', 'clear']],
            //     ['font', ['strikethrough', 'superscript', 'subscript','fontname']],
            //     ['fontsize', ['fontsize']],
            //     ['color', ['color']],
            //     ['para', ['ul', 'ol', 'paragraph']],
            //     ['height', ['height']]
            //     ]
            //   });
            //Toastr notification settings
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "3000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
        });

        $('#dataTable').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
        });

        // $(document).ready(function() {
        //     $('#example').DataTable({
        //         "paging": true,
        //         "lengthChange": true,
        //         "searching": true,
        //         "ordering": false,
        //         "info": true,
        //         "autoWidth": true,
        //         dom: 'Bfrtip',
        //         buttons: [
        //             'excel',   
        //             'pdf',     
        //         ]
        //     });
        // });

        $('#markeeTable').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": false,
            columns: [{ width: '10%' }, { width: '15%' }, { width: '20%' }, null, null]
        });

        $(".main-table").clone(true).appendTo('#table-scroll').addClass('clone');
    </script>

    <script>
        $(document).ready(function() {
            $(document).on('click', '#delete', function() {
                var actionTo = $(this).attr('data-route');
                var token = $(this).attr('data-token');
                var id = $(this).attr('data-id');
                swal({
                        title: "Are you sure?",
                        type: "success",
                        showCancelButton: true,
                        confirmButtonClass: 'btn-success',
                        confirmButtonText: 'Yes',
                        cancelButtonText: "No",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    },
                    function(isConfirm) {
                        if (isConfirm) {
                            $.ajax({
                                url: actionTo,
                                type: 'post',
                                data: {
                                    id: id,
                                    _token: token
                                },
                                success: function(data) {
                                    swal({
                                            title: "Deleted!",
                                            type: "success"
                                        },
                                        function(isConfirm) {
                                            if (isConfirm) {
                                                location.reload();
                                            }
                                        });
                                }
                            });
                        } else {
                            swal("Cancelled", "", "error");
                        }
                    });
                return false;
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $(document).on('click', '#approve', function() {
                var actionTo = $(this).attr('href');
                var token = $(this).attr('data-token');
                var id = $(this).attr('data-id');
                swal({
                        title: "Are you sure?",
                        type: "success",
                        showCancelButton: true,
                        confirmButtonClass: 'btn-success',
                        confirmButtonText: 'Yes',
                        cancelButtonText: "No",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    },
                    function(isConfirm) {
                        if (isConfirm) {
                            $.ajax({
                                url: actionTo,
                                type: 'post',
                                data: {
                                    id: id,
                                    _token: token
                                },
                                success: function(data) {
                                    swal({
                                            title: "Approved!",
                                            type: "success"
                                        },
                                        function(isConfirm) {
                                            if (isConfirm) {
                                                location.reload();
                                            }
                                        });
                                }
                            });
                        } else {
                            swal("Cancelled", "", "error");
                        }
                    });
                return false;
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $(document).on('click', '.statuschange', function() {
                var btnThis = $(this);
                var routeName = ($(this).data("route"));
                var id = ($(this).data("id"));
                var action = ($(this).data("action"));
                var tabName = $(this).data("tabname");
                var _token = $(this).data("token");
                if (action == '1') {
                    var status = 1;
                } else {
                    var status = 0;
                }
                //console.log(status);
                $.ajax({
                    url: routeName,
                    type: 'post',
                    data: {
                        'id': id,
                        'status': status,
                        'tablename': tabName,
                        '_token': _token
                    },
                    success: function(data) {
                        $('.notifyjs-corner').html('');
                        $('#toast-container').html('');
                        if (data.status == '1') {
                            // $.notify(data.message, {
                            //     globalPosition: 'top right',
                            //     className: 'success'
                            // });

                            toastr.success("", data.message);
                            $(btnThis).removeClass('btn-success').addClass('btn-danger');
                            $(btnThis).html(
                                '<i class="fa fa-ban" aria-hidden="true"></i> Inactive')
                            $(btnThis).attr('data-action', '0');
                            $(btnThis).data('action', '0');
                            $(btnThis).attr('title', 'Inactive');
                        } else {
                            // $.notify(data.message, {
                            //     globalPosition: 'top right',
                            //     className: 'error'
                            // });
                            toastr.error("", data.message);
                            $(btnThis).removeClass('btn-danger').addClass('btn-success');
                            $(btnThis).html(
                                '<i class="fa fa-check" aria-hidden="true"></i> Active')
                            $(btnThis).attr('data-action', '1');
                            $(btnThis).data('action', '1');
                            $(btnThis).attr('title', 'Active');
                        }
                        // $('#status' + id).val(status);
                        location.reload();
                    }
                });
            });
        });
    </script>

    <!-- Start Java Script for Date time Picker -->
    <script type="text/javascript">
        $(function() {
            $('.singledatepicker').daterangepicker({
                    singleDatePicker: true,
                    showDropdowns: true,
                    autoUpdateInput: false,
                    // drops: "up",
                    autoApply: true,
                    locale: {
                        format: 'DD-MM-YYYY',
                        daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                        firstDay: 0
                    },
                    minDate: '01/01/1930',
                },
                function(start) {
                    this.element.val(start.format('DD-MM-YYYY'));
                    this.element.parent().parent().removeClass('has-error');
                },
                function(chosen_date) {
                    this.element.val(chosen_date.format('DD-MM-YYYY'));
                });

            $('.singledatepicker').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('DD-MM-YYYY'));
            });
        });
    </script>
    <!-- End Java Script for Data time Picker -->

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="card-body" style="padding: 0;">
                    <div id="accordion" role="tablist">
                        <div class="card" style="margin-bottom: 0px !important;">

                            <div class="card-header" role="tab" id="headingHomeLink" style="padding: 0 0;">
                                <h5 class="mb-0">
                                    <a style="display: block;padding: .75rem 1.25rem;"
                                        class="collapsed plusminuscollapse" data-toggle="collapse"
                                        href="#collapseHomeLink" aria-expanded="false" aria-controls="collapseHomeLink">
                                        Home list link<i class="fa fa-plus plusminusbutton" style="float:right"></i>
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseHomeLink" class="collapse" role="tabpanel"
                                aria-labelledby="headingHomeLink" data-parent="#accordion">
                                <table class="table table-hover" style="margin-bottom: 0;">
                                    <tbody>
                                        @php
                                            $homelinks = App\Models\HomeLink::where('status', '1')->get();
                                        @endphp
                                        @foreach ($homelinks as $homelink)
                                            <tr>
                                                <td class="linkdata" data-url_type="1"
                                                    data-id="{{ $homelink->url_link }}"
                                                    style="cursor: pointer;background: #584200;color:white;font-weight: bold;">
                                                    {{ $homelink->name }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="card-header" role="tab" id="headingPostList" style="padding: 0 0;">
                                <h5 class="mb-0">
                                    <a style="display: block;padding: .75rem 1.25rem;"
                                        class="collapsed plusminuscollapse" data-toggle="collapse"
                                        href="#collapsePostList" aria-expanded="false"
                                        aria-controls="collapsePostList">
                                        Post List<i class="fa fa-plus plusminusbutton" style="float:right"></i>
                                    </a>
                                </h5>
                            </div>
                            <div id="collapsePostList" class="collapse" role="tabpanel"
                                aria-labelledby="headingPostList" data-parent="#accordion">
                                <table class="table table-hover" style="margin-bottom: 0;">
                                    <tbody>
                                        @php
                                            $pages = App\Models\Page::with('menu_type')
                                                ->where('status', '1')
                                                ->get();
                                        @endphp
                                        @foreach ($pages as $page)
                                            <tr>
                                                <td class="linkdata" data-url_type="2"
                                                    data-id="{{ str_slug($page->title, '-') }}"
                                                    data-pages_id="{{$page->id}}"
                                                    style="cursor: pointer;background: #584200;color:white;font-weight: bold;">
                                                    {{ $page->title }}
                                                    <span>({{ $page->menu_type->name }})</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="card-header" role="tab" id="headingExternalList" style="padding: 0 0;">
                                <h5 class="mb-0">
                                    <a style="display: block;padding: .75rem 1.25rem;"
                                        class="collapsed plusminuscollapse" data-toggle="collapse"
                                        href="#collapseExternalList" aria-expanded="false"
                                        aria-controls="collapseExternalList">
                                        Others List<i class="fa fa-plus plusminusbutton" style="float:right"></i>
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseExternalList" class="collapse" role="tabpanel"
                                aria-labelledby="headingExternalList" data-parent="#accordion">
                                <table class="table table-hover" style="margin-bottom: 0;">
                                    <tbody>
                                        <li
                                            style="background: #584200;color:white; padding: .75rem;vertical-align: top;border-top: 1px solid #dee2e6;list-style: none;font-weight: bold;">
                                            <label for="">External Link</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control external_link"
                                                    placeholder="External link">
                                                <input type="hidden" class="external_link_url_type"
                                                    name="external_link_url_type" value="3">
                                                <div class="input-group-append external_link_data">
                                                    <span class="input-group-text"
                                                        style="background: #2682f5;color: white; cursor: pointer;">Click</span>
                                                </div>
                                            </div>
                                        </li>

                                        <li
                                            style="background: #584200;color:white; padding: .75rem;vertical-align: top;border-top: 1px solid #dee2e6;list-style: none;font-weight: bold;">
                                            <label>PDF/Doc Link</label>
                                            <div class="input-group mb-3 filediv">
                                                <input type="text" class="file_open_input_field form-control"
                                                    name="file_open_input_field" placeholder="Choose image" readonly
                                                    style="cursor: pointer;">
                                                <input type="file" name="file" class="file_trigger"
                                                    accept="application/pdf" style="display: none;">
                                                <input type="hidden" name="fileurl" class="fileurl">
                                                <input type="hidden" class="file_url_type" name="file_url_type"
                                                    value="4">
                                                <div class="input-group-append pdf_link_data">
                                                    <span class="input-group-text"
                                                        style="background: #2682f5;color: white; cursor: pointer;">Click</span>
                                                </div>
                                            </div>
                                        </li>
                                    </tbody>
                                </table>
                            </div>
                            <li class="linkdata" data-url_type="5" data-id="#"
                                style="background: #2682f5;color: white;cursor: pointer;padding: .75rem;vertical-align: top;border-top: 1px solid #dee2e6;list-style: none;font-weight: bold;">
                                No Link</li>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(".linkdata").click(function() {
            var id = $(this).attr('data-id');
            var url_type = $(this).attr('data-url_type');
            var pages_id = $(this).attr('data-pages_id');
            $(".url_link").val(id);
            $(".url_link_type").val(url_type);
            $(".url_pages_id").val(pages_id);
            $('#myModal').modal('toggle');
        });
    </script>
    
    <script type="text/javascript">
        $(".external_link_data").click(function() {
            var id = $('.external_link').val();
            var url_type = $('.external_link_url_type').val();
            if (validURL(id)) {
                $(".url_link").val(id);
                $(".url_link_type").val(url_type);
                $('#myModal').modal('toggle');
            } else {
                $('.notifyjs-corner').html('');
                $(function() {
                    $.notify("External Link URL is not correct", {
                        globalPosition: 'top right',
                        className: 'error'
                    });
                });
            }

        });
    </script>
    
    <script type="text/javascript">
        function validURL(str) {
            var pattern = new RegExp(
                '(?:(?:https?|ftp|file):\/\/|www\.|ftp\.)(?:\([-A-Z0-9+&@#\/%=~_|$?!:,.]*\)|[-A-Z0-9+&@#\/%=~_|$?!:,.])*(?:\([-A-Z0-9+&@#\/%=~_|$?!:,.]*\)|[A-Z0-9+&@#\/%=~_|$])',
                'i');
            return !!pattern.test(str);
        }
    </script>

<script type="text/javascript">
    $('.file_open_input_field').click(function(){
      $(this).parents('.filediv').find('.file_trigger').trigger('click');
    });
</script>
<script type="text/javascript">
    $(document).on('change','.file_trigger',function(e){
      var btnThis = $(this);
      var img = e.target.files[0];
      var filename = $(btnThis).val().split("\\").pop();
      if(img){
       var reader = new FileReader();
       reader.readAsDataURL(img);
       reader.onloadend = function() {
         var base64data = reader.result;
         $(btnThis).parents('.filediv').find('.file_open_input_field').val(filename);
         $('.fileurl').attr('value',base64data);
       }
     }else{
      $(btnThis).parents('.filediv').find('.file_open_input_field').val('');
      $('.fileurl').attr('value','');
    }
  });
</script>
  
<script type="text/javascript">
    $( ".pdf_link_data" ).click(function() {
      var file_open_input_field=$('.file_open_input_field').val();
      var fileurl=$('.fileurl').val();
      var file_url_type=$('.file_url_type').val();
      $(".url_link").val(file_open_input_field);
      $(".url_link_file").val(fileurl);
      $(".url_link_type").val(file_url_type);
      $('#myModal').modal('toggle');
    });
</script>
  
    @yield('script')
    @include('backend.layouts.notification')

</body>

</html>
