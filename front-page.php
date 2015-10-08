<?php
/**
 * The template for displaying the front page
 *
 * Template file used to render the Site Front Page,
 * whether the front page displays the Blog Posts Index
 * or a static page.
 *
 * @package Flint\Pistons
 * @since Pistons 0.0.0
 *
 */

get_header(); ?>
<?php flint_get_sidebar('header'); ?>

  <div id="primary" class="content-area container">

    <div class="row">

      <?php flint_get_sidebar('left'); ?>

      <div id="content" role="main" <?php flint_content_class(); ?>>

        <span class="hidden-xs">
          <?php
            if ( function_exists( 'flint_options' ) ) {
              $options = flint_options();
            } else {
              $options = flint_get_options();
            }
            if (function_exists('steel_slideshow') && $options['front_page_slider'] != 0)
              echo steel_slideshow( $options['front_page_slider'], 'featured-slider' );
          ?>
        </span>

        <div class="row">
          <div class="col-xs-6 col-sm-3 text-center">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/270x270_cat_image.png" alt="Category Image">
          </div>

          <div class="col-xs-6 col-sm-3 text-center">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/270x270_cat_image.png" alt="Category Image">
          </div>

          <div class="col-xs-6 col-sm-3 text-center">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/270x270_cat_image.png" alt="Category Image">
          </div>

          <div class="col-xs-6 col-sm-3 text-center">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/270x270_cat_image.png" alt="Category Image">
          </div>
        </div>

      </div><!-- #content .site-content -->

      <?php flint_get_sidebar('right'); ?>

    </div><!-- .row -->

  </div><!-- #primary .content-area -->

</div><!-- #page -->

<?php flint_get_sidebar('footer'); ?>
<?php get_footer(); ?>
