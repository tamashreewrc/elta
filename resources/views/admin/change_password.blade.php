@extends('admin.layout.dashboard_layout')
@section('content')
    <section class="content-header">
      <h1>
      Change Password
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/') }}/admin/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Change Password</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Reset Password</h3>
        </div>
        <!-- /.box-header -->

        <div class="box-body">
            @if(Session::has('message'))
                <div class="alert alert-success" id="success-alert">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>Success! </strong>
                    {{ Session::get('message') }}
                </div>
            @endif
            @if(Session::has('error_message'))
                <div class="alert alert-danger" id="danger-alert">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>Warning! </strong>
                    {{ Session::get('error_message') }}
                </div>
            @endif
            <div class="row">
                <form method="POST" action="{{ url('/') }}/change-password-submit" name="edit_profile_form" id="edit_profile_form">
                    {{ csrf_field() }}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Old Password</label>
                            <input type="Password" class="form-control {{ $errors->has('old_password') ? 'has-error' : '' }}" placeholder="Old Password" name="old_password" value="{{ old('old_password') }}" />
                            @if ($errors->first('old_password'))<span class="input-group text-danger">{{ $errors->first('old_password') }}</span>@endif
                        </div>
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="Password" class="form-control {{ $errors->has('new_password') ? 'has-error' : '' }}" placeholder="New Password" name="new_password" value="{{ old('new_password') }}" />
                            @if ($errors->first('new_password'))<span class="input-group text-danger">{{ $errors->first('new_password') }}</span>@endif
                        </div>
                        <div class="form-group">
                          <label>Confirm Password</label>
                          <input type="Password" class="form-control {{ $errors->has('confirm_password') ? 'has-error' : '' }}" placeholder="Confirm Password" name="confirm_password" value="{{ old('confirm_password') }}" />
                          @if ($errors->first('confirm_password'))<span class="input-group text-danger">{{ $errors->first('confirm_password') }}</span>@endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" id="edit_profile_submit">Change Password</button>
                        </div>

                    </div>
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
