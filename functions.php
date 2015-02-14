<?php
/**
 * Pistons functions and definitions
 *
 * @package Flint\Pistons
 * @since Pistons 0.0.0
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

  add_image_size( 'product-view'    ,  170, 170, true );
  add_image_size( 'product-image'   ,  270, 210, true );
  add_image_size( 'category-image'  ,  270, 270, true );
  add_image_size( 'product-featured',  770, 500, true );
  add_image_size( 'featured-slider' , 1170, 360, true );
}
add_action( 'after_setup_theme', 'pistons_after_setup_theme', 20 );
