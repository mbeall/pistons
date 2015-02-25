<?php
/**
 * Pistons Options
 * WordPress Options API
 *
 * @package Flint\Pistons
 * @since Pistons 0.0.0
 */

function pistons_options_defaults( $defaults ) {
  $pistons_defaults = array(
    'front_page_slider' => 'none',
  );
  return array_merge( $pistons_defaults, $defaults );
}
add_filter('flint_option_defaults', 'pistons_options_defaults');
