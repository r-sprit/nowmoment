const elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
    mix.sass('app.scss');
mix.copy('resources/assets/vendor/bootstrap/fonts', 'public/fonts');
mix.copy('resources/assets/vendor/font-awesome/fonts', 'public/fonts')
mix.styles([
    'resources/assets/vendor/bootstrap/css/bootstrap.css',
    'resources/assets/vendor/font-awesome/css/font-awesome.css',
    'resources/assets/css/plugins/iCheck/custom.css',
    'resources/assets/css/plugins/fullcalendar/fullcalendar.css',
    'resources/assets/css/plugins/dataTables/datatables.min.css',
	'resources/assets/vendor/animate/animate.css',
	//'resources/assets/vendor/animate/style.css',
    'resources/assests/vendor/'
], 'public/css/vendor.css', './');
mix.scripts([
    'resources/assets/js/plugins/fullcalendar/moment.min.js',
    'resources/assets/vendor/jquery/jquery-3.1.1.min.js',
    'resources/assets/vendor/bootstrap/js/bootstrap.js',
    'resources/assets/vendor/metisMenu/jquery.metisMenu.js',
    'resources/assets/vendor/slimscroll/jquery.slimscroll.min.js',
	'resources/assets/js/app.js',
    'resources/assets/vendor/pace/pace.min.js',
    'resources/assets/js/plugins/jquery-ui/jquery-ui.min.js',
    'resources/assets/js/plugins/iCheck/icheck.min.js',
    'resources/assets/js/plugins/fullcalendar/fullcalendar.min.js',
	'resources/assets/js/plugins/sparkline/jquery.sparkline.min.js',
    'resources/assets/js/plugins/dataTables/datatables.min.js',
], 'public/js/app.js', './');

});
