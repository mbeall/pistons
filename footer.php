<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Flint\Pistons
 * @since Pistons 0.0.0
 */
?>

<footer id="colophon" class="fill site-footer" role="contentinfo">
  <div class="site-info container">
    <div class="row">
      <div id="custom-footer" class="col-xs-12 col-md-6">
        <?php flint_custom_footer(); ?>
<a href="<?php echo get_site_url(); ?>/terms-of-use">Terms of Use</a> | <a href="<?php echo get_site_url(); ?>/privacy-policy">Privacy Policy"</a>
      </div>
      <div id="credits" class="col-xs-12 col-md-6">
        <?php $theme = wp_get_theme(); ?>
        Proudly powered by <a href="http://wordpress.org/" title="A Semantic Personal Publishing Platform">WordPress</a><br />
        Theme: <a href="<?php echo $theme->get( 'ThemeURI' ) ?>"><?php echo $theme ?></a> by <?php echo $theme->get( 'Author' ) ?>
      </div>
    </div><!-- .site-info -->
  </div><!-- .row -->
</footer><!-- #colophon -->

<?php get_footer( 'close' );

