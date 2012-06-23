<?php

class BaseThemeCustomAdmin {

	function __construct() {
		add_action( 'admin_menu', array( $this, 'modify_menu' ) );
		add_action( 'init', array( $this, 'rename_post_labels' ), 0 );
		add_filter( 'enter_title_here', array( $this, 'custom_edit_screen_titles' ) );
		add_action( 'wp_before_admin_bar_render', array( $this, 'admin_bar_render' ) );
	}
	
	function modify_menu() {
		// global $menu;
		//$menu[5][0] = 'Blog'; // example: Rename Posts to something a bit more descriptive, eg. Blog, News, etc.
		//$menu[14] = $menu[10]; // example: move Media to position 14
		//unset( $menu[10] ); // example: Media management is shithouse - do we really need it anyway?
	}
	
	function rename_post_labels() {
		// Rename Posts to something a bit more descriptive, eg. Blog, News, etc.
		// global $wp_post_types;
		// $labels = $wp_post_types['post']->labels;
		// $labels->singular_name = 'Blog Post';
		// $labels->add_new_item = 'Add New Blog Post';
	}
	
	function custom_edit_screen_titles( $title ){
		// Change the 'Enter Title' text in the title input field for custom post types
		global $wp_post_types;
		$screen = get_current_screen();
		$post_type = $screen->post_type;
		$labels = $wp_post_types[$post_type]->labels;
		$label = $labels->singular_name;
		$title = 'Enter '. $label .' Title Here';
		return $title;
	}
	
	function admin_bar_render(){
		global $wp_admin_bar;
		$wp_admin_bar->remove_menu('new-link', 'new-content'); // example: Remove the link item from 'add new' menu in admin bar.
	}
	
}

new BaseThemeCustomAdmin();

?>