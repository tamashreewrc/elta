@extends('frontend.layout.page_layout')
@section('content')
	<div class="nav-ban-box">
		<!-- Starts Nav -->
		@include('frontend/partial/navbar')
		<!-- Ends Nav -->
		<!-- Starts  Bootstrap-touch-slider Slider -->

		<div style="background-image: url(storage/frontend/images/contact-banner.jpg);" class="all-iner-banner">
			<div class="image-overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<span class="page-title">Contact Us</span>
						<div class="breadcumb">
							<ul>
								<li><a href="{{ url('/') }}/home">Home</a></li>
								<li>Contact Us</li>
							</ul>
						</div>
					</div>		
				</div>		
			</div>
		</div>

		
		<!-- End  Bootstrap-touch-slider Slider -->
	</div>

	<!-- Starts about Section -->

	<section class="about-area contact-area">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="ab-heading">
						<h3>{{$contact_data['title']}}</h3>
					</div>
					<div class="all-content">				
						{!! $contact_data['description'] !!}
					</div>
				</div>	
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="media-box">
						<div class="row">
							<div class="col-md-3 col-sm-6 col-xs-6">
								<div class="address-tile">
									<div class="left-icon">
										<i class="fa fa-location-arrow"></i>
									</div>
									<div class="office-body">
										<h4>Our Office Location</h4>
										<p>{{$setting_data['company_loaction']}}</p>
									</div>
								</div>
							</div>
							<div class="col-md-3 col-sm-6 col-xs-6">
								<div class="address-tile">
									<div class="left-icon">
										<i class="fa fa-phone"></i>
									</div>
									<div class="office-body">
										<h4>Contact Number</h4>
										<p>{{$setting_data['primary_contact']}}</p>
										<p>{{$setting_data['secondary_contact']}}</p>
									</div>
								</div>
							</div>
							<div class="col-md-3 col-sm-6 col-xs-6">
								<div class="address-tile">
									<div class="left-icon">
										<i class="fa fa-envelope"></i>
									</div>
									<div class="office-body">
										<h4>Email Address</h4>
										<p>{{$setting_data['admin_email']}}</p>
									</div>
								</div>
							</div>
							<div class="col-md-3 col-sm-6 col-xs-6">
								<div class="address-tile">
									<div class="left-icon">
										<i class="fa fa-skype"></i>
									</div>
									<div class="office-body">
										<h4>Make a Video Call</h4>
										<p>{{$setting_data['skype_id']}}</p>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="contact-form">
						<form method="POST" action="javascript:void(0)" name="contact_user_form" id="contact_user_form">
							<div class="form-group">
								<input type="text" placeholder="Name" name="contact_user_name" id="contact_user_name" class="form-control">
							</div>
							<div class="form-group">
								<input type="text" placeholder="Email" name="contact_user_email" id="contact_user_email" class="form-control">
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" placeholder="Phone" name="contact_user_phone" id="contact_user_phone" class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" placeholder="Subject" name="contact_user_subject" id="contact_user_subject" class="form-control">
									</div>
								</div>
							</div>
							<textarea placeholder="Write Your Message" aria-invalid="false" aria-required="true" class="form-control" rows="10" cols="40" name="contact_user_message" id="contact_user_message"></textarea>
							<button placeholder="Write Your Message" id="contact_user_submit" class="btn btn-primary" type="submit">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Ends about Section -->






	
@endsection
