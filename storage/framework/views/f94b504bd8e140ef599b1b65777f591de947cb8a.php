<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Register</title>

    <link rel="stylesheet" href="<?php echo asset('css/vendor.css'); ?>" />
    <link rel="stylesheet" href="<?php echo asset('css/app.css'); ?>" />

</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen   animated fadeInDown">
    <div>
        <h3>Register to IN+</h3>
        <p>Create account to see it in action.</p>
        <form class="m-t" role="form"  method="POST" action="<?php echo e(url('/register')); ?>">
            <div class="form-group">

                <input id="name" type="text" class="form-control" placeholder="Name"
                       name="name" value="<?php echo e(old('name')); ?>" required autofocus>

                <?php if($errors->has('name')): ?>
                    <span class="help-block">
							<strong><?php echo e($errors->first('name')); ?></strong>
						</span>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <input id="email" type="email" class="form-control" placeholder="Email"
                       name="email" value="<?php echo e(old('email')); ?>" required>
                <?php if($errors->has('email')): ?>
                    <span class="help-block">
							<strong><?php echo e($errors->first('email')); ?></strong>
						</span>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <input id="password" type="password" placeholder="Password"
                       class="form-control" name="password" required>
                <?php if($errors->has('password')): ?>
                    <span class="help-block">
							<strong><?php echo e($errors->first('password')); ?></strong>
						</span>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <input id="password-confirm" type="password"  placeholder="Confirm Password"
                       class="form-control" name="password_confirmation" required>
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">Register</button>

            <p class="text-muted text-center"><small>Already have an account?</small></p>
            <a class="btn btn-sm btn-white btn-block" href="<?php echo e(url('/login')); ?>">Login</a>
        </form>
        <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
    </div>
</div>

<!-- Mainly scripts -->
<script src="<?php echo asset('js/app.js'); ?>" type="text/javascript"></script>
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
