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
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header clearfix">
              <h3 class="box-title">All Banners</h3>
                <a title="Add Banner" href="/admin/banner/add" class="btn btn-success add_all_pages pull-right"><i class="fa fa-plus"></i></a>
             </div>
            <div class="box-body">
              @if(Session::has('submit-status'))
                <div class="alert alert-success" id="success-alert">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>Success! </strong>
                    {{ Session::get('submit-status') }}
                </div>
               @endif
               <div class="table-responsive">  
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                 <tr>
                  <th>Id</th>
                  <th>Banner Title</th>
                  <th>Banner Description</th>
                  <th>Banner Link</th>
                  <th>Banner Image</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($banners as $key => $value)
                  <tr>
                    <td>{{++$key}}</td>
                    <td>{{$value['banner_title']}}</td>
                    <td class="bannerDescription">{{$value['banner_description']}}</td>
                    <td>{{$value['banner_link']}}</td>
                    <td><img src="{{url('upload/banners/resize/'.$value['banner_image'])}}" class="img-responsive" height="50" width="50"></td>
                    <td colspan="2">
                     <a href="/admin/banner/edit/{{$value['id']}}" class="btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                     <a href="/banner/delete/{{$value['id']}}" onclick="return confirm('Do you really want to delete the current record ?');" class="btn-sm btn-danger "><i class="fa fa-trash"></i></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  @endsection
