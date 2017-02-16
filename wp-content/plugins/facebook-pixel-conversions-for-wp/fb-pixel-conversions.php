<?php
/*
Plugin Name: Facebook Pixel Conversions for WordPress
Plugin URI: http://www.nueue.net/
Description: Add pixel conversion codes to your posts, pages, or other content types.
Version: 0.0.2
Author: Vincent Astolfi
Author URI: http://www.nueue.net/
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/
if(!is_admin()) {
function fb_pxl_con_head() {
	 global $post;
	 $the_id = $post->ID;
	 $the_pxl_con_switch = get_post_meta($the_id, 'fb_pxl_conversion_code_checkbox', true);
	 if ($the_pxl_con_switch == "on") {
	 $the_pxl_con_code = get_post_meta($the_id, 'fb_pxl_pixel_conversion_code', true);
	 echo $the_pxl_con_code;
	 }
}
add_action('wp_head', 'fb_pxl_con_head');
}

if(is_admin()) {
function fb_pxl_con_meta( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'fb_pxl_';

	$meta_boxes[] = array(
		'id'         => 'fb_pxl_metabox',
		'title'      => 'Facebook Pixel Conversion Code',
		'pages'      => array( 'page', 'post', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name' => 'Insert Conversion Code',
				'desc' => ' whether or not you would like to insert the conversion code',
				'id'   => $prefix . 'conversion_code_checkbox',
				'type' => 'checkbox',
			),
			array(
				'name' => 'Conversion Javascript',
				'desc' => 'copy and paste your Facebook Pixel Conversion Code here',
				'id'   => $prefix . 'pixel_conversion_code',
				'type' => 'textarea_code',
			),
		),
	);
	return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'fb_pxl_con_meta' );
add_action( 'init', 'pxl_init_mtbxs', 9999 );

function pxl_init_mtbxs() {
	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'init.php';
}
}
?>