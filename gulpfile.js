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
     mix.browserify('message.js', 'public/js/message.js');

    /**
     * CSS Mix
     */

    mix.styles('laz.css', 'public/css/');
    mix.styles('avatar.css', 'public/css/');
    mix.styles('color.css', 'public/css/');

    /**
     * JS Mix
     */

    mix.scripts(
        'custom.js', publicDir+ 'js/custom.js'
    );

    // For XMPP usage
    // mix.browserify('im.js', publicDir+ 'js/im.js');

    mix.scripts('error/rollbar.js', publicDir+ 'js/rollbar.js');
    // mix.scripts('message.js', publicDir+ 'js/message.js');

    /**
     * Copy
     */
    // mix.copy(dirSrc + 'strophejs-plugins/register/strophe.register.js', publicDir + 'js/strophe.register.js');

});
