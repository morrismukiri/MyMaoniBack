<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MyMaoni Admin</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="/bower_components/font-awesome/css/font-awesome.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="/bower_components/ionicons/css/ionicons.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="/bower_components/admin-lte/dist/css/AdminLTE.min.css">

    <!-- iCheck -->
    <link rel="stylesheet" href="/bower_components/iCheck/skins/square/_all.css">
    
    <!-- BootstrapDatepicker -->
    <link rel="stylesheet" href="/bower_components/admin-lte/plugins/datepicker/datepicker3.css">



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-logo">
        <a href="{{ url('/home') }}"><b>MyMaoni </b>Admin</a>
    </div>

    <div class="register-box-body">
        <p class="login-box-msg">Register a new membership</p>

        <form method="post" action="{{ url('/register') }}">

            {!! csrf_field() !!}

            <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Full Name">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>

            <!--- email -->
            <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <!--- end email -->
            
            <!--- username -->
            <div class="form-group has-feedback{{ $errors->has('username') ? ' has-error' : '' }}">
                <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="username">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                @if ($errors->has('username'))
                    <span class="help-block">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
            </div>
            <!--- end username -->

             <!--- phone -->
            <div class="form-group has-feedback{{ $errors->has('phone') ? ' has-error' : '' }}">
                <input type="tel" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="phone">
                <span class="glyphicon glyphicon-phone form-control-feedback"></span>

                @if ($errors->has('phone'))
                    <span class="help-block">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                @endif
            </div>
            <!--- end phone -->
            
             <!--- dob -->
            <div class="form-group  has-feedback{{ $errors->has('dob') ? ' has-error' : '' }}">
                <input type="text" class="form-control datepicker" name="dob" value="{{ old('dob') }}"  data-provide="datepicker" >
                <span class="glyphicon glyphicon-th form-control-feedback"></span>

                @if ($errors->has('dob'))
                    <span class="help-block">
                        <strong>{{ $errors->first('dob') }}</strong>
                    </span>
                @endif
            </div>
            <!--- end dob -->

            <!--- gender -->
            <div class="form-group has-feedback{{ $errors->has('gender') ? ' has-error' : '' }}">
                <label class="radio-inline">
                    Male <input type="radio" name="gender" id="gender" value="male">
                </label>
                <label class="radio-inline">
                    Female <input type="radio" name="gender" id="gender" value="female">
                </label>              
                
                @if ($errors->has('gender'))
                    <span class="help-block">
                        <strong>{{ $errors->first('gender') }}</strong>
                    </span>
                @endif
            </div>
            <!--- end gender -->

            <!--- address -->
            <div class="form-group has-feedback{{ $errors->has('address') ? ' has-error' : '' }}">
                <input type="text" class="form-control" name="address" value="{{ old('address') }}" placeholder="address">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                @if ($errors->has('address'))
                    <span class="help-block">
                        <strong>{{ $errors->first('address') }}</strong>
                    </span>
                @endif
            </div>
            <!--- end address -->

            <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>

            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox"> I agree to the <a href="#">terms</a>
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <a href="{{ url('/login') }}" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
</div>
<!-- /.register-box -->

<script src="/bower_components/jquery/dist/jquery.min.js"></script>
<script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/bower_components/iCheck/icheck.min.js"></script>


<!-- AdminLTE App -->
<script src="/bower_components/admin-lte/dist/js/app.min.js"></script>
<script src="/bower_components/admin-lte/plugins/datepicker/bootstrap-datepicker.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
        
         $('.datepicker').datepicker({
            format: 'yyyy-mm-dd'
        });
    });
</script>
</body>
</html>
