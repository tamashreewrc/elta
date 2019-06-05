@extends('frontend.layout.page_layout')
@section('content')
	<div class="nav-ban-box">
		<!-- Starts Nav -->
		@include('frontend/partial/navbar')
		<!-- Ends Nav -->
		<!-- Starts  Bootstrap-touch-slider Slider -->

		<div style="background-image: url(upload/cms/about_us/original/{{$about['banner']}});" class="all-iner-banner">
			<div class="image-overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<span class="page-title">About Us</span>
						<div class="breadcumb">
							<ul>
								<li><a href="{{ url('/') }}/home">Home</a></li>
								<li>About Us</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- End  Bootstrap-touch-slider Slider -->
	</div>



	<!-- Starts about Section -->

	<section class="about-area">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="ab-heading">
						<h3>{{$about['title']}}</h3> 
					</div>
					<div class="all-content">
						{!!$about['top_content']!!}
					</div>
				</div>
				@foreach($team_member as $key => $value)
					<div class="col-md-12">
						<div class="founder-box">
							<div class="row">
								<div class="col-md-3">
									<img src="{{ url('upload/team_members/resize/'.$value['image'])}}" alt="{{$value['name']}}">
								</div>
								<div class="col-md-9">
									{!!$value['description']!!}
									<p class="email"><i class="fa fa-envelope-o"></i><a href="mailto:{{$value['email']}}">{{$value['email']}}</a></p>
								</div>
							</div>
						</div>
					</div>
				@endforeach
				<div class="col-md-12">
					<div class="gap">
						<div class="ab-heading">
							<h3>The Team</h3>
						</div>
						{!!$about['bottom_content']!!}
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Ends about Section -->


	<!-- Starts Footer Section -->
@endsection
