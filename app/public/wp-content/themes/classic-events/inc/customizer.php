<?php
/**
 * Classic Events Theme Customizer
 *
 * @package Classic Events
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function classic_events_customize_register( $wp_customize ) {

	function classic_events_sanitize_dropdown_pages( $page_id, $setting ) {
  		$page_id = absint( $page_id );
  		return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	wp_enqueue_style('classic-events-customize-controls', trailingslashit(esc_url(get_template_directory_uri())).'/css/customize-controls.css');

	//Logo
    $wp_customize->add_setting('classic_events_logo_width',array(
		'default'=> '',
		'transport' => 'refresh',
		'sanitize_callback' => 'classic_events_sanitize_integer'
	));
	$wp_customize->add_control(new classic_events_Slider_Custom_Control( $wp_customize, 'classic_events_logo_width',array(
		'label'	=> esc_html__('Logo Width','classic-events'),
		'section'=> 'title_tagline',
		'settings'=>'classic_events_logo_width',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 100,
        ),
	)));

	// color site title
	$wp_customize->add_setting('classic_events_sitetitle_color',array(
		'default' => '',
		'sanitize_callback' => 'classic_events_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'classic_events_sitetitle_color', array(
	   'settings' => 'classic_events_sitetitle_color',
	   'section'   => 'title_tagline',
	   'label' => __('Site Title Color', 'classic-events'),
	   'type'      => 'color'
	));

	$wp_customize->add_setting('classic_events_title_enable',array(
		'default' => true,
		'sanitize_callback' => 'classic_events_sanitize_checkbox',
	));
	$wp_customize->add_control( 'classic_events_title_enable', array(
	   'settings' => 'classic_events_title_enable',
	   'section'   => 'title_tagline',
	   'label'     => __('Enable Site Title','classic-events'),
	   'type'      => 'checkbox'
	));

	// color site tagline
	$wp_customize->add_setting('classic_events_sitetagline_color',array(
		'default' => '',
		'sanitize_callback' => 'classic_events_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_events_sitetagline_color', array(
	   'settings' => 'classic_events_sitetagline_color',
	   'section'   => 'title_tagline',
	   'label' => __('Site Tagline Color', 'classic-events'),
	   'type'      => 'color'
	));

	$wp_customize->add_setting('classic_events_tagline_enable',array(
		'default' => false,
		'sanitize_callback' => 'classic_events_sanitize_checkbox',
	));
	$wp_customize->add_control( 'classic_events_tagline_enable', array(
	   'settings' => 'classic_events_tagline_enable',
	   'section'   => 'title_tagline',
	   'label'     => __('Enable Site Tagline','classic-events'),
	   'type'      => 'checkbox'
	));

	// woocommerce section
	$wp_customize->add_section('classic_events_woocommerce_page_settings', array(
		'title'    => __('WooCommerce Page Settings', 'classic-events'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

	$wp_customize->add_setting('classic_events_shop_page_sidebar',array(
		'default' => false,
		'sanitize_callback'	=> 'classic_events_sanitize_checkbox'
	 ));
	 $wp_customize->add_control('classic_events_shop_page_sidebar',array(
		'type' => 'checkbox',
		'label' => __(' Check To Enable Shop page sidebar','classic-events'),
		'section' => 'classic_events_woocommerce_page_settings',
	 ));

    // shop page sidebar alignment
    $wp_customize->add_setting('classic_events_shop_page_sidebar_position', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'classic_events_sanitize_choices',
	));
	$wp_customize->add_control('classic_events_shop_page_sidebar_position',array(
		'type'           => 'radio',
		'label'          => __('Shop Page Sidebar', 'classic-events'),
		'section'        => 'classic_events_woocommerce_page_settings',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'classic-events'),
			'Right Sidebar' => __('Right Sidebar', 'classic-events'),
		),
	));

	$wp_customize->add_setting('classic_events_wooproducts_nav',array(
		'default' => 'Yes',
		'sanitize_callback'	=> 'classic_events_sanitize_choices'
	 ));
	 $wp_customize->add_control('classic_events_wooproducts_nav',array(
		'type' => 'select',
		'label' => __('Shop Page Products Navigation','classic-events'),
		'choices' => array(
			 'Yes' => __('Yes','classic-events'),
			 'No' => __('No','classic-events'),
		 ),
		'section' => 'classic_events_woocommerce_page_settings',
	));

	$wp_customize->add_setting( 'classic_events_single_page_sidebar',array(
		'default' => false,
		'sanitize_callback'	=> 'classic_events_sanitize_checkbox'
    ) );
    $wp_customize->add_control('classic_events_single_page_sidebar',array(
    	'type' => 'checkbox',
       	'label' => __('Check To Enable Single Product Page Sidebar','classic-events'),
		'section' => 'classic_events_woocommerce_page_settings'
    ));	

	// single product page sidebar alignment
    $wp_customize->add_setting('classic_events_single_product_page_layout', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'classic_events_sanitize_choices',
	));
	$wp_customize->add_control('classic_events_single_product_page_layout',array(
		'type'           => 'radio',
		'label'          => __('Single product Page Sidebar', 'classic-events'),
		'section'        => 'classic_events_woocommerce_page_settings',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'classic-events'),
			'Right Sidebar' => __('Right Sidebar', 'classic-events'),
		),
	));	

	$wp_customize->add_setting('classic_events_related_product_enable',array(
		'default' => true,
		'sanitize_callback'	=> 'classic_events_sanitize_checkbox'
	));
	$wp_customize->add_control('classic_events_related_product_enable',array(
		'type' => 'checkbox',
		'label' => __('Check To Enable Related product','classic-events'),
		'section' => 'classic_events_woocommerce_page_settings',
	));

	$wp_customize->add_setting( 'classic_events_woo_product_img_border_radius', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'classic_events_sanitize_integer'
    ) );
    $wp_customize->add_control(new Classic_Events_Slider_Custom_Control( $wp_customize, 'classic_events_woo_product_img_border_radius',array(
		'label'	=> esc_html__('Product Img Border Radius','classic-events'),
		'section'=> 'classic_events_woocommerce_page_settings',
		'settings'=>'classic_events_woo_product_img_border_radius',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 100,
        ),
	)));
    // Add a setting for number of products per row
    $wp_customize->add_setting('classic_events_products_per_row', array(
	   'default'   => '3',
	   'transport' => 'refresh',
	   'sanitize_callback' => 'classic_events_sanitize_integer'
    ));
    $wp_customize->add_control('classic_events_products_per_row', array(
	   'label'    => __('Products Per Row', 'classic-events'),
	   'section'  => 'classic_events_woocommerce_page_settings',
	   'settings' => 'classic_events_products_per_row',
	   'type'     => 'select',
	   'choices'  => array(
		  '2' => '2',
		  '3' => '3',
		  '4' => '4',
	   ),
   ));

   // Add a setting for the number of products per page
   $wp_customize->add_setting('classic_events_products_per_page', array(
	  'default'   => '9',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'classic_events_sanitize_integer'
   ));
   $wp_customize->add_control('classic_events_products_per_page', array(
	  'label'    => __('Products Per Page', 'classic-events'),
	  'section'  => 'classic_events_woocommerce_page_settings',
	  'settings' => 'classic_events_products_per_page',
	  'type'     => 'number',
	  'input_attrs' => array(
		 'min'  => 1,
		 'step' => 1,
	 ),
   ));
   
    $wp_customize->add_setting('classic_events_product_sale_position',array(
        'default' => 'Left',
        'sanitize_callback' => 'classic_events_sanitize_choices'
	));
	$wp_customize->add_control('classic_events_product_sale_position',array(
        'type' => 'radio',
        'label' => __('Product Sale Position','classic-events'),
        'section' => 'classic_events_woocommerce_page_settings',
        'choices' => array(
            'Left' => __('Left','classic-events'),
            'Right' => __('Right','classic-events'),
        ),
	) ); 

	//Theme Options
	$wp_customize->add_panel( 'classic_events_panel_area', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'title' => __( 'Theme Options Panel', 'classic-events' ),
	) );

	//Site Layout Section
	$wp_customize->add_section('classic_events_site_layoutsec',array(
		'title'	=> __('Manage Site Layout Section ','classic-events'),
		'description' => __('<p class="sec-title">Manage Site Layout Section</p>','classic-events'),
		'priority'	=> 1,
		'panel' => 'classic_events_panel_area',
	));

	$wp_customize->add_setting('classic_events_box_layout',array(
		'default' => false,
		'sanitize_callback' => 'classic_events_sanitize_checkbox',
	));
	$wp_customize->add_control( 'classic_events_box_layout', array(
	   'section'   => 'classic_events_site_layoutsec',
	   'label'	=> __('Check to Show Box Layout','classic-events'),
	   'type'      => 'checkbox'
 	));
 	
	$wp_customize->add_setting('classic_events_preloader',array(
		'default' => true,
		'sanitize_callback' => 'classic_events_sanitize_checkbox',
	));
	$wp_customize->add_control( 'classic_events_preloader', array(
	   'section'   => 'classic_events_site_layoutsec',
	   'label'	=> __('Check to Show preloader','classic-events'),
	   'type'      => 'checkbox'
 	));

	 $wp_customize->add_setting( 'classic_events_layout_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	  ));
  
	  $wp_customize->add_control('classic_events_layout_settings_upgraded_features', array(
		  'type'=> 'hidden',
		  'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
			  <a target='_blank' href='". esc_url(CLASSIC_EVENTS_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		  'section' => 'classic_events_site_layoutsec'
	  ));	

   //Global Color
    $wp_customize->add_section('classic_events_global_color', array(
	    'title'    => __('Manage Global Color Section', 'classic-events'),
	    'panel'    => 'classic_events_panel_area',
    ));
    $wp_customize->add_setting('classic_events_first_color', array(
        'default'           => '#ff5f6b',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'classic_events_first_color', array(
	  'label'    => __('Theme Color', 'classic-events'),
	  'section'  => 'classic_events_global_color',
	  'settings' => 'classic_events_first_color',
    )));	

    $wp_customize->add_setting('classic_events_second_color', array(
        'default'           => '#f6b525',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'classic_events_second_color', array(
	  'label'    => __('Theme Color', 'classic-events'),
	  'section'  => 'classic_events_global_color',
	  'settings' => 'classic_events_second_color',
    )));	

	$wp_customize->add_setting( 'classic_events_global_color_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	  ));
  
	  $wp_customize->add_control('classic_events_global_color_settings_upgraded_features', array(
		  'type'=> 'hidden',
		  'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
			  <a target='_blank' href='". esc_url(CLASSIC_EVENTS_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		  'section' => 'classic_events_global_color'
	  ));	

 	// Header Section
	$wp_customize->add_section('classic_events_header_section', array(
        'title' => __('Manage Header Section', 'classic-events'),
		'description' => __('<p class="sec-title">Manage Header Section</p>','classic-events'),
        'priority' => null,
		'panel' => 'classic_events_panel_area',
 	));

 	$wp_customize->add_setting('classic_events_stickyheader',array(
		'default' => false,
		'sanitize_callback' => 'classic_events_sanitize_checkbox',
	));
	$wp_customize->add_control( 'classic_events_stickyheader', array(
	   'section'   => 'classic_events_header_section',
	   'label'	=> __('Check To Show Sticky Header','classic-events'),
	   'type'      => 'checkbox'
 	));

	$wp_customize->add_setting('classic_events_contact_us_text',array(
		'default' => 'Book Now',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_events_contact_us_text', array(
	   'settings' => 'classic_events_contact_us_text',
	   'section'   => 'classic_events_header_section',
	   'label' => __('Add Button Text', 'classic-events'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('classic_events_contact_us_url',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_events_contact_us_url', array(
	   'settings' => 'classic_events_contact_us_url',
	   'section'   => 'classic_events_header_section',
	   'label' => __('Add Button URL', 'classic-events'),
	   'type'      => 'url'
	));

	// header menu
	$wp_customize->add_setting('classic_events_menu_color',array(
		'default' => '',
		'sanitize_callback' => 'classic_events_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_events_menu_color', array(
	   'settings' => 'classic_events_menu_color',
	   'section'   => 'classic_events_header_section',
	   'label' => __('Menu Color', 'classic-events'),
	   'type'      => 'color'
	));

	// header menu hover color
	$wp_customize->add_setting('classic_events_menuhrv_color',array(
		'default' => '',
		'sanitize_callback' => 'classic_events_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_events_menuhrv_color', array(
	   'settings' => 'classic_events_menuhrv_color',
	   'section'   => 'classic_events_header_section',
	   'label' => __('Menu Hover Color', 'classic-events'),
	   'type'      => 'color'
	));

	// header sub menu color
	$wp_customize->add_setting('classic_events_submenu_color',array(
		'default' => '',
		'sanitize_callback' => 'classic_events_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_events_submenu_color', array(
	   'settings' => 'classic_events_submenu_color',
	   'section'   => 'classic_events_header_section',
	   'label' => __('SubMenu Color', 'classic-events'),
	   'type'      => 'color'
	));

	// header sub menu hover color
	$wp_customize->add_setting('classic_events_submenuhrv_color',array(
		'default' => '',
		'sanitize_callback' => 'classic_events_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_events_submenuhrv_color', array(
	   'settings' => 'classic_events_submenuhrv_color',
	   'section'   => 'classic_events_header_section',
	   'label' => __('SubMenu Hover Color', 'classic-events'),
	   'type'      => 'color'
	));

	$wp_customize->add_setting( 'classic_events_header_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	  ));
  
	  $wp_customize->add_control('classic_events_header_settings_upgraded_features', array(
		  'type'=> 'hidden',
		  'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
			  <a target='_blank' href='". esc_url(CLASSIC_EVENTS_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		  'section' => 'classic_events_header_section'
	  ));	
	//Slider
  	$wp_customize->add_section('classic_events_slider_section',array(
	    'title' => __('Manage Slider Section','classic-events'),
	    'priority'  => null,
	    'description'	=> __('<p class="sec-title">Manage Slider Section</p> Select Category from the Dropdowns for slider, Also use the given image dimension (405 x 395).','classic-events'),
	    'panel' => 'classic_events_panel_area',
	));

	$wp_customize->add_setting('classic_events_slider',array(
		'default' => false,
		'sanitize_callback' => 'classic_events_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_events_slider', array(
	   'settings' => 'classic_events_slider',
	   'section'   => 'classic_events_slider_section',
	   'label'     => __('Check To Enable This Section','classic-events'),
	   'type'      => 'checkbox'
	));

	$wp_customize->add_setting('classic_events_slider_top_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('classic_events_slider_top_text',array(
		'label'	=> esc_html__('Add Top Slider Text','classic-events'),
		'section'=> 'classic_events_slider_section',
		'type'=> 'text'
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_post[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

    $wp_customize->add_setting('classic_events_slider_cat',array(
	    'default' => '0',
	    'sanitize_callback' => 'classic_events_sanitize_choices',
  	));
  	$wp_customize->add_control('classic_events_slider_cat',array(
	    'type'    => 'select',
	    'choices' => $cat_post,
	    'label' => __('Select Category to display Slider','classic-events'),
	    'section' => 'classic_events_slider_section',
	));

	$wp_customize->add_setting('classic_events_button_text',array(
		'default' => 'Online Request',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_events_button_text', array(
	   'settings' => 'classic_events_button_text',
	   'section'   => 'classic_events_slider_section',
	   'label' => __('Add Button Text', 'classic-events'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('classic_events_button_link_slider',array(
        'default'=> '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('classic_events_button_link_slider',array(
        'label' => esc_html__('Add Button Link','classic-events'),
        'section'=> 'classic_events_slider_section',
        'type'=> 'url'
    ));

    //Slider height
    $wp_customize->add_setting('classic_events_slider_img_height',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('classic_events_slider_img_height',array(
        'label' => __('Slider Image Height','classic-events'),
        'description'   => __('Add the slider image height here (eg. 600px)','classic-events'),
        'input_attrs' => array(
            'placeholder' => __( '500px', 'classic-events' ),
        ),
        'section'=> 'classic_events_slider_section',
        'type'=> 'text'
    ));

	$wp_customize->add_setting( 'classic_events_slider_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	  ));
  
	  $wp_customize->add_control('classic_events_slider_settings_upgraded_features', array(
		  'type'=> 'hidden',
		  'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
			  <a target='_blank' href='". esc_url(CLASSIC_EVENTS_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		  'section' => 'classic_events_slider_section'
	  ));	
	// Our Testimonials Section 
	$wp_customize->add_section('classic_events_below_banner_section', array(
		'title'	=> __('Manage Our Testimonials Section','classic-events'),
		'description'	=> __('<p class="sec-title">Manage Our Testimonials Section</p> Select Pages and category from the dropdown for Our Testimonials.','classic-events'),
		'priority'	=> null,
		'panel' => 'classic_events_panel_area',
	));
	
	$wp_customize->add_setting('classic_events_disabled_pgboxes',array(
		'default' => false,
		'sanitize_callback' => 'classic_events_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_events_disabled_pgboxes', array(
	   'settings' => 'classic_events_disabled_pgboxes',
	   'section'   => 'classic_events_below_banner_section',
	   'label'     => __('Check To Enable This Section','classic-events'),
	   'type'      => 'checkbox'
	));

	$wp_customize->add_setting('classic_events_about_title',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_events_about_title', array(
	   'settings' => 'classic_events_about_title',
	   'section'   => 'classic_events_below_banner_section',
	   'label' => __('Add Title', 'classic-events'),
	   'type'      => 'text'
	));
	
	$wp_customize->add_setting('classic_events_about_pageboxes',array(
		'default'	=> '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'classic_events_sanitize_dropdown_pages'
	));
	$wp_customize->add_control(	'classic_events_about_pageboxes',array(
		'type' => 'dropdown-pages',
	   'label'     => __('Select Page to display About','classic-events'),
		'section' => 'classic_events_below_banner_section',
	));	

	$wp_customize->add_setting('classic_events_about_catData',array(
	    'default' => '0',
	    'sanitize_callback' => 'classic_events_sanitize_choices',
  	));
  	$wp_customize->add_control('classic_events_about_catData',array(
	    'type'    => 'select',
	    'choices' => $cat_post,
	    'label' => __('Select Category','classic-events'),
	    'section' => 'classic_events_below_banner_section',
	));

	$wp_customize->add_setting( 'classic_events_secondsec_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	  ));
  
	  $wp_customize->add_control('classic_events_secondsec_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
			<a target='_blank' href='". esc_url(CLASSIC_EVENTS_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'classic_events_below_banner_section'
	  ));	
	//Blog post
	$wp_customize->add_section('classic_events_blog_post_settings',array(
        'title' => __('Manage Post Section', 'classic-events'),
        'priority' => null,
        'panel' => 'classic_events_panel_area'
    ) );

   // Add Settings and Controls for Post Layout
	$wp_customize->add_setting('classic_events_sidebar_post_layout',array(
     'default' => 'right',
     'sanitize_callback' => 'classic_events_sanitize_choices'
	));
	$wp_customize->add_control('classic_events_sidebar_post_layout',array(
     'type' => 'radio',
     'label'     => __('Theme Post Sidebar Position', 'classic-events'),
     'description'   => __('This option work for blog page, archive page and search page.', 'classic-events'),
     'section' => 'classic_events_blog_post_settings',
     'choices' => array(
         'full' => __('Full','classic-events'),
         'left' => __('Left','classic-events'),
         'right' => __('Right','classic-events'),
         'three-column' => __('Three Columns','classic-events'),
         'four-column' => __('Four Columns','classic-events'),
         'grid' => __('Grid Layout','classic-events')
     ),
	) );

	$wp_customize->add_setting('classic_events_blog_post_description_option',array(
    	'default'   => 'Excerpt Content', 
        'sanitize_callback' => 'classic_events_sanitize_choices'
	));
	$wp_customize->add_control('classic_events_blog_post_description_option',array(
        'type' => 'radio',
        'label' => __('Post Description Length','classic-events'),
        'section' => 'classic_events_blog_post_settings',
        'choices' => array(
            'No Content' => __('No Content','classic-events'),
            'Excerpt Content' => __('Excerpt Content','classic-events'),
            'Full Content' => __('Full Content','classic-events'),
        ),
	) );

	$wp_customize->add_setting('classic_events_blog_post_thumb',array(
        'sanitize_callback' => 'classic_events_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('classic_events_blog_post_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Show / Hide Blog Post Thumbnail', 'classic-events'),
        'section'     => 'classic_events_blog_post_settings',
    ));

    $wp_customize->add_setting( 'classic_events_blog_post_page_image_box_shadow', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'classic_events_sanitize_integer'
    ) );
    $wp_customize->add_control(new classic_events_Slider_Custom_Control( $wp_customize, 'classic_events_blog_post_page_image_box_shadow',array(
		'label'	=> esc_html__('Blog Page Image Box Shadow','classic-events'),
		'section'=> 'classic_events_blog_post_settings',
		'settings'=>'classic_events_blog_post_page_image_box_shadow',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 100,
        ),
	)));

    $wp_customize->add_setting( 'classic_events_post_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	  ));
  
	  $wp_customize->add_control('classic_events_post_settings_upgraded_features', array(
		  'type'=> 'hidden',
		  'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
			  <a target='_blank' href='". esc_url(CLASSIC_EVENTS_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		  'section' => 'classic_events_blog_post_settings'
	  ));
  

	// Footer Section
	$wp_customize->add_section('classic_events_footer', array(
		'title'	=> __('Manage Footer Section','classic-events'),
		'description'	=> __('<p class="sec-title">Manage Footer Section</p>','classic-events'),
		'priority'	=> null,
		'panel' => 'classic_events_panel_area',
	));

	$wp_customize->add_setting('classic_events_footer_bg_color', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'classic_events_footer_bg_color', array(
        'label'    => __('Footer Background Color', 'classic-events'),
        'section'  => 'classic_events_footer',
    )));

	$wp_customize->add_setting('classic_events_footer_bg_image',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'classic_events_footer_bg_image',array(
        'label' => __('Footer Background Image','classic-events'),
        'section' => 'classic_events_footer',
        'priority' => 1,
    )));

	$wp_customize->add_setting('classic_events_copyright_line',array(
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control( 'classic_events_copyright_line', array(
	   'section' 	=> 'classic_events_footer',
	   'label'	 	=> __('Copyright Line','classic-events'),
	   'type'    	=> 'text',
	   'priority' 	=> null,
    ));

    $wp_customize->add_setting('classic_events_copyright_link',array(
    	'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control( 'classic_events_copyright_link', array(
	   'section' 	=> 'classic_events_footer',
	   'label'	 	=> __('Copyright Link','classic-events'),
	   'type'    	=> 'text',
	   'priority' 	=> null,
    ));

	//  footer coypright color
	$wp_customize->add_setting('classic_events_footercoypright_color',array(
		'default' => '',
		'sanitize_callback' => 'classic_events_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_events_footercoypright_color', array(
	   'settings' => 'classic_events_footercoypright_color',
	   'section'   => 'classic_events_footer',
	   'label' => __('Coypright Color', 'classic-events'),
	   'type'      => 'color'
	));

	//  footer title color
	$wp_customize->add_setting('classic_events_footertitle_color',array(
		'default' => '',
		'sanitize_callback' => 'classic_events_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_events_footertitle_color', array(
	   'settings' => 'classic_events_footertitle_color',
	   'section'   => 'classic_events_footer',
	   'label' => __('Title Color', 'classic-events'),
	   'type'      => 'color'
	));

	//  footer description color
	$wp_customize->add_setting('classic_events_footerdescription_color',array(
		'default' => '',
		'sanitize_callback' => 'classic_events_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_events_footerdescription_color', array(
	   'settings' => 'classic_events_footerdescription_color',
	   'section'   => 'classic_events_footer',
	   'label' => __('Description Color', 'classic-events'),
	   'type'      => 'color'
	));

	//  footer list color
	$wp_customize->add_setting('classic_events_footerlist_color',array(
		'default' => '',
		'sanitize_callback' => 'classic_events_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_events_footerlist_color', array(
	   'settings' => 'classic_events_footerlist_color',
	   'section'   => 'classic_events_footer',
	   'label' => __('List Color', 'classic-events'),
	   'type'      => 'color'
	));

	$wp_customize->add_setting('classic_events_scroll_hide', array(
        'default' => true,
        'sanitize_callback' => 'classic_events_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'classic_events_scroll_hide',array(
        'label'          => __( 'Check To Show Scroll To Top', 'classic-events' ),
        'section'        => 'classic_events_footer',
        'settings'       => 'classic_events_scroll_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('classic_events_scroll_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'classic_events_sanitize_choices'
    ));
    $wp_customize->add_control('classic_events_scroll_position',array(
        'type' => 'radio',
        'section' => 'classic_events_footer',
        'label'	 	=> __('Scroll To Top Positions','classic-events'),
        'choices' => array(
            'Right' => __('Right','classic-events'),
            'Left' => __('Left','classic-events'),
            'Center' => __('Center','classic-events')
        ),
    ) );

    $wp_customize->add_setting( 'classic_events_footer_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	  ));
  
	  $wp_customize->add_control('classic_events_footer_settings_upgraded_features', array(
		  'type'=> 'hidden',
		  'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
			  <a target='_blank' href='". esc_url(CLASSIC_EVENTS_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		  'section' => 'classic_events_footer'
	  ));  

   // Google Fonts
   $wp_customize->add_section( 'classic_events_google_fonts_section', array(
	'title'       => __( 'Google Fonts', 'classic-events' ),
	'priority'    => 24,
) );

$font_choices = array(
	'Kaushan Script:' => 'Kaushan Script',
	'Emilys Candy:' => 'Emilys Candy',
	'Jockey One:' => 'Jockey One',
	'Inter:100,200,300,400,500,600,700,800,900' => 'Inter',
	'Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i:' => 'Montserrat',
	'Poppins:0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900' => 'Poppins',
	'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
	'Open Sans:400italic,700italic,400,700' => 'Open Sans',
	'Oswald:400,700' => 'Oswald',
	'Playfair Display:400,700,400italic' => 'Playfair Display',
	'Montserrat:400,700' => 'Montserrat',
	'Raleway:400,700' => 'Raleway',
	'Droid Sans:400,700' => 'Droid Sans',
	'Lato:400,700,400italic,700italic' => 'Lato',
	'Arvo:400,700,400italic,700italic' => 'Arvo',
	'Lora:400,700,400italic,700italic' => 'Lora',
	'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
	'Oxygen:400,300,700' => 'Oxygen',
	'PT Serif:400,700' => 'PT Serif',
	'PT Sans:400,700,400italic,700italic' => 'PT Sans',
	'PT Sans Narrow:400,700' => 'PT Sans Narrow',
	'Cabin:400,700,400italic' => 'Cabin',
	'Fjalla One:400' => 'Fjalla One',
	'Francois One:400' => 'Francois One',
	'Josefin Sans:400,300,600,700' => 'Josefin Sans',
	'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
	'Arimo:400,700,400italic,700italic' => 'Arimo',
	'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
	'Bitter:400,700,400italic' => 'Bitter',
	'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
	'Roboto:400,400italic,700,700italic' => 'Roboto',
	'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
	'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
	'Roboto Slab:400,700' => 'Roboto Slab',
	'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
	'Rokkitt:400' => 'Rokkitt',
);

$wp_customize->add_setting( 'classic_events_headings_fonts', array(
	'sanitize_callback' => 'classic_events_sanitize_fonts',
));
$wp_customize->add_control( 'classic_events_headings_fonts', array(
	'type' => 'select',
	'description' => __('Select your desired font for the headings.', 'classic-events'),
	'section' => 'classic_events_google_fonts_section',
	'choices' => $font_choices
));

$wp_customize->add_setting( 'classic_events_body_fonts', array(
	'sanitize_callback' => 'classic_events_sanitize_fonts'
));
$wp_customize->add_control( 'classic_events_body_fonts', array(
	'type' => 'select',
	'description' => __( 'Select your desired font for the body.', 'classic-events' ),
	'section' => 'classic_events_google_fonts_section',
	'choices' => $font_choices
));

}
add_action( 'customize_register', 'classic_events_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function classic_events_customize_preview_js() {
	wp_enqueue_script( 'classic_events_customizer', esc_url(get_template_directory_uri()) . '/js/customize-preview.js', array( 'customize-preview' ), '20161510', true );
}
add_action( 'customize_preview_init', 'classic_events_customize_preview_js' );
