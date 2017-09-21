<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Login</title>

    <link rel="stylesheet" href="<?php echo asset('css/vendor.css'); ?>" />
    <link rel="stylesheet" href="<?php echo asset('css/app.css'); ?>" />

</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <h3>Welcome to IN+</h3>
        <p>Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
            <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
        </p>
        <p>Login in. To see it in action.</p>


        <form class="m-t" role="form" method="POST" action="<?php echo e(url('/login')); ?>">
            <?php echo e(csrf_field()); ?>


            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">

            <input id="email" type="email" class="form-control" placeholder="Username"
                   name="email" value="<?php echo e(old('email')); ?>" required autofocus>

            <?php if($errors->has('email')): ?>
                <span class="help-block">
                                <strong><?php echo e($errors->first('email')); ?></strong>
                            </span>
            <?php endif; ?>
            </div>

            <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                <input id="password" type="password"  placeholder="Password"
                       class="form-control" name="password" required>

                <?php if($errors->has('password')): ?>
                    <span class="help-block">
                                    <strong><?php echo e($errors->first('password')); ?></strong>
                                </span>
                <?php endif; ?>
            </div>

            <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> Remember Me
                        </label>
                    </div>
            </div>

            <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

            <a href="<?php echo e(url('/password/reset')); ?>"><small>Forgot password?</small></a>
            <p class="text-muted text-center"><small>Do not have an account?</small></p>
            <a class="btn btn-sm btn-white btn-block" href="<?php echo e(url('/register')); ?>">Create an account</a>

        </form>



        <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
    </div>
</div>

<!-- Mainly scripts -->
<script src="<?php echo asset('js/app.js'); ?>" type="text/javascript"></script>

</body>

</html>

