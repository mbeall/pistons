<?php
/**
 * The template for displaying Product Category pages
 *
 * @package Flint\Pistons
 * @since Pistons 0.0.0
 */

get_header(); ?>
<?php flint_get_widgets('header'); ?>
<div id="prologue-wrap">
  <section id="prologue" class="container">
    <div class="row">
      <header class="page-header col-xs-12">
        <h1 class="page-title">
          <?php
            /**
             * Template actions before title
             */
            if ( is_category() ) { do_action('flint_open_cat_title'); }
            elseif  ( is_tag() ) { do_action('flint_open_tag_title'); }
            elseif  ( is_tax() ) { do_action('flint_open_' . single_term_title( '', false ) . '_title'); }
            else                 { do_action('flint_open_archive_title'); }

            /**
             * Title of archive page
             */
            if ( is_category() ) { printf( __( '%s', 'flint' ), '<span>' . single_cat_title( '', false ) . '</span>' ); }
            elseif  ( is_tag() ) { printf( __( '%s', 'flint' ), '<span>' . single_tag_title( '', false ) . '</span>' ); }

            elseif ( is_author() ) {
              the_post();
              printf( __( '%s', 'flint' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
              rewind_posts();
            }

            elseif ( is_day() )   { printf( __( '%s', 'flint' ), '<span>' . get_the_date()        . '</span>' ); }
            elseif ( is_month() ) { printf( __( '%s', 'flint' ), '<span>' . get_the_date( 'F Y' ) . '</span>' ); }
            elseif ( is_year() )  { printf( __( '%s', 'flint' ), '<span>' . get_the_date( 'Y' )   . '</span>' ); }

            elseif ( is_tax( 'post_format', 'post-format-aside' ) ) { _e( 'Asides', 'flint' ); }
            elseif ( is_tax( 'post_format', 'post-format-image' ) ) { _e( 'Images', 'flint' ); }
            elseif ( is_tax( 'post_format', 'post-format-video' ) ) { _e( 'Videos', 'flint' ); }
            elseif ( is_tax( 'post_format', 'post-format-quote' ) ) { _e( 'Quotes', 'flint' ); }
            elseif ( is_tax( 'post_format', 'post-format-link'  ) ) { _e( 'Links' , 'flint' ); }

            elseif ( is_tax() ) { printf( __( '%s', 'flint' ), '<span>' . single_term_title( '', false ) . '</span>' ); }

            else { _e( '<span>' . 'Archives' . '</span>', 'flint' ); }

            /**
             * Template actions after title
             */
            if ( is_category() ) { do_action('flint_close_cat_title'); }
            elseif  ( is_tag() ) { do_action('flint_close_tag_title'); }
            elseif  ( is_tax() ) { do_action('flint_close_' . single_term_title( '', false ) . '_title'); }
            else                 { do_action('flint_close_archive_title'); }
          ?>
        </h1>
        <?php
          /**
           * Term Description
           */
          if ( is_category() ) {
            $category_description = category_description();
            if ( ! empty( $category_description ) ) { echo apply_filters( 'category_archive_meta', '<div class="taxonomy-description">' . $category_description . '</div>' ); }
          }
          elseif ( is_tag() ) {
            $tag_description = tag_description();
            if ( ! empty( $tag_description ) ) { echo apply_filters( 'tag_archive_meta', '<div class="taxonomy-description">' . $tag_description . '</div>' ); }
          }
          elseif ( is_tax( 'post_format' ) ) {}
          elseif ( is_tax() ) {
            $term_description = term_description();
            if ( ! empty( $term_description ) ) { echo apply_filters( 'tag_archive_meta', '<p class="taxonomy-description">' . $term_description . '</p>' ); }
          }
        ?>
      </header><!-- .page-header -->
    </div><!-- .row -->
  </section><!-- #prologue -->
</div><!-- #prologue-wrap -->

<?php if ( have_posts() ) : ?>

  <section id="primary" class="content-area container">

    <div class="row">

      <div id="content" role="main" <?php flint_content_class(); ?>>

        <div class="row">

          <?php while ( have_posts() ) : the_post(); ?>

              <div id="post-<?php the_ID(); ?>" <?php post_class('col-xs-12 col-sm-3'); ?>>

                <div class="post-inner">

                  <div class="product-category-image"><?php steel_get_product_thumbnail('category-image'); ?></div>

                  <header class="entry-header">
                    <?php do_action('flint_open_entry_header_steel_product'); ?>

                    <h3 class="entry-title"><?php if (is_singular()) { echo the_title(); } else { echo '<a href="' . get_permalink() .'" rel="bookmark">' . get_the_title() . '</a>'; } ?></h3>

                    <?php $meta = steel_get_product_meta(); ?>

                    <div class="entry-meta">
                      <p class="price">$<?php echo $meta['product_price'][0]; ?></p>
                      <p>
                        <span class="manufacturer"><?php echo steel_get_product_manufacturer(); ?></span> | <span class="warranty"><?php echo steel_get_product_warranty(); ?></span>
                      </p>
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

                  <footer class="entry-meta clearfix">
                  <?php do_action('flint_entry_meta_below_steel_product'); ?>
                  </footer><!-- .entry-meta -->

                </div><!-- .post-inner -->

              </div><!-- #post-<?php the_ID(); ?> -->

          <?php endwhile; ?>

        </div><!-- .row -->

        <?php flint_content_nav( 'nav-below' ); ?>

    </div><!-- .row -->

  </section><!-- #primary -->

<?php else : ?>

  <section id="primary" class="content-area container">

    <div class="row">

      <div id="content" role="main" <?php flint_content_class(); ?>>

        <?php get_template_part( 'no-results', 'archive' ); ?>

      </div><!-- #content -->

    </div><!-- .row -->

  </section><!-- #primary -->

<?php endif; ?>

</div><!-- #page -->

<?php flint_get_widgets('footer'); ?>
<?php get_footer(); ?>

