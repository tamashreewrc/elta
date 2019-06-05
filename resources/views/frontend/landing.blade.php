@extends('frontend.layout.landing_layout')
@section('content')
	<div class="container landing-section">
		<div class="enter-site text-center">
			<a href="{{url('/')}}/home">
				<span>
					<img class="img-fluid" src="{{ url('storage/frontend/images/logo.png') }}">
				</span>
			</a>

		</div>
		<div class="row h-100">
			<div class="col-lg-3 text-light text-center text-uppercase font-weight-bold l-logo-font js-hover-anim" data-attribute="E" onclick="showModal_e()">
				<h1><img class="img-responsive" src="{{ url('storage/frontend/images/E.png') }}"></h1>
			</div>
			<div class="col-lg-3 text-light text-center text-uppercase font-weight-bold l-logo-font js-hover-anim" data-attribute="L" onclick="showModal_l()">
				<h1><img class="img-responsive" src="{{ url('storage/frontend/images/L.png') }}"></h1>
			</div>
			<div class="col-lg-3 text-light text-center text-uppercase font-weight-bold l-logo-font js-hover-anim" data-attribute="T" onclick="showModal_t()">
				<h1><img class="img-responsive" src="{{ url('storage/frontend/images/T.png') }}"></h1>
			</div>
			<div class="col-lg-3 text-light text-center text-uppercase font-weight-bold l-logo-font js-hover-anim" data-attribute="A" onclick="showModal_a()">
				<h1><img class="img-responsive" src="{{ url('storage/frontend/images/A.png') }}"></h1>
			</div>
		</div>

		<!-- Starts Fullmod First section -->
		<div id="myFullMod_e" class="fullmod">
			<div class="fullmod-content">

				<!--FullMod Header-->
				<div class="fullmod-head">
					<h2 class="title">{{$elta_e['elta_word']}}</h2>
					<div class="buttons">
						<a href="#" title="Close" class="btn-close">&times;</a>
					</div>
				</div>

				<!--FullMod Body-->
				<div class="fullmod-body">
					<div class="left-panel">
						<div class="box">
							<p class="d-inline-block mb-0 font-NotoSans">{{$elta_e['elta_symbol']}}</p>
							<i aria-hidden="true" class="fa fa-volume-down"></i>
							<p class="mb-0 font-Montserrat">{{$elta_e['elta_parts_of_speech']}}</p>
							{{$elta_e['description_1']}}
						</div>
					</div>
					<div class="right-panel">
						<div class="box">
							<h4>{{$elta_e['description_2']}}</h4>
							<button class="btn btn-primary">Read more</button>
						</div>
					</div>
				</div>

			</div>
		</div>
		<!-- Closed Fullmod First section -->

		<!-- Starts Fullmod 2nds section -->
		<div id="myFullMod_l" class="fullmod">
			<div class="fullmod-content">

				<!--FullMod Header-->
				<div class="fullmod-head">
					<h2 class="title">{{$elta_l['elta_word']}}</h2>
					<div class="buttons">
						<a href="#" title="Close" class="btn-close">&times;</a>
					</div>
				</div>

				<!--FullMod Body-->
				<div class="fullmod-body">
					<div class="left-panel">
						<div class="box">
							<p class="d-inline-block mb-0 font-NotoSans">{{$elta_l['elta_symbol']}}</p>
							<i aria-hidden="true" class="fa fa-volume-down"></i>
							<p class="mb-0 font-Montserrat">{{$elta_l['elta_parts_of_speech']}}</p>
							{{$elta_l['description_1']}}
						</div>
					</div>
					<div class="right-panel">
						<div class="box">
							<h4>{{$elta_l['description_2']}}</h4>
							<button class="btn btn-primary">Read more</button>
						</div>
					</div>
				</div>

			</div>
		</div>
		<!-- Closed Fullmod 2nds section -->

		<!-- Starts Fullmod 3rd section -->
		<div id="myFullMod_t" class="fullmod">
			<div class="fullmod-content">

				<!--FullMod Header-->
				<div class="fullmod-head">
					<h2 class="title">{{$elta_t['elta_word']}}</h2>
					<div class="buttons">
						<a href="#" title="Close" class="btn-close">&times;</a>
					</div>
				</div>

				<!--FullMod Body-->
				<div class="fullmod-body">
					<div class="left-panel">
						<div class="box">
							<p class="d-inline-block mb-0 font-NotoSans">{{$elta_t['elta_symbol']}}</p>
							<i aria-hidden="true" class="fa fa-volume-down"></i>
							<p class="mb-0 font-Montserrat">{{$elta_t['elta_parts_of_speech']}}</p>
							{{$elta_t['description_1']}}
							<p>synonyms: {{$elta_t['elta_synonyms']}}</p>
						</div>
					</div>
					<div class="right-panel">
						<div class="box">
							<h4>{{$elta_t['description_2']}}</h4>
							<button class="btn btn-primary">Read more</button>
						</div>
					</div>
				</div>

			</div>
		</div>
		<!-- Closed Fullmod 3rd section -->

		<!-- Starts Fullmod 4th section -->
		<div id="myFullMod_a" class="fullmod">
			<div class="fullmod-content">

				<!--FullMod Header-->
				<div class="fullmod-head">
					<h2 class="title">{{$elta_a['elta_word']}}</h2>
					<div class="buttons">
						<a href="#" title="Close" class="btn-close">&times;</a>
					</div>
				</div>

				<!--FullMod Body-->
				<div class="fullmod-body">
					<div class="left-panel">
						<div class="box">
							<p class="d-inline-block mb-0 font-NotoSans">{{$elta_a['elta_symbol']}}</p>
							<i aria-hidden="true" class="fa fa-volume-down"></i>
							<p class="mb-0 font-Montserrat">{{$elta_a['elta_parts_of_speech']}}</p>
							{{$elta_a['description_1']}}
							<p>synonyms: {{$elta_a['elta_synonyms']}}
							</p>
						</div>
					</div>
					<div class="right-panel">
						<div class="box">
							<h4>{{$elta_a['description_2']}}</h4>
							<button class="btn btn-primary">Read more</button>
						</div>
					</div>
				</div>

			</div>
		</div>
		<!-- Closed Fullmod 4th section -->

	</div>
@endsection
