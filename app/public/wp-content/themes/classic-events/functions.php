<?php
/**
 * Classic Events functions and definitions
 *
 * @package Classic Events
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'classic_events_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function classic_events_setup() {
	global $classic_events_content_width;
	if ( ! isset( $classic_events_content_width ) )
		$classic_events_content_width = 680;

	load_theme_textdomain( 'classic-events', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( "responsive-embeds" );
	add_theme_support( 'align-wide' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'wp-block-styles');
	add_theme_support( 'custom-header', array(
		'default-text-color' => false,
		'header-text' => false,
	) );
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 100,
		'flex-height' => true,
	) );
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'classic-events' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 */
	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	add_editor_style( 'editor-style.css' );
}
endif; // classic_events_setup
add_action( 'after_setup_theme', 'classic_events_setup' );

function classic_events_the_breadcrumb() {
    echo '<div class="breadcrumb my-3">';

    if (!is_home()) {
        echo '<a class="home-main align-self-center" href="' . esc_url(home_url()) . '">';
        bloginfo('name');
        echo "</a>";

        if (is_category() || is_single()) {
            the_category(' ');
            if (is_single()) {
                echo '<span class="current-breadcrumb mx-3">' . esc_html(get_the_title()) . '</span>';
            }
        } elseif (is_page()) {
            echo '<span class="current-breadcrumb mx-3">' . esc_html(get_the_title()) . '</span>';
        }
    }

    echo '</div>';
}

function classic_events_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'classic-events' ),
		'description'   => __( 'Appears on blog page sidebar', 'classic-events' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'classic-events' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your sidebar on pages.', 'classic-events' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'classic-events' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'classic-events' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer', 'classic-events' ),
		'description'   => __( 'Appears on footer', 'classic-events' ),
		'id'            => 'footer-nav',
		'before_widget' => '<aside id="%1$s" class="widget %2$s py-3 col-lg-3 col-mb-3 col-sm-6 col-xs-12">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h6 class="widget-title fw-normal fs-4 mt-4 mb-3">',
		'after_title'   => '</h6>',
	) );
	register_sidebar(array(
        'name'          => __('Shop Sidebar', 'classic-events'),
        'description'   => __('Sidebar for WooCommerce shop pages', 'classic-events'),
		'id'            => 'woocommerce_sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
	register_sidebar(array(
        'name'          => __('Single Product Sidebar', 'classic-events'),
        'description'   => __('Sidebar for single product pages', 'classic-events'),
		'id'            => 'woocommerce-single-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));	
}
add_action( 'widgets_init', 'classic_events_widgets_init' );

// Change number of products per row to 3
add_filter('loop_shop_columns', 'classic_events_loop_columns');
if (!function_exists('classic_events_loop_columns')) {
    function classic_events_loop_columns() {
        $colm = get_theme_mod('classic_events_products_per_row', 3); // Default to 3 if not set
        return $colm;
    }
}

// Use the customizer setting to set the number of products per page
function classic_events_products_per_page($cols) {
    $cols = get_theme_mod('classic_events_products_per_page', 9); // Default to 9 if not set
    return $cols;
}
add_filter('loop_shop_per_page', 'classic_events_products_per_page', 9);

function classic_events_scripts() {

	wp_enqueue_style( 'bootstrap-css', esc_url(get_template_directory_uri())."/css/bootstrap.css" );
	wp_enqueue_style('classic-events-style', get_stylesheet_uri(), array() );
		wp_style_add_data('classic-events-style', 'rtl', 'replace');

	require get_parent_theme_file_path( '/inc/color-scheme/custom-color-control.php' );
	wp_add_inline_style( 'classic-events-style',$classic_events_color_scheme_css );
	
	wp_enqueue_style( 'owl.carousel-css', esc_url(get_template_directory_uri())."/css/owl.carousel.css" );
	wp_enqueue_style( 'classic-events-default', esc_url(get_template_directory_uri())."/css/default.css" );
	
	wp_enqueue_style( 'classic-events-style', get_stylesheet_uri() );
	wp_enqueue_script( 'owl.carousel-js', esc_url(get_template_directory_uri()). '/js/owl.carousel.js', array('jquery') );
	wp_enqueue_script( 'bootstrap-js', esc_url(get_template_directory_uri()). '/js/bootstrap.js', array('jquery') );
	wp_enqueue_script( 'classic-events-theme', esc_url(get_template_directory_uri()) . '/js/theme.js' );
	wp_enqueue_style( 'font-awesome-css', esc_url(get_template_directory_uri())."/css/fontawesome-all.css" );
	wp_enqueue_style( 'classic-events-block-style', esc_url( get_template_directory_uri() ).'/css/blocks.css' );	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// font-family
	$classic_events_headings_font = esc_html(get_theme_mod('classic_events_headings_fonts'));
	$classic_events_body_font = esc_html(get_theme_mod('classic_events_body_fonts'));

	if ($classic_events_headings_font) {
	    wp_enqueue_style('classic-events-headings-fonts', 'https://fonts.googleapis.com/css?family=' . urlencode($classic_events_headings_font));
	} else {
	    wp_enqueue_style('rubik-headings', 'https://fonts.googleapis.com/css?family=Rubik:wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900');
	}

	if ($classic_events_body_font) {
	    wp_enqueue_style('classic-events-body-fonts', 'https://fonts.googleapis.com/css?family=' . urlencode($classic_events_body_font));
	} else {
	    wp_enqueue_style('rubik-body', 'https://fonts.googleapis.com/css?family=Rubik:wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900');
	}

}
add_action( 'wp_enqueue_scripts', 'classic_events_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Google Fonts
 */
require get_template_directory() . '/inc/gfonts.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Sanitization Callbacks.
 */
require get_template_directory() . '/inc/sanitization-callbacks.php';

/**
 * Webfont-Loader.
 */
require get_template_directory() . '/inc/wptt-webfont-loader.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/upgrade-to-pro.php';

/**
 * Theme Info Page.
 */
require get_template_directory() . '/inc/addon.php';

/**
 * select .
 */
require get_template_directory() . '/inc/select/category-dropdown-custom-control.php';
 
/**
 * Theme Info Page.
 */
if ( ! defined( 'CLASSIC_EVENTS_PRO_NAME' ) ) {
	define( 'CLASSIC_EVENTS_PRO_NAME', __( 'About Classic Events', 'classic-events' ));
}

if ( ! defined( 'CLASSIC_EVENTS_THEME_PAGE' ) ) {
define('CLASSIC_EVENTS_THEME_PAGE',__('https://www.theclassictemplates.com/collections/best-wordpress-templates','classic-events'));
}
if ( ! defined( 'CLASSIC_EVENTS_SUPPORT' ) ) {
define('CLASSIC_EVENTS_SUPPORT',__('https://wordpress.org/support/theme/classic-events/','classic-events'));
}
if ( ! defined( 'CLASSIC_EVENTS_REVIEW' ) ) {
define('CLASSIC_EVENTS_REVIEW',__('https://wordpress.org/support/theme/classic-events/reviews/#new-post','classic-events'));
}
if ( ! defined( 'CLASSIC_EVENTS_PRO_DEMO' ) ) {
define('CLASSIC_EVENTS_PRO_DEMO',__('https://live.theclassictemplates.com/classic-events-pro/','classic-events'));
}
if ( ! defined( 'CLASSIC_EVENTS_PREMIUM_PAGE' ) ) {
define('CLASSIC_EVENTS_PREMIUM_PAGE',__('https://www.theclassictemplates.com/products/event-planner-wordpress-theme','classic-events'));
}
if ( ! defined( 'CLASSIC_EVENTS_THEME_DOCUMENTATION' ) ) {
define('CLASSIC_EVENTS_THEME_DOCUMENTATION',__('https://live.theclassictemplates.com/demo/docs/classic-events-free/','classic-events'));
}

// logo
if ( ! function_exists( 'classic_events_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function classic_events_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

