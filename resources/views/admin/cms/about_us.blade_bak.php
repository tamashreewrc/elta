@extends('admin.layout.dashboard_layout')
@section('content')

         <section class="content-header">
           <h1>
             About Us Settings
            </h1>
             <ol class="breadcrumb">
              <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active"><a href="/admin/cms/about_us">About Us</a></li> 
             </ol>
           </section>     

          <section class="content">
           <div class="box box-default">
            <div class="box-header with-border">
            <h3 class="box-title">About Us</h3>
          </div>        
            <form method="POST" action="/admin/about_submit" name="about_us_form" id="about_us_form" enctype="multipart/form-data">
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
              <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
               <label>Title</label>
               <input type="text" class="form-control" name="title" placeholder="Enter a title" value='{{$about['title']}}'>
               <span class="input-group col-md-4" style="color: red;">{{ $errors->first('title') }}</span><br>
             </div>    
            </div>      
            <div class="col-md-12">
              <div class="form-group {{ $errors->has('top_content') ? 'has-error' : '' }}">
               <label>Top Content</label>
                <textarea class="form-control" rows="10" name="top_content" id="top_content" placeholder="Enter top content">{{$about['top_content']}}</textarea>
                <span class="input-group col-md-4" style="color: red;">{{ $errors->first('top_content') }}</span><br>    
             </div>  
              <div class="form-group {{ $errors->has('bottom_content') ? 'has-error' : '' }}">
               <label>Bottom Content</label>
                <textarea class="form-control" rows="10" name="bottom_content" id="bottom_content" placeholder="Enter bottom content">{{$about['bottom_content']}}</textarea>
                <span class="input-group col-md-4" style="color: red;">{{ $errors->first('bottom_content') }}</span>    
               </div><br> 
              <div class="form-group {{ $errors->has('banner') ? 'has-error' : '' }}">
               <label>Upload Banner</label>
               <?php if($about['banner']){?>
               <br><img src="{{ url('upload/cms/about_us/resize/'.$about['banner'])}}" style="width: 75px;height: 75px;" class="img-thumbnail"><br><br><?php } ?>
               <input type="file" name="banner">
               <span class="input-group col-md-4" style="color: red;">{{ $errors->first('banner') }}</span>
              </div> 
             </div> 
          </div>
        </div>
        <div class="box-footer">
         <button type="submit" class="btn btn-primary" id="about_submit">Submit</button>
        </div>
      </form>  
      </div>
   </section>     

@endsection