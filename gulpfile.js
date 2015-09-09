var elixir = require('laravel-elixir');

// Base Links
var dirSrc = 'node_modules/';
var copyDir = 'resources/assets/';
var publicDir = 'public/';

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    /*
     |--------------------------------------------------------------------------
     | Copy
     |--------------------------------------------------------------------------
     */

//    Example
//    mix.copy(dirSrc+ '', 'resources/assets/{css/less/js}');

    /**
     * For Js Copies
     */

    mix.copy(dirSrc+ 'dropzone/dist/dropzone.js', publicDir+ 'js/dropzone.js');
    mix.copy(dirSrc+ 'jquery/dist/jquery.min.js', publicDir+ 'js/jquery.js');
    mix.copy(dirSrc+ 'bootstrap/dist/js/bootstrap.min.js', publicDir+ 'js/bootstrap.min.js');
    mix.copy(dirSrc+ 'jquery-ui/*.js', copyDir+ 'js/jquery-ui.js');
    /** Check mix.script(
    /*  'jquery-ui.js','public/js/'
    /*  );
    */


    /**
     * For CSS Copies
     */

    mix.copy(dirSrc+ 'dropzone/dist/dropzone.css', publicDir+ 'css/dropzone.css');



    /*
     |--------------------------------------------------------------------------
     | Mix
     |--------------------------------------------------------------------------
     */

    /**
     * CSS Mix
     */

    mix.less('app.less');

    mix.styles('cruz.css', 'public/css/');


    /**
     * JS Mix
     */

    mix.scripts(
        'jquery-ui.js', publicDir+ 'js/'
    );

    mix.scripts('custom.js', publicDir+ 'js/');

});
