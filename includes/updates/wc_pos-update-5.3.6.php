<?php
/**
 * Database Update Script for 5.3.4
 *
 * @package WooCommerce_Point_Of_Sale/Updates
 */

defined( 'ABSPATH' ) || exit;

global $wpdb;
$wpdb->hide_errors();

// Force refresh the local database (IndexedDB).
update_option( 'wc_pos_force_refresh_db', 'yes' );
