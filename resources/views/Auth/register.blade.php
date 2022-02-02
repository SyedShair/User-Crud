
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Library | Registration</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   @include('Layout.css')
</head>
<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-logo">
        <a href="{{url('/')}}"><b>Library</b></a>
    </div>
    <div class="register-box-body">
        <p class="login-box-msg">Register</p>
        <form action="{{route('user.add')}}" method="post">
            @csrf
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="name" placeholder="Full name">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                @error('name')
                <div class="alert alert-warning">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group has-feedback">
                <input type="email" class="form-control" name="email" placeholder="Email">
                <span class="glyphicon glyphicon-envelope  form-control-feedback"></span>
                @error('email')
                <div class="alert alert-warning">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @error('password')
                <div class="alert alert-warning">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="row">
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                </div><!-- /.col -->
            </div>
            <a href="{{route('login')}}" class="text-center">Login Here</a>

        </form>
    </div><!-- /.form-box -->
</div><!-- /.register-box -->


@include('Layout.js')
</body>
</html>
