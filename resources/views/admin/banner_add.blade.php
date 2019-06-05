@extends('admin.layout.dashboard_layout')
@section('content')
	<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Banner
        <!-- <small>Preview</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Banner</li>
      </ol>
    </section>

	<!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">

      	<form role="form" method="post" action="/banner/add" enctype="multipart/form-data">
      		  {{ csrf_field() }}
                <div class="box-body">
          				<div class="col-md-6">
                    <div class="form-group has-feedback {{ $errors->has('addBannerTitle') ? 'has-error' : '' }}">
                        
                          <label for="addBannerTitle">Banner Title</label>
                          <input type="text" class="form-control" id="addBannerTitle" name="addBannerTitle" placeholder="Banner Title">
                        

                        <span class="input-group col-md-4" style="color: red;">{{ $errors->first('addBannerTitle') }}</span>

                    </div>
          					
                            <div class="form-group has-feedback {{ $errors->has('addBannerImage') ? 'has-error' : '' }}">
            	                
            	                  <label for="addBannerImage">Banner Image</label>
            	                  <input type="file" id="addBannerImage" name="addBannerImage">
                                
            	                

                              <span class="input-group col-md-4" style="color: red;">{{ $errors->first('addBannerImage') }}</span>
                            </div>
                            
          				</div>

          				<div class="col-md-6">
                            
                            <div class="form-group has-feedback {{ $errors->has('addBannerLink') ? 'has-error' : '' }}">

            					         
            	                  <label for="addBannerLink">Banner Link</label>
            	                  <input type="text" class="form-control" id="addBannerLink" placeholder="Banner Link" name="addBannerLink">
            	                

                              <span class="input-group col-md-4" style="color: red;">{{ $errors->first('addBannerLink') }}</span>

                            </div>
                            
                          
                          <div class="form-group has-feedback {{ $errors->has('addBannerDescription') ? 'has-error' : '' }}">
          					         
                            	<label for="addBannerDescription">Banner Description</label>
                            	<textarea id="addBannerDescription" name="addBannerDescription" class="form-control" rows="3" placeholder="Enter Banner Description">
                            		
                            	</textarea>
                          	

                             <span class="input-group col-md-4" style="color: red;">{{ $errors->first('addBannerDescription') }}</span>
                          </div>

                         

          				</div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer text-center">
                <button type="submit" class="btn btn-primary">Create</button>
              </div>
        </form>
      </div>
      <!-- /.box -->


    </section>
    <!-- /.content -->

@endsection