<?php
/**
 * Plugin Name: Medarbejdere
 * Version: 0.0.1
 * Description:  Medarbejder modul
 * Author: Mike Jakobsen
 * Author URI: http://www.mikejakobsen.com
 */

if (! defined('ABSPATH')) {
    exit;
}
 /**
 * DEFINE PATHS
 */
define("mappen", plugin_dir_url(__FILE__));
define("medarbejdere", "medarbejder_plugin");

require_once("inc/install.php");

function medarbejder_plugin_default_data()
{

    $Settings_Array = serialize(array(
                "team_mb_name_clr"           => "#000000",
                "team_mb_pos_clr"            => "#000000",
                "team_mb_desc_clr"           => "#000000",
                "team_mb_social_icon_clr"    => "#4f4f4f",
                "team_mb_social_icon_clr_bg" => "#e5e5e5",
                "team_mb_name_ft_size"       => 18,
                "team_mb_pos_ft_size"        => 14,
                "team_mb_desc_ft_size"       => 14,
                "font_family"                => "Open Sans", #Todo: Fjern skrifttypen, eller opdater til default.
                "team_layout"                => 4,
                "custom_css"                 => "",
                "team_mb_wrap_bg_clr"        => "#ffffff",
                "design"                     => 1,
        ));

    add_option('default_settings', $Settings_Array);
}
register_activation_hook(__FILE__, 'medarbejder_plugin_default_data');

function medarbejder_plugin_recom_js_css()
{
    // Generic as fuck. Use Bootstrap
    wp_enqueue_style('medarbejder_plugin_bootstrap_css_recom', mappen.'bower_components/bootstrap/dist/css/bootstrap.min.css');
}

/**
 * CPT CLASS
 */

require_once("inc/admin/menu.php");

/**
 * SHORTCODE
 */

 require_once("template/shortcode.php");
