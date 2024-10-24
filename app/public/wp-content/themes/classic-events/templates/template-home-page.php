<?php
/**
 * The Template Name: Home Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Classic Events
 */

get_header(); ?>

<div id="content" >

  <?php
    $classic_events_hidepageboxes = get_theme_mod('classic_events_slider', false);
    $classic_events_catData = get_theme_mod('classic_events_slider_cat');

    if ($classic_events_hidepageboxes && $classic_events_catData) { ?>
    <section id="slider-cat">
        <div class="slideimg">
            <div class="container sliderbox">
                <div class="owl-carousel m-0">
                    <?php
                    $classic_events_page_query = new WP_Query(
                        array(
                            'category_name' => esc_attr($classic_events_catData),
                            'posts_per_page' => -1, 
                        )
                    );
                    while ($classic_events_page_query->have_posts()) : $classic_events_page_query->the_post(); ?>
                        <div class="row">
                            <div class="col-lg-7 col-md-6 mb-md-5 mb-2">
                                <div class="text-content">
                                    <?php if(get_theme_mod('classic_events_slider_top_text') != ''){ ?>
                                        <p class="slider-text mb-lg-2 mb-0"><?php echo esc_html(get_theme_mod('classic_events_slider_top_text')); ?></p>
                                    <?php }?>
                                    <h1 class="my-lg-2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                                    <?php
                                    $classic_events_trimexcerpt  = get_the_excerpt();
                                    $classic_events_shortexcerpt = wp_trim_words($classic_events_trimexcerpt, $num_words = 45);
                                    echo '<p class="slider-content mt-3">' . esc_html($classic_events_shortexcerpt) . '</p>';
                                    ?>
                                    <div class="sliderbtn mt-lg-4">
                                        <?php 
                                        $classic_events_button_text = get_theme_mod('classic_events_button_text', 'Online Request');
                                        $classic_events_button_link = get_theme_mod('classic_events_button_link_slider', ''); 
                                        if (empty($classic_events_button_link)) {
                                            $classic_events_button_link = get_permalink();
                                        }
                                        if (!empty($classic_events_button_text) || !empty($classic_events_button_link)) { ?>
                                            <div class="slide-btn">
                                                <a href="<?php echo esc_url($classic_events_button_link); ?>">
                                                    <?php echo esc_html($classic_events_button_text); ?>
                                                    <span class="screen-reader-text"><?php echo esc_html($classic_events_button_text); ?></span>
                                                </a>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-6 col-12 mb-5">
                                <div class="imagebox">
                                    <?php if(has_post_thumbnail()){
                                      the_post_thumbnail('full');
                                      } else{?>
                                      <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/slider.png" alt=""/>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
    </section>
  <?php } ?>

  <?php
    $classic_events_hidepageboxes = get_theme_mod('classic_events_disabled_pgboxes',false);
    $classic_events_about_pageboxes = get_theme_mod('classic_events_about_pageboxes', false);
    $classic_events_about_catData = get_theme_mod('classic_events_about_catData');
    if( $classic_events_hidepageboxes && $classic_events_about_pageboxes){
  ?>
  <div id="about_section" class="my-5 mx-md-0 mx-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-5 mb-2 align-self-center">
                <?php 
                if (get_theme_mod('classic_events_about_pageboxes', false)) {
                    $classic_events_querymed = new WP_Query('page_id=' . esc_attr(get_theme_mod('classic_events_about_pageboxes', false)));
                    while ($classic_events_querymed->have_posts()) : $classic_events_querymed->the_post(); ?>
                        <div class="text-inner-box">
                            <?php if (get_theme_mod('classic_events_about_title') != '') { ?>
                                <p class="abt-title mb-2 text-uppercase">
                                    <?php echo esc_html(get_theme_mod('classic_events_about_title')); ?>
                                </p>
                            <?php } ?>
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <p class="main-para"><?php echo esc_html(wp_trim_words(get_the_content(), 32, '...')); ?></p>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata();
                }
                ?>
                <div class="abt-slide-content">
                    <div class="owl-carousel m-0" id="abtslider">
                        <?php
                        $classic_events_abtpage_query = new WP_Query(array(
                            'category_name' => esc_attr($classic_events_about_catData),
                            'posts_per_page' => -1, 
                        ));
                        while ($classic_events_abtpage_query->have_posts()) : $classic_events_abtpage_query->the_post(); ?>
                            <div class="row item">
                                <div class="col-lg-3 col-md-5 col-5 align-self-center">
                                    <div class="abt-thumbbx">
                                        <?php
                                            if (has_post_thumbnail()) {
                                                the_post_thumbnail();
                                            } else {
                                                echo '<div class="abt-thumbbx-color"></div>';
                                            }
                                            ?>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-7 col-7 align-self-center">
                                    <div class="text-inner-box">
                                        <h3 class="text-uppercase abt-slide-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                        <p><?php echo esc_html(wp_trim_words(get_the_content(), 10,)); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-5 abt-slider-col align-self-center">
                <div class="abt-cat">
                    <div class="owl-carousel m-0">
                        <?php
                        $classic_events_abtpage_query = new WP_Query(array(
                            'category_name' => esc_attr($classic_events_about_catData),
                            'posts_per_page' => -1, 
                        ));
                        while ($classic_events_abtpage_query->have_posts()) : $classic_events_abtpage_query->the_post(); ?>
                            <div class="abt-imagebox">
                                <?php
                                if (has_post_thumbnail()) {
                                    the_post_thumbnail();
                                } else {
                                    echo '<div class="abt-img-color"></div>';
                                }
                                ?>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-7 align-self-center abt-image"> 
                <?php 
                if (get_theme_mod('classic_events_about_pageboxes', false)) {
                    $classic_events_querymed = new WP_Query('page_id=' . esc_attr(get_theme_mod('classic_events_about_pageboxes', false)));
                    while ($classic_events_querymed->have_posts()) : $classic_events_querymed->the_post(); ?>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="thumbbx">
                                <?php the_post_thumbnail('full'); ?>
                            </div>
                        <?php else : ?>
                            <div class="post-color"></div>
                        <?php endif; ?>
                    <?php endwhile;
                    wp_reset_postdata();
                }
                ?>
            </div>
        </div>
    </div>
</div>


  <?php }?>

</div>
<?php get_footer(); ?>