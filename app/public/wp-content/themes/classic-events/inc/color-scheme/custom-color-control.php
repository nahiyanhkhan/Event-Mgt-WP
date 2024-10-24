<?php

$classic_events_first_color = get_theme_mod('classic_events_first_color');
$classic_events_second_color = get_theme_mod('classic_events_second_color');
$classic_events_color_scheme_css = '';

/*------------------ Global First Color -----------*/
$classic_events_color_scheme_css .='.header,.wc-block-components-totals-coupon__button.contained, .woocommerce button.button.alt, .mainhead, .slider-img-color, .postsec-list .search-form input.search-submit, span.page-numbers.current, .nav-links .page-numbers:hover, input.search-submit, .page-links a, .page-links span, .tagcloud a:hover, .copywrap, .breadcrumb a, nav.woocommerce-MyAccount-navigation ul li, .woocommerce a.button, a.wc-block-components-checkout-return-to-cart-button, button.wc-block-components-checkout-place-order-button, #commentform input#submit, .main-nav .current_page_item a::before, .page-template-template-home-page .contact-us a, .contact-us a, #about_section .abt-image .post-color   {';
  $classic_events_color_scheme_css .='background-color: '.esc_attr($classic_events_first_color).'!important;';
$classic_events_color_scheme_css .='}';

$classic_events_color_scheme_css .='.postsec-list .wp-block-button__link, .site-main .wp-block-button__link, .tags a ,.serach_inner, #button, .page-template-template-home-page .header .contact-us a, #slider-cat .sliderbtn a, #service_section .abt-btn .contact-us.btn1 a, #service_section .abt-btn .contact-us.btn2 a:hover, #sidebar input.search-submit, #footer input.search-submit, form.woocommerce-product-search button, .widget_calendar caption, .widget_calendar #today, #footer input.search-submit, span.onsale {';
$classic_events_color_scheme_css .='background: '.esc_attr($classic_events_first_color).'!important;';
$classic_events_color_scheme_css .='}';

$classic_events_color_scheme_css .='#sidebar .widget a:hover, #footer li a:hover, .woocommerce ul.products li.product a, .woocommerce-page .entry-summary a, blockquote a, .postsec-list .wp-block-button.is-style-outline a, .page-template-template-home-page p.site-title a:hover, .page-template-template-home-page h1.site-title a:hover, .page-template-template-home-page .header .contact-us a i, .main-nav ul ul a:hover, #slider-cat .text-content h1 a:hover, #slider-cat .text-content p.slider-smalltitle, #slider-cat .sliderbtn a i, #slider-cat .text-content .slider-text, #service_section .abt-btn .contact-us.btn1 a i, #service_section .abt-btn .contact-us.btn2 a:hover i, .listarticle h2 a:hover, #sidebar ul li::before, 
#sidebar .widget a:active, #footer h6, #about_section .abt-slide-title a:hover, #about_section h2 a:hover, #sidebar .widget-title, .ftr-4-box h5, .edit-link a, wc-block-components-button__text, .woocommerce-MyAccount-content a, .wp-block-quote a, .wc-block-cart__submit-container a, .logged-in-as a, .sliderbox span, .info-box a:hover, .social-icons i:hover, .nav-links a, #comments a, .search-box i, #about_section .abt-title, .entry-content a, .postmeta a:hover, #sidebar aside .page_item a:hover {';
$classic_events_color_scheme_css .='color: '.esc_attr($classic_events_first_color).'!important;';
$classic_events_color_scheme_css .='}';

$classic_events_color_scheme_css .='.site-main .wp-block-button.is-style-outline a, .postsec-list .wp-block-button.is-style-outline a, .widget .tagcloud a:hover {';
$classic_events_color_scheme_css .='border: 1px solid'.esc_attr($classic_events_first_color).'!important;';
$classic_events_color_scheme_css .='}';

$classic_events_color_scheme_css .='#about_section .abt-cat {';
$classic_events_color_scheme_css .='border: 6px solid'.esc_attr($classic_events_first_color).'!important;';
$classic_events_color_scheme_css .='}';

$classic_events_color_scheme_css .='.main-nav ul.sub-menu li a:focus, .main-nav ul ul a:focus, .serach_inner input[type="submit"]:focus, .postsec-list .search-form input.search-submit, #sidebar input[type="text"], #sidebar input[type="search"], #footer input[type="search"], .search-box i:hover {';
$classic_events_color_scheme_css .='border: 2px solid'.esc_attr($classic_events_first_color).'!important;';
$classic_events_color_scheme_css .='}';

$classic_events_color_scheme_css .='.main-nav li ul {';
$classic_events_color_scheme_css .='border-top: 3px solid'.esc_attr($classic_events_first_color).'!important;';
$classic_events_color_scheme_css .='}';

$classic_events_color_scheme_css .='#sidebar .widget{';
$classic_events_color_scheme_css .='border-bottom: 3px solid'.esc_attr($classic_events_first_color).'!important;';
$classic_events_color_scheme_css .='}';

$classic_events_color_scheme_css .='.tagcloud a:hover {';
$classic_events_color_scheme_css .='border-color: '.esc_attr($classic_events_first_color).'!important;';
$classic_events_color_scheme_css .='}';

$classic_events_color_scheme_css .='.wp-block-quote:not(.is-large):not(.is-style-large), blockquote {';
$classic_events_color_scheme_css .='border-left: 5px solid'.esc_attr($classic_events_first_color).'!important;';
$classic_events_color_scheme_css .='}';

$classic_events_color_scheme_css .='
@media screen and (max-width:1000px) {
.toggle-nav button {';
  $classic_events_color_scheme_css .='background-color: '.esc_attr($classic_events_first_color).' !important;';
$classic_events_color_scheme_css .='} }';  

$classic_events_color_scheme_css .='
@media screen and (max-width: 767px) {
.toggle-nav button {';
  $classic_events_color_scheme_css .='background-color: '.esc_attr($classic_events_first_color).' !important;';
$classic_events_color_scheme_css .='} }';  

$classic_events_color_scheme_css .='
@media screen and (min-width: 768px) and (max-width: 999px) {
.toggle-nav button {';
  $classic_events_color_scheme_css .='background: '.esc_attr($classic_events_first_color).' !important;';
$classic_events_color_scheme_css .='} }';   

/*------------------ Global Second Color -----------*/
$classic_events_color_scheme_css .='.imagebox img {';
  $classic_events_color_scheme_css .='border:10px solid'.esc_attr($classic_events_second_color).'!important;';
$classic_events_color_scheme_css .='}';

$classic_events_color_scheme_css .='#about_section .abt-img-color, #about_section .abt-slide-content .abt-thumbbx-color {';
  $classic_events_color_scheme_css .='background-color: '.esc_attr($classic_events_second_color).'!important;';
$classic_events_color_scheme_css .='}';


//---------------------------------Logo-Max-height--------- 
  $classic_events_logo_width = get_theme_mod('classic_events_logo_width');

  if($classic_events_logo_width != false){

    $classic_events_color_scheme_css .='.logo .custom-logo-link img{';

      $classic_events_color_scheme_css .='width: '.esc_html($classic_events_logo_width).'px;';

    $classic_events_color_scheme_css .='}';
  }

   // slider hide css
  $classic_events_slider = get_theme_mod( 'classic_events_slider', false);
    $classic_events_catData = get_theme_mod('classic_events_slider_cat');
  if($classic_events_slider != true || $classic_events_catData != true){
    $classic_events_color_scheme_css .='.page-template-template-home-page .mainhead{';
      $classic_events_color_scheme_css .='position:static; background-color: #ff5f6b;';
    $classic_events_color_scheme_css .='}';
    $classic_events_color_scheme_css .='.page-template-template-home-page .main-nav a:hover{';
      $classic_events_color_scheme_css .='color:#fff;';
    $classic_events_color_scheme_css .='}';
    $classic_events_color_scheme_css .='.page-template-template-home-page .main-nav ul ul a:hover{';
      $classic_events_color_scheme_css .='color:#ff5f6b;';
    $classic_events_color_scheme_css .='}';
    $classic_events_color_scheme_css .='.page-template-template-home-page .contact-us a{';
      $classic_events_color_scheme_css .='background-color: #fff; color: #ff5f6b;';
    $classic_events_color_scheme_css .='}';
    $classic_events_color_scheme_css .='.page-template-template-home-page .contact-us a:hover{';
      $classic_events_color_scheme_css .='background-color: #000; color: #fff;';
    $classic_events_color_scheme_css .='}';
  }

  // slider and about
    
    $classic_events_hidepageboxes = get_theme_mod('classic_events_disabled_pgboxes', false);
    if( $classic_events_slider != true && $classic_events_hidepageboxes != true){
      $classic_events_color_scheme_css .='.page-template-template-home-page .logo:after{';
      $classic_events_color_scheme_css .='content:none !important;';
    $classic_events_color_scheme_css .='}';
  }

  /*---------------------------Slider Height ------------*/

    $classic_events_slider_img_height = get_theme_mod('classic_events_slider_img_height');
    if($classic_events_slider_img_height != false){
        $classic_events_color_scheme_css .='#slider-cat{';
            $classic_events_color_scheme_css .='height: '.esc_attr($classic_events_slider_img_height).' !important;';
        $classic_events_color_scheme_css .='}';
    }

  /*--------------------------- Footer background image -------------------*/

    $classic_events_footer_bg_image = get_theme_mod('classic_events_footer_bg_image');
    if($classic_events_footer_bg_image != false){
        $classic_events_color_scheme_css .='#footer{';
            $classic_events_color_scheme_css .='background: url('.esc_attr($classic_events_footer_bg_image).')!important;';
            $classic_events_color_scheme_css .= 'background-size: cover!important;';    
        $classic_events_color_scheme_css .='}';
    }

  /*--------------------------- Scroll to top positions -------------------*/

    $classic_events_scroll_position = get_theme_mod( 'classic_events_scroll_position','Right');
    if($classic_events_scroll_position == 'Right'){
        $classic_events_color_scheme_css .='#button{';
            $classic_events_color_scheme_css .='right: 20px;';
        $classic_events_color_scheme_css .='}';
    }else if($classic_events_scroll_position == 'Left'){
        $classic_events_color_scheme_css .='#button{';
            $classic_events_color_scheme_css .='left: 20px;';
        $classic_events_color_scheme_css .='}';
    }else if($classic_events_scroll_position == 'Center'){
        $classic_events_color_scheme_css .='#button{';
            $classic_events_color_scheme_css .='right: 50%;left: 50%;';
        $classic_events_color_scheme_css .='}';
    }

  /*--------------------------- Footer Background Color -------------------*/

    $classic_events_footer_bg_color = get_theme_mod('classic_events_footer_bg_color');
    if($classic_events_footer_bg_color != false){
        $classic_events_color_scheme_css .='#footer{';
            $classic_events_color_scheme_css .='background-color: '.esc_attr($classic_events_footer_bg_color).' !important;';
        $classic_events_color_scheme_css .='}';
    }

    /*--------------------------- Blog Post Page Image Box Shadow -------------------*/

    $classic_events_blog_post_page_image_box_shadow = get_theme_mod('classic_events_blog_post_page_image_box_shadow',0);
    if($classic_events_blog_post_page_image_box_shadow != false){
        $classic_events_color_scheme_css .='.post-thumb img{';
            $classic_events_color_scheme_css .='box-shadow: '.esc_attr($classic_events_blog_post_page_image_box_shadow).'px '.esc_attr($classic_events_blog_post_page_image_box_shadow).'px '.esc_attr($classic_events_blog_post_page_image_box_shadow).'px #cccccc;';
        $classic_events_color_scheme_css .='}';
    }

    /*--------------------------- Woocommerce Product Image Border Radius -------------------*/

    $classic_events_woo_product_img_border_radius = get_theme_mod('classic_events_woo_product_img_border_radius');
    if($classic_events_woo_product_img_border_radius != false){
        $classic_events_color_scheme_css .='.woocommerce ul.products li.product a img{';
            $classic_events_color_scheme_css .='border-radius: '.esc_attr($classic_events_woo_product_img_border_radius).'px;';
        $classic_events_color_scheme_css .='}';
    }

    /*--------------------------- Woocommerce Product Sale Position -------------------*/    

    $classic_events_product_sale_position = get_theme_mod( 'classic_events_product_sale_position','Left');
    if($classic_events_product_sale_position == 'Right'){
        $classic_events_color_scheme_css .='.woocommerce ul.products li.product .onsale{';
            $classic_events_color_scheme_css .='left:auto; right:0;';
        $classic_events_color_scheme_css .='}';
    }else if($classic_events_product_sale_position == 'Left'){
        $classic_events_color_scheme_css .='.woocommerce ul.products li.product .onsale {';
            $classic_events_color_scheme_css .='right:auto; left:0;';
        $classic_events_color_scheme_css .='}';
    }    

    /*--------------------------- Shop page pagination -------------------*/

    $classic_events_wooproducts_nav = get_theme_mod('classic_events_wooproducts_nav', 'Yes');
    if($classic_events_wooproducts_nav == 'No'){
      $classic_events_color_scheme_css .='.woocommerce nav.woocommerce-pagination{';
        $classic_events_color_scheme_css .='display: none;';
      $classic_events_color_scheme_css .='}';
    }

    /*--------------------------- Related Product -------------------*/

    $classic_events_related_product_enable = get_theme_mod('classic_events_related_product_enable',true);
    if($classic_events_related_product_enable == false){
      $classic_events_color_scheme_css .='.related.products{';
        $classic_events_color_scheme_css .='display: none;';
      $classic_events_color_scheme_css .='}';
    }