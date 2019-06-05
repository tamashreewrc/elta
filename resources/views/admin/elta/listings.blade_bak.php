@extends('admin.layout.dashboard_layout')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        English Language Training Academy
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="/admin/elta">ELTA</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header clearfix">
              <h3 class="box-title">ELTA</h3>
              <a title="Add" href="/admin/elta/add" class="btn btn-success add_all_pages pull-right"><i class="fa fa-plus"></i></a>
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
                  <table id="elta_listings" class="table table-bordered table-striped elta_listings">
                <thead>
                <tr>
                  <th>SL No.</th>
                  <th>Letter</th>
                  <th>Word</th>
                  <th>Symbol</th>
                  <th>Parts Of Speech</th>
                  <th>Created At</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($elta_list as $key => $value)
                      <tr>
                      <td>{{ ++$key }}</td>
                      <td>{{$value['elta_letter']}}</td>
                      <td>{{$value['elta_word']}}</td>
                      <td>{{$value['elta_symbol']}}</td>
                      <td>{{$value['elta_parts_of_speech']}}</td>
                      <td>{{Carbon\Carbon::parse($value['created_at'])->format('d-m-Y')}}</td>
                      <td><a title="Edit" href="/admin/elta/edit/{{$value['id']}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                    <a title="Delete" href="/elta/delete/{{$value['id']}}" onclick="return confirm('Do you really want to delete the current record ?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td>
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
