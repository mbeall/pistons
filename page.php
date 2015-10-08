<?php
/**
 * The default page template
 *
 * @package Flint\Pistons
 * @since Pistons 0.0.0
 */

get_header(); ?>
<?php flint_get_sidebar('header'); ?>


<?php while ( have_posts() ) : the_post(); ?>

  <div id="prologue-wrap">
    <section id="prologue" class="container">
      <div class="row">
        <header class="page-header col-xs-12">
          <h1 class="page-title"><?php echo the_title(); ?></h1>
          <?php if ( current_user_can('edit_posts') ) { ?><a class="btn btn-default btn-sm btn-edit hidden-xs" href="<?php echo get_edit_post_link(); ?>">Edit</a><?php } ?>
        </header><!-- .page-header -->
      </div><!-- .row -->
    </section><!-- #prologue -->
  </div><!-- #prologue-wrap -->

  <div id="primary" class="content-area container">

    <div class="row">

      <?php flint_get_spacer('left'); ?>

      <div id="content" role="main" <?php flint_content_class(); ?>>

            <div class="row">

              <article id="post-<?php the_ID(); ?>" <?php post_class('col-xs-12'); ?>>
                <header class="entry-header">
                  <?php $type = get_post_type(); ?>
                  <?php do_action('flint_open_entry_header_'.$type); ?>

                  <div class="entry-meta">
                    <?php do_action('flint_entry_meta_above_'.$type); ?>
                  </div><!-- .entry-meta -->

                  <?php do_action('flint_close_entry_header_'.$type); ?>

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
              </article><!-- #page-<?php the_ID(); ?> -->

            </div><!-- .row -->

          <?php if ( comments_open() || '0' != get_comments_number() ) { comments_template(); } ?>

      </div><!-- #content -->

      <?php flint_get_spacer('right'); ?>

    </div><!-- .row -->

  </div><!-- #primary -->

<?php endwhile; ?>

</div><!-- #page -->

<?php flint_get_sidebar('footer'); ?>
<?php get_footer(); ?>
