<?php

class BaseThemeTaxonomies {

	function __construct() {
		register_activation_hook( __FILE__, array( $this, 'activate' ) );
		register_deactivation_hook( __FILE__, array( $this, 'deactivate' ) );
		add_action( 'init', array( $this, 'register_taxonomies' ), 0 );
	}

	function activate() {
		$this->register_post_types();
		$this->register_taxonomies();
		flush_rewrite_rules();
	}

	function deactivate() {
		flush_rewrite_rules();
	}

	function register_taxonomies() {
		if ( isset( $_REQUEST['action'] ) && 'deactivate' == $_REQUEST['action'] ) {
			return;
		}
		register_taxonomy( 'basetheme-taxonomy', 'basetheme-cpt', array(
			'hierarchical' 	=> true,
			'show_ui' 		=> true,
			'query_var' 	=> true,
			'public'		=> true,
			'rewrite' 		=> array( 'slug' => 'cpts/custom-taxonomy', 'with_front' => false, 'hierarchical' => true ),
			'labels' => array(
					'name' 							=> 'CPT Taxonomy',
					'singular_name' 				=> 'CPT Taxonomy',
					'search_items' 					=> 'Search CPT Taxonomies',
					'all_items' 					=> 'All CPT Taxonomies',
					'parent_item' 					=> 'Parent CPT Taxonomy',
					'parent_item_colon' 			=> 'Parent CPT Taxonomy:',
					'edit_item' 					=> 'Edit CPT Taxonomy', 
					'update_item' 					=> 'Update CPT Taxonomy',
					'add_new_item' 					=> 'Add New CPT Taxonomy',
					'separate_items_with_commas' 	=> null,
					'new_item_name' 				=> 'New CPT Taxonomy',
					'menu_name' 					=> 'CPT Taxonomies'
					)
			)	
		);
	}
	
}

new BaseThemeTaxonomies();

?>