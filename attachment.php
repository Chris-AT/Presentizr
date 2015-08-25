<?php

get_header();

if(have_posts()) {    the_post();?>
<div class="row">
    <div class="col-xs-12">
    <h1><?php the_title();?> </h1>
    <?php echo wp_get_attachment_image(get_the_ID(), 'full');
    $sizes = get_intermediate_image_sizes();
    _e('Download:', 'standout');
    echo ' ';
    //add full size to download (not included in get_intermediate_image_sizes() )
    $sizes[] = 'full';
    foreach ($sizes as $size) {
       $attachment_attr = wp_get_attachment_image_src(get_the_ID(), $size);
       echo '<a class="attachment-download-link" href="' . $attachment_attr[0] . '" download>' . $attachment_attr[1] . 'x' . $attachment_attr[2] . '</a>';
    }
    
 ?>
    </div><!-- .col-xs-12 -->
</div>
<?php } 
else {
    get_template_part('content', 'none');
}
get_footer();
