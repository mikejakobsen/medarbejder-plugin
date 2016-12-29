<?php
if (! defined('ABSPATH')) {
    exit;
}
$labels = array(
  'name'                => _x('Medarbejdere', 'Medarbejdere', medarbejdere),
  'singular_name'       => _x('Medarbejdere', 'Medarbejdere', medarbejdere),
  'menu_name'           => __('Medarbejdere', medarbejdere),
  /* 'parent_item_colon'   => __('Afdelinger', medarbejdere), */
  'all_items'           => __('Afdelinger', medarbejdere),
  'view_item'           => __('Medarbejdere', medarbejdere),
  'add_new_item'        => __('Tilføj Afdeling', medarbejdere),
  'add_new'             => __('Tilføj Afdeling', medarbejdere),
  'edit_item'           => __('Ændre Medarbejdere', medarbejdere),
  'update_item'         => __('Opdater Medarbejdere', medarbejdere),
  'search_items'        => __('Søg..', medarbejdere),
  'not_found'           => __('Ingen medarbejere :(', medarbejdere),
  'not_found_in_trash'  => __('Ingen medarbejdere :(', medarbejdere),
);
$args = array(
  'label'               => __('Medarbejdere', medarbejdere),
  'description'         => __('Medarbejdere', medarbejdere),
  'labels'              => $labels,
  'supports'            => array( 'title', '', '', '', '', '', '', '', '', '', '', ),
  'hierarchical'        => false,
  'public'              => false,
  'show_ui'             => true,
  'show_in_menu'        => true,
  'show_in_nav_menus'   => false,
  'show_in_admin_bar'   => false,
  'menu_position'       => 5,
  'menu_icon'           => 'dashicons-smiley', //https://developer.wordpress.org/resource/dashicons/#sticky
  'can_export'          => true,
  'has_archive'         => true,
  'exclude_from_search' => false,
  'publicly_queryable'  => false,
  'capability_type'     => 'page',
);
register_post_type('team_builder', $args);
