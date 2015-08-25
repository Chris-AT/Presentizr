    <?php /* Template Name: Front Page Template */ ?>
<?php
get_header();
?> 
<div class="wrappertable">
    <div class="wrappercell">
    <div class="row" id="namerow">
        <div class="col-xs-12 name text-center">
            <div id="blog-title"><?php bloginfo('name'); ?></div>
            <div class="description"><?php bloginfo('description'); ?></div>
        </div>
    </div>
    <?php
    $number_of_boxes = get_theme_mod('assign-number-of-pages-settings', 0);
?>
<div class="row" id="page-boxes">
<?php
switch ($number_of_boxes) {
    case 0:
        
        break;
    case 1:
        
        ?> 
    <div class="col-md-offset-4 col-md-4 featured-page vcenter col-sm-12">
        <a href="<?php echo get_permalink(get_post(get_theme_mod('box-1-settings'))->ID); ?>">
            <?php echo get_post(get_theme_mod('box-1-settings'))->post_title; ?></a>
    </div>
        <?php
        break;
    case 2: ?>
    <div class="col-md-offset-2 col-md-4 vcenter col-sm-12">
        <a href="<?php echo get_permalink(get_post(get_theme_mod('box-1-settings'))->ID); ?>">
            <div class="featured-page"><?php echo get_post(get_theme_mod('box-1-settings'))->post_title; ?></div>
        </a>
    </div>
    <div class="col-md-4 vcenter col-sm-12">
        <a href="<?php echo get_permalink(get_post(get_theme_mod('box-2-settings'))->ID); ?>">
            <div class="featured-page"><?php echo get_post(get_theme_mod('box-2-settings'))->post_title; ?></div>
        </a>
    </div>
        
        <?php
        break;
    case 3: ?>
    <div class="col-md-4 vcenter col-sm-12">
        <a href="<?php echo get_permalink(get_post(get_theme_mod('box-1-settings'))->ID); ?>"><div class="featured-page">
            <?php echo get_post(get_theme_mod('box-1-settings'))->post_title; ?></div>
        </a>
    </div>
    <div class="col-md-4 vcenter col-sm-12">
        <a href="<?php echo get_permalink(get_post(get_theme_mod('box-2-settings'))->ID); ?>"><div class="featured-page">
            <?php echo get_post(get_theme_mod('box-2-settings'))->post_title; ?></div>
        </a>
    </div>
    <div class="col-md-4 vcenter col-sm-12">
        <a href="<?php echo get_permalink(get_post(get_theme_mod('box-3-settings'))->ID); ?>"><div class="featured-page">
            <?php echo get_post(get_theme_mod('box-3-settings'))->post_title; ?></div>
        </a>
    </div>
    
        <?php
        break;

    default:
        
        break;
}
?>
</div>
    </div> 
</div>
<!-- Animation and index page only styling -->
<script type="text/javascript">
    $(document).ready(function() {
        var height = $(window).height() - $('.heightClass').height() - $('.footer').height() - $('.credits').height();
        $('.wrappercell').css('height', height + 'px');
    });
</script>
<?php
get_footer(); 
