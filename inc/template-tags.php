<?php
/**
 * Pistons template tags
 *
 * @package Flint\Pistons
 * @since 0.1.0
 */

/*
 * Get product specs link
 */
function pistons_get_product_specs_link( $args = array() ) {
  global $post;
  $meta = steel_get_product_meta();
  $specs = $meta['product_specs'][0];

  $defaults = array(
    'link_class' => 'btn btn-default btn-block',
    'before' => '<a class="%1$s" href="%2$s" target="_blank">',
    'after' => '</a>',
    'label' => 'Product Specifications',
  );
  $args = wp_parse_args( $args, $defaults );
  $args = (object) $args;

  if (!empty($specs))
    return sprintf($args->before . $args->label . $args->after, $args->link_class, get_attachment_link($specs) );
}

/*
 * Get product warranty link
 */
function pistons_get_product_warranty_link( $args = array() ) {
  global $post;
  $meta = steel_get_product_meta();
  $warranty = $meta['product_warranty_terms'][0];

  $defaults = array(
    'link_class' => 'btn btn-default btn-block',
    'before' => '<a class="%1$s" href="%2$s" target="_blank">',
    'after' => '</a>',
    'label' => 'Warranty Details',
  );
  $args = wp_parse_args( $args, $defaults );
  $args = (object) $args;

  if (!empty($warranty))
    return sprintf($args->before . $args->label . $args->after, $args->link_class, get_permalink($warranty) );
}
