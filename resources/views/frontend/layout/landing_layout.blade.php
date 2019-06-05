<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>ELTA ::English Language Training Academy ::</title>

	<!-- Favicon -->
	<link rel="shortcut icon" href="{{ url('storage/frontend/images/favicon.ico') }}" type="image/x-icon">
	<link rel="icon" href="{{ url('storage/frontend/images/favicon.ico') }}" type="image/x-icon">

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">

	<!-- FontAwesome -->
	{!! Html::style('storage/frontend/css/font-awesome.min.css') !!}
	<!-- Bootstrap -->
	{!! Html::style('storage/frontend/css/bootstrap.min.css') !!}
	{!! Html::style('storage/frontend/css/style.css') !!}
	{!! Html::style('storage/frontend/css/owl.carousel.min.css') !!}
	{!! Html::style('storage/frontend/css/fullmod.min.css') !!}
	{!! Html::style('storage/frontend/css/responsive.css') !!}

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>

	<div id="home-template">
		<div class="full-blue " id="home-page">
			@yield('content')
		</div>
	</div>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	{!! Html::script('storage/frontend/js/bootstrap.min.js') !!}
	{!! Html::script('storage/frontend/js/owl.carousel.min.js') !!}
	{!! Html::script('storage/frontend/js/fullmod.min.js') !!}

	<script>
		var myFullMod_e = $('#myFullMod_e').fullmod();

		function showModal_e() {
			myFullMod_e.show();
		}
	</script>

	<script>
		var myFullMod_l = $('#myFullMod_l').fullmod();

		function showModal_l() {
			myFullMod_l.show();
		}
	</script>

	<script>
		var myFullMod_t = $('#myFullMod_t').fullmod();

		function showModal_t() {
			myFullMod_t.show();
		}
	</script>

	<script>
		var myFullMod_a = $('#myFullMod_a').fullmod();

		function showModal_a() {
			myFullMod_a.show();
		}
	</script>


	<!-- STARTS SCROLL TO TOP -->
	<script>
		$(document).ready(function () {

			$(window).scroll(function () {
				if ($(this).scrollTop() > 100) {
					$('.scrollup').fadeIn();
				} else {
					$('.scrollup').fadeOut();
				}
			});

			$('.scrollup').click(function () {
				$("html, body").animate({
					scrollTop: 0
				}, 600);
				return false;
			});

		});
	</script>
</body>
</html>
