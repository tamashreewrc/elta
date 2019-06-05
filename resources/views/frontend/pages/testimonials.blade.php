@extends('frontend.layout.page_layout')
@section('content')
	<div class="nav-ban-box">
		<!-- Starts Nav -->
		@include('frontend/partial/navbar')
		<!-- Ends Nav -->
		<!-- Starts  Bootstrap-touch-slider Slider -->

		<div style="background-image: url(storage/frontend/images/about-banner.jpg);" class="all-iner-banner">
			<div class="image-overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<span class="page-title">Testimonials</span>
						<div class="breadcumb">
							<ul>
								<li><a href="{{ url('/') }}/home">Home</a></li>
								<li>Testimonials</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- End  Bootstrap-touch-slider Slider -->
	</div>



	<!-- Starts testimonial Section -->

	<section class="about-area testimonial-area">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="ab-heading">
						<h3>Testimonials</h3>
					</div>
					<div class="all-content">
						<p>Our clients have created quite a buzz out here, See for yourself!.</p>
					</div>
				</div>
				@foreach($testimonial as $key => $value)
					<div class="col-md-4 col-sm-4 col-xs-12">
						<div class="testi-box">
							<div class="quote">
								<i class="fa fa-quote-right"></i>
							</div>
							<img src="{{ url('upload/testimonial/resize/'.$value['author_image'])}}" alt="">
							<span>{{$value['author_name']}}</span>
							<span class="title"><em>{{$value['designation']}}</em></span>
							<p>{{$value['description']}}</p>
						</div>
					</div>
				@endforeach


			</div>
		</div>
	</section>

	<!-- Ends testimonial Section -->
@endsection
