<?php if (! defined('ABSPATH')) {
    exit;
} ?>
<style>
    .valgt {
        position: absolute;
        /* Bootstrap success farve */
        background: #11CAA5;
        color: #fff;
        top: -14px;
        right: 5px;
        border-radius: 50%;
        width: 35px;
        height: 35px;
        text-align: center;
        line-height: 29px;
        z-index: 999;
        font-size: 18px;
        border: 3px solid #fff;
    }
    .admin__title {
        font-size:25px !important;
    }
    .wpsm_home_portfolio_showcase{
        position: relative;
    width: 100%;
    overflow: hidden;
    }
    </style>
    <h2 class="admin__title">Vælg Layout</h2>
    <?php

    $De_Settings = unserialize(get_option('Team_B_default_Settings'));
    $PostId = $post->ID;
    $Settings = unserialize(get_post_meta($PostId, 'Team_B_Settings', true));

    if (isset($Settings['design'])) {
        $templates = $Settings['design'];
    } else {
         $templates = 1;
    }
    ?>
<div style=" overflow: hidden;padding: 20px;margin-bottom:30px;">
    <?php for ($i=1; $i<=3; $i++) { ?>
        <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="demo__layout">
                <span class="valgt" id="valgt_<?php echo $i; ?>" <?php if ($templates!=$i) {
?>  style="display:none" <?php
} ?> ><i style="line-height:30px;" class="fa fa-check"></i></span>
                <div class="">
                    <div class="wpsm_home_portfolio_showcase">
                        <img class="wpsm_img_responsive ftr_img" src="<?php echo mappen.'assets/images/team-'.$i.'.png'?>">
                    </div>
                </div>
                <div style="padding:13px;overflow:hidden; background: #EFEFEF; border-top: 1px dashed #ccc;">
                    <h3 class="pull-left" style="margin-top: 10px;margin-bottom: 10px;font-weight:900">Design <?php echo $i; ?></h3>

                    <button type="button" <?php if ($templates==$i) {
?> disabled="disabled" style="background:#11caa5;border-color:#11caa5;" <?php
} ?> class="pull-right btn btn-primary design_btn" id="templates_btn<?php echo $i; ?>" onclick="select_template('<?php echo $i; ?>')"><?php if ($templates==$i) {
    echo "Valgt";
} else {
    echo "Vælg";
} ?></button>

                    <input type="radio" name="design" id="design<?php echo $i; ?>" value="<?php echo $i; ?>" <?php if ($templates==$i) {
                        echo "checked";
} ?> style="display:none">
                </div>
            </div>
        </div>
    <?php } ?>
    <script>

    function select_template(id)
    {

        jQuery(".design_btn").attr('style','');
        jQuery(".design_btn").prop("disabled", false);
        jQuery(".design_btn").text("Vælg");
        jQuery(".valgt").hide();
        jQuery("#valgt_"+id).show();
        if(id==8){
            jQuery(".top_border_color_group").show();

        }
        else{
            jQuery(".top_border_color_group").hide();

        }


        jQuery("#templates_btn"+id).attr('disabled','disabled');
        jQuery("#templates_btn"+id).attr('style','background:#11caa5;border-color:#11caa5;');
        jQuery("#templates_btn"+id).text("Valgt");
         jQuery("#design"+id).prop( "checked", true );

    }

</script>
</div>
<div style=" overflow: hidden;padding: 10px;">
    <h3><?php _e('Add Team Member Here', medarbejdere); ?></h3>
    <input type="hidden" name="team_b_save_data_action" value="team_b_save_data_action" />
    <ul class="clearfix" id="wpsm_team_panel">
        <?php
        $i=1;
        $All_data = unserialize(get_post_meta($post->ID, 'medarbejder_plugin_data', true));
        $TotalCount =  get_post_meta($post->ID, 'medarbejder_plugin_count', true);
        if ($TotalCount) {
            if ($TotalCount>0) {
                foreach ($All_data as $single_data) {
                    $mb_photo = $single_data['mb_photo'];
                     $mb_name = $single_data['mb_name'];
                     $mb_pos = $single_data['mb_pos'];
                     $mb_desc = $single_data['mb_desc'];
                    ?>

                    <li class="wpsm_ac-panel single_color_box" >
                        <div class="col-xs-12">
                            <div class="col-xs-12 col-md-4">
                                <img style="margin-bottom:15px" class="team-img-responsive" src="<?php echo $mb_photo; ?>" />
                                <input style="margin-bottom:15px" type="button" id="upload-background" name="upload-background" value="Upload billede" class="button-primary rcsp_media_upload btn-block"  onclick="wpsm_media_upload(this)"/>
                                <input style="display:block;width:100%" type="hidden"  name="mb_photo[]" class="wpsm_ac_label_text"  value="<?php echo $mb_photo; ?>"  readonly="readonly" placeholder="Vælg venligst et billede" />
                            </div>
                            <div class="col-xs-12 col-md-8">
                                <span class="ac_label"><?php _e('Medarbejder navn', medarbejdere); ?></span>
                                <input type="text"  name="mb_name[]" value="<?php echo esc_attr($mb_name); ?>" placeholder="Medarbejder navn" class="wpsm_ac_label_text">

                                <span class="ac_label"><?php _e('Job titel', medarbejdere); ?></span>
                                <input type="text"  name="mb_pos[]" value="<?php echo esc_attr($mb_pos); ?>" placeholder="Skriv venligst en job titel" class="wpsm_ac_label_text">
                                <span class="ac_label"><?php _e('Medarbejder tekst', medarbejdere); ?></span>
                                <textarea  name="mb_desc[]"  placeholder="Skriv venligst en udvidet beskrivelse af medarbejderen" class="wpsm_ac_label_text"><?php echo esc_html($mb_desc); ?></textarea>
                            </div>
                        </div>
                    </li>
                    <?php
                    $i++;
                } // end of foreach
            } else {
                echo "<h2>Ingen medarbejdere fundet</h2>";
            }
        } else {
            for ($i=1; $i<=3; $i++) {
            ?>
                <li class="wpsm_ac-panel single_color_box" >
                    <div class="col-xs-12">
                        <div class="col-xs-12 col-md-4">
                            <img style="margin-bottom:15px" class="team-img-responsive" src="<?php echo mappen.'assets/images/profilepic.png'; ?>" />
                            <input style="margin-bottom:15px" type="button" id="upload-background" name="upload-background" value="Upload billede" class="button-primary rcsp_media_upload btn-block"  onclick="wpsm_media_upload(this)"/>
                            <input style="display:block;width:100%" type="hidden"  name="mb_photo[]" class="wpsm_ac_label_text"  value="<?php echo mappen.'assets/images/profilepic.png'; ?>"  readonly="readonly" placeholder="Vælg venligst et billede" />
                        </div>
                        <div class="col-xs-12 col-md-8">
                            <span class="ac_label"><?php _e('Medarbejder navn', medarbejdere); ?></span>
                            <input type="text"  name="mb_name[]" value="Navn" placeholder="Medarbejder navn" class="wpsm_ac_label_text">

                            <span class="ac_label"><?php _e('Job titel', medarbejdere); ?></span>
                            <input type="text"  name="mb_pos[]" value="Job" placeholder="Skriv venligst en job titel" class="wpsm_ac_label_text">
                            <span class="ac_label"><?php _e('Medarbejder tekst', medarbejdere); ?></span>
                            <textarea  name="mb_desc[]"  placeholder="Skriv venligst en udvidet beskrivelse af medarbejderen" class="wpsm_ac_label_text">...</textarea>
                        </div>
                    </div>
                </li>
                <?php
            }
        }
        ?>
    </ul>
    <div style="display:block;margin-top:20px;overflow:hidden;width: 100%;float:left;">
        <div class="col-md-6">
            <a class="btn " id="add_new_ac" onclick="add_new_content()"  style="overflow:hidden;font-size: 22px;font-weight: 600; padding:10px 30px 10px 30px; background:#1e73be;width:100%;color:#fff;text-align:center"  >
                <?php _e('Tilføj medarbejder', medarbejdere); ?>
            </a>
        </div>
        <div class="col-md-2">
        <a  style="float: left;width:100%;padding:10px !important;background:#31a3dd;" class=" add_wpsm_ac_new delete_all_acc" id="delete_all_colorbox"    >
            <i style="font-size:22px;"class="fa fa-trash-o"></i><?php _e('Slet alle', medarbejdere); ?>
        </a>
        </div>
    </div>

</div>
<?php require('add-team-js-footer.php'); ?>
