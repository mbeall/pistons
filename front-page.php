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
<?php flint_get_widgets('header'); ?>

  <div id="primary" class="content-area container">

    <div class="row">

      <?php flint_get_widgets('left'); ?>

      <div id="content" role="main" <?php flint_content_class(); ?>>

        <span class="hidden-xs">
          <?php
            $options = flint_get_options();
            if (function_exists('steel_slideshow') && $options['front_page_slider'] != 0)
              echo steel_slideshow( $options['front_page_slider'], 'featured-slider' );
          ?>
        </span>

        <div class="row">
          <div class="col-xs-6 col-sm-3 text-center">
            <img src="http://localhost/~mbeall/mbeall/wp-content/uploads/2015/02/270x270_cat_image.png" alt="Category Image">
          </div>

          <div class="col-xs-6 col-sm-3 text-center">
            <img src="http://localhost/~mbeall/mbeall/wp-content/uploads/2015/02/270x270_cat_image.png" alt="Category Image">
          </div>

          <div class="col-xs-6 col-sm-3 text-center">
            <img src="http://localhost/~mbeall/mbeall/wp-content/uploads/2015/02/270x270_cat_image.png" alt="Category Image">
          </div>

          <div class="col-xs-6 col-sm-3 text-center">
            <img src="http://localhost/~mbeall/mbeall/wp-content/uploads/2015/02/270x270_cat_image.png" alt="Category Image">
          </div>
        </div>

      </div><!-- #content .site-content -->

      <?php flint_get_widgets('right'); ?>

    </div><!-- .row -->

  </div><!-- #primary .content-area -->

</div><!-- #page -->

<?php flint_get_widgets('footer'); ?>
<?php get_footer(); ?>
