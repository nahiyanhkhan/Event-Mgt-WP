<?php
function classic_events_child_enqueue_styles() {
    $parent_style = 'classic-events-style'; // This is the parent theme's handle.

    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
    wp_enqueue_style('classic-events-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array($parent_style)
    );
}
add_action('wp_enqueue_scripts', 'classic_events_child_enqueue_styles');
