<?php
/**
 * @package Classic Events
 */
?>

<?php
    $classic_events_post_date = get_the_date();
    $classic_events_year = get_the_date('Y');
    $classic_events_month = get_the_date('m');

    $classic_events_author_id = get_the_author_meta('ID');
    $classic_events_author_link = esc_url(get_author_posts_url($classic_events_author_id));
    $classic_events_author_name = get_the_author();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="listarticle">
      <?php
        if ( ! is_single() ) {
          // If not a single post, highlight the gallery.
          if ( get_post_gallery() ) {
              echo '<div class="entry-gallery">';
              echo ( get_post_gallery() );
              echo '</div>';
          };
        };
      ?>
        <header class="entry-header">
            <h2 class="single_title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
            <?php if ('post' == get_post_type()) : ?>
                <div class="postmeta">
                    <div class="post-date">
                        <a href="<?php echo esc_url(get_month_link($classic_events_year, $classic_events_month)); ?>">
                            <i class="fas fa-calendar-alt"></i> &nbsp;<?php echo esc_html($classic_events_post_date); ?>
                            <span class="screen-reader-text"><?php echo esc_html($classic_events_post_date); ?></span>
                        </a>
                    </div>
                    <div class="post-comment">&nbsp; &nbsp;
                        <a href="<?php echo esc_url(get_comments_link()); ?>">
                            <i class="fa fa-comment"></i> &nbsp; <?php comments_number(); ?>
                            <span class="screen-reader-text"><?php comments_number(); ?></span>
                        </a>
                    </div>
                    <div class="post-author">&nbsp; &nbsp;
                        <a href="<?php echo $classic_events_author_link; ?>">
                            <i class="fas fa-user"></i> &nbsp; <?php echo esc_html($classic_events_author_name); ?>
                            <span class="screen-reader-text"><?php echo esc_html($classic_events_author_name); ?></span>
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </header>
        <?php if ( is_search() || !is_single() ) : // Only display Excerpts for Search ?>
        <div class="entry-summary">
            <?php if(get_theme_mod('classic_events_blog_post_description_option') == 'Full Content'){ ?>
                <div class="entry-content"><?php
                    $classic_events_content = get_the_content(); ?>
                    <p><?php echo wpautop($classic_events_content); ?></p>  
                </div>
             <?php }
            if(get_theme_mod('classic_events_blog_post_description_option', 'Excerpt Content') == 'Excerpt Content'){ ?>
                <?php if(get_the_excerpt()) { ?>
                    <div class="entry-content"> 
                        <p><?php $classic_events_excerpt = get_the_excerpt(); echo esc_html($classic_events_excerpt); ?></p>
                    </div>
                <?php }?>
            <?php }?>      
        </div>
        <?php else : ?>
        <div class="entry-content">
            <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'classic-events' ) ); ?>
            <?php
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . __( 'Pages:', 'classic-events' ),
                    'after'  => '</div>',
                ) );
            ?>
        </div>
        <?php endif; ?>
        <div class="clear"></div>    
    </div>
</article>