@extends('admin.layout.dashboard_layout')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Team Members
      </h1>
      <ol class="breadcrumb">
       <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
       <li class="active"><a href="/admin/team_members">Team Members</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header clearfix">
              <h3 class="box-title">All Members</h3>
              <a title="Add Team Member" href="/admin/team_members/add" class="btn btn-success add_all_pages pull-right"><i class="fa fa-plus"></i></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @if(Session::has('submit-status'))
                    <div class="alert alert-success" id="success-alert">
                          <button type="button" class="close" data-dismiss="alert">x</button>
                          <strong>Success! </strong>
                          {{ Session::get('submit-status') }}
                    </div>
                @endif
                <div class="table-responsive">
                  <table id="team_member_listings" class="table table-bordered table-striped team_member_listings">
                <thead>
                <tr>
                  <th>SL No.</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Image</th>
                  <th>Created At</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($team_members as $key => $value)
                  <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{$value['name']}}</td>
                    <td>{{$value['email']}}</td>
                    <td><img src="{{ url('upload/team_members/resize/'.$value['image'])}}" class="img-responsive" height="50" width="50"></td>
                    <td>{{Carbon\Carbon::parse($value['created_at'])->format('d-m-Y')}}</td>
                    <td>
                    <a title="Edit" href="/admin/team_members/edit/{{$value['id']}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                    <a title="Delete" href="/team_members/delete/{{$value['id']}}" onclick="return confirm('Do you really want to delete the current record ?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td>
                  </tr>
                @endforeach
                </tbody>
                  </table>
                </div>
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
</body>
</html>
