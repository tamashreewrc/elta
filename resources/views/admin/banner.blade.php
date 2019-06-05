@extends('admin.layout.dashboard_layout')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Banners
        <!-- <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Banners</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">
                <a href="/banner/add" class="btn btn-block btn-success">Add Banner</a>
              </h3>
              @if(Session::has('banner-add-status'))
                <p class="login-box-msg" style="color: green;">{{ Session::get('banner-add-status') }}</p>
              @endif

              @if(Session::has('banner-edit-status'))
                <p class="login-box-msg" style="color: green;">{{ Session::get('banner-edit-status') }}</p>
              @endif

              @if(Session::has('banner-delete-status'))
                <p class="login-box-msg" style="color: red;">{{ Session::get('banner-delete-status') }}</p>
              @endif
              
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                 <tr>
                  <th>Id</th>
                  <th>Banner Title</th>
                  <th>Banner Description</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($banners as $banner)

                  <tr>
                    <td>{{$banner['id']}}</td>
                    <td>{{$banner['banner_title']}}
                    </td>
                    <td class="bannerDescription">{{$banner['banner_description']}}</td>
                    <td> 

                      <!-- <button type="button" class="btn btn-primary">Edit</button> -->
                      
                      <!-- edit sample -->

                      <a href="{{action('BannerController@edit', $banner['id'])}}" class="btn btn-warning">Edit</a>


                     <a href="/banner/delete/{{ $banner['id'] }}" onclick="return confirm('Do you really want to delete the current record ?');" class="btn btn-danger "><i class="fa fa-trash"></i></a>


                    </td>
                  </tr>
                  @endforeach
                </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  @endsection