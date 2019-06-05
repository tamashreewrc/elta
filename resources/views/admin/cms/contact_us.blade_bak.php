@extends('admin.layout.dashboard_layout')
@section('content')

         <section class="content-header">
           <h1>
             Contact Us Settings
            </h1>
             <ol class="breadcrumb">
              <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active"><a href="/admin/cms/contact_us">Contact Us</a></li> 
             </ol>
           </section>     

          <section class="content">
           <div class="box box-default">
            <div class="box-header with-border">
            <h3 class="box-title">Contact Us</h3>
          </div>        
            <form method="POST" action="/admin/contact_submit" name="contact_us_form" id="contact_us_form" enctype="multipart/form-data">
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
              <div class="form-group {{ $errors->has('contact_title') ? 'has-error' : '' }}">
               <label>Title</label>
               <input type="text" class="form-control" name="contact_title" id="contact_title" placeholder="Enter a title" value='{{$contact['title']}}'>
               <span class="input-group col-md-4" style="color: red;">{{ $errors->first('contact_title') }}</span><br>
             </div>    
            </div>      
            <div class="col-md-12"> 
              <div class="form-group {{ $errors->has('contact_content') ? 'has-error' : '' }}">
               <label>Content</label>
                <textarea class="form-control" rows="10" name="contact_content" id="contact_content" placeholder="Enter your content">{{$contact['description']}}</textarea>
                <span class="input-group col-md-4" style="color: red;">{{ $errors->first('contact_content') }}</span>    
               </div><br>  
             </div> 
          </div>
        </div>
        <div class="box-footer">
         <button type="submit" class="btn btn-primary" id="contact_submit">Submit</button>
        </div>
      </form>  
      </div>
   </section>     

@endsection