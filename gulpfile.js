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

    /**
     * Browserfiy
     */
     // mix.browserify('workfile.js', 'public/js/workfile.js');

    /**
     * CSS Mix
     */

    mix.styles('laz.css', 'public/css/');
    mix.styles('avatar.css', 'public/css/');
    mix.styles('color.css', 'public/css/');

    /**
     * JS Mix
     */

    mix.scripts('custom.js', publicDir+ 'js/custom.js');

    // dev
    mix.scripts('error/rollbar.js', publicDir+ 'js/rollbar.js');


    /**
     * Copy
     */



});
