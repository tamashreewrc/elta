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
						<span class="page-title">Services</span>
						<div class="breadcumb">
							<ul>
								<li><a href="{{ url('/') }}/home">Home</a></li>
								<li>Services</li>
							</ul>
						</div>
					</div>		
				</div>		
			</div>
		</div>
		
		<!-- End  Bootstrap-touch-slider Slider -->
	</div>

		<!-- Starts Featured Services Gallery -->

	<div class="featured-services inner-service">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="our-panel">
						<h2>Featured Services</h2> 
						<div class="middle">
							<a href=""><img src="{{ url('storage/frontend/images/pen.png') }}" alt="onliine-learning-title-img"></a>
						</div>
					</div>
				     @foreach($service as $key => $value)
				       <div class="col-md-3 col-sm-3 col-xs-6">
						 <a href="services/category/{{$value['id']}}">
						 	<div class="services-tile">
						     <img class="img-responsive" src="{{ url('upload/service_category_icon/original/'.$value['service_category_icon'])}}" alt="{{$value['service_category_name']}}">
						    </div>
					     </a>
					   </div>
				     @endforeach
				</div>
			</div>
		</div>
	</div>

	<!-- Ends Featured Services Gallery -->
	
@endsection
