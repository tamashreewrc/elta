@extends('admin.layout.dashboard_layout')

@section('content')

    <section class="content-header">

      <h1>

        Gallery Type

      </h1>

      <ol class="breadcrumb">

        <li><a href="{{ url('/') }}/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li> 
        <li><a href="{{ url('/') }}/admin/gallery_type">Gallery Type</a></li>
        <li class="active">Add Gallery Type</li>

      </ol>

    </section>



    <!-- Main content -->

    <section class="content">



      <!-- SELECT2 EXAMPLE -->

      <div class="box box-default">

        <div class="box-header with-border">

          <h3 class="box-title">Add Gallery Type</h3>

        </div>

        <!-- /.box-header -->



        <div class="box-body">

            <div class="row">

                <form method="POST" action="{{ url('/') }}/gallery_type/add_submit" name="gallery_type_add_form" id="gallery_type_add_form" enctype="multipart/form-data">

                    {{ csrf_field() }}

                    <div class="col-md-4">

                        <div class="form-group {{ $errors->has('gallery_type_name') ? 'has-error' : '' }}">

                            <label>Name</label>

                            <input type="text" class="form-control" name="gallery_type_name" id="gallery_type_name" placeholder="Enter Gallery Type Name">

                            @if ($errors->first('gallery_type_name'))<span class="input-group" style="color: red;">{{ $errors->first('gallery_type_name') }}</span>@endif

                        </div>

                        <!-- /.form-group -->

                        <div class="form-group {{ $errors->has('gallery_type_icon') ? 'has-error' : '' }}">

                            <label for="exampleInputFile">Gallery Type Icon</label>

                            <input type="file" id="gallery_type_icon" name="gallery_type_icon">

                            @if ($errors->first('gallery_type_icon'))<span class="input-group" style="color: red;">{{ $errors->first('gallery_type_icon') }}</span>@endif

                        </div>

                        <!-- /.form-group -->

                        <div class="form-group">

                            <button type="submit" class="btn btn-primary" id="service_category_add_submit">Add Gallery Type</button>

                        </div>

                    </div>

                    <!-- /.col -->

                    <div class="col-md-8">

                        <div class="form-group {{ $errors->has('gallery_type_description') ? 'has-error' : '' }}">

                            <label>Gallery Type Description</label>

                            <textarea class="form-control" name="gallery_type_description" id="gallery_type_description" rows="10" placeholder="Enter Gallery Type Description"></textarea>

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

