<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>ELTA ::English Language Training Academy ::</title>

	<!-- Favicon -->
	<link rel="shortcut icon" href="{{ url('storage/frontend/images/favicon.ico') }}" type="image/x-icon">
	<link rel="icon" href="{{ url('storage/frontend/images/favicon.ico') }}" type="image/x-icon">

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">

	<!-- FontAwesome -->
	{!! Html::style('storage/frontend/css/font-awesome.min.css') !!}

	<!-- Bootstrap -->
	{!! Html::style('storage/frontend/css/bootstrap.min.css') !!}
	{!! Html::style('storage/frontend/css/style.css') !!}
	{!! Html::style('storage/frontend/css/bootstrap-touch-slider.css') !!}
	{!! Html::style('storage/frontend/css/animate.min.css') !!}
	{!! Html::style('storage/frontend/css/owl.carousel.min.css') !!}
	{!! Html::style('storage/frontend/css/responsive.css') !!}
	{!! Html::style('storage/frontend/css/lightbox.css') !!}
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>

	<!-- Starts on register-box -->

	<div class="register">
		<a href="" data-toggle="modal" data-target="#register-model">register</a>
	</div>

	<!-- Modal-->
	<div class="modal fade lgx-modal" id="register-model">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
					<h4 class="modal-title">Register Form</h4>
				</div>
				<div class="modal-body">
					<form method="POST" action="javascript:void(0)" name="subscription_contact_form" id="subscription_contact_form">
						<div class="form-group">
							<label>Name <span>*</span></label>
							<input type="text" class="form-control" name="subscription_name"  id="subscription_name" placeholder="Name">
						</div>
						<div class="form-group">
							<label>Email Id <span>*</span></label>
							<input type="text" class="form-control" name="subscription_email" id="subscription_email" placeholder="Email Id">
						</div>
						<div class="form-group">
							<label>Phone Number <span>*</span></label>
							<input type="text" class="form-control" name="subscription_phone" id="subscription_phone" placeholder="Phone Number">
						</div>
						<div class="form-group">
							<label>I am interested in:</label>
						</div>
						<!-- <div class="checkbox">
							<label>
								<input type="checkbox">Teaching
							</label>
							<label>
								<input id="checkbox" type="checkbox">Hiring ELTA’s services
							</label>
						</div> -->
						<div id="myRadioGroup">
							<div class="checkbox">
								<label><input type="radio" name="interested_in" id="subscription_teaching" checked="checked" value="teaching"  />Teaching</label>
								<label><input type="radio" name="interested_in" id="subscription_hiring" value="hiring" />Hiring ELTA’s services</label>
							</div>
							<!-- <div id="interested_inteaching" class="desc">
							</div> -->
							<div id="interested_inhiring" class="desc" style="display: none;">
								<div id="delivery">
									<div class="form-group">
										<label>Individual Name</label>
										<input type="text" class="form-control" name="subscription_individual" id="subscription_individual" placeholder="Individual Name">
									</div>
									<div class="form-group">
										<label>Corporate Organization</label>
										<input type="text" class="form-control" name="subscription_corporate" id="subscription_corporate" placeholder="Corporate Organization">
									</div>
									<div class="form-group">
										<label>Institute/Academy</label>
										<input type="text" class="form-control" name="subscription_institute" id="subscription_institute" placeholder="Institute/Academy">
									</div>
								</div>
							</div>
						</div>

						<button type="submit" id="subscription_submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div> <!-- //.Modal-->

	<!-- Ends on register-box -->

	@include('frontend/partial/header')
	@yield('content')

				<!-- Starts Footer Section -->
				@include('frontend/partial/footer')
				<!-- Ends Footer Section -->

					<a href="#" class="scrollup"><i class="fa fa-graduation-cap"></i></a>

					<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
					<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
					<!-- Include all compiled plugins (below), or include individual files as needed -->
					{!! Html::script('storage/frontend/js/bootstrap.min.js') !!}
					{!! Html::script('storage/frontend/js/owl.carousel.min.js') !!}
					{!! Html::script('storage/frontend/js/jquery.touchSwipe.min.js') !!}
					{!! Html::script('storage/frontend/js/bootstrap-touch-slider.js') !!}
					{!! Html::script('storage/frontend/js/lightbox.js') !!}

					<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
					<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
					<script type="text/javascript">
						$('#bootstrap-touch-slider').bsTouchSlider()
					</script>
					<!-- <script>
						$(function(){
							$('#bootstrap-touch-slider').carousel({
								interval: 5000
							});
						});
					</script> -->

					<!-- STARTS SCROLL TO TOP -->
					<script>
						$(document).ready(function () {

							$(window).scroll(function () {
								if ($(this).scrollTop() > 100) {
									$('.scrollup').fadeIn();
								} else {
									$('.scrollup').fadeOut();
								}
							});

							$('.scrollup').click(function () {
								$("html, body").animate({
									scrollTop: 0
								}, 600);
								return false;
							});

					

						});
					</script>

					<script>
						$('.workshops-carousel').owlCarousel({
							items: 6,
							loop: true,
							nav: true,
							autoplay: true,
							margin:0,
							navText: ["‹","›"],
							pagination:true,
							autoplayHoverPause: true,
							responsive:{
								0:{
									items:1
								},
								480 : {
									items:2
								},
								600:{
									items:3
								},
								1000:{
									items:5
								}
							}
						});
					</script>

					<script>
						$('.testimonials-carousel').owlCarousel({
							items: 1,
							loop: true,
							nav: true,
							autoplay: true,
							margin:0,
							navText: ["‹","›"],
							pagination:true,
							autoplayHoverPause: true,
							responsive:{
								0:{
									items:1
								},
								480 : {
									items:1
								},
								600:{
									items:1
								},
								1000:{
									items:1
								}
							}
						});
					</script>

					<script>
						$('.clientele-carousel').owlCarousel({
							items: 6,
							loop: true,
							nav: true,
							autoplay: true,
							margin:0,
							navText: ["‹","›"],
							pagination:true,
							autoplayHoverPause: true,
							responsive:{
								0:{
									items:1
								},
								480 : {
									items:2
								},
								600:{
									items:3
								},
								1000:{
									items:5
								}
							}
						});
					</script>

					<script>
							// Team of ELTA Carousel

							$('.team-carousel').owlCarousel({
								items: 5,
								loop: true,
								nav: true,
								autoplay: true,
								margin: 20,
								navText: ["‹","›"],
								pagination:true,
								autoplayHoverPause: true,
								responsive:{
									0:{
										items:1
									},
									480 : {
										items: 2
									},
									600:{
										items: 3
									},
									1000:{
										items: 5
									}
								}
							});
					</script>

					<script>
						// var checkbox = document.getElementById('checkbox');
						// var delivery_div = document.getElementById('delivery');
						// checkbox.onclick = function() {
						// 	console.log(this);
						// 	if(this.checked) {
						// 		delivery_div.style['display'] = 'block';
						// 	} else {
						// 		delivery_div.style['display'] = 'none';
						// 	}
						// };
						$(document).ready(function() {
							$("input[name$='interested_in']").click(function() {
								var test = $(this).val();

								$("div.desc").hide();
								$("#interested_in" + test).show();
							});
						});
						
						$(document).ready(function() {
							$("input[name$='service_cat']").click(function() {
								var test2 = $(this).val();

								$("div.desccat").hide();
								$("#service_cat" + test2).show();
							});
						});
						
						$(document).ready(function() {

					     $('#contact_no').keyup(function () {
                             this.value = this.value.replace(/[^0-9\+]/g,'');
                             });		


						 $("#subcategory_contact_submit").on('click', function (e) {
						 	 var valid = $('#subcategory_contact_form').valid();
						 	 if(valid) {
                               var contact_name = $('#contact_name').val();
                               var contact_email = $('#contact_email').val();
                               var contact_no = $('#contact_no').val();
                               var service_cat_1 = $('#service_cat_1').val();
                               var service_cat_2 = $('#service_cat_2').val();
                               var individual = $('#individual').val();
                               var corporate = $('#corporate').val();
                               var institute = $('#institute').val();
                               var message = $('#message').val();
                               var subcategory = $('#subcategory').val();

                                $.ajax({
                                   type: "POST",
                                   url: "{{ url('/') }}/subcategory/contact_us",
                				   data:{
                				   		contact_name :contact_name,
                				   		contact_email :contact_email,
                				   		contact_no:contact_no,
                				   		service_cat_1:service_cat_1,
                				   		service_cat_2:service_cat_2,
                				   		individual:individual,
                				   		corporate:corporate,
                				   		institute:institute,
                				   		message:message,
                				   		subcategory:subcategory,
                				   		_token:"{{csrf_token()}}"
                				   }, 
                                   success : function (resp){
                                   if(resp) {
                                     $.alert({
                                       title: 'Confirmation!',
                                       content: 'Your message has been sent successfully. We will contact you soon.',
                                       animation: 'scale',
                                       closeAnimation: 'scale',
                                       buttons: {
                                        Yes: {
                                           btnClass: 'btn-blue',
                                           action: function () {
                                              window.location.href = '{{ url('/') }}/home';
                                           }
                                        }
                                      }
                                   });
                                 }
                                }
                              });
                             }
						   });

						 $("#subcategory_contact_form").validate({
                            rules:{
                              contact_name: {
                              required: true
                            },
           
                          	contact_email: {
                              required: true,
                              email: true
                            },

                          	contact_no: {
                              required: true
                            },

                            individual: {
                              required: true
                            },

                            corporate: {
                              required: true
                            },

                            institute: {
                              required: true
                            },

                            message: {
                              required: true
                            }
                           },
            
                           messages:{
                           contact_name: {
                             required: "<font color='red'>Please enter your name.</font>"
                           },
           
                           contact_email: {
                            required: "<font color='red'>Please enter your email.</font>",
                            email:    "<font color='red'>Enter valid email id</font>"
                          },

                          contact_no: {
                            required: "<font color='red'>Please enter your phone no.</font>"
                          },

                          individual: {
                            required: "<font color='red'>Please enter your individual name.</font>"
                          },

                          corporate: {
                            required: "<font color='red'>Please enter your corporate name.</font>"
                          },

                          institute: {
                            required: "<font color='red'>Please enter your institute name.</font>"
                          },

                          message: {
                            required: "<font color='red'>Please enter your message.</font>"
                          }
                        }
                      });
				    });


                    $(document).ready(function() {

					     $('#subscription_phone').keyup(function () {
                             this.value = this.value.replace(/[^0-9\+]/g,'');
                             });		


						 $("#subscription_submit").on('click', function (e) {
						 	 var valid = $('#subscription_contact_form').valid();
						 	 if(valid) {
                               var subscription_name = $('#subscription_name').val();
                               var subscription_email = $('#subscription_email').val();
                               var subscription_phone = $('#subscription_phone').val();
                               var subscription_teaching = $('#subscription_teaching').val();
                               var subscription_hiring = $('#subscription_hiring').val();
                               var subscription_individual = $('#subscription_individual').val();
                               var subscription_corporate = $('#subscription_corporate').val();
                               var institute = $('#subscription_institute').val();

                                $.ajax({
                                   type: "POST",
                                   url: "{{ url('/') }}/subscription",
                				   data:{
                				   		subscription_name :subscription_name,
                				   		subscription_email :subscription_email,
                				   		subscription_phone:subscription_phone,
                				   		subscription_teaching:subscription_teaching,
                				   		subscription_hiring:subscription_hiring,
                				   		subscription_individual:subscription_individual,
                				   		subscription_corporate:subscription_corporate,
                				   		institute:institute,
                				   		_token:"{{csrf_token()}}"
                				   }, 
                                   success : function (resp){
                                   if(resp) {
                                     $.alert({
                                       title: 'Confirmation!',
                                       content: 'Your message has been sent successfully. We will contact you soon.',
                                       animation: 'scale',
                                       closeAnimation: 'scale',
                                       buttons: {
                                        Yes: {
                                           btnClass: 'btn-blue',
                                           action: function () {
                                              window.location.href = '{{ url('/') }}/home';
                                           }
                                        }
                                      }
                                   });
                                 }
                                }
                              });
                             }
						   });

						 $("#subscription_contact_form").validate({
                            rules:{
                              subscription_name: {
                              required: true
                            },
           
                          	subscription_email: {
                              required: true,
                              email: true
                            },

                          	subscription_phone: {
                              required: true
                            },

                            subscription_individual: {
                              required: true
                            },

                            subscription_corporate: {
                              required: true
                            },

                            subscription_institute: {
                              required: true
                            }
                           },
            
                           messages:{
                           subscription_name: {
                             required: "<font color='red'>Please enter your name.</font>"
                           },
           
                           subscription_email: {
                            required: "<font color='red'>Please enter your email.</font>",
                            email:    "<font color='red'>Enter valid email id</font>"
                          },

                          subscription_phone: {
                            required: "<font color='red'>Please enter your phone no.</font>"
                          },

                          subscription_individual: {
                            required: "<font color='red'>Please enter your individual name.</font>"
                          },

                          subscription_corporate: {
                            required: "<font color='red'>Please enter your corporate name.</font>"
                          },

                          subscription_institute: {
                            required: "<font color='red'>Please enter your institute name.</font>"
                          }
                        }
                      });
				    });

                    
                    $(document).ready(function() {

					     $('#contact_user_phone').keyup(function () {
                             this.value = this.value.replace(/[^0-9\+]/g,'');
                             });		


						 $("#contact_user_submit").on('click', function (e) {
						 	 var valid = $('#contact_user_form').valid();
						 	 if(valid) {
                               var contact_user_name = $('#contact_user_name').val();
                               var contact_user_email = $('#contact_user_email').val();
                               var contact_user_phone = $('#contact_user_phone').val();
                               var contact_user_subject = $('#contact_user_subject').val();
                               var contact_user_message = $('#contact_user_message').val();

                                $.ajax({
                                   type: "POST",
                                   url: "./contact_us",
                				   data:{
                				   		contact_user_name :contact_user_name,
                				   		contact_user_email :contact_user_email,
                				   		contact_user_phone:contact_user_phone,
                				   		contact_user_subject:contact_user_subject,
                				   		contact_user_message:contact_user_message,
                				   		_token:"{{csrf_token()}}"
                				   }, 
                                   success : function (resp){
                                   if(resp) {
                                     $.alert({
                                       title: 'Confirmation!',
                                       content: 'Your message has been sent successfully. We will contact you soon.',
                                       animation: 'scale',
                                       closeAnimation: 'scale',
                                       buttons: {
                                        Yes: {
                                           btnClass: 'btn-blue',
                                           action: function () {
                                              window.location.href = './home';
                                           }
                                        }
                                      }
                                   });
                                 }
                                }
                              });
                             }
						   });

						 $("#contact_user_form").validate({
                            rules:{
                              contact_user_name: {
                              required: true
                            },
           
                          	contact_user_email: {
                              required: true,
                              email: true
                            },

                          	contact_user_phone: {
                              required: true
                            },

                            contact_user_subject: {
                              required: true
                            },

                            contact_user_message: {
                              required: true
                            }
                           },
            
                           messages:{
                           contact_user_name: {
                             required: "<font color='red'>Please enter your name.</font>"
                           },
           
                           contact_user_email: {
                            required: "<font color='red'>Please enter your email.</font>",
                            email:    "<font color='red'>Enter valid email id</font>"
                          },

                          contact_user_phone: {
                            required: "<font color='red'>Please enter your phone no.</font>"
                          },

                          contact_user_subject: {
                            required: "<font color='red'>Please enter your subject.</font>"
                          },

                          contact_user_message: {
                            required: "<font color='red'>Please enter your message.</font>"
                          }
                        }
                      });
				    }); 

                $(document).ready(function() {

						 $("#quick_contact_submit").on('click', function (e) {
						 	 var valid = $('#quick_contact_form').valid();
						 	 if(valid) {
                               var quick_contact_name = $('#quick_contact_name').val();
                               var quick_contact_email = $('#quick_contact_email').val();
                               var quick_contact_message = $('#quick_contact_message').val();

                                $.ajax({
                                   type: "POST",
                                   url: "{{ url('/') }}/quick_contact",
                				   data:{
                				   		quick_contact_name :quick_contact_name,
                				   		quick_contact_email :quick_contact_email,
                				   		quick_contact_message:quick_contact_message,
                				   		_token:"{{csrf_token()}}"
                				   }, 
                                   success : function (resp){
                                   if(resp) {
                                     $.alert({
                                       title: 'Confirmation!',
                                       content: 'Your message has been sent successfully. We will contact you soon.',
                                       animation: 'scale',
                                       closeAnimation: 'scale',
                                       buttons: {
                                        Yes: {
                                           btnClass: 'btn-blue',
                                           action: function () {
                                              //window.location.href = '/home';
                                           }
                                        }
                                      }
                                   });
                                 }
                                }
                              });
                             }
						   });

						 $("#quick_contact_form").validate({
                            rules:{
                              quick_contact_name: {
                              required: true
                            },
           
                          	quick_contact_email: {
                              required: true,
                              email: true
                            },

                            quick_contact_message: {
                              required: true
                            }
                           },
            
                           messages:{
                           quick_contact_name: {
                             required: "<font color='red'>Please enter your name.</font>"
                           },
           
                           quick_contact_email: {
                            required: "<font color='red'>Please enter your email.</font>",
                            email:    "<font color='red'>Enter valid email id</font>"
                          },

                          quick_contact_message: {
                            required: "<font color='red'>Please enter your message.</font>"
                          }
                        }
                      });
				    });      

					</script>

					<script type="text/javascript">
						$(document).ready(function(){
							$(".toggle-nav").click(function(){
								$(".navber").slideToggle();
							});
							$("body").click(function(event) {
								//console.log(event.target.className == 'fa fa-bars');
								if(window.matchMedia('screen and (max-width: 767px)').matches && event.target.className != 'fa fa-bars'){
									$('.navber').hide();
								}
							});
						});
					</script>

				</body>
				</html>
