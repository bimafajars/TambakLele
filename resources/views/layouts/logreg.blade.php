<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Tambak Lele</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{ asset('Atlantis/assets/img/logo1.ico') }}" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="{{ asset('Atlantis/assets/js/plugin/webfont/webfont.min.js') }}"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ["{{ asset('Atlantis/assets/css/fonts.min.css') }}"]},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{ asset('Atlantis/assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('Atlantis/assets/css/atlantis.min.css') }}">
	<link rel="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
	<link rel="stylesheet" href="{{ asset('Atlantis/assets/css/demo.css') }}">
</head>
<body style="color:gray;">
	<div class="wrapper">

			@yield('content')
	</div>
	<!--   Core JS Files   -->

	<script src="{{ asset('Atlantis/assets/js/core/jquery.3.2.1.min.js') }}"></script>
	<script src="{{ asset('Atlantis/assets/js/core/popper.min.js') }}"></script>
	<script src="{{ asset('Atlantis/assets/js/core/bootstrap.min.js') }}"></script>

	<!-- jQuery UI -->
	<script src="{{ asset('Atlantis/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('Atlantis/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

	<!-- jQuery Scrollbar -->
	<script src="{{ asset('Atlantis/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>


	<!-- Chart JS -->
	<script src="{{ asset('Atlantis/assets/js/plugin/chart.js/chart.min.js') }}"></script>

	<!-- jQuery Sparkline -->
	<script src="{{ asset('Atlantis/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

	<!-- Chart Circle -->
	<script src="{{ asset('Atlantis/assets/js/plugin/chart-circle/circles.min.js') }}"></script>

	<!-- Datatables -->
	<script src="{{ asset('Atlantis/assets/js/plugin/datatables/datatables.min.js') }}"></script>

	<!-- Bootstrap Notify -->
	<script src="{{ asset('Atlantis/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


	<!-- Atlantis JS -->
	<script src="{{ asset('Atlantis/assets/js/atlantis.min.js') }}"></script>

	<script src="{{ asset('Atlantis/assets/js/setting-demo.js') }}"></script>
	@yield('js')



</body>
</html>
