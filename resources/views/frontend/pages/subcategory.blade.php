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
						<span class="page-title">{{$subcategory['service_category_name']}}</span>
						<div class="breadcumb">
							<ul>
								<li><a href="{{ url('/') }}/home">Home</a></li>
								<li>{{$subcategory['service_category_name']}}</li>
							</ul>
						</div>
					</div>		
				</div>		
			</div>
		</div>
		
		<!-- End  Bootstrap-touch-slider Slider -->
	</div>

		<!-- Starts Featured Services Gallery -->


    <div class="featured-services">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="our-panel">
						<h2>{{$subcategory['service_category_name']}}</h2>
						<div class="middle">
							<a href=""><img src="{{ url('storage/frontend/images/pen.png') }}" alt="onliine-learning-title-img"></a>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="all-category">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-12">
								<div class="services-tile">
									<img src="{{ url('upload/service_category_icon/resize/'.$subcategory['service_category_icon'])}}" class="img-responsive" alt="">
								</div>
							</div>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<div class="right-box">
									<div class="ab-heading">
										<h3>{{$subcategory['service_category_name']}}</h3>
									</div>

									{!!$subcategory['service_category_description']!!}
									
									<a data-toggle="modal" data-target="#all-category-modal" href=""><img src="{{ url('storage/frontend/images/like.png') }}" alt="like">I'm Interested</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Ends Featured Services Gallery -->

	<!-- Modal -->
		<div class="modal fade" id="all-category-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Register Form</h4>
					</div>
					<div class="modal-body">
						<form method="POST" action="javascript:void(0)" name="subcategory_contact_form" id="subcategory_contact_form">
							<div class="form-group">
								<label>Name <span>*</span></label>
								<input type="text" class="form-control" name="contact_name" id="contact_name" placeholder="Name">
							</div>
							<div class="form-group">
							    <label>Email Id <span>*</span></label>
							    <input type="text" class="form-control" name="contact_email" id="contact_email" placeholder="Email Id">
							</div>
							<div class="form-group">
								<label>Phone Number <span>*</span></label>
								<input type="text" class="form-control" name="contact_no" id="contact_no" placeholder="Phone Number">
							</div>
							<div class="form-group">
								<label>I am interested in:</label>
							</div>
							
							<div id="myRadioGroup">
							<div class="checkbox">
								<label><input type="radio" name="service_cat" id="service_cat_1" checked="checked" value="teaching"  />Teaching</label>
								<label><input type="radio" name="service_cat" id="service_cat_2" value="hiring" />Hiring ELTA’s services</label>
							</div>
							<!-- <div id="interested_inteaching" class="desc">
							</div> -->
							<div id="service_cathiring" class="desccat" style="display: none;">
								<div id="delivery">
									<div class="form-group">
										<label>Individual Name</label>
										<input type="text" class="form-control" name="individual" id="individual" placeholder="Individual Name">
									</div>
									<div class="form-group">
										<label>Corporate Organization</label>
										<input type="text" class="form-control" name="corporate" id="corporate" placeholder="Corporate Organization">
									</div>
									<div class="form-group">
										<label>Institute/Academy</label>
										<input type="text" class="form-control" name="institute" id="institute" placeholder="Institute/Academy">
									</div>
								</div>
							</div>
						</div>
							<div class="form-group">
								<label>Write Your Message</label>
								<textarea placeholder="Write Your Message" aria-invalid="false" aria-required="true" class="form-control" rows="5" cols="40" name="message" id="message"></textarea>
							</div>
							<input type="hidden" class="form-control" name="subcategory" id="subcategory" value="{{$subcategory['id']}}">
							<button type="submit" id="subcategory_contact_submit" class="btn btn-primary">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- Modal -->
	
@endsection





