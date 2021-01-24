<?php
/**
 * Database Update Script for 5.3.3
 *
 * @package WooCommerce_Point_Of_Sale/Updates
 */

global $wpdb;
$wpdb->hide_errors();

// Add new field to existing registers.
$results   = $wpdb->get_results( "SELECT ID FROM {$wpdb->posts} WHERE post_type = 'pos_register'", ARRAY_A );
$registers = array_map(
	function( $r ) {
		return intval( $r['ID'] );
	},
	$results
);
foreach ( $registers as $register_id ) {
	update_post_meta( $register_id, 'grid_layout', 'rectangular' );
}
