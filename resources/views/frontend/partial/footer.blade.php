<footer>
<div class="footer-section">
  <div class="container contact-container">
    <div class="footer-contact-desc">
      <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-4">
          <section class="widget widget_text" id="text-15">
            <div class="textwidget">
              <div class="contact-inner">
                <i class="fa fa-map-marker"></i>
                <h3 class="contact-title address-icon">Address</h3>
                <p class="contact-desc">{!!$setting['company_address']!!}</p></div>
              </div>
            </section>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-4">
            <section class="widget widget_text" id="text-16">
              <div class="textwidget">
                <div class="contact-inner">
                  <i class="fa fa-phone"></i>
                  <h3 class="contact-title phone-icon">Phone Number</h3>
                  <p class="contact-desc">{{$setting['primary_contact']}}<br> {{$setting['secondary_contact']}}</p>
                </div>
              </div>
            </section>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-4">
            <section class="widget widget_text" id="text-17">
              <div class="textwidget">
                <div class="contact-inner">
                  <i class="fa fa-envelope-o"></i>
                  <h3 class="contact-title mail-icon">Web Address</h3>
                  <p class="contact-desc">Email: <a href="mailto:{{$setting['website_email']}}">{{$setting['website_email']}}</a><!-- <br> Web: <a href="#">www.elta.com</a> --></p>
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="widget">
              <img src="{{ url('upload/footer_logo/original/'.$setting['footer_logo'])}}" alt="logo">
              <p>{{$setting['footer_content']}}</p>
            </div>
          </div>
          <div class="col-md-3">
            <h4 class="widget-title">Useful Links</h4>
            <ul class="list-border">
              <li><a href="{{url('/')}}/about">About</a></li>
              <li><a href="{{url('/')}}/services">Services</a></li>
              <li><a href="{{url('/')}}/gallery">Gallery</a></li>
              <li><a href="{{url('/')}}/clients">Clients</a></li>
              <li><a href="{{url('/')}}/testimonials">Testimonials</a></li>
              <li><a href="{{url('/')}}/resources">Resources</a></li>
              <li><a href="{{url('/')}}/contact">Contact</a></li>
            </ul>
          </div>
          <div class="col-md-3">
            <h4 class="widget-title">Services</h4>
            <ul class="list-border">
              @foreach($service_category as $key => $value)
                <li><a href="{{url('/')}}/services/category/{{$value['id']}}">{{$value['service_category_name']}}</a></li>
              @endforeach  
            </ul>
          </div>
          <div class="col-md-3">
            <h4 class="widget-title">Drop a Line</h4>
            <div class="bottom-contact">
              <form method="POST" action="javascript:void(0)" name="quick_contact_form" id="quick_contact_form">
                {{ csrf_field() }}
                <div class="form-group">
                  <input type="text" class="form-control" name="quick_contact_name" id="quick_contact_name" placeholder="Name">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="quick_contact_email" id="quick_contact_email" placeholder="Email">
                </div>
                <div class="form-group">
                  <textarea class="textarea" rows="3" name="quick_contact_message" id="quick_contact_message" placeholder="Message"></textarea>
                </div>
                <button type="submit" id="quick_contact_submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
