<div class="row">
    <div class="col-md-9 col-sm-12 nocontent">
        <?php _e('Oops, there seems to be no content :(', 'standout'); ?>
    </div>
        <?php 
        $sidebar_right_active = is_active_sidebar('sidebar-right');
        if($sidebar_right_active) : ?>
            <div class="col-md-3 col-sm-12">
                <?php get_sidebar('right'); ?>
            </div>
         <?php endif; ?>
</div>