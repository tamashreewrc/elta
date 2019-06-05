@extends('frontend.layout.page_layout')
@section('content')
   <div class="nav-ban-box">
		<!-- Starts Nav -->
	    @include('frontend/partial/navbar') 
		<!-- Ends Nav -->
		<!-- Starts  Bootstrap-touch-slider Slider -->

        <div style="background-image: url({{asset('storage/frontend/images/about-banner.jpg')}});" class="all-iner-banner">
			<div class="image-overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<span class="page-title">Service Category</span>
						<div class="breadcumb">
							<ul>
								<li><a href="{{ url('/') }}/home">Home</a></li>
								<li><a href="{{ url('/') }}/services">Services</a></li>
								<li>{{$main_category['service_category_name']}}</li>
							</ul>
						</div>
					</div>		
				</div>		
			</div>
		</div>
		
		<!-- End  Bootstrap-touch-slider Slider -->
	</div>

	<!-- Starts Featured Services Gallery -->

	<div class="featured-services inner">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="our-panel">
						<h2>Service Programs</h2>
						<div class="middle">
							<a href=""><img src="{{ url('storage/frontend/images/pen.png') }}" alt="onliine-learning-title-img"></a>
						</div>
					</div>
					<div class="col-md-12">
						<div class="programs sub">
							
							<img src="{{ url('upload/service_category_icon/original/'.$main_category['service_category_icon'])}}" alt="{{$main_category['service_category_name']}}">
							<!-- <h2>Programs</h2> -->
							<div class="row">
								<div class="col-md-12">
									@foreach($subcategory as $key => $value)
										<div class="col-md-3 col-sm-3 col-xs-6">
											<div class="services-tile categ">
												<a href="{{ url('/') }}/services/subcategory/{{$value['id']}}">
													<img src="{{ url('upload/service_category_icon/resize/'.$value['service_category_icon'])}}" alt="{{$value['service_category_name']}}">
													<h4>{{$value['service_category_name']}}</h4>
												</a>
											</div>
										</div>
									@endforeach	                                   
								</div>
							</div>						  
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Ends Featured Services Gallery -->

	
@endsection
