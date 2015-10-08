<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="description" content="<?php bloginfo('description'); ?>"/>
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <?php if(is_single()) : ?>
        <!-- meta data for single posts for Facebook -->
            <meta property="og:title" content="<?php the_title(); ?>" />
            <?php if(has_post_thumbnail()) : ?>
                <meta property="og:image" content="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" />
            <?php endif; //has_post_thumbnail() ?>
        <?php endif; //is_single() ?>
        <?php wp_head(); ?>  
        
    </head>
    <body <?php echo is_page_template('page_front-page.php') ? 'id="home-body"' : '' ?> <?php body_class() ?>>
        
        <?php //Insert the Facebook Social Plugin for comments where the user set it
        $user_setting_fb = get_theme_mod('show_fb_comments_settings', '0');
        if( ($user_setting_fb == '3') || (is_single() && $user_setting_fb == '1') || (is_page() && $user_setting_fb == '2') ) : ?>
        <!-- has to be directly after body according to FB, no App ID necessary -->
            <div id="fb-root"></div>
        <?php endif;
        if(has_nav_menu('primary')) : ?>
        <div class="topMenuContainer">
        <div class="container">
        <div class="row heightClass">
            <div class="col-md-12 hidden-sm hidden-xs">
                <nav id="top">
                    <a href="<?php echo esc_url(home_url()); ?>">
                    <span class="home-name-nav">
                        <?php bloginfo('name'); ?>
                    </span>
                </a>
                    <ul>
                    <li class="searchIcon fa fa-search"></li>
                    </ul>
                    
                <?php 
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container' => 'div',
                    'container_class' => '',
                    'container_id' => '',
                    'menu_class' => 'menu',
                    'menu_id' => '',
                    'echo' => true,
                    'fallback_cb' => 'wp_page_menu',
                    'before' => '',
                    'after' => '',
                    'link_before' => '',
                    'link_after' => '',
                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'depth' => 0,
                    'walker' => ''
                )); ?>

                </nav>
            </div>

        </div> <!-- .row .heightclass -->
        
        
        <div class="row mobile">
            <div class="col-sm-12 hidden-lg hidden-md">
                <a href="<?php echo esc_url(home_url()); ?>">
                    <span class="home-name-nav">
                        <?php bloginfo('name'); ?>
                    </span>
                </a>
            <div class="fa fa-bars" id="mobile-bars"></div>
            <div class="searchIconMobile fa fa-search"></div>

            <div id="mobile-div">
                <?php 
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container' => 'div',
                    'container_class' => '',
                    'container_id' => '',
                    'menu_class' => 'mobile-menu',
                    'menu_id' => '',
                    'echo' => true,
                    'fallback_cb' => 'wp_page_menu',
                    'before' => '',
                    'after' => '',
                    'link_before' => '',
                    'link_after' => '',
                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'depth' => 0,
                    'walker' => ''
                )); ?>
            </div> <!-- .mobile-div -->
            </div> <!-- .col-sm-12 .hidden-lg .hidden-md -->
        </div> <!-- .row .mobile -->
        <?php get_search_form(true); ?>
        </div> <!-- .container -->
        </div> <!-- .topMenuContainer -->
        <?php endif; ?>
        <div class="container middleContainer">
            <?php if(has_nav_menu('left-with-icons')) : ?>
            <div class="row">
                <div class="col-md-12 hidden-sm hidden-xs">
                    <div id="leftMenu">
                    <?php 
                    $walker = new Walker_Nav_Menu_Left();
                        wp_nav_menu(array(
                            'theme_location' => 'left-with-icons',
                            'container' => 'div',
                            'container_class' => '',
                            'container_id' => '',
                            'menu_class' => 'left-menu-class',
                            'menu_id' => '',
                            'echo' => true,
                            'fallback_cb' => 'wp_page_menu',
                            'before' => '',
                            'after' => '',
                            'link_before' => '',
                            'link_after' => '',
                            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                            'depth' => 0,
                            'walker' => $walker
                        )); ?>
                    </div>
                </div> <!-- .col-xs-12 -->
            </div> <!-- .row -->
            <div class="row">
                <div class="hidden-lg hidden-md col-sm-12 col-xs-12 bottomMobileMenuButton arrowsup"><span class='menutext'><?php _e('Menu', 'presentizr'); ?></span></div>
                
                <div class="hidden-lg hidden-md col-sm-12 col-xs-12 bottomMobileMenu">
                    <?php 
                    $walker = new Walker_Nav_Menu_Left();
                        wp_nav_menu(array(
                            'theme_location' => 'left-with-icons',
                            'container' => 'div',
                            'container_class' => '',
                            'container_id' => '',
                            'menu_class' => 'left-menu-mobile-class',
                            'menu_id' => '',
                            'echo' => true,
                            'fallback_cb' => 'wp_page_menu',
                            'before' => '',
                            'after' => '',
                            'link_before' => '',
                            'link_after' => '',
                            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                            'depth' => 0,
                            'walker' => $walker
                        )); ?>
                </div> <!-- .hidden-lg .hidden-md -->
            </div> <!-- .row -->
        <?php endif;
        if(has_nav_menu('secondary')) : ?>
            <div class="rotate secondary-menu-button arrowsup">
                <?php _e('Menu', 'presentizr'); ?>
            </div><!-- .rotate .secondary-menu -->
            <div class="hidden-lg hidden-md col-sm-1 col-xs-1 bottomMobileMenuButtonRightMenu">&lt;</div>
        <div class="secondary-menu">
             <?php 
                wp_nav_menu(array(
                    'theme_location' => 'secondary',
                    'container' => 'div',
                    'container_class' => '',
                    'container_id' => '',
                    'menu_class' => 'secondary-menu-class',
                    'menu_id' => '',
                    'echo' => true,
                    'fallback_cb' => 'wp_page_menu',
                    'before' => '',
                    'after' => '',
                    'link_before' => '',
                    'link_after' => '',
                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'depth' => 0,
                    'walker' => ''
                )); ?>
        </div>
        <?php endif; ?>
        
       <div id="wrapper">



