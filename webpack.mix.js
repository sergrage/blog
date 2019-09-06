const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix
//     .setPublicPath('public/build')
//     .setResourceRoot('/build/')
//     .js('resources/assets/js/app.js', 'js')
//     .sass('resources/assets/sass/app.scss', 'css')
//     .version();

mix.js('resources/application/js/app.js', 'public/application/js')
    .sass('resources/application/sass/app.scss', 'public/application/css');


/*
 |--------------------------------------------------------------------------
 | ADMIN LTE
 |--------------------------------------------------------------------------
*/

mix.sass('resources/admin/admin.scss' , 'public/admin/css/admin.css')
    .scripts([
    'resources/admin/plugins/jquery/jquery.min.js',
    'resources/admin/plugins/bootstrap/js/bootstrap.bundle.min.js',
    'resources/admin/dist/js/adminlte.min.js',
    'resources/admin/plugins/croppie/croppie.min.js',
  ], 'public/admin/js/admin.js')
    .version();


mix.copy('resources/admin/plugins/ckeditor5-build-classic/build/ckeditor.js', 'public/admin/js/ckeditor.js').version();



mix.copy('resources/admin/plugins/font-awesome/fonts', 'public/admin/fonts');
// mix.copy('resources/adminLTE/admin/dist/fonts', 'public/admin/fonts');
mix.copy('resources/admin/dist/img', 'public/admin/img');
// mix.copy('resources/adminLTE/admin/plugins/iCheck/minimal/blue.png', 'public/admin/css');
