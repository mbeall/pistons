<?php
/**
 * Pistons Theme Customizer
 *
 * @package Flint\Pistons
 * @since Pistons 0.0.0
 */

function pistons_customize_register( $wp_customize ) {

  $defaults = flint_get_option_defaults();

  /**
   * Static Front Page section
   */
      /**
       * Front Page Slider setting
       */
      $sliders = array( 0 => 'None' );
      $steel_slides = get_posts( array( 'post_type' => 'steel_slides', 'posts_per_page' => -1 ) );
      foreach ($steel_slides as $steel_slideshow) {
        $sliders[$steel_slideshow->ID] = $steel_slideshow->post_title;
      }
      $wp_customize->add_setting('flint_options[front_page_slider]', array(
        'default'           => $defaults['front_page_slider'],
        'sanitize_callback' => 'absint',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'transport'         => 'refresh',
      ));
      $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'front_page_slider', array(
        'label'    => __('Front page slider', 'flint'),
        'section'  => 'static_front_page',
        'settings' => 'flint_options[front_page_slider]',
        'priority' => 10,
        'type'     => 'select',
        'choices'  => $sliders,
      )));
}
add_action( 'customize_register', 'pistons_customize_register' );
