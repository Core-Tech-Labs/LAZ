/* custom.js file
* All custom jquery/javascript code sites here
*/


/**
*   For button animation on user Profile picture
*
*/
// $(document).ready(function($){
//     $('div.profile-img-upload').hide();

//     $('.img-circle').animate({
//         backgroundColor: "#000000",
//         opacity: "0.90"
//     }).hover(function( event ){
//             $('div.profile-img-upload').slideToggle();
//         });
// });


/**
*   For upload button on user Profile
*   (Needs to move to custom.js)
*/

    $(document).on('change', '.btn-file :file', function() {
  var input = $(this),
      numFiles = input.get(0).files ? input.get(0).files.length : 1,
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
  input.trigger('fileselect', [numFiles, label]);
});

$(document).ready( function() {
    $('.btn-file :file').on('fileselect', function(event, numFiles, label) {

        var input = $(this).parents('.input-group').find(':text'),
            log = numFiles > 1 ? numFiles + ' files selected' : label;

        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }

    });
});