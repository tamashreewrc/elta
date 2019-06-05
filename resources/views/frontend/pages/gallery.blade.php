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
						<span class="page-title">Gallery</span>
						<div class="breadcumb">
							<ul>
								<li><a href="{{ url('/') }}/home">Home</a></li>
								<li>Gallery</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- End  Bootstrap-touch-slider Slider -->		
	</div>

	<!-- Starts gallery Section -->

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
				</div><br><br>


				<!-- Ends Models Gallery -->

	
@endsection
