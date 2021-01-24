<?php
/**
 * REST API Shipping Zones Controller
 *
 * Handles requests to wc-pos/shipping/zones.
 *
 * @package WooCommerce_Point_Of_Sale/Classes/API
 */

defined( 'ABSPATH' ) || exit;

/**
 * WC_POS_REST_Shipping_Zones_Controller.
 */
class WC_POS_REST_Shipping_Zones_Controller extends WC_REST_Shipping_Zones_Controller {

	/**
	 * Endpoint namespace.
	 *
	 * @var string
	 */
	protected $namespace = 'wc-pos';

	/**
	 * Check whether a given request has permission to read shipping zones.
	 *
	 * @param  WP_REST_Request $request Full details about the request.
	 * @return WP_Error|boolean
	 */
	public function get_items_permissions_check( $request ) {
		if ( ! wc_shipping_enabled() ) {
			return new WP_Error( 'rest_no_route', __( 'Shipping is disabled.', 'woocommerce-point-of-sale' ), array( 'status' => 404 ) );
		}

		if ( ! current_user_can( 'view_register' ) ) {
			return new WP_Error( 'woocommerce_rest_cannot_view', __( 'Sorry, you cannot list resources.', 'woocommerce-point-of-sale' ), array( 'status' => rest_authorization_required_code() ) );
		}

		return true;
	}
}
