<?php
/**
 * The Header for our theme.
 *
 * Displays the branding header element
 *
 * @package Flint
 * @since 1.3.0
 */
?>

  <div id="masthead" class="site-header" role="banner">
    <?php if (current_theme_supports('custom-header')) { ?>
      <div class="container">
        <div class="row">
          <?php $header_image = get_header_image();
          if ( ! empty( $header_image ) ) { ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" <?php if ( display_header_text() ) { ?> class="col-xs-offset-4 col-xs-4 col-sm-offset-0 col-sm-2"<?php } ?>>
              <img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" />
            </a>
          <?php } /* if ( ! empty( $header_image ) ) */ ?>
          <div class="hidden-xs col-sm-offset-4 col-sm-6 col-md-offset-4 col-md-6 col-lg-offset-6 col-lg-4" id="search_nav">
            <?php get_search_form(); ?>
            <p></p>
            <?php
            if ( class_exists( 'Flint_Walker_Nav_Menu_Navbar' ) ) {
              wp_nav_menu( array( 'theme_location' => 'branding', 'container' => false, 'menu_class' => 'nav nav-pills col-xs-9', 'fallback_cb' => false, 'walker' => new Flint_Walker_Nav_Menu_Navbar ) );
            } else {
              wp_nav_menu( array( 'theme_location' => 'branding', 'container' => false, 'menu_class' => 'nav nav-pills col-xs-9', 'fallback_cb' => false, 'walker' => new Flint_Bootstrap_Menu ) );
            }
            ?>
            <a class="btn btn-primary col-xs-3"><i class="glyphicon glyphicon-shopping-cart"></i> Cart</a>
          </div>
        </div><!-- .row -->
      </div><!-- .container -->
    <?php } /* if (current_theme_supports('custom-header')) */ ?>
  </div><!-- #masthead -->
