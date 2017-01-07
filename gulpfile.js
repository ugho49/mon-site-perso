const elixir = require('laravel-elixir');

require('laravel-elixir-imagemin');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir.config.images = {
    outputFolder: 'build/images'
};

elixir((mix) => {

    // Compile own css and js
    mix.sass('app.scss');
    mix.scripts('app.js');

    // Copy fonts
    mix.copy('resources/assets/fonts', 'public/build/fonts');
    mix.copy('resources/assets/bower_components/materialize/dist/fonts', 'public/build/fonts');
    mix.copy('resources/assets/bower_components/font-awesome/fonts', 'public/build/fonts');

    // Vendors style
    mix.styles([
            'materialize/dist/css/materialize.min.css',
            'font-awesome/css/font-awesome.min.css',
            'animate.css/animate.min.css'
        ],
        'public/css/bundle.css', 'resources/assets/bower_components');

    // Vendors scripts
    mix.styles([
            'jquery/dist/jquery.min.js',
            'materialize/dist/js/materialize.min.js',
            'gmap3/dist/gmap3.min.js'
        ],
        'public/js/bundle.js', 'resources/assets/bower_components');

    // Images
    mix.imagemin();

    // Create Build
    mix.version([
        'css/bundle.css',
        'css/app.css',
        'js/bundle.js',
        'js/app.js'
    ]);
});
