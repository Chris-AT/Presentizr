<?php
get_header();
/**
 * displays the appropriate archive title (tag, date, author...)
 */
the_archive_title( '<h1 class="archive-page-title">', '</h1>' );
the_archive_description( '<div class="taxonomy-description">', '</div>' );
if (have_posts()) : ?>
    <div class="row">
    <?php $sidebar_right_active = is_active_sidebar('sidebar-right'); ?>
    <div class="<?php echo $sidebar_right_active ? 'col-md-9 ' : ''; ?>col-sm-12"> <?php
    while (have_posts()) : ?> 
        <?php  get_template_part('content', 'archive'); ?>
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
                <?php
               /**
                * copied from default theme archive php
                */
               the_posts_pagination( array(
                   'prev_text'          => __( 'Previous page', 'standout' ),
                   'next_text'          => __( 'Next page', 'standout' ),
                   'before_page_number' => '<span class="meta-nav screen-reader-text">'  . __('Page:', 'standout') . ' </span>',
               ) ); ?>
            </div> <!-- .col-xs-12 -->
        </div> <!-- .row -->
            
 <?php
    else: 
    get_template_part('content', 'none');
    endif;

get_footer();