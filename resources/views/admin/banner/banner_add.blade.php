@extends('admin.layout.dashboard_layout')
@section('content')

    <section class="content-header">
      <h1>
        Banners
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/') }}/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="{{ url('/') }}/admin/banner">Banners</a></li>
      </ol>
    </section>

    <section class="content">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Add Banner</h3>
        </div>
      	<form role="form" method="post" action="{{ url('/') }}/banner/add" enctype="multipart/form-data">
      		  {{ csrf_field() }}
                <div class="box-body">
                 <div class="row">   
          				<div class="col-md-6">
                    <div class="form-group has-feedback {{ $errors->has('addBannerTitle') ? 'has-error' : '' }}">   
                        <label for="addBannerTitle">Banner Title</label>
                        <input type="text" class="form-control" id="addBannerTitle" name="addBannerTitle" placeholder="Banner Title">
                        <span class="input-group col-md-4" style="color: red;">{{ $errors->first('addBannerTitle') }}</span>
                     </div>
                      <div class="form-group has-feedback {{ $errors->has('addBannerLink') ? 'has-error' : '' }}">
                       <label for="addBannerLink">Banner Link</label>
                       <input type="text" class="form-control" id="addBannerLink" placeholder="Banner Link" name="addBannerLink">
            	         <span class="input-group col-md-4" style="color: red;">{{ $errors->first('addBannerLink') }}</span>
                      </div>
                      <div class="form-group has-feedback {{ $errors->has('addBannerDescription') ? 'has-error' : '' }}">
          					   <label for="addBannerDescription">Banner Description</label>
                       <textarea id="addBannerDescription" name="addBannerDescription" class="form-control" rows="3" placeholder="Enter Banner Description"></textarea>
                       <span class="input-group col-md-4" style="color: red;">{{ $errors->first('addBannerDescription') }}</span>
                      </div>
                      <div class="form-group has-feedback {{ $errors->has('addBannerImage') ? 'has-error' : '' }}">
                        <label for="addBannerImage">Banner Image</label>
                        <input type="file" id="addBannerImage" name="addBannerImage">                                
                        <span class="input-group col-md-4" style="color: red;">{{ $errors->first('addBannerImage') }}</span>
                      </div> 
          				   </div>
                    </div>
                   </div>
                  <div class="box-footer">
                   <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
             </div>
         </section>
   
   @endsection