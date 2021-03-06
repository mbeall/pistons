<?php
/**
 * Pistons functions and definitions
 *
 * @package Flint\Pistons
 * @since 0.1.0
 */

function pistons_nav_menus( $nav_menus ) {
  $pistons_nav_menus = array(
    'branding' => __( 'Header Menu', 'flint' ),
  );
  return wp_parse_args( $pistons_nav_menus, $nav_menus );
}
add_filter('flint_nav_menus', 'pistons_nav_menus');

function pistons_after_setup_theme() {
  require( get_stylesheet_directory() . '/inc/customizer.php' );
  require( get_stylesheet_directory() . '/inc/options.php' );
  require( get_stylesheet_directory() . '/inc/template-tags.php' );

  add_image_size( 'product-view'    ,  170, 170, true );
  add_image_size( 'product-image'   ,  270, 210, true );
  add_image_size( 'category-image'  ,  270, 270, true );
  add_image_size( 'product-featured',  770, 500, true );
  add_image_size( 'featured-slider' , 1170, 360, true );
}
add_action( 'after_setup_theme', 'pistons_after_setup_theme', 20 );

function pistons_product_meta( $defaults ) {
  $details = array();
  $details = $defaults;

  $details['product_specs'         ] = array('');
  $details['product_warranty_terms'] = array('');

  return $details;
}
add_filter( 'steel_product_meta', 'pistons_product_meta', 10 );

function pistons_save_steel_product_details() {
  global $post;

  if (isset($_POST['product_specs'])) {
    if (!empty($_POST['product_specs']))
      update_post_meta($post->ID, 'product_specs', absint($_POST['product_specs']));
    else
      delete_post_meta($post->ID, 'product_specs');
  }

  if (isset($_POST['product_warranty_terms'])) {
    if (!empty($_POST['product_warranty_terms']))
      update_post_meta($post->ID, 'product_warranty_terms', absint($_POST['product_warranty_terms']));
    else
      delete_post_meta($post->ID, 'product_warranty_terms');
  }
}
add_action('steel_save_steel_product_meta', 'pistons_save_steel_product_details', 10);

function pistons_option_defaults( $defaults ) {
  $defaults['page_default_width'] = 'wide';

  return $defaults;
}
add_filter( 'flint_option_defaults', 'pistons_option_defaults', 10 );
