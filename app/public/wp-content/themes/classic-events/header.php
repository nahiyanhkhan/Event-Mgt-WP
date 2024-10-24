<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Classic Events
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) ) {
  wp_body_open();
} else {
  do_action( 'wp_body_open' );
} ?>

<?php if ( get_theme_mod('classic_events_preloader',true) != "") { ?>
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<?php } ?>

<a class="screen-reader-text skip-link" href="#content"><?php esc_html_e( 'Skip to content', 'classic-events' ); ?></a>

<div id="pageholder" <?php if( get_theme_mod( 'classic_events_box_layout' ) ) { echo 'class="boxlayout"'; } ?>>
  <div class="mainhead <?php echo esc_attr(classic_events_sticky_menu()); ?>">
    <div class="header-top py-2">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-4 px-0">
            <div class="logo">
              <?php classic_events_the_custom_logo(); ?>
              <div class="site-branding-text">
                <?php if ( get_theme_mod('classic_events_title_enable',true) != "") { ?>
                  <?php if ( is_front_page() && is_home() ) : ?>
                    <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
                  <?php else : ?>
                    <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></p>
                  <?php endif; ?>
                <?php } ?>
                <?php $classic_events_description = get_bloginfo( 'description', 'display' );
                if ( $classic_events_description || is_customize_preview() ) : ?>
                  <?php if ( get_theme_mod('classic_events_tagline_enable',false) != "") { ?>
                  <span class="site-description"><?php echo esc_html( $classic_events_description ); ?></span>
                  <?php } ?>
                <?php endif; ?>
              </div>
              </div>
          </div>
          <div class="col-lg-6 col-md-4 col-4 align-self-center">
            <div class="toggle-nav mobile-stick text-center">
              <button role="tab"><?php esc_html_e('Menu','classic-events'); ?></button>
            </div>
            <div id="mySidenav" class="nav sidenav">
              <nav id="site-navigation" class="main-nav" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu','classic-events' ); ?>">
                <ul class="mobile_nav">
                  <?php
                    wp_nav_menu( array( 
                      'theme_location' => 'primary',
                      'container_class' => 'main-menu' ,
                      'items_wrap' => '%3$s',
                      'fallback_cb' => 'wp_page_menu',
                    ) ); 
                   ?>
                </ul>
                <a href="javascript:void(0)" class="close-button"><?php esc_html_e('CLOSE','classic-events'); ?></a>
              </nav>
              </div>
          </div>
          <div class="col-lg-1 col-md-1 col-2 align-self-center">
            <div class="search-box text-center">
              <?php if(get_theme_mod('classic_events_search_option',true) != ''){ ?>
                <button type="button" class="search-open"><i class="fas fa-search"></i></button>
              <?php }?>
            </div>
          </div>
            
          <div class="col-lg-2 col-md-3 col-6 align-self-center">
            <?php if ( get_theme_mod('classic_events_contact_us_text', 'Book Now') != "" && get_theme_mod('classic_events_contact_us_url') != "") { ?> 
              <div class="contact-us text-center">
                <a href="<?php echo esc_url(get_theme_mod ('classic_events_contact_us_url','')); ?>"><?php echo esc_html(get_theme_mod ('classic_events_contact_us_text','Book Now','classic-events')); ?></a>
              </div>
            <?php }?>
          </div>
        </div>
        <div class="search-outer">
          <div class="serach_inner w-100 h-100">
            <?php get_search_form(); ?>
          </div>
          <button type="button" class="search-close">X</span></button>
        </div>
      </div>
    </div>
  </div>
