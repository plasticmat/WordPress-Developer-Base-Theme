<?php

class BaseTheme_PostTypes {

	function __construct() {
		register_activation_hook( __FILE__, array( $this, 'activate' ) );
		register_deactivation_hook( __FILE__, array( $this, 'deactivate' ) );
		add_action( 'init', array( $this, 'register_post_types' ), 0 );
	}

	function activate() {
		$this->register_post_types();
		$this->register_taxonomies();
		flush_rewrite_rules();
	}

	function deactivate() {
		flush_rewrite_rules();
	}

	function register_post_types() {
		if ( isset( $_REQUEST['action'] ) && 'deactivate' == $_REQUEST['action'] ) {
			return;
		}
		register_post_type('basetheme-cpt', array(
			'public' 				=> true,
			'publicly_queryable' 	=> true,
			'exclude_from_search'	=> false,
			'show_ui' 				=> true, 
			'show_in_menu' 			=> true,
			'query_var' 			=> true,
			'rewrite' 				=> array( 'slug' => 'cpt', 'with_front' => FALSE ),
			'capability_type' 		=> 'post',
			'has_archive' 			=> 'cpts', 
			'hierarchical' 			=> false,
			'menu_position' 		=> 5,
			'supports' => array(
					'title',
					'editor',
					// 'author',
					'thumbnail',
					'excerpt'
					// 'trackbacks',
					// 'comments',
					// 'revisions'
				),
			'labels' => array(
					'name' 					=> 'CPTs',
					'singular_name' 		=> 'CPT',
					'add_new' 				=> 'Add New',
					'all_items'				=> 'All CPTs',
					'add_new_item' 			=> 'Add New CPT',
					'edit_item' 			=> 'Edit CPT',
					'new_item' 				=> 'New CPT',
					'view_item' 			=> 'View CPT',
					'search_items' 			=> 'Search CPTs',
					'not_found' 			=> 'No CPTs Found',
					'not_found_in_trash' 	=> 'No CPTs found in Trash', 
					'parent_item_colon' 	=> '',
					'menu_name' 			=> 'CPTs'
				)
			)
		);
	}
	
}

new BaseTheme_PostTypes();

?>