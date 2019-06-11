@extends('admin.layout.dashboard_layout')
@section('content')
    <section class="content-header">
      <h1>
        Service Category
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/') }}/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li> 
        <li><a href="{{ url('/') }}/admin/gallery_type">Gallery Type</a></li>
        <li class="active">Edit Gallery Type</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Gallery Type</h3>

          <!-- <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div> -->
        </div>
        <!-- /.box-header -->

        <div class="box-body">
            <div class="row">
                <form method="POST" action="{{ url('/') }}/gallery_type/edit_submit/{{ $gallery_type_details['id'] }}" name="gallery_type_edit_form" id="gallery_type_edit_form" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="col-md-4">
                        <div class="form-group {{ $errors->has('gallery_type_name') ? 'has-error' : '' }}">
                            <label>Gallery Type Name</label>
                            <input type="text" class="form-control" name="gallery_type_name" id="gallery_type_name" placeholder="Enter gallery type name" value="{{ $gallery_type_details['name'] }}">
                            @if ($errors->first('gallery_type_name'))<span class="input-group" style="color: red;">{{ $errors->first('gallery_type_name') }}</span>@endif
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group {{ $errors->has('gallery_type_icon') ? 'has-error' : '' }}">
                            <label for="exampleInputFile">Gallery Type Icon</label>
                            <input type="file" id="gallery_type_icon" name="gallery_type_icon">
                            <br>
                            <img src="{{ url('upload/gallery_type_icon/resize/'.$gallery_type_details['icon']) }}" style="width: 50px;height: 50px;">
                            <input type="hidden" name="exit_gallery_type_icon" value="{{ $gallery_type_details['icon'] }}">
                            @if ($errors->first('service_category_icon'))<span class="input-group" style="color: red;">{{ $errors->first('service_category_icon') }}</span>@endif
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" id="gallery_type_add_submit">Update Gallery Type</button>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-8">
                        <div class="form-group {{ $errors->has('gallery_type_description') ? 'has-error' : '' }}">
                            <label>Service Category Description</label>
                            <textarea class="form-control" name="gallery_type_description" id="gallery_type_description" rows="10" placeholder="Enter service category description">{{ $gallery_type_details['description'] }}</textarea>
                            @if ($errors->first('gallery_type_description'))<span class="input-group" style="color: red;">{{ $errors->first('gallery_type_description') }}</span>@endif
                        </div>
                        <!-- /.form-group -->

                    </div>
                    <!-- /.col -->
                </form>
            </div>
          <!-- /.row -->
        </div>
      <!-- /.box-body -->

      </div>
      <!-- /.box -->


    </section>
    <!-- /.content -->
    @endsection
