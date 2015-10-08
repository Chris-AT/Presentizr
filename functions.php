<?php

if ( ! isset( $content_width ) )  {
    $content_width = 1170;
}

// Register the 2 menus
add_action('after_setup_theme', 'presentizr_register_menus');
function presentizr_register_menus() {
    register_nav_menu('primary', 'Primary (top) menu.');
    register_nav_menu('secondary', 'Menu on right side');
    register_nav_menu('left-with-icons', 'Left menu with icons (depth: 1 only, possibility to choose icon appears only after clicking "Save")');
    add_theme_support('widgets');
    add_theme_support( 'post-thumbnails' ); 
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( "title-tag" );
    add_theme_support( "custom-background");
    load_theme_textdomain( 'presentizr', get_template_directory() .'/languages' );
//        $locale = get_locale();
    $locale_file = get_template_directory() . "/languages/$locale.php";

    if ( is_readable( $locale_file ) ) {
        require_once( $locale_file );
    }
}

add_action('wp_enqueue_scripts', 'presentizr_enqueue_css');
function presentizr_enqueue_css() {
    wp_enqueue_style('bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css');
    wp_enqueue_style('share-css', get_template_directory_uri() . '/css/jquery.share.css');
    wp_enqueue_style('main-style', get_template_directory_uri() . '/style.css', array(), '2.1');
    
    wp_enqueue_script('Bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '1.0', true);
    wp_enqueue_script('jquery');
    wp_enqueue_script('share', get_template_directory_uri() . '/js/jquery.share.js', array('JQuery'));
    wp_enqueue_script('facebook', get_template_directory_uri() . '/js/facebook.js');
    wp_enqueue_script('footer', get_template_directory_uri() . '/js/footer.js');
    if(is_page_template('template-front-page.php')) {
        wp_enqueue_script('template-front-page', get_template_directory_uri() . '/js/template-front-page.js', array('jquery'));
    }
    if ( is_singular() ) { 
        wp_enqueue_script( "comment-reply" ); 
    }
}

add_action('customize_register', 'presentizr_customize_register');
function presentizr_customize_register($wp_customize) {
    
    $wp_customize->add_section(
            'assign-pages',
            array(
                'title' => __('Assign Pages', 'presentizr'),
                'description' => __('Assign the pages to the home page menus.'
                . ' If you choose to show 2, the first 2 will be displayed. (Note: You have'
                . ' to set "static page" and use the Page Template "Front Page" for that.)', 'presentizr'),
                'priority' => 35
            )
    );
    $wp_customize->add_setting(
            'assign-pages-settings',
            array(
                'default' => 0,
                'transport' => 'refresh',
                'sanitize_callback' => 'esc_raw_url'
            )
    );
    $wp_customize->add_setting(
            'assign-number-of-pages-settings',
            array(
                'default' => 0,
                'transport' => 'refresh',
                'sanitize_callback' => 'esc_attr'
            )
    );
    $wp_customize->add_setting(
            'box-1-settings',
            array(
                'default' => 0,
                'transport' => 'refresh',
                'sanitize_callback' => 'esc_raw_url'
            )
    );
        $wp_customize->add_setting(
            'box-2-settings',
            array(
                'default' => 0,
                'transport' => 'refresh',
                'sanitize_callback' => 'esc_raw_url'
            )
    );
        $wp_customize->add_setting(
            'box-3-settings',
            array(
                'default' => 0,
                'transport' => 'refresh',
                'sanitize_callback' => 'esc_raw_url'
            )
    );
        $wp_customize->add_setting(
            'pages-color-settings',
            array(
                'default' => '#000',
                'transport' => 'refresh',
                'sanitize_callback' => 'esc_attr'
                
            )
    );   
        $wp_customize->add_setting(
            'pages-color-box-settings',
            array(
                'default' => '#FFF',
                'transport' => 'refresh',
                'sanitize_callback' => 'esc_attr'
            )
    ); 
        $wp_customize->add_setting(
            'pages-background-settings',
            array(
                'transport' => 'refresh',
                'sanitize_callback' => 'esc_raw_url'
            )
    );  
        $wp_customize->add_setting(
            'front-page-name-settings',
            array(
                'transport' => 'refresh',
                'sanitize_callback' => 'esc_attr'
            )
    ); 
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'assign-number-of-pages-settings',
            array(
                'label'          => __('How many links on the home page?', 'presentizr'),
                'section'        => 'assign-pages',
                'settings'       => 'assign-number-of-pages-settings',
                'type'           => 'select',
                'choices'        => array(
                    '0' => '0',
                    '1'   => '1',
                    '2'  => '2',
                    '3' => '3'
                )
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'box-1-settings',
            array(
                'label'          => __('Page for 1. box', 'presentizr'),
                'section'        => 'assign-pages',
                'settings'       => 'box-1-settings',
                'type'           => 'dropdown-pages',
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'box-2-settings',
            array(
                'label'          => __('Page for 2. box', 'presentizr'),
                'section'        => 'assign-pages',
                'settings'       => 'box-2-settings',
                'type'           => 'dropdown-pages',
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'box-3-settings',
            array(
                'label'          => __('Page for 3. box', 'presentizr'),
                'section'        => 'assign-pages',
                'settings'       => 'box-3-settings',
                'type'           => 'dropdown-pages',
            )
        )
    );
    $wp_customize->add_control(
            new WP_Customize_Color_Control($wp_customize, 'pages-color-settings',
                    array(
                        'label' => __('Color of the pages title', 'presentizr'),
                        'section' => 'assign-pages',
                        'settings' => 'pages-color-settings'
                    ))
    );
        $wp_customize->add_control(
            new WP_Customize_Color_Control($wp_customize, 'pages-color-box-settings',
                    array(
                        'label' => __('Color of the pages box', 'presentizr'),
                        'section' => 'assign-pages',
                        'settings' => 'pages-color-box-settings'
                    ))
    );
        $wp_customize->add_control(
            new WP_Customize_Image_Control($wp_customize, 'pages-background-settings',
                    array(
                        'label' => __('Background Image', 'presentizr'),
                        'section' => 'assign-pages',
                        'settings' => 'pages-background-settings'
                    ))
    );  
    /*
     * Section: Comments
     */
    $wp_customize->add_section(
            'comments',
            array(
                'title' => __('Comments', 'presentizr'),
                'description' => __('Should the Facebook Comment Plugin be displayed?', 'presentizr'),
                'priority' => 50
            )
    );
    $wp_customize->add_setting(
            'show_fb_comments_settings',
            array(
                'default' => 0,
                'transport' => 'refresh',
                'sanitize_callback' => 'esc_attr'
            )
    );
        $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'show_fb_comments_settings',
            array(
                'label'          => __('Where to show comments plugin of Facebook?', 'presentizr'),
                'section'        => 'comments',
                'settings'       => 'show_fb_comments_settings',
                'type'           => 'select',
                'choices'        => array(
                    '0' => __('Nowhere', 'presentizr'),
                    '1'   => __('Posts only', 'presentizr'),
                    '2'  => __('Pages only', 'presentizr'),
                    '3' => __('Posts and Pages', 'presentizr')
                )
            )
        )
    );
    /*
     * Section: Share
     */
    $wp_customize->add_section(
            'share',
            array(
                'title' => __('Share Buttons', 'presentizr'),
                'description' => __('Should Share Buttons be displayed?', 'presentizr'),
                'priority' => 100
            )
    );
    $wp_customize->add_setting(
            'show_fb_share_settings',
            array(
                'default' => '',
                'transport' => 'refresh',
                'sanitize_callback' => 'esc_attr'
            )
    );
        $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'show_fb_share_settings',
            array(
                'label'          => __('Should Share Buttons be displayed?', 'presentizr'),
                'section'        => 'share',
                'settings'       => 'show_fb_share_settings',
                'type'           => 'checkbox'
            )
        )
    );
        $wp_customize->add_control(
            new WP_Customize_Color_Control($wp_customize, 'front-page-name-settings',
                    array(
                        'label' => __('Color', 'presentizr'),
                        'section' => 'title_tagline',
                        'settings' => 'front-page-name-settings'
                    ))
    );  
}

add_action('wp_head', 'presentizr_include_custom_css');
function presentizr_include_custom_css() { ?>
    <style type="text/css"> <?php
    if(get_theme_mod('pages-color-settings') !== '' || get_theme_mod('pages-color-box-settings') !== '') : ?>
        .featured-page {
            color: <?php echo get_theme_mod('pages-color-settings', '#000'); ?>;
            border: 0.1em solid <?php echo get_theme_mod('pages-color-box-settings', '#FFF'); ?>;
        } 
    <?php endif;
    
        
    if(get_theme_mod('front-page-name-settings') !== '') : ?>
        .name {
            color: <?php echo get_theme_mod('front-page-name-settings'); ?>;
        }
        <?php endif; ?>

        #home-body {
            background-image: url('<?php echo get_theme_mod('pages-background-settings', get_stylesheet_directory_uri() . '/pictures/home_picture.jpg'); ?>');
        }
        </style> <?php
}

add_action('widgets_init', 'presentizr_widgets_init');
function presentizr_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Footer Sidebar', 'presentizr'),
        'id' => 'sidebar-footer',
        'description' => __( 'Widgets in this area will be shown on all pages in the footer.', 'presentizr'),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>',
    ) );
        register_sidebar( array(
        'name' => __( 'Right Sidebar', 'presentizr'),
        'id' => 'sidebar-right',
        'description' => __( 'Widgets in this area will be shown on all pages and posts on the right.', 'presentizr'),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>',
    ) );
}

/**
 * Edit the Nav Menu Walker for the font awesome page icons
 */

add_filter( 'wp_setup_nav_menu_item','custom_nav_item' );
function custom_nav_item($menu_item) {
    $menu_item->icon = get_post_meta( $menu_item->ID, 'menu_item_fa_icon', true );
    return $menu_item;
}
add_filter( 'wp_edit_nav_menu_walker', 'custom_nav_edit_walker',10,2 );
function custom_nav_edit_walker($walker, $menu_id) {
    if(!isset(get_nav_menu_locations()['left-with-icons'])) {
        return 'Presentizr_Walker_Nav_Menu_Edit';
    }
    if(get_nav_menu_locations()['left-with-icons'] == $menu_id) {
        return 'Presentizr_Walker_Nav_Menu_Edit_Custom';
    }
    else {
        return 'Walker_Nav_Menu_Edit';
    }
}

add_action('wp_update_nav_menu_item', 'custom_nav_update',10, 3);
function custom_nav_update($menu_id, $menu_item_db_id, $args ) {
    if(isset($_REQUEST['menu-item-fa-icon'])) {
        if ( is_array($_REQUEST['menu-item-fa-icon']) ) {
            $custom_value = $_REQUEST['menu-item-fa-icon'][$menu_item_db_id];
            update_post_meta( $menu_item_db_id, 'menu_item_fa_icon', $custom_value );
        }
    }

}


/**
 * For FontAwesome Icon Picker, include the files
 */

add_action( 'admin_enqueue_scripts', 'presentizr_load_admin_style' );
function presentizr_load_admin_style($hook_suffix) {
  wp_enqueue_style( 'fa_icon_picker_css', get_template_directory_uri() . '/css/fontawesome-iconpicker.min.css', false, '1.0.0' );
  wp_enqueue_style('font-awesome', get_stylesheet_directory_uri() . '/css/font-awesome.min.css');
  wp_enqueue_script( 'fa_icon_picker_js', get_template_directory_uri() . '/js/fontawesome-iconpicker.min.js', false, '1.0.0' );
  wp_enqueue_script( 'fa_icon_picker_activate_js', get_template_directory_uri() . '/js/icon-for-menu.js', false, '1.0.0' );
 }
 

/**
 * Admin Theme Options Page
 */

function presentizr_theme_documentation() { ?>
        <div class="wrap">
            <h1>Documentation</h1>
            <h2>Front Page Design</h2>
            If you intend to use a static frontpage and would like to make it look like on the screenshot, you have to follow these steps:
            <ol>
                <li>Create a Page</li>
                <li>On the right side, under "Attributes" - "Template" select "Front Page Template". No content is necessary.</li>
                <li>Save the page</li>
                <li>Go to "Appearance" - "Customize"</li>
                <li>Under "Static Front Page" choose "A static page" and select the page you created as "Front page"</li>
                <li>You can now decide under "Assign Pages" which pages should be featured on the home page</li>
            </ol>
            <h2>The Customizer Settings</h2>
            You can customize the appearance and functions of the theme in the theme customizer. To go there click under "Appearance" "Customize". <br/>The "Comments" section lets you choose whether to show the Facebook Comment Plugin which allows
            users to post comments using their Facebook profile. <br/>The "Share Button" option gives you the ability to control if share buttons should be displayed. If you check 
            the checkbox share buttons will be displayed for various social networks on posts and pages.
        </div>
<?php }

 add_action('admin_init', 'presentizr_add_wysiwyg_styles');
 function presentizr_add_wysiwyg_styles() {
     add_editor_style('style.css');
 }
 
add_action('wp_update_nav_menu', 'presentizr_get_menu_items');
function presentizr_get_menu_items($nav_menu_selected_id) {
    if(get_nav_menu_locations()['left-with-icons'] !== $nav_menu_selected_id) {
        return;
    }
    $items = wp_get_nav_menu_items($nav_menu_selected_id);
    $iconNotSetFlag = false;
    $wrongItems = array();
    foreach($items as $item) {
        //DO NOT CHANGE THIS
        if($_REQUEST['menu-item-fa-icon'][$item->ID] == '') {
            $iconNotSetFlag = true;
            $wrongItems[] = $item->title;
        }
    }

    if($iconNotSetFlag) {
        $GLOBALS['presentizr_wrongItems'] = $wrongItems;
        if(!function_exists('presentizr_admin_error_notice')) {
            function my_admin_error_notice() {
                $class = "error";
                global $wrongItems;
                $message = __("The following menu items do not have an icon associated:", 'presentizr') . '<br/>' . implode(', ', $wrongItems);
                
                echo"<div class=\"$class\"> <p>$message</p></div>"; 
                unset($GLOBALS['presentizr_wrongItems']);
            }
        }
        
        add_action( 'admin_notices', 'presentizr_admin_error_notice' ); 
        
    }
}


require_once 'inc/Presentizr_Walker_Nav_Menu_Edit_Custom.class.php';

//include walker class for left menu
require_once 'inc/Presentizr_Walker_Nav_Menu_Left.class.php';