<?php

// Just sticking this here to keep the Theme Check happy.. not sure of it's purpose yet
if ( ! isset( $content_width ) ) $content_width = 980;

// Constants for absolute and relative paths to theme directoy
define('BASETHEME_THEME_URL',  get_template_directory_uri());
define('BASETHEME_THEME_DIR',  get_template_directory());

// Constants for paths to theme assets, includes and widgets
define('BASETHEME_ASSETS', BASETHEME_THEME_URL . '/assets');
define('BASETHEME_INCLUDES', BASETHEME_THEME_DIR . '/includes');
define('BASETHEME_WIDGETS', BASETHEME_THEME_DIR. '/widgets');

// Enqueue scripts and stylesheets
function basetheme_add_scripts(){
        
    if ( !is_admin() ) {
        
        // Register the new scipts ...
        wp_register_script( 'modernizr', BASETHEME_ASSETS .'/js/libs/modernizr.js',array(),false,false );
        wp_register_script( 'selectivizr', BASETHEME_ASSETS .'/js/libs/selectivizr-min.js',array('jquery'),false,true );
        wp_register_script( 'basetheme_plugins', BASETHEME_ASSETS .'/js/plugins.js',array('jquery'),false,true );
        wp_register_script( 'basetheme_scripts', BASETHEME_ASSETS .'/js/scripts.js',array('jquery'),false,true );

        // ... and enqueue them
        wp_enqueue_script( 'modernizr' );
        wp_enqueue_script( 'selectivizr' );
        wp_enqueue_script( 'basetheme_plugins' );
        wp_enqueue_script( 'basetheme_scripts' );
        wp_enqueue_script( 'comment-reply' );
        
        // Register the stylesheets ...
        wp_register_style( 'bootstrap_css', BASETHEME_ASSETS . '/css/bootstrap.min.css', array(), '1', 'all' );
        wp_register_style( 'basetheme_css', BASETHEME_ASSETS . '/css/theme.css', array(), '1', 'all' );

        // ... and enqueue them
        wp_enqueue_style( 'bootstrap_css' );
        wp_enqueue_style( 'basetheme_css' );
        
    }
    else {
        
        // Register & enqueue the admin stylesheet
        wp_register_style( 'basetheme_admin_css', BASETHEME_ASSETS . '/css/admin.css', array(), '1', 'all' );
        wp_enqueue_style( 'basetheme_admin_css' );
    
    }
        
}
add_action( 'wp_enqueue_scripts', 'basetheme_add_scripts' );

// Theme setup
function basetheme_init(){

    // Textdomain for translations
    load_theme_textdomain( 'basetheme', get_template_directory() . '/languages' );

    // Add thumbnail support to post and pages - can add CPTs to supported types
    add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );

    // Menus and RSS feed links
    add_theme_support( 'menus' );
    add_theme_support( 'automatic-feed-links' );

    // Custom background and header (uncomment if needed)
    add_theme_support( 'custom-background' );
    add_theme_support( 'custom-header' );

    // Register menus
    register_nav_menus(
        array( 
            'main_menu' => 'Main Menu',
            'footer_links' => 'Footer Links'
        )
    );

    // Enable editor styles
    add_editor_style();

}
add_action( 'after_setup_theme', 'basetheme_init' );

// Register sidebars
function basetheme_sidebars() {
    register_sidebar( array(
        'name' => __( 'Primary Sidebar', 'basetheme' ),
        'id' => 'sidebar-primary',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => "</aside>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
}
add_action( 'widgets_init', 'basetheme_sidebars' );

// Include admin modifications, CPTs, custom taxonomies and custom metaboxes
include_once(BASETHEME_INCLUDES . '/basetheme-admin.php');
include_once(BASETHEME_INCLUDES . '/basetheme-post-types.php');
include_once(BASETHEME_INCLUDES . '/basetheme-taxonomies.php');
include_once(BASETHEME_INCLUDES . '/basetheme-metaboxes.php');

// Include custom widgets
include_once(BASETHEME_WIDGETS . '/basetheme-example-widget.php');

?>