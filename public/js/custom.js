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

Dropzone.options.profileUpload = {
    paramName:'dp',
    maxFilesize: 3,
    acceptedFiles: '.jpg, .jpeg, .png',
    clickable: true,
    dictResponseError: 'Upload Failed',
    maxFiles:1
};


/**
 * Bootstrap tooltip
 */
$(document).ready(function () {

    // Global tooltip control
  $('[data-toggle="tooltip"]').tooltip();


//Notification (Marking as Read)
  $("#notifyClick").click(function(event){
    var formData = {
      'mal': 'Mark as Unread',
    };

    $.ajax({
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: 'POST',
      url:  '/index.php/marknotify', // Having issues with apache understanding index.php
      data: formData,
      dataType: 'json',
      encode: true
    });
  });





});


//# sourceMappingURL=custom.js.map
