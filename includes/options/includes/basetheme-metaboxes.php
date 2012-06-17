<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
 */

add_filter( 'cmb_meta_boxes', 'jc_resume_meta' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function jc_resume_meta( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_jcr_';

	// Meta boxesfor home intro
	$meta_boxes[] = array(
		'id'         => 'home_intro',
		'title'      => 'Home Introduction',
		'pages'      => array( 'page'), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name'    => 'Home intro text',
				'desc'    => 'Introduction text displayed below name in header',
				'id'      => $prefix . 'home_intro',
				'type'    => 'wysiwyg',
				'options' => array(	'textarea_rows' => 10 ),
			)
		)
	);

	$meta_boxes[] = array(
		'id'         => 'skill_one_metabox',
		'title'      => 'Skill One',
		'pages'      => array( 'page'), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name' => 'Skill One',
				'desc' => 'SKill One Title',
				'id'   => $prefix . 'skill_one_title',
				'type' => 'text',
			)
		)
	);

	return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) ){
		require_once 'metabox/init.php';
	}

}