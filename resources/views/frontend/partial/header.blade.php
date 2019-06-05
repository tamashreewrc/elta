<header>
  <div class="header-top">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-6">
          <div class="contact-info">
            <p>{{$setting['header_content']}}</p>
          </div>
        </div>

        <div class="col-md-8 col-sm-8 col-xs-6">
          <!--<ul class="follow-us pull-right">
            <li> <a data-placement="bottom" title="facebook" href="{{$setting['facebook_link']}}" target="_blank"><i aria-hidden="true" class="fa fa-facebook"></i></a></li>
            <li> <a data-placement="bottom" title="linkedin" href="{{$setting['instagram_link']}}" target="_blank"><i aria-hidden="true" class="fa fa-linkedin"></i></a></li>
            <li> <a data-placement="bottom" title="youtube" href="{{$setting['youtube_link']}}" target="_blank"><i aria-hidden="true" class="fa fa-youtube-play"></i></a></li>
          </ul>-->
        </div>
      </div>
    </div>
  </div>

  <div class="header-logo-section">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-12">
          <div class="logo">
            <a href="{{url('/')}}"><img src="{{ url('upload/header_logo/original/'.$setting['header_logo'])}}" alt="logo"></a>
          </div>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <div class="row">
            <div class="contact-info-box">

             <!--  <div class="media-body pull-right text-right">
                <a class="title" href="#"><i class="fa fa-building-o"></i> Company Location</a>
                <h5 class="media-heading subtitle">{{$setting['company_loaction']}}</h5>
              </div> -->

              <div class="media-body pull-right">
                <!-- <a class="title" href="#"> --><i class="fa fa-phone-square"></i> Call us for more details<!-- </a> -->
                <!-- <h5 class="media-heading subtitle">{{$setting['primary_contact']}}</h5>
                <h5 class="media-heading subtitle">{{$setting['secondary_contact']}}</h5> -->
                <h5 class="media-heading subtitle">{{$setting['primary_contact']}}, {{$setting['secondary_contact']}}</h5>
              </div>

              <div class="media-body pull-right">
                <!-- <a class="title" href="#"> --><i class="fa fa-envelope"></i> Mail Us Today<!-- </a> -->
                <h5 class="media-heading subtitle">{{$setting['admin_email']}}</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
