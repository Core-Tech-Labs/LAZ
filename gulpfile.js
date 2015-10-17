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
    // mix.copy(dirSrc+ 'react-avatar-cropper/lib/index.js', copyDir+ 'js/Avatar/AvatarCropper.js');
    // mix.copy(dirSrc+ 'react-avatar-cropper/example/src/index.js', copyDir+ 'js/Avatar/App.js');
    // mix.copy(dirSrc+ 'react-avatar-cropper/lib/utils.js', copyDir+ 'js/Avatar/utils.js');
    /** Check mix.script(
    /*  'jquery-ui.js','public/js/'
    /*  );
    */

   /**
    * React.js Libraries
    */
    mix.copy(dirSrc+ 'react/dist/react.js', publicDir+ 'js/react.js');
    mix.copy(dirSrc+ 'react/dist/JSXTransformer.js', publicDir+ 'js/JSXTransformer-react.js');

    /**
     *  Compiling React to Vanilla JS
     *
     */

    mix.browserify('Avatar/App.js', 'public/js/bundle.js');
    mix.browserify('FeedPost/PostFeed.js', 'public/js/feedbundle.js');


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

    mix.styles('laz.css', 'public/css/');
    mix.styles('avatar.css', 'public/css/');

    /**
     * JS Mix
     */

    mix.scripts(
        'jquery-ui.js', publicDir+ 'js/'
    );

    mix.scripts('custom.js', publicDir+ 'js/');

});
