<?php
/**
 * The template used for displaying individual Steel Product
 *
 * @package Flint
 * @since 1.3.0
 */
?>

  <div class="row">
    <div class="product-views col-sm-8">
      <?php steel_get_product_views( array(
        'product_view_size' => 'product-featured',
        'product_view_thumb_size' => 'product-view',
      ) ); ?>
    </div>
    <div id="post-<?php the_ID(); ?>" <?php post_class('col-sm-4'); ?>>
      <header class="entry-header">
        <?php do_action('flint_open_entry_header_steel_product'); ?>

        <h1 class="entry-title"><?php if (is_singular()) { echo the_title(); } else { echo '<a href="' . get_permalink() .'" rel="bookmark">' . get_the_title() . '</a>'; } ?></h1>

        <?php $meta = steel_get_product_meta(); ?>

        <div class="row">
          <div class="col-xs-6 text-center">
            <h4 class="price">$<?php echo $meta['product_price'][0]; ?></h4>
          </div>
          <div class="col-xs-6">
            <a class="btn btn-primary btn-block" href="#">Add to Cart</a>
          </div>
        </div>
        <div class="clearfix"><p></p></div>

        <div class="entry-meta">
          <?php echo steel_get_product_id(); ?>
          <?php echo steel_get_product_manufacturer(); ?>
          <?php echo steel_get_product_id_alt(); ?>
          <?php echo steel_get_product_dimensions(); ?>
          <?php echo steel_get_product_weight(); ?>
          <?php echo steel_get_product_color(); ?>
          <?php echo steel_get_product_warranty('long'); ?>
        </div><!-- .entry-meta -->

        <?php do_action('flint_close_entry_header_steel_product'); ?>

      </header><!-- .entry-header -->

      <?php if ( is_search() ) : ?>
      <div class="entry-summary">
        <?php the_excerpt(); ?>
      </div><!-- .entry-summary -->
      <?php else : ?>
      <div class="entry-content">
        <?php flint_the_content(); ?>
        <?php
        flint_link_pages( array(
          'before' => '<ul class="pagination">',
          'after'  => '</ul>',
        ) ); ?>

      </div><!-- .entry-content -->
      <?php endif; ?>

      <footer class="entry-meta">
        <div class="row">
        <div class="col-xs-6">
          <?php echo pistons_get_product_specs_link( array('class' => 'btn btn-default btn-block') ); ?>
        </div>
        <div class="col-xs-6">
          <?php echo pistons_get_product_warranty_link( array('class' => 'btn btn-default btn-block') ); ?>
        </div>
          </div>
      </footer><!-- .entry-meta -->

      <div class="clearfix"></div>


      <?php if ( current_user_can('edit_posts') ) { ?><a class="btn btn-default btn-sm btn-edit hidden-xs" href="<?php echo get_edit_post_link(); ?>">Edit</a><?php } ?>

    </div><!-- #post-<?php the_ID(); ?> -->
  </div><!-- .row -->
