<?php
/**
 * Pistons functions and definitions
 *
 * @package Flint\Pistons
 * @since Pistons 0.0.0
 */

add_filter('flint_nav_menus', 'pistons_nav_menus');
function pistons_nav_menus( $nav_menus ) {
  $pistons_nav_menus = array(
    'branding' => __( 'Header Menu', 'flint' ),
  );
  return array_merge( $nav_menus, $pistons_nav_menus );
}
