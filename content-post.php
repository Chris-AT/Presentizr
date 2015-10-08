<div class="row">
<?php $sidebar_right_active = is_active_sidebar('sidebar-right'); 
    $css_class = $sidebar_right_active ? 'col-md-9 ' : ''; ?>
    <div class="<?php echo $sidebar_right_active ? 'col-md-9 ' : ''; ?>col-sm-12">
<?php while(have_posts()) :
    the_post(); ?>
        <article <?php post_class(); ?>>
<h1 class="post-title"><?php the_title(); ?></h1>
    <div class="details">
        <span id="author" class="fa fa-user">&nbsp;<?php the_author_posts_link(); ?></span>&nbsp;<span id="time"><?php the_time('l, F j, Y'); ?></span>
    </div> <!-- .details -->
        <?php the_post_thumbnail('full', array('class' => 'single-featured-image')); ?>
    <?php the_content(); ?>
</article>
    <div class="row">
        <div class="col-xs-12 center">
                    <?php wp_link_pages(); ?>
        </div>
    </div>
<?php 
/*
 * Only on last page
 */
global $page;
global $numpages;
if($numpages == $page) :
    if(has_tag()) : ?>
    <div class="row tags">
        <div class="col-xs-12">
            <div id='tags'>
                <span id="tag-category-label"><?php _e('Tags:', 'presentizr') ?></span>
                <?php the_tags('', '', ''); ?>
            </div> <!-- #tags -->
        </div> <!-- .col-xs-12 -->
    </div> <!-- .row -->
<?php endif; ?>
<?php if(has_category()) : ?>
    <div class="row categories">
        <div class="col-xs-12">
            <div id="categories">
                <span id="tag-category-label"><?php _e('Categories: ', 'presentizr'); ?></span>
                <?php the_category(); ?>
            </div> <!-- #tags -->
        </div> <!-- .col-xs-12 -->
    </div> <!-- .row -->   
<?php endif; ?>

<?php //share buttons
get_template_part('content', 'share');
endif; //check of last page of post
endwhile; ?>
</div> <!-- .col-md-9 -->
<?php if($sidebar_right_active) : ?>
    <div class="col-md-3 col-sm-12">
        <?php get_sidebar('right'); ?>
    </div> <!-- .col-md-3 col-sm-12 -->
<?php endif; ?>

</div> <!-- .row -->
<?php  //Facebook comments
if($numpages == $page) :
$user_fb_settings = get_theme_mod('show_fb_comments_settings', '0');
if( ($user_fb_settings == '1') || ($user_fb_settings == '3') ) : ?>
<div class="row">
    <div class="col-xs-12">
        <div class="fb-comments" data-href="<?php echo 'http://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ?>" data-numposts="5"></div>
    </div> <!-- .col-xs-12 -->
</div> <!-- row -->
<?php 
endif; //user settings
if(comments_open() || get_comments_number()) {
    comments_template();
}
endif; //last page




