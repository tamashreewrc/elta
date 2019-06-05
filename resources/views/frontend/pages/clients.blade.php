@extends('frontend.layout.page_layout')
@section('content')
	<div class="nav-ban-box">
		<!-- Starts Nav -->
		@include('frontend/partial/navbar')
		<!-- Ends Nav -->
		<!-- Starts  Bootstrap-touch-slider Slider -->

		<div style="background-image: url(storage/frontend/images/clientele-banner.jpg);" class="all-iner-banner">
			<div class="image-overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<span class="page-title">Clientele</span>
						<div class="breadcumb">
							<ul>
								<li><a href="{{ url('/') }}/home">Home</a></li>
								<li>Clientele</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- End  Bootstrap-touch-slider Slider -->
	</div>



	<!-- Starts client Section -->

	<section class="about-area">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="ab-heading">
						<h3>Clientele</h3>
					</div>
					<div class="all-content">
						<p>Inside out. Through and through. When it comes to deliver a session/module and just not a training program, our core expertise help us truly understand what people really need from each program.</p>
						<p>But we're not the only ones who'll tell you that we know our stuff. Here are a few of our clients and we're blessed they never stop patting our back.</p>
					</div>
				</div>
				<div class="col-md-12">
					<div class="client-list-gallery">
						<ul>
							@foreach($client as $key => $value)
								<li>
									<a target="_blank" href="">
										<img alt="{{$value['name']}}" src="{{ url('upload/client/resize/'.$value['image'])}}" class="img-responsive">
									</a>
								</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Ends client Section -->
	@endsection
