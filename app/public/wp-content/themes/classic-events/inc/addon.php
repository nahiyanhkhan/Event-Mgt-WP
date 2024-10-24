<?php
/*
 * @package Ebooks Collection
 */

function classic_events_admin_enqueue_scripts() {
    wp_enqueue_style( 'classic-events-admin-style', esc_url( get_template_directory_uri() ).'/css/addon.css' );
}
add_action( 'admin_enqueue_scripts', 'classic_events_admin_enqueue_scripts' );

add_action('after_switch_theme', 'classic_events_options');

function classic_events_options() {
    global $pagenow;
    if( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) && current_user_can( 'manage_options' ) ) {
        wp_redirect( admin_url( 'themes.php?page=classic-events' ) );
        exit;
    }
}

function classic_events_theme_info_menu_link() {

    $classic_events_theme = wp_get_theme();
    add_theme_page(
        sprintf( esc_html__( 'Welcome to %1$s %2$s', 'classic-events' ), $classic_events_theme->get( 'Name' ), $classic_events_theme->get( 'Version' ) ),
        esc_html__( 'Theme Info', 'classic-events' ),'edit_theme_options','classic-events','classic_events_theme_info_page'
    );
}
add_action( 'admin_menu', 'classic_events_theme_info_menu_link' );

function classic_events_theme_info_page() {

    $classic_events_theme = wp_get_theme();
    ?>
<div class="wrap theme-info-wrap">
    <h1><?php printf( esc_html__( 'Welcome to %1$s %2$s', 'classic-events' ), esc_html($classic_events_theme->get( 'Name' )), esc_html($classic_events_theme->get( 'Version' ))); ?>
    </h1>
    <p class="theme-description">
    <?php esc_html_e( 'Do you want to configure this theme? Look no further, our easy-to-follow theme documentation will walk you through it.', 'classic-events' ); ?>
    </p>
    <div class="important-link">
        <p class="main-box columns-wrapper clearfix">
            <div class="themelink column column-half clearfix">
                <p><strong><?php esc_html_e( 'Pro version of our theme', 'classic-events' ); ?></strong></p>
                <p><?php esc_html_e( 'Are you exited for our theme? Then we will proceed for pro version of theme.', 'classic-events' ); ?></p>
                <a class="get-premium" href="<?php echo esc_url( CLASSIC_EVENTS_PREMIUM_PAGE ); ?>" target="_blank"><?php esc_html_e( 'Go To Premium', 'classic-events' ); ?></a>
                <p><strong><?php esc_html_e( 'Check all classic features', 'classic-events' ); ?></strong></p>
                <p><?php esc_html_e( 'Explore all the premium features.', 'classic-events' ); ?></p>
                <a href="<?php echo esc_url( CLASSIC_EVENTS_THEME_PAGE ); ?>" target="_blank"><?php esc_html_e( 'Theme Page', 'classic-events' ); ?></a>
            </div>
            <div class="themelink column column-half clearfix">
                <p><strong><?php esc_html_e( 'Need Help?', 'classic-events' ); ?></strong></p>
                <p><?php esc_html_e( 'Go to our support forum to help you out in case of queries and doubts regarding our theme.', 'classic-events' ); ?></p>
                <a href="<?php echo esc_url( CLASSIC_EVENTS_SUPPORT ); ?>" target="_blank"><?php esc_html_e( 'Contact Us', 'classic-events' ); ?></a>
                <p><strong><?php esc_html_e( 'Leave us a review', 'classic-events' ); ?></strong></p>
                <p><?php esc_html_e( 'Are you enjoying our theme? We would love to hear your feedback.', 'classic-events' ); ?></p>
                <a href="<?php echo esc_url( CLASSIC_EVENTS_REVIEW ); ?>" target="_blank"><?php esc_html_e( 'Rate This Theme', 'classic-events' ); ?></a>
            </div>
            <div class="themelink column column-half clearfix">
                <p><strong><?php esc_html_e( 'Check Our Demo', 'classic-events' ); ?></strong></p>
                <p><?php esc_html_e( 'Here, you can view a live demonstration of our premium them.', 'classic-events' ); ?></p>
                <a href="<?php echo esc_url( CLASSIC_EVENTS_PRO_DEMO ); ?>" target="_blank"><?php esc_html_e( 'Premium Demo', 'classic-events' ); ?></a>
                <p><strong><?php esc_html_e( 'Theme Documentation', 'classic-events' ); ?></strong></p>
                <p><?php esc_html_e( 'Need more details? Please check our full documentation for detailed theme setup.', 'classic-events' ); ?></p>
                <a href="<?php echo esc_url( CLASSIC_EVENTS_THEME_DOCUMENTATION ); ?>" target="_blank"><?php esc_html_e( 'Documentation', 'classic-events' ); ?></a>
            </div>
        </p>
    </div>
    <div id="getting-started">
        <h3><?php printf( esc_html__( 'Getting started with %s', 'classic-events' ),
        esc_html($classic_events_theme->get( 'Name' ))); ?></h3>
        <div class="columns-wrapper clearfix">
            <div class="column column-half clearfix">
                <div class="section">
                    <h4><?php esc_html_e( 'Theme Description', 'classic-events' ); ?></h4>
                    <div class="theme-description-1"><?php echo esc_html($classic_events_theme->get( 'Description' )); ?></div>
                </div>
            </div>
            <div class="column column-half clearfix">
                <img src="<?php echo esc_url( $classic_events_theme->get_screenshot() ); ?>" alt=""/>
                <div class="section">
                    <h4><?php esc_html_e( 'Theme Options', 'classic-events' ); ?></h4>
                    <p class="about">
                    <?php printf( esc_html__( '%s makes use of the Customizer for all theme settings. Click on "Customize Theme" to open the Customizer now.', 'classic-events' ),esc_html($classic_events_theme->get( 'Name' ))); ?></p>
                    <p>
                    <div class="themelink-1">
                        <a target="_blank" href="<?php echo esc_url( wp_customize_url() ); ?>"><?php esc_html_e( 'Customize Theme', 'classic-events' ); ?></a>
                        <a href="<?php echo esc_url( CLASSIC_EVENTS_PREMIUM_PAGE ); ?>" target="_blank"><?php esc_html_e( 'Checkout Premium', 'classic-events' ); ?></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div id="theme-author">
      <p><?php
        printf( esc_html__( '%1$s is proudly brought to you by %2$s. If you like this theme, %3$s :)', 'classic-events' ),
            esc_html($classic_events_theme->get( 'Name' )),
            '<a target="_blank" href="' . esc_url( 'https://www.theclassictemplates.com/', 'classic-events' ) . '">classictemplate</a>',
            '<a target="_blank" href="' . esc_url( CLASSIC_EVENTS_REVIEW ) . '" title="' . esc_attr__( 'Rate it', 'classic-events' ) . '">' . esc_html_x( 'rate it', 'If you like this theme, rate it', 'classic-events' ) . '</a>'
        );
        ?></p>
    </div>
</div>
<?php
}
?>
