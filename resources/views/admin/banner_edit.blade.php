@extends('admin.layout.dashboard_layout')
@section('content')
	<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Banner
        <!-- <small>Preview</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Banner</li>
      </ol>
    </section>

	<!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
      	<form role="form" method="post" action="/banner/edit/{{$banner->id}}" enctype="multipart/form-data">
      		  {{ csrf_field() }}
              <div class="box-body">
				<div class="col-md-6">
					<div class="form-group has-feedback {{ $errors->has('editBannerTitle') ? 'has-error' : '' }}">
	                  <label for="editBannerTitle">Banner Title</label>
	                  <input type="text" class="form-control" id="editBannerTitle" name="editBannerTitle" placeholder="Banner Title" value="{{$banner->banner_title}}">
                    <span class="input-group col-md-4" style="color: red;">{{ $errors->first('editBannerTitle') }}</span>
                	</div>

	                <div class="form-group has-feedback {{ $errors->has('editBannerImage') ? 'has-error' : '' }}">
	                  <label for="editBannerImage">Banner Image</label>
	                  <input type="file" id="editBannerImage" name="editBannerImage">
                    <span class="input-group col-md-4" style="color: red;">{{ $errors->first('editBannerImage') }}</span>
	                </div>

                  <br>

                  <img src="/upload/banners/resize/{{$banner->banner_image}}" width="50" height="50">
				</div>

				<div class="col-md-6">

					<div class="form-group has-feedback {{ $errors->has('editBannerLink') ? 'has-error' : '' }}">
	                  <label for="editBannerLink">Banner Link</label>
	                  <input type="text" class="form-control" id="editBannerLink" placeholder="Banner Link" value="{{$banner->banner_link}}" name="editBannerLink">
                     <span class="input-group col-md-4" style="color: red;">{{ $errors->first('editBannerLink') }}</span>
	                </div>

					<div class="form-group has-feedback {{ $errors->has('editBannerDescription') ? 'has-error' : '' }}">
                  	<label for="editBannerDescription">Banner Description</label>
                  	<textarea id="editBannerDescription" name="editBannerDescription" class="form-control" rows="3" placeholder="Enter Banner Description">
                  		{{$banner->banner_description}}
                  	</textarea>
                    <span class="input-group col-md-4" style="color: red;">{{ $errors->first('editBannerDescription') }}</span>
                	</div>

				</div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer text-center">
                <button type="submit" class="btn btn-primary">Edit And Save</button>
              </div>
            </form>
      </div>
      <!-- /.box -->


    </section>
    <!-- /.content -->

@endsection