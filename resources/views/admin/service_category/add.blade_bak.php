@extends('admin.layout.dashboard_layout')
@section('content')
    <section class="content-header">
      <h1>
        Service Category
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li> 
        <li class="active"><a href="/admin/service_categories">Service Categories</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Add Service Category</h3>

          <!-- <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div> -->
        </div>
        <!-- /.box-header -->

        <div class="box-body">
            <div class="row">
                <form method="POST" action="/service_category/add_submit" name="service_category_add_form" id="service_category_add_form" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="col-md-4">
                        <div class="form-group {{ $errors->has('service_category_name') ? 'has-error' : '' }}">
                            <label>Service Category Name</label>
                            <input type="text" class="form-control" name="service_category_name" id="service_category_name" placeholder="Enter service category name">
                            @if ($errors->first('service_category_name'))<span class="input-group" style="color: red;">{{ $errors->first('service_category_name') }}</span>@endif
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group {{ $errors->has('parent_category_id') ? 'has-error' : '' }}">
                        <label>Parent Category</label>
                            <select class="form-control select2" style="width: 100%;" name="parent_category_id" id="parent_category_id">
                                <option value="0" selected="selected">This is the main category</option>
                                @foreach($parent_categories as $key => $value)
                                    <option value="{{$value['id']}}">{{$value['service_category_name']}}</option>
                                @endforeach
                                <!-- <option value="1">Skills Camp</option>
                                <option value="2">Corp Cult</option>
                                <option value="3">Ex Amplify</option>
                                <option value="4">Teacher Training Troop</option> -->
                            </select>
                            @if ($errors->first('parent_category_id'))<span class="input-group" style="color: red;">{{ $errors->first('parent_category_id') }}</span>@endif
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group {{ $errors->has('service_category_icon') ? 'has-error' : '' }}">
                            <label for="exampleInputFile">Service Category Icon</label>
                            <input type="file" id="service_category_icon" name="service_category_icon">
                            @if ($errors->first('service_category_icon'))<span class="input-group" style="color: red;">{{ $errors->first('service_category_icon') }}</span>@endif
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group" id="featured_category_add" style="display: none;">
                         <div class="checkbox">
                          <label>
                           <input type="checkbox" name="featured_service_category" id="featured_box_add"> Add the Category into Featured Services  
                          </label>
                         </div>
                        </div> 
                        <!-- /.form-group -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" id="service_category_add_submit">Add Service Category</button>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-8">
                        <div class="form-group {{ $errors->has('service_category_description') ? 'has-error' : '' }}">
                            <label>Service Category Description</label>
                            <textarea class="form-control" name="service_category_description" id="service_category_description" rows="10" placeholder="Enter service category description"></textarea>
                            @if ($errors->first('service_category_description'))<span class="input-group" style="color: red;">{{ $errors->first('service_category_description') }}</span>@endif
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
