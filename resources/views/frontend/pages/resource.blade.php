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
						<span class="page-title">Resources</span>
						<div class="breadcumb">
							<ul>
								<li><a href="{{ url('/') }}/home">Home</a></li>
								<li>Resources</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- End  Bootstrap-touch-slider Slider -->
	</div>



	<!-- Starts about Section -->

	<section class="about-area resources-area">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="ab-heading">
						<h3>{{$resource['title']}}</h3>
					</div>
					<div class="all-content">
						<!-- <p>The good life is one inspired by love and guided by knowledge.</p>
						<p>Bertrand Russell</p> -->
						{!!$resource['content']!!}
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="brochure-box">
						<div class="row">
							<!-- <div class="col-md-3">
								<img src="images/brochure.png" alt="brochure">
							</div>
							<div class="col-md-9">
								<h2>Learn English</h2>
								<p>A Fun Book of Functional language, Grammar, and Vocabulary is a complete package for learning English. It helps learners acquire English on their own.</p>
								<a href="">Read more</a>
							</div> -->
							{!!$resource['content_2']!!}
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="free-panel">
						<h2>Free downloads</h2>
						@foreach($resource_download as $key => $value)
							<div class="statement">
								<div class="row">
									<div class="col-md-6 col-sm-6 col-xs-6">
										<div class="lft">
											<h4>{{$value['title']}}</h4>
											<p>{{$value['subtitle']}}</p>
											<p>By {{$value['author']}}</p>
										</div>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<div class="lft pdf">
											<a target="_blank" href="{{ url('upload/resource_download/books/'.$value['book']) }}">Book (PDF)</a>
										</div>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<div class="lft pdf">
											<a target="_blank" href="{{ url('upload/resource_download/notes/'.$value['note']) }}">Notes (PDF)</a>
										</div>
									</div>
								</div>
							</div>
						@endforeach





					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Ends about Section -->
@endsection
