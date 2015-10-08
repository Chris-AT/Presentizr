<?php the_post(); ?>
<article <?php post_class('archive'); ?>>
    <a href="<?php echo esc_url(the_permalink()); ?>" class="page-title no-underline"><h1><?php esc_html_e(the_title()); ?></h1></a><hr class="hr-page-title"/>
    <?php the_excerpt(); ?>
    <div><a href="<?php echo esc_url(get_permalink()); ?>" class="read-more"><?php _e('Read more', 'presentizr'); ?></a></div>
</article>




