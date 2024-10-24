<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Classic Events
 */
?>
<div id="footer">
  <div class="container">
    <div class="row footer-content">
      <?php dynamic_sidebar('footer-nav'); ?>
    </div>
  </div>
  <div class="copywrap text-center">
    <div class="container">
      <p>
        <a href="<?php 
          $classic_events_copyright_link = get_theme_mod('classic_events_copyright_link', '');
          if (empty($classic_events_copyright_link)) {
              echo esc_url('https://www.theclassictemplates.com/products/free-event-wordpress-theme');
          } else {
              echo esc_url($classic_events_copyright_link);
          } ?>" target="_blank">
          <?php echo esc_html(get_theme_mod('classic_events_copyright_line', __('Events WordPress Theme', 'classic-events'))); ?>
        </a> 
        <?php echo esc_html('By Classic Templates', 'classic-events'); ?>
      </p>
    </div>
  </div>
</div>

<?php if(get_theme_mod('classic_events_scroll_hide',true)){ ?>
 <a id="button"><?php esc_html_e('TOP', 'classic-events'); ?></a>
<?php } ?>
  
<?php wp_footer(); ?>
</body>
</html>
