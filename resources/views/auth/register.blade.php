<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Register</title>

    <link rel="stylesheet" href="{!! asset('css/vendor.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/app.css') !!}" />

</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen   animated fadeInDown">
    <div>
        <h3>Register to IN+</h3>
        <p>Create account to see it in action.</p>
        <form class="m-t" role="form"  method="POST" action="{{ url('/register') }}">
            {{ csrf_field() }}
            <div class="form-group">

                <input id="name" type="text" class="form-control" placeholder="Name"
                       name="name" value="{{ old('name') }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="help-block">
							<strong>{{ $errors->first('name') }}</strong>
						</span>
                @endif
            </div>
            <div class="form-group">
                <input id="email" type="email" class="form-control" placeholder="Email"
                       name="email" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                    <span class="help-block">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
                @endif
            </div>
            <div class="form-group">
                <input id="password" type="password" placeholder="Password"
                       class="form-control" name="password" required>
                @if ($errors->has('password'))
                    <span class="help-block">
							<strong>{{ $errors->first('password') }}</strong>
						</span>
                @endif
            </div>
            <div class="form-group">
                <input id="password-confirm" type="password"  placeholder="Confirm Password"
                       class="form-control" name="password_confirmation" required>
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">Register</button>

            <p class="text-muted text-center"><small>Already have an account?</small></p>
            <a class="btn btn-sm btn-white btn-block" href="{{ url('/login') }}">Login</a>
        </form>
        <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
    </div>
</div>

<!-- Mainly scripts -->
<script src="{!! asset('js/app.js') !!}" type="text/javascript"></script>
<script>
    $(document).ready(function(){
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });
</script>
</body>

</html>
