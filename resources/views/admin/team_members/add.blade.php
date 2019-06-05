@extends('admin.layout.dashboard_layout')

@section('content')

    <section class="content-header">

      <h1>

        Team Member

      </h1>

      <ol class="breadcrumb">

       <li><a href="{{ url('/') }}/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>

       <li class="active"><a href="{{ url('/') }}/admin/team_members">Team Members</a></li>

      </ol>

    </section>



    <!-- Main content -->

    <section class="content">



      <!-- SELECT2 EXAMPLE -->

      <div class="box box-default">

        <div class="box-header with-border">

          <h3 class="box-title">Add Team Member</h3>



          <!-- <div class="box-tools pull-right">

            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>

          </div> -->

        </div>

        <!-- /.box-header -->



        <div class="box-body">

            <div class="row">

                <form method="POST" action="{{ url('/') }}/team_members/add_submit" name="team_member_add_form" id="team_member_add_form" enctype="multipart/form-data">

                    {{ csrf_field() }}

                    <div class="col-md-6">

                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">

                            <label>Name</label>

                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">

                            @if ($errors->first('name'))<span class="input-group" style="color: red;">{{ $errors->first('name') }}</span>@endif

                        </div>

                        <!-- /.form-group -->

                    </div>

                    <!-- /.col -->

                    <div class="col-md-6">

                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">

                            <label>Email</label>

                            <input type="text" class="form-control" name="email" id="email" placeholder="Enter email address">

                            @if ($errors->first('email'))<span class="input-group" style="color: red;">{{ $errors->first('email') }}</span>@endif

                        </div>

                        <!-- /.form-group -->

                    </div>

                    <!-- /.col -->

                    <div class="col-md-12">

                        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">

                            <label>Description</label>

                            <textarea class="form-control" name="description" id="description" rows="8" placeholder="Enter description"></textarea>

                            @if ($errors->first('description'))<span class="input-group" style="color: red;">{{ $errors->first('description') }}</span>@endif

                        </div>

                        <!-- /.form-group -->

                        <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">

                            <label for="exampleInputFile">Image</label>

                            <input type="file" id="image" name="image">

                            @if ($errors->first('image'))<span class="input-group" style="color: red;">{{ $errors->first('image') }}</span>@endif

                        </div>

                        <!-- /.form-group -->

                        <div class="form-group">

                            <button type="submit" class="btn btn-primary" id="service_category_add_submit">Add Team Member</button>

                        </div>

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

