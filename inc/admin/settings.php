<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
$De_Settings = unserialize(get_option('Team_B_default_Settings'));
$PostId = $post->ID;
$Settings = unserialize(get_post_meta( $PostId, 'Team_B_Settings', true));

$option_names = array(
  "team_mb_name_clr"     => $De_Settings['team_mb_name_clr'],
  "team_mb_pos_clr"      => $De_Settings['team_mb_pos_clr'],
  "team_mb_desc_clr"     => $De_Settings['team_mb_desc_clr'],
  "team_mb_name_ft_size"     => $De_Settings['team_mb_name_ft_size'],
  "team_mb_pos_ft_size"      => $De_Settings['team_mb_pos_ft_size'],
  "team_mb_desc_ft_size"     => $De_Settings['team_mb_desc_ft_size'],
  "font_family"      => $De_Settings['font_family'],
  "team_layout"      => $De_Settings['team_layout'],
  "custom_css"   => $De_Settings['custom_css'],
  "team_mb_wrap_bg_clr"      => $De_Settings['team_mb_wrap_bg_clr'],
  "design"   => $De_Settings['design'],


);

foreach($option_names as $option_name => $default_value) {
  if(isset($Settings[$option_name])) 
    ${"" . $option_name}  = $Settings[$option_name];
  else
    ${"" . $option_name}  = $default_value;
}


?>


<Script>

 //Font max 30 min 8.
  jQuery(function() {
    jQuery( "#team_mb_name_ft_size_id" ).slider({
        orientation: "horizontal",
        range: "min",
        max: 30,
        min:8,
        slide: function( event, ui ) {
        jQuery( "#team_mb_name_ft_size" ).val( ui.value );
      }
        });

        jQuery( "#team_mb_name_ft_size_id" ).slider("value",<?php echo $team_mb_name_ft_size; ?> );
        jQuery( "#team_mb_name_ft_size" ).val( jQuery( "#team_mb_name_ft_size_id" ).slider( "value") );

  });
</script>
<Script>

 //font slider size script
  jQuery(function() {
    jQuery( "#team_mb_pos_ft_size_id" ).slider({
        orientation: "horizontal",
        range: "min",
        max: 25,
        min:8,
        slide: function( event, ui ) {
        jQuery( "#team_mb_pos_ft_size" ).val( ui.value );
      }
        });

        jQuery( "#team_mb_pos_ft_size_id" ).slider("value",<?php echo $team_mb_pos_ft_size; ?> );
        jQuery( "#team_mb_pos_ft_size" ).val( jQuery( "#team_mb_pos_ft_size_id" ).slider( "value") );

  });
</script>
<Script>

 //font slider size script
  jQuery(function() {
    jQuery( "#team_mb_desc_ft_size_id" ).slider({
        orientation: "horizontal",
        range: "min",
        max: 25,
        min:8,
        slide: function( event, ui ) {
        jQuery( "#team_mb_desc_ft_size" ).val( ui.value );
      }
        });

        jQuery( "#team_mb_desc_ft_size_id" ).slider("value",<?php echo $team_mb_desc_ft_size; ?> );
        jQuery( "#team_mb_desc_ft_size" ).val( jQuery( "#team_mb_desc_ft_size_id" ).slider( "value") );

  });
</script>
<Script>
function wpsm_update_default(){
     jQuery.ajax({
        url: location.href,
        type: "POST",
        data : {
                'action123':'default_settins_action',
                 },
                success : function(data){
                                    alert("Default Settings Updated");
                                    location.reload(true);
                                   }
    });

}
</script>
<style>
.wp-color-result{
    height:24px;
}
</style>
<?php

if (isset($_POST['action123']) == "default_settins_action") {
    $Settings_Array2 = serialize(array(
                "team_mb_name_clr"   => $team_mb_name_clr,
                "team_mb_pos_clr" => $team_mb_pos_clr,
                "team_mb_desc_clr" => $team_mb_desc_clr,
                "team_mb_name_ft_size"   => $team_mb_name_ft_size,
                "team_mb_pos_ft_size"   => $team_mb_pos_ft_size,
                "team_mb_desc_ft_size"   => $team_mb_desc_ft_size,
                "font_family"   => $font_family,
                "team_layout"   => $team_layout,
                "team_mb_wrap_bg_clr"    =>$team_mb_wrap_bg_clr ,
                "design"     => $design,
                ));

            update_option('Team_B_default_Settings', $Settings_Array2);
}

    ?>
<input type="hidden" id="team_b_setting_save_action" name="team_b_setting_save_action" value="tabs_setting_save_action">

<table class="form-table acc_table">
    <tbody>
        <tr>
            <th scope="row"><label><?php _e('Farve til navnet', mappen); ?></label>
                <a  class="ac_tooltip" href="#help" data-tooltip="#team_mb_name_clr_tp"><i class="fa fa-lightbulb-o"></i></a>
            </th>
            <td>
                <input id="team_mb_name_clr" name="team_mb_name_clr" type="text" value="<?php echo $team_mb_name_clr; ?>" class="my-color-field" data-default-color="#e8e8e8" />
                <div id="team_mb_name_clr_tp" style="display:none;">
                    <div style="color:#fff !important;padding:10px;">
                        <p style="color:#fff !important;"><?php _e('Farve til job titel', mappen); ?></p>
                        <img src="<?php echo mappen.'assets/images/kat.jpg'; ?>">
                    </div>
                </div>
            </td>
        </tr>

        <tr>
            <th scope="row"><label><?php _e('Farve til job titel', mappen); ?></label>
                <a  class="ac_tooltip" href="#help" data-tooltip="#team_mb_pos_clr_tp"><i class="fa fa-lightbulb-o"></i></a>
            </th>
            <td>
                <input id="team_mb_pos_clr" name="team_mb_pos_clr" type="text" value="<?php echo $team_mb_pos_clr; ?>" class="my-color-field" data-default-color="#e8e8e8" />
                <div id="team_mb_pos_clr_tp" style="display:none;">
                    <div style="color:#fff !important;padding:10px;">
                        <p style="color:#fff !important;"><?php _e('Farve til job titel', mappen); ?></p>
                        <img src="<?php echo mappen.'assets/images/kat.jpg'; ?>">
                    </div>
                </div>
            </td>
        </tr>

        <tr>
            <th scope="row"><label><?php _e('Farve til medarbejder tekst', mappen); ?></label>
                <a  class="ac_tooltip" href="#help" data-tooltip="#team_mb_pos_clr_tp"><i class="fa fa-lightbulb-o"></i></a>
            </th>
            <td>
                <input id="team_mb_desc_clr" name="team_mb_desc_clr" type="text" value="<?php echo $team_mb_desc_clr; ?>" class="my-color-field" data-default-color="#e8e8e8" />
                <div id="team_mb_desc_clr_tp" style="display:none;">
                    <div style="color:#fff !important;padding:10px;">
                        <p style="color:#fff !important;"><?php _e('Farve til medarbejder tekst', mappen); ?></p>
                        <img src="<?php echo mappen.'assets/images/kat.jpg'; ?>">
                    </div>
                </div>
            </td>
        </tr>

        <tr class="setting_color">
            <th><label><?php _e('Tekst størrelse til navnet', mappen); ?></label>
            </th>
            <td>
                <div id="team_mb_name_ft_size_id" class="size-slider" ></div>
                <input type="text" class="slider-text" id="team_mb_name_ft_size" name="team_mb_name_ft_size"  readonly="readonly">
            </td>
        </tr>



        <tr class="setting_color">
            <th><label><?php _e('Tekst størrelse til job titel', mappen); ?></label>
            </th>
            <td>
                <div id="team_mb_pos_ft_size_id" class="size-slider" ></div>
                <input type="text" class="slider-text" id="team_mb_pos_ft_size" name="team_mb_pos_ft_size"  readonly="readonly">
            </td>
        </tr>

        <tr class="setting_color">
            <th><label><?php _e('Tekst størrelse til medarbejder beskrivelsen', mappen); ?></label>
            </th>
            <td>
                <div id="team_mb_desc_ft_size_id" class="size-slider" ></div>
                <input type="text" class="slider-text" id="team_mb_desc_ft_size" name="team_mb_desc_ft_size"  readonly="readonly">
            </td>
        </tr>


        <tr >
            <th><label><?php _e('Font Style/Family', mappen); ?></label>
                <a  class="ac_tooltip" href="#help" data-tooltip="#font_family_tp"><i class="fa fa-lightbulb-o"></i></a>
            </th>
            <td>
                <select name="font_family" id="font_family" class="standard-dropdown" style="width:100%" >
                    <optgroup label="Default Fonts">
                        <option value="Arial"           <?php if ($font_family == 'Arial') {
                            echo "selected";
} ?>>Arial</option>
                        <option value="Arial Black"    <?php if ($font_family == 'Arial Black') {
                            echo "selected";
} ?>>Arial Black</option>
                        <option value="Courier New"     <?php if ($font_family == 'Courier New') {
                            echo "selected";
} ?>>Courier New</option>
                        <option value="Georgia"         <?php if ($font_family == 'Georgia') {
                            echo "selected";
} ?>>Georgia</option>
                        <option value="Grande"          <?php if ($font_family == 'Grande') {
                            echo "selected";
} ?>>Grande</option>
                        <option value="Helvetica"   <?php if ($font_family == 'Helvetica') {
                            echo "selected";
} ?>>Helvetica Neue</option>
                        <option value="Impact"         <?php if ($font_family == 'Impact') {
                            echo "selected";
} ?>>Impact</option>
                        <option value="Lucida"         <?php if ($font_family == 'Lucida') {
                            echo "selected";
} ?>>Lucida</option>
                        <option value="Lucida Grande"         <?php if ($font_family == 'Lucida Grande') {
                            echo "selected";
} ?>>Lucida Grande</option>
                        <option value="Open Sans"   <?php if ($font_family == 'Open Sans') {
                            echo "selected";
} ?>>Open Sans</option>
                        <option value="OpenSansBold"   <?php if ($font_family == 'OpenSansBold') {
                            echo "selected";
} ?>>OpenSansBold</option>
                        <option value="Palatino Linotype"       <?php if ($font_family == 'Palatino Linotype') {
                            echo "selected";
} ?>>Palatino</option>
                        <option value="Sans"           <?php if ($font_family == 'Sans') {
                            echo "selected";
} ?>>Sans</option>
                        <option value="sans-serif"           <?php if ($font_family == 'sans-serif') {
                            echo "selected";
} ?>>Sans-Serif</option>
                        <option value="Tahoma"         <?php if ($font_family == 'Tahoma') {
                            echo "selected";
} ?>>Tahoma</option>
                        <option value="Times New Roman"          <?php if ($font_family == 'Times New Roman') {
                            echo "selected";
} ?>>Times New Roman</option>
                        <option value="Trebuchet"      <?php if ($font_family == 'Trebuchet') {
                            echo "selected";
} ?>>Trebuchet</option>
                        <option value="Verdana"        <?php if ($font_family == 'Verdana') {
                            echo "selected";
} ?>>Verdana</option>
                        <option value="0"        <?php if ($font_family == '0') {
                            echo "selected";
} ?>>Temaets</option>
                    </optgroup>
                </select>
                <div id="font_family_tp" style="display:none;">
                    <div style="color:#fff !important;padding:10px;max-width: 300px;">
                        <p style="color:#fff !important;">Her kan du vælge den benyttede skrifttype.</p>

                    </div>
                </div>
            </td>
        </tr>


        <tr>
            <th><label><?php _e('Team Column Display layout ', mappen); ?> </label>
                <a  class="ac_tooltip" href="#help" data-tooltip="#team_layout_tp"><i class="fa fa-lightbulb-o"></i></a>
            </th>
            <td>
                <select name="team_layout" id="team_layout" class="standard-dropdown" style="width:100%" >
                        <option value="12"  <?php if ($team_layout == '6') {
                            echo "selected";
} ?>>1 Kolonne</option>
                        <option value="6"  <?php if ($team_layout == '6') {
                            echo "selected";
} ?>>2 Kolonner</option>
                        <option value="4"  <?php if ($team_layout == '4') {
                            echo "selected";
} ?>>3  Kolonner</option>
                        <option value="3"  <?php if ($team_layout == '3') {
                            echo "selected";
} ?>>4 Kolonner</option>
                        <option value="2"  <?php if ($team_layout == '2') {
                            echo "selected";
} ?>>6 Kolonner</option>
                        <option value="1"  <?php if ($team_layout == '1') {
                            echo "selected";
} ?>>12 Kolonner</option>

                </select>
                <div id="team_layout_tp" style="display:none;">
                    <div style="color:#fff !important;padding:10px;max-width: 300px;">
                        <p style="color:#fff !important;">Vælg hvor mange kolonner medarbejderne skal vises over</p>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <th scope="row"><label><?php _e('Baggrundsfarve', mappen); ?></label>
                <a  class="ac_tooltip" href="#help" data-tooltip="#team_mb_wrap_bg_clr_2_tp"><i class="fa fa-lightbulb-o"></i></a>
            </th>
            <td>
                <input id="team_mb_wrap_bg_clr" name="team_mb_wrap_bg_clr" type="text" value="<?php echo $team_mb_wrap_bg_clr; ?>" class="my-color-field" data-default-color="#e8e8e8" />
                <div id="team_mb_wrap_bg_clr_2_tp" style="display:none;">
                    <div style="color:#fff !important;padding:10px;">
                        <p style="color:#fff !important;"><?php _e('Vælg en anden baggrunds farve til medarbejder boksen', mappen); ?></p>
                        <img src="<?php echo mappen.'assets/images/kat.jpg'; ?>">
                    </div>
                </div>
            </td>
        </tr>

        <script>

        jQuery('.ac_tooltip').darkTooltip({
                opacity:1,
                gravity:'east',
                size:'small'
            });


        </script>
    </tbody>
</table>
