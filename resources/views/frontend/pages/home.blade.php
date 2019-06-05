@extends('frontend.layout.page_layout')
@section('content')
<div class="nav-ban-box">
	<!-- Starts Nav -->
	@include('frontend/partial/navbar')
	<!-- Ends Nav -->
	<!-- Starts  Bootstrap-touch-slider Slider -->
	<div class="banner">
		<div id="bootstrap-touch-slider" class="carousel bs-slider fade  control-round indicators-line" data-ride="carousel" data-pause="hover" data-interval="false" >

			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#bootstrap-touch-slider" data-slide-to="0" class="active"></li>
				<li data-target="#bootstrap-touch-slider" data-slide-to="1"></li>
				<li data-target="#bootstrap-touch-slider" data-slide-to="2"></li>
			</ol>

			<!-- Wrapper For Slides -->
			<div class="carousel-inner" role="listbox">

				<!-- Each Slide -->
				@foreach($banner as $key => $value)
					<div class="item {{ ( ++$key == '1' ) ? 'active' : '' }}">
						<!-- Slide Background -->
						<img src="{{ url('upload/banners/original/'.$value['banner_image'])}}" alt="banner"  class="slide-image"/>
						<div class="bs-slider-overlay"></div>

						<div class="container">
							<div class="row">
								<!-- Slide Text Layer -->
								@if ($key == 1)
								<div class="slide-text slide_style_left">
								@elseif ($key == 2)
								<div class="slide-text slide_style_center">
								@else
								<div class="slide-text slide_style_right">
								@endif
									<h1 data-animation="animated {{ ( ++$key == '1' ) ? 'bounceInLeft' : 'zoomInRight' }}">
									{{$value['banner_title']}}
									</h1>
									<p data-animation="animated fadeInLeft">{{$value['banner_description']}}</p>
									<a href="{{ url('/') }}{{$value['banner_link']}}" class="btn btn-primary" data-animation="animated fadeInRight">Learn More</a>
								</div>
							</div>
						</div>
					</div>
				@endforeach
				<!-- End of Slide -->



			</div><!-- End of Wrapper For Slides -->

			<!-- Left Control -->
			<a class="left carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="prev">
				<span class="fa fa-angle-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>

			<!-- Right Control -->
			<a class="right carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="next">
				<span class="fa fa-angle-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>

		</div>
	</div>
	<!-- End  Bootstrap-touch-slider Slider -->
</div>

				<!-- Starts on category section -->

				<section class="top_section__block">
					<div class="container">
						<div class="row">
							<div class="col-md-4 col-sm-4 col-sm-12">
								<div class="single_top__block text-center">
									<div class="icon-box__block">
										<i class="fa fa-trophy color"></i>
									</div>
									<div class="single_text__block">

										<h2>{{$home['box_one_title']}}</h2>
										<p>{{$home['box_one_desc']}}</p>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-4 col-sm-12">
								<div class="single_top__block text-center">
									<div class="icon-box__block">
										<i class="fa fa-book color"></i>
									</div>
									<div class="single_text__block">

										<h2>{{$home['box_two_title']}}</h2>
										<p>{{$home['box_two_desc']}}</p>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-4 col-sm-12">
								<div class="single_top__block text-center">
									<div class="icon-box__block">
										<i class="fa fa-university color"></i>
									</div>
									<div class="single_text__block">

										<h2>{{$home['box_three_title']}}</h2>
										<p>{{$home['box_three_desc']}}</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>

				<!-- Ends on category section -->

				<!-- Starts about Section -->

				<section class="about-section">
					<div class="container">
						<div class="row animatedParent animateOnce">
							<div class="col-md-7">
								<div class="about-col animated fadeInLeftShort slow go">
								    {!!$home['company_desc']!!}
								</div>
							</div>
							<div class="col-md-5">
								<div class="about-img animated fadeInRightShort slow go">
									<img alt="" class="img-responsive" src="{{ url('upload/cms/home/original/'.$home['company_image']) }}">
								</div>
							</div>
						</div>
					</div>
				</section>

				<!-- Ends about Section -->

				<!-- Starts Video Sections -->


				<section>
					<div class="lgx-register" id="lgx-register">
						<div class="lgx-inner">
							<div class="container">
								<div class="row">
									<div class="col-md-7 col-sm-7 col-xs-12">
										<div class="lgx-registration-area">
											<div class="lgx-heading-registration">
											<h3 class="subtitle">{{$home['video_title']}}</h3>
											<h2 class="title">{{$home['video_text']}}</h2>
											</div>
											<div class="lgx-registration-info">
												<a href="" class="lgx-btn registration-btn">Registration</a>
											</div>
										</div>
									</div>
									<div class="col-md-5 col-sm-5 col-xs-12">
										<div class="lgx-video-area">
											<figure>
												<figcaption>
													<div class="video-icon">
														<div class="lgx-vertical">
															<span>Watch</span>
															<a data-target="#lgx-modal" data-toggle="modal" href="#" class="icon" id="myModalLabel">
																<i aria-hidden="true" class="fa fa-play "></i>
															</a>
															<span>Video</span>
														</div>
													</div>
												</figcaption>
											</figure>
											<!-- Modal-->
											<div class="modal fade lgx-modal" id="lgx-modal">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
															<h4 class="modal-title">Video Title</h4>
														</div>
														<div class="modal-body">

															<iframe style="border: 0 none;" width="100%" height="345" src="{{$home['video_link']}}">
															</iframe>

														</div>
													</div>
												</div>
											</div> <!-- //.Modal-->
										</div>
									</div>
								</div>
							</div><!-- //.CONTAINER -->
						</div><!-- //.INNER -->
					</div>
				</section>

				<!-- Ends Video Sections -->

				<!-- Starts Models Gallery -->

				<div class="gallery-section">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								
								<div class="our-panel">
									<h2>Gallery</h2>
									<div class="middle">
										<img src="{{ url('storage/frontend/images/pen.png') }}" alt="onliine-learning-title-img">
									</div>
								</div>
								<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
									@foreach($all_events as $key => $value)
									<li <?php if($value['id']==2){?> class="nav-item active" <?php } else {?>class="nav-item"<?php }?>>
										<a class="nav-link" id="event_{{$value['id']}}-tab" data-toggle="pill" href="#event_{{$value['id']}}" role="tab" aria-controls="event_{{$value['id']}}" aria-selected="false">{{$value['name']}}</a>
									</li>
									@endforeach
								</ul>

								<div class="tab-content" id="pills-tabContent">
									@foreach($all_events as $key => $value)
									<div <?php if($value['id']==2){?> class="tab-pane fade active" <?php } else {?>class="tab-pane fade"<?php }?> id="event_{{$value['id']}}" role="tabpanel" aria-labelledby="event_{{$value['id']}}-tab">
										@foreach($all_images as $key => $value2)
											@if ($value['id'] == $value2['event_id'])
												<div class="portfolio">
													 <!-- <a class="example-image-link" href="{{ url('upload/event/image/'.$value2['content'])}}" data-lightbox="example-set" data-title="Event Image"> -->
													 <a class="example-image-link" href="{{ url('upload/event/image/'.$value2['content'])}}" data-lightbox="example-set">	
													<img class="event_{{$value2['event_id']}}-img" src="{{ url('upload/event/image/'.$value2['content'])}}" alt=""></a><div class="desc"><!-- Event Image --></div>
												</div>
											@endif	
										@endforeach
									</div>
                                   @endforeach
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Ends Models Gallery -->

				<!-- Starts Featured Services Gallery -->

				<div class="featured-services">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="our-panel">
									<h2>Featured Services</h2>
									<div class="middle">
										<a href=""><img src="{{ url('storage/frontend/images/pen.png') }}" alt="onliine-learning-title-img"></a>
									</div>
								</div>
								@foreach($service_category as $key => $value)
									<div class="col-md-3 col-sm-3 col-xs-12">
										<a href="{{ url('/') }}/services/category/{{$value['id']}}">
											<div class="services-tile">
											<img class="img-responsive" src="{{ url('upload/service_category_icon/resize/'.$value['service_category_icon'])}}" alt="{{$value['service_category_name']}}">
										</div>
									</a>
									</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>

				<!-- Ends Featured Services Gallery -->

				<!-- Starts Flipped Classroom -->

				<div class="classrooms-box">
					<div class="container">
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="sction-title-wrapper">
									<h2>{!!$home['middle_section_title']!!}</h2>
									{!!$home['middle_section_content']!!}
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="master">
									<div class="master-bg"></div>
									<img class="img-responsive master" src="{{ url('upload/cms/home/original/'.$home['middle_section_image']) }}" alt="master">
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Ends Flipped Classroom -->

				<!-- Starts Our Team Sections -->

				<div class="our-team-box">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="our-panel">
									<h2>Team ELTA</h2>
									<div class="middle">
										<img alt="onliine-learning-title-img" src="{{ url('storage/frontend/images/pen.png') }}">
									</div>
								</div>
							</div>
								</div>
							<div class="team-carousel owl-carousel owl-theme">
								@foreach($teacher as $key => $value)
									<div class="item dtlms-instructor-item dtlms-column dtlms-one-column first type3  default">
									  <img title="Instructor Image" class="img-responsive" alt="Instructor Image" src="{{ url('upload/teachers_image/resize/'.$value['image'])}}">
										 <div class="dtlms-instructor-item-meta-data">
											<h4> <a rel="author" href=""> {{$value['name']}} </a></h4>
											<h5>{{$value['designation']}}</h5>
										 </div>
									</div>
								@endforeach
							</div>
					
					</div>
				</div>

				<!-- Ends Our Team Sections -->

				<!-- Starts Clientele Section -->

				<div class="clientele-panel" id="clients">
					<div class="clientele-inner">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<div class="our-panel">
										<h2>Clientele</h2>
										<div class="middle">
											<img alt="onliine-learning-title-img" src="{{ url('storage/frontend/images/pen.png') }}">
										</div>
									</div>
									<div class="clientele-box">
										<div class="clientele-carousel owl-carousel owl-theme">
											@foreach($client as $key => $value)
												<div class="item">
													<img src="{{ url('upload/client/resize/'.$value['image'])}}" alt="{{$value['name']}}">
												</div>
											@endforeach
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Ends Clientele Section -->

				<!-- Starts Programs Sections -->

				<div class="workshops-panel">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="our-panel">
									<h2>Featured Programs & Workshops</h2>
									<div class="middle">
										<img alt="onliine-learning-title-img" src="{{ url('storage/frontend/images/pen.png') }}">
									</div>
								</div>
								<div class="workshops-box">
									<div class="workshops-carousel owl-carousel owl-theme">
										@foreach($featured as $key => $value)
											<div class="item">
											  <a href="{{ url('/') }}/services/subcategory/{{$value['id']}}">
											   <img src="{{ url('upload/service_category_icon/original/'.$value['service_category_icon'])}}" alt="{{$value['service_category_name']}}">
											  </a>
											</div>
										@endforeach
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Ends Programs Sections -->

				<!-- Starts Testimonials sections -->

				<div class="testimonials-panel" id="testimonials">
					<div class="testimonials-inner">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<div class="fw-testimonial">
										<h2>client testimonials</h2>
										<div class="middle">
											<img alt="onliine-learning-title-img" src="{{ url('storage/frontend/images/pen.png') }}">
										</div>
									</div>
									<div class="testimonials-box">
										<div class="testimonials-carousel owl-carousel owl-theme">
											@foreach($testimonial as $key => $value)
												<div class="item">
													<div class="fw-testimonials-text">
														<p>{{$value['description']}}</p>
													</div>
													<div class="fw-testimonials-meta">
														<div class="fw-testimonials-avatar">
															<img alt=" Sarah Sylvester" src="{{ url('upload/testimonial/resize/'.$value['author_image'])}}">
														</div>
														<div class="fw-testimonials-author">
															<span class="author-name"> {{$value['author_name']}}</span>
															<span><em>{{$value['designation']}}</em></span>
														</div>
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

				<!-- Ends Testimonials sections -->
@endsection
