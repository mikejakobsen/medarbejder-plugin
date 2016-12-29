<?php
if (! defined('ABSPATH')) {
    exit;
}

function frontend_css()
{
    wp_enqueue_style('font-awesome', mappen.'bower_components/font-awesome/css/font-awesome.min.css');
    wp_enqueue_style('bootstrap', mappen.'bower_components/bootstrap/dist/css/bootstrap.min.css');
    wp_enqueue_style('layout_1', mappen.'assets/css/style1.css');
    wp_enqueue_style('layout_2', mappen.'assets/css/style2.css');
    wp_enqueue_style('layout_3', mappen.'assets/css/style3.css');
}

add_action('wp_enqueue_scripts', 'frontend_css');
add_filter('widget_text', 'do_shortcode');

add_action('media_buttons_context', 'insert_shortcode_into_page');
add_action('admin_footer', 'insert_shortcode_popup');

function insert_shortcode_into_page($context)
{
    $img = mappen.'assets/images/icon.png';
    $container_id = 'TEAM_B';
    $title = 'Select Team Group to insert into post';
    $context .= '<style>.wp_team_b_shortcode_button {
  background: #11CAA5 !important;
  border-color: #11CAA5 #11CAA5 #11CAA5 !important;
  -webkit-box-shadow: 0 1px 0 #11CAA5 !important;
  box-shadow: 0 1px 0 #11CAA5 !important;
  color: #fff;
  text-decoration: none;
  text-shadow: 0 -1px 1px #11CAA5 ,1px 0 1px #11CAA5,0 1px 1px #11CAA5,-1px 0 1px #11CAA5 !important;
}</style>
  <a class="button button-primary wp_team_b_shortcode_button thickbox" title="Select Teams to insert into post"    href="#TB_inline?width=400&inlineId='.$container_id.'">
  <span class="wp-media-buttons-icon" style="background: url('.$img.'); background-repeat: no-repeat; background-position: left bottom;"></span>
  Team Builder Shortcode
  </a>';
    return $context;
}

function insert_shortcode_popup()
{
?>
  <script type="text/javascript">
  jQuery(document).ready(function() {
    jQuery('#medarbejder_plugin_insert').on('click', function() {
      var id = jQuery('#medarbejder_plugin_insertselect option:selected').val();
      window.send_to_editor('<p>[TEAM_B id=' + id + ']</p>');
      tb_remove();
})
});
</script>
<style>
.wp_team_b_shortcode_button {
    background: red; !important;
    border-color: #11CAA5; #11CAA5 #11CAA5 !important;
    -webkit-box-shadow: 0 1px 0 #11CAA5 !important;
    box-shadow: 0 1px 0 #11CAA5 !important;
    color: #fff !important;
    text-decoration: none;
    text-shadow: 0 -1px 1px #11CAA5 ,1px 0 1px #11CAA5,0 1px 1px #11CAA5,-1px 0 1px #11CAA5 !important;
}
</style>
    <div id="TEAM_B" style="display:none;">
      <h3>Select Team To Insert Into Post</h3>
<?php

  $all_posts = wp_count_posts('team_builder')->publish;
  $args = array('post_type' => 'team_builder', 'posts_per_page' =>$all_posts);
  global $All_rac;
  $All_rac = new WP_Query($args);
if ($All_rac->have_posts()) { ?>
            <select id="medarbejder_plugin_insertselect" style="width: 100%;margin-bottom: 20px;">
<?php
while ($All_rac->have_posts()) :
    $All_rac->the_post(); ?>
                <?php $title = get_the_title(); ?>
  <option value="<?php echo get_the_ID(); ?>"><?php if (strlen($title) == 0) {
        echo 'No Title Found';
} else {
    echo $title;
}   ?></option>
<?php
endwhile;
?>
        </select>
        <button class='button primary wp_team_b_shortcode_button' id='medarbejder_plugin_insert'><?php _e('Insert Teams Shortcode', medarbejdere); ?></button>
<?php
} else {
    _e('No Teams Found', medarbejdere);
}
?>
    </div>
<?php
}
?>
