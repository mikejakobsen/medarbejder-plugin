<?php
if ( ! defined( 'ABSPATH' ) ) exit;
add_shortcode( 'TEAM_B', 'TEAM_B_ShortCode' );
function TEAM_B_ShortCode( $Id ) {
    ob_start(); 
    if(!isset($Id['id'])) 
     {
        $WPSM_Team_ID = "";
     } 
    else 
    {
        $WPSM_Team_ID = $Id['id'];
    }
    
    $post_type = "team_builder";
    $AlleMedarbejdere = array(  'p' => $WPSM_Team_ID, 'post_type' => $post_type, 'orderby' => 'ASC');
    $loop = new WP_Query( $AlleMedarbejdere );
    
    while ( $loop->have_posts() ) : $loop->the_post();
    
        $De_Settings = unserialize(get_option('Team_B_default_Settings'));
        $PostId = get_the_ID();
        $Settings = unserialize(get_post_meta( $PostId, 'Team_B_Settings', true));

        $option_names = array(
            "team_mb_name_clr"   => $De_Settings['team_mb_name_clr'],
            "team_mb_pos_clr"    => $De_Settings['team_mb_pos_clr'],
            "team_mb_desc_clr"   => $De_Settings['team_mb_desc_clr'],
            "team_mb_name_ft_size"   => $De_Settings['team_mb_name_ft_size'],
            "team_mb_pos_ft_size"    => $De_Settings['team_mb_pos_ft_size'],
            "team_mb_desc_ft_size"   => $De_Settings['team_mb_desc_ft_size'],
            "font_family"    => $De_Settings['font_family'],
            "team_layout"    => $De_Settings['team_layout'],
            "team_mb_wrap_bg_clr"    => $De_Settings['team_mb_wrap_bg_clr'],
            "design"     => $De_Settings['design'],
        );
        
        foreach($option_names as $option_name => $default_value) {
            if(isset($Settings[$option_name])) 
                ${"" . $option_name}  = $Settings[$option_name];
            else
                ${"" . $option_name}  = $default_value;
        }
        
        $All_data = unserialize(get_post_meta( $PostId, 'medarbejder_plugin_data', true));
        $TotalCount =  get_post_meta( $PostId, 'medarbejder_plugin_count', true );
        
        require("design-".$design."/index.php"); 
        
    endwhile;
    
    wp_reset_query();
    return ob_get_clean();
}
?>
