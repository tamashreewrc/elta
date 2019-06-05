@extends('admin.layout.dashboard_layout')
@section('content')

         <section class="content-header">
           <h1>
             Resource Settings
            </h1>
             <ol class="breadcrumb">
              <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active"><a href="/admin/cms/resource">Resource</a></li> 
             </ol>
           </section>     

          <section class="content">
           <div class="box box-default">
            <div class="box-header with-border">
            <h3 class="box-title">Resource</h3>
          </div>        
            <form method="POST" action="/admin/resource_submit" name="resource_form" id="resource_form">
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
               <input type="text" class="form-control" name="title" id="title" placeholder="Enter a title" value='{{$resource['title']}}'>
               <span class="input-group col-md-4" style="color: red;">{{ $errors->first('title') }}</span><br>
             </div>    
            </div>  
             <div class="col-md-12">       
              <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
               <label>Resource First Content</label>
                <textarea class="form-control" rows="10" name="content" id="content" placeholder="Enter resource first content">{{$resource['content']}}</textarea>
                <span class="input-group col-md-4" style="color: red;">{{ $errors->first('content') }}</span>    
               </div>
             </div>
              <div class="col-md-12">       
              <div class="form-group {{ $errors->has('content_2') ? 'has-error' : '' }}">
               <label>Resource Second Content</label>
                <textarea class="form-control" rows="10" name="content_2" id="content_2" placeholder="Enter resource second content">{{$resource['content_2']}}</textarea>
                <span class="input-group col-md-4" style="color: red;">{{ $errors->first('content_2') }}</span>    
               </div>
             </div>  
          </div>
        </div>
        <div class="box-footer">
         <button type="submit" class="btn btn-primary" id="resource_submit">Submit</button>
        </div>
      </form>  
      </div>
   </section>     

@endsection