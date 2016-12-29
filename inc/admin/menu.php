<?php
if (! defined('ABSPATH')) {
    exit;
}
class medarbejder_plugin
{
    private static $instance;
    public static function forge()
    {
        if (!isset(self::$instance)) {
            $className = __CLASS__;
            self::$instance = new $className;
        }
        return self::$instance;
    }

    private function __construct()
    {
        add_action('admin_enqueue_scripts', array(&$this, 'admin_stuff'));
        if (is_admin()) {
            add_action('init', array(&$this, 'admin_constructor'), 1);
            add_action('add_meta_boxes', array(&$this, 'medarbejder_add_meta_boxes')); //https://codex.wordpress.org/Plugin_API/Action_Reference/add_meta_boxes
            add_action('admin_init', array(&$this, 'medarbejder_add_meta_boxes'), 1);
            add_action('save_post', array(&$this, 'add_team_b_save_meta_box_save'), 9, 1);
            add_action('save_post', array(&$this, 'team_b_settings_meta_box_save'), 9, 1);
        }
    }
  // admin scripts
    public function admin_stuff()
    {
        if (get_post_type()=="team_builder") {
            wp_enqueue_script('theme-preview');
            wp_enqueue_media();
            wp_enqueue_script('jquery-ui-datepicker');
            //color-picker css n js
            wp_enqueue_style('wp-color-picker');
            wp_enqueue_style('thickbox');
            wp_enqueue_script('medarbejder_plugin-color-pic', mappen.'assets/js/color-picker.min.js', array( 'wp-color-picker' ), false, true);
            wp_enqueue_style('medarbejder_plugin-panel-style', mappen.'assets/css/panel-style.css');
            wp_enqueue_script('medarbejder_plugin-media-uploads', mappen.'assets/js/media-upload-script.min.js', array('media-upload','thickbox','jquery'));
            //font awesome css
            wp_enqueue_style('medarbejder_plugin-font-awesome', mappen.'bower_components/font-awesome/css/font-awesome.min.css');
            wp_enqueue_style('medarbejder_plugin_bootstrap', mappen.'bower_components/bootstrap/dist/css/bootstrap.min.css');
            wp_enqueue_style('medarbejder_plugin_jquery-css', mappen .'bower_components/jquery-ui/themes/base/all.css');

            wp_enqueue_script('wpsm_tabs_bootstrap-js', mappen.'bower_components/bootstrap/dist/js/bootstrap.min.js');

            //tooltip
            wp_enqueue_style('medarbejder_plugin_tooltip', mappen.'assets/tooltip/darktooltip.css');
            wp_enqueue_script('medarbejder_plugin-tooltip-js', mappen.'assets/tooltip/jquery.darktooltip.js');

            // tab settings
            wp_enqueue_style('medarbejder_plugin_settings-css', mappen.'assets/css/settings.css');
        }
    }
    public function admin_constructor()
    {
        require_once('menu_settings.php');
        add_filter('manage_edit-team_builder_columns', array(&$this, 'team_builder_columns' )) ;
        add_action('manage_team_builder_posts_custom_column', array(&$this, 'team_builder_manage_columns' ), 10, 2);
    }
    function team_builder_columns($columns)
    {
        $columns = array(
        'cb' => '<input type="checkbox" />',
        'title' => __('Afdeling'),
        'count' => __('Medarbejdere'),
        'shortcode' => __('Kode'),
        'date' => __('Dato')
        );
        return $columns;
    }

    function team_builder_manage_columns($column, $post_id)
    {
        global $post;
        $TotalCount =  get_post_meta($post_id, 'medarbejder_plugin_count', true);
        if (!$TotalCount || $TotalCount==-1) {
            $TotalCount =0;
        }
        switch ($column) {
            case 'shortcode':
                echo '<input style="width:225px" type="text" value="[TEAM_B id='.$post_id.']" readonly="readonly" />';
                break;
            case 'count':
                echo $TotalCount;
                break;
            default:
                break;
        }
    }
  // metaboxes
    public function medarbejder_add_meta_boxes()
    {
        add_meta_box('team_b_add', __('Add Team Panel', medarbejdere), array(&$this, 'wpsm_add_team_b_meta_box_function'), 'team_builder', 'normal', 'low');
        add_meta_box('team_b_setting', __('Team Settings', medarbejdere), array(&$this, 'wpsm_add_team_b_setting_function'), 'team_builder', 'side', 'low');
    }

    public function wpsm_add_team_b_meta_box_function($post)
    {
        require_once('add-team.php');
    }
    public function add_team_b_save_meta_box_save($PostID)
    {
        require('data-post/team-save-data.php');
    }
    public function team_b_settings_meta_box_save($PostID)
    {
        require('data-post/team-settings-save-data.php');
    }
    public function wpsm_add_team_b_setting_function($post)
    {
        require_once('settings.php');
    }
}
global $medarbejder_plugin;
$medarbejder_plugin = medarbejder_plugin::forge();
