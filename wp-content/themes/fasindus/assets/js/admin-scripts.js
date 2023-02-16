/*
 * All Admin Related Scripts in this Fasindus Theme
 * Author & Copyright:quomodotheme
 * URL: http://themeforest.net/user/quomodotheme
 */

(function($) {
"use strict";
  /*---------------------------------------------------------------*/
  /* =  Toggle Meta boxes based on post formats
  /*---------------------------------------------------------------*/
   function fasindus_gutenberg_toggle_metaboxes() {

        $(document).on('change','.editor-post-format__content select',function(){

        $('.cs-element-standard-image, .cs-element-gallery-format, .cs-element-add-gallery, .video_post_format, .quote_post_format').hide();

          var format = $(this).children("option:selected").val();
          console.log( format );

          if (format == '0' || format == 'image') {
              $('').slideUp('fast');
              $('.cs-element-standard-image').slideDown('slow');
          }
          if (format == 'gallery') {
              $('').slideUp('fast');
              $('.cs-element-gallery-format, .cs-element-add-gallery').slideDown('slow');
          }
          if (format == 'video') {
              $('').slideUp('fast');
              $('#post_type_metabox .video_post_format').slideDown('slow');
          }
          if (format == 'quote') {
              $('').slideUp('fast');
              $('#post_type_metabox .quote_post_format').slideDown('slow');
          }
        });
  }
  function fasindus_toggle_metaboxes() {

    var format = $("input[name='post_format']:checked").val();

    $('.cs-element-standard-image, .cs-element-gallery-format, .cs-element-add-gallery, .video_post_format, .quote_post_format').hide();

    if (format == '0' || format == 'image') {
        $('').slideUp('fast');
        $('.cs-element-standard-image').slideDown('slow');
    }
    if (format == 'gallery') {
        $('').slideUp('fast');
        $('.cs-element-gallery-format, .cs-element-add-gallery').slideDown('slow');
    }
    if (format == 'video') {
        $('').slideUp('fast');
        $('#post_type_metabox .video_post_format').slideDown('slow');
    }
    if (format == 'quote') {
        $('').slideUp('fast');
        $('#post_type_metabox .quote_post_format').slideDown('slow');
    }

  }

  $(document).ready(function() {
      fasindus_gutenberg_toggle_metaboxes();
      fasindus_toggle_metaboxes();
    $('#post-formats-select input[type="radio"]').on('click', fasindus_toggle_metaboxes);
  });

})(jQuery);