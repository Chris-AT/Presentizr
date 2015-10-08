<?php
get_header();
/**
 * displays the appropriate archive title (tag, date, author...)
 */
if(is_search()) {
    echo '<h1 class="archive-page-title">' . __('Search results for:', 'presentizr') . ' ' . get_search_query() . '</h1>';
}
if (have_posts()) : ?>
    <div class="row">
    <?php $sidebar_right_active = is_active_sidebar('sidebar-right'); ?>
    <div class="<?php echo $sidebar_right_active ? 'col-md-9 ' : ''; ?>col-sm-12 "> <?php
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
                   'prev_text'          => __( 'Previous page', 'presentizr' ),
                   'next_text'          => __( 'Next page', 'presentizr' ),
                   'before_page_number' => '<span class="meta-nav screen-reader-text">'  . __('Page:', 'presentizr') . ' </span>',
               ) ); ?>
            </div> <!-- .col-xs-12 -->
        </div> <!-- .row -->
            
 <?php
    else: 
    get_template_part('content', 'none');
    endif;

get_footer();