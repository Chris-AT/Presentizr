<?php
get_header();
if (have_posts()) : ?>
    <div style="margin-top: 1em;"></div>
    <div class="row">
    <?php $sidebar_right_active = is_active_sidebar('sidebar-right'); ?>
    <div class="<?php echo $sidebar_right_active ? 'col-md-9 ' : ''; ?>col-sm-12 "> 
        
        <?php
    while (have_posts()) :
        the_post(); ?>
        <article <?php post_class('archive'); ?>>
            <?php if(has_post_thumbnail()): ?>
            <div class="overlayContainer">
            <div class="textOverlay">
                <a href="<?php esc_url(the_permalink()); ?>" class="page-title-over-image">
                    <h1><?php the_title(); ?></h1>
                </a>
                <hr class="hr-page-title"/>
            </div> <!-- .textOverlay -->
            <div class="featuredImageContainer">
            <?php the_post_thumbnail('full', array('class' => 'aligncenter featured-image')); ?> 
            </div> <!-- .featuredImageContainer -->
            </div> <!-- .overlayContainer -->
            <?php else: ?>
            <a href="<?php esc_url(the_permalink()); ?>" class="page-title no-underline">
                    <h1><?php the_title(); ?></h1>
                </a>
            <hr class="hr-page-title black"/>
            <?php endif; ?>
            <div class="details">
            <span id="author" class="fa fa-user">&nbsp;<?php esc_url(the_author_posts_link()); ?></span>&nbsp;<span id="time" class="fa fa-clock-o">&nbsp;<?php the_time('l, F j, Y - G:i'); ?></span>
            </div> <!-- .details -->

            <?php the_excerpt(); ?>
            <div><a href="<?php echo esc_url(get_permalink()); ?>" class="read-more"><?php _e('Read more', 'presentizr'); ?></a></div>
        </article>
    <?php endwhile; ?>
    </div> <!-- .col-md-9 .col-xs-12 -->
        
    <?php if($sidebar_right_active) : ?>
        <div class="col-md-3 col-sm-12">
            <?php get_sidebar('right'); ?>
         </div>
    <?php endif; ?>
        </div> <!-- row -->
            <div class="row">
                <div class="col-xs-12 center">
                    <div class="pagination">
                        <?php
                        /**
                         * copied from default theme archive php
                         */
                        the_posts_pagination( array(
                            'prev_text'          => __( 'Previous page', 'presentizr' ),
                            'next_text'          => __( 'Next page', 'presentizr' ),
                            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('Page:', 'presentizr') . ' </span>',
                        ) ); ?>
                    </div> <!-- .pagination -->
                </div> <!-- .col-xs-12 .center -->
            </div> <!-- .row -->
    <?php
    else: 
        get_template_part('content', 'none');
    endif;
    get_footer();
?>