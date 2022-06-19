<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="Unify Admin Panel" />
        <meta name="keywords" content="Victorytosh Admin, Dashboard" />
        <meta name="author" content="Bootstrap Gallery" />
        <link rel="shortcut icon" href="{{ asset('backend/assets/img/favicon.ico') }}" />
        <title>@yield('title') || Victorytosh Admin </title>

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">


        <!-- Font-Awesome CSS -->
        <link rel="stylesheet" href="{{ asset('backend/assets/Font-Awesome/css/all.min.css') }}" />

        <!-- Common CSS -->
        <link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap.min.cs') }}s" />
        <link rel="stylesheet" href="{{ asset('backend/assets/fonts/icomoon/icomoon.css') }}" />
        <link rel="stylesheet" href="{{ asset('backend/assets/css/main.css') }}" />

        {{-- <!-- Data Tables -->
		<link rel="stylesheet" href="{{ asset('backend/assets/vendor/datatables/dataTables.bs4.css')}}" />
		<link rel="stylesheet" href="{{ asset('backend/assets/vendor/datatables/dataTables.bs4-custom.css')}}" /> --}}

        


        <!-- Other CSS includes plugins - Cleanedup unnecessary CSS -->
        <!-- Chartist CSS -->
        <link href="{{ asset('backend/assets/vendor/chartist/css/chartist.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('backend/assets/vendor/chartist/css/chartist-custom.css') }}" rel="stylesheet" />

        <!-- toaster -->
        <link href=" {{ asset('backend/assets/toaster/toastr.css') }}" rel="stylesheet" />
    </head>
    <body>

        <!-- Loading starts -->
        <div class="loading-wrapper">
            <div class="loading">
                <span></span>
            </div>
        </div>
        <!-- Loading ends -->

        <!-- BEGIN .app-wrap -->
        <div class="app-wrap">


            <!-- BEGIN .app-heading -->
            @include('admin.body.header')
            <!-- END: .app-heading -->



            <!-- BEGIN .app-container -->
            <div class="app-container">

                <!-- BEGIN .app-side -->
                @include('admin.body.sidebar')
                <!-- END: .app-side -->



                <!-- BEGIN .app-main -->
                @yield('admin')
                <!-- END: .app-main -->

            </div>
            <!-- END: .app-container -->


            <!-- BEGIN .main-footer -->
            @include('admin.body.footer')
            <!-- END: .main-footer -->
        </div>
        <!-- END: .app-wrap -->

        <!-- jQuery first, then Tether, then other JS. -->
        <script src="{{ asset('backend/assets/js/jquery.js') }}"></script>
        <script src="{{ asset('backend/assets/js/tether.min.js') }}"></script>
        <script src="{{ asset('backend/assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('backend/assets/vendor/unifyMenu/unifyMenu.js') }}"></script>
        <script src="{{ asset('backend/assets/vendor/onoffcanvas/onoffcanvas.js') }}"></script>
        <script src="{{ asset('backend/assets/js/moment.js') }}"></script>

        <!-- Peity JS -->
        <script src="{{ asset('backend/assets/vendor/peity/peity.min.js') }}"></script>
        <script src="{{ asset('backend/assets/vendor/peity/custom-peity.js') }}"></script>

        <!-- Circliful js -->
        <script src="{{ asset('backend/assets/vendor/circliful/circliful.min.js') }}"></script>
        <script src="{{ asset('backend/assets/vendor/circliful/circliful.custom.js') }}"></script>

        <!-- Chartist JS -->
        <script src="{{ asset('backend/assets/vendor/chartist/js/chartist.min.js') }}"></script>
        <script src="{{ asset('backend/assets/vendor/chartist/js/chartist-tooltip.js') }}"></script>
        <script src="{{ asset('backend/assets/vendor/chartist/js/custom/custom-area-chart2.js') }}"></script>
        <script src="{{ asset('backend/assets/vendor/chartist/js/custom/custom-compare-line.js') }}"></script>

        <!-- Slimscroll JS -->
        <script src="{{ asset('backend/assets/vendor/slimscroll/slimscroll.min.js') }}"></script>
        <script src="{{ asset('backend/assets/vendor/slimscroll/custom-scrollbar.js') }}"></script>

        {{-- <!-- Data Tables -->
		<script src="{{ asset('backend/assets/vendor/datatables/dataTables.min.js')}}"></script>
		<script src="{{ asset('backend/assets/vendor/datatables/dataTables.bootstrap.min.js')}}"></script>
		
		<!-- Custom Data tables -->
		<script src="{{ asset('backend/assets/vendor/datatables/custom/custom-datatables.js')}}"></script>
		<script src="{{ asset('backend/assets/vendor/datatables/custom/fixedHeader.js')}}"></script> --}}



        <!-- Common JS -->
        <script src="{{ asset('backend/assets/js/common.js') }}"></script>

        {{-- Font-Awesome --}}
        <script  type="text/javascript" src="{{ asset('backend/assets/Font-Awesome/js/conflict-detection.js') }}"></script>


        {{-- sweetalert2 --}}
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script type="text/javascript">
$(function () {
    $(document).on('click', '#delete', function (e) {
        e.preventDefault();
        var link = $(this).attr("href");


        Swal.fire({
            title: 'Are you sure?',
            text: "Delete This Data!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        )
            }
        })
    });
});

        </script>

        {{-- toaster --}}
        <script  type="text/javascript" src="{{ asset('backend/assets/toaster/toastr.min.js') }}"></script>

        <script>

@if (Session::has('message'))
var type = "{{ Session::get('alert-type','info') }}"
switch (type) {
    case 'info':
        toastr.info(" {{ Session::get('message') }} ");
        break;

    case 'success':
        toastr.success(" {{ Session::get('message') }} ");
        break;

    case 'warning':
        toastr.warning(" {{ Session::get('message') }} ");
        break;

    case 'error':
        toastr.error(" {{ Session::get('message') }} ");
        break;
}

@endif

        </script>

    </body>

</html>
