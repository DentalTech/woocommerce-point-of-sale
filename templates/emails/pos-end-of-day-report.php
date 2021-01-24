<?php
/**
 * End of Day Report
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/pos-end-of-day-report.php.
 *
 * @var WC_POS_Register $session
 * @var string          $additional_content
 * @var bool            $sent_to_admin
 * @var bool            $plain_text
 * @var WC_Email        $email
 *
 * @package WooCommerce_Point_Of_Sale/Templates/Emails
 */

defined( 'ABSPATH' ) || exit;

$session_id     = $session->get_id();
$session_data   = $session->get_session_data();
$counted_totals = $session->get_counted_totals();
$details        = wc_pos_get_session_details( $session_id );
$text_align     = is_rtl() ? 'right' : 'left';

do_action( 'woocommerce_email_header', $email_heading, $email ); ?>

<p><?php esc_html_e( 'You are receiving this email as a recepient of the end of day reports generated by Point of Sale for WooCommerce.', 'woocommerce-point-of-sale' ); ?></p>

<h2><?php esc_html_e( 'Summary', 'woocommerce-point-of-sale' ); ?></h2>
<table class="td" cellspacing="0" cellpadding="6" style="margin-bottom: 40px; width: 100%; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;" border="1">
	<thead>
		<tr>
			<th class="td" scope="row" style="text-align:<?php echo esc_attr( $text_align ); ?>;"><?php esc_html_e( 'Register', 'woocommerce-point-of-sale' ); ?></th>
			<td class="td" style="text-align:<?php echo esc_attr( $text_align ); ?>; vertical-align:middle; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;"><?php echo esc_html( $details['register'] ); ?></td>
		</tr>
		<tr>
			<th class="td" scope="row" style="text-align:<?php echo esc_attr( $text_align ); ?>;"><?php esc_html_e( 'Outlet', 'woocommerce-point-of-sale' ); ?></th>
			<td class="td" style="text-align:<?php echo esc_attr( $text_align ); ?>; vertical-align:middle; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;"><?php echo esc_html( $details['outlet'] ); ?></td>
		</tr>
		<tr>
			<th class="td" scope="row" style="text-align:<?php echo esc_attr( $text_align ); ?>;"><?php esc_html_e( 'Opened By', 'woocommerce-point-of-sale' ); ?></th>
			<td class="td" style="text-align:<?php echo esc_attr( $text_align ); ?>; vertical-align:middle; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;"><?php echo esc_html( $details['opened_by'] ); ?></td>
		</tr>
		<tr>
			<th class="td" scope="row" style="text-align:<?php echo esc_attr( $text_align ); ?>;"><?php esc_html_e( 'Closed By', 'woocommerce-point-of-sale' ); ?></th>
			<td class="td" style="text-align:<?php echo esc_attr( $text_align ); ?>; vertical-align:middle; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;"><?php echo esc_html( $details['closed_by'] ); ?></td>
		</tr>
		<tr>
			<th class="td" scope="row" style="text-align:<?php echo esc_attr( $text_align ); ?>;"><?php esc_html_e( 'Opened', 'woocommerce-point-of-sale' ); ?></th>
			<td class="td" style="text-align:<?php echo esc_attr( $text_align ); ?>; vertical-align:middle; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;"><?php echo esc_html( $session->get_date_opened()->date( 'Y-m-d H:i:s' ) ); ?></td>
		</tr>
		<tr>
			<th class="td" scope="row" style="text-align:<?php echo esc_attr( $text_align ); ?>;"><?php esc_html_e( 'Closed', 'woocommerce-point-of-sale' ); ?></th>
			<td class="td" style="text-align:<?php echo esc_attr( $text_align ); ?>; vertical-align:middle; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;"><?php echo esc_html( $session->get_date_closed()->date( 'Y-m-d H:i:s' ) ); ?></td>
		</tr>
		<?php if ( ! empty( $session->get_opening_note() ) ) : ?>
		<tr>
			<th class="td" scope="row" style="text-align:<?php echo esc_attr( $text_align ); ?>;"><?php esc_html_e( 'Opening Note', 'woocommerce-point-of-sale' ); ?></th>
			<td class="td" style="text-align:<?php echo esc_attr( $text_align ); ?>; vertical-align:middle; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;"><?php echo esc_html( $session->get_opening_note() ); ?></td>
		</tr>
		<?php endif; ?>
		<?php if ( ! empty( $session->get_closing_note() ) ) : ?>
		<tr>
			<th class="td" scope="row" style="text-align:<?php echo esc_attr( $text_align ); ?>;"><?php esc_html_e( 'Closing Note', 'woocommerce-point-of-sale' ); ?></th>
			<td class="td" style="text-align:<?php echo esc_attr( $text_align ); ?>; vertical-align:middle; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;"><?php echo esc_html( $session->get_closing_note() ); ?></td>
		</tr>
		<?php endif; ?>
		<tr>
			<th class="td" scope="row" style="text-align:<?php echo esc_attr( $text_align ); ?>;"><?php esc_html_e( 'Opening Cash Amount', 'woocommerce-point-of-sale' ); ?></th>
			<td class="td" style="text-align:<?php echo esc_attr( $text_align ); ?>; vertical-align:middle; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;"><?php echo wp_kses_post( wc_price( $session->get_opening_cash_total() ) ); ?></td>
		</tr>
	</thead>
</table>
<h2><?php esc_html_e( 'Payments', 'woocommerce-point-of-sale' ); ?></h2>
<table class="td" cellspacing="0" cellpadding="6" style="margin-bottom: 40px; width: 100%; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;" border="1">
	<thead>
		<tr>
			<th class="td" scope="col" style="text-align:<?php echo esc_attr( $text_align ); ?>;"><?php esc_html_e( 'Payment', 'woocommerce-point-of-sale' ); ?></th>
			<th class="td" scope="col" style="text-align:<?php echo esc_attr( $text_align ); ?>;"><?php esc_html_e( 'Orders', 'woocommerce-point-of-sale' ); ?></th>
			<th class="td" scope="col" style="text-align:<?php echo esc_attr( $text_align ); ?>;"><?php esc_html_e( 'Expected', 'woocommerce-point-of-sale' ); ?></th>
			<th class="td" scope="col" style="text-align:<?php echo esc_attr( $text_align ); ?>;"><?php esc_html_e( 'Counted', 'woocommerce-point-of-sale' ); ?></th>
			<th class="td" scope="col" style="text-align:<?php echo esc_attr( $text_align ); ?>;"><?php esc_html_e( 'Difference', 'woocommerce-point-of-sale' ); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach ( $details['payments'] as $key => $payment ) :
			$counted    = isset( $counted_totals[ $key ] ) ? $counted_totals[ $key ] : 0;
			$difference = $counted - $payment['total'];
			?>
			<tr>
				<td class="td" style="text-align:<?php echo esc_attr( $text_align ); ?>; vertical-align:middle; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;"><?php echo esc_html( $payment['title'] ); ?></td>
				<td class="td" style="text-align:<?php echo esc_attr( $text_align ); ?>; vertical-align:middle; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;"><?php echo esc_html( $payment['orders_count'] ); ?></td>
				<td class="td" style="text-align:<?php echo esc_attr( $text_align ); ?>; vertical-align:middle; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;"><?php echo wp_kses_post( wc_price( $payment['total'] ) ); ?></td>
				<td class="td" style="text-align:<?php echo esc_attr( $text_align ); ?>; vertical-align:middle; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;"><?php echo wp_kses_post( wc_price( $counted ) ); ?></td>
				<td class="td" style="text-align:<?php echo esc_attr( $text_align ); ?>; vertical-align:middle; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;"><?php echo wp_kses_post( wc_price( $difference ) ); ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<?php do_action( 'woocommerce_email_footer', $email ); ?>
