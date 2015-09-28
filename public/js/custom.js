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



/**
 * Dropzone
 *
 */

Dropzone.options.massUpload = {
    maxFilesize: 3,
    acceptedFiles: '.jpg, .jpeg, .png',
    clickable: true,

};


//# sourceMappingURL=custom.js.map