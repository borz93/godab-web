var elixir = require('laravel-elixir');

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

elixir(function(mix) {
    mix.sass('app.scss').browserify('app.js');
    mix.styles([
        './bower_components/seiyria-bootstrap-slider/dist/css/bootstrap-slider.css',
        'AdminLTE.css',
        'various.css',
        'skin-black.min.css',
        'dataTables.bootstrap.css',
    ], 'public/css/admin.css')
    .styles([
        './node_modules/bootstrap-material-design/dist/css/ripples.min.css',
        './node_modules/bootstrap-material-design/dist/css/bootstrap-material-design.css',
        //'./bower_components/nouislider/distribute/nouislider.min.css',
        'front-end.various.css'
    ],'public/css/front-end.css')
    .scripts([
        'admin.js',
        'jquery.dataTables.js',
        './bower_components/seiyria-bootstrap-slider/dist/bootstrap-slider.js',
        'dataTables.bootstrap.min.js'
    ], 'public/js/admin.js')
    .scripts([
        './bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js'
    ], 'public/js/bootstrap-tagsinput.min.js')
    .scripts([
        './node_modules/jquery-match-height/dist/jquery.matchHeight.js'
    ], 'public/js/jquery.matchHeight.js')
    .scripts([
        './bower_components/adaptive.background/src/jquery.adaptive-backgrounds.js'
    ], 'public/js/jquery.adaptive-backgrounds.js')
    .scripts([
        './node_modules/bootstrap-material-design/dist/js/material.min.js',
        './node_modules/bootstrap-material-design/dist/js/ripples.min.js'
    ], 'public/js/material.js')
    .scripts([
        'front-end.various.js',
        './node_modules/bootstrap-material-design/dist/js/ripples.min.js',
        'social-media.js',
    ], 'public/js/front-end.js')
    .scripts([
        './bower_components/nouislider/distribute/nouislider.min.js'
    ], 'public/js/nouislider.min.js')
    .scripts([
        './bower_components/trunk8/trunk8.js'
    ], 'public/js/trunk8.js')
    //.scripts([
    //    'bootstrap.min.js'
    //], 'public/js/bootstrap.js')
    .copy([
        'vendor/fortawesome/font-awesome/fonts',
        'node_modules/bootstrap-sass/assets/fonts'
    ],'public/fonts'
    );

});
