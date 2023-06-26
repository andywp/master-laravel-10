<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="Ralaogi.com" />
	<meta name="robots" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="@yield('title') |  Rasalogi APP" />
	<meta property="og:title" content="@yield('title') |  Rasalogi APP" />
	<meta property="og:description" content="@yield('title') |  Rasalogi APP" />
	<meta property="og:image" content="{{  asset('images/logo.png') }}" />
	<meta name="format-detection" content="telephone=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- PAGE TITLE HERE -->
	<title> @yield('title')</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="{{asset('images/cropped-logo-32x32.png')}}" />

    <link href="{{asset('assets/vendor/sweetalert2/dist/sweetalert2.min.css')}}" rel="stylesheet">

    <link href="{{asset('assets/vendor/bootstrap4-toggle/css/bootstrap4-toggle.min.css')}}" rel="stylesheet">

    <link href="{{asset('assets/vendor/toastr/css/toastr.min.css')}}" rel="stylesheet">

    <!-- Daterange picker -->
    <link href="{{asset('assets/vendor/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
    <!-- Clockpicker -->
    <link href="{{asset('assets/vendor/clockpicker/css/bootstrap-clockpicker.min.css')}}" rel="stylesheet">
    <!-- asColorpicker -->
    <link href="{{asset('assets/vendor/jquery-asColorPicker/css/asColorPicker.min.css')}}" rel="stylesheet">
    <!-- Material color picker -->
    <link href="{{asset('assets/vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet">
    <!-- Pick date -->
    <link rel="stylesheet" href="{{asset('assets/vendor/pickadate/themes/default.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/pickadate/themes/default.date.css')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="{{asset('assets/vendor/select2/css/select2.min.css')}}" rel="stylesheet">
    <!-- Datatable -->
    <link href="{{asset('assets/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
	<link href="{{asset('assets/vendor/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet">

   


    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin_style.css?v=12')}}" rel="stylesheet">
	@yield('styles')
    <!-- <style>
        .header {
            background: #4d06a5;
        }
        [data-nav-headerbg="color_4"][data-theme-version="dark"] .nav-header .hamburger .line, [data-nav-headerbg="color_4"] .nav-header .hamburger .line{
            color:#fff !important;
        }
    </style> -->

    <script type="text/javascript">
        var BASE_URL = "{{ url('/') }}/";
        var SITE_URL = "{{ url('/') }}/";
    </script>
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
   <div id="preloader">
		<div class="lds-ripple">
			<div></div>
			<div></div>
		</div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
        @include('includes.header')

        @include('includes.sidebar')   

		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
             @yield('content')
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
		
		
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Sistem Informasi Desa © {{ date('Y') }} | Designed &amp; Developed by <a href="https://rasalogi.com/" target="_blank">Rasalogi</a> {{ date('Y') }}</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
	</div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    
    <form action="{{ route('admin.logout') }}" id="logout-form" method="post">@csrf</form>
    <script src="{{asset('assets/vendor/global/global.min.js')}}"></script>
    <script src="{{asset('assets/vendor/sweetalert2/dist/sweetalert2.min.js')}}"></script>
    <!-- Datatable -->
    <script src="{{asset('assets/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins-init/datatables.init.js?v=1')}}"></script>

     <!-- Daterangepicker -->
    <!-- momment js is must -->
    <script src="{{asset('assets/vendor/moment/moment.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <!-- clockpicker -->
    <script src="{{asset('assets/vendor/clockpicker/js/bootstrap-clockpicker.min.js')}}"></script>
    <!-- asColorPicker -->
    <script src="{{asset('assets/vendor/jquery-asColor/jquery-asColor.min.js')}}"></script>
    <script src="{{asset('assets/vendor/jquery-asGradient/jquery-asGradient.min.js')}}"></script>
    <script src="{{asset('assets/vendor/jquery-asColorPicker/js/jquery-asColorPicker.min.js')}}"></script>
    <!-- Material color picker -->
    <script src="{{asset('assets/vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>
    <!-- pickdate -->
    <script src="{{asset('assets/vendor/pickadate/picker.js')}}"></script>
    <script src="{{asset('assets/vendor/pickadate/picker.time.js')}}"></script>
    <script src="{{asset('assets/vendor/pickadate/picker.date.js')}}"></script>



    <!-- Daterangepicker -->
    <script src="{{asset('assets/js/plugins-init/bs-daterange-picker-init.js')}}"></script>
    <!-- Clockpicker init -->
    <script src="{{asset('assets/js/plugins-init/clock-picker-init.js')}}"></script>
    <!-- asColorPicker init -->
    <script src="{{asset('assets/js/plugins-init/jquery-asColorPicker.init.js')}}"></script>
    <!-- Material color picker init -->
    <!-- <script src="{{asset('assets/js/plugins-init/material-date-picker-init.js')}}"></script> -->
    <!-- Pickdate -->
    <script src="{{asset('assets/js/plugins-init/pickadate-init.js')}}"></script>

    <script src="{{asset('assets/vendor/bootstrap4-toggle/js/bootstrap4-toggle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/toastr/js/toastr.min.js')}}"></script>
    
    <script src="{{asset('assets/vendor/select2/js/select2.full.min.js')}}"></script>
	<script src="{{asset('assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>


    <script src="{{asset('assets/js/custom.min.js')}}"></script>
	<script src="{{asset('assets/js/dlabnav-init.js?v=1')}}"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>
    <script>
        (function () {
            'use strict'
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')
            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
                });

                //form-control
                $(".form-control.is-invalid" ).change(function() {
                    $(this).addClass('is-valid').removeClass('is-invalid');
                    $(this).next('div').remove();
                });


            })();
    </script>

	@yield('scripts')
    
</body>
</html>