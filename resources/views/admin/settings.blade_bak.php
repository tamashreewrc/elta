@extends('admin.layout.dashboard_layout')
@section('content')

         <section class="content-header">
           <h1>
             Company Settings
            </h1>
             <ol class="breadcrumb">
              <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active"><a href="/admin/settings">Settings</a></li>
             </ol>
           </section>     

          <section class="content">
           <div class="box box-default">
            <div class="box-header with-border">
            <h3 class="box-title">All Information</h3>
            <!--<div class="box-tools pull-right">
             <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
             <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
           </div>-->
          </div>

           <form method="POST" action="/admin_settings_submit" name="admin_settings_form" id="admin_settings_form" enctype="multipart/form-data">
            {{ csrf_field() }}
           <div class="box-body">
            @if(Session::has('submit-status'))
                <div class="alert alert-success" id="success-alert">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>Success! </strong>
                    {{ Session::get('submit-status') }}
                </div>
            @endif
           <div class="row">
             <div class="col-md-6">
              <div class="form-group {{ $errors->has('header_content') ? 'has-error' : '' }}">
               <label>Header Content</label>
               <input type="text" class="form-control" name="header_content" placeholder="Enter heading for header" value='{{$settings['header_content']}}'>
               <span class="input-group col-md-4" style="color: red;">{{ $errors->first('header_content') }}</span>
              </div>
              <div class="form-group {{ $errors->has('admin_email') ? 'has-error' : '' }}">
              <label>Email</label>
              <input type="text" class="form-control" name="admin_email" placeholder="Enter your email" value='{{$settings['admin_email']}}'>
               <span class="input-group col-md-4" style="color: red;">{{ $errors->first('admin_email') }}</span>
              </div>
              <div class="form-group {{ $errors->has('admin_contact_1') ? 'has-error' : '' }}">
              <label>Primary Contact</label>
              <input type="text" class="form-control" name="admin_contact_1" placeholder="Enter your primary contact" value='{{$settings['primary_contact']}}'>
              <span class="input-group col-md-4" style="color: red;">{{ $errors->first('admin_contact_1') }}</span>
              </div>
              <div class="form-group {{ $errors->has('admin_contact_2') ? 'has-error' : '' }}">
              <label>Secondary Contact</label>
              <input type="text" class="form-control" name="admin_contact_2" placeholder="Enter your secondary contact" value='{{$settings['secondary_contact']}}'>
              <span class="input-group col-md-4" style="color: red;">{{ $errors->first('admin_contact_2') }}</span>
              </div>
              <div class="form-group {{ $errors->has('company_loaction') ? 'has-error' : '' }}">
              <label>Company Location</label>
              <input type="text" class="form-control" name="company_loaction" placeholder="Enter your company loaction" value='{{$settings['company_loaction']}}'>
              <span class="input-group col-md-4" style="color: red;">{{ $errors->first('company_loaction') }}</span>
              </div>   
              <div class="form-group {{ $errors->has('website_email') ? 'has-error' : '' }}">
              <label>Website Email</label>
              <input type="text" class="form-control" name="website_email" placeholder="Enter email for website" value='{{$settings['website_email']}}'>
              <span class="input-group col-md-4" style="color: red;">{{ $errors->first('website_email') }}</span>
              </div>       
              <div class="form-group{{ $errors->has('header_logo') ? 'has-error' : '' }}">
              <label>Header Logo</label>
              <?php if($settings['header_logo']){?>
              <br><img src="{{ url('upload/header_logo/resize/'.$settings['header_logo'])}}" style="width: 75px;height: 75px;" class="img-thumbnail"><br><br><?php } ?>
              <input type="file" name="header_logo">
              <span class="input-group col-md-4" style="color: red;">{{ $errors->first('header_logo') }}</span>
              </div>
              <div class="form-group{{ $errors->has('footer_logo') ? 'has-error' : '' }}">
              <label>Footer Logo</label>
              <?php if($settings['footer_logo']){?>
              <br><img src="{{ url('upload/footer_logo/resize/'.$settings['footer_logo'])}}" style="width: 75px;height: 75px;" class="img-thumbnail"><br><br><?php } ?>
              <input type="file" name="footer_logo">
              <span class="input-group col-md-4" style="color: red;">{{ $errors->first('footer_logo') }}</span>
              </div>
            </div>      
            <div class="col-md-6">         
              <div class="form-group {{ $errors->has('company_address') ? 'has-error' : '' }}">
              <label>Company Address</label>
              <input type="text" class="form-control" name="company_address" placeholder="Enter your company address" value='{{$settings['company_address']}}'>
              <span class="input-group col-md-4" style="color: red;">{{ $errors->first('company_address') }}</span>
              </div> 
               <div class="form-group {{ $errors->has('footer_content') ? 'has-error' : '' }}">
              <label>Footer content</label>
              <input type="text" class="form-control" name="footer_content" placeholder="Enter your footer content" value='{{$settings['footer_content']}}'>
              <span class="input-group col-md-4" style="color: red;">{{ $errors->first('footer_content') }}</span>
              </div>
              <div class="form-group {{ $errors->has('facebook_link') ? 'has-error' : '' }}">
              <label>Facbook link</label>
              <input type="text" class="form-control" name="facebook_link" placeholder="Enter your facebook link" value='{{$settings['facebook_link']}}'>
              <span class="input-group col-md-4" style="color: red;">{{ $errors->first('facebook_link') }}</span>
              </div>
              <div class="form-group {{ $errors->has('youtube_link') ? 'has-error' : '' }}">
              <label>Youtube link</label>
              <input type="text" class="form-control" name="youtube_link" placeholder="Enter your youtube link" value='{{$settings['youtube_link']}}'>
              <span class="input-group col-md-4" style="color: red;">{{ $errors->first('youtube_link') }}</span>
              </div>
              <div class="form-group {{ $errors->has('instagram_link') ? 'has-error' : '' }}">
              <label>Instagram link</label>
              <input type="text" class="form-control" name="instagram_link" placeholder="Enter your instagram link" value='{{$settings['instagram_link']}}'>
              <span class="input-group col-md-4" style="color: red;">{{ $errors->first('instagram_link') }}</span>
              </div>
              <div class="form-group {{ $errors->has('skype_link') ? 'has-error' : '' }}">
              <label>Skype link</label>
              <input type="text" class="form-control" name="skype_link" placeholder="Enter your skype link" value='{{$settings['skype_id']}}'>
              <span class="input-group col-md-4" style="color: red;">{{ $errors->first('skype_link') }}</span>
              </div>
            </div> 
          </div>
        </div>
        <div class="box-footer">
         <button type="submit" class="btn btn-primary" id="admin_settings_submit">Submit</button>
        </div>
      </form> 
      </div>
   </section>     

@endsection