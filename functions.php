<?php

// Paths to directories which have files to be included: Theme Parts, Functions, Libraries
define('BASETHEME_THEME_INCLUDES', TEMPLATEPATH . '/includes/theme');
define('BASETHEME_FUNCTION_INCLUDES', TEMPLATEPATH . '/includes/functions');
define('BASETHEME_LIB_INCLUDES', TEMPLATEPATH . '/includes/libs');

// Paths to template directory and assets.
define('BASETHEME_THEME_DIR', get_bloginfo('template_directory'));
define('BASETHEME_ASSETS', BASETHEME_THEME_DIR . '/assets');

// Enqueue scripts and stylesheets
function basetheme_add_scripts(){
        
        if ( !is_admin() ) {
            
                // Register the new scipts ...
                wp_register_script( 'modernizr', BASETHEME_THEME_DIR.'/assets/js/libs/modernizr.js',array(),false,false );
                wp_register_script( 'selectivizr', BASETHEME_THEME_DIR.'/assets/js/libs/selectivizr-min.js',array('jquery'),false,true );
                wp_register_script( 'basetheme_plugins', BASETHEME_THEME_DIR.'/assets/js/plugins.js',array('jquery'),false,true );
                wp_register_script( 'basetheme_scripts', BASETHEME_THEME_DIR.'/assets/js/scripts.js',array('jquery'),false,true );

                // ... and enqueue them
                wp_enqueue_script( 'modernizr' );
                wp_enqueue_script( 'selectivizr' );
                wp_enqueue_script( 'basetheme_plugins' );
                wp_enqueue_script( 'basetheme_scripts' );
                wp_enqueue_script( 'comment-reply' );
                
                // Register & enqueue the stylesheet
                wp_register_style( 'basetheme_css', BASETHEME_ASSETS . '/css/main.css', array(), '1', 'all' );
                wp_enqueue_style( 'basetheme_css' );
            
        }
        else {
            
                // Register & enqueue the admin stylesheet
                wp_register_style( 'basetheme_admin_css', BASETHEME_ASSETS . '/css/admin.css', array(), '1', 'all' );
                wp_enqueue_style( 'basetheme_admin_css' );
        
        }
        
}
add_action( 'wp_enqueue_scripts', 'basetheme_add_scripts' );

// WP3+ Support
function basetheme_theme_support() {

        add_theme_support('post-thumbnails');   
        add_custom_background();                 
        add_theme_support('automatic-feed-links'); 
        add_theme_support( 'post-formats', array( 
                'aside',   
                'gallery',
                'link',
                'image',
                'quote',
                'status',
                'video',
                'audio',
                'chat'
                )
        );      
        add_theme_support( 'menus' );            // wp menus     
}

add_action('after_setup_theme','basetheme_theme_support');  


?>