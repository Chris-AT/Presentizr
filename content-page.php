<div class="row">
<?php $sidebar_right_active = is_active_sidebar('sidebar-right'); ?>
<div class="<?php echo $sidebar_right_active ? 'col-md-9 ' : ''; ?>col-sm-12 ">
<?php while(have_posts()) {
    the_post(); ?>
<article>
<h1 class="page-title"><?php the_title(); ?></h1> 

    <?php the_content(); ?>
</article>
<?php } ?>
</div>
<?php if($sidebar_right_active) : ?>
    <div class="col-md-3 col-sm-12">
        <?php get_sidebar('right'); ?>
    </div>
<?php endif; ?>
</div> <!-- row -->
<?php  //Facebook comments
$user_fb_settings = get_theme_mod('show_fb_comments_settings', '0');
if( ($user_fb_settings == '2') || ($user_fb_settings == '3') ) : ?>
<div class="row">
    <div class="col-xs-12">
        <div class="fb-comments" data-href="<?php echo 'http://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ?>" data-numposts="5"></div>
    </div> <!-- .col-xs-12 -->
</div> <!-- .row -->
<?php 
endif; ?>

<?php //share buttons
 get_template_part('content', 'share');
         



