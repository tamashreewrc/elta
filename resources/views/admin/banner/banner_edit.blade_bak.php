@extends('admin.layout.dashboard_layout')
@section('content')

    <section class="content-header">
      <h1>
        Banners
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="/admin/banner">Banners</a></li>
      </ol>
    </section>

    <section class="content">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Banner</h3>
        </div>
        <form role="form" method="post" action="/banner/edit/{{$banner->id}}" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="box-body">
                 <div class="row">   
                  <div class="col-md-6">
                    <div class="form-group has-feedback {{ $errors->has('editBannerTitle') ? 'has-error' : '' }}">   
                        <label for="editBannerTitle">Banner Title</label>
                        <input type="text" class="form-control" id="editBannerTitle" name="editBannerTitle" placeholder="Banner Title" value="{{$banner->banner_title}}">
                        <span class="input-group col-md-4" style="color: red;">{{ $errors->first('editBannerTitle') }}</span>
                     </div>
                      <div class="form-group has-feedback {{ $errors->has('editBannerLink') ? 'has-error' : '' }}">
                       <label for="editBannerLink">Banner Link</label>
                       <input type="text" class="form-control" id="editBannerLink" placeholder="Banner Link" name="editBannerLink" value="{{$banner->banner_link}}">
                       <span class="input-group col-md-4" style="color: red;">{{ $errors->first('editBannerLink') }}</span>
                      </div>
                      <div class="form-group has-feedback {{ $errors->has('editBannerDescription') ? 'has-error' : '' }}">
                       <label for="editBannerDescription">Banner Description</label>
                       <textarea id="editBannerDescription" name="editBannerDescription" class="form-control" rows="3" placeholder="Enter Banner Description">{{$banner->banner_description}}</textarea>
                       <span class="input-group col-md-4" style="color: red;">{{ $errors->first('editBannerDescription') }}</span>
                      </div>
                      <div class="form-group has-feedback {{ $errors->has('editBannerImage') ? 'has-error' : '' }}">
                        <label for="editBannerImage">Banner Image</label>
                        <br><img src="/upload/banners/resize/{{$banner->banner_image}}" style="width: 75px;height: 75px;" class="img-thumbnail"><br><br>
                        <input type="file" id="editBannerImage" name="editBannerImage">                                
                        <span class="input-group col-md-4" style="color: red;">{{ $errors->first('editBannerImage') }}</span>
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