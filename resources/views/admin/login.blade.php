@extends('admin.layout.login_layout')

@section('content')

    <div class="login-box">

        <div class="login-logo">

            <a href=""><b>ELTA Admin</b></a>

        </div>

        <!-- /.login-logo -->

        <div class="login-box-body">

            <p class="login-box-msg">Sign in to ELTA</p>

            @if(Session::has('login-failed'))

                <p class="login-box-msg" style="color: red;">{{ Session::get('login-failed') }}</p>

            @endif

            <form action="{{ url('/') }}/login-submit" method="post">

                {{ csrf_field() }}

                <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">

                    <input type="email" class="form-control" placeholder="Email" name="email" id="email">

                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                    <span class="input-group col-md-offset-2" style="color: red;">{{ $errors->first('email') }}</span>

                </div>

                <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">

                    <input type="password" class="form-control" placeholder="Password" name="password" id="password">

                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                    <span class="input-group col-md-offset-2" style="color: red;">{{ $errors->first('password') }}</span>

                </div>

                <div class="row">

                    <!-- /.col -->

                    <div class="col-xs-6 col-xs-offset-3">

                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>

                    </div>

                    <!-- /.col -->

                </div>

            </form>

            <!-- <br>

            <a href="#" class="login_forgot_password">Forget your password?</a><br> -->

        </div>

        <!-- /.login-box-body -->

    </div>

    <!-- /.login-box -->

@endsection

