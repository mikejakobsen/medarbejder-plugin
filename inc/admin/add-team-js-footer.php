<?php if (! defined('ABSPATH')) {
    exit;
} ?>
<script>
var j = 1000;
/* Todo: Opdater til ES6 syntax */
function add_new_content(){
  var output =    '<li class="wpsm_ac-panel single_color_box" >'+
    '<div class="col-md-12">'+
    '<div class="col-xs-12 col-md-4">'+
    '<img style="margin-bottom:15px" class="team-img-responsive" src="<?php echo mappen.'assets/images/profilepic.png'; ?>" />'+
    '<input style="margin-bottom:15px" type="button" id="upload-background" name="upload-background" value="Upload billede" class="button-primary rcsp_media_upload btn-block" onclick="wpsm_media_upload(this)" />'+
    '<input style="display:block;width:100%" type="hidden"  name="mb_photo[]" class="wpsm_ac_label_text"  value="<?php echo mappen.'assets/images/profilepic.png'; ?>"  readonly="readonly" placeholder="Vælg venligst et billede" />'+
    '</div>'+
    '<div class="col-xs-12 col-md-8">'+
    '<span class="ac_label"><?php _e('Medarbejder navn', medarbejdere); ?></span>'+
    '<input type="text"  name="mb_name[]" value="" placeholder="Skriv venligst et navn" class="wpsm_ac_label_text">'+
    '<span class="ac_label"><?php _e('Job titel', medarbejdere); ?></span>'+
    '<input type="text"  name="mb_pos[]" value="" placeholder="Skriv venligst en job titel" class="wpsm_ac_label_text">'+
    '<span class="ac_label"><?php _e('Skriv venligst en udvidet beskrivelse af medarbejderen', medarbejdere); ?></span>'+
    '<textarea  name="mb_desc[]"  placeholder="Skriv venligst en udvidet beskrivelse af medarbejderen" class="wpsm_ac_label_text"></textarea>'+
    '</div>'+
    '</div>'+
    '</li>';
  jQuery(output).hide().appendTo("#wpsm_team_panel").slideDown("slow");
  j++;

    }
    jQuery(document).ready(function(){

      jQuery('#wpsm_team_panel').sortable({

      revert: true,

      });
    });


</script>
<script>
jQuery(function(jQuery)
{
  var colorbox =
{
  wpsm_team_panel: '',
    init: function()
    {
      this.wpsm_team_panel = jQuery('#wpsm_team_panel');

      this.wpsm_team_panel.on('click', '.remove_button', function() {
        if (confirm('Er du sikker på at du vil slett den?')) {
          jQuery(this).closest('li').slideUp(600, function() {
            jQuery(this).remove();
                        });
                    }
                    return false;
                    });
                     jQuery('#delete_all_colorbox').on('click', function() {
                       if (confirm('Er du sikker på at du vil slette alle medarbejdere?')) {
                         jQuery(".single_color_box").slideUp(600, function() {
                           jQuery(".single_color_box").remove();
                            });
                            jQuery('html, body').animate({ scrollTop: 0 }, 'fast');

                        }
                        return false;
                    });

               }
            };
        colorbox.init();
    });
</script>
