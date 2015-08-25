<?php the_post(); ?>
<article <?php post_class('archive'); ?>>
    <a href="<?php the_permalink(); ?>" class="page-title no-underline"><h1><?php the_title(); ?></h1></a><hr class="hr-page-title"/>
    <?php the_excerpt(); ?>
    <div><a href="<?php echo get_permalink(); ?>" class="read-more"><?php _e('Read more', 'standout'); ?></a></div>
</article>




