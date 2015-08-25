<div class="row searchrow">
    <form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	
		<label class="screen-reader-text" for="s"><?php _e( 'Search for:', 'standout' ); ?></label>
                <div class="col-md-10 col-sm-12">
                    <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" />
                </div>
                <div class="col-md-2 col-xs-12">
                    <input type="submit" id="searchsubmit" value="<?php _e('Search', 'standout'); ?>" />
                </div>
        
    </form>
</div>