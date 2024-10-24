<?php
/*
Plugin Name: Event API Plugin
Description: Custom plugin for API communication and event display
Version: 1.0
Author: Your Name
*/

// Prevent direct access to the plugin file
if (!defined('ABSPATH')) {
    exit;
}

class EventAPIPlugin {
    private $events_per_page = 6;

    public function __construct() {
        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
        add_shortcode('event_list', array($this, 'event_list_shortcode'));
    }

    public function enqueue_scripts() {
        wp_enqueue_script('event-api-script', plugin_dir_url(__FILE__) . 'js/event-api-script.js', array('jquery'), '1.0', true);
        wp_enqueue_style('event-api-style', plugin_dir_url(__FILE__) . 'css/event-api-style.css');
    }

    public function get_events() {
        $api_url = 'http://127.0.0.1:8000/api/v1/events';
        $response = wp_remote_get($api_url);

        if (is_wp_error($response)) {
            return false;
        }

        $body = wp_remote_retrieve_body($response);
        return json_decode($body, true);
    }

    public function event_list_shortcode($atts) {
        $events = $this->get_events();
    
        if (!$events) {
            return '<p>Error fetching events.</p>';
        }
    
        ob_start();
        ?>
        <div class="event-list-container">
            <div class="event-controls">
                <div class="view-toggle">
                    <button class="toggle-btn">Switch to List View</button>
                </div>
                <div class="event-filter">
                    <input type="text" id="search-filter" placeholder="Search events...">
                    <select id="category-filter">
                        <option value="all">All Categories</option>
                        <option value="Conference">Conference</option>
                        <option value="Exhibition">Exhibition</option>
                        <option value="Others">Others</option>
                    </select>
                    <input type="date" id="date-filter" name="date-filter">
                    <button id="clear-filters">Clear Filters</button>
                </div>
            </div>
            <div class="event-list grid-view">
                <?php foreach ($events as $event): ?>
                    <div class="event-item" 
                         data-category="<?php echo esc_attr($event['category']); ?>" 
                         data-date="<?php echo esc_attr($event['date']); ?>"
                         data-title="<?php echo esc_attr($event['title']); ?>"
                         data-description="<?php echo esc_attr($event['description']); ?>">
                        <h3><?php echo esc_html($event['title']); ?></h3>
                        <p><?php echo esc_html($event['description']); ?></p>
                        <p>Date: <?php echo esc_html($event['date']); ?></p>
                        <p>Time: <?php echo esc_html($event['time']); ?></p>
                        <p>Location: <?php echo esc_html($event['location']); ?></p>
                        <p>Category: <?php echo esc_html($event['category']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }

    function add_event_shortcode() {
        ob_start();
        ?>
        <form id="create-event-form" method="post">
            <label for="event-title">Event Title:</label>
            <input type="text" id="event-title" name="event-title" required>
    
            <label for="event-description">Event Description:</label>
            <textarea id="event-description" name="event-description" required></textarea>
    
            <label for="event-date">Event Date:</label>
            <input type="date" id="event-date" name="event-date" required>
    
            <label for="event-time">Event Time:</label>
            <input type="time" id="event-time" name="event-time" required>
    
            <label for="event-location">Event Location:</label>
            <input type="text" id="event-location" name="event-location" required>
    
            <label for="event-category">Event Category:</label>
            <select id="event-category" name="event-category" required>
                <option value="Conference">Conference</option>
                <option value="Exhibition">Exhibition</option>
                <option value="Others">Others</option>
            </select>
    
            <input type="submit" value="Create Event">
        </form>
        <?php
        return ob_get_clean();
    }
    add_shortcode('add_event', 'add_event_shortcode');

    function enqueue_add_event_assets() {
        wp_enqueue_style('event-api-style', plugins_url('css/event-api-style.css', __FILE__));
        wp_enqueue_script('create-event-script', plugins_url('js/create-event.js', __FILE__), array('jquery'), '1.0', true);
        wp_localize_script('create-event-script', 'ajaxurl', admin_url('admin-ajax.php'));
    }
    add_action('wp_enqueue_scripts', 'enqueue_add_event_assets');

    function handle_create_event() {
        // Here you would typically validate the data and create the event
        // For now, we'll just send a success response
        wp_send_json_success('Event created successfully');
    }
    add_action('wp_ajax_create_event', 'handle_create_event');
    add_action('wp_ajax_nopriv_create_event', 'handle_create_event');
}

new EventAPIPlugin();