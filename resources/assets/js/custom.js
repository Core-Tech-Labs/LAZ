/* custom.js file
* All custom jquery/javascript code sites here
*/




/**
 * Dropzone
 *
 */

Dropzone.options.massUpload = {
    maxFilesize: 3,
    acceptedFiles: '.jpg, .jpeg, .png',
    clickable: true,
    dictResponseError: 'Upload Failed',

};

/**
 * Bootstrap tooltip
 */
$(document).ready(function () {
  $('[data-toggle="tooltip"]').tooltip();
});

