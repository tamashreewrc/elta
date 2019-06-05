@extends('admin.layout.dashboard_layout')
@section('content')

<section class="content-header">
  <h1>
   Client
  </h1>
  <ol class="breadcrumb">
   <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
   <li class="active"><a href="/admin/client">Client</a></li>
  </ol>
 </section>

<section class="content">
  <div class="row">
   <div class="col-xs-12">
    <div class="box">
      <div class="box-header clearfix">
         <h3 class="box-title">All Client Records</h3>
         <a title="Add Client" href="/admin/client/add" class="btn btn-success add_all_pages pull-right"><i class="fa fa-plus"></i></a>
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
             <th>SL No.</th>
             <th>Name of the Client</th>
             <th>Uploaded Image</th>
             <th>Created At</th>
             <th>Action</th>
             <th>View Event</th>
            </tr>
           </thead>
            <tbody>
              @foreach($all_clients as $key => $value)
              <tr>
              <td>{{++$key}}</td>
              <td>{{$value['name']}}</td>
              <td><img src="{{ url('upload/client/resize/'.$value['image'])}}" class="img-responsive" height="50" width="50"></td>
              <td>{{Carbon\Carbon::parse($value['created_at'])->format('d-m-Y')}}</td>
              <td><a title="Edit" href="/admin/client/edit/{{$value['id']}}" class="btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
               <a title="Delete" href="/admin/client/delete/{{$value['id']}}" onclick="return confirm('Do you really want to delete the current record ?');" class="btn-sm btn-danger"><i class="fa fa-trash"></i></a>
              </td>
              <td><a href="/admin/client/event/{{$value['id']}}" class="btn-sm btn-primary"><i class="fa fa-eye"></i></a></td>
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
